<?
class Iujk_cetak_sk_model extends CI_Model {   
		
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

	function get_detil_iujk($id)
	{
		$sql	= " SELECT	a.*,b.jenis 
					FROM	iujk a 
							LEFT OUTER JOIN jenisjasa b ON a.jenisjasa_id = b.id 					
					WHERE	a.permohonan_id = '$id'	";
		$records = $this->db->query($sql);		
		return $records->row();
	}
	
	function get_detil_lampiran_iujk($id)	
	{
		$sql	= "	SELECT	a.*,
							(
								SELECT b.bidang
								FROM bidangjasa b
								WHERE a.bidangjasa_id = b.id
							) bidang,
							(
								SELECT b.id
								FROM bidangjasa b
								WHERE a.bidangjasa_id = b.id
							) bidang_id, 
							e.nama_proyek, e.tahun_proyek, e.nilai_proyek, d.tglpermohonan
					FROM	permohonan d, iujk c, iujkbidang a 
							LEFT OUTER JOIN bidangjasa_proyek e ON a.iujk_id = e.iujk_id AND e.bidangjasa_id = a.bidangjasa_id
					WHERE	a.iujk_id = c.id
							AND c.permohonan_id = d.id
							AND c.permohonan_id = '$id'	";
		$records = $this->db->query($sql);		
		return $records->result();		
	}

	function get_sub_klasifikasi_pekerjaan($id_bidang, $id)	
	{
		$sql	= "	SELECT	a.*, b.nama AS subbidang
					FROM	permohonan d, iujk c, iujksubbidang a, bidangjasa_sub b
					WHERE	a.iujk_id = c.id
							AND c.permohonan_id = d.id
							AND b.id = a.bidangjasa_sub_id
							AND b.bidang_jasa_id = '$id_bidang'
							AND c.permohonan_id = '$id'		";
		$records = $this->db->query($sql);		
		return $records->result();	
	}	
	
	function get_list_bidang_jasa_iujk($id)
	{
		$sql	= "	SELECT	DISTINCT a.*, b.id AS bidangjasa_proyek_id, 
							b.perusahaan_id, 
							b.bidangjasa_id, 
							b.iujk_id, 
							b.nama_proyek, 
							b.tahun_proyek, 
							b.nilai_proyek,c.id AS iujkbidang_id,c.bidangjasa_id   
					FROM	bidangjasa a 
							LEFT OUTER JOIN bidangjasa_proyek b ON b.bidangjasa_id = a.id AND b.iujk_id = '$id'
							LEFT OUTER JOIN iujkbidang c ON a.id=c.bidangjasa_id AND c.iujk_id = '$id'	";
		$records = $this->db->query($sql);		
		return $records->result();	
	}	


}
?>