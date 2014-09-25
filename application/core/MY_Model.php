<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $rules = array();
    protected $_timestamp = FALSE;

    function __construct(){
    	parent::__construct();
    }

    /**
     * Retrieves record(s) from the database
     *
     * @param mixed $where Optional. Retrieves only the records matching given criteria, or all records if not given.
     *                      If associative array is given, it should fit field_name=>value pattern.
     *                      If string, value will be used to match against PRI_INDEX
     * @return mixed Single record if ID is given, or array of results
     */
    public function get($where = NULL, $single = FALSE) {
        
        if($where != NULL){
        	if(is_array($where)){
        		foreach ($where as $key => $value) {
        			$this->db->where($key, $value);
        		}
                if($single == TRUE){
                    $method = 'row';
                }else{
                    $method = 'result';
                }
        	}else{
        		$filter = $this->_primary_filter;
	        	$id = $filter($where);
	        	$this->db->where($this->_primary_key, $id);
	        	$method = 'row';
        	}
        }else{
        	$method = 'result';
        }

        if(!count($this->db->ar_orderby)){
        	$this->db->order_by($this->_order_by);
        }

        return $this->db->get($this->_table_name)->$method();

    }

    public function save($data, $id = NULL){

    	if($this->_timestamp){
    		$now = date('Y-m-d H:i:s');
    		$id || $data['created'] = $now;
    		$data['modified'] = $now;
    	}

    	//Insert
    	if($id == NULL){
    		!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;//不理解
    		$this->db->set($data);
    		if($this->db->insert($this->_table_name)){
	    		return $this->db->insert_id();
	    	}else{
	    		return FALSE;
	    	}
    	}else{
    	//Update
    		$filter = $this->_primary_filter;
    		$id = $filter($id);
    		$this->db->set($data);
    		$this->db->where($this->_primary_key, $id);
	        $this->db->update($this->_table_name, $data);
	        return $id;
    	}
    }

    public function array_from_post($fields){
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }

        return $data;
    }

    /**
     * Deletes specified record from the database
     *
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of rows affected by the delete query
     */
    public function delete($where = array()) {
        if (!is_array($where)) {
            $where = array($this->_primary_key => $where);
        }
        $this->db->delete($this->_table_name, $where);
        return $this->db->affected_rows();
    }
}