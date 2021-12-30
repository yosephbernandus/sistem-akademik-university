<?php
class Prodi extends CI_Controller{
	private $limit=20;

	function __construct(){
		parent::__construct();
		$this->load->library(array('template','pagination','form_validation','upload'));
		$this->load->model('model_prodi');

		if (!$this->session->userdata('username')) {
			redirect('home');
		}
	}

	public function index($offset=0,$order_column='id_prodi',$order_type='asc'){
		if (empty($offset)) $offset=0;
		if (empty($order_column)) $order_column='id_prodi';
		if (empty($order_type)) $order_type='asc';

		$data['prodi']=$this->model_prodi->semua($this->limit,$offset,$order_column,$order_type)->result();
		$data['title']="Data Prodi";

		$config['base_url']=site_url('prodi/index');
		$config['total_rows']=$this->model_prodi->jumlah();
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
		$this->template->display('prodi/index',$data);
	}

	public function tambah(){
		$data['title']="Tambah Prodi";
		$this->_set_rules();
		if ($this->form_validation->run()==true) {
			$nama_prodi=$this->input->post('nama_prodi');
			$cek=$this->model_prodi->cek($nama_prodi);
			if ($cek->num_rows()>0) {
				$data['message']="<div class='alert alert-danger'>Nama Prodi Sudah Ada</div>";
				$this->template->display('prodi/tambah',$data);
			} else {
				$info =array(
					'nama_prodi'=>$this->input->post('nama_prodi')
				);
				$this->model_prodi->simpan($info);
				redirect('prodi/index/add_success');
			}
		} else {
			$data['message']="";
			$this->template->display('prodi/tambah',$data);
		}
	}

	public function edit($id){
		$data['title']="Update Data Prodi";
		$this->_set_rules();
		if ($this->form_validation->run()==true) {
			$id_prodi=$this->input->post('id_prodi');
			$info=array(
				'nama_prodi'=>$this->input->post('nama_prodi')
			);
			$this->model_prodi->update($id_prodi,$info);
			$data['message']="<div class='alert alert-success'>Data Berhasil Di Update</div>";
			$data['prodi']=$this->model_prodi->cek($id_prodi)->row_array();
			$this->template->display('prodi/edit',$data);
		} else {
			$data['prodi']=$this->model_prodi->cek($id)->row_array();
			$data['message']="";
			$this->template->display('prodi/edit',$data);
		}
	}

	public function hapus(){
		$kode=$this->input->post('kode');
        $this->model_prodi->hapus($kode);
 	}

 	public function cari(){
 		$data['title']="Search";
 		$cari=$this->input->post('cari');
 		$cek=$this->model_prodi->cari($cari);
 		if ($cek->num_rows()>0) {
 			$data['message']="";
 			$data['prodi']=$cek->result();
 			$this->template->display('prodi/cari',$data);
 		} else {
 			$data['message']="<div class='alert alert-success'>Data Tidak Ditemukan</div>";
 			$data['prodi']=$cek->result();
 			$this->template->display('prodi/cari',$data);
 		}
 	}

	public function _set_rules(){
		$this->form_validation->set_rules('nama_prodi','Nama Prodi','required|max_length[50]');
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}
}