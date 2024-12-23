<?php

class Aktivitas_m extends CI_Model
{

	public function aktivitas_simpanan_tampil($post)
	{


		if (isset($_POST['btnSubmit'])) {


			$this->db->select('*');
			$this->db->from('tb_kegiatan_simpanan');
			$this->db->join('tb_anggota', 'tb_kegiatan_simpanan.koperasi_id=tb_anggota.koperasi_id');
			$this->db->where('tanggal >=', $post['tanggal_awal']);
			$this->db->where('tanggal <=', $post['tanggal_akhir']);
			$this->db->order_by('kode_kegiatan', 'desc');

			$query = $this->db->get();
			return $query;
		} else {
			$this->db->select('*');
			$this->db->from('tb_kegiatan_simpanan');
			$this->db->join('tb_anggota', 'tb_kegiatan_simpanan.koperasi_id=tb_anggota.koperasi_id');
			$this->db->where('tanggal', date('Y-m-d', strtotime('-3 days')));
			$this->db->order_by('kode_kegiatan', 'desc');
			$query = $this->db->get();
			return $query;
		}
	}

	public function pengajuan_softloan_simpan($post)
	{
		$sql = "SELECT MAX(MID(no_pinjaman,9,4)) as no_keg FROM tb_pengajuan WHERE MID(no_pinjaman,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
			$r = $query->row();
			$n = ((int)$r->no_keg) + 1;
			$no = sprintf("%'.04d", $n);
		} else {
			$no = "0001";
		}
		$no_keg = "PJ" . date('ymd') . $no;
		$params['no_pinjaman'] = $no_keg;
		$params['koperasi_id'] = $post['koperasi_id'];
		$params['tgl_pengajuan'] = $post['tgl_pengajuan'];
		$params['jumlah_pinjaman'] = $post['jumlah_pinjaman'];
		$params['lama_angsuran'] = $post['lama_angsuran'];

		if ($post['koperasi_id'] < '3000') {
			$params['biaya_admin'] = $post['jumlah_pinjaman'] * 0.01;
			$params['shu_ang'] = ($post['jumlah_pinjaman'] * 0.0125 * $post['lama_angsuran']) * 0.3;
			$params['shu_bln'] = (($post['jumlah_pinjaman'] * 0.0125 * 0.3) * $post['lama_angsuran']) / $post['lama_angsuran'];
			$params['shu_kop'] = ($post['jumlah_pinjaman'] * 0.0125 * $post['lama_angsuran']) * 0.7;
			$params['jumlah_kewajiban'] = $post['jumlah_pinjaman'] + $post['jumlah_pinjaman'] * 0.0125 + $post['jumlah_pinjaman'] * 0.01;
			$params['kewajiban_bulan'] = $post['jumlah_pinjaman'] + $post['jumlah_pinjaman'] * 0.0125 + $post['jumlah_pinjaman'] * 0.01;
		} else {
			$params['biaya_admin'] = $post['jumlah_pinjaman'] * 0.00;
			$params['shu_ang'] = ($post['jumlah_pinjaman'] * 0.0 * $post['lama_angsuran']) * 0.0;
			$params['shu_bln'] = (($post['jumlah_pinjaman'] * 0.0 * 0.3) * $post['lama_angsuran']) / $post['lama_angsuran'];
			$params['shu_kop'] = ($post['jumlah_pinjaman'] * 0.0 * $post['lama_angsuran']) * 0.7;
			$params['jumlah_kewajiban'] = $post['jumlah_pinjaman'] + $post['jumlah_pinjaman'] * 0.0 + $post['jumlah_pinjaman'] * 0.0;

			$params['kewajiban_bulan'] = $post['jumlah_pinjaman'] + $post['jumlah_pinjaman'] * 0.0 + $post['jumlah_pinjaman'] * 0.0;
		}
		$params['jenis_pinjaman'] = $post['jenis_pinjaman'];
		$params['status_pengajuan'] = $post['status_pengajuan'];
		$params['diajukan'] = $post['diajukan'];


