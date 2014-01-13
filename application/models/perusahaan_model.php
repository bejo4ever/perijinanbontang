<?
class Perusahaan_model extends CI_Model {   

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	function ListJenisJasa()
	{
		$sql	= "SELECT * FROM jenisjasa ORDER BY id";
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->jenis;
			}
		return $data;
	}

    function ListKualifikasiPerusahaan()
	{
		$sql	= "SELECT * FROM kualifikasi ORDER BY id";
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->kualifikasi;
			}
		return $data;
	}

    function ListBentukPerushTDP()
    {
        $sql	= "SELECT * FROM bentukperush_tdp ORDER BY id";
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->nama;
			}
		return $data;
    }

	function ListBentukPerush()
    {
        $sql	= "SELECT * FROM bentukperusahaan";
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->nama;
			}
		return $data;
    }

	function ListStatusPerusahaan()
    {
        $sql	= "SELECT * FROM sperusahaan ORDER BY id";
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->status;
			}
		return $data;
    }

	
  
	function get_data_perusahaan($id)
    {
		$sql	=   "SELECT *,date_format(tglakta,'%d-%m-%Y') as tgl_akta FROM perusahaan 					
					where id=?";        
        $records=$this->db->query($sql,$id);
		$data=array();
		foreach($records->result() as $row)
			{
			$data["npwp"]=$row->npwp;
			$data["nama2"]=$row->nama;
			$data["noakta"]=$row->noakta;
			$data["tglakta"]=$row->tgl_akta;
			$data["notaris"]=$row->notaris;	
			$data["bentuk_id"]=$row->bentuk_id;			
			$data["sperusahaan_id"]=$row->sperusahaan_id;	
			$data["jenis_perusahaan"]=$row->jusaha_id;		
			$data["usaha"]=$row->usaha;
			$data["alamat2"]=$row->alamat;
			$data["rt2"]=$row->rt;			
			$data["kecamatan_id2"]=$row->kecamatan_id;
			$data["desa_id2"]=$row->desa_id;
			$data["telp2"]=$row->telp;
			$data["fax"]=$row->fax;
			$data["stempat_id"]=$row->stempat_id;
			$data["kodepos"]=$row->kodepos;
			$data["modal"]=number_format($row->modal,0,"",".");	
			}
		return $data;
    }

function put_insert_perusahaan($data)
    {
	$npwp=$data["npwp2"];
	$nama=$data["nama2"];
	$noakta=$data["noakta2"];
	$notaris=$data["notaris2"];
	if ($data["tglakta2"]=="")
		$tglakta="0000-00-00";
	else
		$tglakta=date("Y-m-d",strtotime($data["tglakta2"]));
	$bentuk_id=$data["bentuk_id2"];
	$alamat=$data["jalan2"];
	$rt=$data["rt2"];
	$rw=$data["rw2"];
	$propinsi_id=$data["propinsi_id2"]; if ($propinsi_id=="") $propinsi_id=0;	
	$kabkota_id=$data["kabkota_id2"]; if ($kabkota_id=="") $kabkota_id=0;
	$kecamatan_id=$data["kec2"]; if ($kecamatan_id=="") $kecamatan_id=0;
	$desa_id=$data["desa2"]; if ($desa_id=="") $desa_id=0;
	$kodepos=$data["kodepos2"];
	$telp=$data["telp2"];
	$fax=$data["fax2"];
	$jenis_perusahaan=$data["jenis_perusahaan"]; if ($jenis_perusahaan=="") $jenis_perusahaan=0;
	$statustempat_id=$data["statustempat_id"]; if ($statustempat_id=="") $statustempat_id=0;
	$status=$data["sperusahaan_id2"]; if ($status=="") $status=0;
	$usaha=$data["usaha"];
	$butara=$data["butara"];
	$bselatan=$data["bselatan"];
	$btimur=$data["btimur"];
	$bbarat=$data["bbarat"];
	$modal=$data["modal"];  if ($modal=="") $modal=0;
	$merk=$data["merk"];  if ($merk=="") $merk=0;

	

	$sql="insert into perusahaan(`npwp`,`nama`,`noakta`,`notaris`,`tglakta`,`bentuk_id`,`alamat`,`rt`,
	`rw`,`propinsi_id`,`kabkota_id`,`kecamatan_id`,`desa_id`,`kodepos`,`telp`,`fax`,`jusaha_id`,
	`stempat_id`,`sperusahaan_id`,`usaha`,`butara`,`bselatan`,`btimur`,`bbarat`,`modal`,`merk`) 
	values ('$npwp','$nama','$noakta','$notaris','$tglakta','$bentuk_id','$alamat','$rt','$rw',
	'$propinsi_id','$kabkota_id','$kecamatan_id','$desa_id','$kodepos','$telp','$fax','$jenis_perusahaan',
	'$statustempat_id','$status','$usaha','$butara','$bselatan','$btimur','$bbarat','$modal','$merk')";

	$records=$this->db->query($sql);

	return $this->db->insert_id();
	}

