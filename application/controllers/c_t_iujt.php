<?php
class C_t_iujt extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_iujt');
	}
	
	function index(){
		$this->load->view('main/v_t_iujt');
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
		$result = $this->m_t_iujt->getList($params);
		echo $result;
	}
	
	function create(){
		$iujt_id = htmlentities($this->input->post('iujt_id'),ENT_QUOTES);
		$iujt_id = is_numeric($iujt_id) ? $iujt_id : 0;
		$iujt_usaha = htmlentities($this->input->post('iujt_usaha'),ENT_QUOTES);
		$iujt_alamatusaha = htmlentities($this->input->post('iujt_alamatusaha'),ENT_QUOTES);
		$iujt_penanggungjawab = htmlentities($this->input->post('iujt_penanggungjawab'),ENT_QUOTES);
				
		$iujt_author = $this->m_t_iujt->__checkSession();
		$iujt_created_date = date('Y-m-d H:i:s');
		
		if($iujt_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'iujt_id'=>$iujt_id,
				'iujt_usaha'=>$iujt_usaha,
				'iujt_alamatusaha'=>$iujt_alamatusaha,
				'iujt_penanggungjawab'=>$iujt_penanggungjawab,
				);
			$result = $this->m_t_iujt->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$iujt_id = htmlentities($this->input->post('iujt_id'),ENT_QUOTES);
		$iujt_id = is_numeric($iujt_id) ? $iujt_id : 0;
		$iujt_usaha = htmlentities($this->input->post('iujt_usaha'),ENT_QUOTES);
		$iujt_alamatusaha = htmlentities($this->input->post('iujt_alamatusaha'),ENT_QUOTES);
		$iujt_penanggungjawab = htmlentities($this->input->post('iujt_penanggungjawab'),ENT_QUOTES);
				
		$iujt_updated_by = $this->m_t_iujt->__checkSession();
		$iujt_updated_date = date('Y-m-d H:i:s');
		
		if($iujt_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'iujt_usaha'=>$iujt_usaha,
				'iujt_alamatusaha'=>$iujt_alamatusaha,
				'iujt_penanggungjawab'=>$iujt_penanggungjawab,
				);
			$result = $this->m_t_iujt->__update($data, $iujt_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_iujt->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$iujt_usaha = htmlentities($this->input->post('iujt_usaha'),ENT_QUOTES);
		$iujt_alamatusaha = htmlentities($this->input->post('iujt_alamatusaha'),ENT_QUOTES);
		$iujt_penanggungjawab = htmlentities($this->input->post('iujt_penanggungjawab'),ENT_QUOTES);
				
		$params = array(
			'iujt_usaha'=>$iujt_usaha,
			'iujt_alamatusaha'=>$iujt_alamatusaha,
			'iujt_penanggungjawab'=>$iujt_penanggungjawab,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_iujt->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$iujt_usaha = htmlentities($this->input->post('iujt_usaha'),ENT_QUOTES);
		$iujt_alamatusaha = htmlentities($this->input->post('iujt_alamatusaha'),ENT_QUOTES);
		$iujt_penanggungjawab = htmlentities($this->input->post('iujt_penanggungjawab'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'iujt_usaha'=>$iujt_usaha,
			'iujt_alamatusaha'=>$iujt_alamatusaha,
			'iujt_penanggungjawab'=>$iujt_penanggungjawab,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_iujt->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_iujt.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_iujt_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_iujt_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}