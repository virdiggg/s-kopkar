<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivitas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();

		$this->load->model('aktivitas_m');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function aktivitas_data(){

	$post=$this->input->post(null,TRUE);
	$qry = $this->aktivitas_m->aktivitas_simpanan_tampil($post);
	$data['row'] = $qry->result();
	$this->template->load('template','aktivitas/aktivitas_data_simpanan',$data);

	}

	public function pengajuan_softloan()
	{
		$this->load->model('user_m');
		$data['row'] =$this->user_m->get()->result();		
		$this->template->load('template','aktivitas/pengajuan_softloan_form',$data);
	}

	public function pengajuan_softloan_proses()
	{
		$post = $this->input->post(null,TRUE);
		$this->aktivitas_m->pengajuan_softloan_simpan($post);

		if($this->db->affected_rows() > 0){
			echo "<script>alert('Data berhasil ditambah');</script>";
			}
			
				echo "<script>window.location='".site_url('aktivitas/tampil_data_pengajuan')."';</script>";
			



	}

	public function tampil_data_pengajuan(){

		$data['row'] = $this->aktivitas_m->tampil_data()->result();
		$this->template->load('template','aktivitas/pengajuan_data',$data);

	}

	public function pengajuan_hardloan()
	{
		$this->load->model('user_m');
		$data['row'] =$this->user_m->get()->result();		
		$this->template->load('template','aktivitas/pengajuan_hardloan_form',$data);
	}

	public function pengajuan_hardloan_proses()
	{
		$post = $this->input->post(null,TRUE);
		$this->aktivitas_m->pengajuan_hardloan_simpan($post);

		if($this->db->affected_rows() > 0){
			echo "<script>alert('Data berhasil ditambah');</script>";
			}
			
				echo "<script>window.location='".site_url('aktivitas/tampil_data_pengajuan')."';</script>";
			



	}

	public function cek_pinjaman($pengajuan_id)
	{
		// $pengajuan = $this->aktivitas_m->cek_pengajuan_tampil($koperasi_id)->result();
		$query = $this->aktivitas_m->cek_pengajuan_tampil($pengajuan_id);
		$data['row'] = $query->row();
		$this->template->load('template','aktivitas/cek_data_pinjaman',$data);

	}
	public function cek_pinjaman_historical($koperasi_id)
	{
		// $pengajuan = $this->aktivitas_m->cek_pengajuan_tampil($koperasi_id)->result();
		$row = $this->aktivitas_m->cek_pengajuan_tampil_historical($koperasi_id);
		$total_kewajiban = $this->aktivitas_m->tampil_kewajiban_berjalan($koperasi_id);
		$total_kewajiban_perbulan = $this->aktivitas_m->tampil_kewajiban_berjalan_perbulan($koperasi_id);
		$pengajuan_baru = $this->aktivitas_m->pengajuan_baru($koperasi_id);
		$kewajiban_baru = $this->aktivitas_m->kewajiban_baru_perbulan($koperasi_id);
		$data = array(
			'row'=> $row->result(),
			'total_kewajiban'=>$total_kewajiban->row(),
			'total_kewajiban_perbulan'=>$total_kewajiban_perbulan->row(),
			'pengajuan_baru'=>$pengajuan_baru->row(),
			'kewajiban_baru'=>$kewajiban_baru->row()

			);
		$this->template->load('template','aktivitas/cek_data_pinjaman_historical',$data);

	}
	public function update_pengajuan()
	{
		$post = $this->input->post(null,TRUE);
		$this->aktivitas_m->update_status_pengajuan($post);

		if($this->db->affected_rows() > 0 && $post['status'] == "DISETUJUI" && $post['jenis_pinjaman'] == "ELEKTRONIK"){
			$post = $this->input->post(null,TRUE);
			$this->aktivitas_m->baca_simpan_data_elektronik($post);
			echo "<script>alert('Data berhasil diubah');</script>";

		}
		if($this->db->affected_rows() > 0 && $post['status'] == "DISETUJUI" && $post['jenis_pinjaman'] == "MOTOR"){
			$post = $this->input->post(null,TRUE);
			$this->aktivitas_m->baca_simpan_data_motor($post);
			echo "<script>alert('Data berhasil diubah');</script>";

		}
		else if($this->db->affected_rows() > 0 && $post['status'] == "DISETUJUI" && $post['jenis_pinjaman'] == "HARDLOAN"){

			$post = $this->input->post(null,TRUE);
			$this->aktivitas_m->baca_simpan_data($post);
			echo "<script>alert('Data berhasil diubah');</script>";
			}
			else if($this->db->affected_rows() > 0 && $post['status'] == "DISETUJUI" && $post['jenis_pinjaman'] == "SOFTLOAN"){

			$post = $this->input->post(null,TRUE);
			$this->aktivitas_m->baca_simpan_data($post);
			echo "<script>alert('Data berhasil diubah');</script>";
			}
		
		else if($this->db->affected_rows() > 0){

			echo "<script>alert('Data berhasil diubah');</script>";
		}
				echo "<script>window.location='".site_url('aktivitas/tampil_data_pengajuan')."';</script>";
	}

	public function tampil_data_pinjaman(){

		$data['row'] = $this->aktivitas_m->tampil_data_pinjaman()->result();
		$this->template->load('template','aktivitas/pinjaman_data',$data);

	}
	public function pembayaran_pinjaman($no_pinjaman){
		$query = $this->aktivitas_m->ambil($no_pinjaman);
		$data['row'] = $query->row();
		$this->template->load('template','aktivitas/form_pembayaran_pinjaman',$data);

		if(isset($_POST['btnSimpan'])) {
			$post = $this->input->post(null,TRUE);
			$this->aktivitas_m->pembayaran_pinjaman_proses($post);

			if($this->db->affected_rows() > 0 ) {
				if($post['aksi'] == 'Bayar'){
					$jumlah = $post['jumlah'];
					$qty = $post['qty'];
					$no_pinjaman = $post['no_pinjaman'];
					$sql = "UPDATE tb_pinjaman SET masuk_angsuran=masuk_angsuran+'$jumlah',sisa_angsuran = sisa_angsuran - '$jumlah',sisa_angsuran_bln = sisa_angsuran_bln - '$qty' WHERE no_pinjaman = '$no_pinjaman'";
					$this->db->query($sql);
				}
				else if($post['aksi'] == 'Koreksi'){
					$jumlah = $post['jumlah'];
					$qty = $post['qty'];
					$no_pinjaman = $post['no_pinjaman'];
					$sql = "UPDATE tb_pinjaman SET masuk_angsuran=masuk_angsuran-'$jumlah',sisa_angsuran = sisa_angsuran + '$jumlah',sisa_angsuran_bln = sisa_angsuran_bln + '$qty' WHERE no_pinjaman = '$no_pinjaman'";
					$this->db->query($sql);

				}

				echo "<script>alert('Data berhasil di simpan');</script>";
				echo "<script>window.location='".site_url('aktivitas/tampil_data_pinjaman')."';</script>";

			}		
			


		}
	

	}
	public function aktivitas_data_pembayaran(){

	$post=$this->input->post(null,TRUE);
	$qry = $this->aktivitas_m->aktivitas_pembayaran_tampil($post);
	$data['row'] = $qry->result();
	$this->template->load('template','aktivitas/pembayaran_data',$data);

	}

	public function pengajuan_elektronik()
	{
		$this->load->model('user_m');
		$data['row'] =$this->user_m->get()->result();		
		$this->template->load('template','aktivitas/pengajuan_elektronik_form',$data);
	}

	public function pengajuan_elektronik_proses()
	{
		$post = $this->input->post(null,TRUE);
		$this->aktivitas_m->pengajuan_elektronik_simpan($post);

		if($this->db->affected_rows() > 0){
			echo "<script>alert('Data berhasil ditambah');</script>";
			}
			
				echo "<script>window.location='".site_url('aktivitas/tampil_data_pengajuan')."';</script>";
			



	}
	public function pengajuan_motor()
	{
		$this->load->model('user_m');
		$data['row'] =$this->user_m->get()->result();		
		$this->template->load('template','aktivitas/pengajuan_motor_form',$data);
	}

	public function pengajuan_motor_proses()
	{
		$post = $this->input->post(null,TRUE);
		$this->aktivitas_m->pengajuan_motor_simpan($post);

		if($this->db->affected_rows() > 0){
			echo "<script>alert('Data berhasil ditambah');</script>";
			}
			
				echo "<script>window.location='".site_url('aktivitas/tampil_data_pengajuan')."';</script>";
			



	}

	public function aktivitas_pinjaman_print(){
		$data['row'] = $this->aktivitas_m->tampil_data_pinjaman()->result();
		$this->load->view('aktivitas/pinjaman_data_print',$data);

	}


	public function pengajuan_softloan_saya()
	{
		$this->load->model('user_m');
		$data['row'] =$this->user_m->get()->result();		
		$this->template->load('template','aktivitas/pengajuan_softloan_form_saya',$data);
	}
	public function pengajuan_softloan_proses_saya()
	{
		$post = $this->input->post(null,TRUE);
		$this->aktivitas_m->pengajuan_softloan_simpan($post);

		if($this->db->affected_rows() > 0){
			echo "<script>alert('Pinjaman akan segera kami proses');</script>";
			}
			
				echo "<script>window.location='".site_url('pinjaman_saya/tampil_data_saya')."';</script>";
			



	}

	public function pengajuan_hardloan_saya()
	{
		$this->load->model('user_m');
		$data['row'] =$this->user_m->get()->result();		
		$this->template->load('template','aktivitas/pengajuan_hardloan_form_saya',$data);
	}
	public function pengajuan_hardloan_proses_saya()
	{
		$post = $this->input->post(null,TRUE);
		$this->aktivitas_m->pengajuan_hardloan_simpan($post);

		if($this->db->affected_rows() > 0){
			echo "<script>alert('Pinjaman akan segera kami proses');</script>";
			}
			
				echo "<script>window.location='".site_url('pinjaman_saya/tampil_data_saya')."';</script>";
			



	}

	public function pengajuan_elektronik_saya()
	{
		$this->load->model('user_m');
		$data['row'] =$this->user_m->get()->result();		
		$this->template->load('template','aktivitas/pengajuan_elektronik_form_saya',$data);
	}
	public function pengajuan_elektronik_proses_saya()
	{
		$post = $this->input->post(null,TRUE);
		$this->aktivitas_m->pengajuan_elektronik_simpan($post);

		if($this->db->affected_rows() > 0){
			echo "<script>alert('Pinjaman akan segera kami proses');</script>";
			}
			
				echo "<script>window.location='".site_url('pinjaman_saya/tampil_data_saya')."';</script>";
			



	}
	public function pengajuan_motor_saya()
	{
		$this->load->model('user_m');
		$data['row'] =$this->user_m->get()->result();		
		$this->template->load('template','aktivitas/pengajuan_motor_form_saya',$data);
	}
	public function pengajuan_motor_proses_saya()
	{
		$post = $this->input->post(null,TRUE);
		$this->aktivitas_m->pengajuan_motor_simpan($post);

		if($this->db->affected_rows() > 0){
			echo "<script>alert('Pinjaman akan segera kami proses');</script>";
			}
			
				echo "<script>window.location='".site_url('pinjaman_saya/tampil_data_saya')."';</script>";
			



	}
// ================================================================//
}