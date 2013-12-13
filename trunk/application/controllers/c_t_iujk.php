<?php
class C_t_iujk extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_iujk');
	}
	
	function index(){
		$this->load->view('main/v_t_iujk');
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
		$result = $this->m_t_iujk->getList($params);
		echo $result;
	}
	
	function create(){
		$iujk_id = htmlentities($this->input->post('iujk_id'),ENT_QUOTES);
		$iujk_id = is_numeric($iujk_id) ? $iujk_id : 0;
		$iujk_jenis = htmlentities($this->input->post('iujk_jenis'),ENT_QUOTES);
		$iujk_jenis = is_numeric($iujk_jenis) ? $iujk_jenis : 0;
		$iujk_tanggal = htmlentities($this->input->post('iujk_tanggal'),ENT_QUOTES);
		$iujk_status = htmlentities($this->input->post('iujk_status'),ENT_QUOTES);
		$iujk_noformulir = htmlentities($this->input->post('iujk_noformulir'),ENT_QUOTES);
		$iujk_nourutformulir = htmlentities($this->input->post('iujk_nourutformulir'),ENT_QUOTES);
		$iujk_nourutformulir = is_numeric($iujk_nourutformulir) ? $iujk_nourutformulir : 0;
		$iujk_lampiran = htmlentities($this->input->post('iujk_lampiran'),ENT_QUOTES);
		$iujk_lampiran = is_numeric($iujk_lampiran) ? $iujk_lampiran : 0;
		$iujk_rekom = htmlentities($this->input->post('iujk_rekom'),ENT_QUOTES);
		$iujk_rekomurut = htmlentities($this->input->post('iujk_rekomurut'),ENT_QUOTES);
		$iujk_rekomurut = is_numeric($iujk_rekomurut) ? $iujk_rekomurut : 0;
		$iujk_rekomtanggal = htmlentities($this->input->post('iujk_rekomtanggal'),ENT_QUOTES);
		$iujk_perusahaan = htmlentities($this->input->post('iujk_perusahaan'),ENT_QUOTES);
		$iujk_alamat = htmlentities($this->input->post('iujk_alamat'),ENT_QUOTES);
		$iujk_direktur = htmlentities($this->input->post('iujk_direktur'),ENT_QUOTES);
		$iujk_golongan = htmlentities($this->input->post('iujk_golongan'),ENT_QUOTES);
		$iujk_kualifikasi = htmlentities($this->input->post('iujk_kualifikasi'),ENT_QUOTES);
		$iujk_bidangusaha = htmlentities($this->input->post('iujk_bidangusaha'),ENT_QUOTES);
		$iujk_kelurahan = htmlentities($this->input->post('iujk_kelurahan'),ENT_QUOTES);
		$iujk_kelurahan = is_numeric($iujk_kelurahan) ? $iujk_kelurahan : 0;
		$iujk_rt = htmlentities($this->input->post('iujk_rt'),ENT_QUOTES);
		$iujk_rt = is_numeric($iujk_rt) ? $iujk_rt : 0;
		$iujk_rw = htmlentities($this->input->post('iujk_rw'),ENT_QUOTES);
		$iujk_rw = is_numeric($iujk_rw) ? $iujk_rw : 0;
		$iujk_kota = htmlentities($this->input->post('iujk_kota'),ENT_QUOTES);
		$iujk_kota = is_numeric($iujk_kota) ? $iujk_kota : 0;
		$iujk_propinsi = htmlentities($this->input->post('iujk_propinsi'),ENT_QUOTES);
		$iujk_propinsi = is_numeric($iujk_propinsi) ? $iujk_propinsi : 0;
		$iujk_telepon = htmlentities($this->input->post('iujk_telepon'),ENT_QUOTES);
		$iujk_kodepos = htmlentities($this->input->post('iujk_kodepos'),ENT_QUOTES);
		$iujk_fax = htmlentities($this->input->post('iujk_fax'),ENT_QUOTES);
		$iujk_npwp = htmlentities($this->input->post('iujk_npwp'),ENT_QUOTES);
		$iujk_pjtbu = htmlentities($this->input->post('iujk_pjtbu'),ENT_QUOTES);
		$iujk_pjteknis = htmlentities($this->input->post('iujk_pjteknis'),ENT_QUOTES);
		$iujk_pj1 = htmlentities($this->input->post('iujk_pj1'),ENT_QUOTES);
		$iujk_pj2 = htmlentities($this->input->post('iujk_pj2'),ENT_QUOTES);
		$iujk_pj3 = htmlentities($this->input->post('iujk_pj3'),ENT_QUOTES);
		$iujk_berlaku = htmlentities($this->input->post('iujk_berlaku'),ENT_QUOTES);
		$iujk_kadaluarsa = htmlentities($this->input->post('iujk_kadaluarsa'),ENT_QUOTES);
				
		$iujk_author = $this->m_t_iujk->__checkSession();
		$iujk_created_date = date('Y-m-d H:i:s');
		
		if(!$iujk_author){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'iujk_id'=>$iujk_id,
				'iujk_jenis'=>$iujk_jenis,
				'iujk_tanggal'=>$iujk_tanggal,
				'iujk_status'=>$iujk_status,
				'iujk_noformulir'=>$iujk_noformulir,
				'iujk_nourutformulir'=>$iujk_nourutformulir,
				'iujk_lampiran'=>$iujk_lampiran,
				'iujk_rekom'=>$iujk_rekom,
				'iujk_rekomurut'=>$iujk_rekomurut,
				'iujk_rekomtanggal'=>$iujk_rekomtanggal,
				'iujk_perusahaan'=>$iujk_perusahaan,
				'iujk_alamat'=>$iujk_alamat,
				'iujk_direktur'=>$iujk_direktur,
				'iujk_golongan'=>$iujk_golongan,
				'iujk_kualifikasi'=>$iujk_kualifikasi,
				'iujk_bidangusaha'=>$iujk_bidangusaha,
				'iujk_kelurahan'=>$iujk_kelurahan,
				'iujk_rt'=>$iujk_rt,
				'iujk_rw'=>$iujk_rw,
				'iujk_kota'=>$iujk_kota,
				'iujk_propinsi'=>$iujk_propinsi,
				'iujk_telepon'=>$iujk_telepon,
				'iujk_kodepos'=>$iujk_kodepos,
				'iujk_fax'=>$iujk_fax,
				'iujk_npwp'=>$iujk_npwp,
				'iujk_pjtbu'=>$iujk_pjtbu,
				'iujk_pjteknis'=>$iujk_pjteknis,
				'iujk_pj1'=>$iujk_pj1,
				'iujk_pj2'=>$iujk_pj2,
				'iujk_pj3'=>$iujk_pj3,
				'iujk_berlaku'=>$iujk_berlaku,
				'iujk_kadaluarsa'=>$iujk_kadaluarsa,
				);
			$result = $this->m_t_iujk->__insert($data, '', '');
		}
		echo $result;
	}
	
	function update(){
		$iujk_id = htmlentities($this->input->post('iujk_id'),ENT_QUOTES);
		$iujk_id = is_numeric($iujk_id) ? $iujk_id : 0;
		$iujk_jenis = htmlentities($this->input->post('iujk_jenis'),ENT_QUOTES);
		$iujk_jenis = is_numeric($iujk_jenis) ? $iujk_jenis : 0;
		$iujk_tanggal = htmlentities($this->input->post('iujk_tanggal'),ENT_QUOTES);
		$iujk_status = htmlentities($this->input->post('iujk_status'),ENT_QUOTES);
		$iujk_noformulir = htmlentities($this->input->post('iujk_noformulir'),ENT_QUOTES);
		$iujk_nourutformulir = htmlentities($this->input->post('iujk_nourutformulir'),ENT_QUOTES);
		$iujk_nourutformulir = is_numeric($iujk_nourutformulir) ? $iujk_nourutformulir : 0;
		$iujk_lampiran = htmlentities($this->input->post('iujk_lampiran'),ENT_QUOTES);
		$iujk_lampiran = is_numeric($iujk_lampiran) ? $iujk_lampiran : 0;
		$iujk_rekom = htmlentities($this->input->post('iujk_rekom'),ENT_QUOTES);
		$iujk_rekomurut = htmlentities($this->input->post('iujk_rekomurut'),ENT_QUOTES);
		$iujk_rekomurut = is_numeric($iujk_rekomurut) ? $iujk_rekomurut : 0;
		$iujk_rekomtanggal = htmlentities($this->input->post('iujk_rekomtanggal'),ENT_QUOTES);
		$iujk_perusahaan = htmlentities($this->input->post('iujk_perusahaan'),ENT_QUOTES);
		$iujk_alamat = htmlentities($this->input->post('iujk_alamat'),ENT_QUOTES);
		$iujk_direktur = htmlentities($this->input->post('iujk_direktur'),ENT_QUOTES);
		$iujk_golongan = htmlentities($this->input->post('iujk_golongan'),ENT_QUOTES);
		$iujk_kualifikasi = htmlentities($this->input->post('iujk_kualifikasi'),ENT_QUOTES);
		$iujk_bidangusaha = htmlentities($this->input->post('iujk_bidangusaha'),ENT_QUOTES);
		$iujk_kelurahan = htmlentities($this->input->post('iujk_kelurahan'),ENT_QUOTES);
		$iujk_kelurahan = is_numeric($iujk_kelurahan) ? $iujk_kelurahan : 0;
		$iujk_rt = htmlentities($this->input->post('iujk_rt'),ENT_QUOTES);
		$iujk_rt = is_numeric($iujk_rt) ? $iujk_rt : 0;
		$iujk_rw = htmlentities($this->input->post('iujk_rw'),ENT_QUOTES);
		$iujk_rw = is_numeric($iujk_rw) ? $iujk_rw : 0;
		$iujk_kota = htmlentities($this->input->post('iujk_kota'),ENT_QUOTES);
		$iujk_kota = is_numeric($iujk_kota) ? $iujk_kota : 0;
		$iujk_propinsi = htmlentities($this->input->post('iujk_propinsi'),ENT_QUOTES);
		$iujk_propinsi = is_numeric($iujk_propinsi) ? $iujk_propinsi : 0;
		$iujk_telepon = htmlentities($this->input->post('iujk_telepon'),ENT_QUOTES);
		$iujk_kodepos = htmlentities($this->input->post('iujk_kodepos'),ENT_QUOTES);
		$iujk_fax = htmlentities($this->input->post('iujk_fax'),ENT_QUOTES);
		$iujk_npwp = htmlentities($this->input->post('iujk_npwp'),ENT_QUOTES);
		$iujk_pjtbu = htmlentities($this->input->post('iujk_pjtbu'),ENT_QUOTES);
		$iujk_pjteknis = htmlentities($this->input->post('iujk_pjteknis'),ENT_QUOTES);
		$iujk_pj1 = htmlentities($this->input->post('iujk_pj1'),ENT_QUOTES);
		$iujk_pj2 = htmlentities($this->input->post('iujk_pj2'),ENT_QUOTES);
		$iujk_pj3 = htmlentities($this->input->post('iujk_pj3'),ENT_QUOTES);
		$iujk_berlaku = htmlentities($this->input->post('iujk_berlaku'),ENT_QUOTES);
		$iujk_kadaluarsa = htmlentities($this->input->post('iujk_kadaluarsa'),ENT_QUOTES);
				
		$iujk_updated_by = $this->m_t_iujk->__checkSession();
		$iujk_updated_date = date('Y-m-d H:i:s');
		
		if(!$iujk_updated_by){
			$result = 'sessionExpired';
		}else{
			$data = array(
				'iujk_jenis'=>$iujk_jenis,
				'iujk_tanggal'=>$iujk_tanggal,
				'iujk_status'=>$iujk_status,
				'iujk_noformulir'=>$iujk_noformulir,
				'iujk_nourutformulir'=>$iujk_nourutformulir,
				'iujk_lampiran'=>$iujk_lampiran,
				'iujk_rekom'=>$iujk_rekom,
				'iujk_rekomurut'=>$iujk_rekomurut,
				'iujk_rekomtanggal'=>$iujk_rekomtanggal,
				'iujk_perusahaan'=>$iujk_perusahaan,
				'iujk_alamat'=>$iujk_alamat,
				'iujk_direktur'=>$iujk_direktur,
				'iujk_golongan'=>$iujk_golongan,
				'iujk_kualifikasi'=>$iujk_kualifikasi,
				'iujk_bidangusaha'=>$iujk_bidangusaha,
				'iujk_kelurahan'=>$iujk_kelurahan,
				'iujk_rt'=>$iujk_rt,
				'iujk_rw'=>$iujk_rw,
				'iujk_kota'=>$iujk_kota,
				'iujk_propinsi'=>$iujk_propinsi,
				'iujk_telepon'=>$iujk_telepon,
				'iujk_kodepos'=>$iujk_kodepos,
				'iujk_fax'=>$iujk_fax,
				'iujk_npwp'=>$iujk_npwp,
				'iujk_pjtbu'=>$iujk_pjtbu,
				'iujk_pjteknis'=>$iujk_pjteknis,
				'iujk_pj1'=>$iujk_pj1,
				'iujk_pj2'=>$iujk_pj2,
				'iujk_pj3'=>$iujk_pj3,
				'iujk_berlaku'=>$iujk_berlaku,
				'iujk_kadaluarsa'=>$iujk_kadaluarsa,
				);
			$result = $this->m_t_iujk->__update($data, $iujk_id, '', '');
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_iujk->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$iujk_jenis = htmlentities($this->input->post('iujk_jenis'),ENT_QUOTES);
		$iujk_jenis = is_numeric($iujk_jenis) ? $iujk_jenis : 0;
		$iujk_tanggal = htmlentities($this->input->post('iujk_tanggal'),ENT_QUOTES);
		$iujk_status = htmlentities($this->input->post('iujk_status'),ENT_QUOTES);
		$iujk_noformulir = htmlentities($this->input->post('iujk_noformulir'),ENT_QUOTES);
		$iujk_nourutformulir = htmlentities($this->input->post('iujk_nourutformulir'),ENT_QUOTES);
		$iujk_nourutformulir = is_numeric($iujk_nourutformulir) ? $iujk_nourutformulir : 0;
		$iujk_lampiran = htmlentities($this->input->post('iujk_lampiran'),ENT_QUOTES);
		$iujk_lampiran = is_numeric($iujk_lampiran) ? $iujk_lampiran : 0;
		$iujk_rekom = htmlentities($this->input->post('iujk_rekom'),ENT_QUOTES);
		$iujk_rekomurut = htmlentities($this->input->post('iujk_rekomurut'),ENT_QUOTES);
		$iujk_rekomurut = is_numeric($iujk_rekomurut) ? $iujk_rekomurut : 0;
		$iujk_rekomtanggal = htmlentities($this->input->post('iujk_rekomtanggal'),ENT_QUOTES);
		$iujk_perusahaan = htmlentities($this->input->post('iujk_perusahaan'),ENT_QUOTES);
		$iujk_alamat = htmlentities($this->input->post('iujk_alamat'),ENT_QUOTES);
		$iujk_direktur = htmlentities($this->input->post('iujk_direktur'),ENT_QUOTES);
		$iujk_golongan = htmlentities($this->input->post('iujk_golongan'),ENT_QUOTES);
		$iujk_kualifikasi = htmlentities($this->input->post('iujk_kualifikasi'),ENT_QUOTES);
		$iujk_bidangusaha = htmlentities($this->input->post('iujk_bidangusaha'),ENT_QUOTES);
		$iujk_kelurahan = htmlentities($this->input->post('iujk_kelurahan'),ENT_QUOTES);
		$iujk_kelurahan = is_numeric($iujk_kelurahan) ? $iujk_kelurahan : 0;
		$iujk_rt = htmlentities($this->input->post('iujk_rt'),ENT_QUOTES);
		$iujk_rt = is_numeric($iujk_rt) ? $iujk_rt : 0;
		$iujk_rw = htmlentities($this->input->post('iujk_rw'),ENT_QUOTES);
		$iujk_rw = is_numeric($iujk_rw) ? $iujk_rw : 0;
		$iujk_kota = htmlentities($this->input->post('iujk_kota'),ENT_QUOTES);
		$iujk_kota = is_numeric($iujk_kota) ? $iujk_kota : 0;
		$iujk_propinsi = htmlentities($this->input->post('iujk_propinsi'),ENT_QUOTES);
		$iujk_propinsi = is_numeric($iujk_propinsi) ? $iujk_propinsi : 0;
		$iujk_telepon = htmlentities($this->input->post('iujk_telepon'),ENT_QUOTES);
		$iujk_kodepos = htmlentities($this->input->post('iujk_kodepos'),ENT_QUOTES);
		$iujk_fax = htmlentities($this->input->post('iujk_fax'),ENT_QUOTES);
		$iujk_npwp = htmlentities($this->input->post('iujk_npwp'),ENT_QUOTES);
		$iujk_pjtbu = htmlentities($this->input->post('iujk_pjtbu'),ENT_QUOTES);
		$iujk_pjteknis = htmlentities($this->input->post('iujk_pjteknis'),ENT_QUOTES);
		$iujk_pj1 = htmlentities($this->input->post('iujk_pj1'),ENT_QUOTES);
		$iujk_pj2 = htmlentities($this->input->post('iujk_pj2'),ENT_QUOTES);
		$iujk_pj3 = htmlentities($this->input->post('iujk_pj3'),ENT_QUOTES);
		$iujk_berlaku = htmlentities($this->input->post('iujk_berlaku'),ENT_QUOTES);
		$iujk_kadaluarsa = htmlentities($this->input->post('iujk_kadaluarsa'),ENT_QUOTES);
				
		$params = array(
			'iujk_jenis'=>$iujk_jenis,
			'iujk_tanggal'=>$iujk_tanggal,
			'iujk_status'=>$iujk_status,
			'iujk_noformulir'=>$iujk_noformulir,
			'iujk_nourutformulir'=>$iujk_nourutformulir,
			'iujk_lampiran'=>$iujk_lampiran,
			'iujk_rekom'=>$iujk_rekom,
			'iujk_rekomurut'=>$iujk_rekomurut,
			'iujk_rekomtanggal'=>$iujk_rekomtanggal,
			'iujk_perusahaan'=>$iujk_perusahaan,
			'iujk_alamat'=>$iujk_alamat,
			'iujk_direktur'=>$iujk_direktur,
			'iujk_golongan'=>$iujk_golongan,
			'iujk_kualifikasi'=>$iujk_kualifikasi,
			'iujk_bidangusaha'=>$iujk_bidangusaha,
			'iujk_kelurahan'=>$iujk_kelurahan,
			'iujk_rt'=>$iujk_rt,
			'iujk_rw'=>$iujk_rw,
			'iujk_kota'=>$iujk_kota,
			'iujk_propinsi'=>$iujk_propinsi,
			'iujk_telepon'=>$iujk_telepon,
			'iujk_kodepos'=>$iujk_kodepos,
			'iujk_fax'=>$iujk_fax,
			'iujk_npwp'=>$iujk_npwp,
			'iujk_pjtbu'=>$iujk_pjtbu,
			'iujk_pjteknis'=>$iujk_pjteknis,
			'iujk_pj1'=>$iujk_pj1,
			'iujk_pj2'=>$iujk_pj2,
			'iujk_pj3'=>$iujk_pj3,
			'iujk_berlaku'=>$iujk_berlaku,
			'iujk_kadaluarsa'=>$iujk_kadaluarsa,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_iujk->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$iujk_jenis = htmlentities($this->input->post('iujk_jenis'),ENT_QUOTES);
		$iujk_jenis = is_numeric($iujk_jenis) ? $iujk_jenis : 0;
		$iujk_tanggal = htmlentities($this->input->post('iujk_tanggal'),ENT_QUOTES);
		$iujk_status = htmlentities($this->input->post('iujk_status'),ENT_QUOTES);
		$iujk_noformulir = htmlentities($this->input->post('iujk_noformulir'),ENT_QUOTES);
		$iujk_nourutformulir = htmlentities($this->input->post('iujk_nourutformulir'),ENT_QUOTES);
		$iujk_nourutformulir = is_numeric($iujk_nourutformulir) ? $iujk_nourutformulir : 0;
		$iujk_lampiran = htmlentities($this->input->post('iujk_lampiran'),ENT_QUOTES);
		$iujk_lampiran = is_numeric($iujk_lampiran) ? $iujk_lampiran : 0;
		$iujk_rekom = htmlentities($this->input->post('iujk_rekom'),ENT_QUOTES);
		$iujk_rekomurut = htmlentities($this->input->post('iujk_rekomurut'),ENT_QUOTES);
		$iujk_rekomurut = is_numeric($iujk_rekomurut) ? $iujk_rekomurut : 0;
		$iujk_rekomtanggal = htmlentities($this->input->post('iujk_rekomtanggal'),ENT_QUOTES);
		$iujk_perusahaan = htmlentities($this->input->post('iujk_perusahaan'),ENT_QUOTES);
		$iujk_alamat = htmlentities($this->input->post('iujk_alamat'),ENT_QUOTES);
		$iujk_direktur = htmlentities($this->input->post('iujk_direktur'),ENT_QUOTES);
		$iujk_golongan = htmlentities($this->input->post('iujk_golongan'),ENT_QUOTES);
		$iujk_kualifikasi = htmlentities($this->input->post('iujk_kualifikasi'),ENT_QUOTES);
		$iujk_bidangusaha = htmlentities($this->input->post('iujk_bidangusaha'),ENT_QUOTES);
		$iujk_kelurahan = htmlentities($this->input->post('iujk_kelurahan'),ENT_QUOTES);
		$iujk_kelurahan = is_numeric($iujk_kelurahan) ? $iujk_kelurahan : 0;
		$iujk_rt = htmlentities($this->input->post('iujk_rt'),ENT_QUOTES);
		$iujk_rt = is_numeric($iujk_rt) ? $iujk_rt : 0;
		$iujk_rw = htmlentities($this->input->post('iujk_rw'),ENT_QUOTES);
		$iujk_rw = is_numeric($iujk_rw) ? $iujk_rw : 0;
		$iujk_kota = htmlentities($this->input->post('iujk_kota'),ENT_QUOTES);
		$iujk_kota = is_numeric($iujk_kota) ? $iujk_kota : 0;
		$iujk_propinsi = htmlentities($this->input->post('iujk_propinsi'),ENT_QUOTES);
		$iujk_propinsi = is_numeric($iujk_propinsi) ? $iujk_propinsi : 0;
		$iujk_telepon = htmlentities($this->input->post('iujk_telepon'),ENT_QUOTES);
		$iujk_kodepos = htmlentities($this->input->post('iujk_kodepos'),ENT_QUOTES);
		$iujk_fax = htmlentities($this->input->post('iujk_fax'),ENT_QUOTES);
		$iujk_npwp = htmlentities($this->input->post('iujk_npwp'),ENT_QUOTES);
		$iujk_pjtbu = htmlentities($this->input->post('iujk_pjtbu'),ENT_QUOTES);
		$iujk_pjteknis = htmlentities($this->input->post('iujk_pjteknis'),ENT_QUOTES);
		$iujk_pj1 = htmlentities($this->input->post('iujk_pj1'),ENT_QUOTES);
		$iujk_pj2 = htmlentities($this->input->post('iujk_pj2'),ENT_QUOTES);
		$iujk_pj3 = htmlentities($this->input->post('iujk_pj3'),ENT_QUOTES);
		$iujk_berlaku = htmlentities($this->input->post('iujk_berlaku'),ENT_QUOTES);
		$iujk_kadaluarsa = htmlentities($this->input->post('iujk_kadaluarsa'),ENT_QUOTES);
				
		$params = array(
			'searchText' => $searchText,
			'iujk_jenis'=>$iujk_jenis,
			'iujk_tanggal'=>$iujk_tanggal,
			'iujk_status'=>$iujk_status,
			'iujk_noformulir'=>$iujk_noformulir,
			'iujk_nourutformulir'=>$iujk_nourutformulir,
			'iujk_lampiran'=>$iujk_lampiran,
			'iujk_rekom'=>$iujk_rekom,
			'iujk_rekomurut'=>$iujk_rekomurut,
			'iujk_rekomtanggal'=>$iujk_rekomtanggal,
			'iujk_perusahaan'=>$iujk_perusahaan,
			'iujk_alamat'=>$iujk_alamat,
			'iujk_direktur'=>$iujk_direktur,
			'iujk_golongan'=>$iujk_golongan,
			'iujk_kualifikasi'=>$iujk_kualifikasi,
			'iujk_bidangusaha'=>$iujk_bidangusaha,
			'iujk_kelurahan'=>$iujk_kelurahan,
			'iujk_rt'=>$iujk_rt,
			'iujk_rw'=>$iujk_rw,
			'iujk_kota'=>$iujk_kota,
			'iujk_propinsi'=>$iujk_propinsi,
			'iujk_telepon'=>$iujk_telepon,
			'iujk_kodepos'=>$iujk_kodepos,
			'iujk_fax'=>$iujk_fax,
			'iujk_npwp'=>$iujk_npwp,
			'iujk_pjtbu'=>$iujk_pjtbu,
			'iujk_pjteknis'=>$iujk_pjteknis,
			'iujk_pj1'=>$iujk_pj1,
			'iujk_pj2'=>$iujk_pj2,
			'iujk_pj3'=>$iujk_pj3,
			'iujk_berlaku'=>$iujk_berlaku,
			'iujk_kadaluarsa'=>$iujk_kadaluarsa,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_iujk->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_iujk.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_iujk_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_iujk_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}