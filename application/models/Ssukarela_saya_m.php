<?php

class Ssukarela_saya_m extends CI_Model {


public function tampil()
{

$login = $this->fungsi->user_login()->koperasi_id;
$this->db->select('tb_simpanan_sukarela.*,tb_anggota.*,tb_simpanan_wajib.jumlah as jml_wajib,tb_simpanan_wajib.no_tab_wajib,tb_simpanan_pokok.jumlah as jml_pokok,tb_simpanan_pokok.no_tab_pokok');

$this->db->from('tb_simpanan_sukarela');
$this->db->join('tb_anggota','tb_simpanan_sukarela.koperasi_id=tb_anggota.koperasi_id');
$this->db->join('tb_simpanan_pokok','tb_simpanan_sukarela.koperasi_id=tb_simpanan_pokok.koperasi_id');
$this->db->join('tb_simpanan_wajib','tb_simpanan_sukarela.koperasi_id=tb_simpanan_wajib.koperasi_id');
$this->db->where('tb_anggota.koperasi_id',$login);
$query = $this->db->get();

return $query;

}


public function detail_sukarela($id)
{
$this->db->select('*');
$this->db->from('tb_kegiatan_simpanan');
$this->db->join('tb_anggota','tb_kegiatan_simpanan.koperasi_id=tb_anggota.koperasi_id');
$this->db->where('tb_kegiatan_simpanan.koperasi_id',$id);
$this->db->where('tb_kegiatan_simpanan.status_simpanan','Sukarela');
$query = $this->db->get();
return $query;

}
public function detail_wajib($id)
{
$this->db->select('*');
$this->db->from('tb_kegiatan_simpanan');
$this->db->join('tb_anggota','tb_kegiatan_simpanan.koperasi_id=tb_anggota.koperasi_id');
$this->db->where('tb_kegiatan_simpanan.koperasi_id',$id);
$this->db->where('tb_kegiatan_simpanan.status_simpanan','Wajib');
$query = $this->db->get();
return $query;

}
public function detail_pokok($id)
{
$this->db->select('*');
$this->db->from('tb_kegiatan_simpanan');
$this->db->join('tb_anggota','tb_kegiatan_simpanan.koperasi_id=tb_anggota.koperasi_id');
$this->db->where('tb_kegiatan_simpanan.koperasi_id',$id);
$this->db->where('tb_kegiatan_simpanan.status_simpanan','Pokok');
$query = $this->db->get();
return $query;

}



// ============================================

}
