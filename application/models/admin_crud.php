<?php
defined('BASEPATH') OR exit('No Direct script access allowed');

class Admin_crud extends CI_model{

	public function get_all(){
		$query = $this->db->select("*")
					  	  ->from('admin')
					  	  ->order_by('id', 'ASC')
					  	  ->get();

		return $query->result();		
	}
	public function get_max($kriteria){
	$this->db->select_max('nilai');
	$this->db->where('nama_kriteria',$kriteria);
	$query = $this->db->get("nilai");
		return $query->row()->nilai;
	}

	public function get_min($kriteria){
	$this->db->select_min('nilai');
	$this->db->where('nama_kriteria',$kriteria);
	$query = $this->db->get("nilai");
		return $query->row()->nilai;
	}

	public function get_data($email){
		$query = $this->db->select("*")->from("admin")->where("email",$email)->get();

		return $query->result();
	}

	public function get_peserta(){
		$query = $this->db-> select("*")->from("anggota")->order_by('no', 'ASC')->get();

		return $query->result();	
	}

	public function get_nama($no){
		$this->db->where('no_peserta',$no);
		$query = $this->db->get("anggota");
		return $query->row()->nama_peserta;	
	}	

	public function get_no_peserta($nama){
		$this->db->where('nama_peserta',$nama);
		$query = $this->db->get("anggota");
		return $query->row()->no_peserta;	
	}
	
	public function get_no_peserta2($no){
		$this->db->where('no',$no);
		$query = $this->db->get("anggota");
		return $query->row()->no_peserta;	
	}

	public function get_score_peserta($no){
		$this->db->where('no_peserta',$no);
		$query = $this->db->get("anggota");
		return $query->row()->score;	
	}

	public function get_ijazah_peserta($no){
		$this->db->where('no_peserta',$no);
		$query = $this->db->get("anggota");
		return $query->row()->ijazah;	
	}

	public function get_jenis_kelamin($no){
		$this->db->where('no_peserta',$no);
		$query = $this->db->get("anggota");
		return $query->row()->jenis_kelamin;	
	}

	public function get_jumlah_peserta(){
		$query = $this->db->query("SELECT * FROM anggota");
		return $query->num_rows();		
	}

	public function get_jumlah_kinerja(){
		$query = $this->db->query("SELECT * FROM kinerja");
		return $query->num_rows();		
	}

	public function get_peserta_id($NO){
		$this->db->where('no_peserta',$NO);
		$query = $this->db->get("identitas");
		return $query->result();	
	}

	public function id_validate($peserta, $ket){
		$this->db->set("keterangan",$ket);		
		$this->db->where("no_peserta",$peserta);
		$this->db->update("identitas");
	}

	public function get_berkas($no){
		$this->db->where('no_peserta',$no);
		$query = $this->db->get("berkas");
		return $query->result();	
	}

	public function get_nama_berkas($NO){
		$this->db->where('no_berkas',$NO);
		$query = $this->db->get("berkas");
		return $query->row()->nama_berkas;	
	}

	public function get_sarjana_berkas($NO, $NO2){
		$this->db->where('no_peserta',$NO)->where('no_berkas',$NO2);
		$query = $this->db->get("berkas");
		return $query->row()->sarjana;	
	}

	public function berkas_check($check){
    $this->db->where('no_peserta',$check);
    $query = $this->db->get('berkas');
    	if ($query->num_rows() > 0){
        	return "ada";
    	}
    	else{
        	return "tidak ada";
    	}
	}

	public function get_path_berkas($NO){
		$this->db->where('no_berkas',$NO);
		$query = $this->db->get("berkas");
		return $query->row()->path;	
	}

	public function get_path_berkas2($NO){
		$this->db->where('no_peserta',$NO);
		$query = $this->db->get("berkas");
		return $query->row()->path;	
	}	
	
	public function berkas_valid($peserta, $berkas, $ket){
		$this->db->set("keterangan",$ket);		
		$this->db->where("no_peserta",$peserta)->where("no_berkas",$berkas);
		$this->db->update("berkas");
	}

	public function berkas_tidak_valid($peserta, $berkas, $ket){
		$this->db->set("keterangan",$ket);		
		$this->db->where("no_peserta",$peserta)->where("no_berkas",$berkas);
		$this->db->update("berkas");
	}

