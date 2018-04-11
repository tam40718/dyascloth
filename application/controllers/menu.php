<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

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
		$this->load->model(array('menu_m','kat_m'));
    }
	public function index()
	{
		$data['r_menu'] = $this->menu_m->get()->result_array();
		$data['r_kat'] = $this->kat_m->get()->result_array();

		$data['aktif']='menu';
		$data['main']='menu/menu_l';
		$this->load->view('index',$data);
	}
	public function form_tambah()
	{
		$data['r_kat'] = $this->kat_m->get()->result_array();

		$data['aktif']='menu';
		$data['main']='menu/menu_t';
		$this->load->view('index',$data);
	}
	public function tambah()
	{
		$new_name = 'abl_mnu_'.time();
		$config['file_name'] = $new_name;
		$config['upload_path'] = './assets/img/menu/';
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
			$config['source_image'] = './assets/img/menu/'.$nama_foto;
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 215;
			$config['height']       = 215;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$data = array(
				'id_menu' => $this->id_oto(),
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'id_kat' => $this->input->post('kat'),
				'desk' => $this->input->post('desk'),
				'gambar' => $nama_foto,
				'status' => 1);

			$this->menu_m->tambah($data);
			$this->session->set_flashdata('berhasil','Menu baru telah ditambahkan.');
		    redirect('menu');
		}else{
			$data = array(
				'id_menu' => $this->id_oto(),
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'id_kat' => $this->input->post('kat'),
				'desk' => $this->input->post('desk'),
				'status' => 1);
			
			$this->menu_m->tambah($data);
			$this->session->set_flashdata('berhasil','Menu baru telah ditambahkan.');
			$this->session->set_flashdata('gagal','Gambar gagal diunggah, mohon cek ukuran gambar.');
		    redirect('menu');
		}
	}
	public function form_ubah($id)
	{
		$data['r_menu'] = $this->menu_m->getid($id)->result_array();
		$data['r_kat'] = $this->kat_m->get()->result_array();

		$data['aktif']='menu';
		$data['main']='menu/menu_u';
		$this->load->view('index',$data);
	}
	public function ubah()
	{
		$new_name = 'abl_mnu_'.time();
		$config['file_name'] = $new_name;
		$config['upload_path'] = './assets/img/menu/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2000;
        $config['max_width'] = 4000;
        $config['max_height'] = 4000;
		$this->load->library('upload', $config);
        if ($this->upload->do_upload())
		{
			$gbr = $this->menu_m->getid($id)->result();
			foreach ($gbr as $g) {
				if ($g->gambar) {
				unlink($_SERVER['DOCUMENT_ROOT'].'/ablientang/assets/img/menu/'.$g->gambar);
				}
			}
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];

			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/img/menu/'.$nama_foto;
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 215;
			$config['height']       = 215;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$data = array(
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'id_kat' => $this->input->post('kat'),
				'desk' => $this->input->post('desk'),
				'gambar' => $nama_foto,
				'status' => 1);

			$this->menu_m->ubah($this->input->post('id_menu'),$data);
			$this->session->set_flashdata('berhasil','Menu baru telah diubah.');
		    redirect('menu');
		}else{
			$data = array(
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'id_kat' => $this->input->post('kat'),
				'desk' => $this->input->post('desk'),
				'status' => 1);
			
			$this->menu_m->ubah($this->input->post('id_menu'),$data);
			$this->session->set_flashdata('berhasil','Menu baru telah diubah.');
			$this->session->set_flashdata('gagal','Gambar gagal diunggah, mohon cek ukuran gambar.');
		    redirect('menu');
		}
	}
	public function hapus($id)
	{
		$gbr = $this->menu_m->getid($id)->result();
		foreach ($gbr as $g) {
			if ($g->gambar) {
			unlink($_SERVER['DOCUMENT_ROOT'].'/ablientang/assets/img/menu/'.$g->gambar);
			}
		}

		$this->menu_m->hapus($id);
		$this->session->set_flashdata('berhasil','Menu telah dihapus.');
		redirect('menu');
	}
	public function stat($id)
	{
		$cek = $this->menu_m->getid($id);
		foreach ($cek->result() as $k) {
			if ($k->status==0) {
				$row = array('status' => 1 );
				$res = $this->menu_m->ubah($id,$row);
				if ($res>=1) {
					$this->session->set_flashdata('berhasil','Status berhasil diubah menjadi aktif.');
					redirect('menu');
				}
			}else{
				$row = array('status' => 0 );
				$res = $this->menu_m->ubah($id,$row);
				if ($res>=1) {
					$this->session->set_flashdata('berhasil','Status berhasil diubah menjadi tidak aktif.');
					redirect('menu');
				}
			}
		}
	}
	public function id_oto()
	{
		$fix=0;
		$kode = 'MNU';
		$data = $this->menu_m->get_id()->result();
		foreach ($data as $d) {
			$fix = $d->id_menu;
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