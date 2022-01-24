<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

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
        $this->load->model('admin_crud');
        $this->load->dbutil();
        $this->load->helper(array('form', 'url', 'file', 'date'));
    }

    public function index(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/admin_v');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function peserta(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'daftar' => $this->admin_crud->get_peserta(),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/daftar_peserta');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function berkas(){
    $no = $this->uri->segment(3);
    $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'nama' => $this->admin_crud->get_nama($no),
            'id' => $this->admin_crud->get_peserta_id($no),
            'berkas' => $this->admin_crud->get_berkas($no),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/berkas');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function lihat_id(){
    $no_peserta = $this->uri->segment(3);
    foreach($this->admin_crud->get_peserta_id($no_peserta) as $hasil){            
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
        redirect(base_url("admin/berkas/".$no_peserta));
    }

    public function id_valid(){
    $no_peserta = $this->uri->segment(3);   
    $ket = "benar";
    $this->admin_crud->id_validate($no_peserta, $ket);    
    redirect(base_url("admin/berkas/".$no_peserta));
    }

    public function id_tidak_valid(){
    $no_peserta = $this->uri->segment(3);
    $ket = "salah";
    $this->admin_crud->id_validate($no_peserta, $ket);
    redirect(base_url("admin/berkas/".$no_peserta));
    }

    public function lihat_berkas(){
    $no_peserta = $this->uri->segment(3);
    $no_berkas = $this->uri->segment(4);
    $nama = $this->admin_crud->get_nama_berkas($no_berkas);
    $path = $this->admin_crud->get_path_berkas($no_berkas);
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
        redirect(base_url("admin/berkas/".$no_peserta));
    }

    public function berkas_valid(){
    $no_peserta = $this->uri->segment(3);
    $s_peserta = $this->admin_crud->get_ijazah_peserta($no_peserta);
    $no_berkas = $this->uri->segment(4);
    $s_berkas = $this->admin_crud->get_sarjana_berkas($no_peserta, $no_berkas);
    $s = "";    
    if($s_peserta == "" && ($s_berkas == "S1" || $s_berkas == "S2" || $s_berkas == "S3")){
        $s = $s_berkas;
    } elseif($s_peserta == "S1" && ($s_berkas == "S2" || $s_berkas == "S3")){
        $s = $s_berkas;
    } elseif($s_peserta == "S2" && $s_berkas == "S3"){
        $s = $s_berkas;
    } else{
        $s = $s_peserta;
    }    
    $ket = "benar";
    $this->admin_crud->berkas_valid($no_peserta, $no_berkas, $ket);
    $this->admin_crud->update_sarjana_peserta($no_peserta, $s);
    redirect(base_url("admin/berkas/".$no_peserta));
    }

    public function berkas_tidak_valid(){
    $no_peserta = $this->uri->segment(3);
    $no_berkas = $this->uri->segment(4);
    $ket = "salah";
    $this->admin_crud->berkas_tidak_valid($no_peserta, $no_berkas, $ket);
    redirect(base_url("admin/berkas/".$no_peserta));
    }

    public function berkas_validation(){
    $no_peserta = $this->uri->segment(3);    
    $status = "valid";
    $this->admin_crud->berkas_validation($no_peserta, $status);
    $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Berkas telah divalidasi. </div>');
    redirect(base_url("admin/berkas/".$no_peserta));
    }

    public function perbaikan(){
    $no_peserta = $this->uri->segment(3);
    $nama_peserta = $this->admin_crud->get_nama($no_peserta);
    $no_berkas = $this->uri->segment(4);
    $nama_berkas = $this->admin_crud->get_nama_berkas($no_berkas);
    $pesan = "Kepada Peserta ".$nama_peserta.
    " Berkas anda yang berjudul ".$nama_berkas." kurang tepat. Harap segera kirim ulang.";
    $format = "%Y-%m-%d";
    $data = array(          
            'nama_peserta' => $nama_peserta,         
            'no_peserta' => $no_peserta,
            'no_berkas' => $no_berkas,
            'pesan' => $pesan,
            'tanggal_pesan' => mdate($format),
            'keterangan' => "unread",
            );
    $this->admin_crud->pesan($data);            
    redirect(base_url("admin/berkas/".$no_peserta));
    }

    public function perbaikan2(){
    $no_peserta = $this->uri->segment(3);
    foreach($this->admin_crud->get_peserta_id($no_peserta) as $hasil){            
            $nama = $hasil->nama_peserta;                    
        }     
    $pesan = "Kepada Peserta ".$nama." Harap segera kirim ulang berkas identitas anda.";
    $format = "%Y-%m-%d";
    $data = array(          
            'nama_peserta' => $nama,         
            'no_peserta' => $no_peserta,
            'no_berkas' => "",
            'pesan' => $pesan,
            'tanggal_pesan' => mdate($format),
            'keterangan' => "unread",
            );
    $this->admin_crud->pesan($data);            
    redirect(base_url("admin/berkas/".$no_peserta));
    }

    public function kinerja(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'kinerja' => $this->admin_crud->get_kinerja(),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/kinerja/kinerja_v');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function tambah_kinerja(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/kinerja/tambah_kinerja');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');       
    }

    public function edit_kinerja($NO)
    {
        $ID = $this->uri->segment(3);

        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'get' => $this->admin_crud->edit_kinerja($NO),    
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/kinerja/edit_kinerja');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function simpan_kinerja(){               
        $this->form_validation->set_rules('NAMA','nama','required');                 
        if($this->form_validation->run() != false){
            $data = array(            
            'nama_kinerja' => $this->input->post("NAMA"),            
        );
        $this->admin_crud->simpan_kinerja($data);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
        $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
        }
        redirect(base_url("admin/kinerja"));             
    }

    public function update_kinerja(){
        $no    = $this->input->post("NO");                
        $nama  = $this->input->post("NAMA");
        if($nama == null || $nama == ""){
            $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
            redirect(base_url("admin/edit_kinerja/".$no));
        }else{
            $this->admin_crud->update_kinerja($nama,$no);
            $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
            redirect(base_url("admin/kinerja"));     
        }                                    
    }        

    public function kinerja_peserta(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'kinerja' => $this->admin_crud->get_kinerja(),
            'nilai'   => $this->admin_crud->get_kinerja_peserta(),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/kinerja_peserta/kinerja_peserta_v');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

     public function tambah_kinerja_peserta(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'peserta' => $this->admin_crud->get_peserta(),
            'kinerja' => $this->admin_crud->get_kinerja(),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/kinerja_peserta/tambah_kinerja_peserta');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function edit_kinerja_peserta(){
        $no = $this->uri->segment(3);
        $n = 1;
        foreach($this->admin_crud->get_kinerja_peserta() as $hasil){
            if($hasil->no_peserta == $no){
            $nama = $hasil->nama_peserta;
            $kinerja[$n] = $hasil->nama_kinerja;
            $score[$n] = $hasil->score;
            $n++;
            }            
        }
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'peserta' => $nama,
            'no_peserta' => $no,
            'kinerja' => $kinerja,            
            'score' => $score,
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/kinerja_peserta/edit_kinerja_peserta');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function simpan_kinerja_peserta(){        
        $this->form_validation->set_rules('NO','no','required');
        $no = $this->input->post("NO");
        $check = "belum";
        foreach($this->admin_crud->get_kinerja_peserta() as $hasil){
            if($hasil->no_peserta == $no){
            $check = "sudah";
            }            
        }       
        $count = $this->admin_crud->get_jumlah_kinerja();        
        $poin = 0;
        $ket = "";
        if($no == null || $no == "" || $no == "0"){
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Maaf! Harap pilih nama peserta yang ingin dimasukkan nilai kinerja. </div>'); 
            redirect(base_url("admin/tambah_kinerja_peserta"));
        }else{
            for($no2 = 1; $no2 <= $count; $no2++){            
                $score = $this->input->post($no2);
                if(intval($score) == null || intval($score) == 0){
                    $score = 0;
                }elseif($score > 100){
                    $score = 100; 
                }
                $data = array(
                        'no_peserta' => $this->input->post("NO"),
                        'nama_peserta' => $this->admin_crud->get_nama($this->input->post("NO")),
                        'jenis_kelamin' => $this->admin_crud->get_jenis_kelamin($this->input->post("NO")),
                        'nama_kinerja' => $this->input->post("K".$no2),
                        'score' => $score
                    );
                    if($check == "belum"){
                        $this->admin_crud->simpan_kinerja_peserta($data);
                    }else{
                    $nama_kinerja = $this->input->post("K".$no2);
                    $this->admin_crud->update_kinerja_peserta($no, $nama_kinerja, $data);   
                    }
                $poin += $score;            
            }
        $new = $poin/$count;
        if($this->form_validation->run() != false){        
        $this->admin_crud->update_score_peserta($no, $new);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');        
        }else{
        $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>'); 
        }
        redirect(base_url("admin/kinerja_peserta"));
        }                
    }

    public function update_kinerja_peserta(){        
        $this->form_validation->set_rules('NO','no','required');
        $no = $this->input->post("NO");       
        $count = $this->admin_crud->get_jumlah_kinerja();        
        $poin = 0;
        $ket = "";        
        for($no2 = 1; $no2 <= $count; $no2++){            
            $score = $this->input->post($no2);
            if(intval($score) == null || intval($score) == 0){
                $score = 0;
            }elseif($score > 100){
                $score = 100; 
            }
            $data = array(
                    'no_peserta' => $this->input->post("NO"),
                    'nama_peserta' => $this->admin_crud->get_nama($this->input->post("NO")),
                    'jenis_kelamin' => $this->admin_crud->get_jenis_kelamin($this->input->post("NO")),
                    'nama_kinerja' => $this->input->post("K".$no2),
                    'score' => $score
                );
            $nama_kinerja = $this->input->post("K".$no2);
            $this->admin_crud->update_kinerja_peserta($no, $nama_kinerja, $data);
            $poin += $score;            
        }
        $new = $poin/$count;
        if($this->form_validation->run() != false){        
        $this->admin_crud->update_score_peserta($no, $new);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');        
        }else{
        $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>'); 
        }
        redirect(base_url("admin/kinerja_peserta"));
    }

    public function set_batas(){
        $jumlah = $this->admin_crud->get_jumlah_peserta();
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'max_peserta' => $this->admin_crud->get_jumlah_peserta(),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/batas');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function simpan_batas(){
        $this->form_validation->set_rules('MAX','max','required');
        $format = "%Y-%m-%d";        
        $no = 1;
            foreach($this->admin_crud->get_data($this->session->userdata("email")) as $hasil){        	                
                $kode = $hasil->kode_admin;
                $admin = $hasil->nama;
            }         
        if($this->form_validation->run() != false){
            $data = array(
                'kode_admin' => $kode,
                'nama_admin' => $admin,
                'jumlah_peserta' => $this->input->post("JLH"),
                'batas' => $this->input->post("MAX"),
                'tanggal_upload' => mdate($format),
            );
            $this->admin_crud->simpan_batas($data);
            $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
        }
        redirect(base_url("admin/set_batas"));
    }

    public function kriteria(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),

            'kriteria' => $this->admin_crud->get_kriteria(),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/kriteria/kriteria_v');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function tambah_kriteria(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),

            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/kriteria/tambah_kriteria');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');       
    }

    public function edit_kriteria($NO)
    {
        $ID = $this->uri->segment(3);

        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),

            'get' => $this->admin_crud->edit_kriteria($NO),    
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/kriteria/edit_kriteria');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

     public function simpan_kriteria(){
        $this->form_validation->set_rules('KODE','kode','required');
        $this->form_validation->set_rules('NAMA','nama','required');
        $this->form_validation->set_rules('BOBOT','bobot','required');         
        if($this->form_validation->run() != false){
            $data = array(
            'kode' => $this->input->post("KODE"),
            'nama_kriteria' => $this->input->post("NAMA"),
            'Tipe' => $this->input->post("TIPE"),
            'bobot' => $this->input->post("BOBOT"),
        );
        $this->admin_crud->simpan_kriteria($data);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
        $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
        }
        redirect(base_url("admin/kriteria"));             
    }

    public function update_kriteria(){
        $no    = $this->input->post("NO");        
        $kode  = $this->input->post("KODE");    
        $nama  = $this->input->post("NAMA");
        $Tipe  = $this->input->post("TIPE");
        $bobot = $this->input->post("BOBOT");                        
        $this->admin_crud->update_kriteria($kode,$nama,$Tipe,$bobot,$no);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        redirect(base_url("admin/kriteria"));     
    }

    public function crips(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),

            'crips' => $this->admin_crud->get_crips(),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/crips/crips_v');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function tambah_crips(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),

            'nama' => $this->admin_crud->get_kriteria(),

            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/crips/tambah_crips');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');       
    }

    public function simpan_crips(){
        $this->form_validation->set_rules('NO','no','required');
        $this->form_validation->set_rules('CRIPS','crips','required');
        $this->form_validation->set_rules('NILAI','nilai','required');        
        if($this->form_validation->run() != false){
            $data = array(
            'nama_kriteria' => $this->admin_crud->no_kriteria($this->input->post("NO")),
            'nama_crips' => $this->input->post("CRIPS"),
            'nilai' => $this->input->post("NILAI"),
        );
        $this->admin_crud->simpan_crips($data);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        }else{
        $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
        }
        redirect(base_url("admin/crips"));     
    }

    public function edit_crips($NO)
    {
        $NO = $this->uri->segment(3);

        $data = array(
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),

            'get' => $this->admin_crud->edit_crips($NO),    
        );  
        
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/crips/edit_crips');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

        public function update_crips(){
        $no    = $this->input->post("NO");        
        $crips  = $this->input->post("CRIPS");    
        $nilai  = $this->input->post("NILAI");                       
        $this->admin_crud->update_crips($crips,$nilai,$no);
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        redirect(base_url("admin/crips"));     
    } 

    public function perhitungan(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'peserta' => $this->admin_crud->get_peserta(),
            'kinerja' => $this->admin_crud->get_kinerja(),
            'kriteria' => $this->admin_crud->get_kriteria(),
            'kode' =>  $this->admin_crud->get_crips(),         
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/perhitungan');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function kriteria_value(){        
        $no=$_GET['no'];
        foreach($this->admin_crud->get_peserta() as $peserta){
            if($peserta->no_peserta == $no){
                $ijazah = $peserta->ijazah;
                $score = $peserta->score;
            }
        }
        foreach($this->admin_crud->get_berkas($no) as $berkas){
            if($berkas->jenis_berkas == "sertifikat"){
                $file = $berkas->path."/".$berkas->nama_berkas;
                break;
            }else{
                $file = "";
            }            
        }
        $a = 1;                
        foreach($this->admin_crud->get_kriteria() as $hasil){
            foreach($this->admin_crud->get_crips() as $value){
                if($hasil->nama_kriteria == "Pendidikan Terakhir"){
                    if($value->nama_crips == $ijazah){
                        $data["PT"] = $value->nama_crips;
                    }
                }
                elseif($hasil->nama_kriteria == "Memiliki Prestasi"){
                    if(file_exists($file)){
                        if($value->nama_crips == "Ya"){
                            $data["Prestasi"] = $value->nama_crips;
                        }
                    }else{
                        if($value->nama_crips == "Tidak"){
                           $data["Prestasi"] = $value->nama_crips;
                        }
                    }                    
                }
                elseif($hasil->nama_kriteria == "Score Kinerja"){
                    if($score >= 70){
                        if($value->nama_crips == "Sama atau Di atas 70"){
                            $data["Score"] = $value->nama_crips;
                        }
                    }else{
                        if($value->nama_crips == "Di bawah 70"){
                           $data["Score"] = $value->nama_crips;
                        }
                    }
                }
            }
            $a++;            
        }       
        echo json_encode($data);
    }

    public function simpan_nilai(){
        $this->form_validation->set_rules('NO_PESERTA','no_peserta','required');                        
        if($this->input->post("NO_PESERTA") == "0"){
            $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Mohon lengkapi data peserta. </div>');
        }
        else{
            //Input
            $no = 1;
            foreach($this->admin_crud->get_kriteria() as $hasil){        	                
                if($this->input->post($no) == "0"){
                    $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Mohon lengkapi data kriteria. </div>');
                    redirect(base_url("admin/perhitungan"));
                }
                else{
                    $this->form_validation->set_rules($no,$no,'required');
                }
        	    $no++;
            }
            //Check Value
            $check = $this->admin_crud->get_nama($this->input->post("NO_PESERTA"));
            $check2 = $this->admin_crud->nilai_nama_check($check);
            //Jika nama peserta tidak terdaftar
            if($check2 == "tidak ada"){                
        	    for($no4 = 1; $no4 < $no; $no4++){
        		    if($this->form_validation->run() != false){
				    $data = array(
            	    'peserta' => $this->admin_crud->get_nama($this->input->post("NO_PESERTA")),
                    'no_peserta' => $this->input->post("NO_PESERTA"),
                    'jenis_kelamin' => $this->admin_crud->get_jenis_kelamin($this->input->post("NO_PESERTA")),
            	    'nama_kriteria' => $this->admin_crud->kriteria_crips($this->input->post($no4)),
            	    'nama_crips' => $this->admin_crud->crips($this->input->post($no4)),
            	    'nilai' => $this->admin_crud->nilai_crips($this->input->post($no4)), 
        	        );
					$this->admin_crud->simpan_nilai($data);
       				$this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
				    }else{
					$this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
				    }
                }
            }
        //Jika nama peserta Terdaftar
            else{
                for($no3 = 1; $no3 < $no; $no3++){
        	        if($this->form_validation->run() != false){
        	        //Input
        		        $data2 = array(
            		        'peserta' => $this->admin_crud->get_nama($this->input->post("NO_PESERTA")),
                            'no_peserta' => $this->input->post("NO_PESERTA"),
            		        'nama_kriteria' => $this->admin_crud->kriteria_crips($this->input->post($no3)),
            		        'nama_crips' => $this->admin_crud->crips($this->input->post($no3)),
            		        'nilai' => $this->admin_crud->nilai_crips($this->input->post($no3)), 
        		        );
        		        $check3 = $this->admin_crud->kriteria_crips($this->input->post($no3));
        		        $check4 = $this->admin_crud->nilai_kriteria_check($check3);
        			    //Jika kriteria yang dimasukkan ada di database
        			    if($check4 == "ada"){
                            $this->admin_crud->update_nilai($data2['peserta'],$data2['no_peserta'],$data2['nama_kriteria']
                            ,$data2['nama_crips'],$data2['nilai']);
       					    $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil diupdate di Database. </div>');	
        			    }else{
        				    $this->admin_crud->simpan_nilai($data2);
        					$this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
        			    }           	
                    }else{
                    $this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Gagal! Data anda kurang lengkap. </div>');
                    redirect(base_url("admin/perhitungan"));	
                    }
		        }		        
            }
        }
        redirect(base_url("admin/perhitungan")); 
    }

    public function nilai(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),

            'kriteria' => $this->admin_crud->get_kriteria(),

            'nilai' => $this->admin_crud->get_nilai(),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/nilai_v');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }    

    public function hitung(){
    	$a = 1;
    	foreach($this->admin_crud->get_kriteria() as $hasil){        
			if($hasil->Tipe == "MAX"){
				$bobotmax[$a] = $hasil->bobot;
				$bobotmin[$a] = "";
				$max[$a] = $this->admin_crud->get_max($hasil->nama_kriteria);
				$min[$a] = "tidak ada";
			}
			else{
				$bobotmin[$a] = $hasil->bobot;
				$bobotmax[$a] = "";
				$min[$a] = $this->admin_crud->get_min($hasil->nama_kriteria);
				$max[$a] = "tidak ada";
			}
			$a++;
    	}        
        $no = 1;
        $previous1 = null;
        $current = null;
        foreach($this->admin_crud->get_nilai() as $hasil){
        	if($previous1 == null) {
        		$previous1 = $hasil->peserta;
        		$nama_peserta[$no] = $hasil->peserta;
                $no_peserta[$no] = $hasil->no_peserta;
                $jenis_kelamin[$no] = $hasil->jenis_kelamin;
            	$no2 = 1;            	
            	foreach($this->admin_crud->get_nilai() as $hasil2){
            		if($previous1 == $hasil2->peserta){
            			if($this->admin_crud->tipe_kriteria($hasil2->nama_kriteria) == "MAX"){
            			$normal[$no2] = round($hasil2->nilai/$max[$no2],2);
            			$jumlah[$no2] = round($normal[$no2]*$bobotmax[$no2],2);            				
            			}
            			else{
            			$normal[$no2] = round($min[$no2]/$hasil2->nilai,2);
            			$jumlah[$no2] = round($normal[$no2]*$bobotmin[$no2],2);            				
            			}
            			$total[$no] = array_sum($jumlah);            		}
            		else{
            			continue;
            		}
            		$no2++;
            	}
        	}
        	elseif($previous1 == $hasil->peserta){
        		continue;
        	}
        	else{
        		$current = $hasil->peserta;
        		$nama_peserta[$no] = $hasil->peserta;
                $no_peserta[$no] = $hasil->no_peserta;
                $jenis_kelamin[$no] = $hasil->jenis_kelamin;
            	$no3 = 1;            	
            	foreach($this->admin_crud->get_nilai() as $hasil3){
            		if($current == $hasil3->peserta){
            			if($this->admin_crud->tipe_kriteria($hasil3->nama_kriteria) == "MAX"){
            			$normal2[$no3] = round($hasil3->nilai/$max[$no3],2);
            			$jumlah2[$no3] = round($normal2[$no3]*$bobotmax[$no3],2);
            			}
            			else{
            			$normal2[$no3] = round($min[$no3]/$hasil3->nilai,2);
            			$jumlah2[$no3] = round($normal2[$no3]*$bobotmin[$no3],2);
            			}
            			$total[$no] = array_sum($jumlah2);            			
            		}
            		else{
            			continue;
            		}
            	$previous1 = $hasil->peserta;
            	$no3++;
            	}
        	}
        	$data = array(          
            'no_peserta'     => $no_peserta[$no],         
            'nama_peserta' => $nama_peserta[$no],
            'jenis_kelamin' => $jenis_kelamin[$no],
            'total' => $total[$no],
            'keterangan' => "",
            ); 
			$this->admin_crud->simpan_temp($data);                    	
        	$no++;
        }                           
        $max = $this->admin_crud->get_batas_data();
        $no4 = 1;
            foreach($this->admin_crud->get_temp() as $hasil){
                $now = "belum";                
                if($hasil == null){
                    continue;
                }
                elseif($no4 <= $max){                    
                    $data2 = array(          
                        'no_peserta'     => $hasil->no_peserta,         
                        'nama_peserta' => $hasil->nama_peserta,
                        'jenis_kelamin' => $hasil->jenis_kelamin,
                        'keterangan' => "lulus",
                        );
                    $sarjana = $this->admin_crud->get_ijazah_peserta($hasil->no_peserta);
                    if($sarjana == "S1"){
                        $now = "3A";
                    } elseif($sarjana == "S2"){
                        $now = "3B";
                    } elseif($sarjana == "S3"){
                        $now = "3C";
                    }
                    $this->admin_crud->update_keterangan_peserta($hasil->no_peserta, $now);
                    $no4++;
                    $this->admin_crud->simpan_lulus($data2);
                }
                else{
                    $data2 = array(          
                        'no_peserta'     => $hasil->no_peserta,         
                        'nama_peserta' => $hasil->nama_peserta,
                        'jenis_kelamin' => $hasil->jenis_kelamin,
                        'keterangan' => "gagal",
                        );
                    $this->admin_crud->simpan_gagal($data2);
                }
            }             
        $this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Perhitungan telah selesai. Silahkan cek Pengumuman </div>');
        $this->admin_crud->hapus_temp();
        redirect(base_url("admin/nilai"));
    }

    public function lulus(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'lulus' => $this->admin_crud->get_lulus(),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/lulus');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function gagal(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'gagal' => $this->admin_crud->get_gagal(),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/gagal');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function hasil_ujian(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'kriteria' => $this->admin_crud->get_kriteria(),
            'nilai' => $this->admin_crud->get_nilai(),
            'lulus' => $this->admin_crud->get_lulus(),
            'gagal' => $this->admin_crud->get_gagal(),
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/hasil_ujian');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }
    
    public function hitung_pangkat(){
        $data = array(          
            'title'     => 'SISTEM PEMILIHAN TENAGA DOSEN UNIVERSITAS LAMBUNG MANGKURAT',         
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'peserta' => $this->admin_crud->get_peserta(),
            'id' => $this->admin_crud->get_identitas(),
            'lulus' => $this->admin_crud->get_lulus(),        
            );
        $this->load->view('_part/backend_head', $data);
        $this->load->view('admin/admin_sidebar_v');
        $this->load->view('admin/admin_topbar_v');
        $this->load->view('admin/hitung_pangkat');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }

    public function hapus_peserta(){        
        $no['NO']    = $this->uri->segment(3);
        $no_peserta  = $this->admin_crud->get_no_peserta2($this->uri->segment(3));
        $path        = $this->admin_crud->get_path($this->uri->segment(3));
        $check       = $this->admin_crud->berkas_check($no_peserta);
        if($check == "ada"){
            $path_berkas = $this->admin_crud->get_path_berkas2($no_peserta);
            if(!is_dir($path_berkas)){            
            }else{
            delete_files($path_berkas, true);
            rmdir($path_berkas);
            $this->admin_crud->hapus_berkas($no_peserta);            
            }
        }                                     
        if(is_dir($path)){
            delete_files($path, true);
            rmdir($path);
        }
        $this->admin_crud->hapus_nilai($no);
        $this->admin_crud->hapus_peserta($no);            
        redirect('admin/peserta');
    }

    public function hapus_kinerja($NO){
        $no['NO']= $this->uri->segment(3);                
        $this->admin_crud->hapus_kinerja($no);               
        redirect('admin/kinerja');
    }

    public function hapus_semua_kinerja(){        
        $this->admin_crud->hapus_semua_kinerja();
        redirect('admin/kinerja');
    }

    public function hapus_kinerja_peserta(){
        $no['no_peserta']= $this->uri->segment(3);                
        $this->admin_crud->hapus_kinerja_peserta($no);               
        redirect('admin/kinerja_peserta');
    }

    public function hapus_semua_kinerja_peserta(){        
        $this->admin_crud->hapus_semua_kinerja_peserta();
        redirect('admin/kinerja_peserta');
    }

    public function hapus_kriteria($NO){
        $no['NO']= $this->uri->segment(3);
        $this->admin_crud->hapus_kriteria_crips($this->admin_crud->no_kriteria($this->uri->segment(3)));
        $this->admin_crud->hapus_kriteria_nilai($this->admin_crud->no_kriteria($this->uri->segment(3)));
        $this->admin_crud->hapus_kriteria($no);               
        redirect('admin/kriteria');
    }

    public function hapus_semua_kriteria(){
    	$this->admin_crud->hapus_semua_crips();
        $this->admin_crud->hapus_semua_kriteria();
        redirect('admin/kriteria');
    }    

    public function hapus_crips($NO){
        $no['NO']= $this->uri->segment(3);
        $this->admin_crud->hapus_crips($no);
        redirect('admin/crips');
    }

    public function hapus_semua_crips(){
        $this->admin_crud->hapus_semua_crips();
        redirect('admin/kriteria');
    }    

    public function hapus_nilai(){
        $no['no_peserta']= $this->uri->segment(3);
        $this->admin_crud->hapus_nilai($no);
        redirect('admin/nilai');
    }

    public function hapus_semua_nilai(){        
        $this->admin_crud->hapus_semua_nilai();
        redirect('admin/nilai');
    }    

    public function hapus_lulus(){
        $no_peserta['no_peserta']= $this->uri->segment(3);
        $this->admin_crud->hapus_lulus($no_peserta);
        redirect('admin/lulus');
    }

    public function hapus_semua_lulus(){
        $this->admin_crud->hapus_semua_lulus();
        redirect('admin/lulus');
    }       

    public function hapus_gagal(){
        $no_peserta['no_peserta']= $this->uri->segment(3);
        $this->admin_crud->hapus_gagal($no_peserta);
        redirect('admin/gagal');
    }

    public function hapus_semua_gagal(){
        $this->admin_crud->hapus_semua_gagal();
        redirect('admin/gagal');
    }

    public function hapus_semua_hasil(){                
        $this->admin_crud->hapus_semua_lulus();
        $this->admin_crud->hapus_semua_gagal();
        redirect('admin/hasil_ujian');
    }    

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Auth'));
    }

    public function report_peserta() {
        $data = array(          
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'daftar' => $this->admin_crud->get_peserta(),
            );
        $this->pdf2->setPaper('A4', 'landscape');
        $this->pdf2->filename = "Daftar_Peserta.pdf";
        $this->pdf2->load_view('admin/report/report_peserta',$data);
    }

    public function report_kinerja() {	
	    $data = array(                   
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'kinerja' => $this->admin_crud->get_kinerja(),
            );
        $this->pdf2->setPaper('A4', 'landscape');
        $this->pdf2->filename = "Daftar_kinerja.pdf";
        $this->pdf2->load_view('admin/report/report_kinerja',$data);
	}
    
    public function report_kinerja_peserta() {	
	    $data = array(                   
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'kinerja' => $this->admin_crud->get_kinerja(),
            'nilai'   => $this->admin_crud->get_kinerja_peserta(),
            );
        $this->pdf2->setPaper('A4', 'landscape');
        $this->pdf2->filename = "Daftar_kinerja_peserta.pdf";
        $this->pdf2->load_view('admin/report/report_kinerja_peserta',$data);
	}

	public function report_kriteria() {	
	    $data = array(                   
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'kriteria' => $this->admin_crud->get_kriteria(),
            );
        $this->pdf2->setPaper('A4', 'landscape');
        $this->pdf2->filename = "Daftar_Kriteria.pdf";
        $this->pdf2->load_view('admin/report/report_kriteria',$data);
	} 

	public function report_crips() {	
	    $data = array(            
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'crips' => $this->admin_crud->get_crips(),
            );
        $this->pdf2->setPaper('A4', 'landscape');
        $this->pdf2->filename = "Daftar_Crips.pdf";
        $this->pdf2->load_view('admin/report/report_crips',$data);
	}

    public function report_nilai() {	
	    $data = array(                  
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'kriteria' => $this->admin_crud->get_kriteria(),
            'nilai' => $this->admin_crud->get_nilai(),
            );
        $this->pdf2->setPaper('A4', 'landscape');
        $this->pdf2->filename = "Daftar_Nilai.pdf";
        $this->pdf2->load_view('admin/report/report_nilai',$data);
	}

    public function report_lulus() {	
	    $data = array(                  
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'lulus' => $this->admin_crud->get_lulus(),
            );
        $this->pdf2->setPaper('A4', 'landscape');
        $this->pdf2->filename = "Daftar_Lulus.pdf";
        $this->pdf2->load_view('admin/report/report_lulus',$data);
	}		

    public function report_gagal() {	
	    $data = array(                   
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'gagal' => $this->admin_crud->get_gagal(),
            );
        $this->pdf2->setPaper('A4', 'landscape');
        $this->pdf2->filename = "Daftar_Gagal.pdf";
        $this->pdf2->load_view('admin/report/report_gagal',$data);
	}

    public function report_hasil() {    
        $data = array(                  
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'kriteria' => $this->admin_crud->get_kriteria(),
            'nilai' => $this->admin_crud->get_nilai(),
            'lulus' => $this->admin_crud->get_lulus(),
            'gagal' => $this->admin_crud->get_gagal(),
            );
        $this->pdf2->setPaper('A3', 'landscape');
        $this->pdf2->filename = "Daftar_Hasil.pdf";
        $this->pdf2->load_view('admin/report/report_hasil',$data);
    }

    public function riwayat() {
        $data = array(          
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'batas' => $this->admin_crud->get_batas(),
            );
        $this->pdf2->setPaper('A4', 'landscape');
        $this->pdf2->filename = "riwayat.pdf";
        $this->pdf2->load_view('admin/report/riwayat',$data);
    }

    public function report_hitung_pangkat() {    
        $data = array(                  
            'profile' => $this->admin_crud->get_data($this->session->userdata("email")),
            'peserta' => $this->admin_crud->get_peserta(),
            'id' => $this->admin_crud->get_identitas(),
            'lulus' => $this->admin_crud->get_lulus(),
            );
        $this->pdf2->setPaper('A4', 'landscape');
        $this->pdf2->filename = "Laporan Pangkat.pdf";
        $this->pdf2->load_view('admin/report/report_hitung_pangkat',$data);
    }

}