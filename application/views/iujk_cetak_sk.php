<?php

	$bulan = array("1"=>"Januari","2"=>"Februari","3"=>"Maret","4"=>"April","5"=>"Mei","6"=>"Juni","7"=>"Juli","8"=>"Agustus","9"=>"September","10"=>"Oktober","11"=>"Nopember","12"=>"Desember");	
	$hariIndo = array("1"=>"Senin","2"=>"Selasa","3"=>"Rabu","4"=>"Kamis","5"=>"Jumat","6"=>"Sabtu","7"=>"Minggu");

	$id = $_GET['id'];
	$jenis = $_GET['jenis'];
	
?>



<?php
	if($jenis=="sk"){		

		$data_permohonan_list = $this->Permohonan_cetak_model->get_detil_permohonan($id);				
		$iujk_list = $this->Iujk_cetak_sk_model->get_detil_iujk($id);
		$data_perusahaan_list = $this->Permohonan_cetak_model->get_detil_data_perusahaan($iujk_list->perusahaan_id);
		
		$ttd_list = $this->Permohonan_cetak_model->get_ttd(18);
		$pejabat_list = $this->Permohonan_cetak_model->get_pejabat(18);
		$data_permohonan_list->pejabat = $pejabat_list->pejabat;
		$data_permohonan_list->nip = $pejabat_list->nip;
		$data_permohonan_list->jabatan = $pejabat_list->jabatan;
		$data_permohonan_list->pangkat = $pejabat_list->pangkat;
		$data_permohonan_list->atasnama = $pejabat_list->atasnama;
		
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Sistem Perijinan Kota Bontang</title>
<style type="text/css">
<!--
.style2 {
	font-size: 18pt;
	color: #000000;
	text-decoration: underline;
	font-weight: bold;
}

.style3 {
	font-size: 13px;
	color: #000000;
}

.style4 {
	font-family: "Times New Roman", Times, serif;
	font-size: 30pt;
	font-weight: bold;
}

.style9 {
	font-family: "Times New Roman", Times, serif;
	font-size: 12pt;
	color: #000000;
}

.style10 {
	font-family: "Times New Roman", Times, serif
}

.style12 {
	font-family: "Times New Roman", Times, serif;
	font-size: 12pt;
	font-weight: bold;
	color: #000000;
}

.style13 {
	color: #000000
}

.style14 {
	font-family: "Times New Roman", Times, serif;
	font-size: 12pt;
	font-weight: bold;
	color: #000000;
}

.style15 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10pt;
}

.style18 {
	font-family: "Times New Roman", Times, serif;
	font-size: 12pt;
}

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>
<body onload="printDiv('printableArea')">

