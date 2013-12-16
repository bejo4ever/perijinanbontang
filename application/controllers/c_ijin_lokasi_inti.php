<?php
class C_ijin_lokasi_inti extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_ijin_lokasi_inti');
	}
	
	function index(){
		$this->load->view('main/v_ijin_lokasi_inti');
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
		$result = $this->m_ijin_lokasi_inti->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_IJIN_LOKASI_INTI = htmlentities($this->input->post('ID_IJIN_LOKASI_INTI'),ENT_QUOTES);
		$ID_IJIN_LOKASI_INTI = is_numeric($ID_IJIN_LOKASI_INTI) ? $ID_IJIN_LOKASI_INTI : 0;
		// $ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		// $ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NPWPD = htmlentities($this->input->post('NPWPD'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NO_AKTE = htmlentities($this->input->post('NO_AKTE'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = htmlentities($this->input->post('BENTUK_PERUSAHAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_DESA = htmlentities($this->input->post('ID_DESA'),ENT_QUOTES);
		$ID_DESA = is_numeric($ID_DESA) ? $ID_DESA : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELEPON = htmlentities($this->input->post('TELEPON'),ENT_QUOTES);
		$PERUNTUKAN = htmlentities($this->input->post('PERUNTUKAN'),ENT_QUOTES);
		$STATUS_TANAH = htmlentities($this->input->post('STATUS_TANAH'),ENT_QUOTES);
		$STATUS_TANAH = is_numeric($STATUS_TANAH) ? $STATUS_TANAH : 0;
		$KETERANGAN_STATUS = htmlentities($this->input->post('KETERANGAN_STATUS'),ENT_QUOTES);
		$LUAS_TANAH = htmlentities($this->input->post('LUAS_TANAH'),ENT_QUOTES);
		$LUAS_TANAH = is_numeric($LUAS_TANAH) ? $LUAS_TANAH : 0;
		$ALAMAT_LETAK_TANAH = htmlentities($this->input->post('ALAMAT_LETAK_TANAH'),ENT_QUOTES);
		$ID_DESA_LETAK = htmlentities($this->input->post('ID_DESA_LETAK'),ENT_QUOTES);
		$ID_DESA_LETAK = is_numeric($ID_DESA_LETAK) ? $ID_DESA_LETAK : 0;
		$ID_KECAMATAN_LETAK = htmlentities($this->input->post('ID_KECAMATAN_LETAK'),ENT_QUOTES);
		$ID_KECAMATAN_LETAK = is_numeric($ID_KECAMATAN_LETAK) ? $ID_KECAMATAN_LETAK : 0;
				
		$in_lokasi_inti_author = $this->m_ijin_lokasi_inti->__checkSession();
		$in_lokasi_inti_created_date = date('Y-m-d H:i:s');
		
		if($in_lokasi_inti_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IJIN_LOKASI_INTI'=>$ID_IJIN_LOKASI_INTI,
				'ID_USER'=>$this->session->userdata("ID_USER"),
				'NPWPD'=>$NPWPD,
				'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
				'NO_AKTE'=>$NO_AKTE,
				'BENTUK_PERUSAHAAN'=>$BENTUK_PERUSAHAAN,
				'ALAMAT'=>$ALAMAT,
				'ID_DESA'=>$ID_DESA,
				'ID_KECAMATAN'=>$ID_KECAMATAN,
				'ID_KOTA'=>$ID_KOTA,
				'TELEPON'=>$TELEPON,
				'PERUNTUKAN'=>$PERUNTUKAN,
				'STATUS_TANAH'=>$STATUS_TANAH,
				'KETERANGAN_STATUS'=>$KETERANGAN_STATUS,
				'LUAS_TANAH'=>$LUAS_TANAH,
				'ALAMAT_LETAK_TANAH'=>$ALAMAT_LETAK_TANAH,
				'ID_DESA_LETAK'=>$ID_DESA_LETAK,
				'ID_KECAMATAN_LETAK'=>$ID_KECAMATAN_LETAK,
				);
			$result = $this->m_ijin_lokasi_inti->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_IJIN_LOKASI_INTI = htmlentities($this->input->post('ID_IJIN_LOKASI_INTI'),ENT_QUOTES);
		$ID_IJIN_LOKASI_INTI = is_numeric($ID_IJIN_LOKASI_INTI) ? $ID_IJIN_LOKASI_INTI : 0;
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NPWPD = htmlentities($this->input->post('NPWPD'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NO_AKTE = htmlentities($this->input->post('NO_AKTE'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = htmlentities($this->input->post('BENTUK_PERUSAHAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_DESA = htmlentities($this->input->post('ID_DESA'),ENT_QUOTES);
		$ID_DESA = is_numeric($ID_DESA) ? $ID_DESA : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELEPON = htmlentities($this->input->post('TELEPON'),ENT_QUOTES);
		$PERUNTUKAN = htmlentities($this->input->post('PERUNTUKAN'),ENT_QUOTES);
		$STATUS_TANAH = htmlentities($this->input->post('STATUS_TANAH'),ENT_QUOTES);
		$STATUS_TANAH = is_numeric($STATUS_TANAH) ? $STATUS_TANAH : 0;
		$KETERANGAN_STATUS = htmlentities($this->input->post('KETERANGAN_STATUS'),ENT_QUOTES);
		$LUAS_TANAH = htmlentities($this->input->post('LUAS_TANAH'),ENT_QUOTES);
		$LUAS_TANAH = is_numeric($LUAS_TANAH) ? $LUAS_TANAH : 0;
		$ALAMAT_LETAK_TANAH = htmlentities($this->input->post('ALAMAT_LETAK_TANAH'),ENT_QUOTES);
		$ID_DESA_LETAK = htmlentities($this->input->post('ID_DESA_LETAK'),ENT_QUOTES);
		$ID_DESA_LETAK = is_numeric($ID_DESA_LETAK) ? $ID_DESA_LETAK : 0;
		$ID_KECAMATAN_LETAK = htmlentities($this->input->post('ID_KECAMATAN_LETAK'),ENT_QUOTES);
		$ID_KECAMATAN_LETAK = is_numeric($ID_KECAMATAN_LETAK) ? $ID_KECAMATAN_LETAK : 0;
				
		$in_lokasi_inti_updated_by = $this->m_ijin_lokasi_inti->__checkSession();
		$in_lokasi_inti_updated_date = date('Y-m-d H:i:s');
		
		if($in_lokasi_inti_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_USER'=>$ID_USER,
				'NPWPD'=>$NPWPD,
				'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
				'NO_AKTE'=>$NO_AKTE,
				'BENTUK_PERUSAHAAN'=>$BENTUK_PERUSAHAAN,
				'ALAMAT'=>$ALAMAT,
				'ID_DESA'=>$ID_DESA,
				'ID_KECAMATAN'=>$ID_KECAMATAN,
				'ID_KOTA'=>$ID_KOTA,
				'TELEPON'=>$TELEPON,
				'PERUNTUKAN'=>$PERUNTUKAN,
				'STATUS_TANAH'=>$STATUS_TANAH,
				'KETERANGAN_STATUS'=>$KETERANGAN_STATUS,
				'LUAS_TANAH'=>$LUAS_TANAH,
				'ALAMAT_LETAK_TANAH'=>$ALAMAT_LETAK_TANAH,
				'ID_DESA_LETAK'=>$ID_DESA_LETAK,
				'ID_KECAMATAN_LETAK'=>$ID_KECAMATAN_LETAK,
				);
			$result = $this->m_ijin_lokasi_inti->__update($data, $ID_IJIN_LOKASI_INTI, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_ijin_lokasi_inti->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NPWPD = htmlentities($this->input->post('NPWPD'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NO_AKTE = htmlentities($this->input->post('NO_AKTE'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = htmlentities($this->input->post('BENTUK_PERUSAHAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_DESA = htmlentities($this->input->post('ID_DESA'),ENT_QUOTES);
		$ID_DESA = is_numeric($ID_DESA) ? $ID_DESA : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELEPON = htmlentities($this->input->post('TELEPON'),ENT_QUOTES);
		$PERUNTUKAN = htmlentities($this->input->post('PERUNTUKAN'),ENT_QUOTES);
		$STATUS_TANAH = htmlentities($this->input->post('STATUS_TANAH'),ENT_QUOTES);
		$STATUS_TANAH = is_numeric($STATUS_TANAH) ? $STATUS_TANAH : 0;
		$KETERANGAN_STATUS = htmlentities($this->input->post('KETERANGAN_STATUS'),ENT_QUOTES);
		$LUAS_TANAH = htmlentities($this->input->post('LUAS_TANAH'),ENT_QUOTES);
		$LUAS_TANAH = is_numeric($LUAS_TANAH) ? $LUAS_TANAH : 0;
		$ALAMAT_LETAK_TANAH = htmlentities($this->input->post('ALAMAT_LETAK_TANAH'),ENT_QUOTES);
		$ID_DESA_LETAK = htmlentities($this->input->post('ID_DESA_LETAK'),ENT_QUOTES);
		$ID_DESA_LETAK = is_numeric($ID_DESA_LETAK) ? $ID_DESA_LETAK : 0;
		$ID_KECAMATAN_LETAK = htmlentities($this->input->post('ID_KECAMATAN_LETAK'),ENT_QUOTES);
		$ID_KECAMATAN_LETAK = is_numeric($ID_KECAMATAN_LETAK) ? $ID_KECAMATAN_LETAK : 0;
				
		$params = array(
			'ID_USER'=>$ID_USER,
			'NPWPD'=>$NPWPD,
			'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
			'NO_AKTE'=>$NO_AKTE,
			'BENTUK_PERUSAHAAN'=>$BENTUK_PERUSAHAAN,
			'ALAMAT'=>$ALAMAT,
			'ID_DESA'=>$ID_DESA,
			'ID_KECAMATAN'=>$ID_KECAMATAN,
			'ID_KOTA'=>$ID_KOTA,
			'TELEPON'=>$TELEPON,
			'PERUNTUKAN'=>$PERUNTUKAN,
			'STATUS_TANAH'=>$STATUS_TANAH,
			'KETERANGAN_STATUS'=>$KETERANGAN_STATUS,
			'LUAS_TANAH'=>$LUAS_TANAH,
			'ALAMAT_LETAK_TANAH'=>$ALAMAT_LETAK_TANAH,
			'ID_DESA_LETAK'=>$ID_DESA_LETAK,
			'ID_KECAMATAN_LETAK'=>$ID_KECAMATAN_LETAK,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_ijin_lokasi_inti->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NPWPD = htmlentities($this->input->post('NPWPD'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NO_AKTE = htmlentities($this->input->post('NO_AKTE'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = htmlentities($this->input->post('BENTUK_PERUSAHAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$ID_DESA = htmlentities($this->input->post('ID_DESA'),ENT_QUOTES);
		$ID_DESA = is_numeric($ID_DESA) ? $ID_DESA : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELEPON = htmlentities($this->input->post('TELEPON'),ENT_QUOTES);
		$PERUNTUKAN = htmlentities($this->input->post('PERUNTUKAN'),ENT_QUOTES);
		$STATUS_TANAH = htmlentities($this->input->post('STATUS_TANAH'),ENT_QUOTES);
		$STATUS_TANAH = is_numeric($STATUS_TANAH) ? $STATUS_TANAH : 0;
		$KETERANGAN_STATUS = htmlentities($this->input->post('KETERANGAN_STATUS'),ENT_QUOTES);
		$LUAS_TANAH = htmlentities($this->input->post('LUAS_TANAH'),ENT_QUOTES);
		$LUAS_TANAH = is_numeric($LUAS_TANAH) ? $LUAS_TANAH : 0;
		$ALAMAT_LETAK_TANAH = htmlentities($this->input->post('ALAMAT_LETAK_TANAH'),ENT_QUOTES);
		$ID_DESA_LETAK = htmlentities($this->input->post('ID_DESA_LETAK'),ENT_QUOTES);
		$ID_DESA_LETAK = is_numeric($ID_DESA_LETAK) ? $ID_DESA_LETAK : 0;
		$ID_KECAMATAN_LETAK = htmlentities($this->input->post('ID_KECAMATAN_LETAK'),ENT_QUOTES);
		$ID_KECAMATAN_LETAK = is_numeric($ID_KECAMATAN_LETAK) ? $ID_KECAMATAN_LETAK : 0;
				
		$params = array(
			'searchText' => $searchText,
			'ID_USER'=>$ID_USER,
			'NPWPD'=>$NPWPD,
			'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
			'NO_AKTE'=>$NO_AKTE,
			'BENTUK_PERUSAHAAN'=>$BENTUK_PERUSAHAAN,
			'ALAMAT'=>$ALAMAT,
			'ID_DESA'=>$ID_DESA,
			'ID_KECAMATAN'=>$ID_KECAMATAN,
			'ID_KOTA'=>$ID_KOTA,
			'TELEPON'=>$TELEPON,
			'PERUNTUKAN'=>$PERUNTUKAN,
			'STATUS_TANAH'=>$STATUS_TANAH,
			'KETERANGAN_STATUS'=>$KETERANGAN_STATUS,
			'LUAS_TANAH'=>$LUAS_TANAH,
			'ALAMAT_LETAK_TANAH'=>$ALAMAT_LETAK_TANAH,
			'ID_DESA_LETAK'=>$ID_DESA_LETAK,
			'ID_KECAMATAN_LETAK'=>$ID_KECAMATAN_LETAK,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_ijin_lokasi_inti->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_ijin_lokasi_inti.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/ijin_lokasi_inti_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/ijin_lokasi_inti_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}