<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Project extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('project_m');
    }

    public function edit($id = NULL){
        if($id){
            $this->data['project'] = $this->project_m->get($id);
            count($this->data['project']) || $this->data['errors'] = '未找到数据';
        }else{
            $this->data['project'] = $this->project_m->get_new();
        }

        $rules = $this->project_m->rules;
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            $data = $this->project_m->array_from_post(
                array(
                    'name',
                    ));

            //We can store data info
            if($this->project_m->save($data, $id)){
                redirect('admin/dashboard');
            }else{
                $this->session->set_flashdata('saveError', '保存失败！');
                $data = $id == NULL ? 'admin/project/edit' : 'admin/project/edit/'.$id;
                redirect($data, 'refresh');
            }
        }

        $this->data['subview'] = 'admin/project/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete($id){
        if($this->input->is_ajax_request()){
            if($this->project_m->delete($id)){
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
}