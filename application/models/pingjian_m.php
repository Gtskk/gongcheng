<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class pingjian_m extends MY_Model {
    
    protected $_table_name = 'pingjians';
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
        'shikuai' => array(
            'field' => 'shikuai',
            'label' => '试块',
            'rules' => 'trim|required|xss_clean',
        ),
        'kaikong_zhuangdingbiaogao' => array(
            'field' => 'kaikong_zhuangdingbiaogao',
            'label' => '桩顶标高',
            'rules' => 'trim|required|numeric'
        ),
        'kaikong_zhuangdibiaogao' => array(
            'field' => 'kaikong_zhuangdibiaogao',
            'label' => '桩底标高',
            'rules' => 'trim|required|numeric'
        ),
        'kaikong_hutongbiaogao' => array(
            'field' => 'kaikong_hutongbiaogao',
            'label' => '护筒标高',
            'rules' => 'trim|required|numeric'
        ),
        'kaikong_jitaibiaogao' => array(
            'field' => 'kaikong_jitaibiaogao',
            'label' => '机台标高',
            'rules' => 'trim|required|numeric'
        ),
        'kaikong_zhuantouchangdu' => array(
            'field' => 'kaikong_zhuantouchangdu',
            'label' => '钻头长度',
            'rules' => 'trim|required|numeric'
        ),
        'kaikong_shuipingduizhong' => array(
            'field' => 'kaikong_shuipingduizhong',
            'label' => '水平、对中',
            'rules' => 'trim|required|numeric'
        ),
    );

    public function get_new(){
        $data = new stdClass();
        $data->mac_id = 0;
        $data->id = 0;
        $data->type = '';
        $data->radius = '';
        $data->shikuai = '';
        $data->kaikong_zhuangdingbiaogao = '';
        $data->kaikong_zhuangdibiaogao = '';
        $data->kaikong_hutongbiaogao = '';
        $data->kaikong_jitaibiaogao = '';
        $data->kaikong_zhuantouchangdu = '';
        $data->kaikong_jianli = '';
        $data->kaikong_kaizhuanshijian = date('Y-m-d');
        $data->chengkong_zhuganchang = 0;
        $data->chengkong_zhuanjuzongchang = 0;
        $data->chengkong_jiyuci = 0;
        $data->chengkong_zongkongshendu = 0;
        $data->chengkong_yujiruyanbiaogao = 0;
        $data->chengkong_yiciqingkongnijiangbizhong = 0;
        $data->chengkong_shijiruyanbiaogao = 0;
        $data->chengkong_jianli = '';
        $data->gjgza_zhujinguige = '';
        $data->gjgza_jiaqiangjinguige = '';
        $data->gjgza_jiamiluoxuanjin = '';
        $data->gjgza_jiamichangdu = 0;
        $data->gjgza_feimiluoxuanjin = '';
        $data->gjgza_zhihutongdiaojin = 0;
        $data->gjgza_quanjinlongjieshu = 0;
        $data->gjgza_banquanjinlongchangdu = 0;
        $data->gjgza_dajiehoulongchangdu = 0;
        $data->gjgza_dilongchang = 0;
        $data->gjgza_leijizonglongshu = 0;
        $data->gjgza_jianli = '';
        $data->gjgza_jianliqianzi = 1;
        $data->ecqk_nijiangbizhong = 0;
        $data->ecqk_chenzha = 0;
        $data->ecqk_qingkonghoukongshen = 0;
        $data->ecqk_jianli = '';
        $data->shuanguanzhu_daoguanjukongdijuli = 0;
        $data->shuanguanzhu_shuanqiangdu = '';
        $data->shuanguanzhu_tanluodu = 0;
        $data->shuanguanzhu_shuanshijiliang = 0;
        $data->shuanguanzhu_shuanlilunliang = 0;
        $data->shuanguanzhu_chongyingxishu = 0;
        $data->shuanguanzhu_shuanmianduihutongjuli = 0;
        $data->shuanguanzhu_shuanmianduijitaijuli = 0;
        $data->shuanguanzhu_guanzhushijian = date('Y-m-d');
        $data->shuanguanzhu_jianli = '';
        $data->extra = '';

        return $data;
    }

}