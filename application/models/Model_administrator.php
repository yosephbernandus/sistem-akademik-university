<?php
class Model_administrator extends CI_Model{
    private $table="administrator";
    
    function cek($username,$password){
        $this->db->where("user",$username);
        $this->db->where("password",$password);
        return $this->db->get("administrator");
    }
    
    function semua(){
        return $this->db->get("administrator");
    }
    
    function cekKode($kode){
        $this->db->where("user",$kode);
        return $this->db->get("administrator");
    }
    
    function cekId($kode){
        $this->db->where("id_admin",$kode);
        return $this->db->get("administrator");
    }
    
    function update($id,$info){
        $this->db->where("id_admin",$id);
        $this->db->update("administrator",$info);
    }
    
    function simpan($info){
        $this->db->insert("administrator",$info);
    }
    
    function hapus($kode){
        $this->db->where("id_admin",$kode);
        $this->db->delete("administrator");
    }
}