		$this->db->insert('tb_pengajuan', $params);
	}

	public function tampil_data()
	{

		$this->db->select('*');
		$this->db->from('tb_pengajuan');
		$this->db->join('tb_anggota', 'tb_pengajuan.koperasi_id=tb_anggota.koperasi_id');
		$this->db->where('status_pengajuan', 'MENUNGGU');
		$this->db->order_by('no_pinjaman', 'desc');
		$query = $this->db->get();
		return $query;
	}
	public function tampil_total_pengajuan()
	{

		// $this->db->select('*');
		$this->db->select_sum('jumlah_pinjaman');
		$this->db->from('tb_pengajuan');
		$this->db->where('status_pengajuan', 'MENUNGGU');

		$query = $this->db->get();

		return $query;
	}

	public function pengajuan_hardloan_simpan($post)
	{
		$sql = "SELECT MAX(MID(no_pinjaman,9,4)) as no_keg FROM tb_pengajuan WHERE MID(no_pinjaman,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
			$r = $query->row();
			$n = ((int)$r->no_keg) + 1;
			$no = sprintf("%'.04d", $n);
		} else {
			$no = "0001";
		}
		$no_keg = "PJ" . date('ymd') . $no;
		$params['no_pinjaman'] = $no_keg;
		$params['koperasi_id'] = $post['koperasi_id'];
		$params['tgl_pengajuan'] = $post['tgl_pengajuan'];
		$params['jumlah_pinjaman'] = $post['jumlah_pinjaman'];
		$params['lama_angsuran'] = $post['lama_angsuran'];
		// Hitung jasa
		if ($post['koperasi_id'] < '3000') {
			$params['biaya_admin'] = $post['jumlah_pinjaman'] * 0.01;
			$params['shu_ang'] = ($post['jumlah_pinjaman'] * 0.0125 * $post['lama_angsuran']) * 0.3;
			$params['shu_bln'] = (($post['jumlah_pinjaman'] * 0.0125 * 0.3) * $post['lama_angsuran']) / $post['lama_angsuran'];
			$params['shu_kop'] = ($post['jumlah_pinjaman'] * 0.0125 * $post['lama_angsuran']) * 0.7;

			$jasa_admin = $post['jumlah_pinjaman'] * 0.01;
			$jasa_koperasi = $post['jumlah_pinjaman'] * ($post['lama_angsuran'] * 0.0125);
			// =======
			$params['jumlah_kewajiban'] = $post['jumlah_pinjaman'] + $jasa_admin + $jasa_koperasi;
			$params['kewajiban_bulan'] = ($post['jumlah_pinjaman'] + $jasa_admin + $jasa_koperasi) / $post['lama_angsuran'];
		} else {
			$params['biaya_admin'] = $post['jumlah_pinjaman'] * 0.00;
			$params['shu_ang'] = ($post['jumlah_pinjaman'] * 0.0 * $post['lama_angsuran']) * 0.0;
			$params['shu_bln'] = (($post['jumlah_pinjaman'] * 0.0 * 0.3) * $post['lama_angsuran']) / $post['lama_angsuran'];
			$params['shu_kop'] = ($post['jumlah_pinjaman'] * 0.0 * $post['lama_angsuran']) * 0.7;

			$jasa_admin = $post['jumlah_pinjaman'] * 0.0;
			$jasa_koperasi = $post['jumlah_pinjaman'] * ($post['lama_angsuran'] * 0.0);
			// =======
			$params['jumlah_kewajiban'] = $post['jumlah_pinjaman'] + $jasa_admin + $jasa_koperasi;
			$params['kewajiban_bulan'] = ($post['jumlah_pinjaman'] + $jasa_admin + $jasa_koperasi) / $post['lama_angsuran'];
		}
		$params['jenis_pinjaman'] = $post['jenis_pinjaman'];
		$params['status_pengajuan'] = $post['status_pengajuan'];
		$params['diajukan'] = $post['diajukan'];

		$this->db->insert('tb_pengajuan', $params);
	}

	public function cek_pengajuan_tampil($pengajuan_id)
	{

		$this->db->select('*');
		$this->db->from('tb_pengajuan');
		$this->db->join('tb_anggota', 'tb_pengajuan.koperasi_id=tb_anggota.koperasi_id');
		$this->db->where('pengajuan_id', $pengajuan_id);
		$query = $this->db->get();
		return $query;
	}
	public function cek_pengajuan_tampil_historical($koperasi_id)
	{

		$this->db->select('*');
		$this->db->from('tb_pinjaman');
		$this->db->join('tb_anggota', 'tb_pinjaman.koperasi_id=tb_anggota.koperasi_id');
		$this->db->where('tb_pinjaman.koperasi_id', $koperasi_id);
		$this->db->where('tb_pinjaman.sisa_angsuran != 0');
		$query = $this->db->get();
		return $query;
	}
	public function update_status_pengajuan($post)
	{
		$params['status_pengajuan'] = $post['status'];
		$params['tgl_proses'] = date('Y-m-d');
		$this->db->where('pengajuan_id', $post['pengajuan_id']);
		$this->db->update('tb_pengajuan', $params);
	}

	public function baca_simpan_data($post)
	{
		$params['no_pinjaman'] = $post['no_pinjaman'];
		$params['status_pinjaman'] = $post['jenis_pinjaman'];
		$params['koperasi_id'] = $post['koperasi_id'];
		$params['tgl_pengajuan'] = $post['tgl_pengajuan'];
		$params['tgl_proses'] = date('Y-m-d');
		$params['jumlah_pinjaman'] = $post['jumlah_pinjaman'];

		if ($post['koperasi_id'] < '3000') {
			$params['biaya_admin'] = $post['jumlah_pinjaman'] * 0.01;
			$params['pct_admin'] = 0.01;
			$params['biaya_jasa'] = $post['jumlah_pinjaman'] * ($post['lama_angsuran'] * 0.0125);
			$params['pct_jasa'] = $post['lama_angsuran'] * 0.0125;
			$params['shu_ang'] = $post['shu_ang'];
			$params['shu_kop'] = $post['shu_kop'];
			$params['shu_bln'] = $post['shu_bln'];
		} else {


			$params['biaya_admin'] = $post['jumlah_pinjaman'] * 0;
			$params['pct_admin'] = 0;
			$params['biaya_jasa'] = $post['jumlah_pinjaman'] * ($post['lama_angsuran'] * 0);
			$params['pct_jasa'] = $post['lama_angsuran'] * 0;
			$params['shu_ang'] = $post['shu_ang'];
			$params['shu_kop'] = $post['shu_kop'];
			$params['shu_bln'] = $post['shu_bln'];
		}
		$params['lama_angsuran'] = $post['lama_angsuran'];
		$params['besar_angsuran'] = $post['kewajiban_bulan'];
		$params['total_angsuran'] = $post['jumlah_kewajiban'];
		$params['sisa_angsuran'] = $post['jumlah_kewajiban']; //diawal isinya = jumlah kewajiban
		$params['sisa_angsuran_bln'] = $post['lama_angsuran']; //diawal isinya sama

		$this->db->insert('tb_pinjaman', $params);
	}
	public function tampil_data_pinjaman()
	{

		$this->db->select('*');
		$this->db->from('tb_pinjaman');
		$this->db->join('tb_anggota', 'tb_pinjaman.koperasi_id=tb_anggota.koperasi_id');
		$this->db->where('sisa_angsuran_bln > 0');

		$this->db->order_by('nama', 'asc');
		$query = $this->db->get();
		return $query;
	}
	public function tampil_total_pinjaman()
	{

		// $this->db->select('*');
		$this->db->select_sum('sisa_angsuran');
		$this->db->from('tb_pinjaman');
		$this->db->where('sisa_angsuran_bln > 0');

		$query = $this->db->get();

		return $query;
	}
	public function ambil($no_pinjaman)
	{

		$this->db->from('tb_pinjaman');
		$this->db->join('tb_anggota', 'tb_pinjaman.koperasi_id=tb_anggota.koperasi_id');
		$this->db->where('no_pinjaman', $no_pinjaman);
		$query = $this->db->get();
		return $query;
	}
	public function pembayaran_pinjaman_proses($post)
	{

		$sql = "SELECT MAX(MID(no_pembayaran,9,4)) as no_pem FROM tb_pembayaran WHERE MID(no_pembayaran,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
			$r = $query->row();
			$n = ((int)$r->no_pem) + 1;
			$no = sprintf("%'.04d", $n);
		} else {
			$no = "0001";
		}
		$no_pem = "PB" . date('ymd') . $no;
		$params['no_pembayaran'] = $no_pem;
		$params['no_pinjaman'] = $post['no_pinjaman'];
		$params['koperasi_id'] = $post['koperasi_id'];
		$params['status_pinjaman'] = $post['status_pinjaman'];
		$params['aksi'] = $post['aksi'];
		$params['transaksi'] = $post['transaksi'];
		$params['no_kwitansi'] = $post['no_kwitansi'];
		$params['besar_angsuran'] = $post['jumlah'];
		$params['shu_bln'] = $post['shu_bln'];
		$params['qty'] = $post['qty'];
		$params['tanggal'] = date('Y-m-d');
		$params['pengurus'] = $post['pengurus'];
		$params['tanggal']	= date('Y-m-d');

		$this->db->insert('tb_pembayaran', $params);
	}
	public function aktivitas_pembayaran_tampil($post)
	{


		if (isset($_POST['btnSubmit'])) {


			$this->db->select('*');
			$this->db->from('tb_pembayaran');
			$this->db->join('tb_anggota', 'tb_pembayaran.koperasi_id=tb_anggota.koperasi_id');
			$this->db->where('tanggal >=', $post['tanggal_awal']);
			$this->db->where('tanggal <=', $post['tanggal_akhir']);
			$this->db->order_by('no_pembayaran', 'desc');

			$query = $this->db->get();
			return $query;
		} else {
			$this->db->select('*');
			$this->db->from('tb_pembayaran');
			$this->db->join('tb_anggota', 'tb_pembayaran.koperasi_id=tb_anggota.koperasi_id');
			$this->db->limit('500');
			$this->db->order_by('no_pembayaran', 'desc');
			$query = $this->db->get();
			return $query;
		}
	}
	public function tampil_total_pinjaman_hardloan()
	{

		// $this->db->select('*');
		$this->db->select_sum('sisa_angsuran');
		$this->db->from('tb_pinjaman');
		$this->db->where('sisa_angsuran_bln > 0');
		$this->db->where('status_pinjaman', 'hardloan');

		$query = $this->db->get();

		return $query;
	}
	public function tampil_total_pinjaman_softloan()
	{

		// $this->db->select('*');
		$this->db->select_sum('sisa_angsuran');
		$this->db->from('tb_pinjaman');
		$this->db->where('sisa_angsuran_bln > 0');
		$this->db->where('status_pinjaman', 'softloan');

		$query = $this->db->get();

		return $query;
	}
	public function tampil_total_shu_anggota()
	{

		$this->db->select('*');
		$this->db->select_sum('shu_bln');
		$this->db->from('tb_pinjaman');


		$query = $this->db->get();

		return $query;
	}
	public function tampil_kewajiban_berjalan($koperasi_id)
	{

		$this->db->select('*');
		$this->db->select_sum('sisa_angsuran');
		$this->db->from('tb_pinjaman');
		$this->db->where('sisa_angsuran_bln > 0');
		$this->db->where('koperasi_id', $koperasi_id);

		$query = $this->db->get();

		return $query;
	}
	public function tampil_kewajiban_berjalan_perbulan($koperasi_id)
	{

		$this->db->select('*');
		$this->db->select_sum('besar_angsuran');
		$this->db->from('tb_pinjaman');
		$this->db->where('sisa_angsuran_bln > 0');
		$this->db->where('koperasi_id', $koperasi_id);

		$query = $this->db->get();

		return $query;
	}
	public function pengajuan_baru($koperasi_id)
	{

		$this->db->select('*');
		$this->db->from('tb_pengajuan');
		$this->db->where('status_pengajuan', 'MENUNGGU');
		$this->db->where('koperasi_id', $koperasi_id);

		$query = $this->db->get();

		return $query;
	}
	public function kewajiban_baru_perbulan($koperasi_id)
	{

		$this->db->select('*');
		$this->db->from('tb_pengajuan');
		$this->db->where('status_pengajuan', 'MENUNGGU');
		$this->db->where('koperasi_id', $koperasi_id);

		$query = $this->db->get();

		return $query;
	}

	// ==================================================================//

	public function scrollable($koperasi_id, $length = 10, $start = 0)
	{
		$result = $this->datatables($koperasi_id, $length, $start);
		return [
			'next' => $start + count($result),
			'data' => $result,
		];
	}

	public function datatables($koperasi_id, $length = 10, $start = 0)
	{
		$this->db->select("pen.pengajuan_id AS id, pen.no_pinjaman AS no_transaksi,
			pen.jumlah_pinjaman AS jumlah, pen.tgl_pengajuan AS tanggal,
			pen.status_pengajuan AS status,
			(
				CASE
					WHEN pin.pinjaman_id IS NOT NULL 
						THEN CONCAT('Angsuran ', pin.lama_angsuran, '-', pin.sisa_angsuran_bln, ' Bulan')
					ELSE ''
				END
			) AS angsuran");
		$this->db->from('tb_pengajuan pen');
		$this->db->join('tb_pinjaman pin', 'pen.no_pinjaman = pin.no_pinjaman', 'LEFT');
		$this->db->where('pen.koperasi_id', $koperasi_id);
		$this->db->limit($length, $start);
		$this->db->order_by('pen.no_pinjaman', 'DESC');
		$query = str_replace('`', '', $this->db->get_compiled_select());
		return $this->db->query($query)->result();
	}

	public function total($koperasi_id, $status = 'all', $jenis = 'all')
	{
		$this->db->select('a.koperasi_id, a.nama, COALESCE(SUM(pin.jumlah_pinjaman), 0) AS jumlah_pinjaman');
		$this->db->from('tb_anggota a');
		$this->db->join('tb_pengajuan pen', 'a.koperasi_id = pen.koperasi_id');
		$this->db->join('tb_pinjaman pin', 'pen.no_pinjaman = pin.no_pinjaman');

		$status = strtoupper($status);
		if (in_array($status, ['DISETUJUI', 'DITOLAK', 'MENUNGGU'])) {
			$this->db->where('pen.status_pengajuan', $status);
		}

		$jenis = strtoupper($jenis);
		if (in_array($jenis, ['SOFTLOAN', 'HARDLOAN'])) {
			$this->db->where('pen.jenis_pinjaman', $jenis);
		}

		$this->db->where('a.koperasi_id', $koperasi_id);
		$this->db->group_by('a.koperasi_id, a.nama');

		$result = $this->db->get()->row();
		if (!$result) {
			return 0;
		}
		return (int) $result->jumlah_pinjaman;
	}

	public function parse($result, $start = 0)
	{
		if (count($result) === 0) {
			return [];
		}

		foreach ($result as $key => $r) {
			$start = $start + 1;
			$r->no = $start;
			$r->jumlah = 'Rp. ' . number_format($r->jumlah, 0, ',', '.');
		}

		return $result;
	}
}
