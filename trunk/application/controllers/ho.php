<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ho extends CI_Controller {

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
		$crud->set_table('vho');
		$crud->set_subject('Data Permohonan Izin SITU/HO');
		$crud->columns('no_agenda','nosk','perusahaan','pemohon','tglpermohonan','status','catatan_bo','lama_proses');
		$crud->set_primary_key('id','vho');
		//$crud->set_relation_n_n('perusahaan', 'tdp','perusahaan','permohonan_id','perusahaan_id','nama');
		//$crud->set_relation('spermohonan_id', 'spermohonan','status');

		$crud->display_as('no_agenda','No.Agenda');
		$crud->display_as('nosk','No.SK');
		$crud->display_as('perusahaan','Nama Perusahaan');
		$crud->display_as('pemohon','Nama Pemohon');
		$crud->display_as('lama_proses','Lama Proses');
        
		$crud->add_action('Hapus Data', '', site_url() . '/ho/simpen_hapus','delete-icon');
		$crud->add_action('Edit Data', '',  site_url() . '/ho/ubah','edit-icon');
		$crud->add_action('Ubah Status Pemrosessan Data', '', 'ho','proses-icon');
		$crud->add_action('Cetak Dokumen Survey', '', 'ho/cetak_sk','survey-icon','','survei','hasil_survei');
		$crud->add_action('Cetak Tanda Bukti', '', 'ho/cetak_sk','tbukti-icon','','kontrol','keterangan','bukti');	
		$crud->add_action('Cetak SK', '', 'ho','sk-icon');

		
		$crud->where('ijin_id','2');
		$crud->order_by('tglpermohonan desc,id desc,perusahaan','desc');
		$crud->unset_export();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__)));
	   
        $output = $crud->render();
 		$this->load->view('home.php');
        $this->load->view('vho_daftar.php',$output);
	}

	public function cetak_sk()
	{
		$id = $_GET['id'];
		$this->load->model('String_model');  
		$this->load->model('Ho_cetak_sk_model');  
		$this->load->model('Permohonan_cetak_model');  		
		$this->load->view('Ho_cetak_sk');		
	}

	public function tambah()
    {
		$this->load->model('Ho_model'); 
		$this->load->model('Permohonan_model');  		
		$this->load->model('Umum_model');
		$this->load->model('Perusahaan_model');
			
		
		$output = $this->vHO('tambah');     
		
		$data['output'] = $output;		
		$this->load->view('home.php');
        $this->load->view('vho_tambah.php',$output);
		             
    }

	public function ubah()
    {
		$id=$_GET['id'];
		$this->load->model('Ho_model');
		$this->load->model('Permohonan_model');  		
		$this->load->model('Umum_model');
		$this->load->model('Perusahaan_model');
		$this->load->model('Permohonansyarat_model');
		
				
		$output = $this->vHO('tambah');     
		
		$data['output'] = $output;		
		$this->load->view('home.php');
        $this->load->view('vho_edit.php',$output);
		             
    }

	public function simpen_baru()
    {
	$this->load->model('Ho_model');
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
                $data["notaris2"]=$_POST['notaris2'];
				$data["bentuk_id2"]=$_POST['bentuk_id2'];
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
				
				$data["jenis_perusahaan"]=$_POST['jenis_perusahaan2'];
				$data["usaha"]=$_POST['usaha2'];
				$data["tahun"]="";
				$data["statustempat_id"]=$_POST['statustempat_id3'];
				$luas1=$_POST['luas1'];
				$luas2=$_POST['luas2'];
				if ($luas2<>"") $luas=$luas1 .".". $luas2; else $luas=$luas1;
    			$data["luas"]=$luas;
    			$data["alamat3"]=$_POST['alamat3'];
    			$data["kecamatan_id3"]=$_POST['kec3'];
    			$data["desa_id3"]=$_POST['desa3'];
    			$data["bentukbangunan_id"]=$_POST['bentukbangunan_id3'];
    			$data["butara"]=$_POST['butara3'];
    			$data["btimur"]=$_POST['btimur3'];
    			$data["bselatan"]=$_POST['bselatan3'];
    			$data["bbarat"]=$_POST['bbarat3'];
    			$data["indeksgangguan_id"]=$_POST['indeksgangguan_id3']; 
    			$data["indekslokasi_id"]=$_POST['indekslokasi_id3'];     			
    			$data["tglsurvey"]=$_POST['tglsurvey'];
    			$data["keterangan"]=$_POST['ket'];
    			$data["no_imb"]=$_POST['no_imb'];

				

				$data["retribusi"]=$_POST['retribusi'];
				$data["tglbayar"]=$_POST['tglbayar']; 
				$data["sbayar"]=$_POST['sbayar'];

				$data["nama_bibit"]=$_POST['nama_bibit'];
				$data["jumlah_bibit"]=$_POST['jumlah_bibit'];
				
												
				
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

				$data["ijin_id"]=2; //untuk HO
				$jumlah=$_POST['jumlah'];
				
				
				$idpemohon=$this->Pemohon_model->put_insert_pemohon($data);
				if($idpemohon > 0)
				{
				$noregistrasi=$this->Umum_model->GetNoRegistrasi(2); //cari no reg HO
				$idpermohonan=$this->Permohonan_model->put_insert_permohonan($data,$idpemohon,$noregistrasi);
				$idperusahaan=$this->Perusahaan_model->put_insert_perusahaan($data);				
				$idHO=$this->Ho_model->put_insert_ho($data,$idperusahaan,$idpermohonan);				
				for ($i=1;$i<=$_POST['totaldatasurveyor'];$i++)
					{
					$data_surveyor["nama_surveyor"]=$_POST["nama_surveyor$i"];
					$data_surveyor["jabatan_surveyor"]=$_POST["jabatan_surveyor$i"];					
			
					$this->Ho_model->put_insert_surveyor($data_surveyor,$idHO);					
					}
				
				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_insert_permohonansyarat($syarat,$idpermohonan,$Hsyarat);
					}
				$this->Permohonan_model->put_insert_statuspermohonan($idpermohonan,2,date("Y-m-d H:i:s"));
				}
	

	redirect('ho'); 
	}

	public function simpen_ubah()
    {
	$this->load->model('Ho_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');
	$this->load->model('Umum_model');
		
				$data["id"]=$_POST['id'];
				$data["ho_id"]=$_POST['ho_id'];
				
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
                $data["notaris2"]=$_POST['notaris2'];
				$data["bentuk_id2"]=$_POST['bentuk_id2'];
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

				$data["jenis_perusahaan"]=$_POST['jenis_perusahaan2'];
				$data["usaha"]=$_POST['usaha2'];
				$data["tahun"]="";
				$data["statustempat_id"]=$_POST['statustempat_id3'];
				$luas1=$_POST['luas1'];
				$luas2=$_POST['luas2'];
				if ($luas2<>"") $luas=$luas1 .".". $luas2; else $luas=$luas1;
    			$data["luas"]=$luas;
    			$data["alamat3"]=$_POST['alamat3'];
    			$data["kecamatan_id3"]=$_POST['kec3'];
    			$data["desa_id3"]=$_POST['desa3'];
    			$data["bentukbangunan_id"]=$_POST['bentukbangunan_id3'];
    			$data["butara"]=$_POST['butara3'];
    			$data["btimur"]=$_POST['btimur3'];
    			$data["bselatan"]=$_POST['bselatan3'];
    			$data["bbarat"]=$_POST['bbarat3'];
    			$data["indeksgangguan_id"]=$_POST['indeksgangguan_id3']; 
    			$data["indekslokasi_id"]=$_POST['indekslokasi_id3'];     			
    			$data["tglsurvey"]=$_POST['tglsurvey'];
    			$data["keterangan"]=$_POST['ket'];
    			$data["no_imb"]=$_POST['no_imb'];

				
				$data["retribusi"]=$_POST['retribusi'];
				$data["tglbayar"]=$_POST['tglbayar']; 
				$data["sbayar"]=$_POST['sbayar'];

				$data["nama_bibit"]=$_POST['nama_bibit'];
				$data["jumlah_bibit"]=$_POST['jumlah_bibit'];
				
								
				$data["noregistrasi"]=$_POST['noregistrasi'];				
				$data["nosk"]=$_POST['no_sk'];
				$data["tglterbit"]=$_POST['tglterbit'];
				$data["tglexpired"]=$_POST['tglexpired'];
				$data["peruntukan"]=$_POST['peruntukan'];	
				$data["catatan_bo"]=$_POST['catatan_bo'];				
				$data["ketbayar"]="";
				$data["atasnama"]="";
	   			$data["jabatan"]="";
	   			$data["nip"]="";
	   			$data["pejabat"]="";

				$data["ijin_id"]=2; //untuk HO
				$jumlah=$_POST['jumlah'];
				
				$this->Ho_model->put_edit_ho($data,$data["ho_id"]);
				$this->Perusahaan_model->put_edit_perusahaan($data,$data["perusahaan_id"]);
				$this->Pemohon_model->put_edit_pemohon($data,$data["pemohon_id"]);
				$this->Permohonan_model->put_edit_permohonan($data,$data["id"]);

				for ($i=1;$i<=$_POST['totaldatasurveyor'];$i++)
					{
					$data_surveyor["nama_surveyor"]=$_POST["nama_surveyor$i"];
					$data_surveyor["jabatan_surveyor"]=$_POST["jabatan_surveyor$i"];
					$idSurveyor=$_POST["idSurveyor$i"];					
			
					$this->Ho_model->put_edit_surveyor($data_surveyor,$idSurveyor);					
					}

				for ($i=0;$i<$jumlah;$i++)
					{
					$Hsyarat=$_POST["Hsyarat$i"];					
					$syarat=$_POST["syarat$i"];
					$this->Permohonansyarat_model->put_edit_permohonansyarat($syarat,$data["id"],$Hsyarat);
					}

	redirect('ho');
	}

	public function simpen_hapus()
    {
	$id=$_POST['id'];	

	$this->load->model('Ho_model');
	$this->load->model('Perusahaan_model');
	$this->load->model('Pemohon_model');
	$this->load->model('Permohonan_model');
	$this->load->model('Permohonansyarat_model');

	$data_ho=$this->Ho_model->get_data_ho($id);	
	$this->Perusahaan_model->put_delete_perusahaan($data_ho["perusahaan_id"]);
	$this->Permohonansyarat_model->put_delete_permohonansyarat($id);
	$this->Ho_model->put_delete_ho($data_ho["ho_id"]);
	$this->Pemohon_model->put_delete_pemohon($data_ho["pemohon_id"]);
	$this->Permohonan_model->put_delete_permohonan($id);

	redirect('ho'); 
	}

	public function put_surveyor($idHO)
    {
	$this->load->model('Ho_model');
	
	$data_surveyor["nama_surveyor"]="";
	$data_surveyor["jabatan_surveyor"]="";	
	
	$this->Ho_model->put_insert_surveyor($data_surveyor,$idHO);	

	echo "Ok";
	}

	public function del_surveyor($id)
    {
	$this->load->model('Ho_model');
	
	$this->Ho_model->put_delete_surveyor($id);					

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
		
	public function get_tarif_ho($jenis_perusahaan,$indeksgangguan,$indekslokasi,$luas)
    {
		$this->load->model('Ho_model');					      		
		
		$data=$this->Ho_model->get_tarif_ho($jenis_perusahaan,$indeksgangguan,$indekslokasi,$luas);				
		
		echo json_encode($data);
		             
    }

	
}
