<?php
class Auth extends CI_Controller{

	public function login()
	{
		check_already_login();
		$this->load->view('login');
		// echo sha1('123456');die;
		// 7c4a8d09ca3762af61e59520943dc26494f8941b
	}

	public function process()
	{
		$post = $this->input->post(null,TRUE);
		if(isset($post['login'])) {

			$this->load->model('user_m');
			$query = $this->user_m->login($post);

			if($query->num_rows() > 0){

				$row = $query->row();
				$params = array(
					'anggota_id'	=> $row->anggota_id,
					'level'		=> $row->level,
					'kode_toko' => $row->kode_toko,
					'koperasi_id' => $row->koperasi_id
					);
				$this->session->set_userdata($params);
				redirect('dashboard');
			}

			else {

				echo "<script>
					alert('Login Gagal');
					window.location='".site_url('auth/login')."';
					</script>";
			}
	}
}

public function logout()
{

	$params = array('anggota_id','level','kode_toko','koperasi_id');
	$this->session->unset_userdata($params);
	redirect('auth/login');
}


}