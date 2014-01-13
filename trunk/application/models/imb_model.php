<?
class Imb_model extends CI_Model {   

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

	
  	function get_data_imb($id)
    {
		$sql	=   "SELECT t.*,t.id imb_id,p.pemohon_id pemohon_id,date_format(p.tglpermohonan,'%d-%m-%Y') as tglpermohonan,p.jpermohonan_id,p.no_agenda,p.noregistrasi,					
					t.retlama,p.sbayar,date_format(p.tglbayar,'%d-%m-%Y') as tglbayar,p.nama_bibit,p.jumlah_bibit,p.nosk,date_format(p.tglsk,'%d-%m-%Y') as tglsk,date_format(p.tglexpired,'%d-%m-%Y') as tglexpired,p.catatan_bo FROM imb t,permohonan p
					where t.permohonan_id=p.id and p.id=$id";        
        $records=$this->db->query($sql);
		$data=array();
		foreach($records->result() as $row)
			{
			$data["imb_id"]=$row->imb_id;
			$data["noregistrasi"]=$row->noregistrasi;
			$data["pemohon_id"]=$row->pemohon_id;
			$data["tglpermohonan"]=$row->tglpermohonan;
			$data["jpermohonan_id"]=$row->jpermohonan_id;			
			$data["no_agenda"]=$row->no_agenda;			
			$data["retribusi"]=$row->retlama;
			$data["sbayar"]=$row->sbayar;
			$data["tglbayar"]=$row->tglbayar;
			$data["nama_bibit"]=$row->nama_bibit;
			$data["jumlah_bibit"]=$row->jumlah_bibit;
			$data["nosk"]=$row->nosk;
			$data["tglsk"]=$row->tglsk;
			$data["tglexpired"]=$row->tglexpired;
			$data["catatan_bo"]=$row->catatan_bo;

			$data["indekstingkat_id"]=$row->indekstingkat_id;
			$data["struktur_id"]=$row->struktur_id;
			$data["fsbangunan_id"]=$row->fsbangunan_id;			
			$data["lokasi2"]=$row->lokasi;
			$data["rt2"]=$row->rt;
			$data["rw2"]=$row->rw;
			$data["kecamatan_id2"]=$row->kecamatan_id;
			$data["desa_id2"]=$row->desa_id;
			$data["peruntukan"]=$row->peruntukan;
			$data["sertifikat_id"]=$row->sertifikat_id;
			$data["luas"]=$row->luas;
			$data["butara"]=$row->butara;
			$data["bselatan"]=$row->bselatan;
			$data["bbarat"]=$row->bbarat;
			$data["btimur"]=$row->btimur;
			$data["pondasi"]=$row->pondasi;
			$data["sloof"]=$row->sloof;
			$data["tiang"]=$row->tiang;
			$data["dinding"]=$row->dinding;
			$data["ratap"]=$row->ratap;
			$data["patap"]=$row->patap;
			$data["lantai"]=$row->lantai;
			$data["jmllantai"]=$row->jmllantai;
			$data["kelasjalan_id"]=$row->kelasjalan_id;
			$data["hargataksir"]=$row->hargataksir;
			$data["plafoon"]=$row->plafoon;
			$data["retlama"]=$row->retlama;
			$data["sdata"]=$row->sdata;
			$data["no_rekomendasi"]=$row->no_rekomendasi;			
			
			}
		return $data;
    }

	function get_data_imbdata($imb_id)
    {
		$sql	=   "SELECT * from imb_data
					where imb_id=$imb_id";
		$records=$this->db->query($sql);
		$data=array();
		$i=1;
		foreach($records->result() as $row)
			{
			$data["lokasi_id$i"]=$row->lokasi_id;
			$data["tingkat_id$i"]=$row->tingkat_id;
			$data["fungsi_id$i"]=$row->fungsi_id;
			$data["struktur_id$i"]=$row->struktur_id;
			$data["luas$i"]=$row->luas;
			$data["imbdata_id$i"]=$row->id;
			$i++;
			}  
		$data["totaldatabangunan"]=($i-1);      
		return $data;
	}

	function get_data_imbindeks($imb_id)
    {
		$sql	=   "SELECT * from imbindeks
					where imb_id=$imb_id";
		$records=$this->db->query($sql);
		$data=array();
		$i=1;
		foreach($records->result() as $row)
			{
			$data["nkluas$i"]=$row->nkluas;
			$data["nktingkat$i"]=$row->nktingkat;
			$data["nklokasi$i"]=$row->nklokasi;
			$data["nkfungsi$i"]=$row->nkfungsi;
			$data["nkstruktur$i"]=$row->nkstruktur;
			$data["hargataksir$i"]=$row->hargataksir;
			$data["banyakunit$i"]=$row->banyakunit;
			$data["imbindeks_id$i"]=$row->id;
			$i++;
			}  		   
		return $data;
	}

	function get_delete_imbdata($id)
    {
		$sql	=   "delete from imb_data
					where id=$id";
		$records=$this->db->query($sql);		      		
	}

