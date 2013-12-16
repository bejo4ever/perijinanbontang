<?php
class C_t_iujt_det extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_iujt_det');
	}
	
	function index(){
		$this->load->view('main/v_t_iujt_det');
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
			case 'REKOMENDASI':
				$this->cetakRekomendasi();
			break;
			case 'CETAKSK':
				$this->cetakSk();
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
		$result = $this->m_t_iujt_det->getList($params);
		echo $result;
	}
	
	function create(){
		$det_iujt_id = htmlentities($this->input->post('det_iujt_id'),ENT_QUOTES);
		$det_iujt_id = is_numeric($det_iujt_id) ? $det_iujt_id : 0;
		$det_iujt_iujt_id = htmlentities($this->input->post('det_iujt_iujt_id'),ENT_QUOTES);
		$det_iujt_iujt_id = is_numeric($det_iujt_iujt_id) ? $det_iujt_iujt_id : 0;
		$det_iujt_jenis = htmlentities($this->input->post('det_iujt_jenis'),ENT_QUOTES);
		$det_iujt_jenis = is_numeric($det_iujt_jenis) ? $det_iujt_jenis : 0;
		$det_iujt_nama = htmlentities($this->input->post('det_iujt_nama'),ENT_QUOTES);
		$det_iujt_npwp = htmlentities($this->input->post('det_iujt_npwp'),ENT_QUOTES);
		$det_iujt_alamat = htmlentities($this->input->post('det_iujt_alamat'),ENT_QUOTES);
		$det_iujt_sk = htmlentities($this->input->post('det_iujt_sk'),ENT_QUOTES);
		$det_iujt_berlaku = htmlentities($this->input->post('det_iujt_berlaku'),ENT_QUOTES);
		$det_iujt_kadaluarsa = htmlentities($this->input->post('det_iujt_kadaluarsa'),ENT_QUOTES);
		$det_iujt_surveylulus = htmlentities($this->input->post('det_iujt_surveylulus'),ENT_QUOTES);
		$det_iujt_surveylulus = is_numeric($det_iujt_surveylulus) ? $det_iujt_surveylulus : 0;
		$det_iujt_tanggal = htmlentities($this->input->post('det_iujt_tanggal'),ENT_QUOTES);
		$det_iujt_nopermohonan = htmlentities($this->input->post('det_iujt_nopermohonan'),ENT_QUOTES);
		$det_iujt_cekpetugas = htmlentities($this->input->post('det_iujt_cekpetugas'),ENT_QUOTES);
		$det_iujt_cektanggal = htmlentities($this->input->post('det_iujt_cektanggal'),ENT_QUOTES);
		$det_iujt_ceknip = htmlentities($this->input->post('det_iujt_ceknip'),ENT_QUOTES);
		$det_iujt_catatan = htmlentities($this->input->post('det_iujt_catatan'),ENT_QUOTES);
		
		$iujt_usaha = htmlentities($this->input->post('iujt_usaha'),ENT_QUOTES);
		$iujt_alamatusaha = htmlentities($this->input->post('iujt_alamatusaha'),ENT_QUOTES);
		$iujt_penanggungjawab = htmlentities($this->input->post('iujt_penanggungjawab'),ENT_QUOTES);
		
		$iujt_cek_id = json_decode($this->input->post('iujt_cek_id'));
		$iujt_cek_syarat_id = json_decode($this->input->post('iujt_cek_syarat_id'));
		$iujt_cek_status = json_decode($this->input->post('iujt_cek_status'));
		$iujt_cek_keterangan = json_decode($this->input->post('iujt_cek_keterangan'));
		
				
		$iujt_det_author = $this->m_t_iujt_det->__checkSession();
		$iujt_det_created_date = date('Y-m-d H:i:s');
		
		if($iujt_det_author != ''){
			$result = 'sessionExpired';
		}else{
			$dataInti = array(
				'iujt_usaha'=>$iujt_usaha,
				'iujt_alamatusaha'=>$iujt_alamatusaha,
				'iujt_penanggungjawab'=>$iujt_penanggungjawab
			);
			$resultInti = $this->m_t_iujt_det->__insert($dataInti, 't_iujt', 'insertId');
			if($resultInti != 0){
				$result = 'success';
				$data = array(
					'det_iujt_iujt_id'=>$resultInti,
					'det_iujt_jenis'=>$det_iujt_jenis,
					'det_iujt_nama'=>$det_iujt_nama,
					'det_iujt_npwp'=>$det_iujt_npwp,
					'det_iujt_alamat'=>$det_iujt_alamat,
					'det_iujt_sk'=>$det_iujt_sk,
					'det_iujt_berlaku'=>$det_iujt_berlaku,
					'det_iujt_kadaluarsa'=>$det_iujt_kadaluarsa,
					'det_iujt_surveylulus'=>$det_iujt_surveylulus,
					'det_iujt_tanggal'=>$det_iujt_tanggal,
					'det_iujt_nopermohonan'=>$det_iujt_nopermohonan,
					'det_iujt_cekpetugas'=>$det_iujt_cekpetugas,
					'det_iujt_cektanggal'=>$det_iujt_cektanggal,
					'det_iujt_ceknip'=>$det_iujt_ceknip,
					'det_iujt_catatan'=>$det_iujt_catatan,
					);
				$resultdet = $this->m_t_iujt_det->__insert($data, '', '');
				for($i=0;$i<count($iujt_cek_syarat_id);$i++){
					$datacek = array(
						'iujt_cek_syarat_id'=>$iujt_cek_syarat_id[$i],
						'iujt_cek_iujt_id'=>$resultInti,
						'iujt_cek_iujtdet_id'=>$resultdet,
						'iujt_cek_status'=>$iujt_cek_status[$i],
						'iujt_cek_keterangan'=>$iujt_cek_keterangan[$i]
					);
					$resultcek = $this->m_t_iujt_det->__insert($datacek, 't_iujt_ceklist', 'insertId');
				}
			}
		}
		echo $result;
	}
	
	function update(){
		$det_iujt_id = htmlentities($this->input->post('det_iujt_id'),ENT_QUOTES);
		$det_iujt_id = is_numeric($det_iujt_id) ? $det_iujt_id : 0;
		$det_iujt_iujt_id = htmlentities($this->input->post('det_iujt_iujt_id'),ENT_QUOTES);
		$det_iujt_iujt_id = is_numeric($det_iujt_iujt_id) ? $det_iujt_iujt_id : 0;
		$det_iujt_jenis = htmlentities($this->input->post('det_iujt_jenis'),ENT_QUOTES);
		$det_iujt_jenis = is_numeric($det_iujt_jenis) ? $det_iujt_jenis : 0;
		$det_iujt_nama = htmlentities($this->input->post('det_iujt_nama'),ENT_QUOTES);
		$det_iujt_npwp = htmlentities($this->input->post('det_iujt_npwp'),ENT_QUOTES);
		$det_iujt_alamat = htmlentities($this->input->post('det_iujt_alamat'),ENT_QUOTES);
		$det_iujt_sk = htmlentities($this->input->post('det_iujt_sk'),ENT_QUOTES);
		$det_iujt_berlaku = htmlentities($this->input->post('det_iujt_berlaku'),ENT_QUOTES);
		$det_iujt_kadaluarsa = htmlentities($this->input->post('det_iujt_kadaluarsa'),ENT_QUOTES);
		$det_iujt_surveylulus = htmlentities($this->input->post('det_iujt_surveylulus'),ENT_QUOTES);
		$det_iujt_surveylulus = is_numeric($det_iujt_surveylulus) ? $det_iujt_surveylulus : 0;
		$det_iujt_tanggal = htmlentities($this->input->post('det_iujt_tanggal'),ENT_QUOTES);
		$det_iujt_nopermohonan = htmlentities($this->input->post('det_iujt_nopermohonan'),ENT_QUOTES);
		$det_iujt_cekpetugas = htmlentities($this->input->post('det_iujt_cekpetugas'),ENT_QUOTES);
		$det_iujt_cektanggal = htmlentities($this->input->post('det_iujt_cektanggal'),ENT_QUOTES);
		$det_iujt_ceknip = htmlentities($this->input->post('det_iujt_ceknip'),ENT_QUOTES);
		$det_iujt_catatan = htmlentities($this->input->post('det_iujt_catatan'),ENT_QUOTES);
				
		$iujt_det_updated_by = $this->m_t_iujt_det->__checkSession();
		$iujt_det_updated_date = date('Y-m-d H:i:s');
		
		if($iujt_det_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_iujt_iujt_id'=>$det_iujt_iujt_id,
				'det_iujt_jenis'=>$det_iujt_jenis,
				'det_iujt_nama'=>$det_iujt_nama,
				'det_iujt_npwp'=>$det_iujt_npwp,
				'det_iujt_alamat'=>$det_iujt_alamat,
				'det_iujt_sk'=>$det_iujt_sk,
				'det_iujt_berlaku'=>$det_iujt_berlaku,
				'det_iujt_kadaluarsa'=>$det_iujt_kadaluarsa,
				'det_iujt_surveylulus'=>$det_iujt_surveylulus,
				'det_iujt_tanggal'=>$det_iujt_tanggal,
				'det_iujt_nopermohonan'=>$det_iujt_nopermohonan,
				'det_iujt_cekpetugas'=>$det_iujt_cekpetugas,
				'det_iujt_cektanggal'=>$det_iujt_cektanggal,
				'det_iujt_ceknip'=>$det_iujt_ceknip,
				'det_iujt_catatan'=>$det_iujt_catatan,
				);
			$result = $this->m_t_iujt_det->__update($data, $det_iujt_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_iujt_det->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$det_iujt_iujt_id = htmlentities($this->input->post('det_iujt_iujt_id'),ENT_QUOTES);
		$det_iujt_iujt_id = is_numeric($det_iujt_iujt_id) ? $det_iujt_iujt_id : 0;
		$det_iujt_jenis = htmlentities($this->input->post('det_iujt_jenis'),ENT_QUOTES);
		$det_iujt_jenis = is_numeric($det_iujt_jenis) ? $det_iujt_jenis : 0;
		$det_iujt_nama = htmlentities($this->input->post('det_iujt_nama'),ENT_QUOTES);
		$det_iujt_npwp = htmlentities($this->input->post('det_iujt_npwp'),ENT_QUOTES);
		$det_iujt_alamat = htmlentities($this->input->post('det_iujt_alamat'),ENT_QUOTES);
		$det_iujt_sk = htmlentities($this->input->post('det_iujt_sk'),ENT_QUOTES);
		$det_iujt_berlaku = htmlentities($this->input->post('det_iujt_berlaku'),ENT_QUOTES);
		$det_iujt_kadaluarsa = htmlentities($this->input->post('det_iujt_kadaluarsa'),ENT_QUOTES);
		$det_iujt_surveylulus = htmlentities($this->input->post('det_iujt_surveylulus'),ENT_QUOTES);
		$det_iujt_surveylulus = is_numeric($det_iujt_surveylulus) ? $det_iujt_surveylulus : 0;
		$det_iujt_tanggal = htmlentities($this->input->post('det_iujt_tanggal'),ENT_QUOTES);
		$det_iujt_nopermohonan = htmlentities($this->input->post('det_iujt_nopermohonan'),ENT_QUOTES);
		$det_iujt_cekpetugas = htmlentities($this->input->post('det_iujt_cekpetugas'),ENT_QUOTES);
		$det_iujt_cektanggal = htmlentities($this->input->post('det_iujt_cektanggal'),ENT_QUOTES);
		$det_iujt_ceknip = htmlentities($this->input->post('det_iujt_ceknip'),ENT_QUOTES);
		$det_iujt_catatan = htmlentities($this->input->post('det_iujt_catatan'),ENT_QUOTES);
				
		$params = array(
			'det_iujt_iujt_id'=>$det_iujt_iujt_id,
			'det_iujt_jenis'=>$det_iujt_jenis,
			'det_iujt_nama'=>$det_iujt_nama,
			'det_iujt_npwp'=>$det_iujt_npwp,
			'det_iujt_alamat'=>$det_iujt_alamat,
			'det_iujt_sk'=>$det_iujt_sk,
			'det_iujt_berlaku'=>$det_iujt_berlaku,
			'det_iujt_kadaluarsa'=>$det_iujt_kadaluarsa,
			'det_iujt_surveylulus'=>$det_iujt_surveylulus,
			'det_iujt_tanggal'=>$det_iujt_tanggal,
			'det_iujt_nopermohonan'=>$det_iujt_nopermohonan,
			'det_iujt_cekpetugas'=>$det_iujt_cekpetugas,
			'det_iujt_cektanggal'=>$det_iujt_cektanggal,
			'det_iujt_ceknip'=>$det_iujt_ceknip,
			'det_iujt_catatan'=>$det_iujt_catatan,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_iujt_det->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$det_iujt_iujt_id = htmlentities($this->input->post('det_iujt_iujt_id'),ENT_QUOTES);
		$det_iujt_iujt_id = is_numeric($det_iujt_iujt_id) ? $det_iujt_iujt_id : 0;
		$det_iujt_jenis = htmlentities($this->input->post('det_iujt_jenis'),ENT_QUOTES);
		$det_iujt_jenis = is_numeric($det_iujt_jenis) ? $det_iujt_jenis : 0;
		$det_iujt_nama = htmlentities($this->input->post('det_iujt_nama'),ENT_QUOTES);
		$det_iujt_npwp = htmlentities($this->input->post('det_iujt_npwp'),ENT_QUOTES);
		$det_iujt_alamat = htmlentities($this->input->post('det_iujt_alamat'),ENT_QUOTES);
		$det_iujt_sk = htmlentities($this->input->post('det_iujt_sk'),ENT_QUOTES);
		$det_iujt_berlaku = htmlentities($this->input->post('det_iujt_berlaku'),ENT_QUOTES);
		$det_iujt_kadaluarsa = htmlentities($this->input->post('det_iujt_kadaluarsa'),ENT_QUOTES);
		$det_iujt_surveylulus = htmlentities($this->input->post('det_iujt_surveylulus'),ENT_QUOTES);
		$det_iujt_surveylulus = is_numeric($det_iujt_surveylulus) ? $det_iujt_surveylulus : 0;
		$det_iujt_tanggal = htmlentities($this->input->post('det_iujt_tanggal'),ENT_QUOTES);
		$det_iujt_nopermohonan = htmlentities($this->input->post('det_iujt_nopermohonan'),ENT_QUOTES);
		$det_iujt_cekpetugas = htmlentities($this->input->post('det_iujt_cekpetugas'),ENT_QUOTES);
		$det_iujt_cektanggal = htmlentities($this->input->post('det_iujt_cektanggal'),ENT_QUOTES);
		$det_iujt_ceknip = htmlentities($this->input->post('det_iujt_ceknip'),ENT_QUOTES);
		$det_iujt_catatan = htmlentities($this->input->post('det_iujt_catatan'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'det_iujt_iujt_id'=>$det_iujt_iujt_id,
			'det_iujt_jenis'=>$det_iujt_jenis,
			'det_iujt_nama'=>$det_iujt_nama,
			'det_iujt_npwp'=>$det_iujt_npwp,
			'det_iujt_alamat'=>$det_iujt_alamat,
			'det_iujt_sk'=>$det_iujt_sk,
			'det_iujt_berlaku'=>$det_iujt_berlaku,
			'det_iujt_kadaluarsa'=>$det_iujt_kadaluarsa,
			'det_iujt_surveylulus'=>$det_iujt_surveylulus,
			'det_iujt_tanggal'=>$det_iujt_tanggal,
			'det_iujt_nopermohonan'=>$det_iujt_nopermohonan,
			'det_iujt_cekpetugas'=>$det_iujt_cekpetugas,
			'det_iujt_cektanggal'=>$det_iujt_cektanggal,
			'det_iujt_ceknip'=>$det_iujt_ceknip,
			'det_iujt_catatan'=>$det_iujt_catatan,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_iujt_det->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_iujt_det.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_iujt_det_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_iujt_det_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$iujt_id = $this->input->post('iujt_id');
		$iujt_det_id = $this->input->post('iujt_det_id');
		$params = array(
			"currentAction"=>$currentAction,
			"iujt_id"=>$iujt_id,
			"iujt_det_id"=>$iujt_det_id
		);
		$result = $this->m_t_iujt_det->getSyarat($params);
		echo $result;
	}
	function changeSurveyStatus(){
		$iujtdet_id  = $this->input->post('iujtdet_id');
		$lulus  = $this->input->post('lulus');
		$data = array(
			"det_iujt_surveylulus"=>$lulus
		);
		$result = $this->m_t_iujt_det->__update($data, $iujtdet_id, '', '');
		echo $result;
	}
	function cetakLembarKontrol(){
		$iujtdet_id  = $this->input->post('iujtdet_id');
		$params = array(
			"det_iujt_id"=>$iujtdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_iujt_det->search($params);
		$dataceklist = $this->db->where('iujt_cek_iujtdet_id', $iujtdet_id)->join('master_syarat','iujt_cek_syarat_id = ID_SYARAT')->get('t_iujt_ceklist')->result();
		$data['printrecord'] = $printrecord[1];
		$data['dataceklist'] = $dataceklist;
		$print_view=$this->load->view('template/p_iujt_lembarkontrol.php',$data,TRUE);
		$print_file=fopen('print/iujt_lembarkontrol.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakRekomendasi(){
		$iujtdet_id  = $this->input->post('iujtdet_id');
		$params = array(
			"det_iujt_id"=>$iujtdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_iujt_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$print_view=$this->load->view('template/p_iujt_rekomendasi.php',$data,TRUE);
		$print_file=fopen('print/iujt_rekom.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakSk(){
		$iujtdet_id  = $this->input->post('iujtdet_id');
		$params = array(
			"det_iujt_id"=>$iujtdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_iujt_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$print_view=$this->load->view('template/p_iujt_sk.php',$data,TRUE);
		$print_file=fopen('print/iujt_sk.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}