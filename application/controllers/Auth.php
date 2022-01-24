<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

	public function __construct()
	{
		parent :: __construct();
		$this->load->library('form_validation');
		$this->load->model('admin_login');
		$this->load->model('peserta_login');
		$this->load->model('admin_crud');
		$this->load->model('peserta_crud');
		$this->load->helper(array('form', 'url'));
	}

	public function index(){		
		$data['title'] = 'Login';
		$this->load->view('_part/login_head', $data);
		$this->load->view('login_v');
		$this->load->view('_part/login_footer');
	}

	public function forgotpass(){
		$data['title'] = 'Recovery password';
		$this->load->view('_part/login_head', $data);
		$this->load->view('forgotpass_v');
		$this->load->view('_part/login_footer');
	}

	public function register(){
		$data['title'] = 'Create Account';
		$this->load->view('_part/login_head', $data);
		$this->load->view('register_v');
		$this->load->view('_part/login_footer');
	}

	public function aksi_login(){
	$email 		= $this->input->post('email');
	$password 	= md5($this->input->post('pass'));
	$where = array(
		'email' => $email,
		'pass' => $password,
		);
	$cek = $this->admin_login->cek_login("admin",$where)->num_rows();
	$cek2 = $this->peserta_login->cek_login("anggota",$where)->num_rows();			
		if($cek > 0 && $cek2 == 0){
			$data_session = array(
				'email' => $email,
				'status' => "login"
			); 
			$this->session->set_userdata($data_session); 
			//echo "login as admin";
			redirect(base_url("Admin"));					
		}			
		elseif($cek == 0 && $cek2 > 0){
			$data_session = array(
				'email' => $email,
				'status' => "login"
				); 
			$this->session->set_userdata($data_session); 
			//echo "login as peserta";
			redirect(base_url("Peserta"));
		}		
		else{						
			$this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Login Gagal. </div>');
			redirect('Auth/index');
		}
	}

	public function simpan(){
		$nama = $this->input->post('nama');	
		$kelamin  = $this->input->post("kelamin");
		$tempat = $this->input->post("tempat");
		$tanggal = $this->input->post("tanggal");
		$agama  = $this->input->post("agama");
		$alamat  = $this->input->post("alamat");
		$telp  = $this->input->post("telp");
		$email = $this->input->post('email');
		$pass1 = $this->input->post('pass');
		$pass2 = $this->input->post('pass2');
		$foto = $_FILES['jpg']['name'];
		if(!is_dir("./assets/berkas/".str_replace(' ', '_', $nama))){
            mkdir("./assets/berkas/".str_replace(' ', '_', $nama));
        }else{           
        } 		
		$new_foto = str_replace(' ', '_', $foto);
		$config['encrypt_name'] = TRUE;	
		$config['upload_path']   = './assets/berkas/'.str_replace(' ', '_', $nama);
		$config['max_size']      = 1000;//Satuan KB
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if($nama == null || $kelamin == null || $agama == null || $alamat == null || $telp == null || $email == null || $pass1 == null || $pass2 == null){
			$this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Isi data anda secara lengkap. </div>');
			redirect('Auth/register');
		}elseif($pass2 != $pass1){
			$this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Harap tulis ulang password anda dengan benar. </div>');
			redirect('Auth/register');
		}
		else{
			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('kelamin','Kelamin','required');
			$this->form_validation->set_rules('tempat','Tempat','required');
			$this->form_validation->set_rules('tanggal','Tanggal','required');
			$this->form_validation->set_rules('agama','Agama','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('telp','Telp','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('pass','Password','required');
			$no = $this->peserta_crud->get_max_no();
			if($no == null){
				$no = 1;
				$no_peserta = 20200000 + $no;
			}
			else{
				$no_peserta = 20200000 + 1 + $no;
			}
			if($this->form_validation->run() != false){
				$data = array(
				'no_peserta' => $no_peserta,
				'nama_peserta' => $nama,
				'jenis_kelamin' => $kelamin,
				'tempat_lahir' => $tempat,
				'tanggal_lahir' => $tanggal,
				'agama' => $agama,
				'alamat' => $alamat,
				'telp' => $telp,
				'email' => $email,
				'pass' => md5($pass1),
				'foto' => $new_foto,
				'ijazah' => '',
				'path' => $config['upload_path'],
				'status_berkas' => 'tidak_valid',
				'keterangan' => 'belum',
			);
			move_uploaded_file($_FILES['jpg']['tmp_name'],$config['upload_path']."/".$_FILES['jpg']['name']);
			rename($config['upload_path']."/".$_FILES['jpg']['name'],$config['upload_path']."/".$new_foto);
			$this->peserta_crud->simpan($data);
			$this->session->set_flashdata('notif', '<div class=" alert alert-success alert-dismissble"> Success! Data berhasil disimpan di Database. </div>');
			redirect('Auth/index');
			}else{
				$this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Login Gagal. </div>');
				redirect('Auth/register');
			}
		}
	}

	public function reset(){
		$email = $this->input->post('email');		
			$where = array(
			'email' => $email,
			);
			$cek = $this->peserta_login->cek_login("anggota",$where)->num_rows();			
			if($cek == 0 || $email == null){
				//echo "gagal";
				$this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Email tidak tersedia. </div>');
					redirect('Auth/forgotpass');				
			}
			else{
				echo "sukses";
				$data = "abc";
				$this->peserta_crud->update_pass(md5($data),$email);
				$this->session->set_flashdata('notif', '<div class=" alert alert-warning alert-dismissble"> Reset berhasil. Password baru anda adalah <strong>abc</strong> </div>');
					redirect('Auth/index');
		}			
	}	

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Auth'));
	}
}