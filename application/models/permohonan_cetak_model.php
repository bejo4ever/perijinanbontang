<?
class Permohonan_cetak_model extends CI_Model {   

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function get_pejabat($id)
	{
		$sql = " SELECT * FROM tandatangan WHERE id = '$id' ";
		$records = $this->db->query($sql);
		return $records->row();
	}
	
	function get_nama_kecamatan($id)
	{
		$sql = " SELECT * FROM kecamatan WHERE id = '$id' ";
		$records = $this->db->query($sql);
		$result = $records->row();
		return $result->kecamatan;
	}	
	
	function get_tgl_proses($id,$spermohonan_id=2)
	{
		$sql	= "	SELECT tglupdate 
					FROM permohonanstatus 
					WHERE permohonan_id='".$id."' AND spermohonan_id='$spermohonan_id' 
					ORDER BY id LIMIT 0,1";
		$records = $this->db->query($sql);
		$result = $records->row();
		return $result->tglupdate;
	}
	
	function get_detil_permohonan($id)
	{	 
		$sql	= "	SELECT	a.*,b.tahun,b.nama,b.alamat,b.rt,b.rw,b.telp,b.hp,b.tempatlahir,
							b.tgllahir,b.ktp,b.pekerjaan,b.warga_id,b.warga,b.kecamatan_id,
							b.kecamatan,b.desa_id,b.desa,c.jenis AS jenispermohonan     
					FROM	permohonan a 
							LEFT OUTER JOIN 
							(
								SELECT a.*,b.kecamatan,c.desa,d.warga  
								FROM pemohon a 
								LEFT OUTER JOIN kecamatan b ON a.kecamatan_id = b.id 
								LEFT OUTER JOIN desa c ON a.desa_id = c.id 
								LEFT OUTER JOIN warga d ON a.warga_id = d.id 						 
							) b ON a.pemohon_id = b.id  
							LEFT OUTER JOIN jpermohonan c ON a.jpermohonan_id = c.id
							LEFT OUTER JOIN ijin d ON a.ijin_id=c.id  
					WHERE	a.id = '$id'	";			
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
	
	function get_list_syarat_permohonan($id, $ijin)
	{

		$sql	= "	SELECT	b.id,a.syarat_id,c.syarat,b.keterangan,b.tglterima  
					FROM	ijinsyarat a 
							LEFT OUTER JOIN permohonansyarat b ON b.permohonan_id = '$id' 
											AND a.syarat_id = b.syarat_id   
							LEFT OUTER JOIN syarat c ON a.syarat_id = c.id 
					WHERE	a.ijin_id = '$ijin'	";
					//echo $sql;
		$records = $this->db->query($sql);
		return $records->result();
	}		

	function get_tgl_selesai($ijin){
		$sql = " select * from ijin where id = $ijin ";
		$records = $this->db->query($sql);
		$result = $records->row();
		return $result->perkiraan_selesai;
	}
	
	function get_jenis_permohonan($id){
		$sql = "select * from jpermohonan where id = $id ";
		$records = $this->db->query($sql);
		$result = $records->row();
		return $result->jenis;
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

	function get_permohonan_syarat($id){
		$sql = "	SELECT	*
					FROM	permohonansyarat 
					WHERE	permohonan_id = $id	";
		$records = $this->db->query($sql);		
		return $records->result();
	}

	function get_jumlah_permohonan_syarat($id){
		$sql = "	SELECT	IFNULL(COUNT(*),0) AS jumlah  
					FROM	permohonansyarat 
					WHERE	permohonan_id = $id	";
		$records = $this->db->query($sql);
		$result = $records->row();
		return $result->jumlah;
	}

	function get_reklame($idho){
		$sql = "select * from reklame where ho_id = $idho ";
		$records = $this->db->query($sql);
		return $records->row();
	}

	function get_reklame_detil_by_permohonan_id($idpermohonan){
		$sql = " select * from reklamedetail where permohonan_id = '$idpermohonan' ";
		$records = $this->db->query($sql);
		return $records->result();
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
	
	function get_ttd($id){
		$sql = " select * from tandatangan where id = $id ";
		$records = $this->db->query($sql);
		return $records->row();
	}
	
	function get_jpermohonan_id($id){
		$sql = "	SELECT	* 
					FROM	permohonan 
					WHERE	id = $id	";
		$records = $this->db->query($sql);
		$result = $records->row();
		return $result->jpermohonan_id;
	}

}
?>