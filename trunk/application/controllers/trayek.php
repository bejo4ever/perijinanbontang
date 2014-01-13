<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trayek extends CI_Controller {

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
		$crud->set_table('vtrayek');
		$crud->set_subject('Data Permohonan Izin Trayek');
		$crud->columns('no_agenda','nosk','perusahaan','nama','tglpermohonan','status','catatan_bo','lama_proses');
		$crud->set_primary_key('id','vtrayek');
		//$crud->set_relation_n_n('perusahaan', 'tdp','perusahaan','permohonan_id','perusahaan_id','nama');
		//$crud->set_relation('spermohonan_id', 'spermohonan','status');
		$crud->display_as('no_agenda','No.Agenda');
		$crud->display_as('nosk','No.SK');
		$crud->display_as('perusahaan','Nama Perusahaan');
		$crud->display_as('nama','Nama Pemohon');
		$crud->display_as('tglpermohonan','Tgl Permohonan');		
		$crud->display_as('catatan_bo','Catatan BO');
		$crud->display_as('lama_proses','Lama Proses');
        
		$crud->add_action('Hapus Data', '', site_url() . '/trayek/simpen_hapus','delete-icon');
		$crud->add_action('Edit Data', '',  site_url() . '/trayek/ubah','edit-icon');
		$crud->add_action('Ubah Status Pemrosessan Data', '', 'trayek','proses-icon');
		$crud->add_action('Cetak Tanda Bukti Trayek', '', 'trayek/cetak_sk','tbukti-icon','','kontrol','bap','bukti');	
		
		
		$crud->where('ijin_id','18');
		$crud->order_by('tglpermohonan desc,id desc,nama','desc');		
		$crud->unset_export();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();		
		$crud->set_crud_url_path(str_replace("?","/",site_url(strtolower(__CLASS__."/".__FUNCTION__))),str_replace("?","/",site_url(strtolower(__CLASS__))));
	   
        $output = $crud->render();
 		$this->load->view('home.php');
        $this->load->view('vtrayek_daftar.php',$output);
	}

	public function cetak_sk()
	{
		$id = $_GET['id'];
		$this->load->model('String_model');  
		$this->load->model('Permohonan_cetak_model');  		
		$this->load->model('Trayek_cetak_sk_model');  		
		$this->load->view('Trayek_cetak_sk');		
	}

	public function tambah()
    {
		$this->load->model('Trayek_model'); 
		$this->load->model('Permohonan_model');  		
		$this->load->model('Umum_model');
		$this->load->model('Perusahaan_model');
			
		
		$output = $this->vHO('tambah'); 

		$output1 = $this->vpemohon('tambah');	

		$output2 = $this->vperusahaan('tambah');    
		
		$js_files = $output->js_files + $output1->js_files + $output2->js_files;
		$css_files = $output->css_files + $output1->css_files + $output2->js_files;

		$data['output'] = $output;
		$data['output1'] = $output1;
		$data['output2'] = $output2;		
		$this->load->view('home.php');
        $this->load->view('vtrayek_tambah.php',array(
											'js_files' => $js_files,
											'css_files' => $css_files,
											'output'	=> $data));
		             
    }

	public function ubah()
    {
		$id=$_GET['id'];

		$this->load->model('Trayek_model');
		$this->load->model('Permohonan_model');  		
		$this->load->model('Umum_model');
		$this->load->model('Perusahaan_model');
		$this->load->model('Permohonansyarat_model');
		
				
		$output = $this->vHO('ubah');     
		
		$data['output'] = $output;		
		
		$this->load->view('home.php');
        $this->load->view('vtrayek_edit.php',$output);
		             
    }

	public function simpen_baru()
    {
	$this->load->model('Trayek_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');
	$this->load->model('Umum_model');
						
				
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
		
				$data["perusahaan_id"]=$_POST['perusahaan_id'];
				$data["npwp2"]=$_POST['npwp2'];
                $data["nama2"]=$_POST['nama2'];
				$data["noakta2"]="";				
                $data["notaris2"]="";
				$data["bentuk_id2"]=$_POST['bentuk2'];
				$data["sperusahaan_id2"]="";
				$data["jalan2"]=$_POST['alamat2'];
				$data["rt2"]=$_POST['rt2'];
				$data["kec2"]=$_POST['kec2'];
				$data["desa2"]=$_POST['desa2'];				
				$data["telp2"]=$_POST['telp2'];
				$data["fax2"]=$_POST['fax2'];
				$data["rw2"]="";
				$data["tglakta2"]="";
				$data["propinsi_id2"]="";
				$data["kabkota_id2"]="";
				$data["kodepos2"]="";
				$data["modal"]="";
				$data["merk"]="";
				
				$data["tahun"]=""; 
    			$data["kecamatan_id3"]=$_POST['kec4'];
    			$data["desa_id3"]=$_POST['desa4'];
    			$data["tglrekomendasidishubkominfo"]=$_POST['tglrekomendasidishubkominfo'];	
    
    			$data["nomor_kendaraan"]=$_POST['nomor_kendaraan4'];
				$data["nama_pemilik"]=$_POST['nama_pemilik4'];
				$data["alamat_pemilik"]=$_POST['alamat_pemilik4'];
    			$data["no_hp"]=$_POST['no_hp4'];
    			$data["nomor_rangka"]=$_POST['nomor_rangka4'];
    			$data["nomor_mesin"]=$_POST['nomor_mesin4'];
    			$data["kode_trayek"]=$_POST['kode_trayek4'];
    			$data["nom_uji_berkala"]=$_POST['nom_uji_berkala4'];
    			$data["rt"]=$_POST['rt4'];
    			$data["no_suratpermohonan"]=$_POST['no_suratpermohonan'];
				$data["tglsuratmohon"]=$_POST['tglsuratmohon'];
	
				$data["no_rekomendasidishubkominfo"]=$_POST['no_rekomendasidishubkominfo'];	
				$data["merk_kendaraan"]=$_POST['merk_kendaraan4'];
				$data["tahun_pembuatan"]=$_POST['tahun_pembuatan4'];
				$data["daya_angkut"]=$_POST['daya_angkut4'];
				$data["kode_pelayanan"]=$_POST['kode_pelayanan4'];
				
				$data["retribusi"]=$_POST['retribusi'];
				$data["tglbayar"]=$_POST['tglbayar']; 
				$data["sbayar"]=$_POST['sbayar'];

				$data["nama_bibit"]="";
				$data["jumlah_bibit"]=0;
				$data["jenis_perusahaan"]="";
				$data["statustempat_id"]="";
				$data["usaha"]="";
				$data["butara"]="";
				$data["bselatan"]="";
				$data["btimur"]="";
				$data["bbarat"]="";								
				
				$data["noregistrasi"]="";				
				$data["nosk"]=$_POST['no_sk'];
				$data["tglterbit"]="";
				$data["tglexpired"]="";
				$data["catatan_bo"]="";				
				$data["ketbayar"]="";
				$data["atasnama"]="";
	   			$data["jabatan"]="";
	   			$data["nip"]="";
	   			$data["pejabat"]="";

				$data["ijin_id"]=18; //untuk Trayek
				$jumlah=$_POST['jumlah'];
				
				
				$idpemohon=$this->Pemohon_model->put_insert_pemohon($data);
				if($idpemohon > 0)
				{
				$noregistrasi=$this->Umum_model->GetNoRegistrasi(18); //cari no reg Trayek
				$idpermohonan=$this->Permohonan_model->put_insert_permohonan($data,$idpemohon,$noregistrasi);
				$idperusahaan=$this->Perusahaan_model->put_insert_perusahaan($data);				
				$idTrayek=$this->Trayek_model->put_insert_trayek($data,$idperusahaan,$idpermohonan);			
				
				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_insert_permohonansyarat($syarat,$idpermohonan,$Hsyarat);
					}
				$this->Permohonan_model->put_insert_statuspermohonan($idpermohonan,2,date("Y-m-d H:i:s"));
				}
	

	redirect('trayek'); 
	}

	public function simpen_ubah()
    {
	$this->load->model('Trayek_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');
	$this->load->model('Umum_model');
		
				$data["id"]=$_POST['id'];
				$data["trayek_id"]=$_POST['trayek_id'];
				
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
				$data["noakta2"]="";				
                $data["notaris2"]="";
				$data["bentuk_id2"]=$_POST['bentuk2'];
				$data["sperusahaan_id2"]="";

				$data["perusahaan_id"]=$_POST['perusahaan_id'];
				$data["npwp2"]=$_POST['npwp2'];
                $data["nama2"]=$_POST['nama2'];				
				
				$data["sperusahaan_id2"]="";
				$data["jalan2"]=$_POST['alamat2'];
				$data["rt2"]=$_POST['rt2'];
				$data["kec2"]=$_POST['kec2'];
				$data["desa2"]=$_POST['desa2'];				
				$data["telp2"]=$_POST['telp2'];
				$data["fax2"]=$_POST['fax2'];
				$data["rw2"]="";
				$data["tglakta2"]="";
				$data["propinsi_id2"]="";
				$data["kabkota_id2"]="";
				$data["kodepos2"]="";
				$data["modal"]="";
				$data["merk"]="";
				
				$data["nama_bibit"]="";
				$data["jumlah_bibit"]=0;
				$data["jenis_perusahaan"]="";
				$data["statustempat_id"]="";
				$data["usaha"]="";
				$data["butara"]="";
				$data["bselatan"]="";
				$data["btimur"]="";
				$data["bbarat"]="";		
				
				$data["retribusi"]=$_POST['retribusi'];
				$data["tglbayar"]=$_POST['tglbayar']; 
				$data["sbayar"]=$_POST['sbayar'];

				$data["tahun"]=""; 
    			$data["kecamatan_id3"]=$_POST['kec4'];
    			$data["desa_id3"]=$_POST['desa4'];
    			$data["tglrekomendasidishubkominfo"]=$_POST['tglrekomendasidishubkominfo'];	
    
    			$data["nomor_kendaraan"]=$_POST['nomor_kendaraan4'];
				$data["nama_pemilik"]=$_POST['nama_pemilik4'];
				$data["alamat_pemilik"]=$_POST['alamat_pemilik4'];
    			$data["no_hp"]=$_POST['no_hp4'];
    			$data["nomor_rangka"]=$_POST['nomor_rangka4'];
    			$data["nomor_mesin"]=$_POST['nomor_mesin4'];
    			$data["kode_trayek"]=$_POST['kode_trayek4'];
    			$data["nom_uji_berkala"]=$_POST['nom_uji_berkala4'];
    			$data["rt"]=$_POST['rt4'];
    			$data["no_suratpermohonan"]=$_POST['no_suratpermohonan'];
				$data["tglsuratmohon"]=$_POST['tglsuratmohon'];
	
				$data["no_rekomendasidishubkominfo"]=$_POST['no_rekomendasidishubkominfo'];	
				$data["merk_kendaraan"]=$_POST['merk_kendaraan4'];
				$data["tahun_pembuatan"]=$_POST['tahun_pembuatan4'];
				$data["daya_angkut"]=$_POST['daya_angkut4'];
				$data["kode_pelayanan"]=$_POST['kode_pelayanan4'];
				
				$data["retribusi"]=$_POST['retribusi'];
				$data["tglbayar"]=$_POST['tglbayar']; 
				$data["sbayar"]=$_POST['sbayar'];

				$data["nama_bibit"]="";
				$data["jumlah_bibit"]=0;								
				
				$data["noregistrasi"]=$_POST['noregistrasi'];				
				$data["nosk"]=$_POST['nosk'];
				$data["tglterbit"]=$_POST['tglterbit'];
				$data["tglexpired"]=$_POST['tglexpired'];
				$data["peruntukan"]="";	
				$data["catatan_bo"]=$_POST['catatan_bo'];				
				$data["ketbayar"]="";
				$data["atasnama"]="";
	   			$data["jabatan"]="";
	   			$data["nip"]="";
	   			$data["pejabat"]="";

				$data["ijin_id"]=18; //untuk Trayek
				$jumlah=$_POST['jumlah'];
										
								
				
				$this->Trayek_model->put_edit_trayek($data,$data["trayek_id"]);
				$this->Perusahaan_model->put_edit_perusahaan($data,$data["perusahaan_id"]);
				$this->Pemohon_model->put_edit_pemohon($data,$data["pemohon_id"]);
				$this->Permohonan_model->put_edit_permohonan($data,$data["id"]);
				

				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_edit_permohonansyarat($syarat,$data["id"],$Hsyarat);
					}
	redirect('trayek');	
	}

	
	public function simpen_hapus()
    {
	$id=$_POST['id'];	

	$this->load->model('Trayek_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');

	$data_trayek=$this->Trayek_model->get_data_trayek($id);	
	$this->Perusahaan_model->put_delete_perusahaan($data_trayek["perusahaan_id"]);
	$this->Permohonansyarat_model->put_delete_permohonansyarat($id);
	$this->Trayek_model->put_delete_trayek($data_trayek["trayek_id"]);
	$this->Pemohon_model->put_delete_pemohon($data_trayek["pemohon_id"]);
	$this->Permohonan_model->put_delete_permohonan($id);

	redirect('trayek'); 
	}
 
	
	
	public function vHO($jenis)
    {
		$crud = new grocery_CRUD(); 		

        $crud->set_table('vfho');
		$crud->columns('nosk','nama','alamat');		
		$crud->set_primary_key('id','vfho');
	
		$crud->display_as('nosk','No. SK');
		$crud->display_as('nama','Nama Perusahaan');
		$crud->display_as('alamt','Alamat');

		$crud->add_action('Pilih', '', 'ho','sk-icon');

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

	public function vperusahaan($jenis)
    {
		$crud = new grocery_CRUD(); 		

        $crud->set_table('vperusahaan');
		$crud->columns('npwp','nama','alamat');	
		$crud->set_primary_key('id','vperusahaan');
		
		$crud->display_as('npwp','NPWP Perusahaan');
		$crud->display_as('nama','Nama Perusahaan');

		$crud->add_action('Pilih', '', 'perus','sk-icon');

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
