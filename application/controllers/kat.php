<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kat extends CI_Controller {

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
		$data['r_kat'] = $this->kat_m->get()->result_array();

		$data['aktif']='menu';
		$data['main']='kategori/kat_l';
		$this->load->view('index',$data);
	}
	public function form_tambah()
	{
		$data['r_kat'] = $this->kat_m->get()->result_array();

		$data['aktif']='menu';
		$data['main']='kategori/kat_t';
		$this->load->view('index',$data);
	}
	public function tambah()
	{
		$data = array('nama_kat' => $this->input->post('nama'),
		'status'=>1 );

		$this->kat_m->tambah($data);
		$this->session->set_flashdata('berhasil','Kategori menu baru telah ditambahkan.');
		redirect('kat');
	}
	public function form_ubah($id)
	{
		$data['r_kat'] = $this->kat_m->getid($id)->result_array();

		$data['aktif']='menu';
		$data['main']='kategori/kat_u';
		$this->load->view('index',$data);
	}
	public function ubah()
	{
		$data = array('nama_kat' => $this->input->post('nama') ,
		'status'=>$this->input->post('stat') );

		$this->kat_m->ubah($this->input->post('id_kat'),$data);
		$this->session->set_flashdata('berhasil','Kategori menu telah diubah.');
		redirect('kat');
	}
	public function hapus($id)
	{
		$this->kat_m->hapus($id);
		$this->session->set_flashdata('berhasil','Kategori menu telah dihapus.');
		redirect('kat');
	}
	public function stat($id)
	{
		$cek = $this->kat_m->getid($id);
		foreach ($cek->result() as $k) {
			if ($k->status==0) {
				$row = array('status' => 1 );
				$res = $this->kat_m->ubah($id,$row);
				if ($res>=1) {
					$this->session->set_flashdata('berhasil','Status berhasil diubah menjadi aktif.');
					redirect('kat');
				}
			}else{
				$row = array('status' => 0 );
				$res = $this->kat_m->ubah($id,$row);
				if ($res>=1) {
					$this->session->set_flashdata('berhasil','Status berhasil diubah menjadi tidak aktif.');
					redirect('kat');
				}
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */