<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){	
		parent::__construct();
		$this->load->model(array('user_m','member_m'));
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function signin()
	{
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$result = $this->user_m->getnama($user);
		if ($result->num_rows() > 0) {
			foreach ($result->result() as $k) {		
				// if ($this->encrypt->decode($k->password) == md5($pass)){ //menggunakan encrypt ci
				if ($k->password == md5($pass)) { //menggunakan md5
					$this->session->set_userdata('id_user',$k->id_user);
					$this->session->set_userdata('akses',$k->id_akses);
					$this->session->set_userdata('nama',$k->nama);
					$this->session->set_userdata('foto',$k->foto);
					$this->session->set_userdata('logged',true);
				} else {
					$this->session->set_flashdata('gagal','Username dan password salah.');
					redirect('login');
				}
			}
			redirect('welcome');
		}else{
					$this->session->set_flashdata('gagal','Username dan password salah.');
			redirect('login');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	public function m_login()
	{
		$id = $this->input->get('id');
		$pass = $this->input->get('nama');

		 $result = array();
		 $row = $this->member_m->getemail($id,md5($pass))->result_array();
		 if ($row) {
		 	array_push($result,array(
		 	"id_member"=> $row['0']['id_member']
		 	// ,"nama"=> $row['0']['nama'],
		 	// "foto"=> $row['0']['foto'],
		 	// "alamat"=> $row['0']['alamat'],
		 	// "telpon"=> $row['0']['telpon'],
		 	// "email"=> $row['0']['email'],
		 	// "poin"=> $row['0']['poin']
		 	));
		 }else{
			 array_push($result,array(
			 "id_member"=> null
		 	// ,"nama"=> null,
		 	// "foto"=> null,
		 	// "alamat"=> null,
		 	// "telpon"=> null,
		 	// "email"=> null,
		 	// "poin"=> null
			 ));
		}
		 echo json_encode(array('result'=>$result));
	}
	public function m_tambah()
	{
		$data = array(
		 		'id_member' => $this->id_oto(),
		 		'id_akses' => 4,
				'nama' => $this->input->post('nama'),
				'telpon' => $this->input->post('telpon'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				'poin' => 0,
				'status' => 1,
				'password' => md5($this->input->post('password')));
			
		if ($this->member_m->tambah($data)) {
			echo "success";
		}else{
			echo "fail";
		}
	}
	public function m_getmem()
	{
		$id = $this->input->get('id');
		$result = array();
		 $row = $this->member_m->getid($id)->result_array();
		 if ($row) {
		 	array_push($result,array(
		 	"id_member"=> $row['0']['id_member']
		 	,"nama"=> $row['0']['nama'],
		 	"foto"=> $row['0']['foto'],
		 	"alamat"=> $row['0']['alamat'],
		 	"telpon"=> $row['0']['telpon'],
		 	"email"=> $row['0']['email'],
		 	"password"=> $row['0']['password'],
		 	"poin"=> $row['0']['poin']
		 	));
		 }else{
			 array_push($result,array(
			 "id_member"=> null
		 	,"nama"=> null,
		 	"foto"=> null,
		 	"alamat"=> null,
		 	"telpon"=> null,
		 	"email"=> null,
		 	"password"=> null,
		 	"poin"=> null
			 ));
		}
		 echo json_encode(array('result'=>$result));
	}
	public function m_ubah()
	{
		$id = $this->input->post('id_member');
		$data = array(
			'nama' => $this->input->post('nama'),
			'telpon' => $this->input->post('telpon'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'));
		if ($this->member_m->ubah($id,$data)) {
			echo "Berhasil mengubah data";
		}else{
			echo "Gagal mengubah data";
		}
	}
	public function m_ubah_pass()
	{
		$id = $this->input->post('id_member');
		$res = $this->member_m->getid($id)->result_array();
		if ($res[0]['password']==md5($this->input->post('passwordn'))) {
			$data = array(
			'password' => md5($this->input->post('password')));
			if ($this->member_m->ubah($id,$data)) {
				echo "Berhasil mengubah password";
			}else{
				echo "Gagal mengubah password";
			}
		}else{
			echo "Gagal mengubah password bedaaa";
		}
	}
	public function id_oto()
	{
		$fix=0;
		$kode = 'MEM';
		$data = $this->member_m->get_id()->result();
		foreach ($data as $d) {
			$fix = $d->id_member;
		}
		if (substr($fix, 4, 6)==date('ymd')) {
			$angka = substr($fix, 11)+1;
			$angka_p = str_pad($angka,3,"0",STR_PAD_LEFT);
			$tgl_angk = substr($fix, 4, 7).$angka_p;
		}else{
			$tgl_angk = date('ymd').'_001';
		}
		return $kode_jadi= $kode.'_'.$tgl_angk;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */