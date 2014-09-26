<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pingjian extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pingjian_m');
    }

    public function index(){
        $this->data['datas'] = $this->pingjian_m->get();
        $this->data['subview'] = 'admin/pingjian/index';

        $this->load->view('admin/_layout_main', $this->data);
    }

    public function edit($id = NULL){
        if($id){
            $this->data['data'] = $this->pingjian_m->get($id);
            count($this->data['data']) || $this->data['errors'] = '未找到数据';
        }else{
            $this->data['data'] = $this->pingjian_m->get_new();
        }

        $rules = $this->pingjian_m->rules;
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            $data = $this->pingjian_m->array_from_post(
                array(
                    'mac_id', 
                    'type', 
                    'radius', 
                    'shikuai',
                    'kaikong_zhuangdingbiaogao',
                    'kaikong_zhuangdibiaogao',
                    'kaikong_hutongbiaogao',
                    'kaikong_jitaibiaogao',
                    'kaikong_zhuantouchangdu',
                    'kaikong_shuipingduizhong',
                    'kaikong_kaizhuanshijian',
                    'kaikong_jianli',
                    'chengkong_zhuganchang',
                    'chengkong_zhuanjuzongchang',
                    'chengkong_jiyuci',
                    'chengkong_zongkongshendu',
                    'chengkong_yujiruyanbiaogao',
                    'chengkong_yiciqingkongnijiangbizhong',
                    'chengkong_shijiruyanbiaogao',
                    'chengkong_jianli',
                    'gjgza_zhujinguige',
                    'gjgza_jiaqiangjinguige',
                    'gjgza_jiamiluoxuanjin',
                    'gjgza_jiamichangdu',
                    'gjgza_feimiluoxuanjin',
                    'gjgza_zhihutongdiaojin',
                    'gjgza_quanjinlongjieshu',
                    'gjgza_banquanjinlongchangdu',
                    'gjgza_dajiehoulongchangdu',
                    'gjgza_dilongchang',
                    'gjgza_leijizonglongshu',
                    'gjgza_jianli',
                    'gjgza_jianliqianzi',
                    'ecqk_nijiangbizhong',
                    'ecqk_chenzha',
                    'ecqk_qingkonghoukongshen',
                    'ecqk_jianli',
                    'shuanguanzhu_daoguanjukongdijuli',
                    'shuanguanzhu_shuanqiangdu',
                    'shuanguanzhu_tanluodu',
                    'shuanguanzhu_shuanshijiliang',
                    'shuanguanzhu_shuanlilunliang',
                    'shuanguanzhu_chongyingxishu',
                    'shuanguanzhu_shuanmianduihutongjuli',
                    'shuanguanzhu_shuanmianduijitaijuli',
                    'shuanguanzhu_guanzhushijian',
                    'shuanguanzhu_jianli',
                    'extra',
                    ));

            //We can store data info
            if($this->pingjian_m->save($data, $id)){
                redirect('admin/pingjian');
            }else{
                $this->session->set_flashdata('saveError', '保存失败！');
                $data = $id == NULL ? 'admin/pingjian/edit' : 'admin/pingjian/edit/'.$id;
                redirect($data, 'refresh');
            }
        }

        $this->data['subview'] = 'admin/pingjian/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete($id){
        if($this->input->is_ajax_request()){
            if($this->pingjian_m->delete($id)){
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