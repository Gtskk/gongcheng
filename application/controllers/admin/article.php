<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Article extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('article_m');
    }

    public function index(){
        $this->data['articles'] = $this->article_m->get();
        $this->data['subview'] = 'admin/article/index';

        $this->load->view('admin/_layout_main', $this->data);
    }

    public function edit($id = NULL){
        if($id){
            $this->data['article'] = $this->article_m->get($id);
            count($this->data['article']) || $this->data['errors'] = 'Article can not be found.';
        }else{
            $this->data['article'] = $this->article_m->get_new();
        }

        $rules = $this->article_m->rules;
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            $data = $this->article_m->array_from_post(array('title', 'slug', 'body', 'pubdate'));

            //We can store article info
            if($this->article_m->save($data, $id)){
                redirect('admin/article');
            }else{
                $this->session->set_flashdata('saveError', 'Save failed.');
                $article = $id == NULL ? 'admin/article/edit' : 'admin/article/edit/'.$id;
                redirect($article, 'refresh');
            }
        }

        $this->data['subview'] = 'admin/article/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete($id){
        if($this->input->is_ajax_request()){
            if($this->article_m->delete($id)){
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
