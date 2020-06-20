<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_mod extends CI_Model {

	public function __construct(){
	  	parent::__construct();
 	}

 	function user_list($where = null){
		if(isset($where)){
			$this->db->where($where);
		}
		$query = $this->db->get('tbl_admin');
		return $query->result_array();
	}

	public function user_new($data){
		$this->db->insert('tbl_admin', $data);
	}

	public function user_update($data, $where){
		$this->db->where($where);
		$this->db->update('tbl_admin',$data);
	}

	public function user_delete($where){
		$this->db->where($where);
		$this->db->delete('tbl_admin');
	}

	function user_import($data) {
		$this->db->insert_batch('tbl_admin', $data);
	}
}