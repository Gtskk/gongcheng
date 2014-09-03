<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page extends Frontend_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['page'] = $this->page_m->get(array('slug' => $this->uri->segment(1)), TRUE);
        count($this->data['page']) || show_404(current_url());

        $method = '_'.$this->data['page']->template;
        if(method_exists($this, $method)){
            $this->$method();
        }else{
             log_message('error', 'Could not load template '.$method.'in '.__FILE__.' on line '.__LINE__);
             show_error('Could not load template'.$method);
        }
        
        add_meta_title($this->data['page']->title);
        $this->data['subview'] = $this->data['page']->template;
        $this->load->view('_main_layout', $this->data);
    }

    private function _homepage(){
        $this->db->limit(6);
        $this->data['articles'] = $this->article_m->get();
    }

    private function _news_archive(){
        $this->article_m->set_published();
        $count = $this->db->count_all_results('articles');
        $perpage = 2;

        if($count > $perpage){
            // Create pagination
            $this->load->library('pagination');

            $config['base_url'] = site_url($this->uri->segment(1).'/');
            $config['total_rows'] = $count;
            $config['per_page'] = $perpage;
            $config['uri_segment'] = 2;
            $this->pagination->initialize($config); 

            $this->data['pagination'] = $this->pagination->create_links();
            $offset = $this->uri->segment(2);
        }else{
            $this->data['pagination'] = '';
            $offset = 0;
        }

        // Fetch articles
        $this->article_m->set_published();
        $this->db->limit($perpage, $offset);
        $this->data['articles'] = $this->article_m->get();
    }

    private function _page(){

    }

    public function search_ajax(){
        if($this->input->is_ajax_request()){
            $s = $this->input->post('s');
            $result = cms_search($s);
            $str = '<h3>Search results</h3>';

            if($result){
                $str .= article_links($result);
            }

            die($str);
        }else{
            die('不允许直接访问');
        }
    }
}