<div id="printableArea">

	<table width="825" height="1139" border="0" align="center"
		cellpadding="4" cellspacing="0" bgcolor="#FFFFFF">
		<tr>
			<td height="22" colspan="5" align="center" valign="middle"><table
					width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="17%" align="left" valign="top"
							style="padding: 20px 0px 0px 20px">&nbsp;</td>
						<td width="67%" align="center"
							style="border-bottom: 3px solid; margin-top: 20px"><p>
								<span class="style18"><strong> <br> <br> </strong> </span><span
									class="style18"><strong>PEMERINTAH KOTA BONTANG<br> BADAN
										PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL</strong> </span><br>
								<span class="style15">Jl. Awang Long Kec. Bontang Utara Telp.
									(0548)20594 Fax. (0548)20598 </span>
						
						</td>
						<td width="16%" align="left" style="padding-left: 10px">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="23" colspan="5" align="center" valign="middle"
				class="style2">IZIN USAHA JASA KONSTRUKSI NASIONAL</td>
		</tr>
		<tr>
			<td height="18" colspan="5" align="center" valign="middle"
				class="style14">Nomor : <?php echo $data_permohonan_list->nosk;?></td>
		</tr>
		<tr>
			<td height="27" colspan="5" align="center" valign="middle"
				class="font2 style3">&nbsp;</td>
		</tr>

		<tr align="left" valign="top">
			<td height="18" colspan="2" class="style9" style="padding-left: 80px">Nama
				Badan Usaha</td>
			<td width="3" align="center" class="style9">:</td>
			<td class="style12" colspan="2"><?php echo $data_perusahaan_list->nama;?></td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" colspan="2" class="style9" style="padding-left: 80px">Alamat
				Kantor Badan Usaha</td>
			<td align="center" class="style9">:</td>
			<td width="213" class="font2 style3">&nbsp;</td>
			<td width="271" class="font2 style3">&nbsp;</td>
		</tr>
		<tr align="left" valign="top">
			<td width="112" height="18" class="font2 style3">&nbsp;</td>
			<td width="186" class="style9">Jalan, Nomor</td>
			<td align="center" class="style9">:</td>
			<td class="style14"><?php echo $data_perusahaan_list->alamat;?></td>
			<td class="font2 style3">&nbsp;</td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" class="font2 style3">&nbsp;</td>
			<td class="style9">Kelurahan</td>
			<td align="center" class="style9">:</td>
			<td class="style14"><?php echo ucwords(strtolower($data_perusahaan_list->desa));?></td>
			<td class="font2 style3">&nbsp;</td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" class="font2 style3">&nbsp;</td>
			<td class="style9">RT/RW</td>
			<td align="center" class="style9">:</td>
			<td class="style14"><?php echo $data_perusahaan_list->rt;?>/<?php echo $data_perusahaan_list->rw;?>
			</td>
			<td class="font2 style3">&nbsp;</td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" class="font2 style3">&nbsp;</td>
			<td class="style9">Kabupaten/Kota</td>
			<td align="center" class="style9">:</td>
			<td class="style14">Kota Bontang</td>
			<td class="font2 style3">&nbsp;</td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" class="font2 style3">&nbsp;</td>
			<td class="style9">Provinsi</td>
			<td align="center" class="style9">:</td>
			<td class="style14">Kalimantan Timur</td>
			<td class="style9">Kode Pos : <span class="style14"><?php echo empty($data_perusahaan_list->kodepos) ? '-' : $data_perusahaan_list->kodepos?>
			</span></td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" class="font2 style3">&nbsp;</td>
			<td class="style9">Nomor Telepon</td>
			<td align="center" class="style9">:</td>
			<td class="style14"><?php echo empty($data_perusahaan_list->telp) ? '-' : $data_perusahaan_list->telp?>
			</td>
			<td class="style9">No. Fax : <span class="style14"><?php echo empty($data_perusahaan_list->fax) ? '-' : $data_perusahaan_list->fax?>
			</span></td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" class="font2 style3">&nbsp;</td>
			<td class="font2 style3">&nbsp;</td>
			<td class="font2 style3">&nbsp;</td>
			<td class="font2 style3">&nbsp;</td>
			<td class="font2 style3">&nbsp;</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" colspan="5" class="style9" style="padding-left: 80px">Nama
				Penanggung jawab Utama Badan Usaha / Direktur Utama / Direktur :</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" class="font2 style3 style10">&nbsp;</td>
			<td class="style9">Nama 1</td>
			<td align="center" class="style9">:</td>
			<td class="style14" colspan="2"><?php echo empty($iujk_list->dirut1) ? '&nbsp;' : $iujk_list->dirut1?>
			</td>
			<td class="font2 style3 style10">&nbsp;</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" class="font2 style3 style10">&nbsp;</td>
			<td class="style9">Nama 2</td>
			<td align="center" class="style9">:</td>
			<td class="style14" colspan="2"><?php echo empty($iujk_list->dirut2) ? '&nbsp;' : $iujk_list->dirut2?>
			</td>
			<td class="font2 style3 style10">&nbsp;</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" class="font2 style3 style10">&nbsp;</td>
			<td class="style9">Nama 3</td>
			<td align="center" class="style9">:</td>
			<td class="style14" colspan="2"><?php echo empty($iujk_list->dirut3) ? '&nbsp;' : $iujk_list->dirut3?>
			</td>
			<td class="font2 style3 style10">&nbsp;</td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" colspan="2" class="style9" style="padding-left: 80px">NPWP
				Badan Usaha</td>
			<td width="3" align="center" class="style9">:</td>
			<td class="style12" colspan="2"><?php echo $data_perusahaan_list->npwp=="" ? '&nbsp;' : $data_perusahaan_list->npwp?>
			</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" colspan="5" class="style9" style="padding-left: 80px">Izin
				Usaha Jasa Konstruksi (IUJK) ini berlaku untuk melakukan Kegiatan
				Usaha Jasa <strong><?php echo $iujk_list->jenis;?> </strong><br> Konstruksi di
				seluruh wilayah Republik Indonesia.</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" colspan="2" class="style9" style="padding-left: 80px">Kualifikasi
			</td>
			<td width="3" align="center" class="style9">:</td>
			<td class="style12" colspan="2"><span class="style14"> <?php echo empty($data_perusahaan_list->kualifikasi) ? '&nbsp;' : strtoupper($data_perusahaan_list->kualifikasi)?>
			</span></td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" colspan="2" class="style9" style="padding-left: 80px">Nama
				Penanggung Jawab Teknis</td>
			<td width="3" align="center" class="style9">:</td>
			<td class="style12" colspan="2"><?php echo empty($iujk_list->nama_pjt) ? '&nbsp;' : $iujk_list->nama_pjt?>
			</td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" colspan="2" class="style9" style="padding-left: 80px">No.
				PJT-BU</td>
			<td width="3" align="center" class="style9">:</td>
			<td class="style12" colspan="2"><span class="style14"> <?php echo empty($iujk_list->no_pjt) ? '&nbsp;' : $iujk_list->no_pjt?>
			</span></td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" colspan="2" class="style9" style="padding-left: 80px">Klasifikasi
			</td>
			<td width="3" align="center" class="style9">:</td>
			<td class="style12" colspan="2">( tertera di lembar belakang IUJK
				Nasional )</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="27" class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" colspan="5" class="style9" style="padding-left: 80px">Berlaku
				sampai dengan tanggal : <strong><?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglexpired)?>
			</strong></td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" colspan="5" class="style9" style="padding-left: 80px">&nbsp;</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td align="right" class="style9" style="padding-right: 5px">Ditetapkan
				di</td>
			<td class="style9">: <span class="style12">Bontang </span></td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td colspan="2" rowspan="2" align="center"
				class="font2 style3 style10"><table width="100%" border="0"
					cellspacing="0" cellpadding="0">
					<tr>
						<td width="47%">&nbsp;</td>
						<td width="53%">&nbsp;</td>
					</tr>
				</table></td>
			<td height="18" class="font2 style3 style10">&nbsp;</td>
			<td align="right" class="style9" style="padding-right: 3px">Pada
				Tanggal</td>
			<td class="style9">:<span class="style12"> <?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglsk)?>
			</span></td>
		</tr>
		<tr align="left" valign="top">
			<td height="180" class="font2 style3">&nbsp;</td>
			<td colspan="2" align="center" valign="top"
				style="padding: : 0px 40px 10px 50px">
				<table width="70%" border="0" cellspacing="0" cellpadding="0"
					style="visibility: visible">
					<tr>
						<td align="center" valign="middle"><hr style="color: #000000"
								width="85%"></td>
					</tr>
					<tr>
						<td height="24" align="center" valign="middle"><span
							class="style12"> <?php echo $ttd_list->atasnama?> </span></td>
					</tr>
					<tr>
						<td height="24" align="center" valign="middle"><span
							class="style12"> <?php echo $ttd_list->jabatan?> </span></td>
					</tr>
					<tr>
						<td height="24" align="center" valign="middle"><span
							class="style12"> KOTA BONTANG </span>
						</td>
					</tr>
					<tr>
						<td height="64" align="center" valign="middle">&nbsp;</td>
					</tr>
					<tr>
						<td height="77" align="center" valign="middle"><span
							class="style12"> <u><?php echo $ttd_list->pejabat?> </u> </span><br> <span
							class="style9"> <?php echo $ttd_list->pangkat?> </span><br> <span
							class="style9"> NIP. <?php echo $ttd_list->nip?> </span>
						</td>
					</tr>
				</table></td>
		</tr>
	</table>
