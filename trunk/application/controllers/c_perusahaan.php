<?php
class C_perusahaan extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_perusahaan');
	}
	
	function index(){
		$this->load->view('main/v_perusahaan');
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
		$result = $this->m_perusahaan->getList($params);
		echo $result;
	}
	
	function create(){
		$id = htmlentities($this->input->post('id'),ENT_QUOTES);
		$id = is_numeric($id) ? $id : 0;
		$npwp = htmlentities($this->input->post('npwp'),ENT_QUOTES);
		$nama = htmlentities($this->input->post('nama'),ENT_QUOTES);
		$noakta = htmlentities($this->input->post('noakta'),ENT_QUOTES);
		$notaris = htmlentities($this->input->post('notaris'),ENT_QUOTES);
		$tglakta = htmlentities($this->input->post('tglakta'),ENT_QUOTES);
		$bentuk_id = htmlentities($this->input->post('bentuk_id'),ENT_QUOTES);
		$kualifikasi_id = htmlentities($this->input->post('kualifikasi_id'),ENT_QUOTES);
		$alamat = htmlentities($this->input->post('alamat'),ENT_QUOTES);
		$rt = htmlentities($this->input->post('rt'),ENT_QUOTES);
		$rw = htmlentities($this->input->post('rw'),ENT_QUOTES);
		$propinsi_id = htmlentities($this->input->post('propinsi_id'),ENT_QUOTES);
		$propinsi_id = is_numeric($propinsi_id) ? $propinsi_id : 0;
		$kabkota_id = htmlentities($this->input->post('kabkota_id'),ENT_QUOTES);
		$kabkota_id = is_numeric($kabkota_id) ? $kabkota_id : 0;
		$kecamatan_id = htmlentities($this->input->post('kecamatan_id'),ENT_QUOTES);
		$kecamatan_id = is_numeric($kecamatan_id) ? $kecamatan_id : 0;
		$desa_id = htmlentities($this->input->post('desa_id'),ENT_QUOTES);
		$desa_id = is_numeric($desa_id) ? $desa_id : 0;
		$kodepos = htmlentities($this->input->post('kodepos'),ENT_QUOTES);
		$telp = htmlentities($this->input->post('telp'),ENT_QUOTES);
		$fax = htmlentities($this->input->post('fax'),ENT_QUOTES);
		$stempat_id = htmlentities($this->input->post('stempat_id'),ENT_QUOTES);
		$sperusahaan_id = htmlentities($this->input->post('sperusahaan_id'),ENT_QUOTES);
		$usaha = htmlentities($this->input->post('usaha'),ENT_QUOTES);
		$butara = htmlentities($this->input->post('butara'),ENT_QUOTES);
		$bselatan = htmlentities($this->input->post('bselatan'),ENT_QUOTES);
		$btimur = htmlentities($this->input->post('btimur'),ENT_QUOTES);
		$bbarat = htmlentities($this->input->post('bbarat'),ENT_QUOTES);
		$modal = htmlentities($this->input->post('modal'),ENT_QUOTES);
		$merk = htmlentities($this->input->post('merk'),ENT_QUOTES);
		$jusaha_id = htmlentities($this->input->post('jusaha_id'),ENT_QUOTES);
		$jusaha_id = is_numeric($jusaha_id) ? $jusaha_id : 0;
		$sdata = htmlentities($this->input->post('sdata'),ENT_QUOTES);
				
		$rusahaan_author = $this->m_perusahaan->__checkSession();
		$rusahaan_created_date = date('Y-m-d H:i:s');
		
		if($rusahaan_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'id'=>$id,
				'npwp'=>$npwp,
				'nama'=>$nama,
				'noakta'=>$noakta,
				'notaris'=>$notaris,
				'tglakta'=>$tglakta,
				'bentuk_id'=>$bentuk_id,
				'kualifikasi_id'=>$kualifikasi_id,
				'alamat'=>$alamat,
				'rt'=>$rt,
				'rw'=>$rw,
				'propinsi_id'=>$propinsi_id,
				'kabkota_id'=>$kabkota_id,
				'kecamatan_id'=>$kecamatan_id,
				'desa_id'=>$desa_id,
				'kodepos'=>$kodepos,
				'telp'=>$telp,
				'fax'=>$fax,
				'stempat_id'=>$stempat_id,
				'sperusahaan_id'=>$sperusahaan_id,
				'usaha'=>$usaha,
				'butara'=>$butara,
				'bselatan'=>$bselatan,
				'btimur'=>$btimur,
				'bbarat'=>$bbarat,
				'modal'=>$modal,
				'merk'=>$merk,
				'jusaha_id'=>$jusaha_id,
				'sdata'=>$sdata,
				);
			$result = $this->m_perusahaan->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$id = htmlentities($this->input->post('id'),ENT_QUOTES);
		$id = is_numeric($id) ? $id : 0;
		$npwp = htmlentities($this->input->post('npwp'),ENT_QUOTES);
		$nama = htmlentities($this->input->post('nama'),ENT_QUOTES);
		$noakta = htmlentities($this->input->post('noakta'),ENT_QUOTES);
		$notaris = htmlentities($this->input->post('notaris'),ENT_QUOTES);
		$tglakta = htmlentities($this->input->post('tglakta'),ENT_QUOTES);
		$bentuk_id = htmlentities($this->input->post('bentuk_id'),ENT_QUOTES);
		$kualifikasi_id = htmlentities($this->input->post('kualifikasi_id'),ENT_QUOTES);
		$alamat = htmlentities($this->input->post('alamat'),ENT_QUOTES);
		$rt = htmlentities($this->input->post('rt'),ENT_QUOTES);
		$rw = htmlentities($this->input->post('rw'),ENT_QUOTES);
		$propinsi_id = htmlentities($this->input->post('propinsi_id'),ENT_QUOTES);
		$propinsi_id = is_numeric($propinsi_id) ? $propinsi_id : 0;
		$kabkota_id = htmlentities($this->input->post('kabkota_id'),ENT_QUOTES);
		$kabkota_id = is_numeric($kabkota_id) ? $kabkota_id : 0;
		$kecamatan_id = htmlentities($this->input->post('kecamatan_id'),ENT_QUOTES);
		$kecamatan_id = is_numeric($kecamatan_id) ? $kecamatan_id : 0;
		$desa_id = htmlentities($this->input->post('desa_id'),ENT_QUOTES);
		$desa_id = is_numeric($desa_id) ? $desa_id : 0;
		$kodepos = htmlentities($this->input->post('kodepos'),ENT_QUOTES);
		$telp = htmlentities($this->input->post('telp'),ENT_QUOTES);
		$fax = htmlentities($this->input->post('fax'),ENT_QUOTES);
		$stempat_id = htmlentities($this->input->post('stempat_id'),ENT_QUOTES);
		$sperusahaan_id = htmlentities($this->input->post('sperusahaan_id'),ENT_QUOTES);
		$usaha = htmlentities($this->input->post('usaha'),ENT_QUOTES);
		$butara = htmlentities($this->input->post('butara'),ENT_QUOTES);
		$bselatan = htmlentities($this->input->post('bselatan'),ENT_QUOTES);
		$btimur = htmlentities($this->input->post('btimur'),ENT_QUOTES);
		$bbarat = htmlentities($this->input->post('bbarat'),ENT_QUOTES);
		$modal = htmlentities($this->input->post('modal'),ENT_QUOTES);
		$merk = htmlentities($this->input->post('merk'),ENT_QUOTES);
		$jusaha_id = htmlentities($this->input->post('jusaha_id'),ENT_QUOTES);
		$jusaha_id = is_numeric($jusaha_id) ? $jusaha_id : 0;
		$sdata = htmlentities($this->input->post('sdata'),ENT_QUOTES);
				
		$rusahaan_updated_by = $this->m_perusahaan->__checkSession();
		$rusahaan_updated_date = date('Y-m-d H:i:s');
		
		if($rusahaan_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'npwp'=>$npwp,
				'nama'=>$nama,
				'noakta'=>$noakta,
				'notaris'=>$notaris,
				'tglakta'=>$tglakta,
				'bentuk_id'=>$bentuk_id,
				'kualifikasi_id'=>$kualifikasi_id,
				'alamat'=>$alamat,
				'rt'=>$rt,
				'rw'=>$rw,
				'propinsi_id'=>$propinsi_id,
				'kabkota_id'=>$kabkota_id,
				'kecamatan_id'=>$kecamatan_id,
				'desa_id'=>$desa_id,
				'kodepos'=>$kodepos,
				'telp'=>$telp,
				'fax'=>$fax,
				'stempat_id'=>$stempat_id,
				'sperusahaan_id'=>$sperusahaan_id,
				'usaha'=>$usaha,
				'butara'=>$butara,
				'bselatan'=>$bselatan,
				'btimur'=>$btimur,
				'bbarat'=>$bbarat,
				'modal'=>$modal,
				'merk'=>$merk,
				'jusaha_id'=>$jusaha_id,
				'sdata'=>$sdata,
				);
			$result = $this->m_perusahaan->__update($data, $id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_perusahaan->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$npwp = htmlentities($this->input->post('npwp'),ENT_QUOTES);
		$nama = htmlentities($this->input->post('nama'),ENT_QUOTES);
		$noakta = htmlentities($this->input->post('noakta'),ENT_QUOTES);
		$notaris = htmlentities($this->input->post('notaris'),ENT_QUOTES);
		$tglakta = htmlentities($this->input->post('tglakta'),ENT_QUOTES);
		$bentuk_id = htmlentities($this->input->post('bentuk_id'),ENT_QUOTES);
		$kualifikasi_id = htmlentities($this->input->post('kualifikasi_id'),ENT_QUOTES);
		$alamat = htmlentities($this->input->post('alamat'),ENT_QUOTES);
		$rt = htmlentities($this->input->post('rt'),ENT_QUOTES);
		$rw = htmlentities($this->input->post('rw'),ENT_QUOTES);
		$propinsi_id = htmlentities($this->input->post('propinsi_id'),ENT_QUOTES);
		$propinsi_id = is_numeric($propinsi_id) ? $propinsi_id : 0;
		$kabkota_id = htmlentities($this->input->post('kabkota_id'),ENT_QUOTES);
		$kabkota_id = is_numeric($kabkota_id) ? $kabkota_id : 0;
		$kecamatan_id = htmlentities($this->input->post('kecamatan_id'),ENT_QUOTES);
		$kecamatan_id = is_numeric($kecamatan_id) ? $kecamatan_id : 0;
		$desa_id = htmlentities($this->input->post('desa_id'),ENT_QUOTES);
		$desa_id = is_numeric($desa_id) ? $desa_id : 0;
		$kodepos = htmlentities($this->input->post('kodepos'),ENT_QUOTES);
		$telp = htmlentities($this->input->post('telp'),ENT_QUOTES);
		$fax = htmlentities($this->input->post('fax'),ENT_QUOTES);
		$stempat_id = htmlentities($this->input->post('stempat_id'),ENT_QUOTES);
		$sperusahaan_id = htmlentities($this->input->post('sperusahaan_id'),ENT_QUOTES);
		$usaha = htmlentities($this->input->post('usaha'),ENT_QUOTES);
		$butara = htmlentities($this->input->post('butara'),ENT_QUOTES);
		$bselatan = htmlentities($this->input->post('bselatan'),ENT_QUOTES);
		$btimur = htmlentities($this->input->post('btimur'),ENT_QUOTES);
		$bbarat = htmlentities($this->input->post('bbarat'),ENT_QUOTES);
		$modal = htmlentities($this->input->post('modal'),ENT_QUOTES);
		$merk = htmlentities($this->input->post('merk'),ENT_QUOTES);
		$jusaha_id = htmlentities($this->input->post('jusaha_id'),ENT_QUOTES);
		$jusaha_id = is_numeric($jusaha_id) ? $jusaha_id : 0;
		$sdata = htmlentities($this->input->post('sdata'),ENT_QUOTES);
				
		$params = array(
			'npwp'=>$npwp,
			'nama'=>$nama,
			'noakta'=>$noakta,
			'notaris'=>$notaris,
			'tglakta'=>$tglakta,
			'bentuk_id'=>$bentuk_id,
			'kualifikasi_id'=>$kualifikasi_id,
			'alamat'=>$alamat,
			'rt'=>$rt,
			'rw'=>$rw,
			'propinsi_id'=>$propinsi_id,
			'kabkota_id'=>$kabkota_id,
			'kecamatan_id'=>$kecamatan_id,
			'desa_id'=>$desa_id,
			'kodepos'=>$kodepos,
			'telp'=>$telp,
			'fax'=>$fax,
			'stempat_id'=>$stempat_id,
			'sperusahaan_id'=>$sperusahaan_id,
			'usaha'=>$usaha,
			'butara'=>$butara,
			'bselatan'=>$bselatan,
			'btimur'=>$btimur,
			'bbarat'=>$bbarat,
			'modal'=>$modal,
			'merk'=>$merk,
			'jusaha_id'=>$jusaha_id,
			'sdata'=>$sdata,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_perusahaan->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$npwp = htmlentities($this->input->post('npwp'),ENT_QUOTES);
		$nama = htmlentities($this->input->post('nama'),ENT_QUOTES);
		$noakta = htmlentities($this->input->post('noakta'),ENT_QUOTES);
		$notaris = htmlentities($this->input->post('notaris'),ENT_QUOTES);
		$tglakta = htmlentities($this->input->post('tglakta'),ENT_QUOTES);
		$bentuk_id = htmlentities($this->input->post('bentuk_id'),ENT_QUOTES);
		$kualifikasi_id = htmlentities($this->input->post('kualifikasi_id'),ENT_QUOTES);
		$alamat = htmlentities($this->input->post('alamat'),ENT_QUOTES);
		$rt = htmlentities($this->input->post('rt'),ENT_QUOTES);
		$rw = htmlentities($this->input->post('rw'),ENT_QUOTES);
		$propinsi_id = htmlentities($this->input->post('propinsi_id'),ENT_QUOTES);
		$propinsi_id = is_numeric($propinsi_id) ? $propinsi_id : 0;
		$kabkota_id = htmlentities($this->input->post('kabkota_id'),ENT_QUOTES);
		$kabkota_id = is_numeric($kabkota_id) ? $kabkota_id : 0;
		$kecamatan_id = htmlentities($this->input->post('kecamatan_id'),ENT_QUOTES);
		$kecamatan_id = is_numeric($kecamatan_id) ? $kecamatan_id : 0;
		$desa_id = htmlentities($this->input->post('desa_id'),ENT_QUOTES);
		$desa_id = is_numeric($desa_id) ? $desa_id : 0;
		$kodepos = htmlentities($this->input->post('kodepos'),ENT_QUOTES);
		$telp = htmlentities($this->input->post('telp'),ENT_QUOTES);
		$fax = htmlentities($this->input->post('fax'),ENT_QUOTES);
		$stempat_id = htmlentities($this->input->post('stempat_id'),ENT_QUOTES);
		$sperusahaan_id = htmlentities($this->input->post('sperusahaan_id'),ENT_QUOTES);
		$usaha = htmlentities($this->input->post('usaha'),ENT_QUOTES);
		$butara = htmlentities($this->input->post('butara'),ENT_QUOTES);
		$bselatan = htmlentities($this->input->post('bselatan'),ENT_QUOTES);
		$btimur = htmlentities($this->input->post('btimur'),ENT_QUOTES);
		$bbarat = htmlentities($this->input->post('bbarat'),ENT_QUOTES);
		$modal = htmlentities($this->input->post('modal'),ENT_QUOTES);
		$merk = htmlentities($this->input->post('merk'),ENT_QUOTES);
		$jusaha_id = htmlentities($this->input->post('jusaha_id'),ENT_QUOTES);
		$jusaha_id = is_numeric($jusaha_id) ? $jusaha_id : 0;
		$sdata = htmlentities($this->input->post('sdata'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'npwp'=>$npwp,
			'nama'=>$nama,
			'noakta'=>$noakta,
			'notaris'=>$notaris,
			'tglakta'=>$tglakta,
			'bentuk_id'=>$bentuk_id,
			'kualifikasi_id'=>$kualifikasi_id,
			'alamat'=>$alamat,
			'rt'=>$rt,
			'rw'=>$rw,
			'propinsi_id'=>$propinsi_id,
			'kabkota_id'=>$kabkota_id,
			'kecamatan_id'=>$kecamatan_id,
			'desa_id'=>$desa_id,
			'kodepos'=>$kodepos,
			'telp'=>$telp,
			'fax'=>$fax,
			'stempat_id'=>$stempat_id,
			'sperusahaan_id'=>$sperusahaan_id,
			'usaha'=>$usaha,
			'butara'=>$butara,
			'bselatan'=>$bselatan,
			'btimur'=>$btimur,
			'bbarat'=>$bbarat,
			'modal'=>$modal,
			'merk'=>$merk,
			'jusaha_id'=>$jusaha_id,
			'sdata'=>$sdata,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_perusahaan->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_perusahaan.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/perusahaan_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/perusahaan_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}