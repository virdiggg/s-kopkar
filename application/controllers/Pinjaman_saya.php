<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman_saya extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		// check_admin();
		$this->load->model('pinjaman_saya_m');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		
	}

	function tampil_data_saya()
	{

		$data['row'] = $this->pinjaman_saya_m->tampil()->result();
		$this->template->load('template','pinjaman/pinjaman_data_saya',$data);

		if(isset($_POST['btn_edit'])){
			$post = $this->input->post(null,TRUE);
			$this->ssukarela_m->edit_data_sukarela_saya($post);
			if($this->db->affected_rows() > 0) {

				echo "<script>alert('Data berhasil diubah');</script>";
			}
			
				echo "<script>window.location='".site_url('pinjaman_saya/tampil_data_saya')."';</script>";
			

		

}


}

function tampil_data_saya_detail($id)
{
	 	$query = $this->pinjaman_saya_m->tampil_detail($id);
		$data['row'] = $query->result();
		$this->template->load('template','pinjaman/pinjaman_data_saya_detail',$data);
}



	


// =================================================
}


