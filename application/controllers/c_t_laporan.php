<?php
class C_t_laporan extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_laporan');
	}
	
	function index(){
		$this->load->view('home.php');
		$this->load->view('main/v_t_laporan');
	}
	
	function switchAction(){
		$action = $this->input->post('action');
		switch($action){
			case 'cetaklaporan':
				$this->cetaklaporan();
			break;
			default :
				echo '{ failure : true }';
			break;
		}
	}
	
	function cetakLaporan(){
		$laporan_ijin = $this->input->post('laporan_ijin');
		$laporan_ijin_nama = $this->input->post('laporan_ijin_nama');
		$laporan_jenis = $this->input->post('laporan_jenis');
		$laporan_bulan = $this->input->post('laporan_bulan');
		$laporan_tahun = $this->input->post('laporan_tahun');
		$laporan_tanggalAwal = $this->input->post('laporan_tanggalAwal');
		$laporan_tanggalAkhir = $this->input->post('laporan_tanggalAkhir');
		$laporan_opsi = $this->input->post('laporan_opsi');
		$outputType = $this->input->post('outputType');
		
		$params = array(
			"laporan_ijin"=>$laporan_ijin,
			"laporan_ijin_nama"=>$laporan_ijin_nama,
			"laporan_jenis"=>$laporan_jenis,
			"laporan_bulan"=>$laporan_bulan,
			"laporan_tahun"=>$laporan_tahun,
			"laporan_tanggalAwal"=>$laporan_tanggalAwal,
			"laporan_tanggalAkhir"=>$laporan_tanggalAkhir,
			"laporan_opsi"=>$laporan_opsi,
			"return_type"=>'array',
		);
		
		if($laporan_jenis == 1){
			$printrecord = $this->m_t_laporan->getrecords($params);
			$view_name = "p_laporan_permohonan.php";
			$file_name = ($outputType == 'PRINT') ? "laporan_permohonan.html" : 'laporan_permohonan.xls';
		}else if($laporan_jenis == 2){
			$printrecord = $this->m_t_laporan->getrecords($params);
			$view_name = "p_laporan_rekap.php";
			$file_name = ($outputType == 'PRINT') ? "laporan_rekap.html" : 'laporan_rekap.xls';
		}else{
			$printrecord = $this->m_t_laporan->getrecords($params);
			$view_name = "p_laporan_sk.php";
			$file_name = ($outputType == 'PRINT') ? "laporan_sk.html" : 'laporan_sk.xls';
		}
		
		$data['params'] = $params;
		$data['printrecord'] = $printrecord[1];
		$this->firephp->log($printrecord);
		$this->firephp->log($printrecord[1]);
		$print_view=$this->load->view('template/'.$view_name, $data, TRUE);
		$print_file=fopen('print/'.$file_name,'w+');
		fwrite($print_file, $print_view);
		echo $file_name;
	}
	
}