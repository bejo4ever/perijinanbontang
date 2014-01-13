<?
class Reklame_model extends CI_Model {   

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

	function get_data_reklame($id)
    {
		$sql	=   "SELECT t.*,t.id reklame_id,p.id permohonan_id,p.pemohon_id pemohon_id,date_format(p.tglpermohonan,'%d-%m-%Y') as tglpermohonan,p.jpermohonan_id,p.no_agenda,p.noregistrasi,perusahaan_id,p.ketbayar,					
					p.retribusi,p.sbayar,date_format(p.tglbayar,'%d-%m-%Y') as tglbayar,p.nama_bibit,p.jumlah_bibit,p.nosk,date_format(p.tglsk,'%d-%m-%Y') as tglsk,date_format(p.tglexpired,'%d-%m-%Y') as tglexpired,p.catatan_bo FROM reklame t,permohonan p
					where t.permohonan_id=p.id and p.id=$id";        
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data["reklame_id"]=$row->reklame_id;
			$data["ho_id"]=$row->ho_id;
			$data["permohonan_id"]=$row->permohonan_id;
			$data["noregistrasi"]=$row->noregistrasi;
			$data["pemohon_id"]=$row->pemohon_id;
			$data["tglpermohonan"]=$row->tglpermohonan;
			$data["jpermohonan_id"]=$row->jpermohonan_id;			
			$data["no_agenda"]=$row->no_agenda;
			$data["perusahaan_id"]=$row->perusahaan_id;
			$data["retribusi"]=$row->retribusi;
			$data["sbayar"]=$row->sbayar;
			$data["tglbayar"]=$row->tglbayar;
			$data["ketbayar"]=$row->ketbayar;
			$data["nama_bibit"]=$row->nama_bibit;
			$data["jumlah_bibit"]=$row->jumlah_bibit;
			$data["nosk"]=$row->nosk;
			$data["tglsk"]=$row->tglsk;
			$data["tglexpired"]=$row->tglexpired;
			$data["expiredpajak"]=$row->expiredpajak;
			$data["catatan_bo"]=$row->catatan_bo;

			$data["tahun"]=$row->tahun;
					
			}
		
