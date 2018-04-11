<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->model(array('user_m','akses_m'));
    }
	public function index()
	{
		$data['r_user'] = $this->user_m->get()->result_array();
		$data['r_akses'] = $this->akses_m->get()->result_array();

		$data['aktif']='user';
		$data['main']='user/user_l';
		$this->load->view('index',$data);
	}
	public function form_tambah()
	{
		$data['r_akses'] = $this->akses_m->get()->result_array();

		$data['aktif']='user';
		$data['main']='user/user_t';
		$this->load->view('index',$data);
	}
	public function tambah()
	{
		$new_name = 'abl_mnu_'.time();
		$config['file_name'] = $new_name;
		$config['upload_path'] = './assets/img/user/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2000;
        $config['max_width'] = 4000;
        $config['max_height'] = 4000;
		$this->load->library('upload', $config);
        if ($this->upload->do_upload())
		{
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];

			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/img/user/'.$nama_foto;
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
				'password' => md5(12345678));

			$this->user_m->tambah($data);
			$this->session->set_flashdata('berhasil','User baru telah ditambahkan.');
		    redirect('user');
		}else{
			$data = array(
				'nama' => $this->input->post('nama'),
				'id_akses' => $this->input->post('akses'),
				'ktp' => $this->input->post('ktp'),
				'telpon' => $this->input->post('telpon'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				// 'foto' => $nama_foto,
				'password' => md5(12345678));
			
			$this->user_m->tambah($data);
			$this->session->set_flashdata('berhasil','User baru telah ditambahkan.');
			$this->session->set_flashdata('gagal','Gambar gagal diunggah, mohon cek ukuran gambar.');
		    redirect('user');
		}
	}
	public function form_ubah($id)
	{
		$data['r_user'] = $this->user_m->getid($id)->result_array();
		$data['r_akses'] = $this->akses_m->get()->result_array();

		$data['aktif']='user';
		$data['main']='user/user_u';
		$this->load->view('index',$data);
	}
	public function ubah()
	{
		$new_name = 'abl_mnu_'.time();
		$config['file_name'] = $new_name;
		$config['upload_path'] = './assets/img/user/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2000;
        $config['max_width'] = 4000;
        $config['max_height'] = 4000;
		$this->load->library('upload', $config);
        if ($this->upload->do_upload())
		{
			$gbr = $this->user_m->getid($id)->result();
			foreach ($gbr as $g) {
				if ($g->foto) {
				unlink($_SERVER['DOCUMENT_ROOT'].'/ablientang/assets/img/user/'.$g->foto);
				}
			}
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];

			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/img/user/'.$nama_foto;
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

			$this->user_m->ubah($this->input->post('id_user'),$data);
			$this->session->set_flashdata('berhasil','User baru telah diubah.');
		    redirect('user');
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
			
			$this->user_m->ubah($this->input->post('id_user'),$data);
			$this->session->set_flashdata('berhasil','User baru telah diubah.');
			$this->session->set_flashdata('gagal','Gambar gagal diunggah, mohon cek ukuran gambar.');
		    redirect('user');
		}
	}
	public function hapus($id)
	{
		$gbr = $this->user_m->getid($id)->result();
		foreach ($gbr as $g) {
			if ($g->foto) {
			unlink($_SERVER['DOCUMENT_ROOT'].'/ablientang/assets/img/user/'.$g->foto);
			}
		}

		$this->user_m->hapus($id);
		$this->session->set_flashdata('berhasil','User telah dihapus.');
		redirect('user');
	}
	public function lp()
	{
		$data['user'] = $this->user_m->getid($this->session->userdata('id_user'))->result_array();
		$data['akses'] = $this->akses_m->getid($this->session->userdata('akses'))->result_array();

		$data['aktif']='';
		$data['main']='user/user_lp';
		$this->load->view('index',$data);
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
		 	$res = $this->user_m->ubah($this->session->userdata('id_user'),$row);
		 	if ($res>=1) {
			 	$this->session->set_flashdata('berhasil','Data personal anda berhasil diubah.');
			 	redirect('user/lp');
		 	}
		}else{
		 	$this->session->set_flashdata('gagal','Email yang anda masukkan sudah terdaftar.');
		 	redirect('user/lp');
		}
	}
	public function ubah_foto()
	{
		$new_name = 'abl_usr_'.time();
		$config['file_name'] = $new_name;
		$config['upload_path'] = './assets/img/user/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2000;
        $config['max_width'] = 4000;
        $config['max_height'] = 4000;
		$this->load->library('upload', $config);
        if ($this->upload->do_upload())
		{
			$gbr = $this->user_m->getid($this->session->userdata('id_user'))->result();
			foreach ($gbr as $g) {
				if ($g->foto) {
				unlink($_SERVER['DOCUMENT_ROOT'].'/ablientang/assets/img/user/'.$g->foto);
				}
			}
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];

			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/img/user/'.$nama_foto;
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 215;
			$config['height']       = 215;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$data = array('foto' => $nama_foto);

			$this->session->set_userdata('foto',$nama_foto);

			$this->user_m->ubah($this->session->userdata('id_user'),$data);
			$this->session->set_flashdata('berhasil','Foto berhasil diubah.');
		    redirect('user/lp');
		}else{
			$this->session->set_flashdata('gagal','Mohon cek ukuran foto anda.');
		    redirect('user/lp');
		}
	}
	public function cek_email($email)
	{
		$res = $this->user_m->getid($this->session->userdata('id_user'))->result_array();
		if ($res[0]['email'] == $email) {
			return true;
		}else{
			$res_e = $this->user_m->getnama($email)->num_rows();
			if ($res_e>=1) {
				return false;
			}else{
				return true;
			}
		}
	}
	public function user_ubah_pass()
	{
		if ($this->cek_pass($this->session->userdata('id_user'),$this->input->post('c_pass'))) {
			$row = array(
		 	'password' => md5($this->input->post('n_pass')));
		 	$res = $this->user_m->ubah($this->session->userdata('id_user'),$row);
		 	$this->session->set_flashdata('berhasil','Password baru berhasil diubah.');
		 	redirect('user/lp');
		}else{
		 	$this->session->set_flashdata('gagal','Gagal mengubah password.');
		 	redirect('user/lp');
		}
	}
	public function cek_pass($id,$passl)
	{
		$res = $this->user_m->getid($id);
		foreach ($res->result() as $k) {
			if ($k->password==md5($passl)) {
				return true;
			}else{
				return false;
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */