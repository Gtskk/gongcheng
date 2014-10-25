<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('phpass-0.3/PasswordHash.php');

define('STATUS_ACTIVATED', '1');
define('STATUS_NOT_ACTIVATED', '0');

/**
 * Tank_auth
 *
 * Authentication library for Code Igniter.
 *
 * @package		Tank_auth
 * @author		Ilya Konyukhov (http://konyukhov.com/soft/)
 * @version		1.0.9
 * @based on	DX Auth by Dexcell (http://dexcell.shinsengumiteam.com/dx_auth)
 * @license		MIT License Copyright (c) 2008 Erick Hartanto
 */
class Tank_auth
{
	private $error = array();
	public $ci;

	function __construct()
	{
		$this->ci =& get_instance();

		$this->ci->load->config('tank_auth', TRUE);
		$this->ci->load->library('session');
		$this->ci->load->model('tank_auth/users');
		$this->ci->load->helper('url');
		$this->ci->load->database();

		// Try to autologin
		$this->autologin();
	}
	
	/**
	 * Login user on the site. Return TRUE if login is successful
	 * (user exists and activated, password is correct), otherwise FALSE.
	 *
	 * @param	string	(username or email or both depending on settings in config file)
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function login($login, $password, $remember, $login_by_username, $login_by_email)
	{
		if ((strlen($login) > 0) AND (strlen($password) > 0)) {

			// Which function to use to login (based on config)
			if ($login_by_username AND $login_by_email) {
				$get_user_func = 'get_user_by_login';
			} else if ($login_by_username) {
				$get_user_func = 'get_user_by_username';
			} else {
				$get_user_func = 'get_user_by_email';
			}

			if (!is_null($user = $this->ci->users->$get_user_func($login))) {	// login ok

				// Does password match hash in database?
				$hasher = new PasswordHash(
						$this->ci->config->item('phpass_hash_strength', 'tank_auth'),
						$this->ci->config->item('phpass_hash_portable', 'tank_auth'));
				if ($hasher->CheckPassword($password, $user->password)) {		// password ok

					if ($user->banned == 1) {									// fail - banned
						$this->error = array('banned' => $user->ban_reason);

					} else {						
						// Save to session
						$this->ci->session->set_userdata(array(
								'user_id'	=> $user->id,
								'username'	=> $user->username,
								'displayname'	=> $user->display_name,
								'status'	=> ($user->activated == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
								'roles'=>$this->ci->users->get_roles($user->id)
						));
						
						if ($user->activated == 0) {							// fail - not activated
							$this->error = array('not_activated' => '');

						} else {												// success
							$user_profile = $this->ci->users->get_user_profile($user->id);
							$this->ci->session->set_userdata('user_profile', $user_profile);
							
							if ($remember) {
								$this->create_autologin($user->id);
							}

							$this->clear_login_attempts($login);

							$this->ci->users->update_login_info(
									$user->id,
									$this->ci->config->item('login_record_ip', 'tank_auth'),
									$this->ci->config->item('login_record_time', 'tank_auth'));
							return TRUE;
						}
					}
				} else {														// fail - wrong password
					$this->increase_login_attempt($login);
					$this->error = array('password' => 'auth_incorrect_password');
				}
			} else {															// fail - wrong login
				$this->increase_login_attempt($login);
				$this->error = array('login' => 'auth_incorrect_login');
			}
		}
		return FALSE;
	}

	/**
	 * Logout user from the site
	 *
	 * @return	void
	 */
	function logout()
	{
		$this->delete_autologin();
		
		// See http://codeigniter.com/forums/viewreply/662369/ as the reason for the next line
		$this->ci->session->set_userdata(array('user_id' => '', 'username' => '', 'status' => ''));

		$this->ci->session->sess_destroy();
	}

	/**
	 * Check if user logged in. Also test if user is activated and approved.
	 * User can log in only if acct has been approved.
	 *
	 * @param	bool
	 * @return	bool
	 */
	function is_logged_in($activated = TRUE)
	{
		return $this->ci->session->userdata('status') === ($activated ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED);
	}
	
	/**
	 * Get user_id
	 *
	 * @return	string
	 */
	function get_user_id()
	{
		return $this->ci->session->userdata('user_id');
	}

	/**
	 * Get username
	 *
	 * @return	string
	 */
	function get_username()
	{
		return $this->ci->session->userdata('username');
	}

