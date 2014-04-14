<?php
class C_sppl extends CI_Controller{
	
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
		$this->load->model('m_sppl');
		$this->load->model('m_m_pemohon');
		$this->load->model('m_cek_list_sppl');
	}
	
	function index(){
		$data["content"]	= $this->load->view('main/v_sppl',"",true);
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
			case 'CETAKLK':
				$this->printLK();
			break;
			case 'CETAKBP':
				$this->printBP();
			break;
			case 'CETAKSPPL':
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
		$result = $this->m_sppl->getList($params);
		echo $result;
	}
	
	function create(){
		$params = json_decode($this->input->post('params'));
		extract(get_object_vars($params));
		
		$pl_author = $this->m_sppl->__checkSession();
		$pl_created_date = date('Y-m-d H:i:s');
		
		$noreg = $this->m_public_function->getNomorReg(22);
		$resultperusahaan = $this->m_sppl->cuperusahaan($params);
		$pemohon = $this->m_sppl->cupemohon($params);
		$resultpermohonan = $this->m_sppl->cupermohonan($params, $pemohon, $noreg);
		
		if($pl_author == ''){
			$result = 'sessionExpired';
		}else{
			if($_SESSION['IDHAK'] == 2){
				$data = array(
					'ID_PEMOHON'=>$pemohon,
					'ID_PERUSAHAAN'=>$resultperusahaan,
					'JENIS_PERMOHONAN'=>$permohonan_jenis,
					'NAMA_USAHA'=>$perusahaan_nama,
					'PENANGGUNG_JAWAB'=>$PENANGGUNG_JAWAB,
					'NO_TELP'=>$perusahaan_telp,
					'JENIS_USAHA'=>$JENIS_USAHA,
					'ALAMAT_USAHA'=>$perusahaan_alamat,
					'STATUS_LAHAN'=>$STATUS_LAHAN,
					'NO_AKTA'=>$perusahaan_noakta,
					'TANGGAL'=>$perusahaan_tglakta,
					'MULAI_KEGIATAN'=>$MULAI_KEGIATAN,
					'LUAS_LAHAN'=>$LUAS_LAHAN,
					'LUAS_TAPAK_BANGUNAN'=>$LUAS_TAPAK_BANGUNAN,
					'LUAS_KEGIATAN'=>$LUAS_KEGIATAN,
					'LUAS_PARKIR'=>$LUAS_PARKIR,
					'RETRIBUSI'=>$RETRIBUSI,
					'TGL_PERMOHONAN'=>date("Y-m-d")
				);
				$result		= $this->m_sppl->__insert($data, '', 'insertId');
			} else {
				$data = array(
					'ID_PEMOHON'=>$pemohon,
					'ID_PERUSAHAAN'=>$resultperusahaan,
					'JENIS_PERMOHONAN'=>$permohonan_jenis,
					'NAMA_USAHA'=>$perusahaan_nama,
					'PENANGGUNG_JAWAB'=>$PENANGGUNG_JAWAB,
					'NO_TELP'=>$perusahaan_telp,
					'JENIS_USAHA'=>$JENIS_USAHA,
					'ALAMAT_USAHA'=>$perusahaan_alamat,
					'STATUS_LAHAN'=>$STATUS_LAHAN,
					'NO_AKTA'=>$perusahaan_noakta,
					'TANGGAL'=>$perusahaan_tglakta,
					'MULAI_KEGIATAN'=>$MULAI_KEGIATAN,
					'LUAS_LAHAN'=>$LUAS_LAHAN,
					'LUAS_TAPAK_BANGUNAN'=>$LUAS_TAPAK_BANGUNAN,
					'LUAS_KEGIATAN'=>$LUAS_KEGIATAN,
					'LUAS_PARKIR'=>$LUAS_PARKIR,
					'TGL_PERMOHONAN'=>date("Y-m-d"),
					'TGL_BERAKHIR'=>$permohonan_kadaluarsa,
					'STATUS'=>$STATUS,
					'STATUS'=>$STATUS_SURVEY,
					);
				$result		= $this->m_sppl->__insert($data, '', 'insertId');
			}
			$sppl_ket	= json_decode($this->input->post('KETERANGAN'));
			$syarat		= $this->m_sppl->getSyarat2();
			$i=0;
			foreach($syarat as $row){
				$datacek = array(
				"ID_IJIN"=>$result,
				"ID_SYARAT"=>$row["ID_SYARAT"],
				"KETERANGAN"=>$sppl_ket[$i]);
				$i++;
				$this->m_sppl->__insert($datacek, 'cek_list_sppl', 'insertId');
			}
			echo "success";
		}
	}
	
	function update(){
		$params = json_decode($this->input->post('params'));
		extract(get_object_vars($params));
		
		$pl_updated_by = $this->m_sppl->__checkSession();
		$pl_updated_date = date('Y-m-d H:i:s');
		
		$resultperusahaan = $this->m_sktr->cuperusahaan($params);
		$resultpemohon = $this->m_sktr->cupemohon($params);
		$resultpermohonan = $this->m_sktr->cupermohonan($params, $resultpemohon, '');
		
		if($pl_updated_by == ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_PEMOHON'=>$pemohon,
				'ID_PERUSAHAAN'=>$resultperusahaan,
				'NO_SK'=>$NO_SK,
				'NAMA_USAHA'=>$perusahaan_nama,
				'PENANGGUNG_JAWAB'=>$PENANGGUNG_JAWAB,
				'NO_TELP'=>$perusahaan_telp,
				'JENIS_USAHA'=>$JENIS_USAHA,
				'ALAMAT_USAHA'=>$perusahaan_alamat,
				'STATUS_LAHAN'=>$STATUS_LAHAN,
				'NO_AKTA'=>$perusahaan_noakta,
				'TANGGAL'=>$perusahaan_tglakta,
				'LUAS_LAHAN'=>$LUAS_LAHAN,
				'LUAS_TAPAK_BANGUNAN'=>$LUAS_TAPAK_BANGUNAN,
				'LUAS_KEGIATAN'=>$LUAS_KEGIATAN,
				'LUAS_PARKIR'=>$LUAS_PARKIR,
				'TGL_BERAKHIR'=>$TGL_BERAKHIR,
				'STATUS'=>$STATUS,
				'RETRIBUSI'=>$RETRIBUSI,
				'STATUS_SURVEY'=>$STATUS_SURVEY
			);
			$result = $this->m_sppl->__update($data, $ID_SPPL, FALSE, 'updateId', '');
			$this->m_cek_list_sppl->delete($ID_SPPL);
			$sppl_ket	= json_decode($this->input->post('KETERANGAN'));
			$syarat		= $this->m_sppl->getSyarat2();
			$i=0;
			foreach($syarat as $row){
				$datacek = array(
				"ID_IJIN"=>$result,
				"ID_SYARAT"=>$row["ID_SYARAT"],
				"KETERANGAN"=>$sppl_ket[$i]);
				$i++;
				$this->m_sppl->__insert($datacek, 'cek_list_sppl', 'insertId');
			}
			echo "success";
		}
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_sppl->__delete($arrayId,'');
		echo $result;
	}
	function ubahProses(){
		$sppl_id  = $this->input->post('sppl_id');
		$no_sk  = $this->input->post('no_sk');
		$proses  = $this->input->post('proses');
		($proses == "Selesai, belum diambil") ? ($proses = 2) : (($proses == "Selesai, sudah diambil") ? ($proses = 1) : ($proses = 0));
		if (($no_sk == "" || $no_sk == NULL) && $proses != 0){
			($proses == 2 || $proses == 1) ? ($nosk = $this->m_public_function->getNomorSk("sppl")) : ($nosk = NULL);
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
		$result = $this->m_sppl->__update($data, $sppl_id, '', '','');
		echo $result;
	}
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$perusahaan_nama = htmlentities($this->input->post('NAMA_USAHA'),ENT_QUOTES);
		$PENANGGUNG_JAWAB = htmlentities($this->input->post('PENANGGUNG_JAWAB'),ENT_QUOTES);
		$perusahaan_telp = htmlentities($this->input->post('NO_TELP'),ENT_QUOTES);
		$JENIS_USAHA = htmlentities($this->input->post('JENIS_USAHA'),ENT_QUOTES);
		$perusahaan_alamat = htmlentities($this->input->post('ALAMAT_USAHA'),ENT_QUOTES);
		$STATUS_LAHAN = htmlentities($this->input->post('STATUS_LAHAN'),ENT_QUOTES);
		$STATUS_LAHAN = is_numeric($STATUS_LAHAN) ? $STATUS_LAHAN : 0;
		$perusahaan_noakta = htmlentities($this->input->post('NO_AKTA'),ENT_QUOTES);
		$TANGGAL = htmlentities($this->input->post('TANGGAL'),ENT_QUOTES);
		$LUAS_LAHAN = htmlentities($this->input->post('LUAS_LAHAN'),ENT_QUOTES);
		$LUAS_LAHAN = is_numeric($LUAS_LAHAN) ? $LUAS_LAHAN : 0;
		$LUAS_TAPAK_BANGUNAN = htmlentities($this->input->post('LUAS_TAPAK_BANGUNAN'),ENT_QUOTES);
		$LUAS_TAPAK_BANGUNAN = is_numeric($LUAS_TAPAK_BANGUNAN) ? $LUAS_TAPAK_BANGUNAN : 0;
		$LUAS_KEGIATAN = htmlentities($this->input->post('LUAS_KEGIATAN'),ENT_QUOTES);
		$LUAS_KEGIATAN = is_numeric($LUAS_KEGIATAN) ? $LUAS_KEGIATAN : 0;
		$LUAS_PARKIR = htmlentities($this->input->post('LUAS_PARKIR'),ENT_QUOTES);
		$LUAS_PARKIR = is_numeric($LUAS_PARKIR) ? $LUAS_PARKIR : 0;
				
		$params = array(
			'ID_USER'=>$ID_USER,
			'NO_SK'=>$NO_SK,
			'NAMA_USAHA'=>$perusahaan_nama,
			'PENANGGUNG_JAWAB'=>$PENANGGUNG_JAWAB,
			'NO_TELP'=>$perusahaan_telp,
			'JENIS_USAHA'=>$JENIS_USAHA,
			'ALAMAT_USAHA'=>$perusahaan_alamat,
			'STATUS_LAHAN'=>$STATUS_LAHAN,
			'NO_AKTA'=>$perusahaan_noakta,
			'TANGGAL'=>$TANGGAL,
			'LUAS_LAHAN'=>$LUAS_LAHAN,
			'LUAS_TAPAK_BANGUNAN'=>$LUAS_TAPAK_BANGUNAN,
			'LUAS_KEGIATAN'=>$LUAS_KEGIATAN,
			'LUAS_PARKIR'=>$LUAS_PARKIR,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_sppl->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$perusahaan_nama = htmlentities($this->input->post('NAMA_USAHA'),ENT_QUOTES);
		$PENANGGUNG_JAWAB = htmlentities($this->input->post('PENANGGUNG_JAWAB'),ENT_QUOTES);
		$perusahaan_telp = htmlentities($this->input->post('NO_TELP'),ENT_QUOTES);
		$JENIS_USAHA = htmlentities($this->input->post('JENIS_USAHA'),ENT_QUOTES);
		$perusahaan_alamat = htmlentities($this->input->post('ALAMAT_USAHA'),ENT_QUOTES);
		$STATUS_LAHAN = htmlentities($this->input->post('STATUS_LAHAN'),ENT_QUOTES);
		$STATUS_LAHAN = is_numeric($STATUS_LAHAN) ? $STATUS_LAHAN : 0;
		$perusahaan_noakta = htmlentities($this->input->post('NO_AKTA'),ENT_QUOTES);
		$TANGGAL = htmlentities($this->input->post('TANGGAL'),ENT_QUOTES);
		$LUAS_LAHAN = htmlentities($this->input->post('LUAS_LAHAN'),ENT_QUOTES);
		$LUAS_LAHAN = is_numeric($LUAS_LAHAN) ? $LUAS_LAHAN : 0;
		$LUAS_TAPAK_BANGUNAN = htmlentities($this->input->post('LUAS_TAPAK_BANGUNAN'),ENT_QUOTES);
		$LUAS_TAPAK_BANGUNAN = is_numeric($LUAS_TAPAK_BANGUNAN) ? $LUAS_TAPAK_BANGUNAN : 0;
		$LUAS_KEGIATAN = htmlentities($this->input->post('LUAS_KEGIATAN'),ENT_QUOTES);
		$LUAS_KEGIATAN = is_numeric($LUAS_KEGIATAN) ? $LUAS_KEGIATAN : 0;
		$LUAS_PARKIR = htmlentities($this->input->post('LUAS_PARKIR'),ENT_QUOTES);
		$LUAS_PARKIR = is_numeric($LUAS_PARKIR) ? $LUAS_PARKIR : 0;
				
		$params = array(
			'searchText' => $searchText,
			'ID_USER'=>$ID_USER,
			'NO_SK'=>$NO_SK,
			'NAMA_USAHA'=>$perusahaan_nama,
			'PENANGGUNG_JAWAB'=>$PENANGGUNG_JAWAB,
			'NO_TELP'=>$perusahaan_telp,
			'JENIS_USAHA'=>$JENIS_USAHA,
			'ALAMAT_USAHA'=>$perusahaan_alamat,
			'STATUS_LAHAN'=>$STATUS_LAHAN,
			'NO_AKTA'=>$perusahaan_noakta,
			'TANGGAL'=>$TANGGAL,
			'LUAS_LAHAN'=>$LUAS_LAHAN,
			'LUAS_TAPAK_BANGUNAN'=>$LUAS_TAPAK_BANGUNAN,
			'LUAS_KEGIATAN'=>$LUAS_KEGIATAN,
			'LUAS_PARKIR'=>$LUAS_PARKIR,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_sppl->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_sppl.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/sppl_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/sppl_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$sppl_id = $this->input->post('sppl_id');
		$params = array(
			"currentAction"=>$currentAction,
			"sppl_id"=>$sppl_id
		);
		$result = $this->m_sppl->getSyarat($params);
		echo $result;
	}
	function printBP(){
		$this->load->model("m_master_ijin");
		$id_sppl  = $this->input->post('ID_SPPL');
		$data["sppl"]	= $this->m_sppl->get_by(array("ID_SPPL"=>$id_sppl),FALSE,FALSE,TRUE);
		$data["ijin"]	= $this->m_master_ijin->get_by(array("ID_IJIN"=>9),FALSE,FALSE,TRUE);
		$print_view		= $this->load->view("template/sppl_bp",$data,true);
		$print_file=fopen('print/sppl_bp.html','w+');
		fwrite($print_file, $print_view);
	}
	function printLK($id_sppl=FALSE){
		$ID_SPPL  = $this->input->post('ID_SPPL');
		$join	= array(array("table"=>"sppl","join_key"=>"ID_PEMOHON","join_table"=>"m_pemohon","join_key2"=>"pemohon_id"));
		$printrecord = $this->m_sppl->get_join_by($join,array("ID_SPPL"=>$ID_SPPL),TRUE,FALSE);
		$dataceklist = $this->m_sppl->get_lk($ID_SPPL);
		$data['printrecord'] = $printrecord;
		$data['dataceklist'] = $dataceklist;
		$print_view=$this->load->view('template/sppl_lk',$data,TRUE);
		$print_file=fopen('print/sppl_lk.html','w+');
		fwrite($print_file, $print_view);
	}
	function printSK(){
		$id_sppl  = $this->input->post('ID_SPPL');
		$this->load->model("m_master_ijin");
		$join	= array(array("table"=>"sppl","join_key"=>"ID_PEMOHON","join_table"=>"m_pemohon","join_key2"=>"pemohon_id"));
		$data["sppl"]	= $this->m_sppl->get_join_by($join,array("ID_SPPL"=>$id_sppl),TRUE,FALSE);
		$data["ijin"]	= $this->m_master_ijin->get_by(array("ID_IJIN"=>10),FALSE,FALSE,TRUE);
		$print_view		= $this->load->view("template/sppl_sk",$data,true);
		$print_file=fopen('print/sppl_sk.html','w+');
		fwrite($print_file, $print_view);
	}
}