</div>    
</body>
</html>

<?php
	}else if($jenis=="skatas"){

		$data_permohonan_list = $this->Permohonan_cetak_model->get_detil_permohonan($id);				
		$iujk_list = $this->Iujk_cetak_sk_model->get_detil_iujk($id);
		$data_perusahaan_list = $this->Permohonan_cetak_model->get_detil_data_perusahaan($iujk_list->perusahaan_id);
		
		$ttd_list = $this->Permohonan_cetak_model->get_ttd(18);
		$pejabat_list = $this->Permohonan_cetak_model->get_pejabat(18);
		$data_permohonan_list->pejabat = $pejabat_list->pejabat;
		$data_permohonan_list->nip = $pejabat_list->nip;
		$data_permohonan_list->jabatan = $pejabat_list->jabatan;
		$data_permohonan_list->pangkat = $pejabat_list->pangkat;
		$data_permohonan_list->atasnama = $pejabat_list->atasnama;

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Sistem Perijinan Kota Bontang</title>
<style type="text/css">
<!--
.style2 {
	font-size: 16pt;
	color: #000000;
	text-decoration: underline;
	font-weight: bold;
}

.style3 {
	font-size: 11px;
	color: #000000;
}

.style4 {
	font-family: "Times New Roman", Times, serif;
	font-size: 30pt;
	font-weight: bold;
}

.style9 {
	font-family: "Times New Roman", Times, serif;
	font-size: 12pt;
	color: #000000;
}

.style10 {
	font-family: "Times New Roman", Times, serif
}

.style13 {
	color: #000000
}

.style14 {
	font-family: "Times New Roman", Times, serif;
	font-size: 12pt;
	font-weight: bold;
	color: #000000;
}

.style15 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 8pt;
}

.style18 {
	font-family: "Times New Roman", Times, serif;
	font-size: 12pt;
}

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>
<body onload="printDiv('printableArea')">

