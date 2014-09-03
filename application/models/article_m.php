<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class article_m extends MY_Model {
    
    protected $_table_name = 'articles';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'pubdate desc, id desc';
    protected $_timestamp = TRUE;
    public $rules = array(
    	'pubdate' => array(
            'field' => 'pubdate',
            'label' => 'Publish date',
            'rules' => 'trim|required|exact_length[10]|xss_clean'
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

    public function get_new(){
        $article = new stdClass();
        $article->title = '';
        $article->slug = '';
        $article->body = '';
        $article->pubdate = date('Y-m-d');

        return $article;
    }

    public function set_published(){
        // Just for making our codes DRY(Don't repeat yourself)
        $this->db->where('pubdate <= ', date('Y-m-d'));
    }

    public function get_recent($limit = 3){
        $this->set_published();
        $this->db->limit($limit);
        return parent::get();
    }

}
