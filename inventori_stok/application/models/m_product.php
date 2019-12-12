<?php 
 
class M_product extends CI_Model{
	function tampil_data(){
		$query = $this->db->query("SELECT * FROM product");
		return $query->result();
	}

	function tampil_data_perbulan($bulan){
		$query = $this->db->query("SELECT cetak.id_cetak, bulan.nama_bulan as nama_bulan, tahun.nama_tahun, cetak.jml_cetak FROM cetak JOIN bulan on bulan.id_bulan=cetak.id_bulan join tahun on tahun.id_tahun=cetak.id_tahun where cetak.id_bulan = $bulan");
		return $query->result();
	}
 
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function get_bulan(){
		return $this->db->get('bulan');
	}

	function get_tahun(){
		return $this->db->get('tahun');
	}

	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}
 
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function tampil_admin(){
		$query = $this->db->query("SELECT cetak.id_cetak, bulan.nama_bulan as nama_bulan, tahun.nama_tahun, cetak.jml_cetak FROM cetak JOIN bulan on bulan.id_bulan=cetak.id_bulan join tahun on tahun.id_tahun=cetak.id_tahun");
		return $query->result();
	}

	function getAllBulan()
        {

            $query = $this->db->query('SELECT * FROM bulan');
            return $query->result();

        }
    function getAllTahun()
        {

            $query = $this->db->query('SELECT * FROM tahun');
            return $query->result();

        }
 
}