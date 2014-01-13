<?
class Tdp_cetak_sk_model extends CI_Model {   
		
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	function get_tdp_detil($id)
	{
		$sql	= "	SELECT	* 
					FROM	tdp 
					WHERE	permohonan_id = '$id'	";
		$records = $this->db->query($sql);
		return $records->result();
	}
	
	function get_detil($table,$id){
		$sql = "	SELECT	* 
					FROM	$table 
					WHERE	id = $id	";
		$records = $this->db->query($sql);
		return $records->row();
	}
	
	function get_no_form($id){
		$sql = "	SELECT	* 
					FROM	noformulir 
					WHERE	id = $id	";
		$records = $this->db->query($sql);
		$result = $records->row();
		return $result->no;
	}
	
	function get_nama_penerima($id){
		$sql = "	SELECT	DISTINCT * 
					FROM	permohonansyarat 
					WHERE	permohonan_id = $id	";
		$records = $this->db->query($sql);
		$result = $records->row();
		$id_user = $result->user_id;
		if($id_user!=""){
			$sql_2 = "	SELECT	* 
						FROM	user
						WHERE	id = $id_user	";
			$records_2 = $this->db->query($sql_2);
			$result_2 = $records_2->row();
			if(!empty($result_2->nama)){
				$nama = $result_2->nama; 
				return $nama;
			}else{
				return "";
			}
		}else{
			return "";
		}
	}
	
	function get_tgl_terima($id){
		$sql = "	SELECT	DISTINCT * 
					FROM	permohonansyarat 
					WHERE	permohonan_id = $id	";
		$records = $this->db->query($sql);
		$result = $records->row();
		return $result->tglterima;
	}

	function get_jenis_permohonan($id_jenis){
		$sql = "	SELECT	* 
					FROM	jpermohonan 
					WHERE	id = $id_jenis	";
		$records = $this->db->query($sql);
		$result = $records->row();
		return $result->jenis;
	}	
	
	function get_jumlah_permohonan_syarat($id){
		$sql = "	SELECT	IFNULL(COUNT(*),0) AS jumlah  
					FROM	permohonansyarat 
					WHERE	permohonan_id = $id	";
		$records = $this->db->query($sql);
		$result = $records->row();
		return $result->jumlah;
	}
	
	function get_permohonan_syarat($id){
		$sql = "	SELECT	*
					FROM	permohonansyarat 
					WHERE	permohonan_id = $id	";
		$records = $this->db->query($sql);		
		return $records->result();
	}	

}
?>