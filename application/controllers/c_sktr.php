<?php
class C_sktr extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_sktr');
	}
	
	function index(){
		$this->load->view('main/v_sktr');
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
		$result = $this->m_sktr->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_SKTR = htmlentities($this->input->post('ID_SKTR'),ENT_QUOTES);
		$ID_SKTR = is_numeric($ID_SKTR) ? $ID_SKTR : 0;
		// $ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		// $ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		$NO_TELP = htmlentities($this->input->post('NO_TELP'),ENT_QUOTES);
		$HAK_MILIK = htmlentities($this->input->post('HAK_MILIK'),ENT_QUOTES);
		$HAK_MILIK = is_numeric($HAK_MILIK) ? $HAK_MILIK : 0;
		$NAMA_PEMILIK = htmlentities($this->input->post('NAMA_PEMILIK'),ENT_QUOTES);
		$NO_SURAT_TANAH = htmlentities($this->input->post('NO_SURAT_TANAH'),ENT_QUOTES);
		$ALAMAT_BANGUNAN = htmlentities($this->input->post('ALAMAT_BANGUNAN'),ENT_QUOTES);
		$RENCANA_PERUNTUKAN = htmlentities($this->input->post('RENCANA_PERUNTUKAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = is_numeric($TINGGI_BANGUNAN) ? $TINGGI_BANGUNAN : 0;
		$LUAS_PERSIL = htmlentities($this->input->post('LUAS_PERSIL'),ENT_QUOTES);
		$LUAS_PERSIL = is_numeric($LUAS_PERSIL) ? $LUAS_PERSIL : 0;
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$LUAS_BANGUNAN = is_numeric($LUAS_BANGUNAN) ? $LUAS_BANGUNAN : 0;
		$BATAS_KIRI = htmlentities($this->input->post('BATAS_KIRI'),ENT_QUOTES);
		$BATAS_KANAN = htmlentities($this->input->post('BATAS_KANAN'),ENT_QUOTES);
		$BATAS_DEPAN = htmlentities($this->input->post('BATAS_DEPAN'),ENT_QUOTES);
		$BATAS_BELAKANG = htmlentities($this->input->post('BATAS_BELAKANG'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
				
		$tr_author = $this->m_sktr->__checkSession();
		$tr_created_date = date('Y-m-d H:i:s');
		
		if($tr_author == ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_SKTR'=>$ID_SKTR,
				'ID_USER'=>$_SESSION['USERID'],
				'NAMA_PEMOHON'=>$NAMA_PEMOHON,
				'NO_TELP'=>$NO_TELP,
				'HAK_MILIK'=>$HAK_MILIK,
				'NAMA_PEMILIK'=>$NAMA_PEMILIK,
				'NO_SURAT_TANAH'=>$NO_SURAT_TANAH,
				'ALAMAT_BANGUNAN'=>$ALAMAT_BANGUNAN,
				'RENCANA_PERUNTUKAN'=>$RENCANA_PERUNTUKAN,
				'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
				'LUAS_PERSIL'=>$LUAS_PERSIL,
				'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
				'BATAS_KIRI'=>$BATAS_KIRI,
				'BATAS_KANAN'=>$BATAS_KANAN,
				'BATAS_DEPAN'=>$BATAS_DEPAN,
				'BATAS_BELAKANG'=>$BATAS_BELAKANG,
				'TGL_PERMOHONAN'=>date("Y-m-d"),
				);
			$result = $this->m_sktr->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_SKTR = htmlentities($this->input->post('ID_SKTR'),ENT_QUOTES);
		$ID_SKTR = is_numeric($ID_SKTR) ? $ID_SKTR : 0;
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		$NO_TELP = htmlentities($this->input->post('NO_TELP'),ENT_QUOTES);
		$HAK_MILIK = htmlentities($this->input->post('HAK_MILIK'),ENT_QUOTES);
		$HAK_MILIK = is_numeric($HAK_MILIK) ? $HAK_MILIK : 0;
		$NAMA_PEMILIK = htmlentities($this->input->post('NAMA_PEMILIK'),ENT_QUOTES);
		$NO_SURAT_TANAH = htmlentities($this->input->post('NO_SURAT_TANAH'),ENT_QUOTES);
		$ALAMAT_BANGUNAN = htmlentities($this->input->post('ALAMAT_BANGUNAN'),ENT_QUOTES);
		$RENCANA_PERUNTUKAN = htmlentities($this->input->post('RENCANA_PERUNTUKAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = is_numeric($TINGGI_BANGUNAN) ? $TINGGI_BANGUNAN : 0;
		$LUAS_PERSIL = htmlentities($this->input->post('LUAS_PERSIL'),ENT_QUOTES);
		$LUAS_PERSIL = is_numeric($LUAS_PERSIL) ? $LUAS_PERSIL : 0;
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$LUAS_BANGUNAN = is_numeric($LUAS_BANGUNAN) ? $LUAS_BANGUNAN : 0;
		$BATAS_KIRI = htmlentities($this->input->post('BATAS_KIRI'),ENT_QUOTES);
		$BATAS_KANAN = htmlentities($this->input->post('BATAS_KANAN'),ENT_QUOTES);
		$BATAS_DEPAN = htmlentities($this->input->post('BATAS_DEPAN'),ENT_QUOTES);
		$BATAS_BELAKANG = htmlentities($this->input->post('BATAS_BELAKANG'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
				
		$tr_updated_by = $this->m_sktr->__checkSession();
		$tr_updated_date = date('Y-m-d H:i:s');
		
		if($tr_updated_by == ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_USER'=>$_SESSION['USERID'],
				'NAMA_PEMOHON'=>$NAMA_PEMOHON,
				'NO_TELP'=>$NO_TELP,
				'HAK_MILIK'=>$HAK_MILIK,
				'NAMA_PEMILIK'=>$NAMA_PEMILIK,
				'NO_SURAT_TANAH'=>$NO_SURAT_TANAH,
				'ALAMAT_BANGUNAN'=>$ALAMAT_BANGUNAN,
				'RENCANA_PERUNTUKAN'=>$RENCANA_PERUNTUKAN,
				'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
				'LUAS_PERSIL'=>$LUAS_PERSIL,
				'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
				'BATAS_KIRI'=>$BATAS_KIRI,
				'BATAS_KANAN'=>$BATAS_KANAN,
				'BATAS_DEPAN'=>$BATAS_DEPAN,
				'BATAS_BELAKANG'=>$BATAS_BELAKANG,
				//'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
				);
			$result = $this->m_sktr->__update($data, $ID_SKTR, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_sktr->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		$NO_TELP = htmlentities($this->input->post('NO_TELP'),ENT_QUOTES);
		$HAK_MILIK = htmlentities($this->input->post('HAK_MILIK'),ENT_QUOTES);
		$HAK_MILIK = is_numeric($HAK_MILIK) ? $HAK_MILIK : 0;
		$NAMA_PEMILIK = htmlentities($this->input->post('NAMA_PEMILIK'),ENT_QUOTES);
		$NO_SURAT_TANAH = htmlentities($this->input->post('NO_SURAT_TANAH'),ENT_QUOTES);
		$ALAMAT_BANGUNAN = htmlentities($this->input->post('ALAMAT_BANGUNAN'),ENT_QUOTES);
		$RENCANA_PERUNTUKAN = htmlentities($this->input->post('RENCANA_PERUNTUKAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = is_numeric($TINGGI_BANGUNAN) ? $TINGGI_BANGUNAN : 0;
		$LUAS_PERSIL = htmlentities($this->input->post('LUAS_PERSIL'),ENT_QUOTES);
		$LUAS_PERSIL = is_numeric($LUAS_PERSIL) ? $LUAS_PERSIL : 0;
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$LUAS_BANGUNAN = is_numeric($LUAS_BANGUNAN) ? $LUAS_BANGUNAN : 0;
		$BATAS_KIRI = htmlentities($this->input->post('BATAS_KIRI'),ENT_QUOTES);
		$BATAS_KANAN = htmlentities($this->input->post('BATAS_KANAN'),ENT_QUOTES);
		$BATAS_DEPAN = htmlentities($this->input->post('BATAS_DEPAN'),ENT_QUOTES);
		$BATAS_BELAKANG = htmlentities($this->input->post('BATAS_BELAKANG'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
				
		$params = array(
			'ID_USER'=>$ID_USER,
			'NAMA_PEMOHON'=>$NAMA_PEMOHON,
			'NO_TELP'=>$NO_TELP,
			'HAK_MILIK'=>$HAK_MILIK,
			'NAMA_PEMILIK'=>$NAMA_PEMILIK,
			'NO_SURAT_TANAH'=>$NO_SURAT_TANAH,
			'ALAMAT_BANGUNAN'=>$ALAMAT_BANGUNAN,
			'RENCANA_PERUNTUKAN'=>$RENCANA_PERUNTUKAN,
			'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
			'LUAS_PERSIL'=>$LUAS_PERSIL,
			'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
			'BATAS_KIRI'=>$BATAS_KIRI,
			'BATAS_KANAN'=>$BATAS_KANAN,
			'BATAS_DEPAN'=>$BATAS_DEPAN,
			'BATAS_BELAKANG'=>$BATAS_BELAKANG,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_sktr->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		$NO_TELP = htmlentities($this->input->post('NO_TELP'),ENT_QUOTES);
		$HAK_MILIK = htmlentities($this->input->post('HAK_MILIK'),ENT_QUOTES);
		$HAK_MILIK = is_numeric($HAK_MILIK) ? $HAK_MILIK : 0;
		$NAMA_PEMILIK = htmlentities($this->input->post('NAMA_PEMILIK'),ENT_QUOTES);
		$NO_SURAT_TANAH = htmlentities($this->input->post('NO_SURAT_TANAH'),ENT_QUOTES);
		$ALAMAT_BANGUNAN = htmlentities($this->input->post('ALAMAT_BANGUNAN'),ENT_QUOTES);
		$RENCANA_PERUNTUKAN = htmlentities($this->input->post('RENCANA_PERUNTUKAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = is_numeric($TINGGI_BANGUNAN) ? $TINGGI_BANGUNAN : 0;
		$LUAS_PERSIL = htmlentities($this->input->post('LUAS_PERSIL'),ENT_QUOTES);
		$LUAS_PERSIL = is_numeric($LUAS_PERSIL) ? $LUAS_PERSIL : 0;
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$LUAS_BANGUNAN = is_numeric($LUAS_BANGUNAN) ? $LUAS_BANGUNAN : 0;
		$BATAS_KIRI = htmlentities($this->input->post('BATAS_KIRI'),ENT_QUOTES);
		$BATAS_KANAN = htmlentities($this->input->post('BATAS_KANAN'),ENT_QUOTES);
		$BATAS_DEPAN = htmlentities($this->input->post('BATAS_DEPAN'),ENT_QUOTES);
		$BATAS_BELAKANG = htmlentities($this->input->post('BATAS_BELAKANG'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'ID_USER'=>$ID_USER,
			'NAMA_PEMOHON'=>$NAMA_PEMOHON,
			'NO_TELP'=>$NO_TELP,
			'HAK_MILIK'=>$HAK_MILIK,
			'NAMA_PEMILIK'=>$NAMA_PEMILIK,
			'NO_SURAT_TANAH'=>$NO_SURAT_TANAH,
			'ALAMAT_BANGUNAN'=>$ALAMAT_BANGUNAN,
			'RENCANA_PERUNTUKAN'=>$RENCANA_PERUNTUKAN,
			'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
			'LUAS_PERSIL'=>$LUAS_PERSIL,
			'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
			'BATAS_KIRI'=>$BATAS_KIRI,
			'BATAS_KANAN'=>$BATAS_KANAN,
			'BATAS_DEPAN'=>$BATAS_DEPAN,
			'BATAS_BELAKANG'=>$BATAS_BELAKANG,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_sktr->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_sktr.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/sktr_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/sktr_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}