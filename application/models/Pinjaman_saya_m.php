<?php

class pinjaman_saya_m extends CI_Model {


public function tampil()
{

$login = $this->fungsi->user_login()->koperasi_id;
$this->db->select('*');

$this->db->from('tb_pinjaman');
$this->db->join('tb_anggota','tb_pinjaman.koperasi_id=tb_anggota.koperasi_id');
$this->db->where('tb_anggota.koperasi_id',$login);

$query = $this->db->get();

return $query;

}

public function tampil_detail($id)
{

$this->db->select('*');
$this->db->from('tb_pembayaran');
$this->db->where('no_pinjaman',$id);
$query = $this->db->get();
return $query;
}

// ===========================

}
