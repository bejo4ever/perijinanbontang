<?php
class C_trayek_inti extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_trayek_inti');
	}
	
	function index(){
		$this->load->view('main/v_trayek_inti');
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
		$result = $this->m_trayek_inti->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_TRAYEK_INTI = htmlentities($this->input->post('ID_TRAYEK_INTI'),ENT_QUOTES);
		$ID_TRAYEK_INTI = is_numeric($ID_TRAYEK_INTI) ? $ID_TRAYEK_INTI : 0;
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NOMOR_KENDARAAN = htmlentities($this->input->post('NOMOR_KENDARAAN'),ENT_QUOTES);
		$NAMA_PEMILIK = htmlentities($this->input->post('NAMA_PEMILIK'),ENT_QUOTES);
		$ALAMAT_PEMILIK = htmlentities($this->input->post('ALAMAT_PEMILIK'),ENT_QUOTES);
		$NO_HP = htmlentities($this->input->post('NO_HP'),ENT_QUOTES);
		$NOMOR_RANGKA = htmlentities($this->input->post('NOMOR_RANGKA'),ENT_QUOTES);
		$NOMOR_MESIN = htmlentities($this->input->post('NOMOR_MESIN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
				
		$ayek_inti_author = $this->m_trayek_inti->__checkSession();
		$ayek_inti_created_date = date('Y-m-d H:i:s');
		
		if($ayek_inti_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_TRAYEK_INTI'=>$ID_TRAYEK_INTI,
				'ID_USER'=>$ID_USER,
				'NOMOR_KENDARAAN'=>$NOMOR_KENDARAAN,
				'NAMA_PEMILIK'=>$NAMA_PEMILIK,
				'ALAMAT_PEMILIK'=>$ALAMAT_PEMILIK,
				'NO_HP'=>$NO_HP,
				'NOMOR_RANGKA'=>$NOMOR_RANGKA,
				'NOMOR_MESIN'=>$NOMOR_MESIN,
				'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
				);
			$result = $this->m_trayek_inti->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_TRAYEK_INTI = htmlentities($this->input->post('ID_TRAYEK_INTI'),ENT_QUOTES);
		$ID_TRAYEK_INTI = is_numeric($ID_TRAYEK_INTI) ? $ID_TRAYEK_INTI : 0;
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NOMOR_KENDARAAN = htmlentities($this->input->post('NOMOR_KENDARAAN'),ENT_QUOTES);
		$NAMA_PEMILIK = htmlentities($this->input->post('NAMA_PEMILIK'),ENT_QUOTES);
		$ALAMAT_PEMILIK = htmlentities($this->input->post('ALAMAT_PEMILIK'),ENT_QUOTES);
		$NO_HP = htmlentities($this->input->post('NO_HP'),ENT_QUOTES);
		$NOMOR_RANGKA = htmlentities($this->input->post('NOMOR_RANGKA'),ENT_QUOTES);
		$NOMOR_MESIN = htmlentities($this->input->post('NOMOR_MESIN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
				
		$ayek_inti_updated_by = $this->m_trayek_inti->__checkSession();
		$ayek_inti_updated_date = date('Y-m-d H:i:s');
		
		if($ayek_inti_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_USER'=>$ID_USER,
				'NOMOR_KENDARAAN'=>$NOMOR_KENDARAAN,
				'NAMA_PEMILIK'=>$NAMA_PEMILIK,
				'ALAMAT_PEMILIK'=>$ALAMAT_PEMILIK,
				'NO_HP'=>$NO_HP,
				'NOMOR_RANGKA'=>$NOMOR_RANGKA,
				'NOMOR_MESIN'=>$NOMOR_MESIN,
				'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
				);
			$result = $this->m_trayek_inti->__update($data, $ID_TRAYEK_INTI, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_trayek_inti->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NOMOR_KENDARAAN = htmlentities($this->input->post('NOMOR_KENDARAAN'),ENT_QUOTES);
		$NAMA_PEMILIK = htmlentities($this->input->post('NAMA_PEMILIK'),ENT_QUOTES);
		$ALAMAT_PEMILIK = htmlentities($this->input->post('ALAMAT_PEMILIK'),ENT_QUOTES);
		$NO_HP = htmlentities($this->input->post('NO_HP'),ENT_QUOTES);
		$NOMOR_RANGKA = htmlentities($this->input->post('NOMOR_RANGKA'),ENT_QUOTES);
		$NOMOR_MESIN = htmlentities($this->input->post('NOMOR_MESIN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
				
		$params = array(
			'ID_USER'=>$ID_USER,
			'NOMOR_KENDARAAN'=>$NOMOR_KENDARAAN,
			'NAMA_PEMILIK'=>$NAMA_PEMILIK,
			'ALAMAT_PEMILIK'=>$ALAMAT_PEMILIK,
			'NO_HP'=>$NO_HP,
			'NOMOR_RANGKA'=>$NOMOR_RANGKA,
			'NOMOR_MESIN'=>$NOMOR_MESIN,
			'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_trayek_inti->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NOMOR_KENDARAAN = htmlentities($this->input->post('NOMOR_KENDARAAN'),ENT_QUOTES);
		$NAMA_PEMILIK = htmlentities($this->input->post('NAMA_PEMILIK'),ENT_QUOTES);
		$ALAMAT_PEMILIK = htmlentities($this->input->post('ALAMAT_PEMILIK'),ENT_QUOTES);
		$NO_HP = htmlentities($this->input->post('NO_HP'),ENT_QUOTES);
		$NOMOR_RANGKA = htmlentities($this->input->post('NOMOR_RANGKA'),ENT_QUOTES);
		$NOMOR_MESIN = htmlentities($this->input->post('NOMOR_MESIN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
				
		$params = array(
			'searchText' => $searchText,
			'ID_USER'=>$ID_USER,
			'NOMOR_KENDARAAN'=>$NOMOR_KENDARAAN,
			'NAMA_PEMILIK'=>$NAMA_PEMILIK,
			'ALAMAT_PEMILIK'=>$ALAMAT_PEMILIK,
			'NO_HP'=>$NO_HP,
			'NOMOR_RANGKA'=>$NOMOR_RANGKA,
			'NOMOR_MESIN'=>$NOMOR_MESIN,
			'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_trayek_inti->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_trayek_inti.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/trayek_inti_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/trayek_inti_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}