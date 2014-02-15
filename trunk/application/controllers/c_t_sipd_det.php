<?php
class C_t_sipd_det extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_sipd_det');
	}
	
	function index(){
		$this->load->view('home.php');
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
			case 'GETSYARAT':
				$this->getSyarat();
			break;
			case 'UBAHPROSES':
				$this->ubahProses();
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
		
		$sipd_nama = htmlentities($this->input->post('sipd_nama'),ENT_QUOTES);
		$sipd_alamat = htmlentities($this->input->post('sipd_alamat'),ENT_QUOTES);
		$sipd_telp = htmlentities($this->input->post('sipd_telp'),ENT_QUOTES);
		$sipd_urutan = htmlentities($this->input->post('sipd_urutan'),ENT_QUOTES);
		$sipd_urutan = is_numeric($sipd_urutan) ? $sipd_urutan : 0;
		$sipd_jenisdokter = htmlentities($this->input->post('sipd_jenisdokter'),ENT_QUOTES);
		
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
		
		$sipd_cek_id = json_decode($this->input->post('sipd_cek_id'));
		$sipd_cek_syarat_id = json_decode($this->input->post('sipd_cek_syarat_id'));
		$sipd_cek_status = json_decode($this->input->post('sipd_cek_status'));
		$sipd_cek_keterangan = json_decode($this->input->post('sipd_cek_keterangan'));
		
		$det_sipd_retribusi = htmlentities($this->input->post('det_sipd_retribusi'),ENT_QUOTES);
		$det_sipd_retribusi = is_numeric($det_sipd_retribusi) ? $det_sipd_retribusi : 0;
		
		$sipd_det_author = $this->m_t_sipd_det->__checkSession();
		$sipd_det_created_date = date('Y-m-d H:i:s');
		
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
			$resultpemohon = $this->m_t_sipd_det->__update($datapemohon, $pemohon_id, 'm_pemohon', 'updateId','pemohon_id');
			$resultpemohon = $pemohon_id;
		}else{
			$datapemohon["pemohon_user_id"]=$sipd_det_author;
			$resultpemohon = $this->m_t_sipd_det->__insert($datapemohon, 'm_pemohon', 'insertId');
		}
		
		if($sipd_det_author != ''){
			$dataInti = array(
				'sipd_nama'=>$sipd_nama,
				'sipd_alamat'=>$sipd_alamat,
				'sipd_telp'=>$sipd_telp,
				'sipd_urutan'=>$sipd_urutan,
				'sipd_jenisdokter'=>$sipd_jenisdokter,
			);
			$resultInti = $this->m_t_sipd_det->__insert($dataInti, 't_sipd', 'insertId');
			if($resultInti != 0){
				$result = 'success';
				$data = array(
					'det_sipd_id'=>$det_sipd_id,
					'det_sipd_sipd_id'=>$resultInti,
					'det_sipd_jenis'=>$det_sipd_jenis,
					'det_sipd_tanggal'=>$det_sipd_tanggal,
					'det_sipd_pemohon_id'=>$resultpemohon,
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
					'det_sipd_retribusi'=>$det_sipd_retribusi
					);
				$resultdet = $this->m_t_sipd_det->__insert($data, false, 'insertId');
				for($i=0;$i<count($sipd_cek_syarat_id);$i++){
					$datacek = array(
						'sipd_cek_syarat_id'=>$sipd_cek_syarat_id[$i],
						'sipd_cek_sipd_id'=>$resultInti,
						'sipd_cek_sipddet_id'=>$resultdet,
						'sipd_cek_status'=>$sipd_cek_status[$i],
						'sipd_cek_keterangan'=>$sipd_cek_keterangan[$i]
					);
					$resultcek = $this->m_t_sipd_det->__insert($datacek, 't_sipd_ceklist', 'insertId');
				}
				$this->m_t_sipd_det->__insertlog($sipd_det_author, $resultpemohon, $resultInti, 'Tambah');
			}else{
				$result = 'fail';
			}
		}else{
			$result = 'sessionExpired';
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
		
		$sipd_nama = htmlentities($this->input->post('sipd_nama'),ENT_QUOTES);
		$sipd_alamat = htmlentities($this->input->post('sipd_alamat'),ENT_QUOTES);
		$sipd_telp = htmlentities($this->input->post('sipd_telp'),ENT_QUOTES);
		$sipd_urutan = htmlentities($this->input->post('sipd_urutan'),ENT_QUOTES);
		$sipd_urutan = is_numeric($sipd_urutan) ? $sipd_urutan : 0;
		$sipd_jenisdokter = htmlentities($this->input->post('sipd_jenisdokter'),ENT_QUOTES);
		
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
		
		$sipd_cek_id = json_decode($this->input->post('sipd_cek_id'));
		$sipd_cek_syarat_id = json_decode($this->input->post('sipd_cek_syarat_id'));
		$sipd_cek_status = json_decode($this->input->post('sipd_cek_status'));
		$sipd_cek_keterangan = json_decode($this->input->post('sipd_cek_keterangan'));
		
		$det_sipd_retribusi = htmlentities($this->input->post('det_sipd_retribusi'),ENT_QUOTES);
		$det_sipd_retribusi = is_numeric($det_sipd_retribusi) ? $det_sipd_retribusi : 0;
		
		$sipd_det_updated_by = $this->m_t_sipd_det->__checkSession();
		$sipd_det_updated_date = date('Y-m-d H:i:s');
		
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
			$resultpemohon = $this->m_t_sipd_det->__update($datapemohon, $pemohon_id, 'm_pemohon', 'updateId','pemohon_id');
			$resultpemohon = $pemohon_id;
		}else{
			$datapemohon["pemohon_user_id"]=$sipd_det_updated_by;
			$resultpemohon = $this->m_t_sipd_det->__insert($datapemohon, 'm_pemohon', 'insertId');
		}
		
		if($sipd_det_updated_by != ''){
			$dataInti = array(
				'sipd_nama'=>$sipd_nama,
				'sipd_alamat'=>$sipd_alamat,
				'sipd_telp'=>$sipd_telp,
				'sipd_urutan'=>$sipd_urutan,
				'sipd_jenisdokter'=>$sipd_jenisdokter,
			);
			$resultInti = $this->m_t_sipd_det->__update($dataInti, $det_sipd_sipd_id, 't_sipd', 'updateId', 'sipd_id');
			$result = 'success';
			$data = array(
				'det_sipd_sipd_id'=>$det_sipd_sipd_id,
				'det_sipd_jenis'=>$det_sipd_jenis,
				'det_sipd_tanggal'=>$det_sipd_tanggal,
				'det_sipd_pemohon_id'=>$resultpemohon,
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
				'det_sipd_retribusi'=>$det_sipd_retribusi
				);
			$resultdet = $this->m_t_sipd_det->__update($data, $det_sipd_id, '', 'updateId','');
			for($i=0;$i<count($sipd_cek_syarat_id);$i++){
				$datacek = array(
					'sipd_cek_syarat_id'=>$sipd_cek_syarat_id[$i],
					'sipd_cek_sipd_id'=>$det_sipd_sipd_id,
					'sipd_cek_sipddet_id'=>$det_sipd_id,
					'sipd_cek_status'=>$sipd_cek_status[$i],
					'sipd_cek_keterangan'=>$sipd_cek_keterangan[$i]
				);
				$resultcek = $this->m_t_sipd_det->__update($datacek, $sipd_cek_id[$i], 't_sipd_ceklist', 'updateId','sipd_cek_id');
			}
			$this->m_t_sipd_det->__insertlog($sipd_det_updated_by, $resultpemohon, $det_sipd_id, 'Ubah');
		}else{
			$result = 'sessionExpired';
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
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$sipd_id = $this->input->post('sipd_id');
		$sipd_det_id = $this->input->post('sipd_det_id');
		$params = array(
			"currentAction"=>$currentAction,
			"sipd_id"=>$sipd_id,
			"sipd_det_id"=>$sipd_det_id
		);
		$result = $this->m_t_sipd_det->getSyarat($params);
		echo $result;
	}
	function ubahProses(){
		$sipddet_id  = $this->input->post('sipddet_id');
		$sipddet_nosk  = $this->input->post('sipddet_nosk');
		$proses  = $this->input->post('proses');
		if($proses == 'Selesai, belum diambil' && $sipddet_nosk == ''){
			$nosk = $this->m_public_function->getNomorSk(1);
			$data_sk = array(
				"det_sipd_sk"=>$nosk,
				"det_sipd_berlaku"=>date('Y-m-d')
			);
			$this->db->where('det_sipd_id', $sipddet_id);
			$this->db->update('t_sipd_det', $data_sk);
		}
		$data = array(
			"det_sipd_proses"=>$proses
		);
		$result = $this->m_t_sipd_det->__update($data, $sipddet_id, '', '','');
		echo $result;
	}
	function cetakBp(){
		$sipddet_id  = $this->input->post('sipddet_id');
		$params = array(
			"det_sipd_id"=>$sipddet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_sipd_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$data['dataijin'] = $this->db->where('id',26)->get('ijin')->row();
		$print_view=$this->load->view('template/p_sipd_buktiterima.php',$data,TRUE);
		$print_file=fopen('print/sipd_buktipenerimaan.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakLembarKontrol(){
		$sipddet_id  = $this->input->post('sipddet_id');
		$params = array(
			"det_sipd_id"=>$sipddet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_sipd_det->search($params);
		$dataceklist = $this->db->where('sipd_cek_sipddet_id', $sipddet_id)->join('master_syarat','sipd_cek_syarat_id = ID_SYARAT')->get('t_sipd_ceklist')->result();
		$data['printrecord'] = $printrecord[1];
		$data['dataceklist'] = $dataceklist;
		$print_view=$this->load->view('template/p_sipd_lembarkontrol.php',$data,TRUE);
		$print_file=fopen('print/sipd_lembarkontrol.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakSk(){
		$sipddet_id  = $this->input->post('sipddet_id');
		$params = array(
			"det_sipd_id"=>$sipddet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_sipd_det->search($params);
		$data['dataijin'] = $this->db->where('id',26)->get('ijin')->row();
		$data['printrecord'] = $printrecord[1];
		$sub = $data['printrecord'][0];
		if($sub->det_sipd_sk == ''){
			echo 'nosk';
		}else if($sub->det_sipd_kadaluarsa == '' || $sub->det_sipd_kadaluarsa == '0000-00-00'){
			echo 'notglkadaluarsa';
		}else{
			$print_view=$this->load->view('template/p_sipd_sk.php',$data,TRUE);
			$print_file=fopen('print/sipd_sk.html','w+');
			fwrite($print_file, $print_view);
			echo 'success';
		}
	}
	
}