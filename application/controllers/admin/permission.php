<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Permission extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('permission_m');
    }

    public function index(){
        $this->data['permissions'] = $this->permission_m->get();
        $this->data['subview'] = 'admin/permission/index';

        $this->load->view('admin/_layout_main', $this->data);
    }

    public function edit($id = NULL){
        if($id){
            $this->data['permission'] = $this->permission_m->get($id);
            count($this->data['permission']) || $this->data['errors'] = '权限未找到';
        }else{
            $this->data['permission'] = $this->permission_m->get_new();
        }

        $rules = $this->permission_m->rules;
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            $this->data = $this->permission_m->array_from_post(array('permission', 'description', 'parent'));
            $this->data['sort'] = (int)$this->input->get('sort');

            //We can store user info
            if($this->permission_m->save($this->data, $id)){
                redirect('admin/permission');
            }else{
                $this->session->set_flashdata('saveError', '保存失败.');
                $page = $id == NULL ? 'admin/permission/edit' : 'admin/permission/edit/'.$id;
                redirect($page, 'refresh');
            }
        }

        $this->data['subview'] = 'admin/permission/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete($id){
        if($this->input->is_ajax_request()){
            if($this->permission_m->delete($id)){
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
