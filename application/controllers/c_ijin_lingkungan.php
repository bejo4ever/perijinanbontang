<?php
class C_ijin_lingkungan extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_ijin_lingkungan');
		$this->load->model('m_ijin_lingkungan_inti');
		$this->load->model('m_m_pemohon');
	}
	
	function index(){
		$this->load->view('main/v_ijin_lingkungan');
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
		$result = $this->m_ijin_lingkungan->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_IJIN_LINGKUNGAN = htmlentities($this->input->post('ID_IJIN_LINGKUNGAN'),ENT_QUOTES);
		$ID_IJIN_LINGKUNGAN = is_numeric($ID_IJIN_LINGKUNGAN) ? $ID_IJIN_LINGKUNGAN : 0;
		$ID_IJIN_LINGKUNGAN_INTI = htmlentities($this->input->post('ID_IJIN_LINGKUNGAN_INTI'),ENT_QUOTES);
		$ID_IJIN_LINGKUNGAN_INTI = is_numeric($ID_IJIN_LINGKUNGAN_INTI) ? $ID_IJIN_LINGKUNGAN_INTI : 0;
		$NO_REG = htmlentities($this->input->post('NO_REG'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NAMA_DIREKTUR = htmlentities($this->input->post('NAMA_DIREKTUR'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AWAL = htmlentities($this->input->post('TGL_AWAL'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
		
		/*Data Inti*/
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$NPWPD = htmlentities($this->input->post('NPWPD'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NO_AKTE = htmlentities($this->input->post('NO_AKTE'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = htmlentities($this->input->post('BENTUK_PERUSAHAAN'),ENT_QUOTES);
		$BENTUK_PERUSAHAAN = is_numeric($BENTUK_PERUSAHAAN) ? $BENTUK_PERUSAHAAN : 0;
		$ALAMAT_PERUSAHAAN = htmlentities($this->input->post('ALAMAT_PERUSAHAAN'),ENT_QUOTES);
		$ID_KOTA = htmlentities($this->input->post('ID_KOTA'),ENT_QUOTES);
		$ID_KOTA = is_numeric($ID_KOTA) ? $ID_KOTA : 0;
		$ID_KECAMATAN = htmlentities($this->input->post('ID_KECAMATAN'),ENT_QUOTES);
		$ID_KECAMATAN = is_numeric($ID_KECAMATAN) ? $ID_KECAMATAN : 0;
		$ID_KELURAHAN = htmlentities($this->input->post('ID_KELURAHAN'),ENT_QUOTES);
		$ID_KELURAHAN = is_numeric($ID_KELURAHAN) ? $ID_KELURAHAN : 0;
		$NAMA_KEGIATAN = htmlentities($this->input->post('NAMA_KEGIATAN'),ENT_QUOTES);
		$JENIS_USAHA = htmlentities($this->input->post('JENIS_USAHA'),ENT_QUOTES);
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$ID_KELURAHAN_LOKASI = htmlentities($this->input->post('ID_KELURAHAN_LOKASI'),ENT_QUOTES);
		$ID_KELURAHAN_LOKASI = is_numeric($ID_KELURAHAN_LOKASI) ? $ID_KELURAHAN_LOKASI : 0;
		$ID_KECAMATAN_LOKASI = htmlentities($this->input->post('ID_KECAMATAN_LOKASI'),ENT_QUOTES);
		$ID_KECAMATAN_LOKASI = is_numeric($ID_KECAMATAN_LOKASI) ? $ID_KECAMATAN_LOKASI : 0;
		$STATUS_LOKASI = htmlentities($this->input->post('STATUS_LOKASI'),ENT_QUOTES);
		$STATUS_LOKASI = is_numeric($STATUS_LOKASI) ? $STATUS_LOKASI : 0;
		$LUAS_USAHA = htmlentities($this->input->post('LUAS_USAHA'),ENT_QUOTES);
		$LUAS_USAHA = is_numeric($LUAS_USAHA) ? $LUAS_USAHA : 0;
		$LUAS_BAHAN = htmlentities($this->input->post('LUAS_BAHAN'),ENT_QUOTES);
		$LUAS_BAHAN = is_numeric($LUAS_BAHAN) ? $LUAS_BAHAN : 0;
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$LUAS_BANGUNAN = is_numeric($LUAS_BANGUNAN) ? $LUAS_BANGUNAN : 0;
		$LUAS_RUANG_USAHA = htmlentities($this->input->post('LUAS_RUANG_USAHA'),ENT_QUOTES);
		$LUAS_RUANG_USAHA = is_numeric($LUAS_RUANG_USAHA) ? $LUAS_RUANG_USAHA : 0;
		$KAPASITAS = htmlentities($this->input->post('KAPASITAS'),ENT_QUOTES);
		$KAPASITAS = is_numeric($KAPASITAS) ? $KAPASITAS : 0;
		$IZIN_SKTR = htmlentities($this->input->post('IZIN_SKTR'),ENT_QUOTES);
		$IZIN_SKTR = is_numeric($IZIN_SKTR) ? $IZIN_SKTR : 0;
		$IZIN_LOKASI = htmlentities($this->input->post('IZIN_LOKASI'),ENT_QUOTES);
		$IZIN_LOKASI = is_numeric($IZIN_LOKASI) ? $IZIN_LOKASI : 0;
		/*End Inti*/
		
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
		
		$in_lingkungan_author = $this->m_ijin_lingkungan->__checkSession();
		$in_lingkungan_created_date = date('Y-m-d H:i:s');
		
		if($in_lingkungan_author == ''){
			$result = 'sessionExpired';
		}else{
			if($JENIS_PERMOHONAN == 1){
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
			} else {
				$query_p= $this->m_m_pemohon->get_by(array("pemohon_user_id"=>$_SESSION["USERID"]),FALSE,FALSE,TRUE);
				$pemohon=$query_p['pemohon_id'];
			}
			if($_SESSION['IDHAK'] == 2){
				if($JENIS_PERMOHONAN == 1){
				$data_inti = array(
					'ID_PEMOHON'=>$pemohon,
					'NPWPD'=>$NPWPD,
					'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
					'NO_AKTE'=>$NO_AKTE,
					'BENTUK_PERUSAHAAN'=>$BENTUK_PERUSAHAAN,
					'ALAMAT_PERUSAHAAN'=>$ALAMAT_PERUSAHAAN,
					'ID_KOTA'=>$ID_KOTA,
					'ID_KECAMATAN'=>$ID_KECAMATAN,
					'ID_KELURAHAN'=>$ID_KELURAHAN,
					'NAMA_KEGIATAN'=>$NAMA_KEGIATAN,
					'JENIS_USAHA'=>$JENIS_USAHA,
					'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
					'ID_KELURAHAN_LOKASI'=>$ID_KELURAHAN_LOKASI,
					'ID_KECAMATAN_LOKASI'=>$ID_KECAMATAN_LOKASI,
					'STATUS_LOKASI'=>$STATUS_LOKASI,
					'LUAS_USAHA'=>$LUAS_USAHA,
					'LUAS_BAHAN'=>$LUAS_BAHAN,
					'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
					'LUAS_RUANG_USAHA'=>$LUAS_RUANG_USAHA,
					'KAPASITAS'=>$KAPASITAS,
					'IZIN_SKTR'=>$IZIN_SKTR,
					'IZIN_LOKASI'=>$IZIN_LOKASI,
				);
				$ID_IJIN_LINGKUNGAN_INTI = $this->m_ijin_lingkungan_inti->__insert($data_inti, '', 'insertId');
				$data = array(
					'ID_IJIN_LINGKUNGAN'=>$ID_IJIN_LINGKUNGAN,
					'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
					// 'NO_REG'=>$NO_REG,
					// 'NO_SK'=>$NO_SK,
					'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
					'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
					'TGL_PERMOHONAN'=>(($TGL_PERMOHONAN == NULL || $TGL_PERMOHONAN == "") ? (date("Y-m-d")) : ($TGL_PERMOHONAN)),
					// 'TGL_AWAL'=>$TGL_AWAL,
					// 'TGL_AKHIR'=>$TGL_AKHIR,
					// 'STATUS'=>$STATUS,
					// 'STATUS_SURVEY'=>$STATUS_SURVEY,
					);
				$ID_IJIN = $this->m_ijin_lingkungan->__insert($data, '', 'insertId');
				} else {
				
				}
				$lingkungan_ket	= json_decode($this->input->post('KETERANGAN'));
				$syarat		= $this->m_ijin_lingkungan->getSyarat2();
				$i=0;
				foreach($syarat as $row){
					$datacek = array(
					"ID_IJIN"=>$ID_IJIN,
					"ID_SYARAT"=>$row["ID_SYARAT"],
					"KETERANGAN"=>$lingkungan_ket[$i]);
					$i++;
					$this->m_ijin_lingkungan->__insert($datacek, 'cek_list_lingkungan', 'insertId');
				}
				echo "success";
			} else {
				
			}
		}
	}
	
	function update(){
		$ID_IJIN_LINGKUNGAN = htmlentities($this->input->post('ID_IJIN_LINGKUNGAN'),ENT_QUOTES);
		$ID_IJIN_LINGKUNGAN = is_numeric($ID_IJIN_LINGKUNGAN) ? $ID_IJIN_LINGKUNGAN : 0;
		$ID_IJIN_LINGKUNGAN_INTI = htmlentities($this->input->post('ID_IJIN_LINGKUNGAN_INTI'),ENT_QUOTES);
		$ID_IJIN_LINGKUNGAN_INTI = is_numeric($ID_IJIN_LINGKUNGAN_INTI) ? $ID_IJIN_LINGKUNGAN_INTI : 0;
		$NO_REG = htmlentities($this->input->post('NO_REG'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NAMA_DIREKTUR = htmlentities($this->input->post('NAMA_DIREKTUR'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AWAL = htmlentities($this->input->post('TGL_AWAL'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$in_lingkungan_updated_by = $this->m_ijin_lingkungan->__checkSession();
		$in_lingkungan_updated_date = date('Y-m-d H:i:s');
		
		if($in_lingkungan_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
				'NO_REG'=>$NO_REG,
				'NO_SK'=>$NO_SK,
				'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
				'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
				'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
				'TGL_AWAL'=>$TGL_AWAL,
				'TGL_AKHIR'=>$TGL_AKHIR,
				'STATUS'=>$STATUS,
				'STATUS_SURVEY'=>$STATUS_SURVEY,
				);
			$result = $this->m_ijin_lingkungan->__update($data, $ID_IJIN_LINGKUNGAN, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_ijin_lingkungan->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_IJIN_LINGKUNGAN_INTI = htmlentities($this->input->post('ID_IJIN_LINGKUNGAN_INTI'),ENT_QUOTES);
		$ID_IJIN_LINGKUNGAN_INTI = is_numeric($ID_IJIN_LINGKUNGAN_INTI) ? $ID_IJIN_LINGKUNGAN_INTI : 0;
		$NO_REG = htmlentities($this->input->post('NO_REG'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NAMA_DIREKTUR = htmlentities($this->input->post('NAMA_DIREKTUR'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AWAL = htmlentities($this->input->post('TGL_AWAL'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$params = array(
			'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
			'NO_REG'=>$NO_REG,
			'NO_SK'=>$NO_SK,
			'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
			'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'TGL_AWAL'=>$TGL_AWAL,
			'TGL_AKHIR'=>$TGL_AKHIR,
			'STATUS'=>$STATUS,
			'STATUS_SURVEY'=>$STATUS_SURVEY,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_ijin_lingkungan->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_IJIN_LINGKUNGAN_INTI = htmlentities($this->input->post('ID_IJIN_LINGKUNGAN_INTI'),ENT_QUOTES);
		$ID_IJIN_LINGKUNGAN_INTI = is_numeric($ID_IJIN_LINGKUNGAN_INTI) ? $ID_IJIN_LINGKUNGAN_INTI : 0;
		$NO_REG = htmlentities($this->input->post('NO_REG'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NAMA_DIREKTUR = htmlentities($this->input->post('NAMA_DIREKTUR'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AWAL = htmlentities($this->input->post('TGL_AWAL'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$params = array(
			'searchText' => $searchText,
			'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
			'NO_REG'=>$NO_REG,
			'NO_SK'=>$NO_SK,
			'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
			'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'TGL_AWAL'=>$TGL_AWAL,
			'TGL_AKHIR'=>$TGL_AKHIR,
			'STATUS'=>$STATUS,
			'STATUS_SURVEY'=>$STATUS_SURVEY,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_ijin_lingkungan->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_ijin_lingkungan.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/ijin_lingkungan_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/ijin_lingkungan_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$lingkungan_id = $this->input->post('lingkungan_id');
		$params = array(
			"currentAction"=>$currentAction,
			"lingkungan_id"=>$lingkungan_id
		);
		$result = $this->m_ijin_lingkungan->getSyarat($params);
		echo $result;
	}
}