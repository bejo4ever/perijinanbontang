<?php
class C_t_apotek extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_apotek');
	}
	
	function index(){
		$this->load->view('main/v_t_apotek');
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
		$result = $this->m_t_apotek->getList($params);
		echo $result;
	}
	
	function create(){
		$apotek_id = htmlentities($this->input->post('apotek_id'),ENT_QUOTES);
		$apotek_id = is_numeric($apotek_id) ? $apotek_id : 0;
		$apotek_nama = htmlentities($this->input->post('apotek_nama'),ENT_QUOTES);
		$apotek_alamat = htmlentities($this->input->post('apotek_alamat'),ENT_QUOTES);
		$apotek_telp = htmlentities($this->input->post('apotek_telp'),ENT_QUOTES);
		$apotek_kel = htmlentities($this->input->post('apotek_kel'),ENT_QUOTES);
		$apotek_kec = htmlentities($this->input->post('apotek_kec'),ENT_QUOTES);
		$apotek_kepemilikan = htmlentities($this->input->post('apotek_kepemilikan'),ENT_QUOTES);
		$apotek_kepemilikan = is_numeric($apotek_kepemilikan) ? $apotek_kepemilikan : 0;
		$apotek_pemilik = htmlentities($this->input->post('apotek_pemilik'),ENT_QUOTES);
		$apotek_pemilikalamat = htmlentities($this->input->post('apotek_pemilikalamat'),ENT_QUOTES);
		$apotek_pemiliknpwp = htmlentities($this->input->post('apotek_pemiliknpwp'),ENT_QUOTES);
		$apotek_siup = htmlentities($this->input->post('apotek_siup'),ENT_QUOTES);
				
		$apotek_author = $this->m_t_apotek->__checkSession();
		$apotek_created_date = date('Y-m-d H:i:s');
		
		if($apotek_author != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'apotek_id'=>$apotek_id,
				'apotek_nama'=>$apotek_nama,
				'apotek_alamat'=>$apotek_alamat,
				'apotek_telp'=>$apotek_telp,
				'apotek_kel'=>$apotek_kel,
				'apotek_kec'=>$apotek_kec,
				'apotek_kepemilikan'=>$apotek_kepemilikan,
				'apotek_pemilik'=>$apotek_pemilik,
				'apotek_pemilikalamat'=>$apotek_pemilikalamat,
				'apotek_pemiliknpwp'=>$apotek_pemiliknpwp,
				'apotek_siup'=>$apotek_siup,
				);
			$result = $this->m_t_apotek->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$apotek_id = htmlentities($this->input->post('apotek_id'),ENT_QUOTES);
		$apotek_id = is_numeric($apotek_id) ? $apotek_id : 0;
		$apotek_nama = htmlentities($this->input->post('apotek_nama'),ENT_QUOTES);
		$apotek_alamat = htmlentities($this->input->post('apotek_alamat'),ENT_QUOTES);
		$apotek_telp = htmlentities($this->input->post('apotek_telp'),ENT_QUOTES);
		$apotek_kel = htmlentities($this->input->post('apotek_kel'),ENT_QUOTES);
		$apotek_kec = htmlentities($this->input->post('apotek_kec'),ENT_QUOTES);
		$apotek_kepemilikan = htmlentities($this->input->post('apotek_kepemilikan'),ENT_QUOTES);
		$apotek_kepemilikan = is_numeric($apotek_kepemilikan) ? $apotek_kepemilikan : 0;
		$apotek_pemilik = htmlentities($this->input->post('apotek_pemilik'),ENT_QUOTES);
		$apotek_pemilikalamat = htmlentities($this->input->post('apotek_pemilikalamat'),ENT_QUOTES);
		$apotek_pemiliknpwp = htmlentities($this->input->post('apotek_pemiliknpwp'),ENT_QUOTES);
		$apotek_siup = htmlentities($this->input->post('apotek_siup'),ENT_QUOTES);
				
		$apotek_updated_by = $this->m_t_apotek->__checkSession();
		$apotek_updated_date = date('Y-m-d H:i:s');
		
		if($apotek_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'apotek_nama'=>$apotek_nama,
				'apotek_alamat'=>$apotek_alamat,
				'apotek_telp'=>$apotek_telp,
				'apotek_kel'=>$apotek_kel,
				'apotek_kec'=>$apotek_kec,
				'apotek_kepemilikan'=>$apotek_kepemilikan,
				'apotek_pemilik'=>$apotek_pemilik,
				'apotek_pemilikalamat'=>$apotek_pemilikalamat,
				'apotek_pemiliknpwp'=>$apotek_pemiliknpwp,
				'apotek_siup'=>$apotek_siup,
				);
			$result = $this->m_t_apotek->__update($data, $apotek_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_apotek->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$apotek_nama = htmlentities($this->input->post('apotek_nama'),ENT_QUOTES);
		$apotek_alamat = htmlentities($this->input->post('apotek_alamat'),ENT_QUOTES);
		$apotek_telp = htmlentities($this->input->post('apotek_telp'),ENT_QUOTES);
		$apotek_kel = htmlentities($this->input->post('apotek_kel'),ENT_QUOTES);
		$apotek_kec = htmlentities($this->input->post('apotek_kec'),ENT_QUOTES);
		$apotek_kepemilikan = htmlentities($this->input->post('apotek_kepemilikan'),ENT_QUOTES);
		$apotek_kepemilikan = is_numeric($apotek_kepemilikan) ? $apotek_kepemilikan : 0;
		$apotek_pemilik = htmlentities($this->input->post('apotek_pemilik'),ENT_QUOTES);
		$apotek_pemilikalamat = htmlentities($this->input->post('apotek_pemilikalamat'),ENT_QUOTES);
		$apotek_pemiliknpwp = htmlentities($this->input->post('apotek_pemiliknpwp'),ENT_QUOTES);
		$apotek_siup = htmlentities($this->input->post('apotek_siup'),ENT_QUOTES);
				
		$params = array(
			'apotek_nama'=>$apotek_nama,
			'apotek_alamat'=>$apotek_alamat,
			'apotek_telp'=>$apotek_telp,
			'apotek_kel'=>$apotek_kel,
			'apotek_kec'=>$apotek_kec,
			'apotek_kepemilikan'=>$apotek_kepemilikan,
			'apotek_pemilik'=>$apotek_pemilik,
			'apotek_pemilikalamat'=>$apotek_pemilikalamat,
			'apotek_pemiliknpwp'=>$apotek_pemiliknpwp,
			'apotek_siup'=>$apotek_siup,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_apotek->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$apotek_nama = htmlentities($this->input->post('apotek_nama'),ENT_QUOTES);
		$apotek_alamat = htmlentities($this->input->post('apotek_alamat'),ENT_QUOTES);
		$apotek_telp = htmlentities($this->input->post('apotek_telp'),ENT_QUOTES);
		$apotek_kel = htmlentities($this->input->post('apotek_kel'),ENT_QUOTES);
		$apotek_kec = htmlentities($this->input->post('apotek_kec'),ENT_QUOTES);
		$apotek_kepemilikan = htmlentities($this->input->post('apotek_kepemilikan'),ENT_QUOTES);
		$apotek_kepemilikan = is_numeric($apotek_kepemilikan) ? $apotek_kepemilikan : 0;
		$apotek_pemilik = htmlentities($this->input->post('apotek_pemilik'),ENT_QUOTES);
		$apotek_pemilikalamat = htmlentities($this->input->post('apotek_pemilikalamat'),ENT_QUOTES);
		$apotek_pemiliknpwp = htmlentities($this->input->post('apotek_pemiliknpwp'),ENT_QUOTES);
		$apotek_siup = htmlentities($this->input->post('apotek_siup'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'apotek_nama'=>$apotek_nama,
			'apotek_alamat'=>$apotek_alamat,
			'apotek_telp'=>$apotek_telp,
			'apotek_kel'=>$apotek_kel,
			'apotek_kec'=>$apotek_kec,
			'apotek_kepemilikan'=>$apotek_kepemilikan,
			'apotek_pemilik'=>$apotek_pemilik,
			'apotek_pemilikalamat'=>$apotek_pemilikalamat,
			'apotek_pemiliknpwp'=>$apotek_pemiliknpwp,
			'apotek_siup'=>$apotek_siup,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_apotek->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_apotek.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_apotek_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_apotek_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}