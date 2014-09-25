<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class data_m extends MY_Model {
    
    protected $_table_name = 'datas';
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
        'type' => array(
            'field' => 'type',
            'label' => '桩型',
            'rules' => 'trim|required|xss_clean'
        ),
        'radius' => array(
            'field' => 'radius',
            'label' => '桩径',
            'rules' => 'trim|required|numeric'
        ),
        'top_ref' => array(
            'field' => 'top_ref',
            'label' => '桩顶标高',
            'rules' => 'trim|required|numeric'
        ),
    	'length' => array(
            'field' => 'length',
            'label' => '桩长',
            'rules' => 'trim|required|numeric'
        ),
        'quanjin_length' => array(
            'field' => 'quanjin_length',
            'label' => '全筋桩长',
            'rules' => 'trim|required|numeric'
        ),
        'ruyan_depth' => array(
            'field' => 'ruyan_depth',
            'label' => '桩顶标高',
            'rules' => 'trim|required|numeric'
        ),
        'x_axis' => array(
            'field' => 'x_axis',
            'label' => 'X轴坐标',
            'rules' => 'trim|required|numeric'
        ),
        'y_axis' => array(
            'field' => 'y_axis',
            'label' => 'Y轴坐标',
            'rules' => 'trim|required|numeric'
        ),
    );

    public function get_new(){
        $data = new stdClass();
        $data->type = 'ZZH4';
        $data->radius = 0.0;
        $data->top_ref = 0.0;
        $data->length = 0.0;
        $data->ruyan_depth = 0.0;
        $data->predict_ruyan = 0.0;
        $data->shiji_ruyan = 0.0;
        $data->quanjin_length = 0.0;
        $data->kaizhuan_time = date('Y-m-d');
        $data->chengzhuang_time = date('Y-m-d');
        $data->hutong_heightRef = 0.0;
        $data->jitai_heightRef = 0.0;
        $data->zhuzhuangan = 0.0;
        $data->fuzhuangan = 0.0;
        $data->zhuantou = 0.0;
        $data->zhujinguige = 0.0;
        $data->hanjie_length = 0.0;
        $data->jiajinguguige = '';
        $data->jiamigujinguige = 0.0;
        $data->jiami_length = 0.0;
        $data->feimigujinguige = '';
        $data->maoguchang = 0.0;
        $data->zongkongshendu = 0.0;
        $data->yuci = 0.0;
        $data->diaojinhutong = 0.0;
        $data->hangmianjitai = 0.0;
        $data->dajielongchang = 0.0;
        $data->quanjinlongchang = 0.0;
        $data->dilong = 0.0;
        $data->quanjindilong = 0.0;
        $data->hangqiangdu = '';
        $data->hangchaoguanliang = 0.0;
        $data->hanglilunliang = 0.0;
        $data->extra = '';

        return $data;
    }

    /**
     * 已经开钻的
     */
    public function set_kaizhuaned(){
        // Just for making our codes DRY(Don't repeat yourself)
        $this->db->where('kaizhuan_time <= ', date('Y-m-d H:i:s'));
    }

    /**
     * 已经成桩的
     */
    public function set_chengzhuanged(){
        // Just for making our codes DRY(Don't repeat yourself)
        $this->db->where('chengzhuang_time <= ', date('Y-m-d H:i:s'));
    }

    public function get_recent_kaizhuan($limit = 3){
        $this->set_kaizhuaned();
        $this->db->limit($limit);
        return parent::get();
    }

}