<?php
class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('captcha');
		$this->load->model(array('model_administrator', 'model_mahasiswa', 'model_dosen'));
		if ($this->session->userdata('username')) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->load->view('home/index');
	}

	public function mahasiswa()
	{
		$data['title'] = "Data Mahasiswa";
		$data['mahasiswa'] = $this->model_mahasiswa->semua()->result();
		$this->load->view('home/mahasiswa', $data);
	}

	public function cari_mahasiswa()
	{
		$cari = $this->input->post('cari');
		$data['title'] = "Data Mahasiswa";
		$data['mahasiswa'] = $this->model_mahasiswa->cari($cari)->result();
		$this->load->view('home/mahasiswa', $data);
	}

	public function dosen()
	{
		$data['title'] = "Data Dosen";
		$data['dosen'] = $this->model_dosen->semua()->result();
		$this->load->view('home/dosen', $data);
	}

	public function proses()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');

		if ($this->form_validation->run() == true) {
			$this->session->set_flashdata('message', 'Username dan password harus diisi');
			redirect('home');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->model_administrator->cek($username, md5($password));
			print_r($username);
			if ($cek->num_rows() > 0) {
				//Login berhasil buat session

				$this->session->set_userdata('username', $username);
				redirect('dashboard');
			} else {
				// Login gagal
				$this->session->set_flashdata('message', 'Username atau password salah');
				redirect('home');
			}
		}
	}
}
