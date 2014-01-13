<?
class Trayek_cetak_sk_model extends CI_Model {   
		
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
	
	function get_detil_itr_by_permohonan_id($id)
	{
		$sql	= " SELECT	a.*  
					FROM	itr a 
					WHERE	a.permohonan_id = '$id'	";
		$records = $this->db->query($sql);
		return $records->row();
	}


}
?>