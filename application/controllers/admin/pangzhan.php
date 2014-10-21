<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pangzhan extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pangzhan_m');
        $this->load->model('jianlirecord_m');

        // 判断角色权限
        if(!$this->tank_auth->permit('pangzhan')){
            $this->tank_auth->notice('password-failed');
        }
    }

    public function index(){
        $this->data['datas'] = $this->pangzhan_m->get();
        $this->data['subview'] = 'admin/pangzhan/index';

        $this->load->view('admin/_layout_main', $this->data);
    }

    public function edit($id = NULL){
        if($id){
            $this->data['data'] = $this->pangzhan_m->get($id);
            $num = $this->data['data']->num;
            $this->data['jianli'] = $this->jianlirecord_m->get(array('num'=>$num));
            count($this->data['data']) || $this->data['errors'] = '未找到数据';
        }else{
            $this->data['data'] = $this->pangzhan_m->get_new();
        }

        $rules = $this->pangzhan_m->rules;
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            $data = $this->pangzhan_m->array_from_post(
                array(
                    'project_name', 
                    'num', 
                    'riqi', 
                    'qihou', 
                    'work_address',
                    'pangzhanbuwei',
                    'zhuangjing',
                    'pangzhanjianlikaishishijian',
                    'pangzhanjianlijieshushijian',
                    'sg_zjArrive',
                    'sg_shanggangzheng',
                    'sg_machineArrive',
                    'sg_materialCheck',
                    'sg_hunningtuDoc',
                    'sg_tiaojianReq',
                    'jl_shuangshejiqiangdu',
                    'jl_kongdibiaogao',
                    'jl_kongkoubiaogao',
                    'jl_shejishuanmianbiaogao',
                    'jl_daoguanchangdu',
                    'jl_lilunshuanshouguan',
                    'jl_lilunshuanliang',
                    'jl_shuanshikuai',
                    'jl_shuanmianbiaogao',
                    'jl_chongyingxishu',
                    'que_weifanqiangzhixing',
                    'que_yingxiangzhiliang',
                    'chuliyijiang',
                    'extra',
                    'shigongqiye',
                    'jianliqiye',
                    'xiangmujinglibu',
                    'xiangmujianlijigou',
                    'zhijianyuan',
                    'pangzhanjianli',
                    'zhijianyuanqianziriqi',
                    'jianliqianziriqi',
                    ));

            $jianliRecords = array();
            for($i = 1; $i <= 10; $i++){
                $tmp = $this->jianlirecord_m->array_from_post_spec('num',
                        array(
                            'id'.$i,
                            'time'.$i,
                            'huningtuliang'.$i,
                            'tanluodu'.$i,
                            'guanzhuGood'.$i,
                            'daoguanlikongdishendu'.$i,
                            'baguanqiandaoguanmaishen'.$i,
                            'baguanmeijiechangdu'.$i,
                            'baguanjieshu'.$i,
                            'baguanchangdu'.$i,
                            'baguanhoudaoguanmaishen'.$i,
                            'baguanGood'.$i,
                            ));
                if(!empty($tmp)){
                    $jianliRecords[] = $tmp;
                }
            }
            if((!empty($jianliRecords) && $this->jianlirecord_m->saveJianli($jianliRecords, $id)) || empty($jianliRecords)){
                $jianliSave = true;
            }else{
                $jianliSave = false;
            }

            //We can store data info
            if($this->pangzhan_m->save($data, $id) && $jianliSave){
                redirect('admin/pangzhan');
            }else{
                $this->session->set_flashdata('saveError', '保存失败！');
                $data = $id == NULL ? 'admin/pangzhan/edit' : 'admin/pangzhan/edit/'.$id;
                redirect($data, 'refresh');
            }
        }

        $this->data['subview'] = 'admin/pangzhan/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete($id){
        if($this->input->is_ajax_request()){
            $pangzhan = $this->pangzhan_m->get($id);
            $num = $pangzhan->num;
            $jianliRecords = $this->jianlirecord_m->get(array('num'=>$num));
            if((count($jianliRecords) && $this->jianlirecord_m->delete(array('num'=>$num))) || !count($jianliRecords)){
                $jianliDelete = true;
            }else{
                $jianliDelete = false;
            }

            if($this->pangzhan_m->delete($id) && $jianliDelete){
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