<?php
class C_groupmenu extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_groupmenu');
	}
	
	function index(){
		$data["content"]	= $this->load->view('main/v_groupmenu',"",true);
		$this->load->view("home",$data);
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
		$result = $this->m_groupmenu->getList($params);
		echo $result;
	}
	
	function create(){
		$id = htmlentities($this->input->post('id'),ENT_QUOTES);
		$menu = htmlentities($this->input->post('menu'),ENT_QUOTES);
		$icon = htmlentities($this->input->post('icon'),ENT_QUOTES);
		$order = htmlentities($this->input->post('order'),ENT_QUOTES);
		$link = htmlentities($this->input->post('link'),ENT_QUOTES);
		$publik = htmlentities($this->input->post('publik'),ENT_QUOTES);
				
		$oupmenu_author = $this->m_groupmenu->__checkSession();
		$oupmenu_created_date = date('Y-m-d H:i:s');
		
		if($oupmenu_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'id'=>$id,
				'menu'=>$menu,
				'icon'=>$icon,
				'order'=>$order,
				'link'=>$link,
				'publik'=>$publik,
				);
			$result = $this->m_groupmenu->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$id = htmlentities($this->input->post('id'),ENT_QUOTES);
		$menu = htmlentities($this->input->post('menu'),ENT_QUOTES);
		$icon = htmlentities($this->input->post('icon'),ENT_QUOTES);
		$order = htmlentities($this->input->post('order'),ENT_QUOTES);
		$link = htmlentities($this->input->post('link'),ENT_QUOTES);
		$publik = htmlentities($this->input->post('publik'),ENT_QUOTES);
				
		$oupmenu_updated_by = $this->m_groupmenu->__checkSession();
		$oupmenu_updated_date = date('Y-m-d H:i:s');
		
		if($oupmenu_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'menu'=>$menu,
				'icon'=>$icon,
				'order'=>$order,
				'link'=>$link,
				'publik'=>$publik,
				);
			$result = $this->m_groupmenu->__update($data, $id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_groupmenu->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$menu = htmlentities($this->input->post('menu'),ENT_QUOTES);
		$icon = htmlentities($this->input->post('icon'),ENT_QUOTES);
		$order = htmlentities($this->input->post('order'),ENT_QUOTES);
		$link = htmlentities($this->input->post('link'),ENT_QUOTES);
		$publik = htmlentities($this->input->post('publik'),ENT_QUOTES);
				
		$params = array(
			'menu'=>$menu,
			'icon'=>$icon,
			'order'=>$order,
			'link'=>$link,
			'publik'=>$publik,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_groupmenu->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$menu = htmlentities($this->input->post('menu'),ENT_QUOTES);
		$icon = htmlentities($this->input->post('icon'),ENT_QUOTES);
		$order = htmlentities($this->input->post('order'),ENT_QUOTES);
		$link = htmlentities($this->input->post('link'),ENT_QUOTES);
		$publik = htmlentities($this->input->post('publik'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'menu'=>$menu,
			'icon'=>$icon,
			'order'=>$order,
			'link'=>$link,
			'publik'=>$publik,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_groupmenu->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_groupmenu.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/groupmenu_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/groupmenu_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}