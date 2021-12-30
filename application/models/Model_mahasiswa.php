<?php
class Model_mahasiswa extends CI_Model{
    private $table="mahasiswa";
    private $primary="nis";
    
    public function semua($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if(empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->get($this->table,$limit,$offset);
    }

    public function view(){
        return $this->db->get($this->table)->result();
    }
    
    public function jumlah(){
        return $this->db->count_all($this->table);
    }

    public function getProdi(){
        return $this->db->get("prodi");
    }
    
    public function cek($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->table);
        
        return $query;
    }
    
    public function simpan($jenis){
        $this->db->insert($this->table,$jenis);
        return $this->db->insert_id();
    }

    public function update($kode,$jenis){
        $this->db->where($this->primary,$kode);
        $this->db->update($this->table,$jenis);
    }
    
    public function hapus($kode){
        $this->db->where($this->primary,$kode);
        $this->db->delete($this->table);
    }
    
    public function cari($cari){
        $this->db->like($this->primary,$cari);
        $this->db->or_like("nis",$cari);
        $this->db->or_like("nama_mhs",$cari);
        return $this->db->get($this->table);
    }
}