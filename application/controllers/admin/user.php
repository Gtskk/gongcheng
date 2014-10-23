<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->data['users'] = $this->user_m->get();
        $this->data['subview'] = 'admin/user/index';

        $this->load->view('admin/_layout_main', $this->data);
    }

    public function edit($id = NULL){
        if($id){
            $this->data['user'] = $this->user_m->get($id);
            count($this->data['user']) || $this->data['errors'] = 'User can not be found.';
        }else{
            $this->data['user'] = $this->user_m->get_new();
        }


        $rules = $this->user_m->rules_admin;
        $id || $rules['password']['rules'] .= '|required';
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            $this->data = $this->user_m->array_from_post(array('name', 'display_name', 'email', 'phone', 'password'));

            if($id && !$this->data['password']){
                unset($this->data['password']);
            }else{
                $this->data['password'] = $this->user_m->hash($this->data['password']);
            }

            //We can store user info
            if($this->user_m->save($this->data, $id)){
                redirect('admin/user');
            }else{
                $this->session->set_flashdata('saveError', 'Save failed.');
                $page = $id == NULL ? 'admin/user/edit' : 'admin/user/edit/'.$id;
                redirect($page, 'refresh');
            }
        }

        $this->data['subview'] = 'admin/user/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function login() {
        if ($this->tank_auth->is_logged_in()) {                                 // logged in
            redirect($this->config->item('login-success', 'tank_auth'));

        } elseif ($this->tank_auth->is_logged_in(FALSE)) {                      // logged in, not activated
            redirect('auth/send_again');

        } else {
            $this->data['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND
                    $this->config->item('use_username', 'tank_auth'));
            $this->data['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');

            $this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

            // Get login for counting attempts to login
            if ($this->config->item('login_count_attempts', 'tank_auth') AND
                    ($login = $this->input->post('login'))) {
                $login = $this->security->xss_clean($login);
            } else {
                $login = '';
            }

            $this->data['use_recaptcha'] = $this->config->item('use_recaptcha', 'tank_auth');
            if ($this->tank_auth->is_max_login_attempts_exceeded($login)) {
                if ($this->data['use_recaptcha'])
                    $this->form_validation->set_rules('capt', '验证码', 'trim|xss_clean|required|callback__check_recaptcha');
                else
                    $this->form_validation->set_rules('captcha', '验证码', 'trim|xss_clean|required|callback__check_captcha');
            }
            $this->data['errors'] = array();

            if ($this->form_validation->run()) {                                // validation ok
                if ($this->tank_auth->login(
                        $this->form_validation->set_value('login'),
                        $this->form_validation->set_value('password'),
                        $this->form_validation->set_value('remember'),
                        $this->data['login_by_username'],
                        $this->data['login_by_email'])) {                             // success
                    
                    // Approved or not
                    if($this->tank_auth->is_approved()){
                        redirect($this->config->item('login-success', 'tank_auth'));
                    }
                    else {
                        $this->tank_auth->logout();
                        $this->tank_auth->notice('acct-unapproved');
                    }

                } else {
                    $errors = $this->tank_auth->get_error_message();
                    if (isset($errors['banned'])) {                             // banned user
                        $this->tank_auth->notice('user-banned');

                    } elseif (isset($errors['not_activated'])) {                // not activated user
                        redirect('auth/send_again');

                    } else {                                                    // fail
                        foreach ($errors as $k => $v)   $this->data['errors'][$k] = $this->lang->line($v);
                    }
                }
            }
            /*if ($this->tank_auth->is_max_login_attempts_exceeded($login)) {
                $this->data['show_captcha'] = TRUE;
                if ($this->data['use_recaptcha']) {
                    $this->data['recaptcha_html'] = $this->_create_recaptcha();
                } else {
                    $this->data['captcha_html'] = $this->_create_captcha();
                }
            }*/
            $this->data['show_captcha'] = TRUE;

            $this->data['subview'] = 'admin/user/login';
            $this->load->view('admin/_layout_modal', $this->data);
        }

    	/*//Redirect the user to dashboard when user is logged in.
    	$dashboard = 'admin/data';
    	$this->user_m->loggedin() == FALSE || redirect($dashboard);

    	$rules = $this->user_m->rules;
        // 登录时去除name的验证
        unset($rules['username']);
        // 添加验证码是否为空的验证
        $rules['capt'] = array(
            'field' => 'capt',
            'label' => '验证码',
            'rules' => 'trim|required'
            );
    	$this->form_validation->set_rules($rules);
    	if($this->form_validation->run() == TRUE){
            // 首先删除旧的验证码
            // $expiration = time()-60; // 60秒限制
            // $this->db->query("DELETE FROM gts_captcha WHERE captcha_time < ".$expiration); 

            // // 然后再看是否有验证码存在:
            // $sql = "SELECT COUNT(*) AS count FROM gts_captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
            // $binds = array($_POST['capt'], $this->input->ip_address(), $expiration);
            // $query = $this->db->query($sql, $binds);
            // $row = $query->row();
            if($_POST['capt'] != $this->session->userdata('verify_code')){
                $this->session->set_flashdata('error', '验证码错误');
                redirect('admin/user/login', 'refresh');
            }

            // We can login and redirect
            if($this->user_m->login() == TRUE){
                redirect($dashboard);
            }else{
                $this->session->set_flashdata('error', '用户名/邮箱与密码不匹配');
                redirect('admin/user/login', 'refresh');
            }
            // if ($row->count > 0){
                
            // }else{
            //     $this->session->set_flashdata('error', '验证码错误');
            //     redirect('admin/user/login', 'refresh');
            // }

    	}
    	$this->data['subview'] = 'admin/user/login';
        $this->load->view('admin/_layout_modal', $this->data);*/
    }

    public function logout(){
        $this->tank_auth->logout();
        $redirect = $this->config->item('logout-success', 'tank_auth');
        
        if($redirect === FALSE){
            $this->tank_auth->notice('logout-success');
        }
        else {
            redirect($redirect);
        }
    	/*$this->user_m->logout();
        redirect('admin/user/login');*/
    }

    public function _unique_email($str){
        $id = $this->uri->segment(4);
        $this->db->where('email', $this->input->post('email'));
        !$id || $this->db->where('id != ', $id);
        $user = $this->user_m->get();

        if(count($user)){
            $this->form_validation->set_message('_unique_email', '%s should be unique');
            return FALSE;
        }
        return TRUE;
    }

    public function delete($id){
        if($this->input->is_ajax_request()){
            if($this->user_m->delete($id)){
                $status = 'ok';
            }else{
                $status = 'error';
            }

            $result['status'] = $status;
            die(json_encode($result));
        }else{
            die('不允许直接访问');
        }
    }

    function verify_image() { 
        $conf['name'] = 'verify_code'; //作为配置参数  
        $this->load->library('captcha_code', $conf);  
        $this->captcha_code->show();  
        $yzm_session = $this->session->userdata('verify_code');  
        echo $yzm_session;  
    }
}
