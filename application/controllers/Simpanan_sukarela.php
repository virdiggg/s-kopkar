<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan_sukarela extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('ssukarela_m');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		
	}

	function tampil_data()
	{

		$data['row'] = $this->ssukarela_m->tampil()->result();
		$this->template->load('template','simpanan/sukarela_data',$data);

		if(isset($_POST['btn_edit'])){
			$post = $this->input->post(null,TRUE);
			$this->ssukarela_m->edit_data_sukarela($post);
			if($this->db->affected_rows() > 0) {

				echo "<script>alert('Data berhasil diubah');</script>";
			}
			
				echo "<script>window.location='".site_url('simpanan_sukarela/tampil_data')."';</script>";
			

		

}


}



	public function tambah_data_sukarela()
{

		$this->form_validation->set_rules('koperasi_id','Koperasi ID','required|is_unique[tb_simpanan_sukarela.koperasi_id]');		
		$this->form_validation->set_rules('simpanan_sukarela','Simpanan sukarela','required');


		$this->form_validation->set_message('required','%s masih kosong, silahkan di isi');
		$this->form_validation->set_message('is_unique','{field} ini sudah di pakai, Silahkan diganti');
		
		//memberi warna pada rom error
		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		if($this->form_validation->run() == FALSE ) {
			$this->template->load('template','simpanan/form_tambah_data_sukarela');
		}
		else {
			$post = $this->input->post(null,TRUE);
			$this->ssukarela_m->tambah_data_sukarela($post);
			if($this->db->affected_rows() > 0) {

				echo "<script>alert('Data berhasil ditambah');</script>";
			}
			
				echo "<script>window.location='".site_url('simpanan_sukarela/tampil_data')."';</script>";
			

		

}
}


public function kegiatan_tabungan($id){

		$query = $this->ssukarela_m->ambil($id);
		$data['row'] = $query->row();
		$this->template->load('template','simpanan/form_keg_data_sukarela',$data);

		if(isset($_POST['btnSimpan'])) {
			$post = $this->input->post(null,TRUE);
			$this->ssukarela_m->ambil_simpan($post);

			if($this->db->affected_rows() > 0 ) {
				if($post['aksi'] == 'Masuk'){
					$jumlah = $post['jumlah'];
					$koperasi_id = $post['koperasi_id'];
					$sql = "UPDATE tb_simpanan_sukarela SET jumlah = jumlah + '$jumlah' WHERE koperasi_id = '$koperasi_id'";
					$this->db->query($sql);
				}
				else if($post['aksi'] == 'Keluar'){
					$jumlah = $post['jumlah'];
					$koperasi_id = $post['koperasi_id'];
					$sql = "UPDATE tb_simpanan_sukarela SET jumlah = jumlah - '$jumlah' WHERE koperasi_id = '$koperasi_id'";
					$this->db->query($sql);

				}

				echo "<script>alert('Data berhasil di simpan');</script>";
				echo "<script>window.location='".site_url('simpanan_sukarela/tampil_data')."';</script>";

			}		
			


		}
	

}

public function simpanan_sukarela_print(){

$data['row'] = $this->ssukarela_m->tampil()->result();
$this->load->view('simpanan/sukarela_data_print',$data);

}

// =================================================
}


