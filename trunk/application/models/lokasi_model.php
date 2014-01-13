<?
class Lokasi_model extends CI_Model {   

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

	function get_data_lokasi($id)
    {		
		$sql	=   "SELECT t.*,t.id lokasi_id,p.pemohon_id pemohon_id,date_format(p.tglpermohonan,'%d-%m-%Y') as tglpermohonan,p.jpermohonan_id,p.no_agenda,p.noregistrasi,					
					p.retribusi,p.sbayar,date_format(t.tglsurat,'%d-%m-%Y') as tglsurat,date_format(t.tglsk_lama,'%d-%m-%Y') as tglsk_lama,date_format(p.tglbayar,'%d-%m-%Y') as tglbayar,p.nama_bibit,p.jumlah_bibit,p.nosk,date_format(p.tglsk,'%d-%m-%Y') as tglsk,date_format(p.tglexpired,'%d-%m-%Y') as tglexpired,p.catatan_bo FROM ilokasi t,permohonan p
					where t.permohonan_id=p.id and p.id=$id";        
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data["lokasi_id"]=$row->lokasi_id;
			$data["noregistrasi"]=$row->noregistrasi;
			$data["pemohon_id"]=$row->pemohon_id;
			$data["tglpermohonan"]=$row->tglpermohonan;
			$data["jpermohonan_id"]=$row->jpermohonan_id;			
			$data["no_agenda"]=$row->no_agenda;			
			$data["retribusi"]=$row->retribusi;
			$data["sbayar"]=$row->sbayar;
			$data["tglbayar"]=$row->tglbayar;
			$data["nama_bibit"]=$row->nama_bibit;
			$data["jumlah_bibit"]=$row->jumlah_bibit;
			$data["nosk"]=$row->nosk;
			$data["tglterbit"]=$row->tglsk;
			$data["tglexpired"]=$row->tglexpired;
			$data["catatan_bo"]=$row->catatan_bo;
										
			$data["sdata"]=$row->sdata;
			$data["peruntukan"]=$row->peruntukan;
			
			$data["alamat2"]=$row->alamat;
			$data["rt2"]=$row->rt;
			$data["kecamatan_id2"]=$row->kecamatan_id;
			$data["desa_id2"]=$row->desa_id;
			$data["luas"]=$row->luas;
			$data["peruntukan"]=$row->peruntukan;

			$data["point1"]=$row->point1;
			$data["point1_2"]=$row->point1_2;
			$data["point1_3"]=$row->point1_3;
			$data["point2"]=$row->point2;
			$data["point3"]=$row->point3;
			$data["point6"]=$row->point6;
			$data["nosk_lama"]=$row->nosk_lama;
			$data["tglsk_lama"]=$row->tglsk_lama;
			$data["nosurat"]=$row->nosurat;
			$data["tglsurat"]=$row->tglsurat;
			}
		
		return $data;
    }

  	
	
	function put_insert_lokasi($data,$permohonan_id)
    {				
	$tahun=$data["tahun"]; if ($tahun=="") $tahun=date('Y');	
    $luas=$data["luas"];
	$rt=$data["rt2"];
	$rw=$data["rw2"];
	$peruntukan=$data["peruntukan"];	
    $alamat=$data["alamat2"];
    $kecamatan_id=$data["kecamatan_id2"];
    $desa_id=$data["desa_id2"];
    $point1=$data["point1"];
    $point1_2=$data["point1_2"];
    $point1_3=$data["point1_3"];
    $point2=$data["point2"];
    $point3=$data["point3"];
	$point6=$data["point6"];
    
    $nosklama=$data["nosklama"];
	$nosurat=$data["nosurat"];
	$peruntukan=$data["peruntukan"];

	if ($data["tglsklama"]=="")
		$tglsklama="0000-00-00";
	else
		$tglsklama=date("Y-m-d",strtotime($data["tglsklama"])); 
    if ($data["tglsurat"]=="")
		$tglsurat="0000-00-00";
	else
		$tglsurat=date("Y-m-d",strtotime($data["tglsurat"]));

	  
	$sql	= "	INSERT INTO ilokasi(alamat,rt,rw,kecamatan_id,desa_id,luas,peruntukan,point1,point1_2,point1_3,point2,point3,point6,permohonan_id,nosk_lama,tglsk_lama,tglsurat,nosurat) 
					VALUE('$alamat','$rt','$rw','$kecamatan_id','$desa_id','$luas','$peruntukan','$point1','$point1_2','$point1_3','$point2','$point3','$point6','$permohonan_id','$nosklama','$tglsklama','$tglsurat','$nosurat')";

	 
	$records=$this->db->query($sql);

	return $this->db->insert_id();
	}

	function put_edit_lokasi($data,$id)
    {		
	$tahun=$data["tahun"]; if ($tahun=="") $tahun=date('Y');	
    $luas=$data["luas"];
	$rt=$data["rt2"];
	$rw=$data["rw2"];
	$peruntukan=$data["peruntukan"];	
    $alamat=$data["alamat2"];
    $kecamatan_id=$data["kecamatan_id2"];
    $desa_id=$data["desa_id2"];
    $point1=$data["point1"];
    $point1_2=$data["point1_2"];
    $point1_3=$data["point1_3"];
    $point2=$data["point2"];
    $point3=$data["point3"];
	$point6=$data["point6"];
    
    $nosklama=$data["nosklama"];
	$nosurat=$data["nosurat"];
	$peruntukan=$data["peruntukan"];

	if ($data["tglsklama"]=="")
		$tglsklama="0000-00-00";
	else
		$tglsklama=date("Y-m-d",strtotime($data["tglsklama"])); 
    if ($data["tglsurat"]=="")
		$tglsurat="0000-00-00";
	else
		$tglsurat=date("Y-m-d",strtotime($data["tglsurat"]));  

	$sql ="	UPDATE ilokasi SET alamat='$alamat',rt='$rt',rw='$rw', kecamatan_id='$kecamatan_id', desa_id='$desa_id', luas='$luas', 
				peruntukan='$peruntukan', point1='$point1', point1_2='$point1_2',point1_3='$point1_3',point2='$point2' , point3='$point3', point6='$point6',
				nosk_lama='$nosklama',tglsk_lama='$tglsklama',tglsurat='$tglsurat',nosurat='$nosurat'
				WHERE id='$id'";

	 $records=$this->db->query($sql);
	}

	function put_delete_lokasi($id)
    {
	$sql	 ="	DELETE FROM ilokasi WHERE id='$id'";	
	$records=$this->db->query($sql);
	
	}		
	
	
}
?>