<?php
class Chat extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library(array('template','form_validation'));

		if (!$this->session->userdata('username')) {
			redirect('home');
		}
	}
	public function index()
    {
        $this->template->display('chat/index.php');
    }
     
    public function kirim_chat()
    {
        $user=$this->input->post("user");
        $pesan=$this->input->post("pesan");
         
        mysql_query("insert into chat (user,pesan) VALUES ('$user','$pesan')");
        redirect ("C_chat/ambil_pesan");
    }
     
    public function ambil_pesan()
    {
        $tampil=mysql_query("select * from chat order by waktu desc");
        while($r=mysql_fetch_array($tampil)){
        echo "<li><b>$r[user]</b> : $r[pesan] (<i>$r[waktu]</i>)</li>";
        }
    }
}