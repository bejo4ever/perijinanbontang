<?php
class C_ijin_lokasi extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_ijin_lokasi');
	}
	
	function index(){
		$this->load->view('main/v_ijin_lokasi');
	}
	
	function switchAction(){
		$action = $this->input->post('action');
		switch($action){
			case 'GETLIST':
				$this->getList();
			break;
			case 'CREATE':
				$this->create();
			break;
			case 'UPDATE':
				$this->update();
			break;
			case 'DELETE':
				$this->delete();
			break;
			case 'SEARCH':
				$this->search();
			break;
			case 'PRINT':
				$this->printExcel();
			break;
			case 'EXCEL':
				$this->printExcel();
			break;
			default :
				echo '{ failure : true }';
			break;
		}
	}
	
	function getList(){
		$searchText = $this->input->post('query');
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$params = array(
			'searchText' => $searchText,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		$result = $this->m_ijin_lokasi->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_IJIN_LOKASI = htmlentities($this->input->post('ID_IJIN_LOKASI'),ENT_QUOTES);
		$ID_IJIN_LOKASI = is_numeric($ID_IJIN_LOKASI) ? $ID_IJIN_LOKASI : 0;
		$ID_IJIN_LOKASI_INTI = htmlentities($this->input->post('ID_IJIN_LOKASI_INTI'),ENT_QUOTES);
		$ID_IJIN_LOKASI_INTI = is_numeric($ID_IJIN_LOKASI_INTI) ? $ID_IJIN_LOKASI_INTI : 0;
		$NO_KTP = htmlentities($this->input->post('NO_KTP'),ENT_QUOTES);
		$NAMA_LENGKAP = htmlentities($this->input->post('NAMA_LENGKAP'),ENT_QUOTES);
		$TEMPAT_LAHIR = htmlentities($this->input->post('TEMPAT_LAHIR'),ENT_QUOTES);
		$TGL_LAHIR = htmlentities($this->input->post('TGL_LAHIR'),ENT_QUOTES);
		$PEKERJAAN = htmlentities($this->input->post('PEKERJAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_DESA = htmlentities($this->input->post('ID_DESA'),ENT_QUOTES);
		$ID_DESA = is_numeric($ID_DESA) ? $ID_DESA : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELEPON_PEMOHON = htmlentities($this->input->post('TELEPON_PEMOHON'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$in_lokasi_author = $this->m_ijin_lokasi->__checkSession();
		$in_lokasi_created_date = date('Y-m-d H:i:s');
		
		if($in_lokasi_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IJIN_LOKASI'=>$ID_IJIN_LOKASI,
				'ID_IJIN_LOKASI_INTI'=>$ID_IJIN_LOKASI_INTI,
				'NO_KTP'=>$NO_KTP,
				'NAMA_LENGKAP'=>$NAMA_LENGKAP,
				'TEMPAT_LAHIR'=>$TEMPAT_LAHIR,
				'TGL_LAHIR'=>$TGL_LAHIR,
				'PEKERJAAN'=>$PEKERJAAN,
				'ALAMAT'=>$ALAMAT,
				'ID_DESA'=>$ID_DESA,
				'ID_KECAMATAN'=>$ID_KECAMATAN,
				'ID_KOTA'=>$ID_KOTA,
				'TELEPON_PEMOHON'=>$TELEPON_PEMOHON,
				'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
				'TGL_AKHIR'=>$TGL_AKHIR,
				);
			$result = $this->m_ijin_lokasi->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_IJIN_LOKASI = htmlentities($this->input->post('ID_IJIN_LOKASI'),ENT_QUOTES);
		$ID_IJIN_LOKASI = is_numeric($ID_IJIN_LOKASI) ? $ID_IJIN_LOKASI : 0;
		$ID_IJIN_LOKASI_INTI = htmlentities($this->input->post('ID_IJIN_LOKASI_INTI'),ENT_QUOTES);
		$ID_IJIN_LOKASI_INTI = is_numeric($ID_IJIN_LOKASI_INTI) ? $ID_IJIN_LOKASI_INTI : 0;
		$NO_KTP = htmlentities($this->input->post('NO_KTP'),ENT_QUOTES);
		$NAMA_LENGKAP = htmlentities($this->input->post('NAMA_LENGKAP'),ENT_QUOTES);
		$TEMPAT_LAHIR = htmlentities($this->input->post('TEMPAT_LAHIR'),ENT_QUOTES);
		$TGL_LAHIR = htmlentities($this->input->post('TGL_LAHIR'),ENT_QUOTES);
		$PEKERJAAN = htmlentities($this->input->post('PEKERJAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_DESA = htmlentities($this->input->post('ID_DESA'),ENT_QUOTES);
		$ID_DESA = is_numeric($ID_DESA) ? $ID_DESA : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELEPON_PEMOHON = htmlentities($this->input->post('TELEPON_PEMOHON'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$in_lokasi_updated_by = $this->m_ijin_lokasi->__checkSession();
		$in_lokasi_updated_date = date('Y-m-d H:i:s');
		
		if($in_lokasi_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IJIN_LOKASI_INTI'=>$ID_IJIN_LOKASI_INTI,
				'NO_KTP'=>$NO_KTP,
				'NAMA_LENGKAP'=>$NAMA_LENGKAP,
				'TEMPAT_LAHIR'=>$TEMPAT_LAHIR,
				'TGL_LAHIR'=>$TGL_LAHIR,
				'PEKERJAAN'=>$PEKERJAAN,
				'ALAMAT'=>$ALAMAT,
				'ID_DESA'=>$ID_DESA,
				'ID_KECAMATAN'=>$ID_KECAMATAN,
				'ID_KOTA'=>$ID_KOTA,
				'TELEPON_PEMOHON'=>$TELEPON_PEMOHON,
				'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
				'TGL_AKHIR'=>$TGL_AKHIR,
				);
			$result = $this->m_ijin_lokasi->__update($data, $ID_IJIN_LOKASI, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_ijin_lokasi->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_IJIN_LOKASI_INTI = htmlentities($this->input->post('ID_IJIN_LOKASI_INTI'),ENT_QUOTES);
		$ID_IJIN_LOKASI_INTI = is_numeric($ID_IJIN_LOKASI_INTI) ? $ID_IJIN_LOKASI_INTI : 0;
		$NO_KTP = htmlentities($this->input->post('NO_KTP'),ENT_QUOTES);
		$NAMA_LENGKAP = htmlentities($this->input->post('NAMA_LENGKAP'),ENT_QUOTES);
		$TEMPAT_LAHIR = htmlentities($this->input->post('TEMPAT_LAHIR'),ENT_QUOTES);
		$TGL_LAHIR = htmlentities($this->input->post('TGL_LAHIR'),ENT_QUOTES);
		$PEKERJAAN = htmlentities($this->input->post('PEKERJAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_DESA = htmlentities($this->input->post('ID_DESA'),ENT_QUOTES);
		$ID_DESA = is_numeric($ID_DESA) ? $ID_DESA : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELEPON_PEMOHON = htmlentities($this->input->post('TELEPON_PEMOHON'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$params = array(
			'ID_IJIN_LOKASI_INTI'=>$ID_IJIN_LOKASI_INTI,
			'NO_KTP'=>$NO_KTP,
			'NAMA_LENGKAP'=>$NAMA_LENGKAP,
			'TEMPAT_LAHIR'=>$TEMPAT_LAHIR,
			'TGL_LAHIR'=>$TGL_LAHIR,
			'PEKERJAAN'=>$PEKERJAAN,
			'ALAMAT'=>$ALAMAT,
			'ID_DESA'=>$ID_DESA,
			'ID_KECAMATAN'=>$ID_KECAMATAN,
			'ID_KOTA'=>$ID_KOTA,
			'TELEPON_PEMOHON'=>$TELEPON_PEMOHON,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'TGL_AKHIR'=>$TGL_AKHIR,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_ijin_lokasi->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_IJIN_LOKASI_INTI = htmlentities($this->input->post('ID_IJIN_LOKASI_INTI'),ENT_QUOTES);
		$ID_IJIN_LOKASI_INTI = is_numeric($ID_IJIN_LOKASI_INTI) ? $ID_IJIN_LOKASI_INTI : 0;
		$NO_KTP = htmlentities($this->input->post('NO_KTP'),ENT_QUOTES);
		$NAMA_LENGKAP = htmlentities($this->input->post('NAMA_LENGKAP'),ENT_QUOTES);
		$TEMPAT_LAHIR = htmlentities($this->input->post('TEMPAT_LAHIR'),ENT_QUOTES);
		$TGL_LAHIR = htmlentities($this->input->post('TGL_LAHIR'),ENT_QUOTES);
		$PEKERJAAN = htmlentities($this->input->post('PEKERJAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_DESA = htmlentities($this->input->post('ID_DESA'),ENT_QUOTES);
		$ID_DESA = is_numeric($ID_DESA) ? $ID_DESA : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELEPON_PEMOHON = htmlentities($this->input->post('TELEPON_PEMOHON'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'ID_IJIN_LOKASI_INTI'=>$ID_IJIN_LOKASI_INTI,
			'NO_KTP'=>$NO_KTP,
			'NAMA_LENGKAP'=>$NAMA_LENGKAP,
			'TEMPAT_LAHIR'=>$TEMPAT_LAHIR,
			'TGL_LAHIR'=>$TGL_LAHIR,
			'PEKERJAAN'=>$PEKERJAAN,
			'ALAMAT'=>$ALAMAT,
			'ID_DESA'=>$ID_DESA,
			'ID_KECAMATAN'=>$ID_KECAMATAN,
			'ID_KOTA'=>$ID_KOTA,
			'TELEPON_PEMOHON'=>$TELEPON_PEMOHON,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'TGL_AKHIR'=>$TGL_AKHIR,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_ijin_lokasi->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_ijin_lokasi.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/ijin_lokasi_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/ijin_lokasi_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}