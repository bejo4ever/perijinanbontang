<?php
class C_t_sipd extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_sipd');
	}
	
	function index(){
		$this->load->view('main/v_t_sipd');
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
		$result = $this->m_t_sipd->getList($params);
		echo $result;
	}
	
	function create(){
		$sipd_id = htmlentities($this->input->post('sipd_id'),ENT_QUOTES);
		$sipd_id = is_numeric($sipd_id) ? $sipd_id : 0;
		$sipd_nama = htmlentities($this->input->post('sipd_nama'),ENT_QUOTES);
		$sipd_alamat = htmlentities($this->input->post('sipd_alamat'),ENT_QUOTES);
		$sipd_telp = htmlentities($this->input->post('sipd_telp'),ENT_QUOTES);
		$sipd_urutan = htmlentities($this->input->post('sipd_urutan'),ENT_QUOTES);
		$sipd_urutan = is_numeric($sipd_urutan) ? $sipd_urutan : 0;
		$sipd_jenisdokter = htmlentities($this->input->post('sipd_jenisdokter'),ENT_QUOTES);
				
		$sipd_author = $this->m_t_sipd->__checkSession();
		$sipd_created_date = date('Y-m-d H:i:s');
		
		if($sipd_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'sipd_id'=>$sipd_id,
				'sipd_nama'=>$sipd_nama,
				'sipd_alamat'=>$sipd_alamat,
				'sipd_telp'=>$sipd_telp,
				'sipd_urutan'=>$sipd_urutan,
				'sipd_jenisdokter'=>$sipd_jenisdokter,
				);
			$result = $this->m_t_sipd->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$sipd_id = htmlentities($this->input->post('sipd_id'),ENT_QUOTES);
		$sipd_id = is_numeric($sipd_id) ? $sipd_id : 0;
		$sipd_nama = htmlentities($this->input->post('sipd_nama'),ENT_QUOTES);
		$sipd_alamat = htmlentities($this->input->post('sipd_alamat'),ENT_QUOTES);
		$sipd_telp = htmlentities($this->input->post('sipd_telp'),ENT_QUOTES);
		$sipd_urutan = htmlentities($this->input->post('sipd_urutan'),ENT_QUOTES);
		$sipd_urutan = is_numeric($sipd_urutan) ? $sipd_urutan : 0;
		$sipd_jenisdokter = htmlentities($this->input->post('sipd_jenisdokter'),ENT_QUOTES);
				
		$sipd_updated_by = $this->m_t_sipd->__checkSession();
		$sipd_updated_date = date('Y-m-d H:i:s');
		
		if($sipd_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'sipd_nama'=>$sipd_nama,
				'sipd_alamat'=>$sipd_alamat,
				'sipd_telp'=>$sipd_telp,
				'sipd_urutan'=>$sipd_urutan,
				'sipd_jenisdokter'=>$sipd_jenisdokter,
				);
			$result = $this->m_t_sipd->__update($data, $sipd_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_sipd->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$sipd_nama = htmlentities($this->input->post('sipd_nama'),ENT_QUOTES);
		$sipd_alamat = htmlentities($this->input->post('sipd_alamat'),ENT_QUOTES);
		$sipd_telp = htmlentities($this->input->post('sipd_telp'),ENT_QUOTES);
		$sipd_urutan = htmlentities($this->input->post('sipd_urutan'),ENT_QUOTES);
		$sipd_urutan = is_numeric($sipd_urutan) ? $sipd_urutan : 0;
		$sipd_jenisdokter = htmlentities($this->input->post('sipd_jenisdokter'),ENT_QUOTES);
				
		$params = array(
			'sipd_nama'=>$sipd_nama,
			'sipd_alamat'=>$sipd_alamat,
			'sipd_telp'=>$sipd_telp,
			'sipd_urutan'=>$sipd_urutan,
			'sipd_jenisdokter'=>$sipd_jenisdokter,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_sipd->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$sipd_nama = htmlentities($this->input->post('sipd_nama'),ENT_QUOTES);
		$sipd_alamat = htmlentities($this->input->post('sipd_alamat'),ENT_QUOTES);
		$sipd_telp = htmlentities($this->input->post('sipd_telp'),ENT_QUOTES);
		$sipd_urutan = htmlentities($this->input->post('sipd_urutan'),ENT_QUOTES);
		$sipd_urutan = is_numeric($sipd_urutan) ? $sipd_urutan : 0;
		$sipd_jenisdokter = htmlentities($this->input->post('sipd_jenisdokter'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'sipd_nama'=>$sipd_nama,
			'sipd_alamat'=>$sipd_alamat,
			'sipd_telp'=>$sipd_telp,
			'sipd_urutan'=>$sipd_urutan,
			'sipd_jenisdokter'=>$sipd_jenisdokter,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_sipd->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_sipd.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_sipd_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_sipd_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}