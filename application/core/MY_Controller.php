<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data = array();
    function __construct() {
        parent::__construct();
        $this->data['errors'] = '';
        $this->data['site_name'] = config_item('site_name');
        $this->data['site_author'] = config_item('site_author');
    }

}
