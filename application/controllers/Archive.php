<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archive extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->sidebar = 'home/sidebar';
	}

	public function index(){
		redirect('archive/archive_list');
	}

	public function archive_list(){
		$data['subview'] 			= 'archive/archive_list';
		$data['meta_title'] 	= 'Archive List';
		$data['navigation'] 	= array(
			array('text' => 'Archive', 'link' => '#'), 
			array('text' => 'Archive List', 'link' => '#'),
		);
		$data['sidebar'] 	= $this->sidebar;
		$this->load->view('index', $data);
	}

	public function archive_add(){
		$data['subview'] 			= 'archive/archive_add';
		$data['meta_title'] 	= 'Add New Archive';
		$data['navigation'] 	= array(
			array('text' => 'Archive', 'link' => '#'), 
			array('text' => 'Archive List', 'link' => '#'),
			array('text' => 'Add New Archive', 'link' => '#'),
		);
		$data['sidebar'] 	= $this->sidebar;
		$this->load->view('index', $data);
	}

	public function archive_import(){
		$data['subview'] 			= 'archive/archive_import';
		$data['meta_title'] 	= 'Import Archive';
		$data['navigation'] 	= array(
			array('text' => 'Archive', 'link' => '#'), 
			array('text' => 'Archive List', 'link' => '#'),
			array('text' => 'Import Archive', 'link' => '#'),
		);
		$data['sidebar'] 	= $this->sidebar;
		$this->load->view('index', $data);
	}

	public function archive_report(){
		$data['subview'] 			= 'archive/archive_report';
		$data['meta_title'] 	= 'Report';
		$data['navigation'] 	= array(
			array('text' => 'Archive', 'link' => '#'),
			array('text' => 'Archive Report', 'link' => '#'),
		);
		$data['sidebar'] 	= $this->sidebar;
		$this->load->view('index', $data);
	}
}