function put_edit_perusahaan($data,$id)
    {
	$npwp=$data["npwp2"];
	$nama=$data["nama2"];
	$noakta=$data["noakta2"];
	$notaris=$data["notaris2"];
	if ($data["tglakta2"]=="")
		$tglakta="0000-00-00";
	else
		$tglakta=date("Y-m-d",strtotime($data["tglakta2"]));
	$bentuk_id=$data["bentuk_id2"];
	$alamat=$data["jalan2"];
	$rt=$data["rt2"];
	$rw=$data["rw2"];
	$propinsi_id=$data["propinsi_id2"]; if ($propinsi_id=="") $propinsi_id=0;	
	$kabkota_id=$data["kabkota_id2"]; if ($kabkota_id=="") $kabkota_id=0;
	$kecamatan_id=$data["kec2"]; if ($kecamatan_id=="") $kecamatan_id=0;
	$desa_id=$data["desa2"]; if ($desa_id=="") $desa_id=0;
	$kodepos=$data["kodepos2"];
	$telp=$data["telp2"];
	$fax=$data["fax2"];
	$jenis_perusahaan=$data["jenis_perusahaan"]; if ($jenis_perusahaan=="") $jenis_perusahaan=0;
	$statustempat_id=$data["statustempat_id"]; if ($statustempat_id=="") $statustempat_id=0;
	$status=$data["sperusahaan_id2"]; if ($status=="") $status=0;
	$usaha=$data["usaha"];
	$butara=$data["butara"];
	$bselatan=$data["bselatan"];
	$btimur=$data["btimur"];
	$bbarat=$data["bbarat"];
	$modal=$data["modal"];  if ($modal=="") $modal=0;
	$merk=$data["merk"];  if ($merk=="") $merk=0;

	

	$sql="update perusahaan set `npwp`='$npwp',`nama`='$nama',`noakta`='$noakta',`notaris`='$notaris',
	`tglakta`='$tglakta',`bentuk_id`='$bentuk_id',`alamat`='$alamat',`rt`='$rt',`rw`='$rw',
	`propinsi_id`='$propinsi_id',`kabkota_id`='$kabkota_id',`kecamatan_id`='$kecamatan_id',
	`desa_id`='$desa_id',`kodepos`='$kodepos',`telp`='$telp',`fax`='$fax',
	`jusaha_id`='$jenis_perusahaan',`stempat_id`='$statustempat_id',`sperusahaan_id`='$status',
	`usaha`='$usaha',`butara`='$butara',`bselatan`='$bselatan',`btimur`='$btimur',`bbarat`='$bbarat',
	`modal`='$modal',`merk`='$merk' where id=$id";	

	 $records=$this->db->query($sql);
	}

	function put_delete_perusahaan($id)
    {
	$sql ="	DELETE FROM perusahaan WHERE id='$id'";
	$records=$this->db->query($sql);
	}

	function get_data_klui($id)
    {
		$sql	=   "SELECT * FROM klui 					
					where id=?";        
        $records=$this->db->query($sql,$id);
		$data=array();
		foreach($records->result() as $row)
			{
			$data["kbli"]=$row->kbli;
			$data["kegiatan_pokok"]=$row->kegiatan_pokok;			
			}
		return $data;
    }

}
?>