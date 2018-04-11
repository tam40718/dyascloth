<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poin extends CI_Controller {

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
		$this->load->model(array('poin_m','user_m'));
    }
	public function index()
	{
		$data['r_poin'] = $this->poin_m->getstatus(1)->result_array();
		$data['r_poin_r'] = $this->poin_m->getstatus(2)->result_array();
		$data['r_poin_o'] = $this->poin_m->getstatus(0)->result_array();

		$data['aktif']='poin';
		$data['main']='poin/poin_l';
		$this->load->view('index',$data);
	}
	public function req() 
	{
		$data['id_user']=$this->session->userdata('id_user');
		$data['persen']=$this->input->post('persen');
		$data['ket']=$this->input->post('ket');
		$data['tgl']=date('Y-m-d H:i:s');
		$data['status']=2;
		$this->poin_m->tambah($data);
		$this->session->set_flashdata('berhasil','Request poin anda berhasil.');
		redirect('poin');
	}
	public function stat($id,$n)
	{
		if ($n==1) {
			//change 1 -> 0
			$aktif = $this->poin_m->getaktif()->result_array();
			$data['status']=0;
			$this->poin_m->ubah($aktif[0]['id_poin'],$data);

			//new
			$data1['status']=$n;
			$this->poin_m->ubah($id,$data1);

			$this->session->set_flashdata('berhasil','Data poin request telah divalidasi.');
			redirect('poin');
		}else if ($n==2) {
			//
			$data1['status']=$n;
			$this->poin_m->ubah($id,$data1);

			$this->session->set_flashdata('berhasil','Data poin request telah ditolak.');
			redirect('poin');
		}else{
			$this->session->set_flashdata('gagal','Gagal validasi data.');
			redirect('poin');
		}
	}
	public function form_tambah()
	{
		$data['r_kat'] = $this->poin_m->get()->result_array();

		$data['aktif']='menu';
		$data['main']='kategori/kat_t';
		$this->load->view('index',$data);
	}
	public function tambah()
	{
		$data = array('nama' => $this->input->post('nama'),
		'status'=>1 );

		$this->poin_m->tambah($data);
		$this->session->set_flashdata('berhasil','Kategori menu baru telah ditambahkan.');
		redirect('kat');
	}
	public function form_ubah($id)
	{
		$data['r_kat'] = $this->poin_m->getid($id)->result_array();

		$data['aktif']='menu';
		$data['main']='kategori/kat_u';
		$this->load->view('index',$data);
	}
	public function ubah()
	{
		$data = array('nama' => $this->input->post('nama') ,
		'status'=>$this->input->post('stat') );

		$this->poin_m->ubah($this->input->post('id_kat'),$data);
		$this->session->set_flashdata('berhasil','Kategori menu telah diubah.');
		redirect('kat');
	}
	public function hapus($id)
	{
		$this->poin_m->hapus($id);
		$this->session->set_flashdata('berhasil','Kategori menu telah dihapus.');
		redirect('poin');
	}
	// public function stat($id)
	// {
	// 	$cek = $this->poin_m->getid($id);
	// 	foreach ($cek->result() as $k) {
	// 		if ($k->status==0) {
	// 			$row = array('status' => 1 );
	// 			$res = $this->poin_m->ubah($id,$row);
	// 			if ($res>=1) {
	// 				$this->session->set_flashdata('berhasil','Status berhasil diubah menjadi aktif.');
	// 				redirect('kat');
	// 			}
	// 		}else{
	// 			$row = array('status' => 0 );
	// 			$res = $this->poin_m->ubah($id,$row);
	// 			if ($res>=1) {
	// 				$this->session->set_flashdata('berhasil','Status berhasil diubah menjadi tidak aktif.');
	// 				redirect('kat');
	// 			}
	// 		}
	// 	}
	// }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */