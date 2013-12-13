<?php
class C_t_ipmbl_det extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_ipmbl_det');
	}
	
	function index(){
		$this->load->view('main/v_t_ipmbl_det');
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
		$result = $this->m_t_ipmbl_det->getList($params);
		echo $result;
	}
	
	function create(){
		$det_ipmbl_id = htmlentities($this->input->post('det_ipmbl_id'),ENT_QUOTES);
		$det_ipmbl_id = is_numeric($det_ipmbl_id) ? $det_ipmbl_id : 0;
		$det_ipmbl_ipmbl_id = htmlentities($this->input->post('det_ipmbl_ipmbl_id'),ENT_QUOTES);
		$det_ipmbl_ipmbl_id = is_numeric($det_ipmbl_ipmbl_id) ? $det_ipmbl_ipmbl_id : 0;
		$det_ipmbl_nama = htmlentities($this->input->post('det_ipmbl_nama'),ENT_QUOTES);
		$det_ipmbl_alamat = htmlentities($this->input->post('det_ipmbl_alamat'),ENT_QUOTES);
		$det_ipmbl_kelurahan = htmlentities($this->input->post('det_ipmbl_kelurahan'),ENT_QUOTES);
		$det_ipmbl_kelurahan = is_numeric($det_ipmbl_kelurahan) ? $det_ipmbl_kelurahan : 0;
		$det_ipmbl_kecamatan = htmlentities($this->input->post('det_ipmbl_kecamatan'),ENT_QUOTES);
		$det_ipmbl_kecamatan = is_numeric($det_ipmbl_kecamatan) ? $det_ipmbl_kecamatan : 0;
		$det_ipmbl_kota = htmlentities($this->input->post('det_ipmbl_kota'),ENT_QUOTES);
		$det_ipmbl_kota = is_numeric($det_ipmbl_kota) ? $det_ipmbl_kota : 0;
		$det_ipmbl_telp = htmlentities($this->input->post('det_ipmbl_telp'),ENT_QUOTES);
		$det_ipmbl_namausaha = htmlentities($this->input->post('det_ipmbl_namausaha'),ENT_QUOTES);
		$det_ipmbl_alamatusaha = htmlentities($this->input->post('det_ipmbl_alamatusaha'),ENT_QUOTES);
		$det_ipmbl_namapimpinan = htmlentities($this->input->post('det_ipmbl_namapimpinan'),ENT_QUOTES);
				
		$ipmbl_det_author = $this->m_t_ipmbl_det->__checkSession();
		$ipmbl_det_created_date = date('Y-m-d H:i:s');
		
		if(!$ipmbl_det_author){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_ipmbl_id'=>$det_ipmbl_id,
				'det_ipmbl_ipmbl_id'=>$det_ipmbl_ipmbl_id,
				'det_ipmbl_nama'=>$det_ipmbl_nama,
				'det_ipmbl_alamat'=>$det_ipmbl_alamat,
				'det_ipmbl_kelurahan'=>$det_ipmbl_kelurahan,
				'det_ipmbl_kecamatan'=>$det_ipmbl_kecamatan,
				'det_ipmbl_kota'=>$det_ipmbl_kota,
				'det_ipmbl_telp'=>$det_ipmbl_telp,
				'det_ipmbl_namausaha'=>$det_ipmbl_namausaha,
				'det_ipmbl_alamatusaha'=>$det_ipmbl_alamatusaha,
				'det_ipmbl_namapimpinan'=>$det_ipmbl_namapimpinan,
				);
			$result = $this->m_t_ipmbl_det->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$det_ipmbl_id = htmlentities($this->input->post('det_ipmbl_id'),ENT_QUOTES);
		$det_ipmbl_id = is_numeric($det_ipmbl_id) ? $det_ipmbl_id : 0;
		$det_ipmbl_ipmbl_id = htmlentities($this->input->post('det_ipmbl_ipmbl_id'),ENT_QUOTES);
		$det_ipmbl_ipmbl_id = is_numeric($det_ipmbl_ipmbl_id) ? $det_ipmbl_ipmbl_id : 0;
		$det_ipmbl_nama = htmlentities($this->input->post('det_ipmbl_nama'),ENT_QUOTES);
		$det_ipmbl_alamat = htmlentities($this->input->post('det_ipmbl_alamat'),ENT_QUOTES);
		$det_ipmbl_kelurahan = htmlentities($this->input->post('det_ipmbl_kelurahan'),ENT_QUOTES);
		$det_ipmbl_kelurahan = is_numeric($det_ipmbl_kelurahan) ? $det_ipmbl_kelurahan : 0;
		$det_ipmbl_kecamatan = htmlentities($this->input->post('det_ipmbl_kecamatan'),ENT_QUOTES);
		$det_ipmbl_kecamatan = is_numeric($det_ipmbl_kecamatan) ? $det_ipmbl_kecamatan : 0;
		$det_ipmbl_kota = htmlentities($this->input->post('det_ipmbl_kota'),ENT_QUOTES);
		$det_ipmbl_kota = is_numeric($det_ipmbl_kota) ? $det_ipmbl_kota : 0;
		$det_ipmbl_telp = htmlentities($this->input->post('det_ipmbl_telp'),ENT_QUOTES);
		$det_ipmbl_namausaha = htmlentities($this->input->post('det_ipmbl_namausaha'),ENT_QUOTES);
		$det_ipmbl_alamatusaha = htmlentities($this->input->post('det_ipmbl_alamatusaha'),ENT_QUOTES);
		$det_ipmbl_namapimpinan = htmlentities($this->input->post('det_ipmbl_namapimpinan'),ENT_QUOTES);
				
		$ipmbl_det_updated_by = $this->m_t_ipmbl_det->__checkSession();
		$ipmbl_det_updated_date = date('Y-m-d H:i:s');
		
		if(!$ipmbl_det_updated_by){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_ipmbl_ipmbl_id'=>$det_ipmbl_ipmbl_id,
				'det_ipmbl_nama'=>$det_ipmbl_nama,
				'det_ipmbl_alamat'=>$det_ipmbl_alamat,
				'det_ipmbl_kelurahan'=>$det_ipmbl_kelurahan,
				'det_ipmbl_kecamatan'=>$det_ipmbl_kecamatan,
				'det_ipmbl_kota'=>$det_ipmbl_kota,
				'det_ipmbl_telp'=>$det_ipmbl_telp,
				'det_ipmbl_namausaha'=>$det_ipmbl_namausaha,
				'det_ipmbl_alamatusaha'=>$det_ipmbl_alamatusaha,
				'det_ipmbl_namapimpinan'=>$det_ipmbl_namapimpinan,
				);
			$result = $this->m_t_ipmbl_det->__update($data, $det_ipmbl_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_ipmbl_det->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$det_ipmbl_ipmbl_id = htmlentities($this->input->post('det_ipmbl_ipmbl_id'),ENT_QUOTES);
		$det_ipmbl_ipmbl_id = is_numeric($det_ipmbl_ipmbl_id) ? $det_ipmbl_ipmbl_id : 0;
		$det_ipmbl_nama = htmlentities($this->input->post('det_ipmbl_nama'),ENT_QUOTES);
		$det_ipmbl_alamat = htmlentities($this->input->post('det_ipmbl_alamat'),ENT_QUOTES);
		$det_ipmbl_kelurahan = htmlentities($this->input->post('det_ipmbl_kelurahan'),ENT_QUOTES);
		$det_ipmbl_kelurahan = is_numeric($det_ipmbl_kelurahan) ? $det_ipmbl_kelurahan : 0;
		$det_ipmbl_kecamatan = htmlentities($this->input->post('det_ipmbl_kecamatan'),ENT_QUOTES);
		$det_ipmbl_kecamatan = is_numeric($det_ipmbl_kecamatan) ? $det_ipmbl_kecamatan : 0;
		$det_ipmbl_kota = htmlentities($this->input->post('det_ipmbl_kota'),ENT_QUOTES);
		$det_ipmbl_kota = is_numeric($det_ipmbl_kota) ? $det_ipmbl_kota : 0;
		$det_ipmbl_telp = htmlentities($this->input->post('det_ipmbl_telp'),ENT_QUOTES);
		$det_ipmbl_namausaha = htmlentities($this->input->post('det_ipmbl_namausaha'),ENT_QUOTES);
		$det_ipmbl_alamatusaha = htmlentities($this->input->post('det_ipmbl_alamatusaha'),ENT_QUOTES);
		$det_ipmbl_namapimpinan = htmlentities($this->input->post('det_ipmbl_namapimpinan'),ENT_QUOTES);
				
		$params = array(
			'det_ipmbl_ipmbl_id'=>$det_ipmbl_ipmbl_id,
			'det_ipmbl_nama'=>$det_ipmbl_nama,
			'det_ipmbl_alamat'=>$det_ipmbl_alamat,
			'det_ipmbl_kelurahan'=>$det_ipmbl_kelurahan,
			'det_ipmbl_kecamatan'=>$det_ipmbl_kecamatan,
			'det_ipmbl_kota'=>$det_ipmbl_kota,
			'det_ipmbl_telp'=>$det_ipmbl_telp,
			'det_ipmbl_namausaha'=>$det_ipmbl_namausaha,
			'det_ipmbl_alamatusaha'=>$det_ipmbl_alamatusaha,
			'det_ipmbl_namapimpinan'=>$det_ipmbl_namapimpinan,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_ipmbl_det->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$det_ipmbl_ipmbl_id = htmlentities($this->input->post('det_ipmbl_ipmbl_id'),ENT_QUOTES);
		$det_ipmbl_ipmbl_id = is_numeric($det_ipmbl_ipmbl_id) ? $det_ipmbl_ipmbl_id : 0;
		$det_ipmbl_nama = htmlentities($this->input->post('det_ipmbl_nama'),ENT_QUOTES);
		$det_ipmbl_alamat = htmlentities($this->input->post('det_ipmbl_alamat'),ENT_QUOTES);
		$det_ipmbl_kelurahan = htmlentities($this->input->post('det_ipmbl_kelurahan'),ENT_QUOTES);
		$det_ipmbl_kelurahan = is_numeric($det_ipmbl_kelurahan) ? $det_ipmbl_kelurahan : 0;
		$det_ipmbl_kecamatan = htmlentities($this->input->post('det_ipmbl_kecamatan'),ENT_QUOTES);
		$det_ipmbl_kecamatan = is_numeric($det_ipmbl_kecamatan) ? $det_ipmbl_kecamatan : 0;
		$det_ipmbl_kota = htmlentities($this->input->post('det_ipmbl_kota'),ENT_QUOTES);
		$det_ipmbl_kota = is_numeric($det_ipmbl_kota) ? $det_ipmbl_kota : 0;
		$det_ipmbl_telp = htmlentities($this->input->post('det_ipmbl_telp'),ENT_QUOTES);
		$det_ipmbl_namausaha = htmlentities($this->input->post('det_ipmbl_namausaha'),ENT_QUOTES);
		$det_ipmbl_alamatusaha = htmlentities($this->input->post('det_ipmbl_alamatusaha'),ENT_QUOTES);
		$det_ipmbl_namapimpinan = htmlentities($this->input->post('det_ipmbl_namapimpinan'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'det_ipmbl_ipmbl_id'=>$det_ipmbl_ipmbl_id,
			'det_ipmbl_nama'=>$det_ipmbl_nama,
			'det_ipmbl_alamat'=>$det_ipmbl_alamat,
			'det_ipmbl_kelurahan'=>$det_ipmbl_kelurahan,
			'det_ipmbl_kecamatan'=>$det_ipmbl_kecamatan,
			'det_ipmbl_kota'=>$det_ipmbl_kota,
			'det_ipmbl_telp'=>$det_ipmbl_telp,
			'det_ipmbl_namausaha'=>$det_ipmbl_namausaha,
			'det_ipmbl_alamatusaha'=>$det_ipmbl_alamatusaha,
			'det_ipmbl_namapimpinan'=>$det_ipmbl_namapimpinan,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$data['records'] = $this->m_t_ipmbl_det->printExcel($params)[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_ipmbl_det.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_ipmbl_det_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_ipmbl_det_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}