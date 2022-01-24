<?php
defined('BASEPATH') OR exit('No Direct script access allowed');

class User_register extends CI_model{

public function simpan($data){
		$query = $this->db->insert("user", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

}