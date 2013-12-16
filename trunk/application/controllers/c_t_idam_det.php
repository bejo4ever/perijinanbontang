<?php
class C_t_idam_det extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_idam_det');
	}
	
	function index(){
		$this->load->view('main/v_t_idam_det');
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
		$result = $this->m_t_idam_det->getList($params);
		echo $result;
	}
	
	function create(){
		$det_idam_id = htmlentities($this->input->post('det_idam_id'),ENT_QUOTES);
		$det_idam_id = is_numeric($det_idam_id) ? $det_idam_id : 0;
		$det_idam_idam_id = htmlentities($this->input->post('det_idam_idam_id'),ENT_QUOTES);
		$det_idam_idam_id = is_numeric($det_idam_idam_id) ? $det_idam_idam_id : 0;
		$det_idam_nama = htmlentities($this->input->post('det_idam_nama'),ENT_QUOTES);
		$det_idam_alamat = htmlentities($this->input->post('det_idam_alamat'),ENT_QUOTES);
		$det_idam_telp = htmlentities($this->input->post('det_idam_telp'),ENT_QUOTES);
		$det_idam_tempatlahir = htmlentities($this->input->post('det_idam_tempatlahir'),ENT_QUOTES);
		$det_idam_tanggallahir = htmlentities($this->input->post('det_idam_tanggallahir'),ENT_QUOTES);
		$det_idam_pendidikan = htmlentities($this->input->post('det_idam_pendidikan'),ENT_QUOTES);
		$det_idam_tahunlulus = htmlentities($this->input->post('det_idam_tahunlulus'),ENT_QUOTES);
		$det_idam_tahunlulus = is_numeric($det_idam_tahunlulus) ? $det_idam_tahunlulus : 0;
				
		$idam_det_author = $this->m_t_idam_det->__checkSession();
		$idam_det_created_date = date('Y-m-d H:i:s');
		
		if(!$idam_det_author){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_idam_id'=>$det_idam_id,
				'det_idam_idam_id'=>$det_idam_idam_id,
				'det_idam_nama'=>$det_idam_nama,
				'det_idam_alamat'=>$det_idam_alamat,
				'det_idam_telp'=>$det_idam_telp,
				'det_idam_tempatlahir'=>$det_idam_tempatlahir,
				'det_idam_tanggallahir'=>$det_idam_tanggallahir,
				'det_idam_pendidikan'=>$det_idam_pendidikan,
				'det_idam_tahunlulus'=>$det_idam_tahunlulus,
				);
			$result = $this->m_t_idam_det->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$det_idam_id = htmlentities($this->input->post('det_idam_id'),ENT_QUOTES);
		$det_idam_id = is_numeric($det_idam_id) ? $det_idam_id : 0;
		$det_idam_idam_id = htmlentities($this->input->post('det_idam_idam_id'),ENT_QUOTES);
		$det_idam_idam_id = is_numeric($det_idam_idam_id) ? $det_idam_idam_id : 0;
		$det_idam_nama = htmlentities($this->input->post('det_idam_nama'),ENT_QUOTES);
		$det_idam_alamat = htmlentities($this->input->post('det_idam_alamat'),ENT_QUOTES);
		$det_idam_telp = htmlentities($this->input->post('det_idam_telp'),ENT_QUOTES);
		$det_idam_tempatlahir = htmlentities($this->input->post('det_idam_tempatlahir'),ENT_QUOTES);
		$det_idam_tanggallahir = htmlentities($this->input->post('det_idam_tanggallahir'),ENT_QUOTES);
		$det_idam_pendidikan = htmlentities($this->input->post('det_idam_pendidikan'),ENT_QUOTES);
		$det_idam_tahunlulus = htmlentities($this->input->post('det_idam_tahunlulus'),ENT_QUOTES);
		$det_idam_tahunlulus = is_numeric($det_idam_tahunlulus) ? $det_idam_tahunlulus : 0;
				
		$idam_det_updated_by = $this->m_t_idam_det->__checkSession();
		$idam_det_updated_date = date('Y-m-d H:i:s');
		
		if(!$idam_det_updated_by){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_idam_idam_id'=>$det_idam_idam_id,
				'det_idam_nama'=>$det_idam_nama,
				'det_idam_alamat'=>$det_idam_alamat,
				'det_idam_telp'=>$det_idam_telp,
				'det_idam_tempatlahir'=>$det_idam_tempatlahir,
				'det_idam_tanggallahir'=>$det_idam_tanggallahir,
				'det_idam_pendidikan'=>$det_idam_pendidikan,
				'det_idam_tahunlulus'=>$det_idam_tahunlulus,
				);
			$result = $this->m_t_idam_det->__update($data, $det_idam_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_idam_det->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$det_idam_idam_id = htmlentities($this->input->post('det_idam_idam_id'),ENT_QUOTES);
		$det_idam_idam_id = is_numeric($det_idam_idam_id) ? $det_idam_idam_id : 0;
		$det_idam_nama = htmlentities($this->input->post('det_idam_nama'),ENT_QUOTES);
		$det_idam_alamat = htmlentities($this->input->post('det_idam_alamat'),ENT_QUOTES);
		$det_idam_telp = htmlentities($this->input->post('det_idam_telp'),ENT_QUOTES);
		$det_idam_tempatlahir = htmlentities($this->input->post('det_idam_tempatlahir'),ENT_QUOTES);
		$det_idam_tanggallahir = htmlentities($this->input->post('det_idam_tanggallahir'),ENT_QUOTES);
		$det_idam_pendidikan = htmlentities($this->input->post('det_idam_pendidikan'),ENT_QUOTES);
		$det_idam_tahunlulus = htmlentities($this->input->post('det_idam_tahunlulus'),ENT_QUOTES);
		$det_idam_tahunlulus = is_numeric($det_idam_tahunlulus) ? $det_idam_tahunlulus : 0;
				
		$params = array(
			'det_idam_idam_id'=>$det_idam_idam_id,
			'det_idam_nama'=>$det_idam_nama,
			'det_idam_alamat'=>$det_idam_alamat,
			'det_idam_telp'=>$det_idam_telp,
			'det_idam_tempatlahir'=>$det_idam_tempatlahir,
			'det_idam_tanggallahir'=>$det_idam_tanggallahir,
			'det_idam_pendidikan'=>$det_idam_pendidikan,
			'det_idam_tahunlulus'=>$det_idam_tahunlulus,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_idam_det->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$det_idam_idam_id = htmlentities($this->input->post('det_idam_idam_id'),ENT_QUOTES);
		$det_idam_idam_id = is_numeric($det_idam_idam_id) ? $det_idam_idam_id : 0;
		$det_idam_nama = htmlentities($this->input->post('det_idam_nama'),ENT_QUOTES);
		$det_idam_alamat = htmlentities($this->input->post('det_idam_alamat'),ENT_QUOTES);
		$det_idam_telp = htmlentities($this->input->post('det_idam_telp'),ENT_QUOTES);
		$det_idam_tempatlahir = htmlentities($this->input->post('det_idam_tempatlahir'),ENT_QUOTES);
		$det_idam_tanggallahir = htmlentities($this->input->post('det_idam_tanggallahir'),ENT_QUOTES);
		$det_idam_pendidikan = htmlentities($this->input->post('det_idam_pendidikan'),ENT_QUOTES);
		$det_idam_tahunlulus = htmlentities($this->input->post('det_idam_tahunlulus'),ENT_QUOTES);
		$det_idam_tahunlulus = is_numeric($det_idam_tahunlulus) ? $det_idam_tahunlulus : 0;
				
		$params = array(
			'searchText' => $searchText,
			'det_idam_idam_id'=>$det_idam_idam_id,
			'det_idam_nama'=>$det_idam_nama,
			'det_idam_alamat'=>$det_idam_alamat,
			'det_idam_telp'=>$det_idam_telp,
			'det_idam_tempatlahir'=>$det_idam_tempatlahir,
			'det_idam_tanggallahir'=>$det_idam_tanggallahir,
			'det_idam_pendidikan'=>$det_idam_pendidikan,
			'det_idam_tahunlulus'=>$det_idam_tahunlulus,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		$record			= $this->m_t_idam_det->printExcel($params);
		$data['records']= $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_idam_det.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_idam_det_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_idam_det_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}