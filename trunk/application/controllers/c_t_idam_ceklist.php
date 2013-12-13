<?php
class C_t_idam_ceklist extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_idam_ceklist');
	}
	
	function index(){
		$this->load->view('main/v_t_idam_ceklist');
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
		$result = $this->m_t_idam_ceklist->getList($params);
		echo $result;
	}
	
	function create(){
		$idam_cek_id = htmlentities($this->input->post('idam_cek_id'),ENT_QUOTES);
		$idam_cek_id = is_numeric($idam_cek_id) ? $idam_cek_id : 0;
		$idam_cek_syarat_id = htmlentities($this->input->post('idam_cek_syarat_id'),ENT_QUOTES);
		$idam_cek_syarat_id = is_numeric($idam_cek_syarat_id) ? $idam_cek_syarat_id : 0;
		$idam_cek_idamdet_id = htmlentities($this->input->post('idam_cek_idamdet_id'),ENT_QUOTES);
		$idam_cek_idamdet_id = is_numeric($idam_cek_idamdet_id) ? $idam_cek_idamdet_id : 0;
		$idam_cek_idam_id = htmlentities($this->input->post('idam_cek_idam_id'),ENT_QUOTES);
		$idam_cek_idam_id = is_numeric($idam_cek_idam_id) ? $idam_cek_idam_id : 0;
		$idam_cek_status = htmlentities($this->input->post('idam_cek_status'),ENT_QUOTES);
		$idam_cek_status = is_numeric($idam_cek_status) ? $idam_cek_status : 0;
		$idam_cek_keterangan = htmlentities($this->input->post('idam_cek_keterangan'),ENT_QUOTES);
				
		$idam_ceklist_author = $this->m_t_idam_ceklist->__checkSession();
		$idam_ceklist_created_date = date('Y-m-d H:i:s');
		
		if(!$idam_ceklist_author){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'idam_cek_id'=>$idam_cek_id,
				'idam_cek_syarat_id'=>$idam_cek_syarat_id,
				'idam_cek_idamdet_id'=>$idam_cek_idamdet_id,
				'idam_cek_idam_id'=>$idam_cek_idam_id,
				'idam_cek_status'=>$idam_cek_status,
				'idam_cek_keterangan'=>$idam_cek_keterangan,
				);
			$result = $this->m_t_idam_ceklist->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$idam_cek_id = htmlentities($this->input->post('idam_cek_id'),ENT_QUOTES);
		$idam_cek_id = is_numeric($idam_cek_id) ? $idam_cek_id : 0;
		$idam_cek_syarat_id = htmlentities($this->input->post('idam_cek_syarat_id'),ENT_QUOTES);
		$idam_cek_syarat_id = is_numeric($idam_cek_syarat_id) ? $idam_cek_syarat_id : 0;
		$idam_cek_idamdet_id = htmlentities($this->input->post('idam_cek_idamdet_id'),ENT_QUOTES);
		$idam_cek_idamdet_id = is_numeric($idam_cek_idamdet_id) ? $idam_cek_idamdet_id : 0;
		$idam_cek_idam_id = htmlentities($this->input->post('idam_cek_idam_id'),ENT_QUOTES);
		$idam_cek_idam_id = is_numeric($idam_cek_idam_id) ? $idam_cek_idam_id : 0;
		$idam_cek_status = htmlentities($this->input->post('idam_cek_status'),ENT_QUOTES);
		$idam_cek_status = is_numeric($idam_cek_status) ? $idam_cek_status : 0;
		$idam_cek_keterangan = htmlentities($this->input->post('idam_cek_keterangan'),ENT_QUOTES);
				
		$idam_ceklist_updated_by = $this->m_t_idam_ceklist->__checkSession();
		$idam_ceklist_updated_date = date('Y-m-d H:i:s');
		
		if(!$idam_ceklist_updated_by){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'idam_cek_syarat_id'=>$idam_cek_syarat_id,
				'idam_cek_idamdet_id'=>$idam_cek_idamdet_id,
				'idam_cek_idam_id'=>$idam_cek_idam_id,
				'idam_cek_status'=>$idam_cek_status,
				'idam_cek_keterangan'=>$idam_cek_keterangan,
				);
			$result = $this->m_t_idam_ceklist->__update($data, $idam_cek_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_idam_ceklist->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$idam_cek_syarat_id = htmlentities($this->input->post('idam_cek_syarat_id'),ENT_QUOTES);
		$idam_cek_syarat_id = is_numeric($idam_cek_syarat_id) ? $idam_cek_syarat_id : 0;
		$idam_cek_idamdet_id = htmlentities($this->input->post('idam_cek_idamdet_id'),ENT_QUOTES);
		$idam_cek_idamdet_id = is_numeric($idam_cek_idamdet_id) ? $idam_cek_idamdet_id : 0;
		$idam_cek_idam_id = htmlentities($this->input->post('idam_cek_idam_id'),ENT_QUOTES);
		$idam_cek_idam_id = is_numeric($idam_cek_idam_id) ? $idam_cek_idam_id : 0;
		$idam_cek_status = htmlentities($this->input->post('idam_cek_status'),ENT_QUOTES);
		$idam_cek_status = is_numeric($idam_cek_status) ? $idam_cek_status : 0;
		$idam_cek_keterangan = htmlentities($this->input->post('idam_cek_keterangan'),ENT_QUOTES);
				
		$params = array(
			'idam_cek_syarat_id'=>$idam_cek_syarat_id,
			'idam_cek_idamdet_id'=>$idam_cek_idamdet_id,
			'idam_cek_idam_id'=>$idam_cek_idam_id,
			'idam_cek_status'=>$idam_cek_status,
			'idam_cek_keterangan'=>$idam_cek_keterangan,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_idam_ceklist->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$idam_cek_syarat_id = htmlentities($this->input->post('idam_cek_syarat_id'),ENT_QUOTES);
		$idam_cek_syarat_id = is_numeric($idam_cek_syarat_id) ? $idam_cek_syarat_id : 0;
		$idam_cek_idamdet_id = htmlentities($this->input->post('idam_cek_idamdet_id'),ENT_QUOTES);
		$idam_cek_idamdet_id = is_numeric($idam_cek_idamdet_id) ? $idam_cek_idamdet_id : 0;
		$idam_cek_idam_id = htmlentities($this->input->post('idam_cek_idam_id'),ENT_QUOTES);
		$idam_cek_idam_id = is_numeric($idam_cek_idam_id) ? $idam_cek_idam_id : 0;
		$idam_cek_status = htmlentities($this->input->post('idam_cek_status'),ENT_QUOTES);
		$idam_cek_status = is_numeric($idam_cek_status) ? $idam_cek_status : 0;
		$idam_cek_keterangan = htmlentities($this->input->post('idam_cek_keterangan'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'idam_cek_syarat_id'=>$idam_cek_syarat_id,
			'idam_cek_idamdet_id'=>$idam_cek_idamdet_id,
			'idam_cek_idam_id'=>$idam_cek_idam_id,
			'idam_cek_status'=>$idam_cek_status,
			'idam_cek_keterangan'=>$idam_cek_keterangan,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$data['records'] = $this->m_t_idam_ceklist->printExcel($params)[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_idam_ceklist.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_idam_ceklist_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_idam_ceklist_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}