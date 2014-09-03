<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Article extends Frontend_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id, $slug) {
        $this->article_m->set_published();
        $this->data['article'] = $this->article_m->get($id);
        count($this->data['article']) || show_404(uri_string());

        $request_slug = $slug;
        $real_slug = $this->data['article']->slug;
        if($request_slug != $real_slug){
            redirect('article/'.$this->data['article']->id.'/'.$real_slug, 'location', '301');
        }

        add_meta_title($this->data['article']->title);
        $this->data['subview'] = 'article';
        $this->load->view('_main_layout', $this->data);
    }
}
