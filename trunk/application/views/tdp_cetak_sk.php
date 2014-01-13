<?php

	$bulan = array("1"=>"Januari","2"=>"Februari","3"=>"Maret","4"=>"April","5"=>"Mei","6"=>"Juni","7"=>"Juli","8"=>"Agustus","9"=>"September","10"=>"Oktober","11"=>"Nopember","12"=>"Desember");	
	$hariIndo = array("1"=>"Senin","2"=>"Selasa","3"=>"Rabu","4"=>"Kamis","5"=>"Jumat","6"=>"Sabtu","7"=>"Minggu");

	$id = $_GET['id'];
	$jenis = $_GET['jenis'];
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<?php
	if(($jenis=="sk")||($jenis=="skatas")){
?>
body{
font-family:Verdana, Arial, Helvetica, sans-serif;
text-align:justify;
color:#000000;
margin:55px 0px 0px 0px;
word-spacing:0;
}
.style1 {font-size:16px; font-weight:bold; word-spacing:0}
.style2 {font-size:12px;font-weight:normal}
.style3 {font-size:12px; font-weight:bold; word-spacing:0}
.style4 {font-size:12px; font-weight:bold; word-spacing:0; text-decoration:underline}
.style5 {font-size:10px; font-weight:bold; word-spacing:0}
.style6 {font-size:14px; font-weight:bold; word-spacing:0}
.style7 {font-size:14px; font-weight:bold; text-decoration:underline; word-spacing:0}
.style8 {font-size:14px; font-weight:normal; word-spacing:0}
.style9 {font-size:20px; font-weight:bold; word-spacing:0}

.lborder1{border-left:1px solid #000; padding-left:1px}
.rborder1{border-right:1px solid #000; padding-right:1px}
.bborder1{border-bottom:1px solid #000;}
.tborder1{border-top:1px solid #000;}
.lborder2{border-left:2px solid #000;}
.rborder2{border-right:2px solid #000; padding-right:2px}
.bborder2{border-bottom:2px solid #000;}
.tborder2{border-top:2px solid #000;}

<?php
	}else if($jenis=="penerimaan"){
?>
.penerimaan_style1 {padding-left:20px}
<?php
	}else if($jenis=="bap"){
?>
body{
font-family:Verdana, Arial, Helvetica, sans-serif;
text-align:justify;
color:#000000;
margin:47px 0px 0px 0px;
word-spacing:0;
}
.style1 {font-size:16px; font-weight:bold; word-spacing:0}
.style2 {font-size:12px;font-weight:normal;text-align:justify; vertical-align:top;line-height: 150%}
.style3 {font-size:12px; font-weight:bold; word-spacing:0;text-align:left;vertical-align:middle;line-height: 200%}
.style4 {font-size:12px; font-weight:bold; word-spacing:0; text-decoration:underline}
.style5 {font-size:16px; font-weight:bold; word-spacing:0; text-decoration:underline}
.style7 {font-size:11px;font-weight:normal}
.style8 {font-size:14px;font-weight:normal; }
<?php
	}else if($jenis=="bukti"){
?>
 @font-face
	{font-family:Batang;
	panose-1:2 3 6 0 0 1 1 1 1 1;
	mso-font-alt:\BC14\D0D5;
	mso-font-charset:129;
	mso-generic-font-family:auto;
	mso-font-format:other;
	mso-font-pitch:fixed;
	mso-font-signature:1 151388160 16 0 524288 0;}
@font-face
	{font-family:"\@Batang";
	mso-font-charset:129;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-1342176593 1775729915 48 0 524447 0;}
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:"Times New Roman";}
@page Section1
	{size:595.35pt 396.9pt;
	margin:28.35pt 28.35pt 28.35pt 28.35pt;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	border:double windowtext 4.5pt;
	mso-border-top-alt:thick-thin-small-gap;
	mso-border-left-alt:thick-thin-small-gap;
	mso-border-bottom-alt:thin-thick-small-gap;
	mso-border-right-alt:thin-thick-small-gap;
	mso-border-color-alt:windowtext;
	mso-border-width-alt:4.5pt;
	padding:24.0pt 24.0pt 24.0pt 24.0pt;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
<?php
	}
?>
</style>
<title>Sistem Perijinan Kota Bontang</title>
</head>
<body 
<?php 
	if($jenis=="bukti"){
?>
	lang=EN-US style='tab-interval:.5in'
<?php		
	}
?> 
onLoad="printDiv('printableArea')">

<div id="printableArea">

<?php

	if(($jenis=="sk") || ($jenis=="skatas")){
	
		$tdp_list = $this->Tdp_cetak_sk_model->get_tdp_detil($id);
		foreach($tdp_list as $value)
		{
			$tdp_id = $value->id;	
			$permohonan_id = $value->permohonan_id;	
			$perusahaan_id = $value->perusahaan_id;		
			$tgl_menkeh = $value->tgl_menkeh ? $this->String_model->DateMonthWord($value->tgl_menkeh) : "&nbsp;";
			$tgl_aapad  = $value->tgl_aapad ? $this->String_model->DateMonthWord($value->tgl_aapad) : "&nbsp;";
			$tgl_lpad   = $value->tgl_lpad ? $this->String_model->DateMonthWord($value->tgl_lpad) : "&nbsp;";
			
			$permohonan_list = $this->Tdp_cetak_sk_model->get_detil("permohonan",$permohonan_id);
			$pemohon_id = $permohonan_list->pemohon_id;		
			$pemohon_list = $this->Tdp_cetak_sk_model->get_detil("pemohon",$permohonan_list->pemohon_id);
			$perusahaan_list = $this->Tdp_cetak_sk_model->get_detil("perusahaan",$perusahaan_id);
			
			$nosk = $permohonan_list->nosk;
			$jenis_permohonan_list = $this->Tdp_cetak_sk_model->get_detil("jpermohonan",$permohonan_list->jpermohonan_id);
			$jenis_permohonan = $jenis_permohonan_list->jenis;	
			$count_daftar = $value->counter_daftar;
			$pemohon = $pemohon_list->nama;
			$alamat = $perusahaan_list->alamat;
			
			if ($this->String_model->IsEmpty($perusahaan_list->rt)==false)
				$alamat.=" RT.".$perusahaan_list->rt;
			if ($this->String_model->IsEmpty($perusahaan_list->rw)==false)
				$alamat.=" RW. ".$perusahaan_list->rw;
			if ($this->String_model->IsEmpty($perusahaan_list->desa_id)==false)
				$alamat.=" Kel. ".ucwords(strtolower($this->Tdp_cetak_sk_model->get_detil("desa",$perusahaan_list->desa_id)->desa));
			if ($this->String_model->IsEmpty($perusahaan_list->kecamatan_id)==false)
				$alamat.=" Kec. ".ucwords(strtolower($this->Tdp_cetak_sk_model->get_detil("kecamatan",$perusahaan_list->kecamatan_id)->kecamatan));
			
			$npwp = $perusahaan_list->npwp;
			$perusahaan = $perusahaan_list->nama;
			$tambahan_pt = "";
			$hukum_pt = "";
			$perusahaan_bentuk_id = $perusahaan_list->bentuk_id;
			
			switch($perusahaan_bentuk_id)
			{
				case 1 :
					$bentuk = "PERSEROAN TERBATAS (PT)";
					$hukum_pt = "DAN UNDANG-UNDANG REPUBLIK INDONESIA NOMOR 40 TAHUN 2007 TENTANG PERSEROAN TERBATAS";
					break;
				case 2 :
					$bentuk = "KOPERASI";
					$hukum_pt = "DAN UNDANG-UNDANG REPUBLIK INDONESIA NOMOR 17 TAHUN 2012 TENTANG PERKOPERASIAN";
					break;
				case 3 :
					$bentuk = "PERSEKUTUAN KOMANDITER (CV)";
					break;
				case 4 :
					$bentuk = "PERSEKUTUAN FIRMA (Fa)";		
					break;
				case 5 :
					$bentuk = "PERUSAHAAN PERORANGAN (PO)";
					break;
				case 6 :
					$bentuk = "BENTUK PERUSAHAAN LAIN (BPL)";
					break;
				default :
					$bentuk = "PERUSAHAAN PERORANGAN (PO)";		
					break;
			}
			
			$berlaku = $permohonan_list->tglexpired!=""? $this->String_model->DateMonthWord($permohonan_list->tglexpired):"";		
			$today = $permohonan_list->tglsk ? $this->String_model->DateMonthWord($permohonan_list->tglsk) : "&nbsp;";
			$status = $this->Tdp_cetak_sk_model->get_detil("sperusahaan",$perusahaan_list->sperusahaan_id)->status;
			$telp = $perusahaan_list->telp;
			$fax = $perusahaan_list->fax;
			$kluipokok = $value->klui_pokok;
			$klui = $value->klui;
			
			$pejabat_list = $this->Permohonan_cetak_model->get_pejabat(13);
			$pejabat = $pejabat_list->pejabat;
			$pejabat_nip = $pejabat_list->nip;
			$pejabat_jabatan = $pejabat_list->jabatan;
			$pejabat_pangkat = $pejabat_list->pangkat;
			$pejabat_atasnama = $pejabat_list->atasnama;
			
		}
	
	}
	
	
	if($jenis=="sk"){		
		/*
		 * Cetak SK
		 */
		
?>

  <table width="720" border="0" align="center" cellpadding="0" cellspacing="0" >
	<tr>
      <td width="100%" align="center" class="style1">PEMERINTAH KOTA BONTANG</td>
    </tr>
	<tr>
      <td width="100%" align="center" class="style3" style="padding:0px 0px 0px 0px;  ">
	  DINAS PERINDUSTRIAN, PERDAGANGAN, KOPERASI
	  
	  <br>
	  USAHA MIKRO, KECIL DAN MENENGAH KOTA BONTANG
	  </td>
    </tr>
    <tr>
      <td width="100%" height="25"><hr style="color:#000000; font-weight:bold; border:1px solid #000000"></td>
    </tr>
    <tr>
      <td width="100%" height="18" align="center" class="style9" style="padding:15px 0px 0px 0px ">TANDA DAFTAR PERUSAHAAN</td>
    </tr>    
    <tr>
      <td width="100%" height="20" align="center" class="style6" style="padding:0px 0px 15px 0px "><?php echo $bentuk;?></td>
    </tr>
	 <tr>
      <td width="100%" height="33" align="center" valign="bottom" class="style6" >BERDASARKAN UNDANG-UNDANG REPUBLIK INDONESIA NOMOR 3 TAHUN 1982 TENTANG WAJIB DAFTAR PERUSAHAAN      </td>
    </tr>
	 <tr>
      <td width="100%" height="38" align="center" valign="top" class="style6" style="padding-bottom:15px "><?php echo $hukum_pt;?></td>
    </tr>
    <tr>
      <td width="100%" height="21" >
	  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="29%" align="center" class="tborder2 lborder2 bborder2 rborder1" style="padding:5px " >
		  <div class="style3">NOMOR TDP</div>
          <div class="style3"><?php echo $nosk;?></div>
		  </td>
          <td width="26%" align="center" class="tborder2 lborder1 bborder2 rborder1">
		  <div class="style3">BERLAKU S/D TANGGAL</div>
          <div class="style3"><?php echo $berlaku;?></div>
		  </td>
          <td width="21%" class="tborder2 lborder1 bborder2">
		  <div class="style3" style="margin-left:10 ">PENDAFTARAN</div>
          <div class="style3" style="margin-left:10 ">PEMBAHARUAN KE</div>
		  </td>
		  <td width="2%" align="center" class="tborder2 bborder2">
		  <div class="style3">:</div>
          <div class="style3">:</div>
		  </td>
		  <td width="22%" class="tborder2 bborder2 rborder2">
		  <div class="style3" style="margin-left:10 "><?php echo $jenis_permohonan;?></div>
          <div class="style3" style="margin-left:10 "><?php echo $count_daftar;?></div>
		  </td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td width="100%" >&nbsp;      </td>
    </tr>
    <tr>
      <td width="100%" height="1" align="center">
	  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="53" class="style3 tborder2 bborder1 lborder2" style="padding-left:10px ">
		  NAMA PERUSAHAAN</td>
		  <td width="2%" height="53" class="style3 tborder2 bborder1" align="center">
		  :</td>
		  <td width="33%" height="53" class="style3 tborder2 rborder1 bborder1" style="padding-left:10px ">
		  <?php echo $perusahaan;?></td>
		  <td width="23%" height="53" align="center" class="style3 tborder2 rborder2 bborder1 lborder1">
		  <div class="style3">STATUS :</div>
          <div class="style3"><?php echo $status;?></div></td>
        </tr>
		<tr>
          <td height="45" class="style3 tborder1 bborder1 lborder2" 
		  style="padding-left:10px ">NAMA PENGURUS / PENANGGUNG JAWAB</td>
		  <td height="45" class="style3 tborder1 bborder1" align="center">
		  :</td>
		  <td height="45" colspan="2" class="style3 tborder1 rborder2 bborder1" style="padding-left:10px ">
		  <?php echo $pemohon;?> </td>
        </tr>
        <tr>
          <td height="45" class="style3 tborder1 bborder1 lborder2" 
		  style="padding-left:10px "  >ALAMAT PERUSAHAAN </td>
		  <td height="45" class="style3 tborder1 bborder1" align="center">
		  :</td>
		  <td height="45" colspan="2" class="style3 tborder1 rborder2 bborder1" style="padding-left:10px ">
		  <?php echo $alamat;?> </td>
        </tr>
		<tr>
          <td height="45" class="style3 tborder1 bborder1 lborder2" 
		  style="padding-left:10px "  >NPWP </td>
		  <td height="45" class="style3 tborder1 bborder1" align="center">
		  :</td>
		  <td height="45" colspan="2" class="style3 tborder1 rborder2 bborder1" style="padding-left:10px ">
		  <?php echo $npwp;?> </td>
        </tr>
        <tr>
          <td height="43" width="42%" class="style3 tborder1 bborder1 lborder2" 
		  style="padding-left:10px ">NOMOR TELEPON</td>
		  <td height="43" class="style3 tborder1 bborder1" align="center">
		  :</td>
		  <td height="43" class="style3 tborder1 rborder1 bborder1" style="padding-left:10px ">
		  <?php echo $telp;?> </td>
          <td width="23%" class="style3 tborder1 rborder2 bborder1 lborder1" style="padding-left:10px ">
		  FAX : <?php echo $fax;?></td>
        </tr>
        <tr>
          <td height="45" width="42%" class="style3 tborder1 bborder2 lborder2" 
		  style="padding-left:10px ">KEGIATAN USAHA POKOK</td>
		  <td height="45" class="style3 tborder1 bborder2" align="center">
		  :</td>
		  <td height="45" class="style3 tborder1 rborder1 bborder2" style="padding-left:10px ">
		  <?php echo $kluipokok;?> </td>
          <td width="23%" class="style3 tborder1 rborder2 bborder2 lborder1" align="center">
		  <div class="style3">KBLI : </div>
          <div class="style3"><?php echo $klui;?></div></td>
        </tr>
        
		<?php echo $tambahan_pt;?> 
       </table></td>
    </tr>
    
    <tr>
      <td width="100%" height="1">
        <table border="0" width="100%" height="31">
          <tr class="style2">
            <td width="39%" height="27">&nbsp;</td>
            <td width="61%" height="27" colspan="3" align="center" class="style3">&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width="100%" >
        <table border="0" width="100%" height="192" style="visibility: ">
          <tr>
            <td width="39%" height="21">&nbsp;</td>
            <td width="61%" height="21" align="center" class="style3">Bontang, <?php echo $today;?> </td>
          </tr>
		  <tr>
            <td width="39%" height="20">&nbsp;</td>
            <td width="61%" height="20" align="center" class="style3" >
			<?php echo $pejabat_jabatan;?>
			<br>SELAKU
			<br><?php echo $pejabat_atasnama;?> 
			</td>
          </tr>
        
          <tr>
            <td width="39%" height="64">&nbsp;</td>
            <td width="61%" align="center" height="64">&nbsp;</td>
          </tr>
          <tr>
            <td width="39%" height="52" >&nbsp;</td>
            <td width="61%" align="center" class="style3" >
			<u><?php echo $pejabat;?></u>			
			<br><?php echo $pejabat_pangkat;?>
			<br>NIP. <?php echo $pejabat_nip;?></td>
          </tr>          
        </table>
      </td>
    </tr>
</table>

	
    <?php
	}else if($jenis=="skatas"){
		/*
		 * Cetak tanpa TTD
		 */
    ?>


  <table width="720" border="0" align="center" cellpadding="0" cellspacing="0" >
	<tr>
      <td width="100%" align="center" class="style1">PEMERINTAH KOTA BONTANG</td>
    </tr>
	<tr>
      <td width="100%" align="center" class="style3" style="padding:0px 0px 0px 0px;  ">
	  DINAS PERINDUSTRIAN, PERDAGANGAN, KOPERASI,
	  <br>
	  USAHA MIKRO, KECIL DAN MENENGAH
	  </td>
    </tr>
	<tr>
      <td width="100%" height="38" align="center" class="style2">
	  	Jl. Mulawarman No. 42 Eks. Jl. MH. Thamrin No. 42 Kelurahan Bontang Baru
		<br>
		Telp. 0548-22912 Faks. 0548-3036358
	  </td>
    </tr>
    <tr>
      <td width="100%" height="25"><hr style="color:#000000; font-weight:bold; border:1px solid #000000"></td>
    </tr>
    <tr>
      <td width="100%" height="18" align="center" class="style9" style="padding:15px 0px 0px 0px ">TANDA DAFTAR PERUSAHAAN</td>
    </tr>
    <tr>
      <td width="100%" height="20" align="center" class="style9" style="padding:0px 0px 15px 0px "><?php echo $bentuk;?></td>
    </tr>
	 <tr>
      <td width="100%" height="33" align="center" valign="bottom" class="style6" >BERDASARKAN UNDANG-UNDANG NOMOR 3 TAHUN 1982 TENTANG WAJIB DAFTAR  PERUSAHAAN      </td>
    </tr>
	 <tr>
      <td width="100%" height="38" align="center" valign="top" class="style6" ><?php echo $hukum_pt;?></td>
    </tr>
    <tr>
      <td width="100%" height="21" align="center">
	  <table width="88%"  border="0" cellspacing="0" cellpadding="0">
         <tr>
          <td width="29%" align="center" class="tborder2 lborder2 bborder2 rborder1" style="padding:5px " >
		  <div class="style6">NOMOR TDP </div>
          <div class="style6"><?php echo $nosk;?></div>
		  </td>
          <td width="51%" align="center" class="tborder2 lborder1 bborder2 rborder2">
		  <div class="style6">BERLAKU S/D TANGGAL </div>
          <div class="style6"><?php echo $berlaku;?></div> 
		  </td>
          <td width="3%">&nbsp;</td>
          <td width="8%" class="tborder2 lborder2 bborder2 rborder1">&nbsp;</td>
          <td width="9%" class="tborder2 lborder1 bborder2 rborder2">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td width="100%" >&nbsp;      </td>
    </tr>
    <tr>
      <td width="100%" height="1" align="center" class="style2" style="padding:5px 0px 5px 0px ">
        <table width="98%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="40%" height="50" align="left" class="tborder2 lborder2 bborder2 rborder2" style="padding:5px ">
			<div class="style7">AGENDA PENDAFTARAN </div>
            <div class="style2">NOMOR : </div>
			</td>
           
            
          </tr>
        </table></td>
    </tr>
    <tr>
      <td width="100%" height="1" align="center">
	  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="53" colspan="2" class="style6 tborder2 rborder2 bborder1 lborder2" style="padding-left:10px "  >NAMA PERUSAHAAN : <?php echo $perusahaan;?></td>
        </tr>
        <tr>
          <td height="45" colspan="2" class="style6 tborder1 rborder2 bborder1 lborder2" style="padding-left:10px " >STATUS : <?php echo $status;?> </td>
        </tr>
        <tr>
          <td colspan="2" height="45" class="style6 tborder1 rborder2 bborder1 lborder2" style="padding-left:10px "  >ALAMAT : <?php echo $alamat;?> </td>
        </tr>
		
        <tr>
          <td height="43" width="50%" class="style6 tborder1 rborder1 bborder1 lborder2" style="padding-left:10px "   >NOMOR TELEPON  : <?php echo $telp;?> </td>
          <td width="50%" class="style6 tborder1 rborder2 bborder1 lborder1" style="padding-left:10px "     >FAX 
            : <?php echo $fax;?></td>
        </tr>
          <tr>
          <td height="43" colspan="2" class="style6 tborder1 rborder2 bborder1 lborder2" style="padding-left:10px "     >PENANGGUNG JAWAB / PENGURUS : <?php echo $pemohon;?> </td>
        </tr>
        <tr>
          <td height="25" colspan="2" valign="bottom" class="style6 tborder1 rborder2  lborder2" style="padding-left:10px "> KEGIATAN USAHA POKOK : <?php echo $kluipokok;?> </td>
        </tr>
		 <tr>
          <td height="21" colspan="2" valign="top" class="style6 rborder2 bborder1 lborder2" style="padding-left:10px "> KLUI : <?php echo $klui;?> </td>
        </tr>
		<?php echo $tambahan_pt;?> 
       </table></td>
    </tr>
    
    <tr>
      <td width="100%" height="1">
        <table border="0" width="100%" height="31">
          <tr class="style2">
            <td width="39%" height="27">&nbsp;</td>
            <td width="61%" height="27" colspan="3" align="center" class="style3">&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width="100%" >
        <table border="0" width="100%" height="192" style="visibility: ">
          <tr>
            <td width="39%" height="21">&nbsp;</td>
            <td width="61%" height="21" align="center" class="style3">Bontang, <?php echo $today;?> </td>
          </tr>
		  <tr>
            <td width="39%" height="20">&nbsp;</td>
            <td width="61%" height="20" align="center" class="style3" style="color:#FFFFFF ">
			<?php echo $pejabat_atasnama;?> 
			<br>
			<?php echo $pejabat_jabatan;?></td>
          </tr>
        
          <tr>
            <td width="39%" height="64">&nbsp;</td>
            <td width="61%" align="center" height="64">&nbsp;</td>
          </tr>
          <tr>
            <td width="39%" height="52" >&nbsp;</td>
            <td width="61%" align="center"  >			
			<span class="style4" style="color:#FFFFFF ">
			<?php echo $pejabat;?>
            </span>			
			<br>			
            <span class="style3" style="color:#FFFFFF "><?php echo $pejabat_pangkat;?></span>
			<br>
            <span class="style3" style="color:#FFFFFF ">NIP. <?php echo $pejabat_nip;?></span> </td>
          </tr>          
        </table>
      </td>
    </tr>
</table>

    
    <?php
	}else if($jenis=="penerimaan"){
		/*
		 * Lembar Kontrol
		 */


		$tdp_list = $this->Tdp_cetak_sk_model->get_tdp_detil($id);
		foreach($tdp_list as $value)
		{
			$tdp_id = $value->id;	
			$permohonan_id = $value->permohonan_id;	
			$perusahaan_id = $value->perusahaan_id;		
			
			$permohonan_list = $this->Tdp_cetak_sk_model->get_detil("permohonan",$permohonan_id);
			$pemohon_id = $permohonan_list->pemohon_id;		
			$pemohon_list = $this->Tdp_cetak_sk_model->get_detil("pemohon",$permohonan_list->pemohon_id);
			$perusahaan_list = $this->Tdp_cetak_sk_model->get_detil("perusahaan",$perusahaan_id);
			
			$nosk = $permohonan_list->nosk;
			
			$no_form = $this->Tdp_cetak_sk_model->get_no_form(11);
			
			$pemohon = $pemohon_list->nama;			
			$perusahaan = $perusahaan_list->nama;
			$pemohon_alamat = $pemohon_list->alamat;	
			if ($this->String_model->IsEmpty($pemohon_list->rt)==false)
				$pemohon_alamat.=" RT.".$pemohon_list->rt;
			if ($this->String_model->IsEmpty($pemohon_list->rw)==false)
				$pemohon_alamat.=" RW. ".$pemohon_list->rw;
			
			$perusahaan_alamat = $perusahaan_list->alamat;			
			if ($this->String_model->IsEmpty($perusahaan_list->rt)==false)
				$perusahaan_alamat.=" RT.".$perusahaan_list->rt;
			if ($this->String_model->IsEmpty($perusahaan_list->rw)==false)
				$perusahaan_alamat.=" RW. ".$perusahaan_list->rw;	
				
			$tanggal_permohonan = $this->String_model->DateMonthWord($permohonan_list->tglpermohonan);	
			$terima = $this->Tdp_cetak_sk_model->get_nama_penerima($permohonan_id);
			$tgl_terima = $this->Tdp_cetak_sk_model->get_tgl_terima($permohonan_id);
			$tgl_terima = $this->String_model->DateMonthWord($tgl_terima);
			
			$no_agenda = $permohonan_list->no_agenda;	
			$jns_permohonan = $this->Tdp_cetak_sk_model->get_jenis_permohonan($permohonan_list->jpermohonan_id); 
			
			$jumlah_permohonan = $this->Tdp_cetak_sk_model->get_permohonan_syarat($permohonan_id); 
			if($jumlah_permohonan>0){
				$xtabel = '<table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
								  <tr align="center" valign="middle">
									<td width="6%" style="border:solid windowtext 1.0pt;
							  padding:0in 5.4pt 0in 5.4pt;height:.3in">NO.</td>
									<td width="70%" style="border:solid windowtext 1.0pt;
							  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:.3in">JENIS LAMPIRAN</td>
									<td width="24%" style="border:solid windowtext 1.0pt;
							  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:.3in">KETERANGAN</td>
								  </tr>
							 ';
							 
				$no = 1;
				$permohonan_syarat_list = $this->Tdp_cetak_sk_model->get_permohonan_syarat($permohonan_id);
				foreach($permohonan_syarat_list as $permohonan_syarat_val)
				{
					$syarat_list = $this->Tdp_cetak_sk_model->get_detil("syarat",$permohonan_syarat_val->syarat_id);
					$syarat = $syarat_list->syarat;
					$syarat_keterangan = $permohonan_syarat_val->keterangan;
					$xtabel.=' 
					<tr valign="top">
						<td align="center" style="border:solid windowtext 1.0pt;border-top:none;padding:0in 5.4pt 0in 5.4pt;height:.3in">'.$no++.'				
						</td>
						<td style="border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
						padding:0in 5.4pt 0in 5.4pt;height:.3in">'.$syarat.'&nbsp;</td>
						<td align="center" style="border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;
						border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:.3in">'.$syarat_keterangan.'&nbsp;</td>
					</tr>';
				}
				$xtabel.='</table>';						 
			}else{
				$xtabel = "(Tidak ada daftar kelengkapan)";
			}			
		}
		
		
    ?>


<table width="700"  border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:50px ">
 <tr>
    <td height="45" colspan="3" align="center" valign="middle" style="font-family:'Times New Roman', Times, serif; font-size:14px;">
	<table width="100%"  border="0" cellspacing="0" cellpadding="3">
      <tr valign="top">
        <td align="left" class="penerimaan_style1">Nama Perusahaan </td>
        <td align="center">:</td>
        <td align="left"><?php echo $perusahaan;?></td>
      </tr>
	  <tr valign="top">
	  	<td width="25%" align="left" class="penerimaan_style1">Nama Pemohon </td>
        <td width="3%" align="center">:</td>
        <td width="72%" align="left"><?php echo $pemohon;?></td>
	  </tr>
      <tr valign="top">
        <td align="left" class="penerimaan_style1">Alamat Perusahaan</td>
        <td align="center">:</td>
        <td align="left"><?php echo $perusahaan_alamat;?></td>
      </tr>
      <tr valign="top">
        <td align="left" class="penerimaan_style1">Tanggal Masuk</td>
        <td align="center">:</td>
        <td align="left"><?php echo $tanggal_permohonan;?></td>
      </tr>
	  <tr valign="top">
        <td align="left" class="penerimaan_style1">Nomor Agenda </td>
        <td align="center">:</td>
        <td align="left"><?php echo $no_agenda;?></td>
      </tr>
	  <tr valign="top">
        <td align="left" class="penerimaan_style1">Jenis Permohonan</td>
        <td align="center">:</td>
        <td align="left"><?php echo $jns_permohonan;?></td>
      </tr>
    </table>
	</td>
  </tr>

  <tr>
    <td height="64" colspan="3" align="center" valign="middle" style="font-family:'Times New Roman', Times, serif; font-size:16px; font-weight:bold; margin-top:10px; margin-bottom:10px ">
	TANDA DAFTAR PERUSAHAAN <br>
	(TDP)</td>
  </tr>
  <tr>
    <td height="39" colspan="3" style="padding-left:20px ">I. Daftar Kelengkapan Permohonan </td>
  </tr>
  <tr>
    <td colspan="3"  style="padding-left:20px ">
	<?php echo $xtabel;?>
	</td>
  </tr>
  <tr>
    <td height="43" colspan="3" style="padding-left:20px ">II. Riwayat Dokumen</td>
  </tr>
 
   <tr>
    <td colspan="3"  style="padding-left:20px "><table width="100%"  border="1" cellpadding="4" cellspacing="0" bordercolor="#000000">
      <tr align="center" valign="middle">
        <td width="5%">No.</td>
		<td width="30%">Nama</td>
		<td width="21%">Jabatan</td>
        <td width="11%">Tanggal Pengiriman</td>
        <td width="12%">Tanggal Penerimaan</td>
        <td width="9%">Tanda Tangan </td>
        <td width="12%">Keterangan</td>
      </tr>
      <tr>
        <td align="center">1.</td>
		<td><?php echo $terima;?></td>
        <td>Staf Perijinan </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
      </tr>
	  <tr>
        <td align="center">2.</td>
		<td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
      </tr>
	   <tr>
        <td align="center">3.</td>
		<td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
      </tr>
	   <tr>
        <td align="center">4.</td>
		<td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
      </tr>
    </table>
	<p align="right"><?php echo $no_form;?></p>
	</td>
  </tr>
</table>


    <?php
	}else if($jenis=="bap"){
		/*
		 * Berita Acara Pemeriksaan
		 */
		
		$tdate = isset($_GET['date']) && !empty($_GET['date'])?strtotime($_GET['date']):strtotime(date('d-m-Y'));
		 
		$tdp_list = $this->Tdp_cetak_sk_model->get_tdp_detil($id);
		foreach($tdp_list as $value)
		{
			$tdp_id = $value->id;	
			$permohonan_id = $value->permohonan_id;	
			$perusahaan_id = $value->perusahaan_id;		
			
			$permohonan_list = $this->Tdp_cetak_sk_model->get_detil("permohonan",$permohonan_id);
			$pemohon_id = $permohonan_list->pemohon_id;		
			$pemohon_list = $this->Tdp_cetak_sk_model->get_detil("pemohon",$permohonan_list->pemohon_id);
			$perusahaan_list = $this->Tdp_cetak_sk_model->get_detil("perusahaan",$perusahaan_id);
			
			$day = "<b><i>".$hariIndo[date("N",$tdate)]."</i></b>";
			$xdate = "<b><i>".$this->String_model->UcfirstEachWord($this->String_model->terbilang(date('j',$tdate)))."</i></b>";
			$bulan = "<b><i>".$bulan[date("n",$tdate)]."</i></b>";			
			$tahun = "<b><i>".$this->String_model->UcfirstEachWord($this->String_model->terbilang(date('Y',$tdate)))."</i></b>";
			
			$perusahaan = !empty($perusahaan_list->nama)?$perusahaan_list->nama:'-';
			$no_akta = !empty($perusahaan_list->noakta)?$perusahaan_list->noakta:'......................';
			$tgl_akta = $this->String_model->DateTimeToDate($perusahaan_list->tglakta,'-');
			$notaris = !empty($perusahaan_list->notaris)?$perusahaan_list->notaris:'.................................';
			$no_menkeh = !empty($value->noakta)?$value->noakta:'......................';
			$pemohon = !empty($pemohon_list->nama)?$pemohon_list->nama:'............................';
			$ktp = !empty($pemohon_list->ktp)?$pemohon_list->ktp:'...........................';
			
			//$kecamatan_list = $this->Permohonan_cetak_model->get_nama_kecamatan($pemohon_list->kecamatan_id);
			//$kecamatan = !empty($pemohon_list->kecamatan_id) ? $this->String_model->UcfirstEachWord(strtolower($kecamatan_list->kecamatan)):'...........................';
			$kecamatan = !empty($pemohon_list->kecamatan_id) ? $this->String_model->UcfirstEachWord(strtolower($this->Permohonan_cetak_model->get_nama_kecamatan($pemohon_list->kecamatan_id))):'...........................';
			$npwp = !empty($perusahaan_list->npwp)?$perusahaan_list->npwp:'.................................';
			$tanggal = $this->String_model->DateMonthWord(date('Y-m-d',$tdate));
			
		}

		 
    ?>

  <table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
		<td colspan="2" align="center" class="style1">BERITA ACARA PEMERIKSAAN BERKAS PERMOHONAN</td>
	</tr>
	<tr>
      <td colspan="2" align="center" class="style1" style="padding:2px 0px 2px 0px " >TANDA DAFTAR PERUSAHAAN (TDP)</td>
    </tr>
	<tr>
      <td colspan="2" align="center" class="style2" style="padding:15px 0px 0px 0px "><hr style="color:#000000; font-weight:bold; border:1px solid #000000"></td>
    </tr>
    <tr>
      <td colspan="2" valign="top" class="style2" style="line-height:150%; text-align:justify;padding:18px 0px 18px 0px">
        <table border="0" width="100%" cellspacing="0" cellpadding="3" >
		<tr valign="top" class="style2">
          <td width="100%" colspan="2" class="style2" >Pada hari <b><i><?php echo $day;?></i></b> Tanggal <b><i><?php echo $xdate;?></i></b> Bulan <b><i><?php echo $bulan;?></i></b> Tahun <b><i><?php echo $tahun;?></i></b> kami yang bertandatangan dibawah ini Pegawai BPPM dan Pegawai Disperindag. Kota Bontang dengan Dinas Teknis  masing-masing :
		  </td>
		 </tr>
		 <tr valign="top" class="style2">
          <td width="100%" colspan="2" class="style2" >
			<table border="0" width="80%" cellspacing="0" cellpadding="3" >
				<tr>
					<td width="3%" class="style2" >1. </td>
					<td width="20%" class="style2" >Nama </td>
					<td width="3%" class="style2" >:</td>
					
                <td width="40%" class="style2" >Yanti Parintik, S.Ip.</td>
					<td width="34%" class="style2" >&nbsp;</td>
				</tr>
				<tr>
					<td class="style2" >&nbsp; </td>
					<td class="style2" >NIP/PTT</td>
					<td class="style2" >:</td>
					
                <td class="style2" >19810107 201001 2 005</td>
					<td class="style2" >&nbsp; </td>
				</tr>
				<tr>
					<td class="style2" >&nbsp; </td>
					<td class="style2" >Pangkat/Gol.</td>
					<td class="style2" >:</td>
					<td class="style2" >--</td>
					<td class="style2" >&nbsp; </td>
				</tr>
				<tr>
					<td class="style2" >&nbsp; </td>
					<td class="style2" >Jabatan</td>
					<td class="style2" >:</td>
					<td class="style2" >Staf Perijinan</td>
					<td class="style2" >&nbsp; </td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td class="style2" >2. </td>
					<td class="style2" >Nama </td>
					<td class="style2" >:</td>
					<td class="style2" >&nbsp;</td>
					<td class="style2" >(Disperindag)</td>
				</tr>
				<tr>
					<td class="style2" >&nbsp; </td>
					<td class="style2" >NIP</td>
					<td class="style2" >:</td>
					<td class="style2" >&nbsp;</td>
					<td class="style2" >&nbsp; </td>
				</tr>
				<tr>
					<td class="style2" >&nbsp; </td>
					<td class="style2" >Pangkat/Gol.</td>
					<td class="style2" >:</td>
					<td class="style2" >&nbsp;</td>
					<td class="style2" >&nbsp; </td>
				</tr>
				<tr>
					<td class="style2" >&nbsp; </td>
					<td class="style2" >Jabatan</td>
					<td class="style2" >:</td>
					<td class="style2" >&nbsp;</td>
					<td class="style2" >&nbsp; </td>
				</tr>
			</table>
		  </td>
		 </tr>
		<tr valign="top" class="style2">
          <td width="100%" colspan="2" class="style2" >Telah melakukan pemeriksaan berkas surat permintaan Tanda Daftar Perusahaan (TDP) atas  <?php echo $perusahaan;?> dengan hasil sebagai berikut :		  </td>
		 </tr>
		 <tr valign="top" class="style2">
          <td width="100%" colspan="2" class="style2" >
			<table border="0" width="100%" cellspacing="0" cellpadding="0" >
			<tr>
					<td class="style3" >A. </td>
					<td colspan = "3" class="style3" >Kelengkapan dokumen :</td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >1.</td>
					<td width="94%" class="style2" >Copy Akta Pendirian perusahaan no <?php echo $no_akta;?>. tanggal <?php echo $tgl_akta;?> dari Notaris <?php echo $notaris;?> di Bontang   <b><i>terlampir</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >2.</td>
					<td width="94%" class="style2" >Pengesahan Badan Hukum dari Departemen Kehakiman dan HAM apabila Perusahaan Terbatas (PT) Nomor <?php echo $no_menkeh;?>  <b><i>terlampir</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >3.</td>
					<td width="94%" class="style2" >Copy Kartu Tanda Penduduk ( KTP) Penanggung jawab / Pengurus Perusahaan atas nama <?php echo $pemohon;?> Nomor <?php echo $ktp;?>  yang dikeluarkan oleh Camat <?php echo $kecamatan;?>  <b><i>terlampir</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >4.</td>
					<td width="94%" class="style2" >Copy Ijin Tempat Usaha (HO)   dari Pemerintah       Kota Bontang       Nomor ............................ tanggal ...............   <b><i>terlampir</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >5.</td>
					<td width="94%" class="style2" >Copy Nomor Pokok Wajib Pajak (NPWP) perusahaan nomor <?php echo $npwp;?> dari Kantor Pelayanan Pajak Bontang,   <b><i>terlampir</i></b></td>
			</tr>
			</table>
		  </td>
		</tr>
		<tr valign="top" class="style2">
          <td width="100%" colspan="2" class="style2" >
			<table border="0" width="100%" cellspacing="0" cellpadding="0" >
			<tr>
					<td class="style3" >B. </td>
					<td colspan = "3" class="style3" >Kebenaran Isian Formulir :</td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >1.</td>
					<td width="94%" class="style2" >Pengenalan Tempat Perusahaan <b><i>telah diisi</i></b> dengan data dan keterangan secara <b><i>lengkap dan benar</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >2.</td>
					<td width="94%" class="style2" >Data Umum Perusahaan telah diisi dengan data dan keterangan secara  <b><i>lengkap dan benar</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >3.</td>
					<td width="94%" class="style2" >Data legalitas perusahaan berkenaan dengan ijin-ijin yang dimiliki <b><i>telah diisi</i></b> dengan data dan keterangan secara  <b><i>lengkap dan benar</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >4.</td>
					<td width="94%" class="style2" >Data Pimpinan Perusahaan telah diisi dengan data dan keterangan secara   <b><i>lengkap dan benar</i></b></td>
			</tr>
			</table>
		  </td>
		</tr>
		<tr valign="top" class="style2">
          <td width="100%" colspan="2" class="style2" >
			<table border="0" width="100%" cellspacing="0" cellpadding="0" >
			<tr>
					<td class="style3" >C. </td>
					<td colspan = "3" class="style3" >Kesimpulan Pemeriksaan :</td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="94%"colspan="2" class="style2" >Berdasarkan hasil pemeriksaan dan penelitian formulir permohonan pendaftaran perusahaan atas nama <?php echo $perusahaan;?> dapat  disampaikan sebagai berikut :
= Bahwa kelengkapan persyaratan serta isian pada formulir pendaftaran perusahaan <b><i>telah diisi</i></b> secara <b><i>lengkap dan benar</i></b></td>
			</tr>
			</table>
		  </td>
		</tr>
				<tr valign="top" class="style2">
          <td width="100%" colspan="2" class="style2" >
			<table border="0" width="100%" cellspacing="0" cellpadding="0" >
			<tr>
				<td height="200" colspan="2" style="padding:0px 0px 0px 0px ">&nbsp;</td>
			 </tr>
			<tr>
					<td class="style3" >D. </td>
					<td colspan = "3" class="style3" >Arahan / Tanggapan Pimpinan :</td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="94%" colspan="2" class="style2" >
					-------------------------------------------------------------------------------------------------------------- 
					-------------------------------------------------------------------------------------------------------------- 
					-------------------------------------------------------------------------------------------------------------- 
					
					</td>
			</tr>
			</table>
		  </td>
		</tr>
        </table>
      </td>
    </tr>
	<tr>
      <td colspan="2" style="padding:0px 0px 0px 0px ">&nbsp;</td>
    </tr>
    <tr>
      
    <td width="187" style="padding:20px 0px 0px 0px ">&nbsp;</td>
      
    <td width="393" style="padding:5px 20px 0px 0px "> 
      <table border="0" width="100%" cellspacing="0" cellpadding="3">
          <tr class="style2">
            <td height="10" class="style2" style="text-align:center">Bontang, <?php echo $tanggal;?></td>
          </tr>
		  <tr class="style2">
            <td class="style3" style="text-align:center">Petugas Pemeriksa :</td>
          </tr>
	  </table>
	  <table border="1" width="100%" cellspacing="0" cellpadding="3">
          <tr class="style2">
            
          <td width="8%" class="style7" style="text-align:center"><strong>No.</strong></td>
			
          <td width="33%" class="style7" style="text-align:center"><strong>Nama</strong></td>
			
          <td width="23%" class="style7" style="text-align:center"><strong>Jabatan</strong></td>
			
          <td width="14%" class="style7" style="text-align:center"><strong>Tanda 
            Tangan</strong></td>
			
          <td width="22%" class="style7" style="text-align:center"><strong>Keterangan</strong></td>
          </tr>
		  <tr class="style2">
            
          <td class="style7" style="text-align:center" width="8%">1.</td>
			
          <td class="style7" style="text-align:center" width="33%">&nbsp;</td>
			
          <td class="style7" style="text-align:center" width="23%">&nbsp;</td>
			
          <td class="style7" style="text-align:center" width="14%">&nbsp;</td>
			
          <td class="style7" style="text-align:center" width="22%">Disperindag</td>
          </tr>
		  <tr class="style2">
            
          <td class="style7" style="text-align:center" width="8%">2.</td>
			
          <td class="style7" style="text-align:center" width="33%">Yanti Parintik, 
            S.Ip.</td>
			
          <td class="style7" style="text-align:center" width="23%">Staf Perijinan</td>
			
          <td class="style7" style="text-align:center" width="14%">&nbsp;</td>
			
          <td class="style7" style="text-align:center" width="22%">BPPM</td>
          </tr>
	  </table>
      </td>
    <tr>
		<td height='70' class="style2" colspan ="2">&nbsp;</td>
	</tr>
    
	<tr>
		<td height='40' class="style2" colspan ="2">Menyetujui :</td>
	</tr>
	<tr>
		<td class="style2" colspan ="2">Kabid Perdagangan,</td>
	</tr>
	<tr>
		<td  height='70' class="style2" colspan ="2">&nbsp;</td>
	</tr>
	<tr>
		<td class="style3" colspan ="2"><u>Sri Redjeki, S.E.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
	</tr>
	<tr>
		<td class="style2" colspan ="2">NIP. 196111011980032001</td>
	</tr>
    <tr>
      <td colspan="2"></td>
    </tr>
	<tr>
		<td  height='70' class="style2" colspan ="2">&nbsp;</td>
	</tr>
	<tr>
		<td  height='30' class="style2" colspan ="2">TANDA TERIMA BERKAS</td>
	</tr>
	<tr>
	<td colspan ="2">
		<table border="1" width="100%" cellspacing="0" cellpadding="3">
          <tr class="style2">
            <td class="style3" width = '2%' style="text-align:center">No.</td>
			<td class="style3" width = '19%' style="text-align:center">Nama</td>
			<td class="style3" width = '19%' style="text-align:center">Jabatan</td>
			<td class="style3" width = '10%' style="text-align:center">Tanggal Pengiriman</td>
			<td class="style3" width = '10%' style="text-align:center">Tanggal Penerimaan</td>
			<td class="style3" width = '10%' style="text-align:center">Tanda Tangan</td>
			<td class="style3" width = '10%' style="text-align:center">Keterangan</td>
          </tr>
		  <tr class="style2">
            <td class="style2" style="text-align:left">1. </td>
			
          <td class="style2" style="text-align:left">Yanti Parintik, S.Ip.</td>
			<td class="style2" style="text-align:left">Staf Perijinan</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">BPPM</td>
          </tr>
		  <tr class="style2">
            <td class="style2" style="text-align:left">2. </td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">Disperindag</td>
          </tr>
		  <tr class="style2">
            <td class="style2" style="text-align:left">3. </td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
          </tr>
		  <tr class="style2">
            <td class="style2" style="text-align:left">4. </td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
			<td class="style2" style="text-align:left">&nbsp;</td>
          </tr>
	  </table>
	</td>
	</tr>
</table>

    <?php
	}else if($jenis=="bukti"){
		/*
		 * Bukti Penerimaan
		 */
		 
		$tdp_list = $this->Tdp_cetak_sk_model->get_tdp_detil($id);
		foreach($tdp_list as $value)
		{
			$tdp_id = $value->id;	
			$permohonan_id = $value->permohonan_id;	
			$perusahaan_id = $value->perusahaan_id;		
			
			$permohonan_list = $this->Tdp_cetak_sk_model->get_detil("permohonan",$permohonan_id);
			$pemohon_id = $permohonan_list->pemohon_id;		
			$pemohon_list = $this->Tdp_cetak_sk_model->get_detil("pemohon",$permohonan_list->pemohon_id);
			$perusahaan_list = $this->Tdp_cetak_sk_model->get_detil("perusahaan",$perusahaan_id);
			
			$nama = $perusahaan_list->nama;
			$pemohon = $pemohon_list->nama;
			$alamat = $pemohon_list->alamat;
			if ($this->String_model->IsEmpty($pemohon_list->rt)==false)
				$alamat.=" RT.".$pemohon_list->rt;
			if ($this->String_model->IsEmpty($pemohon_list->rw)==false)
				$alamat.=" RW. ".$pemohon_list->rw;
			
			$no_form = $this->Tdp_cetak_sk_model->get_no_form(2);
			$operator = isset($_SESSION['ss_nama']) ? $_SESSION['ss_nama'] : "&nbsp;";
			$nip = isset($_SESSION['ss_nip']) ? $_SESSION['ss_nip'] : "&nbsp;";		
			
			$tanggal = $this->String_model->DateMonthWord($this->Permohonan_cetak_model->get_tgl_proses($permohonan_list->id));
		}
		 
    ?>


<div class="Section1" style="border:5px double #000; ">

<p class=MsoNormal><span style='font-family:Batang'><o:p>&nbsp;</o:p></span></p>

<div align=center>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;mso-yfti-tbllook:480;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
  height:104.05pt'>
  <td width=556 valign=top style='width:417.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:104.05pt'>
  <p class=MsoNormal align=center style='text-align:center'>
    <span class="MsoNormal" style="text-align:center"><span
  style='mso-ignore:vglayout; position:absolute; z-index:1; left:65px; margin-left:
  -1px; margin-top:6px; width:69px; height:84px; top: 24px;'><img width=69 height=84
  src="<?php echo site_url().'/tdp/logo3.gif';?>" v:shapes="_x0000_s1028"></span></span>
    <b
  style='mso-bidi-font-weight:normal'><span style='font-size:14.0pt;font-family:
  Batang;mso-bidi-font-family:Arial'>BUKTI PENERIMAAN DOKUMEN TDP 
    <o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:14.0pt;font-family:
  Batang;mso-bidi-font-family:Arial'>BADAN PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:14.0pt;font-family:
  Batang;mso-bidi-font-family:Arial'>KOTA BONTANG<o:p></o:p></span></b></p>
  <p class=MsoNormal align=center style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:Batang;
  mso-bidi-font-family:Arial'>Telp. (0548) 20594<o:p></o:p></span></b></p>
  <div style='mso-element:para-border-div;border:none;border-bottom:solid windowtext 3.0pt;
  padding:0in 0in 1.0pt 0in'>
  <p class=MsoNormal align=center style='text-align:center;border:none;
  mso-border-bottom-alt:solid windowtext 3.0pt;padding:0in;mso-padding-alt:
  0in 0in 1.0pt 0in'><b style='mso-bidi-font-weight:normal'><span
  style='font-family:Batang;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></b></p>
  </div>
  <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
  style='font-family:Batang;mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></b></p>
  <p class=MsoNormal><span style='font-size:11.0pt;font-family:Batang;
  mso-bidi-font-family:Arial'>Nama Perusahaan<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>: <?php echo $nama;?><o:p></o:p></span></p>
  <p class=MsoNormal><span style='font-size:11.0pt;font-family:Batang;
  mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span style='font-size:11.0pt;font-family:Batang;
  mso-bidi-font-family:Arial'>Nama Direktur<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>: <?php echo $pemohon;?><o:p></o:p></span></p>
  <p class=MsoNormal><span style='font-size:11.0pt;font-family:Batang;
  mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span style='font-size:11.0pt;font-family:Batang;
  mso-bidi-font-family:Arial'>Alamat<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>: <?php echo $alamat;?><o:p></o:p></span></p>
  <p class=MsoNormal><span style='font-size:11.0pt;font-family:Batang;
  mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span style='font-size:11.0pt;font-family:Batang;
  mso-bidi-font-family:Arial'>Tanggal Masuk<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>: <?php echo $tanggal;?><o:p></o:p></span></p>
  <p class=MsoNormal><span style='font-size:11.0pt;font-family:Batang;
  mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span style='font-size:11.0pt;font-family:Batang;
  mso-bidi-font-family:Arial'><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;
  </span><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Petugas<o:p></o:p></span></p>
  <p class=MsoNormal><span style='font-size:11.0pt;font-family:Batang;
  mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span style='font-size:11.0pt;font-family:Batang;
  mso-bidi-font-family:Arial'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal><span style='font-size:11.0pt;font-family:Batang;
  mso-bidi-font-family:Arial'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span><b style='mso-bidi-font-weight:normal'><u><?php echo $operator;?> <o:p></o:p></u></b></span></p>
  <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
  style='font-family:Batang;mso-bidi-font-family:Arial'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></b><span
  style='font-size:11.0pt;font-family:Batang;mso-bidi-font-family:Arial'>NIP.
  <?php echo $nip;?> <o:p></o:p></span></p>  </td>
 </tr>
</table>

</div>

<p class=MsoNormal align="right"><span style='font-family:Batang'><o:p><?php echo $no_form;?>&nbsp;</o:p></span></p>

</div>


    <?php
	}	
    ?>
    
</div>

</body>
</html>


<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>