<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur extends CI_Controller {

	
	public function struktur_kopkar()
	{
		// $this->load->view('dashboard');
		check_not_login();
		
		
		$this->template->load('template','struktur/struktur_organisasi');
	}
}