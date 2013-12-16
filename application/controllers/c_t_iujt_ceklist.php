<?php
class C_t_iujt_ceklist extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_iujt_ceklist');
	}
	
	function index(){
		$this->load->view('main/v_t_iujt_ceklist');
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
		$result = $this->m_t_iujt_ceklist->getList($params);
		echo $result;
	}
	
	function create(){
		$iujt_cek_id = htmlentities($this->input->post('iujt_cek_id'),ENT_QUOTES);
		$iujt_cek_id = is_numeric($iujt_cek_id) ? $iujt_cek_id : 0;
		$iujt_cek_iujt_id = htmlentities($this->input->post('iujt_cek_iujt_id'),ENT_QUOTES);
		$iujt_cek_iujt_id = is_numeric($iujt_cek_iujt_id) ? $iujt_cek_iujt_id : 0;
		$iujt_cek_iujtdet_id = htmlentities($this->input->post('iujt_cek_iujtdet_id'),ENT_QUOTES);
		$iujt_cek_iujtdet_id = is_numeric($iujt_cek_iujtdet_id) ? $iujt_cek_iujtdet_id : 0;
		$iujt_cek_syarat_id = htmlentities($this->input->post('iujt_cek_syarat_id'),ENT_QUOTES);
		$iujt_cek_syarat_id = is_numeric($iujt_cek_syarat_id) ? $iujt_cek_syarat_id : 0;
		$iujt_cek_status = htmlentities($this->input->post('iujt_cek_status'),ENT_QUOTES);
		$iujt_cek_status = is_numeric($iujt_cek_status) ? $iujt_cek_status : 0;
				
		$iujt_ceklist_author = $this->m_t_iujt_ceklist->__checkSession();
		$iujt_ceklist_created_date = date('Y-m-d H:i:s');
		
		if($iujt_ceklist_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'iujt_cek_id'=>$iujt_cek_id,
				'iujt_cek_iujt_id'=>$iujt_cek_iujt_id,
				'iujt_cek_iujtdet_id'=>$iujt_cek_iujtdet_id,
				'iujt_cek_syarat_id'=>$iujt_cek_syarat_id,
				'iujt_cek_status'=>$iujt_cek_status,
				);
			$result = $this->m_t_iujt_ceklist->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$iujt_cek_id = htmlentities($this->input->post('iujt_cek_id'),ENT_QUOTES);
		$iujt_cek_id = is_numeric($iujt_cek_id) ? $iujt_cek_id : 0;
		$iujt_cek_iujt_id = htmlentities($this->input->post('iujt_cek_iujt_id'),ENT_QUOTES);
		$iujt_cek_iujt_id = is_numeric($iujt_cek_iujt_id) ? $iujt_cek_iujt_id : 0;
		$iujt_cek_iujtdet_id = htmlentities($this->input->post('iujt_cek_iujtdet_id'),ENT_QUOTES);
		$iujt_cek_iujtdet_id = is_numeric($iujt_cek_iujtdet_id) ? $iujt_cek_iujtdet_id : 0;
		$iujt_cek_syarat_id = htmlentities($this->input->post('iujt_cek_syarat_id'),ENT_QUOTES);
		$iujt_cek_syarat_id = is_numeric($iujt_cek_syarat_id) ? $iujt_cek_syarat_id : 0;
		$iujt_cek_status = htmlentities($this->input->post('iujt_cek_status'),ENT_QUOTES);
		$iujt_cek_status = is_numeric($iujt_cek_status) ? $iujt_cek_status : 0;
				
		$iujt_ceklist_updated_by = $this->m_t_iujt_ceklist->__checkSession();
		$iujt_ceklist_updated_date = date('Y-m-d H:i:s');
		
		if($iujt_ceklist_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'iujt_cek_iujt_id'=>$iujt_cek_iujt_id,
				'iujt_cek_iujtdet_id'=>$iujt_cek_iujtdet_id,
				'iujt_cek_syarat_id'=>$iujt_cek_syarat_id,
				'iujt_cek_status'=>$iujt_cek_status,
				);
			$result = $this->m_t_iujt_ceklist->__update($data, $iujt_cek_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_iujt_ceklist->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$iujt_cek_iujt_id = htmlentities($this->input->post('iujt_cek_iujt_id'),ENT_QUOTES);
		$iujt_cek_iujt_id = is_numeric($iujt_cek_iujt_id) ? $iujt_cek_iujt_id : 0;
		$iujt_cek_iujtdet_id = htmlentities($this->input->post('iujt_cek_iujtdet_id'),ENT_QUOTES);
		$iujt_cek_iujtdet_id = is_numeric($iujt_cek_iujtdet_id) ? $iujt_cek_iujtdet_id : 0;
		$iujt_cek_syarat_id = htmlentities($this->input->post('iujt_cek_syarat_id'),ENT_QUOTES);
		$iujt_cek_syarat_id = is_numeric($iujt_cek_syarat_id) ? $iujt_cek_syarat_id : 0;
		$iujt_cek_status = htmlentities($this->input->post('iujt_cek_status'),ENT_QUOTES);
		$iujt_cek_status = is_numeric($iujt_cek_status) ? $iujt_cek_status : 0;
				
		$params = array(
			'iujt_cek_iujt_id'=>$iujt_cek_iujt_id,
			'iujt_cek_iujtdet_id'=>$iujt_cek_iujtdet_id,
			'iujt_cek_syarat_id'=>$iujt_cek_syarat_id,
			'iujt_cek_status'=>$iujt_cek_status,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_iujt_ceklist->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$iujt_cek_iujt_id = htmlentities($this->input->post('iujt_cek_iujt_id'),ENT_QUOTES);
		$iujt_cek_iujt_id = is_numeric($iujt_cek_iujt_id) ? $iujt_cek_iujt_id : 0;
		$iujt_cek_iujtdet_id = htmlentities($this->input->post('iujt_cek_iujtdet_id'),ENT_QUOTES);
		$iujt_cek_iujtdet_id = is_numeric($iujt_cek_iujtdet_id) ? $iujt_cek_iujtdet_id : 0;
		$iujt_cek_syarat_id = htmlentities($this->input->post('iujt_cek_syarat_id'),ENT_QUOTES);
		$iujt_cek_syarat_id = is_numeric($iujt_cek_syarat_id) ? $iujt_cek_syarat_id : 0;
		$iujt_cek_status = htmlentities($this->input->post('iujt_cek_status'),ENT_QUOTES);
		$iujt_cek_status = is_numeric($iujt_cek_status) ? $iujt_cek_status : 0;
				
		$params = array(
			'searchText' => $searchText,
			'iujt_cek_iujt_id'=>$iujt_cek_iujt_id,
			'iujt_cek_iujtdet_id'=>$iujt_cek_iujtdet_id,
			'iujt_cek_syarat_id'=>$iujt_cek_syarat_id,
			'iujt_cek_status'=>$iujt_cek_status,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_iujt_ceklist->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_iujt_ceklist.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_iujt_ceklist_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_iujt_ceklist_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}