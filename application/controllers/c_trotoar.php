<?php
class C_trotoar extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_trotoar');
	}
	
	function index(){
		$this->load->view('main/v_trotoar');
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
		$result = $this->m_trotoar->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_TROTOAR = htmlentities($this->input->post('ID_TROTOAR'),ENT_QUOTES);
		$ID_TROTOAR = is_numeric($ID_TROTOAR) ? $ID_TROTOAR : 0;
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$PERUNTUKAN = htmlentities($this->input->post('PERUNTUKAN'),ENT_QUOTES);
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_BERLAKU = htmlentities($this->input->post('TGL_BERLAKU'),ENT_QUOTES);
		$TGL_BERAKHIR = htmlentities($this->input->post('TGL_BERAKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$otoar_author = $this->m_trotoar->__checkSession();
		$otoar_created_date = date('Y-m-d H:i:s');
		
		if($otoar_author == ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_TROTOAR'=>$ID_TROTOAR,
				'ID_PEMOHON'=>$ID_PEMOHON,
				'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
				'NO_SK'=>$NO_SK,
				'NO_SK_LAMA'=>$NO_SK_LAMA,
				'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
				'ALAMAT'=>$ALAMAT,
				'PERUNTUKAN'=>$PERUNTUKAN,
				'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
				'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
				'TGL_BERLAKU'=>$TGL_BERLAKU,
				'TGL_BERAKHIR'=>$TGL_BERAKHIR,
				'STATUS'=>$STATUS,
				'STATUS_SURVEY'=>$STATUS_SURVEY,
				);
			$result = $this->m_trotoar->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_TROTOAR = htmlentities($this->input->post('ID_TROTOAR'),ENT_QUOTES);
		$ID_TROTOAR = is_numeric($ID_TROTOAR) ? $ID_TROTOAR : 0;
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$PERUNTUKAN = htmlentities($this->input->post('PERUNTUKAN'),ENT_QUOTES);
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_BERLAKU = htmlentities($this->input->post('TGL_BERLAKU'),ENT_QUOTES);
		$TGL_BERAKHIR = htmlentities($this->input->post('TGL_BERAKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$otoar_updated_by = $this->m_trotoar->__checkSession();
		$otoar_updated_date = date('Y-m-d H:i:s');
		
		if($otoar_updated_by == ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_PEMOHON'=>$ID_PEMOHON,
				'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
				'NO_SK'=>$NO_SK,
				'NO_SK_LAMA'=>$NO_SK_LAMA,
				'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
				'ALAMAT'=>$ALAMAT,
				'PERUNTUKAN'=>$PERUNTUKAN,
				'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
				'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
				'TGL_BERLAKU'=>$TGL_BERLAKU,
				'TGL_BERAKHIR'=>$TGL_BERAKHIR,
				'STATUS'=>$STATUS,
				'STATUS_SURVEY'=>$STATUS_SURVEY,
				);
			$result = $this->m_trotoar->__update($data, $ID_TROTOAR, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_trotoar->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$PERUNTUKAN = htmlentities($this->input->post('PERUNTUKAN'),ENT_QUOTES);
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_BERLAKU = htmlentities($this->input->post('TGL_BERLAKU'),ENT_QUOTES);
		$TGL_BERAKHIR = htmlentities($this->input->post('TGL_BERAKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$params = array(
			'ID_PEMOHON'=>$ID_PEMOHON,
			'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
			'NO_SK'=>$NO_SK,
			'NO_SK_LAMA'=>$NO_SK_LAMA,
			'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
			'ALAMAT'=>$ALAMAT,
			'PERUNTUKAN'=>$PERUNTUKAN,
			'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'TGL_BERLAKU'=>$TGL_BERLAKU,
			'TGL_BERAKHIR'=>$TGL_BERAKHIR,
			'STATUS'=>$STATUS,
			'STATUS_SURVEY'=>$STATUS_SURVEY,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_trotoar->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$PERUNTUKAN = htmlentities($this->input->post('PERUNTUKAN'),ENT_QUOTES);
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_BERLAKU = htmlentities($this->input->post('TGL_BERLAKU'),ENT_QUOTES);
		$TGL_BERAKHIR = htmlentities($this->input->post('TGL_BERAKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$params = array(
			'searchText' => $searchText,
			'ID_PEMOHON'=>$ID_PEMOHON,
			'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
			'NO_SK'=>$NO_SK,
			'NO_SK_LAMA'=>$NO_SK_LAMA,
			'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
			'ALAMAT'=>$ALAMAT,
			'PERUNTUKAN'=>$PERUNTUKAN,
			'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'TGL_BERLAKU'=>$TGL_BERLAKU,
			'TGL_BERAKHIR'=>$TGL_BERAKHIR,
			'STATUS'=>$STATUS,
			'STATUS_SURVEY'=>$STATUS_SURVEY,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_trotoar->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_trotoar.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/trotoar_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/trotoar_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}