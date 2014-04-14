<?php
class C_trotoar extends CI_Controller{
	
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
		$this->load->model('m_trotoar');
		$this->load->model('m_m_pemohon');
		$this->load->model('m_cek_list_trotoar');
	}
	
	function index(){
		$data["content"]	= $this->load->view('main/v_trotoar',"",true);
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
		$result = $this->m_trotoar->getList($params);
		echo $result;
	}
	
	function create(){
		$params = json_decode($this->input->post('params'));
		extract(get_object_vars($params));
		
		$otoar_author = $this->m_trotoar->__checkSession();
		$otoar_created_date = date('Y-m-d H:i:s');
		
		$noreg = $this->m_public_function->getNomorReg(22);
		$resultperusahaan = $this->m_trotoar->cuperusahaan($params);
		$pemohon = $this->m_trotoar->cupemohon($params);
		$resultpermohonan = $this->m_trotoar->cupermohonan($params, $pemohon, $noreg);
		
		if($otoar_author == ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_PEMOHON'=>$pemohon,
				'ID_PERUSAHAAN'=>$resultperusahaan,
				'JENIS_PERMOHONAN'=>$permohonan_jenis,
				'NO_SK_LAMA'=>$NO_SK_LAMA,
				'NAMA_PERUSAHAAN'=>$perusahaan_nama,
				'ALAMAT'=>$perusahaan_alamat,
				'PERUNTUKAN'=>$PERUNTUKAN,
				'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
				'TGL_PERMOHONAN'=>$permohonan_tanggal,
				'TGL_BERAKHIR'=>$permohonan_kadaluarsa,
				'STATUS'=>$STATUS,
				'STATUS_SURVEY'=>$STATUS_SURVEY,
				'RETRIBUSI'=>$permohonan_retribusi,
				);
			$result = $this->m_trotoar->__insert($data, '', 'insertId');
			
			$trotoar_ket = json_decode($this->input->post('KETERANGAN'));
			$syarat = $this->m_trotoar->getSyarat2();
			$i=0;
			foreach($syarat as $row){
				$datacek = array(
				"ID_IJIN"=>$result,
				"ID_SYARAT"=>$row["ID_SYARAT"],
				"KETERANGAN"=>$trotoar_ket[$i]);
				$i++;
				$this->m_trotoar->__insert($datacek, 'cek_list_trotoar', '');
			}
		}
		echo "success";
	}
	
	function update(){
		$params = json_decode($this->input->post('params'));
		extract(get_object_vars($params));
		
		$otoar_updated_by = $this->m_trotoar->__checkSession();
		$otoar_updated_date = date('Y-m-d H:i:s');
		
		$resultperusahaan = $this->m_sktr->cuperusahaan($params);
		$resultpemohon = $this->m_sktr->cupemohon($params);
		$resultpermohonan = $this->m_sktr->cupermohonan($params, $resultpemohon, '');
		
		if($otoar_updated_by == ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_PEMOHON'=>$resultpemohon,
				'ID_PERUSAHAAN'=>$resultperusahaan,
				'JENIS_PERMOHONAN'=>$permohonan_jenis,
				'NO_SK_LAMA'=>$NO_SK_LAMA,
				'NAMA_PERUSAHAAN'=>$perusahaan_nama,
				'ALAMAT'=>$perusahaan_alamat,
				'PERUNTUKAN'=>$PERUNTUKAN,
				'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
				'TGL_PERMOHONAN'=>$permohonan_tanggal,
				'TGL_BERAKHIR'=>$permohonan_kadaluarsa,
				'STATUS'=>$STATUS,
				'STATUS_SURVEY'=>$STATUS_SURVEY,
				'RETRIBUSI'=>$permohonan_retribusi,
				);
			$result = $this->m_trotoar->save($data, $permohonan_id);
			$this->m_cek_list_trotoar->delete($result);
			$trotoar_ket = json_decode($this->input->post('KETERANGAN'));
			$syarat = $this->m_trotoar->getSyarat2();
			$i=0;
			foreach($syarat as $row){
				$datacek = array(
				"ID_IJIN"=>$result,
				"ID_SYARAT"=>$row["ID_SYARAT"],
				"KETERANGAN"=>$trotoar_ket[$i]);
				$i++;
				$this->m_trotoar->__insert($datacek, 'cek_list_trotoar', '');
			}
		}
		echo 'success';
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_trotoar->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$permohonan_jenis = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$permohonan_jenis = is_numeric($permohonan_jenis) ? $permohonan_jenis : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$perusahaan_nama = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$PERUNTUKAN = htmlentities($this->input->post('PERUNTUKAN'),ENT_QUOTES);
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$permohonan_tanggal = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_BERLAKU = htmlentities($this->input->post('TGL_BERLAKU'),ENT_QUOTES);
		$permohonan_kadaluarsa = htmlentities($this->input->post('TGL_BERAKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$params = array(
			'ID_PEMOHON'=>$ID_PEMOHON,
			'JENIS_PERMOHONAN'=>$permohonan_jenis,
			'NO_SK'=>$NO_SK,
			'NO_SK_LAMA'=>$NO_SK_LAMA,
			'NAMA_PERUSAHAAN'=>$perusahaan_nama,
			'ALAMAT'=>$ALAMAT,
			'PERUNTUKAN'=>$PERUNTUKAN,
			'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
			'TGL_PERMOHONAN'=>$permohonan_tanggal,
			'TGL_BERLAKU'=>$TGL_BERLAKU,
			'TGL_BERAKHIR'=>$permohonan_kadaluarsa,
			'STATUS'=>$STATUS,
			'STATUS_SURVEY'=>$STATUS_SURVEY,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_trotoar->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_PEMOHON = htmlentities($this->input->post('ID_PEMOHON'),ENT_QUOTES);
		$ID_PEMOHON = is_numeric($ID_PEMOHON) ? $ID_PEMOHON : 0;
		$permohonan_jenis = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$permohonan_jenis = is_numeric($permohonan_jenis) ? $permohonan_jenis : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NO_SK_LAMA = htmlentities($this->input->post('NO_SK_LAMA'),ENT_QUOTES);
		$perusahaan_nama = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$ALAMAT = htmlentities($this->input->post('ALAMAT'),ENT_QUOTES);
		$PERUNTUKAN = htmlentities($this->input->post('PERUNTUKAN'),ENT_QUOTES);
		$ALAMAT_LOKASI = htmlentities($this->input->post('ALAMAT_LOKASI'),ENT_QUOTES);
		$permohonan_tanggal = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_BERLAKU = htmlentities($this->input->post('TGL_BERLAKU'),ENT_QUOTES);
		$permohonan_kadaluarsa = htmlentities($this->input->post('TGL_BERAKHIR'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$params = array(
			'searchText' => $searchText,
			'ID_PEMOHON'=>$ID_PEMOHON,
			'JENIS_PERMOHONAN'=>$permohonan_jenis,
			'NO_SK'=>$NO_SK,
			'NO_SK_LAMA'=>$NO_SK_LAMA,
			'NAMA_PERUSAHAAN'=>$perusahaan_nama,
			'ALAMAT'=>$ALAMAT,
			'PERUNTUKAN'=>$PERUNTUKAN,
			'ALAMAT_LOKASI'=>$ALAMAT_LOKASI,
			'TGL_PERMOHONAN'=>$permohonan_tanggal,
			'TGL_BERLAKU'=>$TGL_BERLAKU,
			'TGL_BERAKHIR'=>$permohonan_kadaluarsa,
			'STATUS'=>$STATUS,
			'STATUS_SURVEY'=>$STATUS_SURVEY,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_trotoar->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_trotoar.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/trotoar_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/trotoar_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$trotoar_id = $this->input->post('trotoar_id');
		$params = array(
			"currentAction"=>$currentAction,
			"trotoar_id"=>$trotoar_id
		);
		$result = $this->m_trotoar->getSyarat($params);
		echo $result;
	}	
	function printBP(){
		$id_trotoar  = $this->input->post('ID_TROTOAR');
		$this->load->model("m_master_ijin");
		$data["trotoar"]	= $this->m_trotoar->get_by(array("ID_TROTOAR"=>$id_trotoar),FALSE,FALSE,TRUE);
		$data["ijin"]	= $this->m_master_ijin->get_by(array("ID_IJIN"=>13),FALSE,FALSE,TRUE);
		$print_view		= $this->load->view("template/trotoar_bp",$data,true);
		$print_file=fopen('print/trotoar_bp.html','w+');
		fwrite($print_file, $print_view);
	}
	function printSK(){
		$id_trotoar  = $this->input->post('ID_TROTOAR');
		$this->load->model("m_master_ijin");
		$join	= array(array("table"=>"trotoar","join_key"=>"ID_PEMOHON","join_table"=>"m_pemohon","join_key2"=>"pemohon_id"));
		$data["trotoar"]	= $this->m_trotoar->get_join_by($join,array("ID_TROTOAR"=>$id_trotoar),TRUE,FALSE);
		$data["ijin"]	= $this->m_master_ijin->get_by(array("ID_IJIN"=>13),FALSE,FALSE,TRUE);
		$print_view		= $this->load->view("template/trotoar_sk",$data,true);
		$print_file=fopen('print/trotoar_sk.html','w+');
		fwrite($print_file, $print_view);
	}
	function printLK(){
		$ID_TROTOAR  = $this->input->post('ID_TROTOAR');
		$join	= array(array("table"=>"trotoar","join_key"=>"ID_PEMOHON","join_table"=>"m_pemohon","join_key2"=>"pemohon_id"));
		$printrecord = $this->m_trotoar->get_join_by($join,array("ID_TROTOAR"=>$ID_TROTOAR),TRUE,FALSE);
		$dataceklist = $this->m_trotoar->get_lk($ID_TROTOAR);
		$data['printrecord'] = $printrecord;
		$data['dataceklist'] = $dataceklist;
		$print_view=$this->load->view('template/trotoar_lk',$data,TRUE);
		$print_file=fopen('print/trotoar_lk.html','w+');
		fwrite($print_file, $print_view);
	}
	function ubahProses(){
		$trotoar_id  = $this->input->post('trotoar_id');
		$no_sk  = $this->input->post('no_sk');
		$proses  = $this->input->post('proses');
		($proses == "Selesai, belum diambil") ? ($proses = 2) : (($proses == "Selesai, sudah diambil") ? ($proses = 1) : ($proses = 0));
		if (($no_sk == "" || $no_sk == NULL) && $proses != 0){
			($proses == 2 || $proses == 1) ? ($nosk = $this->m_public_function->getNomorSk("trotoar")) : ($nosk = NULL);
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
		$result = $this->m_trotoar->__update($data, $trotoar_id, '', '','');
		echo $result;
	}
}