<?php
class Model_gedung extends CI_Model{
    private $table="chat";
    private $primary="id_chat";


    public function simpan($jenis){
    	$this->db->insert($this->table,$jenis);
    	return $this->db->insert_id();
    }

    

    // mysql_query("insert into chat (user,pesan) VALUES ('$user','$pesan')");
      // redirect ("C_chat/ambil_pesan");   
}