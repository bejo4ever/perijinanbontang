<?php
class C_t_idam_det extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_idam_det');
	}
	
	function index(){
		$this->load->view('main/v_t_idam_det');
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
			case 'GETSYARAT':
				$this->getSyarat();
			break;
			case 'CHANGESURVEYSTATUS':
				$this->changeSurveyStatus();
			break;
			case 'CETAKLEMBARKONTROL':
				$this->cetakLembarKontrol();
			break;
			case 'CETAKSK':
				$this->cetakSk();
			break;
			case 'CETAKBP':
				$this->cetakBp();
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
		$result = $this->m_t_idam_det->getList($params);
		echo $result;
	}
	
	function create(){
		$det_idam_namausaha = htmlentities($this->input->post('det_idam_namausaha'),ENT_QUOTES);
		$det_idam_jenisusaha = htmlentities($this->input->post('det_idam_jenisusaha'),ENT_QUOTES);
		$det_idam_alamatusaha = htmlentities($this->input->post('det_idam_alamatusaha'),ENT_QUOTES);
		$det_idam_nospkp = htmlentities($this->input->post('det_idam_nospkp'),ENT_QUOTES);
		
		$det_idam_id = htmlentities($this->input->post('det_idam_id'),ENT_QUOTES);
		$det_idam_id = is_numeric($det_idam_id) ? $det_idam_id : 0;
		$det_idam_idam_id = htmlentities($this->input->post('det_idam_idam_id'),ENT_QUOTES);
		$det_idam_idam_id = is_numeric($det_idam_idam_id) ? $det_idam_idam_id : 0;
		$det_idam_jenis = htmlentities($this->input->post('det_idam_jenis'),ENT_QUOTES);
		$det_idam_jenis = is_numeric($det_idam_jenis) ? $det_idam_jenis : 0;
		$det_idam_tanggal = htmlentities($this->input->post('det_idam_tanggal'),ENT_QUOTES);
		$det_idam_nama = htmlentities($this->input->post('det_idam_nama'),ENT_QUOTES);
		$det_idam_alamat = htmlentities($this->input->post('det_idam_alamat'),ENT_QUOTES);
		$det_idam_telp = htmlentities($this->input->post('det_idam_telp'),ENT_QUOTES);
		$det_idam_tempatlahir = htmlentities($this->input->post('det_idam_tempatlahir'),ENT_QUOTES);
		$det_idam_tanggallahir = htmlentities($this->input->post('det_idam_tanggallahir'),ENT_QUOTES);
		$det_idam_pendidikan = htmlentities($this->input->post('det_idam_pendidikan'),ENT_QUOTES);
		$det_idam_tahunlulus = htmlentities($this->input->post('det_idam_tahunlulus'),ENT_QUOTES);
		$det_idam_tahunlulus = is_numeric($det_idam_tahunlulus) ? $det_idam_tahunlulus : 0;
		$det_idam_status = htmlentities($this->input->post('det_idam_status'),ENT_QUOTES);
		$det_idam_keterangan = htmlentities($this->input->post('det_idam_keterangan'),ENT_QUOTES);
		$det_idam_bap = htmlentities($this->input->post('det_idam_bap'),ENT_QUOTES);
		$det_idam_baptanggal = htmlentities($this->input->post('det_idam_baptanggal'),ENT_QUOTES);
		$det_idam_kelengkapan = htmlentities($this->input->post('det_idam_kelengkapan'),ENT_QUOTES);
		$det_idam_kelengkapan = is_numeric($det_idam_kelengkapan) ? $det_idam_kelengkapan : 0;
		$det_idam_terima = htmlentities($this->input->post('det_idam_terima'),ENT_QUOTES);
		$det_idam_terimatanggal = htmlentities($this->input->post('det_idam_terimatanggal'),ENT_QUOTES);
		$det_idam_sk = htmlentities($this->input->post('det_idam_sk'),ENT_QUOTES);
		$det_idam_skurut = htmlentities($this->input->post('det_idam_skurut'),ENT_QUOTES);
		$det_idam_skurut = is_numeric($det_idam_skurut) ? $det_idam_skurut : 0;
		$det_idam_berlaku = htmlentities($this->input->post('det_idam_berlaku'),ENT_QUOTES);
		$det_idam_kadaluarsa = htmlentities($this->input->post('det_idam_kadaluarsa'),ENT_QUOTES);
		$det_idam_nomorreg = htmlentities($this->input->post('det_idam_nomorreg'),ENT_QUOTES);
		
		$idam_cek_id = json_decode($this->input->post('idam_cek_id'));
		$idam_cek_syarat_id = json_decode($this->input->post('idam_cek_syarat_id'));
		$idam_cek_status = json_decode($this->input->post('idam_cek_status'));
		$idam_cek_keterangan = json_decode($this->input->post('idam_cek_keterangan'));
				
		$idam_det_author = $this->m_t_idam_det->__checkSession();
		$idam_det_created_date = date('Y-m-d H:i:s');
		
		if($idam_det_author != ''){
			$dataInti = array(
				'idam_usaha'=>$det_idam_namausaha,
				'idam_jenisusaha'=>$det_idam_jenisusaha,
				'idam_alamat'=>$det_idam_alamatusaha,
				'idam_sertifikatpkp'=>$det_idam_nospkp
			);
			$resultInti = $this->m_t_idam_det->__insert($dataInti, 't_idam', 'insertId');
			if($resultInti != 0){
				$result = 'success';
				$data = array(
					'det_idam_idam_id'=>$resultInti,
					'det_idam_jenis'=>$det_idam_jenis,
					'det_idam_tanggal'=>$det_idam_tanggal,
					'det_idam_nama'=>$det_idam_nama,
					'det_idam_alamat'=>$det_idam_alamat,
					'det_idam_telp'=>$det_idam_telp,
					'det_idam_tempatlahir'=>$det_idam_tempatlahir,
					'det_idam_tanggallahir'=>$det_idam_tanggallahir,
					'det_idam_pendidikan'=>$det_idam_pendidikan,
					'det_idam_tahunlulus'=>$det_idam_tahunlulus,
					'det_idam_status'=>$det_idam_status,
					'det_idam_keterangan'=>$det_idam_keterangan,
					'det_idam_bap'=>$det_idam_bap,
					'det_idam_baptanggal'=>$det_idam_baptanggal,
					'det_idam_kelengkapan'=>$det_idam_kelengkapan,
					'det_idam_terima'=>$det_idam_terima,
					'det_idam_terimatanggal'=>$det_idam_terimatanggal,
					'det_idam_sk'=>$det_idam_sk,
					'det_idam_skurut'=>$det_idam_skurut,
					'det_idam_berlaku'=>$det_idam_berlaku,
					'det_idam_kadaluarsa'=>$det_idam_kadaluarsa,
					'det_idam_nomorreg'=>$det_idam_nomorreg,
					);
				$resultdet = $this->m_t_idam_det->__insert($data, false, 'insertId');
				for($i=0;$i<count($idam_cek_syarat_id);$i++){
					$datacek = array(
						'idam_cek_syarat_id'=>$idam_cek_syarat_id[$i],
						'idam_cek_idam_id'=>$resultInti,
						'idam_cek_idamdet_id'=>$resultdet,
						'idam_cek_status'=>$idam_cek_status[$i],
						'idam_cek_keterangan'=>$idam_cek_keterangan[$i]
					);
					$resultcek = $this->m_t_idam_det->__insert($datacek, 't_idam_ceklist', 'insertId');
				}
			}else{
				$result = 'fail';
			}
			
		}else{
			$result = 'sessionExpired';
		}
		echo $result;
	}
	
	function update(){
		$det_idam_id = htmlentities($this->input->post('det_idam_id'),ENT_QUOTES);
		$det_idam_id = is_numeric($det_idam_id) ? $det_idam_id : 0;
		$det_idam_idam_id = htmlentities($this->input->post('det_idam_idam_id'),ENT_QUOTES);
		$det_idam_idam_id = is_numeric($det_idam_idam_id) ? $det_idam_idam_id : 0;
		$det_idam_jenis = htmlentities($this->input->post('det_idam_jenis'),ENT_QUOTES);
		$det_idam_jenis = is_numeric($det_idam_jenis) ? $det_idam_jenis : 0;
		$det_idam_tanggal = htmlentities($this->input->post('det_idam_tanggal'),ENT_QUOTES);
		$det_idam_nama = htmlentities($this->input->post('det_idam_nama'),ENT_QUOTES);
		$det_idam_alamat = htmlentities($this->input->post('det_idam_alamat'),ENT_QUOTES);
		$det_idam_telp = htmlentities($this->input->post('det_idam_telp'),ENT_QUOTES);
		$det_idam_tempatlahir = htmlentities($this->input->post('det_idam_tempatlahir'),ENT_QUOTES);
		$det_idam_tanggallahir = htmlentities($this->input->post('det_idam_tanggallahir'),ENT_QUOTES);
		$det_idam_pendidikan = htmlentities($this->input->post('det_idam_pendidikan'),ENT_QUOTES);
		$det_idam_tahunlulus = htmlentities($this->input->post('det_idam_tahunlulus'),ENT_QUOTES);
		$det_idam_tahunlulus = is_numeric($det_idam_tahunlulus) ? $det_idam_tahunlulus : 0;
		$det_idam_status = htmlentities($this->input->post('det_idam_status'),ENT_QUOTES);
		$det_idam_keterangan = htmlentities($this->input->post('det_idam_keterangan'),ENT_QUOTES);
		$det_idam_bap = htmlentities($this->input->post('det_idam_bap'),ENT_QUOTES);
		$det_idam_baptanggal = htmlentities($this->input->post('det_idam_baptanggal'),ENT_QUOTES);
		$det_idam_kelengkapan = htmlentities($this->input->post('det_idam_kelengkapan'),ENT_QUOTES);
		$det_idam_kelengkapan = is_numeric($det_idam_kelengkapan) ? $det_idam_kelengkapan : 0;
		$det_idam_terima = htmlentities($this->input->post('det_idam_terima'),ENT_QUOTES);
		$det_idam_terimatanggal = htmlentities($this->input->post('det_idam_terimatanggal'),ENT_QUOTES);
		$det_idam_sk = htmlentities($this->input->post('det_idam_sk'),ENT_QUOTES);
		$det_idam_skurut = htmlentities($this->input->post('det_idam_skurut'),ENT_QUOTES);
		$det_idam_skurut = is_numeric($det_idam_skurut) ? $det_idam_skurut : 0;
		$det_idam_berlaku = htmlentities($this->input->post('det_idam_berlaku'),ENT_QUOTES);
		$det_idam_kadaluarsa = htmlentities($this->input->post('det_idam_kadaluarsa'),ENT_QUOTES);
		$det_idam_nomorreg = htmlentities($this->input->post('det_idam_nomorreg'),ENT_QUOTES);
				
		$idam_det_updated_by = $this->m_t_idam_det->__checkSession();
		$idam_det_updated_date = date('Y-m-d H:i:s');
		
		if($idam_det_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_idam_idam_id'=>$det_idam_idam_id,
				'det_idam_jenis'=>$det_idam_jenis,
				'det_idam_tanggal'=>$det_idam_tanggal,
				'det_idam_nama'=>$det_idam_nama,
				'det_idam_alamat'=>$det_idam_alamat,
				'det_idam_telp'=>$det_idam_telp,
				'det_idam_tempatlahir'=>$det_idam_tempatlahir,
				'det_idam_tanggallahir'=>$det_idam_tanggallahir,
				'det_idam_pendidikan'=>$det_idam_pendidikan,
				'det_idam_tahunlulus'=>$det_idam_tahunlulus,
				'det_idam_status'=>$det_idam_status,
				'det_idam_keterangan'=>$det_idam_keterangan,
				'det_idam_bap'=>$det_idam_bap,
				'det_idam_baptanggal'=>$det_idam_baptanggal,
				'det_idam_kelengkapan'=>$det_idam_kelengkapan,
				'det_idam_terima'=>$det_idam_terima,
				'det_idam_terimatanggal'=>$det_idam_terimatanggal,
				'det_idam_sk'=>$det_idam_sk,
				'det_idam_skurut'=>$det_idam_skurut,
				'det_idam_berlaku'=>$det_idam_berlaku,
				'det_idam_kadaluarsa'=>$det_idam_kadaluarsa,
				'det_idam_nomorreg'=>$det_idam_nomorreg,
				);
			$result = $this->m_t_idam_det->__update($data, $det_idam_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_idam_det->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$det_idam_idam_id = htmlentities($this->input->post('det_idam_idam_id'),ENT_QUOTES);
		$det_idam_idam_id = is_numeric($det_idam_idam_id) ? $det_idam_idam_id : 0;
		$det_idam_jenis = htmlentities($this->input->post('det_idam_jenis'),ENT_QUOTES);
		$det_idam_jenis = is_numeric($det_idam_jenis) ? $det_idam_jenis : 0;
		$det_idam_tanggal = htmlentities($this->input->post('det_idam_tanggal'),ENT_QUOTES);
		$det_idam_nama = htmlentities($this->input->post('det_idam_nama'),ENT_QUOTES);
		$det_idam_alamat = htmlentities($this->input->post('det_idam_alamat'),ENT_QUOTES);
		$det_idam_telp = htmlentities($this->input->post('det_idam_telp'),ENT_QUOTES);
		$det_idam_tempatlahir = htmlentities($this->input->post('det_idam_tempatlahir'),ENT_QUOTES);
		$det_idam_tanggallahir = htmlentities($this->input->post('det_idam_tanggallahir'),ENT_QUOTES);
		$det_idam_pendidikan = htmlentities($this->input->post('det_idam_pendidikan'),ENT_QUOTES);
		$det_idam_tahunlulus = htmlentities($this->input->post('det_idam_tahunlulus'),ENT_QUOTES);
		$det_idam_tahunlulus = is_numeric($det_idam_tahunlulus) ? $det_idam_tahunlulus : 0;
		$det_idam_status = htmlentities($this->input->post('det_idam_status'),ENT_QUOTES);
		$det_idam_keterangan = htmlentities($this->input->post('det_idam_keterangan'),ENT_QUOTES);
		$det_idam_bap = htmlentities($this->input->post('det_idam_bap'),ENT_QUOTES);
		$det_idam_baptanggal = htmlentities($this->input->post('det_idam_baptanggal'),ENT_QUOTES);
		$det_idam_kelengkapan = htmlentities($this->input->post('det_idam_kelengkapan'),ENT_QUOTES);
		$det_idam_kelengkapan = is_numeric($det_idam_kelengkapan) ? $det_idam_kelengkapan : 0;
		$det_idam_terima = htmlentities($this->input->post('det_idam_terima'),ENT_QUOTES);
		$det_idam_terimatanggal = htmlentities($this->input->post('det_idam_terimatanggal'),ENT_QUOTES);
		$det_idam_sk = htmlentities($this->input->post('det_idam_sk'),ENT_QUOTES);
		$det_idam_skurut = htmlentities($this->input->post('det_idam_skurut'),ENT_QUOTES);
		$det_idam_skurut = is_numeric($det_idam_skurut) ? $det_idam_skurut : 0;
		$det_idam_berlaku = htmlentities($this->input->post('det_idam_berlaku'),ENT_QUOTES);
		$det_idam_kadaluarsa = htmlentities($this->input->post('det_idam_kadaluarsa'),ENT_QUOTES);
		$det_idam_nomorreg = htmlentities($this->input->post('det_idam_nomorreg'),ENT_QUOTES);
				
		$params = array(
			'det_idam_idam_id'=>$det_idam_idam_id,
			'det_idam_jenis'=>$det_idam_jenis,
			'det_idam_tanggal'=>$det_idam_tanggal,
			'det_idam_nama'=>$det_idam_nama,
			'det_idam_alamat'=>$det_idam_alamat,
			'det_idam_telp'=>$det_idam_telp,
			'det_idam_tempatlahir'=>$det_idam_tempatlahir,
			'det_idam_tanggallahir'=>$det_idam_tanggallahir,
			'det_idam_pendidikan'=>$det_idam_pendidikan,
			'det_idam_tahunlulus'=>$det_idam_tahunlulus,
			'det_idam_status'=>$det_idam_status,
			'det_idam_keterangan'=>$det_idam_keterangan,
			'det_idam_bap'=>$det_idam_bap,
			'det_idam_baptanggal'=>$det_idam_baptanggal,
			'det_idam_kelengkapan'=>$det_idam_kelengkapan,
			'det_idam_terima'=>$det_idam_terima,
			'det_idam_terimatanggal'=>$det_idam_terimatanggal,
			'det_idam_sk'=>$det_idam_sk,
			'det_idam_skurut'=>$det_idam_skurut,
			'det_idam_berlaku'=>$det_idam_berlaku,
			'det_idam_kadaluarsa'=>$det_idam_kadaluarsa,
			'det_idam_nomorreg'=>$det_idam_nomorreg,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_idam_det->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$det_idam_idam_id = htmlentities($this->input->post('det_idam_idam_id'),ENT_QUOTES);
		$det_idam_idam_id = is_numeric($det_idam_idam_id) ? $det_idam_idam_id : 0;
		$det_idam_jenis = htmlentities($this->input->post('det_idam_jenis'),ENT_QUOTES);
		$det_idam_jenis = is_numeric($det_idam_jenis) ? $det_idam_jenis : 0;
		$det_idam_tanggal = htmlentities($this->input->post('det_idam_tanggal'),ENT_QUOTES);
		$det_idam_nama = htmlentities($this->input->post('det_idam_nama'),ENT_QUOTES);
		$det_idam_alamat = htmlentities($this->input->post('det_idam_alamat'),ENT_QUOTES);
		$det_idam_telp = htmlentities($this->input->post('det_idam_telp'),ENT_QUOTES);
		$det_idam_tempatlahir = htmlentities($this->input->post('det_idam_tempatlahir'),ENT_QUOTES);
		$det_idam_tanggallahir = htmlentities($this->input->post('det_idam_tanggallahir'),ENT_QUOTES);
		$det_idam_pendidikan = htmlentities($this->input->post('det_idam_pendidikan'),ENT_QUOTES);
		$det_idam_tahunlulus = htmlentities($this->input->post('det_idam_tahunlulus'),ENT_QUOTES);
		$det_idam_tahunlulus = is_numeric($det_idam_tahunlulus) ? $det_idam_tahunlulus : 0;
		$det_idam_status = htmlentities($this->input->post('det_idam_status'),ENT_QUOTES);
		$det_idam_keterangan = htmlentities($this->input->post('det_idam_keterangan'),ENT_QUOTES);
		$det_idam_bap = htmlentities($this->input->post('det_idam_bap'),ENT_QUOTES);
		$det_idam_baptanggal = htmlentities($this->input->post('det_idam_baptanggal'),ENT_QUOTES);
		$det_idam_kelengkapan = htmlentities($this->input->post('det_idam_kelengkapan'),ENT_QUOTES);
		$det_idam_kelengkapan = is_numeric($det_idam_kelengkapan) ? $det_idam_kelengkapan : 0;
		$det_idam_terima = htmlentities($this->input->post('det_idam_terima'),ENT_QUOTES);
		$det_idam_terimatanggal = htmlentities($this->input->post('det_idam_terimatanggal'),ENT_QUOTES);
		$det_idam_sk = htmlentities($this->input->post('det_idam_sk'),ENT_QUOTES);
		$det_idam_skurut = htmlentities($this->input->post('det_idam_skurut'),ENT_QUOTES);
		$det_idam_skurut = is_numeric($det_idam_skurut) ? $det_idam_skurut : 0;
		$det_idam_berlaku = htmlentities($this->input->post('det_idam_berlaku'),ENT_QUOTES);
		$det_idam_kadaluarsa = htmlentities($this->input->post('det_idam_kadaluarsa'),ENT_QUOTES);
		$det_idam_nomorreg = htmlentities($this->input->post('det_idam_nomorreg'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'det_idam_idam_id'=>$det_idam_idam_id,
			'det_idam_jenis'=>$det_idam_jenis,
			'det_idam_tanggal'=>$det_idam_tanggal,
			'det_idam_nama'=>$det_idam_nama,
			'det_idam_alamat'=>$det_idam_alamat,
			'det_idam_telp'=>$det_idam_telp,
			'det_idam_tempatlahir'=>$det_idam_tempatlahir,
			'det_idam_tanggallahir'=>$det_idam_tanggallahir,
			'det_idam_pendidikan'=>$det_idam_pendidikan,
			'det_idam_tahunlulus'=>$det_idam_tahunlulus,
			'det_idam_status'=>$det_idam_status,
			'det_idam_keterangan'=>$det_idam_keterangan,
			'det_idam_bap'=>$det_idam_bap,
			'det_idam_baptanggal'=>$det_idam_baptanggal,
			'det_idam_kelengkapan'=>$det_idam_kelengkapan,
			'det_idam_terima'=>$det_idam_terima,
			'det_idam_terimatanggal'=>$det_idam_terimatanggal,
			'det_idam_sk'=>$det_idam_sk,
			'det_idam_skurut'=>$det_idam_skurut,
			'det_idam_berlaku'=>$det_idam_berlaku,
			'det_idam_kadaluarsa'=>$det_idam_kadaluarsa,
			'det_idam_nomorreg'=>$det_idam_nomorreg,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_idam_det->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_idam_det.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_idam_det_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_idam_det_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$idam_id = $this->input->post('idam_id');
		$idam_det_id = $this->input->post('idam_det_id');
		$params = array(
			"currentAction"=>$currentAction,
			"idam_id"=>$idam_id,
			"idam_det_id"=>$idam_det_id
		);
		$result = $this->m_t_idam_det->getSyarat($params);
		echo $result;
	}
	function changeSurveyStatus(){
		$idamdet_id  = $this->input->post('idamdet_id');
		$lulus  = $this->input->post('lulus');
		$data = array(
			"det_idam_lulussurvey"=>$lulus
		);
		$result = $this->m_t_idam_det->__update($data, $idamdet_id, '', '');
		echo $result;
	}
	function cetakBp(){
		$idamdet_id  = $this->input->post('idamdet_id');
		$params = array(
			"det_idam_id"=>$idamdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_idam_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$print_view=$this->load->view('template/p_idam_buktiterima.php',$data,TRUE);
		$print_file=fopen('print/idam_buktipenerimaan.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakLembarKontrol(){
		$idamdet_id  = $this->input->post('idamdet_id');
		$params = array(
			"det_idam_id"=>$idamdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_idam_det->search($params);
		$dataceklist = $this->db->where('idam_cek_idamdet_id', $idamdet_id)->join('master_syarat','idam_cek_syarat_id = ID_SYARAT')->get('t_idam_ceklist')->result();
		$data['printrecord'] = $printrecord[1];
		$data['dataceklist'] = $dataceklist;
		$print_view=$this->load->view('template/p_idam_lembarkontrol.php',$data,TRUE);
		$print_file=fopen('print/idam_lembarkontrol.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakSk(){
		$idamdet_id  = $this->input->post('idamdet_id');
		$params = array(
			"det_idam_id"=>$idamdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_idam_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$print_view=$this->load->view('template/p_idam_sk.php',$data,TRUE);
		$print_file=fopen('print/idam_sk.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}