<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan_sukarela_saya extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		// check_admin();
		$this->load->model('ssukarela_saya_m');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		
	}

	function tampil_data_saya()
	{

		$data['row'] = $this->ssukarela_saya_m->tampil()->row();
		$this->template->load('template','simpanan/sukarela_data_saya',$data);

		if(isset($_POST['btn_edit'])){
			$post = $this->input->post(null,TRUE);
			$this->ssukarela_m->edit_data_sukarela_saya($post);
			if($this->db->affected_rows() > 0) {

				echo "<script>alert('Data berhasil diubah');</script>";
			}
			
				echo "<script>window.location='".site_url('simpanan_sukarela/tampil_data')."';</script>";
			

		

}


}



	function tampil_data_saya_detail_sukarela($id)
{
	    $query = $this->ssukarela_saya_m->detail_sukarela($id);
		$data['row'] = $query->result();
		$this->template->load('template','simpanan/sukarela_data_saya_detail',$data);
}
function tampil_data_saya_detail_wajib($id)
{
	    $query = $this->ssukarela_saya_m->detail_wajib($id);
		$data['row'] = $query->result();
		$this->template->load('template','simpanan/wajib_data_saya_detail',$data);

}
function tampil_data_saya_detail_pokok($id)
{
	    $query = $this->ssukarela_saya_m->detail_pokok($id);
		$data['row'] = $query->result();
		$this->template->load('template','simpanan/pokok_data_saya_detail',$data);

}


// =================================================
}


