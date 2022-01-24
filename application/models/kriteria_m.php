<?php
defined('BASEPATH') OR exit('No Direct script access allowed');

class Kriteria_M extends CI_model{

	public function get_kriteria(){
		$query = $this->db-> select("*")->from("kriteria")->order_by('no', 'DESC')->get();

		return $query->result();
	}

	public function simpan_kriteria($data){
		$query = $this->db->insert("kriteria", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function edit_kriteria($NO){
		$query = $this->db->where("no", $NO)
						  ->get("kriteria");

		if($query){
			return $query->row();
		}else{
			return false;
		}				  
	}

	public function update_kriteria($nama,$bobot,$tanggal,$user,$ID){
		$this->db->set("nama_kriteria",$nama);
		$this->db->set("bobot",$bobot);
		$this->db->set("tanggal_modif",$tanggal);
		$this->db->set("userid_modif",$user);
		$this->db->where("id",$ID);
		$this->db->update("kriteria");
	}

	public function hapus_kriteria($NO){
		$query = $this->db->delete("kriteria", $NO);

		if($query){
			return true;
		}else{
			return false;
		}
	}
}