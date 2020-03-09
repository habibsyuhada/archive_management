<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_mod extends CI_Model {

	public function __construct(){
	  	parent::__construct();
 	}

 	function user_list($id = null, $where = null, $where_in = null){
		if(isset($where)){
			$this->db->where($where);
		}
		elseif(isset($id)){
			$this->db->where('id', $id);
		}
		$query = $this->db->get('tbl_admin');
		return $query->result_array();
	}
}