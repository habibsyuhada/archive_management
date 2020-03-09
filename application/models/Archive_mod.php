<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Archive_mod extends CI_Model {

	public function __construct(){
	  	parent::__construct();
 	}

 	function archive_list($id = null, $where = null, $where_in = null){
		if(isset($where)){
			$this->db->where($where);
		}
		elseif(isset($id)){
			$this->db->where('d.id', $id);
		}
		$this->db->select('d.*, jd.nama_dok');
		$this->db->join('tbl_jenis_dokumen jd', 'jd.id = d.jenis_dokumen', 'left outer');
		$query = $this->db->get('tbl_dokumen d');
		return $query->result_array();
	}
}