<?php
class C_t_apotek_asisten extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_apotek_asisten');
	}
	
	function index(){
		$this->load->view('main/v_t_apotek_asisten');
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
		$result = $this->m_t_apotek_asisten->getList($params);
		echo $result;
	}
	
	function create(){
		$asisten_id = htmlentities($this->input->post('asisten_id'),ENT_QUOTES);
		$asisten_id = is_numeric($asisten_id) ? $asisten_id : 0;
		$asisten_apotek_id = htmlentities($this->input->post('asisten_apotek_id'),ENT_QUOTES);
		$asisten_apotek_id = is_numeric($asisten_apotek_id) ? $asisten_apotek_id : 0;
		$asisten_apotekdet_id = htmlentities($this->input->post('asisten_apotekdet_id'),ENT_QUOTES);
		$asisten_apotekdet_id = is_numeric($asisten_apotekdet_id) ? $asisten_apotekdet_id : 0;
		$asisten_nama = htmlentities($this->input->post('asisten_nama'),ENT_QUOTES);
		$asisten_sik = htmlentities($this->input->post('asisten_sik'),ENT_QUOTES);
		$asisten_lulus = htmlentities($this->input->post('asisten_lulus'),ENT_QUOTES);
		$asisten_alamat = htmlentities($this->input->post('asisten_alamat'),ENT_QUOTES);
				
		$apotek_asisten_author = $this->m_t_apotek_asisten->__checkSession();
		$apotek_asisten_created_date = date('Y-m-d H:i:s');
		
		if($apotek_asisten_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'asisten_id'=>$asisten_id,
				'asisten_apotek_id'=>$asisten_apotek_id,
				'asisten_apotekdet_id'=>$asisten_apotekdet_id,
				'asisten_nama'=>$asisten_nama,
				'asisten_sik'=>$asisten_sik,
				'asisten_lulus'=>$asisten_lulus,
				'asisten_alamat'=>$asisten_alamat,
				);
			$result = $this->m_t_apotek_asisten->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$asisten_id = htmlentities($this->input->post('asisten_id'),ENT_QUOTES);
		$asisten_id = is_numeric($asisten_id) ? $asisten_id : 0;
		$asisten_apotek_id = htmlentities($this->input->post('asisten_apotek_id'),ENT_QUOTES);
		$asisten_apotek_id = is_numeric($asisten_apotek_id) ? $asisten_apotek_id : 0;
		$asisten_apotekdet_id = htmlentities($this->input->post('asisten_apotekdet_id'),ENT_QUOTES);
		$asisten_apotekdet_id = is_numeric($asisten_apotekdet_id) ? $asisten_apotekdet_id : 0;
		$asisten_nama = htmlentities($this->input->post('asisten_nama'),ENT_QUOTES);
		$asisten_sik = htmlentities($this->input->post('asisten_sik'),ENT_QUOTES);
		$asisten_lulus = htmlentities($this->input->post('asisten_lulus'),ENT_QUOTES);
		$asisten_alamat = htmlentities($this->input->post('asisten_alamat'),ENT_QUOTES);
				
		$apotek_asisten_updated_by = $this->m_t_apotek_asisten->__checkSession();
		$apotek_asisten_updated_date = date('Y-m-d H:i:s');
		
		if($apotek_asisten_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'asisten_apotek_id'=>$asisten_apotek_id,
				'asisten_apotekdet_id'=>$asisten_apotekdet_id,
				'asisten_nama'=>$asisten_nama,
				'asisten_sik'=>$asisten_sik,
				'asisten_lulus'=>$asisten_lulus,
				'asisten_alamat'=>$asisten_alamat,
				);
			$result = $this->m_t_apotek_asisten->__update($data, $asisten_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_apotek_asisten->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$asisten_apotek_id = htmlentities($this->input->post('asisten_apotek_id'),ENT_QUOTES);
		$asisten_apotek_id = is_numeric($asisten_apotek_id) ? $asisten_apotek_id : 0;
		$asisten_apotekdet_id = htmlentities($this->input->post('asisten_apotekdet_id'),ENT_QUOTES);
		$asisten_apotekdet_id = is_numeric($asisten_apotekdet_id) ? $asisten_apotekdet_id : 0;
		$asisten_nama = htmlentities($this->input->post('asisten_nama'),ENT_QUOTES);
		$asisten_sik = htmlentities($this->input->post('asisten_sik'),ENT_QUOTES);
		$asisten_lulus = htmlentities($this->input->post('asisten_lulus'),ENT_QUOTES);
		$asisten_alamat = htmlentities($this->input->post('asisten_alamat'),ENT_QUOTES);
				
		$params = array(
			'asisten_apotek_id'=>$asisten_apotek_id,
			'asisten_apotekdet_id'=>$asisten_apotekdet_id,
			'asisten_nama'=>$asisten_nama,
			'asisten_sik'=>$asisten_sik,
			'asisten_lulus'=>$asisten_lulus,
			'asisten_alamat'=>$asisten_alamat,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_apotek_asisten->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$asisten_apotek_id = htmlentities($this->input->post('asisten_apotek_id'),ENT_QUOTES);
		$asisten_apotek_id = is_numeric($asisten_apotek_id) ? $asisten_apotek_id : 0;
		$asisten_apotekdet_id = htmlentities($this->input->post('asisten_apotekdet_id'),ENT_QUOTES);
		$asisten_apotekdet_id = is_numeric($asisten_apotekdet_id) ? $asisten_apotekdet_id : 0;
		$asisten_nama = htmlentities($this->input->post('asisten_nama'),ENT_QUOTES);
		$asisten_sik = htmlentities($this->input->post('asisten_sik'),ENT_QUOTES);
		$asisten_lulus = htmlentities($this->input->post('asisten_lulus'),ENT_QUOTES);
		$asisten_alamat = htmlentities($this->input->post('asisten_alamat'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'asisten_apotek_id'=>$asisten_apotek_id,
			'asisten_apotekdet_id'=>$asisten_apotekdet_id,
			'asisten_nama'=>$asisten_nama,
			'asisten_sik'=>$asisten_sik,
			'asisten_lulus'=>$asisten_lulus,
			'asisten_alamat'=>$asisten_alamat,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_apotek_asisten->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_apotek_asisten.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_apotek_asisten_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_apotek_asisten_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}