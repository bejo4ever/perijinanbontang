<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reklame extends CI_Controller {

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
		$crud->set_table('vreklame');
		$crud->set_subject('Data Permohonan Izin Reklame');
		$crud->columns('no_agenda','nosk','perusahaan','tglpermohonan','status','catatan_bo','lama_proses');
		$crud->set_primary_key('id','vreklame');
		//$crud->set_relation_n_n('perusahaan', 'tdp','perusahaan','permohonan_id','perusahaan_id','nama');
		//$crud->set_relation('spermohonan_id', 'spermohonan','status');
		$crud->display_as('no_agenda','No.Agenda');
		$crud->display_as('nosk','No.SK');
		$crud->display_as('perusahaan','Nama Perusahaan');		
		$crud->display_as('tglpermohonan','Tgl Permohonan');		
		$crud->display_as('catatan_bo','Catatan BO');
		$crud->display_as('lama_proses','Lama Proses');
        
		$crud->add_action('Hapus Data', '', site_url() . '/reklame/simpen_hapus','delete-icon');
		$crud->add_action('Edit Data', '',  site_url() . '/reklame/ubah','edit-icon');
		$crud->add_action('Ubah Status Pemrosessan Data', '', 'reklame','proses-icon');
		$crud->add_action('Cetak Tanda Bukti Reklame', '', 'reklame/cetak_sk','tbukti-icon','','kontrol','bap','bukti');	
		$crud->add_action('Cetak SK', '', 'reklame/cetak_sk','sk-icon','','sk','skatas');
		
		$crud->where('ijin_id','3');
		$crud->order_by('tglpermohonan desc,id desc,nama','desc');		
		$crud->unset_export();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__)));
	   
        $output = $crud->render();
 		$this->load->view('home.php');
        $this->load->view('vreklame_daftar.php',$output);
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
		$this->load->model('Reklame_model'); 
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
        $this->load->view('vreklame_tambah.php',array(
											'js_files' => $js_files,
											'css_files' => $css_files,
											'output'	=> $data));
		             
    }

	public function ubah()
    {
		$id=$_GET['id'];

		$this->load->model('Reklame_model');
		$this->load->model('Permohonan_model');  		
		$this->load->model('Umum_model');
		$this->load->model('Perusahaan_model');
		$this->load->model('Permohonansyarat_model');
		
				
		$output = $this->vHO('tambah'); 

		$output1 = $this->vpemohon('tambah');	

		$output2 = $this->vperusahaan('tambah');    
		
		$js_files = $output->js_files + $output1->js_files + $output2->js_files;
		$css_files = $output->css_files + $output1->css_files + $output2->js_files;

		$data['output'] = $output;
		$data['output1'] = $output1;
		$data['output2'] = $output2;	    
		
		
		$this->load->view('home.php');
        $this->load->view('vreklame_edit.php',array(
											'js_files' => $js_files,
											'css_files' => $css_files,
											'output'	=> $data));
		             
    }

	public function simpen_baru()
    {
	$this->load->model('Reklame_model');
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
				
				$data["ho_id"]=$_POST['ho_id'];
				$data["tglberlaku"]="";
				$data["tglberakhir"]="";

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

				$data["nama_bibit"]="";
				$data["jumlah_bibit"]=0;
				
												
				
				$data["noregistrasi"]="";				
				$data["nosk"]="";
				$data["tglterbit"]="";
				$data["tglexpired"]="";
				$data["catatan_bo"]="";				
				$data["ketbayar"]=$_POST['ketbayar'];
				$data["atasnama"]="";
	   			$data["jabatan"]="";
	   			$data["nip"]="";
	   			$data["pejabat"]="";

				$data["ijin_id"]=3; //untuk Reklame
				$jumlah=$_POST['jumlah'];
				
				
				$idpemohon=$this->Pemohon_model->put_insert_pemohon($data);
				if($idpemohon > 0)
				{
				$noregistrasi=$this->Umum_model->GetNoRegistrasi(3); //cari no reg Reklame
				$idpermohonan=$this->Permohonan_model->put_insert_permohonan($data,$idpemohon,$noregistrasi);
				$idperusahaan=$this->Perusahaan_model->put_insert_perusahaan($data);				
				$idReklame=$this->Reklame_model->put_insert_reklame($data,$idperusahaan,$idpermohonan);			
				for ($i=1;$i<=$_POST['totaldatareklame'];$i++)
					{					

					$data_reklame["jenisreklame_id"]=$_POST["jenisreklame_id$i"];
					$data_reklame["jumlah"]=$_POST["jumlah$i"];
					$data_reklame["ukuran"]=$_POST["ukuran$i"];
					$data_reklame["cakupan_media"]=$_POST["cakupan_media$i"];
					$data_reklame["ilreklame_id"]=$_POST["ilreklame_id$i"];
					$data_reklame["harga"]=$_POST["harga$i"];
					$data_reklame["tanah_pemerintah"]=$_POST["tanah_pemerintah$i"];
					$data_reklame["sifat_reklame"]=$_POST["sifat_reklame$i"];
					$data_reklame["rokok_alkohol"]=$_POST["rokok_alkohol$i"];
					$data_reklame["tempat"]=$_POST["tempat$i"];
	
					$data_reklame["tglmulai"]=$_POST["tglmulai$i"];
		
					$data_reklame["jangkawaktu"]=$_POST["jangkawaktu$i"];
					$data_reklame["satuanwaktu_id"]=$_POST["satuanwaktu_id$i"];					
			
					$this->Reklame_model->put_insert_reklame_detil($data_reklame,$idpermohonan);					
					}

				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_insert_permohonansyarat($syarat,$idpermohonan,$Hsyarat);
					}
				$this->Permohonan_model->put_insert_statuspermohonan($idpermohonan,2,date("Y-m-d H:i:s"));
				}
	

	redirect('reklame'); 
	}

	public function simpen_ubah()
    {
	$this->load->model('Reklame_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');
	$this->load->model('Umum_model');
		
				$data["id"]=$_POST['id'];
				$data["reklame_id"]=$_POST['reklame_id'];
				
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
				
				$data["ho_id"]="";
				$data["tglberlaku"]=$_POST['tglterbit'];
				$data["tglberakhir"]=$_POST['tglexpired'];

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

				$data["nama_bibit"]="";
				$data["jumlah_bibit"]=0;
				
								
				$data["noregistrasi"]=$_POST['noregistrasi'];		
				$data["noho"]="";		
				$data["nosk"]=$_POST['nosk'];
				$data["tglterbit"]=$_POST['tglterbit'];
				$data["tglexpired"]=$_POST['tglexpired'];
				$data["expiredpajak"]=$_POST['expiredpajak'];	
				$data["catatan_bo"]=$_POST['catatan_bo'];				
				$data["ketbayar"]=$_POST['ketbayar'];
				$data["atasnama"]="";
	   			$data["jabatan"]="";
	   			$data["nip"]="";
	   			$data["pejabat"]="";
				$data["tglsurvey"]="";

				$data["ijin_id"]=3; //untuk Reklame
				$jumlah=$_POST['jumlah'];
				
				$this->Reklame_model->put_edit_reklame($data,$data["reklame_id"]);
				$this->Perusahaan_model->put_edit_perusahaan($data,$data["perusahaan_id"]);
				$this->Pemohon_model->put_edit_pemohon($data,$data["pemohon_id"]);
				$this->Permohonan_model->put_edit_permohonan($data,$data["id"]);
				
				for ($i=1;$i<=$_POST['totaldatareklame'];$i++)
					{					
					$data_reklame["ReklameDetail_id"]=$_POST["ReklameDetail_id$i"];
					$data_reklame["jenisreklame_id"]=$_POST["jenisreklame_id$i"];
					$data_reklame["jumlah"]=$_POST["jumlah$i"];
					$data_reklame["ukuran"]=$_POST["ukuran$i"];
					$data_reklame["cakupan_media"]=$_POST["cakupan_media$i"];
					$data_reklame["ilreklame_id"]=$_POST["ilreklame_id$i"];
					$data_reklame["harga"]=$_POST["harga$i"];
					$data_reklame["tanah_pemerintah"]=$_POST["tanah_pemerintah$i"];
					$data_reklame["sifat_reklame"]=$_POST["sifat_reklame$i"];
					$data_reklame["rokok_alkohol"]=$_POST["rokok_alkohol$i"];
					$data_reklame["tempat"]=$_POST["tempat$i"];
	
					$data_reklame["tglmulai"]=$_POST["tglmulai$i"];
		
					$data_reklame["jangkawaktu"]=$_POST["jangkawaktu$i"];
					$data_reklame["satuanwaktu_id"]=$_POST["satuanwaktu_id$i"];					
			
					$this->Reklame_model->put_edit_reklame_detil($data_reklame,$data_reklame["ReklameDetail_id"]);					
					}

				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_edit_permohonansyarat($syarat,$data["id"],$Hsyarat);
					}

	redirect('reklame'); 
	}

	
	public function simpen_hapus()
    {
	$id=$_POST['id'];	

	$this->load->model('Reklame_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');

	$data_reklame=$this->Reklame_model->get_data_reklame($id);	
	$this->Perusahaan_model->put_delete_perusahaan($data_reklame["perusahaan_id"]);
	$this->Permohonansyarat_model->put_delete_permohonansyarat($id);
	$this->Reklame_model->put_delete_reklame($data_reklame["reklame_id"]);
	$this->Reklame_model->put_delete_reklamedetil($data_reklame["permohonan_id"]);
	$this->Pemohon_model->put_delete_pemohon($data_reklame["pemohon_id"]);
	$this->Permohonan_model->put_delete_permohonan($id);

	redirect('reklame'); 
	}
 
	public function del_ReklameDetail($idReklameDetail)
    {
	$this->load->model('Reklame_model');
	
	$this->Reklame_model->get_delete_reklamedetil($idReklameDetail);				

	echo "Ok";
	}

	public function put_ReklameDetail($permohonan_id)
    {
	$this->load->model('Reklame_model');
	
	$data_reklame["jenisreklame_id"]="0";
	$data_reklame["jumlah"]="";
	$data_reklame["ukuran"]="";
	$data_reklame["cakupan_media"]="";
	$data_reklame["ilreklame_id"]="0";
	$data_reklame["harga"]="";
	$data_reklame["tanah_pemerintah"]="";
	$data_reklame["sifat_reklame"]="";
	$data_reklame["rokok_alkohol"]="";
	$data_reklame["tempat"]="";
	
	$data_reklame["tglmulai"]="";
		
	$data_reklame["jangkawaktu"]="";
	$data_reklame["satuanwaktu_id"]="0";

	$this->Reklame_model-> put_insert_reklame_detil($data_reklame,$permohonan_id);				

	echo "Ok";
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
