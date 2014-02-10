<?php
class C_acl extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_acl');
	}
	
	function index(){
		$data["content"]	= $this->load->view('main/v_acl',"",true);
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
		$result = $this->m_acl->getList($params);
		echo $result;
	}
	
	function create(){
		$id = htmlentities($this->input->post('id'),ENT_QUOTES);
		$nama = htmlentities($this->input->post('nama'),ENT_QUOTES);
		$link = htmlentities($this->input->post('link'),ENT_QUOTES);
		$defaultusergroup = htmlentities($this->input->post('defaultusergroup'),ENT_QUOTES);
		$status = htmlentities($this->input->post('status'),ENT_QUOTES);
		$order = htmlentities($this->input->post('order'),ENT_QUOTES);
		$level = htmlentities($this->input->post('level'),ENT_QUOTES);
		$parent = htmlentities($this->input->post('parent'),ENT_QUOTES);
		$groupmenu_id = htmlentities($this->input->post('groupmenu_id'),ENT_QUOTES);
		$publik = htmlentities($this->input->post('publik'),ENT_QUOTES);
		$keterangan = htmlentities($this->input->post('keterangan'),ENT_QUOTES);
		$link_baru = htmlentities($this->input->post('link_baru'),ENT_QUOTES);
				
		$l_author = $this->m_acl->__checkSession();
		$l_created_date = date('Y-m-d H:i:s');
		
		if($l_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'id'=>$id,
				'nama'=>$nama,
				'link'=>$link,
				'defaultusergroup'=>$defaultusergroup,
				'status'=>$status,
				'order'=>$order,
				'level'=>$level,
				'parent'=>$parent,
				'groupmenu_id'=>$groupmenu_id,
				'publik'=>$publik,
				'keterangan'=>$keterangan,
				'link_baru'=>$link_baru,
				);
			$result = $this->m_acl->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$id = htmlentities($this->input->post('id'),ENT_QUOTES);
		$nama = htmlentities($this->input->post('nama'),ENT_QUOTES);
		$link = htmlentities($this->input->post('link'),ENT_QUOTES);
		$defaultusergroup = htmlentities($this->input->post('defaultusergroup'),ENT_QUOTES);
		$status = htmlentities($this->input->post('status'),ENT_QUOTES);
		$order = htmlentities($this->input->post('order'),ENT_QUOTES);
		$level = htmlentities($this->input->post('level'),ENT_QUOTES);
		$parent = htmlentities($this->input->post('parent'),ENT_QUOTES);
		$groupmenu_id = htmlentities($this->input->post('groupmenu_id'),ENT_QUOTES);
		$publik = htmlentities($this->input->post('publik'),ENT_QUOTES);
		$keterangan = htmlentities($this->input->post('keterangan'),ENT_QUOTES);
		$link_baru = htmlentities($this->input->post('link_baru'),ENT_QUOTES);
				
		$l_updated_by = $this->m_acl->__checkSession();
		$l_updated_date = date('Y-m-d H:i:s');
		
		if($l_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'nama'=>$nama,
				'link'=>$link,
				'defaultusergroup'=>$defaultusergroup,
				'status'=>$status,
				'order'=>$order,
				'level'=>$level,
				'parent'=>$parent,
				'groupmenu_id'=>$groupmenu_id,
				'publik'=>$publik,
				'keterangan'=>$keterangan,
				'link_baru'=>$link_baru,
				);
			$result = $this->m_acl->__update($data, $id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_acl->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$nama = htmlentities($this->input->post('nama'),ENT_QUOTES);
		$link = htmlentities($this->input->post('link'),ENT_QUOTES);
		$defaultusergroup = htmlentities($this->input->post('defaultusergroup'),ENT_QUOTES);
		$status = htmlentities($this->input->post('status'),ENT_QUOTES);
		$order = htmlentities($this->input->post('order'),ENT_QUOTES);
		$level = htmlentities($this->input->post('level'),ENT_QUOTES);
		$parent = htmlentities($this->input->post('parent'),ENT_QUOTES);
		$groupmenu_id = htmlentities($this->input->post('groupmenu_id'),ENT_QUOTES);
		$publik = htmlentities($this->input->post('publik'),ENT_QUOTES);
		$keterangan = htmlentities($this->input->post('keterangan'),ENT_QUOTES);
		$link_baru = htmlentities($this->input->post('link_baru'),ENT_QUOTES);
				
		$params = array(
			'nama'=>$nama,
			'link'=>$link,
			'defaultusergroup'=>$defaultusergroup,
			'status'=>$status,
			'order'=>$order,
			'level'=>$level,
			'parent'=>$parent,
			'groupmenu_id'=>$groupmenu_id,
			'publik'=>$publik,
			'keterangan'=>$keterangan,
			'link_baru'=>$link_baru,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_acl->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$nama = htmlentities($this->input->post('nama'),ENT_QUOTES);
		$link = htmlentities($this->input->post('link'),ENT_QUOTES);
		$defaultusergroup = htmlentities($this->input->post('defaultusergroup'),ENT_QUOTES);
		$status = htmlentities($this->input->post('status'),ENT_QUOTES);
		$order = htmlentities($this->input->post('order'),ENT_QUOTES);
		$level = htmlentities($this->input->post('level'),ENT_QUOTES);
		$parent = htmlentities($this->input->post('parent'),ENT_QUOTES);
		$groupmenu_id = htmlentities($this->input->post('groupmenu_id'),ENT_QUOTES);
		$publik = htmlentities($this->input->post('publik'),ENT_QUOTES);
		$keterangan = htmlentities($this->input->post('keterangan'),ENT_QUOTES);
		$link_baru = htmlentities($this->input->post('link_baru'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'nama'=>$nama,
			'link'=>$link,
			'defaultusergroup'=>$defaultusergroup,
			'status'=>$status,
			'order'=>$order,
			'level'=>$level,
			'parent'=>$parent,
			'groupmenu_id'=>$groupmenu_id,
			'publik'=>$publik,
			'keterangan'=>$keterangan,
			'link_baru'=>$link_baru,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_acl->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_acl.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/acl_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/acl_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}