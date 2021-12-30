<?php
class Dosen extends CI_Controller{
	private $limit=20;

	function __construct(){
		parent::__construct();
		$this->load->library(array('template','pagination','form_validation','upload'));
		$this->load->model('model_dosen');

		if (!$this->session->userdata('username')) {
			redirect('home');
		}
	}

	public function index($offset=0,$order_column='id_dosen',$order_type='asc'){
		if (empty($offset)) $offset=0;
		if (empty($order_column)) $order_column='id_dosen';
		if (empty($order_type)) $order_type='asc';

		//load data
		
		$data['dosen']=$this->model_dosen->semua($this->limit,$offset,$order_column,$order_type)->result();
		$data['title']="Data Anggota";

		$config['base_url']=site_url('dosen/index');
		$config['total_rows']=$this->model_dosen->jumlah();
		$config['per_page']=$this->limit;
		$config['uri_segment']=3;
		$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
		$config['ful_tag_close']="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close']= '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();

		if ($this->uri->segment(3)=="delete_success")
			$data['message']="<div class='alert alert-success'>Data Berhasil Dihapus</div>";
		else if($this->uri->segment(3)=="add_success")
			$data['message']="<div class='alert alert-success'>Data Berhasil Disimpan</div>";
		else
			$data['message']='';
		$this->template->display('dosen/index',$data);
	}

	public function tambah(){
		$data['title'] ="Tambah Data Dosen";
		$data['prodi']=$this->model_dosen->getProdi()->result();
		$this->_set_rules();
		if ($this->form_validation->run()==true) {
			$nid=$this->input->post('nid');
			$cek=$this->model_dosen->cek($nid);
			if ($cek->num_rows()>0){
				$data['message']="<div class='alert alert-warning'>NID Sudah Digunakan</div>";
				$this->template->display('dosen/tambah',$data);
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
					'nid'=>$this->input->post('nid'),
					'nama'=>$this->input->post('nama'),
					'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
					'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
					'nama_prodi'=>$this->input->post('nama_prodi'),
					'email'=>$this->input->post('email'),
					'no_telepon'=>$this->input->post('no_telepon'),
					'image'=>$gambar
				);
				$this->model_dosen->simpan($info);
				redirect('dosen/index/add_success');
			}
		} else {
			$data['message']="";
			$this->template->display('dosen/tambah',$data);
		}
	}

	public function edit($id){
		$data['title']="Edit Dosen";
		$data['prodi']=$this->model_dosen->getProdi()->result();
		$this->_set_rules();
		if ($this->form_validation->run()==true) {
			$id_dosen=$this->input->post('id_dosen');
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
					'nid'=>$this->input->post('nid'),
					'nama'=>$this->input->post('nama'),
					'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
					'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
					'nama_prodi'=>$this->input->post('nama_prodi'),
					'email'=>$this->input->post('email'),
					'no_telepon'=>$this->input->post('no_telepon'),
					'image'=>$gambar
			);

			$this->model_dosen->update($id_dosen,$info);

			$data['message']="<div class='alert alert-success'>Data Berhasil Di Update</div>";

			$data['dosen']=$this->model_dosen->cek($id_dosen)->row_array();
			$this->template->display('dosen/edit',$data);
		} else {
			$data['dosen']=$this->model_dosen->cek($id)->row_array();
			$data['message']="";
			$this->template->display('dosen/edit',$data);
		}
	}

	public function hapus(){
		$kode=$this->input->post('kode');
		$detail=$this->model_dosen->cek($kode)->result();
	foreach($detail as $det):
		unlink("assets/img/dosen/".$det->image);
	endforeach;
		$this->model_dosen->hapus($kode);
 	}

 	public function cari(){
 		$data['title']="Search";
 		$cari=$this->input->post('cari');
 		$cek=$this->model_dosen->cari($cari);
 		if ($cek->num_rows()>0) {
 			$data['message']="";
 			$data['dosen']=$cek->result();
 			$this->template->display('dosen/cari',$data);
 		} else {
 			$data['message']="<div class='alert alert-success'>Data Tidak Ditemukan</div>";
 			$data['dosen']=$cek->result();
 			$this->template->display('dosen/cari',$data);
 		}
 	}

	public function _set_rules(){
		$this->form_validation->set_rules('nid','NID','required|max_length[10]');
		$this->form_validation->set_rules('nama','Nama','required|max_length[50]');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','max_length[2]');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('nama_prodi','Prodi','required|max_length[25]');
		$this->form_validation->set_rules('email','Email','required|max_length[50]');
		$this->form_validation->set_rules('no_telepon','No Telepon','required|max_length[15]');
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}
}