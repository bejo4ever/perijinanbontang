<?php
class C_sppl extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_sppl');
		$this->load->model('m_m_pemohon');
		$this->load->model('m_cek_list_sppl');
	}
	
	function index(){
		$this->load->view('home.php');
		$this->load->view('main/v_sppl');
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
				$this->cetak_bp();
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
		// $ID_SPPL = htmlentities($this->input->post('ID_SPPL'),ENT_QUOTES);
		// $ID_SPPL = is_numeric($ID_SPPL) ? $ID_SPPL : 0;
		// $ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		// $ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$pemohon_nama = htmlentities($this->input->post('pemohon_nama'),ENT_QUOTES);
		$pemohon_alamat = htmlentities($this->input->post('pemohon_alamat'),ENT_QUOTES);
		$pemohon_telp = htmlentities($this->input->post('pemohon_telp'),ENT_QUOTES);
		$pemohon_id = htmlentities($this->input->post('pemohon_id'),ENT_QUOTES);
		$pemohon_nik = htmlentities($this->input->post('pemohon_nik'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NAMA_USAHA = htmlentities($this->input->post('NAMA_USAHA'),ENT_QUOTES);
		$PENANGGUNG_JAWAB = htmlentities($this->input->post('PENANGGUNG_JAWAB'),ENT_QUOTES);
		$NO_TELP = htmlentities($this->input->post('NO_TELP'),ENT_QUOTES);
		$JENIS_USAHA = htmlentities($this->input->post('JENIS_USAHA'),ENT_QUOTES);
		$ALAMAT_USAHA = htmlentities($this->input->post('ALAMAT_USAHA'),ENT_QUOTES);
		$STATUS_LAHAN = htmlentities($this->input->post('STATUS_LAHAN'),ENT_QUOTES);
		$STATUS_LAHAN = is_numeric($STATUS_LAHAN) ? $STATUS_LAHAN : 0;
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$NO_AKTA = htmlentities($this->input->post('NO_AKTA'),ENT_QUOTES);
		$TANGGAL = htmlentities($this->input->post('TANGGAL'),ENT_QUOTES);
		$TANGGAL_BERAKHIR = htmlentities($this->input->post('TANGGAL_BERAKHIR'),ENT_QUOTES);
		$MULAI_KEGIATAN = htmlentities($this->input->post('MULAI_KEGIATAN'),ENT_QUOTES);
		$LUAS_LAHAN = htmlentities($this->input->post('LUAS_LAHAN'),ENT_QUOTES);
		$LUAS_LAHAN = is_numeric($LUAS_LAHAN) ? $LUAS_LAHAN : 0;
		$LUAS_TAPAK_BANGUNAN = htmlentities($this->input->post('LUAS_TAPAK_BANGUNAN'),ENT_QUOTES);
		$LUAS_TAPAK_BANGUNAN = is_numeric($LUAS_TAPAK_BANGUNAN) ? $LUAS_TAPAK_BANGUNAN : 0;
		$LUAS_KEGIATAN = htmlentities($this->input->post('LUAS_KEGIATAN'),ENT_QUOTES);
		$LUAS_KEGIATAN = is_numeric($LUAS_KEGIATAN) ? $LUAS_KEGIATAN : 0;
		$LUAS_PARKIR = htmlentities($this->input->post('LUAS_PARKIR'),ENT_QUOTES);
		$LUAS_PARKIR = is_numeric($LUAS_PARKIR) ? $LUAS_PARKIR : 0;
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
				
		$pl_author = $this->m_sppl->__checkSession();
		$pl_created_date = date('Y-m-d H:i:s');
		if($pl_author == ''){
			$result = 'sessionExpired';
		}else{
			// if($JENIS_PERMOHONAN == 1){
				// $data = array(
					// 'pemohon_nama'=>$pemohon_nama,
					// 'pemohon_alamat'=>$pemohon_alamat,
					// 'pemohon_telp'=>$pemohon_telp,
					// 'pemohon_user_id'=>$_SESSION['USERID']
				// );
				// $pemohon= $this->m_m_pemohon->__insert($data, '', 'insertId');
			// } else {
				// $query_p= $this->m_m_pemohon->get_by(array("pemohon_user_id"=>$_SESSION["USERID"]),FALSE,FALSE,TRUE);
				// $pemohon=$query_p['pemohon_id'];
			// }
			if($pemohon_id != null || $pemohon_id != ""){
				$pemohon	= $pemohon_id;
			} else {
				$data = array(
					'pemohon_nama'=>$pemohon_nama,
					'pemohon_nik'=>$pemohon_nik,
					'pemohon_alamat'=>$pemohon_alamat,
					'pemohon_telp'=>$pemohon_telp,
					'pemohon_user_id'=>$_SESSION['USERID']
				);
				$pemohon= $this->m_m_pemohon->__insert($data, '', 'insertId');
			}
			if($_SESSION['IDHAK'] == 2){
				// if($JENIS_PERMOHONAN == 1){
					// $data = array(
					// 'ID_PEMOHON'=>$pemohon,
					// 'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
					// 'NAMA_USAHA'=>$NAMA_USAHA,
					// 'PENANGGUNG_JAWAB'=>$PENANGGUNG_JAWAB,
					// 'NO_TELP'=>$NO_TELP,
					// 'JENIS_USAHA'=>$JENIS_USAHA,
					// 'ALAMAT_USAHA'=>$ALAMAT_USAHA,
					// 'STATUS_LAHAN'=>$STATUS_LAHAN,
					// 'NO_AKTA'=>$NO_AKTA,
					// 'TANGGAL'=>$TANGGAL,
					// 'MULAI_KEGIATAN'=>$MULAI_KEGIATAN,
					// 'LUAS_LAHAN'=>$LUAS_LAHAN,
					// 'LUAS_TAPAK_BANGUNAN'=>$LUAS_TAPAK_BANGUNAN,
					// 'LUAS_KEGIATAN'=>$LUAS_KEGIATAN,
					// 'LUAS_PARKIR'=>$LUAS_PARKIR,
					// 'TGL_PERMOHONAN'=>date("Y-m-d")
					// );
				// } else {
					$data = array(
					'ID_PEMOHON'=>$pemohon,
					'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
					'NAMA_USAHA'=>$NAMA_USAHA,
					'PENANGGUNG_JAWAB'=>$PENANGGUNG_JAWAB,
					'NO_TELP'=>$NO_TELP,
					'JENIS_USAHA'=>$JENIS_USAHA,
					'ALAMAT_USAHA'=>$ALAMAT_USAHA,
					'STATUS_LAHAN'=>$STATUS_LAHAN,
					'NO_AKTA'=>$NO_AKTA,
					'TANGGAL'=>$TANGGAL,
					'MULAI_KEGIATAN'=>$MULAI_KEGIATAN,
					'LUAS_LAHAN'=>$LUAS_LAHAN,
					'LUAS_TAPAK_BANGUNAN'=>$LUAS_TAPAK_BANGUNAN,
					'LUAS_KEGIATAN'=>$LUAS_KEGIATAN,
					'LUAS_PARKIR'=>$LUAS_PARKIR,
					'TGL_PERMOHONAN'=>date("Y-m-d")
					);
				// }
				$result		= $this->m_sppl->__insert($data, '', 'insertId');
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
			} else {
				$data = array(
					'ID_PEMOHON'=>$pemohon,
					'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
					'NAMA_USAHA'=>$NAMA_USAHA,
					'PENANGGUNG_JAWAB'=>$PENANGGUNG_JAWAB,
					'NO_TELP'=>$NO_TELP,
					'JENIS_USAHA'=>$JENIS_USAHA,
					'ALAMAT_USAHA'=>$ALAMAT_USAHA,
					'STATUS_LAHAN'=>$STATUS_LAHAN,
					'NO_AKTA'=>$NO_AKTA,
					'TANGGAL'=>$TANGGAL,
					'MULAI_KEGIATAN'=>$MULAI_KEGIATAN,
					'LUAS_LAHAN'=>$LUAS_LAHAN,
					'LUAS_TAPAK_BANGUNAN'=>$LUAS_TAPAK_BANGUNAN,
					'LUAS_KEGIATAN'=>$LUAS_KEGIATAN,
					'LUAS_PARKIR'=>$LUAS_PARKIR,
					'TGL_PERMOHONAN'=>date("Y-m-d"),
					'TGL_BERAKHIR'=>$TGL_BERAKHIR,
					'STATUS'=>$STATUS,
					'STATUS'=>$STATUS_SURVEY,
					);
				$result		= $this->m_sppl->__insert($data, '', 'insertId');
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
	}
	
	function update(){
		$ID_SPPL = htmlentities($this->input->post('ID_SPPL'),ENT_QUOTES);
		$ID_SPPL = is_numeric($ID_SPPL) ? $ID_SPPL : 0;
		// $ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		// $ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$pemohon_nama = htmlentities($this->input->post('pemohon_nama'),ENT_QUOTES);
		$pemohon_alamat = htmlentities($this->input->post('pemohon_alamat'),ENT_QUOTES);
		$pemohon_telp = htmlentities($this->input->post('pemohon_telp'),ENT_QUOTES);
		$pemohon_id = htmlentities($this->input->post('pemohon_id'),ENT_QUOTES);
		$pemohon_nik = htmlentities($this->input->post('pemohon_nik'),ENT_QUOTES);
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NAMA_USAHA = htmlentities($this->input->post('NAMA_USAHA'),ENT_QUOTES);
		$PENANGGUNG_JAWAB = htmlentities($this->input->post('PENANGGUNG_JAWAB'),ENT_QUOTES);
		$NO_TELP = htmlentities($this->input->post('NO_TELP'),ENT_QUOTES);
		$JENIS_USAHA = htmlentities($this->input->post('JENIS_USAHA'),ENT_QUOTES);
		$ALAMAT_USAHA = htmlentities($this->input->post('ALAMAT_USAHA'),ENT_QUOTES);
		$STATUS_LAHAN = htmlentities($this->input->post('STATUS_LAHAN'),ENT_QUOTES);
		$STATUS_LAHAN = is_numeric($STATUS_LAHAN) ? $STATUS_LAHAN : 0;
		$NO_AKTA = htmlentities($this->input->post('NO_AKTA'),ENT_QUOTES);
		$TANGGAL = htmlentities($this->input->post('TANGGAL'),ENT_QUOTES);
		$LUAS_LAHAN = htmlentities($this->input->post('LUAS_LAHAN'),ENT_QUOTES);
		$LUAS_LAHAN = is_numeric($LUAS_LAHAN) ? $LUAS_LAHAN : 0;
		$LUAS_TAPAK_BANGUNAN = htmlentities($this->input->post('LUAS_TAPAK_BANGUNAN'),ENT_QUOTES);
		$LUAS_TAPAK_BANGUNAN = is_numeric($LUAS_TAPAK_BANGUNAN) ? $LUAS_TAPAK_BANGUNAN : 0;
		$LUAS_KEGIATAN = htmlentities($this->input->post('LUAS_KEGIATAN'),ENT_QUOTES);
		$LUAS_KEGIATAN = is_numeric($LUAS_KEGIATAN) ? $LUAS_KEGIATAN : 0;
		$LUAS_PARKIR = htmlentities($this->input->post('LUAS_PARKIR'),ENT_QUOTES);
		$LUAS_PARKIR = is_numeric($LUAS_PARKIR) ? $LUAS_PARKIR : 0;
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
		$TGL_BERAKHIR = htmlentities($this->input->post('TGL_BERAKHIR'),ENT_QUOTES);
		
		$pl_updated_by = $this->m_sppl->__checkSession();
		$pl_updated_date = date('Y-m-d H:i:s');
		
		if($pl_updated_by == ''){
			$result = 'sessionExpired';
		}else{
			if($pemohon_id != null || $pemohon_id != ""){
				$pemohon	= $pemohon_id;
			} else {
				$data = array(
					'pemohon_nama'=>$pemohon_nama,
					'pemohon_nik'=>$pemohon_nik,
					'pemohon_alamat'=>$pemohon_alamat,
					'pemohon_telp'=>$pemohon_telp,
					'pemohon_user_id'=>$_SESSION['USERID']
				);
				$pemohon= $this->m_m_pemohon->__insert($data, '', 'insertId');
			}
			$data = array(
				'ID_PEMOHON'=>$pemohon,
				'NO_SK'=>$NO_SK,
				'NAMA_USAHA'=>$NAMA_USAHA,
				'PENANGGUNG_JAWAB'=>$PENANGGUNG_JAWAB,
				'NO_TELP'=>$NO_TELP,
				'JENIS_USAHA'=>$JENIS_USAHA,
				'ALAMAT_USAHA'=>$ALAMAT_USAHA,
				'STATUS_LAHAN'=>$STATUS_LAHAN,
				'NO_AKTA'=>$NO_AKTA,
				'TANGGAL'=>$TANGGAL,
				'LUAS_LAHAN'=>$LUAS_LAHAN,
				'LUAS_TAPAK_BANGUNAN'=>$LUAS_TAPAK_BANGUNAN,
				'LUAS_KEGIATAN'=>$LUAS_KEGIATAN,
				'LUAS_PARKIR'=>$LUAS_PARKIR,
				'TGL_BERAKHIR'=>$TGL_BERAKHIR,
				'STATUS'=>$STATUS,
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
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$NAMA_USAHA = htmlentities($this->input->post('NAMA_USAHA'),ENT_QUOTES);
		$PENANGGUNG_JAWAB = htmlentities($this->input->post('PENANGGUNG_JAWAB'),ENT_QUOTES);
		$NO_TELP = htmlentities($this->input->post('NO_TELP'),ENT_QUOTES);
		$JENIS_USAHA = htmlentities($this->input->post('JENIS_USAHA'),ENT_QUOTES);
		$ALAMAT_USAHA = htmlentities($this->input->post('ALAMAT_USAHA'),ENT_QUOTES);
		$STATUS_LAHAN = htmlentities($this->input->post('STATUS_LAHAN'),ENT_QUOTES);
		$STATUS_LAHAN = is_numeric($STATUS_LAHAN) ? $STATUS_LAHAN : 0;
		$NO_AKTA = htmlentities($this->input->post('NO_AKTA'),ENT_QUOTES);
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
			'NAMA_USAHA'=>$NAMA_USAHA,
			'PENANGGUNG_JAWAB'=>$PENANGGUNG_JAWAB,
			'NO_TELP'=>$NO_TELP,
			'JENIS_USAHA'=>$JENIS_USAHA,
			'ALAMAT_USAHA'=>$ALAMAT_USAHA,
			'STATUS_LAHAN'=>$STATUS_LAHAN,
			'NO_AKTA'=>$NO_AKTA,
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
		$NAMA_USAHA = htmlentities($this->input->post('NAMA_USAHA'),ENT_QUOTES);
		$PENANGGUNG_JAWAB = htmlentities($this->input->post('PENANGGUNG_JAWAB'),ENT_QUOTES);
		$NO_TELP = htmlentities($this->input->post('NO_TELP'),ENT_QUOTES);
		$JENIS_USAHA = htmlentities($this->input->post('JENIS_USAHA'),ENT_QUOTES);
		$ALAMAT_USAHA = htmlentities($this->input->post('ALAMAT_USAHA'),ENT_QUOTES);
		$STATUS_LAHAN = htmlentities($this->input->post('STATUS_LAHAN'),ENT_QUOTES);
		$STATUS_LAHAN = is_numeric($STATUS_LAHAN) ? $STATUS_LAHAN : 0;
		$NO_AKTA = htmlentities($this->input->post('NO_AKTA'),ENT_QUOTES);
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
			'NAMA_USAHA'=>$NAMA_USAHA,
			'PENANGGUNG_JAWAB'=>$PENANGGUNG_JAWAB,
			'NO_TELP'=>$NO_TELP,
			'JENIS_USAHA'=>$JENIS_USAHA,
			'ALAMAT_USAHA'=>$ALAMAT_USAHA,
			'STATUS_LAHAN'=>$STATUS_LAHAN,
			'NO_AKTA'=>$NO_AKTA,
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
	function cetak_bp($id_sppl=FALSE){
		$this->load->model("m_master_ijin");
		$data["sppl"]	= $this->m_sppl->get_by(array("ID_SPPL"=>$id_sppl),FALSE,FALSE,TRUE);
		$data["ijin"]	= $this->m_master_ijin->get_by(array("ID_IJIN"=>9),FALSE,FALSE,TRUE);
		$this->load->view("template/sppl_bp",$data);
		
	}
}