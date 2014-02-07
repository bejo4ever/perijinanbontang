<?php
class C_sktr extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_sktr');
		$this->load->model('m_m_pemohon');
		$this->load->model('m_cek_list_sktr');
		$this->load->model('m_public_function');
	}
	
	function index(){
		$data["content"]	= $this->load->view('main/v_sktr',"",true);
		$this->load->view('home',$data);
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
			case 'CETAKBP':
				$this->printBP();
			break;
			case 'GETSYARAT':
				$this->getSyarat();
			break;
			case 'CETAKLK':
				$this->printLK();
			break;
			case 'CETAKSKTR':
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
		$result = $this->m_sktr->getList($params);
		echo $result;
	}
	
	function create(){
		// $ID_SKTR = htmlentities($this->input->post('ID_SKTR'),ENT_QUOTES);
		// $ID_SKTR = is_numeric($ID_SKTR) ? $ID_SKTR : 0;
		// $ID_SKTR_INTI = htmlentities($this->input->post('ID_SKTR_INTI'),ENT_QUOTES);
		// $ID_SKTR_INTI = is_numeric($ID_SKTR_INTI) ? $ID_SKTR_INTI : 0;
		// $ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		// $ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		// $NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		// $NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		// $NO_TELP = htmlentities($this->input->post('NO_TELP'),ENT_QUOTES);
		$pemohon_nama = htmlentities($this->input->post('pemohon_nama'),ENT_QUOTES);
		$pemohon_alamat = htmlentities($this->input->post('pemohon_alamat'),ENT_QUOTES);
		$pemohon_telp = htmlentities($this->input->post('pemohon_telp'),ENT_QUOTES);
		$pemohon_id = htmlentities($this->input->post('pemohon_id'),ENT_QUOTES);
		$pemohon_nik = htmlentities($this->input->post('pemohon_nik'),ENT_QUOTES);
		
		$HAK_MILIK = htmlentities($this->input->post('HAK_MILIK'),ENT_QUOTES);
		$HAK_MILIK = is_numeric($HAK_MILIK) ? $HAK_MILIK : 0;
		$NAMA_PEMILIK = htmlentities($this->input->post('NAMA_PEMILIK'),ENT_QUOTES);
		$NO_SURAT_TANAH = htmlentities($this->input->post('NO_SURAT_TANAH'),ENT_QUOTES);
		$BATAS_KIRI = htmlentities($this->input->post('BATAS_KIRI'),ENT_QUOTES);
		$BATAS_KANAN = htmlentities($this->input->post('BATAS_KANAN'),ENT_QUOTES);
		$BATAS_DEPAN = htmlentities($this->input->post('BATAS_DEPAN'),ENT_QUOTES);
		$BATAS_BELAKANG = htmlentities($this->input->post('BATAS_BELAKANG'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_BERAKHIR = htmlentities($this->input->post('TGL_BERAKHIR'),ENT_QUOTES);
		$FUNGSI = htmlentities($this->input->post('FUNGSI'),ENT_QUOTES);
		$ALAMAT_BANGUNAN = htmlentities($this->input->post('ALAMAT_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$LUAS_PERSIL = htmlentities($this->input->post('LUAS_PERSIL'),ENT_QUOTES);
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$RETRIBUSI = htmlentities($this->input->post('RETRIBUSI'),ENT_QUOTES);
		$RETRIBUSI = is_numeric($RETRIBUSI) ? $RETRIBUSI : 0;
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
		
				
		$tr_author = $this->m_sktr->__checkSession();
		$tr_created_date = date('Y-m-d H:i:s');
		if($tr_author == ''){
			$result = 'sessionExpired';
		}else{
			if($_SESSION['IDHAK'] == 2){
				if($pemohon_id != null || $pemohon_id != ""){
					$pemohon	= $pemohon_id;
				} else {
					$data = array(
						'pemohon_nama'=>$pemohon_nama,
						'pemohon_alamat'=>$pemohon_alamat,
						'pemohon_telp'=>$pemohon_telp,
						'pemohon_user_id'=>$_SESSION['USERID']
					);
					$pemohon= $this->m_m_pemohon->__insert($data, '', 'insertId');
				}
				if($JENIS_PERMOHONAN == 1){
					$data = array(
						'ID_PEMOHON'=>$pemohon,
						'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,				
						'HAK_MILIK'=>$HAK_MILIK,
						'NAMA_PEMILIK'=>$NAMA_PEMILIK,
						'NO_SURAT_TANAH'=>$NO_SURAT_TANAH,
						'BATAS_KIRI'=>$BATAS_KIRI,
						'BATAS_KANAN'=>$BATAS_KANAN,
						'BATAS_DEPAN'=>$BATAS_DEPAN,
						'BATAS_BELAKANG'=>$BATAS_BELAKANG,
						'TGL_PERMOHONAN'=>(($TGL_PERMOHONAN == null || $TGL_PERMOHONAN == "") ? (date("Y-m-d")) : ($TGL_PERMOHONAN)),
						'FUNGSI'=>$FUNGSI,
						'ALAMAT_BANGUNAN'=>$ALAMAT_BANGUNAN,
						'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
						'LUAS_PERSIL'=>$LUAS_PERSIL,
						'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
						);
					} else {
						$data = array(
						'ID_PEMOHON'=>$pemohon,
						'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,				
						'HAK_MILIK'=>$HAK_MILIK,
						'NAMA_PEMILIK'=>$NAMA_PEMILIK,
						'NO_SURAT_TANAH'=>$NO_SURAT_TANAH,
						'BATAS_KIRI'=>$BATAS_KIRI,
						'BATAS_KANAN'=>$BATAS_KANAN,
						'BATAS_DEPAN'=>$BATAS_DEPAN,
						'BATAS_BELAKANG'=>$BATAS_BELAKANG,
						'TGL_PERMOHONAN'=>(($TGL_PERMOHONAN == null || $TGL_PERMOHONAN == "") ? (date("Y-m-d")) : ($TGL_PERMOHONAN)),
						'FUNGSI'=>$FUNGSI,
						'ALAMAT_BANGUNAN'=>$ALAMAT_BANGUNAN,
						'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
						'LUAS_PERSIL'=>$LUAS_PERSIL,
						'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
						'RETRIBUSI'=>$RETRIBUSI
						);
					}
					$result = $this->m_sktr->__insert($data, '', 'insertId');
					$data2 = array(
						'pemohon_nama'=>$pemohon_nama,
						'pemohon_alamat'=>$pemohon_alamat,
						'pemohon_telp'=>$pemohon_telp,
						'pemohon_user_id'=>$_SESSION['USERID']
					);
					// $result2 = $this->m_m_pemohon->__insert($data2, '', '');
					$sktr_keterangan = json_decode($this->input->post('KETERANGAN'));
					$syarat	= $this->m_sktr->getSyarat2();
					$i=0;
					foreach($syarat as $row){
						$datacek = array(
						"ID_IJIN"=>$result,
						"ID_SYARAT"=>$row["ID_SYARAT"],
						"KETERANGAN"=>$sktr_keterangan[$i]);
						$i++;
						$resultcek = $this->m_sktr->__insert($datacek, 'cek_list_sktr', 'insertId');
					}
			} else {
				if($pemohon_id != null || $pemohon_id != ""){
					$pemohon	= $pemohon_id;
				} else {
					$data = array(
						'pemohon_nama'=>$pemohon_nama,
						'pemohon_alamat'=>$pemohon_alamat,
						'pemohon_telp'=>$pemohon_telp,
						'pemohon_user_id'=>$_SESSION['USERID']
					);
					$pemohon= $this->m_m_pemohon->__insert($data, '', 'insertId');
				}
				if($JENIS_PERMOHONAN == 1){
					$data = array(
						'ID_PEMOHON'=>$pemohon,
						'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,				
						'HAK_MILIK'=>$HAK_MILIK,
						'NAMA_PEMILIK'=>$NAMA_PEMILIK,
						'NO_SURAT_TANAH'=>$NO_SURAT_TANAH,
						'BATAS_KIRI'=>$BATAS_KIRI,
						'BATAS_KANAN'=>$BATAS_KANAN,
						'BATAS_DEPAN'=>$BATAS_DEPAN,
						'BATAS_BELAKANG'=>$BATAS_BELAKANG,
						'TGL_PERMOHONAN'=>(($TGL_PERMOHONAN == null || $TGL_PERMOHONAN == "") ? (date("Y-m-d")) : ($TGL_PERMOHONAN)),
						'FUNGSI'=>$FUNGSI,
						'ALAMAT_BANGUNAN'=>$ALAMAT_BANGUNAN,
						'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
						'LUAS_PERSIL'=>$LUAS_PERSIL,
						'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
						'TGL_BERAKHIR'=>$TGL_BERAKHIR,
						'STATUS_SURVEY'=>$STATUS_SURVEY,
						'STATUS'=>$STATUS,
						);
					} else {
						$data = array(
						'ID_PEMOHON'=>$pemohon,
						'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,				
						'HAK_MILIK'=>$HAK_MILIK,
						'NAMA_PEMILIK'=>$NAMA_PEMILIK,
						'NO_SURAT_TANAH'=>$NO_SURAT_TANAH,
						'BATAS_KIRI'=>$BATAS_KIRI,
						'BATAS_KANAN'=>$BATAS_KANAN,
						'BATAS_DEPAN'=>$BATAS_DEPAN,
						'BATAS_BELAKANG'=>$BATAS_BELAKANG,
						'TGL_PERMOHONAN'=>(($TGL_PERMOHONAN == null || $TGL_PERMOHONAN == "") ? (date("Y-m-d")) : ($TGL_PERMOHONAN)),
						'FUNGSI'=>$FUNGSI,
						'ALAMAT_BANGUNAN'=>$ALAMAT_BANGUNAN,
						'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
						'LUAS_PERSIL'=>$LUAS_PERSIL,
						'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
						'TGL_BERAKHIR'=>$TGL_BERAKHIR,
						'STATUS_SURVEY'=>$STATUS_SURVEY,
						'STATUS'=>$STATUS,
						);
					}
					$result = $this->m_sktr->__insert($data, '', 'insertId');
					$data2 = array(
						'pemohon_nama'=>$pemohon_nama,
						'pemohon_alamat'=>$pemohon_alamat,
						'pemohon_telp'=>$pemohon_telp,
						'pemohon_user_id'=>$_SESSION['USERID']
					);
					// $result2 = $this->m_m_pemohon->__insert($data2, '', '');
					$sktr_keterangan = json_decode($this->input->post('KETERANGAN'));
					$syarat	= $this->m_sktr->getSyarat2();
					$i=0;
					foreach($syarat as $row){
						$datacek = array(
						"ID_IJIN"=>$result,
						"ID_SYARAT"=>$row["ID_SYARAT"],
						"KETERANGAN"=>$sktr_keterangan[$i]);
						$i++;
						$resultcek = $this->m_sktr->__insert($datacek, 'cek_list_sktr', 'insertId');
					}
			}
		}
		echo "success";
	}
	
	function update(){
		$ID_SKTR = htmlentities($this->input->post('ID_SKTR'),ENT_QUOTES);
		$ID_SKTR = is_numeric($ID_SKTR) ? $ID_SKTR : 0;
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		// $NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		$pemohon_nama = htmlentities($this->input->post('pemohon_nama'),ENT_QUOTES);
		$pemohon_alamat = htmlentities($this->input->post('pemohon_alamat'),ENT_QUOTES);
		$pemohon_telp = htmlentities($this->input->post('pemohon_telp'),ENT_QUOTES);
		$pemohon_id = htmlentities($this->input->post('pemohon_id'),ENT_QUOTES);
		
		$HAK_MILIK = htmlentities($this->input->post('HAK_MILIK'),ENT_QUOTES);
		$HAK_MILIK = is_numeric($HAK_MILIK) ? $HAK_MILIK : 0;
		$NAMA_PEMILIK = htmlentities($this->input->post('NAMA_PEMILIK'),ENT_QUOTES);
		$NO_SURAT_TANAH = htmlentities($this->input->post('NO_SURAT_TANAH'),ENT_QUOTES);
		$BATAS_KIRI = htmlentities($this->input->post('BATAS_KIRI'),ENT_QUOTES);
		$BATAS_KANAN = htmlentities($this->input->post('BATAS_KANAN'),ENT_QUOTES);
		$BATAS_DEPAN = htmlentities($this->input->post('BATAS_DEPAN'),ENT_QUOTES);
		$BATAS_BELAKANG = htmlentities($this->input->post('BATAS_BELAKANG'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$TGL_BERAKHIR = htmlentities($this->input->post('TGL_BERAKHIR'),ENT_QUOTES);
		$FUNGSI = htmlentities($this->input->post('FUNGSI'),ENT_QUOTES);
		$ALAMAT_BANGUNAN = htmlentities($this->input->post('ALAMAT_BANGUNAN'),ENT_QUOTES);
		$TINGGI_BANGUNAN = htmlentities($this->input->post('TINGGI_BANGUNAN'),ENT_QUOTES);
		$LUAS_PERSIL = htmlentities($this->input->post('LUAS_PERSIL'),ENT_QUOTES);
		$LUAS_BANGUNAN = htmlentities($this->input->post('LUAS_BANGUNAN'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
		$STATUS_SURVEY = htmlentities($this->input->post('STATUS_SURVEY'),ENT_QUOTES);
		$STATUS_SURVEY = is_numeric($STATUS_SURVEY) ? $STATUS_SURVEY : 0;
		$RETRIBUSI = htmlentities($this->input->post('RETRIBUSI'),ENT_QUOTES);
		$RETRIBUSI = is_numeric($RETRIBUSI) ? $RETRIBUSI : 0;
		$tr_updated_by = $this->m_sktr->__checkSession();
		$tr_updated_date = date('Y-m-d H:i:s');
		$pemohon	= $this->m_m_pemohon->get_by(array("pemohon_user_id"=>$_SESSION["USERID"]),FALSE,FALSE,TRUE);
		if($tr_updated_by == ''){
			$result = 'sessionExpired';
		}else{
			if($pemohon_id != null || $pemohon_id != ""){
				$pemohon	= $pemohon_id;
			} else {
				$data = array(
					'pemohon_nama'=>$pemohon_nama,
					'pemohon_alamat'=>$pemohon_alamat,
					'pemohon_telp'=>$pemohon_telp,
					'pemohon_user_id'=>$_SESSION['USERID']
				);
				$pemohon= $this->m_m_pemohon->__insert($data, '', 'insertId');
			}
			$data = array(
				'ID_PEMOHON'=>$pemohon,
				'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,				
				'HAK_MILIK'=>$HAK_MILIK,
				'NAMA_PEMILIK'=>$NAMA_PEMILIK,
				'NO_SURAT_TANAH'=>$NO_SURAT_TANAH,
				'BATAS_KIRI'=>$BATAS_KIRI,
				'BATAS_KANAN'=>$BATAS_KANAN,
				'BATAS_DEPAN'=>$BATAS_DEPAN,
				'BATAS_BELAKANG'=>$BATAS_BELAKANG,
				// 'TGL_PERMOHONAN'=>(($TGL_PERMOHONAN == null || $TGL_PERMOHONAN == "") ? (date("Y-m-d")) : ($TGL_PERMOHONAN)),
				'FUNGSI'=>$FUNGSI,
				'ALAMAT_BANGUNAN'=>$ALAMAT_BANGUNAN,
				'TINGGI_BANGUNAN'=>$TINGGI_BANGUNAN,
				'LUAS_PERSIL'=>$LUAS_PERSIL,
				'LUAS_BANGUNAN'=>$LUAS_BANGUNAN,
				'TGL_BERAKHIR'=>$TGL_BERAKHIR,
				'STATUS_SURVEY'=>$STATUS_SURVEY,
				'STATUS'=>$STATUS,
				'RETRIBUSI'=>$RETRIBUSI,
				);
			$result = $this->m_sktr->save($data, $ID_SKTR);
			$sktr_keterangan = json_decode($this->input->post('KETERANGAN'));
			$this->m_cek_list_sktr->delete($ID_SKTR);
			$syarat	= $this->m_sktr->getSyarat2();
			$i=0;
			foreach($syarat as $row){
				$datacek = array(
				"ID_IJIN"=>$result,
				"ID_SYARAT"=>$row["ID_SYARAT"],
				"KETERANGAN"=>$sktr_keterangan[$i]);
				$i++;
				$resultcek = $this->m_sktr->__insert($datacek, 'cek_list_sktr', 'insertId');
			}
		}
		echo "success";
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_sktr->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_SKTR_INTI = htmlentities($this->input->post('ID_SKTR_INTI'),ENT_QUOTES);
		$ID_SKTR_INTI = is_numeric($ID_SKTR_INTI) ? $ID_SKTR_INTI : 0;
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		// $NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		// $NO_TELP = htmlentities($this->input->post('NO_TELP'),ENT_QUOTES);
		$HAK_MILIK = htmlentities($this->input->post('HAK_MILIK'),ENT_QUOTES);
		$HAK_MILIK = is_numeric($HAK_MILIK) ? $HAK_MILIK : 0;
		$NAMA_PEMILIK = htmlentities($this->input->post('NAMA_PEMILIK'),ENT_QUOTES);
		$NO_SURAT_TANAH = htmlentities($this->input->post('NO_SURAT_TANAH'),ENT_QUOTES);
		$BATAS_KIRI = htmlentities($this->input->post('BATAS_KIRI'),ENT_QUOTES);
		$BATAS_KANAN = htmlentities($this->input->post('BATAS_KANAN'),ENT_QUOTES);
		$BATAS_DEPAN = htmlentities($this->input->post('BATAS_DEPAN'),ENT_QUOTES);
		$BATAS_BELAKANG = htmlentities($this->input->post('BATAS_BELAKANG'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
				
		$params = array(
			'ID_SKTR_INTI'=>$ID_SKTR_INTI,
			'ID_USER'=>$ID_USER,
			'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
			'NO_SK'=>$NO_SK,
			// 'NAMA_PEMOHON'=>$NAMA_PEMOHON,
			// 'NO_TELP'=>$NO_TELP,
			'HAK_MILIK'=>$HAK_MILIK,
			'NAMA_PEMILIK'=>$NAMA_PEMILIK,
			'NO_SURAT_TANAH'=>$NO_SURAT_TANAH,
			'BATAS_KIRI'=>$BATAS_KIRI,
			'BATAS_KANAN'=>$BATAS_KANAN,
			'BATAS_DEPAN'=>$BATAS_DEPAN,
			'BATAS_BELAKANG'=>$BATAS_BELAKANG,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'STATUS'=>$STATUS,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_sktr->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_SKTR_INTI = htmlentities($this->input->post('ID_SKTR_INTI'),ENT_QUOTES);
		$ID_SKTR_INTI = is_numeric($ID_SKTR_INTI) ? $ID_SKTR_INTI : 0;
		$ID_USER = htmlentities($this->input->post('ID_USER'),ENT_QUOTES);
		$ID_USER = is_numeric($ID_USER) ? $ID_USER : 0;
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
		$NO_SK = htmlentities($this->input->post('NO_SK'),ENT_QUOTES);
		// $NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		// $NO_TELP = htmlentities($this->input->post('NO_TELP'),ENT_QUOTES);
		$HAK_MILIK = htmlentities($this->input->post('HAK_MILIK'),ENT_QUOTES);
		$HAK_MILIK = is_numeric($HAK_MILIK) ? $HAK_MILIK : 0;
		$NAMA_PEMILIK = htmlentities($this->input->post('NAMA_PEMILIK'),ENT_QUOTES);
		$NO_SURAT_TANAH = htmlentities($this->input->post('NO_SURAT_TANAH'),ENT_QUOTES);
		$BATAS_KIRI = htmlentities($this->input->post('BATAS_KIRI'),ENT_QUOTES);
		$BATAS_KANAN = htmlentities($this->input->post('BATAS_KANAN'),ENT_QUOTES);
		$BATAS_DEPAN = htmlentities($this->input->post('BATAS_DEPAN'),ENT_QUOTES);
		$BATAS_BELAKANG = htmlentities($this->input->post('BATAS_BELAKANG'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$STATUS = htmlentities($this->input->post('STATUS'),ENT_QUOTES);
		$STATUS = is_numeric($STATUS) ? $STATUS : 0;
				
		$params = array(
			'searchText' => $searchText,
			'ID_SKTR_INTI'=>$ID_SKTR_INTI,
			'ID_USER'=>$ID_USER,
			'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
			'NO_SK'=>$NO_SK,
			// 'NAMA_PEMOHON'=>$NAMA_PEMOHON,
			// 'NO_TELP'=>$NO_TELP,
			'HAK_MILIK'=>$HAK_MILIK,
			'NAMA_PEMILIK'=>$NAMA_PEMILIK,
			'NO_SURAT_TANAH'=>$NO_SURAT_TANAH,
			'BATAS_KIRI'=>$BATAS_KIRI,
			'BATAS_KANAN'=>$BATAS_KANAN,
			'BATAS_DEPAN'=>$BATAS_DEPAN,
			'BATAS_BELAKANG'=>$BATAS_BELAKANG,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'STATUS'=>$STATUS,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_sktr->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_sktr.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/sktr_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/sktr_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function ubahProses(){
		$sktr_id  = $this->input->post('sktr_id');
		$no_sk  = $this->input->post('no_sk');
		$proses  = $this->input->post('proses');
		($proses == "Selesai, belum diambil") ? ($proses = 2) : (($proses == "Selesai, sudah diambil") ? ($proses = 1) : ($proses = 0));
		if (($no_sk == "" || $no_sk == NULL) && $proses != 0){
			($proses == 2 || $proses == 1) ? ($nosk = $this->m_public_function->getNomorSk("sktr")) : ($nosk = NULL);
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
		$result = $this->m_sktr->__update($data, $sktr_id, '', '','');
		echo $result;
	}
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$sktr_id = $this->input->post('sktr_id');
		// $idam_det_id = $this->input->post('idam_det_id');
		$params = array(
			"currentAction"=>$currentAction,
			"sktr_id"=>$sktr_id
			// "idam_det_id"=>$idam_det_id
		);
		$result = $this->m_sktr->getSyarat($params);
		echo $result;
	}
	function printBP(){
		$id_sktr  = $this->input->post('ID_SKTR');
		$this->load->model("m_master_ijin");
		$data["sktr"]	= $this->m_sktr->get_by(array("ID_SKTR"=>$id_sktr),FALSE,FALSE,TRUE);
		$data["ijin"]	= $this->m_master_ijin->get_by(array("ID_IJIN"=>10),FALSE,FALSE,TRUE);
		$print_view		= $this->load->view("template/sktr_bp",$data,true);
		$print_file=fopen('print/sktr_bp.html','w+');
		fwrite($print_file, $print_view);
	}
	function printSK(){
		$id_sktr  = $this->input->post('ID_SKTR');
		$this->load->model("m_master_ijin");
		$join	= array(array("table"=>"sktr","join_key"=>"ID_PEMOHON","join_table"=>"m_pemohon","join_key2"=>"pemohon_id"));
		$data["sktr"]	= $this->m_sktr->get_join_by($join,array("ID_SKTR"=>$id_sktr),TRUE,FALSE);
		$data["ijin"]	= $this->m_master_ijin->get_by(array("ID_IJIN"=>10),FALSE,FALSE,TRUE);
		$print_view		= $this->load->view("template/sktr_sk",$data,true);
		$print_file=fopen('print/sktr_sk.html','w+');
		fwrite($print_file, $print_view);
	}
	function printLK($id_sktr=FALSE){
		$ID_SKTR  = $this->input->post('ID_SKTR');
		// $params = array(
			// "sktr_id"=>$ID_SKTR,
			// "currentAction"=>'update',
		// );
		$join	= array(array("table"=>"sktr","join_key"=>"ID_PEMOHON","join_table"=>"m_pemohon","join_key2"=>"pemohon_id"));
		$printrecord = $this->m_sktr->get_join_by($join,array("ID_SKTR"=>$ID_SKTR),TRUE,FALSE);
		$dataceklist = $this->m_sktr->get_lk($ID_SKTR);
		$data['printrecord'] = $printrecord;
		$data['dataceklist'] = $dataceklist;
		$print_view=$this->load->view('template/sktr_lk',$data,TRUE);
		// $this->load->view('template/sktr_lk',$data);
		$print_file=fopen('print/sktr_lk.html','w+');
		fwrite($print_file, $print_view);
		// echo $ID_SKTR;
	}
}