<div id="printableArea">

	<table width="825" height="1139" border="0" align="center"
		cellpadding="4" cellspacing="0" bgcolor="#FFFFFF">
		<tr>
			<td height="22" colspan="5" align="center" valign="middle"><table
					width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="15%" align="left" valign="top"
							style="padding: 20px 0px 0px 20px">&nbsp;</td>
						<td width="73%" align="center"
							style="border-bottom: 3px solid; margin-top: 20px"><p>
								<span class="style18"><strong> <br> <br> </strong> </span><span
									class="style18"><strong>PEMERINTAH KOTA BONTANG<br> BADAN
										PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL</strong> </span><br>
								<span class="style15">Jl. M.T. Haryono No. 31 Telp. (0548)20594
									Fax. (0548)20598<br> </span> <br>
						
						</td>
						<td width="12%" align="center"><span class="style4"> <?php echo substr($data_perusahaan_list->kualifikasi,0,1);?>
						</span></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="23" colspan="5" align="center" valign="middle"
				class="style2">IJIN USAHA JASA KONSTRUKSI</td>
		</tr>
		<tr>
			<td height="18" colspan="5" align="center" valign="middle"
				class="style14">No. Reg. : <?php echo $data_permohonan_list->nosk;?></td>
		</tr>
		<tr>
			<td height="27" colspan="5" align="center" valign="middle"
				class="font2 style3">&nbsp;</td>
		</tr>

		<tr align="left" valign="top">
			<td height="18" colspan="2" class="style9" style="padding-left: 80px">Nama
				Perusahaan</td>
			<td width="5" align="center" class="style9">:</td>
			<td width="254" class="style14" colspan="2"><?php echo $data_perusahaan_list->nama;?>
			</td>

		</tr>
		<tr align="left" valign="top">
			<td height="18" colspan="2" class="style9" style="padding-left: 80px">Alamat
				Kantor Perusahaan</td>
			<td align="center" class="style9">:</td>
			<td class="font2 style3">&nbsp;</td>
			<td class="font2 style3">&nbsp;</td>
		</tr>
		<tr align="left" valign="top">
			<td width="95" height="18" class="font2 style3">&nbsp;</td>
			<td width="211" class="style9">Jalan, Nomor</td>
			<td align="center" class="style9">:</td>
			<td class="style14"><?php echo $data_perusahaan_list->alamat;?></td>
			<td class="font2 style3">&nbsp;</td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" class="font2 style3">&nbsp;</td>
			<td class="style9">Kelurahan</td>
			<td align="center" class="style9">:</td>
			<td class="style14"><?php echo ucwords(strtolower($data_perusahaan_list->desa));?></td>
			<td class="font2 style3">&nbsp;</td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" class="font2 style3">&nbsp;</td>
			<td class="style9">RT/RW</td>
			<td align="center" class="style9">:</td>
			<td class="style14"><?php echo $data_perusahaan_list->rt;?>/<?php echo $data_perusahaan_list->rw;?>
			</td>
			<td class="font2 style3">&nbsp;</td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" class="font2 style3">&nbsp;</td>
			<td class="style9">Kota</td>
			<td align="center" class="style9">:</td>
			<td class="style14">Bontang</td>
			<td class="font2 style3">&nbsp;</td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" class="font2 style3">&nbsp;</td>
			<td class="style9">Propinsi</td>
			<td align="center" class="style9">:</td>
			<td class="style14">Kalimantan Timur</td>
			<td class="style9">Kode Pos : <span class="style14"><?php echo empty($data_perusahaan_list->kodepos) ? '-' : $data_perusahaan_list->kodepos?>
			</span></td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" class="font2 style3">&nbsp;</td>
			<td class="style9">Nomor Telepon</td>
			<td align="center" class="style9">:</td>
			<td class="style14"><?php echo empty($data_perusahaan_list->telp) ? '-' : $data_perusahaan_list->telp?>
			</td>
			<td class="style9">Fax. : <span class="style14"><?php echo empty($data_perusahaan_list->fax) ? '-' : $data_perusahaan_list->fax?>
			</span></td>
		</tr>
		<tr align="left" valign="top">
			<td height="18" class="font2 style3">&nbsp;</td>
			<td class="font2 style3">&nbsp;</td>
			<td class="font2 style3">&nbsp;</td>
			<td class="font2 style3">&nbsp;</td>
			<td class="font2 style3">&nbsp;</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" colspan="5" class="style9" style="padding-left: 80px">Nama
				Penanggung jawab Perusahaan / Direktur Utama :</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="29" class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" class="font2 style3 style10">&nbsp;</td>
			<td class="style9">Nama</td>
			<td align="center" class="style9">:</td>
			<td class="style14"><?php echo empty($data_permohonan_list->nama) ? '&nbsp;' : $data_permohonan_list->nama?>
			</td>
			<td class="font2 style3 style10">&nbsp;</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" class="font2 style3 style10">&nbsp;</td>
			<td class="style9">NPWP</td>
			<td align="center" class="style9">:</td>
			<td class="style14"><?php echo $data_perusahaan_list->npwp=="" ? '&nbsp;' : $data_perusahaan_list->npwp?>
			</td>
			<td class="font2 style3 style10">&nbsp;</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" colspan="5" class="style9" style="padding-left: 80px">Izin
				Usaha Jasa Konstruksi (IUJK) ini berlaku untuk melakukan Kegiatan
				Usaha Jasa Pelaksana <br> Konstruksi di seluruh Wilayah Republik
				Indonesia.</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="123" colspan="2" class="style9"
				style="padding-left: 80px">Bidang Pekerjaan</td>
			<td colspan="2" align="left" class="style14"
				style="padding-left: 25px">
				<?php 
				
				$list_bidang_jasa_iujk = $this->Iujk_cetak_sk_model->get_list_bidang_jasa_iujk($iujk_list->id);
				$i = 0;
				foreach($list_bidang_jasa_iujk as $val_list_bidang_jasa_iujk){
					if($val_list_bidang_jasa_iujk->iujkbidang_id==false)continue;
					$i++;
					echo $i.". ".strtoupper($val_list_bidang_jasa_iujk->bidang)."<br /><br />";
					
				}
				?>
			</td>
			<td class="font2 style3 style10">&nbsp;</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="27" class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" colspan="5" class="style9" style="padding-left: 80px">Berlaku
				sampai dengan tanggal : <strong><?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglexpired)?>
			</strong></td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td height="18" class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td class="font2 style3 style10">&nbsp;</td>
			<td align="left" class="style9" style="padding-left: 165px">Ditetapkan
				di</td>
			<td class="style9">: <span class="style14">Bontang </span></td>
		</tr>
		<tr align="left" valign="top" class="style9">
			<td colspan="2" rowspan="2" align="center"
				class="font2 style3 style10"><table width="100%" border="0"
					cellspacing="0" cellpadding="0">
					<tr>
						<td width="47%">&nbsp;</td>
						<td width="53%"><div
								style="width: 120px; height: 150px; border: 1px solid #000;">&nbsp;</div>
						</td>
					</tr>
				</table></td>
			<td height="18" class="font2 style3 style10">&nbsp;</td>
			<td align="left" class="style9" style="padding-left: 165px">Pada
				Tanggal</td>
			<td class="style9">:<span class="style14"><?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglsk)?>
			</span></td>
		</tr>
		<tr align="left" valign="top">
			<td height="180" class="font2 style3">&nbsp;</td>
			<td colspan="2" align="center" valign="top"
				style="padding: 0px 20px 10px 70px">
				<table width="90%" border="0" cellspacing="0" cellpadding="0"
					style="visibility: visible">
					<tr>
						<td align="center" valign="middle"><hr style="color: #000000"
								width="90%"></td>
					</tr>
					<tr>
						<td align="center" valign="middle">&nbsp;</td>
					</tr>
					<tr>
						<td height="24" align="center" valign="middle"
							style="color: #FFFFFF"><span class="style14"
							style="color: #FFFFFF"> <?php echo $ttd_list->atasnama;?> </span></td>
					</tr>
					<tr>
						<td height="24" align="center" valign="middle"
							style="color: #FFFFFF"><span class="style14"
							style="color: #FFFFFF"> <?php echo $ttd_list->jabatan;?> </span></td>
					</tr>
					<tr>
						<td height="24" align="center" valign="middle"
							style="color: #FFFFFF"><span class="style14"
							style="color: #FFFFFF"> KOTA BONTANG </span>
						</td>
					</tr>
					<tr>
						<td height="64" align="center" valign="middle">&nbsp;</td>
					</tr>
					<tr>
						<td height="77" align="center" valign="middle"
							style="color: #FFFFFF"><span class="style14"
							style="color: #FFFFFF"> <u><?php echo $ttd_list->pejabat;?> </u> </span><br> <span
							class="style9" style="color: #FFFFFF"> <?php echo $ttd_list->pangkat;?> </span><br>
							<span class="style9" style="color: #FFFFFF"> NIP. <?php echo $ttd_list->nip;?>
						</span>
						</td>
					</tr>
				</table></td>
		</tr>
	</table>
