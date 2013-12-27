<?php
class C_ijin_lingkungan extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_ijin_lingkungan');
	}
	
	function index(){
		$this->load->view('main/v_ijin_lingkungan');
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
		$result = $this->m_ijin_lingkungan->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_IJIN_LINGUKANGAN = htmlentities($this->input->post('ID_IJIN_LINGUKANGAN'),ENT_QUOTES);
		$ID_IJIN_LINGUKANGAN = is_numeric($ID_IJIN_LINGUKANGAN) ? $ID_IJIN_LINGUKANGAN : 0;
		$ID_IJIN_LINGKUNGAN_INTI = htmlentities($this->input->post('ID_IJIN_LINGKUNGAN_INTI'),ENT_QUOTES);
		$ID_IJIN_LINGKUNGAN_INTI = is_numeric($ID_IJIN_LINGKUNGAN_INTI) ? $ID_IJIN_LINGKUNGAN_INTI : 0;
		$NO_REG = htmlentities($this->input->post('NO_REG'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NAMA_DIREKTUR = htmlentities($this->input->post('NAMA_DIREKTUR'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AWAL = htmlentities($this->input->post('TGL_AWAL'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$in_lingkungan_author = $this->m_ijin_lingkungan->__checkSession();
		$in_lingkungan_created_date = date('Y-m-d H:i:s');
		
		if($in_lingkungan_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IJIN_LINGUKANGAN'=>$ID_IJIN_LINGUKANGAN,
				'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
				'NO_REG'=>$NO_REG,
				'NO_SK'=>$NO_SK,
				'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
				'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
				'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
				'TGL_AWAL'=>$TGL_AWAL,
				'TGL_AKHIR'=>$TGL_AKHIR,
				'STATUS'=>$STATUS,
				'STATUS_SURVEY'=>$STATUS_SURVEY,
				);
			$result = $this->m_ijin_lingkungan->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_IJIN_LINGUKANGAN = htmlentities($this->input->post('ID_IJIN_LINGUKANGAN'),ENT_QUOTES);
		$ID_IJIN_LINGUKANGAN = is_numeric($ID_IJIN_LINGUKANGAN) ? $ID_IJIN_LINGUKANGAN : 0;
		$ID_IJIN_LINGKUNGAN_INTI = htmlentities($this->input->post('ID_IJIN_LINGKUNGAN_INTI'),ENT_QUOTES);
		$ID_IJIN_LINGKUNGAN_INTI = is_numeric($ID_IJIN_LINGKUNGAN_INTI) ? $ID_IJIN_LINGKUNGAN_INTI : 0;
		$NO_REG = htmlentities($this->input->post('NO_REG'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NAMA_DIREKTUR = htmlentities($this->input->post('NAMA_DIREKTUR'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AWAL = htmlentities($this->input->post('TGL_AWAL'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$in_lingkungan_updated_by = $this->m_ijin_lingkungan->__checkSession();
		$in_lingkungan_updated_date = date('Y-m-d H:i:s');
		
		if($in_lingkungan_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
				'NO_REG'=>$NO_REG,
				'NO_SK'=>$NO_SK,
				'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
				'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
				'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
				'TGL_AWAL'=>$TGL_AWAL,
				'TGL_AKHIR'=>$TGL_AKHIR,
				'STATUS'=>$STATUS,
				'STATUS_SURVEY'=>$STATUS_SURVEY,
				);
			$result = $this->m_ijin_lingkungan->__update($data, $ID_IJIN_LINGUKANGAN, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_ijin_lingkungan->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_IJIN_LINGKUNGAN_INTI = htmlentities($this->input->post('ID_IJIN_LINGKUNGAN_INTI'),ENT_QUOTES);
		$ID_IJIN_LINGKUNGAN_INTI = is_numeric($ID_IJIN_LINGKUNGAN_INTI) ? $ID_IJIN_LINGKUNGAN_INTI : 0;
		$NO_REG = htmlentities($this->input->post('NO_REG'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NAMA_DIREKTUR = htmlentities($this->input->post('NAMA_DIREKTUR'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AWAL = htmlentities($this->input->post('TGL_AWAL'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$params = array(
			'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
			'NO_REG'=>$NO_REG,
			'NO_SK'=>$NO_SK,
			'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
			'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'TGL_AWAL'=>$TGL_AWAL,
			'TGL_AKHIR'=>$TGL_AKHIR,
			'STATUS'=>$STATUS,
			'STATUS_SURVEY'=>$STATUS_SURVEY,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_ijin_lingkungan->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_IJIN_LINGKUNGAN_INTI = htmlentities($this->input->post('ID_IJIN_LINGKUNGAN_INTI'),ENT_QUOTES);
		$ID_IJIN_LINGKUNGAN_INTI = is_numeric($ID_IJIN_LINGKUNGAN_INTI) ? $ID_IJIN_LINGKUNGAN_INTI : 0;
		$NO_REG = htmlentities($this->input->post('NO_REG'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NAMA_DIREKTUR = htmlentities($this->input->post('NAMA_DIREKTUR'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AWAL = htmlentities($this->input->post('TGL_AWAL'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$params = array(
			'searchText' => $searchText,
			'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
			'NO_REG'=>$NO_REG,
			'NO_SK'=>$NO_SK,
			'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
			'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'TGL_AWAL'=>$TGL_AWAL,
			'TGL_AKHIR'=>$TGL_AKHIR,
			'STATUS'=>$STATUS,
			'STATUS_SURVEY'=>$STATUS_SURVEY,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_ijin_lingkungan->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_ijin_lingkungan.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/ijin_lingkungan_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/ijin_lingkungan_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}