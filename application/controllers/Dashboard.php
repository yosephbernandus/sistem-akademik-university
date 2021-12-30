<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_administrator');
        $this->load->library(array('form_validation', 'template'));

        if (!$this->session->userdata('username')) {
            redirect('home');
        }
    }

    public function index()
    {
        $data['title'] = "Home";

        $this->template->display('dashboard/index', $data);
    }

    public function administrator()
    {
        $data['title'] = "Data Admin";
        $data['admin'] = $this->model_administrator->semua()->result();
        if ($this->uri->segment(3) == "delete_success")
            $data['message'] = "<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if ($this->uri->segment(3) == "add_success")
            $data['message'] = "<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message'] = '';
        $this->template->display('dashboard/admin', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        redirect('home');
    }

    public function tambahadmin()
    {
        $data['title'] = "Tambah Admin";
        $this->_set_rules();
        if ($this->form_validation->run() == true) {
            $user = $this->input->post('user');
            $cek = $this->model_administrator->cekKode($user);
            if ($cek->num_rows() > 0) {
                $data['message'] = "<div class='alert alert-danger'>Username sudah digunakan</div>";
                $this->template->display('dashboard/tambahadmin', $data);
            } else {
                $info = array(
                    'user' => $this->input->post('user'),
                    'password' => md5($this->input->post('password'))
                );
                $this->model_administrator->simpan($info);
                redirect('dashboard/administrator/add_success');
            }
        } else {
            $data['message'] = "";
            $this->template->display('dashboard/tambahadmin', $data);
        }
    }

    public function edit($id)
    {
        $data['title'] = "Update data Petugas";
        $this->_set_rules();
        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id');
            $info = array(
                'user' => $this->input->post('user'),
                'password' => md5($this->input->post('password'))
            );
            $this->model_administrator->update($id, $info);
            $data['admin'] = $this->model_administrator->cekId($id)->row_array();
            $data['message'] = "<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $this->template->display('dashboard/editadmin', $data);
        } else {
            $data['message'] = "";
            $data['admin'] = $this->model_administrator->cekId($id)->row_array();
            $this->template->display('dashboard/editadmin', $data);
        }
    }

    public function hapus()
    {
        $kode = $this->input->post('kode');
        $this->model_administrator->hapus($kode);
    }

    public function _set_rules()
    {
        $this->form_validation->set_rules('user', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>", "</div>");
    }
}
