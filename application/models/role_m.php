<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Role_M extends MY_Model {
    
    protected $_table_name = 'roles';
    protected $_primary_key = 'role_id';
    protected $_order_by = 'role_id ASC';
    public $rules = array(
        'role' => array(
            'field' => 'role',
            'label' => '角色名',
            'rules' => 'trim|required|xss_clean|max_length[12]|callback__unique_role'
        ),
        'full' => array(
            'field' => 'full',
            'label' => '角色全称',
            'rules' => 'trim|required|xss_clean'
        ),
    );
    protected $_timestamp = FALSE;

    public function get_new(){
        $role = new stdClass();
        $role->role = '';
        $role->full = '';
        $role->default = 0;

        return $role;

    }

}