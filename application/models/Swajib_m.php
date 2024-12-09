<?php

class Swajib_m extends CI_Model {


public function tampil()
{

$this->db->select('*');

$this->db->from('tb_simpanan_wajib');
$this->db->join('tb_anggota','tb_simpanan_wajib.koperasi_id=tb_anggota.koperasi_id');
$query = $this->db->get();

return $query;

}
public function tampil_total_wajib()
{

// $this->db->select('*');
$this->db->select_sum('jumlah');

$this->db->from('tb_simpanan_wajib');

$query = $this->db->get();

return $query;

}


public function tambah_data_wajib($post)
{
	$sql ="SELECT MAX(MID(no_tab_wajib,4,6)) as no_tp FROM tb_simpanan_wajib";
	$query = $this->db->query($sql);

	if($query->num_rows() > 0 ) {
		$r = $query->row();
		$n = ((int)$r->no_tp) + 1;
		$no = sprintf("%'.06d",$n);
	}
	else {
		$no = "0001";
	}
	$no_tab = "SW-".$no;
		$params['pengurus'] = $post['pengurus'];
		
		$params['no_tab_wajib'] = $no_tab;
		$params['koperasi_id'] = $post['koperasi_id'];
		$params['jumlah'] = $post['simpanan_wajib'];
		
		

		$this->db->insert('tb_simpanan_wajib',$params);
}
public function edit_data_wajib($post)
{
		$params['koperasi_id'] = $post['koperasi_id'];
		$params['jumlah'] = $post['jumlah'];
		$params['updated'] = date('Y-m-d H:i:s');

		$this->db->where('sw_id',$post['sw_id']);
		$this->db->update('tb_simpanan_wajib',$params);
}

public function ambil($id)
{

$this->db->from('tb_simpanan_wajib');
$this->db->join('tb_anggota','tb_simpanan_wajib.koperasi_id=tb_anggota.koperasi_id');
$this->db->where('sw_id',$id);
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
		$params['status_simpanan'] = $post['wajib'];
		$params['aksi'] = $post['aksi'];
		$params['jumlah'] = $post['jumlah'];
		$params['transaksi'] = $post['transaksi'];
		$params['no_kwitansi'] = $post['no_kwitansi'];
		$params['pengurus'] = $post['pengurus'];
		$params['tanggal']	= date('Y-m-d');		

		$this->db->insert('tb_kegiatan_simpanan',$params);


}




}
