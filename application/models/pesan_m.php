<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesan_m extends CI_Model {

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
	var $table = 'pesan';
	var $id = 'id_pesan';
	var $nama = 'nama_kat';
	var $id_mem = 'id_member';
	public function get()
	{
		return $this->db->get($this->table);
	}
	public function pagination($limit,$offset)
	{
		return $this->db->limit($limit,$offset)
						->get($this->table);
	}
	public function getid($id)
	{
		return $this->db->where($this->id,$id)
						->get($this->table);
	}
	public function getnama($nama)
	{
		return $this->db->where($this->nama,$nama)
						->get($this->table);
	}
	public function getcari($cari,$limit,$offset)
	{
		return $this->db->like($this->nama,$cari)
						->limit($limit,$offset)
						->get($this->table);
	}
	public function get_cari($cari)
	{
		return $this->db->like($this->nama,$cari)
						->get($this->table);
	}	
	public function getStatusselesai($id)
	{
		return $this->db->where($this->id_mem,$id)
						->where("status_bayar","1")
						->or_where("status_bayar","2")
						->or_where("status_bayar","4")
						->order_by('tgl_pesan','DESC')
						->get($this->table);
	}	
	public function getStatusproses($id)
	{
		return $this->db->where($this->id_mem,$id)
						->where("status_bayar","0")
						->or_where("status_bayar","3")
						->order_by('tgl_pesan','DESC')
						->get($this->table);
	}	
	public function get_id()
	{
		$this->db->select($this->id)
				 ->order_by($this->id,'DESC')
				 ->limit(1);
		return $this->db->get($this->table);
	}
	public function getjoin_detmenu($id_pesan)
	{
		return $this->db->join('det_pesan','pesan.id_pesan=det_pesan.id_pesan')
						->join('menu','menu.id_menu=det_pesan.id_menu')
						->where('pesan.id_pesan',$id_pesan)
						->get($this->table);
	}
	public function tambah($data)
	{
		return $this->db->insert($this->table,$data);
	}
	public function ubah($id,$data)
	{
		$this->db->where($this->id,$id);
		return $this->db->update($this->table,$data);
	}
	public function hapus($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->delete($this->table);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */