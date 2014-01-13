<?
class Limbah_model extends CI_Model {   

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

	function get_data_limbah($id)
    {
		$sql	=   "SELECT t.*,date_format(t.tglsurvey,'%d-%m-%Y') as tglsurvey,t.id limbah_id,p.pemohon_id pemohon_id,date_format(p.tglpermohonan,'%d-%m-%Y') as tglpermohonan,p.jpermohonan_id,p.no_agenda,p.noregistrasi,perusahaan_id,					
					p.retribusi,p.sbayar,date_format(p.tglbayar,'%d-%m-%Y') as tglbayar,p.nama_bibit,p.jumlah_bibit,p.nosk,date_format(p.tglsk,'%d-%m-%Y') as tglsk,date_format(p.tglexpired,'%d-%m-%Y') as tglexpired,p.catatan_bo FROM iplc t,permohonan p
					where t.permohonan_id=p.id and p.id=$id";        
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data["limbah_id"]=$row->limbah_id;
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
			$data["statustempat_id"]=$row->statustempat_id;
			$data["luas"]=$row->luas;
			$data["alamat3"]=$row->alamat;
			$data["kecamatan_id3"]=$row->kecamatan_id;
			$data["desa_id3"]=$row->desa_id;
			$data["bentukbangunan"]=$row->bentukbangunan_id;
			$data["butara"]=$row->butara;
			$data["btimur"]=$row->btimur;
			$data["bselatan"]=$row->bselatan;
			$data["bbarat"]=$row->bbarat;
			//$data["permohonan_jenis"]=$row->permohonan_jenis;
			$data["indeksgangguan_id"]=$row->indeksgangguan_id;
			$data["indekslokasi_id"]=$row->indekslokasi_id;			
			$data["tglsurvey"]=$row->tglsurvey;
			$data["keterangan"]=$row->keterangan;
			//$data["sdata"]=$row->sdata;
			//$data["peruntukan"]=$row->peruntukan;
			//$data["no_imb"]=$row->no_imb;	

			$data["alamat_keg"]=$row->alamat_kegiatan;
    		$data["tempat_keg"]=$row->tempat_kegiatan;
    		$data["kecamatan_id_keg"]=$row->kecamatan_kegiatan_id;
			$data["desa_id_keg"]=$row->desa_kegiatan_id;
    		$data["tujuan_keg"]=$row->tujuan_kegiatan;
    		$data["volume_keg"]=$row->volume_kegiatan;	
			}
		
