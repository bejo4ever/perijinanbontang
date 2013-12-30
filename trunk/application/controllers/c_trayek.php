<?php
class C_trayek extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_trayek');
		$this->load->model('m_trayek_inti');
		$this->load->model('m_m_pemohon');
	}
	
	function index(){
		$this->load->view('main/v_trayek');
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
			case 'GETSYARAT':
				$this->getSyarat();
			break;
			case 'CETAKBP':
				$this->printBP();
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
		$result = $this->m_trayek->getList($params);
		echo $result;
	}
	
	function create(){
		$ID_TRAYEK = htmlentities($this->input->post('ID_TRAYEK'),ENT_QUOTES);
		$ID_TRAYEK = is_numeric($ID_TRAYEK) ? $ID_TRAYEK : 0;
		$ID_TRAYEK_INTI = htmlentities($this->input->post('ID_TRAYEK_INTI'),ENT_QUOTES);
		$ID_TRAYEK_INTI = is_numeric($ID_TRAYEK_INTI) ? $ID_TRAYEK_INTI : 0;
		$pemohon_nama = htmlentities($this->input->post('pemohon_nama'),ENT_QUOTES);
		$pemohon_alamat = htmlentities($this->input->post('pemohon_alamat'),ENT_QUOTES);
		$pemohon_telp = htmlentities($this->input->post('pemohon_telp'),ENT_QUOTES);
		$KODE_TRAYEK = htmlentities($this->input->post('KODE_TRAYEK'),ENT_QUOTES);
		$NOMOR_UB = htmlentities($this->input->post('NOMOR_UB'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
		$NOMOR_KENDARAAN = htmlentities($this->input->post('NOMOR_KENDARAAN'),ENT_QUOTES);
		$NAMA_PEMILIK = htmlentities($this->input->post('NAMA_PEMILIK'),ENT_QUOTES);
		$ALAMAT_PEMILIK = htmlentities($this->input->post('ALAMAT_PEMILIK'),ENT_QUOTES);
		$NO_HP = htmlentities($this->input->post('NO_HP'),ENT_QUOTES);
		$NOMOR_RANGKA = htmlentities($this->input->post('NOMOR_RANGKA'),ENT_QUOTES);
		$NOMOR_MESIN = htmlentities($this->input->post('NOMOR_MESIN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = htmlentities($this->input->post('JENIS_PERMOHONAN'),ENT_QUOTES);
		$JENIS_PERMOHONAN = is_numeric($JENIS_PERMOHONAN) ? $JENIS_PERMOHONAN : 0;
			
		$ayek_author = $this->m_trayek->__checkSession();
		$ayek_created_date = date('Y-m-d H:i:s');
		
		if($ayek_author == ''){
			$result = 'sessionExpired';
		}else{
			if($JENIS_PERMOHONAN == 1){
				$data = array(
					'pemohon_nama'=>$pemohon_nama,
					'pemohon_alamat'=>$pemohon_alamat,
					'pemohon_telp'=>$pemohon_telp,
					'pemohon_user_id'=>$_SESSION['USERID']
				);
				$pemohon= $this->m_m_pemohon->__insert($data, '', 'insertId');
			} else {
				$query_p= $this->m_m_pemohon->get_by(array("pemohon_user_id"=>$_SESSION["USERID"]),FALSE,FALSE,TRUE);
				$pemohon=$query_p['pemohon_id'];
			}
			if($_SESSION['IDHAK'] == 2){
				if($JENIS_PERMOHONAN == 1){
					$data_inti = array(
						'ID_TRAYEK_INTI'=>$ID_TRAYEK_INTI,
						'ID_PEMOHON'=>$pemohon,
						'NOMOR_KENDARAAN'=>$NOMOR_KENDARAAN,
						'NAMA_PEMILIK'=>$NAMA_PEMILIK,
						'ALAMAT_PEMILIK'=>$ALAMAT_PEMILIK,
						'NO_HP'=>$NO_HP,
						'NOMOR_RANGKA'=>$NOMOR_RANGKA,
						'NOMOR_MESIN'=>$NOMOR_MESIN,
						'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN
						);
					$ID_TRAYEK_INTI = $this->m_trayek_inti->__insert($data_inti, '', 'insertId');
					$data = array(
						'ID_TRAYEK_INTI'=>$ID_TRAYEK_INTI,
						'TGL_PERMOHONAN'=>date("Y-m-d"),
						'TGL_AKHIR'=>$TGL_AKHIR,
						'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN
						);
					$ID_IJIN = $this->m_trayek->__insert($data, '', 'insertId');
				} else {
				
				}
				$trayek_ket	= json_decode($this->input->post('KETERANGAN'));
				$syarat		= $this->m_trayek->getSyarat2();
				$i=0;
				foreach($syarat as $row){
					$datacek = array(
					"ID_IJIN"=>$ID_IJIN,
					"ID_SYARAT"=>$row["ID_SYARAT"],
					"KETERANGAN"=>$trayek_ket[$i]);
					$i++;
					$this->m_trayek->__insert($datacek, 'cek_list_trayek', 'insertId');
				}
				echo "success";
			} else {
				
			}
		}
	}
	
	function update(){
		$ID_TRAYEK = htmlentities($this->input->post('ID_TRAYEK'),ENT_QUOTES);
		$ID_TRAYEK = is_numeric($ID_TRAYEK) ? $ID_TRAYEK : 0;
		$ID_TRAYEK_INTI = htmlentities($this->input->post('ID_TRAYEK_INTI'),ENT_QUOTES);
		$ID_TRAYEK_INTI = is_numeric($ID_TRAYEK_INTI) ? $ID_TRAYEK_INTI : 0;
		$KODE_TRAYEK = htmlentities($this->input->post('KODE_TRAYEK'),ENT_QUOTES);
		$NOMOR_UB = htmlentities($this->input->post('NOMOR_UB'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$ayek_updated_by = $this->m_trayek->__checkSession();
		$ayek_updated_date = date('Y-m-d H:i:s');
		
		if($ayek_updated_by != ''){
			$result = 'sessionExpired';
		}else{
			$data_inti = array(
				'ID_TRAYEK_INTI'=>$ID_TRAYEK_INTI,
				'ID_USER'=>$ID_USER,
				'NOMOR_KENDARAAN'=>$NOMOR_KENDARAAN,
				'NAMA_PEMILIK'=>$NAMA_PEMILIK,
				'ALAMAT_PEMILIK'=>$ALAMAT_PEMILIK,
				'NO_HP'=>$NO_HP,
				'NOMOR_RANGKA'=>$NOMOR_RANGKA,
				'NOMOR_MESIN'=>$NOMOR_MESIN,
				'JENIS_PERMOHONAN'=>$JENIS_PERMOHONAN,
				);
			$id_inti = $this->m_trayek_inti->__insert($data, '', 'insertId');
			$data = array(
				'ID_TRAYEK_INTI'=>$ID_TRAYEK_INTI,
				// 'KODE_TRAYEK'=>$KODE_TRAYEK,
				// 'NOMOR_UB'=>$NOMOR_UB,
				'TGL_PERMOHONAN'=>date("Y-m-d"),
				'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
				// 'NAMA_PEMOHON'=>$NAMA_PEMOHON,
				'TGL_AKHIR'=>$TGL_AKHIR,
				);
			$result = $this->m_trayek->__update($data, $ID_TRAYEK, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_trayek->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$ID_TRAYEK_INTI = htmlentities($this->input->post('ID_TRAYEK_INTI'),ENT_QUOTES);
		$ID_TRAYEK_INTI = is_numeric($ID_TRAYEK_INTI) ? $ID_TRAYEK_INTI : 0;
		$KODE_TRAYEK = htmlentities($this->input->post('KODE_TRAYEK'),ENT_QUOTES);
		$NOMOR_UB = htmlentities($this->input->post('NOMOR_UB'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$params = array(
			'ID_TRAYEK_INTI'=>$ID_TRAYEK_INTI,
			'KODE_TRAYEK'=>$KODE_TRAYEK,
			'NOMOR_UB'=>$NOMOR_UB,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
			'NAMA_PEMOHON'=>$NAMA_PEMOHON,
			'TGL_AKHIR'=>$TGL_AKHIR,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_trayek->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$ID_TRAYEK_INTI = htmlentities($this->input->post('ID_TRAYEK_INTI'),ENT_QUOTES);
		$ID_TRAYEK_INTI = is_numeric($ID_TRAYEK_INTI) ? $ID_TRAYEK_INTI : 0;
		$KODE_TRAYEK = htmlentities($this->input->post('KODE_TRAYEK'),ENT_QUOTES);
		$NOMOR_UB = htmlentities($this->input->post('NOMOR_UB'),ENT_QUOTES);
		$TGL_PERMOHONAN = htmlentities($this->input->post('TGL_PERMOHONAN'),ENT_QUOTES);
		$NAMA_PERUSAHAAN = htmlentities($this->input->post('NAMA_PERUSAHAAN'),ENT_QUOTES);
		$NAMA_PEMOHON = htmlentities($this->input->post('NAMA_PEMOHON'),ENT_QUOTES);
		$TGL_AKHIR = htmlentities($this->input->post('TGL_AKHIR'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'ID_TRAYEK_INTI'=>$ID_TRAYEK_INTI,
			'KODE_TRAYEK'=>$KODE_TRAYEK,
			'NOMOR_UB'=>$NOMOR_UB,
			'TGL_PERMOHONAN'=>$TGL_PERMOHONAN,
			'NAMA_PERUSAHAAN'=>$NAMA_PERUSAHAAN,
			'NAMA_PEMOHON'=>$NAMA_PEMOHON,
			'TGL_AKHIR'=>$TGL_AKHIR,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_trayek->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_trayek.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/trayek_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/trayek_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$trayek_id = $this->input->post('trayek_id');
		$params = array(
			"currentAction"=>$currentAction,
			"sktr_id"=>$trayek_id
		);
		$result = $this->m_trayek->getSyarat($params);
		echo $result;
	}
	function printBP($id_trayek=FALSE){
		$this->load->model("m_master_ijin");
		$join	= array(
			array("table"=>"trayek","join_key"=>"ID_TRAYEK_INTI","join_table"=>"trayek_inti")
		);
		$data["sppl"]	= $this->m_trayek->get_join_by($join,array("ID_TRAYEK"=>$id_trayek),TRUE,FALSE);
		$data["ijin"]	= $this->m_master_ijin->get_by(array("ID_IJIN"=>6),FALSE,FALSE,TRUE);
		$this->load->view("template/trayek_bp",$data);
		
	}
}