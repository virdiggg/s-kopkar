<?php

Class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('user_m');
		$this->load->library('form_validation');
	}
	public function index()
	{
		
		$data['row'] = $this->user_m->get();
		$this->template->load('template','user/user_data',$data);
	}

	public function add()
	{
		
		$this->form_validation->set_rules('username','User Name','required|min_length[4]|is_unique[tb_anggota.username]');
		$this->form_validation->set_rules('password','Password','required|min_length[4]');
		$this->form_validation->set_rules('passconf','Confirm Pass','required|matches[password]',array('matches' => 'Konfirmasi password tidak sesuai'));
		
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('level','Level','required');
		$this->form_validation->set_rules('koperasi_id','Koperasi ID','is_unique[tb_anggota.koperasi_id]');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('toko','Kode Toko','required');

		$this->form_validation->set_message('required','%s masih kosong, silahkan di isi');
		$this->form_validation->set_message('min_length','{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique','{field} ini sudah di pakai, Silahkan diganti');
		//memberi warna pada rom error
		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		if($this->form_validation->run() == FALSE ) {
			$toko = $this->user_m->getToko()->result();
			$bank = $this->user_m->getBank()->result();
			$data =array(
				'toko' => $toko,
				'bank' => $bank
				);
			$this->template->load('template','user/user_form_add',$data);
		}
		else {
			$post = $this->input->post(null,TRUE);
			$this->user_m->add($post);
			if($this->db->affected_rows() > 0) {

				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			
				echo "<script>window.location='".site_url('user')."';</script>";
			

		}
		
	}

	public function edit($id)

	{
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('level','Level','required');
		$this->form_validation->set_rules('koperasi_id','Koperasi ID','required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('toko','Kode Toko','required');
		$this->form_validation->set_rules('username','User Name','required|min_length[4]|callback_username_check');

		if($this->input->post('password')) {
		$this->form_validation->set_rules('password','Password','min_length[4]');
		$this->form_validation->set_rules('passconf','Confirm Pass','matches[password]',array('matches' => 'Konfirmasi password tidak sesuai'));

				}
				if($this->input->post('passconf')) {
		
		$this->form_validation->set_rules('passconf','Confirm Pass','matches[password]',array('matches' => 'Konfirmasi password tidak sesuai'));

				}
		$this->form_validation->set_message('required','%s masih kosong, silahkan di isi');
		$this->form_validation->set_message('min_length','{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique','{field} ini sudah di pakai, Silahkan diganti');
		//memberi warna pada rom error
		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');

		if($this->form_validation->run() == FALSE ) {
			$query = $this->user_m->get($id);
			
			if($query->num_rows() > 0) {
				$toko = $this->user_m->getToko()->result();
				$bank = $this->user_m->getBank()->result();

				// $data['row'] = $query->row();
				$data=array(
					'row' => $query->row(),
					'toko' => $toko,
					'bank' => $bank
					);
				$this->template->load('template','user/user_form_edit',$data);
			}
			else {
				echo "<script>alert('Data tidak di temukan');";
				echo "window.location='".site_url('user')."';</scritp>";
			}
			
		}
		else {
			$post = $this->input->post(null,TRUE);
			$this->user_m->edit($post);
			if($this->db->affected_rows() > 0) {

				echo "<script>alert('Data berhasil disimpan');</script>";
			}
			
				echo "<script>window.location='".site_url('user')."';</script>";
			

		}
		
	}

	public function username_check()
	{
		$post = $this->input->post(null,TRUE);
		$query = $this->db->query("SELECT * FROM tb_anggota WHERE username = '$post[username]' AND anggota_id != '$post[anggota_id]'");
		if($query->num_rows() > 0){
			$this->form_validation->set_message('username_check','{field} ini sudah di pakai');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}

	public function del()
	{
		$id = $this->input->post('username');
		$this->user_m->del($id);

			if($this->db->affected_rows() > 0) {

				echo "<script>alert('Data berhasil Di hapus');</script>";
			}
			
				echo "<script>window.location='".site_url('user')."';</script>";
	}

	public function print(){

		$data['row'] = $this->user_m->get();
		// $this->template->load('template','user/user_print',$data);
		$this->load->view('user/user_print',$data);

	}
}