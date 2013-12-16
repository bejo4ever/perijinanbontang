<?php
class C_t_iujk_det extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_iujk_det');
	}
	
	function index(){
		$this->load->view('main/v_t_iujk_det');
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
			case 'CETAKBAP':
				$this->cetakBap();
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
		$result = $this->m_t_iujk_det->getList($params);
		echo $result;
	}
	
	function create(){
		$det_iujk_id = htmlentities($this->input->post('det_iujk_id'),ENT_QUOTES);
		$det_iujk_id = is_numeric($det_iujk_id) ? $det_iujk_id : 0;
		$det_iujk_iujk_id = htmlentities($this->input->post('det_iujk_iujk_id'),ENT_QUOTES);
		$det_iujk_iujk_id = is_numeric($det_iujk_iujk_id) ? $det_iujk_iujk_id : 0;
		$det_iujk_jenis = htmlentities($this->input->post('det_iujk_jenis'),ENT_QUOTES);
		$det_iujk_jenis = is_numeric($det_iujk_jenis) ? $det_iujk_jenis : 0;
		$det_iujk_tanggal = htmlentities($this->input->post('det_iujk_tanggal'),ENT_QUOTES);
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_rekomnomor = htmlentities($this->input->post('det_iujk_rekomnomor'),ENT_QUOTES);
		$det_iujk_rekomtanggal = htmlentities($this->input->post('det_iujk_rekomtanggal'),ENT_QUOTES);
		$det_iujk_berlaku = htmlentities($this->input->post('det_iujk_berlaku'),ENT_QUOTES);
		$det_iujk_kadaluarsa = htmlentities($this->input->post('det_iujk_kadaluarsa'),ENT_QUOTES);
		$det_iujk_pj1 = htmlentities($this->input->post('det_iujk_pj1'),ENT_QUOTES);
		$det_iujk_pj2 = htmlentities($this->input->post('det_iujk_pj2'),ENT_QUOTES);
		$det_iujk_pj3 = htmlentities($this->input->post('det_iujk_pj3'),ENT_QUOTES);
		$det_iujk_pjteknis = htmlentities($this->input->post('det_iujk_pjteknis'),ENT_QUOTES);
		$det_iujk_pjtbu = htmlentities($this->input->post('det_iujk_pjtbu'),ENT_QUOTES);
		$det_iujk_surveylulus = htmlentities($this->input->post('det_iujk_surveylulus'),ENT_QUOTES);
		$det_iujk_surveylulus = is_numeric($det_iujk_surveylulus) ? $det_iujk_surveylulus : 0;
		
		$iujk_perusahaan = htmlentities($this->input->post('iujk_perusahaan'),ENT_QUOTES);
		$iujk_alamat = htmlentities($this->input->post('iujk_alamat'),ENT_QUOTES);
		$iujk_direktur = htmlentities($this->input->post('iujk_direktur'),ENT_QUOTES);
		$iujk_golongan = htmlentities($this->input->post('iujk_golongan'),ENT_QUOTES);
		$iujk_kualifikasi = htmlentities($this->input->post('iujk_kualifikasi'),ENT_QUOTES);
		$iujk_bidangusaha = htmlentities($this->input->post('iujk_bidangusaha'),ENT_QUOTES);
		$iujk_rt = htmlentities($this->input->post('iujk_rt'),ENT_QUOTES);
		$iujk_rt = is_numeric($iujk_rt) ? $iujk_rt : 0;
		$iujk_rw = htmlentities($this->input->post('iujk_rw'),ENT_QUOTES);
		$iujk_rw = is_numeric($iujk_rw) ? $iujk_rw : 0;
		$iujk_kelurahan = htmlentities($this->input->post('iujk_kelurahan'),ENT_QUOTES);
		$iujk_kelurahan = is_numeric($iujk_kelurahan) ? $iujk_kelurahan : 0;
		$iujk_kota = htmlentities($this->input->post('iujk_kota'),ENT_QUOTES);
		$iujk_kota = is_numeric($iujk_kota) ? $iujk_kota : 0;
		$iujk_propinsi = htmlentities($this->input->post('iujk_propinsi'),ENT_QUOTES);
		$iujk_propinsi = is_numeric($iujk_propinsi) ? $iujk_propinsi : 0;
		$iujk_telepon = htmlentities($this->input->post('iujk_telepon'),ENT_QUOTES);
		$iujk_kodepos = htmlentities($this->input->post('iujk_kodepos'),ENT_QUOTES);
		$iujk_fax = htmlentities($this->input->post('iujk_fax'),ENT_QUOTES);
		$iujk_npwp = htmlentities($this->input->post('iujk_npwp'),ENT_QUOTES);
		
		$iujk_cek_id = json_decode($this->input->post('iujk_cek_id'));
		$iujk_cek_syarat_id = json_decode($this->input->post('iujk_cek_syarat_id'));
		$iujk_cek_status = json_decode($this->input->post('iujk_cek_status'));
		$iujk_cek_keterangan = json_decode($this->input->post('iujk_cek_keterangan'));
		
		
		$iujk_det_author = $this->m_t_iujk_det->__checkSession();
		$iujk_det_created_date = date('Y-m-d H:i:s');
		
		if($iujk_det_author != ''){
			$result = 'sessionExpired';
		}else{
			$dataInti = array(
				'iujk_perusahaan'=>$iujk_perusahaan,
				'iujk_alamat'=>$iujk_alamat,
				'iujk_direktur'=>$iujk_direktur,
				'iujk_golongan'=>$iujk_golongan,
				'iujk_kualifikasi'=>$iujk_kualifikasi,
				'iujk_bidangusaha'=>$iujk_bidangusaha,
				'iujk_rt'=>$iujk_rt,
				'iujk_rw'=>$iujk_rw,
				'iujk_kelurahan'=>$iujk_kelurahan,
				'iujk_kota'=>$iujk_kota,
				'iujk_propinsi'=>$iujk_propinsi,
				'iujk_telepon'=>$iujk_telepon,
				'iujk_kodepos'=>$iujk_kodepos,
				'iujk_fax'=>$iujk_fax,
				'iujk_npwp'=>$iujk_npwp,
			);
			$resultInti = $this->m_t_iujk_det->__insert($dataInti, 't_iujk', 'insertId');
			if($resultInti != 0){
				$result = 'success';
				$data = array(
					'det_iujk_id'=>$det_iujk_id,
					'det_iujk_iujk_id'=>$resultInti,
					'det_iujk_jenis'=>$det_iujk_jenis,
					'det_iujk_tanggal'=>$det_iujk_tanggal,
					'det_iujk_nama'=>$det_iujk_nama,
					'det_iujk_nomorreg'=>$det_iujk_nomorreg,
					'det_iujk_rekomnomor'=>$det_iujk_rekomnomor,
					'det_iujk_rekomtanggal'=>$det_iujk_rekomtanggal,
					'det_iujk_berlaku'=>$det_iujk_berlaku,
					'det_iujk_kadaluarsa'=>$det_iujk_kadaluarsa,
					'det_iujk_pj1'=>$det_iujk_pj1,
					'det_iujk_pj2'=>$det_iujk_pj2,
					'det_iujk_pj3'=>$det_iujk_pj3,
					'det_iujk_pjteknis'=>$det_iujk_pjteknis,
					'det_iujk_pjtbu'=>$det_iujk_pjtbu,
					'det_iujk_surveylulus'=>$det_iujk_surveylulus,
					);
				$resultdet = $this->m_t_iujk_det->__insert($data, '', '');
				for($i=0;$i<count($iujk_cek_syarat_id);$i++){
					$datacek = array(
						'iujk_cek_syarat_id'=>$iujk_cek_syarat_id[$i],
						'iujk_cek_iujk_id'=>$resultInti,
						'iujk_cek_iujkdet_id'=>$resultdet,
						'iujk_cek_status'=>$iujk_cek_status[$i],
						'iujk_cek_keterangan'=>$iujk_cek_keterangan[$i]
					);
					$resultcek = $this->m_t_iujk_det->__insert($datacek, 't_iujk_ceklist', 'insertId');
				}
			}else{
				$result = 'fail';
			}
		}
		echo $result;
	}
	
	function update(){
		$det_iujk_id = htmlentities($this->input->post('det_iujk_id'),ENT_QUOTES);
		$det_iujk_id = is_numeric($det_iujk_id) ? $det_iujk_id : 0;
		$det_iujk_iujk_id = htmlentities($this->input->post('det_iujk_iujk_id'),ENT_QUOTES);
		$det_iujk_iujk_id = is_numeric($det_iujk_iujk_id) ? $det_iujk_iujk_id : 0;
		$det_iujk_jenis = htmlentities($this->input->post('det_iujk_jenis'),ENT_QUOTES);
		$det_iujk_jenis = is_numeric($det_iujk_jenis) ? $det_iujk_jenis : 0;
		$det_iujk_tanggal = htmlentities($this->input->post('det_iujk_tanggal'),ENT_QUOTES);
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_rekomnomor = htmlentities($this->input->post('det_iujk_rekomnomor'),ENT_QUOTES);
		$det_iujk_rekomtanggal = htmlentities($this->input->post('det_iujk_rekomtanggal'),ENT_QUOTES);
		$det_iujk_berlaku = htmlentities($this->input->post('det_iujk_berlaku'),ENT_QUOTES);
		$det_iujk_kadaluarsa = htmlentities($this->input->post('det_iujk_kadaluarsa'),ENT_QUOTES);
		$det_iujk_pj1 = htmlentities($this->input->post('det_iujk_pj1'),ENT_QUOTES);
		$det_iujk_pj2 = htmlentities($this->input->post('det_iujk_pj2'),ENT_QUOTES);
		$det_iujk_pj3 = htmlentities($this->input->post('det_iujk_pj3'),ENT_QUOTES);
		$det_iujk_pjteknis = htmlentities($this->input->post('det_iujk_pjteknis'),ENT_QUOTES);
		$det_iujk_pjtbu = htmlentities($this->input->post('det_iujk_pjtbu'),ENT_QUOTES);
		$det_iujk_surveylulus = htmlentities($this->input->post('det_iujk_surveylulus'),ENT_QUOTES);
		$det_iujk_surveylulus = is_numeric($det_iujk_surveylulus) ? $det_iujk_surveylulus : 0;
				
		$iujk_det_updated_by = $this->m_t_iujk_det->__checkSession();
		$iujk_det_updated_date = date('Y-m-d H:i:s');
		
		if($iujk_det_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_iujk_iujk_id'=>$det_iujk_iujk_id,
				'det_iujk_jenis'=>$det_iujk_jenis,
				'det_iujk_tanggal'=>$det_iujk_tanggal,
				'det_iujk_nama'=>$det_iujk_nama,
				'det_iujk_nomorreg'=>$det_iujk_nomorreg,
				'det_iujk_rekomnomor'=>$det_iujk_rekomnomor,
				'det_iujk_rekomtanggal'=>$det_iujk_rekomtanggal,
				'det_iujk_berlaku'=>$det_iujk_berlaku,
				'det_iujk_kadaluarsa'=>$det_iujk_kadaluarsa,
				'det_iujk_pj1'=>$det_iujk_pj1,
				'det_iujk_pj2'=>$det_iujk_pj2,
				'det_iujk_pj3'=>$det_iujk_pj3,
				'det_iujk_pjteknis'=>$det_iujk_pjteknis,
				'det_iujk_pjtbu'=>$det_iujk_pjtbu,
				'det_iujk_surveylulus'=>$det_iujk_surveylulus,
				);
			$result = $this->m_t_iujk_det->__update($data, $det_iujk_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_iujk_det->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$det_iujk_iujk_id = htmlentities($this->input->post('det_iujk_iujk_id'),ENT_QUOTES);
		$det_iujk_iujk_id = is_numeric($det_iujk_iujk_id) ? $det_iujk_iujk_id : 0;
		$det_iujk_jenis = htmlentities($this->input->post('det_iujk_jenis'),ENT_QUOTES);
		$det_iujk_jenis = is_numeric($det_iujk_jenis) ? $det_iujk_jenis : 0;
		$det_iujk_tanggal = htmlentities($this->input->post('det_iujk_tanggal'),ENT_QUOTES);
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_rekomnomor = htmlentities($this->input->post('det_iujk_rekomnomor'),ENT_QUOTES);
		$det_iujk_rekomtanggal = htmlentities($this->input->post('det_iujk_rekomtanggal'),ENT_QUOTES);
		$det_iujk_berlaku = htmlentities($this->input->post('det_iujk_berlaku'),ENT_QUOTES);
		$det_iujk_kadaluarsa = htmlentities($this->input->post('det_iujk_kadaluarsa'),ENT_QUOTES);
		$det_iujk_pj1 = htmlentities($this->input->post('det_iujk_pj1'),ENT_QUOTES);
		$det_iujk_pj2 = htmlentities($this->input->post('det_iujk_pj2'),ENT_QUOTES);
		$det_iujk_pj3 = htmlentities($this->input->post('det_iujk_pj3'),ENT_QUOTES);
		$det_iujk_pjteknis = htmlentities($this->input->post('det_iujk_pjteknis'),ENT_QUOTES);
		$det_iujk_pjtbu = htmlentities($this->input->post('det_iujk_pjtbu'),ENT_QUOTES);
		$det_iujk_surveylulus = htmlentities($this->input->post('det_iujk_surveylulus'),ENT_QUOTES);
		$det_iujk_surveylulus = is_numeric($det_iujk_surveylulus) ? $det_iujk_surveylulus : 0;
				
		$params = array(
			'det_iujk_iujk_id'=>$det_iujk_iujk_id,
			'det_iujk_jenis'=>$det_iujk_jenis,
			'det_iujk_tanggal'=>$det_iujk_tanggal,
			'det_iujk_nama'=>$det_iujk_nama,
			'det_iujk_nomorreg'=>$det_iujk_nomorreg,
			'det_iujk_rekomnomor'=>$det_iujk_rekomnomor,
			'det_iujk_rekomtanggal'=>$det_iujk_rekomtanggal,
			'det_iujk_berlaku'=>$det_iujk_berlaku,
			'det_iujk_kadaluarsa'=>$det_iujk_kadaluarsa,
			'det_iujk_pj1'=>$det_iujk_pj1,
			'det_iujk_pj2'=>$det_iujk_pj2,
			'det_iujk_pj3'=>$det_iujk_pj3,
			'det_iujk_pjteknis'=>$det_iujk_pjteknis,
			'det_iujk_pjtbu'=>$det_iujk_pjtbu,
			'det_iujk_surveylulus'=>$det_iujk_surveylulus,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_iujk_det->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$det_iujk_iujk_id = htmlentities($this->input->post('det_iujk_iujk_id'),ENT_QUOTES);
		$det_iujk_iujk_id = is_numeric($det_iujk_iujk_id) ? $det_iujk_iujk_id : 0;
		$det_iujk_jenis = htmlentities($this->input->post('det_iujk_jenis'),ENT_QUOTES);
		$det_iujk_jenis = is_numeric($det_iujk_jenis) ? $det_iujk_jenis : 0;
		$det_iujk_tanggal = htmlentities($this->input->post('det_iujk_tanggal'),ENT_QUOTES);
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_rekomnomor = htmlentities($this->input->post('det_iujk_rekomnomor'),ENT_QUOTES);
		$det_iujk_rekomtanggal = htmlentities($this->input->post('det_iujk_rekomtanggal'),ENT_QUOTES);
		$det_iujk_berlaku = htmlentities($this->input->post('det_iujk_berlaku'),ENT_QUOTES);
		$det_iujk_kadaluarsa = htmlentities($this->input->post('det_iujk_kadaluarsa'),ENT_QUOTES);
		$det_iujk_pj1 = htmlentities($this->input->post('det_iujk_pj1'),ENT_QUOTES);
		$det_iujk_pj2 = htmlentities($this->input->post('det_iujk_pj2'),ENT_QUOTES);
		$det_iujk_pj3 = htmlentities($this->input->post('det_iujk_pj3'),ENT_QUOTES);
		$det_iujk_pjteknis = htmlentities($this->input->post('det_iujk_pjteknis'),ENT_QUOTES);
		$det_iujk_pjtbu = htmlentities($this->input->post('det_iujk_pjtbu'),ENT_QUOTES);
		$det_iujk_surveylulus = htmlentities($this->input->post('det_iujk_surveylulus'),ENT_QUOTES);
		$det_iujk_surveylulus = is_numeric($det_iujk_surveylulus) ? $det_iujk_surveylulus : 0;
				
		$params = array(
			'searchText' => $searchText,
			'det_iujk_iujk_id'=>$det_iujk_iujk_id,
			'det_iujk_jenis'=>$det_iujk_jenis,
			'det_iujk_tanggal'=>$det_iujk_tanggal,
			'det_iujk_nama'=>$det_iujk_nama,
			'det_iujk_nomorreg'=>$det_iujk_nomorreg,
			'det_iujk_rekomnomor'=>$det_iujk_rekomnomor,
			'det_iujk_rekomtanggal'=>$det_iujk_rekomtanggal,
			'det_iujk_berlaku'=>$det_iujk_berlaku,
			'det_iujk_kadaluarsa'=>$det_iujk_kadaluarsa,
			'det_iujk_pj1'=>$det_iujk_pj1,
			'det_iujk_pj2'=>$det_iujk_pj2,
			'det_iujk_pj3'=>$det_iujk_pj3,
			'det_iujk_pjteknis'=>$det_iujk_pjteknis,
			'det_iujk_pjtbu'=>$det_iujk_pjtbu,
			'det_iujk_surveylulus'=>$det_iujk_surveylulus,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_iujk_det->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_iujk_det.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_iujk_det_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_iujk_det_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$iujk_id = $this->input->post('iujk_id');
		$iujk_det_id = $this->input->post('iujk_det_id');
		$params = array(
			"currentAction"=>$currentAction,
			"iujk_id"=>$iujk_id,
			"iujk_det_id"=>$iujk_det_id
		);
		$result = $this->m_t_iujk_det->getSyarat($params);
		echo $result;
	}
	function changeSurveyStatus(){
		$iujkdet_id  = $this->input->post('iujkdet_id');
		$lulus  = $this->input->post('lulus');
		$data = array(
			"det_iujk_surveylulus"=>$lulus
		);
		$result = $this->m_t_iujk_det->__update($data, $iujkdet_id, '', '');
		echo $result;
	}
	function cetakLembarKontrol(){
		$iujkdet_id  = $this->input->post('iujkdet_id');
		$params = array(
			"det_iujk_id"=>$iujkdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_iujk_det->search($params);
		$dataceklist = $this->db->where('iujk_cek_iujkdet_id', $iujkdet_id)->join('master_syarat','iujk_cek_syarat_id = ID_SYARAT')->get('t_iujk_ceklist')->result();
		$data['printrecord'] = $printrecord[1];
		$data['dataceklist'] = $dataceklist;
		$print_view=$this->load->view('template/p_iujk_lembarkontrol.php',$data,TRUE);
		$print_file=fopen('print/iujk_lembarkontrol.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakBap(){
		$iujkdet_id  = $this->input->post('iujkdet_id');
		$params = array(
			"det_iujk_id"=>$iujkdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_iujk_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$print_view=$this->load->view('template/p_iujk_bapeninjauan.php',$data,TRUE);
		$print_file=fopen('print/iujk_bap.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakSk(){
		$iujkdet_id  = $this->input->post('iujkdet_id');
		$params = array(
			"det_iujk_id"=>$iujkdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_iujk_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$print_view=$this->load->view('template/p_iujk_sk.php',$data,TRUE);
		$print_file=fopen('print/iujk_sk.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}