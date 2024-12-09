<?php

function check_already_login ()

{
	$ci =& get_instance();
	$user_session = $ci->session->userdata('anggota_id');
	if($user_session){

		redirect('dashboard');
	}

}

function check_not_login()
{
	$ci =& get_instance();
	$user_session = $ci->session->userdata('anggota_id');
	if(!$user_session){
		redirect('auth/login');
	}
}

function check_admin()
{
	$ci =& get_instance();
	$ci->load->library('fungsi');
	if($ci->fungsi->user_login()->level != 1){
		redirect('dashboard');
	}
}


function check_level3()
{
	$ci =& get_instance();
	$ci->load->library('fungsi');
	if($ci->fungsi->user_login()->level != 3){
		redirect('dashboard');
	}
}

function total_pokok()
{
	$this->load->spokok_m();
}