<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();

        // Load stuff
		$this->load->model('page_m');
		$this->load->model('article_m');
		
		// Fetch navigation
		$this->data['menus'] = $this->page_m->get_nested();
		// $this->data['news_archive_link'] = $this->page_m->get_archive_link();
		$this->data['meta_title'] = config_item('site_name');
		$this->data['recent_news'] = $this->article_m->get_recent();
    }
}
