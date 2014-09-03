<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page_m extends MY_Model {
    
    protected $_table_name = 'pages';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'parent_id, order';
    public $rules = array(
        'parent' => array(
            'field' => 'parent',
            'label' => 'Parent',
            'rules' => 'trim|intval'
        ),
    	'template' => array(
            'field' => 'template',
            'label' => 'Template',
            'rules' => 'trim|required'
        ),
    	'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|xss_clean'
        ),
        'slug' => array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|required|xss_clean|url_title|callback__unique_slug|max_length[100]'
        ),
        'body' => array(
            'field' => 'body',
            'label' => 'Body',
            'rules' => 'trim|required|xss_clean'
        )
    );
    protected $_timestamp = FALSE;

    public function get_new(){
        $page = new stdClass();
        $page->title = '';
        $page->slug = '';
        $page->body = '';
        $page->parent_id = 0;
        $page->template = 'page';

        return $page;
    }

    public function delete($id){

    	$this->db->where('parent_id', $id)->set('parent_id', 0)->update($this->_table_name);

    	return parent::delete($id);
    }

    public function get_pages_with_parent($id = NULL, $single = FALSE){
    	$this->db->select('pages.*, p.slug as parent_slug, p.title as parent_title');
    	$this->db->join('pages as p', 'pages.parent_id=p.id', 'left');

    	return parent::get($id, $single);
    }
    public function get_pages_no_parent(){
    	$this->db->select('id, title');
    	$this->db->where('parent_id', 0);
    	$pages = parent::get();

    	$arr = array(0 => 'No parent');
    	if(count($pages)){
    		foreach ($pages as $page) {
    			$arr[$page->id] = $page->title;
    		}
    	}

    	return $arr;
    }

    // We can also use this function to create order elements 
    public function get_nested(){
        $this->db->order_by($this->_order_by);
        $pages = $this->db->get('pages')->result_array();

        $arr = array();
        foreach ($pages as $page) {
            if(!$page['parent_id']){
                $arr[$page['id']] = $page;
            }else{
                $arr[$page['parent_id']]['children'][] = $page;
            }
        }

        return $arr;
    }

    public function save_order($pages){
        if(count($pages)){
            foreach ($pages as $order => $page) {
                if($page['item_id'] != ''){
                    $this->db->set(array('parent_id' => (int)$page['parent_id'], 'order' => $order))->where($this->_primary_key, $page['item_id'])->update($this->_table_name);
                }
            }
        }
    }

}
