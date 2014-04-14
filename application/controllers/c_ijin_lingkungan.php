<?php
class C_ijin_lingkungan extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			if(!isset($_SESSION['USERID'])){
				$this->output->set_status_header('301');
			}
		}else{
			if(!isset($_SESSION['USERID'])){
				redirect('c_login');
			}
		}
		$this->load->model('m_ijin_lingkungan');
		$this->load->model('m_ijin_lingkungan_inti');
		$this->load->model('m_m_pemohon');
	}
	
	function index(){
		$data["content"]	= $this->load->view('main/v_ijin_lingkungan',"",true);
		$this->load->view('home.php',$data);
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
			case 'CETAKBP':
				$this->printBP();
			break;
			case 'CETAKLK':
				$this->printLK();
			break;
			case 'CETAKSK':
				$this->printSK();
			break;
			case 'CETAKBA':
				$this->printBA();
			break;
			case 'UBAHPROSES':
				$this->ubahProses();
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
		$params = json_decode($this->input->post('params'));
		extract(get_object_vars($params));
		
		$in_lingkungan_author = $this->m_ijin_lingkungan->__checkSession();
		$in_lingkungan_created_date = date('Y-m-d H:i:s');
		
		$noreg = $this->m_public_function->getNomorReg(22);
		$resultperusahaan = $this->m_ijin_lingkungan->cuperusahaan($params);
		$pemohon = $this->m_ijin_lingkungan->cupemohon($params);
		$resultpermohonan = $this->m_ijin_lingkungan->cupermohonan($params, $pemohon, $noreg);
		
		if($in_lingkungan_author == ''){
			$result = 'sessionExpired';
		}else{
			if($_SESSION['IDHAK'] == 2){
				$data_inti = array(
					'ID_PEMOHON'=>$pemohon,
					'ID_PERUSAHAAN'=>$resultperusahaan,
					'NPWPD'=>$perusahaan_npwp,
					'NAMA_PERUSAHAAN'=>$perusahaan_nama,
					'NO_AKTE'=>$perusahaan_noakta,
					'BENTUK_PERUSAHAAN'=>$perusahaan_bentuk_id,
					'ALAMAT_PERUSAHAAN'=>$perusahaan_alamat,
					'ID_KOTA'=>$perusahaan_kabkota_id,
					'ID_KECAMATAN'=>$perusahaan_kecamatan_id,
					'ID_KELURAHAN'=>$perusahaan_desa_id,
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
					'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
					'JENIS_PERMOHONAN'=>$permohonan_jenis,
					'TGL_PERMOHONAN'=>(($permohonan_tanggal == NULL || $permohonan_tanggal == "") ? (date("Y-m-d")) : ($permohonan_tanggal)),
				);
				$ID_IJIN = $this->m_ijin_lingkungan->__insert($data, '', 'insertId');

				
			} else {
				$data_inti = array(
					'ID_PEMOHON'=>$pemohon,
					'ID_PERUSAHAAN'=>$resultperusahaan,
					'NPWPD'=>$perusahaan_npwp,
					'NAMA_PERUSAHAAN'=>$perusahaan_nama,
					'NO_AKTE'=>$perusahaan_noakta,
					'BENTUK_PERUSAHAAN'=>$perusahaan_bentuk_id,
					'ALAMAT_PERUSAHAAN'=>$perusahaan_alamat,
					'ID_KOTA'=>$perusahaan_kabkota_id,
					'ID_KECAMATAN'=>$perusahaan_kecamatan_id,
					'ID_KELURAHAN'=>$perusahaan_desa_id,
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
					'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
					'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
					'JENIS_PERMOHONAN'=>$permohonan_jenis,
					'TGL_PERMOHONAN'=>(($permohonan_tanggal == NULL || $permohonan_tanggal == "") ? (date("Y-m-d")) : ($permohonan_tanggal)),
					'TGL_AKHIR'=>$permohonan_kadaluarsa,
					'STATUS'=>$STATUS,
					'STATUS_SURVEY'=>$STATUS_SURVEY,
					'RETRIBUSI'=>$permohonan_retribusi,
					);
				$ID_IJIN = $this->m_ijin_lingkungan->__insert($data, '', 'insertId');
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
		}
	}
	
	function update(){
		$params = json_decode($this->input->post('params'));
		extract(get_object_vars($params));
		
		$in_lingkungan_updated_by = $this->m_ijin_lingkungan->__checkSession();
		$in_lingkungan_updated_date = date('Y-m-d H:i:s');
		
		$resultperusahaan = $this->m_sktr->cuperusahaan($params);
		$resultpemohon = $this->m_sktr->cupemohon($params);
		$resultpermohonan = $this->m_sktr->cupermohonan($params, $resultpemohon, '');
		
		if($in_lingkungan_updated_by == ''){
			$result = 'sessionExpired';
		}else{
			$data_inti = array(
				'ID_PEMOHON'=>$resultpemohon,
				'ID_PERUSAHAAN'=>$resultperusahaan,
				'NPWPD'=>$perusahaan_npwp,
				'NAMA_PERUSAHAAN'=>$perusahaan_nama,
				'NO_AKTE'=>$perusahaan_noakta,
				'BENTUK_PERUSAHAAN'=>$perusahaan_bentuk_id,
				'ALAMAT_PERUSAHAAN'=>$perusahaan_alamat,
				'ID_KOTA'=>$perusahaan_kabkota_id,
				'ID_KECAMATAN'=>$perusahaan_kecamatan_id,
				'ID_KELURAHAN'=>$perusahaan_desa_id,
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
			$ID_IJIN_LINGKUNGAN_INTI = $this->m_ijin_lingkungan_inti->__update($data_inti, $ID_IJIN_LINGKUNGAN_INTI, FALSE,'updateId');
			$data = array(
				'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
				'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
				'JENIS_PERMOHONAN'=>$permohonan_jenis,
				'RETRIBUSI'=>$permohonan_retribusi,
				'TGL_AKHIR'=>$permohonan_kadaluarsa,
				'STATUS'=>$STATUS,
				'STATUS_SURVEY'=>$STATUS_SURVEY,
			);
			$result = $this->m_ijin_lingkungan->__update($data, $ID_IJIN_LINGKUNGAN, FALSE, 'updateId');
			$lingkungan_ket	= json_decode($this->input->post('KETERANGAN'));
			$syarat		= $this->m_ijin_lingkungan->getSyarat2();
			$this->load->model("m_cek_list_lingkungan");
			$this->m_cek_list_lingkungan->delete($ID_IJIN_LINGKUNGAN);
			$i=0;
			foreach($syarat as $row){
				$datacek = array(
				"ID_IJIN"=>$ID_IJIN_LINGKUNGAN,
				"ID_SYARAT"=>$row["ID_SYARAT"],
				"KETERANGAN"=>$lingkungan_ket[$i]);
				$i++;
				$this->m_ijin_lingkungan->__insert($datacek, 'cek_list_lingkungan', 'insertId');
			}
			echo "success";
		}
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
		$permohonan_jenis = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$permohonan_jenis = is_numeric($permohonan_jenis) ? $permohonan_jenis : 0;
		$permohonan_tanggal = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AWAL = htmlentities($this->input->post('TGL_AWAL'),ENT_QUOTES);
		$permohonan_kadaluarsa = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$params = array(
			'ID_IJIN_LINGKUNGAN_INTI'=>$ID_IJIN_LINGKUNGAN_INTI,
			'NO_REG'=>$NO_REG,
			'NO_SK'=>$NO_SK,
			'NAMA_DIREKTUR'=>$NAMA_DIREKTUR,
			'JENIS_PERMOHONAN'=>$permohonan_jenis,
			'TGL_PERMOHONAN'=>$permohonan_tanggal,
			'TGL_AWAL'=>$TGL_AWAL,
			'TGL_AKHIR'=>$permohonan_kadaluarsa,
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
		$permohonan_jenis = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$permohonan_jenis = is_numeric($permohonan_jenis) ? $permohonan_jenis : 0;
		$permohonan_tanggal = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_AWAL = htmlentities($this->input->post('TGL_AWAL'),ENT_QUOTES);
		$permohonan_kadaluarsa = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
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
			'JENIS_PERMOHONAN'=>$permohonan_jenis,
			'TGL_PERMOHONAN'=>$permohonan_tanggal,
			'TGL_AWAL'=>$TGL_AWAL,
			'TGL_AKHIR'=>$permohonan_kadaluarsa,
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
	function printBP(){
		$id_ijin_lingkungan  = $this->input->post('ID_IJIN_LINGKUNGAN');
		$this->load->model("m_master_ijin");
		$join	= array(
			array("table"=>"ijin_lingkungan","join_key"=>"ID_IJIN_LINGKUNGAN_INTI","join_table"=>"ijin_lingkungan_inti")
		);
		$data["lingkungan"]	= $this->m_ijin_lingkungan->get_join_by($join,array("ID_IJIN_LINGKUNGAN"=>$id_ijin_lingkungan),TRUE,FALSE);
		$data["ijin"]	= $this->m_master_ijin->get_by(array("ID_IJIN"=>8),FALSE,FALSE,TRUE);
		$print_view		= $this->load->view("template/lingkungan_bp",$data,true);
		$print_file=fopen('print/lingkungan_bp.html','w+');
		fwrite($print_file, $print_view);
		
	}
	function printSK(){
		$id_ijin_lingkungan  = $this->input->post('ID_IJIN_LINGKUNGAN');
		$this->load->model("m_master_ijin");
		$join	= array(
					array("table"=>"ijin_lingkungan","join_key"=>"ID_IJIN_LINGKUNGAN_INTI","join_table"=>"ijin_lingkungan_inti"),
					array("table"=>"ijin_lingkungan_inti","join_key"=>"ID_PEMOHON","join_table"=>"m_pemohon","join_key2"=>"pemohon_id")
					);
		$data["ijin_lingkungan"]	= $this->m_ijin_lingkungan->get_join_by($join,array("ID_IJIN_LINGKUNGAN"=>$id_ijin_lingkungan),TRUE,FALSE);
		$data["ijin"]	= $this->m_master_ijin->get_by(array("ID_IJIN"=>8),FALSE,FALSE,TRUE);
		$print_view		= $this->load->view("template/lingkungan_sk",$data,true);
		$print_file=fopen('print/lingkungan_sk.html','w+');
		fwrite($print_file, $print_view);
	}
	function printBA(){
		$id_ijin_lingkungan  = $this->input->post('ID_IJIN_LINGKUNGAN');
		$this->load->model("m_master_ijin");
		$join	= array(
					array("table"=>"ijin_lingkungan","join_key"=>"ID_IJIN_LINGKUNGAN_INTI","join_table"=>"ijin_lingkungan_inti"),
					array("table"=>"ijin_lingkungan_inti","join_key"=>"ID_PEMOHON","join_table"=>"m_pemohon","join_key2"=>"pemohon_id")
					);
		$data["ijin_lingkungan"]	= $this->m_ijin_lingkungan->get_join_by($join,array("ID_IJIN_LINGKUNGAN"=>$id_ijin_lingkungan),TRUE,FALSE);
		$data["ijin"]	= $this->m_master_ijin->get_by(array("ID_IJIN"=>8),FALSE,FALSE,TRUE);
		$print_view		= $this->load->view("template/lingkungan_ba",$data,true);
		$print_file=fopen('print/lingkungan_ba.html','w+');
		fwrite($print_file, $print_view);
	}
	function printLK(){
		$ID_IJIN_LINGKUNGAN  = $this->input->post('ID_IJIN_LINGKUNGAN');
		$join	= array(
					array("table"=>"ijin_lingkungan","join_key"=>"ID_IJIN_LINGKUNGAN_INTI","join_table"=>"ijin_lingkungan_inti"),
					array("table"=>"ijin_lingkungan_inti","join_key"=>"ID_PEMOHON","join_table"=>"m_pemohon","join_key2"=>"pemohon_id")
					);
		$printrecord = $this->m_ijin_lingkungan->get_join_by($join,array("ID_IJIN_LINGKUNGAN"=>$ID_IJIN_LINGKUNGAN),TRUE,FALSE);
		$dataceklist = $this->m_ijin_lingkungan->get_lk($ID_IJIN_LINGKUNGAN);
		$data['printrecord'] = $printrecord;
		$data['dataceklist'] = $dataceklist;
		$print_view=$this->load->view('template/lingkungan_lk',$data,TRUE);
		$print_file=fopen('print/lingkungan_lk.html','w+');
		fwrite($print_file, $print_view);
		// echo $ID_SKTR;
	}
	function ubahProses(){
		$lingkungan_id  = $this->input->post('lingkungan_id');
		$no_sk  = $this->input->post('no_sk');
		$proses  = $this->input->post('proses');
		($proses == "Selesai, belum diambil") ? ($proses = 2) : (($proses == "Selesai, sudah diambil") ? ($proses = 1) : ($proses = 0));
		if (($no_sk == "" || $no_sk == NULL) && $proses != 0){
			($proses == 2 || $proses == 1) ? ($nosk = $this->m_public_function->getNomorSk("lingkungan")) : ($nosk = NULL);
			$data = array(
				"NO_SK"=>$nosk,
				"STATUS"=>$proses,
				"TGL_AWAL"=>date("Y-m-d")
			);
		} else {
			$data = array(
				"STATUS"=>$proses,
			);
		}
		$result = $this->m_ijin_lingkungan->__update($data, $lingkungan_id, '', '','');
		echo $result;
	}
}