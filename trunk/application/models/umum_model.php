<?
class Umum_model extends CI_Model {   

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function ListIjin()
    {
        $sql	= "SELECT * FROM ijin ORDER BY id";
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->nama;
			}
		return $data;
    }

    function ListWargaNegara()
    {
        $sql	= "SELECT * FROM warga ORDER BY id";
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->warga;
			}
		return $data;
    }

  	function get_data_vsiup($id)
    {
		$sql	=   "SELECT pemohon_id,perusahaan_id,nosk FROM siup s,permohonan p 					
					where s.permohonan_id=p.id and s.id=$id";        
        $records=$this->db->query($sql,$id);
		$data=array();
		foreach($records->result() as $row)
			{
			$data["pemohon_id"]=$row->pemohon_id;
			$data["perusahaan_id"]=$row->perusahaan_id;
			$data["nosk"]=$row->nosk;			
			}
		return $data;
    }
	

	function GetNoRegistrasi($jenis)
	{	
	$romawi=array('I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
	$counter= 0;
	$format	= '';
	//$link 	= new db(EZSQL_DB_USER, EZSQL_DB_PASSWORD, EZSQL_DB_NAME, EZSQL_DB_HOST);
	//$db->get_results($sql);	
	$sql ="	SELECT counter,format  
			FROM noregistrasi   
			WHERE ijin_id='$jenis'";
	
	if ($rs=$this->db->query($sql))
	{		
		foreach ($rs->result() as $row)
		{		 
			$counter=$row->counter;
			$format=$row->format;			
		}
	}		 
	$counter++;
	$temp	= explode('/',$format);
	$result	= '';
	for($i=0;$i<count($temp);$i++)
	{
		//echo $temp[$i]; 
		if($temp[$i]=='X')$temp[$i]=$counter;
		if($temp[$i]=='M')$temp[$i]=$romawi[date('n')-1];
		if($temp[$i]=='Y')$temp[$i]=date('Y');
		$result.=$result ? "/".$temp[$i] :$temp[$i]; 
	}
	//$link->close();	
	$sql ="UPDATE noregistrasi SET counter='$counter' WHERE ijin_id='$jenis'";
	$this->db->query($sql);
	return $result;
	}

}
?>