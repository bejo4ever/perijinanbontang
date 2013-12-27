<?php
class C_m_pemohon extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_m_pemohon');
	}
	
	function index(){
		$this->load->view('main/v_m_pemohon');
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
		$result = $this->m_m_pemohon->getList($params);
		echo $result;
	}
	
	function create(){
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
				
		$pemohon_author = $this->m_m_pemohon->__checkSession();
		$pemohon_created_date = date('Y-m-d H:i:s');
		
		if($pemohon_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'pemohon_id'=>$pemohon_id,
				'pemohon_nama'=>$pemohon_nama,
				'pemohon_alamat'=>$pemohon_alamat,
				'pemohon_telp'=>$pemohon_telp,
				'pemohon_npwp'=>$pemohon_npwp,
				'pemohon_rt'=>$pemohon_rt,
				'pemohon_rw'=>$pemohon_rw,
				'pemohon_kel'=>$pemohon_kel,
				'pemohon_kec'=>$pemohon_kec,
				'pemohon_kota'=>$pemohon_kota,
				'pemohon_nik'=>$pemohon_nik,
				'pemohon_stra'=>$pemohon_stra,
				'pemohon_surattugas'=>$pemohon_surattugas,
				'pemohon_pekerjaan'=>$pemohon_pekerjaan,
				'pemohon_tempatlahir'=>$pemohon_tempatlahir,
				'pemohon_tanggallahir'=>$pemohon_tanggallahir,
				'pemohon_user_id'=>$pemohon_user_id,
				'pemohon_pendidikan'=>$pemohon_pendidikan,
				'pemohon_tahunlulus'=>$pemohon_tahunlulus,
				'pemohon_wn'=>$pemohon_wn,
				'pemohon_hp'=>$pemohon_hp,
				);
			$result = $this->m_m_pemohon->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
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
				
		$pemohon_updated_by = $this->m_m_pemohon->__checkSession();
		$pemohon_updated_date = date('Y-m-d H:i:s');
		
		if($pemohon_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'pemohon_nama'=>$pemohon_nama,
				'pemohon_alamat'=>$pemohon_alamat,
				'pemohon_telp'=>$pemohon_telp,
				'pemohon_npwp'=>$pemohon_npwp,
				'pemohon_rt'=>$pemohon_rt,
				'pemohon_rw'=>$pemohon_rw,
				'pemohon_kel'=>$pemohon_kel,
				'pemohon_kec'=>$pemohon_kec,
				'pemohon_kota'=>$pemohon_kota,
				'pemohon_nik'=>$pemohon_nik,
				'pemohon_stra'=>$pemohon_stra,
				'pemohon_surattugas'=>$pemohon_surattugas,
				'pemohon_pekerjaan'=>$pemohon_pekerjaan,
				'pemohon_tempatlahir'=>$pemohon_tempatlahir,
				'pemohon_tanggallahir'=>$pemohon_tanggallahir,
				'pemohon_user_id'=>$pemohon_user_id,
				'pemohon_pendidikan'=>$pemohon_pendidikan,
				'pemohon_tahunlulus'=>$pemohon_tahunlulus,
				'pemohon_wn'=>$pemohon_wn,
				'pemohon_hp'=>$pemohon_hp,
				);
			$result = $this->m_m_pemohon->__update($data, $pemohon_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_m_pemohon->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
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
				
		$params = array(
			'pemohon_nama'=>$pemohon_nama,
			'pemohon_alamat'=>$pemohon_alamat,
			'pemohon_telp'=>$pemohon_telp,
			'pemohon_npwp'=>$pemohon_npwp,
			'pemohon_rt'=>$pemohon_rt,
			'pemohon_rw'=>$pemohon_rw,
			'pemohon_kel'=>$pemohon_kel,
			'pemohon_kec'=>$pemohon_kec,
			'pemohon_kota'=>$pemohon_kota,
			'pemohon_nik'=>$pemohon_nik,
			'pemohon_stra'=>$pemohon_stra,
			'pemohon_surattugas'=>$pemohon_surattugas,
			'pemohon_pekerjaan'=>$pemohon_pekerjaan,
			'pemohon_tempatlahir'=>$pemohon_tempatlahir,
			'pemohon_tanggallahir'=>$pemohon_tanggallahir,
			'pemohon_user_id'=>$pemohon_user_id,
			'pemohon_pendidikan'=>$pemohon_pendidikan,
			'pemohon_tahunlulus'=>$pemohon_tahunlulus,
			'pemohon_wn'=>$pemohon_wn,
			'pemohon_hp'=>$pemohon_hp,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_m_pemohon->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
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
				
		$params = array(
			'searchText' => $searchText,
			'pemohon_nama'=>$pemohon_nama,
			'pemohon_alamat'=>$pemohon_alamat,
			'pemohon_telp'=>$pemohon_telp,
			'pemohon_npwp'=>$pemohon_npwp,
			'pemohon_rt'=>$pemohon_rt,
			'pemohon_rw'=>$pemohon_rw,
			'pemohon_kel'=>$pemohon_kel,
			'pemohon_kec'=>$pemohon_kec,
			'pemohon_kota'=>$pemohon_kota,
			'pemohon_nik'=>$pemohon_nik,
			'pemohon_stra'=>$pemohon_stra,
			'pemohon_surattugas'=>$pemohon_surattugas,
			'pemohon_pekerjaan'=>$pemohon_pekerjaan,
			'pemohon_tempatlahir'=>$pemohon_tempatlahir,
			'pemohon_tanggallahir'=>$pemohon_tanggallahir,
			'pemohon_user_id'=>$pemohon_user_id,
			'pemohon_pendidikan'=>$pemohon_pendidikan,
			'pemohon_tahunlulus'=>$pemohon_tahunlulus,
			'pemohon_wn'=>$pemohon_wn,
			'pemohon_hp'=>$pemohon_hp,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_m_pemohon->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_m_pemohon.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/m_pemohon_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/m_pemohon_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}