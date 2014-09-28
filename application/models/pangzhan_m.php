<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class pangzhan_m extends MY_Model {
    
    protected $_table_name = 'pangzhans';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id desc';
    protected $_timestamp = FALSE;
    public $rules = array(
    	'mac_id' => array(
            'field' => 'mac_id',
            'label' => '机号',
            'rules' => 'trim|intval'
        ),
        'project_name' => array(
            'field' => 'project_name',
            'label' => '工程名称',
            'rules' => 'trim|required|xss_clean'
        ),
        'num' => array(
            'field' => 'num',
            'label' => '编号',
            'rules' => 'trim|required|numeric'
        ),
        'pangzhanbuwei' => array(
            'field' => 'pangzhanbuwei',
            'label' => '旁站部位',
            'rules' => 'trim|required|xss_clean'
        ),
        'zhuangjing' => array(
            'field' => 'zhuangjing',
            'label' => '桩径',
            'rules' => 'trim|required|numeric'
        ),
    );

    public function get_new(){
        $data = new stdClass();
        $data->project_name = '';
        $data->num = 0;
        $data->zhuangjing = 0;
        $data->pangzhanbuwei = '';
        $data->riqi = date('Y-m-d');
        $data->qihou = '';
        $data->work_address = '';
        $data->pangzhanjianlikaishishijian = date('Y-m-d');
        $data->pangzhanjianlijieshushijian = date('Y-m-d');
<<<<<<< HEAD
        $data->sg_zjArrive = 0;
        $data->sg_shanggangzheng = 0;
        $data->sg_machineArrive = 0;
        $data->sg_materialCheck = 0;
        $data->sg_hunningtuDoc = 0;
        $data->sg_tiaojianReq = 0;
=======
>>>>>>> b773af61847b02393069a87bb390821633719164
        $data->jl_shuangshejiqiangdu = '';
        $data->jl_lilunshuanshouguan = 0;
        $data->jl_kongdibiaogao = 0;
        $data->jl_lilunshuanliang = 0;
        $data->jl_kongkoubiaogao = 0;
        $data->jl_shuanshikuai = 0;
        $data->jl_shejishuanmianbiaogao = 0;
        $data->jl_shuanmianbiaogao = 0;
        $data->jl_daoguanchangdu = 0;
        $data->jl_chongyingxishu = 0;
<<<<<<< HEAD
        $data->que_weifanqiangzhixing = 0;
        $data->que_yingxiangzhiliang = 0;
=======
>>>>>>> b773af61847b02393069a87bb390821633719164
        $data->chuliyijiang = '';
        $data->extra = '';
        $data->shigongqiye = '';
        $data->jianliqiye = '';
        $data->xiangmujinglibu = '';
        $data->xiangmujianlijigou = '';
        $data->zhijianyuan = '';
        $data->pangzhanjianli = '';
        $data->zhijianyuanqianziriqi = date('Y-m-d');
        $data->jianliqianziriqi = date('Y-m-d');

        return $data;
    }

}