<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->sidebar = 'home/sidebar';
	}

	public function index(){
		$data['subview'] 			= 'home/index';
		$data['meta_title'] 	= 'Home';
		$data['navigation'] 	= array(
			array('text' => 'Home', 'link' => '#'), 
			array('text' => 'Dashboard', 'link' => '#'),
		);
		$data['sidebar'] 	= $this->sidebar;
		$this->load->view('index', $data);
	}
}
