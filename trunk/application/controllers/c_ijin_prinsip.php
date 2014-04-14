<?php
class C_ijin_prinsip extends CI_Controller{
	
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
		$this->load->model('m_ijin_prinsip');
		$this->load->model('m_m_pemohon');
		$this->load->model('m_cek_list_prinsip');
	}
	
	function index(){
		
		$data["content"]	= $this->load->view('main/v_ijin_prinsip',"",true);
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
			case 'EXCEL':
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
			case 'UBAHPROSES':
				$this->ubahProses();
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
		$result = $this->m_ijin_prinsip->getList($params);
		echo $result;
	}
	
	function create(){
		$params = json_decode($this->input->post('params'));
		extract(get_object_vars($params));
		
		$in_prinsip_author = $this->m_ijin_prinsip->__checkSession();
		$in_prinsip_created_date = date('Y-m-d H:i:s');
		
		$noreg = $this->m_public_function->getNomorReg(22);
		$resultperusahaan = $this->m_ijin_prinsip->cuperusahaan($params);
		$pemohon = $this->m_ijin_prinsip->cupemohon($params);
		$resultpermohonan = $this->m_ijin_prinsip->cupermohonan($params, $pemohon, $noreg);
		
		if($in_prinsip_author == ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_PEMOHON'=>$pemohon,
				'ID_PERUSAHAAN'=>$resultperusahaan,
				'NAMA_PERUSAHAAN'=>$perusahaan_nama,
				'NO_SK_LAMA'=>$NO_SK_LAMA,
				'JENIS_PERMOHONAN'=>$permohonan_jenis,
				'NAMA_LOKASI'=>$NAMA_LOKASI,
				'LONGITUDE'=>$LONGITUDE,
				'LATITUDE'=>$LATITUDE,
				'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
				'JENIS_TOWER'=>$JENIS_TOWER,
				'FUNGSI_BANGUNAN'=>$FUNGSI_BANGUNAN,
				'JENIS_BANGUNAN'=>$JENIS_BANGUNAN,
				'UKURAN_BANGUNAN'=>$UKURAN_BANGUNAN,
				'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
				'TIANG_BANGUNAN'=>$TIANG_BANGUNAN,
				'PONDASI_BANGUNAN'=>$PONDASI_BANGUNAN,
				'TGL_BERAKHIR'=>$permohonan_kadaluarsa,
				'TGL_PERMOHONAN'=>date("Y-m-d"),
				'STATUS_SURVEY'=>$STATUS_SURVEY,
				'RETRIBUSI'=>$permohonan_retribusi,
				'STATUS'=>$STATUS,
			);
			$result = $this->m_ijin_prinsip->__insert($data, '', 'insertId');
			
			$ijin_prinsip_ket = json_decode($this->input->post('KETERANGAN'));
			$syarat = $this->m_ijin_prinsip->getSyarat2();
			$i=0;
			foreach($syarat as $row){
				$datacek = array(
				"ID_IJIN"=>$result,
				"ID_SYARAT"=>$row["ID_SYARAT"],
				"KETERANGAN"=>$ijin_prinsip_ket[$i]);
				$i++;
				$this->m_ijin_prinsip->__insert($datacek, 'cek_list_prinsip', '');
			}
		}
		echo "success";
	}
	
	function update(){
		$params = json_decode($this->input->post('params'));
		extract(get_object_vars($params));
		
		$in_prinsip_updated_by = $this->m_ijin_prinsip->__checkSession();
		$in_prinsip_updated_date = date('Y-m-d H:i:s');
		
		$resultperusahaan = $this->m_sktr->cuperusahaan($params);
		$resultpemohon = $this->m_sktr->cupemohon($params);
		$resultpermohonan = $this->m_sktr->cupermohonan($params, $resultpemohon, '');
		
		if($in_prinsip_updated_by == ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_PEMOHON'=>$resultpemohon,
				'ID_PERUSAHAAN'=>$resultperusahaan,
				'NAMA_PERUSAHAAN'=>$perusahaan_nama,
				'NO_SK'=>$NO_SK,
				'NO_SK_LAMA'=>$NO_SK_LAMA,
				'JENIS_PERMOHONAN'=>$permohonan_jenis,
				'NAMA_LOKASI'=>$NAMA_LOKASI,
				'LONGITUDE'=>$LONGITUDE,
				'LATITUDE'=>$LATITUDE,
				'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
				'JENIS_TOWER'=>$JENIS_TOWER,
				'FUNGSI_BANGUNAN'=>$FUNGSI_BANGUNAN,
				'JENIS_BANGUNAN'=>$JENIS_BANGUNAN,
				'UKURAN_BANGUNAN'=>$UKURAN_BANGUNAN,
				'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
				'TIANG_BANGUNAN'=>$TIANG_BANGUNAN,
				'PONDASI_BANGUNAN'=>$PONDASI_BANGUNAN,
				'TGL_BERAKHIR'=>$permohonan_kadaluarsa,
				'STATUS_SURVEY'=>$STATUS_SURVEY,
				'STATUS'=>$STATUS,
				'RETRIBUSI'=>$permohonan_retribusi,
				);
			$result = $this->m_ijin_prinsip->save($data, $ID_IJIN_PRINSIP);
			$this->m_cek_list_prinsip->delete($result);
			$ijin_prinsip_ket = json_decode($this->input->post('KETERANGAN'));
			$syarat = $this->m_ijin_prinsip->getSyarat2();
			$i=0;
			foreach($syarat as $row){
				$datacek = array(
				"ID_IJIN"=>$result,
				"ID_SYARAT"=>$row["ID_SYARAT"],
				"KETERANGAN"=>$ijin_prinsip_ket[$i]);
				$i++;
				$this->m_ijin_prinsip->__insert($datacek, 'cek_list_prinsip', '');
			}
		}
		echo "success";
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_ijin_prinsip->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$perusahaan_nama = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$permohonan_jenis = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$permohonan_jenis = is_numeric($permohonan_jenis) ? $permohonan_jenis : 0;
		$NAMA_LOKASI = htmlentities($this->input->post('NAMA_LOKASI'),ENT_QUOTES);
		$LONGITUDE = htmlentities($this->input->post('LONGITUDE'),ENT_QUOTES);
		$LATITUDE = htmlentities($this->input->post('LATITUDE'),ENT_QUOTES);
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$JENIS_TOWER = htmlentities($this->input->post('JENIS_TOWER'),ENT_QUOTES);
		$FUNGSI_BANGUNAN = htmlentities($this->input->post('FUNGSI_BANGUNAN'),ENT_QUOTES);
		$JENIS_BANGUNAN = htmlentities($this->input->post('JENIS_BANGUNAN'),ENT_QUOTES);
		$UKURAN_BANGUNAN = htmlentities($this->input->post('UKURAN_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = is_numeric($TINGGI_BANGUNAN) ? $TINGGI_BANGUNAN : 0;
		$TIANG_BANGUNAN = htmlentities($this->input->post('TIANG_BANGUNAN'),ENT_QUOTES);
		$PONDASI_BANGUNAN = htmlentities($this->input->post('PONDASI_BANGUNAN'),ENT_QUOTES);
				
		$params = array(
			'NAMA_PERUSAHAAN'=>$perusahaan_nama,
			'NO_SK'=>$NO_SK,
			'NO_SK_LAMA'=>$NO_SK_LAMA,
			'JENIS_PERMOHONAN'=>$permohonan_jenis,
			'NAMA_LOKASI'=>$NAMA_LOKASI,
			'LONGITUDE'=>$LONGITUDE,
			'LATITUDE'=>$LATITUDE,
			'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
			'JENIS_TOWER'=>$JENIS_TOWER,
			'FUNGSI_BANGUNAN'=>$FUNGSI_BANGUNAN,
			'JENIS_BANGUNAN'=>$JENIS_BANGUNAN,
			'UKURAN_BANGUNAN'=>$UKURAN_BANGUNAN,
			'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
			'TIANG_BANGUNAN'=>$TIANG_BANGUNAN,
			'PONDASI_BANGUNAN'=>$PONDASI_BANGUNAN,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_ijin_prinsip->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$perusahaan_nama = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$permohonan_jenis = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$permohonan_jenis = is_numeric($permohonan_jenis) ? $permohonan_jenis : 0;
		$NAMA_LOKASI = htmlentities($this->input->post('NAMA_LOKASI'),ENT_QUOTES);
		$LONGITUDE = htmlentities($this->input->post('LONGITUDE'),ENT_QUOTES);
		$LATITUDE = htmlentities($this->input->post('LATITUDE'),ENT_QUOTES);
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$JENIS_TOWER = htmlentities($this->input->post('JENIS_TOWER'),ENT_QUOTES);
		$FUNGSI_BANGUNAN = htmlentities($this->input->post('FUNGSI_BANGUNAN'),ENT_QUOTES);
		$JENIS_BANGUNAN = htmlentities($this->input->post('JENIS_BANGUNAN'),ENT_QUOTES);
		$UKURAN_BANGUNAN = htmlentities($this->input->post('UKURAN_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = is_numeric($TINGGI_BANGUNAN) ? $TINGGI_BANGUNAN : 0;
		$TIANG_BANGUNAN = htmlentities($this->input->post('TIANG_BANGUNAN'),ENT_QUOTES);
		$PONDASI_BANGUNAN = htmlentities($this->input->post('PONDASI_BANGUNAN'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'NAMA_PERUSAHAAN'=>$perusahaan_nama,
			'NO_SK'=>$NO_SK,
			'NO_SK_LAMA'=>$NO_SK_LAMA,
			'JENIS_PERMOHONAN'=>$permohonan_jenis,
			'NAMA_LOKASI'=>$NAMA_LOKASI,
			'LONGITUDE'=>$LONGITUDE,
			'LATITUDE'=>$LATITUDE,
			'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
			'JENIS_TOWER'=>$JENIS_TOWER,
			'FUNGSI_BANGUNAN'=>$FUNGSI_BANGUNAN,
			'JENIS_BANGUNAN'=>$JENIS_BANGUNAN,
			'UKURAN_BANGUNAN'=>$UKURAN_BANGUNAN,
			'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
			'TIANG_BANGUNAN'=>$TIANG_BANGUNAN,
			'PONDASI_BANGUNAN'=>$PONDASI_BANGUNAN,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_ijin_prinsip->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_ijin_prinsip.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/ijin_prinsip_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/ijin_prinsip_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$ijin_prinsip_id = $this->input->post('ijin_prinsip_id');
		$params = array(
			"currentAction"=>$currentAction,
			"ijin_prinsip_id"=>$ijin_prinsip_id
		);
		$result = $this->m_ijin_prinsip->getSyarat($params);
		echo $result;
	}	
	function printBP(){
		$id_ijin_prinsip  = $this->input->post('ID_IJIN_PRINSIP');
		$this->load->model("m_master_ijin");
		$data["prinsip"]	= $this->m_ijin_prinsip->get_by(array("ID_IJIN_PRINSIP"=>$id_ijin_prinsip),FALSE,FALSE,TRUE);
		$data["ijin"]	= $this->m_master_ijin->get_by(array("ID_IJIN"=>12),FALSE,FALSE,TRUE);
		$print_view		= $this->load->view("template/prinsip_bp",$data,true);
		$print_file=fopen('print/prinsip_bp.html','w+');
		fwrite($print_file, $print_view);
	}
	function printSK(){
		$id_ijin_prinsip  = $this->input->post('ID_IJIN_PRINSIP');
		$this->load->model("m_master_ijin");
		$join	= array(array("table"=>"ijin_prinsip","join_key"=>"ID_PEMOHON","join_table"=>"m_pemohon","join_key2"=>"pemohon_id"));
		$data["prinsip"]	= $this->m_ijin_prinsip->get_join_by($join,array("ID_IJIN_PRINSIP"=>$id_ijin_prinsip),TRUE,FALSE);
		$data["ijin"]	= $this->m_master_ijin->get_by(array("ID_IJIN"=>12),FALSE,FALSE,TRUE);
		$print_view		= $this->load->view("template/prinsip_sk",$data,true);
		$print_file=fopen('print/prinsip_sk.html','w+');
		fwrite($print_file, $print_view);
	}
	function printLK(){
		$ID_IJIN_PRINSIP  = $this->input->post('ID_IJIN_PRINSIP');
		$join	= array(array("table"=>"ijin_prinsip","join_key"=>"ID_PEMOHON","join_table"=>"m_pemohon","join_key2"=>"pemohon_id"));
		$printrecord = $this->m_ijin_prinsip->get_join_by($join,array("ID_IJIN_PRINSIP"=>$ID_IJIN_PRINSIP),TRUE,FALSE);
		$dataceklist = $this->m_ijin_prinsip->get_lk($ID_IJIN_PRINSIP);
		$data['printrecord'] = $printrecord;
		$data['dataceklist'] = $dataceklist;
		$print_view=$this->load->view('template/prinsip_lk',$data,TRUE);
		$print_file=fopen('print/prinsip_lk.html','w+');
		fwrite($print_file, $print_view);
	}
	function ubahProses(){
		$prinsip_id  = $this->input->post('ijin_prinsip_id');
		$no_sk  = $this->input->post('no_sk');
		$proses  = $this->input->post('proses');
		($proses == "Selesai, belum diambil") ? ($proses = 2) : (($proses == "Selesai, sudah diambil") ? ($proses = 1) : ($proses = 0));
		if (($no_sk == "" || $no_sk == NULL) && $proses != 0){
			($proses == 2 || $proses == 1) ? ($nosk = $this->m_public_function->getNomorSk("prinsip")) : ($nosk = NULL);
			$data = array(
				"NO_SK"=>$nosk,
				"STATUS"=>$proses,
				"TGL_BERLAKU"=>date("Y-m-d")
			);
		} else {
			$data = array(
				"STATUS"=>$proses
			);
		}
		$result = $this->m_ijin_prinsip->__update($data, $prinsip_id, '', '','');
		echo $result;
	}
}