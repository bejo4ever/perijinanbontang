<?php
class C_ijin_lokasi extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_ijin_lokasi');
		$this->load->model('m_m_pemohon');
		$this->load->model('m_cek_list_lokasi');
	}
	
	function index(){
		$this->load->view('main/v_ijin_lokasi');
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
			case 'CETAKBP':
				$this->printBP();
			break;
			case 'GETSYARAT':
				$this->getSyarat();
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
		$result = $this->m_ijin_lokasi->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_IJIN_LOKASI = htmlentities($this->input->post('ID_IJIN_LOKASI'),ENT_QUOTES);
		$ID_IJIN_LOKASI = is_numeric($ID_IJIN_LOKASI) ? $ID_IJIN_LOKASI : 0;
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$NPWPD = htmlentities($this->input->post('NPWPD'),ENT_QUOTES);
		$NO_AKTA = htmlentities($this->input->post('NO_AKTA'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = htmlentities($this->input->post('BENTUK_PERUSAHAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$RT = htmlentities($this->input->post('RT'),ENT_QUOTES);
		$RT = is_numeric($RT) ? $RT : 0;
		$RW = htmlentities($this->input->post('RW'),ENT_QUOTES);
		$RW = is_numeric($RW) ? $RW : 0;
		$ID_KELURAHAN = htmlentities($this->input->post('ID_KELURAHAN'),ENT_QUOTES);
		$ID_KELURAHAN = is_numeric($ID_KELURAHAN) ? $ID_KELURAHAN : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELP = htmlentities($this->input->post('TELP'),ENT_QUOTES);
		$FUNGSI = htmlentities($this->input->post('FUNGSI'),ENT_QUOTES);
		$STATUS_TANAH = htmlentities($this->input->post('STATUS_TANAH'),ENT_QUOTES);
		$STATUS_TANAH = is_numeric($STATUS_TANAH) ? $STATUS_TANAH : 0;
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
		$KETERANGAN_TANAH = htmlentities($this->input->post('KETERANGAN_TANAH'),ENT_QUOTES);
		$LUAS_LOKASI = htmlentities($this->input->post('LUAS_LOKASI'),ENT_QUOTES);
		$LUAS_LOKASI = is_numeric($LUAS_LOKASI) ? $LUAS_LOKASI : 0;
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$ID_KELURAHAN_LOKASI = htmlentities($this->input->post('ID_KELURAHAN_LOKASI'),ENT_QUOTES);
		$ID_KELURAHAN_LOKASI = is_numeric($ID_KELURAHAN_LOKASI) ? $ID_KELURAHAN_LOKASI : 0;
		$ID_KECAMATAN_LOKASI = htmlentities($this->input->post('ID_KECAMATAN_LOKASI'),ENT_QUOTES);
		$ID_KECAMATAN_LOKASI = is_numeric($ID_KECAMATAN_LOKASI) ? $ID_KECAMATAN_LOKASI : 0;
		/*Data Pemohon*/
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
		$pemohon_kota = htmlentities($this->input->post('pemohon_kota'),ENT_QUOTES);
		$pemohon_nik = htmlentities($this->input->post('pemohon_nik'),ENT_QUOTES);
		$pemohon_id = htmlentities($this->input->post('pemohon_id'),ENT_QUOTES);
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
		$pemohon_wn = htmlentities($this->input->post('pemohon_wn'),ENT_QUOTES);
		$pemohon_hp = htmlentities($this->input->post('pemohon_hp'),ENT_QUOTES);
		/*End Pemohon*/		
		$in_lokasi_author = $this->m_ijin_lokasi->__checkSession();
		$in_lokasi_created_date = date('Y-m-d H:i:s');
		
		if($in_lokasi_author == ''){
			$result = 'sessionExpired';
		}else{
			if($pemohon_id != null || $pemohon_id != ""){
				$pemohon	= $pemohon_id;
			} else {
				$data = array(
				'pemohon_nama'=>$pemohon_nama,
				'pemohon_alamat'=>$pemohon_alamat,
				'pemohon_rt'=>$pemohon_rt,
				'pemohon_rw'=>$pemohon_rw,
				'pemohon_telp'=>$pemohon_telp,
				'pemohon_kel'=>$pemohon_kel,
				'pemohon_kec'=>$pemohon_kec,
				'pemohon_kota'=>$pemohon_kota,
				'pemohon_nik'=>$pemohon_nik,
				'pemohon_pekerjaan'=>$pemohon_pekerjaan,
				'pemohon_tempatlahir'=>$pemohon_tempatlahir,
				'pemohon_tanggallahir'=>$pemohon_tanggallahir,
				'pemohon_wn'=>$pemohon_wn,
				'pemohon_hp'=>$pemohon_hp,
				'pemohon_user_id'=>$_SESSION['USERID']
				);
				$pemohon= $this->m_m_pemohon->__insert($data, '', 'insertId');
			}
			if($_SESSION['IDHAK'] == 2){
				$data = array(
					'ID_IJIN_LOKASI'=>$ID_IJIN_LOKASI,
					'ID_PEMOHON'=>$pemohon,
					'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
					'NO_SK'=>$NO_SK,
					'NO_SK_LAMA'=>$NO_SK_LAMA,
					'NPWPD'=>$NPWPD,
					'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
					'NO_AKTA'=>$NO_AKTA,
					'BENTUK_PERUSAHAAN'=>$BENTUK_PERUSAHAAN,
					'ALAMAT'=>$ALAMAT,
					'RT'=>$RT,
					'RW'=>$RW,
					'ID_KELURAHAN'=>$ID_KELURAHAN,
					'ID_KECAMATAN'=>$ID_KECAMATAN,
					'ID_KOTA'=>$ID_KOTA,
					'TELP'=>$TELP,
					'FUNGSI'=>$FUNGSI,
					'STATUS_TANAH'=>$STATUS_TANAH,
					'KETERANGAN_TANAH'=>$KETERANGAN_TANAH,
					'LUAS_LOKASI'=>$LUAS_LOKASI,
					'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
					'ID_KELURAHAN_LOKASI'=>$ID_KELURAHAN_LOKASI,
					'ID_KECAMATAN_LOKASI'=>$ID_KECAMATAN_LOKASI,
					'TGL_PERMOHONAN'=>date("Y-m-d"),
					);
				$result = $this->m_ijin_lokasi->__insert($data, '', 'insertId');
			} else {
				$data = array(
					'ID_IJIN_LOKASI'=>$ID_IJIN_LOKASI,
					'ID_PEMOHON'=>$pemohon,
					'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
					'NO_SK'=>$NO_SK,
					'NO_SK_LAMA'=>$NO_SK_LAMA,
					'NPWPD'=>$NPWPD,
					'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
					'NO_AKTA'=>$NO_AKTA,
					'BENTUK_PERUSAHAAN'=>$BENTUK_PERUSAHAAN,
					'ALAMAT'=>$ALAMAT,
					'RT'=>$RT,
					'RW'=>$RW,
					'ID_KELURAHAN'=>$ID_KELURAHAN,
					'ID_KECAMATAN'=>$ID_KECAMATAN,
					'ID_KOTA'=>$ID_KOTA,
					'TELP'=>$TELP,
					'FUNGSI'=>$FUNGSI,
					'STATUS_TANAH'=>$STATUS_TANAH,
					'KETERANGAN_TANAH'=>$KETERANGAN_TANAH,
					'LUAS_LOKASI'=>$LUAS_LOKASI,
					'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
					'ID_KELURAHAN_LOKASI'=>$ID_KELURAHAN_LOKASI,
					'ID_KECAMATAN_LOKASI'=>$ID_KECAMATAN_LOKASI,
					'TGL_PERMOHONAN'=>date("Y-m-d"),
					'TGL_AKHIR'=>$TGL_AKHIR,
					'STATUS'=>$STATUS,
					'STATUS_SURVEY'=>$STATUS_SURVEY,
					);
				$result = $this->m_ijin_lokasi->__insert($data, '', 'insertId');
			}
			$lokasi_ket	= json_decode($this->input->post('KETERANGAN'));
			$syarat		= $this->m_ijin_lokasi->getSyarat2();
			$i=0;
			foreach($syarat as $row){
				$datacek = array(
				"ID_IJIN"=>$result,
				"ID_SYARAT"=>$row["ID_SYARAT"],
				"KETERANGAN"=>$lokasi_ket[$i]);
				$i++;
				$this->m_ijin_lokasi->__insert($datacek, 'cek_list_lokasi', '');
			}
		}
		echo "success";
	}
	
	function update(){
		$ID_IJIN_LOKASI = htmlentities($this->input->post('ID_IJIN_LOKASI'),ENT_QUOTES);
		$ID_IJIN_LOKASI = is_numeric($ID_IJIN_LOKASI) ? $ID_IJIN_LOKASI : 0;
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$NPWPD = htmlentities($this->input->post('NPWPD'),ENT_QUOTES);
		$NO_AKTA = htmlentities($this->input->post('NO_AKTA'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = htmlentities($this->input->post('BENTUK_PERUSAHAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$RT = htmlentities($this->input->post('RT'),ENT_QUOTES);
		$RT = is_numeric($RT) ? $RT : 0;
		$RW = htmlentities($this->input->post('RW'),ENT_QUOTES);
		$RW = is_numeric($RW) ? $RW : 0;
		$ID_KELURAHAN = htmlentities($this->input->post('ID_KELURAHAN'),ENT_QUOTES);
		$ID_KELURAHAN = is_numeric($ID_KELURAHAN) ? $ID_KELURAHAN : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELP = htmlentities($this->input->post('TELP'),ENT_QUOTES);
		$FUNGSI = htmlentities($this->input->post('FUNGSI'),ENT_QUOTES);
		$STATUS_TANAH = htmlentities($this->input->post('STATUS_TANAH'),ENT_QUOTES);
		$STATUS_TANAH = is_numeric($STATUS_TANAH) ? $STATUS_TANAH : 0;
		$KETERANGAN_TANAH = htmlentities($this->input->post('KETERANGAN_TANAH'),ENT_QUOTES);
		$LUAS_LOKASI = htmlentities($this->input->post('LUAS_LOKASI'),ENT_QUOTES);
		$LUAS_LOKASI = is_numeric($LUAS_LOKASI) ? $LUAS_LOKASI : 0;
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$ID_KELURAHAN_LOKASI = htmlentities($this->input->post('ID_KELURAHAN_LOKASI'),ENT_QUOTES);
		$ID_KELURAHAN_LOKASI = is_numeric($ID_KELURAHAN_LOKASI) ? $ID_KELURAHAN_LOKASI : 0;
		$ID_KECAMATAN_LOKASI = htmlentities($this->input->post('ID_KECAMATAN_LOKASI'),ENT_QUOTES);
		$ID_KECAMATAN_LOKASI = is_numeric($ID_KECAMATAN_LOKASI) ? $ID_KECAMATAN_LOKASI : 0;
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
		
		$in_lokasi_updated_by = $this->m_ijin_lokasi->__checkSession();
		$in_lokasi_updated_date = date('Y-m-d H:i:s');
		
		if($in_lokasi_updated_by == ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_PEMOHON'=>$ID_PEMOHON,
				'NO_SK'=>$NO_SK,
				'NO_SK_LAMA'=>$NO_SK_LAMA,
				'NPWPD'=>$NPWPD,
				'NO_AKTA'=>$NO_AKTA,
				'BENTUK_PERUSAHAAN'=>$BENTUK_PERUSAHAAN,
				'ALAMAT'=>$ALAMAT,
				'RT'=>$RT,
				'RW'=>$RW,
				'ID_KELURAHAN'=>$ID_KELURAHAN,
				'ID_KECAMATAN'=>$ID_KECAMATAN,
				'ID_KOTA'=>$ID_KOTA,
				'TELP'=>$TELP,
				'FUNGSI'=>$FUNGSI,
				'STATUS_TANAH'=>$STATUS_TANAH,
				'KETERANGAN_TANAH'=>$KETERANGAN_TANAH,
				'LUAS_LOKASI'=>$LUAS_LOKASI,
				'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
				'ID_KELURAHAN_LOKASI'=>$ID_KELURAHAN_LOKASI,
				'ID_KECAMATAN_LOKASI'=>$ID_KECAMATAN_LOKASI,
				'TGL_AKHIR'=>$TGL_AKHIR,
				'STATUS'=>$STATUS,
				'STATUS_SURVEY'=>$STATUS_SURVEY,
				);
			// $result = $this->m_ijin_lokasi->__update($data, $ID_IJIN_LOKASI, '', '');
			$result = $this->m_ijin_lokasi->save($data, $ID_IJIN_LOKASI);
			$this->m_cek_list_lokasi->delete($ID_IJIN_LOKASI);
			$lokasi_ket	= json_decode($this->input->post('KETERANGAN'));
			$syarat		= $this->m_ijin_lokasi->getSyarat2();
			$i=0;
			foreach($syarat as $row){
				$datacek = array(
				"ID_IJIN"=>$result,
				"ID_SYARAT"=>$row["ID_SYARAT"],
				"KETERANGAN"=>$lokasi_ket[$i]);
				$i++;
				$this->m_ijin_lokasi->__insert($datacek, 'cek_list_lokasi', '');
			}
			echo "success";
		}
		
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_ijin_lokasi->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$NPWPD = htmlentities($this->input->post('NPWPD'),ENT_QUOTES);
		$NO_AKTA = htmlentities($this->input->post('NO_AKTA'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = htmlentities($this->input->post('BENTUK_PERUSAHAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$RT = htmlentities($this->input->post('RT'),ENT_QUOTES);
		$RT = is_numeric($RT) ? $RT : 0;
		$RW = htmlentities($this->input->post('RW'),ENT_QUOTES);
		$RW = is_numeric($RW) ? $RW : 0;
		$ID_KELURAHAN = htmlentities($this->input->post('ID_KELURAHAN'),ENT_QUOTES);
		$ID_KELURAHAN = is_numeric($ID_KELURAHAN) ? $ID_KELURAHAN : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELP = htmlentities($this->input->post('TELP'),ENT_QUOTES);
		$FUNGSI = htmlentities($this->input->post('FUNGSI'),ENT_QUOTES);
		$STATUS_TANAH = htmlentities($this->input->post('STATUS_TANAH'),ENT_QUOTES);
		$STATUS_TANAH = is_numeric($STATUS_TANAH) ? $STATUS_TANAH : 0;
		$KETERANGAN_TANAH = htmlentities($this->input->post('KETERANGAN_TANAH'),ENT_QUOTES);
		$LUAS_LOKASI = htmlentities($this->input->post('LUAS_LOKASI'),ENT_QUOTES);
		$LUAS_LOKASI = is_numeric($LUAS_LOKASI) ? $LUAS_LOKASI : 0;
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$ID_KELURAHAN_LOKASI = htmlentities($this->input->post('ID_KELURAHAN_LOKASI'),ENT_QUOTES);
		$ID_KELURAHAN_LOKASI = is_numeric($ID_KELURAHAN_LOKASI) ? $ID_KELURAHAN_LOKASI : 0;
		$ID_KECAMATAN_LOKASI = htmlentities($this->input->post('ID_KECAMATAN_LOKASI'),ENT_QUOTES);
		$ID_KECAMATAN_LOKASI = is_numeric($ID_KECAMATAN_LOKASI) ? $ID_KECAMATAN_LOKASI : 0;
				
		$params = array(
			'ID_PEMOHON'=>$ID_PEMOHON,
			'NO_SK'=>$NO_SK,
			'NO_SK_LAMA'=>$NO_SK_LAMA,
			'NPWPD'=>$NPWPD,
			'NO_AKTA'=>$NO_AKTA,
			'BENTUK_PERUSAHAAN'=>$BENTUK_PERUSAHAAN,
			'ALAMAT'=>$ALAMAT,
			'RT'=>$RT,
			'RW'=>$RW,
			'ID_KELURAHAN'=>$ID_KELURAHAN,
			'ID_KECAMATAN'=>$ID_KECAMATAN,
			'ID_KOTA'=>$ID_KOTA,
			'TELP'=>$TELP,
			'FUNGSI'=>$FUNGSI,
			'STATUS_TANAH'=>$STATUS_TANAH,
			'KETERANGAN_TANAH'=>$KETERANGAN_TANAH,
			'LUAS_LOKASI'=>$LUAS_LOKASI,
			'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
			'ID_KELURAHAN_LOKASI'=>$ID_KELURAHAN_LOKASI,
			'ID_KECAMATAN_LOKASI'=>$ID_KECAMATAN_LOKASI,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_ijin_lokasi->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$NPWPD = htmlentities($this->input->post('NPWPD'),ENT_QUOTES);
		$NO_AKTA = htmlentities($this->input->post('NO_AKTA'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = htmlentities($this->input->post('BENTUK_PERUSAHAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$RT = htmlentities($this->input->post('RT'),ENT_QUOTES);
		$RT = is_numeric($RT) ? $RT : 0;
		$RW = htmlentities($this->input->post('RW'),ENT_QUOTES);
		$RW = is_numeric($RW) ? $RW : 0;
		$ID_KELURAHAN = htmlentities($this->input->post('ID_KELURAHAN'),ENT_QUOTES);
		$ID_KELURAHAN = is_numeric($ID_KELURAHAN) ? $ID_KELURAHAN : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$TELP = htmlentities($this->input->post('TELP'),ENT_QUOTES);
		$FUNGSI = htmlentities($this->input->post('FUNGSI'),ENT_QUOTES);
		$STATUS_TANAH = htmlentities($this->input->post('STATUS_TANAH'),ENT_QUOTES);
		$STATUS_TANAH = is_numeric($STATUS_TANAH) ? $STATUS_TANAH : 0;
		$KETERANGAN_TANAH = htmlentities($this->input->post('KETERANGAN_TANAH'),ENT_QUOTES);
		$LUAS_LOKASI = htmlentities($this->input->post('LUAS_LOKASI'),ENT_QUOTES);
		$LUAS_LOKASI = is_numeric($LUAS_LOKASI) ? $LUAS_LOKASI : 0;
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$ID_KELURAHAN_LOKASI = htmlentities($this->input->post('ID_KELURAHAN_LOKASI'),ENT_QUOTES);
		$ID_KELURAHAN_LOKASI = is_numeric($ID_KELURAHAN_LOKASI) ? $ID_KELURAHAN_LOKASI : 0;
		$ID_KECAMATAN_LOKASI = htmlentities($this->input->post('ID_KECAMATAN_LOKASI'),ENT_QUOTES);
		$ID_KECAMATAN_LOKASI = is_numeric($ID_KECAMATAN_LOKASI) ? $ID_KECAMATAN_LOKASI : 0;
				
		$params = array(
			'searchText' => $searchText,
			'ID_PEMOHON'=>$ID_PEMOHON,
			'NO_SK'=>$NO_SK,
			'NO_SK_LAMA'=>$NO_SK_LAMA,
			'NPWPD'=>$NPWPD,
			'NO_AKTA'=>$NO_AKTA,
			'BENTUK_PERUSAHAAN'=>$BENTUK_PERUSAHAAN,
			'ALAMAT'=>$ALAMAT,
			'RT'=>$RT,
			'RW'=>$RW,
			'ID_KELURAHAN'=>$ID_KELURAHAN,
			'ID_KECAMATAN'=>$ID_KECAMATAN,
			'ID_KOTA'=>$ID_KOTA,
			'TELP'=>$TELP,
			'FUNGSI'=>$FUNGSI,
			'STATUS_TANAH'=>$STATUS_TANAH,
			'KETERANGAN_TANAH'=>$KETERANGAN_TANAH,
			'LUAS_LOKASI'=>$LUAS_LOKASI,
			'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
			'ID_KELURAHAN_LOKASI'=>$ID_KELURAHAN_LOKASI,
			'ID_KECAMATAN_LOKASI'=>$ID_KECAMATAN_LOKASI,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_ijin_lokasi->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_ijin_lokasi.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/ijin_lokasi_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/ijin_lokasi_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$lokasi_id = $this->input->post('lokasi_id');
		$params = array(
			"currentAction"=>$currentAction,
			"lokasi_id"=>$lokasi_id
		);
		$result = $this->m_ijin_lokasi->getSyarat($params);
		echo $result;
	}	
	function printBP($id_trayek=FALSE){
		$this->load->model("m_master_ijin");
		$data["sppl"]	= $this->m_ijin_lokasi->get_by(array("ID_IJIN_LOKASI"=>$id_trayek),FALSE,FALSE,TRUE);
		$data["ijin"]	= $this->m_master_ijin->get_by(array("ID_IJIN"=>7),FALSE,FALSE,TRUE);
		$this->load->view("template/lokasi_bp",$data);
		
	}
}