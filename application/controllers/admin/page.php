<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('page_m');
    }

    public function index(){
        $this->data['pages'] = $this->page_m->get_pages_with_parent();
        $this->data['subview'] = 'admin/page/index';

        $this->load->view('admin/_layout_main', $this->data);
    }

    public function order(){
        $this->data['sortable'] = TRUE;
        $this->data['subview'] = 'admin/page/order';

        $this->load->view('admin/_layout_main', $this->data);
    }

    public function order_ajax(){
        // Save from ajax post 
        if(isset($_POST['sortable'])){
            $this->page_m->save_order($_POST['sortable']);
        }

        $this->data['pages'] = $this->page_m->get();
        // $this->data['pages'] = $this->page_m->get_nested();

        $this->load->view('admin/page/order_ajax', $this->data);
    }

    public function edit($id = NULL){
        if($id){
            $this->data['page'] = $this->page_m->get($id);
            count($this->data['page']) || $this->data['errors'] = 'page can not be found.';
        }else{
            $this->data['page'] = $this->page_m->get_new();
        }

        // Pages for dropdown
        $this->data['pages_no_parent'] = $this->page_m->get_pages_no_parent();

        // Templates for dropdown
        $this->data['templates'] = array(
            'page' => 'page', 
            'news_archive' => 'News archive',
            'homepage' => 'homepage'
        );

        $rules = $this->page_m->rules;
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            $data = $this->page_m->array_from_post(array('title', 'slug', 'body', 'parent_id', 'template'));

            //We can store page info
            if($this->page_m->save($data, $id)){
                redirect('admin/page');
            }else{
                $this->session->set_flashdata('saveError', 'Save failed.');
                $page = $id == NULL ? 'admin/page/edit' : 'admin/page/edit/'.$id;
                redirect($page, 'refresh');
            }
        }

        $this->data['subview'] = 'admin/page/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function _unique_slug($str){
        $id = $this->uri->segment(4);
        $this->db->where('slug', $this->input->post('slug'));
        !$id || $this->db->where('id != ', $id);
        $page = $this->page_m->get();

        if(count($page)){
            $this->form_validation->set_message('_unique_slug', '%s should be unique');
            return FALSE;
        }
        return TRUE;
    }

    public function delete($id){
        if($this->input->is_ajax_request()){
            if($this->page_m->delete($id)){
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
