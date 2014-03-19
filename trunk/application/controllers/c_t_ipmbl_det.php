<?php
class C_t_ipmbl_det extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_ipmbl_det');
	}
	
	function index(){
		$this->load->view('home.php');
		$this->load->view('main/v_t_ipmbl_det');
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
			case 'GETRIWAYAT':
				$this->getRiwayat();
			break;
			case 'UBAHPROSES':
				$this->ubahProses();
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
		$result = $this->m_t_ipmbl_det->getList($params);
		echo $result;
	}
	
	function create(){
		$params = json_decode($this->input->post('params'));
		extract(get_object_vars($params));
		
		$ipmbl_det_author = $this->m_t_ipmbl_det->__checkSession();
		$ipmbl_det_created_date = date('Y-m-d H:i:s');
		
		$noreg = $this->m_public_function->getNomorReg(23);
		$resultperusahaan = $this->m_t_ipmbl_det->cuperusahaan($params);
		$resultpemohon = $this->m_t_ipmbl_det->cupemohon($params);
		$resultpermohonan = $this->m_t_ipmbl_det->cupermohonan($params, $resultpemohon, $noreg);
		
		if($ipmbl_det_author != ''){
			if($det_ipmbl_lama != 0 && $det_ipmbl_jenis == 2){
				$resultInti = $det_ipmbl_lama;
			}else{
				$dataInti = array(
					'ipmbl_usaha'=>$perusahaan_nama,
					'ipmbl_alamatusaha'=>$perusahaan_alamat,
					'ipmbl_kelurahan'=>$perusahaan_desa_nama,
					'ipmbl_kecamatan'=>$perusahaan_kecamatan_nama,
					'ipmbl_luas'=>$det_ipmbl_luas,
					'ipmbl_volume'=>$det_ipmbl_volume,
					'ipmbl_keperluan'=>$det_ipmbl_keperluan,
					'ipmbl_lokasi'=>$det_ipmbl_lokasi
				);
				$resultInti = $this->m_t_ipmbl_det->__insert($dataInti, 't_ipmbl', 'insertId');
			}
			if($resultInti != 0){
				$result = 'success';
				$data = array(
					'det_ipmbl_ipmbl_id'=>$resultInti,
					'det_ipmbl_jenis'=>$permohonan_jenis,
					'det_ipmbl_tanggal'=>date('Y-m-d', strtotime($permohonan_tanggal)),
					'det_ipmbl_nomoragenda'=>$det_ipmbl_nomoragenda,
					'det_ipmbl_berkasmasuk'=>$det_ipmbl_berkasmasuk,
					'det_ipmbl_surveytanggal'=>date('Y-m-d', strtotime($det_ipmbl_surveytanggal)),
					'det_ipmbl_surveylulus'=>$det_ipmbl_surveylulus,
					'det_ipmbl_status'=>$det_ipmbl_status,
					'det_ipmbl_surveypetugas'=>$det_ipmbl_surveypetugas,
					'det_ipmbl_surveydinas'=>$det_ipmbl_surveydinas,
					'det_ipmbl_surveynip'=>$det_ipmbl_surveynip,
					'det_ipmbl_surveypendapat'=>$det_ipmbl_surveypendapat,
					'det_ipmbl_rekombl'=>$det_ipmbl_rekombl,
					'det_ipmbl_rekomblhtanggal'=>date('Y-m-d', strtotime($det_ipmbl_rekomblhtanggal)),
					'det_ipmbl_rekomkel'=>$det_ipmbl_rekomkel,
					'det_ipmbl_rekomkeltanggal'=>date('Y-m-d', strtotime($det_ipmbl_rekomkeltanggal)),
					'det_ipmbl_rekomkec'=>$det_ipmbl_rekomkec,
					'det_ipmbl_rekomkectanggal'=>date('Y-m-d', strtotime($det_ipmbl_rekomkectanggal)),
					'det_ipmbl_kadaluarsa'=>date('Y-m-d', strtotime($permohonan_kadaluarsa)),
					'det_ipmbl_pemohon_id'=>$resultpemohon,
					'det_ipmbl_nomorreg'=>$noreg,
					'det_ipmbl_retribusi'=>$permohonan_retribusi
					);
				$resultdet = $this->m_t_ipmbl_det->__insert($data, false, 'insertId');
				for($i=0;$i<count($ipmbl_cek_syarat_id);$i++){
					$datacek = array(
						'ipmbl_cek_syarat_id'=>$ipmbl_cek_syarat_id[$i],
						'ipmbl_cek_ipmbl_id'=>$resultInti,
						'ipmbl_cek_ipmbldet_id'=>$resultdet,
						'ipmbl_cek_status'=>$ipmbl_cek_status[$i],
						'ipmbl_cek_keterangan'=>$ipmbl_cek_keterangan[$i]
					);
					$resultcek = $this->m_t_ipmbl_det->__insert($datacek, 't_ipmbl_ceklist', 'insertId');
				}
				for($i=0;$i<count($dok_ipmbl_id);$i++){
					$datadok = array(
						'dok_ipmbl_penerima'=>$dok_ipmbl_penerima[$i],
						'dok_ipmbl_jabatan'=>$dok_ipmbl_jabatan[$i],
						'dok_ipmbl_tanggal'=>date('Y-m-d', strtotime($dok_ipmbl_tanggal[$i])),
						'dok_ipmbl_keterangan'=>$dok_ipmbl_keterangan[$i],
						'dok_ipmbl_ipmbl_id'=>$resultInti,
						'dok_ipmbl_ipmbldet_id'=>$resultdet,
					);
					if($dok_ipmbl_id[$i] == 0){
						$resultdok = $this->m_t_ipmbl_det->__insert($datadok, 't_ipmbl_dok', 'insertId');
					}else{
						$resultdok = $this->m_t_ipmbl_det->__update($datadok, $dok_ipmbl_id[$i], 't_ipmbl_dok', '', 'dok_ipmbl_id');
					}
				}
				$this->m_t_ipmbl_det->__insertlog($ipmbl_det_author, $resultpemohon, $resultInti, 'Tambah');
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
		
		$ipmbl_det_updated_by = $this->m_t_ipmbl_det->__checkSession();
		$ipmbl_det_updated_date = date('Y-m-d H:i:s');
		
		$resultperusahaan = $this->m_t_ipmbl_det->cuperusahaan($params);
		$resultpemohon = $this->m_t_ipmbl_det->cupemohon($params);
		$resultpermohonan = $this->m_t_ipmbl_det->cupermohonan($params, $resultpemohon, '');
		
		if($ipmbl_det_updated_by != ''){
			$dataInti = array(
				'ipmbl_usaha'=>$perusahaan_nama,
				'ipmbl_alamatusaha'=>$perusahaan_alamat,
				'ipmbl_kelurahan'=>$perusahaan_desa_nama,
				'ipmbl_kecamatan'=>$perusahaan_kecamatan_nama,
				'ipmbl_luas'=>$det_ipmbl_luas,
				'ipmbl_volume'=>$det_ipmbl_volume,
				'ipmbl_keperluan'=>$det_ipmbl_keperluan,
				'ipmbl_lokasi'=>$det_ipmbl_lokasi
			);
			$resultInti = $this->m_t_ipmbl_det->__update($dataInti, $det_ipmbl_ipmbl_id, 't_ipmbl', 'updateId', 'ipmbl_id');
			$result = 'success';
			$data = array(
				'det_ipmbl_ipmbl_id'=>$det_ipmbl_ipmbl_id,
				'det_ipmbl_jenis'=>$det_ipmbl_jenis,
				'det_ipmbl_tanggal'=>date('Y-m-d', strtotime($permohonan_tanggal)),
				'det_ipmbl_nomoragenda'=>$det_ipmbl_nomoragenda,
				'det_ipmbl_berkasmasuk'=>$det_ipmbl_berkasmasuk,
				'det_ipmbl_surveytanggal'=>date('Y-m-d', strtotime($det_ipmbl_surveytanggal)),
				'det_ipmbl_surveylulus'=>$det_ipmbl_surveylulus,
				'det_ipmbl_status'=>$det_ipmbl_status,
				'det_ipmbl_surveypetugas'=>$det_ipmbl_surveypetugas,
				'det_ipmbl_surveydinas'=>$det_ipmbl_surveydinas,
				'det_ipmbl_surveynip'=>$det_ipmbl_surveynip,
				'det_ipmbl_surveypendapat'=>$det_ipmbl_surveypendapat,
				'det_ipmbl_rekombl'=>$det_ipmbl_rekombl,
				'det_ipmbl_rekomblhtanggal'=>date('Y-m-d', strtotime($det_ipmbl_rekomblhtanggal)),
				'det_ipmbl_rekomkel'=>$det_ipmbl_rekomkel,
				'det_ipmbl_rekomkeltanggal'=>date('Y-m-d', strtotime($det_ipmbl_rekomkeltanggal)),
				'det_ipmbl_rekomkec'=>$det_ipmbl_rekomkec,
				'det_ipmbl_rekomkectanggal'=>date('Y-m-d', strtotime($det_ipmbl_rekomkectanggal)),
				'det_ipmbl_kadaluarsa'=>date('Y-m-d', strtotime($det_ipmbl_kadaluarsa)),
				'det_ipmbl_pemohon_id'=>$resultpemohon,
				'det_ipmbl_retribusi'=>$det_ipmbl_retribusi
				);
			$resultdet = $this->m_t_ipmbl_det->__update($data, $det_ipmbl_id, '', 'updateId','');
			for($i=0;$i<count($ipmbl_cek_syarat_id);$i++){
				$datacek = array(
					'ipmbl_cek_syarat_id'=>$ipmbl_cek_syarat_id[$i],
					'ipmbl_cek_ipmbl_id'=>$det_ipmbl_ipmbl_id,
					'ipmbl_cek_ipmbldet_id'=>$det_ipmbl_id,
					'ipmbl_cek_status'=>$ipmbl_cek_status[$i],
					'ipmbl_cek_keterangan'=>$ipmbl_cek_keterangan[$i]
				);
				$resultcek = $this->m_t_ipmbl_det->__update($datacek, $ipmbl_cek_id[$i], 't_ipmbl_ceklist', 'updateId','ipmbl_cek_id');
			}
			for($i=0;$i<count($dok_ipmbl_id);$i++){
				$datadok = array(
					'dok_ipmbl_penerima'=>$dok_ipmbl_penerima[$i],
					'dok_ipmbl_jabatan'=>$dok_ipmbl_jabatan[$i],
					'dok_ipmbl_tanggal'=>date('Y-m-d', strtotime($dok_ipmbl_tanggal[$i])),
					'dok_ipmbl_keterangan'=>$dok_ipmbl_keterangan[$i],
					'dok_ipmbl_ipmbl_id'=>$det_ipmbl_ipmbl_id,
					'dok_ipmbl_ipmbldet_id'=>$det_ipmbl_id,
				);
				if($dok_ipmbl_id[$i] == 0){
					$resultdok = $this->m_t_ipmbl_det->__insert($datadok, 't_ipmbl_dok', 'insertId');
				}else{
					$resultdok = $this->m_t_ipmbl_det->__update($datadok, $dok_ipmbl_id[$i], 't_ipmbl_dok', '', 'dok_ipmbl_id');
				}
			}
			$this->m_t_ipmbl_det->__insertlog($ipmbl_det_updated_by, $resultpemohon, $det_ipmbl_id, 'Ubah');
		}else{
			$result = 'sessionExpired';
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_ipmbl_det->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$det_ipmbl_ipmbl_id = htmlentities($this->input->post('det_ipmbl_ipmbl_id'),ENT_QUOTES);
		$det_ipmbl_ipmbl_id = is_numeric($det_ipmbl_ipmbl_id) ? $det_ipmbl_ipmbl_id : 0;
		$det_ipmbl_jenis = htmlentities($this->input->post('det_ipmbl_jenis'),ENT_QUOTES);
		$det_ipmbl_jenis = is_numeric($det_ipmbl_jenis) ? $det_ipmbl_jenis : 0;
		$det_ipmbl_tanggal = htmlentities($this->input->post('det_ipmbl_tanggal'),ENT_QUOTES);
		$det_ipmbl_nama = htmlentities($this->input->post('det_ipmbl_nama'),ENT_QUOTES);
		$det_ipmbl_alamat = htmlentities($this->input->post('det_ipmbl_alamat'),ENT_QUOTES);
		$det_ipmbl_kelurahan = htmlentities($this->input->post('det_ipmbl_kelurahan'),ENT_QUOTES);
		$det_ipmbl_kelurahan = is_numeric($det_ipmbl_kelurahan) ? $det_ipmbl_kelurahan : 0;
		$det_ipmbl_kecamatan = htmlentities($this->input->post('det_ipmbl_kecamatan'),ENT_QUOTES);
		$det_ipmbl_kecamatan = is_numeric($det_ipmbl_kecamatan) ? $det_ipmbl_kecamatan : 0;
		$det_ipmbl_kota = htmlentities($this->input->post('det_ipmbl_kota'),ENT_QUOTES);
		$det_ipmbl_kota = is_numeric($det_ipmbl_kota) ? $det_ipmbl_kota : 0;
		$det_ipmbl_telp = htmlentities($this->input->post('det_ipmbl_telp'),ENT_QUOTES);
		$det_ipmbl_nomoragenda = htmlentities($this->input->post('det_ipmbl_nomoragenda'),ENT_QUOTES);
		$det_ipmbl_nomoragenda = is_numeric($det_ipmbl_nomoragenda) ? $det_ipmbl_nomoragenda : 0;
		$det_ipmbl_berkasmasuk = htmlentities($this->input->post('det_ipmbl_berkasmasuk'),ENT_QUOTES);
		$det_ipmbl_surveytanggal = htmlentities($this->input->post('det_ipmbl_surveytanggal'),ENT_QUOTES);
		$det_ipmbl_surveylulus = htmlentities($this->input->post('det_ipmbl_surveylulus'),ENT_QUOTES);
		$det_ipmbl_status = htmlentities($this->input->post('det_ipmbl_status'),ENT_QUOTES);
		$det_ipmbl_surveypetugas = htmlentities($this->input->post('det_ipmbl_surveypetugas'),ENT_QUOTES);
		$det_ipmbl_surveydinas = htmlentities($this->input->post('det_ipmbl_surveydinas'),ENT_QUOTES);
		$det_ipmbl_surveynip = htmlentities($this->input->post('det_ipmbl_surveynip'),ENT_QUOTES);
		$det_ipmbl_surveypendapat = htmlentities($this->input->post('det_ipmbl_surveypendapat'),ENT_QUOTES);
		$det_ipmbl_rekombl = htmlentities($this->input->post('det_ipmbl_rekombl'),ENT_QUOTES);
		$det_ipmbl_rekomblhtanggal = htmlentities($this->input->post('det_ipmbl_rekomblhtanggal'),ENT_QUOTES);
		$det_ipmbl_rekomkel = htmlentities($this->input->post('det_ipmbl_rekomkel'),ENT_QUOTES);
		$det_ipmbl_rekomkeltanggal = htmlentities($this->input->post('det_ipmbl_rekomkeltanggal'),ENT_QUOTES);
		$det_ipmbl_rekomkec = htmlentities($this->input->post('det_ipmbl_rekomkec'),ENT_QUOTES);
		$det_ipmbl_rekomkectanggal = htmlentities($this->input->post('det_ipmbl_rekomkectanggal'),ENT_QUOTES);
		$det_ipmbl_sk = htmlentities($this->input->post('det_ipmbl_sk'),ENT_QUOTES);
		$det_ipmbl_kadaluarsa = htmlentities($this->input->post('det_ipmbl_kadaluarsa'),ENT_QUOTES);
		$det_ipmbl_berlaku = htmlentities($this->input->post('det_ipmbl_berlaku'),ENT_QUOTES);
				
		$params = array(
			'det_ipmbl_ipmbl_id'=>$det_ipmbl_ipmbl_id,
			'det_ipmbl_jenis'=>$det_ipmbl_jenis,
			'det_ipmbl_tanggal'=>$det_ipmbl_tanggal,
			'det_ipmbl_nama'=>$det_ipmbl_nama,
			'det_ipmbl_alamat'=>$det_ipmbl_alamat,
			'det_ipmbl_kelurahan'=>$det_ipmbl_kelurahan,
			'det_ipmbl_kecamatan'=>$det_ipmbl_kecamatan,
			'det_ipmbl_kota'=>$det_ipmbl_kota,
			'det_ipmbl_telp'=>$det_ipmbl_telp,
			'det_ipmbl_nomoragenda'=>$det_ipmbl_nomoragenda,
			'det_ipmbl_berkasmasuk'=>$det_ipmbl_berkasmasuk,
			'det_ipmbl_surveytanggal'=>$det_ipmbl_surveytanggal,
			'det_ipmbl_surveylulus'=>$det_ipmbl_surveylulus,
			'det_ipmbl_status'=>$det_ipmbl_status,
			'det_ipmbl_surveypetugas'=>$det_ipmbl_surveypetugas,
			'det_ipmbl_surveydinas'=>$det_ipmbl_surveydinas,
			'det_ipmbl_surveynip'=>$det_ipmbl_surveynip,
			'det_ipmbl_surveypendapat'=>$det_ipmbl_surveypendapat,
			'det_ipmbl_rekombl'=>$det_ipmbl_rekombl,
			'det_ipmbl_rekomblhtanggal'=>$det_ipmbl_rekomblhtanggal,
			'det_ipmbl_rekomkel'=>$det_ipmbl_rekomkel,
			'det_ipmbl_rekomkeltanggal'=>$det_ipmbl_rekomkeltanggal,
			'det_ipmbl_rekomkec'=>$det_ipmbl_rekomkec,
			'det_ipmbl_rekomkectanggal'=>$det_ipmbl_rekomkectanggal,
			'det_ipmbl_sk'=>$det_ipmbl_sk,
			'det_ipmbl_kadaluarsa'=>$det_ipmbl_kadaluarsa,
			'det_ipmbl_berlaku'=>$det_ipmbl_berlaku,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_ipmbl_det->search($params);
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
		
		$record = $this->m_t_ipmbl_det->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_ipmbl_det.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_ipmbl_det_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_ipmbl_det_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$ipmbl_id = $this->input->post('ipmbl_id');
		$ipmbl_det_id = $this->input->post('ipmbl_det_id');
		$params = array(
			"currentAction"=>$currentAction,
			"ipmbl_id"=>$ipmbl_id,
			"ipmbl_det_id"=>$ipmbl_det_id
		);
		$result = $this->m_t_ipmbl_det->getSyarat($params);
		echo $result;
	}
	function getRiwayat(){
		$currentAction = $this->input->post('currentAction');
		$ipmbl_id = $this->input->post('ipmbl_id');
		$ipmbl_det_id = $this->input->post('ipmbl_det_id');
		$params = array(
			"currentAction"=>$currentAction,
			"ipmbl_id"=>$ipmbl_id,
			"ipmbl_det_id"=>$ipmbl_det_id
		);
		$result = $this->m_t_ipmbl_det->getRiwayat($params);
		echo $result;
	}
	function ubahProses(){
		$ipmbldet_id  = $this->input->post('ipmbldet_id');
		$ipmbldet_nosk  = $this->input->post('ipmbldet_nosk');
		$proses  = $this->input->post('proses');
		if($proses == 'Selesai, belum diambil' && $ipmbldet_nosk == ''){
			$nosk = $this->m_public_function->getNomorSk(1);
			$data_sk = array(
				"det_ipmbl_sk"=>$nosk,
				"det_ipmbl_berlaku"=>date('Y-m-d')
			);
			$this->db->where('det_ipmbl_id', $ipmbldet_id);
			$this->db->update('t_ipmbl_det', $data_sk);
			$data_sk_permohonan = array(
				"nosk"=>$nosk,
				"tglsk"=>date('Y-m-d')
			);
			$this->db->where('id', $permohonan_id);
			$this->db->update('permohonan', $data_sk_permohonan);
		}
		$data = array(
			"det_ipmbl_proses"=>$proses
		);
		$result = $this->m_t_ipmbl_det->__update($data, $ipmbldet_id, '', '','');
		echo $result;
	}
	function cetakLembarKontrol(){
		$ipmbldet_id  = $this->input->post('ipmbldet_id');
		$params = array(
			"det_ipmbl_id"=>$ipmbldet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_ipmbl_det->search($params);
		$dataceklist = $this->db->where('ipmbl_cek_ipmbldet_id', $ipmbldet_id)->join('master_syarat','ipmbl_cek_syarat_id = ID_SYARAT')->get('t_ipmbl_ceklist')->result();
		$datadok = $this->db->where('dok_ipmbl_ipmbldet_id', $ipmbldet_id)->get('t_ipmbl_dok')->result();
		$data['printrecord'] = $printrecord[1];
		$data['dataceklist'] = $dataceklist;
		$data['datadok'] = $datadok;
		$print_view=$this->load->view('template/p_ipmbl_lembarkontrol.php',$data,TRUE);
		$print_file=fopen('print/ipmbl_lembarkontrol.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakBap(){
		$ipmbldet_id  = $this->input->post('ipmbldet_id');
		$params = array(
			"det_ipmbl_id"=>$ipmbldet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_ipmbl_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$print_view=$this->load->view('template/p_ipmbl_bapeninjauan.php',$data,TRUE);
		$print_file=fopen('print/ipmbl_bap.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakBp(){
		$ipmbldet_id  = $this->input->post('ipmbldet_id');
		$params = array(
			"det_ipmbl_id"=>$ipmbldet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_ipmbl_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$data['dataijin'] = $this->db->where('id',23)->get('ijin')->row();
		$print_view=$this->load->view('template/p_ipmbl_buktiterima.php',$data,TRUE);
		$print_file=fopen('print/ipmbl_buktipenerimaan.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakSk(){
		$ipmbldet_id  = $this->input->post('ipmbldet_id');
		$params = array(
			"det_ipmbl_id"=>$ipmbldet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_ipmbl_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$data['dataijin'] = $this->db->where('id',23)->get('ijin')->row();
		$sub = $data['printrecord'][0];
		if($sub->det_ipmbl_sk == ''){
			echo 'nosk';
		}else if($sub->det_ipmbl_kadaluarsa == '' || $sub->det_ipmbl_kadaluarsa == '0000-00-00'){
			echo 'notglkadaluarsa';
		}else{
			$print_view=$this->load->view('template/p_ipmbl_sk.php',$data,TRUE);
			$print_file=fopen('print/ipmbl_sk.html','w+');
			fwrite($print_file, $print_view);
			echo 'success';
		}
	}
	
}