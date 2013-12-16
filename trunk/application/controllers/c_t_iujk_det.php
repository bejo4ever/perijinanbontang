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
		$det_iujk_jenis = htmlentities($this->input->post('det_iujk_jenis'),ENT_QUOTES);
		$det_iujk_jenis = is_numeric($det_iujk_jenis) ? $det_iujk_jenis : 0;
		$det_iujk_tanggal = htmlentities($this->input->post('det_iujk_tanggal'),ENT_QUOTES);
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_rekomnomor = htmlentities($this->input->post('det_iujk_rekomnomor'),ENT_QUOTES);
		$det_iujk_rekomtanggal = htmlentities($this->input->post('det_iujk_rekomtanggal'),ENT_QUOTES);
		$det_iujk_berlaku = htmlentities($this->input->post('det_iujk_berlaku'),ENT_QUOTES);
		$det_iujk_kadaluarsa = htmlentities($this->input->post('det_iujk_kadaluarsa'),ENT_QUOTES);
		$det_iujk_pj1 = htmlentities($this->input->post('det_iujk_pj1'),ENT_QUOTES);
		$det_iujk_pj2 = htmlentities($this->input->post('det_iujk_pj2'),ENT_QUOTES);
		$det_iujk_pj3 = htmlentities($this->input->post('det_iujk_pj3'),ENT_QUOTES);
		$det_iujk_pjteknis = htmlentities($this->input->post('det_iujk_pjteknis'),ENT_QUOTES);
		$det_iujk_pjtbu = htmlentities($this->input->post('det_iujk_pjtbu'),ENT_QUOTES);
		$det_iujk_surveylulus = htmlentities($this->input->post('det_iujk_surveylulus'),ENT_QUOTES);
		$det_iujk_surveylulus = is_numeric($det_iujk_surveylulus) ? $det_iujk_surveylulus : 0;
				
		$iujk_det_author = $this->m_t_iujk_det->__checkSession();
		$iujk_det_created_date = date('Y-m-d H:i:s');
		
		if($iujk_det_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_iujk_id'=>$det_iujk_id,
				'det_iujk_iujk_id'=>$det_iujk_iujk_id,
				'det_iujk_jenis'=>$det_iujk_jenis,
				'det_iujk_tanggal'=>$det_iujk_tanggal,
				'det_iujk_nama'=>$det_iujk_nama,
				'det_iujk_nomorreg'=>$det_iujk_nomorreg,
				'det_iujk_rekomnomor'=>$det_iujk_rekomnomor,
				'det_iujk_rekomtanggal'=>$det_iujk_rekomtanggal,
				'det_iujk_berlaku'=>$det_iujk_berlaku,
				'det_iujk_kadaluarsa'=>$det_iujk_kadaluarsa,
				'det_iujk_pj1'=>$det_iujk_pj1,
				'det_iujk_pj2'=>$det_iujk_pj2,
				'det_iujk_pj3'=>$det_iujk_pj3,
				'det_iujk_pjteknis'=>$det_iujk_pjteknis,
				'det_iujk_pjtbu'=>$det_iujk_pjtbu,
				'det_iujk_surveylulus'=>$det_iujk_surveylulus,
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
		$det_iujk_jenis = htmlentities($this->input->post('det_iujk_jenis'),ENT_QUOTES);
		$det_iujk_jenis = is_numeric($det_iujk_jenis) ? $det_iujk_jenis : 0;
		$det_iujk_tanggal = htmlentities($this->input->post('det_iujk_tanggal'),ENT_QUOTES);
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_rekomnomor = htmlentities($this->input->post('det_iujk_rekomnomor'),ENT_QUOTES);
		$det_iujk_rekomtanggal = htmlentities($this->input->post('det_iujk_rekomtanggal'),ENT_QUOTES);
		$det_iujk_berlaku = htmlentities($this->input->post('det_iujk_berlaku'),ENT_QUOTES);
		$det_iujk_kadaluarsa = htmlentities($this->input->post('det_iujk_kadaluarsa'),ENT_QUOTES);
		$det_iujk_pj1 = htmlentities($this->input->post('det_iujk_pj1'),ENT_QUOTES);
		$det_iujk_pj2 = htmlentities($this->input->post('det_iujk_pj2'),ENT_QUOTES);
		$det_iujk_pj3 = htmlentities($this->input->post('det_iujk_pj3'),ENT_QUOTES);
		$det_iujk_pjteknis = htmlentities($this->input->post('det_iujk_pjteknis'),ENT_QUOTES);
		$det_iujk_pjtbu = htmlentities($this->input->post('det_iujk_pjtbu'),ENT_QUOTES);
		$det_iujk_surveylulus = htmlentities($this->input->post('det_iujk_surveylulus'),ENT_QUOTES);
		$det_iujk_surveylulus = is_numeric($det_iujk_surveylulus) ? $det_iujk_surveylulus : 0;
				
		$iujk_det_updated_by = $this->m_t_iujk_det->__checkSession();
		$iujk_det_updated_date = date('Y-m-d H:i:s');
		
		if($iujk_det_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_iujk_iujk_id'=>$det_iujk_iujk_id,
				'det_iujk_jenis'=>$det_iujk_jenis,
				'det_iujk_tanggal'=>$det_iujk_tanggal,
				'det_iujk_nama'=>$det_iujk_nama,
				'det_iujk_nomorreg'=>$det_iujk_nomorreg,
				'det_iujk_rekomnomor'=>$det_iujk_rekomnomor,
				'det_iujk_rekomtanggal'=>$det_iujk_rekomtanggal,
				'det_iujk_berlaku'=>$det_iujk_berlaku,
				'det_iujk_kadaluarsa'=>$det_iujk_kadaluarsa,
				'det_iujk_pj1'=>$det_iujk_pj1,
				'det_iujk_pj2'=>$det_iujk_pj2,
				'det_iujk_pj3'=>$det_iujk_pj3,
				'det_iujk_pjteknis'=>$det_iujk_pjteknis,
				'det_iujk_pjtbu'=>$det_iujk_pjtbu,
				'det_iujk_surveylulus'=>$det_iujk_surveylulus,
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
		$det_iujk_jenis = htmlentities($this->input->post('det_iujk_jenis'),ENT_QUOTES);
		$det_iujk_jenis = is_numeric($det_iujk_jenis) ? $det_iujk_jenis : 0;
		$det_iujk_tanggal = htmlentities($this->input->post('det_iujk_tanggal'),ENT_QUOTES);
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_rekomnomor = htmlentities($this->input->post('det_iujk_rekomnomor'),ENT_QUOTES);
		$det_iujk_rekomtanggal = htmlentities($this->input->post('det_iujk_rekomtanggal'),ENT_QUOTES);
		$det_iujk_berlaku = htmlentities($this->input->post('det_iujk_berlaku'),ENT_QUOTES);
		$det_iujk_kadaluarsa = htmlentities($this->input->post('det_iujk_kadaluarsa'),ENT_QUOTES);
		$det_iujk_pj1 = htmlentities($this->input->post('det_iujk_pj1'),ENT_QUOTES);
		$det_iujk_pj2 = htmlentities($this->input->post('det_iujk_pj2'),ENT_QUOTES);
		$det_iujk_pj3 = htmlentities($this->input->post('det_iujk_pj3'),ENT_QUOTES);
		$det_iujk_pjteknis = htmlentities($this->input->post('det_iujk_pjteknis'),ENT_QUOTES);
		$det_iujk_pjtbu = htmlentities($this->input->post('det_iujk_pjtbu'),ENT_QUOTES);
		$det_iujk_surveylulus = htmlentities($this->input->post('det_iujk_surveylulus'),ENT_QUOTES);
		$det_iujk_surveylulus = is_numeric($det_iujk_surveylulus) ? $det_iujk_surveylulus : 0;
				
		$params = array(
			'det_iujk_iujk_id'=>$det_iujk_iujk_id,
			'det_iujk_jenis'=>$det_iujk_jenis,
			'det_iujk_tanggal'=>$det_iujk_tanggal,
			'det_iujk_nama'=>$det_iujk_nama,
			'det_iujk_nomorreg'=>$det_iujk_nomorreg,
			'det_iujk_rekomnomor'=>$det_iujk_rekomnomor,
			'det_iujk_rekomtanggal'=>$det_iujk_rekomtanggal,
			'det_iujk_berlaku'=>$det_iujk_berlaku,
			'det_iujk_kadaluarsa'=>$det_iujk_kadaluarsa,
			'det_iujk_pj1'=>$det_iujk_pj1,
			'det_iujk_pj2'=>$det_iujk_pj2,
			'det_iujk_pj3'=>$det_iujk_pj3,
			'det_iujk_pjteknis'=>$det_iujk_pjteknis,
			'det_iujk_pjtbu'=>$det_iujk_pjtbu,
			'det_iujk_surveylulus'=>$det_iujk_surveylulus,
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
		$det_iujk_jenis = htmlentities($this->input->post('det_iujk_jenis'),ENT_QUOTES);
		$det_iujk_jenis = is_numeric($det_iujk_jenis) ? $det_iujk_jenis : 0;
		$det_iujk_tanggal = htmlentities($this->input->post('det_iujk_tanggal'),ENT_QUOTES);
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_rekomnomor = htmlentities($this->input->post('det_iujk_rekomnomor'),ENT_QUOTES);
		$det_iujk_rekomtanggal = htmlentities($this->input->post('det_iujk_rekomtanggal'),ENT_QUOTES);
		$det_iujk_berlaku = htmlentities($this->input->post('det_iujk_berlaku'),ENT_QUOTES);
		$det_iujk_kadaluarsa = htmlentities($this->input->post('det_iujk_kadaluarsa'),ENT_QUOTES);
		$det_iujk_pj1 = htmlentities($this->input->post('det_iujk_pj1'),ENT_QUOTES);
		$det_iujk_pj2 = htmlentities($this->input->post('det_iujk_pj2'),ENT_QUOTES);
		$det_iujk_pj3 = htmlentities($this->input->post('det_iujk_pj3'),ENT_QUOTES);
		$det_iujk_pjteknis = htmlentities($this->input->post('det_iujk_pjteknis'),ENT_QUOTES);
		$det_iujk_pjtbu = htmlentities($this->input->post('det_iujk_pjtbu'),ENT_QUOTES);
		$det_iujk_surveylulus = htmlentities($this->input->post('det_iujk_surveylulus'),ENT_QUOTES);
		$det_iujk_surveylulus = is_numeric($det_iujk_surveylulus) ? $det_iujk_surveylulus : 0;
				
		$params = array(
			'searchText' => $searchText,
			'det_iujk_iujk_id'=>$det_iujk_iujk_id,
			'det_iujk_jenis'=>$det_iujk_jenis,
			'det_iujk_tanggal'=>$det_iujk_tanggal,
			'det_iujk_nama'=>$det_iujk_nama,
			'det_iujk_nomorreg'=>$det_iujk_nomorreg,
			'det_iujk_rekomnomor'=>$det_iujk_rekomnomor,
			'det_iujk_rekomtanggal'=>$det_iujk_rekomtanggal,
			'det_iujk_berlaku'=>$det_iujk_berlaku,
			'det_iujk_kadaluarsa'=>$det_iujk_kadaluarsa,
			'det_iujk_pj1'=>$det_iujk_pj1,
			'det_iujk_pj2'=>$det_iujk_pj2,
			'det_iujk_pj3'=>$det_iujk_pj3,
			'det_iujk_pjteknis'=>$det_iujk_pjteknis,
			'det_iujk_pjtbu'=>$det_iujk_pjtbu,
			'det_iujk_surveylulus'=>$det_iujk_surveylulus,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_iujk_det->printExcel($params);
		$data['records'] = $record[1];
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