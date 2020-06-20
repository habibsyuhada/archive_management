<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->sidebar = 'home/sidebar';
		$this->load->model('user_mod');
	}

	public function index(){
		if($this->session->userdata('username')){
			redirect('home/dashboard');
		}
		else{
			redirect('home/login');
		}
	}

	public function login(){
		$this->load->view('login');
	}

	public function login_process(){
		$data_post 					= $this->input->post();
		$where['username'] 	= $data_post['username'];
		$where['password'] 	= md5($data_post['password']);
		$user_list 	= $this->user_mod->user_list(NULL, $where);
		if(count($user_list) > 0){
			$data_user = $user_list[0];
			$session_user = array(
				"id" 				=> $data_user['id'],
				"username" 	=> $data_user['username'],
				"nup" 			=> $data_user['nup'],
				"name" 			=> $data_user['name'],
				"role" 			=> $data_user['role'],
			);
			$this->session->set_userdata($session_user);
			redirect('home');
		}
		else{
			$this->session->set_flashdata('error', "Username or Password is wrong!");
			redirect('home/login');
		}
	}

	public function dashboard(){
		$data['subview'] 			= 'home/index';
		$data['meta_title'] 	= 'Home';
		$data['navigation'] 	= array(
			array('text' => 'Home', 'link' => '#'), 
			array('text' => 'Dashboard', 'link' => '#'),
		);
		$data['sidebar'] 	= $this->sidebar;
		$this->load->view('index', $data);
	}

	public function get_data_weekly(){
		$date_last_week = date('Y-m-d', strtotime('-8 day'));
		for ($i=0; $i < 8; $i++) { 
			$date_tmp = date('Y-m-d', strtotime('-'.$i.' day'));
			$date[] 	= $date_tmp;
			// $d 				= new \DateTime($date_tmp);
			$d 				= new \DateTime($date_tmp);
			// $mst_tmp 	= $d->getTimestamp().substr($d->format('u'),0,3); // millisecond timestamp
			$mst_tmp 	=$d->getTimestamp().substr($d->format('u'),0,3); // millisecond timestamp
			$mts[] 		= $mst_tmp; // millisecond timestamp
		}

		foreach ($date as $key => $value) {
			$dokumen1[] = array($mts[$key]+3600000, rand(10,50));
			$dokumen2[] = array($mts[$key]+3600000, rand(10,50));
			$dokumen3[] = array($mts[$key]+3600000, rand(10,50));
		}

		$example[] = array(
			'name' => 'Nota Dinas',
			'data' => $dokumen1
		);

		$example[] = array(
			'name' => 'Surat Keluar',
			'data' => $dokumen2
		);

		$example[] = array(
			'name' => 'Momerandum',
			'data' => $dokumen3
		);

		$chart_all = $example;
		echo json_encode($chart_all);
	}
}
