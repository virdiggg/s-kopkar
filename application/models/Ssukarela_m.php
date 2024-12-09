<?php

class Ssukarela_m extends CI_Model {


public function tampil()
{

$this->db->select('*');

$this->db->from('tb_simpanan_sukarela');
$this->db->join('tb_anggota','tb_simpanan_sukarela.koperasi_id=tb_anggota.koperasi_id');
$query = $this->db->get();

return $query;

}
public function tampil_total_sukarela()
{

// $this->db->select('*');
$this->db->select_sum('jumlah');

$this->db->from('tb_simpanan_sukarela');

$query = $this->db->get();

return $query;

}


public function tambah_data_sukarela($post)
{
	$sql ="SELECT MAX(MID(no_tab_sukarela,4,6)) as no_tp FROM tb_simpanan_sukarela";
	$query = $this->db->query($sql);

	if($query->num_rows() > 0 ) {
		$r = $query->row();
		$n = ((int)$r->no_tp) + 1;
		$no = sprintf("%'.06d",$n);
	}
	else {
		$no = "0001";
	}
	$no_tab = "SS-".$no;
		$params['pengurus'] = $post['pengurus'];
		
		$params['no_tab_sukarela'] = $no_tab;
		$params['koperasi_id'] = $post['koperasi_id'];
		$params['jumlah'] = $post['simpanan_sukarela'];
		
		

		$this->db->insert('tb_simpanan_sukarela',$params);
}
public function edit_data_sukarela($post)
{
		$params['koperasi_id'] = $post['koperasi_id'];
		$params['jumlah'] = $post['jumlah'];
		$params['updated'] = date('Y-m-d H:i:s');

		$this->db->where('ss_id',$post['ss_id']);
		$this->db->update('tb_simpanan_sukarela',$params);

}

public function ambil($id)
{

$this->db->from('tb_simpanan_sukarela');
$this->db->join('tb_anggota','tb_simpanan_sukarela.koperasi_id=tb_anggota.koperasi_id');
$this->db->where('ss_id',$id);
$query = $this->db->get();
return $query;

}
public function ambil_simpan($post)
{

	$sql ="SELECT MAX(MID(kode_kegiatan,9,4)) as no_keg FROM tb_kegiatan_simpanan WHERE MID(kode_kegiatan,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
	$query = $this->db->query($sql);

	if($query->num_rows() > 0 ) {
		$r = $query->row();
		$n = ((int)$r->no_keg) + 1;
		$no = sprintf("%'.04d",$n);
	}
	else {
		$no = "0001";
	}
		$no_keg = "KK".date('ymd').$no;
		$params['kode_kegiatan'] = $no_keg;
		$params['koperasi_id'] = $post['koperasi_id'];
		$params['status_simpanan'] = $post['sukarela'];
		$params['aksi'] = $post['aksi'];
		$params['jumlah'] = $post['jumlah'];
		$params['transaksi'] = $post['transaksi'];
		$params['no_kwitansi'] = $post['no_kwitansi'];
		$params['pengurus'] = $post['pengurus'];
		$params['tanggal']	= date('Y-m-d');		

		$this->db->insert('tb_kegiatan_simpanan',$params);


}




}
