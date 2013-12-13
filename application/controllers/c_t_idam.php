<?php
class C_t_idam extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_idam');
	}
	
	function index(){
		$this->load->view('main/v_t_idam');
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
		$result = $this->m_t_idam->getList($params);
		echo $result;
	}
	
	function create(){
		$idam_id = htmlentities($this->input->post('idam_id'),ENT_QUOTES);
		$idam_id = is_numeric($idam_id) ? $idam_id : 0;
		$idam_usaha = htmlentities($this->input->post('idam_usaha'),ENT_QUOTES);
		$idam_jenisusaha = htmlentities($this->input->post('idam_jenisusaha'),ENT_QUOTES);
		$idam_alamat = htmlentities($this->input->post('idam_alamat'),ENT_QUOTES);
		$idam_sertifikatpkp = htmlentities($this->input->post('idam_sertifikatpkp'),ENT_QUOTES);
				
		$idam_author = $this->m_t_idam->__checkSession();
		$idam_created_date = date('Y-m-d H:i:s');
		
		if(!$idam_author){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'idam_id'=>$idam_id,
				'idam_usaha'=>$idam_usaha,
				'idam_jenisusaha'=>$idam_jenisusaha,
				'idam_alamat'=>$idam_alamat,
				'idam_sertifikatpkp'=>$idam_sertifikatpkp,
				);
			$result = $this->m_t_idam->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$idam_id = htmlentities($this->input->post('idam_id'),ENT_QUOTES);
		$idam_id = is_numeric($idam_id) ? $idam_id : 0;
		$idam_usaha = htmlentities($this->input->post('idam_usaha'),ENT_QUOTES);
		$idam_jenisusaha = htmlentities($this->input->post('idam_jenisusaha'),ENT_QUOTES);
		$idam_alamat = htmlentities($this->input->post('idam_alamat'),ENT_QUOTES);
		$idam_sertifikatpkp = htmlentities($this->input->post('idam_sertifikatpkp'),ENT_QUOTES);
				
		$idam_updated_by = $this->m_t_idam->__checkSession();
		$idam_updated_date = date('Y-m-d H:i:s');
		
		if(!$idam_updated_by){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'idam_usaha'=>$idam_usaha,
				'idam_jenisusaha'=>$idam_jenisusaha,
				'idam_alamat'=>$idam_alamat,
				'idam_sertifikatpkp'=>$idam_sertifikatpkp,
				);
			$result = $this->m_t_idam->__update($data, $idam_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_idam->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$idam_usaha = htmlentities($this->input->post('idam_usaha'),ENT_QUOTES);
		$idam_jenisusaha = htmlentities($this->input->post('idam_jenisusaha'),ENT_QUOTES);
		$idam_alamat = htmlentities($this->input->post('idam_alamat'),ENT_QUOTES);
		$idam_sertifikatpkp = htmlentities($this->input->post('idam_sertifikatpkp'),ENT_QUOTES);
				
		$params = array(
			'idam_usaha'=>$idam_usaha,
			'idam_jenisusaha'=>$idam_jenisusaha,
			'idam_alamat'=>$idam_alamat,
			'idam_sertifikatpkp'=>$idam_sertifikatpkp,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_idam->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$idam_usaha = htmlentities($this->input->post('idam_usaha'),ENT_QUOTES);
		$idam_jenisusaha = htmlentities($this->input->post('idam_jenisusaha'),ENT_QUOTES);
		$idam_alamat = htmlentities($this->input->post('idam_alamat'),ENT_QUOTES);
		$idam_sertifikatpkp = htmlentities($this->input->post('idam_sertifikatpkp'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'idam_usaha'=>$idam_usaha,
			'idam_jenisusaha'=>$idam_jenisusaha,
			'idam_alamat'=>$idam_alamat,
			'idam_sertifikatpkp'=>$idam_sertifikatpkp,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$data['records'] = $this->m_t_idam->printExcel($params)[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_idam.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_idam_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_idam_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}