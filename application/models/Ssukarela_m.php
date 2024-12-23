<?php

class Ssukarela_m extends CI_Model
{


	public function tampil()
	{

		$this->db->select('*');

		$this->db->from('tb_simpanan_sukarela');
		$this->db->join('tb_anggota', 'tb_simpanan_sukarela.koperasi_id=tb_anggota.koperasi_id');
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
		$sql = "SELECT MAX(MID(no_tab_sukarela,4,6)) as no_tp FROM tb_simpanan_sukarela";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
			$r = $query->row();
			$n = ((int)$r->no_tp) + 1;
			$no = sprintf("%'.06d", $n);
		} else {
			$no = "0001";
		}
		$no_tab = "SS-" . $no;
		$params['pengurus'] = $post['pengurus'];

		$params['no_tab_sukarela'] = $no_tab;
		$params['koperasi_id'] = $post['koperasi_id'];
		$params['jumlah'] = $post['simpanan_sukarela'];

		if (isset($post['bukti_transfer'])) {
			$params['bukti_transfer'] = $post['bukti_transfer'];
		}

		$this->db->insert('tb_simpanan_sukarela', $params);
	}
	public function edit_data_sukarela($post)
	{
		$params['koperasi_id'] = $post['koperasi_id'];
		$params['jumlah'] = $post['jumlah'];
		$params['updated'] = date('Y-m-d H:i:s');

		$this->db->where('ss_id', $post['ss_id']);
		$this->db->update('tb_simpanan_sukarela', $params);
	}

	public function ambil($id)
	{

		$this->db->from('tb_simpanan_sukarela');
		$this->db->join('tb_anggota', 'tb_simpanan_sukarela.koperasi_id=tb_anggota.koperasi_id');
		$this->db->where('ss_id', $id);
		$query = $this->db->get();
		return $query;
	}
	public function ambil_simpan($post)
	{

		$sql = "SELECT MAX(MID(kode_kegiatan,9,4)) as no_keg FROM tb_kegiatan_simpanan WHERE MID(kode_kegiatan,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
			$r = $query->row();
			$n = ((int)$r->no_keg) + 1;
			$no = sprintf("%'.04d", $n);
		} else {
			$no = "0001";
		}
		$no_keg = "KK" . date('ymd') . $no;
		$params['kode_kegiatan'] = $no_keg;
		$params['koperasi_id'] = $post['koperasi_id'];
		$params['status_simpanan'] = $post['sukarela'];
		$params['aksi'] = $post['aksi'];
		$params['jumlah'] = $post['jumlah'];
		$params['transaksi'] = $post['transaksi'];
		$params['no_kwitansi'] = $post['no_kwitansi'];
		$params['pengurus'] = $post['pengurus'];
		$params['tanggal']	= date('Y-m-d');

		if (isset($post['bukti_transfer'])) {
			$params['bukti_transfer'] = $post['bukti_transfer'];
		}

		$this->db->insert('tb_kegiatan_simpanan', $params);
	}

	public function enumerateSaldo($ss_id, $jumlah) {
		$query = "UPDATE tb_simpanan_sukarela
			SET jumlah = jumlah + {$this->db->escape($jumlah)}, updated = NOW()
			WHERE ss_id = {$this->db->escape($ss_id)}";
		$this->db->query($query);
		return true;
	}

	public function checkIfTabunganExists($koperasi_id) {
		return $this->db->get_where('tb_simpanan_sukarela', ['koperasi_id' => $koperasi_id])->row();
	}

	public function scrollable($length = 10, $start = 0)
	{
		$result = $this->datatables($length, $start);
		return [
			'next' => $start + count($result),
			'data' => $result,
		];
	}

	public function datatables($koperasi_id, $length = 10, $start = 0)
	{
		$this->db->select("keg_simpan_id AS id, kode_kegiatan AS no_transaksi, jumlah,
			DATE_FORMAT(created, '%Y-%m-%d %H:%i') AS tanggal,
			aksi AS status, '' AS angsuran");
		$this->db->from('tb_kegiatan_simpanan');
		$this->db->where('LOWER(status_simpanan)', 'sukarela');
		$this->db->where('LOWER(aksi)', 'masuk');
		$this->db->where('koperasi_id', $koperasi_id);
		$this->db->limit($length, $start);
		$this->db->order_by('created', 'DESC');
		$query = str_replace('`', '', $this->db->get_compiled_select());
		return $this->db->query($query)->result();
	}

	public function total($koperasi_id)
	{
		$this->db->select('a.koperasi_id, a.nama, COALESCE(sim.jumlah, 0) AS jumlah_simpanan');
		$this->db->from('tb_anggota a');
		$this->db->join('tb_simpanan_sukarela sim', 'a.koperasi_id = sim.koperasi_id', 'LEFT');
		$this->db->where('a.koperasi_id', $koperasi_id);

		$result = $this->db->get()->row();
		if (!$result) {
			return 0;
		}
		return (int) $result->jumlah_simpanan;
	}
}
