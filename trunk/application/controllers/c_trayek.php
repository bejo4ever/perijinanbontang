<?php
class C_trayek extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_trayek');
	}
	
	function index(){
		$this->load->view('main/v_trayek');
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
		$result = $this->m_trayek->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_TRAYEK = htmlentities($this->input->post('ID_TRAYEK'),ENT_QUOTES);
		$ID_TRAYEK = is_numeric($ID_TRAYEK) ? $ID_TRAYEK : 0;
		$ID_TRAYEK_INTI = htmlentities($this->input->post('ID_TRAYEK_INTI'),ENT_QUOTES);
		$ID_TRAYEK_INTI = is_numeric($ID_TRAYEK_INTI) ? $ID_TRAYEK_INTI : 0;
		$KODE_TRAYEK = htmlentities($this->input->post('KODE_TRAYEK'),ENT_QUOTES);
		$NOMOR_UB = htmlentities($this->input->post('NOMOR_UB'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$ayek_author = $this->m_trayek->__checkSession();
		$ayek_created_date = date('Y-m-d H:i:s');
		
		if($ayek_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_TRAYEK'=>$ID_TRAYEK,
				'ID_TRAYEK_INTI'=>$ID_TRAYEK_INTI,
				'KODE_TRAYEK'=>$KODE_TRAYEK,
				'NOMOR_UB'=>$NOMOR_UB,
				'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
				'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
				'NAMA_PEMOHON'=>$NAMA_PEMOHON,
				'TGL_AKHIR'=>$TGL_AKHIR,
				);
			$result = $this->m_trayek->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_TRAYEK = htmlentities($this->input->post('ID_TRAYEK'),ENT_QUOTES);
		$ID_TRAYEK = is_numeric($ID_TRAYEK) ? $ID_TRAYEK : 0;
		$ID_TRAYEK_INTI = htmlentities($this->input->post('ID_TRAYEK_INTI'),ENT_QUOTES);
		$ID_TRAYEK_INTI = is_numeric($ID_TRAYEK_INTI) ? $ID_TRAYEK_INTI : 0;
		$KODE_TRAYEK = htmlentities($this->input->post('KODE_TRAYEK'),ENT_QUOTES);
		$NOMOR_UB = htmlentities($this->input->post('NOMOR_UB'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$ayek_updated_by = $this->m_trayek->__checkSession();
		$ayek_updated_date = date('Y-m-d H:i:s');
		
		if($ayek_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_TRAYEK_INTI'=>$ID_TRAYEK_INTI,
				'KODE_TRAYEK'=>$KODE_TRAYEK,
				'NOMOR_UB'=>$NOMOR_UB,
				'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
				'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
				'NAMA_PEMOHON'=>$NAMA_PEMOHON,
				'TGL_AKHIR'=>$TGL_AKHIR,
				);
			$result = $this->m_trayek->__update($data, $ID_TRAYEK, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_trayek->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_TRAYEK_INTI = htmlentities($this->input->post('ID_TRAYEK_INTI'),ENT_QUOTES);
		$ID_TRAYEK_INTI = is_numeric($ID_TRAYEK_INTI) ? $ID_TRAYEK_INTI : 0;
		$KODE_TRAYEK = htmlentities($this->input->post('KODE_TRAYEK'),ENT_QUOTES);
		$NOMOR_UB = htmlentities($this->input->post('NOMOR_UB'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$params = array(
			'ID_TRAYEK_INTI'=>$ID_TRAYEK_INTI,
			'KODE_TRAYEK'=>$KODE_TRAYEK,
			'NOMOR_UB'=>$NOMOR_UB,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
			'NAMA_PEMOHON'=>$NAMA_PEMOHON,
			'TGL_AKHIR'=>$TGL_AKHIR,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_trayek->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_TRAYEK_INTI = htmlentities($this->input->post('ID_TRAYEK_INTI'),ENT_QUOTES);
		$ID_TRAYEK_INTI = is_numeric($ID_TRAYEK_INTI) ? $ID_TRAYEK_INTI : 0;
		$KODE_TRAYEK = htmlentities($this->input->post('KODE_TRAYEK'),ENT_QUOTES);
		$NOMOR_UB = htmlentities($this->input->post('NOMOR_UB'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'ID_TRAYEK_INTI'=>$ID_TRAYEK_INTI,
			'KODE_TRAYEK'=>$KODE_TRAYEK,
			'NOMOR_UB'=>$NOMOR_UB,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
			'NAMA_PEMOHON'=>$NAMA_PEMOHON,
			'TGL_AKHIR'=>$TGL_AKHIR,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_trayek->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_trayek.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/trayek_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/trayek_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}