		return $data;
    }

  	
	
	function put_insert_limbah($data,$perusahaan_id,$permohonan_id)
    {				
						
	$tahun=$data["tahun"]; if ($tahun=="") $tahun=date('Y');
	$statustempat_id=$data["statustempat_id"];
    $luas=$data["luas"];
    $alamat=$data["alamat3"];
    $kecamatan_id=$data["kecamatan_id3"];
    $desa_id=$data["desa_id3"];
    $bentukbangunan_id=$data["bentukbangunan_id"];
    $butara=$data["butara"];
    $btimur=$data["btimur"];
    $bselatan=$data["bselatan"];
    $bbarat=$data["bbarat"];
    $indeksgangguan_id=$data["indeksgangguan_id"]; if ($indeksgangguan_id=="") $indeksgangguan_id=0;
    $indekslokasi_id=$data["indekslokasi_id"]; if ($indekslokasi_id=="") $indekslokasi_id=0;
    $retribusi=$data["retribusi"];
	if ($data["tglsurvey"]=="")
		$tglsurvey="0000-00-00";
	else
		$tglsurvey=date("Y-m-d",strtotime($data["tglsurvey"])); 
    $keterangan=$data["keterangan"];
    $no_imb=$data["no_imb"];

	$alamat_keg=$data["alamat_keg"];
    $tempat_keg=$data["tempat_keg"];
    $kecamatan_id_keg=$data["kecamatan_id_keg"];
	$desa_id_keg=$data["desa_id_keg"];
    $tujuan_keg=$data["tujuan_keg"];
    $volume_keg=$data["volume_keg"];

	$sql		= "insert into iplc(
							`tahun`,`statustempat_id`,`luas`,`alamat`,
							`kecamatan_id`,`desa_id`,`bentukbangunan_id`,
							`butara`,`btimur`,`bselatan`,`bbarat`,
							`permohonan_id`,`perusahaan_id`,
							`indeksgangguan_id`,`indekslokasi_id`,`retribusi`,`tglsurvey`,`keterangan`,
							`alamat_kegiatan`, `tempat_kegiatan`, `kecamatan_kegiatan_id`, 
							`desa_kegiatan_id`, `tujuan_kegiatan`, `volume_kegiatan`) 
					values (
						'$tahun','$statustempat_id','$luas','$alamat',
						'$kecamatan_id','$desa_id','$bentukbangunan_id',
						'$butara','$btimur','$bselatan','$bbarat',
						'$permohonan_id','$perusahaan_id','$indeksgangguan_id','$indekslokasi_id',
						'$retribusi','$tglsurvey','$keterangan',
						'$alamat_keg', '$tempat_keg', '$kecamatan_id_keg',
						'$desa_id_keg', '$tujuan_keg', '$volume_keg')";

	 
	$records=$this->db->query($sql);

	return $this->db->insert_id();
	}

	function put_edit_limbah($data,$id)
    {		
	$tahun=$data["tahun"]; if ($tahun=="") $tahun=date('Y');
	$statustempat_id=$data["statustempat_id"];
    $luas=$data["luas"];
    $alamat=$data["alamat3"];
    $kecamatan_id=$data["kecamatan_id3"];
    $desa_id=$data["desa_id3"];
    $bentukbangunan_id=$data["bentukbangunan_id"];
    $butara=$data["butara"];
    $btimur=$data["btimur"];
    $bselatan=$data["bselatan"];
    $bbarat=$data["bbarat"];
    $indeksgangguan_id=$data["indeksgangguan_id"]; if ($indeksgangguan_id=="") $indeksgangguan_id=0;
    $indekslokasi_id=$data["indekslokasi_id"]; if ($indekslokasi_id=="") $indekslokasi_id=0;
    $retribusi=$data["retribusi"];
	if ($data["tglsurvey"]=="")
		$tglsurvey="0000-00-00";
	else
		$tglsurvey=date("Y-m-d",strtotime($data["tglsurvey"])); 
    $keterangan=$data["keterangan"];
    $no_imb=$data["no_imb"];
	$alamat_keg=$data["alamat_keg"];
    $tempat_keg=$data["tempat_keg"];
    $kecamatan_id_keg=$data["kecamatan_id_keg"];
	$desa_id_keg=$data["desa_id_keg"];
    $tujuan_keg=$data["tujuan_keg"];
    $volume_keg=$data["volume_keg"];  

	$sql="update iplc set `tahun`		= '$tahun',
				`statustempat_id`		= '$statustempat_id',
				`luas`					= '$luas',
				`alamat`				= '$alamat',
				`kecamatan_id`			= '$kecamatan_id',
				`desa_id`				= '$desa_id',
				`bentukbangunan_id`		= '$bentukbangunan_id',
				`butara`				= '$butara',
				`btimur`				= '$btimur',
				`bselatan`				= '$bselatan',
				`bbarat`				= '$bbarat',				
				`indeksgangguan_id`		= '$indeksgangguan_id',
				`indekslokasi_id`		= '$indekslokasi_id',
				`retribusi`				= '$retribusi',
				`tglsurvey`				= '$tglsurvey',
				`keterangan`			= '$keterangan', 				
				`alamat_kegiatan` 		= '$alamat_keg', 
				`tempat_kegiatan` 		= '$tempat_keg', 
				`kecamatan_kegiatan_id` = '$kecamatan_id_keg', 
				`desa_kegiatan_id` 		= '$desa_id_keg', 
				`tujuan_kegiatan` 		= '$tujuan_keg', 
				`volume_kegiatan` 		= '$volume_keg' 
	 where id=$id";

	 $records=$this->db->query($sql);
	}

	function put_delete_limbah($id)
    {
	$sql	 ="	DELETE FROM ho WHERE id='$id'";	
	$records=$this->db->query($sql);
	
	}		
		
}
?>