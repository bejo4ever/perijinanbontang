<?
class permohonan 
{	
	function ListJenisPermohonan($idIjin)
	{
		global $db;		
		$result	= array();
		$data	= array();
		$i		= 0;
		$sql	= "	SELECT b.* 
					FROM permohonanjenis a 
					LEFT OUTER JOIN jpermohonan b ON a.jpermohonan_id=b.id 
					WHERE a.ijin_id='$idIjin'";
		if ($rs = $db->get_results($sql))
		{		
			foreach ($rs as $row)
			{				
				$data[$i]=$row;
				$i++;
			}
		}
		$result[0] 	= $i;
		$result[1]	= $data;
		return $result;
	}
	function JmlPermohonan($jenis,$filter,$ijin="")
	{	 
		global $db;
		$result	= 0;
		/*
		if ($ijin=="") {
		$sql	="	SELECT COUNT(*) AS jml    
					FROM permohonan a 
					LEFT OUTER JOIN pemohon b ON a.pemohon_id=b.id 
					LEFT OUTER JOIN spermohonan c ON a.spermohonan_id=c.id 
					WHERE ijin_id='$jenis' $filter";
		} else {
		$sql	="	SELECT COUNT(*) AS jml     
					FROM permohonan a  
					LEFT OUTER JOIN pemohon b ON a.pemohon_id=b.id 
					LEFT OUTER JOIN spermohonan c ON a.spermohonan_id=c.id
					LEFT OUTER JOIN (select a.permohonan_id as 'idijin',b.nama as 'perusahaan' from $ijin a,perusahaan b where a.perusahaan_id=b.id) d ON a.id=d.idijin 
					WHERE ijin_id='$jenis' $filter";
		} 
		*/ 
		
		if ($ijin==""){		
		$sql	="	SELECT COUNT(*) AS jml 
					FROM permohonan a 
					LEFT OUTER JOIN pemohon b ON a.pemohon_id=b.id  
					WHERE a.ijin_id='$jenis' $filter";
		}else{
		$sql	="	SELECT COUNT(*) AS jml 
					FROM permohonan a 
					LEFT OUTER JOIN pemohon b ON a.pemohon_id=b.id  
					LEFT OUTER JOIN (select a.permohonan_id as 'idijin',b.nama as 'perusahaan' from $ijin a,perusahaan b where a.perusahaan_id=b.id) d ON a.id=d.idijin 
					WHERE a.ijin_id='$jenis' $filter";	
		}
		 
		if ($rs = $db->get_results($sql))
		{		
			$row	= $rs[0];
			$result	= $row->jml;
		}
		//echo $sql;
		return $result;
	}

