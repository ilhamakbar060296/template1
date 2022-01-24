<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller{

    public function __construct()
    {
        parent :: __construct();
        $this->load->library('form_validation');
        if($this->session->userdata('status') != "login"){
            redirect(base_url("Auth"));
        }        
        $this->load->library('form_validation');
        $this->load->library('pdf');
        $this->load->library('pdf2');
        $this->load->library('table');
        $this->load->model('peserta_crud');
        $this->load->dbutil();
        $this->load->helper(array('form', 'url', 'file', 'date'));
    }

    public function index(){
        $no = $this->peserta_crud->no_peserta_email($this->session->userdata("email"));
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'pesan' => $this->peserta_crud->check_pesan($no),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/peserta_v');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function profil(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),            
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/profil_v');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function edit_profil()
    {   
    $NO = $this->uri->segment(3);     
        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'get' => $this->peserta_crud->edit($NO),
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/edit');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function update_profil(){
        $no = $this->input->post("NO");
        $agama = $this->input->post("AGAMA");
        $alamat = $this->input->post("ALAMAT");
        $telp = $this->input->post("TELP");
        $email = $this->input->post("EMAIL");
        $pass = $this->input->post("PASS");
        $this->peserta_crud->update_profil($agama,$alamat,$telp,$email,$pass,$no);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        redirect(base_url("peserta/profil"));     
    }

    public function edit_berkas()
    {   
        $NO = $this->uri->segment(3);     
        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'get' => $this->peserta_crud->edit($NO),
            'id' => $this->peserta_crud->get_peserta_id($NO),
            'berkas' => $this->peserta_crud->get_peserta_berkas($NO),
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/edit_berkas');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function identitas(){
        $NO = $this->uri->segment(3);     
        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'get' => $this->peserta_crud->edit($NO),            
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/berkas/identitas');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');     
    }

    public function edit_identitas(){
        $NO = $this->uri->segment(3);
        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'get' => $this->peserta_crud->edit($NO),
            'berkas' => $this->peserta_crud->get_peserta_id($NO),            
        );          
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/berkas/edit_identitas');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');     
    }

    public function simpan_identitas(){
        $this->form_validation->set_rules('NIK','nik','required');
        $this->form_validation->set_rules('NIDN','nidn','required');
        $this->form_validation->set_rules('JABATAN','jabatan','required');
        $this->form_validation->set_rules('PT','pt','required');
        $this->form_validation->set_rules('FAKUL','fakul','required');
        $this->form_validation->set_rules('MK','mk','required');        
        foreach($this->peserta_crud->get_data($this->session->userdata("email")) as $hasil){
            $no = $hasil->no_peserta;
            $nama = $hasil->nama_peserta;
            $jk = $hasil->jenis_kelamin;
            $ttl = $hasil->tempat_lahir." / ".$hasil->tanggal_lahir;
            $ket = $hasil->keterangan;
        }
        $s = $_FILES['ID']['name'];        
        $format = "%Y";
        $config['upload_path'] = './assets/berkas/'.str_replace(' ', '_', $nama)."/".mdate($format);
        if(!is_dir('assets/berkas/'.str_replace(' ', '_', $nama)."/".mdate($format))){
            mkdir("./assets/berkas/".str_replace(' ', '_', $nama)."/".mdate($format));
        }else{           
        }                
        if($this->form_validation->run() != false){
            $data = array(
                'no_peserta' => $no,
                'nama_peserta' => $nama,
                'nik' => $this->input->post("NIK"),
                'nidn' => $this->input->post("NIDN"),
                'jenis_kelamin' => $jk,
                'ttl' => $ttl,
                'pangkat' => $ket,
                'jabatan' => $this->input->post("JABATAN"),
                'ijazah' => $this->input->post("PT"),
                'fakultas' => $this->input->post("FAKUL"),
                'departemen' => $this->input->post("MK"),
                'berkas' => $s,
                'path' => $config['upload_path'],
                'Keterangan' => "belum",
            );
        $this->peserta_crud->simpan_id($data);
        move_uploaded_file($_FILES['ID']['tmp_name'],$config['upload_path']."/".$s);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
            redirect(base_url("peserta/identitas")); 
        }
        redirect(base_url("peserta/profil")); 
    }

    public function update_identitas(){
        $this->form_validation->set_rules('NIK','nik','required');
        $this->form_validation->set_rules('NIDN','nidn','required');
        $this->form_validation->set_rules('JABATAN','jabatan','required');
        $this->form_validation->set_rules('PT','pt','required');
        $this->form_validation->set_rules('FAKUL','fakul','required');
        $this->form_validation->set_rules('MK','mk','required');         
        foreach($this->peserta_crud->get_peserta_id($this->input->post("NO")) as $hasil){            
            $nama = $hasil->nama_peserta;        
            $jk = $hasil->jenis_kelamin;
            $ttl = $hasil->ttl;
            $pangkat = $hasil->pangkat;
            $old_berkas = $hasil->berkas;
            $path = $hasil->path;
        }       
        $no2 = $this->input->post("NO");
        $s = $_FILES['ID']['name'];                        
        $config['upload_path'] = $path;
        $this->peserta_crud->hapus_pesan2($this->input->post("NO"));
        unlink($path."/".$old_berkas);                
        if($this->form_validation->run() != false){
            $data = array(
                'no_peserta' => $this->input->post("NO"),
                'nama_peserta' => $nama,
                'nik' => $this->input->post("NIK"),
                'nidn' => $this->input->post("NIDN"),
                'jenis_kelamin' => $jk,
                'ttl' => $ttl,
                'pangkat' => $pangkat,
                'jabatan' => $this->input->post("JABATAN"),
                'ijazah' => $this->input->post("PT"),
                'fakultas' => $this->input->post("FAKUL"),
                'departemen' => $this->input->post("MK"),
                'berkas' => $s,
                'path' => $path,
                'Keterangan' => "belum",
            );
        $this->peserta_crud->update_id($no2, $data);
        move_uploaded_file($_FILES['ID']['tmp_name'],$config['upload_path']."/".$s);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
            redirect(base_url("peserta/identitas")); 
        }
        redirect(base_url("peserta/profil")); 
    }

    public function pendidikan(){
        $NO = $this->uri->segment(3);     
        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'get' => $this->peserta_crud->edit($NO),            
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/berkas/ijazah');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');     
    }

    public function edit_pendidikan(){
        $NO = $this->uri->segment(3);
        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'get' => $this->peserta_crud->edit($NO),
            'berkas' => $this->peserta_crud->get_no_berkas($NO),            
        );          
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/berkas/edit_ijazah');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');     
    }

    public function simpan_pendidikan(){
        $this->form_validation->set_rules('IJAZAH','ijazah','required');
        $this->form_validation->set_rules('S','s','required');
        $this->form_validation->set_rules('TANGGAL','tanggal','required');
        $this->form_validation->set_rules('FAKUL','fakul','required');
        $this->form_validation->set_rules('TEMPAT','tempat','required');        
        foreach($this->peserta_crud->get_data($this->session->userdata("email")) as $hasil){
            $no = $hasil->no_peserta;
            $nama = $hasil->nama_peserta;
        }
        $s = $_FILES['S1']['name'];        
        $format = "%Y";
        $config['upload_path'] = './assets/berkas/'.str_replace(' ', '_', $nama)."/".mdate($format);
        if(!is_dir('assets/berkas/'.str_replace(' ', '_', $nama)."/".mdate($format))){
            mkdir("./assets/berkas/".str_replace(' ', '_', $nama)."/".mdate($format));
        }else{           
        }                
        if($this->form_validation->run() != false){
            $data = array(
                'no_peserta' => $no,
                'nama_peserta' => $nama,
                'no_berkas' => $this->input->post("IJAZAH"),
                'nama_berkas' => $s,
                'jenis_berkas' => "ijazah",
                'sarjana' => $this->input->post("S"),
                'fakultas' => $this->input->post("FAKUL"),
                'kegiatan' => "",
                'jumlah_sks' => 0,
                'tempat_berkas' => $this->input->post("TEMPAT"),
                'tanggal_berkas' => $this->input->post("TANGGAL"),
                'tahun_upload' => mdate($format),
                'path' => $config['upload_path'],
                'Keterangan' => "belum",
            );
        $this->peserta_crud->simpan_berkas($data);
        move_uploaded_file($_FILES['S1']['tmp_name'],$config['upload_path']."/".$s);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
            redirect(base_url("peserta/pendidikan")); 
        }
        redirect(base_url("peserta/profil")); 
    }

    public function update_pendidikan(){
        $this->form_validation->set_rules('IJAZAH','ijazah','required');
        $this->form_validation->set_rules('S','s','required');
        $this->form_validation->set_rules('TANGGAL','tanggal','required');
        $this->form_validation->set_rules('FAKUL','fakul','required');
        $this->form_validation->set_rules('TEMPAT','tempat','required');        
        foreach($this->peserta_crud->get_data($this->session->userdata("email")) as $hasil){
            $no = $hasil->no_peserta;
            $nama = $hasil->nama_peserta;
        }
        foreach($this->peserta_crud->get_berkas($this->input->post("ID")) as $hasil2){
            $old_no_berkas = $hasil2->no_berkas;
            $old_nama_berkas = $hasil2->nama_berkas;
        }        
        $no2 = $this->input->post("ID");
        $s = $_FILES['S1']['name'];        
        $path = $this->peserta_crud->get_berkas_path($this->input->post("IJAZAH"));        
        $format = "%Y";
        $config['upload_path'] = $path;
        $this->peserta_crud->hapus_pesan($old_no_berkas);
        unlink($path."/".$old_nama_berkas);                
        if($this->form_validation->run() != false){
            $data = array(
                'no_peserta' => $no,
                'nama_peserta' => $nama,
                'no_berkas' => $this->input->post("IJAZAH"),
                'nama_berkas' => $s,
                'jenis_berkas' => "ijazah",
                'sarjana' => $this->input->post("S"),
                'fakultas' => $this->input->post("FAKUL"),
                'kegiatan' => "",
                'jumlah_sks' => 0,
                'tempat_berkas' => $this->input->post("TEMPAT"),
                'tanggal_berkas' => $this->input->post("TANGGAL"),
                'tahun_upload' => mdate($format),
                'path' => $config['upload_path'],
                'Keterangan' => "belum",
            );
        $this->peserta_crud->update_berkas($no2, $data);
        move_uploaded_file($_FILES['S1']['tmp_name'],$config['upload_path']."/".$s);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
            redirect(base_url("peserta/pendidikan")); 
        }
        redirect(base_url("peserta/profil")); 
    }

    public function pengajaran(){
        $NO = $this->uri->segment(3);     
        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'get' => $this->peserta_crud->edit($NO),
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/berkas/mengajar');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');     
    }

    public function edit_pengajaran(){
        $NO = $this->uri->segment(3);     
        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'get' => $this->peserta_crud->edit($NO),
            'berkas' => $this->peserta_crud->get_no_berkas($NO),
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/berkas/edit_mengajar');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');     
    }

    public function simpan_pengajaran(){
        $this->form_validation->set_rules('SK','sk','required');
        $this->form_validation->set_rules('SKS','sks','required');
        $this->form_validation->set_rules('KEGIATAN','kegiatan','required');
        $this->form_validation->set_rules('TANGGAL','tanggal','required');
        $this->form_validation->set_rules('TEMPAT','tempat','required');        
        foreach($this->peserta_crud->get_data($this->session->userdata("email")) as $hasil){
            $no = $hasil->no_peserta;
            $nama = $hasil->nama_peserta;
        }
        $s = $_FILES['UPLOAD']['name'];        
        $format = "%Y";
        $config['upload_path'] = './assets/berkas/'.str_replace(' ', '_', $nama)."/".mdate($format);
        if(!is_dir('assets/berkas/'.str_replace(' ', '_', $nama)."/".mdate($format))){
            mkdir("./assets/berkas/".str_replace(' ', '_', $nama)."/".mdate($format));
        }else{           
        }                
        if($this->form_validation->run() != false){
            $data = array(
                'no_peserta' => $no,
                'nama_peserta' => $nama,
                'no_berkas' => $this->input->post("SK"),
                'nama_berkas' => $s,
                'jenis_berkas' => "sk",
                'sarjana' => "",
                'fakultas' => "",
                'kegiatan' => $this->input->post("KEGIATAN"),
                'jumlah_sks' => $this->input->post("SKS"),
                'tempat_berkas' => $this->input->post("TEMPAT"),
                'tanggal_berkas' => $this->input->post("TANGGAL"),
                'tahun_upload' => mdate($format),
                'path' => $config['upload_path'],
                'Keterangan' => "belum",
            );
        $this->peserta_crud->simpan_berkas($data);
        move_uploaded_file($_FILES['UPLOAD']['tmp_name'],$config['upload_path']."/".$s);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
            redirect(base_url("peserta/pengajaran")); 
        }
        redirect(base_url("peserta/profil")); 
    }

    public function update_pengajaran(){
        $this->form_validation->set_rules('SK','sk','required');
        $this->form_validation->set_rules('SKS','sks','required');
        $this->form_validation->set_rules('KEGIATAN','kegiatan','required');
        $this->form_validation->set_rules('TANGGAL','tanggal','required');
        $this->form_validation->set_rules('TEMPAT','tempat','required');        
        foreach($this->peserta_crud->get_data($this->session->userdata("email")) as $hasil){
            $no = $hasil->no_peserta;
            $nama = $hasil->nama_peserta;
        }
        foreach($this->peserta_crud->get_berkas($this->input->post("ID")) as $hasil2){
            $old_no_berkas = $hasil2->no_berkas;
            $old_nama_berkas = $hasil2->nama_berkas;
        }         
        $no2 = $this->input->post("ID");
        $s = $_FILES['UPLOAD']['name'];        
        $path = $this->peserta_crud->get_berkas_path($this->input->post("SK"));              
        $format = "%Y";
        $config['upload_path'] = $path;
        $this->peserta_crud->hapus_pesan($old_no_berkas);
        unlink($path."/".$old_nama_berkas);                
        if($this->form_validation->run() != false){
            $data = array(
                'no_peserta' => $no,
                'nama_peserta' => $nama,
                'no_berkas' => $this->input->post("SK"),
                'nama_berkas' => $s,
                'jenis_berkas' => "sk",
                'sarjana' => "",
                'fakultas' => "",
                'kegiatan' => $this->input->post("KEGIATAN"),
                'jumlah_sks' => $this->input->post("SKS"),
                'tempat_berkas' => $this->input->post("TEMPAT"),
                'tanggal_berkas' => $this->input->post("TANGGAL"),
                'tahun_upload' => mdate($format),
                'path' => $config['upload_path'],
                'Keterangan' => "belum",
            );
        $this->peserta_crud->update_berkas($no2, $data);
        move_uploaded_file($_FILES['UPLOAD']['tmp_name'],$config['upload_path']."/".$s);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
            redirect(base_url("peserta/pengajaran")); 
        }
        redirect(base_url("peserta/profil"));
    }

    public function penelitian(){
        $NO = $this->uri->segment(3);     
        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'get' => $this->peserta_crud->edit($NO),
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/berkas/penelitian');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');     
    }

    public function edit_penelitian(){
        $NO = $this->uri->segment(3);     
        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'get' => $this->peserta_crud->edit($NO),
            'berkas' => $this->peserta_crud->get_no_berkas($NO),
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/berkas/edit_penelitian');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');     
    }

    public function simpan_penelitian(){
        $this->form_validation->set_rules('PENELITIAN','penelitian','required');
        $this->form_validation->set_rules('KEGIATAN','kegiatan','required');
        $this->form_validation->set_rules('TANGGAL','tanggal','required');
        $this->form_validation->set_rules('TEMPAT','tempat','required');        
        foreach($this->peserta_crud->get_data($this->session->userdata("email")) as $hasil){
            $no = $hasil->no_peserta;
            $nama = $hasil->nama_peserta;
        }
        $s = $_FILES['UPLOAD']['name'];        
        $format = "%Y";
        $config['upload_path'] = './assets/berkas/'.str_replace(' ', '_', $nama)."/".mdate($format);
        if(!is_dir('assets/berkas/'.str_replace(' ', '_', $nama)."/".mdate($format))){
            mkdir("./assets/berkas/".str_replace(' ', '_', $nama)."/".mdate($format));
        }else{           
        }                
        if($this->form_validation->run() != false){
            $data = array(
                'no_peserta' => $no,
                'nama_peserta' => $nama,
                'no_berkas' => $this->input->post("PENELITIAN"),
                'nama_berkas' => $s,
                'jenis_berkas' => "penelitian",
                'sarjana' => "",
                'fakultas' => "",
                'kegiatan' => $this->input->post("KEGIATAN"),
                'jumlah_sks' => 0,
                'tempat_berkas' => $this->input->post("TEMPAT"),
                'tanggal_berkas' => $this->input->post("TANGGAL"),
                'tahun_upload' => mdate($format),
                'path' => $config['upload_path'],
                'Keterangan' => "belum",
            );
        $this->peserta_crud->simpan_berkas($data);
        move_uploaded_file($_FILES['UPLOAD']['tmp_name'],$config['upload_path']."/".$s);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
            redirect(base_url("peserta/penelitian")); 
        }
        redirect(base_url("peserta/profil")); 
    }

    public function update_penelitian(){
        $this->form_validation->set_rules('PENELITIAN','penelitian','required');
        $this->form_validation->set_rules('KEGIATAN','kegiatan','required');
        $this->form_validation->set_rules('TANGGAL','tanggal','required');
        $this->form_validation->set_rules('TEMPAT','tempat','required');        
        foreach($this->peserta_crud->get_data($this->session->userdata("email")) as $hasil){
            $no = $hasil->no_peserta;
            $nama = $hasil->nama_peserta;
        }
        foreach($this->peserta_crud->get_berkas($this->input->post("ID")) as $hasil2){
            $old_no_berkas = $hasil2->no_berkas;
            $old_nama_berkas = $hasil2->nama_berkas;
        }         
        $no2 = $this->input->post("ID");
        $s = $_FILES['UPLOAD']['name'];        
        $path = $this->peserta_crud->get_berkas_path($this->input->post("PENELITIAN"));        
        $format = "%Y";
        $config['upload_path'] = $path;
        $this->peserta_crud->hapus_pesan($old_no_berkas);
        unlink($path."/".$old_nama_berkas);                
        if($this->form_validation->run() != false){
            $data = array(
                'no_peserta' => $no,
                'nama_peserta' => $nama,
                'no_berkas' => $this->input->post("PENELITIAN"),
                'nama_berkas' => $s,
                'jenis_berkas' => "penelitian",
                'sarjana' => "",
                'fakultas' => "",
                'kegiatan' => $this->input->post("KEGIATAN"),
                'jumlah_sks' => 0,
                'tempat_berkas' => $this->input->post("TEMPAT"),
                'tanggal_berkas' => $this->input->post("TANGGAL"),
                'tahun_upload' => mdate($format),
                'path' => $config['upload_path'],
                'Keterangan' => "belum",
            );
        $this->peserta_crud->update_berkas($no2, $data);
        move_uploaded_file($_FILES['UPLOAD']['tmp_name'],$config['upload_path']."/".$s);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
            redirect(base_url("peserta/penelitian")); 
        }
        redirect(base_url("peserta/profil")); 
    }

    public function pengabdian(){
        $NO = $this->uri->segment(3);     
        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'get' => $this->peserta_crud->edit($NO),
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/berkas/pengabdian');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');     
    }

    public function edit_pengabdian(){
        $NO = $this->uri->segment(3);     
        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'get' => $this->peserta_crud->edit($NO),
            'berkas' => $this->peserta_crud->get_no_berkas($NO),
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/berkas/edit_pengabdian');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');     
    }

    public function simpan_pengabdian(){
        $this->form_validation->set_rules('PENGABDIAN','pengabdian','required');
        $this->form_validation->set_rules('KEGIATAN','kegiatan','required');
        $this->form_validation->set_rules('TANGGAL','tanggal','required');
        $this->form_validation->set_rules('TEMPAT','tempat','required');        
        foreach($this->peserta_crud->get_data($this->session->userdata("email")) as $hasil){
            $no = $hasil->no_peserta;
            $nama = $hasil->nama_peserta;
        }
        $s = $_FILES['UPLOAD']['name'];        
        $format = "%Y";
        $config['upload_path'] = './assets/berkas/'.str_replace(' ', '_', $nama)."/".mdate($format);
        if(!is_dir('assets/berkas/'.str_replace(' ', '_', $nama)."/".mdate($format))){
            mkdir("./assets/berkas/".str_replace(' ', '_', $nama)."/".mdate($format));
        }else{           
        }                
        if($this->form_validation->run() != false){
            $data = array(
                'no_peserta' => $no,
                'nama_peserta' => $nama,
                'no_berkas' => $this->input->post("PENGABDIAN"),
                'nama_berkas' => $s,
                'jenis_berkas' => "pengabdian",
                'sarjana' => "",
                'fakultas' => "",
                'kegiatan' => $this->input->post("KEGIATAN"),
                'jumlah_sks' => 0,
                'tempat_berkas' => $this->input->post("TEMPAT"),
                'tanggal_berkas' => $this->input->post("TANGGAL"),
                'tahun_upload' => mdate($format),
                'path' => $config['upload_path'],
                'Keterangan' => "belum",
            );
        $this->peserta_crud->simpan_berkas($data);
        move_uploaded_file($_FILES['UPLOAD']['tmp_name'],$config['upload_path']."/".$s);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
            redirect(base_url("peserta/pengabdian")); 
        }
        redirect(base_url("peserta/profil")); 
    }

    public function update_pengabdian(){
        $this->form_validation->set_rules('PENGABDIAN','pengabdian','required');
        $this->form_validation->set_rules('KEGIATAN','kegiatan','required');
        $this->form_validation->set_rules('TANGGAL','tanggal','required');
        $this->form_validation->set_rules('TEMPAT','tempat','required');        
        foreach($this->peserta_crud->get_data($this->session->userdata("email")) as $hasil){
            $no = $hasil->no_peserta;
            $nama = $hasil->nama_peserta;
        }
        foreach($this->peserta_crud->get_berkas($this->input->post("ID")) as $hasil2){
            $old_no_berkas = $hasil2->no_berkas;
            $old_nama_berkas = $hasil2->nama_berkas;
        }         
        $no2 = $this->input->post("ID");
        $s = $_FILES['UPLOAD']['name'];        
        $path = $this->peserta_crud->get_berkas_path($this->input->post("PENGABDIAN"));        
        $format = "%Y";
        $config['upload_path'] = $path;
        $this->peserta_crud->hapus_pesan($old_no_berkas);
        unlink($path."/".$old_nama_berkas);                
        if($this->form_validation->run() != false){
            $data = array(
                'no_peserta' => $no,
                'nama_peserta' => $nama,
                'no_berkas' => $this->input->post("PENGABDIAN"),
                'nama_berkas' => $s,
                'jenis_berkas' => "pengabdian",
                'sarjana' => "",
                'fakultas' => "",
                'kegiatan' => $this->input->post("KEGIATAN"),
                'jumlah_sks' => 0,
                'tempat_berkas' => $this->input->post("TEMPAT"),
                'tanggal_berkas' => $this->input->post("TANGGAL"),
                'tahun_upload' => mdate($format),
                'path' => $config['upload_path'],
                'Keterangan' => "belum",
            );
        $this->peserta_crud->update_berkas($no2, $data);
        move_uploaded_file($_FILES['UPLOAD']['tmp_name'],$config['upload_path']."/".$s);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
            redirect(base_url("peserta/pengabdian")); 
        }
        redirect(base_url("peserta/profil")); 
    }

    public function sertifikat(){
        $NO = $this->uri->segment(3);     
        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'get' => $this->peserta_crud->edit($NO),
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/berkas/sertifikat');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');     
    }

    public function edit_sertifikat(){
        $NO = $this->uri->segment(3);     
        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'get' => $this->peserta_crud->edit($NO),
            'berkas' => $this->peserta_crud->get_no_berkas($NO),
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/profil/berkas/edit_sertifikat');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');     
    }

    public function simpan_sertifikat(){
        $this->form_validation->set_rules('SERTIFIKAT','sertifikat','required');
        $this->form_validation->set_rules('KEGIATAN','kegiatan','required');
        $this->form_validation->set_rules('TANGGAL','tanggal','required');
        $this->form_validation->set_rules('TEMPAT','tempat','required');        
        foreach($this->peserta_crud->get_data($this->session->userdata("email")) as $hasil){
            $no = $hasil->no_peserta;
            $nama = $hasil->nama_peserta;
        }
        $s = $_FILES['UPLOAD']['name'];        
        $format = "%Y";
        $config['upload_path'] = './assets/berkas/'.str_replace(' ', '_', $nama)."/".mdate($format);
        if(!is_dir('assets/berkas/'.str_replace(' ', '_', $nama)."/".mdate($format))){
            mkdir("./assets/berkas/".str_replace(' ', '_', $nama)."/".mdate($format));
        }else{           
        }                
        if($this->form_validation->run() != false){
            $data = array(
                'no_peserta' => $no,
                'nama_peserta' => $nama,
                'no_berkas' => $this->input->post("SERTIFIKAT"),
                'nama_berkas' => $s,
                'jenis_berkas' => "sertifikat",
                'sarjana' => "",
                'fakultas' => "",
                'kegiatan' => $this->input->post("KEGIATAN"),
                'jumlah_sks' => 0,
                'tempat_berkas' => $this->input->post("TEMPAT"),
                'tanggal_berkas' => $this->input->post("TANGGAL"),
                'tahun_upload' => mdate($format),
                'path' => $config['upload_path'],
                'Keterangan' => "belum",
            );
        $this->peserta_crud->simpan_berkas($data);
        move_uploaded_file($_FILES['UPLOAD']['tmp_name'],$config['upload_path']."/".$s);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
            redirect(base_url("peserta/sertifikat")); 
        }
        redirect(base_url("peserta/profil")); 
    }

    public function update_sertifikat(){
        $this->form_validation->set_rules('SERTIFIKAT','sertifikat','required');
        $this->form_validation->set_rules('KEGIATAN','kegiatan','required');
        $this->form_validation->set_rules('TANGGAL','tanggal','required');
        $this->form_validation->set_rules('TEMPAT','tempat','required');        
        foreach($this->peserta_crud->get_data($this->session->userdata("email")) as $hasil){
            $no = $hasil->no_peserta;
            $nama = $hasil->nama_peserta;
        }
        foreach($this->peserta_crud->get_berkas($this->input->post("ID")) as $hasil2){
            $old_no_berkas = $hasil2->no_berkas;
            $old_nama_berkas = $hasil2->nama_berkas;
        }         
        $no2 = $this->input->post("ID");
        $s = $_FILES['UPLOAD']['name'];        
        $path = $this->peserta_crud->get_berkas_path($this->input->post("SERTIFIKAT"));        
        $format = "%Y";
        $config['upload_path'] = $path;
        $this->peserta_crud->hapus_pesan($old_no_berkas);
        unlink($path."/".$old_nama_berkas);                
        if($this->form_validation->run() != false){
            $data = array(
                'no_peserta' => $no,
                'nama_peserta' => $nama,
                'no_berkas' => $this->input->post("SERTIFIKAT"),
                'nama_berkas' => $s,
                'jenis_berkas' => "sertifikat",
                'sarjana' => "",
                'fakultas' => "",
                'kegiatan' => $this->input->post("KEGIATAN"),
                'jumlah_sks' => 0,
                'tempat_berkas' => $this->input->post("TEMPAT"),
                'tanggal_berkas' => $this->input->post("TANGGAL"),
                'tahun_upload' => mdate($format),
                'path' => $config['upload_path'],
                'Keterangan' => "belum",
            );
        $this->peserta_crud->update_berkas($no2, $data);
        move_uploaded_file($_FILES['UPLOAD']['tmp_name'],$config['upload_path']."/".$s);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
            redirect(base_url("peserta/sertifikat")); 
        }
        redirect(base_url("peserta/profil")); 
    }

    public function lihat_id(){
    $no_peserta = $this->uri->segment(3);
    foreach($this->peserta_crud->get_peserta_id($no_peserta) as $hasil){
            $nama = $hasil->berkas;
            $path = $hasil->path;
        }    
    $file = $path."/".$nama;
    if($path == null || $path == ""){
        $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Direktori tidak ditemukan. </div>');
    }
    elseif($nama == null || $nama == ""){
        $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Peserta tidak mengupload berkas. </div>');        
    }
    else if(file_exists($file)){
        redirect(base_url($file));
    }
    else{
        $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> File berkas tidak ditemukan. </div>');
    }
        redirect(base_url("peserta/edit_berkas/".$no_peserta));
    }

    public function lihat_berkas(){
    $no_peserta = $this->uri->segment(3);
    $no_berkas = $this->uri->segment(4);
    $nama = $this->peserta_crud->get_nama_berkas($no_berkas);
    $path = $this->peserta_crud->get_path_berkas($no_berkas);
    $file = $path."/".$nama;
    if($path == null || $path == ""){
        $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Direktori tidak ditemukan. </div>');
    }
    elseif($nama == null || $nama == ""){
        $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Peserta tidak mengupload berkas. </div>');        
    }
    else if(file_exists($file)){
        redirect(base_url($file));
    }
    else{
        $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> File berkas tidak ditemukan. </div>');
    }
        redirect(base_url("peserta/edit_berkas/".$no_peserta));
    }    

    public function kartu(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),         
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/kartu_v');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }
    
    public function nilai(){
        $no_peserta = $this->uri->segment(3);
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),

            'kriteria' => $this->peserta_crud->get_kriteria(),

            'nilai' => $this->peserta_crud->get_nilai($no_peserta),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/nilai_v');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function hasil(){
        $no_peserta = $this->uri->segment(3);
        if(empty($this->peserta_crud->get_hasil($no_peserta))){
            $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'text' => "MAAF, HASIL SELEKSI BELUM KELUAR",
            'check' => "false",
            ); 
        }
        else{
            $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'text' => "HASIL SELEKSI SUDAH KELUAR, SILAHKAN DI PRINT",
            'check' => "true",
            ); 
        }   
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/hasil');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function semua(){
        $NO = $this->uri->segment(3);
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'id' => $this->peserta_crud->get_peserta_id($NO),
            'berkas' => $this->peserta_crud->get_peserta_berkas($NO),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('peserta/peserta_sidebar_v');
        $this->load->view('peserta/peserta_topbar_v');
        $this->load->view('peserta/semua');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function print_kartu(){
        $this->form_validation->set_rules('NO_PESERTA','no_peserta','required');
        $this->form_validation->set_rules('NAMA','nama','required');
        $this->form_validation->set_rules('KELAMIN','kelamin','required');
        $this->form_validation->set_rules('TTL','ttl','required');
        $this->form_validation->set_rules('TINGKAT','tingkat','required');
        $this->form_validation->set_rules('UNI','uni','required');
        $this->form_validation->set_rules('FAKUL','fakul','required');
	    $data2 = array(                  
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'no_peserta' => $this->input->post("NO_PESERTA"),
            'nama_peserta' => $this->input->post("NAMA"),
            'kelamin' => $this->input->post("KELAMIN"),
            'ttl' => $this->input->post("TTL"),
            'uni' => $this->input->post("UNI"),
            'fakultas' => $this->input->post("FAKUL"), 
            'path' => $this->peserta_crud->get_path($this->input->post("NO_PESERTA")),
            'foto' => $this->peserta_crud->get_foto($this->input->post("NO_PESERTA")), 
            );
        $this->pdf2->setPaper('A5', 'landscape');
        $this->pdf2->filename = "Kartu_Peserta.pdf";
        $this->pdf2->load_view('peserta/report/kartu',$data2);
	}

    public function report_hasil() {
        if($this->peserta_crud->get_hasil($this->uri->segment(3)) == null){
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Maaf! Hasil belum keluar. </div>');
            redirect(base_url("peserta/hasil"));
        }
        else{
            $data = array(                  
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'hasil1' => $this->peserta_crud->get_hasil($this->uri->segment(3)),
            );
        $this->pdf2->setPaper('A4', 'portrait');
        $this->pdf2->filename = "Data_Nilai_Peserta.pdf";
        $this->pdf2->load_view('peserta/report/report_nilai',$data);
        } 
	}

    public function report_semua() {    
        $no = $this->uri->segment(3);
        $data = array(                  
            'profile' => $this->peserta_crud->get_data($this->session->userdata("email")),
            'id' => $this->peserta_crud->get_peserta_id($no),
            'berkas' => $this->peserta_crud->get_peserta_berkas($no),
            );
        $this->pdf2->setPaper('A4', 'landscape');
        $this->pdf2->filename = "Laporan_Evaluasi_Kinerja.pdf";
        $this->pdf2->load_view('peserta/report/report_semua',$data);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Auth'));
    }

}