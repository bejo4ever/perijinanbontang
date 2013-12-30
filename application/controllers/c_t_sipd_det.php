<?php
class C_t_sipd_det extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_sipd_det');
	}
	
	function index(){
		$this->load->view('main/v_t_sipd_det');
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
		$result = $this->m_t_sipd_det->getList($params);
		echo $result;
	}
	
	function create(){
		$det_sipd_id = htmlentities($this->input->post('det_sipd_id'),ENT_QUOTES);
		$det_sipd_id = is_numeric($det_sipd_id) ? $det_sipd_id : 0;
		$det_sipd_sipd_id = htmlentities($this->input->post('det_sipd_sipd_id'),ENT_QUOTES);
		$det_sipd_sipd_id = is_numeric($det_sipd_sipd_id) ? $det_sipd_sipd_id : 0;
		$det_sipd_jenis = htmlentities($this->input->post('det_sipd_jenis'),ENT_QUOTES);
		$det_sipd_jenis = is_numeric($det_sipd_jenis) ? $det_sipd_jenis : 0;
		$det_sipd_tanggal = htmlentities($this->input->post('det_sipd_tanggal'),ENT_QUOTES);
		$det_sipd_pemohon_id = htmlentities($this->input->post('det_sipd_pemohon_id'),ENT_QUOTES);
		$det_sipd_pemohon_id = is_numeric($det_sipd_pemohon_id) ? $det_sipd_pemohon_id : 0;
		$det_sipd_nomorreg = htmlentities($this->input->post('det_sipd_nomorreg'),ENT_QUOTES);
		$det_sipd_proses = htmlentities($this->input->post('det_sipd_proses'),ENT_QUOTES);
		$det_sipd_sk = htmlentities($this->input->post('det_sipd_sk'),ENT_QUOTES);
		$det_sipd_skurut = htmlentities($this->input->post('det_sipd_skurut'),ENT_QUOTES);
		$det_sipd_skurut = is_numeric($det_sipd_skurut) ? $det_sipd_skurut : 0;
		$det_sipd_berlaku = htmlentities($this->input->post('det_sipd_berlaku'),ENT_QUOTES);
		$det_sipd_kadaluarsa = htmlentities($this->input->post('det_sipd_kadaluarsa'),ENT_QUOTES);
		$det_sipd_terima = htmlentities($this->input->post('det_sipd_terima'),ENT_QUOTES);
		$det_sipd_terimatanggal = htmlentities($this->input->post('det_sipd_terimatanggal'),ENT_QUOTES);
		$det_sipd_kelengkapan = htmlentities($this->input->post('det_sipd_kelengkapan'),ENT_QUOTES);
		$det_sipd_kelengkapan = is_numeric($det_sipd_kelengkapan) ? $det_sipd_kelengkapan : 0;
		$det_sipd_bap = htmlentities($this->input->post('det_sipd_bap'),ENT_QUOTES);
		$det_sipd_keputusan = htmlentities($this->input->post('det_sipd_keputusan'),ENT_QUOTES);
		$det_sipd_keputusan = is_numeric($det_sipd_keputusan) ? $det_sipd_keputusan : 0;
		$det_sipd_baptanggal = htmlentities($this->input->post('det_sipd_baptanggal'),ENT_QUOTES);
		$det_sipd_sip = htmlentities($this->input->post('det_sipd_sip'),ENT_QUOTES);
		$det_sipd_nrop = htmlentities($this->input->post('det_sipd_nrop'),ENT_QUOTES);
		$det_sipd_str = htmlentities($this->input->post('det_sipd_str'),ENT_QUOTES);
		$det_sipd_kompetensi = htmlentities($this->input->post('det_sipd_kompetensi'),ENT_QUOTES);
				
		$sipd_det_author = $this->m_t_sipd_det->__checkSession();
		$sipd_det_created_date = date('Y-m-d H:i:s');
		
		if($sipd_det_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_sipd_id'=>$det_sipd_id,
				'det_sipd_sipd_id'=>$det_sipd_sipd_id,
				'det_sipd_jenis'=>$det_sipd_jenis,
				'det_sipd_tanggal'=>$det_sipd_tanggal,
				'det_sipd_pemohon_id'=>$det_sipd_pemohon_id,
				'det_sipd_nomorreg'=>$det_sipd_nomorreg,
				'det_sipd_proses'=>$det_sipd_proses,
				'det_sipd_sk'=>$det_sipd_sk,
				'det_sipd_skurut'=>$det_sipd_skurut,
				'det_sipd_berlaku'=>$det_sipd_berlaku,
				'det_sipd_kadaluarsa'=>$det_sipd_kadaluarsa,
				'det_sipd_terima'=>$det_sipd_terima,
				'det_sipd_terimatanggal'=>$det_sipd_terimatanggal,
				'det_sipd_kelengkapan'=>$det_sipd_kelengkapan,
				'det_sipd_bap'=>$det_sipd_bap,
				'det_sipd_keputusan'=>$det_sipd_keputusan,
				'det_sipd_baptanggal'=>$det_sipd_baptanggal,
				'det_sipd_sip'=>$det_sipd_sip,
				'det_sipd_nrop'=>$det_sipd_nrop,
				'det_sipd_str'=>$det_sipd_str,
				'det_sipd_kompetensi'=>$det_sipd_kompetensi,
				);
			$result = $this->m_t_sipd_det->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$det_sipd_id = htmlentities($this->input->post('det_sipd_id'),ENT_QUOTES);
		$det_sipd_id = is_numeric($det_sipd_id) ? $det_sipd_id : 0;
		$det_sipd_sipd_id = htmlentities($this->input->post('det_sipd_sipd_id'),ENT_QUOTES);
		$det_sipd_sipd_id = is_numeric($det_sipd_sipd_id) ? $det_sipd_sipd_id : 0;
		$det_sipd_jenis = htmlentities($this->input->post('det_sipd_jenis'),ENT_QUOTES);
		$det_sipd_jenis = is_numeric($det_sipd_jenis) ? $det_sipd_jenis : 0;
		$det_sipd_tanggal = htmlentities($this->input->post('det_sipd_tanggal'),ENT_QUOTES);
		$det_sipd_pemohon_id = htmlentities($this->input->post('det_sipd_pemohon_id'),ENT_QUOTES);
		$det_sipd_pemohon_id = is_numeric($det_sipd_pemohon_id) ? $det_sipd_pemohon_id : 0;
		$det_sipd_nomorreg = htmlentities($this->input->post('det_sipd_nomorreg'),ENT_QUOTES);
		$det_sipd_proses = htmlentities($this->input->post('det_sipd_proses'),ENT_QUOTES);
		$det_sipd_sk = htmlentities($this->input->post('det_sipd_sk'),ENT_QUOTES);
		$det_sipd_skurut = htmlentities($this->input->post('det_sipd_skurut'),ENT_QUOTES);
		$det_sipd_skurut = is_numeric($det_sipd_skurut) ? $det_sipd_skurut : 0;
		$det_sipd_berlaku = htmlentities($this->input->post('det_sipd_berlaku'),ENT_QUOTES);
		$det_sipd_kadaluarsa = htmlentities($this->input->post('det_sipd_kadaluarsa'),ENT_QUOTES);
		$det_sipd_terima = htmlentities($this->input->post('det_sipd_terima'),ENT_QUOTES);
		$det_sipd_terimatanggal = htmlentities($this->input->post('det_sipd_terimatanggal'),ENT_QUOTES);
		$det_sipd_kelengkapan = htmlentities($this->input->post('det_sipd_kelengkapan'),ENT_QUOTES);
		$det_sipd_kelengkapan = is_numeric($det_sipd_kelengkapan) ? $det_sipd_kelengkapan : 0;
		$det_sipd_bap = htmlentities($this->input->post('det_sipd_bap'),ENT_QUOTES);
		$det_sipd_keputusan = htmlentities($this->input->post('det_sipd_keputusan'),ENT_QUOTES);
		$det_sipd_keputusan = is_numeric($det_sipd_keputusan) ? $det_sipd_keputusan : 0;
		$det_sipd_baptanggal = htmlentities($this->input->post('det_sipd_baptanggal'),ENT_QUOTES);
		$det_sipd_sip = htmlentities($this->input->post('det_sipd_sip'),ENT_QUOTES);
		$det_sipd_nrop = htmlentities($this->input->post('det_sipd_nrop'),ENT_QUOTES);
		$det_sipd_str = htmlentities($this->input->post('det_sipd_str'),ENT_QUOTES);
		$det_sipd_kompetensi = htmlentities($this->input->post('det_sipd_kompetensi'),ENT_QUOTES);
				
		$sipd_det_updated_by = $this->m_t_sipd_det->__checkSession();
		$sipd_det_updated_date = date('Y-m-d H:i:s');
		
		if($sipd_det_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_sipd_sipd_id'=>$det_sipd_sipd_id,
				'det_sipd_jenis'=>$det_sipd_jenis,
				'det_sipd_tanggal'=>$det_sipd_tanggal,
				'det_sipd_pemohon_id'=>$det_sipd_pemohon_id,
				'det_sipd_nomorreg'=>$det_sipd_nomorreg,
				'det_sipd_proses'=>$det_sipd_proses,
				'det_sipd_sk'=>$det_sipd_sk,
				'det_sipd_skurut'=>$det_sipd_skurut,
				'det_sipd_berlaku'=>$det_sipd_berlaku,
				'det_sipd_kadaluarsa'=>$det_sipd_kadaluarsa,
				'det_sipd_terima'=>$det_sipd_terima,
				'det_sipd_terimatanggal'=>$det_sipd_terimatanggal,
				'det_sipd_kelengkapan'=>$det_sipd_kelengkapan,
				'det_sipd_bap'=>$det_sipd_bap,
				'det_sipd_keputusan'=>$det_sipd_keputusan,
				'det_sipd_baptanggal'=>$det_sipd_baptanggal,
				'det_sipd_sip'=>$det_sipd_sip,
				'det_sipd_nrop'=>$det_sipd_nrop,
				'det_sipd_str'=>$det_sipd_str,
				'det_sipd_kompetensi'=>$det_sipd_kompetensi,
				);
			$result = $this->m_t_sipd_det->__update($data, $det_sipd_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_sipd_det->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$det_sipd_sipd_id = htmlentities($this->input->post('det_sipd_sipd_id'),ENT_QUOTES);
		$det_sipd_sipd_id = is_numeric($det_sipd_sipd_id) ? $det_sipd_sipd_id : 0;
		$det_sipd_jenis = htmlentities($this->input->post('det_sipd_jenis'),ENT_QUOTES);
		$det_sipd_jenis = is_numeric($det_sipd_jenis) ? $det_sipd_jenis : 0;
		$det_sipd_tanggal = htmlentities($this->input->post('det_sipd_tanggal'),ENT_QUOTES);
		$det_sipd_pemohon_id = htmlentities($this->input->post('det_sipd_pemohon_id'),ENT_QUOTES);
		$det_sipd_pemohon_id = is_numeric($det_sipd_pemohon_id) ? $det_sipd_pemohon_id : 0;
		$det_sipd_nomorreg = htmlentities($this->input->post('det_sipd_nomorreg'),ENT_QUOTES);
		$det_sipd_proses = htmlentities($this->input->post('det_sipd_proses'),ENT_QUOTES);
		$det_sipd_sk = htmlentities($this->input->post('det_sipd_sk'),ENT_QUOTES);
		$det_sipd_skurut = htmlentities($this->input->post('det_sipd_skurut'),ENT_QUOTES);
		$det_sipd_skurut = is_numeric($det_sipd_skurut) ? $det_sipd_skurut : 0;
		$det_sipd_berlaku = htmlentities($this->input->post('det_sipd_berlaku'),ENT_QUOTES);
		$det_sipd_kadaluarsa = htmlentities($this->input->post('det_sipd_kadaluarsa'),ENT_QUOTES);
		$det_sipd_terima = htmlentities($this->input->post('det_sipd_terima'),ENT_QUOTES);
		$det_sipd_terimatanggal = htmlentities($this->input->post('det_sipd_terimatanggal'),ENT_QUOTES);
		$det_sipd_kelengkapan = htmlentities($this->input->post('det_sipd_kelengkapan'),ENT_QUOTES);
		$det_sipd_kelengkapan = is_numeric($det_sipd_kelengkapan) ? $det_sipd_kelengkapan : 0;
		$det_sipd_bap = htmlentities($this->input->post('det_sipd_bap'),ENT_QUOTES);
		$det_sipd_keputusan = htmlentities($this->input->post('det_sipd_keputusan'),ENT_QUOTES);
		$det_sipd_keputusan = is_numeric($det_sipd_keputusan) ? $det_sipd_keputusan : 0;
		$det_sipd_baptanggal = htmlentities($this->input->post('det_sipd_baptanggal'),ENT_QUOTES);
		$det_sipd_sip = htmlentities($this->input->post('det_sipd_sip'),ENT_QUOTES);
		$det_sipd_nrop = htmlentities($this->input->post('det_sipd_nrop'),ENT_QUOTES);
		$det_sipd_str = htmlentities($this->input->post('det_sipd_str'),ENT_QUOTES);
		$det_sipd_kompetensi = htmlentities($this->input->post('det_sipd_kompetensi'),ENT_QUOTES);
				
		$params = array(
			'det_sipd_sipd_id'=>$det_sipd_sipd_id,
			'det_sipd_jenis'=>$det_sipd_jenis,
			'det_sipd_tanggal'=>$det_sipd_tanggal,
			'det_sipd_pemohon_id'=>$det_sipd_pemohon_id,
			'det_sipd_nomorreg'=>$det_sipd_nomorreg,
			'det_sipd_proses'=>$det_sipd_proses,
			'det_sipd_sk'=>$det_sipd_sk,
			'det_sipd_skurut'=>$det_sipd_skurut,
			'det_sipd_berlaku'=>$det_sipd_berlaku,
			'det_sipd_kadaluarsa'=>$det_sipd_kadaluarsa,
			'det_sipd_terima'=>$det_sipd_terima,
			'det_sipd_terimatanggal'=>$det_sipd_terimatanggal,
			'det_sipd_kelengkapan'=>$det_sipd_kelengkapan,
			'det_sipd_bap'=>$det_sipd_bap,
			'det_sipd_keputusan'=>$det_sipd_keputusan,
			'det_sipd_baptanggal'=>$det_sipd_baptanggal,
			'det_sipd_sip'=>$det_sipd_sip,
			'det_sipd_nrop'=>$det_sipd_nrop,
			'det_sipd_str'=>$det_sipd_str,
			'det_sipd_kompetensi'=>$det_sipd_kompetensi,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_sipd_det->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$det_sipd_sipd_id = htmlentities($this->input->post('det_sipd_sipd_id'),ENT_QUOTES);
		$det_sipd_sipd_id = is_numeric($det_sipd_sipd_id) ? $det_sipd_sipd_id : 0;
		$det_sipd_jenis = htmlentities($this->input->post('det_sipd_jenis'),ENT_QUOTES);
		$det_sipd_jenis = is_numeric($det_sipd_jenis) ? $det_sipd_jenis : 0;
		$det_sipd_tanggal = htmlentities($this->input->post('det_sipd_tanggal'),ENT_QUOTES);
		$det_sipd_pemohon_id = htmlentities($this->input->post('det_sipd_pemohon_id'),ENT_QUOTES);
		$det_sipd_pemohon_id = is_numeric($det_sipd_pemohon_id) ? $det_sipd_pemohon_id : 0;
		$det_sipd_nomorreg = htmlentities($this->input->post('det_sipd_nomorreg'),ENT_QUOTES);
		$det_sipd_proses = htmlentities($this->input->post('det_sipd_proses'),ENT_QUOTES);
		$det_sipd_sk = htmlentities($this->input->post('det_sipd_sk'),ENT_QUOTES);
		$det_sipd_skurut = htmlentities($this->input->post('det_sipd_skurut'),ENT_QUOTES);
		$det_sipd_skurut = is_numeric($det_sipd_skurut) ? $det_sipd_skurut : 0;
		$det_sipd_berlaku = htmlentities($this->input->post('det_sipd_berlaku'),ENT_QUOTES);
		$det_sipd_kadaluarsa = htmlentities($this->input->post('det_sipd_kadaluarsa'),ENT_QUOTES);
		$det_sipd_terima = htmlentities($this->input->post('det_sipd_terima'),ENT_QUOTES);
		$det_sipd_terimatanggal = htmlentities($this->input->post('det_sipd_terimatanggal'),ENT_QUOTES);
		$det_sipd_kelengkapan = htmlentities($this->input->post('det_sipd_kelengkapan'),ENT_QUOTES);
		$det_sipd_kelengkapan = is_numeric($det_sipd_kelengkapan) ? $det_sipd_kelengkapan : 0;
		$det_sipd_bap = htmlentities($this->input->post('det_sipd_bap'),ENT_QUOTES);
		$det_sipd_keputusan = htmlentities($this->input->post('det_sipd_keputusan'),ENT_QUOTES);
		$det_sipd_keputusan = is_numeric($det_sipd_keputusan) ? $det_sipd_keputusan : 0;
		$det_sipd_baptanggal = htmlentities($this->input->post('det_sipd_baptanggal'),ENT_QUOTES);
		$det_sipd_sip = htmlentities($this->input->post('det_sipd_sip'),ENT_QUOTES);
		$det_sipd_nrop = htmlentities($this->input->post('det_sipd_nrop'),ENT_QUOTES);
		$det_sipd_str = htmlentities($this->input->post('det_sipd_str'),ENT_QUOTES);
		$det_sipd_kompetensi = htmlentities($this->input->post('det_sipd_kompetensi'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'det_sipd_sipd_id'=>$det_sipd_sipd_id,
			'det_sipd_jenis'=>$det_sipd_jenis,
			'det_sipd_tanggal'=>$det_sipd_tanggal,
			'det_sipd_pemohon_id'=>$det_sipd_pemohon_id,
			'det_sipd_nomorreg'=>$det_sipd_nomorreg,
			'det_sipd_proses'=>$det_sipd_proses,
			'det_sipd_sk'=>$det_sipd_sk,
			'det_sipd_skurut'=>$det_sipd_skurut,
			'det_sipd_berlaku'=>$det_sipd_berlaku,
			'det_sipd_kadaluarsa'=>$det_sipd_kadaluarsa,
			'det_sipd_terima'=>$det_sipd_terima,
			'det_sipd_terimatanggal'=>$det_sipd_terimatanggal,
			'det_sipd_kelengkapan'=>$det_sipd_kelengkapan,
			'det_sipd_bap'=>$det_sipd_bap,
			'det_sipd_keputusan'=>$det_sipd_keputusan,
			'det_sipd_baptanggal'=>$det_sipd_baptanggal,
			'det_sipd_sip'=>$det_sipd_sip,
			'det_sipd_nrop'=>$det_sipd_nrop,
			'det_sipd_str'=>$det_sipd_str,
			'det_sipd_kompetensi'=>$det_sipd_kompetensi,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_sipd_det->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_sipd_det.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_sipd_det_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_sipd_det_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}