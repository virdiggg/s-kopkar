<?php
Class Fungsi {
	protected $ci;
	function __construct()
	{
		$this->ci =& get_instance();
	}
	function user_login()
	{
		$this->ci->load->model('user_m');
		$anggota_id = $this->ci->session->userdata('anggota_id');
		$anggota_data = $this->ci->user_m->get($anggota_id)->row();
		return $anggota_data;
	}

	function PDFGenerator($html,$filename,$paper,$orientation)
	{
	
		// instantiate and use the dompdf class
		$dompdf = new Dompdf\Dompdf();
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper($paper,$orientation);

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream($filename,array('Attachment'=>0));
	}

	public function total_pokok()
	{

	$this->ci->load->model('spokok_m');
	return $this->ci->spokok_m->tampil_total_pokok()->row();
	}

	public function total_wajib()
	{

	$this->ci->load->model('swajib_m');
	return $this->ci->swajib_m->tampil_total_wajib()->row();
	}
	public function total_sukarela()
	{

	$this->ci->load->model('ssukarela_m');
	return $this->ci->ssukarela_m->tampil_total_sukarela()->row();
	}

	public function total_pengajuan()
	{

	$this->ci->load->model('aktivitas_m');
	return $this->ci->aktivitas_m->tampil_total_pengajuan()->row();
	}
	public function total_pinjaman()
	{

	$this->ci->load->model('aktivitas_m');
	return $this->ci->aktivitas_m->tampil_total_pinjaman()->row();
	}
	public function total_pinjaman_hardloan()
	{

	$this->ci->load->model('aktivitas_m');
	return $this->ci->aktivitas_m->tampil_total_pinjaman_hardloan()->row();
	}
	
	public function total_pinjaman_softloan()
	{

	$this->ci->load->model('aktivitas_m');
	return $this->ci->aktivitas_m->tampil_total_pinjaman_softloan()->row();
	}
	public function total_pinjaman_motor()
	{

	$this->ci->load->model('aktivitas_m');
	return $this->ci->aktivitas_m->tampil_total_pinjaman_motor()->row();
	}
	public function total_pinjaman_elektronik()
	{

	$this->ci->load->model('aktivitas_m');
	return $this->ci->aktivitas_m->tampil_total_pinjaman_elektronik()->row();
	}
	public function total_shu_anggota()
	{

	$this->ci->load->model('aktivitas_m');
	return $this->ci->aktivitas_m->tampil_total_shu_anggota()->row();
	}

	


	// =======================================================================//


}