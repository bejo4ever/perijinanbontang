<?
class Ho_cetak_sk_model extends CI_Model {   
		
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

	function get_detil_ho($id)
	{
		$sql	= " SELECT	a.*,b.status AS statustempat,c.kecamatan,d.desa,e.gangguan, f.lokasi, g.bentuk
					FROM	ho a 
							LEFT OUTER JOIN statustempat b ON a.statustempat_id=b.id 
							LEFT OUTER JOIN kecamatan c ON a.kecamatan_id=c.id 
							LEFT OUTER JOIN desa d ON a.desa_id=d.id 
							LEFT OUTER JOIN indeksgangguan e ON a.indeksgangguan_id=e.id 
							LEFT OUTER JOIN indekslokasi f ON a.indekslokasi_id=f.id 
							LEFT OUTER JOIN bentukbangunan g ON a.bentukbangunan_id=g.id 
					WHERE	a.permohonan_id = '$id'	";
		$records = $this->db->query($sql);		
		return $records->row();
	}
	
	function get_detil_data_perusahaan($id)
	{	 
		$sql	= "	SELECT	a.*, b.nama AS bentuk, c.kecamatan, d.desa, e.status AS stempat, 
							f.kualifikasi, g.status AS sperusahaan, h.usaha AS jusaha    
					FROM	perusahaan a 
							LEFT OUTER JOIN bentukperusahaan b ON a.bentuk_id = b.id 
							LEFT OUTER JOIN kecamatan c ON a.kecamatan_id = c.id 
							LEFT OUTER JOIN desa d ON a.desa_id = d.id 
							LEFT OUTER JOIN stempat e ON a.stempat_id = e.id 					
							LEFT OUTER JOIN kualifikasi f ON a.kualifikasi_id = f.id 					
							LEFT OUTER JOIN sperusahaan g ON a.sperusahaan_id = g.id
							LEFT OUTER JOIN jusaha h ON a.jusaha_id = h.id 
					WHERE	a.id= '$id'	";	
		$records = $this->db->query($sql);		
		return $records->row();
	}


}
?>