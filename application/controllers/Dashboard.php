<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function index()
	{
        // $this->load->model('user_m');
        // $this->load->library('authentication');
        // $param = [
        //     'username' => 'testing',
        //     'password' => '123456',
        // ];

        // $query = $this->user_m->login($param);
        // $user = $query->row();
        // $token = $this->authentication->generateJWTToken($user);
		// echo "<pre>";var_dump($user);var_dump($token);die;
		// $this->load->view('dashboard');
		check_not_login();
		
		
		$this->template->load('template','dashboard');
	}
}
