<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	
	public function index()
	{
		// $this->load->view('dashboard');
		check_not_login();
		$this->load->view('anggota');
	}
}