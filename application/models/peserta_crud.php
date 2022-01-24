<?php
defined('BASEPATH') OR exit('No Direct script access allowed');

class Peserta_crud extends CI_model{

	public function get_all(){
		$query = $this->db->select("*")
					  	  ->from('admin')
					  	  ->order_by('id', 'DESC')
					  	  ->get();

		return $query->result();		
	}

	public function get_data($email){
		$query = $this->db->select("*")->from("anggota")->where("email",$email)->get();

		return $query->result();
	}

	public function get_max_no(){
	$query = $this->db-> select_max("no")->from("anggota")->order_by('no', 'DESC')->get();

	return $query->row()->no;
	}

	public function get_peserta(){
		$query = $this->db-> select("*")->from("anggota")->order_by('no', 'DESC')->get();

		return $query->result();	
	}

	public function get_fakultas(){
		$query = $this->db-> select("*")->from("fakultas")->order_by('no', 'ASC')->get();

		return $query->result();	
	}

	public function no_peserta_email($email){
		$this->db->where('email',$email);
		$query = $this->db->get("anggota");
		return $query->row()->no_peserta;	
	}

	public function check_pesan($no){
		$this->db->where('no_peserta',$no);
		$query = $this->db->get("pesan");
		return $query->result();	
	}

	public function check_daftar($no_peserta){
		$this->db->where('no_peserta',$no_peserta);
		$query = $this->db->get("anggota");
		return $query->row()->daftar;	
	}

	public function get_data_pendaftar_jabatan($no_peserta){
		$this->db->where('no_peserta',$no_peserta);
		$query = $this->db->get("pendaftar");
		return $query->row()->formasi_jabatan;	
	}

	public function get_nama_fakultas($nama){
		$this->db->where('nama_fakultas',$nama);
		$query = $this->db->get("fakultas");
		return $query->row()->nama_fakultas;	
	}

	public function get_kode_fakultas($nama){
		$this->db->where('nama_fakultas',$nama);
		$query = $this->db->get("fakultas");
		return $query->row()->kode_fakultas;	
	}

	public function get_pendaftar_fakultas($nama){
		$this->db->where('nama_fakultas',$nama);
		$query = $this->db->get("fakultas");
		return $query->row()->jumlah_pendaftar;	
	}
	
	public function get_data_pendaftar_fakultas($no_peserta){
		$this->db->where('no_peserta',$no_peserta);
		$query = $this->db->get("pendaftar");
		return $query->row()->nama_fakultas;	
	}
	
	public function get_jurusan(){
		$query = $this->db-> select("*")->from("jurusan")->order_by('no', 'ASC')->get();

		return $query->result();	
	}

	public function get_nama_jurusan($nama){
		$this->db->where('jurusan',$nama);
		$query = $this->db->get("jurusan");
		return $query->row()->jurusan;	
	}

	public function get_kode_jurusan($nama){
		$this->db->where('jurusan',$nama);
		$query = $this->db->get("jurusan");
		return $query->row()->kode_jurusan;	
	}
	
	public function get_pendaftar_jurusan($nama){
		$this->db->where('jurusan',$nama);
		$query = $this->db->get("jurusan");
		return $query->row()->jumlah_pendaftar;	
	}

	public function get_data_pendaftar_jurusan($no_peserta){
		$this->db->where('no_peserta',$no_peserta);
		$query = $this->db->get("pendaftar");
		return $query->row()->jurusan;	
	}

	public function get_list_jurusan($fakul){
		$this->db->where('nama_fakultas', $fakul);
        $result = $this->db->get("jurusan")->result(); // Tampilkan semua data kota berdasarkan id provinsi
        return $result; 	
	}

	public function get_kriteria(){
		$query = $this->db-> select("*")->from("kriteria")->order_by('no', 'ASC')->get();

		return $query->result();	
	}		

	public function get_nilai($no_peserta){
		$query = $this->db-> select("*")->from("nilai")->where("no_peserta",$no_peserta)->get();

		return $query->result();	
	}

	public function get_hasil($no_peserta){
		$query = $this->db-> select("*")->from("lulus")->where("no_peserta",$no_peserta)->get();
		$query2 = $this->db-> select("*")->from("gagal")->where("no_peserta",$no_peserta)->get();
		//return $query->result();
		if($query2->result() == null || $query2->result() == ""){
			//return true;
			return $query->result();
		}else{		
		//return false;
		return $query2->result();
		}
	}	

	public function get_peserta_id($NO){
		$this->db->where('no_peserta',$NO);
		$query = $this->db->get("identitas");
		return $query->result();	
	}

	public function get_peserta_berkas($NO){
		$this->db->where('no_peserta',$NO);
		$query = $this->db->get("berkas");
		return $query->result();	
	}

	public function get_no_berkas($NO){
		$this->db->where('no_berkas',$NO);
		$query = $this->db->get("berkas");
		return $query->result();	
	}

	public function get_path($NO){
		$this->db->where('no_peserta',$NO);
		$query = $this->db->get("anggota");
		return $query->row()->path;	
	}

	public function get_foto($NO){
		$this->db->where('no_peserta',$NO);
		$query = $this->db->get("anggota");
		return $query->row()->foto;	
	}

	public function get_berkas($NO){
		$this->db->where('no',$NO);
		$query = $this->db->get("berkas");
		return $query->result();	
	}

