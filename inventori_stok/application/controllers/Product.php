<?php 
 
class Product extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_product');
		$this->load->helper('url');
		$this->load->library('form_validation');

	}
 
	public function index(){
		$data['product'] = $this->m_product->tampil_data();
		$this->load->view('v_tampilproduct',$data);
	}

	function tampil_product(){
		$data['product'] = $this->m_product->tampil_data();
		$this->load->view('v_tampilproduct',$data);
	}
 
	function tambah(){
		$this->load->model('m_cetak');
		// $data['bulan']=$this->m_user->result();
		// $data['tahun']=$this->m_user->result();
		//$this->load->view('v_inputktp');
		$data['groups'] = $this->m_cetak->getAllBulan();
        $data['groups1'] = $this->m_cetak->getAllTahun();
        $this->load->view('v_inputcetak',$data);
	}

	function tampil_per_bulan()
	{
	
		$bulan = $this->input->post('bulan');
		$data['cetak'] = $this->m_cetak->tampil_data_perbulan($bulan);
		$this->load->view('v_tampilcetak',$data);
	}

	function admin(){
		$this->load->model('m_cetak');
		$data['cetak'] = $this->m_cetak->tampil_admin();
		$this->load->view('v_admintampilcetak', $data);

	}

	function tampil_admin_perbulan()
	{
	
		$bulan = $this->input->post('bulan');
		$data['cetak'] = $this->m_cetak->tampil_data_perbulan($bulan);
		$this->load->view('v_admintampilcetak',$data);
	}

	function tambah_cetak(){

		// $this->form_validation->set_rules('id', 'id', 'trim|required');
		// $this->form_validation->set_rules('nama_user', 'nama_user', 'trim|required');
		// $this->form_validation->set_rules('id_bulan', 'id_bulan', 'trim|required');
		// $this->form_validation->set_rules('id_tahun', 'id_tahun', 'trim|required');
		// $this->form_validation->set_rules('id_prodi', 'id_prodi', 'trim|required');
		// $this->form_validation->set_rules('terpakai', 'terpakai', 'trim|required');

		$id_cetak = $this->input->post('id_cetak');
		$id_bulan = $this->input->post('id_bulan');
		$id_tahun = $this->input->post('id_tahun');
 		$jml_cetak = $this->input->post('jml_cetak');

		$data = array(
			'id_cetak' => $id_cetak,
			'id_bulan' => $id_bulan,
			'id_tahun' => $id_tahun,
			'jml_cetak' => $jml_cetak
			);
		$this->m_cetak->input_data($data,'cetak');
		redirect('cetak');

	}
 
	function edit($id_cetak){
		$where = array('id_cetak' => $id_cetak);
		$data['cetak'] = $this->m_cetak->edit_data($where,'cetak')->result();
		$data['groups'] = $this->m_cetak->getAllBulan();
        $data['groups1'] = $this->m_cetak->getAllTahun();
		$this->load->view('v_editcetak',$data);
	}

	function update(){
	$id_cetak = $this->input->post('id_cetak');
	$id_bulan = $this->input->post('id_bulan');
	$id_tahun = $this->input->post('id_tahun');
	$jml_cetak = $this->input->post('jml_cetak');

	$data = array(
		'id_cetak' => $id_cetak,
		'id_bulan' => $id_bulan,
		'id_tahun' => $id_tahun,
		'jml_cetak' => $jml_cetak
		);
 
		$where = array(
			'id_cetak' => $id_cetak
		);
 
		$this->m_cetak->update_data($where,$data,'cetak');
		redirect('cetak');
	}

	function hapus($id_cetak){
		$where = array('id_cetak' => $id_cetak);
		$this->m_cetak->hapus_data($where,'cetak');
		redirect('cetak');
	}


 
}