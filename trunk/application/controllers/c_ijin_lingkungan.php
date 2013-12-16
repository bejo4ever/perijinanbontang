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
		$NO_KTP = htmlentities($this->input->post('NO_KTP'),ENT_QUOTES);
		$NAMA_LENGKAP = htmlentities($this->input->post('NAMA_LENGKAP'),ENT_QUOTES);
		$TEMPAT_LAHIR = htmlentities($this->input->post('TEMPAT_LAHIR'),ENT_QUOTES);
		$TANGGAL_LAHIR = htmlentities($this->input->post('TANGGAL_LAHIR'),ENT_QUOTES);
		$KEWARGANEGARAAN = htmlentities($this->input->post('KEWARGANEGARAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_KELURAHAN = htmlentities($this->input->post('ID_KELURAHAN'),ENT_QUOTES);
		$ID_KELURAHAN = is_numeric($ID_KELURAHAN) ? $ID_KELURAHAN : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELP = htmlentities($this->input->post('TELP'),ENT_QUOTES);
		$NPWP = htmlentities($this->input->post('NPWP'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NAMA_DIREKTUR = htmlentities($this->input->post('NAMA_DIREKTUR'),ENT_QUOTES);
		$NO_AKTE = htmlentities($this->input->post('NO_AKTE'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = htmlentities($this->input->post('BENTUK_PERUSAHAAN'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = is_numeric($BENTUK_PERUSAHAAN) ? $BENTUK_PERUSAHAAN : 0;
		$ALAMAT_PERUSAHAAN = htmlentities($this->input->post('ALAMAT_PERUSAHAAN'),ENT_QUOTES);
		$ID_KELURAHAN2 = htmlentities($this->input->post('ID_KELURAHAN2'),ENT_QUOTES);
		$ID_KELURAHAN2 = is_numeric($ID_KELURAHAN2) ? $ID_KELURAHAN2 : 0;
		$ID_KECAMATAN2 = htmlentities($this->input->post('ID_KECAMATAN2'),ENT_QUOTES);
		$ID_KECAMATAN2 = is_numeric($ID_KECAMATAN2) ? $ID_KECAMATAN2 : 0;
		$ID_KOTA2 = htmlentities($this->input->post('ID_KOTA2'),ENT_QUOTES);
		$ID_KOTA2 = is_numeric($ID_KOTA2) ? $ID_KOTA2 : 0;
		$TELP2 = htmlentities($this->input->post('TELP2'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$in_lingkungan_author = $this->m_ijin_lingkungan->__checkSession();
		$in_lingkungan_created_date = date('Y-m-d H:i:s');
		
		if($in_lingkungan_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IJIN_LINGUKANGAN'=>$ID_IJIN_LINGUKANGAN,
				'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
				'NO_KTP'=>$NO_KTP,
				'NAMA_LENGKAP'=>$NAMA_LENGKAP,
				'TEMPAT_LAHIR'=>$TEMPAT_LAHIR,
				'TANGGAL_LAHIR'=>$TANGGAL_LAHIR,
				'KEWARGANEGARAAN'=>$KEWARGANEGARAAN,
				'ALAMAT'=>$ALAMAT,
				'ID_KELURAHAN'=>$ID_KELURAHAN,
				'ID_KECAMATAN'=>$ID_KECAMATAN,
				'ID_KOTA'=>$ID_KOTA,
				'TELP'=>$TELP,
				'NPWP'=>$NPWP,
				'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
				'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
				'NO_AKTE'=>$NO_AKTE,
				'BENTUK_PERUSAHAAN'=>$BENTUK_PERUSAHAAN,
				'ALAMAT_PERUSAHAAN'=>$ALAMAT_PERUSAHAAN,
				'ID_KELURAHAN2'=>$ID_KELURAHAN2,
				'ID_KECAMATAN2'=>$ID_KECAMATAN2,
				'ID_KOTA2'=>$ID_KOTA2,
				'TELP2'=>$TELP2,
				'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
				'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
				'TGL_AKHIR'=>$TGL_AKHIR,
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
		$NO_KTP = htmlentities($this->input->post('NO_KTP'),ENT_QUOTES);
		$NAMA_LENGKAP = htmlentities($this->input->post('NAMA_LENGKAP'),ENT_QUOTES);
		$TEMPAT_LAHIR = htmlentities($this->input->post('TEMPAT_LAHIR'),ENT_QUOTES);
		$TANGGAL_LAHIR = htmlentities($this->input->post('TANGGAL_LAHIR'),ENT_QUOTES);
		$KEWARGANEGARAAN = htmlentities($this->input->post('KEWARGANEGARAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_KELURAHAN = htmlentities($this->input->post('ID_KELURAHAN'),ENT_QUOTES);
		$ID_KELURAHAN = is_numeric($ID_KELURAHAN) ? $ID_KELURAHAN : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELP = htmlentities($this->input->post('TELP'),ENT_QUOTES);
		$NPWP = htmlentities($this->input->post('NPWP'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NAMA_DIREKTUR = htmlentities($this->input->post('NAMA_DIREKTUR'),ENT_QUOTES);
		$NO_AKTE = htmlentities($this->input->post('NO_AKTE'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = htmlentities($this->input->post('BENTUK_PERUSAHAAN'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = is_numeric($BENTUK_PERUSAHAAN) ? $BENTUK_PERUSAHAAN : 0;
		$ALAMAT_PERUSAHAAN = htmlentities($this->input->post('ALAMAT_PERUSAHAAN'),ENT_QUOTES);
		$ID_KELURAHAN2 = htmlentities($this->input->post('ID_KELURAHAN2'),ENT_QUOTES);
		$ID_KELURAHAN2 = is_numeric($ID_KELURAHAN2) ? $ID_KELURAHAN2 : 0;
		$ID_KECAMATAN2 = htmlentities($this->input->post('ID_KECAMATAN2'),ENT_QUOTES);
		$ID_KECAMATAN2 = is_numeric($ID_KECAMATAN2) ? $ID_KECAMATAN2 : 0;
		$ID_KOTA2 = htmlentities($this->input->post('ID_KOTA2'),ENT_QUOTES);
		$ID_KOTA2 = is_numeric($ID_KOTA2) ? $ID_KOTA2 : 0;
		$TELP2 = htmlentities($this->input->post('TELP2'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$in_lingkungan_updated_by = $this->m_ijin_lingkungan->__checkSession();
		$in_lingkungan_updated_date = date('Y-m-d H:i:s');
		
		if($in_lingkungan_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
				'NO_KTP'=>$NO_KTP,
				'NAMA_LENGKAP'=>$NAMA_LENGKAP,
				'TEMPAT_LAHIR'=>$TEMPAT_LAHIR,
				'TANGGAL_LAHIR'=>$TANGGAL_LAHIR,
				'KEWARGANEGARAAN'=>$KEWARGANEGARAAN,
				'ALAMAT'=>$ALAMAT,
				'ID_KELURAHAN'=>$ID_KELURAHAN,
				'ID_KECAMATAN'=>$ID_KECAMATAN,
				'ID_KOTA'=>$ID_KOTA,
				'TELP'=>$TELP,
				'NPWP'=>$NPWP,
				'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
				'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
				'NO_AKTE'=>$NO_AKTE,
				'BENTUK_PERUSAHAAN'=>$BENTUK_PERUSAHAAN,
				'ALAMAT_PERUSAHAAN'=>$ALAMAT_PERUSAHAAN,
				'ID_KELURAHAN2'=>$ID_KELURAHAN2,
				'ID_KECAMATAN2'=>$ID_KECAMATAN2,
				'ID_KOTA2'=>$ID_KOTA2,
				'TELP2'=>$TELP2,
				'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
				'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
				'TGL_AKHIR'=>$TGL_AKHIR,
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
		$NO_KTP = htmlentities($this->input->post('NO_KTP'),ENT_QUOTES);
		$NAMA_LENGKAP = htmlentities($this->input->post('NAMA_LENGKAP'),ENT_QUOTES);
		$TEMPAT_LAHIR = htmlentities($this->input->post('TEMPAT_LAHIR'),ENT_QUOTES);
		$TANGGAL_LAHIR = htmlentities($this->input->post('TANGGAL_LAHIR'),ENT_QUOTES);
		$KEWARGANEGARAAN = htmlentities($this->input->post('KEWARGANEGARAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_KELURAHAN = htmlentities($this->input->post('ID_KELURAHAN'),ENT_QUOTES);
		$ID_KELURAHAN = is_numeric($ID_KELURAHAN) ? $ID_KELURAHAN : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELP = htmlentities($this->input->post('TELP'),ENT_QUOTES);
		$NPWP = htmlentities($this->input->post('NPWP'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NAMA_DIREKTUR = htmlentities($this->input->post('NAMA_DIREKTUR'),ENT_QUOTES);
		$NO_AKTE = htmlentities($this->input->post('NO_AKTE'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = htmlentities($this->input->post('BENTUK_PERUSAHAAN'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = is_numeric($BENTUK_PERUSAHAAN) ? $BENTUK_PERUSAHAAN : 0;
		$ALAMAT_PERUSAHAAN = htmlentities($this->input->post('ALAMAT_PERUSAHAAN'),ENT_QUOTES);
		$ID_KELURAHAN2 = htmlentities($this->input->post('ID_KELURAHAN2'),ENT_QUOTES);
		$ID_KELURAHAN2 = is_numeric($ID_KELURAHAN2) ? $ID_KELURAHAN2 : 0;
		$ID_KECAMATAN2 = htmlentities($this->input->post('ID_KECAMATAN2'),ENT_QUOTES);
		$ID_KECAMATAN2 = is_numeric($ID_KECAMATAN2) ? $ID_KECAMATAN2 : 0;
		$ID_KOTA2 = htmlentities($this->input->post('ID_KOTA2'),ENT_QUOTES);
		$ID_KOTA2 = is_numeric($ID_KOTA2) ? $ID_KOTA2 : 0;
		$TELP2 = htmlentities($this->input->post('TELP2'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$params = array(
			'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
			'NO_KTP'=>$NO_KTP,
			'NAMA_LENGKAP'=>$NAMA_LENGKAP,
			'TEMPAT_LAHIR'=>$TEMPAT_LAHIR,
			'TANGGAL_LAHIR'=>$TANGGAL_LAHIR,
			'KEWARGANEGARAAN'=>$KEWARGANEGARAAN,
			'ALAMAT'=>$ALAMAT,
			'ID_KELURAHAN'=>$ID_KELURAHAN,
			'ID_KECAMATAN'=>$ID_KECAMATAN,
			'ID_KOTA'=>$ID_KOTA,
			'TELP'=>$TELP,
			'NPWP'=>$NPWP,
			'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
			'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
			'NO_AKTE'=>$NO_AKTE,
			'BENTUK_PERUSAHAAN'=>$BENTUK_PERUSAHAAN,
			'ALAMAT_PERUSAHAAN'=>$ALAMAT_PERUSAHAAN,
			'ID_KELURAHAN2'=>$ID_KELURAHAN2,
			'ID_KECAMATAN2'=>$ID_KECAMATAN2,
			'ID_KOTA2'=>$ID_KOTA2,
			'TELP2'=>$TELP2,
			'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'TGL_AKHIR'=>$TGL_AKHIR,
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
		$NO_KTP = htmlentities($this->input->post('NO_KTP'),ENT_QUOTES);
		$NAMA_LENGKAP = htmlentities($this->input->post('NAMA_LENGKAP'),ENT_QUOTES);
		$TEMPAT_LAHIR = htmlentities($this->input->post('TEMPAT_LAHIR'),ENT_QUOTES);
		$TANGGAL_LAHIR = htmlentities($this->input->post('TANGGAL_LAHIR'),ENT_QUOTES);
		$KEWARGANEGARAAN = htmlentities($this->input->post('KEWARGANEGARAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_KELURAHAN = htmlentities($this->input->post('ID_KELURAHAN'),ENT_QUOTES);
		$ID_KELURAHAN = is_numeric($ID_KELURAHAN) ? $ID_KELURAHAN : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELP = htmlentities($this->input->post('TELP'),ENT_QUOTES);
		$NPWP = htmlentities($this->input->post('NPWP'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NAMA_DIREKTUR = htmlentities($this->input->post('NAMA_DIREKTUR'),ENT_QUOTES);
		$NO_AKTE = htmlentities($this->input->post('NO_AKTE'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = htmlentities($this->input->post('BENTUK_PERUSAHAAN'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = is_numeric($BENTUK_PERUSAHAAN) ? $BENTUK_PERUSAHAAN : 0;
		$ALAMAT_PERUSAHAAN = htmlentities($this->input->post('ALAMAT_PERUSAHAAN'),ENT_QUOTES);
		$ID_KELURAHAN2 = htmlentities($this->input->post('ID_KELURAHAN2'),ENT_QUOTES);
		$ID_KELURAHAN2 = is_numeric($ID_KELURAHAN2) ? $ID_KELURAHAN2 : 0;
		$ID_KECAMATAN2 = htmlentities($this->input->post('ID_KECAMATAN2'),ENT_QUOTES);
		$ID_KECAMATAN2 = is_numeric($ID_KECAMATAN2) ? $ID_KECAMATAN2 : 0;
		$ID_KOTA2 = htmlentities($this->input->post('ID_KOTA2'),ENT_QUOTES);
		$ID_KOTA2 = is_numeric($ID_KOTA2) ? $ID_KOTA2 : 0;
		$TELP2 = htmlentities($this->input->post('TELP2'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
			'NO_KTP'=>$NO_KTP,
			'NAMA_LENGKAP'=>$NAMA_LENGKAP,
			'TEMPAT_LAHIR'=>$TEMPAT_LAHIR,
			'TANGGAL_LAHIR'=>$TANGGAL_LAHIR,
			'KEWARGANEGARAAN'=>$KEWARGANEGARAAN,
			'ALAMAT'=>$ALAMAT,
			'ID_KELURAHAN'=>$ID_KELURAHAN,
			'ID_KECAMATAN'=>$ID_KECAMATAN,
			'ID_KOTA'=>$ID_KOTA,
			'TELP'=>$TELP,
			'NPWP'=>$NPWP,
			'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
			'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
			'NO_AKTE'=>$NO_AKTE,
			'BENTUK_PERUSAHAAN'=>$BENTUK_PERUSAHAAN,
			'ALAMAT_PERUSAHAAN'=>$ALAMAT_PERUSAHAAN,
			'ID_KELURAHAN2'=>$ID_KELURAHAN2,
			'ID_KECAMATAN2'=>$ID_KECAMATAN2,
			'ID_KOTA2'=>$ID_KOTA2,
			'TELP2'=>$TELP2,
			'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'TGL_AKHIR'=>$TGL_AKHIR,
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