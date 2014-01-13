<?php

	$bulan = array("1"=>"Januari","2"=>"Februari","3"=>"Maret","4"=>"April","5"=>"Mei","6"=>"Juni","7"=>"Juli","8"=>"Agustus","9"=>"September","10"=>"Oktober","11"=>"Nopember","12"=>"Desember");	
	$hariIndo = array("1"=>"Senin","2"=>"Selasa","3"=>"Rabu","4"=>"Kamis","5"=>"Jumat","6"=>"Sabtu","7"=>"Minggu");

	$id = $_GET['id'];
	$jenis = $_GET['jenis'];
	
?>



<?php
	if($jenis=="sk"){		
	
?>

<?php
	}else if($jenis=="skatas"){

?>

<?php
	}else if($jenis=="kontrol"){

		$ho_list = $this->Ho_cetak_sk_model->get_detil_ho($id);
		$permohonan_list = $this->Ho_cetak_sk_model->get_detil("permohonan",$ho_list->permohonan_id);
		$pemohon_list = $this->Ho_cetak_sk_model->get_detil("pemohon",$permohonan_list->pemohon_id);
		$perusahaan_list = $this->Ho_cetak_sk_model->get_detil("perusahaan",$ho_list->perusahaan_id);
		
		$x_nosk = "";
		$x_no_form = $this->Permohonan_cetak_model->get_no_form(10);
		$x_no_agenda = $permohonan_list->no_agenda;
		$x_SK = $permohonan_list->nosk;
		$x_pemohon = $pemohon_list->nama;
		$x_perusahaan = $perusahaan_list->nama;
		$x_alamat = $pemohon_list->alamat;
		if ($this->String_model->IsEmpty($pemohon_list->rt)==false)
			$x_alamat.=" RT.".$pemohon_list->rt;
		if ($this->String_model->IsEmpty($pemohon_list->rw)==false)
			$x_alamat.=" RW. ".$pemohon_list->rw;
		$x_today = date("d")." ".ucfirst($this->String_model->cIndMnth(date("n")))." ".date("Y");
		$x_terima = $this->Permohonan_cetak_model->get_nama_penerima($permohonan_list->id);
		$x_tgl_terima = $this->String_model->DateMonthWord($permohonan_list->tglpermohonan);
		$x_jpermohonan = $this->Permohonan_cetak_model->get_jenis_permohonan($permohonan_list->jpermohonan_id);
		
		$jumlah_permohonan_syarat = $this->Permohonan_cetak_model->get_jumlah_permohonan_syarat($permohonan_list->id);	
		if ($jumlah_permohonan_syarat!=0) {
			$x_tabel = "<table style='border-collapse:collapse' border='1' width='100%' cellpadding='3' cellspacing='0'>
						 <tr align='center'>
						  <td>
						  <b>No</b>
						  </td>
						  <td>
						  <b>JENIS LAMPIRAN</b>
						  </td>
						  <td>
						  <b>KETERANGAN</b>
						  </td>
						 </tr>
						 ";
 			$no = 0;
			$permohonan_syarat_list = $this->Permohonan_cetak_model->get_permohonan_syarat($permohonan_list->id);
			foreach($permohonan_syarat_list as $val_permohonan_syarat){	
				$no++;
				$syarat_list = $this->Ho_cetak_sk_model->get_detil("syarat",$val_permohonan_syarat->syarat_id);
				$syarat = $syarat_list->syarat;
				$x_tabel.= "
					 <tr>
					  <td align='center'>
					  ".$no."&nbsp;
					  </td>
					  <td>
					  ".$syarat."&nbsp;
					  </td>
					  <td>
					  ".$val_permohonan_syarat->keterangan."&nbsp;
					  </td>
					 </tr>";
			}
			$x_tabel.= "</table>";
		}else{
			$x_tabel = "(Tidak ada daftar kelengkapan)";
		}

?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=us-ascii">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 11">
<meta name=Originator content="Microsoft Word 11">
<link rel=File-List href="KelengkapanHO_files/filelist.xml">
<title>Nama Perusahaan</title>
<style>
<!--
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 3.0in right 6.0in;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	tab-stops:center 3.0in right 6.0in;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
 /* Page Definitions */
 @page
	{mso-footnote-separator:url("KelengkapanHO_files/header.htm") fs;
	mso-footnote-continuation-separator:url("KelengkapanHO_files/header.htm") fcs;
	mso-endnote-separator:url("KelengkapanHO_files/header.htm") es;
	mso-endnote-continuation-separator:url("KelengkapanHO_files/header.htm") ecs;}
@page Section1
	{size:8.5in 14.0in;
	margin:84.95pt 56.9pt 84.95pt 56.9pt;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-even-header:url("KelengkapanHO_files/header.htm") eh1;
	mso-header:url("KelengkapanHO_files/header.htm") h1;
	mso-even-footer:url("KelengkapanHO_files/header.htm") ef1;
	mso-footer:url("KelengkapanHO_files/header.htm") f1;
	mso-first-header:url("KelengkapanHO_files/header.htm") fh1;
	mso-first-footer:url("KelengkapanHO_files/header.htm") ff1;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
.style3 {font-size: 12pt}
div.MsoNormal1 {mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
li.MsoNormal1 {mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
p.MsoNormal1 {mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
p.MsoNormal11 {mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
-->
</style>
</head>

<body lang=EN-US style='tab-interval:.5in' onLoad="printDiv('printableArea')">
<div id="printableArea">
<table width="700" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td><p align="center"><strong><img src="../images/logo4.jpg" width="74" height="88" align="top" /></strong></p>
        <p align="center" style="border-bottom:double thick #000000"><strong>PEMERINTAH KOTA BONTANG <br />
          BADAN PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL<br>
        </strong>Jl. MT.Haryono No.31 Telp (0548) 20594 Fax. (0548) 20598 <br>
		<strong>B&nbsp;O&nbsp;N&nbsp;T&nbsp;A&nbsp;N&nbsp;G&nbsp;</strong></p>
        <table width="78%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="34%"><div align="left"><span class="style3">Nama Perusahaan</span></div></td>
            <td width="2%">:</td>
            <td width="64%"><div align="left"><?php echo $x_perusahaan;?></div></td>
          </tr>
          <tr>
            <td><div align="left"><span class="style3">Nama Pemilik </span></div></td>
            <td>:</td>
            <td><?php echo $x_pemohon;?>
              <div align="left"> </div></td>
          </tr>
		  <tr>
            <td><div align="left"><span class="style3">No. SITU  HO </span></div></td>
            <td>:</td>
            <td><div align="left"><?php echo $x_SK;?></div></td>
          </tr>
		  <tr>
            <td><div align="left"><span class="style3">No. Agenda</span></div></td>
            <td>:</td>
            <td><div align="left"><?php echo $x_no_agenda;?></div></td>
          </tr>
          <tr>
            <td><div align="left"><span class="style3">Tanggal Masuk</span></div></td>
            <td>:</td>
            <td><div align="left"><?php echo $x_tgl_terima;?></div></td>
          </tr>
		  <tr>
            <td><div align="left"><span class="style3">Jenis Permohonan</span></div></td>
            <td>:</td>
            <td><div align="left"><?php echo $x_jpermohonan;?></div></td>
          </tr>
        </table>
      <p class=MsoNormal11>&nbsp;</p>
      <p class=MsoNormal11>&nbsp;</p>
      <p class=MsoNormal11>&nbsp;</p>
      <p class=MsoNormal11 align=center style='text-align:center'><b><u><span
style='font-size:14.0pt'>SITU / HO</span></u></b></p>
      <p class=MsoNormal11 align=center style='text-align:center'><b><span
style='font-size:14.0pt'>&nbsp;</span></b></p>
      <p class=MsoNormal11 style='margin-left:.75in;text-indent:-.75in'><b>I.</b><b><span
style='font-size:7.0pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Daftar Kelengkapan Permohonan</b></p>
      <p class=MsoNormal11><b>&nbsp;</b></p>
      <p class=MsoNormal11><?php echo $x_tabel;?> </p>
      <p class=MsoNormal11>&nbsp;</p>
      <p class=MsoNormal11>&nbsp;</p>
      <p class=MsoNormal11 style='margin-left:.75in;text-indent:-.75in'><b>II.</b><b><span
style='font-size:7.0pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Riwayat
        Dokumen</b></p>
      <p class=MsoNormal11 align=center style='text-align:center'><b><span
style='font-size:14.0pt'>&nbsp;</span></b></p>
      <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;mso-padding-alt:0in 0in 0in 0in'>
          <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:.3in'>
            <td width=43 valign=top style='width:.45in;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.3in'><p class=MsoNormal11 align=center style='text-align:center'><b><span
  style='font-size:13.0pt'>No.</span></b></p></td>
            <td width=213 valign=top style='width:159.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:.3in'><p class=MsoNormal11 align=center style='text-align:center'><b><span
  style='font-size:13.0pt'>Diterima Oleh</span></b></p></td>
			<td width=200 valign=top style='width:159.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:.3in'><p class=MsoNormal11 align=center style='text-align:center'><b><span
  style='font-size:13.0pt'>Jabatan</span></b></p></td>
            <td width=80 valign=top style='width:96.2pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:.3in'><p class=MsoNormal11 align=center style='text-align:center'><b><span
  style='font-size:13.0pt'>Tanggal</span></b></p></td>
            <td width=128 valign=top style='width:96.2pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:.3in'><p class=MsoNormal11 align=center style='text-align:center'><b><span
  style='font-size:13.0pt'>Tanda Tangan</span></b></p></td>
            <td width=100 valign=top style='width:96.2pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:.3in'><p class=MsoNormal11 align=center style='text-align:center'><b><span
  style='font-size:13.0pt'>Keterangan</span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:1;height:.3in'>
            <td width=43 valign=top style='width:.45in;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:.3in'><p class=MsoNormal11>1</p></td>
            <td width=213 valign=top style='width:159.9pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.3in'><p class=MsoNormal11></p>
            &nbsp;Dra. Hj. Noraini </td>
			<td width=200 valign=top style='width:159.9pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.3in'><p class=MsoNormal11>Kabid Pelayanan dan Perijinan </p></td>
            <td width=80 valign=top style='width:96.2pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.3in'><p class=MsoNormal11>&nbsp;</p></td>
            <td width=128 valign=top style='width:96.2pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.3in'><p class=MsoNormal11><b>&nbsp;</b></p></td>
            <td width=100 valign=top style='width:96.2pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.3in'><p class=MsoNormal11><b>&nbsp;</b></p></td>
          </tr>
      </table>
      <p align="right"><?php echo $x_no_form;?></p></td>
  </tr>
</table>
</div>
</body>
</html>


<?php
	}else if($jenis=="keterangan"){

		$ho_list = $this->Ho_cetak_sk_model->get_detil_ho($id);
		$permohonan_list = $this->Ho_cetak_sk_model->get_detil("permohonan",$ho_list->permohonan_id);
		$pemohon_list = $this->Ho_cetak_sk_model->get_detil("pemohon",$permohonan_list->pemohon_id);
		$perusahaan_list = $this->Ho_cetak_sk_model->get_detil("perusahaan",$ho_list->perusahaan_id);
		$ttd_list = $this->Ho_cetak_sk_model->get_detil("tandatangan",17);

		$x_pemohon = $pemohon_list->nama;
		$x_pekerjaan = $pemohon_list->pekerjaan;
		$x_perusahaan = $perusahaan_list->nama;
		$x_usaha = $perusahaan_list->usaha;
		$x_alamat = $perusahaan_list->alamat;
		if ($this->String_model->IsEmpty($perusahaan_list->rt)==false)
			$x_alamat.=" RT. ".$perusahaan_list->rt;
		if ($this->String_model->IsEmpty($perusahaan_list->rw)==false)
			$x_alamat.=" RW. ".$perusahaan_list->rw;
		if ($perusahaan_list->desa_id!=""){
			$desa_list = $this->Ho_cetak_sk_model->get_detil("desa",$perusahaan_list->desa_id);
			$x_alamat.=" ".ucfirst(strtolower($desa_list->desa));
		}
		if ($perusahaan_list->kecamatan_id!=""){
			$kecamatan_list = $this->Ho_cetak_sk_model->get_detil("kecamatan",$perusahaan_list->kecamatan_id);
			$x_alamat.=" ".ucwords(strtolower($kecamatan_list->kecamatan));
		}
	
		$x_peruntukan = isset($ho_list->peruntukan) && !empty($ho_list->peruntukan)? " untuk ".$ho_list->peruntukan:"";
		$x_today = date("d")." ".ucfirst($this->String_model->cIndMnth(date("n")))." ".date("Y");
		$tglberlaku = strtotime("+2 weeks");
		$x_berlaku = date("d",$tglberlaku)." ".ucfirst($this->String_model->cIndMnth(date("n",$tglberlaku)))." ".date("Y",$tglberlaku);
		$x_atas_nama = $ttd_list->atasnama!=""?$ttd_list->atasnama:"";
		$x_jabatan = $ttd_list->jabatan!=""?$ttd_list->jabatan:"";
		$x_pejabat = $ttd_list->pejabat!=""?$ttd_list->pejabat:"";
		$x_pangkat = $ttd_list->pangkat!=""?$ttd_list->pangkat:"";
		$x_NIP = $ttd_list->nip!=""?$ttd_list->nip:"";

?>

<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:st1="urn:schemas-microsoft-com:office:smarttags"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=us-ascii">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 11">
<meta name=Originator content="Microsoft Word 11">
<link rel=File-List href="SketHO_files/filelist.xml">
<link rel=Edit-Time-Data href="SketHO_files/editdata.mso">
<title> </title>
<o:SmartTagType namespaceuri="urn:schemas-microsoft-com:office:smarttags"
 name="place"/>
<o:SmartTagType namespaceuri="urn:schemas-microsoft-com:office:smarttags"
 name="City"/>

<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Verdana;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:536871559 0 0 0 415 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
a:link, span.MsoHyperlink
	{color:blue;
	text-decoration:underline;
	text-underline:single;}
a:visited, span.MsoHyperlinkFollowed
	{color:purple;
	text-decoration:underline;
	text-underline:single;}
p
	{mso-margin-top-alt:auto;
	margin-right:0in;
	mso-margin-bottom-alt:auto;
	margin-left:0in;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
@page Section1
	{size:8.5in 14.0in;
	margin:28.1pt 84.95pt 28.1pt 84.95pt;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
-->
</style>

</head>

<body lang=EN-US link=blue vlink=purple style='tab-interval:.5in' onLoad="printDiv('printableArea')">

<div id="printableArea">

<div class=Section1>

<div align=center>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="100%"
 style='width:100.0%;mso-cellspacing:0in;mso-padding-alt:0in 0in 0in 0in'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
  <td width="18%" style='width:18.0%;padding:0in 0in 0in 0in'>
  <p align=center style='text-align:center'>
   <img src="../images/logo4.jpg" border="0" />
  </p>
  </td>
  <td width="82%" style='width:82.0%;padding:0in 0in 0in 0in'>
  <p align=center style='text-align:center'><b><span style='font-family:Verdana;
  letter-spacing:2.0pt'>PEMERINTAH <st1:place w:st="on"><st1:City w:st="on">KOTA</st1:City></st1:place>
  BONTANG</span></b><span style='font-family:Verdana'><br>
  </span><b><span style='font-size:18.0pt;letter-spacing:5.25pt'>BADAN PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL</span></b><b><span style='font-size:18.0pt;font-family:
  Verdana'><br>
  </span></b><span style='font-size:10.0pt;font-family:Verdana'>Jl. Mt. Haryono
  No 31 Telp (0548) 20594 Fax (0548) 20598<br>
  Website :http://kpt.bontang.go.id , Email <u>: <a
  href="mailto:layanan@kpt.bontang.go.id"><span style='color:windowtext'>layanan@kpt.bontang.go.id</span></a></u></span></p>
  </td>
 </tr>
</table>

</div>

<div class=MsoNormal align=center style='text-align:center'>

<hr size=1 width="100%" align=center>

</div>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<table class=MsoNormalTable border=0 cellpadding=0 width="100%"
 style='width:100.0%;mso-cellspacing:1.5pt;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width="100%" colspan=2 style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
  <p align=center style='text-align:center'><b><u><span style='font-size:18.0pt'>S
  U R A T&nbsp; K E T E R A N G A <st1:place w:st="on">N<br>
          <span style='font-size:13.5pt;font-weight:normal;text-decoration:none;
   text-underline:none'>NOMOR</span></st1:place><span style='font-size:13.5pt;
  font-weight:normal;text-decoration:none;text-underline:none'> : 503/ _____/BPPM</span></span></u></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width="100%" colspan=2 style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal style='margin-bottom:12.0pt'><o:p>&nbsp;</o:p></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2'>
  <td width="100%" colspan=2 style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
  <div align=center>
  <table class=MsoNormalTable border=0 cellpadding=0 width="86%"
   style='width:86.68%;mso-cellspacing:1.5pt;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:16.1pt'>
    <td width="99%" colspan=3 style='width:99.22%;padding:.75pt .75pt .75pt .75pt;
    height:16.1pt'>
    <p>Yang bertanda tangan dibawah ini, &nbsp; dengan ini menerangkan :</p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1;height:19.15pt'>
    <td width="24%" style='width:24.62%;padding:.75pt .75pt .75pt .75pt;
    height:19.15pt'>
    <p class=MsoNormal><o:p>&nbsp;</o:p></p>
    </td>
    <td width="2%" style='width:2.98%;padding:.75pt .75pt .75pt .75pt;
    height:19.15pt'>
    <p class=MsoNormal><o:p>&nbsp;</o:p></p>
    </td>
    <td width="70%" style='width:70.82%;padding:.75pt .75pt .75pt .75pt;
    height:19.15pt'>
    <p class=MsoNormal><o:p>&nbsp;</o:p></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2;height:21.45pt'>
    <td width="24%" valign=top style='width:24.62%;padding:.75pt .75pt .75pt .75pt;
    height:21.45pt'>
    <p style='line-height:150%'>Nama</p>
    </td>
    <td width="2%" valign=top style='width:2.98%;padding:.75pt .75pt .75pt .75pt;
    height:21.45pt'>
    <p style='line-height:150%'>:</p>
    </td>
    <td width="70%" valign=top style='width:70.82%;padding:.75pt .75pt .75pt .75pt;
    height:21.45pt'>
    <p style='line-height:150%'><b><?php echo $x_pemohon;?></b></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:3;height:6.15pt'>
    <td width="24%" valign=top style='width:24.62%;padding:.75pt .75pt .75pt .75pt;
    height:6.15pt'>
    <p style='mso-line-height-alt:6.0pt'>Pekerjaan</p>
    </td>
    <td width="2%" valign=top style='width:2.98%;padding:.75pt .75pt .75pt .75pt;
    height:6.15pt'>
    <p style='mso-line-height-alt:6.0pt'>:</p>
    </td>
    <td width="70%" valign=top style='width:70.82%;padding:.75pt .75pt .75pt .75pt;
    height:6.15pt'>
    <p style='mso-line-height-alt:6.0pt'><b><?php echo $x_pekerjaan;?></b></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:4;height:29.1pt'>
    <td width="24%" valign=top style='width:24.62%;padding:.75pt .75pt .75pt .75pt;
    height:29.1pt'>
    <p style='line-height:150%'>Nama Perusahaan&nbsp;</p>
    </td>
    <td width="2%" valign=top style='width:2.98%;padding:.75pt .75pt .75pt .75pt;
    height:29.1pt'>
    <p style='line-height:150%'>:</p>
    </td>
    <td width="70%" valign=top style='width:70.82%;padding:.75pt .75pt .75pt .75pt;
    height:29.1pt'>
    <p style='line-height:150%'><b><?php echo $x_perusahaan;?></b></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:5;height:7.65pt'>
    <td width="24%" valign=top style='width:24.62%;padding:.75pt .75pt .75pt .75pt;
    height:7.65pt'>
    <p style='mso-line-height-alt:7.5pt'>Jenis Usaha</p>
    </td>
    <td width="2%" valign=top style='width:2.98%;padding:.75pt .75pt .75pt .75pt;
    height:7.65pt'>
    <p style='mso-line-height-alt:7.5pt'>:</p>
    </td>
    <td width="70%" valign=top style='width:70.82%;padding:.75pt .75pt .75pt .75pt;
    height:7.65pt'>
    <p style='mso-line-height-alt:7.5pt'><b><?php echo $x_usaha;?></b></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:6;height:7.65pt'>
    <td width="24%" valign=top style='width:24.62%;padding:.75pt .75pt .75pt .75pt;
    height:7.65pt'>
    <p style='mso-line-height-alt:7.5pt'>Alamat</p>
    </td>
    <td width="2%" valign=top style='width:2.98%;padding:.75pt .75pt .75pt .75pt;
    height:7.65pt'>
    <p style='mso-line-height-alt:7.5pt'>:</p>
    </td>
    <td width="70%" valign=top style='width:70.82%;padding:.75pt .75pt .75pt .75pt;
    height:7.65pt'>
    <p style='mso-line-height-alt:7.5pt'><b><?php echo $x_alamat;?></b></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:7;height:17.6pt'>
    <td width="24%" style='width:24.62%;padding:.75pt .75pt .75pt .75pt;
    height:17.6pt'>
    <p class=MsoNormal><o:p>&nbsp;</o:p></p>
    </td>
    <td width="2%" style='width:2.98%;padding:.75pt .75pt .75pt .75pt;
    height:17.6pt'>
    <p class=MsoNormal><o:p>&nbsp;</o:p></p>
    </td>
    <td width="70%" style='width:70.82%;padding:.75pt .75pt .75pt .75pt;
    height:17.6pt'>
    <p class=MsoNormal><o:p>&nbsp;</o:p></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:8;height:45.2pt'>
    <td width="99%" colspan=3 style='width:99.22%;padding:.75pt .75pt .75pt .75pt;
    height:45.2pt'>
    <p>Bahwa Surat Ijin Gangguan Hinder Ordonantie/HO yang bersangkutan <b><u>masih
    dalam proses.</u></b> </p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:9;height:.75pt'>
    <td width="99%" colspan=3 style='width:99.22%;padding:.75pt .75pt .75pt .75pt;
    height:.75pt'>
    <p class=MsoNormal><span style='font-size:1.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:10;height:37.5pt'>
    <td width="99%" colspan=3 style='width:99.22%;padding:.75pt .75pt .75pt .75pt;
    height:37.5pt'>
    <p>Surat keterangan ini diberikan xPeruntukan hanya berlaku selama 2(dua) 
                  minggu terhitung mulai tanggal<b>&nbsp; <u><?php echo $x_today;?> s/d <?php echo $x_berlaku;?> 
                  .</u></b> </p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:11;height:.75pt'>
    <td width="99%" colspan=3 style='width:99.22%;padding:.75pt .75pt .75pt .75pt;
    height:.75pt'>
    <p class=MsoNormal><span style='font-size:1.0pt;mso-bidi-font-size:12.0pt'><o:p>&nbsp;</o:p></span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:12;mso-yfti-lastrow:yes;height:59.75pt'>
    <td width="99%" colspan=3 style='width:99.22%;padding:.75pt .75pt .75pt .75pt;
    height:59.75pt'>
    <p style='margin-bottom:12.0pt'>Demikian Surat Keterangan ini dibuat untuk
    dapat dipergunakan sebagaimana mestinya.&nbsp;&nbsp;<br style='mso-special-character:
    line-break'>
    <![if !supportLineBreakNewLine]><br style='mso-special-character:line-break'>
    <![endif]></p>
    </td>
   </tr>
  </table>
  </div>
  <p class=MsoNormal align=center style='text-align:center'><o:p></o:p></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3'>
  <td width="54%" style='width:54.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  </td>
  <td width="46%" style='width:46.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal>Ditetapkan di&nbsp;&nbsp; : Bontang</p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4'>
  <td width="54%" style='width:54.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  </td>
  <td width="46%" style='width:46.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><u>Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  :&nbsp;<?php echo $x_today;?></u></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:5'>
  <td width="54%" style='width:54.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  </td>
  <td width="46%" style='width:46.0%;padding:.75pt .75pt .75pt .75pt'>
  <p>
  <?php echo $x_jabatan;?> </p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:6'>
  <td width="54%" style='width:54.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  </td>
    <td width="46%" style='width:46.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:7'>
  <td width="54%" style='width:54.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  </td>
  <td width="46%" style='width:46.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:8'>
  <td width="54%" style='width:54.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  </td>
  <td width="46%" style='width:46.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal>&nbsp; </p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:9'>
  <td width="54%" style='width:54.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  </td>
  <td width="46%" style='width:46.0%;padding:.75pt .75pt .75pt .75pt'>
  <p><b><u><?php echo $x_pejabat;?> </u></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:10'>
  <td width="54%" style='width:54.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  </td>
  <td width="46%" style='width:46.0%;padding:.75pt .75pt .75pt .75pt'>
  <p>NIP. <?php echo $x_NIP;?></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:11'>
  <td width="54%" style='width:54.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  </td>
  <td width="46%" style='width:46.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:12;mso-yfti-lastrow:yes'>
  <td width="54%" style='width:54.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  </td>
  <td width="46%" style='width:46.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  </td>
 </tr>
</table>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

</div>

</div>

</body>

</html>

<?php
	}else if($jenis=="bukti"){
		
		$data_permohonan_list = $this->Permohonan_cetak_model->get_detil_permohonan($id);
		$data_ho_list = $this->Ho_cetak_sk_model->get_detil_ho($id);
		$data_perusahaan_list = $this->Ho_cetak_sk_model->get_detil_data_perusahaan($data_ho_list->perusahaan_id);
		
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
				<br> BUKTI PENERIMAAN DOKUMEN SITU/HO <br /> BADAN PELAYANAN
					PERIJINAN TERPADU DAN PENANAMAN MODAL <br> KOTA BONTANG <br> Telp.
							(0548) 20594 ; Fax. (0548) 20598 
			
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
						<td width="71%"><?php echo $data_perusahaan_list->nama; ?></td>
					</tr>
					<tr valign="top">
						<td height="30">Nama Direktur</td>
						<td align="center">:</td>
						<td><?php echo $data_permohonan_list->nama; ?></td>
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
						<td><?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglpermohonan); ?></td>
					</tr>
					<tr valign="top">
						<td height="30">Perkiraan Selesai</td>
						<td align="center">:</td>
						<td><?php echo $this->Permohonan_cetak_model->get_tgl_selesai(2);?>&nbsp;</td>
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
			<td colspan="3" align="right" style="padding-right: 5px"><?php echo $this->Permohonan_cetak_model->get_no_form(4); ?>
			</td>
		</tr>
	</table>
</div>
</body>
</html>

<?php
	}else if($jenis=="survei"){

		$ho_list = $this->Ho_cetak_sk_model->get_detil_ho($id);
		$permohonan_list = $this->Ho_cetak_sk_model->get_detil("permohonan",$ho_list->permohonan_id);
		$pemohon_list = $this->Ho_cetak_sk_model->get_detil("pemohon",$permohonan_list->pemohon_id);
		$perusahaan_list = $this->Ho_cetak_sk_model->get_detil("perusahaan",$ho_list->perusahaan_id);	
		
		$reklame_list = $this->Permohonan_cetak_model->get_reklame($ho_list->id);
		$ttd_list = $this->Ho_cetak_sk_model->get_detil("tandatangan",15);
		$x_pemohon = $pemohon_list->nama;
		$x_perusahaan = $perusahaan_list->nama;
		$x_usaha = $perusahaan_list->usaha;
		$x_alamat = $perusahaan_list->alamat;
		if ($this->String_model->IsEmpty($perusahaan_list->rt)==false)
			$x_alamat.=" RT. ".$perusahaan_list->rt;
		if ($this->String_model->IsEmpty($perusahaan_list->rw)==false)
			$x_alamat.=" RW. ".$perusahaan_list->rw;
		if ($perusahaan_list->desa_id!=""){
			$desa_list = $this->Ho_cetak_sk_model->get_detil("desa",$perusahaan_list->desa_id);
			$x_alamat.=" ".ucfirst(strtolower($desa_list->desa));
		}
		if ($perusahaan_list->kecamatan_id!=""){
			$kecamatan_list = $this->Ho_cetak_sk_model->get_detil("kecamatan",$perusahaan_list->kecamatan_id);	
			$x_alamat.=" ".ucwords(strtolower($kecamatan_list->kecamatan));
		}
		/*
		$indeks_lokasi_list = $this->Ho_cetak_sk_model->get_detil("indekslokasi",$ho_list->indekslokasi_id);
		$x_ilokasi = $indeks_lokasi_list->lokasi." (".$indeks_lokasi_list->nilai.")";
		$indeks_gangguan_list = $this->Ho_cetak_sk_model->get_detil("indeksgangguan",$ho_list->indeksgangguan_id);
		$x_igangguan = $indeks_gangguan_list->gangguan." (".$indeks_gangguan_list->nilai.")";
		*/
		if($reklame_list!=NULL) {
			$count = 0;
			$reklame_detil_by_permohonan_id_list = $this->Permohonan_cetak_model->get_reklame_detil_by_permohonan_id($reklame_list->permohonan_id);
			foreach($reklame_detil_by_permohonan_id_list as $val_reklame_detil_by_permohonan_id){
				$count++;
				$reklame_detil_list = $this->Ho_cetak_sk_model->get_detil("reklamedetail",$val_reklame_detil_by_permohonan_id);
				$x_ukuran = "";
				if ($count==1)
					$x_ukuran.=" ".$reklame_detil_list->ukuran;
				else
					$x_ukuran.=" , ".$reklame_detil_list->ukuran;
			}
		}else{
			$x_ukuran = "";
		}
		$x_atas_nama = $ttd_list->atasnama!=""?$ttd_list->atasnama:"";
		$x_jabatan = $ttd_list->jabatan!=""?$ttd_list->jabatan:"";
		$x_pejabat = $ttd_list->pejabat!=""?$ttd_list->pejabat:"";
		$x_pangkat = $ttd_list->pangkat!=""?$ttd_list->pangkat:"";
		$x_NIP = $ttd_list->nip!=""?$ttd_list->nip:"";
		
?>

<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:st1="urn:schemas-microsoft-com:office:smarttags"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=us-ascii">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 11">
<meta name=Originator content="Microsoft Word 11">
<link rel=File-List href="SurveiHO_files/filelist.xml">
<link rel=Edit-Time-Data href="SurveiHO_files/editdata.mso">
<title> </title>
<o:SmartTagType namespaceuri="urn:schemas-microsoft-com:office:smarttags"
 name="place"/>
<o:SmartTagType namespaceuri="urn:schemas-microsoft-com:office:smarttags"
 name="City"/>
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Verdana;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:536871559 0 0 0 415 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
a:link, span.MsoHyperlink
	{color:blue;
	text-decoration:underline;
	text-underline:single;}
a:visited, span.MsoHyperlinkFollowed
	{color:purple;
	text-decoration:underline;
	text-underline:single;}
p
	{mso-margin-top-alt:auto;
	margin-right:0in;
	mso-margin-bottom-alt:auto;
	margin-left:0in;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
@page Section1
	{size:8.5in 11.0in;
	margin:28.35pt 85.05pt 28.35pt 85.05pt;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
span.GramE1 {mso-style-name:"";
	mso-gram-e:yes;}
-->
</style>

</head>

<body lang=EN-US link=blue vlink=purple style='tab-interval:.5in' onLoad="printDiv('printableArea')">

<div id="printableArea">

<div class=Section1>

<div align=center>

<table class=MsoNormalTable border=0 cellpadding=0 width=720 style='width:7.5in;
 mso-cellspacing:1.5pt;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
  <div align=center>
  <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="95%"
   style='width:95.0%;mso-cellspacing:0in;mso-padding-alt:0in 0in 0in 0in'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
    <td width="18%" style='width:18.0%;padding:0in 0in 0in 0in'>
    <img src="../images/logo4.jpg" border="0" /></p>    </td>
    <td width="82%" style='width:82.0%;padding:0in 0in 0in 0in'>
    <p align=center style='text-align:center'><b><span style='font-family:Verdana;
    letter-spacing:2.0pt'>PEMERINTAH <st1:place w:st="on"><st1:City w:st="on">KOTA</st1:City></st1:place>
    BONTANG</span></b><span style='font-family:Verdana'><br>
    </span><b><span style='font-size:18.0pt;letter-spacing:1.5pt'>TIM KELAYAKAN
    IZIN GANGGUAN/HO</span></b><b><span style='font-size:18.0pt;font-family:
    Verdana'><br>
    </span></b><span style='font-size:10.0pt;font-family:Verdana'>Jl. Mt.
    Haryono No 31 Telp (0548) 20594 Fax (0548) 20598</span></p></td>
   </tr>
  </table>
  </div>
  <p class=MsoNormal align=center style='text-align:center'><o:p></o:p></p>
  <hr></td>
 </tr>
 <tr style='mso-yfti-irow:3;mso-yfti-lastrow:yes'>
  <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
  <table class=MsoNormalTable border=0 cellpadding=0 width="100%"
   style='width:100.0%;mso-cellspacing:1.5pt;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <p align=center style='text-align:center'><b><u>BERITA ACARA PEMERIKSAAN
    LOKASI IZIN GANGGUAN HO</u></b></p>    </td>
   </tr>
   <tr style='mso-yfti-irow:1'>
    <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal><o:p>&nbsp;</o:p></p>    </td>
   </tr>
   <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes'>
    <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <table class=MsoNormalTable border=0 cellpadding=0 width="100%"
     style='width:100.0%;mso-cellspacing:0.5pt;mso-padding-alt:0in 5.4pt 0in 5.4pt'
     height=941>
     <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:30.0pt'>
      <td width="100%" height="40" colspan=4 style='width:100.0%;padding:.75pt .75pt .75pt .75pt;
      height:30.0pt'>
      <p>Pada hari <span class=GramE>ini .................</span>
      tanggal....... bulan................... tahun .........kami yang bertanda
      tangan dibawah ini masing-masing :</p>      </td>
     </tr>
	 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:3.0pt'>
      <td width="100%" height="215" colspan=4 style='width:100.0%;padding:.75pt .75pt .75pt .75pt;
      height:3.0pt'>
      <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
       width="90%" style='width:90.0%;mso-cellspacing:0in;border:outset black 1.0pt;
       mso-border-alt:outset black .75pt;mso-padding-alt:3.75pt 3.75pt 3.75pt 3.75pt'
       bordercolordark="#ffffff">
                        <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'> 
                          <td width="5%" style='width:5.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>No</p></td>
                          <td width="31%" style='width:31.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>Nama</p></td>
                          <td width="42%" style='width:42.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>Instansi 
                              / Jabatan</p></td>
                          <td width="22%" style='width:22.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>Tanda 
                              Tangan</p></td>
                        </tr>
                        <tr style='mso-yfti-irow:1'> 
                          <td width="5%" style='width:5.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>1.</p></td>
                          <td width="31%" style='width:31.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>&nbsp;</p></td>
                          <td width="42%" style='width:42.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>Staf 
                              BPPM </p></td>
                          <td width="22%" style='width:22.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>&nbsp;</p></td>
                        </tr>
                        <tr style='mso-yfti-irow:3'> 
                          <td width="5%" style='width:5.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>2.</p></td>
                          <td width="31%" style='width:31.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>&nbsp;</p></td>
                          <td width="42%" style='width:42.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>Staf 
                              Bagian Pemerintahan Kecamatan</p></td>
                          <td width="22%" style='width:22.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>&nbsp;</p></td>
                        </tr>
                        <tr style='mso-yfti-irow:4'> 
                          <td width="5%" style='width:5.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>3.</p></td>
                          <td width="31%" style='width:31.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>&nbsp;</p></td>
                          <td width="42%" style='width:42.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>Staf 
                              Dinas Pendapatan, Pengelolaan Keuangan dan Aset 
                              (DPPKA) </p></td>
                          <td width="22%" style='width:22.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>&nbsp;</p></td>
                        </tr>
                        <tr style='mso-yfti-irow:5;mso-yfti-lastrow:yes'> 
                          <td width="5%" style='width:5.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>4.</p></td>
                          <td width="31%" style='width:31.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal><?php echo $x_pemohon;?></p></td>
                          <td width="42%" style='width:42.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal>Pemohon</p></td>
                          <td width="22%" style='width:22.0%;border:inset black 1.0pt;mso-border-alt:
        inset black .75pt;padding:3.75pt 3.75pt 3.75pt 3.75pt'> <p class=MsoNormal></td>
                        </tr>
                    </table></td>
     </tr>
     <tr style='mso-yfti-irow:4;height:15.75pt'>
      <td width="100%" colspan=4 style='width:100.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Telah melaksanakan pemeriksaan lokasi yang dimohon untuk mendapatkan
      izin Gangguan HO sebagai berikut :      </p>      </td>
     </tr>
     
     <tr style='mso-yfti-irow:6;height:15.75pt'>
      <td width="100%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>1. </p>      </td>
      <td width="24%" style='width:24.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Nama Perusahaan</p>      </td>
      <td width="2%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>      </td>
      <td width="78%" style='width:78.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><?php echo $x_perusahaan;?></p>      </td>
     </tr>
     <tr style='mso-yfti-irow:7;height:15.75pt'>
      <td width="100%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>2. </p>      </td>
      <td width="24%" style='width:24.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Alamat Perusahaan</p>      </td>
      <td width="2%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>      </td>
      <td width="78%" style='width:78.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><?php echo $x_alamat;?></p>      </td>
     </tr>
     <tr style='mso-yfti-irow:8;height:15.75pt'>
      <td width="100%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>3. </p>      </td>
      <td width="24%" style='width:24.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Nama Penanggung Jawab</p>      </td>
      <td width="2%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>      </td>
      <td width="78%" style='width:78.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><?php echo $x_pemohon;?></p>      </td>
     </tr>
     <tr style='mso-yfti-irow:9;height:15.75pt'>
      <td width="100%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>4. </p>      </td>
      <td width="24%" style='width:24.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Jenis Kegiatan Usaha</p>      </td>
      <td width="2%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>      </td>
      <td width="78%" style='width:78.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><?php echo $x_usaha;?></p>      </td>
     </tr>
     <tr style='mso-yfti-irow:10;height:15.75pt'>
      <td width="100%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>5. </p>      </td>
      <td width="24%" style='width:24.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Luas Tempat Usaha</p>      </td>
      <td width="2%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>      </td>
      <td width="78%" style='width:78.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      M<sup>2</sup>.</p>      </td>
     </tr>
     <tr style='mso-yfti-irow:11;height:15.75pt'>
      <td width="100%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>6. </p>      </td>
      <td width="24%" style='width:24.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Indeks Lokasi</p>      </td>
      <td width="2%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>      </td>
      <td width="78%" style='width:78.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>&nbsp;</p>      </td>
     </tr>
     <tr style='mso-yfti-irow:12;height:15.75pt'>
      <td width="100%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>7. </p>      </td>
      <td width="24%" style='width:24.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Indeks Gangguan</p>      </td>
      <td width="2%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>      </td>
      <td width="78%" style='width:78.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>&nbsp;</p>      </td>
     </tr>
     <tr style='mso-yfti-irow:13;height:15.75pt'>
      <td width="100%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>8. </p>      </td>
      <td width="24%" style='width:24.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Ukuran Reklame</p>      </td>
      <td width="2%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>      </td>
      <td width="78%" style='width:78.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><?php echo $x_ukuran;?></p>      </td>
     </tr>
     <tr style='mso-yfti-irow:15;height:15.75pt'>
      <td width="100%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>9. </p>      </td>
      <td width="24%" style='width:24.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Tarif</p>      </td>
      <td width="2%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>      </td>
      <td width="78%" style='width:78.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal><o:p>&nbsp;</o:p></p>      </td>
     </tr>
     <tr style='mso-yfti-irow:16;height:15.75pt'>
      <td width="100%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>10. </p>      </td>
      <td width="24%" style='width:24.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Total Biaya</p>      </td>
      <td width="2%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>      </td>
      <td width="78%" style='width:78.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal><o:p>&nbsp;</o:p></p>      </td>
     </tr>
     <tr style='mso-yfti-irow:18;height:27.0pt'>
      <td width="100%" colspan=4 style='width:100.0%;padding:.75pt .75pt .75pt .75pt;
      height:2.0pt'>
      <p align=center style='text-align:center'><b><span style='text-transform:
      uppercase'>KONDISI LAPANGAN :</span> </b></p>      </td>
     </tr>
     <tr style='mso-yfti-irow:19;height:5.75pt'>
      <td width="100%" colspan=4 style='width:100.0%;padding:.75pt .75pt .75pt .75pt;
      height:5.75pt'>
      <p><span class=GramE>1.
      ...............................................................</span> </p>      </td>
     </tr>
     <tr style='mso-yfti-irow:20;height:15.75pt'>
      <td width="100%" colspan=4 style='width:100.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><span class=GramE>2.
      ...............................................................</span> </p>      </td>
     </tr>
	 <tr style='mso-yfti-irow:20;height:15.75pt'>
      <td width="100%" colspan=4 style='width:100.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><span class=GramE>3.
      ...............................................................</span> </p>      </td>
     </tr>
	 <tr style='mso-yfti-irow:20;height:15.75pt'>
      <td width="100%" colspan=4 style='width:100.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><span class=GramE>4.
      ...............................................................</span> </p>      </td>
     </tr>
	 <tr style='mso-yfti-irow:18;height:27.0pt'>
      <td width="100%" colspan=4 style='width:100.0%;padding:.75pt .75pt .75pt .75pt;
      height:2.0pt'>
      <p align=center style='text-align:center'><b><span style='text-transform:
      uppercase'>KESIMPULAN TIM SURVEY LAPANGAN :</span> </b></p>      </td>
     </tr>
     <tr style='mso-yfti-irow:21;height:15.75pt'>
      <td width="100%" colspan=4 style='width:100.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><span class=GramE>..............................................................</span><span class=GramE>...................................................................................................</span></p>      </td>
     </tr>
     <tr style='mso-yfti-irow:22;height:15.75pt'>
      <td width="100%" colspan=4 style='width:100.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>..............................................................<span class=GramE>...................................................................................................</span></p>      </td>
     </tr>
	 <tr style='mso-yfti-irow:22;height:15.75pt'>
      <td width="100%" height="242" colspan=4 style='width:100.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>      <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><p align=center style='text-align:center'>Mengetahui<br>
             <?php echo $x_atas_nama;?><br>
        	<?php echo $x_jabatan;?>, <br>
            </p>
              <p align=center style='text-align:center'><br>
                  <br>
                  <span class=GramE1><u><?php echo $x_pejabat;?></u></span><u> </u><br>
        NIP. <?php echo $x_NIP;?> </p></td>
        </tr>
      </table></td>
     </tr>
    </table>
    <p class=MsoNormal><o:p></o:p></p>    </td>
   </tr>
  </table>
  <p class=MsoNormal><o:p></o:p></p>  </td>
 </tr>
</table>

</div>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

</div>

</div>
</body>
</html>


<?php
	}else if($jenis=="hasil_survei"){

		$ho_list = $this->Ho_cetak_sk_model->get_detil_ho($id);
		$permohonan_list = $this->Ho_cetak_sk_model->get_detil("permohonan",$ho_list->permohonan_id);
		$pemohon_list = $this->Ho_cetak_sk_model->get_detil("pemohon",$permohonan_list->pemohon_id);
		$perusahaan_list = $this->Ho_cetak_sk_model->get_detil("perusahaan",$ho_list->perusahaan_id);	
		
		$ttd_list = $this->Ho_cetak_sk_model->get_detil("tandatangan",16);
		$reklame_list = $this->Permohonan_cetak_model->get_reklame($ho_list->id);
		
		if ($permohonan_list->nosk!="")
			$x_nosk = $permohonan_list->nosk;
		else
			$x_nosk = "";
		
		$x_pemohon = $pemohon_list->nama;
		$x_perusahaan = $perusahaan_list->nama;
		$x_usaha = $perusahaan_list->usaha;
		$x_alamat = $perusahaan_list->alamat;
		if ($this->String_model->IsEmpty($perusahaan_list->rt)==false)
			$x_alamat.=" RT. ".$perusahaan_list->rt;
		if ($this->String_model->IsEmpty($perusahaan_list->rw)==false)
			$x_alamat.=" RW. ".$perusahaan_list->rw;
		if ($perusahaan_list->desa_id!=""){
			$desa_list = $this->Ho_cetak_sk_model->get_detil("desa",$perusahaan_list->desa_id);	
			$x_alamat.=" ".ucfirst(strtolower($desa_list->desa));
		}
		if ($perusahaan_list->kecamatan_id!=""){
			$kecamatan_list = $this->Ho_cetak_sk_model->get_detil("kecamatan",$perusahaan_list->kecamatan_id);	
			$x_alamat.=" ".ucwords(strtolower($kecamatan_list->kecamatan));
		}
		
		$indeks_lokasi_list = $this->Ho_cetak_sk_model->get_detil("indekslokasi",$ho_list->indekslokasi_id);
		if(!empty($indeks_lokasi_list)){
			$x_ilokasi = $indeks_lokasi_list->lokasi." (".$indeks_lokasi_list->nilai.")";
		}else{
			$x_ilokasi = 0;	
		}
		$indeks_gangguan_list = $this->Ho_cetak_sk_model->get_detil("indeksgangguan",$ho_list->indeksgangguan_id);
		if(!empty($indeks_gangguan_list)){
			$x_gangguan = $indeks_gangguan_list->gangguan." (".$indeks_gangguan_list->nilai.")";
		}else{
			$x_gangguan = 0;
		}

		if($reklame_list!=NULL) {
			$count = 0;
			$reklame_detil_by_permohonan_id_list = $this->Permohonan_cetak_model->get_reklame_detil_by_permohonan_id($reklame_list->permohonan_id);
			foreach($reklame_detil_by_permohonan_id_list as $val_reklame_detil_by_permohonan_id){
				$count++;
				$reklame_detil_list = $this->Ho_cetak_sk_model->get_detil("reklamedetail",$val_reklame_detil_by_permohonan_id);
				$x_ukuran = "";
				if ($count==1)
					$x_ukuran.=" ".$reklame_detil_list->ukuran;
				else
					$x_ukuran.=" , ".$reklame_detil_list->ukuran;
			}
		}else{
			$x_ukuran = "";
		}		
		

		$sql = "	select	tarif 
					from	retjusaha 
					where	jusaha_id = ".$perusahaan_list->jusaha_id." 
							and bmin <= ".$ho_list->luas." 
							and bmax >= ".$ho_list->luas;
		$records_tarif = $this->db->query($sql);
		$result_tarif = $records_tarif->row();
		if($result_tarif->tarif!="")
			$x_tarif = $result_tarif->tarif;
		else
			$x_tarif = 0;
	
		if ($ho_list->tglsurvey!=""){
			$x_tgl_survey = $this->String_model->DateTimeDivision("d",$ho_list->tglsurvey)." ".ucfirst($this->String_model->cIndMnth($this->String_model->DateTimeDivision("n",$ho_list->tglsurvey)))." ".$this->String_model->DateTimeDivision("Y",$ho_list->tglsurvey);
		}else{
			$x_tgl_survey = "";
		}
	
		$x_luas = $ho_list->luas;
		$x_telp = $perusahaan_list->telp;
		$x_atas_nama =$ttd_list->atasnama!=""?$ttd_list->atasnama:"";
		$x_jabatan = $ttd_list->jabatan!=""?$ttd_list->jabatan:"";
		$x_pejabat = $ttd_list->pejabat!=""?$ttd_list->pejabat:"";
		$x_pangkat = $ttd_list->pangkat!=""?$ttd_list->pangkat:"";
		$x_NIP = $ttd_list->nip!=""?$ttd_list->nip:"";		
		
?>

<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:st1="urn:schemas-microsoft-com:office:smarttags"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=us-ascii">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 11">
<meta name=Originator content="Microsoft Word 11">
<link rel=File-List href="LaporanSurveiHO_files/filelist.xml">
<link rel=Edit-Time-Data href="LaporanSurveiHO_files/editdata.mso">
<title> </title>
<o:SmartTagType namespaceuri="urn:schemas-microsoft-com:office:smarttags"
 name="place"/>
<o:SmartTagType namespaceuri="urn:schemas-microsoft-com:office:smarttags"
 name="City"/>
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Verdana;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:536871559 0 0 0 415 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
a:link, span.MsoHyperlink
	{color:blue;
	text-decoration:underline;
	text-underline:single;}
a:visited, span.MsoHyperlinkFollowed
	{color:purple;
	text-decoration:underline;
	text-underline:single;}
p
	{mso-margin-top-alt:auto;
	margin-right:0in;
	mso-margin-bottom-alt:auto;
	margin-left:0in;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
@page Section1
	{size:8.5in 14.0in;
	margin:28.35pt 56.7pt 28.35pt 56.7pt;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
-->
</style>
</head>

<body lang=EN-US link=blue vlink=purple style='tab-interval:.5in' onLoad="printDiv('printableArea')">

<div id="printableArea">

<div class=Section1>

<div align=center>

<table class=MsoNormalTable border=0 cellpadding=0 width=690 style='width:517.5pt;
 mso-cellspacing:1.5pt;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
  <div align=center>
  <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="100%"
   style='width:100.0%;mso-cellspacing:0in;mso-padding-alt:0in 0in 0in 0in'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
    height:62.25pt'>
    <td width="18%" style='width:18.0%;padding:0in 0in 0in 0in;height:62.25pt'>
    <p align=center style='text-align:center'> <img src="../images/logo4.jpg" border="0" /></p>
    </td>
    <td width="82%" style='width:82.0%;padding:0in 0in 0in 0in;height:62.25pt'>
    <p align=center style='text-align:center'><b><span style='font-family:Verdana;
    letter-spacing:2.0pt'>PEMERINTAH <st1:place w:st="on"><st1:City w:st="on">KOTA</st1:City></st1:place>
    BONTANG</span></b><span style='font-family:Verdana'><br>
    </span><b><span style='font-size:18.0pt;letter-spacing:5.25pt'>BADAN PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL</span></b><b><span style='font-size:18.0pt;font-family:
    Verdana'><br>
    </span></b><span style='font-size:10.0pt;font-family:Verdana'>Jl. Mt.
    Haryono No 31 Telp (0548) 20594 Fax (0548) 20598<br>
    Website :http://kpt.bontang.go.id , Email : <a
    href="mailto:layanan@kpt.bontang.go.id"><span style='color:windowtext;
    text-decoration:none;text-underline:none'>layanan@kpt.bontang.go.id</span></a></span></p>
    </td>
   </tr>
  </table>
  </div>
  <p class=MsoNormal align=center style='text-align:center'><o:p></o:p></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
  <div class=MsoNormal align=center style='text-align:center'>
  <hr size=1 width="100%" align=center>
  </div>
  <p class=MsoNormal align=center style='text-align:center'></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2'>
  <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
  <p class=MsoNormal><o:p>&nbsp;</o:p></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3;mso-yfti-lastrow:yes'>
  <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
  <table class=MsoNormalTable border=0 cellpadding=0 width="100%"
   style='width:100.0%;mso-cellspacing:1.5pt;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
    <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <p align=center style='text-align:center'><b><u>LAPORAN HASIL PENINJAUAN
    LAPANGAN</u></b></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1'>
    <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <table class=MsoNormalTable border=0 cellpadding=0 width="100%"
     style='width:100.0%;mso-cellspacing:1.5pt;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
     <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
      <td width="52%" style='width:52.0%;padding:.75pt .75pt .75pt .75pt'>
      <p class=MsoNormal><o:p>&nbsp;</o:p></p>
      </td>
      <td width="48%" style='width:48.0%;padding:.75pt .75pt .75pt .75pt'>
      <p class=MsoNormal><br>
      Kepada Yth.&nbsp;<br>
      Kepala Dinas Pendapatan Daerah<br>
<st1:City w:st="on"><st1:place w:st="on">Kota</st1:place></st1:City>
      Bontang&nbsp;<br>
      Di<br>
      Bontang&nbsp;</p>
      </td>
     </tr>
    </table>
    <p class=MsoNormal><o:p></o:p></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:2'>
    <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal>Nomor Surat : 503/ _____/KPT </p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:3'>
    <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal>Nomor SITU :&nbsp;<?php echo $x_nosk;?> </p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:4'>
    <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <table class=MsoNormalTable border=0 cellpadding=0 align=right width="96%"
     style='width:96.0%;mso-cellspacing:1.5pt;mso-table-lspace:2.25pt;
     mso-table-rspace:2.25pt;mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:
     column;mso-table-left:right;mso-table-top:middle;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
     <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:30.0pt'>
      <td width="28%" colspan=2 style='width:28.0%;padding:0in 5.4pt 0in 5.4pt;
      height:30.0pt'>
      <p><o:p>&nbsp;</o:p></p>
      </td>
      <td width="2%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:30.0pt'>
      <p class=MsoNormal><o:p>&nbsp;</o:p></p>
      </td>
      <td width="77%" style='width:77.0%;padding:.75pt .75pt .75pt .75pt;
      height:30.0pt'>
      <p class=MsoNormal><o:p>&nbsp;</o:p></p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:1;height:15.75pt'>
      <td width="100%" colspan=4 style='width:100.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Sehubungan dengan Surat Permohonan Baru / Perpanjangan IZIN GANGGUAN
      dari :</p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:2;height:30.0pt'>
      <td width="28%" colspan=2 style='width:28.0%;padding:0in 5.4pt 0in 5.4pt;
      height:30.0pt'>
      <p><o:p>&nbsp;</o:p></p>
      </td>
      <td width="2%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:30.0pt'>
      <p class=MsoNormal><o:p>&nbsp;</o:p></p>
      </td>
      <td width="77%" style='width:77.0%;padding:.75pt .75pt .75pt .75pt;
      height:30.0pt'>
      <p class=MsoNormal><o:p>&nbsp;</o:p></p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:3;height:15.75pt'>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>1. </p>
      </td>
      <td width="27%" valign=top style='width:27.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Nama Perusahaan</p>
      </td>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>
      </td>
      <td width="77%" valign=top style='width:77.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><?php echo $x_perusahaan;?></p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:4;height:15.75pt'>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>2. </p>
      </td>
      <td width="27%" valign=top style='width:27.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Alamat Perusahaan</p>
      </td>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>
      </td>
      <td width="77%" valign=top style='width:77.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><?php echo $x_alamat;?></p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:5;height:15.75pt'>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>3. </p>
      </td>
      <td width="27%" valign=top style='width:27.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Nama Penanggung Jawab</p>
      </td>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>
      </td>
      <td width="77%" valign=top style='width:77.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><?php echo $x_pemohon;?></p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:6;height:15.75pt'>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>4. </p>
      </td>
      <td width="27%" valign=top style='width:27.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Jenis Kegiatan Usaha</p>
      </td>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>
      </td>
      <td width="77%" valign=top style='width:77.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><?php echo $x_usaha;?> </p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:7;height:15.75pt'>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>5. </p>
      </td>
      <td width="27%" valign=top style='width:27.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Luas Tempat Usaha</p>
      </td>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>
      </td>
      <td width="77%" valign=top style='width:77.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><?php echo $x_luas;?> &nbsp;&nbsp;&nbsp;M<sup>2</sup>. </p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:8;height:15.75pt'>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>7. </p>
      </td>
      <td width="27%" valign=top style='width:27.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Telp</p>
      </td>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>
      </td>
      <td width="77%" valign=top style='width:77.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><?php echo $x_telp;?></p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:9;height:15.75pt'>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>6. </p>
      </td>
      <td width="27%" valign=top style='width:27.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Indeks Lokasi</p>
      </td>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>
      </td>
      <td width="77%" valign=top style='width:77.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><?php echo $x_ilokasi;?></p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:10;height:15.75pt'>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>7. </p>
      </td>
      <td width="27%" valign=top style='width:27.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Indeks Gangguan</p>
      </td>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>
      </td>
      <td width="77%" valign=top style='width:77.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><?php echo $x_gangguan;?></p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:11;height:15.75pt'>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p class=MsoNormal>8. </p>
      </td>
      <td width="27%" valign=top style='width:27.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>Ukuran Reklame</p>
      </td>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p>:</p>
      </td>
      <td width="77%" valign=top style='width:77.0%;padding:.75pt .75pt .75pt .75pt;
      height:15.75pt'>
      <p><?php echo $x_ukuran;?></p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:12;height:.75pt'>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:.75pt'>
      <p class=MsoNormal style='mso-line-height-alt:.75pt'>9. </p>
      </td>
      <td width="27%" valign=top style='width:27.0%;padding:.75pt .75pt .75pt .75pt;
      height:.75pt'>
      <p style='mso-line-height-alt:.75pt'>Tarif</p>
      </td>
      <td width="2%" valign=top style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:.75pt'>
      <p style='mso-line-height-alt:.75pt'>:</p>
      </td>
      <td width="77%" valign=top style='width:77.0%;padding:.75pt .75pt .75pt .75pt;
      height:.75pt'>
      <p style='mso-line-height-alt:.75pt'>Rp. <?php echo $x_tarif;?></p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:13;mso-yfti-lastrow:yes;height:30.0pt'>
      <td width="2%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:30.0pt'>
      <p><o:p>&nbsp;</o:p></p>
      </td>
      <td width="26%" style='width:26.0%;padding:.75pt .75pt .75pt .75pt;
      height:30.0pt'>
      <p class=MsoNormal><o:p>&nbsp;</o:p></p>
      </td>
      <td width="2%" style='width:2.0%;padding:.75pt .75pt .75pt .75pt;
      height:30.0pt'>
      <p class=MsoNormal><o:p>&nbsp;</o:p></p>
      </td>
      <td width="77%" style='width:77.0%;padding:.75pt .75pt .75pt .75pt;
      height:30.0pt'>
      <p class=MsoNormal><o:p>&nbsp;</o:p></p>
      </td>
     </tr>
    </table>
    <p class=MsoNormal><o:p></o:p></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:5'>
    <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal><o:p>&nbsp;</o:p></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:6'>
    <td width="100%" valign=top style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal>Dengan ini diberitahukan bahwa : </p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:7'>
    <td width="100%" valign=top style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
     width="100%" style='width:100.0%;mso-cellspacing:0in;mso-padding-alt:0in 0in 0in 0in'>
     <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
      <td width="4%" valign=top style='width:4.0%;padding:0in 0in 0in 0in'>
      <p class=MsoNormal>1.</p>
      </td>
      <td width="96%" valign=top style='width:96.0%;padding:0in 0in 0in 0in'>
      <p class=MsoNormal>Setelah diadakan penelitian terhadap lampiran -
      lampiran berupa dokumen yang merupakan persyaratan teknis dan
      administrasi.</p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
      <td width="4%" valign=top style='width:4.0%;padding:0in 0in 0in 0in'>
      <p class=MsoNormal>2.</p>
      </td>
      <td width="96%" valign=top style='width:96.0%;padding:0in 0in 0in 0in'>
      <p class=MsoNormal>Pemeriksaan di lapangan yang dilaksanakan oleh petugas
      - petugas kami pada tanggal <?php echo $x_tgl_survey;?></p>
      </td>
     </tr>
    </table>
    <p class=MsoNormal><o:p></o:p></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:8'>
    <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal><br>
    ternyata telah sesuai , dan tidak bertentangan dengan Peraturan Daerah
    Nomor 10 Tahun 2003 </p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:9'>
    <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Berkenaan dengan hal tersebut ,
    permohonan baru / perpanjangan atas nama pemohon diatas DAPAT DISETUJUI
    untuk diterbitkan Surat Ijinnya dan kepadanya dapat ditetapkan
    Pajak/Retribusi atas ijin yang bersangkutan. </p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:10'>
    <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal><o:p>&nbsp;</o:p></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:11'>
    <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <table class=MsoNormalTable border=0 cellpadding=0 width="100%"
     style='width:100.0%;mso-cellspacing:1.5pt;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
     <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
      <td width="50%" style='width:50.0%;padding:.75pt .75pt .75pt .75pt'>
      <p class=MsoNormal><o:p>&nbsp;</o:p></p>
      </td>
      <td width="50%" style='width:50.0%;padding:.75pt .75pt .75pt .75pt'>
      <p align=center style='text-align:center'>Mengetahui<br>
      <?php echo $x_atas_nama;?><br>
      <?php echo $x_jabatan;?></p>
      <p align=center style='text-align:center'><br>
      <br>
      <br>
      <span class=GramE><b><u><?php echo $x_pejabat;?></u></b></span><u><br>
      </u><b>NIP. <?php echo $x_NIP;?></b> </p>
      </td>
     </tr>
     <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
      <td width="50%" style='width:50.0%;padding:.75pt .75pt .75pt .75pt'>
      <p class=MsoNormal><o:p>&nbsp;</o:p></p>
      </td>
      <td width="50%" style='width:50.0%;padding:.75pt .75pt .75pt .75pt'>
      <p class=MsoNormal><o:p>&nbsp;</o:p></p>
      </td>
     </tr>
    </table>
    <p class=MsoNormal><o:p></o:p></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:12;mso-yfti-lastrow:yes'>
    <td width="100%" style='width:100.0%;padding:.75pt .75pt .75pt .75pt'>
    <p class=MsoNormal>Tembusan : Arsip </p>
    </td>
   </tr>
  </table>
  <p class=MsoNormal><o:p></o:p></p>
  </td>
 </tr>
</table>

</div>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

</div>

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