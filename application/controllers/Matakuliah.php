<?php
class Matakuliah extends CI_Controller {
	private $limit=10;

	function __construct(){
		parent::__construct();
		$this->load->library(array('template','pagination','form_validation',));
		$this->load->model('model_matakuliah');

		if (!$this->session->userdata('username')) {
			redirect('home');
		}
	}

	public function index($offset=0,$order_column='kode_mat',$order_type='asc'){
		if (empty($offset)) $offset=0;
		if (empty($order_column)) $order_column='kode_mat';
		if (empty($order_type)) $order_type='asc';

		//load data
		$data['matakuliah']=$this->model_matakuliah->semua($this->limit,$offset,$order_column,$order_type)->result();
		$data['title']="Data Matakuliah";

		$config['base_url']=site_url('matakuliah/index');
		$config['total_rows']=$this->model_matakuliah->jumlah();
		$config['per_page']=$this->limit;
		$config['uri_segment']=3;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();

		if ($this->uri->segment(3)=="delete_success")
			$data['message']="<div class='alert alert-success'>Data Berhasil Dihapus</div>";
		else if($this->uri->segment(3)=="add_success")
			$data['message']="<div class='alert alert-success'>Data Berhasil Disimpan</div>";
		else
			$data['message']='';
		$this->template->display('matakuliah/index',$data);
	}

	public function tambah(){
		$data['title']="Tambah Matakuliah";
		$data['dosen']=$this->model_matakuliah->getDosen()->result();
		$this->_set_rules();
		if ($this->form_validation->run()==true) {
			$kode_mat=$this->input->post('kode_mat');
			$cek=$this->model_matakuliah->cek($kode_mat);
			if ($cek->num_rows()>0) {
				$data['message']="<div class='alert alert-danger'>Nama Prodi Sudah Ada</div>";
				$this->template->display('matakuliah/tambah',$data);
			} else {
				$info =array(
					'kode_mat'=>$this->input->post('kode_mat'),
					'nama_mat'=>$this->input->post('nama_mat'),
					'sks'=>$this->input->post('sks'),
					'jam'=>$this->input->post('jam'),
					'nama'=>$this->input->post('nama')
				);
				$this->model_matakuliah->simpan($info);
				redirect('matakuliah/index/add_success');
			}
		} else {
			$data['message']="";
			$this->template->display('matakuliah/tambah',$data);
		}
	}

	public function hapus(){
        $kode=$this->input->post('kode');
        $this->model_matakuliah->hapus($kode);
	}

	public function edit($id){
		$data['title']="Update Data Matakuliah";
		$data['dosen']=$this->model_matakuliah->getDosen()->result();
		$this->_set_rules();
		if ($this->form_validation->run()==true) {
			$kode_mat=$this->input->post('kode_mat');
			$info=array(
				'kode_mat'=>$this->input->post('kode_mat'),
				'nama_mat'=>$this->input->post('nama_mat'),
				'sks'=>$this->input->post('sks'),
				'jam'=>$this->input->post('jam'),
				'nama'=>$this->input->post('nama')
			);
			$this->model_matakuliah->update($kode_mat,$info);
			$data['message']="<div class='alert alert-success'>Data Berhasil Di Update</div>";
			$data['matakuliah']=$this->model_matakuliah->cek($kode_mat)->row_array();
			$this->template->display('matakuliah/edit',$data);
		} else {
			$data['matakuliah']=$this->model_matakuliah->cek($id)->row_array();
			$data['message']="";
			$this->template->display('matakuliah/edit',$data);
		}
	}

	public function cari(){
 		$data['title']="Search";
 		$cari=$this->input->post('cari');
 		$cek=$this->model_matakuliah->cari($cari);
 		if ($cek->num_rows()>0) {
 			$data['message']="";
 			$data['matakuliah']=$cek->result();
 			$this->template->display('matakuliah/cari',$data);
 		} else {
 			$data['message']="<div class='alert alert-success'>Data Tidak Ditemukan</div>";
 			$data['matakuliah']=$cek->result();
 			$this->template->display('matakuliah/cari',$data);
 		}
 	}

	public function _set_rules(){
		$this->form_validation->set_rules('kode_mat','Kode Matakuliah','required|max_length[10]');
		$this->form_validation->set_rules('nama_mat','Nama Matakuliah','required|max_length[50]');
		$this->form_validation->set_rules('sks','SKS','required|max_length[50]');
		$this->form_validation->set_rules('jam','Jam','required|max_length[50]');
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}
}