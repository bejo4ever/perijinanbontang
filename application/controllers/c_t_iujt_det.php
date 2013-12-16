<?php
class C_t_iujt_det extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_iujt_det');
	}
	
	function index(){
		$this->load->view('main/v_t_iujt_det');
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
		$result = $this->m_t_iujt_det->getList($params);
		echo $result;
	}
	
	function create(){
		$det_iujt_id = htmlentities($this->input->post('det_iujt_id'),ENT_QUOTES);
		$det_iujt_id = is_numeric($det_iujt_id) ? $det_iujt_id : 0;
		$det_iujt_iujt_id = htmlentities($this->input->post('det_iujt_iujt_id'),ENT_QUOTES);
		$det_iujt_iujt_id = is_numeric($det_iujt_iujt_id) ? $det_iujt_iujt_id : 0;
		$det_iujt_jenis = htmlentities($this->input->post('det_iujt_jenis'),ENT_QUOTES);
		$det_iujt_jenis = is_numeric($det_iujt_jenis) ? $det_iujt_jenis : 0;
		$det_iujt_nama = htmlentities($this->input->post('det_iujt_nama'),ENT_QUOTES);
		$det_iujt_npwp = htmlentities($this->input->post('det_iujt_npwp'),ENT_QUOTES);
		$det_iujt_alamat = htmlentities($this->input->post('det_iujt_alamat'),ENT_QUOTES);
		$det_iujt_sk = htmlentities($this->input->post('det_iujt_sk'),ENT_QUOTES);
		$det_iujt_berlaku = htmlentities($this->input->post('det_iujt_berlaku'),ENT_QUOTES);
		$det_iujt_kadaluarsa = htmlentities($this->input->post('det_iujt_kadaluarsa'),ENT_QUOTES);
		$det_iujt_surveylulus = htmlentities($this->input->post('det_iujt_surveylulus'),ENT_QUOTES);
		$det_iujt_surveylulus = is_numeric($det_iujt_surveylulus) ? $det_iujt_surveylulus : 0;
		$det_iujt_tanggal = htmlentities($this->input->post('det_iujt_tanggal'),ENT_QUOTES);
		$det_iujt_nopermohonan = htmlentities($this->input->post('det_iujt_nopermohonan'),ENT_QUOTES);
		$det_iujt_cekpetugas = htmlentities($this->input->post('det_iujt_cekpetugas'),ENT_QUOTES);
		$det_iujt_cektanggal = htmlentities($this->input->post('det_iujt_cektanggal'),ENT_QUOTES);
		$det_iujt_ceknip = htmlentities($this->input->post('det_iujt_ceknip'),ENT_QUOTES);
		$det_iujt_catatan = htmlentities($this->input->post('det_iujt_catatan'),ENT_QUOTES);
				
		$iujt_det_author = $this->m_t_iujt_det->__checkSession();
		$iujt_det_created_date = date('Y-m-d H:i:s');
		
		if($iujt_det_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_iujt_id'=>$det_iujt_id,
				'det_iujt_iujt_id'=>$det_iujt_iujt_id,
				'det_iujt_jenis'=>$det_iujt_jenis,
				'det_iujt_nama'=>$det_iujt_nama,
				'det_iujt_npwp'=>$det_iujt_npwp,
				'det_iujt_alamat'=>$det_iujt_alamat,
				'det_iujt_sk'=>$det_iujt_sk,
				'det_iujt_berlaku'=>$det_iujt_berlaku,
				'det_iujt_kadaluarsa'=>$det_iujt_kadaluarsa,
				'det_iujt_surveylulus'=>$det_iujt_surveylulus,
				'det_iujt_tanggal'=>$det_iujt_tanggal,
				'det_iujt_nopermohonan'=>$det_iujt_nopermohonan,
				'det_iujt_cekpetugas'=>$det_iujt_cekpetugas,
				'det_iujt_cektanggal'=>$det_iujt_cektanggal,
				'det_iujt_ceknip'=>$det_iujt_ceknip,
				'det_iujt_catatan'=>$det_iujt_catatan,
				);
			$result = $this->m_t_iujt_det->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$det_iujt_id = htmlentities($this->input->post('det_iujt_id'),ENT_QUOTES);
		$det_iujt_id = is_numeric($det_iujt_id) ? $det_iujt_id : 0;
		$det_iujt_iujt_id = htmlentities($this->input->post('det_iujt_iujt_id'),ENT_QUOTES);
		$det_iujt_iujt_id = is_numeric($det_iujt_iujt_id) ? $det_iujt_iujt_id : 0;
		$det_iujt_jenis = htmlentities($this->input->post('det_iujt_jenis'),ENT_QUOTES);
		$det_iujt_jenis = is_numeric($det_iujt_jenis) ? $det_iujt_jenis : 0;
		$det_iujt_nama = htmlentities($this->input->post('det_iujt_nama'),ENT_QUOTES);
		$det_iujt_npwp = htmlentities($this->input->post('det_iujt_npwp'),ENT_QUOTES);
		$det_iujt_alamat = htmlentities($this->input->post('det_iujt_alamat'),ENT_QUOTES);
		$det_iujt_sk = htmlentities($this->input->post('det_iujt_sk'),ENT_QUOTES);
		$det_iujt_berlaku = htmlentities($this->input->post('det_iujt_berlaku'),ENT_QUOTES);
		$det_iujt_kadaluarsa = htmlentities($this->input->post('det_iujt_kadaluarsa'),ENT_QUOTES);
		$det_iujt_surveylulus = htmlentities($this->input->post('det_iujt_surveylulus'),ENT_QUOTES);
		$det_iujt_surveylulus = is_numeric($det_iujt_surveylulus) ? $det_iujt_surveylulus : 0;
		$det_iujt_tanggal = htmlentities($this->input->post('det_iujt_tanggal'),ENT_QUOTES);
		$det_iujt_nopermohonan = htmlentities($this->input->post('det_iujt_nopermohonan'),ENT_QUOTES);
		$det_iujt_cekpetugas = htmlentities($this->input->post('det_iujt_cekpetugas'),ENT_QUOTES);
		$det_iujt_cektanggal = htmlentities($this->input->post('det_iujt_cektanggal'),ENT_QUOTES);
		$det_iujt_ceknip = htmlentities($this->input->post('det_iujt_ceknip'),ENT_QUOTES);
		$det_iujt_catatan = htmlentities($this->input->post('det_iujt_catatan'),ENT_QUOTES);
				
		$iujt_det_updated_by = $this->m_t_iujt_det->__checkSession();
		$iujt_det_updated_date = date('Y-m-d H:i:s');
		
		if($iujt_det_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_iujt_iujt_id'=>$det_iujt_iujt_id,
				'det_iujt_jenis'=>$det_iujt_jenis,
				'det_iujt_nama'=>$det_iujt_nama,
				'det_iujt_npwp'=>$det_iujt_npwp,
				'det_iujt_alamat'=>$det_iujt_alamat,
				'det_iujt_sk'=>$det_iujt_sk,
				'det_iujt_berlaku'=>$det_iujt_berlaku,
				'det_iujt_kadaluarsa'=>$det_iujt_kadaluarsa,
				'det_iujt_surveylulus'=>$det_iujt_surveylulus,
				'det_iujt_tanggal'=>$det_iujt_tanggal,
				'det_iujt_nopermohonan'=>$det_iujt_nopermohonan,
				'det_iujt_cekpetugas'=>$det_iujt_cekpetugas,
				'det_iujt_cektanggal'=>$det_iujt_cektanggal,
				'det_iujt_ceknip'=>$det_iujt_ceknip,
				'det_iujt_catatan'=>$det_iujt_catatan,
				);
			$result = $this->m_t_iujt_det->__update($data, $det_iujt_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_iujt_det->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$det_iujt_iujt_id = htmlentities($this->input->post('det_iujt_iujt_id'),ENT_QUOTES);
		$det_iujt_iujt_id = is_numeric($det_iujt_iujt_id) ? $det_iujt_iujt_id : 0;
		$det_iujt_jenis = htmlentities($this->input->post('det_iujt_jenis'),ENT_QUOTES);
		$det_iujt_jenis = is_numeric($det_iujt_jenis) ? $det_iujt_jenis : 0;
		$det_iujt_nama = htmlentities($this->input->post('det_iujt_nama'),ENT_QUOTES);
		$det_iujt_npwp = htmlentities($this->input->post('det_iujt_npwp'),ENT_QUOTES);
		$det_iujt_alamat = htmlentities($this->input->post('det_iujt_alamat'),ENT_QUOTES);
		$det_iujt_sk = htmlentities($this->input->post('det_iujt_sk'),ENT_QUOTES);
		$det_iujt_berlaku = htmlentities($this->input->post('det_iujt_berlaku'),ENT_QUOTES);
		$det_iujt_kadaluarsa = htmlentities($this->input->post('det_iujt_kadaluarsa'),ENT_QUOTES);
		$det_iujt_surveylulus = htmlentities($this->input->post('det_iujt_surveylulus'),ENT_QUOTES);
		$det_iujt_surveylulus = is_numeric($det_iujt_surveylulus) ? $det_iujt_surveylulus : 0;
		$det_iujt_tanggal = htmlentities($this->input->post('det_iujt_tanggal'),ENT_QUOTES);
		$det_iujt_nopermohonan = htmlentities($this->input->post('det_iujt_nopermohonan'),ENT_QUOTES);
		$det_iujt_cekpetugas = htmlentities($this->input->post('det_iujt_cekpetugas'),ENT_QUOTES);
		$det_iujt_cektanggal = htmlentities($this->input->post('det_iujt_cektanggal'),ENT_QUOTES);
		$det_iujt_ceknip = htmlentities($this->input->post('det_iujt_ceknip'),ENT_QUOTES);
		$det_iujt_catatan = htmlentities($this->input->post('det_iujt_catatan'),ENT_QUOTES);
				
		$params = array(
			'det_iujt_iujt_id'=>$det_iujt_iujt_id,
			'det_iujt_jenis'=>$det_iujt_jenis,
			'det_iujt_nama'=>$det_iujt_nama,
			'det_iujt_npwp'=>$det_iujt_npwp,
			'det_iujt_alamat'=>$det_iujt_alamat,
			'det_iujt_sk'=>$det_iujt_sk,
			'det_iujt_berlaku'=>$det_iujt_berlaku,
			'det_iujt_kadaluarsa'=>$det_iujt_kadaluarsa,
			'det_iujt_surveylulus'=>$det_iujt_surveylulus,
			'det_iujt_tanggal'=>$det_iujt_tanggal,
			'det_iujt_nopermohonan'=>$det_iujt_nopermohonan,
			'det_iujt_cekpetugas'=>$det_iujt_cekpetugas,
			'det_iujt_cektanggal'=>$det_iujt_cektanggal,
			'det_iujt_ceknip'=>$det_iujt_ceknip,
			'det_iujt_catatan'=>$det_iujt_catatan,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_iujt_det->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$det_iujt_iujt_id = htmlentities($this->input->post('det_iujt_iujt_id'),ENT_QUOTES);
		$det_iujt_iujt_id = is_numeric($det_iujt_iujt_id) ? $det_iujt_iujt_id : 0;
		$det_iujt_jenis = htmlentities($this->input->post('det_iujt_jenis'),ENT_QUOTES);
		$det_iujt_jenis = is_numeric($det_iujt_jenis) ? $det_iujt_jenis : 0;
		$det_iujt_nama = htmlentities($this->input->post('det_iujt_nama'),ENT_QUOTES);
		$det_iujt_npwp = htmlentities($this->input->post('det_iujt_npwp'),ENT_QUOTES);
		$det_iujt_alamat = htmlentities($this->input->post('det_iujt_alamat'),ENT_QUOTES);
		$det_iujt_sk = htmlentities($this->input->post('det_iujt_sk'),ENT_QUOTES);
		$det_iujt_berlaku = htmlentities($this->input->post('det_iujt_berlaku'),ENT_QUOTES);
		$det_iujt_kadaluarsa = htmlentities($this->input->post('det_iujt_kadaluarsa'),ENT_QUOTES);
		$det_iujt_surveylulus = htmlentities($this->input->post('det_iujt_surveylulus'),ENT_QUOTES);
		$det_iujt_surveylulus = is_numeric($det_iujt_surveylulus) ? $det_iujt_surveylulus : 0;
		$det_iujt_tanggal = htmlentities($this->input->post('det_iujt_tanggal'),ENT_QUOTES);
		$det_iujt_nopermohonan = htmlentities($this->input->post('det_iujt_nopermohonan'),ENT_QUOTES);
		$det_iujt_cekpetugas = htmlentities($this->input->post('det_iujt_cekpetugas'),ENT_QUOTES);
		$det_iujt_cektanggal = htmlentities($this->input->post('det_iujt_cektanggal'),ENT_QUOTES);
		$det_iujt_ceknip = htmlentities($this->input->post('det_iujt_ceknip'),ENT_QUOTES);
		$det_iujt_catatan = htmlentities($this->input->post('det_iujt_catatan'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'det_iujt_iujt_id'=>$det_iujt_iujt_id,
			'det_iujt_jenis'=>$det_iujt_jenis,
			'det_iujt_nama'=>$det_iujt_nama,
			'det_iujt_npwp'=>$det_iujt_npwp,
			'det_iujt_alamat'=>$det_iujt_alamat,
			'det_iujt_sk'=>$det_iujt_sk,
			'det_iujt_berlaku'=>$det_iujt_berlaku,
			'det_iujt_kadaluarsa'=>$det_iujt_kadaluarsa,
			'det_iujt_surveylulus'=>$det_iujt_surveylulus,
			'det_iujt_tanggal'=>$det_iujt_tanggal,
			'det_iujt_nopermohonan'=>$det_iujt_nopermohonan,
			'det_iujt_cekpetugas'=>$det_iujt_cekpetugas,
			'det_iujt_cektanggal'=>$det_iujt_cektanggal,
			'det_iujt_ceknip'=>$det_iujt_ceknip,
			'det_iujt_catatan'=>$det_iujt_catatan,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_iujt_det->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_iujt_det.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_iujt_det_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_iujt_det_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}