	function ListPermohonan($jenis,$offset,$count,$filter,$order="DESC",$ijin="")
	{	 
		global $db;
		$result	= array();
		$data	= array();
		$i		= 0;
		if ($ijin=="") {
		$sql	="	SELECT a.id,a.jpermohonan_id,a.pemohon_id,a.no_agenda,a.tglpermohonan,a.nosk,a.tglsk,a.tglexpired,a.spermohonan_id,a.catatan_bo,
					a.sbayar,a.tglbayar,b.nama,b.alamat,c.status   
					FROM permohonan a 
					LEFT OUTER JOIN pemohon b ON a.pemohon_id=b.id 
					LEFT OUTER JOIN spermohonan c ON a.spermohonan_id=c.id 
					WHERE ijin_id='$jenis' $filter 
					ORDER BY a.tglpermohonan DESC,a.id DESC,a.no_agenda $order,a.tglsk $order,a.nosk $order 
					LIMIT $offset,$count";
		}else {
		
			if($jenis == 1)
			{
				$sql ="
				SELECT a.id,a.pemohon_id,a.no_agenda,a.tglpermohonan,a.nosk,a.tglsk,a.tglexpired,a.spermohonan_id,a.catatan_bo,
					a.sbayar,a.tglbayar,b.nama,b.alamat,c.status,d.no_rekomendasi
					FROM permohonan a 
					LEFT OUTER JOIN pemohon b ON a.pemohon_id=b.id 
					LEFT OUTER JOIN spermohonan c ON a.spermohonan_id=c.id
				LEFT OUTER JOIN 
				(
					select a.permohonan_id as 'idijin',
						a.no_rekomendasi 
					from $ijin a
				) d ON a.id=d.idijin";
			}
			else {
				$sql .="
				SELECT a.id,a.pemohon_id,a.no_agenda,a.tglpermohonan,a.nosk,a.tglsk,a.tglexpired,a.spermohonan_id,a.catatan_bo,
					a.sbayar,a.tglbayar,b.nama,b.alamat,c.status,d.perusahaan   
					FROM permohonan a 
					LEFT OUTER JOIN pemohon b ON a.pemohon_id=b.id 
					LEFT OUTER JOIN spermohonan c ON a.spermohonan_id=c.id
					LEFT OUTER JOIN 
				(
					select a.permohonan_id as 'idijin',
						b.nama as 'perusahaan'						 
					from $ijin a,
					perusahaan b where a.perusahaan_id=b.id
				) d ON a.id=d.idijin";
			}
				$sql .="					 
					WHERE ijin_id='$jenis' $filter 
					ORDER BY a.tglpermohonan DESC,a.id DESC,a.no_agenda $order,a.tglsk $order,a.nosk $order 
					LIMIT $offset,$count";
			//echo $sql;
		}   
		//ORDER BY a.no_agenda $order,a.tglsk $order,a.nosk $order
		//echo $sql; 
		if ($rs = $db->get_results($sql))
		{		
			foreach ($rs as $row)
			{
				$tglmohonlengkap	= explode(" ",$row->tglpermohonan);
				$tglmohon			= explode("-", $tglmohonlengkap[0]);
				//print_r($data[$i]->tglpermohonan);
				
				$startmonth 		= $tglmohon[1];
				$startyear  		= $tglmohon[0];
				$startdate			= $tglmohonlengkap[0];
				//echo $startyear."-".$startmonth."<br>";
				
				$data[$i]=$row;
				if($data[$i]->tglsk == '0000-00-00 00:00:00'){
					//echo $data[$i]->tglsk;
					$stopmonth 		= date('m');
					$stopyear  		= date('Y'); 
					$stopdate		= date("Y-m-d");
				}
				else{
					$tglsklengkap	= explode(" ",$row->tglsk);
					$tglsk			= explode("-", $tglsklengkap[0]);					
					$stopmonth 		= $tglsk[1];
					$stopyear  		= $tglsk[0]; 
					$stopdate		= $tglsklengkap[0];
				}
				//echo $data[$i]->tglsk."<br>";
				//echo $startdate.", ".$stopdate."<br>";
				if($stopdate != $startdate)
				{
				
					//echo $startdate.", ".$stopdate."<br>";
					$sqlworkday = "SELECT total_days days, p1_wkdays + p2_wkdays + middle_wkdays wkdays
								, p1_wnddays + p2_wnddays + middle_wnddays wnddays
								FROM
								(
									SELECT end_periods.*
									, (total_days- p1_wkdays-p1_wnddays-p2_wkdays-p2_wnddays)/7*5 middle_wkdays
									, (total_days- p1_wkdays-p1_wnddays-p2_wkdays-p2_wnddays)/7*2 middle_wnddays
									FROM
									(
										SELECT date_summary.*
										, IF(startDate < p1_sat, DATEDIFF(IF(p1_fri < endDate,p1_fri,endDate), startDate) +1,0) p1_wkdays
										, DATEDIFF(IF(endDate < p1_sun, endDate, p1_sun), IF(startDate > p1_sat ,startDate, p1_sat))+1 p1_wnddays
										, IF(p2_mon>p1_sun, DATEDIFF(IF(endDate < p2_fri, endDate, p2_fri), p2_mon) +1,0) p2_wkdays
										, IF(p2_mon>p1_sun AND p2_sat<=endDate, DATEDIFF(IF(endDate < p2_sun, endDate, p2_sun), p2_sat) +1,0) p2_wnddays
										FROM
										(
											SELECT dates.* 
											, DATEDIFF(endDate,startDate)+1 total_days
											, startDate+ INTERVAL 4-WEEKDAY(startDate) DAY p1_fri
											, startDate+ INTERVAL 5-WEEKDAY(startDate) DAY p1_sat
											, startDate+ INTERVAL 6-WEEKDAY(startDate) DAY p1_sun
											, endDate+ INTERVAL 0-WEEKDAY(endDate) DAY p2_mon
											, endDate+ INTERVAL 4-WEEKDAY(endDate) DAY p2_fri
											, endDate+ INTERVAL 5-WEEKDAY(endDate) DAY p2_sat
											, endDate+ INTERVAL 6-WEEKDAY(endDate) DAY p2_sun
											FROM (	SELECT '".$startdate."' startDate, '".$stopdate."' endDate) dates
										) date_summary
									) end_periods
								) all_periods";
					//echo $sqlworkday;
					if ($rsworkday = $db->get_results($sqlworkday))
					{
						$row1=$rsworkday[0];		
						
					}
					/*do{
						$tanggal = date("d", mktime(0, 0, 0, $bln, 1+$i, $thn));
						
					}
					while ($tanggal != date('t', mktime(0,0,0,$bln,1,$thn)));*/
	
					
					$data[$i]=$row;
					$data[$i]->lama_proses = $row1->wkdays;
				}
				else
				{
					$data[$i]->lama_proses = '0';
				}
				
				$i++;
			}
		} 
        //echo $sql;
		//$link->close();
		$result[0] 	= $i;
		$result[1]	= $data;
		return $result;
	}
	function GetIDPermohonan($sk)
	{	 
		global $db;
		$id		= 0;
		$sql	="	SELECT id FROM permohonan WHERE nosk='$sk'";	
		if ($rs = $db->get_results($sql))
		{
			$row=$rs[0];		
			$id=$row->id;
		}
		return $id;
	}
	function GetIDPermohonan2($noreg)
	{	 
		global $db;
		$id		= 0;
		$sql	="	SELECT id FROM permohonan WHERE noregistrasi='$noreg'";	
		if ($rs = $db->get_results($sql))
		{
			$row=$rs[0];		
			$id=$row->id;
		}
		return $id;
	}
	function DetailPermohonan($id)
	{	 
		global $db;
		$result	= array();
		$sql	="	SELECT a.*,b.tahun,b.nama,b.alamat,b.rt,b.rw,b.telp,b.hp,b.tempatlahir,
					b.tgllahir,b.ktp,b.pekerjaan,b.warga_id,b.warga,b.kecamatan_id,
					b.kecamatan,b.desa_id,b.desa,c.jenis AS jenispermohonan     
					FROM permohonan a 
					LEFT OUTER JOIN 
					(
						SELECT a.*,b.kecamatan,c.desa,d.warga  
						FROM pemohon a 
						LEFT OUTER JOIN kecamatan b ON a.kecamatan_id=b.id 
						LEFT OUTER JOIN desa c ON a.desa_id=c.id 
						LEFT OUTER JOIN warga d ON a.warga_id=d.id 						 
					) b ON a.pemohon_id=b.id  
					LEFT OUTER JOIN jpermohonan c ON a.jpermohonan_id=c.id
					LEFT OUTER JOIN ijin d ON a.ijin_id=c.id  
					WHERE MD5(a.id)='$id'";	
		
		if ($rs = $db->get_results($sql))
		{
			$row	= $rs[0]; 
			$row->id=isset($row->id) ? $row->id : ''; 
			$result=$row;		
		}
		return $result;
	}

