<?php
class C_master_user extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_master_user');
	}
	
	function index(){
		
		$data["content"]	= $this->load->view('main/v_master_user',"",true);
		$this->load->view('home',$data);
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
		$result = $this->m_master_user->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$USER = htmlentities($this->input->post('USER'),ENT_QUOTES);
		$PASS = htmlentities($this->input->post('PASS'),ENT_QUOTES);
		$NAMA = htmlentities($this->input->post('NAMA'),ENT_QUOTES);
		$NIP = htmlentities($this->input->post('NIP'),ENT_QUOTES);
		$TELP = htmlentities($this->input->post('TELP'),ENT_QUOTES);
		$EMAIL = htmlentities($this->input->post('EMAIL'),ENT_QUOTES);
		$ID_HAK = htmlentities($this->input->post('ID_HAK'),ENT_QUOTES);
		$ID_HAK = is_numeric($ID_HAK) ? $ID_HAK : 0;
				
		$ster_user_author = $this->m_master_user->__checkSession();
		$ster_user_created_date = date('Y-m-d H:i:s');
		
		if(!$ster_user_author){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_USER'=>$ID_USER,
				'USER'=>$USER,
				'PASS'=>$PASS,
				'NAMA'=>$NAMA,
				'NIP'=>$NIP,
				'TELP'=>$TELP,
				'EMAIL'=>$EMAIL,
				'ID_HAK'=>$ID_HAK,
				);
			$result = $this->m_master_user->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$USER = htmlentities($this->input->post('USER'),ENT_QUOTES);
		$PASS = htmlentities($this->input->post('PASS'),ENT_QUOTES);
		$NAMA = htmlentities($this->input->post('NAMA'),ENT_QUOTES);
		$NIP = htmlentities($this->input->post('NIP'),ENT_QUOTES);
		$TELP = htmlentities($this->input->post('TELP'),ENT_QUOTES);
		$EMAIL = htmlentities($this->input->post('EMAIL'),ENT_QUOTES);
		$ID_HAK = htmlentities($this->input->post('ID_HAK'),ENT_QUOTES);
		$ID_HAK = is_numeric($ID_HAK) ? $ID_HAK : 0;
				
		$ster_user_updated_by = $this->m_master_user->__checkSession();
		$ster_user_updated_date = date('Y-m-d H:i:s');
		
		if(!$ster_user_updated_by){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'USER'=>$USER,
				'PASS'=>$PASS,
				'NAMA'=>$NAMA,
				'NIP'=>$NIP,
				'TELP'=>$TELP,
				'EMAIL'=>$EMAIL,
				'ID_HAK'=>$ID_HAK,
				);
			$result = $this->m_master_user->__update($data, $ID_USER, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_master_user->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$USER = htmlentities($this->input->post('USER'),ENT_QUOTES);
		$PASS = htmlentities($this->input->post('PASS'),ENT_QUOTES);
		$NAMA = htmlentities($this->input->post('NAMA'),ENT_QUOTES);
		$NIP = htmlentities($this->input->post('NIP'),ENT_QUOTES);
		$TELP = htmlentities($this->input->post('TELP'),ENT_QUOTES);
		$EMAIL = htmlentities($this->input->post('EMAIL'),ENT_QUOTES);
		$ID_HAK = htmlentities($this->input->post('ID_HAK'),ENT_QUOTES);
		$ID_HAK = is_numeric($ID_HAK) ? $ID_HAK : 0;
				
		$params = array(
			'USER'=>$USER,
			'PASS'=>$PASS,
			'NAMA'=>$NAMA,
			'NIP'=>$NIP,
			'TELP'=>$TELP,
			'EMAIL'=>$EMAIL,
			'ID_HAK'=>$ID_HAK,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_master_user->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$USER = htmlentities($this->input->post('USER'),ENT_QUOTES);
		$PASS = htmlentities($this->input->post('PASS'),ENT_QUOTES);
		$NAMA = htmlentities($this->input->post('NAMA'),ENT_QUOTES);
		$NIP = htmlentities($this->input->post('NIP'),ENT_QUOTES);
		$TELP = htmlentities($this->input->post('TELP'),ENT_QUOTES);
		$EMAIL = htmlentities($this->input->post('EMAIL'),ENT_QUOTES);
		$ID_HAK = htmlentities($this->input->post('ID_HAK'),ENT_QUOTES);
		$ID_HAK = is_numeric($ID_HAK) ? $ID_HAK : 0;
				
		$params = array(
			'searchText' => $searchText,
			'USER'=>$USER,
			'PASS'=>$PASS,
			'NAMA'=>$NAMA,
			'NIP'=>$NIP,
			'TELP'=>$TELP,
			'EMAIL'=>$EMAIL,
			'ID_HAK'=>$ID_HAK,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		$value	 = $this->m_master_user->printExcel($params);
		$data['records'] = $value[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_master_user.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/master_user_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/master_user_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}