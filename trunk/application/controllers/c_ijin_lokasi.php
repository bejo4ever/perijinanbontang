<?php
class C_ijin_lokasi extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_ijin_lokasi');
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
				
		$in_lokasi_author = $this->m_ijin_lokasi->__checkSession();
		$in_lokasi_created_date = date('Y-m-d H:i:s');
		
		if($in_lokasi_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'ID_IJIN_LOKASI'=>$ID_IJIN_LOKASI,
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
				);
			$result = $this->m_ijin_lokasi->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$ID_IJIN_LOKASI = htmlentities($this->input->post('ID_IJIN_LOKASI'),ENT_QUOTES);
		$ID_IJIN_LOKASI = is_numeric($ID_IJIN_LOKASI) ? $ID_IJIN_LOKASI : 0;
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
				
		$in_lokasi_updated_by = $this->m_ijin_lokasi->__checkSession();
		$in_lokasi_updated_date = date('Y-m-d H:i:s');
		
		if($in_lokasi_updated_by != ''){
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
				);
			$result = $this->m_ijin_lokasi->__update($data, $ID_IJIN_LOKASI, '', '');
		}
		echo $result;
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
	
}