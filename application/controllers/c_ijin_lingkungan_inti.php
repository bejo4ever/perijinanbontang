<?php
class C_ijin_lingkungan_inti extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_ijin_lingkungan_inti');
	}
	
	function index(){
		$this->load->view('main/v_ijin_lingkungan_inti');
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
		$result = $this->m_ijin_lingkungan_inti->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_IJIN_LINGKUNGAN_INTI = htmlentities($this->input->post('ID_IJIN_LINGKUNGAN_INTI'),ENT_QUOTES);
		$ID_IJIN_LINGKUNGAN_INTI = is_numeric($ID_IJIN_LINGKUNGAN_INTI) ? $ID_IJIN_LINGKUNGAN_INTI : 0;
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NO_REG = htmlentities($this->input->post('NO_REG'),ENT_QUOTES);
		$NO_REG = is_numeric($NO_REG) ? $NO_REG : 0;
		$JENIS_USAHA = htmlentities($this->input->post('JENIS_USAHA'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_KELURAHAN = htmlentities($this->input->post('ID_KELURAHAN'),ENT_QUOTES);
		$ID_KELURAHAN = is_numeric($ID_KELURAHAN) ? $ID_KELURAHAN : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$STATUS_LOKASI = htmlentities($this->input->post('STATUS_LOKASI'),ENT_QUOTES);
		$STATUS_LOKASI = is_numeric($STATUS_LOKASI) ? $STATUS_LOKASI : 0;
		$LUAS_USAHA = htmlentities($this->input->post('LUAS_USAHA'),ENT_QUOTES);
		$LUAS_USAHA = is_numeric($LUAS_USAHA) ? $LUAS_USAHA : 0;
		$LUAS_BAHAN = htmlentities($this->input->post('LUAS_BAHAN'),ENT_QUOTES);
		$LUAS_BAHAN = is_numeric($LUAS_BAHAN) ? $LUAS_BAHAN : 0;
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$LUAS_BANGUNAN = is_numeric($LUAS_BANGUNAN) ? $LUAS_BANGUNAN : 0;
		$LUAS_RUANG_USAHA = htmlentities($this->input->post('LUAS_RUANG_USAHA'),ENT_QUOTES);
		$LUAS_RUANG_USAHA = is_numeric($LUAS_RUANG_USAHA) ? $LUAS_RUANG_USAHA : 0;
		$KAPASITAS = htmlentities($this->input->post('KAPASITAS'),ENT_QUOTES);
		$KAPASITAS = is_numeric($KAPASITAS) ? $KAPASITAS : 0;
		$IZIN_SKTR = htmlentities($this->input->post('IZIN_SKTR'),ENT_QUOTES);
		$IZIN_SKTR = is_numeric($IZIN_SKTR) ? $IZIN_SKTR : 0;
		$IZIN_LOKASI = htmlentities($this->input->post('IZIN_LOKASI'),ENT_QUOTES);
		$IZIN_LOKASI = is_numeric($IZIN_LOKASI) ? $IZIN_LOKASI : 0;
				
		$in_lingkungan_inti_author = $this->m_ijin_lingkungan_inti->__checkSession();
		$in_lingkungan_inti_created_date = date('Y-m-d H:i:s');
		
		if($in_lingkungan_inti_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
				'ID_USER'=>$ID_USER,
				'NO_REG'=>$NO_REG,
				'JENIS_USAHA'=>$JENIS_USAHA,
				'ALAMAT'=>$ALAMAT,
				'ID_KELURAHAN'=>$ID_KELURAHAN,
				'ID_KECAMATAN'=>$ID_KECAMATAN,
				'ID_KOTA'=>$ID_KOTA,
				'STATUS_LOKASI'=>$STATUS_LOKASI,
				'LUAS_USAHA'=>$LUAS_USAHA,
				'LUAS_BAHAN'=>$LUAS_BAHAN,
				'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
				'LUAS_RUANG_USAHA'=>$LUAS_RUANG_USAHA,
				'KAPASITAS'=>$KAPASITAS,
				'IZIN_SKTR'=>$IZIN_SKTR,
				'IZIN_LOKASI'=>$IZIN_LOKASI,
				);
			$result = $this->m_ijin_lingkungan_inti->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_IJIN_LINGKUNGAN_INTI = htmlentities($this->input->post('ID_IJIN_LINGKUNGAN_INTI'),ENT_QUOTES);
		$ID_IJIN_LINGKUNGAN_INTI = is_numeric($ID_IJIN_LINGKUNGAN_INTI) ? $ID_IJIN_LINGKUNGAN_INTI : 0;
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NO_REG = htmlentities($this->input->post('NO_REG'),ENT_QUOTES);
		$NO_REG = is_numeric($NO_REG) ? $NO_REG : 0;
		$JENIS_USAHA = htmlentities($this->input->post('JENIS_USAHA'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_KELURAHAN = htmlentities($this->input->post('ID_KELURAHAN'),ENT_QUOTES);
		$ID_KELURAHAN = is_numeric($ID_KELURAHAN) ? $ID_KELURAHAN : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$STATUS_LOKASI = htmlentities($this->input->post('STATUS_LOKASI'),ENT_QUOTES);
		$STATUS_LOKASI = is_numeric($STATUS_LOKASI) ? $STATUS_LOKASI : 0;
		$LUAS_USAHA = htmlentities($this->input->post('LUAS_USAHA'),ENT_QUOTES);
		$LUAS_USAHA = is_numeric($LUAS_USAHA) ? $LUAS_USAHA : 0;
		$LUAS_BAHAN = htmlentities($this->input->post('LUAS_BAHAN'),ENT_QUOTES);
		$LUAS_BAHAN = is_numeric($LUAS_BAHAN) ? $LUAS_BAHAN : 0;
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$LUAS_BANGUNAN = is_numeric($LUAS_BANGUNAN) ? $LUAS_BANGUNAN : 0;
		$LUAS_RUANG_USAHA = htmlentities($this->input->post('LUAS_RUANG_USAHA'),ENT_QUOTES);
		$LUAS_RUANG_USAHA = is_numeric($LUAS_RUANG_USAHA) ? $LUAS_RUANG_USAHA : 0;
		$KAPASITAS = htmlentities($this->input->post('KAPASITAS'),ENT_QUOTES);
		$KAPASITAS = is_numeric($KAPASITAS) ? $KAPASITAS : 0;
		$IZIN_SKTR = htmlentities($this->input->post('IZIN_SKTR'),ENT_QUOTES);
		$IZIN_SKTR = is_numeric($IZIN_SKTR) ? $IZIN_SKTR : 0;
		$IZIN_LOKASI = htmlentities($this->input->post('IZIN_LOKASI'),ENT_QUOTES);
		$IZIN_LOKASI = is_numeric($IZIN_LOKASI) ? $IZIN_LOKASI : 0;
				
		$in_lingkungan_inti_updated_by = $this->m_ijin_lingkungan_inti->__checkSession();
		$in_lingkungan_inti_updated_date = date('Y-m-d H:i:s');
		
		if($in_lingkungan_inti_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_USER'=>$ID_USER,
				'NO_REG'=>$NO_REG,
				'JENIS_USAHA'=>$JENIS_USAHA,
				'ALAMAT'=>$ALAMAT,
				'ID_KELURAHAN'=>$ID_KELURAHAN,
				'ID_KECAMATAN'=>$ID_KECAMATAN,
				'ID_KOTA'=>$ID_KOTA,
				'STATUS_LOKASI'=>$STATUS_LOKASI,
				'LUAS_USAHA'=>$LUAS_USAHA,
				'LUAS_BAHAN'=>$LUAS_BAHAN,
				'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
				'LUAS_RUANG_USAHA'=>$LUAS_RUANG_USAHA,
				'KAPASITAS'=>$KAPASITAS,
				'IZIN_SKTR'=>$IZIN_SKTR,
				'IZIN_LOKASI'=>$IZIN_LOKASI,
				);
			$result = $this->m_ijin_lingkungan_inti->__update($data, $ID_IJIN_LINGKUNGAN_INTI, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_ijin_lingkungan_inti->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NO_REG = htmlentities($this->input->post('NO_REG'),ENT_QUOTES);
		$NO_REG = is_numeric($NO_REG) ? $NO_REG : 0;
		$JENIS_USAHA = htmlentities($this->input->post('JENIS_USAHA'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_KELURAHAN = htmlentities($this->input->post('ID_KELURAHAN'),ENT_QUOTES);
		$ID_KELURAHAN = is_numeric($ID_KELURAHAN) ? $ID_KELURAHAN : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$STATUS_LOKASI = htmlentities($this->input->post('STATUS_LOKASI'),ENT_QUOTES);
		$STATUS_LOKASI = is_numeric($STATUS_LOKASI) ? $STATUS_LOKASI : 0;
		$LUAS_USAHA = htmlentities($this->input->post('LUAS_USAHA'),ENT_QUOTES);
		$LUAS_USAHA = is_numeric($LUAS_USAHA) ? $LUAS_USAHA : 0;
		$LUAS_BAHAN = htmlentities($this->input->post('LUAS_BAHAN'),ENT_QUOTES);
		$LUAS_BAHAN = is_numeric($LUAS_BAHAN) ? $LUAS_BAHAN : 0;
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$LUAS_BANGUNAN = is_numeric($LUAS_BANGUNAN) ? $LUAS_BANGUNAN : 0;
		$LUAS_RUANG_USAHA = htmlentities($this->input->post('LUAS_RUANG_USAHA'),ENT_QUOTES);
		$LUAS_RUANG_USAHA = is_numeric($LUAS_RUANG_USAHA) ? $LUAS_RUANG_USAHA : 0;
		$KAPASITAS = htmlentities($this->input->post('KAPASITAS'),ENT_QUOTES);
		$KAPASITAS = is_numeric($KAPASITAS) ? $KAPASITAS : 0;
		$IZIN_SKTR = htmlentities($this->input->post('IZIN_SKTR'),ENT_QUOTES);
		$IZIN_SKTR = is_numeric($IZIN_SKTR) ? $IZIN_SKTR : 0;
		$IZIN_LOKASI = htmlentities($this->input->post('IZIN_LOKASI'),ENT_QUOTES);
		$IZIN_LOKASI = is_numeric($IZIN_LOKASI) ? $IZIN_LOKASI : 0;
				
		$params = array(
			'ID_USER'=>$ID_USER,
			'NO_REG'=>$NO_REG,
			'JENIS_USAHA'=>$JENIS_USAHA,
			'ALAMAT'=>$ALAMAT,
			'ID_KELURAHAN'=>$ID_KELURAHAN,
			'ID_KECAMATAN'=>$ID_KECAMATAN,
			'ID_KOTA'=>$ID_KOTA,
			'STATUS_LOKASI'=>$STATUS_LOKASI,
			'LUAS_USAHA'=>$LUAS_USAHA,
			'LUAS_BAHAN'=>$LUAS_BAHAN,
			'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
			'LUAS_RUANG_USAHA'=>$LUAS_RUANG_USAHA,
			'KAPASITAS'=>$KAPASITAS,
			'IZIN_SKTR'=>$IZIN_SKTR,
			'IZIN_LOKASI'=>$IZIN_LOKASI,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_ijin_lingkungan_inti->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NO_REG = htmlentities($this->input->post('NO_REG'),ENT_QUOTES);
		$NO_REG = is_numeric($NO_REG) ? $NO_REG : 0;
		$JENIS_USAHA = htmlentities($this->input->post('JENIS_USAHA'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_KELURAHAN = htmlentities($this->input->post('ID_KELURAHAN'),ENT_QUOTES);
		$ID_KELURAHAN = is_numeric($ID_KELURAHAN) ? $ID_KELURAHAN : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$STATUS_LOKASI = htmlentities($this->input->post('STATUS_LOKASI'),ENT_QUOTES);
		$STATUS_LOKASI = is_numeric($STATUS_LOKASI) ? $STATUS_LOKASI : 0;
		$LUAS_USAHA = htmlentities($this->input->post('LUAS_USAHA'),ENT_QUOTES);
		$LUAS_USAHA = is_numeric($LUAS_USAHA) ? $LUAS_USAHA : 0;
		$LUAS_BAHAN = htmlentities($this->input->post('LUAS_BAHAN'),ENT_QUOTES);
		$LUAS_BAHAN = is_numeric($LUAS_BAHAN) ? $LUAS_BAHAN : 0;
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$LUAS_BANGUNAN = is_numeric($LUAS_BANGUNAN) ? $LUAS_BANGUNAN : 0;
		$LUAS_RUANG_USAHA = htmlentities($this->input->post('LUAS_RUANG_USAHA'),ENT_QUOTES);
		$LUAS_RUANG_USAHA = is_numeric($LUAS_RUANG_USAHA) ? $LUAS_RUANG_USAHA : 0;
		$KAPASITAS = htmlentities($this->input->post('KAPASITAS'),ENT_QUOTES);
		$KAPASITAS = is_numeric($KAPASITAS) ? $KAPASITAS : 0;
		$IZIN_SKTR = htmlentities($this->input->post('IZIN_SKTR'),ENT_QUOTES);
		$IZIN_SKTR = is_numeric($IZIN_SKTR) ? $IZIN_SKTR : 0;
		$IZIN_LOKASI = htmlentities($this->input->post('IZIN_LOKASI'),ENT_QUOTES);
		$IZIN_LOKASI = is_numeric($IZIN_LOKASI) ? $IZIN_LOKASI : 0;
				
		$params = array(
			'searchText' => $searchText,
			'ID_USER'=>$ID_USER,
			'NO_REG'=>$NO_REG,
			'JENIS_USAHA'=>$JENIS_USAHA,
			'ALAMAT'=>$ALAMAT,
			'ID_KELURAHAN'=>$ID_KELURAHAN,
			'ID_KECAMATAN'=>$ID_KECAMATAN,
			'ID_KOTA'=>$ID_KOTA,
			'STATUS_LOKASI'=>$STATUS_LOKASI,
			'LUAS_USAHA'=>$LUAS_USAHA,
			'LUAS_BAHAN'=>$LUAS_BAHAN,
			'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
			'LUAS_RUANG_USAHA'=>$LUAS_RUANG_USAHA,
			'KAPASITAS'=>$KAPASITAS,
			'IZIN_SKTR'=>$IZIN_SKTR,
			'IZIN_LOKASI'=>$IZIN_LOKASI,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_ijin_lingkungan_inti->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_ijin_lingkungan_inti.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/ijin_lingkungan_inti_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/ijin_lingkungan_inti_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}