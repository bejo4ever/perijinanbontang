<?php
class C_t_ipmbl_dok extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_ipmbl_dok');
	}
	
	function index(){
		$this->load->view('main/v_t_ipmbl_dok');
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
		$result = $this->m_t_ipmbl_dok->getList($params);
		echo $result;
	}
	
	function create(){
		$dok_ipmbl_id = htmlentities($this->input->post('dok_ipmbl_id'),ENT_QUOTES);
		$dok_ipmbl_id = is_numeric($dok_ipmbl_id) ? $dok_ipmbl_id : 0;
		$dok_ipmbl_penerima = htmlentities($this->input->post('dok_ipmbl_penerima'),ENT_QUOTES);
		$dok_ipmbl_jabatan = htmlentities($this->input->post('dok_ipmbl_jabatan'),ENT_QUOTES);
		$dok_ipmbl_tanggal = htmlentities($this->input->post('dok_ipmbl_tanggal'),ENT_QUOTES);
		$dok_ipmbl_keterangan = htmlentities($this->input->post('dok_ipmbl_keterangan'),ENT_QUOTES);
		$dok_ipmbl_ipmbl_id = htmlentities($this->input->post('dok_ipmbl_ipmbl_id'),ENT_QUOTES);
		$dok_ipmbl_ipmbl_id = is_numeric($dok_ipmbl_ipmbl_id) ? $dok_ipmbl_ipmbl_id : 0;
		$dok_ipmbl_ipmbldet_id = htmlentities($this->input->post('dok_ipmbl_ipmbldet_id'),ENT_QUOTES);
		$dok_ipmbl_ipmbldet_id = is_numeric($dok_ipmbl_ipmbldet_id) ? $dok_ipmbl_ipmbldet_id : 0;
				
		$ipmbl_dok_author = $this->m_t_ipmbl_dok->__checkSession();
		$ipmbl_dok_created_date = date('Y-m-d H:i:s');
		
		if($ipmbl_dok_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'dok_ipmbl_id'=>$dok_ipmbl_id,
				'dok_ipmbl_penerima'=>$dok_ipmbl_penerima,
				'dok_ipmbl_jabatan'=>$dok_ipmbl_jabatan,
				'dok_ipmbl_tanggal'=>$dok_ipmbl_tanggal,
				'dok_ipmbl_keterangan'=>$dok_ipmbl_keterangan,
				'dok_ipmbl_ipmbl_id'=>$dok_ipmbl_ipmbl_id,
				'dok_ipmbl_ipmbldet_id'=>$dok_ipmbl_ipmbldet_id,
				);
			$result = $this->m_t_ipmbl_dok->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$dok_ipmbl_id = htmlentities($this->input->post('dok_ipmbl_id'),ENT_QUOTES);
		$dok_ipmbl_id = is_numeric($dok_ipmbl_id) ? $dok_ipmbl_id : 0;
		$dok_ipmbl_penerima = htmlentities($this->input->post('dok_ipmbl_penerima'),ENT_QUOTES);
		$dok_ipmbl_jabatan = htmlentities($this->input->post('dok_ipmbl_jabatan'),ENT_QUOTES);
		$dok_ipmbl_tanggal = htmlentities($this->input->post('dok_ipmbl_tanggal'),ENT_QUOTES);
		$dok_ipmbl_keterangan = htmlentities($this->input->post('dok_ipmbl_keterangan'),ENT_QUOTES);
		$dok_ipmbl_ipmbl_id = htmlentities($this->input->post('dok_ipmbl_ipmbl_id'),ENT_QUOTES);
		$dok_ipmbl_ipmbl_id = is_numeric($dok_ipmbl_ipmbl_id) ? $dok_ipmbl_ipmbl_id : 0;
		$dok_ipmbl_ipmbldet_id = htmlentities($this->input->post('dok_ipmbl_ipmbldet_id'),ENT_QUOTES);
		$dok_ipmbl_ipmbldet_id = is_numeric($dok_ipmbl_ipmbldet_id) ? $dok_ipmbl_ipmbldet_id : 0;
				
		$ipmbl_dok_updated_by = $this->m_t_ipmbl_dok->__checkSession();
		$ipmbl_dok_updated_date = date('Y-m-d H:i:s');
		
		if($ipmbl_dok_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'dok_ipmbl_penerima'=>$dok_ipmbl_penerima,
				'dok_ipmbl_jabatan'=>$dok_ipmbl_jabatan,
				'dok_ipmbl_tanggal'=>$dok_ipmbl_tanggal,
				'dok_ipmbl_keterangan'=>$dok_ipmbl_keterangan,
				'dok_ipmbl_ipmbl_id'=>$dok_ipmbl_ipmbl_id,
				'dok_ipmbl_ipmbldet_id'=>$dok_ipmbl_ipmbldet_id,
				);
			$result = $this->m_t_ipmbl_dok->__update($data, $dok_ipmbl_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_ipmbl_dok->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$dok_ipmbl_penerima = htmlentities($this->input->post('dok_ipmbl_penerima'),ENT_QUOTES);
		$dok_ipmbl_jabatan = htmlentities($this->input->post('dok_ipmbl_jabatan'),ENT_QUOTES);
		$dok_ipmbl_tanggal = htmlentities($this->input->post('dok_ipmbl_tanggal'),ENT_QUOTES);
		$dok_ipmbl_keterangan = htmlentities($this->input->post('dok_ipmbl_keterangan'),ENT_QUOTES);
		$dok_ipmbl_ipmbl_id = htmlentities($this->input->post('dok_ipmbl_ipmbl_id'),ENT_QUOTES);
		$dok_ipmbl_ipmbl_id = is_numeric($dok_ipmbl_ipmbl_id) ? $dok_ipmbl_ipmbl_id : 0;
		$dok_ipmbl_ipmbldet_id = htmlentities($this->input->post('dok_ipmbl_ipmbldet_id'),ENT_QUOTES);
		$dok_ipmbl_ipmbldet_id = is_numeric($dok_ipmbl_ipmbldet_id) ? $dok_ipmbl_ipmbldet_id : 0;
				
		$params = array(
			'dok_ipmbl_penerima'=>$dok_ipmbl_penerima,
			'dok_ipmbl_jabatan'=>$dok_ipmbl_jabatan,
			'dok_ipmbl_tanggal'=>$dok_ipmbl_tanggal,
			'dok_ipmbl_keterangan'=>$dok_ipmbl_keterangan,
			'dok_ipmbl_ipmbl_id'=>$dok_ipmbl_ipmbl_id,
			'dok_ipmbl_ipmbldet_id'=>$dok_ipmbl_ipmbldet_id,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_ipmbl_dok->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$dok_ipmbl_penerima = htmlentities($this->input->post('dok_ipmbl_penerima'),ENT_QUOTES);
		$dok_ipmbl_jabatan = htmlentities($this->input->post('dok_ipmbl_jabatan'),ENT_QUOTES);
		$dok_ipmbl_tanggal = htmlentities($this->input->post('dok_ipmbl_tanggal'),ENT_QUOTES);
		$dok_ipmbl_keterangan = htmlentities($this->input->post('dok_ipmbl_keterangan'),ENT_QUOTES);
		$dok_ipmbl_ipmbl_id = htmlentities($this->input->post('dok_ipmbl_ipmbl_id'),ENT_QUOTES);
		$dok_ipmbl_ipmbl_id = is_numeric($dok_ipmbl_ipmbl_id) ? $dok_ipmbl_ipmbl_id : 0;
		$dok_ipmbl_ipmbldet_id = htmlentities($this->input->post('dok_ipmbl_ipmbldet_id'),ENT_QUOTES);
		$dok_ipmbl_ipmbldet_id = is_numeric($dok_ipmbl_ipmbldet_id) ? $dok_ipmbl_ipmbldet_id : 0;
				
		$params = array(
			'searchText' => $searchText,
			'dok_ipmbl_penerima'=>$dok_ipmbl_penerima,
			'dok_ipmbl_jabatan'=>$dok_ipmbl_jabatan,
			'dok_ipmbl_tanggal'=>$dok_ipmbl_tanggal,
			'dok_ipmbl_keterangan'=>$dok_ipmbl_keterangan,
			'dok_ipmbl_ipmbl_id'=>$dok_ipmbl_ipmbl_id,
			'dok_ipmbl_ipmbldet_id'=>$dok_ipmbl_ipmbldet_id,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_ipmbl_dok->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_ipmbl_dok.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_ipmbl_dok_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_ipmbl_dok_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}