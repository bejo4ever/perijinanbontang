<?php
class C_t_apotek_det extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_apotek_det');
	}
	
	function index(){
		$this->load->view('main/v_t_apotek_det');
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
		$result = $this->m_t_apotek_det->getList($params);
		echo $result;
	}
	
	function create(){
		$det_apotek_id = htmlentities($this->input->post('det_apotek_id'),ENT_QUOTES);
		$det_apotek_id = is_numeric($det_apotek_id) ? $det_apotek_id : 0;
		$det_apotek_apotek_id = htmlentities($this->input->post('det_apotek_apotek_id'),ENT_QUOTES);
		$det_apotek_apotek_id = is_numeric($det_apotek_apotek_id) ? $det_apotek_apotek_id : 0;
		$det_apotek_jenis = htmlentities($this->input->post('det_apotek_jenis'),ENT_QUOTES);
		$det_apotek_jenis = is_numeric($det_apotek_jenis) ? $det_apotek_jenis : 0;
		$det_apotek_surveylulus = htmlentities($this->input->post('det_apotek_surveylulus'),ENT_QUOTES);
		$det_apotek_surveylulus = is_numeric($det_apotek_surveylulus) ? $det_apotek_surveylulus : 0;
		$det_apotek_nama = htmlentities($this->input->post('det_apotek_nama'),ENT_QUOTES);
		$det_apotek_alamat = htmlentities($this->input->post('det_apotek_alamat'),ENT_QUOTES);
		$det_apotek_telp = htmlentities($this->input->post('det_apotek_telp'),ENT_QUOTES);
		$det_apotek_sp = htmlentities($this->input->post('det_apotek_sp'),ENT_QUOTES);
		$det_apotek_ktp = htmlentities($this->input->post('det_apotek_ktp'),ENT_QUOTES);
		$det_apotek_tempatlahir = htmlentities($this->input->post('det_apotek_tempatlahir'),ENT_QUOTES);
		$det_apotek_tanggallahir = htmlentities($this->input->post('det_apotek_tanggallahir'),ENT_QUOTES);
		$det_apotek_pekerjaan = htmlentities($this->input->post('det_apotek_pekerjaan'),ENT_QUOTES);
		$det_apotek_npwp = htmlentities($this->input->post('det_apotek_npwp'),ENT_QUOTES);
		$det_apotek_stra = htmlentities($this->input->post('det_apotek_stra'),ENT_QUOTES);
		$det_apotek_pendidikan = htmlentities($this->input->post('det_apotek_pendidikan'),ENT_QUOTES);
		$det_apotek_tahunlulus = htmlentities($this->input->post('det_apotek_tahunlulus'),ENT_QUOTES);
		$det_apotek_tahunlulus = is_numeric($det_apotek_tahunlulus) ? $det_apotek_tahunlulus : 0;
		$det_apotek_terima = htmlentities($this->input->post('det_apotek_terima'),ENT_QUOTES);
		$det_apotek_terimatanggal = htmlentities($this->input->post('det_apotek_terimatanggal'),ENT_QUOTES);
		$det_apotek_kelengkapan = htmlentities($this->input->post('det_apotek_kelengkapan'),ENT_QUOTES);
		$det_apotek_kelengkapan = is_numeric($det_apotek_kelengkapan) ? $det_apotek_kelengkapan : 0;
		$det_apotek_bap = htmlentities($this->input->post('det_apotek_bap'),ENT_QUOTES);
		$det_apotek_baptanggal = htmlentities($this->input->post('det_apotek_baptanggal'),ENT_QUOTES);
		$det_apotek_keputusan = htmlentities($this->input->post('det_apotek_keputusan'),ENT_QUOTES);
		$det_apotek_keputusan = is_numeric($det_apotek_keputusan) ? $det_apotek_keputusan : 0;
		$det_apotek_keterangan = htmlentities($this->input->post('det_apotek_keterangan'),ENT_QUOTES);
		$det_apotek_jarak = htmlentities($this->input->post('det_apotek_jarak'),ENT_QUOTES);
		$det_apotek_jarak = is_numeric($det_apotek_jarak) ? $det_apotek_jarak : 0;
		$det_apotek_rracik = htmlentities($this->input->post('det_apotek_rracik'),ENT_QUOTES);
		$det_apotek_rracik = is_numeric($det_apotek_rracik) ? $det_apotek_rracik : 0;
		$det_apotek_radmin = htmlentities($this->input->post('det_apotek_radmin'),ENT_QUOTES);
		$det_apotek_radmin = is_numeric($det_apotek_radmin) ? $det_apotek_radmin : 0;
		$det_apotek_rkerja = htmlentities($this->input->post('det_apotek_rkerja'),ENT_QUOTES);
		$det_apotek_rkerja = is_numeric($det_apotek_rkerja) ? $det_apotek_rkerja : 0;
		$det_apotek_rtunggu = htmlentities($this->input->post('det_apotek_rtunggu'),ENT_QUOTES);
		$det_apotek_rtunggu = is_numeric($det_apotek_rtunggu) ? $det_apotek_rtunggu : 0;
		$det_apotek_rwc = htmlentities($this->input->post('det_apotek_rwc'),ENT_QUOTES);
		$det_apotek_rwc = is_numeric($det_apotek_rwc) ? $det_apotek_rwc : 0;
		$det_apotek_air = htmlentities($this->input->post('det_apotek_air'),ENT_QUOTES);
		$det_apotek_listrik = htmlentities($this->input->post('det_apotek_listrik'),ENT_QUOTES);
		$det_apotek_apk = htmlentities($this->input->post('det_apotek_apk'),ENT_QUOTES);
		$det_apotek_apk = is_numeric($det_apotek_apk) ? $det_apotek_apk : 0;
		$det_apotek_apkukuran = htmlentities($this->input->post('det_apotek_apkukuran'),ENT_QUOTES);
		$det_apotek_jendela = htmlentities($this->input->post('det_apotek_jendela'),ENT_QUOTES);
		$det_apotek_jendela = is_numeric($det_apotek_jendela) ? $det_apotek_jendela : 0;
		$det_apotek_limbah = htmlentities($this->input->post('det_apotek_limbah'),ENT_QUOTES);
		$det_apotek_limbah = is_numeric($det_apotek_limbah) ? $det_apotek_limbah : 0;
		$det_apotek_baksampah = htmlentities($this->input->post('det_apotek_baksampah'),ENT_QUOTES);
		$det_apotek_baksampah = is_numeric($det_apotek_baksampah) ? $det_apotek_baksampah : 0;
		$det_apotek_parkir = htmlentities($this->input->post('det_apotek_parkir'),ENT_QUOTES);
		$det_apotek_parkir = is_numeric($det_apotek_parkir) ? $det_apotek_parkir : 0;
		$det_apotek_papannama = htmlentities($this->input->post('det_apotek_papannama'),ENT_QUOTES);
		$det_apotek_papannama = is_numeric($det_apotek_papannama) ? $det_apotek_papannama : 0;
		$det_apotek_pengelola = htmlentities($this->input->post('det_apotek_pengelola'),ENT_QUOTES);
		$det_apotek_pengelola = is_numeric($det_apotek_pengelola) ? $det_apotek_pengelola : 0;
		$det_apotek_pendamping = htmlentities($this->input->post('det_apotek_pendamping'),ENT_QUOTES);
		$det_apotek_pendamping = is_numeric($det_apotek_pendamping) ? $det_apotek_pendamping : 0;
		$det_apotek_asisten = htmlentities($this->input->post('det_apotek_asisten'),ENT_QUOTES);
		$det_apotek_asisten = is_numeric($det_apotek_asisten) ? $det_apotek_asisten : 0;
		$det_apotek_luas = htmlentities($this->input->post('det_apotek_luas'),ENT_QUOTES);
		$det_apotek_luas = is_numeric($det_apotek_luas) ? $det_apotek_luas : 0;
		$det_apotek_statustanah = htmlentities($this->input->post('det_apotek_statustanah'),ENT_QUOTES);
		$det_apotek_statustanah = is_numeric($det_apotek_statustanah) ? $det_apotek_statustanah : 0;
		$det_apotek_sewalama = htmlentities($this->input->post('det_apotek_sewalama'),ENT_QUOTES);
		$det_apotek_sewalama = is_numeric($det_apotek_sewalama) ? $det_apotek_sewalama : 0;
		$det_apotek_sewaawal = htmlentities($this->input->post('det_apotek_sewaawal'),ENT_QUOTES);
		$det_apotek_sewaakhir = htmlentities($this->input->post('det_apotek_sewaakhir'),ENT_QUOTES);
		$det_apotek_shnomor = htmlentities($this->input->post('det_apotek_shnomor'),ENT_QUOTES);
		$det_apotek_shtahun = htmlentities($this->input->post('det_apotek_shtahun'),ENT_QUOTES);
		$det_apotek_shtahun = is_numeric($det_apotek_shtahun) ? $det_apotek_shtahun : 0;
		$det_apotek_shgssu = htmlentities($this->input->post('det_apotek_shgssu'),ENT_QUOTES);
		$det_apotek_shtanggal = htmlentities($this->input->post('det_apotek_shtanggal'),ENT_QUOTES);
		$det_apotek_shan = htmlentities($this->input->post('det_apotek_shan'),ENT_QUOTES);
		$det_apotek_aktano = htmlentities($this->input->post('det_apotek_aktano'),ENT_QUOTES);
		$det_apotek_aktatahun = htmlentities($this->input->post('det_apotek_aktatahun'),ENT_QUOTES);
		$det_apotek_aktatahun = is_numeric($det_apotek_aktatahun) ? $det_apotek_aktatahun : 0;
		$det_apotek_aktanotaris = htmlentities($this->input->post('det_apotek_aktanotaris'),ENT_QUOTES);
		$det_apotek_aktaan = htmlentities($this->input->post('det_apotek_aktaan'),ENT_QUOTES);
		$det_apotek_ckutipan = htmlentities($this->input->post('det_apotek_ckutipan'),ENT_QUOTES);
		$det_apotek_ckec = htmlentities($this->input->post('det_apotek_ckec'),ENT_QUOTES);
		$det_apotek_ctanggal = htmlentities($this->input->post('det_apotek_ctanggal'),ENT_QUOTES);
		$det_apotek_cpetok = htmlentities($this->input->post('det_apotek_cpetok'),ENT_QUOTES);
		$det_apotek_cpersil = htmlentities($this->input->post('det_apotek_cpersil'),ENT_QUOTES);
		$det_apotek_ckelas = htmlentities($this->input->post('det_apotek_ckelas'),ENT_QUOTES);
		$det_apotek_can = htmlentities($this->input->post('det_apotek_can'),ENT_QUOTES);
		$det_apotek_sppihak1 = htmlentities($this->input->post('det_apotek_sppihak1'),ENT_QUOTES);
		$det_apotek_sppihak2 = htmlentities($this->input->post('det_apotek_sppihak2'),ENT_QUOTES);
		$det_apotek_spnomor = htmlentities($this->input->post('det_apotek_spnomor'),ENT_QUOTES);
		$det_apotek_sptanggal = htmlentities($this->input->post('det_apotek_sptanggal'),ENT_QUOTES);
		$det_apotek_notaris = htmlentities($this->input->post('det_apotek_notaris'),ENT_QUOTES);
		
		$apotek_nama = htmlentities($this->input->post('apotek_nama'),ENT_QUOTES);
		$apotek_alamat = htmlentities($this->input->post('apotek_alamat'),ENT_QUOTES);
		$apotek_telp = htmlentities($this->input->post('apotek_telp'),ENT_QUOTES);
		$apotek_kel = htmlentities($this->input->post('apotek_kel'),ENT_QUOTES);
		$apotek_kec = htmlentities($this->input->post('apotek_kec'),ENT_QUOTES);
		$apotek_kepemilikan = htmlentities($this->input->post('apotek_kepemilikan'),ENT_QUOTES);
		$apotek_kepemilikan = is_numeric($apotek_kepemilikan) ? $apotek_kepemilikan : 0;
		$apotek_pemilik = htmlentities($this->input->post('apotek_pemilik'),ENT_QUOTES);
		$apotek_pemilikalamat = htmlentities($this->input->post('apotek_pemilikalamat'),ENT_QUOTES);
		$apotek_pemiliknpwp = htmlentities($this->input->post('apotek_pemiliknpwp'),ENT_QUOTES);
		$apotek_siup = htmlentities($this->input->post('apotek_siup'),ENT_QUOTES);
		
		$apotek_cek_id = json_decode($this->input->post('apotek_cek_id'));
		$apotek_cek_syarat_id = json_decode($this->input->post('apotek_cek_syarat_id'));
		$apotek_cek_status = json_decode($this->input->post('apotek_cek_status'));
		$apotek_cek_keterangan = json_decode($this->input->post('apotek_cek_keterangan'));
		
		$apotek_det_author = $this->m_t_apotek_det->__checkSession();
		$apotek_det_created_date = date('Y-m-d H:i:s');
		
		if($apotek_det_author != ''){
			$dataInti = array(
				'apotek_nama'=>$apotek_nama,
				'apotek_alamat'=>$apotek_alamat,
				'apotek_telp'=>$apotek_telp,
				'apotek_kel'=>$apotek_kel,
				'apotek_kec'=>$apotek_kec,
				'apotek_kepemilikan'=>$apotek_kepemilikan,
				'apotek_pemilik'=>$apotek_pemilik,
				'apotek_pemilikalamat'=>$apotek_pemilikalamat,
				'apotek_pemiliknpwp'=>$apotek_pemiliknpwp,
				'apotek_siup'=>$apotek_siup
			);
			$resultInti = $this->m_t_apotek_det->__insert($dataInti, 't_apotek', 'insertId');
			if($resultInti != 0){
				$result = 'success';
				$data = array(
					'det_apotek_id'=>$det_apotek_id,
					'det_apotek_apotek_id'=>$resultInti,
					'det_apotek_jenis'=>$det_apotek_jenis,
					'det_apotek_surveylulus'=>$det_apotek_surveylulus,
					'det_apotek_nama'=>$det_apotek_nama,
					'det_apotek_alamat'=>$det_apotek_alamat,
					'det_apotek_telp'=>$det_apotek_telp,
					'det_apotek_sp'=>$det_apotek_sp,
					'det_apotek_ktp'=>$det_apotek_ktp,
					'det_apotek_tempatlahir'=>$det_apotek_tempatlahir,
					'det_apotek_tanggallahir'=>$det_apotek_tanggallahir,
					'det_apotek_pekerjaan'=>$det_apotek_pekerjaan,
					'det_apotek_npwp'=>$det_apotek_npwp,
					'det_apotek_stra'=>$det_apotek_stra,
					'det_apotek_pendidikan'=>$det_apotek_pendidikan,
					'det_apotek_tahunlulus'=>$det_apotek_tahunlulus,
					'det_apotek_terima'=>$det_apotek_terima,
					'det_apotek_terimatanggal'=>$det_apotek_terimatanggal,
					'det_apotek_kelengkapan'=>$det_apotek_kelengkapan,
					'det_apotek_bap'=>$det_apotek_bap,
					'det_apotek_baptanggal'=>$det_apotek_baptanggal,
					'det_apotek_keputusan'=>$det_apotek_keputusan,
					'det_apotek_keterangan'=>$det_apotek_keterangan,
					'det_apotek_jarak'=>$det_apotek_jarak,
					'det_apotek_rracik'=>$det_apotek_rracik,
					'det_apotek_radmin'=>$det_apotek_radmin,
					'det_apotek_rkerja'=>$det_apotek_rkerja,
					'det_apotek_rtunggu'=>$det_apotek_rtunggu,
					'det_apotek_rwc'=>$det_apotek_rwc,
					'det_apotek_air'=>$det_apotek_air,
					'det_apotek_listrik'=>$det_apotek_listrik,
					'det_apotek_apk'=>$det_apotek_apk,
					'det_apotek_apkukuran'=>$det_apotek_apkukuran,
					'det_apotek_jendela'=>$det_apotek_jendela,
					'det_apotek_limbah'=>$det_apotek_limbah,
					'det_apotek_baksampah'=>$det_apotek_baksampah,
					'det_apotek_parkir'=>$det_apotek_parkir,
					'det_apotek_papannama'=>$det_apotek_papannama,
					'det_apotek_pengelola'=>$det_apotek_pengelola,
					'det_apotek_pendamping'=>$det_apotek_pendamping,
					'det_apotek_asisten'=>$det_apotek_asisten,
					'det_apotek_luas'=>$det_apotek_luas,
					'det_apotek_statustanah'=>$det_apotek_statustanah,
					'det_apotek_sewalama'=>$det_apotek_sewalama,
					'det_apotek_sewaawal'=>$det_apotek_sewaawal,
					'det_apotek_sewaakhir'=>$det_apotek_sewaakhir,
					'det_apotek_shnomor'=>$det_apotek_shnomor,
					'det_apotek_shtahun'=>$det_apotek_shtahun,
					'det_apotek_shgssu'=>$det_apotek_shgssu,
					'det_apotek_shtanggal'=>$det_apotek_shtanggal,
					'det_apotek_shan'=>$det_apotek_shan,
					'det_apotek_aktano'=>$det_apotek_aktano,
					'det_apotek_aktatahun'=>$det_apotek_aktatahun,
					'det_apotek_aktanotaris'=>$det_apotek_aktanotaris,
					'det_apotek_aktaan'=>$det_apotek_aktaan,
					'det_apotek_ckutipan'=>$det_apotek_ckutipan,
					'det_apotek_ckec'=>$det_apotek_ckec,
					'det_apotek_ctanggal'=>$det_apotek_ctanggal,
					'det_apotek_cpetok'=>$det_apotek_cpetok,
					'det_apotek_cpersil'=>$det_apotek_cpersil,
					'det_apotek_ckelas'=>$det_apotek_ckelas,
					'det_apotek_can'=>$det_apotek_can,
					'det_apotek_sppihak1'=>$det_apotek_sppihak1,
					'det_apotek_sppihak2'=>$det_apotek_sppihak2,
					'det_apotek_spnomor'=>$det_apotek_spnomor,
					'det_apotek_sptanggal'=>$det_apotek_sptanggal,
					'det_apotek_notaris'=>$det_apotek_notaris,
					);
				$resultdet = $this->m_t_apotek_det->__insert($data, '', '');
				for($i=0;$i<count($apotek_cek_syarat_id);$i++){
					$datacek = array(
						'apotek_cek_syarat_id'=>$apotek_cek_syarat_id[$i],
						'apotek_cek_apotek_id'=>$resultInti,
						'apotek_cek_apotekdet_id'=>$resultdet,
						'apotek_cek_status'=>$apotek_cek_status[$i],
						'apotek_cek_keterangan'=>$apotek_cek_keterangan[$i]
					);
					$resultcek = $this->m_t_apotek_det->__insert($datacek, 't_apotek_ceklist', 'insertId');
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
		$det_apotek_id = htmlentities($this->input->post('det_apotek_id'),ENT_QUOTES);
		$det_apotek_id = is_numeric($det_apotek_id) ? $det_apotek_id : 0;
		$det_apotek_apotek_id = htmlentities($this->input->post('det_apotek_apotek_id'),ENT_QUOTES);
		$det_apotek_apotek_id = is_numeric($det_apotek_apotek_id) ? $det_apotek_apotek_id : 0;
		$det_apotek_jenis = htmlentities($this->input->post('det_apotek_jenis'),ENT_QUOTES);
		$det_apotek_jenis = is_numeric($det_apotek_jenis) ? $det_apotek_jenis : 0;
		$det_apotek_surveylulus = htmlentities($this->input->post('det_apotek_surveylulus'),ENT_QUOTES);
		$det_apotek_surveylulus = is_numeric($det_apotek_surveylulus) ? $det_apotek_surveylulus : 0;
		$det_apotek_nama = htmlentities($this->input->post('det_apotek_nama'),ENT_QUOTES);
		$det_apotek_alamat = htmlentities($this->input->post('det_apotek_alamat'),ENT_QUOTES);
		$det_apotek_telp = htmlentities($this->input->post('det_apotek_telp'),ENT_QUOTES);
		$det_apotek_sp = htmlentities($this->input->post('det_apotek_sp'),ENT_QUOTES);
		$det_apotek_ktp = htmlentities($this->input->post('det_apotek_ktp'),ENT_QUOTES);
		$det_apotek_tempatlahir = htmlentities($this->input->post('det_apotek_tempatlahir'),ENT_QUOTES);
		$det_apotek_tanggallahir = htmlentities($this->input->post('det_apotek_tanggallahir'),ENT_QUOTES);
		$det_apotek_pekerjaan = htmlentities($this->input->post('det_apotek_pekerjaan'),ENT_QUOTES);
		$det_apotek_npwp = htmlentities($this->input->post('det_apotek_npwp'),ENT_QUOTES);
		$det_apotek_stra = htmlentities($this->input->post('det_apotek_stra'),ENT_QUOTES);
		$det_apotek_pendidikan = htmlentities($this->input->post('det_apotek_pendidikan'),ENT_QUOTES);
		$det_apotek_tahunlulus = htmlentities($this->input->post('det_apotek_tahunlulus'),ENT_QUOTES);
		$det_apotek_tahunlulus = is_numeric($det_apotek_tahunlulus) ? $det_apotek_tahunlulus : 0;
		$det_apotek_terima = htmlentities($this->input->post('det_apotek_terima'),ENT_QUOTES);
		$det_apotek_terimatanggal = htmlentities($this->input->post('det_apotek_terimatanggal'),ENT_QUOTES);
		$det_apotek_kelengkapan = htmlentities($this->input->post('det_apotek_kelengkapan'),ENT_QUOTES);
		$det_apotek_kelengkapan = is_numeric($det_apotek_kelengkapan) ? $det_apotek_kelengkapan : 0;
		$det_apotek_bap = htmlentities($this->input->post('det_apotek_bap'),ENT_QUOTES);
		$det_apotek_baptanggal = htmlentities($this->input->post('det_apotek_baptanggal'),ENT_QUOTES);
		$det_apotek_keputusan = htmlentities($this->input->post('det_apotek_keputusan'),ENT_QUOTES);
		$det_apotek_keputusan = is_numeric($det_apotek_keputusan) ? $det_apotek_keputusan : 0;
		$det_apotek_keterangan = htmlentities($this->input->post('det_apotek_keterangan'),ENT_QUOTES);
		$det_apotek_jarak = htmlentities($this->input->post('det_apotek_jarak'),ENT_QUOTES);
		$det_apotek_jarak = is_numeric($det_apotek_jarak) ? $det_apotek_jarak : 0;
		$det_apotek_rracik = htmlentities($this->input->post('det_apotek_rracik'),ENT_QUOTES);
		$det_apotek_rracik = is_numeric($det_apotek_rracik) ? $det_apotek_rracik : 0;
		$det_apotek_radmin = htmlentities($this->input->post('det_apotek_radmin'),ENT_QUOTES);
		$det_apotek_radmin = is_numeric($det_apotek_radmin) ? $det_apotek_radmin : 0;
		$det_apotek_rkerja = htmlentities($this->input->post('det_apotek_rkerja'),ENT_QUOTES);
		$det_apotek_rkerja = is_numeric($det_apotek_rkerja) ? $det_apotek_rkerja : 0;
		$det_apotek_rtunggu = htmlentities($this->input->post('det_apotek_rtunggu'),ENT_QUOTES);
		$det_apotek_rtunggu = is_numeric($det_apotek_rtunggu) ? $det_apotek_rtunggu : 0;
		$det_apotek_rwc = htmlentities($this->input->post('det_apotek_rwc'),ENT_QUOTES);
		$det_apotek_rwc = is_numeric($det_apotek_rwc) ? $det_apotek_rwc : 0;
		$det_apotek_air = htmlentities($this->input->post('det_apotek_air'),ENT_QUOTES);
		$det_apotek_listrik = htmlentities($this->input->post('det_apotek_listrik'),ENT_QUOTES);
		$det_apotek_apk = htmlentities($this->input->post('det_apotek_apk'),ENT_QUOTES);
		$det_apotek_apk = is_numeric($det_apotek_apk) ? $det_apotek_apk : 0;
		$det_apotek_apkukuran = htmlentities($this->input->post('det_apotek_apkukuran'),ENT_QUOTES);
		$det_apotek_jendela = htmlentities($this->input->post('det_apotek_jendela'),ENT_QUOTES);
		$det_apotek_jendela = is_numeric($det_apotek_jendela) ? $det_apotek_jendela : 0;
		$det_apotek_limbah = htmlentities($this->input->post('det_apotek_limbah'),ENT_QUOTES);
		$det_apotek_limbah = is_numeric($det_apotek_limbah) ? $det_apotek_limbah : 0;
		$det_apotek_baksampah = htmlentities($this->input->post('det_apotek_baksampah'),ENT_QUOTES);
		$det_apotek_baksampah = is_numeric($det_apotek_baksampah) ? $det_apotek_baksampah : 0;
		$det_apotek_parkir = htmlentities($this->input->post('det_apotek_parkir'),ENT_QUOTES);
		$det_apotek_parkir = is_numeric($det_apotek_parkir) ? $det_apotek_parkir : 0;
		$det_apotek_papannama = htmlentities($this->input->post('det_apotek_papannama'),ENT_QUOTES);
		$det_apotek_papannama = is_numeric($det_apotek_papannama) ? $det_apotek_papannama : 0;
		$det_apotek_pengelola = htmlentities($this->input->post('det_apotek_pengelola'),ENT_QUOTES);
		$det_apotek_pengelola = is_numeric($det_apotek_pengelola) ? $det_apotek_pengelola : 0;
		$det_apotek_pendamping = htmlentities($this->input->post('det_apotek_pendamping'),ENT_QUOTES);
		$det_apotek_pendamping = is_numeric($det_apotek_pendamping) ? $det_apotek_pendamping : 0;
		$det_apotek_asisten = htmlentities($this->input->post('det_apotek_asisten'),ENT_QUOTES);
		$det_apotek_asisten = is_numeric($det_apotek_asisten) ? $det_apotek_asisten : 0;
		$det_apotek_luas = htmlentities($this->input->post('det_apotek_luas'),ENT_QUOTES);
		$det_apotek_luas = is_numeric($det_apotek_luas) ? $det_apotek_luas : 0;
		$det_apotek_statustanah = htmlentities($this->input->post('det_apotek_statustanah'),ENT_QUOTES);
		$det_apotek_statustanah = is_numeric($det_apotek_statustanah) ? $det_apotek_statustanah : 0;
		$det_apotek_sewalama = htmlentities($this->input->post('det_apotek_sewalama'),ENT_QUOTES);
		$det_apotek_sewalama = is_numeric($det_apotek_sewalama) ? $det_apotek_sewalama : 0;
		$det_apotek_sewaawal = htmlentities($this->input->post('det_apotek_sewaawal'),ENT_QUOTES);
		$det_apotek_sewaakhir = htmlentities($this->input->post('det_apotek_sewaakhir'),ENT_QUOTES);
		$det_apotek_shnomor = htmlentities($this->input->post('det_apotek_shnomor'),ENT_QUOTES);
		$det_apotek_shtahun = htmlentities($this->input->post('det_apotek_shtahun'),ENT_QUOTES);
		$det_apotek_shtahun = is_numeric($det_apotek_shtahun) ? $det_apotek_shtahun : 0;
		$det_apotek_shgssu = htmlentities($this->input->post('det_apotek_shgssu'),ENT_QUOTES);
		$det_apotek_shtanggal = htmlentities($this->input->post('det_apotek_shtanggal'),ENT_QUOTES);
		$det_apotek_shan = htmlentities($this->input->post('det_apotek_shan'),ENT_QUOTES);
		$det_apotek_aktano = htmlentities($this->input->post('det_apotek_aktano'),ENT_QUOTES);
		$det_apotek_aktatahun = htmlentities($this->input->post('det_apotek_aktatahun'),ENT_QUOTES);
		$det_apotek_aktatahun = is_numeric($det_apotek_aktatahun) ? $det_apotek_aktatahun : 0;
		$det_apotek_aktanotaris = htmlentities($this->input->post('det_apotek_aktanotaris'),ENT_QUOTES);
		$det_apotek_aktaan = htmlentities($this->input->post('det_apotek_aktaan'),ENT_QUOTES);
		$det_apotek_ckutipan = htmlentities($this->input->post('det_apotek_ckutipan'),ENT_QUOTES);
		$det_apotek_ckec = htmlentities($this->input->post('det_apotek_ckec'),ENT_QUOTES);
		$det_apotek_ctanggal = htmlentities($this->input->post('det_apotek_ctanggal'),ENT_QUOTES);
		$det_apotek_cpetok = htmlentities($this->input->post('det_apotek_cpetok'),ENT_QUOTES);
		$det_apotek_cpersil = htmlentities($this->input->post('det_apotek_cpersil'),ENT_QUOTES);
		$det_apotek_ckelas = htmlentities($this->input->post('det_apotek_ckelas'),ENT_QUOTES);
		$det_apotek_can = htmlentities($this->input->post('det_apotek_can'),ENT_QUOTES);
		$det_apotek_sppihak1 = htmlentities($this->input->post('det_apotek_sppihak1'),ENT_QUOTES);
		$det_apotek_sppihak2 = htmlentities($this->input->post('det_apotek_sppihak2'),ENT_QUOTES);
		$det_apotek_spnomor = htmlentities($this->input->post('det_apotek_spnomor'),ENT_QUOTES);
		$det_apotek_sptanggal = htmlentities($this->input->post('det_apotek_sptanggal'),ENT_QUOTES);
		$det_apotek_notaris = htmlentities($this->input->post('det_apotek_notaris'),ENT_QUOTES);
				
		$apotek_det_updated_by = $this->m_t_apotek_det->__checkSession();
		$apotek_det_updated_date = date('Y-m-d H:i:s');
		
		if($apotek_det_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'det_apotek_apotek_id'=>$det_apotek_apotek_id,
				'det_apotek_jenis'=>$det_apotek_jenis,
				'det_apotek_surveylulus'=>$det_apotek_surveylulus,
				'det_apotek_nama'=>$det_apotek_nama,
				'det_apotek_alamat'=>$det_apotek_alamat,
				'det_apotek_telp'=>$det_apotek_telp,
				'det_apotek_sp'=>$det_apotek_sp,
				'det_apotek_ktp'=>$det_apotek_ktp,
				'det_apotek_tempatlahir'=>$det_apotek_tempatlahir,
				'det_apotek_tanggallahir'=>$det_apotek_tanggallahir,
				'det_apotek_pekerjaan'=>$det_apotek_pekerjaan,
				'det_apotek_npwp'=>$det_apotek_npwp,
				'det_apotek_stra'=>$det_apotek_stra,
				'det_apotek_pendidikan'=>$det_apotek_pendidikan,
				'det_apotek_tahunlulus'=>$det_apotek_tahunlulus,
				'det_apotek_terima'=>$det_apotek_terima,
				'det_apotek_terimatanggal'=>$det_apotek_terimatanggal,
				'det_apotek_kelengkapan'=>$det_apotek_kelengkapan,
				'det_apotek_bap'=>$det_apotek_bap,
				'det_apotek_baptanggal'=>$det_apotek_baptanggal,
				'det_apotek_keputusan'=>$det_apotek_keputusan,
				'det_apotek_keterangan'=>$det_apotek_keterangan,
				'det_apotek_jarak'=>$det_apotek_jarak,
				'det_apotek_rracik'=>$det_apotek_rracik,
				'det_apotek_radmin'=>$det_apotek_radmin,
				'det_apotek_rkerja'=>$det_apotek_rkerja,
				'det_apotek_rtunggu'=>$det_apotek_rtunggu,
				'det_apotek_rwc'=>$det_apotek_rwc,
				'det_apotek_air'=>$det_apotek_air,
				'det_apotek_listrik'=>$det_apotek_listrik,
				'det_apotek_apk'=>$det_apotek_apk,
				'det_apotek_apkukuran'=>$det_apotek_apkukuran,
				'det_apotek_jendela'=>$det_apotek_jendela,
				'det_apotek_limbah'=>$det_apotek_limbah,
				'det_apotek_baksampah'=>$det_apotek_baksampah,
				'det_apotek_parkir'=>$det_apotek_parkir,
				'det_apotek_papannama'=>$det_apotek_papannama,
				'det_apotek_pengelola'=>$det_apotek_pengelola,
				'det_apotek_pendamping'=>$det_apotek_pendamping,
				'det_apotek_asisten'=>$det_apotek_asisten,
				'det_apotek_luas'=>$det_apotek_luas,
				'det_apotek_statustanah'=>$det_apotek_statustanah,
				'det_apotek_sewalama'=>$det_apotek_sewalama,
				'det_apotek_sewaawal'=>$det_apotek_sewaawal,
				'det_apotek_sewaakhir'=>$det_apotek_sewaakhir,
				'det_apotek_shnomor'=>$det_apotek_shnomor,
				'det_apotek_shtahun'=>$det_apotek_shtahun,
				'det_apotek_shgssu'=>$det_apotek_shgssu,
				'det_apotek_shtanggal'=>$det_apotek_shtanggal,
				'det_apotek_shan'=>$det_apotek_shan,
				'det_apotek_aktano'=>$det_apotek_aktano,
				'det_apotek_aktatahun'=>$det_apotek_aktatahun,
				'det_apotek_aktanotaris'=>$det_apotek_aktanotaris,
				'det_apotek_aktaan'=>$det_apotek_aktaan,
				'det_apotek_ckutipan'=>$det_apotek_ckutipan,
				'det_apotek_ckec'=>$det_apotek_ckec,
				'det_apotek_ctanggal'=>$det_apotek_ctanggal,
				'det_apotek_cpetok'=>$det_apotek_cpetok,
				'det_apotek_cpersil'=>$det_apotek_cpersil,
				'det_apotek_ckelas'=>$det_apotek_ckelas,
				'det_apotek_can'=>$det_apotek_can,
				'det_apotek_sppihak1'=>$det_apotek_sppihak1,
				'det_apotek_sppihak2'=>$det_apotek_sppihak2,
				'det_apotek_spnomor'=>$det_apotek_spnomor,
				'det_apotek_sptanggal'=>$det_apotek_sptanggal,
				'det_apotek_notaris'=>$det_apotek_notaris,
				);
			$result = $this->m_t_apotek_det->__update($data, $det_apotek_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_apotek_det->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$det_apotek_apotek_id = htmlentities($this->input->post('det_apotek_apotek_id'),ENT_QUOTES);
		$det_apotek_apotek_id = is_numeric($det_apotek_apotek_id) ? $det_apotek_apotek_id : 0;
		$det_apotek_jenis = htmlentities($this->input->post('det_apotek_jenis'),ENT_QUOTES);
		$det_apotek_jenis = is_numeric($det_apotek_jenis) ? $det_apotek_jenis : 0;
		$det_apotek_surveylulus = htmlentities($this->input->post('det_apotek_surveylulus'),ENT_QUOTES);
		$det_apotek_surveylulus = is_numeric($det_apotek_surveylulus) ? $det_apotek_surveylulus : 0;
		$det_apotek_nama = htmlentities($this->input->post('det_apotek_nama'),ENT_QUOTES);
		$det_apotek_alamat = htmlentities($this->input->post('det_apotek_alamat'),ENT_QUOTES);
		$det_apotek_telp = htmlentities($this->input->post('det_apotek_telp'),ENT_QUOTES);
		$det_apotek_sp = htmlentities($this->input->post('det_apotek_sp'),ENT_QUOTES);
		$det_apotek_ktp = htmlentities($this->input->post('det_apotek_ktp'),ENT_QUOTES);
		$det_apotek_tempatlahir = htmlentities($this->input->post('det_apotek_tempatlahir'),ENT_QUOTES);
		$det_apotek_tanggallahir = htmlentities($this->input->post('det_apotek_tanggallahir'),ENT_QUOTES);
		$det_apotek_pekerjaan = htmlentities($this->input->post('det_apotek_pekerjaan'),ENT_QUOTES);
		$det_apotek_npwp = htmlentities($this->input->post('det_apotek_npwp'),ENT_QUOTES);
		$det_apotek_stra = htmlentities($this->input->post('det_apotek_stra'),ENT_QUOTES);
		$det_apotek_pendidikan = htmlentities($this->input->post('det_apotek_pendidikan'),ENT_QUOTES);
		$det_apotek_tahunlulus = htmlentities($this->input->post('det_apotek_tahunlulus'),ENT_QUOTES);
		$det_apotek_tahunlulus = is_numeric($det_apotek_tahunlulus) ? $det_apotek_tahunlulus : 0;
		$det_apotek_terima = htmlentities($this->input->post('det_apotek_terima'),ENT_QUOTES);
		$det_apotek_terimatanggal = htmlentities($this->input->post('det_apotek_terimatanggal'),ENT_QUOTES);
		$det_apotek_kelengkapan = htmlentities($this->input->post('det_apotek_kelengkapan'),ENT_QUOTES);
		$det_apotek_kelengkapan = is_numeric($det_apotek_kelengkapan) ? $det_apotek_kelengkapan : 0;
		$det_apotek_bap = htmlentities($this->input->post('det_apotek_bap'),ENT_QUOTES);
		$det_apotek_baptanggal = htmlentities($this->input->post('det_apotek_baptanggal'),ENT_QUOTES);
		$det_apotek_keputusan = htmlentities($this->input->post('det_apotek_keputusan'),ENT_QUOTES);
		$det_apotek_keputusan = is_numeric($det_apotek_keputusan) ? $det_apotek_keputusan : 0;
		$det_apotek_keterangan = htmlentities($this->input->post('det_apotek_keterangan'),ENT_QUOTES);
		$det_apotek_jarak = htmlentities($this->input->post('det_apotek_jarak'),ENT_QUOTES);
		$det_apotek_jarak = is_numeric($det_apotek_jarak) ? $det_apotek_jarak : 0;
		$det_apotek_rracik = htmlentities($this->input->post('det_apotek_rracik'),ENT_QUOTES);
		$det_apotek_rracik = is_numeric($det_apotek_rracik) ? $det_apotek_rracik : 0;
		$det_apotek_radmin = htmlentities($this->input->post('det_apotek_radmin'),ENT_QUOTES);
		$det_apotek_radmin = is_numeric($det_apotek_radmin) ? $det_apotek_radmin : 0;
		$det_apotek_rkerja = htmlentities($this->input->post('det_apotek_rkerja'),ENT_QUOTES);
		$det_apotek_rkerja = is_numeric($det_apotek_rkerja) ? $det_apotek_rkerja : 0;
		$det_apotek_rtunggu = htmlentities($this->input->post('det_apotek_rtunggu'),ENT_QUOTES);
		$det_apotek_rtunggu = is_numeric($det_apotek_rtunggu) ? $det_apotek_rtunggu : 0;
		$det_apotek_rwc = htmlentities($this->input->post('det_apotek_rwc'),ENT_QUOTES);
		$det_apotek_rwc = is_numeric($det_apotek_rwc) ? $det_apotek_rwc : 0;
		$det_apotek_air = htmlentities($this->input->post('det_apotek_air'),ENT_QUOTES);
		$det_apotek_listrik = htmlentities($this->input->post('det_apotek_listrik'),ENT_QUOTES);
		$det_apotek_apk = htmlentities($this->input->post('det_apotek_apk'),ENT_QUOTES);
		$det_apotek_apk = is_numeric($det_apotek_apk) ? $det_apotek_apk : 0;
		$det_apotek_apkukuran = htmlentities($this->input->post('det_apotek_apkukuran'),ENT_QUOTES);
		$det_apotek_jendela = htmlentities($this->input->post('det_apotek_jendela'),ENT_QUOTES);
		$det_apotek_jendela = is_numeric($det_apotek_jendela) ? $det_apotek_jendela : 0;
		$det_apotek_limbah = htmlentities($this->input->post('det_apotek_limbah'),ENT_QUOTES);
		$det_apotek_limbah = is_numeric($det_apotek_limbah) ? $det_apotek_limbah : 0;
		$det_apotek_baksampah = htmlentities($this->input->post('det_apotek_baksampah'),ENT_QUOTES);
		$det_apotek_baksampah = is_numeric($det_apotek_baksampah) ? $det_apotek_baksampah : 0;
		$det_apotek_parkir = htmlentities($this->input->post('det_apotek_parkir'),ENT_QUOTES);
		$det_apotek_parkir = is_numeric($det_apotek_parkir) ? $det_apotek_parkir : 0;
		$det_apotek_papannama = htmlentities($this->input->post('det_apotek_papannama'),ENT_QUOTES);
		$det_apotek_papannama = is_numeric($det_apotek_papannama) ? $det_apotek_papannama : 0;
		$det_apotek_pengelola = htmlentities($this->input->post('det_apotek_pengelola'),ENT_QUOTES);
		$det_apotek_pengelola = is_numeric($det_apotek_pengelola) ? $det_apotek_pengelola : 0;
		$det_apotek_pendamping = htmlentities($this->input->post('det_apotek_pendamping'),ENT_QUOTES);
		$det_apotek_pendamping = is_numeric($det_apotek_pendamping) ? $det_apotek_pendamping : 0;
		$det_apotek_asisten = htmlentities($this->input->post('det_apotek_asisten'),ENT_QUOTES);
		$det_apotek_asisten = is_numeric($det_apotek_asisten) ? $det_apotek_asisten : 0;
		$det_apotek_luas = htmlentities($this->input->post('det_apotek_luas'),ENT_QUOTES);
		$det_apotek_luas = is_numeric($det_apotek_luas) ? $det_apotek_luas : 0;
		$det_apotek_statustanah = htmlentities($this->input->post('det_apotek_statustanah'),ENT_QUOTES);
		$det_apotek_statustanah = is_numeric($det_apotek_statustanah) ? $det_apotek_statustanah : 0;
		$det_apotek_sewalama = htmlentities($this->input->post('det_apotek_sewalama'),ENT_QUOTES);
		$det_apotek_sewalama = is_numeric($det_apotek_sewalama) ? $det_apotek_sewalama : 0;
		$det_apotek_sewaawal = htmlentities($this->input->post('det_apotek_sewaawal'),ENT_QUOTES);
		$det_apotek_sewaakhir = htmlentities($this->input->post('det_apotek_sewaakhir'),ENT_QUOTES);
		$det_apotek_shnomor = htmlentities($this->input->post('det_apotek_shnomor'),ENT_QUOTES);
		$det_apotek_shtahun = htmlentities($this->input->post('det_apotek_shtahun'),ENT_QUOTES);
		$det_apotek_shtahun = is_numeric($det_apotek_shtahun) ? $det_apotek_shtahun : 0;
		$det_apotek_shgssu = htmlentities($this->input->post('det_apotek_shgssu'),ENT_QUOTES);
		$det_apotek_shtanggal = htmlentities($this->input->post('det_apotek_shtanggal'),ENT_QUOTES);
		$det_apotek_shan = htmlentities($this->input->post('det_apotek_shan'),ENT_QUOTES);
		$det_apotek_aktano = htmlentities($this->input->post('det_apotek_aktano'),ENT_QUOTES);
		$det_apotek_aktatahun = htmlentities($this->input->post('det_apotek_aktatahun'),ENT_QUOTES);
		$det_apotek_aktatahun = is_numeric($det_apotek_aktatahun) ? $det_apotek_aktatahun : 0;
		$det_apotek_aktanotaris = htmlentities($this->input->post('det_apotek_aktanotaris'),ENT_QUOTES);
		$det_apotek_aktaan = htmlentities($this->input->post('det_apotek_aktaan'),ENT_QUOTES);
		$det_apotek_ckutipan = htmlentities($this->input->post('det_apotek_ckutipan'),ENT_QUOTES);
		$det_apotek_ckec = htmlentities($this->input->post('det_apotek_ckec'),ENT_QUOTES);
		$det_apotek_ctanggal = htmlentities($this->input->post('det_apotek_ctanggal'),ENT_QUOTES);
		$det_apotek_cpetok = htmlentities($this->input->post('det_apotek_cpetok'),ENT_QUOTES);
		$det_apotek_cpersil = htmlentities($this->input->post('det_apotek_cpersil'),ENT_QUOTES);
		$det_apotek_ckelas = htmlentities($this->input->post('det_apotek_ckelas'),ENT_QUOTES);
		$det_apotek_can = htmlentities($this->input->post('det_apotek_can'),ENT_QUOTES);
		$det_apotek_sppihak1 = htmlentities($this->input->post('det_apotek_sppihak1'),ENT_QUOTES);
		$det_apotek_sppihak2 = htmlentities($this->input->post('det_apotek_sppihak2'),ENT_QUOTES);
		$det_apotek_spnomor = htmlentities($this->input->post('det_apotek_spnomor'),ENT_QUOTES);
		$det_apotek_sptanggal = htmlentities($this->input->post('det_apotek_sptanggal'),ENT_QUOTES);
		$det_apotek_notaris = htmlentities($this->input->post('det_apotek_notaris'),ENT_QUOTES);
				
		$params = array(
			'det_apotek_apotek_id'=>$det_apotek_apotek_id,
			'det_apotek_jenis'=>$det_apotek_jenis,
			'det_apotek_surveylulus'=>$det_apotek_surveylulus,
			'det_apotek_nama'=>$det_apotek_nama,
			'det_apotek_alamat'=>$det_apotek_alamat,
			'det_apotek_telp'=>$det_apotek_telp,
			'det_apotek_sp'=>$det_apotek_sp,
			'det_apotek_ktp'=>$det_apotek_ktp,
			'det_apotek_tempatlahir'=>$det_apotek_tempatlahir,
			'det_apotek_tanggallahir'=>$det_apotek_tanggallahir,
			'det_apotek_pekerjaan'=>$det_apotek_pekerjaan,
			'det_apotek_npwp'=>$det_apotek_npwp,
			'det_apotek_stra'=>$det_apotek_stra,
			'det_apotek_pendidikan'=>$det_apotek_pendidikan,
			'det_apotek_tahunlulus'=>$det_apotek_tahunlulus,
			'det_apotek_terima'=>$det_apotek_terima,
			'det_apotek_terimatanggal'=>$det_apotek_terimatanggal,
			'det_apotek_kelengkapan'=>$det_apotek_kelengkapan,
			'det_apotek_bap'=>$det_apotek_bap,
			'det_apotek_baptanggal'=>$det_apotek_baptanggal,
			'det_apotek_keputusan'=>$det_apotek_keputusan,
			'det_apotek_keterangan'=>$det_apotek_keterangan,
			'det_apotek_jarak'=>$det_apotek_jarak,
			'det_apotek_rracik'=>$det_apotek_rracik,
			'det_apotek_radmin'=>$det_apotek_radmin,
			'det_apotek_rkerja'=>$det_apotek_rkerja,
			'det_apotek_rtunggu'=>$det_apotek_rtunggu,
			'det_apotek_rwc'=>$det_apotek_rwc,
			'det_apotek_air'=>$det_apotek_air,
			'det_apotek_listrik'=>$det_apotek_listrik,
			'det_apotek_apk'=>$det_apotek_apk,
			'det_apotek_apkukuran'=>$det_apotek_apkukuran,
			'det_apotek_jendela'=>$det_apotek_jendela,
			'det_apotek_limbah'=>$det_apotek_limbah,
			'det_apotek_baksampah'=>$det_apotek_baksampah,
			'det_apotek_parkir'=>$det_apotek_parkir,
			'det_apotek_papannama'=>$det_apotek_papannama,
			'det_apotek_pengelola'=>$det_apotek_pengelola,
			'det_apotek_pendamping'=>$det_apotek_pendamping,
			'det_apotek_asisten'=>$det_apotek_asisten,
			'det_apotek_luas'=>$det_apotek_luas,
			'det_apotek_statustanah'=>$det_apotek_statustanah,
			'det_apotek_sewalama'=>$det_apotek_sewalama,
			'det_apotek_sewaawal'=>$det_apotek_sewaawal,
			'det_apotek_sewaakhir'=>$det_apotek_sewaakhir,
			'det_apotek_shnomor'=>$det_apotek_shnomor,
			'det_apotek_shtahun'=>$det_apotek_shtahun,
			'det_apotek_shgssu'=>$det_apotek_shgssu,
			'det_apotek_shtanggal'=>$det_apotek_shtanggal,
			'det_apotek_shan'=>$det_apotek_shan,
			'det_apotek_aktano'=>$det_apotek_aktano,
			'det_apotek_aktatahun'=>$det_apotek_aktatahun,
			'det_apotek_aktanotaris'=>$det_apotek_aktanotaris,
			'det_apotek_aktaan'=>$det_apotek_aktaan,
			'det_apotek_ckutipan'=>$det_apotek_ckutipan,
			'det_apotek_ckec'=>$det_apotek_ckec,
			'det_apotek_ctanggal'=>$det_apotek_ctanggal,
			'det_apotek_cpetok'=>$det_apotek_cpetok,
			'det_apotek_cpersil'=>$det_apotek_cpersil,
			'det_apotek_ckelas'=>$det_apotek_ckelas,
			'det_apotek_can'=>$det_apotek_can,
			'det_apotek_sppihak1'=>$det_apotek_sppihak1,
			'det_apotek_sppihak2'=>$det_apotek_sppihak2,
			'det_apotek_spnomor'=>$det_apotek_spnomor,
			'det_apotek_sptanggal'=>$det_apotek_sptanggal,
			'det_apotek_notaris'=>$det_apotek_notaris,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_apotek_det->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$det_apotek_apotek_id = htmlentities($this->input->post('det_apotek_apotek_id'),ENT_QUOTES);
		$det_apotek_apotek_id = is_numeric($det_apotek_apotek_id) ? $det_apotek_apotek_id : 0;
		$det_apotek_jenis = htmlentities($this->input->post('det_apotek_jenis'),ENT_QUOTES);
		$det_apotek_jenis = is_numeric($det_apotek_jenis) ? $det_apotek_jenis : 0;
		$det_apotek_surveylulus = htmlentities($this->input->post('det_apotek_surveylulus'),ENT_QUOTES);
		$det_apotek_surveylulus = is_numeric($det_apotek_surveylulus) ? $det_apotek_surveylulus : 0;
		$det_apotek_nama = htmlentities($this->input->post('det_apotek_nama'),ENT_QUOTES);
		$det_apotek_alamat = htmlentities($this->input->post('det_apotek_alamat'),ENT_QUOTES);
		$det_apotek_telp = htmlentities($this->input->post('det_apotek_telp'),ENT_QUOTES);
		$det_apotek_sp = htmlentities($this->input->post('det_apotek_sp'),ENT_QUOTES);
		$det_apotek_ktp = htmlentities($this->input->post('det_apotek_ktp'),ENT_QUOTES);
		$det_apotek_tempatlahir = htmlentities($this->input->post('det_apotek_tempatlahir'),ENT_QUOTES);
		$det_apotek_tanggallahir = htmlentities($this->input->post('det_apotek_tanggallahir'),ENT_QUOTES);
		$det_apotek_pekerjaan = htmlentities($this->input->post('det_apotek_pekerjaan'),ENT_QUOTES);
		$det_apotek_npwp = htmlentities($this->input->post('det_apotek_npwp'),ENT_QUOTES);
		$det_apotek_stra = htmlentities($this->input->post('det_apotek_stra'),ENT_QUOTES);
		$det_apotek_pendidikan = htmlentities($this->input->post('det_apotek_pendidikan'),ENT_QUOTES);
		$det_apotek_tahunlulus = htmlentities($this->input->post('det_apotek_tahunlulus'),ENT_QUOTES);
		$det_apotek_tahunlulus = is_numeric($det_apotek_tahunlulus) ? $det_apotek_tahunlulus : 0;
		$det_apotek_terima = htmlentities($this->input->post('det_apotek_terima'),ENT_QUOTES);
		$det_apotek_terimatanggal = htmlentities($this->input->post('det_apotek_terimatanggal'),ENT_QUOTES);
		$det_apotek_kelengkapan = htmlentities($this->input->post('det_apotek_kelengkapan'),ENT_QUOTES);
		$det_apotek_kelengkapan = is_numeric($det_apotek_kelengkapan) ? $det_apotek_kelengkapan : 0;
		$det_apotek_bap = htmlentities($this->input->post('det_apotek_bap'),ENT_QUOTES);
		$det_apotek_baptanggal = htmlentities($this->input->post('det_apotek_baptanggal'),ENT_QUOTES);
		$det_apotek_keputusan = htmlentities($this->input->post('det_apotek_keputusan'),ENT_QUOTES);
		$det_apotek_keputusan = is_numeric($det_apotek_keputusan) ? $det_apotek_keputusan : 0;
		$det_apotek_keterangan = htmlentities($this->input->post('det_apotek_keterangan'),ENT_QUOTES);
		$det_apotek_jarak = htmlentities($this->input->post('det_apotek_jarak'),ENT_QUOTES);
		$det_apotek_jarak = is_numeric($det_apotek_jarak) ? $det_apotek_jarak : 0;
		$det_apotek_rracik = htmlentities($this->input->post('det_apotek_rracik'),ENT_QUOTES);
		$det_apotek_rracik = is_numeric($det_apotek_rracik) ? $det_apotek_rracik : 0;
		$det_apotek_radmin = htmlentities($this->input->post('det_apotek_radmin'),ENT_QUOTES);
		$det_apotek_radmin = is_numeric($det_apotek_radmin) ? $det_apotek_radmin : 0;
		$det_apotek_rkerja = htmlentities($this->input->post('det_apotek_rkerja'),ENT_QUOTES);
		$det_apotek_rkerja = is_numeric($det_apotek_rkerja) ? $det_apotek_rkerja : 0;
		$det_apotek_rtunggu = htmlentities($this->input->post('det_apotek_rtunggu'),ENT_QUOTES);
		$det_apotek_rtunggu = is_numeric($det_apotek_rtunggu) ? $det_apotek_rtunggu : 0;
		$det_apotek_rwc = htmlentities($this->input->post('det_apotek_rwc'),ENT_QUOTES);
		$det_apotek_rwc = is_numeric($det_apotek_rwc) ? $det_apotek_rwc : 0;
		$det_apotek_air = htmlentities($this->input->post('det_apotek_air'),ENT_QUOTES);
		$det_apotek_listrik = htmlentities($this->input->post('det_apotek_listrik'),ENT_QUOTES);
		$det_apotek_apk = htmlentities($this->input->post('det_apotek_apk'),ENT_QUOTES);
		$det_apotek_apk = is_numeric($det_apotek_apk) ? $det_apotek_apk : 0;
		$det_apotek_apkukuran = htmlentities($this->input->post('det_apotek_apkukuran'),ENT_QUOTES);
		$det_apotek_jendela = htmlentities($this->input->post('det_apotek_jendela'),ENT_QUOTES);
		$det_apotek_jendela = is_numeric($det_apotek_jendela) ? $det_apotek_jendela : 0;
		$det_apotek_limbah = htmlentities($this->input->post('det_apotek_limbah'),ENT_QUOTES);
		$det_apotek_limbah = is_numeric($det_apotek_limbah) ? $det_apotek_limbah : 0;
		$det_apotek_baksampah = htmlentities($this->input->post('det_apotek_baksampah'),ENT_QUOTES);
		$det_apotek_baksampah = is_numeric($det_apotek_baksampah) ? $det_apotek_baksampah : 0;
		$det_apotek_parkir = htmlentities($this->input->post('det_apotek_parkir'),ENT_QUOTES);
		$det_apotek_parkir = is_numeric($det_apotek_parkir) ? $det_apotek_parkir : 0;
		$det_apotek_papannama = htmlentities($this->input->post('det_apotek_papannama'),ENT_QUOTES);
		$det_apotek_papannama = is_numeric($det_apotek_papannama) ? $det_apotek_papannama : 0;
		$det_apotek_pengelola = htmlentities($this->input->post('det_apotek_pengelola'),ENT_QUOTES);
		$det_apotek_pengelola = is_numeric($det_apotek_pengelola) ? $det_apotek_pengelola : 0;
		$det_apotek_pendamping = htmlentities($this->input->post('det_apotek_pendamping'),ENT_QUOTES);
		$det_apotek_pendamping = is_numeric($det_apotek_pendamping) ? $det_apotek_pendamping : 0;
		$det_apotek_asisten = htmlentities($this->input->post('det_apotek_asisten'),ENT_QUOTES);
		$det_apotek_asisten = is_numeric($det_apotek_asisten) ? $det_apotek_asisten : 0;
		$det_apotek_luas = htmlentities($this->input->post('det_apotek_luas'),ENT_QUOTES);
		$det_apotek_luas = is_numeric($det_apotek_luas) ? $det_apotek_luas : 0;
		$det_apotek_statustanah = htmlentities($this->input->post('det_apotek_statustanah'),ENT_QUOTES);
		$det_apotek_statustanah = is_numeric($det_apotek_statustanah) ? $det_apotek_statustanah : 0;
		$det_apotek_sewalama = htmlentities($this->input->post('det_apotek_sewalama'),ENT_QUOTES);
		$det_apotek_sewalama = is_numeric($det_apotek_sewalama) ? $det_apotek_sewalama : 0;
		$det_apotek_sewaawal = htmlentities($this->input->post('det_apotek_sewaawal'),ENT_QUOTES);
		$det_apotek_sewaakhir = htmlentities($this->input->post('det_apotek_sewaakhir'),ENT_QUOTES);
		$det_apotek_shnomor = htmlentities($this->input->post('det_apotek_shnomor'),ENT_QUOTES);
		$det_apotek_shtahun = htmlentities($this->input->post('det_apotek_shtahun'),ENT_QUOTES);
		$det_apotek_shtahun = is_numeric($det_apotek_shtahun) ? $det_apotek_shtahun : 0;
		$det_apotek_shgssu = htmlentities($this->input->post('det_apotek_shgssu'),ENT_QUOTES);
		$det_apotek_shtanggal = htmlentities($this->input->post('det_apotek_shtanggal'),ENT_QUOTES);
		$det_apotek_shan = htmlentities($this->input->post('det_apotek_shan'),ENT_QUOTES);
		$det_apotek_aktano = htmlentities($this->input->post('det_apotek_aktano'),ENT_QUOTES);
		$det_apotek_aktatahun = htmlentities($this->input->post('det_apotek_aktatahun'),ENT_QUOTES);
		$det_apotek_aktatahun = is_numeric($det_apotek_aktatahun) ? $det_apotek_aktatahun : 0;
		$det_apotek_aktanotaris = htmlentities($this->input->post('det_apotek_aktanotaris'),ENT_QUOTES);
		$det_apotek_aktaan = htmlentities($this->input->post('det_apotek_aktaan'),ENT_QUOTES);
		$det_apotek_ckutipan = htmlentities($this->input->post('det_apotek_ckutipan'),ENT_QUOTES);
		$det_apotek_ckec = htmlentities($this->input->post('det_apotek_ckec'),ENT_QUOTES);
		$det_apotek_ctanggal = htmlentities($this->input->post('det_apotek_ctanggal'),ENT_QUOTES);
		$det_apotek_cpetok = htmlentities($this->input->post('det_apotek_cpetok'),ENT_QUOTES);
		$det_apotek_cpersil = htmlentities($this->input->post('det_apotek_cpersil'),ENT_QUOTES);
		$det_apotek_ckelas = htmlentities($this->input->post('det_apotek_ckelas'),ENT_QUOTES);
		$det_apotek_can = htmlentities($this->input->post('det_apotek_can'),ENT_QUOTES);
		$det_apotek_sppihak1 = htmlentities($this->input->post('det_apotek_sppihak1'),ENT_QUOTES);
		$det_apotek_sppihak2 = htmlentities($this->input->post('det_apotek_sppihak2'),ENT_QUOTES);
		$det_apotek_spnomor = htmlentities($this->input->post('det_apotek_spnomor'),ENT_QUOTES);
		$det_apotek_sptanggal = htmlentities($this->input->post('det_apotek_sptanggal'),ENT_QUOTES);
		$det_apotek_notaris = htmlentities($this->input->post('det_apotek_notaris'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'det_apotek_apotek_id'=>$det_apotek_apotek_id,
			'det_apotek_jenis'=>$det_apotek_jenis,
			'det_apotek_surveylulus'=>$det_apotek_surveylulus,
			'det_apotek_nama'=>$det_apotek_nama,
			'det_apotek_alamat'=>$det_apotek_alamat,
			'det_apotek_telp'=>$det_apotek_telp,
			'det_apotek_sp'=>$det_apotek_sp,
			'det_apotek_ktp'=>$det_apotek_ktp,
			'det_apotek_tempatlahir'=>$det_apotek_tempatlahir,
			'det_apotek_tanggallahir'=>$det_apotek_tanggallahir,
			'det_apotek_pekerjaan'=>$det_apotek_pekerjaan,
			'det_apotek_npwp'=>$det_apotek_npwp,
			'det_apotek_stra'=>$det_apotek_stra,
			'det_apotek_pendidikan'=>$det_apotek_pendidikan,
			'det_apotek_tahunlulus'=>$det_apotek_tahunlulus,
			'det_apotek_terima'=>$det_apotek_terima,
			'det_apotek_terimatanggal'=>$det_apotek_terimatanggal,
			'det_apotek_kelengkapan'=>$det_apotek_kelengkapan,
			'det_apotek_bap'=>$det_apotek_bap,
			'det_apotek_baptanggal'=>$det_apotek_baptanggal,
			'det_apotek_keputusan'=>$det_apotek_keputusan,
			'det_apotek_keterangan'=>$det_apotek_keterangan,
			'det_apotek_jarak'=>$det_apotek_jarak,
			'det_apotek_rracik'=>$det_apotek_rracik,
			'det_apotek_radmin'=>$det_apotek_radmin,
			'det_apotek_rkerja'=>$det_apotek_rkerja,
			'det_apotek_rtunggu'=>$det_apotek_rtunggu,
			'det_apotek_rwc'=>$det_apotek_rwc,
			'det_apotek_air'=>$det_apotek_air,
			'det_apotek_listrik'=>$det_apotek_listrik,
			'det_apotek_apk'=>$det_apotek_apk,
			'det_apotek_apkukuran'=>$det_apotek_apkukuran,
			'det_apotek_jendela'=>$det_apotek_jendela,
			'det_apotek_limbah'=>$det_apotek_limbah,
			'det_apotek_baksampah'=>$det_apotek_baksampah,
			'det_apotek_parkir'=>$det_apotek_parkir,
			'det_apotek_papannama'=>$det_apotek_papannama,
			'det_apotek_pengelola'=>$det_apotek_pengelola,
			'det_apotek_pendamping'=>$det_apotek_pendamping,
			'det_apotek_asisten'=>$det_apotek_asisten,
			'det_apotek_luas'=>$det_apotek_luas,
			'det_apotek_statustanah'=>$det_apotek_statustanah,
			'det_apotek_sewalama'=>$det_apotek_sewalama,
			'det_apotek_sewaawal'=>$det_apotek_sewaawal,
			'det_apotek_sewaakhir'=>$det_apotek_sewaakhir,
			'det_apotek_shnomor'=>$det_apotek_shnomor,
			'det_apotek_shtahun'=>$det_apotek_shtahun,
			'det_apotek_shgssu'=>$det_apotek_shgssu,
			'det_apotek_shtanggal'=>$det_apotek_shtanggal,
			'det_apotek_shan'=>$det_apotek_shan,
			'det_apotek_aktano'=>$det_apotek_aktano,
			'det_apotek_aktatahun'=>$det_apotek_aktatahun,
			'det_apotek_aktanotaris'=>$det_apotek_aktanotaris,
			'det_apotek_aktaan'=>$det_apotek_aktaan,
			'det_apotek_ckutipan'=>$det_apotek_ckutipan,
			'det_apotek_ckec'=>$det_apotek_ckec,
			'det_apotek_ctanggal'=>$det_apotek_ctanggal,
			'det_apotek_cpetok'=>$det_apotek_cpetok,
			'det_apotek_cpersil'=>$det_apotek_cpersil,
			'det_apotek_ckelas'=>$det_apotek_ckelas,
			'det_apotek_can'=>$det_apotek_can,
			'det_apotek_sppihak1'=>$det_apotek_sppihak1,
			'det_apotek_sppihak2'=>$det_apotek_sppihak2,
			'det_apotek_spnomor'=>$det_apotek_spnomor,
			'det_apotek_sptanggal'=>$det_apotek_sptanggal,
			'det_apotek_notaris'=>$det_apotek_notaris,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_apotek_det->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_apotek_det.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_apotek_det_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_apotek_det_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$apotek_id = $this->input->post('apotek_id');
		$apotek_det_id = $this->input->post('apotek_det_id');
		$params = array(
			"currentAction"=>$currentAction,
			"apotek_id"=>$apotek_id,
			"apotek_det_id"=>$apotek_det_id
		);
		$result = $this->m_t_apotek_det->getSyarat($params);
		echo $result;
	}
	function changeSurveyStatus(){
		$apotekdet_id  = $this->input->post('apotekdet_id');
		$lulus  = $this->input->post('lulus');
		$data = array(
			"det_apotek_surveylulus"=>$lulus
		);
		$result = $this->m_t_apotek_det->__update($data, $apotekdet_id, '', '');
		echo $result;
	}
	function cetakLembarKontrol(){
		$apotekdet_id  = $this->input->post('apotekdet_id');
		$params = array(
			"det_apotek_id"=>$apotekdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_apotek_det->search($params);
		$dataceklist = $this->db->where('apotek_cek_apotekdet_id', $apotekdet_id)->join('master_syarat','apotek_cek_syarat_id = ID_SYARAT')->get('t_apotek_ceklist')->result();
		$data['printrecord'] = $printrecord[1];
		$data['dataceklist'] = $dataceklist;
		$print_view=$this->load->view('template/p_apotek_lembarkontrol.php',$data,TRUE);
		$print_file=fopen('print/apotek_lembarkontrol.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakBap(){
		$apotekdet_id  = $this->input->post('apotekdet_id');
		$params = array(
			"det_apotek_id"=>$apotekdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_apotek_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$print_view=$this->load->view('template/p_apotek_bapeninjauan.php',$data,TRUE);
		$print_file=fopen('print/apotek_bap.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakSk(){
		$apotekdet_id  = $this->input->post('apotekdet_id');
		$params = array(
			"det_apotek_id"=>$apotekdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_apotek_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$print_view=$this->load->view('template/p_apotek_sk.php',$data,TRUE);
		$print_file=fopen('print/apotek_sk.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakBp(){
		$apotekdet_id  = $this->input->post('apotekdet_id');
		$params = array(
			"det_apotek_id"=>$apotekdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_apotek_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$print_view=$this->load->view('template/p_apotek_buktiterima.php',$data,TRUE);
		$print_file=fopen('print/apotek_buktipenerimaan.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}