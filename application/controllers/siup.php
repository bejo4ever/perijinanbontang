<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siup extends CI_Controller {

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
		$crud->set_table('vsiup');
		$crud->set_subject('Data Permohonan Izin SIUP');
		$crud->columns('no_agenda','nosk','perusahaan','tglpermohonan','status','catatan_bo','lama_proses');
		$crud->set_primary_key('id','vsiup');
		//$crud->set_relation_n_n('perusahaan', 'tdp','perusahaan','permohonan_id','perusahaan_id','nama');
		//$crud->set_relation('spermohonan_id', 'spermohonan','status');

		$crud->display_as('no_agenda','No.Agenda');
		$crud->display_as('nosk','No.SK');
		$crud->display_as('perusahaan','Nama Perusahaan');
		$crud->display_as('lama_proses','Lama Proses');
        
		$crud->add_action('Hapus Data', '', site_url() . '/siup/simpen_hapus','delete-icon');
		$crud->add_action('Edit Data', '',  site_url() . '/siup/ubah','edit-icon');
		$crud->add_action('Ubah Status Pemrosessan Data', '', 'siup','proses-icon');
		$crud->add_action('Cetak Tanda Bukti', '', 'siup/cetak_sk','tbukti-icon','','kontrol','bap','bukti');	
		$crud->add_action('Cetak SK', '', 'siup/cetak_sk','sk-icon','','sk','skatas');

		
		$crud->where('ijin_id','4');
		$crud->order_by('tglpermohonan desc,id desc,perusahaan','desc');
		$crud->unset_export();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__)));
	   
        $output = $crud->render();
 		$this->load->view('home.php');
        $this->load->view('vsiup_daftar.php',$output);
	}

	public function cetak_sk()
	{
		$id = $_GET['id'];
		$this->load->model('String_model');  
		$this->load->model('Siup_cetak_sk_model');  
		$this->load->model('Permohonan_cetak_model');  		
		$this->load->view('Siup_cetak_sk');		
	}

	public function tambah()
    {
		$this->load->model('Siup_model'); 
		$this->load->model('Permohonan_model');  		
		$this->load->model('Umum_model');
		$this->load->model('Perusahaan_model');
			
		
		$output = $this->vHO('tambah');     
		
		$data['output'] = $output;		
		$this->load->view('home.php');
        $this->load->view('vsiup_tambah.php',$output);
		             
    }

	public function ubah()
    {
		$id=$_GET['id'];
		$this->load->model('Siup_model');
		$this->load->model('Permohonan_model');  		
		$this->load->model('Umum_model');
		$this->load->model('Perusahaan_model');
		$this->load->model('Permohonansyarat_model');
		
				
		$output = $this->vHO('tambah');     
		
		$data['output'] = $output;		
		$this->load->view('home.php');
        $this->load->view('vsiup_edit.php',$output);
		             
    }

	public function simpen_baru()
    {
	$this->load->model('Siup_model');
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
				$data["kodepos2"]=$_POST['kodepos2'];
				$data["jenis_perusahaan"]="";
				$data["statustempat_id"]=$_POST['tempat'];
				$data["usaha"]="";
				$data["butara"]="";
				$data["bselatan"]="";
				$data["btimur"]="";
				$data["bbarat"]="";
				$data["modal"]=$_POST['modal'];
				$data["merk"]=$_POST['merk'];

				$data["klui3"]="";
                $data["klui_pokok3"]="";
				$data["no_menkeh3"]="";
				$data["tgl_menkeh3"]="";
				$data["no_aapad3"]="";
				$data["tgl_aapad3"]=""; 
				$data["no_lpad3"]="";
				$data["tgl_lpad3"]="";

				$data["retribusi"]=$_POST['retribusi'];
				$data["tglbayar"]=$_POST['tglbayar']; 
				$data["sbayar"]=$_POST['sbayar'];

				$data["nama_bibit"]=$_POST['nama_bibit'];
				$data["jumlah_bibit"]=$_POST['jumlah_bibit'];
				
				$data["klui3"]="";
				
				$data["kbli"]=$_POST['kbli'];
				$data["kelembagaan"]=$_POST['kelembagaan'];
				$data["lembaga"]=$_POST['lembaga'];
				$data["busaha"]=$_POST['busaha'];
				$data["merk"]=$_POST['merk'];
				$data["dagangan"]=$_POST['dagangan'];
				$data["kusaha"]="";

				
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

				$data["ijin_id"]=4; //untuk SIUP
				$jumlah=$_POST['jumlah'];
				
				
				$idpemohon=$this->Pemohon_model->put_insert_pemohon($data);
				if($idpemohon > 0)
				{
				$noregistrasi=$this->Umum_model->GetNoRegistrasi(4); //cari no reg SIUP
				$idpermohonan=$this->Permohonan_model->put_insert_permohonan($data,$idpemohon,$noregistrasi);
				$idperusahaan=$this->Perusahaan_model->put_insert_perusahaan($data);				
				$this->Siup_model->put_insert_siup($data,$idperusahaan,$idpermohonan);				
				
				
				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_insert_permohonansyarat($syarat,$idpermohonan,$Hsyarat);
					}
				$this->Permohonan_model->put_insert_statuspermohonan($idpermohonan,2,date("Y-m-d H:i:s"));
				}
	

	redirect('siup'); 
	}

	public function simpen_ubah()
    {
	$this->load->model('Siup_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');
		
				$data["id"]=$_POST['id'];
				$data["siup_id"]=$_POST['siup_id'];
				
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
				$data["kodepos2"]=$_POST['kodepos2'];
				$data["jenis_perusahaan"]="";
				$data["statustempat_id"]=$_POST['tempat'];
				$data["usaha"]="";
				$data["butara"]="";
				$data["bselatan"]="";
				$data["btimur"]="";
				$data["bbarat"]="";
				$data["modal"]=str_replace(".","",$_POST['modal']);
				$data["merk"]=$_POST['merk'];

				$data["klui3"]="";
                $data["klui_pokok3"]="";
				$data["no_menkeh3"]="";
				$data["tgl_menkeh3"]="";
				$data["no_aapad3"]="";
				$data["tgl_aapad3"]=""; 
				$data["no_lpad3"]="";
				$data["tgl_lpad3"]="";

				$data["retribusi"]=$_POST['retribusi'];
				$data["tglbayar"]=$_POST['tglbayar']; 
				$data["sbayar"]=$_POST['sbayar'];

				$data["nama_bibit"]=$_POST['nama_bibit'];
				$data["jumlah_bibit"]=$_POST['jumlah_bibit'];
				
				$data["klui3"]="";
				
				$data["kbli"]=$_POST['kbli'];
				$data["kelembagaan"]=$_POST['kelembagaan'];
				$data["lembaga"]=$_POST['lembaga'];
				$data["busaha"]=$_POST['busaha'];
				$data["merk"]=$_POST['merk'];
				$data["dagangan"]=$_POST['dagangan'];
				$data["kusaha"]="";

				
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

				$data["ijin_id"]=4; //untuk SIUP
				$jumlah=$_POST['jumlah'];
				
				$this->Siup_model->put_edit_siup($data,$data["siup_id"]);
				$this->Perusahaan_model->put_edit_perusahaan($data,$data["perusahaan_id"]);
				$this->Pemohon_model->put_edit_pemohon($data,$data["pemohon_id"]);
				$this->Permohonan_model->put_edit_permohonan($data,$data["id"]);
				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_edit_permohonansyarat($syarat,$data["id"],$Hsyarat);
					}

	redirect('siup');  
	}

	public function simpen_hapus()
    {
	$id=$_POST['id'];	

	$this->load->model('Siup_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');

	$data_siup=$this->Siup_model->get_data_siup($id);	
	$this->Perusahaan_model->put_delete_perusahaan($data_siup["perusahaan_id"]);
	$this->Permohonansyarat_model->put_delete_permohonansyarat($id);
	$this->Siup_model->put_delete_siup($data_siup["siup_id"]);
	$this->Pemohon_model->put_delete_pemohon($data_siup["pemohon_id"]);
	$this->Permohonan_model->put_delete_permohonan($id);

	redirect('siup'); 
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
		
}
