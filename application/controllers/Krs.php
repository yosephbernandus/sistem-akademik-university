<?php
class Krs extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'template'));
        $this->load->model('model_krs');

        if (!$this->session->userdata('username')) {
            redirect('home');
        }
    }

    public function index()
    {
        $data['title'] = "Kartu Rencana Study";
        $data['tanggal_input'] = date('Y-m-d');
        $data['noauto'] = $this->model_krs->nootomatis();
        $data['mahasiswa'] = $this->model_krs->getMahasiswa()->result();
        $this->template->display('krs/index', $data);
    }

    public function tampil()
    {
        $data['tmp'] = $this->model_krs->tampilTmp()->result();
        $data['jumlahTmp'] = $this->model_krs->jumlahTmp();
        $this->load->view('krs/tampil', $data);
    }

    function sukses()
    {

        $tmp = $this->model_krs->tampilTmp()->result();
        foreach ($tmp as $row) {
            $info = array(
                'id_krs' => $this->input->post('nomer'),
                'nis' => $this->input->post('nis'),
                'kode_mat' => $row->kode_mat,
                'tanggal_input' => $this->input->post('tanggal_input'),
                'status' => "N"
            );
            $this->model_krs->simpan($info);

            //hapus data di temp
            $this->model_krs->hapusTmp($row->kode_mat);
        }
    }

    function cariMahasiswa()
    {
        $nis = $this->input->post('nis');
        $mahasiswa = $this->model_krs->cariMahasiswa($nis);
        if ($mahasiswa->num_rows() > 0) {
            $mahasiswa = $mahasiswa->row_array();
            echo $mahasiswa['nama_mhs'];
        }
    }

    function cariMatakuliah()
    {
        $kode_mat = $this->input->post('kode_mat');
        $matakuliah = $this->model_krs->cariMatakuliah($kode_mat);
        if ($matakuliah->num_rows() > 0) {
            $matakuliah = $matakuliah->row_array();
            echo $matakuliah['nama_mat'] . "|" . $matakuliah['sks'] . "|" . $matakuliah['jam'];
        }
    }

    function tambah()
    {
        $kode_mat = $this->input->post('kode_mat');
        $cek = $this->model_krs->cekTmp($kode_mat);
        if ($cek->num_rows() < 1) {
            $info = array(
                'kode_mat' => $this->input->post('kode_mat'),
                'nama_mat' => $this->input->post('nama_mat'),
                'sks' => $this->input->post('sks'),
                'jam' => $this->input->post('jam')
            );
            $this->model_krs->simpanTmp($info);
        }
    }

    function hapus()
    {
        $kode_mat = $this->input->post('kode_mat');
        $this->model_krs->hapusTmp($kode_mat);
    }

    function pencarianmatakuliah()
    {
        $cari = $this->input->post('carimatakuliah');
        $data['matakuliah'] = $this->model_krs->pencarianmatakuliah($cari)->result();
        $this->load->view('krs/pencariankrs', $data);
    }
}
