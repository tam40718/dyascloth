<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

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
	public function __construct()
    {
		parent::__construct();
        if (!$this->session->userdata('logged'))
        { 
            redirect('login');
        }
		$this->load->model(array('member_m','akses_m'));
    }
	public function index()
	{
		$data['r_member'] = $this->member_m->get()->result_array();
		$data['r_akses'] = $this->akses_m->get()->result_array();

		$data['aktif']='member';
		$data['main']='member/member_l';
		$this->load->view('index',$data);
	}
	public function form_tambah()
	{
		$data['r_akses'] = $this->akses_m->get()->result_array();

		$data['aktif']='member';
		$data['main']='member/member_t';
		$this->load->view('index',$data);
	}
	public function tambah()
	{
		$new_name = 'abl_mbr_'.time();
		$config['file_name'] = $new_name;
		$config['upload_path'] = './assets/img/member/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2000;
        $config['max_width'] = 400000;
        $config['max_height'] = 400000;
		$this->load->library('upload', $config);
        if ($this->upload->do_upload())
		{
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];

			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/img/member/'.$nama_foto;
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 215;
			$config['height']       = 215;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$data = array(
		 		'id_member' => $this->id_oto(),
		 		'id_akses' => 4,
				'nama' => $this->input->post('nama'),
				'telpon' => $this->input->post('telpon'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				'foto' => $nama_foto,
				'poin' => 0,
				'status' => 1,
				'password' => md5($this->input->post('password')));

			$this->member_m->tambah($data);
			$this->session->set_flashdata('berhasil','Member baru telah ditambahkan.');
		    redirect('member');
		}else{
			$data = array(
		 		'id_member' => $this->id_oto(),
		 		'id_akses' => 4,
				'nama' => $this->input->post('nama'),
				'telpon' => $this->input->post('telpon'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				// 'foto' => $nama_foto,
				'poin' => 0,
				'status' => 1,
				'password' => md5($this->input->post('password')));
			
			$this->member_m->tambah($data);
			$this->session->set_flashdata('berhasil','Member baru telah ditambahkan.');
			$this->session->set_flashdata('gagal','Gambar gagal diunggah, mohon cek ukuran gambar.');
		    redirect('member');
		}
	}
	public function form_ubah($id)
	{
		$data['r_member'] = $this->member_m->getid($id)->result_array();

		$data['aktif']='member';
		$data['main']='member/member_u';
		$this->load->view('index',$data);
	}
	public function ubah()
	{
		$new_name = 'abl_mnu_'.time();
		$config['file_name'] = $new_name;
		$config['upload_path'] = './assets/img/member/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2000;
        $config['max_width'] = 4000;
        $config['max_height'] = 4000;
		$this->load->library('upload', $config);
        if ($this->upload->do_upload())
		{
			$gbr = $this->member_m->getid($id)->result();
			foreach ($gbr as $g) {
				if ($g->foto) {
				unlink($_SERVER['DOCUMENT_ROOT'].'/ablientang/assets/img/member/'.$g->foto);
				}
			}
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];

			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/img/member/'.$nama_foto;
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 215;
			$config['height']       = 215;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$data = array(
				'nama' => $this->input->post('nama'),
				'id_akses' => $this->input->post('akses'),
				'ktp' => $this->input->post('ktp'),
				'telpon' => $this->input->post('telpon'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				'foto' => $nama_foto,
				'password' => md5($this->input->post('password')));

			$this->member_m->ubah($this->input->post('id_member'),$data);
			$this->session->set_flashdata('berhasil','Member baru telah diubah.');
		    redirect('member');
		}else{
			$data = array(
				'nama' => $this->input->post('nama'),
				'id_akses' => $this->input->post('akses'),
				'ktp' => $this->input->post('ktp'),
				'telpon' => $this->input->post('telpon'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				// 'foto' => $nama_foto,
				'password' => md5($this->input->post('password')));
			
			$this->member_m->ubah($this->input->post('id_member'),$data);
			$this->session->set_flashdata('berhasil','Member baru telah diubah.');
			$this->session->set_flashdata('gagal','Gambar gagal diunggah, mohon cek ukuran gambar.');
		    redirect('member');
		}
	}
	public function hapus($id)
	{
		$gbr = $this->member_m->getid($id)->result();
		foreach ($gbr as $g) {
			if ($g->foto) {
			unlink($_SERVER['DOCUMENT_ROOT'].'/ablientang/assets/img/member/'.$g->foto);
			}
		}

		$this->member_m->hapus($id);
		$this->session->set_flashdata('berhasil','Member telah dihapus.');
		redirect('member');
	}
	public function user_ubah_pass()
	{
		if ($this->cek_pass($this->session->userdata('id_member'),$this->input->post('c_pass'))) {
			$row = array(
		 	'password' => md5($this->input->post('n_pass')));
		 	$res = $this->member_m->ubah($this->session->userdata('id_member'),$row);
		 	$this->session->set_flashdata('berhasil','Password baru berhasil diubah.');
		 	redirect('member');
		}else{
		 	$this->session->set_flashdata('gagal','Gagal mengubah password.');
		 	redirect('member');
		}
	}
	public function user_ubah_nama()
	{
		$email = $this->input->post('email');
		if ($this->cek_email($email)) {
			$row = array(
		 	'nama' => $this->input->post('nama'),
		 	'ktp' => $this->input->post('ktp'),
		 	'telpon' => $this->input->post('telpon'),
		 	'alamat' => $this->input->post('alamat'),
		 	'email' => $email);
		 	
			$this->session->set_userdata('nama',$this->input->post('nama'));
		 	$res = $this->member_m->ubah($this->session->userdata('id_member'),$row);
		 	if ($res>=1) {
			 	$this->session->set_flashdata('berhasil','Data personal anda berhasil diubah.');
			 	redirect('member');
		 	}
		}else{
		 	$this->session->set_flashdata('gagal','Email yang anda masukkan sudah terdaftar.');
		 	redirect('member');
		}
	}
	public function ubah_foto()
	{
		$new_name = 'abl_usr_'.time();
		$config['file_name'] = $new_name;
		$config['upload_path'] = './assets/img/member/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2000;
        $config['max_width'] = 4000;
        $config['max_height'] = 4000;
		// $this->upload->initialize($config);
		// if($this->upload->do_upload())
		$this->load->library('upload', $config);
        if ($this->upload->do_upload())
		{
			$gbr = $this->member_m->getid($this->session->userdata('id_member'))->result();
			foreach ($gbr as $g) {
				if ($g->foto) {
				unlink($_SERVER['DOCUMENT_ROOT'].'/ablientang/assets/img/member/'.$g->foto);
				}
			}
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];

			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/img/member/'.$nama_foto;
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 215;
			$config['height']       = 215;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$data = array('foto' => $nama_foto);

			$this->session->set_userdata('foto',$nama_foto);

			$this->member_m->ubah($this->session->memberdata('id_member'),$data);
			$this->session->set_flashdata('berhasil','Foto berhasil diubah.');
		    redirect('member');
		}else{
			$this->session->set_flashdata('gagal','Mohon cek ukuran foto anda.');
		    redirect('member');
		}
	}
	public function cek_email($email)
	{
		$res = $this->member_m->getid($this->session->userdata('id_member'))->result_array();
		if ($res[0]['email'] == $email) {
			return true;
		}else{
			$res_e = $this->member_m->getnama($email)->num_rows();
			if ($res_e>=1) {
				return false;
			}else{
				return true;
			}
		}
	}
	public function cek_pass($id,$passl)
	{
		$res = $this->member_m->getid($id);
		foreach ($res->result() as $k) {
			if ($k->password==md5($passl)) {
				return true;
			}else{
				return false;
			}
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