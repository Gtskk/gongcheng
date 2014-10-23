<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->data['meta_title'] = '江苏建科建设监理有限公司';
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('user_m');

        $exception_uris = array('admin/user/login', 'admin/user/logout', 'admin/user/verify_image');
        if(in_array(uri_string(), $exception_uris) == FALSE){
            // 判断是否登录
        	if($this->tank_auth->is_logged_in() == FALSE){
        		redirect('admin/user/login');
        	}

            // 判断是否有权限访问
            $role_exceptions = array('admin', 'admin/migration');
            if(!in_array(uri_string(), $role_exceptions) && !$this->tank_auth->permit(strtolower($this->uri->segment(2)))){
                // redirect('landing/not-authorized');
                $this->tank_auth->no_access('not-authorized');
            }
        }

    }
}