<?php
class C_useracl extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_useracl');
	}
	
	function index($id=FALSE){
		$data["id"]			= $id;
		$data["content"]	= $this->load->view('main/v_useracl',$data,true);
		$this->load->view('home',$data);
	}
	
	function switchAction(){
		$action = $this->input->post('action');
		$id = $this->input->post('id');
		switch($action){
			case 'GETLIST':
				$this->getList($id);
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
	
	function getList($id=FALSE){
		$searchText = $this->input->post('query');
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$params = array(
			'id'=>$id,
			'searchText' => $searchText,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		$result = $this->m_useracl->getList($params);
		echo $result;
	}
	
	function create($idacl=FALSE){
		// $id = htmlentities($this->input->post('id'),ENT_QUOTES);
		// $id = is_numeric($id) ? $id : 0;
		$user_id = htmlentities($this->input->post('user_id'),ENT_QUOTES);
		$user_id = is_numeric($user_id) ? $user_id : 0;
		$acl_id = htmlentities($this->input->post('acl_id'),ENT_QUOTES);
				
		$eracl_author = $this->m_useracl->__checkSession();
		$eracl_created_date = date('Y-m-d H:i:s');
		
		if($eracl_author == ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				// 'id'=>$id,
				'user_id'=>$user_id,
				'acl_id'=>$acl_id,
				);
			$result = $this->m_useracl->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$id = htmlentities($this->input->post('id'),ENT_QUOTES);
		$id = is_numeric($id) ? $id : 0;
		$user_id = htmlentities($this->input->post('user_id'),ENT_QUOTES);
		$user_id = is_numeric($user_id) ? $user_id : 0;
		$acl_id = htmlentities($this->input->post('acl_id'),ENT_QUOTES);
				
		$eracl_updated_by = $this->m_useracl->__checkSession();
		$eracl_updated_date = date('Y-m-d H:i:s');
		
		if($eracl_updated_by == ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'user_id'=>$user_id,
				'acl_id'=>$acl_id,
				);
			$result = $this->m_useracl->__update($data, $id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_useracl->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$user_id = htmlentities($this->input->post('user_id'),ENT_QUOTES);
		$user_id = is_numeric($user_id) ? $user_id : 0;
		$acl_id = htmlentities($this->input->post('acl_id'),ENT_QUOTES);
				
		$params = array(
			'user_id'=>$user_id,
			'acl_id'=>$acl_id,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_useracl->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$user_id = htmlentities($this->input->post('user_id'),ENT_QUOTES);
		$user_id = is_numeric($user_id) ? $user_id : 0;
		$acl_id = htmlentities($this->input->post('acl_id'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'user_id'=>$user_id,
			'acl_id'=>$acl_id,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_useracl->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_useracl.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/useracl_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/useracl_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}