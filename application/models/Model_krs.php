<?php
class Model_krs extends CI_Model{
	private $table="krs";

	public function nootomatis(){
		$today=date('Ymd');
		$mysqli = mysqli_connect("localhost","root","","sistem_akademik");
		$query=mysqli_query($mysqli,"select max(id_krs) as last from krs where id_krs like '$today%'");
		$data=mysqli_fetch_array($query);
		$lastNoStacc=$data['last'];

		$lastNoUrut=substr($lastNoStacc,8,3);

		$nextNoUrut=$lastNoUrut+1;

		$nextNoKrs=$today.sprintf('%03s',$nextNoUrut);

		return $nextNoKrs;
	}

	public function getMahasiswa(){
		return $this->db->get("mahasiswa");
	}

	public function cariMahasiswa($nis){
		$this->db->where("nis",$nis);
		return $this->db->get("mahasiswa");
	}

	public function cariMatakuliah($kode_mat){
		$this->db->where("kode_mat",$kode_mat);
	}

	public function simpanTmp($info){
		$this->db->insert("tmp",$info);
	}

	public function tampilTmp(){
		return $this->db->get("tmp");
	}

	public function cekTmp($kode_mat){
		$this->db->where("kode_mat",$kode_mat);
		return $this->db->get("tmp");
	}

	public function jumlahTmp(){
		return $this->db->count_all("tmp");
	}

	public function hapusTmp($kode_mat){
		$this->db->where("kode_mat",$kode_mat);
		$this->db->delete("tmp");
	}

	public function simpan($info){
		$this->db->insert("krs",$info);
	}

	public function pencarianmatakuliah($cari){
        $this->db->like("nama_mat",$cari);
        return $this->db->get("matakuliah");
    }
}