<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->sidebar = 'home/sidebar';
		$this->load->model('user_mod');
	}

	public function index(){
		redirect('user/user_list');
	}

	public function user_list(){
		$user_list 	= $this->user_mod->user_list();

		$data['subview'] 			= 'user/user_list';
		$data['meta_title'] 	= 'User List';
		$data['navigation'] 	= array(
			array('text' => 'User', 'link' => '#'), 
			array('text' => 'User List', 'link' => '#'),
		);
		$data['sidebar'] 	= $this->sidebar;
		$this->load->view('index', $data);
	}

	public function user_add(){
		$data['subview'] 			= 'user/user_add';
		$data['meta_title'] 	= 'Add New User';
		$data['navigation'] 	= array(
			array('text' => 'User', 'link' => '#'), 
			array('text' => 'User List', 'link' => '#'),
			array('text' => 'Add New User', 'link' => '#'),
		);
		$data['sidebar'] 	= $this->sidebar;
		$this->load->view('index', $data);
	}
}
