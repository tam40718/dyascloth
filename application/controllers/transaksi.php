<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {

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
		$this->load->model(array('menu_m','pesan_m','transaksi_m','bayar_m','member_m'));
    }
	public function index()
	{
		$data['r_transaksi'] = $this->transaksi_m->join_mem_all()->result_array();

		$data['aktif']='transaksi';
		$data['main']='transaksi/transaksi_l';
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
		$rb = $this->bayar_m->getidPesan($id)->result_array();
		$data['id_pesan'] = $id;
		$data['r_transaksi'] = $this->transaksi_m->join_mem_id($id)->result_array();
		$data['r_bayar'] = $rb;
		$data['r_item'] = $this->pesan_m->getjoin_detmenu($id)->result_array();

		$tb=0;
		foreach ($rb as $key) {
			$tb+=$key['total'];
		}

		$data['t_bayar'] = $tb;

		$data['aktif']='transaksi';
		$data['main']='transaksi/transaksi_d';
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
	public function bayar_tambah()
	{
		date_default_timezone_set("Asia/Jakarta");
		$data['id_bayar']=$this->id_oto_byr();
		$data['id_user']=$this->session->userdata('id_user');
		$data['id_pesan']=$this->input->post('id');
		$data['total']=$this->input->post('bayar');
		$data['ket_peg']=$this->input->post('ket');
		$data['tgl']=date('Y-m-d H:i:s');
		$data['status_pembayaran']=1;
		$data['validasi']=1;
		$data['ket_mem']=0;
		$data['foto']=0;
		$this->bayar_m->tambah($data);

		if ($this->input->post('bayar')<$this->input->post('nbayar')) {
			$stt = 3;
		}else{
			$stt = 2;
			$r_pesan = $this->transaksi_m->getid($this->input->post('id'))->result_array();
			$r_member = $this->member_m->getid($r_pesan[0]['id_member'])->result_array();
			$datamem['poin'] = $r_member[0]['poin'] + $r_pesan[0]['poin'];
			$this->member_m->ubah($r_member[0]['id_member'],$datamem);
		}

		$dttr = array('status_bayar' => $stt );
		$this->transaksi_m->ubah($this->input->post('id'),$dttr);
		$this->session->set_flashdata('berhasil','Pembayaran baru berhasil.');
		redirect('transaksi/form_ubah/'.$this->input->post('id'));
	}
	public function stat($id,$n,$idP)
	{
		if ($n==1) {
			//change 1 -> 0
			// $aktif = $this->bayar_m->getaktif()->result_array();
			// $data['validasi']=0;
			// $this->bayar_m->ubah($aktif[0]['id_bayar'],$data);

			//new
			$data1['validasi']=$n;
			$this->bayar_m->ubah($id,$data1);

			$this->session->set_flashdata('berhasil','Data pembayaran telah divalidasi.');
			redirect('transaksi/form_ubah/'.$idP);
		}else if ($n==2) {
			//
			$data1['validasi']=$n;
			$this->bayar_m->ubah($id,$data1);

			$this->session->set_flashdata('berhasil','Data pembayaran telah ditolak.');
			redirect('transaksi/form_ubah/'.$idP);
		}else{
			$this->session->set_flashdata('gagal','Gagal validasi data.');
			redirect('transaksi/form_ubah/'.$idP);
		}
	}
	public function id_oto_byr()
	{
		$fix=0;
		$kode = 'BYR';
		$data = $this->bayar_m->get_id()->result();
		foreach ($data as $d) {
			$fix = $d->id_bayar;
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