<?
class Ho_model extends CI_Model {   

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

	function get_data_perusahaan_siup($perusahaan_id,$permohonan_id)
    {
		$sql	=   "SELECT * FROM siup 					
					where perusahaan_id='$perusahaan_id' and permohonan_id='$permohonan_id'";        
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data["kusaha_id"]=$row->kusaha_id;			
			$data["kbli"]=$row->kbli;
			$data["kelembagaan_id"]=$row->kelembagaan_id;
			$data["lembaga"]=$row->lembaga;
			$data["busaha_id"]=$row->busaha_id;	
			$data["merk_id"]=$row->merk_id;			
			$data["dagangan"]=$row->dagangan;					
			}
		return $data;
    }

	function get_data_ho($id)
    {
		$sql	=   "SELECT t.*,date_format(t.tglsurvey,'%d-%m-%Y') as tglsurvey,t.id ho_id,p.pemohon_id pemohon_id,date_format(p.tglpermohonan,'%d-%m-%Y') as tglpermohonan,p.jpermohonan_id,p.no_agenda,p.noregistrasi,perusahaan_id,					
					p.retribusi,p.sbayar,date_format(p.tglbayar,'%d-%m-%Y') as tglbayar,p.nama_bibit,p.jumlah_bibit,p.nosk,date_format(p.tglsk,'%d-%m-%Y') as tglsk,date_format(p.tglexpired,'%d-%m-%Y') as tglexpired,p.catatan_bo FROM ho t,permohonan p
					where t.permohonan_id=p.id and p.id=$id";        
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data["ho_id"]=$row->ho_id;
			$data["noregistrasi"]=$row->noregistrasi;
			$data["pemohon_id"]=$row->pemohon_id;
			$data["tglpermohonan"]=$row->tglpermohonan;
			$data["jpermohonan_id"]=$row->jpermohonan_id;			
			$data["no_agenda"]=$row->no_agenda;
			$data["perusahaan_id"]=$row->perusahaan_id;
			$data["retribusi"]=$row->retribusi;
			$data["sbayar"]=$row->sbayar;
			$data["tglbayar"]=$row->tglbayar;
			$data["nama_bibit"]=$row->nama_bibit;
			$data["jumlah_bibit"]=$row->jumlah_bibit;
			$data["nosk"]=$row->nosk;
			$data["tglsk"]=$row->tglsk;
			$data["tglexpired"]=$row->tglexpired;
			$data["catatan_bo"]=$row->catatan_bo;

			$data["tahun"]=$row->tahun;
			$data["statustempat_id"]=$row->statustempat_id;
			$data["luas"]=$row->luas;
			$data["alamat3"]=$row->alamat;
			$data["kecamatan_id3"]=$row->kecamatan_id;
			$data["desa_id3"]=$row->desa_id;
			$data["bentukbangunan"]=$row->bentukbangunan_id;
			$data["butara"]=$row->butara;
			$data["btimur"]=$row->btimur;
			$data["bselatan"]=$row->bselatan;
			$data["bbarat"]=$row->bbarat;
			$data["permohonan_jenis"]=$row->permohonan_jenis;
			$data["indeksgangguan_id"]=$row->indeksgangguan_id;
			$data["indekslokasi_id"]=$row->indekslokasi_id;			
			$data["tglsurvey"]=$row->tglsurvey;
			$data["keterangan"]=$row->keterangan;
			$data["sdata"]=$row->sdata;
			$data["peruntukan"]=$row->peruntukan;
			$data["no_imb"]=$row->no_imb;		
			}
		
		return $data;
    }

  	function get_data_vho($id)
    {
		$sql	=   "SELECT t.*,date_format(t.tglsurvey,'%d-%m-%Y') as tglsurvey,t.id ho_id,p.pemohon_id pemohon_id,date_format(p.tglpermohonan,'%d-%m-%Y') as tglpermohonan,p.jpermohonan_id,p.no_agenda,p.noregistrasi,perusahaan_id,					
					p.retribusi,p.sbayar,date_format(p.tglbayar,'%d-%m-%Y') as tglbayar,p.nama_bibit,p.jumlah_bibit,p.nosk,date_format(p.tglsk,'%d-%m-%Y') as tglsk,date_format(p.tglexpired,'%d-%m-%Y') as tglexpired,p.catatan_bo FROM ho t,permohonan p
					where t.permohonan_id=p.id and t.id=$id";        
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data["ho_id"]=$row->ho_id;
			$data["noregistrasi"]=$row->noregistrasi;
			$data["pemohon_id"]=$row->pemohon_id;
			$data["tglpermohonan"]=$row->tglpermohonan;
			$data["jpermohonan_id"]=$row->jpermohonan_id;			
			$data["no_agenda"]=$row->no_agenda;
			$data["perusahaan_id"]=$row->perusahaan_id;
			$data["retribusi"]=$row->retribusi;
			$data["sbayar"]=$row->sbayar;
			$data["tglbayar"]=$row->tglbayar;
			$data["nama_bibit"]=$row->nama_bibit;
			$data["jumlah_bibit"]=$row->jumlah_bibit;
			$data["nosk"]=$row->nosk;
			$data["tglsk"]=$row->tglsk;
			$data["tglexpired"]=$row->tglexpired;
			$data["catatan_bo"]=$row->catatan_bo;

			$data["tahun"]=$row->tahun;
			$data["statustempat_id"]=$row->statustempat_id;
			$data["luas"]=$row->luas;
			$data["alamat3"]=$row->alamat;
			$data["kecamatan_id3"]=$row->kecamatan_id;
			$data["desa_id3"]=$row->desa_id;
			$data["bentukbangunan"]=$row->bentukbangunan_id;
			$data["butara"]=$row->butara;
			$data["btimur"]=$row->btimur;
			$data["bselatan"]=$row->bselatan;
			$data["bbarat"]=$row->bbarat;
			$data["permohonan_jenis"]=$row->permohonan_jenis;
			$data["indeksgangguan_id"]=$row->indeksgangguan_id;
			$data["indekslokasi_id"]=$row->indekslokasi_id;			
			$data["tglsurvey"]=$row->tglsurvey;
			$data["keterangan"]=$row->keterangan;
			$data["sdata"]=$row->sdata;
			$data["peruntukan"]=$row->peruntukan;
			$data["no_imb"]=$row->no_imb;
			}
		return $data;
    }

	function get_data_surveyor($ho_id)
    {
		$sql	=   "SELECT * from ho_surveyor
					where ho_id=$ho_id";
		$records=$this->db->query($sql);
		$data=array();
		$i=1;
		foreach($records->result() as $row)
			{
			$data["nama_surveyor$i"]=$row->nama_surveyor;
			$data["instansi_jabatan$i"]=$row->instansi_jabatan;		
			$data["idSurveyor$i"]=$row->id;	
			$i++;
			}  		   
		$data["totaldatasurveyor"]=($i-1);
		return $data;
	}
	

	function put_insert_ho($data,$perusahaan_id,$permohonan_id)
    {				
	$tahun=$data["tahun"]; if ($tahun=="") $tahun=date('Y');
	$statustempat_id=$data["statustempat_id"];
    $luas=$data["luas"];
    $alamat=$data["alamat3"];
    $kecamatan_id=$data["kecamatan_id3"];
    $desa_id=$data["desa_id3"];
    $bentukbangunan_id=$data["bentukbangunan_id"];
    $butara=$data["butara"];
    $btimur=$data["btimur"];
    $bselatan=$data["bselatan"];
    $bbarat=$data["bbarat"];
    $indeksgangguan_id=$data["indeksgangguan_id"]; if ($indeksgangguan_id=="") $indeksgangguan_id=0;
    $indekslokasi_id=$data["indekslokasi_id"]; if ($indekslokasi_id=="") $indekslokasi_id=0;
    $retribusi=$data["retribusi"];
	if ($data["tglsurvey"]=="")
		$tglsurvey="0000-00-00";
	else
		$tglsurvey=date("Y-m-d",strtotime($data["tglsurvey"])); 
    $keterangan=$data["keterangan"];
    $no_imb=$data["no_imb"];

	  
	$sql="insert into ho(`tahun`,`statustempat_id`,`luas`,`alamat`,`kecamatan_id`,`desa_id`,`bentukbangunan_id`,`butara`,`btimur`,`bselatan`,`bbarat`,`permohonan_id`,`perusahaan_id`,`indeksgangguan_id`,`indekslokasi_id`,`retribusi`,`tglsurvey`,`keterangan`,`no_imb`) 
			values ('$tahun','$statustempat_id','$luas','$alamat','$kecamatan_id','$desa_id','$bentukbangunan_id','$butara','$btimur','$bselatan','$bbarat','$permohonan_id','$perusahaan_id','$indeksgangguan_id','$indekslokasi_id','$retribusi','$tglsurvey','$keterangan','$no_imb')";

	 
	$records=$this->db->query($sql);

	return $this->db->insert_id();
	}

	function put_edit_ho($data,$id)
    {		
	$tahun=$data["tahun"]; if ($tahun=="") $tahun=date('Y');
	$statustempat_id=$data["statustempat_id"];
    $luas=$data["luas"];
    $alamat=$data["alamat3"];
    $kecamatan_id=$data["kecamatan_id3"];
    $desa_id=$data["desa_id3"];
    $bentukbangunan_id=$data["bentukbangunan_id"];
    $butara=$data["butara"];
    $btimur=$data["btimur"];
    $bselatan=$data["bselatan"];
    $bbarat=$data["bbarat"];
    $indeksgangguan_id=$data["indeksgangguan_id"]; if ($indeksgangguan_id=="") $indeksgangguan_id=0;
    $indekslokasi_id=$data["indekslokasi_id"]; if ($indekslokasi_id=="") $indekslokasi_id=0;
    $retribusi=$data["retribusi"];
	if ($data["tglsurvey"]=="")
		$tglsurvey="0000-00-00";
	else
		$tglsurvey=date("Y-m-d",strtotime($data["tglsurvey"])); 
    $keterangan=$data["keterangan"];
    $no_imb=$data["no_imb"];
	$peruntukan=$data["peruntukan"];  

	$sql="update ho set `tahun`='$tahun',`statustempat_id`='$statustempat_id',`luas`='$luas',`alamat`='$alamat',
	`kecamatan_id`='$kecamatan_id',`desa_id`='$desa_id',`bentukbangunan_id`='$bentukbangunan_id',`butara`='$butara',`btimur`='$btimur',
	`bselatan`='$bselatan',`bbarat`='$bbarat',
	`indeksgangguan_id`='$indeksgangguan_id',`indekslokasi_id`='$indekslokasi_id',`retribusi`='$retribusi',`tglsurvey`='$tglsurvey',
	`keterangan`='$keterangan', `peruntukan` = '$peruntukan', `no_imb`='$no_imb' where id=$id";

	 $records=$this->db->query($sql);
	}

	function put_delete_ho($id)
    {
	$sql	 ="	DELETE FROM ho WHERE id='$id'";	
	$records=$this->db->query($sql);

	$sql	 ="	DELETE FROM ho_surveyor WHERE ho_id='$id'";	
	$records=$this->db->query($sql);
	}

	function put_insert_surveyor($data,$idHO)
    {
	$nama_surveyor=$data["nama_surveyor"];
	$jabatan_surveyor=$data["jabatan_surveyor"];

	$sql  ="INSERT INTO ho_surveyor(`ho_id`,`nama_surveyor`,`instansi_jabatan`) VALUES ('$idHO', '$nama_surveyor','$jabatan_surveyor')";	
	$records=$this->db->query($sql);

	}

	function put_edit_surveyor($data,$id)
    {
	$nama_surveyor=$data["nama_surveyor"];
	$jabatan_surveyor=$data["jabatan_surveyor"];

	$sql  ="UPDATE ho_surveyor set `nama_surveyor`='$nama_surveyor',`instansi_jabatan`='$jabatan_surveyor' where id='$id'";	
	$records=$this->db->query($sql);

	}

	function put_delete_surveyor($id)
    {
	$sql  ="DELETE FROM ho_surveyor where id='$id'";	
	$records=$this->db->query($sql);

	}
		
	function ListJusaha()
    {
        $sql	= "SELECT * FROM jusaha";
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->usaha;
			}
		return $data;
    }

	function ListStatusTempat()
    {
        $sql	= "SELECT * FROM statustempat";
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->status;
			}
		return $data;
    }
	
	function ListBentukBangunan()
    {
        $sql	= "SELECT * FROM bentukbangunan";
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->bentuk;
			}
		return $data;
    }
	
	function ListIndeksGangguan()
    {
        $sql	= "SELECT * FROM indeksgangguan";
        $records=$this->db->query($sql);
		$data=array();		
		$data[0]="-";
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->gangguan;
			}
		return $data;
    }

	function ListIndeksLokasi()
    {
        $sql	= "SELECT * FROM indekslokasi";
        $records=$this->db->query($sql);
		$data=array();		
		$data[0]="-";
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->lokasi;
			}
		return $data;
    }

	function get_tarif_ho($jenis_perusahaan,$id_gangguan,$id_lokasi,$luas)
    {
        $sql	= "SELECT tarif FROM retjusaha where jusaha_id='$jenis_perusahaan' and bmin<=$luas and bmax>=$luas";
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data1["tarif"] = $row->tarif;
			}
		
		$sql	= "SELECT nilai FROM indeksgangguan where id='$id_gangguan'";
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data2["indeksgangguan"] = $row->nilai;
			}

		$sql	= "SELECT nilai FROM indekslokasi where id='$id_lokasi'";
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data3["indekslokasi"] = $row->nilai;
			}
		$data=array_merge($data1,$data2, $data3);
		return $data;
    }	
}
?>