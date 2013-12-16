<?php
class C_t_iujk_ceklist extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_iujk_ceklist');
	}
	
	function index(){
		$this->load->view('main/v_t_iujk_ceklist');
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
		$result = $this->m_t_iujk_ceklist->getList($params);
		echo $result;
	}
	
	function create(){
		$iujk_cek_id = htmlentities($this->input->post('iujk_cek_id'),ENT_QUOTES);
		$iujk_cek_id = is_numeric($iujk_cek_id) ? $iujk_cek_id : 0;
		$iujk_cek_syarat_id = htmlentities($this->input->post('iujk_cek_syarat_id'),ENT_QUOTES);
		$iujk_cek_syarat_id = is_numeric($iujk_cek_syarat_id) ? $iujk_cek_syarat_id : 0;
		$iujk_cek_iujkdet_id = htmlentities($this->input->post('iujk_cek_iujkdet_id'),ENT_QUOTES);
		$iujk_cek_iujkdet_id = is_numeric($iujk_cek_iujkdet_id) ? $iujk_cek_iujkdet_id : 0;
		$iujk_cek_iujk_id = htmlentities($this->input->post('iujk_cek_iujk_id'),ENT_QUOTES);
		$iujk_cek_iujk_id = is_numeric($iujk_cek_iujk_id) ? $iujk_cek_iujk_id : 0;
		$iujk_cek_status = htmlentities($this->input->post('iujk_cek_status'),ENT_QUOTES);
		$iujk_cek_status = is_numeric($iujk_cek_status) ? $iujk_cek_status : 0;
		$iujk_cek_keterangan = htmlentities($this->input->post('iujk_cek_keterangan'),ENT_QUOTES);
				
		$iujk_ceklist_author = $this->m_t_iujk_ceklist->__checkSession();
		$iujk_ceklist_created_date = date('Y-m-d H:i:s');
		
		if($iujk_ceklist_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'iujk_cek_id'=>$iujk_cek_id,
				'iujk_cek_syarat_id'=>$iujk_cek_syarat_id,
				'iujk_cek_iujkdet_id'=>$iujk_cek_iujkdet_id,
				'iujk_cek_iujk_id'=>$iujk_cek_iujk_id,
				'iujk_cek_status'=>$iujk_cek_status,
				'iujk_cek_keterangan'=>$iujk_cek_keterangan,
				);
			$result = $this->m_t_iujk_ceklist->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$iujk_cek_id = htmlentities($this->input->post('iujk_cek_id'),ENT_QUOTES);
		$iujk_cek_id = is_numeric($iujk_cek_id) ? $iujk_cek_id : 0;
		$iujk_cek_syarat_id = htmlentities($this->input->post('iujk_cek_syarat_id'),ENT_QUOTES);
		$iujk_cek_syarat_id = is_numeric($iujk_cek_syarat_id) ? $iujk_cek_syarat_id : 0;
		$iujk_cek_iujkdet_id = htmlentities($this->input->post('iujk_cek_iujkdet_id'),ENT_QUOTES);
		$iujk_cek_iujkdet_id = is_numeric($iujk_cek_iujkdet_id) ? $iujk_cek_iujkdet_id : 0;
		$iujk_cek_iujk_id = htmlentities($this->input->post('iujk_cek_iujk_id'),ENT_QUOTES);
		$iujk_cek_iujk_id = is_numeric($iujk_cek_iujk_id) ? $iujk_cek_iujk_id : 0;
		$iujk_cek_status = htmlentities($this->input->post('iujk_cek_status'),ENT_QUOTES);
		$iujk_cek_status = is_numeric($iujk_cek_status) ? $iujk_cek_status : 0;
		$iujk_cek_keterangan = htmlentities($this->input->post('iujk_cek_keterangan'),ENT_QUOTES);
				
		$iujk_ceklist_updated_by = $this->m_t_iujk_ceklist->__checkSession();
		$iujk_ceklist_updated_date = date('Y-m-d H:i:s');
		
		if($iujk_ceklist_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'iujk_cek_syarat_id'=>$iujk_cek_syarat_id,
				'iujk_cek_iujkdet_id'=>$iujk_cek_iujkdet_id,
				'iujk_cek_iujk_id'=>$iujk_cek_iujk_id,
				'iujk_cek_status'=>$iujk_cek_status,
				'iujk_cek_keterangan'=>$iujk_cek_keterangan,
				);
			$result = $this->m_t_iujk_ceklist->__update($data, $iujk_cek_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_iujk_ceklist->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$iujk_cek_syarat_id = htmlentities($this->input->post('iujk_cek_syarat_id'),ENT_QUOTES);
		$iujk_cek_syarat_id = is_numeric($iujk_cek_syarat_id) ? $iujk_cek_syarat_id : 0;
		$iujk_cek_iujkdet_id = htmlentities($this->input->post('iujk_cek_iujkdet_id'),ENT_QUOTES);
		$iujk_cek_iujkdet_id = is_numeric($iujk_cek_iujkdet_id) ? $iujk_cek_iujkdet_id : 0;
		$iujk_cek_iujk_id = htmlentities($this->input->post('iujk_cek_iujk_id'),ENT_QUOTES);
		$iujk_cek_iujk_id = is_numeric($iujk_cek_iujk_id) ? $iujk_cek_iujk_id : 0;
		$iujk_cek_status = htmlentities($this->input->post('iujk_cek_status'),ENT_QUOTES);
		$iujk_cek_status = is_numeric($iujk_cek_status) ? $iujk_cek_status : 0;
		$iujk_cek_keterangan = htmlentities($this->input->post('iujk_cek_keterangan'),ENT_QUOTES);
				
		$params = array(
			'iujk_cek_syarat_id'=>$iujk_cek_syarat_id,
			'iujk_cek_iujkdet_id'=>$iujk_cek_iujkdet_id,
			'iujk_cek_iujk_id'=>$iujk_cek_iujk_id,
			'iujk_cek_status'=>$iujk_cek_status,
			'iujk_cek_keterangan'=>$iujk_cek_keterangan,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_iujk_ceklist->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$iujk_cek_syarat_id = htmlentities($this->input->post('iujk_cek_syarat_id'),ENT_QUOTES);
		$iujk_cek_syarat_id = is_numeric($iujk_cek_syarat_id) ? $iujk_cek_syarat_id : 0;
		$iujk_cek_iujkdet_id = htmlentities($this->input->post('iujk_cek_iujkdet_id'),ENT_QUOTES);
		$iujk_cek_iujkdet_id = is_numeric($iujk_cek_iujkdet_id) ? $iujk_cek_iujkdet_id : 0;
		$iujk_cek_iujk_id = htmlentities($this->input->post('iujk_cek_iujk_id'),ENT_QUOTES);
		$iujk_cek_iujk_id = is_numeric($iujk_cek_iujk_id) ? $iujk_cek_iujk_id : 0;
		$iujk_cek_status = htmlentities($this->input->post('iujk_cek_status'),ENT_QUOTES);
		$iujk_cek_status = is_numeric($iujk_cek_status) ? $iujk_cek_status : 0;
		$iujk_cek_keterangan = htmlentities($this->input->post('iujk_cek_keterangan'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'iujk_cek_syarat_id'=>$iujk_cek_syarat_id,
			'iujk_cek_iujkdet_id'=>$iujk_cek_iujkdet_id,
			'iujk_cek_iujk_id'=>$iujk_cek_iujk_id,
			'iujk_cek_status'=>$iujk_cek_status,
			'iujk_cek_keterangan'=>$iujk_cek_keterangan,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_iujk_ceklist->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_iujk_ceklist.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_iujk_ceklist_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_iujk_ceklist_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}