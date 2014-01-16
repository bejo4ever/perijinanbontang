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
		$det_simb_id = htmlentities($this->input->post('det_simb_id'),ENT_QUOTES);
		$det_simb_id = is_numeric($det_simb_id) ? $det_simb_id : 0;
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
		
		$simb_per_npwp = htmlentities($this->input->post('simb_per_npwp'),ENT_QUOTES);
		$simb_per_nama = htmlentities($this->input->post('simb_per_nama'),ENT_QUOTES);
		$simb_per_akta = htmlentities($this->input->post('simb_per_akta'),ENT_QUOTES);
		$simb_per_bentuk = htmlentities($this->input->post('simb_per_bentuk'),ENT_QUOTES);
		$simb_per_bentuk = is_numeric($simb_per_bentuk) ? $simb_per_bentuk : 0;
		$simb_per_alamat = htmlentities($this->input->post('simb_per_alamat'),ENT_QUOTES);
		$simb_per_kel = htmlentities($this->input->post('simb_per_kel'),ENT_QUOTES);
		$simb_per_kec = htmlentities($this->input->post('simb_per_kec'),ENT_QUOTES);
		$simb_per_kota = htmlentities($this->input->post('simb_per_kota'),ENT_QUOTES);
		$simb_per_telp = htmlentities($this->input->post('simb_per_telp'),ENT_QUOTES);
		$simb_jenis = htmlentities($this->input->post('simb_jenis'),ENT_QUOTES);
		$simb_status = htmlentities($this->input->post('simb_status'),ENT_QUOTES);
		$simb_status = is_numeric($simb_status) ? $simb_status : 0;
		$simb_jenisusaha = htmlentities($this->input->post('simb_jenisusaha'),ENT_QUOTES);
		$simb_panjang = htmlentities($this->input->post('simb_panjang'),ENT_QUOTES);
		$simb_panjang = is_numeric($simb_panjang) ? $simb_panjang : 0;
		$simb_lebar = htmlentities($this->input->post('simb_lebar'),ENT_QUOTES);
		$simb_lebar = is_numeric($simb_lebar) ? $simb_lebar : 0;
		$simb_alamat = htmlentities($this->input->post('simb_alamat'),ENT_QUOTES);
		$simb_kel = htmlentities($this->input->post('simb_kel'),ENT_QUOTES);
		$simb_kec = htmlentities($this->input->post('simb_kec'),ENT_QUOTES);
		$simb_bentuk = htmlentities($this->input->post('simb_bentuk'),ENT_QUOTES);
		$simb_bentuk = is_numeric($simb_bentuk) ? $simb_bentuk : 0;
		$simb_lokasi = htmlentities($this->input->post('simb_lokasi'),ENT_QUOTES);
		$simb_lokasi = is_numeric($simb_lokasi) ? $simb_lokasi : 0;
		$simb_gangguan = htmlentities($this->input->post('simb_gangguan'),ENT_QUOTES);
		$simb_gangguan = is_numeric($simb_gangguan) ? $simb_gangguan : 0;
		$simb_batasutara = htmlentities($this->input->post('simb_batasutara'),ENT_QUOTES);
		$simb_batastimur = htmlentities($this->input->post('simb_batastimur'),ENT_QUOTES);
		$simb_batasselatan = htmlentities($this->input->post('simb_batasselatan'),ENT_QUOTES);
		$simb_batasbarat = htmlentities($this->input->post('simb_batasbarat'),ENT_QUOTES);
		
		$pemohon_id = htmlentities($this->input->post('pemohon_id'),ENT_QUOTES);
		$pemohon_id = is_numeric($pemohon_id) ? $pemohon_id : 0;
		$pemohon_nama = htmlentities($this->input->post('pemohon_nama'),ENT_QUOTES);
		$pemohon_alamat = htmlentities($this->input->post('pemohon_alamat'),ENT_QUOTES);
		$pemohon_telp = htmlentities($this->input->post('pemohon_telp'),ENT_QUOTES);
		$pemohon_npwp = htmlentities($this->input->post('pemohon_npwp'),ENT_QUOTES);
		$pemohon_rt = htmlentities($this->input->post('pemohon_rt'),ENT_QUOTES);
		$pemohon_rt = is_numeric($pemohon_rt) ? $pemohon_rt : 0;
		$pemohon_rw = htmlentities($this->input->post('pemohon_rw'),ENT_QUOTES);
		$pemohon_rw = is_numeric($pemohon_rw) ? $pemohon_rw : 0;
		$pemohon_kel = htmlentities($this->input->post('pemohon_kel'),ENT_QUOTES);
		$pemohon_kec = htmlentities($this->input->post('pemohon_kec'),ENT_QUOTES);
		$pemohon_nik = htmlentities($this->input->post('pemohon_nik'),ENT_QUOTES);
		$pemohon_stra = htmlentities($this->input->post('pemohon_stra'),ENT_QUOTES);
		$pemohon_surattugas = htmlentities($this->input->post('pemohon_surattugas'),ENT_QUOTES);
		$pemohon_pekerjaan = htmlentities($this->input->post('pemohon_pekerjaan'),ENT_QUOTES);
		$pemohon_tempatlahir = htmlentities($this->input->post('pemohon_tempatlahir'),ENT_QUOTES);
		$pemohon_tanggallahir = htmlentities($this->input->post('pemohon_tanggallahir'),ENT_QUOTES);
		$pemohon_user_id = htmlentities($this->input->post('pemohon_user_id'),ENT_QUOTES);
		$pemohon_user_id = is_numeric($pemohon_user_id) ? $pemohon_user_id : 0;
		$pemohon_pendidikan = htmlentities($this->input->post('pemohon_pendidikan'),ENT_QUOTES);
		$pemohon_tahunlulus = htmlentities($this->input->post('pemohon_tahunlulus'),ENT_QUOTES);
		$pemohon_tahunlulus = is_numeric($pemohon_tahunlulus) ? $pemohon_tahunlulus : 0;
		
		$simb_cek_id = json_decode($this->input->post('simb_cek_id'));
		$simb_cek_syarat_id = json_decode($this->input->post('simb_cek_syarat_id'));
		$simb_cek_status = json_decode($this->input->post('simb_cek_status'));
		$simb_cek_keterangan = json_decode($this->input->post('simb_cek_keterangan'));
		
		$det_simb_retribusi = htmlentities($this->input->post('det_simb_retribusi'),ENT_QUOTES);
		$det_simb_retribusi = is_numeric($det_simb_retribusi) ? $det_simb_retribusi : 0;
		
		$simb_det_author = $this->m_t_simb_det->__checkSession();
		$simb_det_created_date = date('Y-m-d H:i:s');
		
		$datapemohon = array(
			'pemohon_nama'=>$pemohon_nama,
			'pemohon_alamat'=>$pemohon_alamat,
			'pemohon_telp'=>$pemohon_telp,
			'pemohon_npwp'=>$pemohon_npwp,
			'pemohon_rt'=>$pemohon_rt,
			'pemohon_rw'=>$pemohon_rw,
			'pemohon_kel'=>$pemohon_kel,
			'pemohon_kec'=>$pemohon_kec,
			'pemohon_nik'=>$pemohon_nik,
			'pemohon_stra'=>$pemohon_stra,
			'pemohon_surattugas'=>$pemohon_surattugas,
			'pemohon_pekerjaan'=>$pemohon_pekerjaan,
			'pemohon_tempatlahir'=>$pemohon_tempatlahir,
			'pemohon_tanggallahir'=>$pemohon_tanggallahir,
			'pemohon_pendidikan'=>$pemohon_pendidikan,
			'pemohon_tahunlulus'=>$pemohon_tahunlulus,
		);
		if($pemohon_id != 0){
			$resultpemohon = $this->m_t_simb_det->__update($datapemohon, $pemohon_id, 'm_pemohon', 'updateId','pemohon_id');
			$resultpemohon = $pemohon_id;
		}else{
			$datapemohon["pemohon_user_id"]=$simb_det_author;
			$resultpemohon = $this->m_t_simb_det->__insert($datapemohon, 'm_pemohon', 'insertId');
		}
		
		if($simb_det_author != ''){
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
			if($resultInti != 0){
				$result = 'success';
				$data = array(
					'det_simb_id'=>$det_simb_id,
					'det_simb_simb_id'=>$resultInti,
					'det_simb_jenis'=>$det_simb_jenis,
					'det_simb_tanggal'=>$det_simb_tanggal,
					'det_simb_pemohon_id'=>$resultpemohon,
					'det_simb_nomorreg'=>$det_simb_nomorreg,
					'det_simb_proses'=>$det_simb_proses,
					'det_simb_sk'=>$det_simb_sk,
					'det_simb_berlaku'=>$det_simb_berlaku,
					'det_simb_kadaluarsa'=>$det_simb_kadaluarsa,
					'det_simb_penerima'=>$det_simb_penerima,
					'det_simb_tanggalterima'=>$det_simb_tanggalterima,
					'det_simb_keterangan'=>$det_simb_keterangan,
					'det_simb_retribusi'=>$det_simb_retribusi
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
		$det_simb_id = htmlentities($this->input->post('det_simb_id'),ENT_QUOTES);
		$det_simb_id = is_numeric($det_simb_id) ? $det_simb_id : 0;
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
		
		
		$simb_per_npwp = htmlentities($this->input->post('simb_per_npwp'),ENT_QUOTES);
		$simb_per_nama = htmlentities($this->input->post('simb_per_nama'),ENT_QUOTES);
		$simb_per_akta = htmlentities($this->input->post('simb_per_akta'),ENT_QUOTES);
		$simb_per_bentuk = htmlentities($this->input->post('simb_per_bentuk'),ENT_QUOTES);
		$simb_per_bentuk = is_numeric($simb_per_bentuk) ? $simb_per_bentuk : 0;
		$simb_per_alamat = htmlentities($this->input->post('simb_per_alamat'),ENT_QUOTES);
		$simb_per_kel = htmlentities($this->input->post('simb_per_kel'),ENT_QUOTES);
		$simb_per_kec = htmlentities($this->input->post('simb_per_kec'),ENT_QUOTES);
		$simb_per_kota = htmlentities($this->input->post('simb_per_kota'),ENT_QUOTES);
		$simb_per_telp = htmlentities($this->input->post('simb_per_telp'),ENT_QUOTES);
		$simb_jenis = htmlentities($this->input->post('simb_jenis'),ENT_QUOTES);
		$simb_status = htmlentities($this->input->post('simb_status'),ENT_QUOTES);
		$simb_status = is_numeric($simb_status) ? $simb_status : 0;
		$simb_jenisusaha = htmlentities($this->input->post('simb_jenisusaha'),ENT_QUOTES);
		$simb_panjang = htmlentities($this->input->post('simb_panjang'),ENT_QUOTES);
		$simb_panjang = is_numeric($simb_panjang) ? $simb_panjang : 0;
		$simb_lebar = htmlentities($this->input->post('simb_lebar'),ENT_QUOTES);
		$simb_lebar = is_numeric($simb_lebar) ? $simb_lebar : 0;
		$simb_alamat = htmlentities($this->input->post('simb_alamat'),ENT_QUOTES);
		$simb_kel = htmlentities($this->input->post('simb_kel'),ENT_QUOTES);
		$simb_kec = htmlentities($this->input->post('simb_kec'),ENT_QUOTES);
		$simb_bentuk = htmlentities($this->input->post('simb_bentuk'),ENT_QUOTES);
		$simb_bentuk = is_numeric($simb_bentuk) ? $simb_bentuk : 0;
		$simb_lokasi = htmlentities($this->input->post('simb_lokasi'),ENT_QUOTES);
		$simb_lokasi = is_numeric($simb_lokasi) ? $simb_lokasi : 0;
		$simb_gangguan = htmlentities($this->input->post('simb_gangguan'),ENT_QUOTES);
		$simb_gangguan = is_numeric($simb_gangguan) ? $simb_gangguan : 0;
		$simb_batasutara = htmlentities($this->input->post('simb_batasutara'),ENT_QUOTES);
		$simb_batastimur = htmlentities($this->input->post('simb_batastimur'),ENT_QUOTES);
		$simb_batasselatan = htmlentities($this->input->post('simb_batasselatan'),ENT_QUOTES);
		$simb_batasbarat = htmlentities($this->input->post('simb_batasbarat'),ENT_QUOTES);
		
		$pemohon_id = htmlentities($this->input->post('pemohon_id'),ENT_QUOTES);
		$pemohon_id = is_numeric($pemohon_id) ? $pemohon_id : 0;
		$pemohon_nama = htmlentities($this->input->post('pemohon_nama'),ENT_QUOTES);
		$pemohon_alamat = htmlentities($this->input->post('pemohon_alamat'),ENT_QUOTES);
		$pemohon_telp = htmlentities($this->input->post('pemohon_telp'),ENT_QUOTES);
		$pemohon_npwp = htmlentities($this->input->post('pemohon_npwp'),ENT_QUOTES);
		$pemohon_rt = htmlentities($this->input->post('pemohon_rt'),ENT_QUOTES);
		$pemohon_rt = is_numeric($pemohon_rt) ? $pemohon_rt : 0;
		$pemohon_rw = htmlentities($this->input->post('pemohon_rw'),ENT_QUOTES);
		$pemohon_rw = is_numeric($pemohon_rw) ? $pemohon_rw : 0;
		$pemohon_kel = htmlentities($this->input->post('pemohon_kel'),ENT_QUOTES);
		$pemohon_kec = htmlentities($this->input->post('pemohon_kec'),ENT_QUOTES);
		$pemohon_nik = htmlentities($this->input->post('pemohon_nik'),ENT_QUOTES);
		$pemohon_stra = htmlentities($this->input->post('pemohon_stra'),ENT_QUOTES);
		$pemohon_surattugas = htmlentities($this->input->post('pemohon_surattugas'),ENT_QUOTES);
		$pemohon_pekerjaan = htmlentities($this->input->post('pemohon_pekerjaan'),ENT_QUOTES);
		$pemohon_tempatlahir = htmlentities($this->input->post('pemohon_tempatlahir'),ENT_QUOTES);
		$pemohon_tanggallahir = htmlentities($this->input->post('pemohon_tanggallahir'),ENT_QUOTES);
		$pemohon_user_id = htmlentities($this->input->post('pemohon_user_id'),ENT_QUOTES);
		$pemohon_user_id = is_numeric($pemohon_user_id) ? $pemohon_user_id : 0;
		$pemohon_pendidikan = htmlentities($this->input->post('pemohon_pendidikan'),ENT_QUOTES);
		$pemohon_tahunlulus = htmlentities($this->input->post('pemohon_tahunlulus'),ENT_QUOTES);
		$pemohon_tahunlulus = is_numeric($pemohon_tahunlulus) ? $pemohon_tahunlulus : 0;
		
		$simb_cek_id = json_decode($this->input->post('simb_cek_id'));
		$simb_cek_syarat_id = json_decode($this->input->post('simb_cek_syarat_id'));
		$simb_cek_status = json_decode($this->input->post('simb_cek_status'));
		$simb_cek_keterangan = json_decode($this->input->post('simb_cek_keterangan'));
		
		$det_simb_retribusi = htmlentities($this->input->post('det_simb_retribusi'),ENT_QUOTES);
		$det_simb_retribusi = is_numeric($det_simb_retribusi) ? $det_simb_retribusi : 0;
		
		$simb_det_updated_by = $this->m_t_simb_det->__checkSession();
		$simb_det_updated_date = date('Y-m-d H:i:s');
		
		$datapemohon = array(
			'pemohon_nama'=>$pemohon_nama,
			'pemohon_alamat'=>$pemohon_alamat,
			'pemohon_telp'=>$pemohon_telp,
			'pemohon_npwp'=>$pemohon_npwp,
			'pemohon_rt'=>$pemohon_rt,
			'pemohon_rw'=>$pemohon_rw,
			'pemohon_kel'=>$pemohon_kel,
			'pemohon_kec'=>$pemohon_kec,
			'pemohon_nik'=>$pemohon_nik,
			'pemohon_stra'=>$pemohon_stra,
			'pemohon_surattugas'=>$pemohon_surattugas,
			'pemohon_pekerjaan'=>$pemohon_pekerjaan,
			'pemohon_tempatlahir'=>$pemohon_tempatlahir,
			'pemohon_tanggallahir'=>$pemohon_tanggallahir,
			'pemohon_pendidikan'=>$pemohon_pendidikan,
			'pemohon_tahunlulus'=>$pemohon_tahunlulus,
		);
		if($pemohon_id != 0){
			$resultpemohon = $this->m_t_simb_det->__update($datapemohon, $pemohon_id, 'm_pemohon', 'updateId','pemohon_id');
			$resultpemohon = $pemohon_id;
		}else{
			$datapemohon["pemohon_user_id"]=$simb_det_updated_by;
			$resultpemohon = $this->m_t_simb_det->__insert($datapemohon, 'm_pemohon', 'insertId');
		}
		
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
				'det_simb_jenis'=>$det_simb_jenis,
				'det_simb_tanggal'=>$det_simb_tanggal,
				'det_simb_pemohon_id'=>$resultpemohon,
				'det_simb_nomorreg'=>$det_simb_nomorreg,
				'det_simb_proses'=>$det_simb_proses,
				'det_simb_sk'=>$det_simb_sk,
				'det_simb_berlaku'=>$det_simb_berlaku,
				'det_simb_kadaluarsa'=>$det_simb_kadaluarsa,
				'det_simb_penerima'=>$det_simb_penerima,
				'det_simb_tanggalterima'=>$det_simb_tanggalterima,
				'det_simb_keterangan'=>$det_simb_keterangan,
				'det_simb_retribusi'=>$det_simb_retribusi
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
			'searchText' => $searchText,
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
		$data['dataijin'] = $this->db->where('ID_IJIN',1)->get('master_ijin')->row();
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
		$data['dataijin'] = $this->db->where('ID_IJIN',1)->get('master_ijin')->row();
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