<?
class Tdp_model extends CI_Model {   

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

  	function get_data_tdp($id)
    {
		$sql	=   "SELECT t.id tdp_id,p.pemohon_id pemohon_id,date_format(p.tglpermohonan,'%d-%m-%Y') as tglpermohonan,p.jpermohonan_id,t.counter_daftar,p.no_agenda,p.noregistrasi,perusahaan_id,t.klui,t.klui_pokok,t.no_menkeh,date_format(t.tgl_menkeh,'%d-%m-%Y') as tgl_menkeh,
					t.no_aapad,date_format(t.tgl_aapad,'%d-%m-%Y') as tgl_aapad,t.no_lpad,date_format(t.tgl_lpad,'%d-%m-%Y') as tgl_lpad,
					p.retribusi,p.sbayar,date_format(p.tglbayar,'%d-%m-%Y') as tglbayar,p.nama_bibit,p.jumlah_bibit,p.nosk,date_format(p.tglsk,'%d-%m-%Y') as tglsk,date_format(p.tglexpired,'%d-%m-%Y') as tglexpired,p.catatan_bo FROM tdp t,permohonan p
					where t.permohonan_id=p.id and p.id=$id";        
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data["tdp_id"]=$row->tdp_id;
			$data["noregistrasi"]=$row->noregistrasi;
			$data["pemohon_id"]=$row->pemohon_id;
			$data["tglpermohonan"]=$row->tglpermohonan;
			$data["jpermohonan_id"]=$row->jpermohonan_id;
			$data["counter_daftar"]=$row->counter_daftar;
			$data["no_agenda"]=$row->no_agenda;
			$data["perusahaan_id"]=$row->perusahaan_id;					
			$data["klui"]=$row->klui;
			$data["klui_pokok"]=$row->klui_pokok;
			$data["no_menkeh"]=$row->no_menkeh;
			$data["tgl_menkeh"]=$row->tgl_menkeh;
			$data["no_aapad"]=$row->no_aapad;
			$data["tgl_aapad"]=$row->tgl_aapad;
			$data["no_lpad"]=$row->no_lpad;
			$data["tgl_lpad"]=$row->tgl_lpad;
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

	function put_insert_tdp($data,$perusahaan_id,$permohonan_id)
    {		
	$klui=$data["klui3"];
	$klui_pokok=$data["klui_pokok3"];
	$no_menkeh=$data["no_menkeh3"];
	if ($data["tgl_menkeh3"]=="")
		$tgl_menkeh="0000-00-00";
	else
		$tgl_menkeh=date("Y-m-d",strtotime($data["tgl_menkeh3"])); 
	$no_aapad=$data["no_aapad3"];
	if ($data["tgl_aapad3"]=="")
		$tgl_aapad="0000-00-00";
	else
		$tgl_aapad=date("Y-m-d",strtotime($data["tgl_aapad3"])); 
	$no_lpad=$data["no_lpad3"];
	if ($data["tgl_lpad3"]=="")
		$tgl_lpad="0000-00-00";
	else
		$tgl_lpad=date("Y-m-d",strtotime($data["tgl_lpad3"])); 
	$counter_daftar=$data["counter_daftar"];
	  

	 $sql="insert into tdp(`permohonan_id`,`perusahaan_id`,`klui`,`klui_pokok`,`no_menkeh`,`tgl_menkeh`,
   `no_aapad`,`tgl_aapad`,`no_lpad`,`tgl_lpad`,`counter_daftar`) 
   values ('$permohonan_id','$perusahaan_id','$klui','$klui_pokok','$no_menkeh','$tgl_menkeh',
   '$no_aapad','$tgl_aapad','$no_lpad','$tgl_lpad','$counter_daftar')";

	 $records=$this->db->query($sql);

	return $this->db->insert_id();
	}

	function put_edit_tdp($data,$id)
    {	
	$perusahaan_id=$_POST['perusahaan_id'];
	$klui=$data["klui3"];
	$klui_pokok=$data["klui_pokok3"];
	$no_menkeh=$data["no_menkeh3"];
	if ($data["tgl_menkeh3"]=="")
		$tgl_menkeh="0000-00-00";
	else
		$tgl_menkeh=date("Y-m-d",strtotime($data["tgl_menkeh3"])); 
	$no_aapad=$data["no_aapad3"];
	if ($data["tgl_aapad3"]=="")
		$tgl_aapad="0000-00-00";
	else
		$tgl_aapad=date("Y-m-d",strtotime($data["tgl_aapad3"])); 
	$no_lpad=$data["no_lpad3"];
	if ($data["tgl_lpad3"]=="")
		$tgl_lpad="0000-00-00";
	else
		$tgl_lpad=date("Y-m-d",strtotime($data["tgl_lpad3"])); 
	$counter_daftar=$data["counter_daftar"];
	  

	$sql="update tdp set `perusahaan_id`='$perusahaan_id',
	`klui`='$klui',`klui_pokok`='$klui_pokok',`no_menkeh`='$no_menkeh',`tgl_menkeh`='$tgl_menkeh',
	`no_aapad`='$no_aapad',`tgl_aapad`='$tgl_aapad',`no_lpad`='$no_lpad',`tgl_lpad`='$tgl_lpad',
	`counter_daftar`='$counter_daftar' where id=$id";

	 $records=$this->db->query($sql);
	}

	function put_delete_tdp($id)
    {
	$sql	 ="	DELETE FROM tdp WHERE id='$id'";	
	$records=$this->db->query($sql);
	}
	
}
?>