	function TambahPemohon($tahun,$nama,$alamat,$rt,$rw,$telp,$hp,$tempatlahir,$tgllahir,$ktp,$pekerjaan,$warga_id,$propinsi_id,$kabkota_id,$kecamatan_id,$desa_id)
	{	 
		global $db;
		$tgllahir 	= !empty($tgllahir) ? $tgllahir:'0000-00-00 00:00:00';
		$sql		= "	INSERT INTO pemohon(tahun,nama,alamat,rt,rw,telp,hp,tempatlahir,tgllahir,
						ktp,pekerjaan,warga_id,propinsi_id,kabkota_id,kecamatan_id,desa_id) 
						VALUE('$tahun','$nama','$alamat','$rt','$rw','$telp','$hp','$tempatlahir','$tgllahir',
						'$ktp','$pekerjaan','$warga_id','$propinsi_id','$kabkota_id','$kecamatan_id','$desa_id') ";		
		//echo $sql;
		$db->query($sql);
		if($db->get_error())
		{
			return 0;
		}
		else
		{
			return $db->get_insert_id();
		}
	}
	function UpdatePemohon($id,$tahun,$nama,$alamat,$rt,$rw,$telp,$hp,$tempatlahir,$tgllahir,$ktp,$pekerjaan,$warga_id,$propinsi_id,$kabkota_id,$kecamatan_id,$desa_id)
	{	 
		global $db;	
		$tgllahir = !empty($tgllahir) ? $tgllahir:'0000-00-00 00:00:00';		
		$sql ="	UPDATE pemohon 
				SET tahun='$tahun', nama='$nama', alamat='$alamat', rt='$rt', rw='$rw', telp='$telp', hp='$hp', tempatlahir='$tempatlahir', 
				tgllahir='$tgllahir', ktp='$ktp', pekerjaan='$pekerjaan', warga_id='$warga_id', propinsi_id='$propinsi_id', kabkota_id='$kabkota_id', 
				kecamatan_id='$kecamatan_id', desa_id='$desa_id' 
				WHERE MD5(id)='$id'";
		$db->get_results($sql);
		//echo $sql;
		if($db->get_error())
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	function HapusPemohon($id)
	{	 
		global $db;		
		$sql ="	DELETE FROM pemohon WHERE MD5(id)='$id'";		
		$db->get_results($sql);
		if($db->get_error())
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	/*
	Update  2 April 2009
	- 	Menambah kolom ketbayar untuk menyimpan informasi keterangan pembayaran sehingga parameter fungsi 
		TambahPermohonan ditambah satu lagi yaitu $ketbayar
	*/
	function TambahPermohonan($catatan_bo='',$jpermohonan_id,$tahun,$noregistrasi,$ijin_id,$pemohon_id,$tglpermohonan,$nosk,$tglsk,$tglexpired,$pejabat,$nip,$jabatan,$atasnama,$statusbayar,$tglbayar,$retribusi,$jumlahbibit=0,$namabibit='',$no_agenda='',$ketbayar='')
	{	 
		global $db;
		$string			= new fstring();
		$tglpermohonan 	= !empty($tglpermohonan) ? $tglpermohonan	: '0000-00-00 00:00:00';
		$tglsk		 	= !empty($tglsk) 		 ? $tglsk			: '0000-00-00 00:00:00';
		$tglexpired 	= !empty($tglexpired) 	 ? $tglexpired		: '0000-00-00 00:00:00';
		$tglbayar 		= !empty($tglbayar) 	 ? $tglbayar		: '0000-00-00 00:00:00';		
        $retribusi		= $ijin_id <> '1' 		 ? $string->FormatMoney1($retribusi) : $retribusi;
		/*
		Kolom keterangan bayar dibuang, karena di struktur tabel permohonan tidak ada komom ketbayar
		*/
        $sql	= "	INSERT INTO permohonan(jpermohonan_id,tahun,noregistrasi,ijin_id,pemohon_id,tglpermohonan,nosk,tglsk,tglexpired,pejabat,nip,jabatan,atasnama,sbayar,tglbayar,retribusi,jumlah_bibit,nama_bibit,no_agenda,ketbayar, catatan_bo) 	
					VALUE('$jpermohonan_id','$tahun','$noregistrasi','$ijin_id','$pemohon_id','$tglpermohonan','$nosk','$tglsk','$tglexpired','$pejabat','$nip','$jabatan','$atasnama','$statusbayar','$tglbayar','$retribusi','$jumlahbibit','$namabibit','$no_agenda','$ketbayar', '$catatan_bo')";
		//echo $sql;
		$db->get_results($sql);				
		if($db->get_error())
		{
			return 0;
		}
		else
		{
			return $db->get_insert_id();
		}
	}
	function HapusStatusPermohonan($id)
	{
		global $db;		
		$sql ="	DELETE FROM permohonanstatus  
				WHERE MD5(permohonan_id)='$id'";
		$db->get_results($sql);
		if($db->get_error())
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	function SimpanStatusPermohonan($permohonan_id,$spermohonan_id,$tglupdate,$user_id)
	{	 
		$tglupdate = !empty($tglupdate) ? $tglupdate:'0000-00-00 00:00:00';
		global $db;
		$sql	= "INSERT INTO permohonanstatus(permohonan_id,spermohonan_id,tglupdate,user_id) 
					VALUE($permohonan_id,$spermohonan_id,'$tglupdate',$user_id)";
		//echo $sql;					
		$db->get_results($sql);
		if($db->get_error())
		{
			return 0;
		}
		else
		{
			$id		= $db->get_insert_id();
			$sql	= "UPDATE permohonan SET spermohonan_id='$spermohonan_id' WHERE id='$permohonan_id'";
			$db->get_results($sql);
			return $id;
		}	
	}
	
	/*
	Update  2 April 2009
	- 	Menambah kolom ketbayar untuk menyimpan informasi keterangan pembayaran sehingga parameter fungsi 
		UpdatePermohonan ditambah satu lagi yaitu $ketbayar
	*/

	function UpdatePermohonan($catatan_bo='',$id,$jpermohonan_id,$tahun,$noregistrasi,$ijin_id,$tglpermohonan,$nosk,$tglsk,$tglexpired,$pejabat,$nip,$jabatan,$atasnama,$statusbayar,$tglbayar,$retribusi,$jumlahbibit=0,$namabibit='',$noagenda='',$tglmohon='',$ketbayar='')
	{	 
		global $db;				
		$string			= new fstring();
		$tglpermohonan 	= !empty($tglpermohonan) ? $tglpermohonan:'0000-00-00 00:00:00';
		$tglsk		 	= !empty($tglsk) ? $tglsk:'0000-00-00 00:00:00';
		$tglexpired 	= !empty($tglexpired) ? $tglexpired:'0000-00-00 00:00:00';
		$tglbayar 		= !empty($tglbayar) ? $tglbayar:'0000-00-00 00:00:00';	
		$tglmohon 		= !empty($tglmohon) ? $tglmohon:'0000-00-00 00:00:00';
        if ($ijin_id!= '1')
		{
            $retribusi=$string->FormatMoney1($retribusi); 
		}
		
		//echo $ijin_id;
        $tglmohon		= $string->IsEmpty($tglmohon) ? '0000-00-00 00:00:00' : ",tglpermohonan='$tglmohon'";		
		$jumlahbibit	= is_numeric($jumlahbibit) ? $jumlahbibit : 0;
		$sql ="	UPDATE permohonan  
				SET jpermohonan_id='$jpermohonan_id', catatan_bo='$catatan_bo', tahun='$tahun', noregistrasi='$noregistrasi', ijin_id='$ijin_id', 
				nosk='$nosk', tglsk='$tglsk',tglexpired='$tglexpired',sbayar='$statusbayar',tglbayar='$tglbayar',retribusi='$retribusi',
				jumlah_bibit=$jumlahbibit,nama_bibit='$namabibit',no_agenda='$noagenda',ketbayar='$ketbayar' $tglmohon
				WHERE MD5(id)='$id'";
				//echo $sql;
		$db->get_results($sql); 
		if($db->get_error())
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	function HapusPermohonan($id)
	{	 
		global $db;		
		$sql ="	DELETE FROM permohonan WHERE MD5(id)='$id'";
		$db->get_results($sql);
		if($db->get_error())
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	function GetNoRegistrasi($jenis)
	{
		global $db;
		$romawi	= array(1=>'I',2=>'II',3=>'III',4=>'IV',5=>'V',6=>'VI',7=>'VII',8=>'VIII',9=>'IX',10=>'X',11=>'XI', 12=>'XII');
		$counter= 0;
		$format	= '';
		$sql ="	SELECT counter,format  
				FROM noregistrasi   
				WHERE ijin_id='$jenis'";
				 
		if ($rs = $db->get_results($sql))
		{		
			foreach ($rs as $row)
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
			if($temp[$i]=='X')$temp[$i]=$counter;
			if($temp[$i]=='M')$temp[$i]=$romawi[date('n')];
			if($temp[$i]=='Y')$temp[$i]=date('Y');
			$result.=$result ? "/".$temp[$i] :$temp[$i]; 
		}
		
		$sql ="UPDATE noregistrasi SET counter='$counter' WHERE ijin_id='$jenis'";
		$db->get_results($sql);	
		return $result;
	}
	function UpdateCounterSK($nosk,$ijin,$tahun)
	{
		global $db;
		$format	= '';		
		$counter=0;
		$sql ="	SELECT counter,format  
				FROM nosk    
				WHERE ijin='$ijin' and tahun=$tahun";
		if ($rs = $db->get_results($sql))
		{		
			$counter=$rs[0]->counter;
			$format	=$rs[0]->format;
		} 
		
		$temp 		= explode("xC",$format);
		$lAwal		= strlen($temp[0]);		
		$lAkhir		= strlen($temp[1]);
		$lCounter	= strlen($format);
		$lSK		= strlen($nosk);
		$newCounter	= '';
		for($i=$lAwal;$i<$lSK;$i++)
		{
			
			if($nosk[$i]==$temp[1][0])break;
			$newCounter.=$nosk[$i];
		}
		$newCounter	= (int)$newCounter;		
		if($counter < $newCounter)
		{
			$sql ="UPDATE nosk SET counter='$newCounter' WHERE ijin='$ijin' AND tahun='$tahun'";
			$db->get_results($sql);
		}
		return $newCounter;
	}
	function GetNoSK($ijin,$kualifikasi,$id=0,$updateCounter=true)
	{
		global $db;
		$romawi	= array(1=>'I',2=>'II',3=>'III',4=>'IV',5=>'V',6=>'VI',7=>'VII',8=>'VIII',9=>'IX',10=>'X',11=>'XI', 12=>'XII');
		$counter= 0;
		$format	= '';
		$tahun=date('Y');
		$sql ="	SELECT counter,format  
				FROM nosk    
				WHERE ijin='$ijin' and tahun=$tahun";
		if ($rs = $db->get_results($sql))
		{		
			foreach ($rs as $row)
			{			
				$counter=$row->counter;
				$format	=$row->format;			
			}
		}else{
			$sqlsk="SELECT distinct format  
				FROM nosk    
				WHERE ijin='$ijin'";
			if ($rs = $db->get_results($sqlsk))
			{		
				foreach ($rs as $row)
				{			
				 
					$format1	=$row->format;			
				}
			}	
			$sqlins="insert into nosk (tahun,ijin,format,counter) values ($tahun,'$ijin','$format1',0)";
			$db->query($sqlins);
			if ($rs = $db->get_results($sql))
			{		
				foreach ($rs as $row)
				{			
				 
					$counter=$row->counter;
					$format	=$row->format;			
				}
			}	
		}	 
		$counter++;		
		$result	= $format;	
		if ($ijin == 'wisata'){
			$counter = $counter <10 ? '0'.$counter: $counter;
		}
		$result	= str_replace('xC',$counter,$result);
		$result	= !empty($kualifikasi) ? str_replace('xK',$kualifikasi,$result) : $result;		
		$result	= str_replace('xB',$romawi[(int)date('n')],$result);
		$result	= str_replace('xT',date('Y'),$result);
		/*
		$sql ="UPDATE nosk SET counter='$counter' WHERE ijin='$ijin'";
		$db->get_results($sql);					
		*/
		if($updateCounter)
		{
			$this->UpdateCounterSK($result,$ijin,$tahun);
		}	
		return $result;
		
	}
	function SimpanNoSK($id,$sk,$expired='')
	{
		$expired = !empty($expired) ? $expired:'0000-00-00 00:00:00';
		global $db;				
		$sql ="	UPDATE permohonan  
				SET nosk='$sk', tglsk='".date("Y-m-d H:i:s")."',tglexpired='$expired'    
				WHERE MD5(id)='$id'"; 
		//echo $sql;
		$db->get_results($sql);
		
		if($db->get_error())
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	function SimpanPejabatSK($idPermohonan,$idDokumen)
	{
		global $db;				
		$sql=	"SELECT * FROM tandatangan WHERE id='$idDokumen'";
		if($rs=$db->get_results($sql))
		{			
			if($row=$rs[0])
			{
				$sql ="	UPDATE permohonan  
						SET nip='".$row->nip."', pejabat='".$row->pejabat."',jabatan='".$row->jabatan."',pangkat='".$row->pangkat."', atasnama='".$row->atasnama."'     
						WHERE MD5(id)='$idPermohonan' AND nip=''";
				//echo $sql;
				
				$db->get_results($sql);
				if($db->get_error())
				{
					return false;
				}
				else
				{
					return true;
				}
			}
		}
		
	}
	
	function HapusSyaratPermohonan($id)
	{
		global $db;		
		$sql ="	DELETE FROM permohonansyarat 
				WHERE MD5(permohonan_id)='$id'";
		$db->get_results($sql);
		if($db->get_error())
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	function ListPersyaratan($idIjin)
	{
		global $db;
		$result	= array();
		$data	= array();
		$i		= 0;
		$sql	= "	SELECT b.id,b.syarat 
					FROM ijinsyarat a 
					LEFT OUTER JOIN syarat b ON a.syarat_id=b.id 
					WHERE a.ijin_id='".$idIjin."'";
		if ($rs = $db->get_results($sql))
		{		
			foreach ($rs as $row)
			{				
				$data[$i]=$row;
				$i++;
			}
		} 
		 
		//$link->close();
		$result[0] 	= $i;
		$result[1]	= $data;
		return $result;
	}
	function SimpanSyaratPermohonan($permohonan_id,$syarat_id,$keterangan,$tglterima,$user_id)
	{
		global $db;
		$tglterima = !empty($tglterima) ? $tglterima:'0000-00-00 00:00:00';
		$sql	= "INSERT INTO permohonansyarat(permohonan_id,syarat_id,keterangan,tglterima,user_id) 
					VALUE('$permohonan_id','$syarat_id','$keterangan','$tglterima','$user_id')";
		$db->get_results($sql);	
		if($db->get_error())
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	function UpdateSyaratPermohonan($id,$permohonan_id,$syarat_id,$keterangan,$tglterima,$user_id)
	{
		global $db;
		$tglterima = !empty($tglterima) ? $tglterima:'0000-00-00 00:00:00';
		$sql	= "SELECT COUNT(*) AS jml FROM permohonansyarat WHERE MD5(id)='$id'";			
		if($rs	= $db->get_results($sql))
		{
			$row=$rs[0];
			if($row->jml > 0)
			{
				$sql	= "	UPDATE permohonansyarat SET keterangan='$keterangan' WHERE MD5(id)='$id'";
				$db->get_results($sql);	
				if($db->get_error())
				{
					return false;
				}
				else
				{
					return true;
				}
			}
			else
			{
				return $this->SimpanSyaratPermohonan($permohonan_id,$syarat_id,$keterangan,$tglterima,$user_id);
			}
		}
		return false;
		
	}
	function GetTglProses($id,$spermohonan_id=2)
	{
		global $db;
		$result	= "";
		$sql	= "	SELECT tglupdate 
					FROM permohonanstatus 
					WHERE MD5(permohonan_id)='".$id."' AND spermohonan_id='$spermohonan_id' 
					ORDER BY id LIMIT 0,1";
		//echo $sql;
		if ($rs = $db->get_results($sql))
		{		
			$row=$rs[0];
			$result=$row->tglupdate; 
		} 
		
		return $result;
	}
	function GetStatusPermohonan($noreg, $index)
	{
		$page = $index*10;
		global $db;
		$result	= "";
		$sql	= "SELECT a.*,b.tahun,b.nama,b.alamat,b.rt,b.rw,b.telp,b.hp,b.tempatlahir,
						b.tgllahir,b.ktp,b.pekerjaan,b.warga_id,b.warga,b.kecamatan_id,
						b.kecamatan,b.desa_id,b.desa,c.status,d.nama AS ijin     
					FROM permohonan a 
					LEFT OUTER JOIN 
					(
						SELECT a.*,b.kecamatan,c.desa,d.warga  
						FROM pemohon a 
						LEFT OUTER JOIN kecamatan b ON a.kecamatan_id=b.id 
						LEFT OUTER JOIN desa c ON a.desa_id=c.id 
						LEFT OUTER JOIN warga d ON a.warga_id=d.id 						 
					) b ON a.pemohon_id=b.id  
					LEFT OUTER JOIN spermohonan c ON a.spermohonan_id=c.id  
					LEFT OUTER JOIN ijin d ON a.ijin_id=d.id 
					WHERE a.noregistrasi LIKE '%$noreg%'
					ORDER BY a.tglpermohonan DESC
					LIMIT $page,5 ";
		//echo $sql;
		if ($rs = $db->get_results($sql))
		{
			$i=0;	
			foreach ($rs as $row)
			{
				$data[$i]=$row;
				$i++;
			}	
			$result[0] 	= $i;
			$result[1]	= $data; 
		} 
		return $result;
	}
	function GetStatusPermohonanSpesifik($nama, $id_ijin,$index)
	{
		$page = $index*10;
		global $db;
		$result	= "";
		switch ($id_ijin) {
			case 1:
			$ijin = 'imb';
			break;
			case 2:
			$ijin = 'ho';
			break;
			case 3:
			$ijin = 'reklame';
			break;
			case 4:
			$ijin = 'siup';
			break;
			case 5:
			$ijin = 'iujk';
			break;
			case 6:
			$ijin = 'tdp';
			break;
			case 8:
			$ijin = 'igc';
			break;
			case 9:
			$ijin = 'pameran';
			break;
			case 10:
			$ijin = 'ilokasi';
			break;
			case 11:
			$ijin = 'wisata';
			break;
			case 12:
			$ijin = 'utilitas';
			break;
			case 13:
			$ijin = 'iusbw';
			break;
			case 14:
			$ijin = 'iabo';
			break;
			case 15:
			$ijin = 'iplc';
			break;
			case 16:
			$ijin = 'isip';
			break;
			case 17:
			$ijin = 'isipa';
			break;
			case 18:
			$ijin = 'itr';
			break;
			case 19:
			$ijin = 'ihhk';
			break;
			case 20:
			$ijin = 'imb';
			break;
			
			default:
			$ijin = 'imb';
			break;
		}
		$sql	= "SELECT a.*,b.tahun,b.nama,b.alamat,b.rt,b.rw,b.telp,b.hp,
							b.tempatlahir,b.tgllahir,b.ktp,b.pekerjaan,b.warga_id,
							b.warga,b.kecamatan_id,b.kecamatan,b.desa_id,b.desa,
							c.status,d.nama AS ijin
					FROM permohonan a
					LEFT OUTER JOIN
					(
						SELECT a.*,b.kecamatan,c.desa,d.warga
						FROM pemohon a
						LEFT OUTER JOIN kecamatan b ON a.kecamatan_id=b.id
						LEFT OUTER JOIN desa c ON a.desa_id=c.id
						LEFT OUTER JOIN warga d ON a.warga_id=d.id
					) b ON a.pemohon_id=b.id
					LEFT OUTER JOIN spermohonan c ON a.spermohonan_id=c.id
					LEFT OUTER JOIN ijin d ON a.ijin_id=d.id
					";
		if($id_ijin == '1')
		{
			$sql.= " 
					WHERE a.ijin_id='$id_ijin'
					AND b.nama LIKE '%$nama%'";
		}
		else 
		{
			$sql.= "
					LEFT OUTER JOIN $ijin e ON a.id = e.permohonan_id
					LEFT OUTER JOIN perusahaan f ON f.id = e.perusahaan_id
					WHERE a.ijin_id='$id_ijin'
					AND f.nama LIKE '%$nama%' ";
		}
		
		$sql." ORDER BY a.tglpermohonan DESC LIMIT $page,5";
		//echo $sql;
		
		if ($rs = $db->get_results($sql))
		{
			$i=0;
			foreach ($rs as $row)
			{
				$data[$i]=$row;
				$i++;
			}	
			$result[0] 	= $i;
			$result[1]	= $data; 
		}
		return $result;
	}
	function ListStatusPermohonan()
	{
		global $db;
		$result	= array();
		$data	= array();
		$i		= 0;
		$sql	= "	SELECT * FROM spermohonan";
		if ($rs = $db->get_results($sql))
		{		
			foreach ($rs as $row)
			{				
				$data[$i]=$row;
				$i++;
			}
		} 
		$result[0] 	= $i;
		$result[1]	= $data;
		return $result;
	}

	function ListSyaratPermohonan($id,$ijin)
	{
		global $db;
		$result	= array();
		$data	= array();
		$i		= 0;
		$sql	= "	SELECT b.id,a.syarat_id,c.syarat,b.keterangan,b.tglterima  
					FROM ijinsyarat a 
					LEFT OUTER JOIN permohonansyarat b ON MD5(b.permohonan_id)='$id' AND a.syarat_id=b.syarat_id   
					LEFT OUTER JOIN syarat c ON a.syarat_id=c.id 
					WHERE a.ijin_id='$ijin'";
					//echo $sql;
		if ($rs = $db->get_results($sql))
		{		
			foreach ($rs as $row)
			{				
				$data[$i]=$row;
				$i++;
			}
		} 
		$result[0] 	= $i;
		$result[1]	= $data;
		return $result;
	}
	function getNoForm($id){
		global $db;
		$row=$db->get_row("select * from noformulir where id=$id");
		return $row->no;
	}
	function getTglSelesai($tgl,$ijin){
		global $db;
		/*$libur=array();
		$sql="select tanggal from tgl_libur";
		$rs=$db->get_results($sql);
		$a=0;
		foreach($rs as $row)
			$libur[$a++]=date('d-m-Y',$row->tanggal);*/
		$sql2="select * from ijin where id=$ijin";
		$row=$db->get_row($sql2);
		return $row->perkiraan_selesai;
		/*$waktu=$row->waktu;
		$i=1;
		$koef=24*60*60;
		$j=1;
		$selesai=0;
		while($i<=$waktu){
			$selesai=$tgl+($j++*$koef);
			if ((date("N",$selesai)!=6&&date("N",$selesai)!=7)&&(!in_array(date('d-m-Y',$selesai),$libur)))
				$i++;
		}
		return $selesai;*/
	}
	function getHariKerja($mulai,$selesai){
		global $db;
		$libur=array();
		$sql="select tanggal from tgl_libur";
		$rs=$db->get_results($sql);
		$a=0;
		foreach($rs as $row)
			$libur[$a++]=date('d-m-Y',$row->tanggal);
		$j=0;
		$lama=0;
		$mulai2=$mulai;
		while($mulai2<$selesai){
			$mulai2=$mulai+(($j++)*$koef);
			if ((date("N",$mulai2)!=6&&date("N",$mulai2)!=7)&&(!in_array(date('d-m-Y',$mulai2),$libur)))
				$lama++;
		}
		return $lama;
	}
	
	function getPerusahaanDetail($id){
	global $db;
	$result	= array();
	$sql="SELECT perusahaan.* 
				FROM perusahaan, siup  
				WHERE md5(siup.permohonan_id)='$id' AND siup.perusahaan_id=perusahaan.id";
		if ($rs = $db->get_results($sql))
		{
			$result=$rs[0];		
		}
		return $result;
	}
	function RekapPembayaranPerijinan($tglawal,$tglakhir)
	{
		global $db;
		$sql="SELECT a.id,a.nama,b.jml,b.biaya,a.bayar  
				FROM ijin a 
				LEFT OUTER JOIN 
				(
					SELECT ijin_id,COUNT(*) AS jml,SUM(retribusi) AS biaya 
					FROM permohonan 
					WHERE sbayar=1 AND tglbayar>='$tglawal' AND tglbayar<='$tglakhir'  
					GROUP BY ijin_id 
				) b ON a.id=b.ijin_id 
				ORDER BY a.id ";				
		$result=array();
		if ($rs = $db->get_results($sql))
		{
			foreach($rs as $row)
			{
				$result[$row->id]=array($row->nama,$row->jml,$row->biaya,$row->bayar);				
			}
		}
		
		return $result;
	}
	function RekapPembayaranPerijinanGratis($tglawal,$tglakhir)
	{
		global $db;
		$sql="SELECT a.id,a.nama,b.jml,b.biaya,a.bayar  
				FROM ijin a 
				LEFT OUTER JOIN 
				(
					SELECT ijin_id,COUNT(*) AS jml,SUM(retribusi) AS biaya 
					FROM permohonan 
					WHERE sbayar=1 AND tglpermohonan>='$tglawal' AND tglpermohonan<='$tglakhir'  
					GROUP BY ijin_id 
				) b ON a.id=b.ijin_id 
				ORDER BY a.id ";				
		$result=array();
		if ($rs = $db->get_results($sql))
		{
			foreach($rs as $row)
			{
				$result[$row->id]=array($row->nama,$row->jml,$row->biaya,$row->bayar);				
			}
		}
		
		return $result;
	}
	function RekapPembayaranPelayanan($tglawal,$tglakhir)
	{
		global $db;
		$sql=" SELECT a.id,a.layanan AS nama,b.jml,b.biaya 
				FROM layanan a 
				LEFT OUTER JOIN 
				(
					SELECT layanan_id,COUNT(*) AS jml,SUM(retribusi) AS biaya 
					FROM capil  
					WHERE tglbayar>='$tglawal' AND tglbayar<='$tglakhir'  
					GROUP BY layanan_id 
				) b ON a.id=b.layanan_id 
				ORDER BY a.id ";				
		$result=array();
		if ($rs = $db->get_results($sql))
		{
			foreach($rs as $row)
			{
				$result[$row->id]=array($row->nama,$row->jml,$row->biaya);				
			}
		}
		return $result;
	}
	function RekapPembayaranPelayananGratis($tglawal,$tglakhir)
	{
		global $db;
		$sql=" SELECT a.id,a.layanan AS nama,b.jml,b.biaya 
				FROM layanan a 
				LEFT OUTER JOIN 
				(
					SELECT layanan_id,COUNT(*) AS jml,SUM(retribusi) AS biaya 
					FROM capil  
					WHERE tglpermohonan>='$tglawal' AND tglpermohonan<='$tglakhir'  
					GROUP BY layanan_id 
				) b ON a.id=b.layanan_id 
				ORDER BY a.id ";				
		$result=array();
		if ($rs = $db->get_results($sql))
		{
			foreach($rs as $row)
			{
				$result[$row->id]=array($row->nama,$row->jml,$row->biaya);				
			}
		}
		return $result;
	}
	function GetPejabat($idDokumen)
	{
		global $db;
		$result	= array();
		$sql=	"SELECT * FROM tandatangan WHERE id='$idDokumen'";
		if ($rs = $db->get_results($sql))
		{
			$result=$rs[0];		
		}
		return $result;
	}
	function isEdited($id)
	{
		global $db;
		$result	= array();
		$sql=	"SELECT * FROM tandatangan WHERE id='$idDokumen'";
		if ($rs = $db->get_results($sql))
		{
			$result=$rs[0];		
		}
		return $result;
	} 
	function setTglCetakSK($id)
	{
		global $db;
		$result	= array();
		$sql=	"UPDATE permohonan SET tglcetaksk = '".date("Y-m-d H:i:s")."' WHERE id= '$id'";
		$rs = $db->get_results($sql);
	}	
	function GetNamaKecamatan($id)
	{
		global $db;
		$result	= array();
		$sql=	"SELECT * FROM kecamatan WHERE id='$id'";
		if ($rs = $db->get_results($sql))
		{
			$result=$rs[0];		
		}
		return $result;
	}
	function UpdateRekapLock($id='0', $date)
	{	 
		global $db;	
		$tgllahir = !empty($date) ? $date:'0000-00-00 00:00:00';		
		$sql ="	UPDATE ijin SET tgllock_kasir = '".$date."'
				WHERE id='$id'";
		
		$db->get_results($sql);
		if($db->get_error())
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	function getLastLocking($ijin)
	{
		global $db;
		global $string;
		$sql="select tgllock_kasir from ijin where id=$ijin";
		$row=$db->get_row($sql);
		return $row->tgllock_kasir;
	}
	
	function getWaktuPenyelesaian($id,$tglsk,$tglbayar)
	{
		global $db;
		$result = '';
		$sql = "SELECT DATEDIFF('$tglsk','$tglbayar') AS waktu_penye FROM permohonan WHERE id = '$id'";
		$row = $db->get_row($sql);
		$result = $row->waktu_penye;
		$waktu = '';
		if ($result == '0')
			$waktu = '1';
		else
			$waktu = $result;
		return $waktu;
	}
	
	function GetTglSurvey($id, $ijin="")
	{
		global $db;
		$result	= "";
		$sql	= "	SELECT tglsurvey 
					FROM $ijin WHERE MD5(permohonan_id)='".$id."' ";
		if ($rs = $db->get_results($sql))
		{		
			$row=$rs[0];
			$result=$row->tglsurvey; 
		} 
		
		return $result;
	}
	
	function GetTglRekom($id, $ijin="")
	{
		global $db;
		$result	= "";
		$sql	= "	SELECT tglrekomendasi 
					FROM $ijin WHERE MD5(permohonan_id)='".$id."' ";
		if ($rs = $db->get_results($sql))
		{		
			$row=$rs[0];
			$result=$row->tglrekomendasi; 
		} 
		
		return $result;
	}
}
?>