<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class project_m extends MY_Model {
    
    protected $_table_name = 'projects';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'created desc, id desc';
    protected $_timestamp = TRUE;
    public $rules = array(
        'name' => array(
            'field' => 'name',
            'label' => '项目名称',
            'rules' => 'trim|required|xss_clean'
        ),
    );

    public function get_new(){
        $project = new stdClass();
        $project->name = '';
        $project->background = '';

        return $project;
    }

}
