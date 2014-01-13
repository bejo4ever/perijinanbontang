<?
class Siup_model extends CI_Model {   

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

	function get_data_perusahaan_siup($perusahaan_id,$permohonan_id)
    {
		$sql	=   "SELECT * FROM siup 					
					where perusahaan_id='$perusahaan_id' and permohonan_id='$permohonan_id'";        
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data["kusaha_id"]=$row->kusaha_id;			
			$data["kbli"]=$row->kbli;
			$data["kelembagaan_id"]=$row->kelembagaan_id;
			$data["lembaga"]=$row->lembaga;
			$data["busaha_id"]=$row->busaha_id;	
			$data["merk_id"]=$row->merk_id;			
			$data["dagangan"]=$row->dagangan;					
			}
		return $data;
    }

  	function get_data_siup($id)
    {
		$sql	=   "SELECT t.id siup_id,p.pemohon_id pemohon_id,date_format(p.tglpermohonan,'%d-%m-%Y') as tglpermohonan,p.jpermohonan_id,p.no_agenda,p.noregistrasi,perusahaan_id,					
					p.retribusi,p.sbayar,date_format(p.tglbayar,'%d-%m-%Y') as tglbayar,p.nama_bibit,p.jumlah_bibit,p.nosk,date_format(p.tglsk,'%d-%m-%Y') as tglsk,date_format(p.tglexpired,'%d-%m-%Y') as tglexpired,p.catatan_bo FROM siup t,permohonan p
					where t.permohonan_id=p.id and p.id=$id";        
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data["siup_id"]=$row->siup_id;
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
			}
		return $data;
    }

	function put_insert_siup($data,$perusahaan_id,$permohonan_id)
    {		
	
	$kusaha_id=$data["kusaha"]; if ($kusaha_id=="") $kusaha_id=1;
	$kbli=$data["kbli"];
	$kelembagaan_id=$data["kelembagaan"];
	$lembaga=$data["lembaga"];
	$busaha_id=$data["busaha"];
	$merk_id=$data["merk"];
	$dagangan=$data["dagangan"];
	  
	$sql	= "	INSERT INTO siup(perusahaan_id,permohonan_id,kusaha_id,kbli,kelembagaan_id,lembaga,busaha_id,merk_id,dagangan) 
					VALUE('$perusahaan_id','$permohonan_id','$kusaha_id','$kbli','$kelembagaan_id','$lembaga','$busaha_id','$merk_id','$dagangan')";

	 

	$records=$this->db->query($sql);

	return $this->db->insert_id();
	}

	function put_edit_siup($data,$id)
    {	
	$perusahaan_id=$_POST['perusahaan_id'];
	$kusaha_id=$data["kusaha"]; if ($kusaha_id=="") $kusaha_id=1;
	$kbli=$data["kbli"];
	$kelembagaan_id=$data["kelembagaan"];
	$lembaga=$data["lembaga"];
	$busaha_id=$data["busaha"];
	$merk_id=$data["merk"];
	$dagangan=$data["dagangan"];
	  

	$sql ="	UPDATE siup SET kusaha_id='$kusaha_id',kbli='$kbli',kelembagaan_id='$kelembagaan_id',lembaga='$lembaga',
			busaha_id='$busaha_id', merk_id='$merk_id', dagangan='$dagangan' 
			WHERE id='$id'";

	 $records=$this->db->query($sql);
	}

	function put_delete_siup($id)
    {
	$sql	 ="	DELETE FROM siup WHERE id='$id'";	
	$records=$this->db->query($sql);
	}
	
	function ListStatusTempat()
    {
        $sql	= "SELECT * FROM stempat ORDER BY id";
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->status;
			}
		return $data;
    }

	function ListBidangUsaha()
    {
        $sql	= "SELECT * FROM busaha ORDER BY id";
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->bidang;
			}
		return $data;
    }

	function ListKelembagaan()
    {
        $sql	= "SELECT * FROM kelembagaan ORDER BY id";
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->kelembagaan;
			}
		return $data;
    }

	function ListMerk()
    {
        $sql	= "SELECT * FROM merk ORDER BY id";
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->merk;
			}
		return $data;
    }
}
?>