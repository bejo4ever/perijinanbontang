<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tdp extends CI_Controller {

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
		$crud->set_table('vtdp');
		$crud->set_subject('Data Permohonan Izin TDP');
		$crud->columns('no_agenda','nosk','perusahaan','tglpermohonan','status','catatan_bo','lama_proses');
		$crud->set_primary_key('id','vtdp');
		//$crud->set_relation_n_n('perusahaan', 'tdp','perusahaan','permohonan_id','perusahaan_id','nama');
		//$crud->set_relation('spermohonan_id', 'spermohonan','status');

		$crud->display_as('no_agenda','No.Agenda');
		$crud->display_as('nosk','No.SK');
		$crud->display_as('perusahaan','Nama Perusahaan');
		$crud->display_as('lama_proses','Lama Proses');
        
		$crud->add_action('Hapus Data', '', site_url() . '/tdp/simpen_hapus','delete-icon');
		$crud->add_action('Edit Data', '',  site_url() . '/tdp/ubah','edit-icon');
		$crud->add_action('Ubah Status Pemrosessan Data', '', 'tdp','proses-icon');
		$crud->add_action('Cetak Tanda Bukti', '', 'tdp/cetak_sk','tbukti-icon','','penerimaan','bap','bukti');		
		$crud->add_action('Cetak SK', '', 'tdp/cetak_sk','sk-icon','','sk','skatas');

		
		$crud->where('ijin_id','6');
		$crud->order_by('tglpermohonan desc,id desc,perusahaan','desc');
		$crud->unset_export();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__)));
	   
        $output = $crud->render();
 		$this->load->view('home.php');
        $this->load->view('vtdp_daftar.php',$output);
	}

	public function cetak_sk()
	{
		$id = $_GET['id'];
		$this->load->model('String_model');  
		$this->load->model('Tdp_cetak_sk_model');  
		$this->load->model('Permohonan_cetak_model');  		
		$this->load->view('tdp_cetak_sk');		
	}
	
	
	public function tambah()
    {
		$this->load->model('Permohonan_model');  		
		$this->load->model('Umum_model');
		$this->load->model('Perusahaan_model');
		
		
		$output = $this->vsiup('tambah');

		$output1 = $this->vpemohon('tambah');	

		$output2 = $this->vperusahaan('tambah');

		$output3 = $this->KLUI('tambah');	      
		
		$js_files = $output->js_files + $output1->js_files + $output2->js_files + $output3->js_files;
		$css_files = $output->css_files + $output1->css_files + $output2->js_files + $output3->js_files;

		$data['output'] = $output;
		$data['output1'] = $output1;
		$data['output2'] = $output2;
		$data['output3'] = $output3;
		$this->load->view('home.php');
        $this->load->view('vtdp_tambah.php',array(
											'js_files' => $js_files,
											'css_files' => $css_files,
											'output'	=> $data));
		             
    }

	public function ubah()
    {
		$id=$_GET['id'];
		$this->load->model('Permohonan_model');  		
		$this->load->model('Umum_model');
		$this->load->model('Perusahaan_model');
		$this->load->model('Permohonansyarat_model');
		
		
		$output1 = $this->vpemohon("ubah");	

		$output2 = $this->vperusahaan("ubah");

		$output3 = $this->KLUI("ubah");	      
		
		$js_files = $output1->js_files + $output2->js_files + $output3->js_files;
		$css_files = $output1->css_files + $output2->js_files + $output3->js_files;

	
		$data['output1'] = $output1;
		$data['output2'] = $output2;
		$data['output3'] = $output3;
		$this->load->view('home.php');
        $this->load->view('vtdp_edit.php',array(
											'js_files' => $js_files,
											'css_files' => $css_files,
											'output'	=> $data));
	}

	public function simpen_baru()
    {
	$this->load->model('Tdp_model');
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
		
				$data["perusahaan_id"]=$_POST['perusahaan_id'];
				$data["npwp2"]=$_POST['npwp2'];
                $data["nama2"]=$_POST['nama2'];
				$data["noakta2"]=$_POST['noakta2'];
				$data["tglakta2"]=$_POST['tglakta2']; if ($_POST['tglakta2']=="") $data["tglakta2"]="00-00-0000";
                $data["notaris2"]=$_POST['notaris2'];
				$data["bentuk_id2"]=$_POST['bentuk_id2'];
				$data["sperusahaan_id2"]=$_POST['sperusahaan_id2'];
				$data["jalan2"]=$_POST['alamat2'];
				$data["rt2"]=$_POST['rt2'];
				$data["kec2"]=$_POST['kec2'];
				$data["desa2"]=$_POST['desa2'];				
				$data["telp2"]=$_POST['telp2'];
				$data["fax2"]=$_POST['fax2'];
				$data["rw2"]="";
				$data["propinsi_id2"]="";
				$data["kabkota_id2"]="";
				$data["kodepos2"]="";
				$data["jenis_perusahaan"]="";
				$data["statustempat_id"]="";
				$data["usaha"]="";
				$data["butara"]="";
				$data["bselatan"]="";
				$data["btimur"]="";
				$data["bbarat"]="";
				$data["modal"]="";
				$data["merk"]="";

				$data["klui3"]=$_POST['klui3'];
                $data["klui_pokok3"]=$_POST['klui_pokok3'];
				$data["no_menkeh3"]=$_POST['no_menkeh3'];
				$data["tgl_menkeh3"]=$_POST['tgl_menkeh3']; 
				$data["no_aapad3"]=$_POST['no_aapad3'];
				$data["tgl_aapad3"]=$_POST['tgl_aapad3']; 
				$data["no_lpad3"]=$_POST['no_lpad3'];
				$data["tgl_lpad3"]=$_POST['tgl_lpad3']; 

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

				$data["ijin_id"]=6; //untuk TDP
				$jumlah=$_POST['jumlah'];
				
				
				$idpemohon=$this->Pemohon_model->put_insert_pemohon($data);
				if($idpemohon > 0)
				{
				$idperusahaan=$this->Perusahaan_model->put_insert_perusahaan($data);
				$noregistrasi=$this->Umum_model->GetNoRegistrasi(6); //cari no reg TDP
				$idpermohonan=$this->Permohonan_model->put_insert_permohonan($data,$idpemohon,$noregistrasi);
				$this->Tdp_model->put_insert_tdp($data,$idperusahaan,$idpermohonan);				
				
				
				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_insert_permohonansyarat($syarat,$idpermohonan,$Hsyarat);
					}
				$this->Permohonan_model->put_insert_statuspermohonan($idpermohonan,2,date("Y-m-d H:i:s"));
				}
	

	redirect('tdp');  
	}

	public function simpen_ubah()
    {
	$this->load->model('Tdp_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');
		
				$data["id"]=$_POST['id'];
				$data["tdp_id"]=$_POST['tdp_id'];
				$data["noregistrasi"]=$_POST['noregistrasi'];
				$data["tglmohon"]=$_POST['tglmohon'];
				$data["jnspermohonan"]=$_POST['jnspermohonan'];
				$data["counter_daftar"]=$_POST['counter_daftar'];
				$data["no_agenda"]=$_POST['no_agenda'];
					
				$data["pemohon_id"]=$_POST['pemohon_id'];
				$data["ktp"]=$_POST['ktp1'];
                $data["nama"]=$_POST['nama1'];
				$data["tlahir"]=$_POST['tlahir1'];
				$data["tgllahir"]=$_POST['tgllahir1'];
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
				$data["noakta2"]=$_POST['noakta2'];
				$data["tglakta2"]=$_POST['tglakta2'];
                $data["notaris2"]=$_POST['notaris2'];
				$data["bentuk_id2"]=$_POST['bentuk_id2'];
				$data["sperusahaan_id2"]=$_POST['sperusahaan_id2'];
				$data["jalan2"]=$_POST['alamat2'];
				$data["rt2"]=$_POST['rt2'];
				$data["kec2"]=$_POST['kec2'];
				$data["desa2"]=$_POST['desa2'];				
				$data["telp2"]=$_POST['telp2'];
				$data["fax2"]=$_POST['fax2'];
				$data["rw2"]="";
				$data["propinsi_id2"]="";
				$data["kabkota_id2"]="";
				$data["kodepos2"]="";
				$data["jenis_perusahaan"]="";
				$data["statustempat_id"]="";
				$data["usaha"]="";
				$data["butara"]="";
				$data["bselatan"]="";
				$data["btimur"]="";
				$data["bbarat"]="";
				$data["modal"]="";
				$data["merk"]="";

				$data["klui3"]=$_POST['klui3'];
                $data["klui_pokok3"]=$_POST['klui_pokok3'];
				$data["no_menkeh3"]=$_POST['no_menkeh3'];
				$data["tgl_menkeh3"]=$_POST['tgl_menkeh3'];
				$data["no_aapad3"]=$_POST['no_aapad3'];
				$data["tgl_aapad3"]=$_POST['tgl_aapad3'];
				$data["no_lpad3"]=$_POST['no_lpad3'];
				$data["tgl_lpad3"]=$_POST['tgl_lpad3'];

				$data["retribusi"]=$_POST['retribusi'];
				$data["tglbayar"]=$_POST['tglbayar'];
				$data["sbayar"]=$_POST['sbayar'];

				$data["nama_bibit"]=$_POST['nama_bibit'];
				$data["jumlah_bibit"]=$_POST['jumlah_bibit'];
				
				$data["nosk"]=$_POST['nosk'];
				$data["tglterbit"]=$_POST['tglterbit'];
				$data["tglexpired"]=$_POST['tglexpired'];
				$data["catatan_bo"]=$_POST['catatan_bo'];
				$data["ketbayar"]="";
				$data["ijin_id"]=6; //untuk TDP
				$jumlah=$_POST['jumlah'];
				
				$this->Tdp_model->put_edit_tdp($data,$data["tdp_id"]);
				$this->Perusahaan_model->put_edit_perusahaan($data,$data["perusahaan_id"]);
				$this->Pemohon_model->put_edit_pemohon($data,$data["pemohon_id"]);
				$this->Permohonan_model->put_edit_permohonan($data,$data["id"]);
				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_edit_permohonansyarat($syarat,$data["id"],$Hsyarat);
					}

	redirect('tdp');  
	}

	public function simpen_hapus()
    {
	$id=$_POST['id'];	

	$this->load->model('Tdp_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');

	$data_siup=$this->Tdp_model->get_data_tdp($id);	
	$this->Perusahaan_model->put_delete_perusahaan($data_siup["perusahaan_id"]);
	$this->Permohonansyarat_model->put_delete_permohonansyarat($id);
	$this->Tdp_model->put_delete_tdp($data_siup["tdp_id"]);
	$this->Pemohon_model->put_delete_pemohon($data_siup["pemohon_id"]);
	$this->Permohonan_model->put_delete_permohonan($id);

	redirect('tdp');  
	}
 
	public function vsiup($jenis)
    {
		$crud = new grocery_CRUD(); 		

        $crud->set_table('vfsiup');
		$crud->columns('nosk','nama','alamat');
		$crud->set_primary_key('id','vfsiup');		
		
		
		$crud->display_as('nosk','No.SK');
		$crud->display_as('nama','Nama Perusahaan');

		$crud->add_action('Pilih', '', 'siup','sk-icon');

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

	public function KLUI($jenis)
    {
		$crud = new grocery_CRUD(); 		

        $crud->set_table('klui');
		$crud->columns('kbli','kegiatan_pokok');			
		
		$crud->display_as('kbli','KBLI');
		$crud->display_as('kegiatan_pokok','Kegiatan Pokok');

		$crud->add_action('Pilih', '', 'klui','sk-icon');

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
