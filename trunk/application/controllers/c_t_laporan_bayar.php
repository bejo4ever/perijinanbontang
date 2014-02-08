<?php
class C_t_laporan_bayar extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_laporan_bayar');
	}
	
	function index(){
		$this->load->view('home.php');
		$this->load->view('main/v_t_laporan_bayar');
	}
	
	function switchAction(){
		$action = $this->input->post('action');
		switch($action){
			case 'cetaklaporan_bayar':
				$this->cetaklaporan_bayar();
			break;
			default :
				echo '{ failure : true }';
			break;
		}
	}
	
	function cetaklaporan_bayar(){
		$laporan_bayar_ijin = $this->input->post('laporan_bayar_ijin');
		$laporan_bayar_ijin_nama = $this->input->post('laporan_bayar_ijin_nama');
		$laporan_bayar_bulan = $this->input->post('laporan_bayar_bulan');
		$laporan_bayar_tahun = $this->input->post('laporan_bayar_tahun');
		$laporan_bayar_tanggalAwal = $this->input->post('laporan_bayar_tanggalAwal');
		$laporan_bayar_tanggalAkhir = $this->input->post('laporan_bayar_tanggalAkhir');
		$laporan_bayar_opsi = $this->input->post('laporan_bayar_opsi');
		$outputType = $this->input->post('outputType');
		
		$params = array(
			"laporan_bayar_ijin"=>$laporan_bayar_ijin,
			"laporan_bayar_ijin_nama"=>$laporan_bayar_ijin_nama,
			"laporan_bayar_bulan"=>$laporan_bayar_bulan,
			"laporan_bayar_tahun"=>$laporan_bayar_tahun,
			"laporan_bayar_tanggalAwal"=>$laporan_bayar_tanggalAwal,
			"laporan_bayar_tanggalAkhir"=>$laporan_bayar_tanggalAkhir,
			"laporan_bayar_opsi"=>$laporan_bayar_opsi,
			"return_type"=>'array',
		);
		
		$printrecord = $this->m_t_laporan_bayar->getrecords($params);
		$view_name = "p_laporan_bayar.php";
		$file_name = ($outputType == 'PRINT') ? "laporan_bayar.html" : 'laporan_bayar.xls';
		
		$file_name = str_replace(' ','',$laporan_bayar_ijin_nama).'_'.$file_name;
		$data['params'] = $params;
		$data['printrecord'] = $printrecord[1];
		$print_view=$this->load->view('template/'.$view_name, $data, TRUE);
		$print_file=fopen('print/'.$file_name,'w+');
		fwrite($print_file, $print_view);
		echo $file_name;
	}
	
}