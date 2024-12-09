<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan_wajib extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('swajib_m');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		
	}

	function tampil_data()
	{

		$data['row'] = $this->swajib_m->tampil()->result();
		$this->template->load('template','simpanan/wajib_data',$data);

		if(isset($_POST['btn_edit'])){
			$post = $this->input->post(null,TRUE);
			$this->swajib_m->edit_data_wajib($post);
			if($this->db->affected_rows() > 0) {

				echo "<script>alert('Data berhasil diubah');</script>";
			}
			
				echo "<script>window.location='".site_url('simpanan_wajib/tampil_data')."';</script>";
			

		

}


}



	public function tambah_data_wajib()
{

		$this->form_validation->set_rules('koperasi_id','Koperasi ID','required|is_unique[tb_simpanan_wajib.koperasi_id]');		
		$this->form_validation->set_rules('simpanan_wajib','Simpanan wajib','required');


		$this->form_validation->set_message('required','%s masih kosong, silahkan di isi');
		$this->form_validation->set_message('is_unique','{field} ini sudah di pakai, Silahkan diganti');
		
		//memberi warna pada rom error
		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		if($this->form_validation->run() == FALSE ) {
			$this->template->load('template','simpanan/form_tambah_data_wajib');
		}
		else {
			$post = $this->input->post(null,TRUE);
			$this->swajib_m->tambah_data_wajib($post);
			if($this->db->affected_rows() > 0) {

				echo "<script>alert('Data berhasil ditambah');</script>";
			}
			
				echo "<script>window.location='".site_url('simpanan_wajib/tampil_data')."';</script>";
			

		

}
}

public function kegiatan_tabungan($id){

		$query = $this->swajib_m->ambil($id);
		$data['row'] = $query->row();
		$this->template->load('template','simpanan/form_keg_data_wajib',$data);

		if(isset($_POST['btnSimpan'])) {
			$post = $this->input->post(null,TRUE);
			$this->swajib_m->ambil_simpan($post);

			if($this->db->affected_rows() > 0 ) {
				if($post['aksi'] == 'Masuk'){
					$jumlah = $post['jumlah'];
					$koperasi_id = $post['koperasi_id'];
					$sql = "UPDATE tb_simpanan_wajib SET jumlah = jumlah + '$jumlah' WHERE koperasi_id = '$koperasi_id'";
					$this->db->query($sql);
				}
				else if($post['aksi'] == 'Keluar'){
					$jumlah = $post['jumlah'];
					$koperasi_id = $post['koperasi_id'];
					$sql = "UPDATE tb_simpanan_wajib SET jumlah = jumlah - '$jumlah' WHERE koperasi_id = '$koperasi_id'";
					$this->db->query($sql);

				}

				echo "<script>alert('Data berhasil di simpan');</script>";
				echo "<script>window.location='".site_url('simpanan_wajib/tampil_data')."';</script>";

			}		
			


		}
	

}
public function simpanan_wajib_print(){

$data['row'] = $this->swajib_m->tampil()->result();
$this->load->view('simpanan/wajib_data_print',$data);

}

// =================================================
}


