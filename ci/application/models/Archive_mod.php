<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Archive_mod extends CI_Model {

	public function __construct(){
	  	parent::__construct();
 	}

 	function archive_list($where = null){
		if(isset($where)){
			$this->db->where($where);
		}
		$query = $this->db->get('tbl_dokumen');
		return $query->result_array();
	}

	public function archive_new($data){
		$this->db->insert('tbl_dokumen', $data);
	}

	public function archive_update($data, $where){
		$this->db->where($where);
		$this->db->update('tbl_dokumen',$data);
	}

	public function archive_delete($where){
		$this->db->where($where);
		$this->db->delete('tbl_dokumen');
	}

	function archive_import($data) {
		$this->db->insert_batch('tbl_dokumen', $data);
	}
}