	public function get_berkas_path($NO){
		$this->db->where('no_berkas',$NO);
		$query = $this->db->get("berkas");
		return $query->row()->path;	
	}

	public function get_nama_berkas($NO){
		$this->db->where('no_berkas',$NO);
		$query = $this->db->get("berkas");
		return $query->row()->nama_berkas;	
	}

	public function get_path_berkas($NO){
		$this->db->where('no_berkas',$NO);
		$query = $this->db->get("berkas");
		return $query->row()->path;	
	}

	public function simpan($data){
		$query = $this->db->insert("anggota", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}
	
	public function simpan_data_kartu($data){
		$query = $this->db->insert("pendaftar", $data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function simpan_id($data){
		$query = $this->db->insert("identitas", $data);
		if($query){
			return true;
		}else{
			return false;
		}		
	}
	
	public function simpan_berkas($data){
		$query = $this->db->insert("berkas", $data);
		if($query){
			return true;
		}else{
			return false;
		}		
	}

	public function edit($NO){
		$query = $this->db->where("no_peserta", $NO)
						  ->get("anggota");

		if($query){
			return $query->row();
		}else{
			return false;
		}				  
	}			

	public function update_profil($AGAMA,$ALAMAT,$TELP,$EMAIL,$PASS,$NO){
		$pass = $PASS;
		if($pass == null || $pass == ""){
			$this->db->set("agama",$AGAMA);
			$this->db->set("alamat",$ALAMAT);
			$this->db->set("telp",$TELP);
			$this->db->set("email",$EMAIL);
			$this->db->where("no",$NO);
			$this->db->update("anggota");
		}
		else{
			$this->db->set("agama",$AGAMA);
			$this->db->set("alamat",$ALAMAT);
			$this->db->set("telp",$TELP);
			$this->db->set("email",$EMAIL);
			$this->db->set("pass",md5($PASS));
			$this->db->where("no",$NO);
			$this->db->update("anggota");	
		}
	}

	public function update_id($NO, $data){
		$query = $this->db->update('identitas', $data, array('no_peserta' => $NO));
		if($query){
			return true;
		}else{
			return false;
		}		
	}

	public function update_berkas($NO, $data){
		$query = $this->db->update('berkas', $data, array('no' => $NO));
		if($query){
			return true;
		}else{
			return false;
		}		
	}

	public function update_data_kartu($jabatan,$kode_fakul,$fakul,$kode_jurusan,$jurusan,$no_peserta){
		$this->db->set("formasi_jabatan",$jabatan);
		$this->db->set("kode_fakultas",$kode_fakul);
		$this->db->set("nama_fakultas",$fakul);
		$this->db->set("kode_jurusan",$kode_jurusan);
		$this->db->set("jurusan",$jurusan);
		$this->db->where("no_peserta",$no_peserta);
		$this->db->update("pendaftar");		  
	}

	public function update_pass($data, $email){
		$this->db->set("pass",$data);
		$this->db->where("email",$email);
		$this->db->update("anggota");		  
	}

	public function upload_data($pemilik,$kode,$gambar,$path){
		$this->db->set("pemilik",$pemilik);
		$this->db->set("kode_gambar",$kode);
		$this->db->set("gambar",$gambar);
		$this->db->set("path",$path);
		$this->db->insert("upload");
	}

	public function validation_email($email){
		$query = $this->db->where("email", $email)
						  ->get("user");
	}

	public function validation_pass($pass){
		$query = $this->db->where("password", $pass)
						  ->get("user");
	}

	public function hapus_pesan($NO){
		$this->db->where('no_berkas', $NO);
		$query = $this->db->delete("pesan");
		if($query){
			return true;
		}else{
			return false;
		}		
	}
	
	public function hapus_pesan2($NO){
		$this->db->where('no_peserta', $NO)->where('no_berkas', "");
		$query = $this->db->delete("pesan");
		if($query){
			return true;
		}else{
			return false;
		}		
	}

	public function tambah_pendaftar_fakultas($fakultas,$jumlah){
		$this->db->set("jumlah_pendaftar",$jumlah);
		$this->db->where("nama_fakultas",$fakultas);
		$query = $this->db->update("fakultas");		
		if($query){
			return true;
		}else{
			return false;
		}		
	}

	public function kurang_pendaftar_fakultas($fakultas,$jumlah){
		$this->db->set("jumlah_pendaftar",$jumlah);
		$this->db->where("nama_fakultas",$fakultas);
		$query = $this->db->update("fakultas");		
		if($query){
			return true;
		}else{
			return false;
		}		
	}

	public function tambah_pendaftar_jurusan($fakultas,$jurusan,$jumlah){
		$this->db->set("jumlah_pendaftar",$jumlah);
		$this->db->where("nama_fakultas",$fakultas)->where("jurusan",$jurusan);
		$query = $this->db->update("jurusan");		
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function kurang_pendaftar_jurusan($fakultas,$jurusan,$jumlah){
		$this->db->set("jumlah_pendaftar",$jumlah);
		$this->db->where("nama_fakultas",$fakultas)->where("jurusan",$jurusan);
		$query = $this->db->update("jurusan");		
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function sudah_daftar($NO){
		$this->db->set("daftar","sudah");
		$this->db->where("no",$NO);
		$query = $this->db->update("anggota");		
		if($query){
			return true;
		}else{
			return false;
		}
	}
}
