<?php
class Pemohon_model extends CI_Model {   

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data_pemohon($id)
    {
		$sql	=   "SELECT *,date_format(tgllahir,'%d-%m-%Y') as tgl_lahir FROM pemohon  					
					where id=$id";        
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data["ktp"]=$row->ktp;
			$data["nama1"]=$row->nama;
			$data["tempatlahir"]=$row->tempatlahir;
			$data["tgllahir"]=$row->tgl_lahir;
			$data["pekerjaan"]=$row->pekerjaan;
			$data["warga_id"]=$row->warga_id;
			$data["alamat1"]=$row->alamat;
			$data["rt1"]=$row->rt;			
			$data["kecamatan_id1"]=$row->kecamatan_id;
			$data["desa_id1"]=$row->desa_id;
			$data["telp1"]=$row->telp;
			$data["hp"]=$row->hp;
			}
		return $data;
    }

	function put_insert_pemohon($data)
    {
	$tahun=$data["tahun"];
	$nama=$data["nama"];
	$alamat=$data["jalan1"];
	$rt=$data["rt1"];
	$rw=$data["rw1"];
	$telp=$data["telp1"];
	$hp=$data["hp1"];
	$tempatlahir=$data["tlahir"];
	if ($data["tgllahir"]=="")
		$tgllahir="0000-00-00";
	else
		$tgllahir=date("Y-m-d",strtotime($data["tgllahir"])); 
	$ktp=$data["ktp"];
	$pekerjaan=$data["pekerjaan"];
	$warga_id=$data["warga_id1"];
	$propinsi_id=$data["propinsi_id1"]; if ($propinsi_id=="") $propinsi_id=0;
	$kabkota_id=$data["kabkota_id1"]; if ($kabkota_id=="") $kabkota_id=0;
	$kecamatan_id=$data["kec1"]; if ($kecamatan_id=="") $kecamatan_id==0;
	$desa_id=$data["desa1"]; if ($desa_id=="") $desa_id=0;				
					
	
	$sql	= "INSERT INTO pemohon(tahun,nama,alamat,rt,rw,telp,hp,tempatlahir,tgllahir,
				ktp,pekerjaan,warga_id,propinsi_id,kabkota_id,kecamatan_id,desa_id) 
				VALUES('$tahun','$nama','$alamat','$rt','$rw','$telp','$hp','$tempatlahir','$tgllahir',
				'$ktp','$pekerjaan','$warga_id','$propinsi_id','$kabkota_id','$kecamatan_id','$desa_id') ";

	$records=$this->db->query($sql);

	return $this->db->insert_id();
	}

	function put_edit_pemohon($data,$id)
    {
	$tahun=$data["tahun"];
	$nama=$data["nama"];
	$alamat=$data["jalan1"];
	$rt=$data["rt1"];
	$rw=$data["rw1"];
	$telp=$data["telp1"];
	$hp=$data["hp1"];
	$tempatlahir=$data["tlahir"];
	if ($data["tgllahir"]=="")
		$tgllahir="0000-00-00";
	else
		$tgllahir=date("Y-m-d",strtotime($data["tgllahir"])); 
	$ktp=$data["ktp"];
	$pekerjaan=$data["pekerjaan"];
	$warga_id=$data["warga_id1"];
	$propinsi_id=$data["propinsi_id1"]; if ($propinsi_id=="") $propinsi_id=0;
	$kabkota_id=$data["kabkota_id1"]; if ($kabkota_id=="") $kabkota_id=0;
	$kecamatan_id=$data["kec1"]; if ($kecamatan_id=="") $kecamatan_id==0;
	$desa_id=$data["desa1"]; if ($desa_id=="") $desa_id=0;				
					
	
	$sql	= "update pemohon set tahun='$tahun',nama='$nama',alamat='$alamat',rt='$rt',rw='$rw',
	telp='$telp',hp='$hp',tempatlahir='$tempatlahir',tgllahir='$tgllahir',ktp='$ktp',
	pekerjaan='$pekerjaan',warga_id='$warga_id',propinsi_id='$propinsi_id',kabkota_id='$kabkota_id',
	kecamatan_id='$kecamatan_id',desa_id='$desa_id' where id=$id";

	$records=$this->db->query($sql);
	}
	
	function put_delete_pemohon($id)
    {
	$sql ="	DELETE FROM pemohon WHERE id='$id'";
  	$records=$this->db->query($sql);
	}

}
