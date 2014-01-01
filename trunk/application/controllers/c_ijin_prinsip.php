<?php
class C_ijin_prinsip extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_ijin_prinsip');
	}
	
	function index(){
		$this->load->view('main/v_ijin_prinsip');
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
		$result = $this->m_ijin_prinsip->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_IJIN_PRINSIP = htmlentities($this->input->post('ID_IJIN_PRINSIP'),ENT_QUOTES);
		$ID_IJIN_PRINSIP = is_numeric($ID_IJIN_PRINSIP) ? $ID_IJIN_PRINSIP : 0;
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$NAMA_LOKASI = htmlentities($this->input->post('NAMA_LOKASI'),ENT_QUOTES);
		$LONGITUDE = htmlentities($this->input->post('LONGITUDE'),ENT_QUOTES);
		$LATITUDE = htmlentities($this->input->post('LATITUDE'),ENT_QUOTES);
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$JENIS_TOWER = htmlentities($this->input->post('JENIS_TOWER'),ENT_QUOTES);
		$FUNGSI_BANGUNAN = htmlentities($this->input->post('FUNGSI_BANGUNAN'),ENT_QUOTES);
		$JENIS_BANGUNAN = htmlentities($this->input->post('JENIS_BANGUNAN'),ENT_QUOTES);
		$UKURAN_BANGUNAN = htmlentities($this->input->post('UKURAN_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = is_numeric($TINGGI_BANGUNAN) ? $TINGGI_BANGUNAN : 0;
		$TIANG_BANGUNAN = htmlentities($this->input->post('TIANG_BANGUNAN'),ENT_QUOTES);
		$PONDASI_BANGUNAN = htmlentities($this->input->post('PONDASI_BANGUNAN'),ENT_QUOTES);
				
		$in_prinsip_author = $this->m_ijin_prinsip->__checkSession();
		$in_prinsip_created_date = date('Y-m-d H:i:s');
		
		if($in_prinsip_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IJIN_PRINSIP'=>$ID_IJIN_PRINSIP,
				'ID_PEMOHON'=>$ID_PEMOHON,
				'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
				'NO_SK'=>$NO_SK,
				'NO_SK_LAMA'=>$NO_SK_LAMA,
				'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
				'NAMA_LOKASI'=>$NAMA_LOKASI,
				'LONGITUDE'=>$LONGITUDE,
				'LATITUDE'=>$LATITUDE,
				'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
				'JENIS_TOWER'=>$JENIS_TOWER,
				'FUNGSI_BANGUNAN'=>$FUNGSI_BANGUNAN,
				'JENIS_BANGUNAN'=>$JENIS_BANGUNAN,
				'UKURAN_BANGUNAN'=>$UKURAN_BANGUNAN,
				'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
				'TIANG_BANGUNAN'=>$TIANG_BANGUNAN,
				'PONDASI_BANGUNAN'=>$PONDASI_BANGUNAN,
				);
			$result = $this->m_ijin_prinsip->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_IJIN_PRINSIP = htmlentities($this->input->post('ID_IJIN_PRINSIP'),ENT_QUOTES);
		$ID_IJIN_PRINSIP = is_numeric($ID_IJIN_PRINSIP) ? $ID_IJIN_PRINSIP : 0;
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$NAMA_LOKASI = htmlentities($this->input->post('NAMA_LOKASI'),ENT_QUOTES);
		$LONGITUDE = htmlentities($this->input->post('LONGITUDE'),ENT_QUOTES);
		$LATITUDE = htmlentities($this->input->post('LATITUDE'),ENT_QUOTES);
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$JENIS_TOWER = htmlentities($this->input->post('JENIS_TOWER'),ENT_QUOTES);
		$FUNGSI_BANGUNAN = htmlentities($this->input->post('FUNGSI_BANGUNAN'),ENT_QUOTES);
		$JENIS_BANGUNAN = htmlentities($this->input->post('JENIS_BANGUNAN'),ENT_QUOTES);
		$UKURAN_BANGUNAN = htmlentities($this->input->post('UKURAN_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = is_numeric($TINGGI_BANGUNAN) ? $TINGGI_BANGUNAN : 0;
		$TIANG_BANGUNAN = htmlentities($this->input->post('TIANG_BANGUNAN'),ENT_QUOTES);
		$PONDASI_BANGUNAN = htmlentities($this->input->post('PONDASI_BANGUNAN'),ENT_QUOTES);
				
		$in_prinsip_updated_by = $this->m_ijin_prinsip->__checkSession();
		$in_prinsip_updated_date = date('Y-m-d H:i:s');
		
		if($in_prinsip_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_PEMOHON'=>$ID_PEMOHON,
				'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
				'NO_SK'=>$NO_SK,
				'NO_SK_LAMA'=>$NO_SK_LAMA,
				'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
				'NAMA_LOKASI'=>$NAMA_LOKASI,
				'LONGITUDE'=>$LONGITUDE,
				'LATITUDE'=>$LATITUDE,
				'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
				'JENIS_TOWER'=>$JENIS_TOWER,
				'FUNGSI_BANGUNAN'=>$FUNGSI_BANGUNAN,
				'JENIS_BANGUNAN'=>$JENIS_BANGUNAN,
				'UKURAN_BANGUNAN'=>$UKURAN_BANGUNAN,
				'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
				'TIANG_BANGUNAN'=>$TIANG_BANGUNAN,
				'PONDASI_BANGUNAN'=>$PONDASI_BANGUNAN,
				);
			$result = $this->m_ijin_prinsip->__update($data, $ID_IJIN_PRINSIP, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_ijin_prinsip->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$NAMA_LOKASI = htmlentities($this->input->post('NAMA_LOKASI'),ENT_QUOTES);
		$LONGITUDE = htmlentities($this->input->post('LONGITUDE'),ENT_QUOTES);
		$LATITUDE = htmlentities($this->input->post('LATITUDE'),ENT_QUOTES);
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$JENIS_TOWER = htmlentities($this->input->post('JENIS_TOWER'),ENT_QUOTES);
		$FUNGSI_BANGUNAN = htmlentities($this->input->post('FUNGSI_BANGUNAN'),ENT_QUOTES);
		$JENIS_BANGUNAN = htmlentities($this->input->post('JENIS_BANGUNAN'),ENT_QUOTES);
		$UKURAN_BANGUNAN = htmlentities($this->input->post('UKURAN_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = is_numeric($TINGGI_BANGUNAN) ? $TINGGI_BANGUNAN : 0;
		$TIANG_BANGUNAN = htmlentities($this->input->post('TIANG_BANGUNAN'),ENT_QUOTES);
		$PONDASI_BANGUNAN = htmlentities($this->input->post('PONDASI_BANGUNAN'),ENT_QUOTES);
				
		$params = array(
			'ID_PEMOHON'=>$ID_PEMOHON,
			'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
			'NO_SK'=>$NO_SK,
			'NO_SK_LAMA'=>$NO_SK_LAMA,
			'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
			'NAMA_LOKASI'=>$NAMA_LOKASI,
			'LONGITUDE'=>$LONGITUDE,
			'LATITUDE'=>$LATITUDE,
			'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
			'JENIS_TOWER'=>$JENIS_TOWER,
			'FUNGSI_BANGUNAN'=>$FUNGSI_BANGUNAN,
			'JENIS_BANGUNAN'=>$JENIS_BANGUNAN,
			'UKURAN_BANGUNAN'=>$UKURAN_BANGUNAN,
			'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
			'TIANG_BANGUNAN'=>$TIANG_BANGUNAN,
			'PONDASI_BANGUNAN'=>$PONDASI_BANGUNAN,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_ijin_prinsip->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$NAMA_LOKASI = htmlentities($this->input->post('NAMA_LOKASI'),ENT_QUOTES);
		$LONGITUDE = htmlentities($this->input->post('LONGITUDE'),ENT_QUOTES);
		$LATITUDE = htmlentities($this->input->post('LATITUDE'),ENT_QUOTES);
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$JENIS_TOWER = htmlentities($this->input->post('JENIS_TOWER'),ENT_QUOTES);
		$FUNGSI_BANGUNAN = htmlentities($this->input->post('FUNGSI_BANGUNAN'),ENT_QUOTES);
		$JENIS_BANGUNAN = htmlentities($this->input->post('JENIS_BANGUNAN'),ENT_QUOTES);
		$UKURAN_BANGUNAN = htmlentities($this->input->post('UKURAN_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = is_numeric($TINGGI_BANGUNAN) ? $TINGGI_BANGUNAN : 0;
		$TIANG_BANGUNAN = htmlentities($this->input->post('TIANG_BANGUNAN'),ENT_QUOTES);
		$PONDASI_BANGUNAN = htmlentities($this->input->post('PONDASI_BANGUNAN'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'ID_PEMOHON'=>$ID_PEMOHON,
			'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
			'NO_SK'=>$NO_SK,
			'NO_SK_LAMA'=>$NO_SK_LAMA,
			'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
			'NAMA_LOKASI'=>$NAMA_LOKASI,
			'LONGITUDE'=>$LONGITUDE,
			'LATITUDE'=>$LATITUDE,
			'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
			'JENIS_TOWER'=>$JENIS_TOWER,
			'FUNGSI_BANGUNAN'=>$FUNGSI_BANGUNAN,
			'JENIS_BANGUNAN'=>$JENIS_BANGUNAN,
			'UKURAN_BANGUNAN'=>$UKURAN_BANGUNAN,
			'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
			'TIANG_BANGUNAN'=>$TIANG_BANGUNAN,
			'PONDASI_BANGUNAN'=>$PONDASI_BANGUNAN,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_ijin_prinsip->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_ijin_prinsip.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/ijin_prinsip_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/ijin_prinsip_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}