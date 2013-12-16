<?php
class C_master_ijin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_master_ijin');
	}
	
	function index(){
		$this->load->view('main/v_master_ijin');
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
		$result = $this->m_master_ijin->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_IJIN = htmlentities($this->input->post('ID_IJIN'),ENT_QUOTES);
		$ID_IJIN = is_numeric($ID_IJIN) ? $ID_IJIN : 0;
		$NAMA_IJIN = htmlentities($this->input->post('NAMA_IJIN'),ENT_QUOTES);
		$NAMA_PEJABAT = htmlentities($this->input->post('NAMA_PEJABAT'),ENT_QUOTES);
		$NIP_PEJABAT = htmlentities($this->input->post('NIP_PEJABAT'),ENT_QUOTES);
		$JABATAN = htmlentities($this->input->post('JABATAN'),ENT_QUOTES);
		$PANGKAT = htmlentities($this->input->post('PANGKAT'),ENT_QUOTES);
		$ATASNAMA = htmlentities($this->input->post('ATASNAMA'),ENT_QUOTES);
				
		$ster_ijin_author = $this->m_master_ijin->__checkSession();
		$ster_ijin_created_date = date('Y-m-d H:i:s');
		
		if(!$ster_ijin_author){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IJIN'=>$ID_IJIN,
				'NAMA_IJIN'=>$NAMA_IJIN,
				'NAMA_PEJABAT'=>$NAMA_PEJABAT,
				'NIP_PEJABAT'=>$NIP_PEJABAT,
				'JABATAN'=>$JABATAN,
				'PANGKAT'=>$PANGKAT,
				'ATASNAMA'=>$ATASNAMA,
				);
			$result = $this->m_master_ijin->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_IJIN = htmlentities($this->input->post('ID_IJIN'),ENT_QUOTES);
		$ID_IJIN = is_numeric($ID_IJIN) ? $ID_IJIN : 0;
		$NAMA_IJIN = htmlentities($this->input->post('NAMA_IJIN'),ENT_QUOTES);
		$NAMA_PEJABAT = htmlentities($this->input->post('NAMA_PEJABAT'),ENT_QUOTES);
		$NIP_PEJABAT = htmlentities($this->input->post('NIP_PEJABAT'),ENT_QUOTES);
		$JABATAN = htmlentities($this->input->post('JABATAN'),ENT_QUOTES);
		$PANGKAT = htmlentities($this->input->post('PANGKAT'),ENT_QUOTES);
		$ATASNAMA = htmlentities($this->input->post('ATASNAMA'),ENT_QUOTES);
				
		$ster_ijin_updated_by = $this->m_master_ijin->__checkSession();
		$ster_ijin_updated_date = date('Y-m-d H:i:s');
		
		if(!$ster_ijin_updated_by){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'NAMA_IJIN'=>$NAMA_IJIN,
				'NAMA_PEJABAT'=>$NAMA_PEJABAT,
				'NIP_PEJABAT'=>$NIP_PEJABAT,
				'JABATAN'=>$JABATAN,
				'PANGKAT'=>$PANGKAT,
				'ATASNAMA'=>$ATASNAMA,
				);
			$result = $this->m_master_ijin->__update($data, $ID_IJIN, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_master_ijin->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$NAMA_IJIN = htmlentities($this->input->post('NAMA_IJIN'),ENT_QUOTES);
		$NAMA_PEJABAT = htmlentities($this->input->post('NAMA_PEJABAT'),ENT_QUOTES);
		$NIP_PEJABAT = htmlentities($this->input->post('NIP_PEJABAT'),ENT_QUOTES);
		$JABATAN = htmlentities($this->input->post('JABATAN'),ENT_QUOTES);
		$PANGKAT = htmlentities($this->input->post('PANGKAT'),ENT_QUOTES);
		$ATASNAMA = htmlentities($this->input->post('ATASNAMA'),ENT_QUOTES);
				
		$params = array(
			'NAMA_IJIN'=>$NAMA_IJIN,
			'NAMA_PEJABAT'=>$NAMA_PEJABAT,
			'NIP_PEJABAT'=>$NIP_PEJABAT,
			'JABATAN'=>$JABATAN,
			'PANGKAT'=>$PANGKAT,
			'ATASNAMA'=>$ATASNAMA,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_master_ijin->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$NAMA_IJIN = htmlentities($this->input->post('NAMA_IJIN'),ENT_QUOTES);
		$NAMA_PEJABAT = htmlentities($this->input->post('NAMA_PEJABAT'),ENT_QUOTES);
		$NIP_PEJABAT = htmlentities($this->input->post('NIP_PEJABAT'),ENT_QUOTES);
		$JABATAN = htmlentities($this->input->post('JABATAN'),ENT_QUOTES);
		$PANGKAT = htmlentities($this->input->post('PANGKAT'),ENT_QUOTES);
		$ATASNAMA = htmlentities($this->input->post('ATASNAMA'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'NAMA_IJIN'=>$NAMA_IJIN,
			'NAMA_PEJABAT'=>$NAMA_PEJABAT,
			'NIP_PEJABAT'=>$NIP_PEJABAT,
			'JABATAN'=>$JABATAN,
			'PANGKAT'=>$PANGKAT,
			'ATASNAMA'=>$ATASNAMA,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$data['records'] = $this->m_master_ijin->printExcel($params)[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_master_ijin.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/master_ijin_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/master_ijin_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}