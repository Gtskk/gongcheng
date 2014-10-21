<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_M extends MY_Model {
    
    protected $_table_name = 'users';
    protected $_order_by = 'username';
    public $rules = array(
        'username' => array(
            'field' => 'username',
            'label' => '姓名',
            'rules' => 'trim|required|xss_clean|max_length[12]'
        ),
        'email' => array(
            'field' => 'email',
            'label' => '邮箱',
            'rules' => 'trim|required|valid_email|xss_clean'
        ),
        'password' => array(
            'field' => 'password',
            'label' => '密码',
            'rules' => 'trim|required'
        )
    );
    public $rules_admin = array(
        'email' => array(
            'field' => 'email',
            'label' => '邮箱',
            'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
        ),
        'username' => array(
            'field' => 'username',
            'label' => '姓名',
            'rules' => 'trim|required|xss_clean'
        ),
        'password' => array(
            'field' => 'password',
            'label' => '密码',
            'rules' => 'trim|matches[password_confirmation]'
        ),
    	'password_confirmation' => array(
    		'field' => 'password_confirmation',
    		'label' => '确认密码',
    		'rules' => 'trim|matches[password]'
    	)
    );
    protected $_timestamp = FALSE;


    public function login(){
        $user = $this->get(array(
            'email' => $this->input->post('email'),
            'password' => $this->hash($this->input->post('password'))
        ), TRUE);
        $user || $user = $this->get(array(
            'username' => $this->input->post('username'),
            'password' => $this->hash($this->input->post('password'))
        ), TRUE);

        if(count($user)){
            // Log in user
            $data = array(
                'name' => $user->display_name,
                'email' => $user->email,
                'id' => $user->id,
                'loggedin' => TRUE
            );

            $this->session->set_userdata($data);
        }
    }

    public function logout(){
        $this->session->sess_destroy();
    }

    public function loggedin(){
        return (bool) $this->session->userdata('loggedin');
    }

    public function get_new(){
        $user = new stdClass();
        $user->username = '';
        $user->display_name = '';
        $user->email = '';
        $user->phone = '';
        $user->password = '';

        return $user;

    }

    public function hash($password){
        return hash('sha512', $password.config_item('encryption_key'));
    }

}
