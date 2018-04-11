<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poin_m extends CI_Model {

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
	var $table = 'poin';
	var $id = 'id_poin';
	var $status = 'status';
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
	public function getstatus($status)
	{
		return $this->db->select('poin.* , user.nama')
						->join('user',$this->table.'.id_user=user.id_user')
						->where($this->table.'.'.$this->status,$status)
						->get($this->table);
	}
	public function getaktif()
	{
		return $this->db->select('id_poin')
						->where($this->status,'1')
						->get($this->table);
	}
	public function getaktifAll()
	{
		return $this->db->where($this->status,'1')
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
	public function get_id()
	{
		$this->db->select($this->id)
				 ->order_by($this->id,'DESC')
				 ->limit(1);
		return $this->db->get($this->table);
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