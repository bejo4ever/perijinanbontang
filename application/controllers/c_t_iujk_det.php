<?php
class C_t_iujk_det extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_iujk_det');
	}
	
	function index(){
		$data['bidang']=$this->m_t_iujk_det->getBidang();
		$data['bidangsub']=$this->m_t_iujk_det->getSubBidang();
		$this->firephp->log($data['bidang']);
		$this->firephp->log($data['bidangsub']);
		$this->load->view('home.php');
		$this->load->view('main/v_t_iujk_det', $data);
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
			case 'UBAHPROSES':
				$this->ubahProses();
			break;
			case 'CETAKLEMBARKONTROL':
				$this->cetakLembarKontrol();
			break;
			case 'CETAKREKOMENDASI':
				$this->cetakRekomendasi();
			break;
			case 'CETAKSK':
				$this->cetakSk();
			break;
			case 'CETAKBP':
				$this->cetakBp();
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
		$result = $this->m_t_iujk_det->getList($params);
		echo $result;
	}
	
	function create(){
		$det_iujk_id = htmlentities($this->input->post('det_iujk_id'),ENT_QUOTES);
		$det_iujk_id = is_numeric($det_iujk_id) ? $det_iujk_id : 0;
		$det_iujk_iujk_id = htmlentities($this->input->post('det_iujk_iujk_id'),ENT_QUOTES);
		$det_iujk_iujk_id = is_numeric($det_iujk_iujk_id) ? $det_iujk_iujk_id : 0;
		$det_iujk_jenis = htmlentities($this->input->post('det_iujk_jenis'),ENT_QUOTES);
		$det_iujk_jenis = is_numeric($det_iujk_jenis) ? $det_iujk_jenis : 0;
		$det_iujk_lama = htmlentities($this->input->post('det_iujk_lama'),ENT_QUOTES);
		$det_iujk_lama = is_numeric($det_iujk_lama) ? $det_iujk_lama : 0;
		$det_iujk_tanggal = htmlentities($this->input->post('det_iujk_tanggal'),ENT_QUOTES);
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_rekomnomor = htmlentities($this->input->post('det_iujk_rekomnomor'),ENT_QUOTES);
		$det_iujk_rekomtanggal = htmlentities($this->input->post('det_iujk_rekomtanggal'),ENT_QUOTES);
		$det_iujk_berlaku = htmlentities($this->input->post('det_iujk_berlaku'),ENT_QUOTES);
		$det_iujk_kadaluarsa = htmlentities($this->input->post('det_iujk_kadaluarsa'),ENT_QUOTES);
		$det_iujk_pj1 = htmlentities($this->input->post('det_iujk_pj1'),ENT_QUOTES);
		$det_iujk_pj2 = htmlentities($this->input->post('det_iujk_pj2'),ENT_QUOTES);
		$det_iujk_pj3 = htmlentities($this->input->post('det_iujk_pj3'),ENT_QUOTES);
		$det_iujk_pjteknis = htmlentities($this->input->post('det_iujk_pjteknis'),ENT_QUOTES);
		$det_iujk_pjtbu = htmlentities($this->input->post('det_iujk_pjtbu'),ENT_QUOTES);
		$det_iujk_surveylulus = htmlentities($this->input->post('det_iujk_surveylulus'),ENT_QUOTES);
		$det_iujk_surveylulus = is_numeric($det_iujk_surveylulus) ? $det_iujk_surveylulus : 0;
		
		$iujk_perusahaan = htmlentities($this->input->post('iujk_perusahaan'),ENT_QUOTES);
		$iujk_alamat = htmlentities($this->input->post('iujk_alamat'),ENT_QUOTES);
		$iujk_direktur = htmlentities($this->input->post('iujk_direktur'),ENT_QUOTES);
		$iujk_golongan = htmlentities($this->input->post('iujk_golongan'),ENT_QUOTES);
		$iujk_kualifikasi = htmlentities($this->input->post('iujk_kualifikasi'),ENT_QUOTES);
		$iujk_bidangusaha = htmlentities($this->input->post('iujk_bidangusaha'),ENT_QUOTES);
		$iujk_rt = htmlentities($this->input->post('iujk_rt'),ENT_QUOTES);
		$iujk_rt = is_numeric($iujk_rt) ? $iujk_rt : 0;
		$iujk_rw = htmlentities($this->input->post('iujk_rw'),ENT_QUOTES);
		$iujk_rw = is_numeric($iujk_rw) ? $iujk_rw : 0;
		$iujk_kelurahan = htmlentities($this->input->post('iujk_kelurahan'),ENT_QUOTES);
		$iujk_kota = htmlentities($this->input->post('iujk_kota'),ENT_QUOTES);
		$iujk_propinsi = htmlentities($this->input->post('iujk_propinsi'),ENT_QUOTES);
		$iujk_telepon = htmlentities($this->input->post('iujk_telepon'),ENT_QUOTES);
		$iujk_kodepos = htmlentities($this->input->post('iujk_kodepos'),ENT_QUOTES);
		$iujk_fax = htmlentities($this->input->post('iujk_fax'),ENT_QUOTES);
		$iujk_npwp = htmlentities($this->input->post('iujk_npwp'),ENT_QUOTES);
		
		$iujk_cek_id = json_decode($this->input->post('iujk_cek_id'));
		$iujk_cek_syarat_id = json_decode($this->input->post('iujk_cek_syarat_id'));
		$iujk_cek_status = json_decode($this->input->post('iujk_cek_status'));
		$iujk_cek_keterangan = json_decode($this->input->post('iujk_cek_keterangan'));
		
		$det_iujk_retribusi = htmlentities($this->input->post('det_iujk_retribusi'),ENT_QUOTES);
		$det_iujk_retribusi = is_numeric($det_iujk_retribusi) ? $det_iujk_retribusi : 0;
		
		$iujk_det_author = $this->m_t_iujk_det->__checkSession();
		$iujk_det_created_date = date('Y-m-d H:i:s');
		
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
		
		$bidang=$this->m_t_iujk_det->getBidang();
		$bidangsub=$this->m_t_iujk_det->getSubBidang();
		$noreg = $this->m_public_function->getNomorReg(5);
		$datapemohon = array(
			'pemohon_nama'=>$pemohon_nama,
			'pemohon_alamat'=>$pemohon_alamat,
			'pemohon_telp'=>$pemohon_telp,
			'pemohon_npwp'=>$pemohon_npwp,
			'pemohon_rt'=>$pemohon_rt,
			'pemohon_rw'=>$pemohon_rw,
			'pemohon_kel'=>$pemohon_kel,
			'pemohon_kec'=>$pemohon_kec,
			'pemohon_nik'=>$pemohon_nik,
			'pemohon_stra'=>$pemohon_stra,
			'pemohon_surattugas'=>$pemohon_surattugas,
			'pemohon_pekerjaan'=>$pemohon_pekerjaan,
			'pemohon_tempatlahir'=>$pemohon_tempatlahir,
			'pemohon_tanggallahir'=>$pemohon_tanggallahir,
			'pemohon_user_id'=>$pemohon_user_id,
			'pemohon_pendidikan'=>$pemohon_pendidikan,
			'pemohon_tahunlulus'=>$pemohon_tahunlulus,
		);
		if($pemohon_id != 0){
			$resultpemohon = $this->m_t_iujk_det->__update($datapemohon, $pemohon_id, 'm_pemohon', 'updateId','pemohon_id');
			$resultpemohon = $pemohon_id;
		}else{
			$datapemohon["pemohon_user_id"]=$iujk_det_author;
			$resultpemohon = $this->m_t_iujk_det->__insert($datapemohon, 'm_pemohon', 'insertId');
		}
		
		
		if($iujk_det_author != ''){
			if($det_iujk_lama != 0 && $det_iujk_jenis == 2){
				$resultInti = $det_iujk_lama;
			}else{
				$dataInti = array(
					'iujk_perusahaan'=>$iujk_perusahaan,
					'iujk_alamat'=>$iujk_alamat,
					'iujk_direktur'=>$iujk_direktur,
					'iujk_golongan'=>$iujk_golongan,
					'iujk_kualifikasi'=>$iujk_kualifikasi,
					'iujk_bidangusaha'=>$iujk_bidangusaha,
					'iujk_rt'=>$iujk_rt,
					'iujk_rw'=>$iujk_rw,
					'iujk_kelurahan'=>$iujk_kelurahan,
					'iujk_kota'=>$iujk_kota,
					'iujk_propinsi'=>$iujk_propinsi,
					'iujk_telepon'=>$iujk_telepon,
					'iujk_kodepos'=>$iujk_kodepos,
					'iujk_fax'=>$iujk_fax,
					'iujk_npwp'=>$iujk_npwp,
				);
				$resultInti = $this->m_t_iujk_det->__insert($dataInti, 't_iujk', 'insertId');
			}
			if($resultInti != 0){
				$result = 'success';
				$data = array(
					'det_iujk_id'=>$det_iujk_id,
					'det_iujk_iujk_id'=>$resultInti,
					'det_iujk_jenis'=>$det_iujk_jenis,
					'det_iujk_tanggal'=>$det_iujk_tanggal,
					'det_iujk_nomorreg'=>$det_iujk_nomorreg,
					'det_iujk_rekomnomor'=>$det_iujk_rekomnomor,
					'det_iujk_rekomtanggal'=>$det_iujk_rekomtanggal,
					'det_iujk_berlaku'=>$det_iujk_berlaku,
					'det_iujk_kadaluarsa'=>$det_iujk_kadaluarsa,
					'det_iujk_pj1'=>$det_iujk_pj1,
					'det_iujk_pj2'=>$det_iujk_pj2,
					'det_iujk_pj3'=>$det_iujk_pj3,
					'det_iujk_pjteknis'=>$det_iujk_pjteknis,
					'det_iujk_pjtbu'=>$det_iujk_pjtbu,
					'det_iujk_surveylulus'=>$det_iujk_surveylulus,
					'det_iujk_pemohon_id'=>$resultpemohon,
					'det_iujk_retribusi'=>$det_iujk_retribusi,
					'det_iujk_nomorreg'=>$noreg
					);
				$resultdet = $this->m_t_iujk_det->__insert($data, '', 'insertId');
				foreach($bidang AS $sub_bidang){ 
					$nm_bid = strtolower($sub_bidang->bidang);
					$nm_bid_nospc = str_replace(' ','', $nm_bid);
					// $this->firephp->log("bidang " . $nm_bid_nospc . $this->input->post("iujk_bidang".$nm_bid_nospc));
					// $this->firephp->log("proyek " . $nm_bid_nospc . $this->input->post("iujk_bidang".$nm_bid_nospc."_proyek"));
					// $this->firephp->log("tahun " . $nm_bid_nospc . $this->input->post("iujk_bidang".$nm_bid_nospc."_tahun"));
					// $this->firephp->log("nilai " . $nm_bid_nospc . $this->input->post("iujk_bidang".$nm_bid_nospc."_nilai"));
					
					if($this->input->post("iujk_bidang".$nm_bid_nospc) == 1){
						$databidang = array(
							'iujk_id'=>$resultdet,
							'bidangjasa_id'=>$sub_bidang->id,
							'nama_proyek'=>$this->input->post("iujk_bidang".$nm_bid_nospc."_proyek"),
							'tahun_proyek'=>$this->input->post("iujk_bidang".$nm_bid_nospc."_tahun"),
							'nilai_proyek'=>$this->input->post("iujk_bidang".$nm_bid_nospc."_nilai"),
						);
						$resbidang = $this->db->insert('iujkbidang',$databidang);
						foreach($bidangsub as $sub_bidangsub){
							if($sub_bidangsub->bidang_jasa_id == $sub_bidang->id){
								$subid = $sub_bidangsub->id;
								if($this->input->post("iujk_bidang".$nm_bid_nospc."_sub".$subid) == 1){
									$datasubbidang = array(
										'iujk_id'=>$resultdet,
										'bidangjasa_sub_id'=>$subid
									);
									$this->db->insert('iujksubbidang',$datasubbidang);
								}
								// $this->firephp->log("bidang " . $nm_bid_nospc ."_sub" . $subid . $this->input->post("iujk_bidang".$nm_bid_nospc."_sub".$subid));
							}
						}
					}
				}
				for($i=0;$i<count($iujk_cek_syarat_id);$i++){
					$datacek = array(
						'iujk_cek_syarat_id'=>$iujk_cek_syarat_id[$i],
						'iujk_cek_iujk_id'=>$resultInti,
						'iujk_cek_iujkdet_id'=>$resultdet,
						'iujk_cek_status'=>$iujk_cek_status[$i],
						'iujk_cek_keterangan'=>$iujk_cek_keterangan[$i]
					);
					$resultcek = $this->m_t_iujk_det->__insert($datacek, 't_iujk_ceklist', 'insertId');
				}
				$this->m_t_iujk_det->__insertlog($iujk_det_author, $resultpemohon, $resultInti, 'Tambah');
			}else{
				$result = 'fail';
			}
		}else{
			$result = 'sessionExpired';
		}
		echo $result;
	}
	
	function update(){
		$det_iujk_id = htmlentities($this->input->post('det_iujk_id'),ENT_QUOTES);
		$det_iujk_id = is_numeric($det_iujk_id) ? $det_iujk_id : 0;
		$det_iujk_iujk_id = htmlentities($this->input->post('det_iujk_iujk_id'),ENT_QUOTES);
		$det_iujk_iujk_id = is_numeric($det_iujk_iujk_id) ? $det_iujk_iujk_id : 0;
		$det_iujk_jenis = htmlentities($this->input->post('det_iujk_jenis'),ENT_QUOTES);
		$det_iujk_jenis = is_numeric($det_iujk_jenis) ? $det_iujk_jenis : 0;
		$det_iujk_tanggal = htmlentities($this->input->post('det_iujk_tanggal'),ENT_QUOTES);
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_rekomnomor = htmlentities($this->input->post('det_iujk_rekomnomor'),ENT_QUOTES);
		$det_iujk_rekomtanggal = htmlentities($this->input->post('det_iujk_rekomtanggal'),ENT_QUOTES);
		$det_iujk_berlaku = htmlentities($this->input->post('det_iujk_berlaku'),ENT_QUOTES);
		$det_iujk_kadaluarsa = htmlentities($this->input->post('det_iujk_kadaluarsa'),ENT_QUOTES);
		$det_iujk_pj1 = htmlentities($this->input->post('det_iujk_pj1'),ENT_QUOTES);
		$det_iujk_pj2 = htmlentities($this->input->post('det_iujk_pj2'),ENT_QUOTES);
		$det_iujk_pj3 = htmlentities($this->input->post('det_iujk_pj3'),ENT_QUOTES);
		$det_iujk_pjteknis = htmlentities($this->input->post('det_iujk_pjteknis'),ENT_QUOTES);
		$det_iujk_pjtbu = htmlentities($this->input->post('det_iujk_pjtbu'),ENT_QUOTES);
		$det_iujk_surveylulus = htmlentities($this->input->post('det_iujk_surveylulus'),ENT_QUOTES);
		$det_iujk_surveylulus = is_numeric($det_iujk_surveylulus) ? $det_iujk_surveylulus : 0;
		$iujk_perusahaan = htmlentities($this->input->post('iujk_perusahaan'),ENT_QUOTES);
		$iujk_alamat = htmlentities($this->input->post('iujk_alamat'),ENT_QUOTES);
		$iujk_direktur = htmlentities($this->input->post('iujk_direktur'),ENT_QUOTES);
		$iujk_golongan = htmlentities($this->input->post('iujk_golongan'),ENT_QUOTES);
		$iujk_kualifikasi = htmlentities($this->input->post('iujk_kualifikasi'),ENT_QUOTES);
		$iujk_bidangusaha = htmlentities($this->input->post('iujk_bidangusaha'),ENT_QUOTES);
		$iujk_rt = htmlentities($this->input->post('iujk_rt'),ENT_QUOTES);
		$iujk_rt = is_numeric($iujk_rt) ? $iujk_rt : 0;
		$iujk_rw = htmlentities($this->input->post('iujk_rw'),ENT_QUOTES);
		$iujk_rw = is_numeric($iujk_rw) ? $iujk_rw : 0;
		$iujk_kelurahan = htmlentities($this->input->post('iujk_kelurahan'),ENT_QUOTES);
		$iujk_kota = htmlentities($this->input->post('iujk_kota'),ENT_QUOTES);
		$iujk_propinsi = htmlentities($this->input->post('iujk_propinsi'),ENT_QUOTES);
		$iujk_telepon = htmlentities($this->input->post('iujk_telepon'),ENT_QUOTES);
		$iujk_kodepos = htmlentities($this->input->post('iujk_kodepos'),ENT_QUOTES);
		$iujk_fax = htmlentities($this->input->post('iujk_fax'),ENT_QUOTES);
		$iujk_npwp = htmlentities($this->input->post('iujk_npwp'),ENT_QUOTES);
		
		$iujk_cek_id = json_decode($this->input->post('iujk_cek_id'));
		$iujk_cek_syarat_id = json_decode($this->input->post('iujk_cek_syarat_id'));
		$iujk_cek_status = json_decode($this->input->post('iujk_cek_status'));
		$iujk_cek_keterangan = json_decode($this->input->post('iujk_cek_keterangan'));
		
		$det_iujk_retribusi = htmlentities($this->input->post('det_iujk_retribusi'),ENT_QUOTES);
		$det_iujk_retribusi = is_numeric($det_iujk_retribusi) ? $det_iujk_retribusi : 0;
		
		$iujk_det_updated_by = $this->m_t_iujk_det->__checkSession();
		$iujk_det_updated_date = date('Y-m-d H:i:s');
		
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
		$datapemohon = array(
			'pemohon_nama'=>$pemohon_nama,
			'pemohon_alamat'=>$pemohon_alamat,
			'pemohon_telp'=>$pemohon_telp,
			'pemohon_npwp'=>$pemohon_npwp,
			'pemohon_rt'=>$pemohon_rt,
			'pemohon_rw'=>$pemohon_rw,
			'pemohon_kel'=>$pemohon_kel,
			'pemohon_kec'=>$pemohon_kec,
			'pemohon_nik'=>$pemohon_nik,
			'pemohon_stra'=>$pemohon_stra,
			'pemohon_surattugas'=>$pemohon_surattugas,
			'pemohon_pekerjaan'=>$pemohon_pekerjaan,
			'pemohon_tempatlahir'=>$pemohon_tempatlahir,
			'pemohon_tanggallahir'=>$pemohon_tanggallahir,
			'pemohon_pendidikan'=>$pemohon_pendidikan,
			'pemohon_tahunlulus'=>$pemohon_tahunlulus,
		);
		if($pemohon_id != 0){
			$resultpemohon = $this->m_t_iujk_det->__update($datapemohon, $pemohon_id, 'm_pemohon', 'updateId','pemohon_id');
			$resultpemohon = $pemohon_id;
		}else{
			$datapemohon["pemohon_user_id"]=$iujk_det_updated_by;
			$resultpemohon = $this->m_t_iujk_det->__insert($datapemohon, 'm_pemohon', 'insertId');
		}
		
		
		if($iujk_det_updated_by != ''){
			$dataInti = array(
				'iujk_perusahaan'=>$iujk_perusahaan,
				'iujk_alamat'=>$iujk_alamat,
				'iujk_direktur'=>$iujk_direktur,
				'iujk_golongan'=>$iujk_golongan,
				'iujk_kualifikasi'=>$iujk_kualifikasi,
				'iujk_bidangusaha'=>$iujk_bidangusaha,
				'iujk_rt'=>$iujk_rt,
				'iujk_rw'=>$iujk_rw,
				'iujk_kelurahan'=>$iujk_kelurahan,
				'iujk_kota'=>$iujk_kota,
				'iujk_propinsi'=>$iujk_propinsi,
				'iujk_telepon'=>$iujk_telepon,
				'iujk_kodepos'=>$iujk_kodepos,
				'iujk_fax'=>$iujk_fax,
				'iujk_npwp'=>$iujk_npwp,
			);
			$resultInti = $this->m_t_iujk_det->__update($dataInti, $det_iujk_iujk_id, 't_iujk', 'updateId', 'iujk_id');
			$result = 'success';
			$data = array(
				'det_iujk_iujk_id'=>$det_iujk_iujk_id,
				'det_iujk_jenis'=>$det_iujk_jenis,
				'det_iujk_tanggal'=>$det_iujk_tanggal,
				'det_iujk_nomorreg'=>$det_iujk_nomorreg,
				'det_iujk_rekomnomor'=>$det_iujk_rekomnomor,
				'det_iujk_rekomtanggal'=>$det_iujk_rekomtanggal,
				'det_iujk_berlaku'=>$det_iujk_berlaku,
				'det_iujk_kadaluarsa'=>$det_iujk_kadaluarsa,
				'det_iujk_pj1'=>$det_iujk_pj1,
				'det_iujk_pj2'=>$det_iujk_pj2,
				'det_iujk_pj3'=>$det_iujk_pj3,
				'det_iujk_pjteknis'=>$det_iujk_pjteknis,
				'det_iujk_pjtbu'=>$det_iujk_pjtbu,
				'det_iujk_surveylulus'=>$det_iujk_surveylulus,
				'det_iujk_pemohon_id'=>$resultpemohon,
				'det_iujk_retribusi'=>$det_iujk_retribusi
			);
			$resultdet = $this->m_t_iujk_det->__update($data, $det_iujk_id, '', 'updateId','');
			for($i=0;$i<count($iujk_cek_syarat_id);$i++){
				$datacek = array(
					'iujk_cek_syarat_id'=>$iujk_cek_syarat_id[$i],
					'iujk_cek_iujk_id'=>$det_iujk_iujk_id,
					'iujk_cek_iujkdet_id'=>$det_iujk_id,
					'iujk_cek_status'=>$iujk_cek_status[$i],
					'iujk_cek_keterangan'=>$iujk_cek_keterangan[$i]
				);
				$resultcek = $this->m_t_iujk_det->__update($datacek, $iujk_cek_id[$i], 't_iujk_ceklist', 'updateId','iujk_cek_id');
			}
			$this->m_t_iujk_det->__insertlog($iujk_det_updated_by, $resultpemohon, $det_iujk_id, 'Ubah');
		}else{
			$result = 'sessionExpired';
		}
		echo $result;
	}
	
	function delete(){
		$ids = $this->input->post('ids');
		$arrayId = json_decode($ids);
		$result = $this->m_t_iujk_det->__delete($arrayId,'');
		echo $result;
	}
	
	function search(){
		$limit_start = (integer)$this->input->post('start');
		$limit_end = (integer)$this->input->post('limit');
		$det_iujk_iujk_id = htmlentities($this->input->post('det_iujk_iujk_id'),ENT_QUOTES);
		$det_iujk_iujk_id = is_numeric($det_iujk_iujk_id) ? $det_iujk_iujk_id : 0;
		$det_iujk_jenis = htmlentities($this->input->post('det_iujk_jenis'),ENT_QUOTES);
		$det_iujk_jenis = is_numeric($det_iujk_jenis) ? $det_iujk_jenis : 0;
		$det_iujk_tanggal = htmlentities($this->input->post('det_iujk_tanggal'),ENT_QUOTES);
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_rekomnomor = htmlentities($this->input->post('det_iujk_rekomnomor'),ENT_QUOTES);
		$det_iujk_rekomtanggal = htmlentities($this->input->post('det_iujk_rekomtanggal'),ENT_QUOTES);
		$det_iujk_berlaku = htmlentities($this->input->post('det_iujk_berlaku'),ENT_QUOTES);
		$det_iujk_kadaluarsa = htmlentities($this->input->post('det_iujk_kadaluarsa'),ENT_QUOTES);
		$det_iujk_pj1 = htmlentities($this->input->post('det_iujk_pj1'),ENT_QUOTES);
		$det_iujk_pj2 = htmlentities($this->input->post('det_iujk_pj2'),ENT_QUOTES);
		$det_iujk_pj3 = htmlentities($this->input->post('det_iujk_pj3'),ENT_QUOTES);
		$det_iujk_pjteknis = htmlentities($this->input->post('det_iujk_pjteknis'),ENT_QUOTES);
		$det_iujk_pjtbu = htmlentities($this->input->post('det_iujk_pjtbu'),ENT_QUOTES);
		$det_iujk_surveylulus = htmlentities($this->input->post('det_iujk_surveylulus'),ENT_QUOTES);
		$det_iujk_surveylulus = is_numeric($det_iujk_surveylulus) ? $det_iujk_surveylulus : 0;
				
		$params = array(
			'det_iujk_iujk_id'=>$det_iujk_iujk_id,
			'det_iujk_jenis'=>$det_iujk_jenis,
			'det_iujk_tanggal'=>$det_iujk_tanggal,
			'det_iujk_nama'=>$det_iujk_nama,
			'det_iujk_nomorreg'=>$det_iujk_nomorreg,
			'det_iujk_rekomnomor'=>$det_iujk_rekomnomor,
			'det_iujk_rekomtanggal'=>$det_iujk_rekomtanggal,
			'det_iujk_berlaku'=>$det_iujk_berlaku,
			'det_iujk_kadaluarsa'=>$det_iujk_kadaluarsa,
			'det_iujk_pj1'=>$det_iujk_pj1,
			'det_iujk_pj2'=>$det_iujk_pj2,
			'det_iujk_pj3'=>$det_iujk_pj3,
			'det_iujk_pjteknis'=>$det_iujk_pjteknis,
			'det_iujk_pjtbu'=>$det_iujk_pjtbu,
			'det_iujk_surveylulus'=>$det_iujk_surveylulus,
			'limit_start' => $limit_start,
			'limit_end' => $limit_end
		);
		
		$result = $this->m_t_iujk_det->search($params);
		echo $result;
	}
	
	function printExcel(){
		$outputType = $this->input->post('action');
		
		$searchText = $this->input->post('query');
		$currentAction = $this->input->post('currentAction');
		$det_iujk_iujk_id = htmlentities($this->input->post('det_iujk_iujk_id'),ENT_QUOTES);
		$det_iujk_iujk_id = is_numeric($det_iujk_iujk_id) ? $det_iujk_iujk_id : 0;
		$det_iujk_jenis = htmlentities($this->input->post('det_iujk_jenis'),ENT_QUOTES);
		$det_iujk_jenis = is_numeric($det_iujk_jenis) ? $det_iujk_jenis : 0;
		$det_iujk_tanggal = htmlentities($this->input->post('det_iujk_tanggal'),ENT_QUOTES);
		$det_iujk_nama = htmlentities($this->input->post('det_iujk_nama'),ENT_QUOTES);
		$det_iujk_nomorreg = htmlentities($this->input->post('det_iujk_nomorreg'),ENT_QUOTES);
		$det_iujk_rekomnomor = htmlentities($this->input->post('det_iujk_rekomnomor'),ENT_QUOTES);
		$det_iujk_rekomtanggal = htmlentities($this->input->post('det_iujk_rekomtanggal'),ENT_QUOTES);
		$det_iujk_berlaku = htmlentities($this->input->post('det_iujk_berlaku'),ENT_QUOTES);
		$det_iujk_kadaluarsa = htmlentities($this->input->post('det_iujk_kadaluarsa'),ENT_QUOTES);
		$det_iujk_pj1 = htmlentities($this->input->post('det_iujk_pj1'),ENT_QUOTES);
		$det_iujk_pj2 = htmlentities($this->input->post('det_iujk_pj2'),ENT_QUOTES);
		$det_iujk_pj3 = htmlentities($this->input->post('det_iujk_pj3'),ENT_QUOTES);
		$det_iujk_pjteknis = htmlentities($this->input->post('det_iujk_pjteknis'),ENT_QUOTES);
		$det_iujk_pjtbu = htmlentities($this->input->post('det_iujk_pjtbu'),ENT_QUOTES);
		$det_iujk_surveylulus = htmlentities($this->input->post('det_iujk_surveylulus'),ENT_QUOTES);
		$det_iujk_surveylulus = is_numeric($det_iujk_surveylulus) ? $det_iujk_surveylulus : 0;
				
		$params = array(
			'searchText' => $searchText,
			'det_iujk_iujk_id'=>$det_iujk_iujk_id,
			'det_iujk_jenis'=>$det_iujk_jenis,
			'det_iujk_tanggal'=>$det_iujk_tanggal,
			'det_iujk_nama'=>$det_iujk_nama,
			'det_iujk_nomorreg'=>$det_iujk_nomorreg,
			'det_iujk_rekomnomor'=>$det_iujk_rekomnomor,
			'det_iujk_rekomtanggal'=>$det_iujk_rekomtanggal,
			'det_iujk_berlaku'=>$det_iujk_berlaku,
			'det_iujk_kadaluarsa'=>$det_iujk_kadaluarsa,
			'det_iujk_pj1'=>$det_iujk_pj1,
			'det_iujk_pj2'=>$det_iujk_pj2,
			'det_iujk_pj3'=>$det_iujk_pj3,
			'det_iujk_pjteknis'=>$det_iujk_pjteknis,
			'det_iujk_pjtbu'=>$det_iujk_pjtbu,
			'det_iujk_surveylulus'=>$det_iujk_surveylulus,
			'currentAction' => $currentAction,
			'return_type' => 'array',
			'limit_start' => 0,
			'limit_end' => 0
		);
		
		$record = $this->m_t_iujk_det->printExcel($params);
		$data['records'] = $record[1];
		$data['type']=$outputType;
		
		$print_view=$this->load->view('template/p_t_iujk_det.php',$data,TRUE);
		
		if(!file_exists('print')){ mkdir('print'); }
		if($outputType == 'PRINT'){
			$print_file=fopen('print/t_iujk_det_list.html','w+');
		}elseif($outputType == 'EXCEL'){
			$print_file=fopen('print/t_iujk_det_list.xls','w+');
		}
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function getSyarat(){
		$currentAction = $this->input->post('currentAction');
		$iujk_id = $this->input->post('iujk_id');
		$iujk_det_id = $this->input->post('iujk_det_id');
		$params = array(
			"currentAction"=>$currentAction,
			"iujk_id"=>$iujk_id,
			"iujk_det_id"=>$iujk_det_id
		);
		$result = $this->m_t_iujk_det->getSyarat($params);
		echo $result;
	}
	function ubahProses(){
		$iujkdet_id  = $this->input->post('iujkdet_id');
		$iujkdet_nosk  = $this->input->post('iujkdet_nosk');
		$proses  = $this->input->post('proses');
		if($proses == 'Selesai, belum diambil' && $iujkdet_nosk == ''){
			$nosk = $this->m_public_function->getNomorSk(1);
			$data_sk = array(
				"det_iujk_sk"=>$nosk,
				"det_iujk_berlaku"=>date('Y-m-d')
			);
			$this->db->where('det_iujk_id', $iujkdet_id);
			$this->db->update('t_iujk_det', $data_sk);
		}
		$data = array(
			"det_iujk_proses"=>$proses
		);
		$result = $this->m_t_iujk_det->__update($data, $iujkdet_id, '', '','');
		echo $result;
	}
	function cetakLembarKontrol(){
		$iujkdet_id  = $this->input->post('iujkdet_id');
		$params = array(
			"det_iujk_id"=>$iujkdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_iujk_det->search($params);
		$dataceklist = $this->db->where('iujk_cek_iujkdet_id', $iujkdet_id)->join('master_syarat','iujk_cek_syarat_id = ID_SYARAT')->get('t_iujk_ceklist')->result();
		$data['printrecord'] = $printrecord[1];
		$data['dataceklist'] = $dataceklist;
		$print_view=$this->load->view('template/p_iujk_kelengkapan.php',$data,TRUE);
		$print_file=fopen('print/iujk_lembarkontrol.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakRekomendasi(){
		$iujkdet_id  = $this->input->post('iujkdet_id');
		$params = array(
			"det_iujk_id"=>$iujkdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_iujk_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$print_view=$this->load->view('template/p_iujk_rekomendasi.php',$data,TRUE);
		$print_file=fopen('print/iujk_rekomendasi.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakBp(){
		$iujkdet_id  = $this->input->post('iujkdet_id');
		$params = array(
			"det_iujk_id"=>$iujkdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_iujk_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$data['dataijin'] = $this->db->where('id',5)->get('ijin')->row();
		$print_view=$this->load->view('template/p_iujk_buktiterima.php',$data,TRUE);
		$print_file=fopen('print/iujk_buktipenerimaan.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	function cetakSk(){
		$iujkdet_id  = $this->input->post('iujkdet_id');
		$params = array(
			"det_iujk_id"=>$iujkdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_iujk_det->search($params);
		$data['printrecord'] = $printrecord[1];
		$sub = $data['printrecord'][0];
		if($sub->det_iujk_sk == ''){
			echo 'nosk';
		}else if($sub->det_iujk_kadaluarsa == '' || $sub->det_iujk_kadaluarsa == '0000-00-00'){
			echo 'notglkadaluarsa';
		}else{
			$print_view=$this->load->view('template/p_iujk_sk.php',$data,TRUE);
			$print_file=fopen('print/iujk_sk.html','w+');
			fwrite($print_file, $print_view);
			echo 'success';
		}
	}
	function getBidang(){
		$iujkdet_id = $this->input->post("iujkdet_id");
		$result = $this->m_t_iujk_det->getBidang($iujkdet_id);
		echo json_encode($result);
	}
	function getSubBidang(){
		$iujkdet_id = $this->input->post("iujkdet_id");
		$result = $this->m_t_iujk_det->getSubBidang($iujkdet_id);
		echo json_encode($result);
	}
	
}