	function get_delete_imbindeks($id)
    {
		$sql	=   "delete from imbindeks
					where id=$id";
		$records=$this->db->query($sql);		
	}

	function put_insert_imb($data,$permohonan_id,$no_register)
    {		
	$tahun=$data["tahun"]; if ($tahun=="") $tahun=date('Y');
	$indekstingkat_id=$data["indekstingkat_id"];
    $struktur_id=$data["struktur_id"];
	$fsbangunan_id=$data["fsbangunan_id"];
	$lokasi=$data["lokasi"];
	$rt=$data["rt2"];
	$rw=$data["rw2"];
	$kecamatan_id=$data["kecamatan_id"];
	$desa_id=$data["desa_id"];
	$peruntukan=$data["peruntukan"];
	$sertifikat_id=$data["sertifikat_id"];
	$luas=$data["luas"];
	$butara=$data["butara"];
	$bselatan=$data["bselatan"];
	$bbarat=$data["bbarat"];
	$btimur=$data["btimur"];
	$pondasi=$data["pondasi"];
	$sloof=$data["sloof"];
	$tiang=$data["tiang"];
	$dinding=$data["dinding"];
	$ratap=$data["ratap"];
	$patap=$data["patap"];
	$lantai=$data["lantai"];
	$jmllantai=$data["jmllantai"]; if ($jmllantai=="") $jmllantai=0;
	$kelasjalan_id=$data["kelasjalan_id"]; if ($kelasjalan_id=="") $kelasjalan_id=0;
	$hargataksir=$data["hargataksir"]; if ($hargataksir=="") $hargataksir=0;
	$plafoon=$data["flafoon"];
	$retLama=$data["retribusi"]; if ($retLama=="") $retLama=0;	
	$no_rekomendasi=$data["no_rekomendasi"];

	  
	$sql	= "	INSERT INTO imb(tahun,indekstingkat_id,struktur_id,fsbangunan_id,permohonan_id,lokasi,rt,rw,kecamatan_id,desa_id,peruntukan,sertifikat_id,luas,butara,bselatan,bbarat,btimur,pondasi,sloof,tiang,dinding,ratap,patap,lantai,jmllantai,kelasjalan_id,hargataksir,plafoon,retlama, no_register, no_rekomendasi) 
					VALUE('$tahun','$indekstingkat_id','$struktur_id','$fsbangunan_id','$permohonan_id','$lokasi','$rt','$rw','$kecamatan_id','$desa_id','$peruntukan','$sertifikat_id','$luas','$butara','$bselatan','$bbarat','$btimur','$pondasi','$sloof','$tiang','$dinding','$ratap','$patap','$lantai','$jmllantai','$kelasjalan_id','$hargataksir','$plafoon','$retLama', '$no_register', '$no_rekomendasi')";

	 

	$records=$this->db->query($sql);

	return $this->db->insert_id();
	}

	function put_edit_imb($data,$id)
    {		
	$tahun=$data["tahun"]; if ($tahun=="") $tahun=date('Y');
	$indekstingkat_id=$data["indekstingkat_id"];
    $struktur_id=$data["struktur_id"];
	$fsbangunan_id=$data["fsbangunan_id"];
	$lokasi=$data["lokasi"];
	$rt=$data["rt2"];
	$rw=$data["rw2"];
	$kecamatan_id=$data["kecamatan_id"];
	$desa_id=$data["desa_id"];
	$peruntukan=$data["peruntukan"];
	$sertifikat_id=$data["sertifikat_id"];
	$luas=$data["luas"];
	$butara=$data["butara"];
	$bselatan=$data["bselatan"];
	$bbarat=$data["bbarat"];
	$btimur=$data["btimur"];
	$pondasi=$data["pondasi"];
	$sloof=$data["sloof"];
	$tiang=$data["tiang"];
	$dinding=$data["dinding"];
	$ratap=$data["ratap"];
	$patap=$data["patap"];
	$lantai=$data["lantai"];
	$jmllantai=$data["jmllantai"]; if ($jmllantai=="") $jmllantai=0;
	$kelasjalan_id=$data["kelasjalan_id"]; if ($kelasjalan_id=="") $kelasjalan_id=0;
	$hargataksir=$data["hargataksir"]; if ($hargataksir=="") $hargataksir=0;
	$plafoon=$data["flafoon"];
	$retLama=$data["retribusi"]; if ($retLama=="") $retLama=0;	
	$no_rekomendasi=$data["no_rekomendasi"];
	$no_register=$data["noregistrasi"];

	  
	$sql ="	UPDATE imb     
				SET tahun='$tahun', indekstingkat_id='$indekstingkat_id', struktur_id='$struktur_id', 
				fsbangunan_id='$fsbangunan_id',lokasi='$lokasi', rt='$rt', 
				rw='$rw', kecamatan_id='$kecamatan_id', desa_id='$desa_id', peruntukan='$peruntukan', 
				sertifikat_id='$sertifikat_id', luas='$luas', butara='$butara', bselatan='$bselatan', 
				bbarat='$bbarat', btimur='$btimur', pondasi='$pondasi', sloof='$sloof', tiang='$tiang', 
				dinding='$dinding', ratap='$ratap', patap='$patap', lantai='$lantai', jmllantai='$jmllantai', 
				kelasjalan_id='$kelasjalan_id', hargataksir='$hargataksir',plafoon='$plafoon',retlama='$retLama',
				no_rekomendasi = '$no_rekomendasi', no_register = '$no_register'
				WHERE id='$id'";

	 

	$records=$this->db->query($sql);
	
	}

