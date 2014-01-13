<?
class Lokasi_cetak_sk_model extends CI_Model {   
		
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	function get_detil($table,$id){
		$sql = "	SELECT	* 
					FROM	$table 
					WHERE	id = $id	";
		$records = $this->db->query($sql);
		return $records->row();
	}

	function get_detil_lokasi_by_permohonan_id($id)
	{
		$sql	= " SELECT	a.*,b.kecamatan,c.desa 
					FROM	ilokasi a 
							LEFT OUTER JOIN kecamatan b ON a.kecamatan_id=b.id 
							LEFT OUTER JOIN desa c ON a.desa_id=c.id 					
					WHERE	a.permohonan_id = '$id'";							
		$records = $this->db->query($sql);		
		return $records->row();
	}
	


}
?>