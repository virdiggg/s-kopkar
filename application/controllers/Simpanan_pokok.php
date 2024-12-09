<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan_pokok extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('spokok_m');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		
	}

	function tampil_data()
	{

		$data['row'] = $this->spokok_m->tampil()->result();
		$this->template->load('template','simpanan/pokok_data',$data);

		if(isset($_POST['btn_edit'])){
			$post = $this->input->post(null,TRUE);
			$this->spokok_m->edit_data_pokok($post);
			if($this->db->affected_rows() > 0) {

				echo "<script>alert('Data berhasil diubah');</script>";
			}
			
				echo "<script>window.location='".site_url('simpanan_pokok/tampil_data')."';</script>";
			

		

}


}



	public function tambah_data_pokok()
{

		$this->form_validation->set_rules('koperasi_id','Koperasi ID','required|is_unique[tb_simpanan_pokok.koperasi_id]');		
		$this->form_validation->set_rules('simpanan_pokok','Simpanan Pokok','required');



		$this->form_validation->set_message('required','%s masih kosong, silahkan di isi');
		$this->form_validation->set_message('is_unique','{field} ini sudah di pakai, Silahkan diganti');
		
		//memberi warna pada rom error
		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		if($this->form_validation->run() == FALSE ) {
			$this->template->load('template','simpanan/form_tambah_data_pokok');
		}
		else {
			$post = $this->input->post(null,TRUE);
			$this->spokok_m->tambah_data_pokok($post);
			if($this->db->affected_rows() > 0) {

				echo "<script>alert('Data berhasil ditambah');</script>";
			}
			
				echo "<script>window.location='".site_url('simpanan_pokok/tampil_data')."';</script>";
			

		

}
}
public function kegiatan_tabungan($id){

		$query = $this->spokok_m->ambil($id);
		$data['row'] = $query->row();
		$this->template->load('template','simpanan/form_keg_data_pokok',$data);

		if(isset($_POST['btnSimpan'])) {
			$post = $this->input->post(null,TRUE);
			$this->spokok_m->ambil_simpan($post);

			if($this->db->affected_rows() > 0 ) {
				if($post['aksi'] == 'Masuk'){
					$jumlah = $post['jumlah'];
					$koperasi_id = $post['koperasi_id'];
					$sql = "UPDATE tb_simpanan_pokok SET jumlah = jumlah + '$jumlah' WHERE koperasi_id = '$koperasi_id'";
					$this->db->query($sql);
				}
				else if($post['aksi'] == 'Keluar'){
					$jumlah = $post['jumlah'];
					$koperasi_id = $post['koperasi_id'];
					$sql = "UPDATE tb_simpanan_pokok SET jumlah = jumlah - '$jumlah' WHERE koperasi_id = '$koperasi_id'";
					$this->db->query($sql);

				}

				echo "<script>alert('Data berhasil di simpan');</script>";
				echo "<script>window.location='".site_url('simpanan_pokok/tampil_data')."';</script>";

			}		
			


		}
	

}

public function simpanan_pokok_print(){

$data['row'] = $this->spokok_m->tampil()->result();
$this->load->view('simpanan/pokok_data_print',$data);

}

// =================================================
}


