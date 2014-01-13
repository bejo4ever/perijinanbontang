<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imb extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->database();
		$this->load->helper('url');
		$this->view_data['base_url']=base_url();
		$this->load->library('grocery_CRUD');	
		$this->load->library('calendar');

	}
	
	public function index()
    {
		$this->daftar(); 		  
    }

	public function daftar()
    {
		$crud = new grocery_CRUD();
 		
		
        //$crud->set_table('permohonan');
		$crud->set_table('vimb');
		$crud->set_subject('Data Permohonan Izin IMB');
		$crud->columns('no_agenda','nosk','nama','tglpermohonan','tglsk','tglbayar','no_rekomendasi','status','catatan_bo','lama_proses');
		$crud->set_primary_key('id','vimb');
		//$crud->set_relation_n_n('perusahaan', 'tdp','perusahaan','permohonan_id','perusahaan_id','nama');
		//$crud->set_relation('spermohonan_id', 'spermohonan','status');

		$crud->display_as('no_agenda','No.Agenda');
		$crud->display_as('nosk','No.SK');
		$crud->display_as('nama','Nama Pemohon');
		$crud->display_as('tglpermohonan','Tgl Permohonan');
		$crud->display_as('tglsk','Tgl Rekomen');
		$crud->display_as('tglbayar','Tgl Bayar');
		$crud->display_as('no_rekomendasi','No Rekomendasi');
		$crud->display_as('catatan_bo','Catatan BO');
		$crud->display_as('lama_proses','Lama Proses');
        
		$crud->add_action('Hapus Data', '', site_url() . '/imb/simpen_hapus','delete-icon');
		$crud->add_action('Edit Data', '',  site_url() . '/imb/ubah','edit-icon');
		$crud->add_action('Ubah Status Pemrosessan Data IMB', '', 'imb','proses-icon');
		$crud->add_action('Cetak Tanda Bukti IMB', '', 'imb/cetak_sk','tbukti-icon','','kontrol','bap','bukti');	
		$crud->add_action('Cetak SK IMB', '', 'imb','sk-icon');

		
		//$crud->where('ijin_id','6');
		$crud->order_by('tglpermohonan desc,id desc,nama','desc');
		$crud->unset_export();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__)));
	   
        $output = $crud->render();
 		$this->load->view('home.php');
        $this->load->view('vimb_daftar.php',$output);
	}

	public function cetak_sk()
	{
		$id = $_GET['id'];
		$this->load->model('String_model');  
		$this->load->model('Imb_cetak_sk_model');  
		$this->load->model('Permohonan_cetak_model');  		
		$this->load->view('Imb_cetak_sk');		
	}

	

	public function get_indeks($tabel,$id)
    {
		$this->load->model('Imb_model');					      		
		
		$data=$this->Imb_model->get_data_indeks($tabel,$id);				
		
		echo json_encode($data);
		             
    }

	public function get_indeks_lokasibangunan($id)
    {
		$this->load->model('Imb_model');					      		
		
		$data=$this->Imb_model->get_data_indeks('lokasibangunan',$id);				
		
		echo json_encode($data);
		             
    }

	public function tambah()
    {
		$this->load->model('Imb_model');
		$this->load->model('Permohonan_model');  		
		$this->load->model('Umum_model');		
				
		$output = $this->vpemohon('tambah');
		    		
		$data['output'] = $output;
		
		$this->load->view('home.php');
        $this->load->view('vimb_tambah.php',$output);
		             
    }
	public function ubah()
    {
		$id=$_GET['id'];
		$this->load->model('Imb_model');
		$this->load->model('Permohonan_model');  		
		$this->load->model('Umum_model');		
		$this->load->model('Permohonansyarat_model');
		
		$output = $this->vpemohon('ubah');		
		

		$data['output'] = $output;
		
		$this->load->view('home.php');
        $this->load->view('vimb_edit.php',$output);
		             
    }

	public function simpen_baru()
    {
	$this->load->model('Imb_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');
	$this->load->model('Umum_model');
						
				
				$data["tglmohon"]=$_POST['tglmohon']; if ($_POST['tglmohon']=="") $data["tglmohon"]="00-00-0000";
				$data["jnspermohonan"]=$_POST['jnspermohonan'];
				$data["counter_daftar"]=$_POST['counter_daftar'];
				$data["no_agenda"]=$_POST['no_agenda'];
					
				$data["pemohon_id"]=$_POST['pemohon_id'];
				$data["ktp"]=$_POST['ktp1'];
                $data["nama"]=$_POST['nama1'];
				$data["tlahir"]=$_POST['tlahir1'];
				$data["tgllahir"]=$_POST['tgllahir1']; if ($_POST['tgllahir1']=="") $data["tgllahir"]="00-00-0000";
				$data["pekerjaan"]=$_POST['pekerjaan1'];
				$data["warga_id1"]=$_POST['warga_id1'];
				$data["jalan1"]=$_POST['jalan1'];
				$data["rt1"]=$_POST['rt1'];
				$data["kec1"]=$_POST['kec1'];
				$data["desa1"]=$_POST['desa1'];
				$data["telp1"]=$_POST['telp1'];
				$data["hp1"]=$_POST['hp1'];
				$data["tahun"]="";
				$data["rw1"]="";
				$data["propinsi_id1"]="";
				$data["kabkota_id1"]="";
				

				$data["tahun"]="";
				$data["indekstingkat_id"]=$_POST['ktingkat1'];
    			$data["struktur_id"]=$_POST['kstruktur1'];
				$data["fsbangunan_id"]=$_POST['kfungsi1'];
				$data["lokasi"]=$_POST['jalan2'];
				$data["rt2"]=$_POST['rt2'];
				$data["rw2"]="";//$_POST['rw2'];
				$data["kecamatan_id"]=$_POST['kec2'];
				$data["desa_id"]=$_POST['desa2'];
				$data["peruntukan"]=$_POST['peruntukan'];
				$data["sertifikat_id"]=$_POST['sertifikat'];
				$data["luas"]=$_POST['luas'];
				$data["butara"]=$_POST['sutara'];
				$data["bselatan"]=$_POST['sselatan'];
				$data["bbarat"]=$_POST['sbarat'];
				$data["btimur"]=$_POST['stimur'];
				$data["pondasi"]=$_POST['bpondasi'];
				$data["sloof"]=$_POST['bsloof'];
				$data["tiang"]=$_POST['btiang'];
				$data["dinding"]=$_POST['bdinding'];
				$data["ratap"]=$_POST['bratap'];
				$data["patap"]=$_POST['bpatap'];
				$data["lantai"]=$_POST['blantai'];
				$data["jmllantai"]="";//$_POST['jmllantai'];
				$data["kelasjalan_id"]="";//$_POST['kelasjalan_id'];
				$data["hargataksir"]="";//$_POST['hargataksir'];
				$data["flafoon"]=$_POST['plafoon'];
				$data["retlama"]="";//$_POST['$retLama'];	
				$data["no_rekomendasi"]=$_POST['no_rekomendasi'];

				$data["retribusi"]=$_POST['retribusi'];
				$data["tglbayar"]=$_POST['tglbayar']; 
				$data["sbayar"]=$_POST['sbayar'];

				$data["nama_bibit"]=$_POST['nama_bibit'];
				$data["jumlah_bibit"]=$_POST['jumlah_bibit'];
				
				
				$data["noregistrasi"]="";				
				$data["nosk"]="";
				$data["tglterbit"]="";
				$data["tglexpired"]="";
				$data["catatan_bo"]="";				
				$data["ketbayar"]="";
				$data["atasnama"]="";
	   			$data["jabatan"]="";
	   			$data["nip"]="";
	   			$data["pejabat"]="";

				$data["ijin_id"]=1; //untuk IMB
				$jumlah=$_POST['jumlah'];
				
				
				$idpemohon=$this->Pemohon_model->put_insert_pemohon($data);
				if($idpemohon > 0)
				{				
				$noregistrasi=$this->Umum_model->GetNoRegistrasi(1); //cari no reg IMB
				$idpermohonan=$this->Permohonan_model->put_insert_permohonan($data,$idpemohon,$noregistrasi);
				$idIMB=$this->Imb_model->put_insert_imb($data,$idpermohonan,$noregistrasi);				
				
				for ($i=1;$i<=$_POST['totaldatabangunan'];$i++)
					{
					$data_bangunan["klokasi"]=$_POST["klokasi$i"];
					$data_bangunan["ktingkat"]=$_POST["ktingkat$i"];
					$data_bangunan["kfungsi"]=$_POST["kfungsi$i"];
					$data_bangunan["kstruktur"]=$_POST["kstruktur$i"];
					$data_bangunan["luasbangunan"]=$_POST["luasbangunan$i"];
			
					$this->Imb_model->put_insert_databangunan($data_bangunan,$idIMB);				

					$dataindeks["nkluas"]=$_POST["a$i"];
					$dataindeks["nktingkat"]=$_POST["b$i"];
					$dataindeks["nklokasi"]=$_POST["c$i"];
					$dataindeks["nkfungsi"]=$_POST["d$i"];
					$dataindeks["nkstruktur"]=$_POST["e$i"];
					$dataindeks["hargataksir"]=$_POST["harga$i"];
					$dataindeks["banyakunit"]=$_POST["unit$i"];
	
					$this->Imb_model->put_insert_indeksbangunan($dataindeks,$idIMB);
					}
				
				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_insert_permohonansyarat($syarat,$idpermohonan,$Hsyarat);
					}
				$this->Permohonan_model->put_insert_statuspermohonan($idpermohonan,2,date("Y-m-d H:i:s"));
				}
	

	redirect('imb'); 
	}

	public function simpen_ubah()
    {
	$this->load->model('Imb_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');
	$this->load->model('Umum_model');
						
				$data["id"]=$_POST['id'];
				$data["tglmohon"]=$_POST['tglmohon']; if ($_POST['tglmohon']=="") $data["tglmohon"]="00-00-0000";
				$data["jnspermohonan"]=$_POST['jnspermohonan'];
				$data["counter_daftar"]="";
				$data["no_agenda"]=$_POST['no_agenda'];
					
				$data["pemohon_id"]=$_POST['pemohon_id'];
				$data["ktp"]=$_POST['ktp1'];
                $data["nama"]=$_POST['nama1'];
				$data["tlahir"]=$_POST['tlahir1'];
				$data["tgllahir"]=$_POST['tgllahir1']; if ($_POST['tgllahir1']=="") $data["tgllahir"]="00-00-0000";
				$data["pekerjaan"]=$_POST['pekerjaan1'];
				$data["warga_id1"]=$_POST['warga_id1'];
				$data["jalan1"]=$_POST['jalan1'];
				$data["rt1"]=$_POST['rt1'];
				$data["kec1"]=$_POST['kec1'];
				$data["desa1"]=$_POST['desa1'];
				$data["telp1"]=$_POST['telp1'];
				$data["hp1"]=$_POST['hp1'];
				$data["tahun"]="";
				$data["rw1"]="";
				$data["propinsi_id1"]="";
				$data["kabkota_id1"]="";
				

				$data["tahun"]="";
				$data["indekstingkat_id"]=$_POST['ktingkat1'];
    			$data["struktur_id"]=$_POST['kstruktur1'];
				$data["fsbangunan_id"]=$_POST['kfungsi1'];
				$data["lokasi"]=$_POST['jalan2'];
				$data["rt2"]=$_POST['rt2'];
				$data["rw2"]="";//$_POST['rw2'];
				$data["kecamatan_id"]=$_POST['kec2'];
				$data["desa_id"]=$_POST['desa2'];
				$data["peruntukan"]=$_POST['peruntukan'];
				$data["sertifikat_id"]=$_POST['sertifikat'];
				$data["luas"]=$_POST['luas'];
				$data["butara"]=$_POST['sutara'];
				$data["bselatan"]=$_POST['sselatan'];
				$data["bbarat"]=$_POST['sbarat'];
				$data["btimur"]=$_POST['stimur'];
				$data["pondasi"]=$_POST['bpondasi'];
				$data["sloof"]=$_POST['bsloof'];
				$data["tiang"]=$_POST['btiang'];
				$data["dinding"]=$_POST['bdinding'];
				$data["ratap"]=$_POST['bratap'];
				$data["patap"]=$_POST['bpatap'];
				$data["lantai"]=$_POST['blantai'];
				$data["jmllantai"]="";//$_POST['jmllantai'];
				$data["kelasjalan_id"]="";//$_POST['kelasjalan_id'];
				$data["hargataksir"]="";//$_POST['hargataksir'];
				$data["flafoon"]=$_POST['plafoon'];
				$data["retlama"]="";//$_POST['$retLama'];	
				$data["no_rekomendasi"]=$_POST['no_rekomendasi'];

				$data["retribusi"]=$_POST['retribusi'];
				$data["tglbayar"]=$_POST['tglbayar']; 
				$data["sbayar"]=$_POST['sbayar'];

				$data["nama_bibit"]=$_POST['nama_bibit'];
				$data["jumlah_bibit"]=$_POST['jumlah_bibit'];
				
				
				$data["noregistrasi"]=$_POST['no_registrasi'];				
				$data["nosk"]="";
				$data["tglterbit"]="";
				$data["tglexpired"]="";
				$data["catatan_bo"]="";				
				$data["ketbayar"]="";
				$data["atasnama"]="";
	   			$data["jabatan"]="";
	   			$data["nip"]="";
	   			$data["pejabat"]="";

				$data["ijin_id"]=1; //untuk IMB
				$jumlah=$_POST['jumlah'];
				$data["imb_id"]=$_POST['imb_id'];
				
				$this->Pemohon_model->put_edit_pemohon($data,$data["pemohon_id"]);	
				$this->Permohonan_model->put_edit_permohonan($data,$data["id"]);
				
				$this->Imb_model->put_edit_imb($data,$data["imb_id"]);				
				
				for ($i=1;$i<=$_POST['totaldatabangunan'];$i++)
					{
					$data_bangunan["klokasi"]=$_POST["klokasi$i"];
					$data_bangunan["ktingkat"]=$_POST["ktingkat$i"];
					$data_bangunan["kfungsi"]=$_POST["kfungsi$i"];
					$data_bangunan["kstruktur"]=$_POST["kstruktur$i"];
					$data_bangunan["luasbangunan"]=$_POST["luasbangunan$i"];
					$ImbData_id=$_POST["ImbData_id$i"];	
			
					$this->Imb_model->put_edit_databangunan($data_bangunan,$ImbData_id);				

					$dataindeks["nkluas"]=$_POST["a$i"];
					$dataindeks["nktingkat"]=$_POST["b$i"];
					$dataindeks["nklokasi"]=$_POST["c$i"];
					$dataindeks["nkfungsi"]=$_POST["d$i"];
					$dataindeks["nkstruktur"]=$_POST["e$i"];
					$dataindeks["hargataksir"]=$_POST["harga$i"];
					$dataindeks["banyakunit"]=$_POST["unit$i"];
					$ImbIndeks_id=$_POST["ImbIndeks_id$i"];
	
					$this->Imb_model->put_edit_indeksbangunan($dataindeks,$ImbIndeks_id);
					}
				
				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_edit_permohonansyarat($syarat,$data["id"],$Hsyarat);
					}				
				
	redirect('imb'); 
	}

	public function simpen_hapus()
    {
	$id=$_POST['id'];	

	$this->load->model('Imb_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');

	$data_siup=$this->Imb_model->get_data_imb($id);		
	$this->Permohonansyarat_model->put_delete_permohonansyarat($id);
	$this->Imb_model->put_delete_imb($data_siup["imb_id"]);
	$this->Pemohon_model->put_delete_pemohon($data_siup["pemohon_id"]);
	$this->Permohonan_model->put_delete_permohonan($id);

	redirect('imb');  
	}

	public function put_imbdata_imbindeks($idIMB)
    {
	$this->load->model('Imb_model');
	
	$data_bangunan["klokasi"]=0;
	$data_bangunan["ktingkat"]=0;
	$data_bangunan["kfungsi"]=0;
	$data_bangunan["kstruktur"]=0;
	$data_bangunan["luasbangunan"]=0;
	
	$this->Imb_model->put_insert_databangunan($data_bangunan,$idIMB);

	$dataindeks["nkluas"]=0;
	$dataindeks["nktingkat"]=0;
	$dataindeks["nklokasi"]=0;
	$dataindeks["nkfungsi"]=0;
	$dataindeks["nkstruktur"]=0;
	$dataindeks["hargataksir"]=0;
	$dataindeks["banyakunit"]=0;
	
	$this->Imb_model->put_insert_indeksbangunan($dataindeks,$idIMB);	

	echo "Ok";
	}

	public function del_imbdata_imbindeks($idDataIMB,$idIndeksIMB)
    {
	$this->load->model('Imb_model');
	
	$this->Imb_model->get_delete_imbdata($idDataIMB);				
	$this->Imb_model->get_delete_imbindeks($idIndeksIMB);

	echo "Ok";
	}

	 
	
	public function vpemohon($jenis)
    {
		$crud = new grocery_CRUD(); 		

        $crud->set_table('vpemohon');
		$crud->columns('ktp','nama','tempatlahir','alamat');	
		$crud->set_primary_key('id','vpemohon');

		$crud->display_as('ktp','No. KTP');
		$crud->display_as('tempatlahir','Tempat & Tgl Lahir');

		$crud->add_action('Pilih', '', 'pemohon','sk-icon');
		

		$crud->unset_export();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_print();
		$crud->unset_read();
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/".$jenis)));

		$output= $crud->render(); 
		return $output;
	}

	
		
}
