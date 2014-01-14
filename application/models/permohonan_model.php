<?php
class Permohonan_model extends CI_Model {   

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

	function put_insert_statuspermohonan($permohonan_id,$spermohonan_id,$tglupdate)
    {
	   //$sql	= "INSERT INTO permohonanstatus(permohonan_id,spermohonan_id,tglupdate,user_id) 
		//			VALUE($permohonan_id,$spermohonan_id,'$tglupdate',$user_id)";

	// cek lagi, semestinya SQL atas

		$sql	= "INSERT INTO permohonanstatus(permohonan_id,spermohonan_id,tglupdate) 
					VALUE($permohonan_id,$spermohonan_id,'$tglupdate')";

  	  	$records=$this->db->query($sql);

		$sql	= "UPDATE permohonan SET spermohonan_id='$spermohonan_id' WHERE id='$permohonan_id'";
		
		$records=$this->db->query($sql);	
	  
    }

	function put_insert_permohonan($data,$pemohon_id,$noregistrasi)
    {
	   	$jpermohonan_id=$data["jnspermohonan"];
	   	$catatan_bo=$data["catatan_bo"];
	   	//$noregistrasi=$data["noregistrasi"];
	   	$ijin_id=$data["ijin_id"];
	   	$nosk=$data["nosk"];
	   	if ($data["tglterbit"]=="")
			$tglsk="0000-00-00";
	   	else
	   		$tglsk=date("Y-m-d",strtotime($data["tglterbit"])); 
		if ($data["tglexpired"]=="")
			$tglexpired="0000-00-00";
	   	else
	   		$tglexpired=date("Y-m-d",strtotime($data["tglexpired"])); 
	   	$statusbayar=$data["sbayar"];
		if ($data["tglbayar"]=="")
			$tglbayar="0000-00-00";
	   	else
	   		$tglbayar=date("Y-m-d",strtotime($data["tglbayar"])); 
	   	$retribusi=$data["retribusi"];
	   	$jumlahbibit=$data["jumlah_bibit"];
	   	$namabibit=$data["nama_bibit"];
	   	$no_agenda=$data["no_agenda"];
	   	$ketbayar=$data["ketbayar"];
	   	$atasnama=$data["atasnama"];
	   	$jabatan=$data["jabatan"];
	   	$nip=$data["nip"];
	   	$pejabat=$data["pejabat"];
		if ($data["tglmohon"]=="")
			$tglpermohonan="0000-00-00";
	   	else
	   		$tglpermohonan=date("Y-m-d",strtotime($data["tglmohon"])); 
	   	$tahun=date("Y",strtotime($data["tglmohon"]));
				
      $sql	= "	INSERT INTO permohonan(jpermohonan_id,tahun,noregistrasi,ijin_id,pemohon_id,tglpermohonan,nosk,tglsk,tglexpired,pejabat,nip,jabatan,atasnama,sbayar,tglbayar,retribusi,jumlah_bibit,nama_bibit,no_agenda,ketbayar, catatan_bo) 	
					VALUE('$jpermohonan_id','$tahun','$noregistrasi','$ijin_id','$pemohon_id','$tglpermohonan','$nosk','$tglsk','$tglexpired','$pejabat','$nip','$jabatan','$atasnama','$statusbayar','$tglbayar','$retribusi','$jumlahbibit','$namabibit','$no_agenda','$ketbayar', '$catatan_bo')";

  	  $records=$this->db->query($sql);
	
	  return $this->db->insert_id();
    }

	function put_edit_permohonan($data,$id)
    {
	   	$jpermohonan_id=$data["jnspermohonan"];
	   	$catatan_bo=$data["catatan_bo"];
	   	$noregistrasi=$data["noregistrasi"];
	   	$ijin_id=$data["ijin_id"];
	   	$nosk=$data["nosk"];
	   	if ($data["tglterbit"]=="")
			$tglsk="0000-00-00";
	   	else
	   		$tglsk=date("Y-m-d",strtotime($data["tglterbit"]));
	   	if ($data["tglexpired"]=="")
			$tglexpired="0000-00-00";
	   	else
	   		$tglexpired=date("Y-m-d",strtotime($data["tglexpired"])); 
	   	$statusbayar=$data["sbayar"];
	   	if ($data["tglbayar"]=="")
			$tglbayar="0000-00-00";
	   	else
	   		$tglbayar=date("Y-m-d",strtotime($data["tglbayar"]));
	  	$retribusi=$data["retribusi"];
	   	$jumlahbibit=$data["jumlah_bibit"];
	   	$namabibit=$data["nama_bibit"];
	   	$noagenda=$data["no_agenda"];
	  	$ketbayar=$data["ketbayar"];
		
		if ($data["tglmohon"]=="")
			$tglmohon="0000-00-00";
	   	else
		   	$tglmohon=date("Y-m-d",strtotime($data["tglmohon"]));		
	   	$tahun=date("Y",strtotime($data["tglmohon"]));
				
       $sql ="	UPDATE permohonan  
				SET jpermohonan_id='$jpermohonan_id', catatan_bo='$catatan_bo', tahun='$tahun', ijin_id='$ijin_id', 
				nosk='$nosk', tglsk='$tglsk',tglexpired='$tglexpired',sbayar='$statusbayar',tglbayar='$tglbayar',retribusi='$retribusi',
				jumlah_bibit=$jumlahbibit,nama_bibit='$namabibit',no_agenda='$noagenda',ketbayar='$ketbayar',tglpermohonan='$tglmohon'
				WHERE id='$id'";

  	   $records=$this->db->query($sql);
    }

	function put_delete_permohonan($id)
    {
	$sql ="	DELETE FROM permohonan WHERE id='$id'";
	$records=$this->db->query($sql);
	}

	function get_listPersyaratan($idIjin)
    {        
		$sql	= "	SELECT b.id,b.syarat 
					FROM ijinsyarat a 
					LEFT OUTER JOIN syarat b ON a.syarat_id=b.id 
					WHERE a.ijin_id=?";
        $records=$this->db->query($sql,$idIjin);
		$data=array();
		$i=0;
		foreach($records->result() as $row)
			{
			$id[$i] = $row->id;
			$data[$i] = $row->syarat;
			$i++;
			}
		$result[0] 	= $i;
		$result[1]	= $data;
		$result[2]	= $id;
		return $result;
    }
  

}
?>