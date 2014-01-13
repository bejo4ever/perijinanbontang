<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Limbah extends CI_Controller {

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
		$crud->set_table('vlimbah');
		$crud->set_subject('Data Permohonan Izin Pembuangan Limbah Cair');
		$crud->columns('no_agenda','nosk','perusahaan','nama','tglpermohonan','status','catatan_bo','lama_proses');
		$crud->set_primary_key('id','vlimbah');		
		$crud->display_as('no_agenda','No.Agenda');
		$crud->display_as('nosk','No.SK');
		$crud->display_as('perusahaan','Nama Perusahaan');
		$crud->display_as('nama','Nama Pemohon');
		$crud->display_as('tglpermohonan','Tgl Permohonan');		
		$crud->display_as('catatan_bo','Catatan BO');
		$crud->display_as('lama_proses','Lama Proses');
        
		$crud->add_action('Hapus Data', '', site_url() . '/limbah/simpen_hapus','delete-icon');
		$crud->add_action('Edit Data', '',  site_url() . '/limbah/ubah','edit-icon');
		$crud->add_action('Ubah Status Pemrosessan Data', '', 'limbah','proses-icon');
		$crud->add_action('Cetak Tanda Bukti Trayek', '', 'limbah/cetak_sk','tbukti-icon','','kontrol','bap','bukti');	
		$crud->add_action('Cetak SK', '', 'limbah/cetak_sk','sk-icon','','sk','skatas');
		
		$crud->where('ijin_id','15');
		$crud->order_by('tglpermohonan desc,id desc,nama','desc');		
		$crud->unset_export();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__)));
	   
        $output = $crud->render();
 		$this->load->view('home.php');
        $this->load->view('vlimbah_daftar.php',$output);
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
		$this->load->model('Limbah_model'); 
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
        $this->load->view('vlimbah_tambah.php',array(
											'js_files' => $js_files,
											'css_files' => $css_files,
											'output'	=> $data));
		             
    }

	public function ubah()
    {
		$id=$_GET['id'];

		$this->load->model('Limbah_model');
		$this->load->model('Permohonan_model');  		
		$this->load->model('Umum_model');
		$this->load->model('Perusahaan_model');
		$this->load->model('Permohonansyarat_model');
		
				
		$output = $this->vHO('ubah');     
		
		$data['output'] = $output;		
		$this->load->view('home.php');
        $this->load->view('vlimbah_edit.php',$output);
		             
    }

	public function simpen_baru()
    {
	$this->load->model('Limbah_model');
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
				
				$data["jenis_perusahaan"]="";
				$data["usaha"]="";
				$data["tahun"]="";
				$data["statustempat_id"]="0";
				
    			$data["luas"]="";
    			$data["alamat3"]="";
    			$data["kecamatan_id3"]="0";
    			$data["desa_id3"]="0";
    			$data["bentukbangunan_id"]="0";
    			$data["butara"]="";
    			$data["btimur"]="";
    			$data["bselatan"]="";
    			$data["bbarat"]="";
    			$data["indeksgangguan_id"]="0";
    			$data["indekslokasi_id"]="0";
    			$data["tglsurvey"]="";
    			$data["keterangan"]="";
    			$data["no_imb"]="";

				$data["alamat_keg"]=$_POST['alamat4'];
    			$data["tempat_keg"]=$_POST['tempat4'];
    			$data["kecamatan_id_keg"]=$_POST['kec4'];
				$data["desa_id_keg"]=$_POST['desa4'];
    			$data["tujuan_keg"]=$_POST['tujuan4'];
    			$data["volume_keg"]=$_POST['volume4'];

				$data["retribusi"]=$_POST['retribusi'];
				$data["tglbayar"]=$_POST['tglbayar']; 
				$data["sbayar"]=$_POST['sbayar'];

				$data["nama_bibit"]="";
				$data["jumlah_bibit"]="0";
				
												
				
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

				$data["ijin_id"]=15; //untuk Limbah
				$jumlah=$_POST['jumlah'];
				
				
				$idpemohon=$this->Pemohon_model->put_insert_pemohon($data);
				if($idpemohon > 0)
				{
				$noregistrasi=$this->Umum_model->GetNoRegistrasi(15); //cari no reg Limbah
				$idpermohonan=$this->Permohonan_model->put_insert_permohonan($data,$idpemohon,$noregistrasi);
				$idperusahaan=$this->Perusahaan_model->put_insert_perusahaan($data);				
				$idLimbah=$this->Limbah_model->put_insert_limbah($data,$idperusahaan,$idpermohonan);			
				
				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_insert_permohonansyarat($syarat,$idpermohonan,$Hsyarat);
					}
				$this->Permohonan_model->put_insert_statuspermohonan($idpermohonan,2,date("Y-m-d H:i:s"));
				}
	
	redirect('limbah');
	
	}

	public function simpen_ubah()
    {
	$this->load->model('Limbah_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');
	$this->load->model('Umum_model');
		
				$data["id"]=$_POST['id'];
				$data["limbah_id"]=$_POST['limbah_id'];
				
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

				$data["jenis_perusahaan"]="";
				$data["usaha"]="";
				$data["tahun"]="";
				$data["statustempat_id"]="0";				

    			$data["luas"]="";
    			$data["alamat3"]="";
    			$data["kecamatan_id3"]="0";
    			$data["desa_id3"]="0";
    			$data["bentukbangunan_id"]="0";
    			$data["butara"]="";
    			$data["btimur"]="";
    			$data["bselatan"]="";
    			$data["bbarat"]="";
    			$data["indeksgangguan_id"]="0";
    			$data["indekslokasi_id"]="0";
    			$data["tglsurvey"]="";
    			$data["keterangan"]="";
    			$data["no_imb"]="";

				$data["alamat_keg"]=$_POST['alamat4'];
    			$data["tempat_keg"]=$_POST['tempat4'];
    			$data["kecamatan_id_keg"]=$_POST['kec4'];
				$data["desa_id_keg"]=$_POST['desa4'];
    			$data["tujuan_keg"]=$_POST['tujuan4'];
    			$data["volume_keg"]=$_POST['volume4'];

				$data["retribusi"]=$_POST['retribusi'];
				$data["tglbayar"]=$_POST['tglbayar']; 
				$data["sbayar"]=$_POST['sbayar'];

				$data["nama_bibit"]="";
				$data["jumlah_bibit"]="0";
				
								
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

				$data["ijin_id"]=15; //untuk Limbah
				$jumlah=$_POST['jumlah'];
				
				$this->Limbah_model->put_edit_limbah($data,$data["limbah_id"]);
				$this->Perusahaan_model->put_edit_perusahaan($data,$data["perusahaan_id"]);
				$this->Pemohon_model->put_edit_pemohon($data,$data["pemohon_id"]);
				$this->Permohonan_model->put_edit_permohonan($data,$data["id"]);
				

				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_edit_permohonansyarat($syarat,$data["id"],$Hsyarat);
					}

	redirect('limbah');
	}

	
	public function simpen_hapus()
    {
	$id=$_POST['id'];	

	$this->load->model('Limbah_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');

	$data_limbah=$this->Limbah_model->get_data_limbah($id);	
	$this->Perusahaan_model->put_delete_perusahaan($data_limbah["perusahaan_id"]);
	$this->Permohonansyarat_model->put_delete_permohonansyarat($id);
	$this->Limbah_model->put_delete_limbah($data_limbah["limbah_id"]);
	$this->Pemohon_model->put_delete_pemohon($data_limbah["pemohon_id"]);
	$this->Permohonan_model->put_delete_permohonan($id);

	redirect('limbah');
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
