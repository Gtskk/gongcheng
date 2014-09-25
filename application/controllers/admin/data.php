<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Data extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('data_m');
    }

    public function index(){
        $this->data['datas'] = $this->data_m->get();
        $this->data['subview'] = 'admin/data/index';

        $this->load->view('admin/_layout_main', $this->data);
    }

    public function edit($id = NULL){
        if($id){
            $this->data['data'] = $this->data_m->get($id);
            count($this->data['data']) || $this->data['errors'] = '未找到数据';
        }else{
            $this->data['data'] = $this->data_m->get_new();
        }

        $rules = $this->data_m->rules;
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            $data = $this->data_m->array_from_post(
                array(
                    'mac_id', 
                    'type', 
                    'radius', 
                    'top_ref',
                    'length',
                    'quanjin_length',
                    'ruyan_depth',
                    'predict_ruyan',
                    'shiji_ruyan',
                    'kaizhuan_time',
                    'chengzhuang_time',
                    'hutong_heightRef',
                    'jitai_heightRef',
                    'zhuzhuangan',
                    'fuzhuangan',
                    'zhuantou',
                    'zhujinguige',
                    'hanjie_length',
                    'jiajinguguige',
                    'jiamigujinguige',
                    'jiami_length',
                    'feimigujinguige',
                    'maoguchang',
                    'zongkongshendu',
                    'yuci',
                    'diaojinhutong',
                    'hangmianjitai',
                    'dajielongchang',
                    'quanjinlongchang',
                    'dilong',
                    'quanjindilong',
                    'hangqiangdu',
                    'hangchaoguanliang',
                    'hanglilunliang',
                    'extra',
                    'x_axis',
                    'y_axis',
                    ));

            //We can store data info
            if($this->data_m->save($data, $id)){
                redirect('admin/data');
            }else{
                $this->session->set_flashdata('saveError', '保存失败！');
                $data = $id == NULL ? 'admin/data/edit' : 'admin/data/edit/'.$id;
                redirect($data, 'refresh');
            }
        }

        $this->data['subview'] = 'admin/data/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete($id){
        if($this->input->is_ajax_request()){
            if($this->data_m->delete($id)){
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