<?php
class C_t_laporan_expired extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_laporan_expired');
	}
	
	function index(){
		$this->load->view('home.php');
		$this->load->view('main/v_t_laporan_expired');
	}
	
	function switchAction(){
		$action = $this->input->post('action');
		switch($action){
			case 'cetaklaporan_expired':
				$this->cetaklaporan_expired();
			break;
			default :
				echo '{ failure : true }';
			break;
		}
	}
	
	function cetaklaporan_expired(){
		$laporan_expired_ijin = $this->input->post('laporan_expired_ijin');
		$laporan_expired_ijin_nama = $this->input->post('laporan_expired_ijin_nama');
		$laporan_expired_bulan = $this->input->post('laporan_expired_bulan');
		$laporan_expired_tahun = $this->input->post('laporan_expired_tahun');
		$laporan_expired_tanggalAwal = $this->input->post('laporan_expired_tanggalAwal');
		$laporan_expired_tanggalAkhir = $this->input->post('laporan_expired_tanggalAkhir');
		$laporan_expired_opsi = $this->input->post('laporan_expired_opsi');
		$outputType = $this->input->post('outputType');
		
		$params = array(
			"laporan_expired_ijin"=>$laporan_expired_ijin,
			"laporan_expired_ijin_nama"=>$laporan_expired_ijin_nama,
			"laporan_expired_bulan"=>$laporan_expired_bulan,
			"laporan_expired_tahun"=>$laporan_expired_tahun,
			"laporan_expired_tanggalAwal"=>$laporan_expired_tanggalAwal,
			"laporan_expired_tanggalAkhir"=>$laporan_expired_tanggalAkhir,
			"laporan_expired_opsi"=>$laporan_expired_opsi,
			"return_type"=>'array',
		);
		
		$printrecord = $this->m_t_laporan_expired->getrecords($params);
		$view_name = "p_laporan_expired.php";
		$file_name = ($outputType == 'PRINT') ? "laporan_expired.html" : 'laporan_expired.xls';
		
		$file_name = str_replace(' ','',$laporan_expired_ijin_nama).'_'.$file_name;
		$data['params'] = $params;
		$data['printrecord'] = $printrecord[1];
		$print_view=$this->load->view('template/'.$view_name, $data, TRUE);
		$print_file=fopen('print/'.$file_name,'w+');
		fwrite($print_file, $print_view);
		echo $file_name;
	}
	
}