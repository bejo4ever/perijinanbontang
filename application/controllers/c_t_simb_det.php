<?php
class C_t_simb_det extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_simb_det');
	}
	
	function index(){
		$this->load->view('home.php');
		$this->load->view('main/v_t_simb_det');
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
			case 'UBAHPROSES':
				$this->ubahProses();
			break;
			case 'CETAKLEMBARKONTROL':
				$this->cetakLembarKontrol();
			break;
			case 'CETAKREKOMENDASI':
				$this->cetakRekomendasi();
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
		$result = $this->m_t_simb_det->getList($params);
		echo $result;
	}
	
	function create(){
		$params = json_decode($this->input->post('params'));
		extract(get_object_vars($params));
		
		$simb_det_author = $this->m_t_simb_det->__checkSession();
		$simb_det_created_date = date('Y-m-d H:i:s');
		$noreg = $this->m_public_function->getNomorReg(22);
		$resultperusahaan = $this->m_t_simb_det->cuperusahaan($params);
		$resultpemohon = $this->m_t_simb_det->cupemohon($params);
		$resultpermohonan = $this->m_t_simb_det->cupermohonan($params, $resultpemohon, $noreg);
		
		if($simb_det_author != ''){
			if($det_simb_lama != 0 && $permohonan_jenis == 2){
				$resultInti = $det_simb_lama;
			}else{
				$dataInti = array(
					'simb_per_npwp'=>$simb_per_npwp,
					'simb_per_nama'=>$simb_per_nama,
					'simb_per_akta'=>$simb_per_akta,
					'simb_per_bentuk'=>$simb_per_bentuk,
					'simb_per_alamat'=>$simb_per_alamat,
					'simb_per_kel'=>$simb_per_kel,
					'simb_per_kec'=>$simb_per_kec,
					'simb_per_kota'=>$simb_per_kota,
					'simb_per_telp'=>$simb_per_telp,
					'simb_jenis'=>$simb_jenis,
					'simb_status'=>$simb_status,
					'simb_jenisusaha'=>$simb_jenisusaha,
					'simb_panjang'=>$simb_panjang,
					'simb_lebar'=>$simb_lebar,
					'simb_alamat'=>$simb_alamat,
					'simb_kel'=>$simb_kel,
					'simb_kec'=>$simb_kec,
					'simb_bentuk'=>$simb_bentuk,
					'simb_lokasi'=>$simb_lokasi,
					'simb_gangguan'=>$simb_gangguan,
					'simb_batasutara'=>$simb_batasutara,
					'simb_batastimur'=>$simb_batastimur,
					'simb_batasselatan'=>$simb_batasselatan,
					'simb_batasbarat'=>$simb_batasbarat,
				);
				$resultInti = $this->m_t_simb_det->__insert($dataInti, 't_simb', 'insertId');
			}
			if($resultInti != 0){
				$result = 'success';
				$data = array(
					'det_simb_id'=>$det_simb_id,
					'det_simb_simb_id'=>$resultInti,
					'det_simb_jenis'=>$permohonan_jenis,
					'det_simb_tanggal'=>date('Y-m-d', strtotime($permohonan_tanggal)),
					'det_simb_pemohon_id'=>$resultpemohon,
					'det_simb_nomorreg'=>$det_simb_nomorreg,
					'det_simb_proses'=>$det_simb_proses,
					'det_simb_kadaluarsa'=>date('Y-m-d', strtotime($permohonan_kadaluarsa)),
					'det_simb_penerima'=>$det_simb_penerima,
					'det_simb_tanggalterima'=>$det_simb_tanggalterima,
					'det_simb_keterangan'=>$det_simb_keterangan,
					'det_simb_retribusi'=>$permohonan_retribusi,
					'det_simb_nomorreg'=>$noreg
				);
				$resultdet = $this->m_t_simb_det->__insert($data, false, 'insertId');
				for($i=0;$i<count($simb_cek_syarat_id);$i++){
					$datacek = array(
						'simb_cek_syarat_id'=>$simb_cek_syarat_id[$i],
						'simb_cek_simb_id'=>$resultInti,
						'simb_cek_simbdet_id'=>$resultdet,
						'simb_cek_status'=>$simb_cek_status[$i],
						'simb_cek_keterangan'=>$simb_cek_keterangan[$i]
					);
					$resultcek = $this->m_t_simb_det->__insert($datacek, 't_simb_ceklist', 'insertId');
				}
				$this->m_t_simb_det->__insertlog($simb_det_author, $resultpemohon, $resultInti, 'Tambah');
			}else{
				$result = 'fail';
			}
		}else{
			$result = 'sessionExpired';
		}
		echo $result;
	}
	
	function update(){
		$params = json_decode($this->input->post('params'));
		extract(get_object_vars($params));
		
		$simb_det_updated_by = $this->m_t_simb_det->__checkSession();
		$simb_det_updated_date = date('Y-m-d H:i:s');
		
		$resultperusahaan = $this->m_t_simb_det->cuperusahaan($params);
		$resultpemohon = $this->m_t_simb_det->cupemohon($params);
		$resultpermohonan = $this->m_t_simb_det->cupermohonan($params, $resultpemohon, '');
		
		if($simb_det_updated_by != ''){
			$dataInti = array(
				'simb_per_npwp'=>$simb_per_npwp,
				'simb_per_nama'=>$simb_per_nama,
				'simb_per_akta'=>$simb_per_akta,
				'simb_per_bentuk'=>$simb_per_bentuk,
				'simb_per_alamat'=>$simb_per_alamat,
				'simb_per_kel'=>$simb_per_kel,
				'simb_per_kec'=>$simb_per_kec,
				'simb_per_kota'=>$simb_per_kota,
				'simb_per_telp'=>$simb_per_telp,
				'simb_jenis'=>$simb_jenis,
				'simb_status'=>$simb_status,
				'simb_jenisusaha'=>$simb_jenisusaha,
				'simb_panjang'=>$simb_panjang,
				'simb_lebar'=>$simb_lebar,
				'simb_alamat'=>$simb_alamat,
				'simb_kel'=>$simb_kel,
				'simb_kec'=>$simb_kec,
				'simb_bentuk'=>$simb_bentuk,
				'simb_lokasi'=>$simb_lokasi,
				'simb_gangguan'=>$simb_gangguan,
				'simb_batasutara'=>$simb_batasutara,
				'simb_batastimur'=>$simb_batastimur,
				'simb_batasselatan'=>$simb_batasselatan,
				'simb_batasbarat'=>$simb_batasbarat,
			);
			$resultInti = $this->m_t_simb_det->__update($dataInti, $det_simb_simb_id, 't_simb', 'updateId', 'simb_id');
			$result = 'success';
			$data = array(
				'det_simb_simb_id'=>$det_simb_simb_id,
				'det_simb_jenis'=>$permohonan_jenis,
				'det_simb_tanggal'=>date('Y-m-d', strtotime($permohonan_tanggal)),
				'det_simb_pemohon_id'=>$resultpemohon,
				'det_simb_nomorreg'=>$det_simb_nomorreg,
				'det_simb_proses'=>$det_simb_proses,
				'det_simb_sk'=>$det_simb_sk,
				'det_simb_kadaluarsa'=>date('Y-m-d', strtotime($permohonan_kadaluarsa)),
				'det_simb_penerima'=>$det_simb_penerima,
				'det_simb_tanggalterima'=>date('Y-m-d', strtotime($det_simb_tanggalterima)),
				'det_simb_keterangan'=>$det_simb_keterangan,
				'det_simb_retribusi'=>$permohonan_retribusi
			);
			$resultdet = $this->m_t_simb_det->__update($data, $det_simb_id, '', 'updateId','');
			for($i=0;$i<count($simb_cek_syarat_id);$i++){
				$datacek = array(
					'simb_cek_syarat_id'=>$simb_cek_syarat_id[$i],
					'simb_cek_simb_id'=>$det_simb_simb_id,
					'simb_cek_simbdet_id'=>$det_simb_id,
					'simb_cek_status'=>$simb_cek_status[$i],
					'simb_cek_keterangan'=>$simb_cek_keterangan[$i]
				);
				$resultcek = $this->m_t_simb_det->__update($datacek, $simb_cek_id[$i], 't_simb_ceklist', 'updateId','simb_cek_id');
			}
			$this->m_t_simb_det->__insertlog($simb_det_updated_by, $resultpemohon, $det_simb_id, 'Ubah');
		}else{
			$result = 'sessionExpired';
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_simb_det->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$det_simb_simb_id = htmlentities($this->input->post('det_simb_simb_id'),ENT_QUOTES);
		$det_simb_jenis = htmlentities($this->input->post('det_simb_jenis'),ENT_QUOTES);
		$det_simb_tanggal = htmlentities($this->input->post('det_simb_tanggal'),ENT_QUOTES);
		$det_simb_pemohon_id = htmlentities($this->input->post('det_simb_pemohon_id'),ENT_QUOTES);
		$det_simb_pemohon_id = is_numeric($det_simb_pemohon_id) ? $det_simb_pemohon_id : 0;
		$det_simb_nomorreg = htmlentities($this->input->post('det_simb_nomorreg'),ENT_QUOTES);
		$det_simb_proses = htmlentities($this->input->post('det_simb_proses'),ENT_QUOTES);
		$det_simb_sk = htmlentities($this->input->post('det_simb_sk'),ENT_QUOTES);
		$det_simb_berlaku = htmlentities($this->input->post('det_simb_berlaku'),ENT_QUOTES);
		$det_simb_kadaluarsa = htmlentities($this->input->post('det_simb_kadaluarsa'),ENT_QUOTES);
		$det_simb_penerima = htmlentities($this->input->post('det_simb_penerima'),ENT_QUOTES);
		$det_simb_tanggalterima = htmlentities($this->input->post('det_simb_tanggalterima'),ENT_QUOTES);
		$det_simb_keterangan = htmlentities($this->input->post('det_simb_keterangan'),ENT_QUOTES);
				
		$params = array(
			'det_simb_simb_id'=>$det_simb_simb_id,
			'det_simb_jenis'=>$det_simb_jenis,
			'det_simb_tanggal'=>$det_simb_tanggal,
			'det_simb_pemohon_id'=>$det_simb_pemohon_id,
			'det_simb_nomorreg'=>$det_simb_nomorreg,
			'det_simb_proses'=>$det_simb_proses,
			'det_simb_sk'=>$det_simb_sk,
			'det_simb_berlaku'=>$det_simb_berlaku,
			'det_simb_kadaluarsa'=>$det_simb_kadaluarsa,
			'det_simb_penerima'=>$det_simb_penerima,
			'det_simb_tanggalterima'=>$det_simb_tanggalterima,
			'det_simb_keterangan'=>$det_simb_keterangan,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_simb_det->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		
		$params = array(
			'searchText' => $searchText,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_simb_det->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_simb_det.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_simb_det_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_simb_det_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$simb_id = $this->input->post('simb_id');
		$simb_det_id = $this->input->post('simb_det_id');
		$params = array(
			"currentAction"=>$currentAction,
			"simb_id"=>$simb_id,
			"simb_det_id"=>$simb_det_id
		);
		$result = $this->m_t_simb_det->getSyarat($params);
		echo $result;
	}
	function ubahProses(){
		$simbdet_id  = $this->input->post('simbdet_id');
		$simbdet_nosk  = $this->input->post('simbdet_nosk');
		$proses  = $this->input->post('proses');
		$this->firephp->log($proses);
		$this->firephp->log($simbdet_nosk);
		$this->firephp->log($simbdet_id);
		if($proses == 'Selesai, belum diambil' && $simbdet_nosk == ''){
			$nosk = $this->m_public_function->getNomorSk(1);
			$this->firephp->log($nosk);
			$data_sk = array(
				"det_simb_sk"=>$nosk,
				"det_simb_berlaku"=>date('Y-m-d')
			);
			$this->db->where('det_simb_id', $simbdet_id);
			$this->db->update('t_simb_det', $data_sk);
			$data_sk_permohonan = array(
				"nosk"=>$nosk,
				"tglsk"=>date('Y-m-d')
			);
			$this->db->where('id', $permohonan_id);
			$this->db->update('permohonan', $data_sk_permohonan);
		}
		$data = array(
			"det_simb_proses"=>$proses
		);
		$result = $this->m_t_simb_det->__update($data, $simbdet_id, '', '','');
		echo $result;
	}
	function cetakBp(){
		$simbdet_id  = $this->input->post('simbdet_id');
		$params = array(
			"det_simb_id"=>$simbdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_simb_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$data['dataijin'] = $this->db->where('id',27)->get('ijin')->row();
		$print_view=$this->load->view('template/p_simb_buktiterima.php',$data,TRUE);
		$print_file=fopen('print/simb_buktipenerimaan.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakLembarKontrol(){
		$simbdet_id  = $this->input->post('simbdet_id');
		$params = array(
			"det_simb_id"=>$simbdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_simb_det->search($params);
		$dataceklist = $this->db->where('simb_cek_simbdet_id', $simbdet_id)->join('master_syarat','simb_cek_syarat_id = ID_SYARAT')->get('t_simb_ceklist')->result();
		$data['printrecord'] = $printrecord[1];
		$data['dataceklist'] = $dataceklist;
		$print_view=$this->load->view('template/p_simb_lembarkontrol.php',$data,TRUE);
		$print_file=fopen('print/simb_lembarkontrol.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakRekomendasi(){
		$simbdet_id  = $this->input->post('simbdet_id');
		$params = array(
			"det_simb_id"=>$simbdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_simb_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$print_view=$this->load->view('template/p_simb_rekomendasi.php',$data,TRUE);
		$print_file=fopen('print/simb_rekomendasi.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakSk(){
		$simbdet_id  = $this->input->post('simbdet_id');
		$params = array(
			"det_simb_id"=>$simbdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_simb_det->search($params);
		$data['dataijin'] = $this->db->where('id',27)->get('ijin')->row();
		$data['printrecord'] = $printrecord[1];
		$sub = $data['printrecord'][0];
		if($sub->det_simb_sk == ''){
			echo 'nosk';
		}else if($sub->det_simb_kadaluarsa == '' || $sub->det_simb_kadaluarsa == '0000-00-00'){
			echo 'notglkadaluarsa';
		}else{
			$print_view=$this->load->view('template/p_simb_sk.php',$data,TRUE);
			$print_file=fopen('print/simb_sk.html','w+');
			fwrite($print_file, $print_view);
			echo 'success';
		}
	}
	
}