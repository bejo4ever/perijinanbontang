<?php
class C_cek_list_trotoar extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_cek_list_trotoar');
	}
	
	function index(){
		$this->load->view('main/v_cek_list_trotoar');
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
		$result = $this->m_cek_list_trotoar->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_SYARAT = htmlentities($this->input->post('ID_SYARAT'),ENT_QUOTES);
		$ID_SYARAT = is_numeric($ID_SYARAT) ? $ID_SYARAT : 0;
		$ID_IJIN = htmlentities($this->input->post('ID_IJIN'),ENT_QUOTES);
		$ID_IJIN = is_numeric($ID_IJIN) ? $ID_IJIN : 0;
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$KETERANGAN = htmlentities($this->input->post('KETERANGAN'),ENT_QUOTES);
				
		$k_list_trotoar_author = $this->m_cek_list_trotoar->__checkSession();
		$k_list_trotoar_created_date = date('Y-m-d H:i:s');
		
		if($k_list_trotoar_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_SYARAT'=>$ID_SYARAT,
				'ID_IJIN'=>$ID_IJIN,
				'STATUS'=>$STATUS,
				'KETERANGAN'=>$KETERANGAN,
				);
			$result = $this->m_cek_list_trotoar->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_SYARAT = htmlentities($this->input->post('ID_SYARAT'),ENT_QUOTES);
		$ID_SYARAT = is_numeric($ID_SYARAT) ? $ID_SYARAT : 0;
		$ID_IJIN = htmlentities($this->input->post('ID_IJIN'),ENT_QUOTES);
		$ID_IJIN = is_numeric($ID_IJIN) ? $ID_IJIN : 0;
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$KETERANGAN = htmlentities($this->input->post('KETERANGAN'),ENT_QUOTES);
				
		$k_list_trotoar_updated_by = $this->m_cek_list_trotoar->__checkSession();
		$k_list_trotoar_updated_date = date('Y-m-d H:i:s');
		
		if($k_list_trotoar_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'STATUS'=>$STATUS,
				'KETERANGAN'=>$KETERANGAN,
				);
			$result = $this->m_cek_list_trotoar->__update($data, $ID_SYARATID_IJIN, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_cek_list_trotoar->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$KETERANGAN = htmlentities($this->input->post('KETERANGAN'),ENT_QUOTES);
				
		$params = array(
			'STATUS'=>$STATUS,
			'KETERANGAN'=>$KETERANGAN,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_cek_list_trotoar->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$KETERANGAN = htmlentities($this->input->post('KETERANGAN'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'STATUS'=>$STATUS,
			'KETERANGAN'=>$KETERANGAN,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_cek_list_trotoar->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_cek_list_trotoar.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/cek_list_trotoar_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/cek_list_trotoar_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}