<?php
class C_dt_syarat extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_dt_syarat');
	}
	
	function index(){
		$this->load->view('main/v_dt_syarat');
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
		$result = $this->m_dt_syarat->getList($params,6);
		echo $result;
	}
	
	function create(){
		$ID_IJIN = htmlentities($this->input->post('ID_IJIN'),ENT_QUOTES);
		$ID_IJIN = is_numeric($ID_IJIN) ? $ID_IJIN : 0;
		$ID_SYARAT = htmlentities($this->input->post('ID_SYARAT'),ENT_QUOTES);
		$ID_SYARAT = is_numeric($ID_SYARAT) ? $ID_SYARAT : 0;
		$JUMLAH = htmlentities($this->input->post('JUMLAH'),ENT_QUOTES);
		$JUMLAH = is_numeric($JUMLAH) ? $JUMLAH : 0;
				
		$_syarat_author = $this->m_dt_syarat->__checkSession();
		$_syarat_created_date = date('Y-m-d H:i:s');
		
		if(!$_syarat_author){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IJIN'=>$ID_IJIN,
				'ID_SYARAT'=>$ID_SYARAT,
				'JUMLAH'=>$JUMLAH,
				);
			$result = $this->m_dt_syarat->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_IJIN = htmlentities($this->input->post('ID_IJIN'),ENT_QUOTES);
		$ID_IJIN = is_numeric($ID_IJIN) ? $ID_IJIN : 0;
		$ID_SYARAT = htmlentities($this->input->post('ID_SYARAT'),ENT_QUOTES);
		$ID_SYARAT = is_numeric($ID_SYARAT) ? $ID_SYARAT : 0;
		$JUMLAH = htmlentities($this->input->post('JUMLAH'),ENT_QUOTES);
		$JUMLAH = is_numeric($JUMLAH) ? $JUMLAH : 0;
				
		$_syarat_updated_by = $this->m_dt_syarat->__checkSession();
		$_syarat_updated_date = date('Y-m-d H:i:s');
		
		if(!$_syarat_updated_by){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'JUMLAH'=>$JUMLAH,
				);
			$result = $this->m_dt_syarat->__update($data, $ID_IJINID_SYARAT, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_dt_syarat->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$JUMLAH = htmlentities($this->input->post('JUMLAH'),ENT_QUOTES);
		$JUMLAH = is_numeric($JUMLAH) ? $JUMLAH : 0;
				
		$params = array(
			'JUMLAH'=>$JUMLAH,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_dt_syarat->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$JUMLAH = htmlentities($this->input->post('JUMLAH'),ENT_QUOTES);
		$JUMLAH = is_numeric($JUMLAH) ? $JUMLAH : 0;
				
		$params = array(
			'searchText' => $searchText,
			'JUMLAH'=>$JUMLAH,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$data['records'] = $this->m_dt_syarat->printExcel($params)[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_dt_syarat.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/dt_syarat_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/dt_syarat_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}