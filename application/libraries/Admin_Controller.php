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

        // Login check
        $exception_uris = array('admin/user/login', 'admin/user/logout', 'admin/user/verify_image');

        if(in_array(uri_string(), $exception_uris) == FALSE){
        	if($this->user_m->loggedin() == FALSE){
        		redirect('admin/user/login');
        	}
        }
    }
}