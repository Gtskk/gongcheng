<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class jianliRecord_m extends MY_Model {
    
    protected $_table_name = 'jianliRecords';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id desc';
    protected $_timestamp = FALSE;
    public $rules = array(
        'huningtuliang' => array(
            'field' => 'huningtuliang',
            'label' => '混凝土量',
            'rules' => 'trim|required|numeric'
        ),
        'pangzhanbuwei' => array(
            'field' => 'pangzhanbuwei',
            'label' => '旁站部位',
            'rules' => 'trim|required|xss_clean'
        ),
        'tanluodu' => array(
            'field' => 'tanluodu',
            'label' => '坍落度',
            'rules' => 'trim|required|numeric'
        ),
    );

    public function get_new(){
        $data = new stdClass();
        $data->time = date('Y-m-d');
        $data->daoguanlikongdishendu = 0;
        $data->baguanqiandaoguanmaishen = 0;
        $data->baguanmeijiechangdu = 0;
        $data->baguanjieshu = 0;
        $data->baguanchangdu = 0;
        $data->baguanhoudaoguanmaishen = 0;

        return $data;
    }

    public function saveJianli($data, $id = NULL){
        if($this->_timestamp){
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }

        //Insert
        if($id == NULL){
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;//不理解
            if($this->db->insert_batch($this->_table_name, $data)){
                return $this->db->insert_id();
            }else{
                return FALSE;
            }
        }else{
        //Update
            $filter = $this->_primary_filter;
            $id = $filter($id);
            // $this->db->where($this->_primary_key, $id);
            $this->db->update_batch($this->_table_name, $data, 'id');
            return $id;
        }
    }

    public function array_from_post_spec($const, $fields){
        $data = array();
        foreach ($fields as $field) {
            $fieldVal = $this->input->post($field);
            if($fieldVal){
                $field = preg_replace('/(\d+)$/', '', $field);
                $data[$field] = $fieldVal;
            }
        }
        if(!empty($data)){
            $data[$const] = $this->input->post($const);
        }

        return $data;
    }

}