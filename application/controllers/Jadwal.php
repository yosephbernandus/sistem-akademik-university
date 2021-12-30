<?php
class Jadwal extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('template');
		if (!$this->session->userdata('username')) {
			redirect('home');
		}
	}

	public function index(){
		$data['title']="Jadwal";
		
		$this->template->display('jadwal/index',$data);
	}
}