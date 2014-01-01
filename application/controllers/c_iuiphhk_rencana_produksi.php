<?php
class C_iuiphhk_rencana_produksi extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_iuiphhk_rencana_produksi');
	}
	
	function index(){
		$this->load->view('main/v_iuiphhk_rencana_produksi');
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
		$result = $this->m_iuiphhk_rencana_produksi->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_RENCANA_PRODUKSI = htmlentities($this->input->post('ID_RENCANA_PRODUKSI'),ENT_QUOTES);
		$ID_RENCANA_PRODUKSI = is_numeric($ID_RENCANA_PRODUKSI) ? $ID_RENCANA_PRODUKSI : 0;
		$ID_IUIPHHK = htmlentities($this->input->post('ID_IUIPHHK'),ENT_QUOTES);
		$ID_IUIPHHK = is_numeric($ID_IUIPHHK) ? $ID_IUIPHHK : 0;
		$JENIS_PRODUKSI = htmlentities($this->input->post('JENIS_PRODUKSI'),ENT_QUOTES);
		$KAPASITAS = htmlentities($this->input->post('KAPASITAS'),ENT_QUOTES);
		$KETERANGAN = htmlentities($this->input->post('KETERANGAN'),ENT_QUOTES);
				
		$iphhk_rencana_produksi_author = $this->m_iuiphhk_rencana_produksi->__checkSession();
		$iphhk_rencana_produksi_created_date = date('Y-m-d H:i:s');
		
		if($iphhk_rencana_produksi_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_RENCANA_PRODUKSI'=>$ID_RENCANA_PRODUKSI,
				'ID_IUIPHHK'=>$ID_IUIPHHK,
				'JENIS_PRODUKSI'=>$JENIS_PRODUKSI,
				'KAPASITAS'=>$KAPASITAS,
				'KETERANGAN'=>$KETERANGAN,
				);
			$result = $this->m_iuiphhk_rencana_produksi->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_RENCANA_PRODUKSI = htmlentities($this->input->post('ID_RENCANA_PRODUKSI'),ENT_QUOTES);
		$ID_RENCANA_PRODUKSI = is_numeric($ID_RENCANA_PRODUKSI) ? $ID_RENCANA_PRODUKSI : 0;
		$ID_IUIPHHK = htmlentities($this->input->post('ID_IUIPHHK'),ENT_QUOTES);
		$ID_IUIPHHK = is_numeric($ID_IUIPHHK) ? $ID_IUIPHHK : 0;
		$JENIS_PRODUKSI = htmlentities($this->input->post('JENIS_PRODUKSI'),ENT_QUOTES);
		$KAPASITAS = htmlentities($this->input->post('KAPASITAS'),ENT_QUOTES);
		$KETERANGAN = htmlentities($this->input->post('KETERANGAN'),ENT_QUOTES);
				
		$iphhk_rencana_produksi_updated_by = $this->m_iuiphhk_rencana_produksi->__checkSession();
		$iphhk_rencana_produksi_updated_date = date('Y-m-d H:i:s');
		
		if($iphhk_rencana_produksi_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IUIPHHK'=>$ID_IUIPHHK,
				'JENIS_PRODUKSI'=>$JENIS_PRODUKSI,
				'KAPASITAS'=>$KAPASITAS,
				'KETERANGAN'=>$KETERANGAN,
				);
			$result = $this->m_iuiphhk_rencana_produksi->__update($data, $ID_RENCANA_PRODUKSI, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_iuiphhk_rencana_produksi->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_IUIPHHK = htmlentities($this->input->post('ID_IUIPHHK'),ENT_QUOTES);
		$ID_IUIPHHK = is_numeric($ID_IUIPHHK) ? $ID_IUIPHHK : 0;
		$JENIS_PRODUKSI = htmlentities($this->input->post('JENIS_PRODUKSI'),ENT_QUOTES);
		$KAPASITAS = htmlentities($this->input->post('KAPASITAS'),ENT_QUOTES);
		$KETERANGAN = htmlentities($this->input->post('KETERANGAN'),ENT_QUOTES);
				
		$params = array(
			'ID_IUIPHHK'=>$ID_IUIPHHK,
			'JENIS_PRODUKSI'=>$JENIS_PRODUKSI,
			'KAPASITAS'=>$KAPASITAS,
			'KETERANGAN'=>$KETERANGAN,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_iuiphhk_rencana_produksi->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_IUIPHHK = htmlentities($this->input->post('ID_IUIPHHK'),ENT_QUOTES);
		$ID_IUIPHHK = is_numeric($ID_IUIPHHK) ? $ID_IUIPHHK : 0;
		$JENIS_PRODUKSI = htmlentities($this->input->post('JENIS_PRODUKSI'),ENT_QUOTES);
		$KAPASITAS = htmlentities($this->input->post('KAPASITAS'),ENT_QUOTES);
		$KETERANGAN = htmlentities($this->input->post('KETERANGAN'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'ID_IUIPHHK'=>$ID_IUIPHHK,
			'JENIS_PRODUKSI'=>$JENIS_PRODUKSI,
			'KAPASITAS'=>$KAPASITAS,
			'KETERANGAN'=>$KETERANGAN,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_iuiphhk_rencana_produksi->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_iuiphhk_rencana_produksi.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/iuiphhk_rencana_produksi_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/iuiphhk_rencana_produksi_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}