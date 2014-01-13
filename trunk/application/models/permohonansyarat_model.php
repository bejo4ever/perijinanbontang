<?
class Permohonansyarat_model extends CI_Model {   

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   
  	function get_data_permohonansyarat($permohonan_id,$syarat_id)
    {
		$sql	=   "SELECT keterangan FROM permohonansyarat 					
					where permohonan_id=$permohonan_id and syarat_id=$syarat_id";        
        $records=$this->db->query($sql);
		$data="";		
		foreach($records->result() as $row)
			{
			$data=$row->keterangan;			
			}
		return $data;
    }

	function put_insert_permohonansyarat($data,$permohonan_id,$syarat_id)
    {				
	
	//$sql	= "INSERT INTO permohonansyarat(permohonan_id,syarat_id,keterangan,tglterima,user_id) 
	//				VALUE('$permohonan_id','$syarat_id','$keterangan','$tglterima','$user_id')";
	// cek lagi, semestinya SQL atas
	$sql	= "INSERT INTO permohonansyarat(permohonan_id,syarat_id,keterangan) 
					VALUES('$permohonan_id','$syarat_id','$data')";

	$records=$this->db->query($sql);
	}


	function put_edit_permohonansyarat($data,$permohonan_id,$syarat_id)
    {				
	
	$sql	= "	UPDATE permohonansyarat SET keterangan='$data' WHERE permohonan_id='$permohonan_id' and syarat_id='$syarat_id'";

	$records=$this->db->query($sql);
	}

	function put_delete_permohonansyarat($permohonan_id)
    {
	$sql	= "	DELETE FROM permohonansyarat WHERE permohonan_id='$permohonan_id'";

	$records=$this->db->query($sql);	
	}

	function put_baru_permohonansyarat($data,$id)
    {				
	$permohonan_id=$data["permohonan_id"];
	$syarat_id=$data["syarat_id"];
	$keterangan=$data["keterangan"];
	$tglterima=$data["tglterima"];
	$user_id=$data["user_id"];

	$sql	= "INSERT INTO permohonansyarat(permohonan_id,syarat_id,keterangan,tglterima,user_id) 
			   VALUES('$permohonan_id','$syarat_id','$keterangan','$tglterima','$user_id')";

	 $records=$this->db->query($sql);
	}

	function put_simpan_permohonanstatus($data)
    {					
	$permohonan_id=$data["permohonan_id"];
	$spermohonan_id=$data["spermohonan_id"];
	$tglupdate=$data["tglupdate"];
	$user_id=$data["user_id"];

	$sql	= "INSERT INTO permohonanstatus(permohonan_id,spermohonan_id,tglupdate,user_id) 
					VALUE($permohonan_id,$spermohonan_id,'$tglupdate',$user_id)";

	$sql	= "UPDATE permohonan SET spermohonan_id='$spermohonan_id' WHERE id='$permohonan_id'";

	 $records=$this->db->query($sql);
	}

}
?>