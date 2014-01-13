<?php 
class M_info_tambahpengaduan extends CI_Model {   

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	
	function put_insert_pengaduan($data)
    {		

	$tglnya=date("Y-m-d H:i:s");
	$sql="insert into pengaduan(nama,alamat,rt,rw,kecamatan_id,desa_id,telp,hp,email,pengaduan,tglpengaduan,user_id) 
	values ('$data[txtnama]','$data[txtalamat]','$data[txtrt]','$data[txtrw]',$data[cbocamat],$data[cbodesa],
	'$data[txttelp]','$data[txthp]','$data[txtemail]','$data[txtareaisi]','$tglnya',0)";

	$this->db->query($sql);

	//return $this->db->insert_id();
	}

    function get_kecamatan()
    {
        $sql	= "	SELECT * 
					FROM kecamatan ";
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->kecamatan;
			}
		return $data;
    }

	
}