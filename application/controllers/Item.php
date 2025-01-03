<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		//cara meloda lebih dari 1 file model
		$this->load->model(['item_m','unit_m','category_m']);
		
	}
	
	public function index()
	{
		// $this->load->view('dashboard');
		$data['row'] = $this->item_m->get();
		$this->template->load('template','product/item/item_data',$data);
	} 

	public function add()
	{
		$item = new stdClass();
		$item->item_id = null;
		$item->barcode = null;
		$item->name = null;		
		$item->price = null;
		$item->category_id = null;

		$query_category = $this->category_m->get();	

		$query_unit = $this->unit_m->get();
		$unit[null] = '- Pilih -';
		foreach($query_unit->result() as $unt){
			$unit[$unt->unit_id] = $unt->name;
		}

		$data = [
		'page' => 'add',
		'row' => $item,
		'category' => $query_category,
		'unit' => $unit,
		'selectedunit' => null,
		];
		$this->template->load('template','product/item/item_form',$data);
	}

	public function edit($id)
	{
		$query = $this->item_m->get($id);
		if($query->num_rows() > 0) {
		$item = $query->row();
		$query_category = $this->category_m->get();	

		$query_unit = $this->unit_m->get();
		$unit[null] = '- Pilih -';
		foreach($query_unit->result() as $unt){
			$unit[$unt->unit_id] = $unt->name;
		}

		$data = [
		'page' => 'edit',
		'row' => $item,
		'category' => $query_category,
		'unit' => $unit,
		'selectedunit' => $item->unit_id,
		];
		$this->template->load('template','product/item/item_form',$data);
		}
		else{
			echo "<script>alert('data tidak di temukan');";
			echo "window.location='".site_url('item')."';</script>";
		}
	}

	public function process()
	{
				$config['upload_path'] = './uploads/product';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = 2048;
				$config['file_name'] = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
				$this->load->library('upload',$config);

				$post = $this->input->post(null,TRUE);
		if(isset($_POST['add'])) {
			if($this->item_m->check_barcode($post['barcode'])->num_rows() > 0){
				$this->session->set_flashdata('error',"Barcode $post[barcode] Sudah dipakai Produk lain");
				redirect('item/add');
			}
			else{
				

				if(@$_FILES['image']['name'] != null){
					if($this->upload->do_upload('image')){
						$post['image'] = $this->upload->data('file_name');
						$this->item_m->add($post);
						if($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('success','Sukses');
			}
			
				redirect('item');

					}
					else{

						$error=$this->upload->display_errors();
						$this->session->set_flashdata('error',$error);
						redirect('item/add');
					}			
				}
				else{
						$post['image'] = null;
						$this->item_m->add($post);
						if($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('success','Sukses');
			}
			
				redirect('item');
				}
			}
		}
		else if(isset($_POST['edit'])) {
			if($this->item_m->check_barcode($post['barcode'],$post['id'])->num_rows() > 0){
				$this->session->set_flashdata('error',"Barcode $post[barcode] Sudah dipakai Produk lain");
				redirect('item/edit/'.$post['id']);
			}
			else {
				if(@$_FILES['image']['name'] != null){
					if($this->upload->do_upload('image')){

						$item = $this->item_m->get($post['id'])->row();
						if($item->image != null){
							$target_file = './uploads/product/'.$item->image;
							unlink($target_file);
						}


						$post['image'] = $this->upload->data('file_name');
						$this->item_m->edit($post);
						if($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('success','Sukses');
			}
			
				redirect('item');

					}
					else{

						$error=$this->upload->display_errors();
						$this->session->set_flashdata('error',$error);
						redirect('item/add');
					}			
				}
				else{
						$post['image'] = null;
						$this->item_m->edit($post);
						if($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('success','Sukses');
			}
			
				redirect('item');
				}
			
				}
		}
		
	}

	public function del($id)
	{
		$item = $this->item_m->get($id)->row();
		if($item->image != null){
			$target_file = './uploads/product/'.$item->image;
			unlink($target_file);
			}

		$this->item_m->del($id);
		if($this->db->affected_rows() > 0) {

				$this->session->set_flashdata('success','Data berhasil di Hapus');
			}
			
				redirect('item');
	
	}

	function barcode_qrcode($id)
	{

		$data['row'] = $this->item_m->get($id)->row();
		$this->template->load('template','product/item/barcode_qrcode',$data);

		// $generatorSVG = new Picqer\Barcode\BarcodeGeneratorSVG();
		// $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
		// $generatorJPG = new Picqer\Barcode\BarcodeGeneratorJPG();
		// $generatorHTML = new Picqer\Barcode\BarcodeGeneratorHTML();
		// TYPE_CODE_39
		// TYPE_CODE_39_CHECKSUM
		// TYPE_CODE_39E
		// TYPE_CODE_39E_CHECKSUM
		// TYPE_CODE_93
		// TYPE_STANDARD_2_5
		// TYPE_STANDARD_2_5_CHECKSUM
		// TYPE_INTERLEAVED_2_5
		// TYPE_INTERLEAVED_2_5_CHECKSUM
		// TYPE_CODE_128
		// TYPE_CODE_128_A
		// TYPE_CODE_128_B
		// TYPE_CODE_128_C
		// TYPE_EAN_2
		// TYPE_EAN_5
		// TYPE_EAN_8
		// TYPE_EAN_13
		// TYPE_UPC_A
		// TYPE_UPC_E
		// TYPE_MSI
		// TYPE_MSI_CHECKSUM
		// TYPE_POSTNET
		// TYPE_PLANET
		// TYPE_RMS4CC
		// TYPE_KIX
		// TYPE_IMB
		// TYPE_CODABAR
		// TYPE_CODE_11
		// TYPE_PHARMA_CODE
		// TYPE_PHARMA_CODE_TWO_TRACKS

		
	}

	function barcode_print($id)		{

		$data['row'] = $this->item_m->get($id)->row();
		$html = $this->load->view('product/item/barcode_print',$data,true);
		$this->fungsi->PDFGenerator($html,'barcode-'.$data['row']->barcode,'A4','landscape');
	}

	function qrcode_print($id){

		$data['row'] = $this->item_m->get($id)->row();
		$html = $this->load->view('product/item/qrcode_print',$data,true);
		$this->fungsi->PDFGenerator($html,'qrcode-'.$data['row']->barcode,'A4','Potrait');
	}

}