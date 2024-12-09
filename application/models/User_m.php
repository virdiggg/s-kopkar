<?php

class User_m extends CI_Model {

	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('tb_anggota');
		$this->db->where('username',$post['username']);
		$this->db->where('password',sha1($post['password']));
		$query = $this->db->get();
		return $query;
	}

	public function get($id = null)
	{
		$this->db->from('tb_anggota');
		if($id != null) {
			$this->db->where('anggota_id',$id);
		}
		$this->db->order_by('koperasi_id','asc');
		$query = $this->db->get();
		return $query;
	}
	// Untuk Mengambil Data Store
	public function getToko($id = null)
	{
		$this->db->from('tb_toko');
		if($id != null) {
			$this->db->where('toko_id',$id);
		}
		$query = $this->db->get();
		return $query;
	}
	// ===============================
	// Untuk Mengambil Data Store
	public function getBank($id = null)
	{
		$this->db->from('tb_bank');
		if($id != null) {
			$this->db->where('bank_id',$id);
		}
		$query = $this->db->get();
		return $query;
	}
	// ===============================
	public function add($post)
	{
		$params['koperasi_id'] = $post['koperasi_id'];
		$params['nama'] = $post['nama'];
		$params['tgl_lahir'] = $post['tgl_lahir'];
		$params['tgl_gabung'] = $post['tgl_gabung'];
		$params['kode_toko'] = $post['toko'];
		$params['bank'] = $post['bank'];
		$params['no_rek'] = $post['no_rek'];
		$params['username'] = $post['username'];
		$params['password'] = sha1($post['password']);
		$params['alamat'] = $post['alamat'];
		$params['level'] = $post['level'];

		$this->db->insert('tb_anggota',$params);


	}
	public function edit($post)
	{
		$params['koperasi_id'] = $post['koperasi_id'];
		$params['nama'] = $post['nama'];
		$params['tgl_lahir'] = $post['tgl_lahir'];
		$params['tgl_gabung'] = $post['tgl_gabung'];
		$params['kode_toko'] = $post['toko'];
		$params['bank'] = $post['bank'];
		$params['no_rek'] = $post['no_rek'];
		$params['username'] = $post['username'];		
		$params['alamat'] = $post['alamat'] != "" ? $post['alamat'] : null;
		$params['level'] = $post['level'];
		$params['updated'] = date('Y-m-d H:i:s');
		if(!empty($post['password'])) {
			$params['password'] = sha1($post['password']);
		}
		
		$this->db->where('anggota_id',$post['anggota_id']);
		$this->db->update('tb_anggota',$params);



	}
	public function del($id)
	{
		$this->db->where('username', $id);
		$this->db->delete('tb_anggota');
	}

	public function find($where) {
		$this->db->select();
		$this->db->from('tb_anggota');
		$this->db->where($where);
		$result = $this->db->get()->row_array();

		return $result ? $this->collect($result) : null;
	}

	public function update($id, $param) {
		$param['updated'] = date('Y-m-d H:i:s');
		$this->db->where('anggota_id', $id);
		$this->db->update('tb_anggota', $param);
		return (bool) $this->db->affected_rows();
	}

	public function collect($user) {
		$user = (array) $user;
        unset($user['password'], $user['token']);
		return $user;
	}
}