</div>    
</body>
</html>

<?php
	}else if($jenis=="lampiran"){

		$data_permohonan_list = $this->Permohonan_cetak_model->get_detil_permohonan($id);				
		$iujk_list = $this->Iujk_cetak_sk_model->get_detil_iujk($id);
		$data_perusahaan_list = $this->Permohonan_cetak_model->get_detil_data_perusahaan($iujk_list->perusahaan_id);
		
		$ttd_list = $this->Permohonan_cetak_model->get_ttd(18);
		$pejabat_list = $this->Permohonan_cetak_model->get_pejabat(18);
		$data_permohonan_list->pejabat = $pejabat_list->pejabat;
		$data_permohonan_list->nip = $pejabat_list->nip;
		$data_permohonan_list->jabatan = $pejabat_list->jabatan;
		$data_permohonan_list->pangkat = $pejabat_list->pangkat;
		$data_permohonan_list->atasnama = $pejabat_list->atasnama;
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
<!--
.header {
	color: #000099;
	text-align: center;
	font-size: 12px;
	font-weight: bold;
	font-family: "Times New Roman";
}

.subHeader {
	color: #000000;
	text-align: center;
	font-weight: bold;
	font-size: 11px;
	font-family: Arial;
	
}

.isi {
	font-size: 9px;
	font-family: Arial;
}

.summary {
	color: #000099;
	font-size: 9px;
	font-weight: bold;
	font-family: Arial;
}
-->
</style>
	<title>Sistem Perijinan Kota Bontang</title>

</head>
<body onload="printDiv('printableArea')">

<div id="printableArea">

	<table width="998" border="1" cellpadding="0" cellspacing="0"
		bordercolor="#000000">
		<tr>
			<td colspan="12">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td colspan="12">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="12">Nama Badan Usaha</td>
						<td>:</td>
						<td><?php echo $data_perusahaan_list->nama;?></td>
					</tr>
					<tr>
						<td colspan="12">Nomor IUJK</td>
						<td>:</td>
						<td><?php echo $data_permohonan_list->nosk;?></td>
					</tr>
					<tr>
						<td cols pan="12">Jenis Usaha</td>
						<td>:</td>
						<td><?php echo $iujk_list->jenis;?></td>
					</tr>
					<tr>
						<td colspan="12">&nbsp;</td>
					</tr>

				</table></td>
		</tr>
		<tr align="center" class="subHeader">
			<td width="21">No</td>
			<td width="71">Klasifikasi Usaha</td>
			<td width="117">Sub Klasifikasi Pekerjaan</td>
			<td width="134">Nama Paket Pekerjaan Tertinggi</td>
			<td width="64">Tahun Pelaksanaan Proyek</td>
			<td width="118">Nilai Pekerjaan</td>
			<td width="86">Keterangan</td>
		</tr>
		<?php
			$i = 0;
			$detil_lampiran_list = $this->Iujk_cetak_sk_model->get_detil_lampiran_iujk($id);
			foreach($detil_lampiran_list as $val_detil_lampiran){						
				$i++;
 
		?>
		<tr valign="top">
			<td align="center"><?php echo $i?></td>
			<td><?php echo $val_detil_lampiran->bidang ? "&nbsp;&nbsp;&nbsp;".$val_detil_lampiran->bidang : "<center>-</center>"?>&nbsp;</td>
			<td><?php 
				$sub_klasifikasi_list = $this->Iujk_cetak_sk_model->get_sub_klasifikasi_pekerjaan($val_detil_lampiran->bidang_id, $id);
				if(!empty($sub_klasifikasi_list)){
					foreach($sub_klasifikasi_list as $val_sub_klasifikasi){		
						echo '<table><tr><td valign="top">-</td><td>';
						echo $val_sub_klasifikasi->subbidang;
						echo '</td></tr></table>';	
					}
				}else{
					echo '<center>-</center>';
				}
				
			?></td>
			<td><?php echo $val_detil_lampiran->nama_proyek ? "&nbsp;&nbsp;&nbsp;".$val_detil_lampiran->nama_proyek : "<center>-</center>"?></td>
			<td align="center"><?php echo $val_detil_lampiran->tahun_proyek ? "&nbsp;&nbsp;&nbsp;".$val_detil_lampiran->tahun_proyek : "-"?>&nbsp;</td>
			<td align="right"><?php echo $val_detil_lampiran->nilai_proyek ? "&nbsp;&nbsp;&nbsp;".$val_detil_lampiran->nilai_proyek : "<center>-</center>"?>&nbsp;</td>
			<td align="center"><?php echo $val_detil_lampiran->tglpermohonan ? "&nbsp;&nbsp;&nbsp;".$this->String_model->DateMonthWord($val_detil_lampiran->tglpermohonan) : "-"?></td>
		</tr>
		<?php
		}
		if($i < 1){
		?>
		<tr valign="top">
			<td colspan="12" align="center">Tidak ada data</td>
		</tr>
		<?php
		}
		?>

	</table>
</div>    
</body>
</html>

<?php
	}else if($jenis=="kontrol"){

		$data_permohonan_list = $this->Permohonan_cetak_model->get_detil_permohonan($id);		
		$iujk_list = $this->Iujk_cetak_sk_model->get_detil_iujk($id);
		$data_perusahaan_list = $this->Permohonan_cetak_model->get_detil_data_perusahaan($iujk_list->perusahaan_id);		

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Sistem Perijinan Kota Bontang</title>
	<style type="text/css">
<!--
body {
	margin-top: 0px;
}

.style6 {
	font-size: 12pt;
}
-->
</style>

</head>
<body onLoad="printDiv('printableArea')">

<div id="printableArea">

	<table width="700" border="0" align="center" cellpadding="0"
		cellspacing="0" style="margin-top: 50px">
		<tr>
			<td height="45" colspan="3" align="center" valign="middle"
				style="font-family: 'Times New Roman', Times, serif; font-size: 14px;">

				<p align="center" style="border-bottom: double thin #000000">
					<strong><img src="../images/logo.gif" width="48" height="57" /><br />
						PEMERINTAH KOTA BONTANG <br /> BADAN PELAYANAN PERIJINAN TERPADU
						DAN PENANAMAN MODAL KOTA BONTANG<br /> </strong>Jl. MT.Haryono
					No.31 Telp (0548) 20594 Fax. (0548) 20598 Kode Pos 75311 BONTANG<br />
					<br />
				</p>
				<p>&nbsp;</p>
				<table width="78%" border="0" cellspacing="0" cellpadding="8">
					<tr>
						<td><div align="left" class="style6">Nama Perusahaan</div></td>
						<td>:&nbsp;</td>
						<td><div align="left" class="style6">
						<?php echo strtoupper($data_perusahaan_list->nama);?>
							</div></td>
					</tr>
					<tr>
						<td width="26%"><div align="left" class="style6">Nama Direktur</div>
						</td>
						<td width="2%">:</td>
						<td width="72%">
							<div align="left" class="style6">
							<?php echo strtoupper($data_permohonan_list->nama);?>
							</div></td>
					</tr>
					<tr>
						<td><div align="left" class="style6">Alamat Perusahaan</div></td>
						<td>:</td>
						<td>
							<div align="left" class="style6">
							<?php echo $data_perusahaan_list->alamat?>
							<?php echo $this->String_model->IsEmpty($data_perusahaan_list->rt)==false ? " RT. ".$data_perusahaan_list->rt : ""?>
							<?php echo $this->String_model->IsEmpty($data_perusahaan_list->rw)==false ? " RW. ".$data_perusahaan_list->rw : ""?>
							</div></td>
					</tr>
					<tr>
						<td><div align="left" class="style6">Nomor Registrasi</div></td>
						<td>:</td>
						<td><div align="left" class="style6">
						<?php echo $data_permohonan_list->nosk ? $data_permohonan_list->nosk : ""?>
							</div></td>
					</tr>
					<tr>
						<td><div align="left" class="style6">Tanggal</div></td>
						<td>:</td>
						<td>
							<div align="left" class="style6">
							<?php echo $this->String_model->DateMonthWord($this->Permohonan_cetak_model->get_tgl_proses($id))?>
							</div></td>
					</tr>
					<tr>
						<td><div align="left" class="style6">Jenis Permohonan</div></td>
						<td>:</td>
						<td>
							<div align="left" class="style6">
							<?php echo $data_permohonan_list->jenispermohonan ? $data_permohonan_list->jenispermohonan : ""?>
							</div></td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td height="109" colspan="3" align="center" valign="middle"
				style="font-family: 'Times New Roman', Times, serif; font-size: 16px; font-weight: bold; margin-top: 10px; margin-bottom: 10px"><p>
					<br /> IJIN USAHA JASA KONSTRUKSI <br> (IUJK) 
				
				</p>
			</td>
		</tr>
		<tr>
			<td height="39" colspan="3" style="padding-left: 20px"><strong>I.
					Daftar Kelengkapan Permohonan </strong></td>
		</tr>
		<tr>
			<td height="61" colspan="3" style="padding-left: 20px">
				<table width="100%" border="1" align="center" cellpadding="3"
					cellspacing="0" bordercolor="#000000"
					style="border-collapse: collapse">
					<tr align="center" valign="middle">
						<td width="6%">No.</td>
						<td width="72%">Jenis Lampiran</td>
						<td width="22%">Keterangan</td>
					</tr>
					<?php
					
					$data_syarat = $this->Permohonan_cetak_model->get_list_syarat_permohonan($id, $data_permohonan_list->ijin_id);
					$i = 0;
					foreach($data_syarat as $val_data_syarat)
					{
						$i++;

					?>
					<tr valign="top">
						<td align="center"><?php echo $i;?>.</td>
						<td style="padding-left: 10px"><?php echo $val_data_syarat->syarat;?></td>
						<td align="center"><?php echo $val_data_syarat->keterangan ? $val_data_syarat->keterangan : "-";?>
						</td>
					</tr>
					<?
					}
			  ?>
				</table></td>
		</tr>
		<tr>
			<td height="85" colspan="3" style="padding-left: 20px"><p>&nbsp;</p>
				<p>
					<strong>II. Riwayat Dokumen</strong>
				</p>
			</td>
		</tr>

		<tr>
			<td colspan="3" style="padding-left: 20px">
				<table width="100%" border="1" cellpadding="4" cellspacing="0"
					bordercolor="#000000" style="border-collapse: collapse">
					<tr align="center" valign="middle">
						<td rowspan="2" width="5%"><strong>No.</strong></td>
						<td colspan="5"><strong>Diterima</strong></td>
						<td rowspan="2" width="13%"><strong>Keterangan</strong></td>
					</tr>
					<tr align="center" valign="middle">
						<td width="13%"><strong>Instansi</strong></td>
						<td width="26%"><strong>Nama</strong></td>
						<td width="20%"><strong>Jabatan</strong></td>
						<td width="11%"><strong>Tanggal</strong></td>
						<td width="12%"><strong>Tanda Tangan</strong></td>
					</tr>
					<tr>
						<td align="center">1.</td>
						<td>Dinas PU</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td align="center">2.</td>
						<td>BPPM</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</table>
				<p align="right">
					<?php echo $this->Permohonan_cetak_model->get_no_form(15); ?>
				</p>
			</td>
		</tr>
	</table>
</div>
</body>
</html>

<?php
	}else if($jenis=="bukti"){

		$data_permohonan_list = $this->Permohonan_cetak_model->get_detil_permohonan($id);		
		$iujk_list = $this->Iujk_cetak_sk_model->get_detil_iujk($id);
		$data_perusahaan_list = $this->Permohonan_cetak_model->get_detil_data_perusahaan($iujk_list->perusahaan_id);	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Sistem Perijinan Kota Bontang</title>
	<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	color: #000000;
	font-family: 'Times New Roman', Times, serif;
	font-weight: bold;
}
-->
</style>

