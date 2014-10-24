<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Permission_M extends MY_Model {
    
    protected $_table_name = 'permissions';
    protected $_primary_key = 'permission_id';
    protected $_order_by = 'sort DESC, permission_id ASC';
    public $rules = array(
        'permission' => array(
            'field' => 'permission',
            'label' => '权限名',
            'rules' => 'trim|required|xss_clean|max_length[12]'
        ),
        'description' => array(
            'field' => 'description',
            'label' => '描述',
            'rules' => 'trim|xss_clean'
        ),
    );
    protected $_timestamp = FALSE;

    public function get_new(){
        $permission = new stdClass();
        $permission->permission = '';
        $permission->description = '';
        $permission->sort = '';

        return $permission;

    }

}