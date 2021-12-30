<?php
class Mahasiswa extends CI_Controller{
	private $limit=20;

	function __construct(){
		parent::__construct();
		$this->load->library(array('template','pagination','form_validation','upload'));
		$this->load->model('model_mahasiswa');

		if (!$this->session->userdata('username')) {
			redirect('home');
		}
	}

	public function index($offset=0,$order_column='nis',$order_type='asc'){
		if (empty($offset)) $offset=0;
		if (empty($order_column)) $order_column='nis';
		if (empty($order_type)) $order_type='asc';

		//load data
		$data['mahasiswa']=$this->model_mahasiswa->semua($this->limit,$offset,$order_column,$order_type)->result();
		$data['title']="Data Mahasiswa";

		$config['base_url']=site_url('mahasiswa/index');
		$config['total_rows']=$this->model_mahasiswa->jumlah();
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
		$this->template->display('mahasiswa/index',$data);
	}

	public function tambah(){
		$data['title'] ="Tambah Data Mahasiswa";
		$data['prodi']=$this->model_mahasiswa->getProdi()->result();
		$this->_set_rules();
		if ($this->form_validation->run()==true) {
			$nis=$this->input->post('nis');
			$cek=$this->model_mahasiswa->cek($nis);
			if ($cek->num_rows()>0){
				$data['message']="<div class='alert alert-warning'>Nama Mahasiswa Sudah Di gunakan</div>";
				$this->template->display('mahasiswa/tambah',$data);
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
					'nis'=>$this->input->post('nis'),
					'nama_mhs'=>$this->input->post('nama_mhs'),
					'nama_prodi'=>$this->input->post('nama_prodi'),
					'agama'=>$this->input->post('agama'),
					'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
					'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
					'alamat'=>$this->input->post('alamat'),
					'image'=>$gambar
				);
				$this->model_mahasiswa->simpan($info);
				redirect('mahasiswa/index/add_success');
			}
		} else {
			$data['message']="";
			$this->template->display('mahasiswa/tambah',$data);
		}
	}

	public function edit($id){
		$data['title']="Edit Mahasiswa";
		$data['prodi']=$this->model_mahasiswa->getProdi()->result();
		$this->_set_rules();
		if ($this->form_validation->run()==true) {
			$nis=$this->input->post('nis');
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
				'nis'=>$this->input->post('nis'),
				'nama_mhs'=>$this->input->post('nama_mhs'),
				'nama_prodi'=>$this->input->post('nama_prodi'),
				'agama'=>$this->input->post('agama'),
				'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
				'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
				'alamat'=>$this->input->post('alamat'),
				'image'=>$gambar
			);

			$this->model_mahasiswa->update($nis,$info);

			$data['message']="<div class='alert alert-success'>Data Berhasil Di Update</div>";

			$data['mahasiswa']=$this->model_mahasiswa->cek($id)->row_array();
			$this->template->display('mahasiswa/edit',$data);
		} else {
			$data['mahasiswa']=$this->model_mahasiswa->cek($id)->row_array();
			$data['message']="";
			$this->template->display('mahasiswa/edit',$data);
		}
	}

	public function hapus(){
		$kode=$this->input->post('kode');
		$detail=$this->model_mahasiswa->cek($kode)->result();
	foreach($detail as $det):
		unlink("assets/img/dosen/".$det->image);
	endforeach;
		$this->model_mahasiswa->hapus($kode);
 	}

 	public function cari(){
 		$data['title']="Search";
 		$cari=$this->input->post('cari');
 		$cek=$this->model_mahasiswa->cari($cari);
 		if ($cek->num_rows()>0) {
 			$data['message']="";
 			$data['mahasiswa']=$cek->result();
 			$this->template->display('mahasiswa/cari',$data);
 		} else {
 			$data['message']="<div class='alert alert-success'>Data Tidak Ditemukan</div>";
 			$data['mahasiswa']=$cek->result();
 			$this->template->display('mahasiswa/cari',$data);
 		}
 	}

	public function _set_rules(){
		$this->form_validation->set_rules('nis','NIS','required|max_length[10]');
		$this->form_validation->set_rules('nama_mhs','Nama Mahasiswa','required|max_length[50]');
		$this->form_validation->set_rules('nama_prodi','Prodi','required|max_length[25]');
		$this->form_validation->set_rules('agama','Agama','required|max_length[25]');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','max_length[2]');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('alamat','Alamat','required|max_length[100]');
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}

	public function cetak(){
		ob_start();
		$data['mahasiswa']=$this->model_mahasiswa->view();
		$this->template->display('mahasiswa/print', $data);
		$html = ob_get_contents();
		ob_end_clean();

		require_once('./assets/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('P','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('Mahasiswa.pdf', 'D');
	}
}