	function put_insert_databangunan($data,$idImb)
    {
	$klokasi=$data["klokasi"];
	$ktingkat=$data["ktingkat"];
	$kfungsi=$data["kfungsi"];
	$kstruktur=$data["kstruktur"];
	$luas=$data["luasbangunan"];

	$sql	= "INSERT INTO imb_data(imb_id,lokasi_id,tingkat_id,fungsi_id,struktur_id,luas)
						VALUES('$idImb','$klokasi','$ktingkat','$kfungsi','$kstruktur','$luas')";
	$records=$this->db->query($sql);
	}

	function put_edit_databangunan($data,$id_ImbData)
    {
	$klokasi=$data["klokasi"];
	$ktingkat=$data["ktingkat"];
	$kfungsi=$data["kfungsi"];
	$kstruktur=$data["kstruktur"];
	$luas=$data["luasbangunan"];

	$sql	= "UPDATE imb_data set lokasi_id='$klokasi',tingkat_id='$ktingkat',fungsi_id='$kfungsi',struktur_id='$kstruktur',luas='$luas' where id='$id_ImbData'";
	$records=$this->db->query($sql);
	}

	function put_insert_indeksbangunan($data,$idImb)
    {
	$nkluas=$data["nkluas"];
	$nktingkat=$data["nktingkat"];
	$nklokasi=$data["nklokasi"];
	$nkfungsi=$data["nkfungsi"];
	$nkstruktur=$data["nkstruktur"];
	$hargataksir=$data["hargataksir"];
	$banyakunit=$data["banyakunit"];

	$sql	= "	INSERT INTO imbindeks(imb_id,nkluas,nktingkat,nklokasi,nkfungsi,nkstruktur,hargataksir,banyakunit) 
					VALUE('$idImb','$nkluas','$nktingkat','$nklokasi','$nkfungsi','$nkstruktur','$hargataksir','$banyakunit')";
	$records=$this->db->query($sql);
	}
	
	function put_edit_indeksbangunan($data,$id_IndeksImb)
    {
	$nkluas=$data["nkluas"];
	$nktingkat=$data["nktingkat"];
	$nklokasi=$data["nklokasi"];
	$nkfungsi=$data["nkfungsi"];
	$nkstruktur=$data["nkstruktur"];
	$hargataksir=$data["hargataksir"];
	$banyakunit=$data["banyakunit"];

	$sql	= "	UPDATE imbindeks  set nkluas='$nkluas',nktingkat='$nktingkat',nklokasi='$nklokasi',nkfungsi='$nkfungsi',nkstruktur='$nkstruktur',hargataksir='$hargataksir',banyakunit='$banyakunit' where id='$id_IndeksImb'";
	$records=$this->db->query($sql);
	}

	function put_delete_imb($id)
    {
	$sql	 ="	DELETE FROM imb WHERE id='$id'";	
	$records=$this->db->query($sql);

	$sql	 ="	DELETE FROM imb_data WHERE imb_id='$id'";	
	$records=$this->db->query($sql);

	$sql	 ="	DELETE FROM imbindeks WHERE imb_id='$id'";	
	$records=$this->db->query($sql);
	}

	function get_data_Indeks($tabel,$id)
    {
        $sql	= "SELECT nilai FROM $tabel where id='$id'";
        $records=$this->db->query($sql);
		$data=array();		
		foreach($records->result() as $row)
			{
			$data["indeks"] = $row->nilai;
			}
		return $data;
    }
	
	function ListLokasiBangunan()
    {
        $sql	= "SELECT * FROM lokasibangunan";
        $records=$this->db->query($sql);
		$data=array();
		$data[0] = "-";
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->lokasi;
			}
		return $data;
    }	

	function ListJenisSertifikat()
    {
        $sql	= "SELECT * FROM sertifikat";
        $records=$this->db->query($sql);
		$data=array();
		$data[0] = "-";
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->status;
			}
		return $data;
    }
	
	function ListFungsiBangunan()
    {
        $sql	= "SELECT * FROM fsbangunan";
        $records=$this->db->query($sql);
		$data=array();
		$data[0] = "-";
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->fungsi;
			}
		return $data;
    }
	

	function ListTingkatBangunan()
    {
        $sql	= "SELECT * FROM indekstingkat";
        $records=$this->db->query($sql);
		$data=array();
		$data[0] = "-";
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->tingkat;
			}
		return $data;
    }

	function ListKonstruksiBangunan()
    {
        $sql	= "SELECT * FROM struktur";
        $records=$this->db->query($sql);
		$data=array();
		$data[0] = "-";
		foreach($records->result() as $row)
			{
			$data[$row->id] = $row->struktur;
			}
		return $data;
    }
	
}
?>