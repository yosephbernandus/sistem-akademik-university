
<?php
class Model_laporan extends CI_Model{

    
    public function semuaMahasiswa(){
        return $this->db->get("mahasiswa");
    }

    public function semuaDosen(){
        return $this->db->get("dosen");
    }

    public function detailkrs($tanggal1){
        return $this->db->query("select * from krs where tanggal_input='$tanggal1' group by id_krs");
    }

    public function detail_krs($id){
        $this->db->select("*");
        $this->db->from("krs");
        $this->db->where("id_krs",$id);
        $this->db->join("matakuliah","matakuliah.kode_mat=krs.kode_mat");
        $this->db->join("mahasiswa","mahasiswa.nis=krs.nis");
        return $this->db->get();
    }
}
