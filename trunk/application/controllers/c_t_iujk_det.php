<?php
class C_t_iujk_det extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_iujk_det');
	}
	
	function index(){
		$this->load->view('main/v_t_iujk_det');
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
		$result = $this->m_t_iujk_det->getList($params);
		echo $result;
	}
	
	function create(){
		$det_iujk_id = htmlentities($this->input->post('det_iujk_id'),ENT_QUOTES);
		$det_iujk_id = is_numeric($det_iujk_id) ? $det_iujk_id : 0;
		$det_iujk_iujk_id = htmlentities($this->input->post('det_iujk_iujk_id'),ENT_QUOTES);
		$det_iujk_iujk_id = is_numeric($det_iujk_iujk_id) ? $det_iujk_iujk_id : 0;
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_perusahaan = htmlentities($this->input->post('det_iujk_perusahaan'),ENT_QUOTES);
		$det_iujk_direktur = htmlentities($this->input->post('det_iujk_direktur'),ENT_QUOTES);
		$det_iujk_alamatusaha = htmlentities($this->input->post('det_iujk_alamatusaha'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_tanggalreg = htmlentities($this->input->post('det_iujk_tanggalreg'),ENT_QUOTES);
				
		$iujk_det_author = $this->m_t_iujk_det->__checkSession();
		$iujk_det_created_date = date('Y-m-d H:i:s');
		
		if(!$iujk_det_author){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_iujk_id'=>$det_iujk_id,
				'det_iujk_iujk_id'=>$det_iujk_iujk_id,
				'det_iujk_nama'=>$det_iujk_nama,
				'det_iujk_perusahaan'=>$det_iujk_perusahaan,
				'det_iujk_direktur'=>$det_iujk_direktur,
				'det_iujk_alamatusaha'=>$det_iujk_alamatusaha,
				'det_iujk_nomorreg'=>$det_iujk_nomorreg,
				'det_iujk_tanggalreg'=>$det_iujk_tanggalreg,
				);
			$result = $this->m_t_iujk_det->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$det_iujk_id = htmlentities($this->input->post('det_iujk_id'),ENT_QUOTES);
		$det_iujk_id = is_numeric($det_iujk_id) ? $det_iujk_id : 0;
		$det_iujk_iujk_id = htmlentities($this->input->post('det_iujk_iujk_id'),ENT_QUOTES);
		$det_iujk_iujk_id = is_numeric($det_iujk_iujk_id) ? $det_iujk_iujk_id : 0;
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_perusahaan = htmlentities($this->input->post('det_iujk_perusahaan'),ENT_QUOTES);
		$det_iujk_direktur = htmlentities($this->input->post('det_iujk_direktur'),ENT_QUOTES);
		$det_iujk_alamatusaha = htmlentities($this->input->post('det_iujk_alamatusaha'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_tanggalreg = htmlentities($this->input->post('det_iujk_tanggalreg'),ENT_QUOTES);
				
		$iujk_det_updated_by = $this->m_t_iujk_det->__checkSession();
		$iujk_det_updated_date = date('Y-m-d H:i:s');
		
		if(!$iujk_det_updated_by){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_iujk_iujk_id'=>$det_iujk_iujk_id,
				'det_iujk_nama'=>$det_iujk_nama,
				'det_iujk_perusahaan'=>$det_iujk_perusahaan,
				'det_iujk_direktur'=>$det_iujk_direktur,
				'det_iujk_alamatusaha'=>$det_iujk_alamatusaha,
				'det_iujk_nomorreg'=>$det_iujk_nomorreg,
				'det_iujk_tanggalreg'=>$det_iujk_tanggalreg,
				);
			$result = $this->m_t_iujk_det->__update($data, $det_iujk_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_iujk_det->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$det_iujk_iujk_id = htmlentities($this->input->post('det_iujk_iujk_id'),ENT_QUOTES);
		$det_iujk_iujk_id = is_numeric($det_iujk_iujk_id) ? $det_iujk_iujk_id : 0;
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_perusahaan = htmlentities($this->input->post('det_iujk_perusahaan'),ENT_QUOTES);
		$det_iujk_direktur = htmlentities($this->input->post('det_iujk_direktur'),ENT_QUOTES);
		$det_iujk_alamatusaha = htmlentities($this->input->post('det_iujk_alamatusaha'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_tanggalreg = htmlentities($this->input->post('det_iujk_tanggalreg'),ENT_QUOTES);
				
		$params = array(
			'det_iujk_iujk_id'=>$det_iujk_iujk_id,
			'det_iujk_nama'=>$det_iujk_nama,
			'det_iujk_perusahaan'=>$det_iujk_perusahaan,
			'det_iujk_direktur'=>$det_iujk_direktur,
			'det_iujk_alamatusaha'=>$det_iujk_alamatusaha,
			'det_iujk_nomorreg'=>$det_iujk_nomorreg,
			'det_iujk_tanggalreg'=>$det_iujk_tanggalreg,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_iujk_det->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$det_iujk_iujk_id = htmlentities($this->input->post('det_iujk_iujk_id'),ENT_QUOTES);
		$det_iujk_iujk_id = is_numeric($det_iujk_iujk_id) ? $det_iujk_iujk_id : 0;
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_perusahaan = htmlentities($this->input->post('det_iujk_perusahaan'),ENT_QUOTES);
		$det_iujk_direktur = htmlentities($this->input->post('det_iujk_direktur'),ENT_QUOTES);
		$det_iujk_alamatusaha = htmlentities($this->input->post('det_iujk_alamatusaha'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_tanggalreg = htmlentities($this->input->post('det_iujk_tanggalreg'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'det_iujk_iujk_id'=>$det_iujk_iujk_id,
			'det_iujk_nama'=>$det_iujk_nama,
			'det_iujk_perusahaan'=>$det_iujk_perusahaan,
			'det_iujk_direktur'=>$det_iujk_direktur,
			'det_iujk_alamatusaha'=>$det_iujk_alamatusaha,
			'det_iujk_nomorreg'=>$det_iujk_nomorreg,
			'det_iujk_tanggalreg'=>$det_iujk_tanggalreg,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$data['records'] = $this->m_t_iujk_det->printExcel($params)[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_iujk_det.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_iujk_det_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_iujk_det_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}