		return $data;
    }

  	function get_data_reklame_detail($id)
    {
		$sql	= "select *,date_format(tglmulai,'%d-%m-%Y') as tglmulai from reklamedetail where permohonan_id=$id";
		$records=$this->db->query($sql);
		$data=array();		
		$i=1;
		foreach($records->result() as $row)
			{
			$data["reklamedetail_id$i"]=$row->id;
			$data["jenisreklame_id$i"]=$row->jenisreklame_id;
			$data["jumlah$i"]=$row->jumlah;
			$data["ukuran$i"]=$row->ukuran;
			$data["cakupan_media$i"]=$row->cakupan_media;
			$data["ilreklame_id$i"]=$row->ilreklame_id;
			$data["harga$i"]=$row->harga;
			$data["tanah_pemerintah$i"]=$row->tanah_pemerintah;
			$data["sifat_reklame$i"]=$row->sifat_reklame;
			$data["rokok_alkohol$i"]=$row->rokok_alkohol;
			$data["tempat$i"]=$row->tempat;
			$data["tglmulai$i"]=$row->tglmulai;
			$data["jangkawaktu$i"]=$row->jangkawaktu;
			$data["satuanwaktu_id$i"]=$row->satuanwaktu_id;
			$i++;
			}
		$data["totaldatareklame"]=($i-1);
		return $data;
	}

	function put_insert_reklame($data,$perusahaan_id,$permohonan_id)
    {				

	$tahun=$data["tahun"]; if ($tahun=="") $tahun=date('Y');
	if ($data["ho_id"]=="") $ho_id=0; else $ho_id=$data["ho_id"];
	if ($data["tglberlaku"]=="")
		$tglberlaku="0000-00-00";
	else
		$tglberlaku=date("Y-m-d",strtotime($data["tglberlaku"])); 
	if ($data["tglberakhir"]=="")
		$tglberakhir="0000-00-00";
	else
		$tglberakhir=date("Y-m-d",strtotime($data["tglberakhir"])); 
    $retribusi=$data["retribusi"];
 
	
	$sql="insert into reklame(`tahun`,`permohonan_id`,`perusahaan_id`,`ho_id`,`tglberlaku`,`tglberakhir`,`retribusi`) values ('$tahun','$permohonan_id','$perusahaan_id','$ho_id','$tglberlaku','$tglberakhir','$retribusi')";
	 
	$records=$this->db->query($sql);

	return $this->db->insert_id();
	}

	function put_insert_reklame_detil($data,$permohonan_id)
    {				

	$jenisreklame_id=$data["jenisreklame_id"];
	$jumlah=$data["jumlah"]; if ($jumlah=="") $jumlah=0;
	$ukuran=$data["ukuran"];
	$cakupan_media=$data["cakupan_media"];
	$ilreklame_id=$data["ilreklame_id"];
	$harga=$data["harga"]; if ($harga=="") $harga=0;
	$tanah_pemerintah=$data["tanah_pemerintah"]; if ($tanah_pemerintah=="") $tanah_pemerintah=0;
	$sifat_reklame=$data["sifat_reklame"]; if ($sifat_reklame=="") $sifat_reklame=0;
	$rokok_alkohol=$data["rokok_alkohol"]; if ($rokok_alkohol=="") $rokok_alkohol=0;
	$tempat=$data["tempat"];
	
	if ($data["tglmulai"]=="")
		$tglmulai="0000-00-00";
	else
		$tglmulai=date("Y-m-d",strtotime($data["tglmulai"])); 

	$jangkawaktu=$data["jangkawaktu"]; if ($jangkawaktu=="") $jangkawaktu=0;
	$satuanwaktu_id=$data["satuanwaktu_id"]; 	

	$sql="insert into reklamedetail(`permohonan_id`,`jenisreklame_id`,`jumlah`,`ukuran`,`cakupan_media`,`ilreklame_id`,`harga`,`tanah_pemerintah`,`sifat_reklame`,`rokok_alkohol`,`tempat`,`tglmulai`,`jangkawaktu`,`satuanwaktu_id`) values ('$permohonan_id','$jenisreklame_id','$jumlah','$ukuran','$cakupan_media','$ilreklame_id','$harga','$tanah_pemerintah','$sifat_reklame','$rokok_alkohol','$tempat','$tglmulai','$jangkawaktu','$satuanwaktu_id')";	
	 
	$records=$this->db->query($sql);
	
	}

	function put_edit_reklame($data,$id)
    {		
	$tahun=$data["tahun"]; if ($tahun=="") $tahun=date('Y');

	if ($data["ho_id"]=="") $ho_id=0; else $ho_id=$data["ho_id"];
	if ($data["tglberlaku"]=="")
		$tglberlaku="0000-00-00";
	else
		$tglberlaku=date("Y-m-d",strtotime($data["tglberlaku"])); 
	if ($data["tglberakhir"]=="")
		$tglberakhir="0000-00-00";
	else
		$tglberakhir=date("Y-m-d",strtotime($data["tglberakhir"])); 
    $retribusi=$data["retribusi"];

	if ($data["tglsurvey"]=="")
		$tglsurvey="0000-00-00";
	else
		$tglsurvey=date("Y-m-d",strtotime($data["tglsurvey"])); 
    
	$expiredpajak=$data["expiredpajak"];

	$sql = "UPDATE reklame SET tahun = '$tahun',
		   tglberlaku = '$tglberlaku', 
		   tglberakhir = '$tglberakhir',expiredpajak = '$expiredpajak', retribusi = '$retribusi'
		   WHERE id = '$id'";        

	 $records=$this->db->query($sql);
	}

	function put_edit_reklame_detil($data,$id)
    {				

	$jenisreklame_id=$data["jenisreklame_id"];
	$jumlah=$data["jumlah"]; if ($jumlah=="") $jumlah=0;
	$ukuran=$data["ukuran"];
	$cakupan_media=$data["cakupan_media"];
	$ilreklame_id=$data["ilreklame_id"];
	$harga=$data["harga"]; if ($harga=="") $harga=0;
	$tanah_pemerintah=$data["tanah_pemerintah"]; if ($tanah_pemerintah=="") $tanah_pemerintah=0;
	$sifat_reklame=$data["sifat_reklame"]; if ($sifat_reklame=="") $sifat_reklame=0;
	$rokok_alkohol=$data["rokok_alkohol"]; if ($rokok_alkohol=="") $rokok_alkohol=0;
	$tempat=$data["tempat"];
	
	if ($data["tglmulai"]=="")
		$tglmulai="0000-00-00";
	else
		$tglmulai=date("Y-m-d",strtotime($data["tglmulai"])); 

	$jangkawaktu=$data["jangkawaktu"]; if ($jangkawaktu=="") $jangkawaktu=0;
	$satuanwaktu_id=$data["satuanwaktu_id"]; 	
	
	$sql  = "UPDATE reklamedetail SET jenisreklame_id='$jenisreklame_id',jumlah='$jumlah', ukuran='$ukuran', cakupan_media='$cakupan_media', ilreklame_id='$ilreklame_id',
			harga='$harga', tanah_pemerintah='$tanah_pemerintah', sifat_reklame='$sifat_reklame', rokok_alkohol='$rokok_alkohol',
			tempat='$tempat', tglmulai='$tglmulai',jangkawaktu='$jangkawaktu',satuanwaktu_id='$satuanwaktu_id' WHERE id = '$id'";        
 
	$records=$this->db->query($sql);
	
	}

	function put_delete_reklame($id)
    {
	$sql	 ="	DELETE FROM reklame WHERE id='$id'";	
	$records=$this->db->query($sql);
	
	}

	function put_delete_reklamedetil($permohonan_id)
    {
	$sql	 ="	DELETE FROM reklamedetail WHERE permohonan_id='$permohonan_id'";	
	$records=$this->db->query($sql);
	
	}

	function get_delete_reklamedetil($id)
    {
	$sql	 ="	DELETE FROM reklamedetail WHERE id='$id'";	
	$records=$this->db->query($sql);
	
	}		
		
	function getJenisreklameList()
    {
        $sql="select * from jenisreklame";
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->reklame;
			}
		return $data;
    }	

	function getIlreklameList()
    {
        $sql="select * from ilreklame";
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->lokasi;
			}
		return $data;
    }

	function getSatuanwaktuList()
    {
       $sql="select * from satuanwaktu";
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->satuan;
			}
		return $data;
    }
}
?>