	public function berkas_validation($peserta, $status){
		$this->db->set("status_berkas",$status);		
		$this->db->where("no_peserta",$peserta);
		$this->db->update("anggota");
	}

	public function get_identitas(){
		$query = $this->db-> select("*")->from("identitas")->order_by('no', 'ASC')->get();

		return $query->result();	
	}

	public function get_batas(){
		$query = $this->db-> select("*")->from("batas")->order_by('no', 'ASC')->get();
		return $query->result();		
	}

	public function get_batas_data(){
		$query = $this->db-> select("*")->from("batas")->order_by('no', 'DESC')->get();
		return $query->row()->batas;		
	}

	public function get_keterangan_peserta($no){
		$this->db->where('no_peserta',$no);
		$query = $this->db->get("anggota");
		return $query->row()->keterangan;			
	}

	public function pesan($data){
		$query = $this->db->insert("pesan", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function get_nilai(){
		$this->db->select("*");
		$this->db->order_by('no_peserta', 'ASC');
		$this->db->order_by('no', 'ASC');
		$query = $this->db->get("nilai");
		return $query->result();	
	}

	public function get_bobot($kode){
		$this->db->where('kode',$kode);
		$query = $this->db->get("kriteria");
		return $query->row()->bobot;	
	}

	public function get_foto($NO){
		$this->db->where('no',$NO);
		$query = $this->db->get("anggota");
		return $query->row()->foto;	
	}

	public function get_path($NO){
		$this->db->where('no',$NO);
		$query = $this->db->get("anggota");
		return $query->row()->path;	
	}

	public function cek_daftar($no){
		$this->db->where('no_peserta',$no);
		$query = $this->db->get("anggota");
		return $query->row()->daftar;	
	}

	public function get_data_pendaftar_jabatan($no_peserta){
		$this->db->where('no_peserta',$no_peserta);
		$query = $this->db->get("pendaftar");
		return $query->row()->formasi_jabatan;	
	}

	public function get_kinerja(){
		$query = $this->db-> select("*")->from("kinerja")->order_by('no', 'ASC')->get();

		return $query->result();	
	}

	public function no_kinerja($NO){
		$this->db->where('no',$NO);
		$query = $this->db->get("kinerja");
		return $query->row()->nama_kinerja;	
	}

	public function get_pendaftar_kinerja3($nama){
		$this->db->where('nama_kinerja',$nama);
		$query = $this->db->get("kinerja");
		return $query->row()->jumlah_pendaftar;	
	}

	public function get_kinerja_peserta(){
		$query = $this->db-> select("*")->from("kinerja_peserta")->order_by('no', 'ASC')->get();

		return $query->result();	
	}

	public function get_kriteria(){
		$query = $this->db-> select("*")->from("kriteria")->order_by('no', 'ASC')->get();

		return $query->result();	
	}

	public function tipe_kriteria($NAMA){
		$this->db->where('nama_kriteria',$NAMA);
		$query = $this->db->get("kriteria");
		return $query->row()->Tipe;	
	}

	public function no_kriteria($NO){
		$this->db->where('no',$NO);
		$query = $this->db->get("kriteria");
		return $query->row()->nama_kriteria;	
	}	

	public function get_crips(){
		$query = $this->db-> select("*")->from("crips")->order_by('no', 'ASC')->get();

		return $query->result();	
	}

	public function nama_crips($nama){
		$query = $this->db-> select("*")->from("crips")->where('nama_kriteria',$nama)->get();

		return $query->result();
	}

	public function kriteria_crips($no){
		$this->db->where('no',$no);
		$query = $this->db->get("crips");
		return $query->row()->nama_kriteria;
	}

	public function crips($no){
		$this->db->where('no',$no);
		$query = $this->db->get("crips");
		return $query->row()->nama_crips;
	}	

	public function nilai_crips($no){
		$this->db->where('no',$no);
		$query = $this->db->get("crips");
		return $query->row()->nilai;
	}

	public function nama_kinerja_check($fakul){
    $this->db->where('nama_kinerja',$fakul);
    $query = $this->db->get('crips_kinerja');
    	if ($query->num_rows() > 0){
        	return "ada";
    	}
    	else{
        	return "tidak ada";
    	}
	}

	public function nilai_nama_check($nama){
    $this->db->where('peserta',$nama);
    $query = $this->db->get('nilai');
    	if ($query->num_rows() > 0){
        	return "ada";
    	}
    	else{
        	return "tidak ada";
    	}
	}

	public function nilai_kriteria_check($kriteria){
    $this->db->where('nama_kriteria',$kriteria);
    $query = $this->db->get('nilai');
    	if ($query->num_rows() > 0){
        	return "ada";
    	}
    	else{
        	return "tidak ada";
    	}
	}		

	public function nilai_nama($nama){
		$query = $this->db->select("*")->from("nilai")->where("peserta",$nama)->get();

		return $query->result();
	}

	public function nilai_kriteria($col){
		$this->db->select($col);
		$query = $this->db->get("nilai");
		return $query->row()->$col;	
	}

	public function get_total(){
		$query = $this->db-> select("*")->from("temp")->order_by('no_peserta', 'ASC')->get();

		return $query->result();	
	}	

	public function get_temp(){
    	$query = $this->db-> select("*")->from("temp")->order_by('total', 'DESC')->get();
   		return $query->result();	
	}

	public function get_lulus(){
		$query = $this->db-> select("*")->from("lulus")->order_by('no_peserta', 'ASC')->get();

		return $query->result();	
	}

	public function get_gagal(){
		$query = $this->db-> select("*")->from("gagal")->order_by('no_peserta', 'ASC')->get();

		return $query->result();	
	}
	
	public function get_pendaftar(){
		$query = $this->db-> select("*")->from("pendaftar")->order_by('no', 'ASC')->get();

		return $query->result();	
	}

	public function get_pendaftar_kinerja2($no){
		$this->db->where('no_peserta',$no);
		$query = $this->db->get("pendaftar");
		return $query->row()->nama_kinerja;	
	}

	public function get_pendaftar_crips_kinerja($no){
		$this->db->where('no_peserta',$no);
		$query = $this->db->get("pendaftar");
		return $query->row()->crips_kinerja;	
	}

	public function cari_pendaftar($no){
        $query= $this->db->get_where('pendaftar',array('no_peserta'=>$no));
    	return $query;  
	}
	
	public function simpan($data){
		$query = $this->db->insert("admin", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function simpan_batas($data){
		$query = $this->db->insert("batas", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function simpan_kinerja($data){
		$query = $this->db->insert("kinerja", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function simpan_crips_kinerja($data){
		$query = $this->db->insert("crips_kinerja", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function simpan_kinerja_peserta($data){
		$query = $this->db->insert("kinerja_peserta", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function simpan_kriteria($data){
		$query = $this->db->insert("kriteria", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function simpan_crips($data){
		$query = $this->db->insert("crips", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function simpan_nilai($data){
		$query = $this->db->insert("nilai", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function simpan_temp($data){
		$query = $this->db->insert("temp", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function simpan_lulus($data){
		$query = $this->db->insert("lulus", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function simpan_gagal($data){
		$query = $this->db->insert("gagal", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function edit($ID){
		$query = $this->db->where("id", $ID)
						  ->get("admin");

		if($query){
			return $query->row();
		}else{
			return false;
		}				  
	}

	public function edit_kinerja($NO){
		$query = $this->db->where("no", $NO)
						  ->get("kinerja");

		if($query){
			return $query->row();
		}else{
			return false;
		}				  
	}

	public function edit_crips_kinerja($NO){
		$query = $this->db->where("no", $NO)
						  ->get("crips_kinerja");

		if($query){
			return $query->row();
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

	public function edit_crips($NO){
		$query = $this->db->where("no", $NO)
						  ->get("crips");

		if($query){
			return $query->row();
		}else{
			return false;
		}				  
	}			

	public function update($data, $ID){
		$query = $this->db->update("admin", $data, $ID);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function update_sarjana_peserta($no, $s){				
		$this->db->set("ijazah",$s);		
		$this->db->where("no_peserta",$no);
		$this->db->update("anggota");
	}

	public function update_score_peserta($no, $s){
		$this->db->set("score",$s);		
		$this->db->where("no_peserta",$no);
		$this->db->update("anggota");
	}

	public function update_keterangan_peserta($no, $s){	
		$this->db->set("keterangan",$s);		
		$this->db->where("no_peserta",$no);
		$this->db->update("anggota");
	}

	public function update_kinerja($nama,$NO){				
		$this->db->set("nama_kinerja",$nama);
		$this->db->where("no",$NO);
		$this->db->update("kinerja");
	}

	public function update_kinerja_peserta($NO, $nama, $data){
		$query = $this->db->update('kinerja_peserta', $data, array('no_peserta' => $NO, 'nama_kinerja' => $nama));
		if($query){
			return true;
		}else{
			return false;
		}		
	}

	public function update_kriteria($kode,$nama,$tipe,$bobot,$NO){
		$this->db->set("kode",$kode);
		$this->db->set("nama_kriteria",$nama);
		$this->db->set("Tipe",$tipe);
		$this->db->set("bobot",$bobot);		
		$this->db->where("no",$NO);
		$this->db->update("kriteria");
	}

	public function update_crips($crips,$nilai,$NO){
		$this->db->set("nama_crips",$crips);
		$this->db->set("nilai",$nilai);		
		$this->db->where("no",$NO);
		$this->db->update("crips");
	}

	public function update_nilai($nama,$no_peserta,$kd_kinerja,$nama_kinerja,$kd_crips_kinerja,$crips_kinerja,$kriteria,$crips,$nilai){
		$this->db->set("kode_kinerja",$kd_kinerja);
		$this->db->set("nama_kinerja",$nama_kinerja);
		$this->db->set("kode_crips_kinerja",$kd_crips_kinerja);
		$this->db->set("crips_kinerja",$crips_kinerja);
		$this->db->set("nama_crips",$crips);
		$this->db->set("nilai",$nilai);	
		$this->db->where("peserta",$nama);
		$this->db->where("no_peserta",$no_peserta);
		$this->db->where("nama_kriteria",$kriteria);			
		$this->db->update("nilai");
	}	

	public function update_pass($data, $email){
		$this->db->set("password",$data);
		$this->db->where("email",$email);
		$this->db->update("admin");		  
	}

	public function hapus_peserta($NO){
		$query = $this->db->delete("anggota", $NO);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function hapus_berkas($NO){
		$this->db->where("no_peserta",$NO);
		$query = $this->db->delete("berkas");

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function hapus_kinerja($NO){
		$query = $this->db->delete("kinerja", $NO);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function hapus_semua_kinerja(){
		$query = $this->db->truncate("kinerja");

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function hapus_kinerja_peserta($no_peserta){
		$query = $this->db->delete("kinerja_peserta", $no_peserta);

		if($query){
			return true;
		}else{
			return false;
		}
	}

		public function hapus_semua_kinerja_peserta(){
		$query = $this->db->truncate("kinerja_peserta");

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function hapus_kriteria($NO){
		$query = $this->db->delete("kriteria", $NO);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function hapus_semua_kriteria(){
		$query = $this->db->truncate("kriteria");

		if($query){
			return true;
		}else{
			return false;
		}
	}	

	public function hapus_kriteria_crips($NAMA){
		$this->db->where("nama_kriteria",$NAMA);
		$query = $this->db->delete("crips");

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function hapus_kriteria_nilai($NAMA){
		$this->db->where("nama_kriteria",$NAMA);
		$query = $this->db->delete("nilai");

		if($query){
			return true;
		}else{
			return false;
		}
	}		

	public function hapus_crips($NO){
		$query = $this->db->delete("crips", $NO);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function hapus_semua_crips(){
		$query = $this->db->truncate("crips");

		if($query){
			return true;
		}else{
			return false;
		}
	}	

	public function hapus_nilai($no_peserta){
		$query = $this->db->delete("nilai", $no_peserta);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function hapus_semua_nilai(){
		$query = $this->db->truncate("nilai");

		if($query){
			return true;
		}else{
			return false;
		}
	}	

	public function hapus_temp(){
		$query = $this->db->truncate("temp");
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function hapus_lulus($no_peserta){
		$query = $this->db->delete("lulus", $no_peserta);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function hapus_semua_lulus(){
		$query = $this->db->truncate("lulus");

		if($query){
			return true;
		}else{
			return false;
		}
	}		

	public function hapus_gagal($no_peserta){
		$query = $this->db->delete("gagal", $no_peserta);

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function hapus_semua_gagal(){
		$query = $this->db->truncate("gagal");

		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function validation_email($email){
		$query = $this->db->where("email", $email)
						  ->get("user");
	}

	public function validation_pass($pass){
		$query = $this->db->where("password", $pass)
						  ->get("user");
	}

	public function report(){
		return $query = $this->db->get("anggota");
	}
}
