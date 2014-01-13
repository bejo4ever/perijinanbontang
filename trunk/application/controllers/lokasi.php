<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lokasi extends CI_Controller {

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
		$crud->set_table('vlokasi');
		$crud->set_subject('Data Permohonan Izin Lokasi');
		$crud->columns('nosk','nama','tglpermohonan','status','catatan_bo','lama_proses');
		$crud->set_primary_key('id','vlokasi');
		//$crud->set_relation_n_n('perusahaan', 'tdp','perusahaan','permohonan_id','perusahaan_id','nama');
		//$crud->set_relation('spermohonan_id', 'spermohonan','status');
		
		$crud->display_as('nosk','No.SK');
		$crud->display_as('nama','Nama Pemohon');
		$crud->display_as('tglpermohonan','Tgl Permohonan');		
		$crud->display_as('catatan_bo','Catatan BO');
		$crud->display_as('lama_proses','Lama Proses');
        
		$crud->add_action('Hapus Data', '', site_url() . '/lokasi/simpen_hapus','delete-icon');
		$crud->add_action('Edit Data', '',  site_url() . '/lokasi/ubah','edit-icon');
		$crud->add_action('Ubah Status Pemrosessan Data', '', 'lokasi','proses-icon');
		$crud->add_action('Cetak Tanda Bukti Lokasi', '', 'lokasi/cetak_sk','tbukti-icon','','kontrol','','bukti');	
		$crud->add_action('Cetak SK', '', 'lokasi/cetak_sk','sk-icon','','sk','skatas');

		
		$crud->where('ijin_id','10');
		$crud->order_by('tglpermohonan desc,id desc,nama','desc');		
		$crud->unset_export();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__)));
	   
        $output = $crud->render();
 		$this->load->view('home.php');
        $this->load->view('vlokasi_daftar.php',$output);
	}

	public function cetak_sk()
	{
		$id = $_GET['id'];
		$this->load->model('String_model');  
		$this->load->model('Lokasi_cetak_sk_model');  
		$this->load->model('Permohonan_cetak_model');  		
		$this->load->view('Lokasi_cetak_sk');		
	}

	public function tambah()
    {
		$this->load->model('Lokasi_model'); 
		$this->load->model('Permohonan_model');  		
		$this->load->model('Umum_model');
			
		
		$output = $this->vHO('tambah'); 

		$output1 = $this->vpemohon('tambah');	

		$output2 = $this->vperusahaan('tambah');    
		
		$js_files = $output->js_files + $output1->js_files + $output2->js_files;
		$css_files = $output->css_files + $output1->css_files + $output2->js_files;

		$data['output'] = $output;
		$data['output1'] = $output1;
		$data['output2'] = $output2;
		$this->load->view('home.php');
        $this->load->view('vlokasi_tambah.php',array(
											'js_files' => $js_files,
											'css_files' => $css_files,
											'output'	=> $data));
		             
    }

	public function ubah()
    {
		$id=$_GET['id'];

		$this->load->model('Lokasi_model');
		$this->load->model('Permohonan_model');  		
		$this->load->model('Umum_model');		
		$this->load->model('Permohonansyarat_model');
		
				
		$output = $this->vHO('ubah');     
		
		$data['output'] = $output;		
		$this->load->view('home.php');
        $this->load->view('vlokasi_edit.php',$output);
		             
    }

	public function simpen_baru()
    {
	$this->load->model('Lokasi_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');
	$this->load->model('Umum_model');
						
				
				$data["tglmohon"]=$_POST['tglmohon']; if ($_POST['tglmohon']=="") $data["tglmohon"]="00-00-0000";
				$data["jnspermohonan"]=$_POST['jnspermohonan'];
				$data["counter_daftar"]="";
				
					
				$data["pemohon_id"]=$_POST['pemohon_id'];
				$data["no_agenda"]="";
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
								
    			$data["luas"]=$_POST['luas'];
				$data["peruntukan"]=$_POST['peruntukan'];
    			$data["alamat2"]=$_POST['alamat2'];
    			$data["kecamatan_id2"]=$_POST['kec2'];
    			$data["desa_id2"]=$_POST['desa2'];
    			
				$data["point1"]=$_POST['point1'];
    			$data["point1_2"]=$_POST['point1_2'];
    			$data["point1_3"]=$_POST['point1_3'];
    			$data["point2"]=$_POST['point2'];
    			$data["point3"]=$_POST['point3'];
				$data["point6"]=$_POST['point6'];
    
				$data["peruntukan"]=$_POST['peruntukan'];
    			$data["nosklama"]=$_POST['nosklama'];
				$data["nosurat"]=$_POST['nosurat'];
				$data["rt2"]=$_POST['rt2'];
				$data["rw2"]="";
    			
    			$data["tglsklama"]=$_POST['tglterbit'];
    			$data["tglsurat"]=$_POST['tglsurat'];				

				$data["retribusi"]=$_POST['retribusi'];
				$data["tglbayar"]=$_POST['tglbayar']; 
				$data["sbayar"]=$_POST['sbayar'];

				$data["nama_bibit"]="";
				$data["jumlah_bibit"]=0;
																
				
				$data["noregistrasi"]="";				
				$data["nosk"]=$_POST['nosk'];
				$data["tglterbit"]=$_POST['tglterbit'];
				$data["tglexpired"]="";
				$data["catatan_bo"]="";				
				$data["ketbayar"]="";
				$data["atasnama"]="";
	   			$data["jabatan"]="";
	   			$data["nip"]="";
	   			$data["pejabat"]="";

				$data["ijin_id"]=10; //untuk Lokasi
				$jumlah=$_POST['jumlah'];
				
				
				$idpemohon=$this->Pemohon_model->put_insert_pemohon($data);
				if($idpemohon > 0)
				{
				$noregistrasi=$this->Umum_model->GetNoRegistrasi(10); //cari no reg Lokasi
				$idpermohonan=$this->Permohonan_model->put_insert_permohonan($data,$idpemohon,$noregistrasi);				
				$idlokasi=$this->Lokasi_model->put_insert_lokasi($data,$idpermohonan);			
				
				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_insert_permohonansyarat($syarat,$idpermohonan,$Hsyarat);
					}
				$this->Permohonan_model->put_insert_statuspermohonan($idpermohonan,2,date("Y-m-d H:i:s"));
				}
	

	redirect('lokasi');
	}

	public function simpen_ubah()
    {
	$this->load->model('Lokasi_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');
	$this->load->model('Umum_model');
		
				$data["id"]=$_POST['id'];
				$data["lokasi_id"]=$_POST['lokasi_id'];
				
				$data["tglmohon"]=$_POST['tglmohon']; if ($_POST['tglmohon']=="") $data["tglmohon"]="00-00-0000";
				$data["jnspermohonan"]=$_POST['jnspermohonan'];
				$data["counter_daftar"]="";
				$data["no_agenda"]="";
					
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
		
											
				
				$data["retribusi"]=$_POST['retribusi'];
				$data["tglbayar"]=$_POST['tglbayar']; 
				$data["sbayar"]=$_POST['sbayar'];

				$data["luas"]=$_POST['luas'];
				$data["peruntukan"]=$_POST['peruntukan'];
    			$data["alamat2"]=$_POST['alamat2'];
    			$data["kecamatan_id2"]=$_POST['kec2'];
    			$data["desa_id2"]=$_POST['desa2'];

				$data["point1"]=$_POST['point1'];
    			$data["point1_2"]=$_POST['point1_2'];
    			$data["point1_3"]=$_POST['point1_3'];
    			$data["point2"]=$_POST['point2'];
    			$data["point3"]=$_POST['point3'];
				$data["point6"]=$_POST['point6'];
				
								
				$data["peruntukan"]=$_POST['peruntukan'];
    			$data["nosklama"]=$_POST['nosklama'];				
				$data["tglsklama"]=$_POST['tglsklama'];
				$data["nosurat"]=$_POST['nosurat'];
				$data["tglsurat"]=$_POST['tglsurat'];				
				$data["rt2"]=$_POST['rt2'];
				$data["rw2"]="";				
	
				$data["catatan_bo"]=$_POST['catatan_bo'];
				$data["nosk"]=$_POST['nosk'];
				$data["tglterbit"]=$_POST['tglterbit'];
				$data["tglexpired"]="";
				$data["expiredpajak"]="";	
				$data["nama_bibit"]="";
				$data["jumlah_bibit"]=0;
	
				$data["ketbayar"]="";				
				
				$data["noregistrasi"]=$_POST['noregistrasi'];

				$data["ijin_id"]=10; //untuk Lokasi
				$jumlah=$_POST['jumlah'];

				
				echo $this->Lokasi_model->put_edit_lokasi($data,$data["lokasi_id"]);
				$this->Pemohon_model->put_edit_pemohon($data,$data["pemohon_id"]);
				$this->Permohonan_model->put_edit_permohonan($data,$data["id"]);
				

				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_edit_permohonansyarat($syarat,$data["id"],$Hsyarat);
					}

	redirect('lokasi');
	}

	
	public function simpen_hapus()
    {
	$id=$_POST['id'];	

	$this->load->model('Lokasi_model');
	
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');

	$data_lokasi=$this->Lokasi_model->get_data_lokasi($id);	
	
	$this->Permohonansyarat_model->put_delete_permohonansyarat($id);
	$this->Lokasi_model->put_delete_lokasi($data_lokasi["lokasi_id"]);
	$this->Pemohon_model->put_delete_pemohon($data_lokasi["pemohon_id"]);
	$this->Permohonan_model->put_delete_permohonan($id);

	redirect('lokasi');
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
