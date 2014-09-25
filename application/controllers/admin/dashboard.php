<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('data_m');
    }

    public function index() {
        $this->data['datas'] = $this->data_m->get();
    	$this->data['subview'] = 'admin/data/index.php';

        $this->load->view('admin/_layout_main', $this->data);
    }

    public function modal() {
        $this->load->view('admin/_layout_modal', $this->data);
    }
}
