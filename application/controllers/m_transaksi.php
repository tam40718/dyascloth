<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_transaksi extends CI_Controller {

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
		$this->load->model(array('menu_m','kat_m','pesan_m','member_m','det_pesan_m','poin_m','bayar_m','berbagi_m'));
    }
	public function get_kat($kat)
	{
		$result = array();
		 $res = $this->menu_m->get_kat($kat)->result_array();
		 foreach ($res as $row) {
		 if ($row) {
		 	array_push($result,array(
		 	"id_menu"=> $row['id_menu']
		 	,"nama"=> $row['nama'],
		 	"gambar"=> $row['gambar'],
		 	"harga"=> $row['harga']
		 	));
		 }else{
			 array_push($result,array(
			 "id_menu"=> null
		 	,"nama"=> null,
		 	"gambar"=> null,
		 	"harga"=> null
			 ));
		}
		 }
		 echo json_encode(array('result'=>$result));
	}
	public function bayar()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$DefaultId = 0;
			$Idpesan = $_POST['id_pesan'];
			$ImageData = 'abl_trf_'.time();
			$total = $_POST['total'];
			$ket_mem = $_POST['ket_mem'];
			$id_bayar = $this->id_oto_byr();
			$ImagePath = "assets/img/transfer/$ImageData.jpg";
			$ServerURL = base_url().$ImagePath;
			date_default_timezone_set("Asia/Jakarta");
			$date = Date("Y-m-d ").Date("H:").Date("i:").Date("s");
			$InsertSQL = "INSERT into bayar (id_bayar, id_pesan, total, tgl, status_pembayaran, validasi, ket_mem, ket_peg, foto) values ('$id_bayar','$Idpesan','$total','$date','2','0','$ket_mem', null,'$ImageData')";
			//$insertnotif = "INSERT into notif_pengaduan (id_pengaduan_notif,id_user_notif,status_notif) values ('$Idpengaduan','$username_pengadu','0')";
			if(mysqli_query($con, $InsertSQL)){
				file_put_contents($ImagePath,base64_decode($ImageData));
				// mysqli_query($con, $insertnotif);
				echo "Gambar berhasil di Upload.";
			}else{
				echo "Gambar gagal di Upload.";
			}
			mysqli_close($con);
		}else{
			echo "Upload Gagal";
		}
	}
	public function getpesan()
	{
		$id = $this->input->get('id');
		$result = array();
		 $row = $this->pesan_m->getid($id)->result_array();
		 if ($row) {
		 	array_push($result,array(
		 	"id_pesan"=> $row['0']['id_pesan']
		 	,"status_bayar"=> $row['0']['status_bayar'],
		 	"total"=> $row['0']['total'],
		 	"tempat"=> $row['0']['tempat'],
		 	"tgl_pesan"=> $row['0']['tgl_pesan'],
		 	"tgl_ambil"=> $row['0']['tgl_ambil']
		 	));
		 }else{
			 array_push($result,array(
			 "id_pesan"=> null
		 	,"status_bayar"=> null,
		 	"total"=> null,
		 	"tempat"=> null,
		 	"tgl_pesan"=> null,
		 	"tgl_ambil"=> null
		 	));
		}
		 echo json_encode(array('result'=>$result));
	}
	public function getDetMenu()
	{
		$id = $this->input->get('id');
		$result = array();
		 $row = $this->menu_m->getid($id)->result_array();
		 if ($row) {
		 	array_push($result,array(
		 	"id_menu"=> $row['0']['id_menu']
		 	,"nama"=> $row['0']['nama'],
		 	"harga"=> $row['0']['harga'],
		 	"desk"=> $row['0']['desk'],
		 	"gambar"=> $row['0']['gambar'],
		 	));
		 }else{
			 array_push($result,array(
			 "id_menu"=> null
		 	,"nama"=> null,
		 	"harga"=> null,
		 	"gambar"=> null,
		 	"desk"=> null
			 ));
		}
		 echo json_encode(array('result'=>$result));
	}
	public function getDetPesan()
	{
		$id = $this->input->get('id');
		$result = array();
		 $res = $this->pesan_m->getjoin_detmenu($id)->result_array();
		 foreach ($res as $row) {
			 if ($row) {
			 	array_push($result,array(
			 	"id_pesan"=> $row['id_pesan']
			 	,"nama"=> $row['nama'],
			 	"harga"=> $row['harga'],
			 	"jumlah"=> $row['jumlah'],
			 	"ket"=> $row['ket']
			 	));
			 }else{
				 array_push($result,array(
				 "id_member"=> null
			 	,"nama"=> null,
			 	"harga"=> null,
			 	"jumlah"=> null,
			 	"ket"=> null
				 ));
			}
		}
		 echo json_encode(array('result'=>$result));
	}
	public function getKeranjang()
	{
		$id = $this->input->get('id');

		$result = array();
		 $row = $this->menu_m->getid($id)->result_array();
		 if ($row) {
		 	array_push($result,array(
		 	"id_menu"=> $row['0']['id_menu']
		 	,"nama"=> $row['0']['nama'],
		 	"harga"=> $row['0']['harga'],
		 	"desk"=> $row['0']['desk'],
		 	"id_kat"=> $row['0']['id_kat']
		 	));
		 }else{
			 array_push($result,array(
			 "id_menu"=> null
		 	,"nama"=> null,
		 	"harga"=> null,
		 	"desk"=> null,
		 	"id_kat"=> null
			 ));
		}

		 echo json_encode(array('result'=>$result));
	}
		
	public function get_psn_sls()
	{
		$id = $this->input->get('id');
		// $id = "MEM_171206_001";

		$result = array();
		 $res = $this->pesan_m->getStatusselesai($id)->result_array();
		 foreach ($res as $row) {
			 if ($row) {
			 	array_push($result,array(
			 	"id_pesan"=> $row['id_pesan']
			 	,"tgl_pesan"=> $row['tgl_pesan'],
			 	"tgl_ambil"=> $row['tgl_ambil'],
			 	"tempat"=> $row['tempat'],
			 	"status_bayar"=> $row['status_bayar']
			 	));
			 }else{
				 array_push($result,array(
				"id_pesan"=> null
			 	,"tgl_pesan"=> null,
			 	"tgl_kirim"=> null,
			 	"alamat"=> null,
			 	"status_bayar"=> null
				 ));
			}
		}
		 echo json_encode(array('result'=>$result));
	}
	public function get_psn_pros()
	{
		$id = $this->input->get('id');
		// $id = "MEM_171106_001";
		// $id = "MEM_171206_001";

		$result = array();
		 $res = $this->pesan_m->getStatusproses($id)->result_array();
		 foreach ($res as $row) {
			 if ($row) {
			 	array_push($result,array(
			 	"id_pesan"=> $row['id_pesan']
			 	,"tgl_pesan"=> $row['tgl_pesan'],
			 	"tgl_ambil"=> $row['tgl_ambil'],
			 	"tempat"=> $row['tempat'],
			 	"status_bayar"=> $row['status_bayar']
			 	));
			 }else{
				 array_push($result,array(
				"id_pesan"=> null
			 	,"tgl_pesan"=> null,
			 	"tgl_kirim"=> null,
			 	"alamat"=> null,
			 	"status_bayar"=> null
				 ));
			}
		}
		 echo json_encode(array('result'=>$result));
	}
	public function pesan_add()
	{
		date_default_timezone_set("Asia/Jakarta");
		$res_poin = $this->poin_m->getaktifAll()->result_array();
		$res_mem = $this->member_m->getid($this->input->post('id_member'))->result_array();
		$id_pesan = $this->id_oto();
		if ($this->input->post('bayar')=="Poin") {
			$data_mem = array('poin'=>$res_mem[0]['poin']-$this->input->post('total'));
			$this->member_m->ubah($this->input->post('id_member'),$data_mem);
			$poin = 0;
			$byr=1;
		}else{
			$poin = round(($this->input->post('total')*$res_poin[0]['persen'])/100);
			$data_mem = array('poin'=>$res_mem[0]['poin']+$poin);
			$byr=0;
		}
		$data = array(
		 		'id_pesan' => $id_pesan,
		 		'id_member' => $this->input->post('id_member'),
		 		'id_user' => null,
		 		'id_poin' => $res_poin[0]['id_poin'],
				'total' => $this->input->post('total'),
				'tgl_pesan' => date('Y-m-d h:i:s'),
				'tgl_ambil' => $this->input->post('tgl_ambil'),
				'ket' => null,
				'tempat' => $this->input->post('tempat'),
				'status_bayar' => $byr,
				'status_kirim' => 0,
				'lat' => $this->input->post('lat'),
				'lng' => $this->input->post('lng'),
				'poin' => $poin);
		if ($byr==1) {
			$data_byr = array(
						'id_bayar' => $this->id_oto_byr(),
						'id_pesan' => $id_pesan,
						'id_user' => null,
						'total' => $this->input->post('total'),
						'tgl' => date('Y-m-d h:i:s'),
						'status_pembayaran' => 3,
						'validasi'=>1,
						'ket_mem'=>null,
						'ket_peg'=>null,
						'foto'=>null);
			$this->bayar_m->tambah($data_byr);
		}
		if ($this->pesan_m->tambah($data)) {
			echo $id_pesan;
		}else{
			echo "fail";
		}
	}
	public function det_pesan_add()
	{
		$data = array(
				'id_menu' => $this->input->post('id_menu'),
				'id_pesan' => $this->input->post('id_pesan'),
				'jumlah' => $this->input->post('jumlah'),
				'ket' => $this->input->post('ket'));
		if ($this->det_pesan_m->tambah($data)) {
			echo "success";
		}else{
			echo "fail";
		}
	}

	public function pesan_batal()
	{
		$id = $this->input->get('id');
		// $id = 2;x
		$data['status_bayar']=4;
		if ($this->pesan_m->ubah($id,$data)) {
			echo "Pembatalan pesanan berhasil";
		}else{
			echo "fail";
		}
	}
	//------------------------berbagi------------------
	public function getberbagi()
	{
		$id = $this->input->get('id');
		// $id = 1;
		$result = array();
		 $row = $this->berbagi_m->getId_join($id)->result_array();
		 if ($row) {
			 	array_push($result,array(
			 	"id_berbagi"=> $row[0]['id_berbagi']
			 	,"tanggal"=> $row[0]['tanggal'],
			 	"nama"=> $row[0]['nama'],
			 	"email"=> $row[0]['email'],
			 	"jumlah"=> $row[0]['jumlah'],
			 	"ket_asal"=> $row[0]['ket_asal'],
			 	"ket_tujuan"=> $row[0]['ket_tujuan'],
			 	"validasi"=> $row[0]['validasi'],
			 	"status"=> $row[0]['status']
			 	));
			 }else{
				 array_push($result,array(
				"id_berbagi"=> null
			 	,"tanggal"=> null,
			 	"nama"=> null,
			 	"email"=> null,
			 	"ket_asal"=> null,
			 	"ket_tujuan"=> null,
			 	"validasi"=> null,
			 	"status"=> null
				 ));
			}
		 echo json_encode(array('result'=>$result));
	}
	public function get_kirim()
	{
		$id = $this->input->get('id');
		// $id = 'MEM_171106_001';
		$result = array();
		$res = $this->berbagi_m->get_kirim($id)->result_array();
		 foreach ($res as $row) {
			 if ($row) {
			 	array_push($result,array(
			 	"id_berbagi"=> $row['id_berbagi']
			 	,"tanggal"=> $row['tanggal'],
			 	"nama"=> $row['nama'],
			 	"email"=> $row['email'],
			 	"jumlah"=> $row['jumlah'],
			 	"ket_asal"=> $row['ket_asal'],
			 	"validasi"=> $row['validasi'],
			 	"status"=> $row['status']
			 	));
			 }else{
				 array_push($result,array(
				"id_berbagi"=> null
			 	,"tanggal"=> null,
			 	"nama"=> null,
			 	"email"=> null,
			 	"ket_asal"=> null,
			 	"validasi"=> null,
			 	"status"=> null
				 ));
			}
		}
		 echo json_encode(array('result'=>$result));
	}
	public function get_minta()
	{
		$id = $this->input->get('id');

		$result = array();
		$res = $this->berbagi_m->get_minta($id)->result_array();
		 foreach ($res as $row) {
			 if ($row) {
			 	array_push($result,array(
			 	"id_berbagi"=> $row['id_berbagi']
			 	,"tanggal"=> $row['tanggal'],
			 	"nama"=> $row['nama'],
			 	"email"=> $row['email'],
			 	"jumlah"=> $row['jumlah'],
			 	"ket_asal"=> $row['ket_asal'],
			 	"validasi"=> $row['validasi'],
			 	"status"=> $row['status']
			 	));
			 }else{
				 array_push($result,array(
				"id_berbagi"=> null
			 	,"tanggal"=> null,
			 	"nama"=> null,
			 	"email"=> null,
			 	"ket_asal"=> null,
			 	"validasi"=> null,
			 	"status"=> null
				 ));
			}
		}
		 echo json_encode(array('result'=>$result));
	}
	public function get_konfirmasi()
	{
		$id = $this->input->get('id');

		$result = array();
		$res = $this->berbagi_m->get_konfirmasi($id)->result_array();
		 foreach ($res as $row) {
			 if ($row) {
			 	array_push($result,array(
			 	"id_berbagi"=> $row['id_berbagi']
			 	,"tanggal"=> $row['tanggal'],
			 	"nama"=> $row['nama'],
			 	"email"=> $row['email'],
			 	"jumlah"=> $row['jumlah'],
			 	"ket_asal"=> $row['ket_asal'],
			 	"validasi"=> $row['validasi'],
			 	"status"=> $row['status']
			 	));
			 }else{
				 array_push($result,array(
				"id_berbagi"=> null
			 	,"tanggal"=> null,
			 	"nama"=> null,
			 	"email"=> null,
			 	"jumlah"=> null,
			 	"ket_asal"=> null,
			 	"validasi"=> null,
			 	"status"=> null
				 ));
			}
		}
		 echo json_encode(array('result'=>$result));
	}
	public function cekEmail()
	{
		$email = $this->input->get('id');

		$res = $this->member_m->cekEmail($email)->result_array();
		if ($res>=1) {
			echo $res[0]['nama'];
		}else{
			echo "fail";
		}
	}

	public function addKirim()
	{
		date_default_timezone_set("Asia/Jakarta");
		$res_mem = $this->member_m->cekEmail($this->input->post('email'))->result_array();
		$stt = $this->input->post('status');
		if ($stt=="aaa") {
			$a=1;
		}else{
			$a=2;
		}
			$data = array(
		 		'id_member_asal' => $this->input->post('id_member_asal'),
		 		'id_member_tujuan' => $res_mem[0]['id_member'],
		 		'jumlah' => $this->input->post('jumlah'),
				'tanggal' => date('Y-m-d h:i:s'),
				'ket_asal' => $this->input->post('ket_asal'),
				'ket_tujuan' => null,
				'validasi' => 0,
				'status' => $a);
		
		if ($this->berbagi_m->tambah($data)) {
			// echo $id_pesan;
			var_dump($this->input->post());
		}else{
			echo "fail";
		}
	}
	public function berbagi_tolak()
	{
		$id = $this->input->get('id');
		// $id = 2;x
		$data['validasi']=2;
		if ($this->berbagi_m->ubah($id,$data)) {
			echo "Penolakan sukses";
		}else{
			echo "fail";
		}
	}
	public function berbagi_terima()
	{
		$id_berbagi = $this->input->get('id');
		$res_berbagi = $this->berbagi_m->getid($id_berbagi)->result_array();
		if ($res[0]['status']=1) { // kirim
			$poinB = $res_berbagi[0]['jumlah'];
			$res_m_asal = $this->member_m->getid($res_berbagi[0]['id_member_asal'])->result_array();
			$res_m_tujuan = $this->member_m->getid($res_berbagi[0]['id_member_tujuan'])->result_array();

			//kurangi asal
			$dataA['poin'] = $res_m_asal[0]['poin'] - $poinB;
			$this->member_m->ubah($res_m_asal[0]['id_member'],$dataA);

			//tambah tujuan
			$dataT['poin'] = $res_m_tujuan[0]['poin'] + $poinB;
			$this->member_m->ubah($res_m_tujuan[0]['id_member'],$dataT);

			//ubah validasi = 1
			$dataB['validasi'] = 1;
			$this->berbagi_m->ubah($id_berbagi,$dataB);
			echo "Kiriman poin telah divalidasi, silahkan cek poin anda";
		}else{ //minta
			$poinB = $res_berbagi[0]['jumlah'];
			$res_m_asal = $this->member_m->getid($res_berbagi[0]['id_member_asal'])->result_array();
			$res_m_tujuan = $this->member_m->getid($res_berbagi[0]['id_member_tujuan'])->result_array();

			//cek poin tujuan
			$cekP = $res_m_tujuan[0]['poin'] - $poinB;
			if ($cekP <= 4999) {
				echo "Permintaan gagal divalidasi, sisa poin anda minimal 5000";
			}else{
				//tambah asal
				$dataA['poin'] = $res_m_asal[0]['poin'] + $poinB;
				$this->member_m->ubah($res_m_asal[0]['id_member'],$dataA);

				//kurangi tujuan
				$dataT['poin'] = $res_m_tujuan[0]['poin'] - $poinB;
				$this->member_m->ubah($res_m_tujuan[0]['id_member'],$dataT);

				//ubah validasi = 1
				$dataB['validasi'] = 1;
				$this->berbagi_m->ubah($id_berbagi,$dataB);
				echo "Permintaan poin telah divalidasi, silahkan cek poin anda";
			}
		}
	}
	public function id_oto()
	{
		$fix=0;
		$kode = 'PSN';
		$data = $this->pesan_m->get_id()->result();
		foreach ($data as $d) {
			$fix = $d->id_pesan;
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
	public function upimage()
	{
		if($_SERVER['REQUEST_METHOD']=='POST'){
 
		$image = $_POST['image'];
		$new_name = 'abl_trf_'.time();
		$config['file_name'] = $new_name;
		$config['upload_path'] = './assets/img/transfer/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2000;
        $config['max_width'] = 4000;
        $config['max_height'] = 4000;
		$this->load->library('upload', $config);
        if ($this->upload->do_upload())
		{
			$get_name = $this->upload->data();
	   		$nama_foto = $get_name['file_name'];
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
			echo "Error";
		}
	}
}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */