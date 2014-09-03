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
            $data = $this->user_m->array_from_post(array('name', 'display_name', 'email', 'phone', 'password'));

            if($id && !$data['password']){
                unset($data['password']);
            }else{
                $data['password'] = $this->user_m->hash($data['password']);
            }

            //We can store user info
            if($this->user_m->save($data, $id)){
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
        // 加载验证码辅助函数
        /*$this->load->helper('captcha');
        $captcha = create_captcha(array(
            'word' => rand(1000, 10000),
            'img_path' => './captcha/',
            'img_url' => base_url().'captcha/',
            'img_width' => '48',
            'img_height' => '20',
            'expiration' => 60
            ));
        $this->data['captcha'] = $captcha;
        $dat = array(
            'captcha_time' => $captcha['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $captcha['word']
            );

        $query = $this->db->insert_string('captcha', $dat);
        $this->db->query($query);*/

    	//Redirect the user to dashboard when user is logged in.
    	$dashboard = 'admin/data';
    	$this->user_m->loggedin() == FALSE || redirect($dashboard);

    	$rules = $this->user_m->rules;
        // 登录时去除name的验证
        unset($rules['name']);
        // 添加验证码是否为空的验证
        $rules['capt'] = array(
            'field' => 'capt',
            'label' => 'Captcha',
            'rules' => 'trim|required'
            );
    	$this->form_validation->set_rules($rules);
    	if($this->form_validation->run() == TRUE){
            /*// 首先删除旧的验证码
            $expiration = time()-60; // 60秒限制
            $this->db->query("DELETE FROM gts_captcha WHERE captcha_time < ".$expiration); 

            // 然后再看是否有验证码存在:
            $sql = "SELECT COUNT(*) AS count FROM gts_captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
            $binds = array($_POST['capt'], $this->input->ip_address(), $expiration);
            $query = $this->db->query($sql, $binds);
            $row = $query->row();*/
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
            /*if ($row->count > 0){
                
            }else{
                $this->session->set_flashdata('error', '验证码错误');
                redirect('admin/user/login', 'refresh');
            }*/

    	}
    	$this->data['subview'] = 'admin/user/login';
        $this->load->view('admin/_layout_modal', $this->data);
    }

    public function logout(){
    	$this->user_m->logout();
        redirect('admin/user/login');
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
