<?
class Trayek_model extends CI_Model {   

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_jenis_permohonan($idIjin)
    {
        $sql	= "	SELECT b.* 
					FROM permohonanjenis a 
					LEFT OUTER JOIN jpermohonan b ON a.jpermohonan_id=b.id 
					WHERE a.ijin_id=?";
        $records=$this->db->query($sql,$idIjin);
		$data=array();
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->jenis;
			}
		return $data;
    }

	function get_data_trayek($id)
    {
		$sql	=   "SELECT t.*,date_format(t.tgl_surat_permohonan,'%d-%m-%Y') as tgl_surat_permohonan,date_format(t.tgl_rekomendasi,'%d-%m-%Y') as tgl_rekomendasi,t.id trayek_id,p.pemohon_id pemohon_id,date_format(p.tglpermohonan,'%d-%m-%Y') as tglpermohonan,p.jpermohonan_id,p.no_agenda,p.noregistrasi,perusahaan_id,					
					p.retribusi,p.sbayar,date_format(p.tglbayar,'%d-%m-%Y') as tglbayar,p.nama_bibit,p.jumlah_bibit,p.nosk,date_format(p.tglsk,'%d-%m-%Y') as tglsk,date_format(p.tglexpired,'%d-%m-%Y') as tglexpired,p.catatan_bo FROM itr t,permohonan p
					where t.permohonan_id=p.id and p.id=$id";        
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data["trayek_id"]=$row->trayek_id;
			$data["noregistrasi"]=$row->noregistrasi;
			$data["pemohon_id"]=$row->pemohon_id;
			$data["tglpermohonan"]=$row->tglpermohonan;
			$data["jpermohonan_id"]=$row->jpermohonan_id;			
			$data["no_agenda"]=$row->no_agenda;
			$data["perusahaan_id"]=$row->perusahaan_id;
			$data["retribusi"]=$row->retribusi;
			$data["sbayar"]=$row->sbayar;
			$data["tglbayar"]=$row->tglbayar;
			$data["nama_bibit"]=$row->nama_bibit;
			$data["jumlah_bibit"]=$row->jumlah_bibit;
			$data["nosk"]=$row->nosk;
			$data["tglsk"]=$row->tglsk;
			$data["tglexpired"]=$row->tglexpired;
			$data["catatan_bo"]=$row->catatan_bo;

			$data["tahun"]=$row->tahun;						
			$data["kecamatan_id4"]=$row->kecamatan_id;
			$data["desa_id4"]=$row->desa_id;
			
			$data["nomor_kendaran"]=$row->nomor_kendaran;	
			$data["nama_pemilik"]=$row->nama_pemilik;
			$data["alamat_pemilik"]=$row->alamat_pemilik;	
			$data["no_hp"]=$row->no_hp;
			$data["nomor_rangka"]=$row->nomor_rangka;	
			$data["nomor_mesin"]=$row->nomor_mesin;
			$data["kode_trayek"]=$row->kode_trayek;
			$data["nomor_uji_berkala"]=$row->nomor_uji_berkala;
			$data["rt"]=$row->rt;						
			$data["no_surat_permohonan"]=$row->no_surat_permohonan;
			$data["tgl_surat_permohonan"]=$row->tgl_surat_permohonan;
			$data["no_rekomendasi"]=$row->no_rekomendasi;
			$data["tgl_rekomendasi"]=$row->tgl_rekomendasi;						 
			$data["merk_kendaraan"]=$row->merk_kendaraan;						
			$data["tahun_pembuatan"]=$row->tahun_pembuatan;						
			$data["daya_angkut"]=$row->daya_angkut;						
			$data["kode_pelayanan"]=$row->kode_pelayanan;															
			}
		
		return $data;
    }

  	
	
	function put_insert_trayek($data,$perusahaan_id,$permohonan_id)
    {				
	
	$tahun=$data["tahun"]; if ($tahun=="") $tahun=date('Y');	
    $kecamatan_id=$data["kecamatan_id3"];
    $desa_id=$data["desa_id3"];
    
	if ($data["tglrekomendasidishubkominfo"]=="")
		$tglrekomendasidishubkominfo="0000-00-00";
	else
		$tglrekomendasidishubkominfo=date("Y-m-d",strtotime($data["tglrekomendasidishubkominfo"])); 
    
    $nomor_kendaraan=$data["nomor_kendaraan"];
	$nama_pemilik=$data["nama_pemilik"];
	$alamat_pemilik=$data["alamat_pemilik"];
    $no_hp=$data["no_hp"];
    $nomor_rangka=$data["nomor_rangka"];
    $nomor_mesin=$data["nomor_mesin"];
    $kode_trayek=$data["kode_trayek"];
    $nom_uji_berkala=$data["nom_uji_berkala"];
    $rt=$data["rt"];
    $no_suratpermohonan=$data["no_suratpermohonan"];

	if ($data["tglsuratmohon"]=="")
		$tglsuratmohon="0000-00-00";
	else
		$tglsuratmohon=date("Y-m-d",strtotime($data["tglsuratmohon"])); 

	$no_rekomendasidishubkominfo=$data["no_rekomendasidishubkominfo"];	
	$merk_kendaraan=$data["merk_kendaraan"];
	$tahun_pembuatan=$data["tahun_pembuatan"];
	$daya_angkut=$data["daya_angkut"];
	$kode_pelayanan=$data["kode_pelayanan"];
	  
	$sql		= "insert into itr(`tahun`,`kecamatan_id`,`desa_id`,
									`permohonan_id`,`perusahaan_id`,`nomor_kendaran`, `nama_pemilik`, `alamat_pemilik`, `no_hp`, 
									`nomor_rangka`, `nomor_mesin`, `kode_trayek`, `nomor_uji_berkala`, `rt`, 
									`no_surat_permohonan`, `tgl_surat_permohonan`, `no_rekomendasi`, `tgl_rekomendasi`,
									`merk_kendaraan`, 
									`tahun_pembuatan`, 
									`daya_angkut`, 
									`kode_pelayanan`) 
						   values ('$tahun','$kecamatan_id','$desa_id','$permohonan_id','$perusahaan_id',
						   			'$nomor_kendaraan', '$nama_pemilik', '$alamat_pemilik', '$no_hp', '$nomor_rangka', '$nomor_mesin', '$kode_trayek', '$nom_uji_berkala', '$rt',
									'$no_suratpermohonan',
									'$tglsuratmohon',	    		
									'$no_rekomendasidishubkominfo',
									'$tglrekomendasidishubkominfo',
									'$merk_kendaraan',
									'$tahun_pembuatan',
									'$daya_angkut',
									'$kode_pelayanan')";

	 
	$records=$this->db->query($sql);

	return $this->db->insert_id();
	}

	function put_edit_trayek($data,$id)
    {		
	$tahun=$data["tahun"]; if ($tahun=="") $tahun=date('Y');	
    $kecamatan_id=$data["kecamatan_id3"];
    $desa_id=$data["desa_id3"];
    
	if ($data["tglrekomendasidishubkominfo"]=="")
		$tglrekomendasidishubkominfo="0000-00-00";
	else
		$tglrekomendasidishubkominfo=date("Y-m-d",strtotime($data["tglrekomendasidishubkominfo"])); 
    
    $nomor_kendaraan=$data["nomor_kendaraan"];
	$nama_pemilik=$data["nama_pemilik"];
	$alamat_pemilik=$data["alamat_pemilik"];
    $no_hp=$data["no_hp"];
    $nomor_rangka=$data["nomor_rangka"];
    $nomor_mesin=$data["nomor_mesin"];
    $kode_trayek=$data["kode_trayek"];
    $nom_uji_berkala=$data["nom_uji_berkala"];
    $rt=$data["rt"];
    $no_suratpermohonan=$data["no_suratpermohonan"];

	if ($data["tglsuratmohon"]=="")
		$tglsuratmohon="0000-00-00";
	else
		$tglsuratmohon=date("Y-m-d",strtotime($data["tglsuratmohon"])); 

	$no_rekomendasidishubkominfo=$data["no_rekomendasidishubkominfo"];	
	$merk_kendaraan=$data["merk_kendaraan"];
	$tahun_pembuatan=$data["tahun_pembuatan"];
	$daya_angkut=$data["daya_angkut"];
	$kode_pelayanan=$data["kode_pelayanan"];  

	$sql="update itr set 				
				`kecamatan_id`		= '$kecamatan_id',
				`desa_id`			= '$desa_id',								
				
				`nomor_kendaran` 	= '$nomor_kendaraan', 
				`nama_pemilik` 		= '$nama_pemilik', 
				`alamat_pemilik` 	= '$alamat_pemilik', 
				`no_hp` 			= '$no_hp',
				`nomor_rangka` 		= '$nomor_rangka', 
				`nomor_mesin` 		= '$nomor_mesin', 
				`kode_trayek` 		= '$kode_trayek', 
				`nomor_uji_berkala`	= '$nom_uji_berkala',
				`rt`				= '$rt',
				`no_surat_permohonan` 	= '$no_suratpermohonan', 
				`tgl_surat_permohonan`	= '$tglsuratmohon',
				`no_rekomendasi` 		= '$no_rekomendasidishubkominfo', 
				`tgl_rekomendasi` 		= '$tglrekomendasidishubkominfo',
				`merk_kendaraan`		= '$merk_kendaraan', 
				`tahun_pembuatan`		= '$tahun_pembuatan', 
				`daya_angkut`			= '$daya_angkut', 
				`kode_pelayanan`		= '$kode_pelayanan'
	 where id=$id";

	 $records=$this->db->query($sql);
	}

	function put_delete_trayek($id)
    {
	$sql	 ="	DELETE FROM itr WHERE id='$id'";	
	$records=$this->db->query($sql);
	
	}		
		
}
?>