<?php
class Gedung extends CI_Controller{
	private $limit=20;

	function __construct(){
		parent::__construct();
		$this->load->library(array('template','pagination','form_validation','upload'));
		$this->load->model('model_gedung');

		if (!$this->session->userdata('username')) {
			redirect('home');
		}
	}

	public function index($offset=0,$order_column='id_gedung',$order_type='asc'){
		if (empty($offset)) $offset=0;
		if (empty($order_column)) $order_column='id_gedung';
		if (empty($order_type)) $order_type='asc';

		//load data
		$data['gedung']=$this->model_gedung->semua($this->limit,$offset,$order_column,$order_type)->result();
		$data['title']="Data Gedung";

		$config['base_url']=site_url('gedung/index');
		$config['total_rows']=$this->model_gedung->jumlah();
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
		$this->template->display('gedung/index',$data);
	}

	public function tambah(){
		$data['title'] ="Tambah Data Gedung";
		$this->_set_rules();
		if ($this->form_validation->run()==true) {
			$nama_gedung=$this->input->post('nama_gedung');
			$cek=$this->model_gedung->cek($nama_gedung);
			if ($cek->num_rows()>0){
				$data['message']="<div class='alert alert-warning'>Nama Gedung Sudah Di gunakan</div>";
				$this->template->display('gedung/tambah',$data);
			} else {
				$config['upload_path'] = './assets/img/anggota';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '1000';
				$config['max_width'] = '2000';
				$config['max_height'] = '1024';

				$this->upload->initialize($config);
				if (!$this->upload->do_upload('gambar')) {
					$gambar="";
				} else {
					$gambar=$this->upload->file_name;
				}

				$info=array(
					'nama_gedung'=>$this->input->post('nama_gedung'),
					'ruangan'=>$this->input->post('ruangan'),
					'image'=>$gambar
				);
				$this->model_gedung->simpan($info);
				redirect('gedung/index/add_success');
			}
		} else {
			$data['message']="";
			$this->template->display('gedung/tambah',$data);
		}
	}

	public function edit($id){
		$data['title']="Edit Gedung";
		$this->_set_rules();
		if ($this->form_validation->run()==true) {
			$id_gedung=$this->input->post('id_gedung');
			// setting konfigurasi upload image
			$config['upload_path'] ='./assets/img/anggota/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '2000';
			$config['max_height'] = '1024';

			$this->upload->initialize($config);
			if (!$this->upload->do_upload('gambar')){
				$gambar="";
			} else {
				$gambar=$this->upload->file_name;
			}

			$info=array(
				'nama_gedung'=>$this->input->post('nama_gedung'),
				'ruangan'=>$this->input->post('ruangan'),
				'image'=>$gambar
			);

			$this->model_gedung->update($id_gedung,$info);

			$data['message']="<div class='alert alert-success'>Data Berhasil Di Update</div>";

			$data['gedung']=$this->model_gedung->cek($id_gedung)->row_array();
			$this->template->display('gedung/edit',$data);
		} else {
			$data['gedung']=$this->model_gedung->cek($id)->row_array();
			$data['message']="";
			$this->template->display('gedung/edit',$data);
		}
	}

	public function hapus(){
		$kode=$this->input->post('kode');
		$detail=$this->model_gedung->cek($kode)->result();
	foreach($detail as $det):
		unlink("assets/img/dosen/".$det->image);
	endforeach;
		$this->model_gedung->hapus($kode);
 	}

 	public function cari(){
 		$data['title']="Search";
 		$cari=$this->input->post('cari');
 		$cek=$this->model_gedung->cari($cari);
 		if ($cek->num_rows()>0) {
 			$data['message']="";
 			$data['gedung']=$cek->result();
 			$this->template->display('gedung/cari',$data);
 		} else {
 			$data['message']="<div class='alert alert-success'>Data Tidak Ditemukan</div>";
 			$data['gedung']=$cek->result();
 			$this->template->display('gedung/cari',$data);
 		}
 	}

	public function _set_rules(){
		$this->form_validation->set_rules('nama_gedung','Nama Gedung','required|max_length[10]');
		$this->form_validation->set_rules('ruangan','Ruangan','required|max_length[50]');
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}
}