<?php
class C_sktr_inti extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_sktr_inti');
	}
	
	function index(){
		$this->load->view('main/v_sktr_inti');
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
		$result = $this->m_sktr_inti->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_SKTR_INTI = htmlentities($this->input->post('ID_SKTR_INTI'),ENT_QUOTES);
		$ID_SKTR_INTI = is_numeric($ID_SKTR_INTI) ? $ID_SKTR_INTI : 0;
		$FUNGSI = htmlentities($this->input->post('FUNGSI'),ENT_QUOTES);
		$ALAMAT_BANGUNAN = htmlentities($this->input->post('ALAMAT_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = is_numeric($TINGGI_BANGUNAN) ? $TINGGI_BANGUNAN : 0;
		$LUAS_PERSIL = htmlentities($this->input->post('LUAS_PERSIL'),ENT_QUOTES);
		$LUAS_PERSIL = is_numeric($LUAS_PERSIL) ? $LUAS_PERSIL : 0;
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$LUAS_BANGUNAN = is_numeric($LUAS_BANGUNAN) ? $LUAS_BANGUNAN : 0;
				
		$tr_inti_author = $this->m_sktr_inti->__checkSession();
		$tr_inti_created_date = date('Y-m-d H:i:s');
		
		if($tr_inti_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_SKTR_INTI'=>$ID_SKTR_INTI,
				'FUNGSI'=>$FUNGSI,
				'ALAMAT_BANGUNAN'=>$ALAMAT_BANGUNAN,
				'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
				'LUAS_PERSIL'=>$LUAS_PERSIL,
				'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
				);
			$result = $this->m_sktr_inti->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_SKTR_INTI = htmlentities($this->input->post('ID_SKTR_INTI'),ENT_QUOTES);
		$ID_SKTR_INTI = is_numeric($ID_SKTR_INTI) ? $ID_SKTR_INTI : 0;
		$FUNGSI = htmlentities($this->input->post('FUNGSI'),ENT_QUOTES);
		$ALAMAT_BANGUNAN = htmlentities($this->input->post('ALAMAT_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = is_numeric($TINGGI_BANGUNAN) ? $TINGGI_BANGUNAN : 0;
		$LUAS_PERSIL = htmlentities($this->input->post('LUAS_PERSIL'),ENT_QUOTES);
		$LUAS_PERSIL = is_numeric($LUAS_PERSIL) ? $LUAS_PERSIL : 0;
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$LUAS_BANGUNAN = is_numeric($LUAS_BANGUNAN) ? $LUAS_BANGUNAN : 0;
				
		$tr_inti_updated_by = $this->m_sktr_inti->__checkSession();
		$tr_inti_updated_date = date('Y-m-d H:i:s');
		
		if($tr_inti_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'FUNGSI'=>$FUNGSI,
				'ALAMAT_BANGUNAN'=>$ALAMAT_BANGUNAN,
				'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
				'LUAS_PERSIL'=>$LUAS_PERSIL,
				'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
				);
			$result = $this->m_sktr_inti->__update($data, $ID_SKTR_INTI, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_sktr_inti->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$FUNGSI = htmlentities($this->input->post('FUNGSI'),ENT_QUOTES);
		$ALAMAT_BANGUNAN = htmlentities($this->input->post('ALAMAT_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = is_numeric($TINGGI_BANGUNAN) ? $TINGGI_BANGUNAN : 0;
		$LUAS_PERSIL = htmlentities($this->input->post('LUAS_PERSIL'),ENT_QUOTES);
		$LUAS_PERSIL = is_numeric($LUAS_PERSIL) ? $LUAS_PERSIL : 0;
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$LUAS_BANGUNAN = is_numeric($LUAS_BANGUNAN) ? $LUAS_BANGUNAN : 0;
				
		$params = array(
			'FUNGSI'=>$FUNGSI,
			'ALAMAT_BANGUNAN'=>$ALAMAT_BANGUNAN,
			'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
			'LUAS_PERSIL'=>$LUAS_PERSIL,
			'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_sktr_inti->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$FUNGSI = htmlentities($this->input->post('FUNGSI'),ENT_QUOTES);
		$ALAMAT_BANGUNAN = htmlentities($this->input->post('ALAMAT_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = is_numeric($TINGGI_BANGUNAN) ? $TINGGI_BANGUNAN : 0;
		$LUAS_PERSIL = htmlentities($this->input->post('LUAS_PERSIL'),ENT_QUOTES);
		$LUAS_PERSIL = is_numeric($LUAS_PERSIL) ? $LUAS_PERSIL : 0;
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$LUAS_BANGUNAN = is_numeric($LUAS_BANGUNAN) ? $LUAS_BANGUNAN : 0;
				
		$params = array(
			'searchText' => $searchText,
			'FUNGSI'=>$FUNGSI,
			'ALAMAT_BANGUNAN'=>$ALAMAT_BANGUNAN,
			'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
			'LUAS_PERSIL'=>$LUAS_PERSIL,
			'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_sktr_inti->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_sktr_inti.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/sktr_inti_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/sktr_inti_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}