	/**
	 * Create new user on the site and return some data about it:
	 * user_id, username, password, email, new_email_key (if any).
	 *
	 * @param	string
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	array
	 */
	function create_user($username, $email, $password, $email_activation, $custom)
	{
		if ((strlen($username) > 0) AND !$this->ci->users->is_username_available($username)) {
			$this->error = array('username' => 'auth_username_in_use');

		} elseif (!$this->ci->users->is_email_available($email)) {
			$this->error = array('email' => 'auth_email_in_use');

		} else {
			// Hash password using phpass
			$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'tank_auth'),
					$this->ci->config->item('phpass_hash_portable', 'tank_auth'));
			$hashed_password = $hasher->HashPassword($password);

			$data = array(
				'username'	=> $username,
				'password'	=> $hashed_password,
				'email'		=> $email,
				'last_ip'	=> $this->ci->input->ip_address(),
				'approved'=>(int)$this->ci->config->item('acct_approval', 'tank_auth')
			);
			
			$data['meta'] = $custom ? $custom : '';

			if ($email_activation) {
				$data['new_email_key'] = $this->generate_random_key();
			}
			if (!is_null($res = $this->ci->users->create_user($data, !$email_activation))) {
				$data['user_id'] = $res['user_id'];
				$data['password'] = $password;
				unset($data['last_ip']);
				return $data;
			}
		}

		return NULL;
	}

	/**
	 * Update User
	 *
	 * @param	string
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	array
	 */
	function update_user($username, $email, $password, $custom, $id)
	{
		$data = array(
			'username'	=> $username,
			'email'		=> $email,
			'last_ip'	=> $this->ci->input->ip_address(),
			'approved'=>(int)$this->ci->config->item('acct_approval', 'tank_auth')
		);
		if(!empty($password)){
			// Hash password using phpass
			$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'tank_auth'),
					$this->ci->config->item('phpass_hash_portable', 'tank_auth'));
			$hashed_password = $hasher->HashPassword($password);

			$data['password'] = $hashed_password;
		}
		
		$data['meta'] = $custom ? $custom : '';
		if (!is_null($res = $this->ci->users->update_user($data, $id))) {
			return TRUE;
		}

		return FALSE;
	}

	/**
	 * Check if username available for registering.
	 * Can be called for instant form validation.
	 *
	 * @param	string
	 * @return	bool
	 */
	function is_username_available($username)
	{
		return ((strlen($username) > 0) AND $this->ci->users->is_username_available($username));
	}

	/**
	 * Check if email available for registering.
	 * Can be called for instant form validation.
	 *
	 * @param	string
	 * @return	bool
	 */
	function is_email_available($email)
	{
		return ((strlen($email) > 0) AND $this->ci->users->is_email_available($email));
	}

	/**
	 * Change email for activation and return some data about user:
	 * user_id, username, email, new_email_key.
	 * Can be called for not activated users only.
	 *
	 * @param	string
	 * @return	array
	 */
	function change_email($email)
	{
		$user_id = $this->ci->session->userdata('user_id');

		if (!is_null($user = $this->ci->users->get_user_by_id($user_id, FALSE))) {

			$data = array(
				'user_id'	=> $user_id,
				'username'	=> $user->username,
				'email'		=> $email,
			);
			if (strtolower($user->email) == strtolower($email)) {		// leave activation key as is
				$data['new_email_key'] = $user->new_email_key;
				return $data;

			} elseif ($this->ci->users->is_email_available($email)) {
				$data['new_email_key'] = $this->generate_random_key();
				$this->ci->users->set_new_email($user_id, $email, $data['new_email_key'], FALSE);
				return $data;

			} else {
				$this->error = array('email' => 'auth_email_in_use');
			}
		}
		return NULL;
	}

	/**
	 * Activate user using given key
	 *
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function activate_user($user_id, $activation_key, $activate_by_email = TRUE)
	{
		$this->ci->users->purge_na($this->ci->config->item('email_activation_expire', 'tank_auth'));

		if ((strlen($user_id) > 0) AND (strlen($activation_key) > 0)) {
			return $this->ci->users->activate_user($user_id, $activation_key, $activate_by_email);
		}
		return FALSE;
	}

	/**
	 * Set new password key for user and return some data about user:
	 * user_id, username, email, new_pass_key.
	 * The password key can be used to verify user when resetting his/her password.
	 *
	 * @param	string
	 * @return	array
	 */
	function forgot_password($login)
	{
		if (strlen($login) > 0) {
			if (!is_null($user = $this->ci->users->get_user_by_login($login))) {

				$data = array(
					'user_id'		=> $user->id,
					'username'		=> $user->username,
					'email'			=> $user->email,
					'new_pass_key'	=> $this->generate_random_key(),
				);

				$this->ci->users->set_password_key($user->id, $data['new_pass_key']);
				return $data;

			} else {
				$this->error = array('login' => 'auth_incorrect_email_or_username');
			}
		}
		return NULL;
	}

	/**
	 * Check if given password key is valid and user is authenticated.
	 *
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function can_reset_password($user_id, $new_pass_key)
	{
		if ((strlen($user_id) > 0) AND (strlen($new_pass_key) > 0)) {
			return $this->ci->users->can_reset_password(
				$user_id,
				$new_pass_key,
				$this->ci->config->item('forgot_password_expire', 'tank_auth'));
		}
		return FALSE;
	}

	/**
	 * Replace user password (forgotten) with a new one (set by user)
	 * and return some data about it: user_id, username, new_password, email.
	 *
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function reset_password($user_id, $new_pass_key, $new_password)
	{
		if ((strlen($user_id) > 0) AND (strlen($new_pass_key) > 0) AND (strlen($new_password) > 0)) {

			if (!is_null($user = $this->ci->users->get_user_by_id($user_id, TRUE))) {

				// Hash password using phpass
				$hasher = new PasswordHash(
						$this->ci->config->item('phpass_hash_strength', 'tank_auth'),
						$this->ci->config->item('phpass_hash_portable', 'tank_auth'));
				$hashed_password = $hasher->HashPassword($new_password);

				if ($this->ci->users->reset_password(
						$user_id,
						$hashed_password,
						$new_pass_key,
						$this->ci->config->item('forgot_password_expire', 'tank_auth'))) {	// success

					// Clear all user's autologins
					$this->ci->load->model('tank_auth/user_autologin');
					$this->ci->user_autologin->clear($user->id);

					return array(
						'user_id'		=> $user_id,
						'username'		=> $user->username,
						'email'			=> $user->email,
						'new_password'	=> $new_password,
					);
				}
			}
		}
		return NULL;
	}

	/**
	 * Change user password (only when user is logged in)
	 *
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function change_password($old_pass, $new_pass)
	{
		$user_id = $this->ci->session->userdata('user_id');

		if (!is_null($user = $this->ci->users->get_user_by_id($user_id, TRUE))) {

			// Check if old password correct
			$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'tank_auth'),
					$this->ci->config->item('phpass_hash_portable', 'tank_auth'));
			if ($hasher->CheckPassword($old_pass, $user->password)) {			// success

				// Hash new password using phpass
				$hashed_password = $hasher->HashPassword($new_pass);

				// Replace old password with new one
				return $this->ci->users->change_password($user_id, $hashed_password);

			} else {															// fail
				$this->error = array('old_password' => 'auth_incorrect_password');
			}
		}
		return FALSE;
	}

	/**
	 * Change user email (only when user is logged in) and return some data about user:
	 * user_id, username, new_email, new_email_key.
	 * The new email cannot be used for login or notification before it is activated.
	 *
	 * @param	string
	 * @param	string
	 * @return	array
	 */
	function set_new_email($new_email, $password)
	{
		$user_id = $this->ci->session->userdata('user_id');

		if (!is_null($user = $this->ci->users->get_user_by_id($user_id, TRUE))) {

			// Check if password correct
			$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'tank_auth'),
					$this->ci->config->item('phpass_hash_portable', 'tank_auth'));
			if ($hasher->CheckPassword($password, $user->password)) {			// success

				$data = array(
					'user_id'	=> $user_id,
					'username'	=> $user->username,
					'new_email'	=> $new_email,
				);

				if ($user->email == $new_email) {
					$this->error = array('email' => 'auth_current_email');

				} elseif ($user->new_email == $new_email) {		// leave email key as is
					$data['new_email_key'] = $user->new_email_key;
					return $data;

				} elseif ($this->ci->users->is_email_available($new_email)) {
					$data['new_email_key'] = $this->generate_random_key();
					$this->ci->users->set_new_email($user_id, $new_email, $data['new_email_key'], TRUE);
					return $data;

				} else {
					$this->error = array('email' => 'auth_email_in_use');
				}
			} else {															// fail
				$this->error = array('password' => 'auth_incorrect_password');
			}
		}
		return NULL;
	}

	/**
	 * Activate new email, if email activation key is valid.
	 *
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function activate_new_email($user_id, $new_email_key)
	{
		if ((strlen($user_id) > 0) AND (strlen($new_email_key) > 0)) {
			return $this->ci->users->activate_new_email(
					$user_id,
					$new_email_key);
		}
		return FALSE;
	}

	/**
	 * Delete user from the site (only when user is logged in)
	 *
	 * @param	string
	 * @return	bool
	 */
	function delete_user($password)
	{
		$user_id = $this->ci->session->userdata('user_id');

		if (!is_null($user = $this->ci->users->get_user_by_id($user_id, TRUE))) {

			// Check if password correct
			$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'tank_auth'),
					$this->ci->config->item('phpass_hash_portable', 'tank_auth'));
			if ($hasher->CheckPassword($password, $user->password)) {			// success

				$this->ci->users->delete_user($user_id);
				$this->logout();
				return TRUE;

			} else {															// fail
				$this->error = array('password' => 'auth_incorrect_password');
			}
		}
		return FALSE;
	}

	/**
	 * Delete user (For Admin)
	 *
	 * @param	string
	 * @return	bool
	 */
	function delete_user_for_admin($user_id)
	{

		return $this->ci->users->delete_user($user_id);
	}

	/**
	 * Get error message.
	 * Can be invoked after any failed operation such as login or register.
	 *
	 * @return	string
	 */
	function get_error_message()
	{
		return $this->error;
	}

	/**
	 * Save data for user's autologin
	 *
	 * @param	int
	 * @return	bool
	 */
	private function create_autologin($user_id)
	{
		$this->ci->load->helper('cookie');
		$key = substr(md5(uniqid(mt_rand().get_cookie($this->ci->config->item('sess_cookie_name')))), 0, 16);

		$this->ci->load->model('tank_auth/user_autologin');
		$this->ci->user_autologin->purge($user_id);

		if ($this->ci->user_autologin->set($user_id, md5($key))) {
			set_cookie(array(
					'name' 		=> $this->ci->config->item('autologin_cookie_name', 'tank_auth'),
					'value'		=> serialize(array('user_id' => $user_id, 'key' => $key)),
					'expire'	=> $this->ci->config->item('autologin_cookie_life', 'tank_auth'),
			));
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Clear user's autologin data
	 *
	 * @return	void
	 */
	private function delete_autologin()
	{
		$this->ci->load->helper('cookie');
		if ($cookie = get_cookie($this->ci->config->item('autologin_cookie_name', 'tank_auth'), TRUE)) {

			$data = unserialize($cookie);

			$this->ci->load->model('tank_auth/user_autologin');
			$this->ci->user_autologin->delete($data['user_id'], md5($data['key']));

			delete_cookie($this->ci->config->item('autologin_cookie_name', 'tank_auth'));
		}
	}

	/**
	 * Login user automatically if he/she provides correct autologin verification
	 *
	 * @return	void
	 */
	private function autologin()
	{
		if (!$this->is_logged_in() AND !$this->is_logged_in(FALSE)) {			// not logged in (as any user)

			$this->ci->load->helper('cookie');
			if ($cookie = get_cookie($this->ci->config->item('autologin_cookie_name', 'tank_auth'), TRUE)) {

				$data = unserialize($cookie);

				if (isset($data['key']) AND isset($data['user_id'])) {

					$this->ci->load->model('tank_auth/user_autologin');
					if (!is_null($user = $this->ci->user_autologin->get($data['user_id'], md5($data['key'])))) {

						// Login user
						$this->ci->session->set_userdata(array(
								'user_id'	=> $user->id,
								'username'	=> $user->username,
								'status'	=> STATUS_ACTIVATED,
						));

						// Renew users cookie to prevent it from expiring
						set_cookie(array(
								'name' 		=> $this->ci->config->item('autologin_cookie_name', 'tank_auth'),
								'value'		=> $cookie,
								'expire'	=> $this->ci->config->item('autologin_cookie_life', 'tank_auth'),
						));

						$this->ci->users->update_login_info(
								$user->id,
								$this->ci->config->item('login_record_ip', 'tank_auth'),
								$this->ci->config->item('login_record_time', 'tank_auth'));
						return TRUE;
					}
				}
			}
		}
		return FALSE;
	}

	/**
	 * Check if login attempts exceeded max login attempts (specified in config)
	 *
	 * @param	string
	 * @return	bool
	 */
	function is_max_login_attempts_exceeded($login)
	{
		if ($this->ci->config->item('login_count_attempts', 'tank_auth')) {
			$this->ci->load->model('tank_auth/login_attempts');
			return $this->ci->login_attempts->get_attempts_num($this->ci->input->ip_address(), $login)
					>= $this->ci->config->item('login_max_attempts', 'tank_auth');
		}
		return FALSE;
	}

	/**
	 * Increase number of attempts for given IP-address and login
	 * (if attempts to login is being counted)
	 *
	 * @param	string
	 * @return	void
	 */
	private function increase_login_attempt($login)
	{
		if ($this->ci->config->item('login_count_attempts', 'tank_auth')) {
			if (!$this->is_max_login_attempts_exceeded($login)) {
				$this->ci->load->model('tank_auth/login_attempts');
				$this->ci->login_attempts->increase_attempt($this->ci->input->ip_address(), $login);
			}
		}
	}

	/**
	 * Clear all attempt records for given IP-address and login
	 * (if attempts to login is being counted)
	 *
	 * @param	string
	 * @return	void
	 */
	private function clear_login_attempts($login)
	{
		if ($this->ci->config->item('login_count_attempts', 'tank_auth')) {
			$this->ci->load->model('tank_auth/login_attempts');
			$this->ci->login_attempts->clear_attempts(
					$this->ci->input->ip_address(),
					$login,
					$this->ci->config->item('login_attempt_expire', 'tank_auth'));
		}
	}
	
	/**
	 * Gets the datatype of a table and converts it to the format $arr['column_name'] = 'datatype'
	 */
	public function get_profile_datatypes(){
		$result_array = $this->ci->users->get_profile_datatypes();
		return $this->multi_to_assoc($result_array);
	}
	
	/**
	 * Converts a multidimensional array (2 levels only) into a single associative
	 * array where $arr[0] is the key and $arr[1] is the value.
	 *
	 * @param array $result_array: The result of $query->result_array()
	 * @param array $first Append details to the beginning of the array
	 * @param string $return Return value: 'array|option|li'
	 * @param string $default Checked value (used if 'option' is selected in $return)
	 */
	function multi_to_assoc($result_array, $first = array(), $return = 'array', $default = FALSE){
		foreach($result_array as $val){
			$val = array_values($val);
			$arr[$val[0]] = $val[1];
		}

		if($first) $arr = array_merge($first, $arr);
		
		if($return == 'array'){
			return $arr;
		}
		elseif($return == 'option'){
			$option_arr = '';
			foreach($arr as $key=>$val){
				$selected = $default;
				$selected = $default == $key ? 'selected' : '';
				$option_arr .= "<option value='{$key}' {$selected}>{$val}</option>";
			}

			return $option_arr;
		}
		elseif($return == 'li'){
			$li_arr = '';
			foreach($arr as $key=>$val){
				$li_arr .= "<li>{$val}</li>";
			}

			return $li_arr;
		}
	}
	
	/**
	 * Gets result_array() except this deals with only the first element of each array.
	 * This gets the value of that first element and saves them in an array.
	 * This works on indexed and assoc arrays.
	 *
	 * @param array $result_array: The result of $query->result_array()
	 */
	function multi_to_single($result_array){
		$keys = array_keys($result_array[0]);
		foreach($result_array as $val){
			$arr[] = $val[$keys[0]];
		}
		
		return $arr;
	}
	
	/**
	 * Check if user has permission to do an action
	 *
	 * @param string $permission: The permission you want to check for from the `permissions.permission` table.
	 * @return bool
	 */
	public function permit($permission){
		$user_id = $this->ci->session->userdata('user_id');
		$user_permissions = $this->ci->users->get_permissions($user_id);
		$overrides = $this->ci->users->get_permission_overrides($user_id);
		$allow = FALSE;
		
		// Check role permissions
		foreach($user_permissions as $val){
			if($val == $permission){
				$allow = TRUE;
				break;
			}
		}
		
		// Check if there are overrides and overturn the result as needed
		if($overrides){
			foreach($overrides as $val){
				if($val['permission'] == $permission){
					$allow = (bool)$val['allow'];
					break;
				}
			}
		}
		
		return $allow;
	}
	
	/**
	 * Get a user's roles
	 *
	 * @param int $user_id
	 * @return array
	 */
	public function get_roles($user_id = NULL){
		$user_id = is_null($user_id) ? $this->ci->session->userdata('user_id') : $user_id;
		return $this->ci->users->get_roles($user_id);
	}
	
	/**
	 * Overriding permissions method
	 */
	public function add_override($user_id, $permission, $allow = 1){
		return $this->ci->users->add_override($user_id, $permission, $allow);
	}
	public function remove_override($user_id, $permission){
		return $this->ci->users->remove_override($user_id, $permission);
	}
	public function flip_override($user_id, $permission){
		return $this->ci->users->flip_override($user_id, $permission);
	}
	
	/**
	 * Role management methods
	 */
	public function add_role($user_id, $role){
		return $this->ci->users->add_role($user_id, $role);
	}
	public function remove_role($user_id, $role){
		return $this->ci->users->remove_role($user_id, $role);
	}
	public function change_role($user_id, $old, $new){
		return $this->ci->users->change_role($user_id, $old, $new);
	}
	public function role_exists($role){
		return $this->ci->users->role_exists($role);
	}
	public function has_role($user_id, $role){
		return $this->ci->users->has_role($user_id, $role);
	}
	
	/**
	 * Permission management methods
	 */
	/*public function get_permissions($user_id){
		return $this->ci->users->get_permissions($user_id);
	}*/
	public function get_permissions_by_role($role_id){
		return $this->ci->users->get_permissions_by_role($role_id);
	}
	public function add_permission($permission, $role){
		return $this->ci->users->add_permission($permission, $role);
	}
	public function remove_permission($permission, $role){
		return $this->ci->users->remove_permission($permission, $role);
	}
	public function new_permission($permission, $description){
		return $this->ci->users->new_permission($permission, $description);
	}
	public function clear_permission($permission){
		return $this->ci->users->clear_permission($permission);
	}
	public function save_permission($permission_ident, $permission = FALSE, $description = FALSE, $parent = FALSE, $sort = FALSE){
		$data = array(
			'permission_ident'=>$permission_ident,
			'permission'=>$permission,
			'description'=>$description,
			'parent'=>$parent,
			'sort'=>$sort
		);
		
		return $this->ci->users->save_permission($data);
	}
	
	/**
	 * Get user profile contents
	 */
	public function get_user_profile($user_id = NULL){
		$user_id = is_null($user_id) ? $this->session->userdata('user_id') : $user_id;
		return $this->ci->users->get_user_profile($user_id);
	}
	
	/**
	 * Account approval methods
	 */
	public function is_approved($user_id = NULL){
		$user_id = is_null($user_id) ? $this->ci->session->userdata('user_id') : $user_id;
		return $this->ci->users->is_approved($user_id);
	}
	public function approve_user($user_id){
		return $this->ci->users->approve_user($user_id);
	}
	public function unapprove_user($user_id){
		return $this->ci->users->unapprove_user($user_id);
	}
	
	/**
	 * Open a notice page
	 */
	public function notice($page, $data = FALSE){
		// Create a new session if the old one gets deleted (from logout)
		if(!$this->ci->session->userdata('user_id')){
			$this->ci->session->sess_create();
			$this->ci->session->set_flashdata('is_logged_out', TRUE);
		}

		$this->ci->session->set_flashdata('tankauth_allow_notice', TRUE);
		$this->ci->session->set_flashdata('tankauth_notice_data', $data);
		redirect('/welcome/notice/'.$page);
	}
	
	/**
	 * Gets values from the db for use in a dropdown field for new registrations
	 * @param array $fields 2 column names which will form the <select> key=>value pair
	 * @param string $where Create a more detailed query for example: "WHERE a=b LIMIT 10" It's up to you.
	 * @return multi array|option|li (default: array)
	 */
	public function create_regdb_dropdown($dbname, $fields){
		return $this->ci->users->create_regdb_dropdown($dbname, $fields);
	}


	/**
	 * Generate a random string based on kernel's random number generator
	 * @return string
	 */
	public function generate_random_key(){
    if ( function_exists('openssl_random_pseudo_bytes') ){
      $key = md5(openssl_random_pseudo_bytes(1024, $cstrong) . microtime() . mt_rand() );
    }
    else {
    	$randomizer = file_exists('/dev/urandom') ? '/dev/urandom' : '/dev/random';
	    $key = md5(file_get_contents($randomizer, NULL, NULL, 0, 1024) . microtime() . mt_rand());
    }

    return $key;
	}


	/**
	 * 提示未授权
	 */
	public function no_access($page, $data = FALSE){

		$this->ci->session->set_flashdata('tankauth_allow_notice', TRUE);
		$this->ci->session->set_flashdata('tankauth_notice_data', $data);
		redirect('/welcome/notice/'.$page);
	}
}

/* End of file Tank_auth.php */
/* Location: ./application/libraries/Tank_auth.php */
