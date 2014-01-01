<?php
class C_iuiphhk_rencana_alat extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_iuiphhk_rencana_alat');
	}
	
	function index(){
		$this->load->view('main/v_iuiphhk_rencana_alat');
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
		$result = $this->m_iuiphhk_rencana_alat->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_RENCANA_ALAT = htmlentities($this->input->post('ID_RENCANA_ALAT'),ENT_QUOTES);
		$ID_RENCANA_ALAT = is_numeric($ID_RENCANA_ALAT) ? $ID_RENCANA_ALAT : 0;
		$ID_IUIPHHK = htmlentities($this->input->post('ID_IUIPHHK'),ENT_QUOTES);
		$ID_IUIPHHK = is_numeric($ID_IUIPHHK) ? $ID_IUIPHHK : 0;
		$NAMA_ALAT = htmlentities($this->input->post('NAMA_ALAT'),ENT_QUOTES);
		$JUMLAH = htmlentities($this->input->post('JUMLAH'),ENT_QUOTES);
		$JUMLAH = is_numeric($JUMLAH) ? $JUMLAH : 0;
		$KAPASITAS = htmlentities($this->input->post('KAPASITAS'),ENT_QUOTES);
		$MERK = htmlentities($this->input->post('MERK'),ENT_QUOTES);
		$TAHUN = htmlentities($this->input->post('TAHUN'),ENT_QUOTES);
		$TAHUN = is_numeric($TAHUN) ? $TAHUN : 0;
		$NEGARA = htmlentities($this->input->post('NEGARA'),ENT_QUOTES);
		$HARGA = htmlentities($this->input->post('HARGA'),ENT_QUOTES);
		$HARGA = is_numeric($HARGA) ? $HARGA : 0;
		$JENIS = htmlentities($this->input->post('JENIS'),ENT_QUOTES);
		$JENIS = is_numeric($JENIS) ? $JENIS : 0;
				
		$iphhk_rencana_alat_author = $this->m_iuiphhk_rencana_alat->__checkSession();
		$iphhk_rencana_alat_created_date = date('Y-m-d H:i:s');
		
		if($iphhk_rencana_alat_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_RENCANA_ALAT'=>$ID_RENCANA_ALAT,
				'ID_IUIPHHK'=>$ID_IUIPHHK,
				'NAMA_ALAT'=>$NAMA_ALAT,
				'JUMLAH'=>$JUMLAH,
				'KAPASITAS'=>$KAPASITAS,
				'MERK'=>$MERK,
				'TAHUN'=>$TAHUN,
				'NEGARA'=>$NEGARA,
				'HARGA'=>$HARGA,
				'JENIS'=>$JENIS,
				);
			$result = $this->m_iuiphhk_rencana_alat->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_RENCANA_ALAT = htmlentities($this->input->post('ID_RENCANA_ALAT'),ENT_QUOTES);
		$ID_RENCANA_ALAT = is_numeric($ID_RENCANA_ALAT) ? $ID_RENCANA_ALAT : 0;
		$ID_IUIPHHK = htmlentities($this->input->post('ID_IUIPHHK'),ENT_QUOTES);
		$ID_IUIPHHK = is_numeric($ID_IUIPHHK) ? $ID_IUIPHHK : 0;
		$NAMA_ALAT = htmlentities($this->input->post('NAMA_ALAT'),ENT_QUOTES);
		$JUMLAH = htmlentities($this->input->post('JUMLAH'),ENT_QUOTES);
		$JUMLAH = is_numeric($JUMLAH) ? $JUMLAH : 0;
		$KAPASITAS = htmlentities($this->input->post('KAPASITAS'),ENT_QUOTES);
		$MERK = htmlentities($this->input->post('MERK'),ENT_QUOTES);
		$TAHUN = htmlentities($this->input->post('TAHUN'),ENT_QUOTES);
		$TAHUN = is_numeric($TAHUN) ? $TAHUN : 0;
		$NEGARA = htmlentities($this->input->post('NEGARA'),ENT_QUOTES);
		$HARGA = htmlentities($this->input->post('HARGA'),ENT_QUOTES);
		$HARGA = is_numeric($HARGA) ? $HARGA : 0;
		$JENIS = htmlentities($this->input->post('JENIS'),ENT_QUOTES);
		$JENIS = is_numeric($JENIS) ? $JENIS : 0;
				
		$iphhk_rencana_alat_updated_by = $this->m_iuiphhk_rencana_alat->__checkSession();
		$iphhk_rencana_alat_updated_date = date('Y-m-d H:i:s');
		
		if($iphhk_rencana_alat_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IUIPHHK'=>$ID_IUIPHHK,
				'NAMA_ALAT'=>$NAMA_ALAT,
				'JUMLAH'=>$JUMLAH,
				'KAPASITAS'=>$KAPASITAS,
				'MERK'=>$MERK,
				'TAHUN'=>$TAHUN,
				'NEGARA'=>$NEGARA,
				'HARGA'=>$HARGA,
				'JENIS'=>$JENIS,
				);
			$result = $this->m_iuiphhk_rencana_alat->__update($data, $ID_RENCANA_ALAT, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_iuiphhk_rencana_alat->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_IUIPHHK = htmlentities($this->input->post('ID_IUIPHHK'),ENT_QUOTES);
		$ID_IUIPHHK = is_numeric($ID_IUIPHHK) ? $ID_IUIPHHK : 0;
		$NAMA_ALAT = htmlentities($this->input->post('NAMA_ALAT'),ENT_QUOTES);
		$JUMLAH = htmlentities($this->input->post('JUMLAH'),ENT_QUOTES);
		$JUMLAH = is_numeric($JUMLAH) ? $JUMLAH : 0;
		$KAPASITAS = htmlentities($this->input->post('KAPASITAS'),ENT_QUOTES);
		$MERK = htmlentities($this->input->post('MERK'),ENT_QUOTES);
		$TAHUN = htmlentities($this->input->post('TAHUN'),ENT_QUOTES);
		$TAHUN = is_numeric($TAHUN) ? $TAHUN : 0;
		$NEGARA = htmlentities($this->input->post('NEGARA'),ENT_QUOTES);
		$HARGA = htmlentities($this->input->post('HARGA'),ENT_QUOTES);
		$HARGA = is_numeric($HARGA) ? $HARGA : 0;
		$JENIS = htmlentities($this->input->post('JENIS'),ENT_QUOTES);
		$JENIS = is_numeric($JENIS) ? $JENIS : 0;
				
		$params = array(
			'ID_IUIPHHK'=>$ID_IUIPHHK,
			'NAMA_ALAT'=>$NAMA_ALAT,
			'JUMLAH'=>$JUMLAH,
			'KAPASITAS'=>$KAPASITAS,
			'MERK'=>$MERK,
			'TAHUN'=>$TAHUN,
			'NEGARA'=>$NEGARA,
			'HARGA'=>$HARGA,
			'JENIS'=>$JENIS,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_iuiphhk_rencana_alat->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_IUIPHHK = htmlentities($this->input->post('ID_IUIPHHK'),ENT_QUOTES);
		$ID_IUIPHHK = is_numeric($ID_IUIPHHK) ? $ID_IUIPHHK : 0;
		$NAMA_ALAT = htmlentities($this->input->post('NAMA_ALAT'),ENT_QUOTES);
		$JUMLAH = htmlentities($this->input->post('JUMLAH'),ENT_QUOTES);
		$JUMLAH = is_numeric($JUMLAH) ? $JUMLAH : 0;
		$KAPASITAS = htmlentities($this->input->post('KAPASITAS'),ENT_QUOTES);
		$MERK = htmlentities($this->input->post('MERK'),ENT_QUOTES);
		$TAHUN = htmlentities($this->input->post('TAHUN'),ENT_QUOTES);
		$TAHUN = is_numeric($TAHUN) ? $TAHUN : 0;
		$NEGARA = htmlentities($this->input->post('NEGARA'),ENT_QUOTES);
		$HARGA = htmlentities($this->input->post('HARGA'),ENT_QUOTES);
		$HARGA = is_numeric($HARGA) ? $HARGA : 0;
		$JENIS = htmlentities($this->input->post('JENIS'),ENT_QUOTES);
		$JENIS = is_numeric($JENIS) ? $JENIS : 0;
				
		$params = array(
			'searchText' => $searchText,
			'ID_IUIPHHK'=>$ID_IUIPHHK,
			'NAMA_ALAT'=>$NAMA_ALAT,
			'JUMLAH'=>$JUMLAH,
			'KAPASITAS'=>$KAPASITAS,
			'MERK'=>$MERK,
			'TAHUN'=>$TAHUN,
			'NEGARA'=>$NEGARA,
			'HARGA'=>$HARGA,
			'JENIS'=>$JENIS,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_iuiphhk_rencana_alat->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_iuiphhk_rencana_alat.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/iuiphhk_rencana_alat_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/iuiphhk_rencana_alat_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}