</head>
<body onLoad="printDiv('printableArea')">

<div id="printableArea">

	<table width="700" border="0" align="center" cellpadding="0"
		cellspacing="0" style="border: 5px double #000;">
		<tr>
			<td width="96" align="center" class="style1"><img
				src="../images/logo3.gif" width="50" height="60" />
			</td>
			<td width="502" align="center" class="style1" style="padding: 10px">
				<br> BUKTI PENERIMAAN DOKUMEN IUJK <br /> BADAN PELAYANAN PERIJINAN
					TERPADU DAN PENANAMAN MODAL <br> KOTA BONTANG <br> Telp. (0548)
							20594 
			
			</td>
			<td width="96" align="center" class="style1">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" style="padding: 0px 48px 0px 48px">
				<hr style="color: #000000; border: 1px solid #000">
			
			</td>
		</tr>
		<tr>
			<td colspan="3" style="padding: 0px 48px 0px 48px">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr valign="top">
						<td width="27%" height="30">Nama Perusahaan</td>
						<td width="2%" align="center">:</td>
						<td width="71%"><?php echo $data_perusahaan_list->nama;?></td>
					</tr>
					<tr valign="top">
						<td height="30">Nama Direktur</td>
						<td align="center">:</td>
						<td><?php echo $data_permohonan_list->nama;?></td>
					</tr>
					<tr valign="top">
						<td height="30">Alamat Perusahaan</td>
						<td align="center">:</td>
						<td><?php				
						$alamat	= "";
						$alamat	.= $data_perusahaan_list->alamat ? $data_perusahaan_list->alamat : "";
						$alamat	.= $this->String_model->IsEmpty($data_perusahaan_list->rt)==false ? " RT. ".$data_perusahaan_list->rt : "";
						$alamat	.= $this->String_model->IsEmpty($data_perusahaan_list->rw)==false ? " RW. ".$data_perusahaan_list->rw : "";
						$alamat	.= $data_perusahaan_list->desa ? " Kel. ".ucwords(strtolower($data_perusahaan_list->desa)) : "";
						echo $alamat;
						?>
						</td>
					</tr>
					<tr valign="top">
						<td height="30">Tanggal Masuk</td>
						<td align="center">:</td>
						<td><?php echo $this->String_model->DateMonthWord($this->Permohonan_cetak_model->get_tgl_proses($id));?></td>
					</tr>
					<tr valign="top">
						<td height="30">Perkiraan Selesai</td>
						<td align="center">:</td>
						<td><?php echo $this->Permohonan_cetak_model->get_tgl_selesai(5);?>&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="right">
				<table width="169" border="0" cellspacing="0" cellpadding="0"
					style="margin-right: 100px; margin-bottom: 20px; margin-top: 20px">
					<tr>
						<td width="169" align="center">Petugas</td>
					</tr>
					<tr>
						<td height="50" align="center">&nbsp;</td>
					</tr>
					<tr>
						<td align="center"><span
							style="color: #000000; font-family: 'Times New Roman', Times, serif; font-size: 12px; font-weight: bold; text-decoration: underline">
							<?=isset($_SESSION['ss_nama']) ? $_SESSION['ss_nama'] : "&nbsp;"?>
						</span> <br> <span
								style="color: #000000; font-family: 'Times New Roman', Times, serif; font-size: 12px; font-weight: bold; text-decoration: none">
									NIP. <?=isset($_SESSION['ss_nip']) ? $_SESSION['ss_nip'] : "&nbsp;"?>
							</span>
						
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="right" style="padding-right: 5px"><?php echo $this->Permohonan_cetak_model->get_no_form(6); ?>
			</td>
		</tr>
	</table>
</div>
</body>
</html>

<?php
	}
?>

<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>