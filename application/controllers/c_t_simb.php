<?php
class C_t_simb extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_simb');
	}
	
	function index(){
		$this->load->view('main/v_t_simb');
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
		$result = $this->m_t_simb->getList($params);
		echo $result;
	}
	
	function create(){
		$simb_id = htmlentities($this->input->post('simb_id'),ENT_QUOTES);
		$simb_id = is_numeric($simb_id) ? $simb_id : 0;
		$simb_per_npwp = htmlentities($this->input->post('simb_per_npwp'),ENT_QUOTES);
		$simb_per_nama = htmlentities($this->input->post('simb_per_nama'),ENT_QUOTES);
		$simb_per_akta = htmlentities($this->input->post('simb_per_akta'),ENT_QUOTES);
		$simb_per_bentuk = htmlentities($this->input->post('simb_per_bentuk'),ENT_QUOTES);
		$simb_per_bentuk = is_numeric($simb_per_bentuk) ? $simb_per_bentuk : 0;
		$simb_per_alamat = htmlentities($this->input->post('simb_per_alamat'),ENT_QUOTES);
		$simb_per_kel = htmlentities($this->input->post('simb_per_kel'),ENT_QUOTES);
		$simb_per_kec = htmlentities($this->input->post('simb_per_kec'),ENT_QUOTES);
		$simb_per_kota = htmlentities($this->input->post('simb_per_kota'),ENT_QUOTES);
		$simb_per_telp = htmlentities($this->input->post('simb_per_telp'),ENT_QUOTES);
		$simb_jenis = htmlentities($this->input->post('simb_jenis'),ENT_QUOTES);
		$simb_status = htmlentities($this->input->post('simb_status'),ENT_QUOTES);
		$simb_status = is_numeric($simb_status) ? $simb_status : 0;
		$simb_jenisusaha = htmlentities($this->input->post('simb_jenisusaha'),ENT_QUOTES);
		$simb_panjang = htmlentities($this->input->post('simb_panjang'),ENT_QUOTES);
		$simb_panjang = is_numeric($simb_panjang) ? $simb_panjang : 0;
		$simb_lebar = htmlentities($this->input->post('simb_lebar'),ENT_QUOTES);
		$simb_lebar = is_numeric($simb_lebar) ? $simb_lebar : 0;
		$simb_alamat = htmlentities($this->input->post('simb_alamat'),ENT_QUOTES);
		$simb_kel = htmlentities($this->input->post('simb_kel'),ENT_QUOTES);
		$simb_kec = htmlentities($this->input->post('simb_kec'),ENT_QUOTES);
		$simb_bentuk = htmlentities($this->input->post('simb_bentuk'),ENT_QUOTES);
		$simb_bentuk = is_numeric($simb_bentuk) ? $simb_bentuk : 0;
		$simb_lokasi = htmlentities($this->input->post('simb_lokasi'),ENT_QUOTES);
		$simb_lokasi = is_numeric($simb_lokasi) ? $simb_lokasi : 0;
		$simb_gangguan = htmlentities($this->input->post('simb_gangguan'),ENT_QUOTES);
		$simb_gangguan = is_numeric($simb_gangguan) ? $simb_gangguan : 0;
		$simb_batasutara = htmlentities($this->input->post('simb_batasutara'),ENT_QUOTES);
		$simb_batastimur = htmlentities($this->input->post('simb_batastimur'),ENT_QUOTES);
		$simb_batasselatan = htmlentities($this->input->post('simb_batasselatan'),ENT_QUOTES);
		$simb_batasbarat = htmlentities($this->input->post('simb_batasbarat'),ENT_QUOTES);
				
		$simb_author = $this->m_t_simb->__checkSession();
		$simb_created_date = date('Y-m-d H:i:s');
		
		if($simb_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'simb_id'=>$simb_id,
				'simb_per_npwp'=>$simb_per_npwp,
				'simb_per_nama'=>$simb_per_nama,
				'simb_per_akta'=>$simb_per_akta,
				'simb_per_bentuk'=>$simb_per_bentuk,
				'simb_per_alamat'=>$simb_per_alamat,
				'simb_per_kel'=>$simb_per_kel,
				'simb_per_kec'=>$simb_per_kec,
				'simb_per_kota'=>$simb_per_kota,
				'simb_per_telp'=>$simb_per_telp,
				'simb_jenis'=>$simb_jenis,
				'simb_status'=>$simb_status,
				'simb_jenisusaha'=>$simb_jenisusaha,
				'simb_panjang'=>$simb_panjang,
				'simb_lebar'=>$simb_lebar,
				'simb_alamat'=>$simb_alamat,
				'simb_kel'=>$simb_kel,
				'simb_kec'=>$simb_kec,
				'simb_bentuk'=>$simb_bentuk,
				'simb_lokasi'=>$simb_lokasi,
				'simb_gangguan'=>$simb_gangguan,
				'simb_batasutara'=>$simb_batasutara,
				'simb_batastimur'=>$simb_batastimur,
				'simb_batasselatan'=>$simb_batasselatan,
				'simb_batasbarat'=>$simb_batasbarat,
				);
			$result = $this->m_t_simb->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$simb_id = htmlentities($this->input->post('simb_id'),ENT_QUOTES);
		$simb_id = is_numeric($simb_id) ? $simb_id : 0;
		$simb_per_npwp = htmlentities($this->input->post('simb_per_npwp'),ENT_QUOTES);
		$simb_per_nama = htmlentities($this->input->post('simb_per_nama'),ENT_QUOTES);
		$simb_per_akta = htmlentities($this->input->post('simb_per_akta'),ENT_QUOTES);
		$simb_per_bentuk = htmlentities($this->input->post('simb_per_bentuk'),ENT_QUOTES);
		$simb_per_bentuk = is_numeric($simb_per_bentuk) ? $simb_per_bentuk : 0;
		$simb_per_alamat = htmlentities($this->input->post('simb_per_alamat'),ENT_QUOTES);
		$simb_per_kel = htmlentities($this->input->post('simb_per_kel'),ENT_QUOTES);
		$simb_per_kec = htmlentities($this->input->post('simb_per_kec'),ENT_QUOTES);
		$simb_per_kota = htmlentities($this->input->post('simb_per_kota'),ENT_QUOTES);
		$simb_per_telp = htmlentities($this->input->post('simb_per_telp'),ENT_QUOTES);
		$simb_jenis = htmlentities($this->input->post('simb_jenis'),ENT_QUOTES);
		$simb_status = htmlentities($this->input->post('simb_status'),ENT_QUOTES);
		$simb_status = is_numeric($simb_status) ? $simb_status : 0;
		$simb_jenisusaha = htmlentities($this->input->post('simb_jenisusaha'),ENT_QUOTES);
		$simb_panjang = htmlentities($this->input->post('simb_panjang'),ENT_QUOTES);
		$simb_panjang = is_numeric($simb_panjang) ? $simb_panjang : 0;
		$simb_lebar = htmlentities($this->input->post('simb_lebar'),ENT_QUOTES);
		$simb_lebar = is_numeric($simb_lebar) ? $simb_lebar : 0;
		$simb_alamat = htmlentities($this->input->post('simb_alamat'),ENT_QUOTES);
		$simb_kel = htmlentities($this->input->post('simb_kel'),ENT_QUOTES);
		$simb_kec = htmlentities($this->input->post('simb_kec'),ENT_QUOTES);
		$simb_bentuk = htmlentities($this->input->post('simb_bentuk'),ENT_QUOTES);
		$simb_bentuk = is_numeric($simb_bentuk) ? $simb_bentuk : 0;
		$simb_lokasi = htmlentities($this->input->post('simb_lokasi'),ENT_QUOTES);
		$simb_lokasi = is_numeric($simb_lokasi) ? $simb_lokasi : 0;
		$simb_gangguan = htmlentities($this->input->post('simb_gangguan'),ENT_QUOTES);
		$simb_gangguan = is_numeric($simb_gangguan) ? $simb_gangguan : 0;
		$simb_batasutara = htmlentities($this->input->post('simb_batasutara'),ENT_QUOTES);
		$simb_batastimur = htmlentities($this->input->post('simb_batastimur'),ENT_QUOTES);
		$simb_batasselatan = htmlentities($this->input->post('simb_batasselatan'),ENT_QUOTES);
		$simb_batasbarat = htmlentities($this->input->post('simb_batasbarat'),ENT_QUOTES);
				
		$simb_updated_by = $this->m_t_simb->__checkSession();
		$simb_updated_date = date('Y-m-d H:i:s');
		
		if($simb_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'simb_per_npwp'=>$simb_per_npwp,
				'simb_per_nama'=>$simb_per_nama,
				'simb_per_akta'=>$simb_per_akta,
				'simb_per_bentuk'=>$simb_per_bentuk,
				'simb_per_alamat'=>$simb_per_alamat,
				'simb_per_kel'=>$simb_per_kel,
				'simb_per_kec'=>$simb_per_kec,
				'simb_per_kota'=>$simb_per_kota,
				'simb_per_telp'=>$simb_per_telp,
				'simb_jenis'=>$simb_jenis,
				'simb_status'=>$simb_status,
				'simb_jenisusaha'=>$simb_jenisusaha,
				'simb_panjang'=>$simb_panjang,
				'simb_lebar'=>$simb_lebar,
				'simb_alamat'=>$simb_alamat,
				'simb_kel'=>$simb_kel,
				'simb_kec'=>$simb_kec,
				'simb_bentuk'=>$simb_bentuk,
				'simb_lokasi'=>$simb_lokasi,
				'simb_gangguan'=>$simb_gangguan,
				'simb_batasutara'=>$simb_batasutara,
				'simb_batastimur'=>$simb_batastimur,
				'simb_batasselatan'=>$simb_batasselatan,
				'simb_batasbarat'=>$simb_batasbarat,
				);
			$result = $this->m_t_simb->__update($data, $simb_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_simb->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$simb_per_npwp = htmlentities($this->input->post('simb_per_npwp'),ENT_QUOTES);
		$simb_per_nama = htmlentities($this->input->post('simb_per_nama'),ENT_QUOTES);
		$simb_per_akta = htmlentities($this->input->post('simb_per_akta'),ENT_QUOTES);
		$simb_per_bentuk = htmlentities($this->input->post('simb_per_bentuk'),ENT_QUOTES);
		$simb_per_bentuk = is_numeric($simb_per_bentuk) ? $simb_per_bentuk : 0;
		$simb_per_alamat = htmlentities($this->input->post('simb_per_alamat'),ENT_QUOTES);
		$simb_per_kel = htmlentities($this->input->post('simb_per_kel'),ENT_QUOTES);
		$simb_per_kec = htmlentities($this->input->post('simb_per_kec'),ENT_QUOTES);
		$simb_per_kota = htmlentities($this->input->post('simb_per_kota'),ENT_QUOTES);
		$simb_per_telp = htmlentities($this->input->post('simb_per_telp'),ENT_QUOTES);
		$simb_jenis = htmlentities($this->input->post('simb_jenis'),ENT_QUOTES);
		$simb_status = htmlentities($this->input->post('simb_status'),ENT_QUOTES);
		$simb_status = is_numeric($simb_status) ? $simb_status : 0;
		$simb_jenisusaha = htmlentities($this->input->post('simb_jenisusaha'),ENT_QUOTES);
		$simb_panjang = htmlentities($this->input->post('simb_panjang'),ENT_QUOTES);
		$simb_panjang = is_numeric($simb_panjang) ? $simb_panjang : 0;
		$simb_lebar = htmlentities($this->input->post('simb_lebar'),ENT_QUOTES);
		$simb_lebar = is_numeric($simb_lebar) ? $simb_lebar : 0;
		$simb_alamat = htmlentities($this->input->post('simb_alamat'),ENT_QUOTES);
		$simb_kel = htmlentities($this->input->post('simb_kel'),ENT_QUOTES);
		$simb_kec = htmlentities($this->input->post('simb_kec'),ENT_QUOTES);
		$simb_bentuk = htmlentities($this->input->post('simb_bentuk'),ENT_QUOTES);
		$simb_bentuk = is_numeric($simb_bentuk) ? $simb_bentuk : 0;
		$simb_lokasi = htmlentities($this->input->post('simb_lokasi'),ENT_QUOTES);
		$simb_lokasi = is_numeric($simb_lokasi) ? $simb_lokasi : 0;
		$simb_gangguan = htmlentities($this->input->post('simb_gangguan'),ENT_QUOTES);
		$simb_gangguan = is_numeric($simb_gangguan) ? $simb_gangguan : 0;
		$simb_batasutara = htmlentities($this->input->post('simb_batasutara'),ENT_QUOTES);
		$simb_batastimur = htmlentities($this->input->post('simb_batastimur'),ENT_QUOTES);
		$simb_batasselatan = htmlentities($this->input->post('simb_batasselatan'),ENT_QUOTES);
		$simb_batasbarat = htmlentities($this->input->post('simb_batasbarat'),ENT_QUOTES);
				
		$params = array(
			'simb_per_npwp'=>$simb_per_npwp,
			'simb_per_nama'=>$simb_per_nama,
			'simb_per_akta'=>$simb_per_akta,
			'simb_per_bentuk'=>$simb_per_bentuk,
			'simb_per_alamat'=>$simb_per_alamat,
			'simb_per_kel'=>$simb_per_kel,
			'simb_per_kec'=>$simb_per_kec,
			'simb_per_kota'=>$simb_per_kota,
			'simb_per_telp'=>$simb_per_telp,
			'simb_jenis'=>$simb_jenis,
			'simb_status'=>$simb_status,
			'simb_jenisusaha'=>$simb_jenisusaha,
			'simb_panjang'=>$simb_panjang,
			'simb_lebar'=>$simb_lebar,
			'simb_alamat'=>$simb_alamat,
			'simb_kel'=>$simb_kel,
			'simb_kec'=>$simb_kec,
			'simb_bentuk'=>$simb_bentuk,
			'simb_lokasi'=>$simb_lokasi,
			'simb_gangguan'=>$simb_gangguan,
			'simb_batasutara'=>$simb_batasutara,
			'simb_batastimur'=>$simb_batastimur,
			'simb_batasselatan'=>$simb_batasselatan,
			'simb_batasbarat'=>$simb_batasbarat,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_simb->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$simb_per_npwp = htmlentities($this->input->post('simb_per_npwp'),ENT_QUOTES);
		$simb_per_nama = htmlentities($this->input->post('simb_per_nama'),ENT_QUOTES);
		$simb_per_akta = htmlentities($this->input->post('simb_per_akta'),ENT_QUOTES);
		$simb_per_bentuk = htmlentities($this->input->post('simb_per_bentuk'),ENT_QUOTES);
		$simb_per_bentuk = is_numeric($simb_per_bentuk) ? $simb_per_bentuk : 0;
		$simb_per_alamat = htmlentities($this->input->post('simb_per_alamat'),ENT_QUOTES);
		$simb_per_kel = htmlentities($this->input->post('simb_per_kel'),ENT_QUOTES);
		$simb_per_kec = htmlentities($this->input->post('simb_per_kec'),ENT_QUOTES);
		$simb_per_kota = htmlentities($this->input->post('simb_per_kota'),ENT_QUOTES);
		$simb_per_telp = htmlentities($this->input->post('simb_per_telp'),ENT_QUOTES);
		$simb_jenis = htmlentities($this->input->post('simb_jenis'),ENT_QUOTES);
		$simb_status = htmlentities($this->input->post('simb_status'),ENT_QUOTES);
		$simb_status = is_numeric($simb_status) ? $simb_status : 0;
		$simb_jenisusaha = htmlentities($this->input->post('simb_jenisusaha'),ENT_QUOTES);
		$simb_panjang = htmlentities($this->input->post('simb_panjang'),ENT_QUOTES);
		$simb_panjang = is_numeric($simb_panjang) ? $simb_panjang : 0;
		$simb_lebar = htmlentities($this->input->post('simb_lebar'),ENT_QUOTES);
		$simb_lebar = is_numeric($simb_lebar) ? $simb_lebar : 0;
		$simb_alamat = htmlentities($this->input->post('simb_alamat'),ENT_QUOTES);
		$simb_kel = htmlentities($this->input->post('simb_kel'),ENT_QUOTES);
		$simb_kec = htmlentities($this->input->post('simb_kec'),ENT_QUOTES);
		$simb_bentuk = htmlentities($this->input->post('simb_bentuk'),ENT_QUOTES);
		$simb_bentuk = is_numeric($simb_bentuk) ? $simb_bentuk : 0;
		$simb_lokasi = htmlentities($this->input->post('simb_lokasi'),ENT_QUOTES);
		$simb_lokasi = is_numeric($simb_lokasi) ? $simb_lokasi : 0;
		$simb_gangguan = htmlentities($this->input->post('simb_gangguan'),ENT_QUOTES);
		$simb_gangguan = is_numeric($simb_gangguan) ? $simb_gangguan : 0;
		$simb_batasutara = htmlentities($this->input->post('simb_batasutara'),ENT_QUOTES);
		$simb_batastimur = htmlentities($this->input->post('simb_batastimur'),ENT_QUOTES);
		$simb_batasselatan = htmlentities($this->input->post('simb_batasselatan'),ENT_QUOTES);
		$simb_batasbarat = htmlentities($this->input->post('simb_batasbarat'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'simb_per_npwp'=>$simb_per_npwp,
			'simb_per_nama'=>$simb_per_nama,
			'simb_per_akta'=>$simb_per_akta,
			'simb_per_bentuk'=>$simb_per_bentuk,
			'simb_per_alamat'=>$simb_per_alamat,
			'simb_per_kel'=>$simb_per_kel,
			'simb_per_kec'=>$simb_per_kec,
			'simb_per_kota'=>$simb_per_kota,
			'simb_per_telp'=>$simb_per_telp,
			'simb_jenis'=>$simb_jenis,
			'simb_status'=>$simb_status,
			'simb_jenisusaha'=>$simb_jenisusaha,
			'simb_panjang'=>$simb_panjang,
			'simb_lebar'=>$simb_lebar,
			'simb_alamat'=>$simb_alamat,
			'simb_kel'=>$simb_kel,
			'simb_kec'=>$simb_kec,
			'simb_bentuk'=>$simb_bentuk,
			'simb_lokasi'=>$simb_lokasi,
			'simb_gangguan'=>$simb_gangguan,
			'simb_batasutara'=>$simb_batasutara,
			'simb_batastimur'=>$simb_batastimur,
			'simb_batasselatan'=>$simb_batasselatan,
			'simb_batasbarat'=>$simb_batasbarat,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_simb->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_simb.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_simb_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_simb_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}