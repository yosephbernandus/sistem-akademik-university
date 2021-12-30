<?php 
class Laporan extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('template'));
        $this->load->model('model_laporan');
        
        if(!$this->session->userdata('username')){
            redirect('home');
        }
    }
    
    public function mahasiswa(){
        $data['title']="Data Mahasiswa";
        $data['mahasiswa']=$this->model_laporan->semuaMahasiswa()->result();
        $this->template->display('laporan/mahasiswa',$data);
    }

    public function dosen(){
        $data['title']="Data Dosen";
        $data['dosen']=$this->model_laporan->semuaDosen()->result();
        $this->template->display('laporan/dosen',$data);
    }

    public function krs(){
        $data['title']="Laporan KRS";
        $this->template->display('laporan/krs',$data);
    }

    public function cari_krs(){
        $data['title']="Detail Krs";
        $tanggal1=$this->input->post('tanggal1');
        $data['lap']=$this->model_laporan->detailkrs($tanggal1)->result();
        $this->load->view('laporan/cari_krs',$data);
    }

    public function detail_krs($id){
        $data['title']=$id;
        $data['krs']=$this->model_laporan->detail_krs($id)->row_array();
        $data['detail']=$this->model_laporan->detail_krs($id)->result();
        $this->template->display('laporan/detail_krs',$data);
    }

    //public function printMahasiswa(){
        //ob_start();
        //$data['mahasiswa']=$this->model_laporan->semuaMahasiswa()->result();
        //$this->template->display('laporan/mahasiswa', $data);
        //$html = ob_get_contents();
        //ob_end_clean();

        //require_once('./assets/html2pdf/html2pdf.class.php');
        //$pdf = new HTML2PDF('P','A4','en');
        //$pdf->WriteHTML($html);
        //$pdf->Output('Mahasiswa.pdf', 'D');
    //}

}