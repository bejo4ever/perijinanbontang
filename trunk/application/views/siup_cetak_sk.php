<?php

	$bulan = array("1"=>"Januari","2"=>"Februari","3"=>"Maret","4"=>"April","5"=>"Mei","6"=>"Juni","7"=>"Juli","8"=>"Agustus","9"=>"September","10"=>"Oktober","11"=>"Nopember","12"=>"Desember");	
	$hariIndo = array("1"=>"Senin","2"=>"Selasa","3"=>"Rabu","4"=>"Kamis","5"=>"Jumat","6"=>"Sabtu","7"=>"Minggu");

	$id = $_GET['id'];
	$jenis = $_GET['jenis'];
	
?>



<?php
	if($jenis=="sk"){		
	
		$data_permohonan_list = $this->Permohonan_cetak_model->get_detil_permohonan($id);
		$data_siup_list = $this->Siup_cetak_sk_model->get_detil_siup($id);
		$data_perusahaan_list = $this->Siup_cetak_sk_model->get_detil_data_perusahaan($data_siup_list->perusahaan_id);
		$pejabat_list = $this->Permohonan_cetak_model->get_pejabat(2);
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
<style type="text/css">
<!--
body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	text-align: justify;
	color: #000000;
	margin: 15px 0px 0px 0px;
	word-spacing: 0;
}

.style1 {
	font-size: 16px;
	font-weight: bold;
	word-spacing: 0
}

.style2 {
	font-size: 12px;
	font-weight: normal
}

.style3 {
	font-size: 12px;
	font-weight: bold;
	word-spacing: 0
}

.style4 {
	font-size: 12px;
	font-weight: bold;
	word-spacing: 0;
	text-decoration: underline
}

.style5 {
	font-size: 10px;
	font-weight: bold;
}

.lborder1{border-left:1px solid #000; padding-left:1px}
.rborder1{border-right:1px solid #000; padding-right:1px}
.bborder1{border-bottom:1px solid #000;}
.tborder1{border-top:1px solid #000;}
.lborder2{border-left:2px solid #000;}
.rborder2{border-right:2px solid #000; padding-right:2px}
.bborder2{border-bottom:2px solid #000;}
.tborder2{border-top:2px solid #000;}
-->
</style>
<title>Sistem Perijinan Kota Bontang</title>
</head>
<body onLoad="printDiv('printableArea')">

<div id="printableArea">

	<table width="720" border="0" align="center" cellpadding="0"
		cellspacing="0" >
		<td width="720" align="right">
				<table border="0" width="100%" cellspacing="0" cellpadding="3"
					height="1">
		<tr>
			<td width="100%" height="37" align="center" valign="bottom" class="style1 tborder2 lborder2 rborder2">PEMERINTAH KOTA
				BONTANG</td>
		</tr>
		<tr>
			<td width="100%" align="center" class="style3 rborder2 lborder2"
				style="padding: 0px 0px 0px 0px;">DINAS PERINDUSTRIAN, PERDAGANGAN,
				KOPERASI, <br> USAHA MIKRO, KECIL DAN MENENGAH</td>
		</tr>
		<tr>
			<td width="100%" height="38" align="center" class="style2 rborder2 lborder2">Gedung
				Graha Taman Praja Lt. 3 Blok III Jl. Bessai Berinta Kel. Bontang
				Lestari<br> Telp. 0548-20345 Faks. 0548-20366</td>
		</tr>
		<!--<tr>
			<td width="100%" height="25"><hr
					style="color: #000000; font-weight: bold; border: 1px solid #000000">
			</td>
		</tr> -->
		<tr>
			<td width="100%" height="20" align="center" class="style3 rborder2 lborder2">&nbsp;			</td>
		</tr>
		<tr>
			<td width="100%" height="18" align="center" class="style1 rborder2 lborder2">SURAT IZIN
				USAHA PERDAGANGAN</td>
		</tr>
		<tr>
			<td width="100%" height="20" align="center" class="style3 rborder2 lborder2">&nbsp;			</td>
		</tr>
		<tr>
		<td width="100%" height="25" valign="top" align="center" class="style3 bborder2 rborder2 lborder2">NOMOR : <?php echo $data_permohonan_list->nosk; ?>
			</td>
		</tr>
		</table></td>
		<tr>
			<td width="100%" height="18">&nbsp;</td>
		</tr>
		<tr>
			<td width="720">
				<table border="0" width="100%" cellspacing="0" cellpadding="3"
					height="348" style="table-layout: fixed;">
					<tr class="style3">
						<td width="28%" height="53" class="tborder2 bborder1 lborder2" style="padding-left:10px">NAMA PERUSAHAAN </td>
						<td width="2%" height="19" class="tborder2 bborder1">:</td>
						<td colspan="2" height="19" class="tborder2 rborder2 bborder1" style="padding-left:10px"><?php echo $data_perusahaan_list->nama; ?></td>
					</tr>
					<tr class="style3">
						<td width="28%" height="53" class="tborder1 bborder1 lborder2" style="padding-left:10px">NAMA PENANGGUNG JAWAB &amp; JABATAN </td>
						<td width="2%" height="15" class="tborder1 bborder1">:</td>
						<td colspan="2" height="15" class="tborder1 bborder1 rborder2" style="padding-left:10px"><?php echo $data_permohonan_list->nama ? " ".($data_permohonan_list->nama) : "&nbsp;"?></td>
					</tr>
					<tr class="style3">
						<td width="28%" height="53" class="tborder1 bborder1 lborder2" style="padding-left:10px">ALAMAT PERUSAHAAN </td>
						<td width="2%" height="19" class="tborder1 bborder1">:</td>
						<td colspan="2" height="19" class="tborder1 bborder1 rborder2" style="padding-left:10px; padding-right:10px"><?
						$alamat	= "";
						$alamat	.= $data_perusahaan_list->alamat ? $data_perusahaan_list->alamat : "";
						$alamat	.= $this->String_model->IsEmpty($data_perusahaan_list->rt)==false ? " RT. ".$data_perusahaan_list->rt : "";
						$alamat	.= $this->String_model->IsEmpty($data_perusahaan_list->rw)==false ? " RW. ".$data_perusahaan_list->rw : "";
						$alamat	.= $this->String_model->IsEmpty($data_perusahaan_list->desa)==false ? " , Kel. ".ucwords(strtolower($data_perusahaan_list->desa)) : "";
						$alamat	.= $this->String_model->IsEmpty($data_perusahaan_list->kecamatan)==false ? " , Kec. ".ucwords(strtolower($data_perusahaan_list->kecamatan)) : "";
						echo $alamat;
						?>						</td>
					</tr>
					<tr class="style3">
						<td width="28%" height="53" class="tborder1 bborder1 lborder2" style="padding-left:10px">NOMOR TELEPON </td>
						<td width="2%" height="1" class="tborder1 bborder1">:</td>
						<td width="35%" height="1" class="tborder1 bborder1 rborder1" style="padding-left:10px"><?php echo $data_perusahaan_list->telp ? " ".($data_perusahaan_list->telp) : "&nbsp;"?>						</td>
						<td width="35%" height="1" class="tborder1 bborder1 lborder1 rborder2" style="padding-left:10px">FAX : <?php echo $data_perusahaan_list->fax ? " ".($data_perusahaan_list->fax) : "&nbsp;"?>						</td>
					</tr>
					<tr class="style3">
						<td width="28%" height="57" align="left" class="tborder1 bborder1 lborder2" style="padding-left:10px">KEKAYAAN BERSIH PERUSAHAAN (TIDAK TERMASUK TANAH DAN BANGUNAN) </td>
						<td width="2%" height="54" class="tborder1 bborder1">:</td>
						<td colspan="2" height="54" class="tborder1 bborder1 rborder2" style="padding-left:10px">Rp. <?php echo $data_perusahaan_list->modal ? number_format($data_perusahaan_list->modal,0,",",".") : "0"?>						</td>
					</tr>
					<tr class="style3">
						<td width="28%" height="53" class="tborder1 bborder1 lborder2" style="padding-left:10px">KELEMBAGAAN</td>
						<td width="2%" height="19" class="tborder1 bborder1">:</td>
						<td colspan="2" height="19" class="tborder1 bborder1 rborder2" style="padding-left:10px"><?php echo $data_siup_list->lembaga ? $data_siup_list->lembaga : "&nbsp;"?>						</td>
					</tr>
					<tr class="style3">
						<td width="28%" height="53" class="tborder1 bborder1 lborder2" style="padding-left:10px">KEGIATAN USAHA (KBLI) </td>
						<td width="2%" height="19" class="tborder1 bborder1">:</td>
						<td colspan="2" height="19" class="tborder1 bborder1 rborder2" style="padding-left:10px"><?php echo $data_siup_list->kbli ? $data_siup_list->kbli : "&nbsp;"?>						</td>
					</tr>
					<tr class="style3">
						<td width="28%" valign="top" height="77" align="left" class="tborder1 bborder1 lborder2" style="padding-left:10px">BARANG/JASA DAGANGAN UTAMA </td>
						<td width="2%" valign="top" height="77" class="tborder1 bborder1">:</td>
						<td colspan="2" height="77" valign="top" class="style5 tborder1 bborder1 rborder2"
							style="word-wrap: break-word; padding-left:10px; padding-right:10px" ><?php echo $data_siup_list->dagangan ? $data_siup_list->dagangan."&nbsp;" : "&nbsp;"?>						</td>
					</tr>
					<tr class="style3">
			<td colspan="4" height="60" align="justify" class="tborder1 bborder1 lborder2 rborder2" style="padding-left:10px; padding-right:10px">IZIN INI BERLAKU UNTUK MELAKUKAN KEGIATAN USAHA PERDAGANGAN DI SELURUH WILAYAH REPUBLIK INDONESIA, SELAMA PERUSAHAAN MASIH MENJALANKAN USAHANYA, DAN WAJIB DIDAFTAR ULANG SETIAP 5 (LIMA) TAHUN SEKALI. </td>
			
		</tr>
		<tr class="style3">
						<td width="28%" height="53" class="tborder1 bborder2 lborder2" style="padding-left:10px">PENDAFTARAN ULANG PADA TANGGAL  </td>
						<td width="2%" height="19" class="tborder1 bborder2">:</td>
						<td colspan="2" height="19" class="tborder1 bborder2 rborder2" style="padding-left:10px"><?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglexpired);?> </td>
				  </tr>
		<tr class="style3">
			<td colspan="4" height="19" align="justify"></td>
		</tr>
		<tr class="style3">
			<td colspan="4" height="19" align="justify"></td>
		</tr>
			  </table>
			</td>
		</tr>
		

		<tr>
			<td width="100%" height="1">
				<table border="0" width="100%" height="42">
					<tr class="style2">
						<td width="58%" height="16">&nbsp;</td>
						<td width="14%" height="16">Dikeluarkan di</td>
						<td width="2%" height="16">:</td>
						<td width="26%" height="16">Bontang</td>
					</tr>
					<tr class="style2">
						<td width="58%" height="20">&nbsp;</td>
						<td width="14%" height="20">Pada Tanggal</td>
						<td width="2%" height="20">:</td>
						<td width="26%" height="20"><?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglsk);?>						</td>
					</tr>

				</table>
			</td>
		</tr>
		<tr>
			<td width="100%">
				<table border="0" width="100%" height="137" style="visibility: ">
					<tr>
						<td width="39%" height="20">&nbsp;</td>
						<td width="61%" height="20" align="center" class="style3"><?php echo isset($data_permohonan_list->atasnama) ? $data_permohonan_list->jabatan : '&nbsp;'?>
						</td>
					</tr>
					<tr>
						<td width="39%" height="1">&nbsp;</td>
						<td width="61%" align="center" height="1">&nbsp;</td>
					</tr>
					<tr>
						<td width="39%" height="24">&nbsp;</td>
						<td width="61%" align="center" height="24">&nbsp;</td>
					</tr>
					<tr>
						<td width="39%" height="56">&nbsp;</td>
						<td width="61%" align="center" height="56"><span class="style4"> <?php echo isset($data_permohonan_list->pejabat) ? $data_permohonan_list->pejabat : '&nbsp;'?>
						</span> <br> <span class="style3"> <?php echo isset($data_permohonan_list->pangkat) ? $data_permohonan_list->pangkat : '&nbsp;'?>
						</span> <br> <span class="style3"> NIP. <?php echo isset($data_permohonan_list->nip) ? $data_permohonan_list->nip : '&nbsp;'?>
						</span>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

</div>    
    
</body>
</html>


<?php
	}else if($jenis=="skatas"){

		$data_permohonan_list = $this->Permohonan_cetak_model->get_detil_permohonan($id);
		$data_siup_list = $this->Siup_cetak_sk_model->get_detil_siup($id);
		$data_perusahaan_list = $this->Siup_cetak_sk_model->get_detil_data_perusahaan($data_siup_list->perusahaan_id);
		$pejabat_list = $this->Permohonan_cetak_model->get_pejabat(2);
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
<style type="text/css">
<!--
body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	text-align: justify;
	color: #000000;
	margin: 55px 0px 0px 0px;
	word-spacing: 0;
}

.style1 {
	font-size: 16px;
	font-weight: bold;
	word-spacing: 0
}

.style2 {
	font-size: 12px;
	font-weight: normal
}

.style3 {
	font-size: 12px;
	font-weight: bold;
	word-spacing: 0
}

.style4 {
	font-size: 12px;
	font-weight: bold;
	word-spacing: 0;
	text-decoration: underline
}

.style5 {
	font-size: 10px;
	font-weight: bold;
	word-spacing: 0
}
-->
</style>
<title>Sistem Perijinan Kota Bontang</title>
</head>

<body onLoad="printDiv('printableArea')">

<div id="printableArea">

	<table width="720" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<tr>
			<td width="100%" align="center" class="style1">PEMERINTAH KOTA
				BONTANG</td>
		</tr>
		<tr>
			<td width="100%" align="center" class="style3"
				style="padding: 0px 0px 0px 0px;">DINAS PERINDUSTRIAN, PERDAGANGAN,
				KOPERASI, <br> USAHA MIKRO, KECIL DAN MENENGAH</td>
		</tr>
		<tr>
			<td width="100%" height="38" align="center" class="style2">Gedung
				Graha Taman Praja Lt. 3 Blok III Jl. Bessai Berinta Kel. Bontang
				Lestari <br> Telp. 0548-20345 Faks. 0548-20366</td>
		</tr>
		<tr>
			<td width="100%" height="25"><hr
					style="color: #000000; font-weight: bold; border: 1px solid #000000">
			</td>
		</tr>
		<tr>
			<td width="100%" height="18" align="center" class="style3">SURAT IZIN
				USAHA PERDAGANGAN (SIUP) <?php
				if($data_perusahaan_list->modal  <= 200000000)
				{
					$jnsSIUP= "Kecil";
				}
				else if($data_perusahaan_list->modal  >= 200000000 && $data_perusahaan_list->modal <=500000000)
				{
					$jnsSIUP= "Menengah";
				}
				else if($data_perusahaan_list->modal  >= 500000000)
				{
					$jnsSIUP= "Besar";
				}
				echo strtoupper($jnsSIUP);
				?>
			</td>
		</tr>
		<tr>
			<td width="100%" height="20" align="center" class="style3">NOMOR : <?php echo $data_permohonan_list->nosk; ?>
			</td>
		</tr>
		<tr>
			<td width="100%" height="18">&nbsp;</td>
		</tr>
		<tr>
			<td width="100%">
				<table border="0" width="100%" cellspacing="0" cellpadding="3"
					height="1">
					<tr class="style2">
						<td width="3%" valign="top" height="19">1.</td>
						<td width="34%" valign="top" height="19">Nama Perusahaan</td>
						<td width="2%" valign="top" height="19">:</td>
						<td width="63%" height="19" valign="top" class="style3"><?php echo $data_perusahaan_list->nama; ?>
						</td>
					</tr>
					<tr class="style2">
						<td width="3%" valign="top" height="15">2.</td>
						<td width="34%" valign="top" height="15">Merek (milik
							sendiri/lisensi)</td>
						<td width="2%" valign="top" height="15">:</td>
						<td width="63%" height="15" valign="top" class="style3"><?php echo $data_siup_list->merk; ?>
						</td>
					</tr>
					<tr class="style2">
						<td width="3%" valign="top" height="19">3.</td>
						<td width="34%" valign="top" height="19">Alamat Kantor Perusahaan</td>
						<td width="2%" valign="top" height="19">:</td>
						<td width="63%" height="19" valign="top" class="style3"><?
						$alamat	= "";
						$alamat	.= $data_perusahaan_list->alamat ? $data_perusahaan_list->alamat : "";
						$alamat	.= $this->String_model->IsEmpty($data_perusahaan_list->rt)==false ? " RT. ".$data_perusahaan_list->rt : "";
						$alamat	.= $this->String_model->IsEmpty($data_perusahaan_list->rw)==false ? " RW. ".$data_perusahaan_list->rw : "";
						echo $alamat;
						?>
						</td>
					</tr>
					<tr>
						<td width="3%" valign="top" height="21"></td>
						<td width="34%" valign="top" height="21"><font size="2">&nbsp; 
						
						</td>
						<td width="2%" valign="top" height="21"><font size="2">&nbsp; 
						
						</td>
						<td width="63%" height="21" valign="top" class="style3"><?php echo $data_perusahaan_list->desa ? " ".ucwords(strtolower($data_perusahaan_list->desa)) : "&nbsp;"?>
						</td>
					</tr>
					<tr>
						<td width="3%" valign="top" height="21"></td>
						<td width="34%" valign="top" height="21"><font size="2">&nbsp; 
						
						</td>
						<td width="2%" valign="top" height="21"><font size="2">&nbsp; 
						
						</td>
						<td width="63%" height="21" valign="top" class="style3"><?php echo $data_perusahaan_list->kecamatan ? " ".ucwords(strtolower($data_perusahaan_list->kecamatan)) : "&nbsp;"?>
						</td>
					</tr>
					<tr class="style2">
						<td width="3%" valign="top" height="1">4.</td>
						<td width="34%" valign="top" height="1">Nama pemilik/Penanggung
							Jawab</td>
						<td width="2%" valign="top" height="1">:</td>
						<td width="63%" height="1" valign="top" class="style3"><?php echo $data_permohonan_list->nama ? " ".ucwords(strtolower($data_permohonan_list->nama)) : "&nbsp;"?>
						</td>
					</tr>
					<tr class="style2">
						<td width="3%" valign="top" height="1">5.</td>
						<td width="34%" valign="top" height="1">Alamat pemilik/Penanggung
							Jawab</td>
						<td width="2%" valign="top" height="1">:</td>
						<td width="63%" height="1" valign="top" class="style3"><?
						$alamat	= "";
						$alamat	.= $data_permohonan_list->alamat ? $data_permohonan_list->alamat : "";
						$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->rt)==false ? " RT. ".$data_permohonan_list->rt : "";
						$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->rw)==false ? " RW. ".$data_permohonan_list->rw : "";
						echo $alamat;
						?>
						</td>
					</tr>
					<tr>
						<td width="3%" valign="top" height="21"><font size="2">&nbsp; 
						
						</td>
						<td width="34%" valign="top" height="21">&nbsp;</td>
						<td width="2%" valign="top" height="21"><font size="2">&nbsp; 
						
						</td>
						<td width="63%" height="21" valign="top" class="style3"><?php echo $data_permohonan_list->desa ? " ".ucwords(strtolower($data_permohonan_list->desa)) : "&nbsp;"?>
						</td>
					</tr>
					<tr>
						<td width="3%" valign="top" height="1"><font size="2">&nbsp; 
						
						</td>
						<td width="34%" valign="top" height="1">&nbsp;</td>
						<td width="2%" valign="top" height="1"><font size="2">&nbsp; 
						
						</td>
						<td width="63%" height="1" valign="top" class="style3"><?php echo $data_permohonan_list->kecamatan ? " ".ucwords(strtolower($data_permohonan_list->kecamatan)) : "&nbsp;"?>
						</td>
					</tr>
					<tr class="style2">
						<td width="3%" valign="top" height="19">6.</td>
						<td width="34%" valign="top" height="19">Nomor Pokok Wajib Pajak
							(NPWP)</td>
						<td width="2%" valign="top" height="19">:</td>
						<td width="63%" height="19" valign="top" class="style3"><?php echo $data_perusahaan_list->npwp ? $data_perusahaan_list->npwp : "&nbsp;"?>
						</td>
					</tr>
					<tr class="style2">
						<td width="3%" valign="top" height="54">7.</td>
						<td width="34%" valign="top" height="54">Nilai modal dan kekayaan
							bersih Perusahaan seluruhnya tidak termasuk Tanah dan Bangunan
							Tempat Usaha</td>
						<td width="2%" valign="top" height="54">:</td>
						<td width="63%" height="54" valign="top" class="style3">Rp. <?php echo $data_perusahaan_list->modal ? number_format($data_perusahaan_list->modal,0,",",".") : "0"?>
						</td>
					</tr>
					<tr class="style2">
						<td width="3%" valign="top" height="19">8.</td>
						<td width="34%" valign="top" height="19">Kegiatan Usaha</td>
						<td width="2%" valign="top" height="19">:</td>
						<td width="63%" height="19" valign="top" class="style3"><?php echo $data_siup_list->kegiatan ? $data_siup_list->kegiatan : "&nbsp;"?>
						</td>
					</tr>
					<tr class="style2">
						<td width="3%" valign="top" height="19">9.</td>
						<td width="34%" valign="top" height="19">Kelembagaan</td>
						<td width="2%" valign="top" height="19">:</td>
						<td width="63%" height="19" valign="top" class="style3"><?php echo $data_siup_list->kelembagaan ? $data_siup_list->kelembagaan : "&nbsp;"?>
						</td>
					</tr>
					<tr class="style2">
						<td width="3%" valign="top" height="19">10.</td>
						<td width="34%" valign="top" height="19">Bidang Usaha</td>
						<td width="2%" valign="top" height="19">:</td>
						<td width="63%" height="19" valign="top" class="style3"><?php echo $data_siup_list->bidang ? $data_siup_list->bidang : "&nbsp;"?>
						</td>
					</tr>
					<tr class="style2">
						<td width="3%" valign="top" height="19">11.</td>
						<td width="34%" valign="top" height="19">Jenis Barang / Jasa
							Dagangan Utama</td>
						<td width="2%" valign="top" height="19">:</td>
						<td width="63%" height="19" valign="top" class="style5"><?php echo $data_siup_list->dagangan ? $data_siup_list->dagangan : "&nbsp;"?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td width="100%" height="1" class="style2"
				style="padding: 5px 0px 5px 0px">&nbsp;SIUP Ini diterbitkan dengan
				ketentuan :&nbsp;</td>
		</tr>
		<tr>
			<td width="100%" height="1">
				<table border="0" width="100%" cellspacing="0" cellpadding="4">
					<tr class="style2">
						<td width="13%" valign="top">PERTAMA</td>
						<td width="3%" valign="top">:</td>
						<td width="84%" valign="top">Surat Izin Usaha Perdagangan (SIUP)
							ini berlaku untuk melakukan kegiatan Usaha Perdagangan di seluruh
							Wilayah Republik Indonesia selama perusahaan masih menjalankan
							kegiatan Usaha Perdagangan</td>
					</tr>
					<tr class="style2">
						<td width="13%" valign="top">KEDUA</td>
						<td width="3%" valign="top">:</td>
						<td width="84%" valign="top">Pemilik/Penanggung Jawab wajib
							menyampaikan laporan kegiatan usaha perdagangannnya dua kali
							dalam setahun dengan jadwal untuk semester pertama paling lambat
							tanggal 31 Juli dan untuk semester kedua paling lambat tanggal 31
							Januari tahun berikutnya bagi SIUP Menengah dan Besar atau bagi
							SIUP Kecil satu kali dalam setahun , selambat-lambatnya tanggal
							31 Januari tahun berikutnya</td>
					</tr>
					<tr class="style2">
						<td width="13%" valign="top">KETIGA</td>
						<td width="3%" valign="top">:</td>
						<td width="84%" valign="top">Tidak berlaku untuk kegiatan
							Perdagangan Berjangka Komoditi</td>
					</tr>
					<tr class="style2">
						<td width="13%" valign="top">KEEMPAT</td>
						<td width="3%" valign="top">:</td>
						<td width="84%" valign="top">Tidak untuk melakukan kegiatan usaha
							selain yang tercantum dalam SIUP ini.</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td width="100%" height="1">
				<table border="0" width="100%" height="42">
					<tr class="style2">
						<td width="51%" height="16">&nbsp;</td>
						<td width="15%" height="16">Dikeluarkan di</td>
						<td width="2%" height="16">:</td>
						<td width="32%" height="16">Bontang</td>
					</tr>
					<tr class="style2">
						<td width="51%" height="20">&nbsp;</td>
						<td width="15%" height="20">Pada Tanggal</td>
						<td width="2%" height="20">:</td>
						<td width="32%" height="20"><?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglsk)?>
						</td>
					</tr>

				</table>
			</td>
		</tr>
		<tr>
			<td width="100%">
				<table border="0" width="100%" height="137"
					style="visibility: hidden">
					<tr>
						<td width="39%" height="20">&nbsp;</td>
						<td width="61%" height="20" align="center" class="style3"><?php echo isset($data_permohonan_list->atasnama) ? $data_permohonan_list->atasnama : '&nbsp;'?>
						</td>
					</tr>
					<tr>
						<td width="39%" height="20">&nbsp;</td>
						<td width="61%" height="20" align="center" class="style3"><?php echo isset($data_permohonan_list->atasnama) ? $data_permohonan_list->jabatan : '&nbsp;'?>
						</td>
					</tr>
					<tr>
						<td width="39%" height="1">&nbsp;</td>
						<td width="61%" align="center" height="1">&nbsp;</td>
					</tr>
					<tr>
						<td width="39%" height="24">&nbsp;</td>
						<td width="61%" align="center" height="24">&nbsp;</td>
					</tr>
					<tr>
						<td width="39%" height="56">&nbsp;</td>
						<td width="61%" align="center" height="56"><span class="style4"> <?php echo isset($data_permohonan_list->pejabat) ? $data_permohonan_list->pejabat : '&nbsp;'?>
						</span> <br> <span class="style3"> <?php echo isset($data_permohonan_list->pangkat) ? $data_permohonan_list->pangkat : '&nbsp;'?>
						</span> <br> <span class="style3"> NIP. <?php echo isset($data_permohonan_list->nip) ? $data_permohonan_list->nip : '&nbsp;'?>
						</span>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

</div>    
    
</body>
</html>

<?php
	}else if($jenis=="kontrol"){

		$data_permohonan_list = $this->Permohonan_cetak_model->get_detil_permohonan($id);
		$data_siup_list = $this->Siup_cetak_sk_model->get_detil_siup($id);
		$data_perusahaan_list = $this->Siup_cetak_sk_model->get_detil_data_perusahaan($data_siup_list->perusahaan_id);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Sistem Perijinan Kota Bontang</title>

	<style type="text/css">
<!--
.style1 {
	padding-left: 20px
}

.style2 {
	padding-left: 10px
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
				<table width="100%" border="0" cellspacing="0" cellpadding="4">
					<tr valign="top">
						<td width="30%" align="left" class="style1">Nama Perusahaan</td>
						<td width="3%" align="center">:</td>
						<td width="67%" align="left"><?php echo $data_perusahaan_list->nama; ?></td>
					</tr>
					<tr valign="top">
						<td align="left" class="style1">Nama Pemohon</td>
						<td align="center">:</td>
						<td align="left"><?php echo $data_permohonan_list->nama; ?></td>
					</tr>
					<tr valign="top">
						<td align="left" class="style1">Alamat Perusahaan</td>
						<td align="center">:</td>
						<td align="left"><?php echo $data_perusahaan_list->alamat; ?> <?php echo $this->String_model->IsEmpty($data_perusahaan_list->rt)==false ? " RT. ".$data_perusahaan_list->rt : ""?>
						<?php echo $this->String_model->IsEmpty($data_perusahaan_list->rw)==false ? " RW. ".$data_perusahaan_list->rw : ""?>
						</td>
					</tr>
					<tr valign="top">
						<td align="left" class="style1">Nomor Agenda</td>
						<td align="center">:</td>
						<td align="left"><?php echo $data_permohonan_list->no_agenda; ?></td>
					</tr>
					<tr valign="top">
						<td align="left" class="style1">Tanggal Masuk</td>
						<td align="center">:</td>
						<td align="left"><?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglpermohonan); ?>
						</td>
					</tr>
					<tr valign="top">
						<td align="left" class="style1">Jenis Permohonan</td>
						<td align="center">:</td>
						<td align="left"><?php echo $data_permohonan_list->jenispermohonan; ?></td>
					</tr>
					<tr valign="top">
						<td align="left" class="style1">&nbsp;</td>
						<td align="center">&nbsp;</td>
						<td align="left">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td height="64" colspan="3" align="center" valign="middle"
				style="font-family: 'Times New Roman', Times, serif; font-size: 16px; font-weight: bold; margin-top: 10px; margin-bottom: 10px; padding-left: 20px">
				SURAT IJIN USAHA PERDAGANGAN <br> (SIUP) 
			
			</td>
		</tr>
		<tr>
			<td height="39" colspan="3" style="padding-left: 20px">I. Daftar
				Kelengkapan Permohonan</td>
		</tr>
		<tr>
			<td colspan="3" style="padding-left: 20px">
				<table width="100%" border="1" cellpadding="0" cellspacing="0"
					bordercolor="#000000">
					<tr align="center" valign="middle">
						<td width="6%">No.</td>
						<td width="71%">Jenis Lampiran</td>
						<td width="23%">Keterangan</td>
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
						<td class="style2"><?php echo $val_data_syarat->syarat?></td>
						<td align="center"><?php echo $val_data_syarat->keterangan ? $val_data_syarat->keterangan : "-"?>
						</td>
					</tr>
					<?php 
					}
			  		?>
				</table></td>
		</tr>
		<tr>
			<td height="43" colspan="3" style="padding-left: 20px">II. Riwayat
				Dokumen</td>
		</tr>

		<tr>
			<td colspan="3" style="padding-left: 20px"><table width="100%"
					border="1" cellpadding="4" cellspacing="0" bordercolor="#000000">
					<tr align="center" valign="middle">
						<td width="4%">No.</td>
						<td width="30%">Nama</td>
						<td width="30%">Jabatan</td>
						<td width="15%">Tanggal Pengiriman</td>
						<td width="15%">Tanggal Penerimaan</td>
						<td width="15%">Tanda Tangan</td>
						<td width="15%">Keterangan</td>
					</tr>
					<tr>
						<td align="center">1.</td>
						<td>Yanti Parintik, S.Ip</td>
						<td>Staf Perijinan</td>
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
				<p align="right">
				<?php echo $this->Permohonan_cetak_model->get_no_form(12); ?>
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
		$data_siup_list = $this->Siup_cetak_sk_model->get_detil_siup($id);
		$data_perusahaan_list = $this->Siup_cetak_sk_model->get_detil_data_perusahaan($data_siup_list->perusahaan_id);
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Sistem Perijinan Kota Bontang</title>
</head>

<body onLoad="printDiv('printableArea')">

<div id="printableArea">

	<table width="700" border="0" align="center" cellpadding="3"
		cellspacing="0" style="border: 5px double #000;">
		<tr>
			<td height="106" colspan="3" align="center"><img
				src="../images/logo3.gif" width="60"> <span
					style="color: #000000; font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 24px">
				</span>
			
			</td>
			<td width="497" align="center"><span
				style="color: #000000; font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 18px">BUKTI
					PENERIMAAN DOKUMEN SIUP </span> <br /> <span
				style="color: #000000; font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 18px">
					BADAN PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL </span> <br />
				<span
				style="color: #000000; font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 18px">
					KOTA BONTANG </span> <br /> <span
				style="color: #000000; font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 18px">
					Telp. (0548) 205948; Fax. (0548) 20598</span></td>
			<td width="24">&nbsp;</td>
			<td width="61">&nbsp;</td>
		</tr>
		<tr>
			<td width="66">&nbsp;</td>
			<td colspan="4"><hr style="color: #000000">
			
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="4"><table width="100%" border="0" cellspacing="0"
					cellpadding="0">
					<tr valign="top">
						<td width="27%">No. Agenda</td>
						<td width="2%" align="center">:</td>
						<td width="71%" height="30"><?php echo $data_permohonan_list->no_agenda; ?></td>
					</tr>
					<tr valign="top">
						<td width="27%">Nama Perusahaan</td>
						<td width="2%" align="center">:</td>
						<td width="71%" height="30"><?php echo $data_perusahaan_list->nama; ?></td>
					</tr>
					<tr valign="top">
						<td>Nama Direktur</td>
						<td align="center">:</td>
						<td height="30"><?php echo $data_permohonan_list->nama; ?></td>
					</tr>
					<tr valign="top">
						<td>Alamat</td>
						<td align="center">:</td>
						<td height="30"><?				
						$alamat	= "";
						$alamat	.= $data_perusahaan_list->alamat ? $data_perusahaan_list->alamat : "";
						$alamat	.= $this->String_model->IsEmpty($data_perusahaan_list->rt)==false ? " RT. ".$data_perusahaan_list->rt : "";
						$alamat	.= $this->String_model->IsEmpty($data_perusahaan_list->rw)==false ? " RW. ".$data_perusahaan_list->rw : "";
						$alamat	.= $this->String_model->IsEmpty($data_perusahaan_list->desa)==false ? " Kel. ".ucwords(strtolower($data_perusahaan_list->desa)) : "";
						$alamat	.= $this->String_model->IsEmpty($data_perusahaan_list->kecamatan)==false ? " Kec. ".ucwords(strtolower($data_perusahaan_list->kecamatan )): "";
						echo $alamat;
						?>
						</td>
					</tr>
					<tr valign="top">
						<td>Tanggal Masuk</td>
						<td align="center">:</td>
						<td height="30"><?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglpermohonan)?>
						</td>
					</tr>
				</table></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="6" align="right"><table width="169" border="0"
					cellspacing="0" cellpadding="0"
					style="margin-right: 100px; margin-bottom: 20px; margin-top: 20px">
					<tr>
						<td width="169" align="center">Petugas</td>
					</tr>
					<tr>
						<td height="37" align="center">&nbsp;</td>
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
				<p align="right">
					<?php echo $this->Permohonan_cetak_model->get_no_form(3); ?>
				</p>
			</td>
		</tr>
	</table>
</div>
</body>
</html>    

<?php
	}else if($jenis=="bap"){
		
		$siup_list = $this->Siup_cetak_sk_model->get_siup_detil($id);
		if(!empty($siup_list)){
		$permohonan_list = $this->Siup_cetak_sk_model->get_detil("permohonan",$siup_list->permohonan_id);
		$pemohon_list = $this->Siup_cetak_sk_model->get_detil("pemohon",$permohonan_list->pemohon_id);
		$perusahaan_list = $this->Siup_cetak_sk_model->get_detil("perusahaan",$siup_list->perusahaan_id);
		}
		
		/*
		$pejabat_list = $this->Permohonan_cetak_model->get_pejabat(13);		
		$permohonan_list->pejabat = $pejabat_list->pejabat; 
		$permohonan_list->nip = $pejabat_list->nip;
		$permohonan_list->jabatan = $pejabat_list->jabatan;
		$permohonan_list->pangkat = $pejabat_list->pangkat;
		$permohonan_list->atasnama = $pejabat_list->atasnama; 
		
		$siup_list->tgl_menkeh = $siup_list->tgl_menkeh ? $this->String_model->DateMonthWord($siup_list->tgl_menkeh) : "&nbsp;";
		$siup_list->tgl_aapad  = $siup_list->tgl_aapad ? $this->String_model->DateMonthWord($siup_list->tgl_aapad) : "&nbsp;";
		$siup_list->tgl_lpad   = $siup_list->tgl_lpad ? $this->String_model->DateMonthWord($siup_list->tgl_lpad) : "&nbsp;";
		*/
		
		$date = isset($_GET['date']) && !empty($_GET['date'])?strtotime($_GET['date']):strtotime(date('d-m-Y'));
		$x_day = "<b><i>".$this->String_model->hariIndo[date("N",$date)]."</i></b>";
		$x_date	= "<b><i>".$this->String_model->UcfirstEachWord($this->String_model->terbilang(date('j',$date)))."</i></b>";
		$x_bulan = "<b><i>".$this->String_model->bulan[date("n",$date)]."</i></b>";
		$x_tahun = "<b><i>".$this->String_model->UcfirstEachWord($this->String_model->terbilang(date('Y',$date)))."</i></b>";
		$x_year = date('Y');
		$x_perusahaan = !empty($perusahaan_list->nama)?$perusahaan_list->nama:'-';
		$x_noakta = !empty($perusahaan_list->noakta)?$perusahaan_list->noakta:'......................';
		$x_tglakta = !empty($perusahaan_list->tglakta)?$this->String_model->DateTimeToDate($perusahaan_list->tglakta,'-'):'.................';
		$x_notaris = !empty($perusahaan_list->notaris)?$perusahaan_list->notaris:'.................................';
		$x_nomenkeh = !empty($siup_list->no_menkeh)?$siup_list->no_menkeh:'......................';
		$x_pemohon = !empty($pemohon_list->nama)?$pemohon_list->nama:'............................';
		$x_ktp = !empty($pemohon_list->ktp)?$pemohon_list->ktp:'...........................';
		$x_kecamatan = !empty($pemohon_list->kecamatan_id) ? $this->String_model->UcfirstEachWord(strtolower($this->Permohonan_cetak_model->get_nama_kecamatan($pemohon_list->kecamatan_id))):'...........................';
		$x_npwp = !empty($perusahaan_list->npwp)?$perusahaan_list->npwp:'.................................';
		$x_tanggal = $this->String_model->DateMonthWord(date('Y-m-d',$date));
		$x_modal = !empty($perusahaan_list->modal)?number_format($perusahaan_list->modal,'0',',','.'):'0';
			
			
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
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
-->
</style>
<title>Sistem Perijinan Kota Bontang</title>
</head>

<body onLoad="printDiv('printableArea')">

<div id="printableArea">

  <table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
		<td colspan="2" align="center" class="style1">BERITA ACARA PEMERIKSAAN BERKAS PERMOHONAN</td>
	</tr>
	<tr>
      <td colspan="2" align="center" class="style1" style="padding:2px 0px 2px 0px " >SURAT IJIN USAHA PERDAGANGAN (SIUP)</td>
    </tr>
	<tr>
      <td colspan="2" align="center" class="style2" style="padding:15px 0px 0px 0px "><hr style="color:#000000; font-weight:bold; border:1px solid #000000"></td>
    </tr>
    <tr>
      <td colspan="2" valign="top" class="style2" style="line-height:150%; text-align:justify;padding:18px 0px 18px 0px">
        <table border="0" width="100%" cellspacing="0" cellpadding="3" >
		<tr valign="top" class="style2">
          <td width="100%" colspan="2" class="style2" >Pada hari <b><i><?php echo $x_day;?></i></b> Tanggal <b><i><?php echo $x_date;?></i></b> Bulan <b><i><?php echo $x_bulan;?></i></b> Tahun <b><i><?php echo $x_tahun;?></i></b> kami yang bertandatangan dibawah ini Pegawai BPPM Kota Bontang dengan Dinas Teknis  masing-masing :
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
					<td class="style2" >NIP</td>
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
          <td width="100%" colspan="2" class="style2" >Telah melakukan pemeriksaan berkas surat permintaan Surat Ijin Usaha Perdagangan (SIUP) atas  <?php echo $x_perusahaan;?> dengan hasil sebagai berikut :		  </td>
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
					<td width="3%" class="style2" >a.</td>
					<td width="94%" class="style2" >Copy Akta Pendirian perusahaan no <?php echo $x_noakta;?>. tanggal <?php echo $x_tglakta;?> dari Notaris <?php echo $x_notaris;?> di Bontang   <b><i>terlampir</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >b.</td>
					<td width="94%" class="style2" >Pengesahan Badan Hukum dari Departemen Kehakiman dan HAM apabila Perusahaan Terbatas (PT) Nomor <?php echo $x_nomenkeh;?>  <b><i>terlampir</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >c.</td>
					<td width="94%" class="style2" >Copy Kartu Tanda Penduduk ( KTP) Penanggung jawab / Pengurus Perusahaan atas nama <?php echo $x_pemohon;?> Nomor <?php echo $x_ktp;?>  yang dikeluarkan oleh Camat <?php echo $x_kecamatan;?>  <b><i>terlampir</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >d.</td>
					<td width="94%" class="style2" >Copy Ijin Tempat Usaha (HO)   dari Pemerintah       Kota Bontang       Nomor ............................ tanggal ...............   <b><i>terlampir</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >e.</td>
					<td width="94%" class="style2" >Copy Nomor Pokok Wajib Pajak (NPWP) perusahaan nomor <?php echo $x_npwp;?> dari Kantor Pelayanan Pajak Bontang,   <b><i>terlampir</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >f.</td>
					<td width="94%" class="style2" >Neraca Awal Perusahaan tertanggal Januari <?php echo $x_year;?>   <b><i>terlampir</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >g.</td>
					<td width="94%" class="style2" >SIUP lama yang asli No .........................................., Tgl ...........................</td>
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
					<td width="3%" class="style2" >a.</td>
					<td width="94%" class="style2" >Maksud permohonan adalah untuk mendapatkan SIUP</td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >b.</td>
					<td width="94%" class="style2" >Identitas perusahaan <b><i>telah diisi</i></b> dengan data dan keterangan secara <b><i>lengkap dan benar</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >c.</td>
					<td width="94%" class="style2" >Identitas penangungjawab perusahaan <b><i>telah diisi</i></b> dengan data dan keterangan secara  <b><i>lengkap dan benar</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >d.</td>
					<td width="94%" class="style2" >Legalitas perusahaan <b><i>telah diisi</i></b> dengan data dan keterangan secara  <b><i>lengkap dan benar</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >e.</td>
					<td width="94%" class="style2" >Modal disetor dan kekayaan bersih (netto) perusahaan seluruhnya tidak termasuk tanah dan bangunan tempat usaha sebesar Rp. <?php echo $x_modal;?>,- sesuai dengan Neraca Perusahaan tertanggal bulan Januari <?php echo $x_year;?>.<b><i> Terlampir</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >f.</td>
					<td width="94%" class="style2" >Kegiatan usaha <b><i>telah diisi</i></b> dengan data dan keterangan secara  <b><i>lengkap dan benar</i></b></td>
			</tr>
			<tr>
					<td width="3%" class="style2" >&nbsp;</td>
					<td width="3%" class="style2" >g.</td>
					<td width="94%" class="style2" >Hubungan dengan Bank <b><i>telah diisi</i></b> dengan data dan keterangan secara  <b><i>lengkap dan benar</i></b></td>
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
					<td width="94%"colspan="2" class="style2" >Berdasarkan hasil pemeriksaan / penelitian dan evaluasi berkas permohonan permintaan Surat Ijin Usaha Perdagangan (SIUP) atas nama <?php echo $x_perusahaan;?> dapat  disampaikan sebagai berikut :
= Bahwa kelengkapan persyaratan serta isian pada formulir pendaftaran perusahaan <b><i>telah diisi</i></b> secara <b><i>lengkap dan benar</i></b></td>
			</tr>
			</table>
		  </td>
		</tr>
				<tr valign="top" class="style2">
          <td width="100%" colspan="2" class="style2" >
			<table border="0" width="100%" cellspacing="0" cellpadding="0" >
				<tr>
					<td height="80" colspan="2" style="padding:0px 0px 0px 0px ">&nbsp;</td>
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
      
    <td width="170" style="padding:20px 0px 0px 0px ">&nbsp;</td>
      
    <td width="410" style="padding:5px 20px 0px 0px "> 
      <table border="0" width="100%" cellspacing="0" cellpadding="3">
          <tr class="style2">
            <td height="10" class="style2" style="text-align:center">Bontang, <?php echo $x_tanggal;?></td>
          </tr>
		  <tr class="style2">
            <td class="style3" style="text-align:center">Petugas Pemeriksa :</td>
          </tr>
	  </table>
	  <table border="1" width="100%" cellspacing="0" cellpadding="3">
          <tr class="style2">
            
          <td width="7%" class="style7" style="text-align:center"><strong>No.</strong></td>
			
          <td width="31%" class="style7" style="text-align:center"><strong>Nama</strong></td>
			
          <td width="22%" class="style7" style="text-align:center"><strong>Jabatan</strong></td>
			
          <td width="16%" class="style7" style="text-align:center"><strong>Tanda 
            Tangan</strong></td>
			
          <td width="24%" class="style7" style="text-align:center"><strong>Keterangan</strong></td>
          </tr>
		  <tr class="style2">
            
          <td class="style7" style="text-align:center" width="7%">1.</td>
			
          <td class="style7" style="text-align:center" width="31%">&nbsp;</td>
			
          <td class="style7" style="text-align:center" width="22%">&nbsp;</td>
			
          <td class="style7" style="text-align:center" width="16%">&nbsp;</td>
			
          <td class="style7" style="text-align:center" width="24%">Disperindag</td>
          </tr>
		  <tr class="style2">
            
          <td class="style7" style="text-align:center" width="7%">2.</td>
			
          <td class="style7" style="text-align:center" width="31%">Yanti Parintik, 
            S.Ip.</td>
			
          <td class="style7" style="text-align:center" width="22%">Staf Perijinan</td>
			
          <td class="style7" style="text-align:center" width="16%">&nbsp;</td>
			
          <td class="style7" style="text-align:center" width="24%">BPPM</td>
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
            
          <td class="style3" width = '4%' style="text-align:center">No.</td>
			
          <td class="style3" width = '21%' style="text-align:center">Nama</td>
			
          <td class="style3" width = '14%' style="text-align:center">Jabatan</td>
			
          <td class="style3" width = '15%' style="text-align:center">Tanggal Pengiriman</td>
			
          <td class="style3" width = '15%' style="text-align:center">Tanggal Penerimaan</td>
			
          <td class="style3" width = '10%' style="text-align:center">Tanda Tangan</td>
			
          <td class="style3" width = '21%' style="text-align:center">Keterangan</td>
          </tr>
		  <tr class="style2">
            
          <td class="style2" style="text-align:left" width="4%">1. </td>
			
          <td class="style2" style="text-align:left" width="21%">Yanti Parintik, 
            S.Ip.</td>
			
          <td class="style2" style="text-align:left" width="14%">Staf Perijinan</td>
			
          <td class="style2" style="text-align:left" width="15%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="15%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="10%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="21%">BPPM</td>
          </tr>
		  <tr class="style2">
            
          <td class="style2" style="text-align:left" width="4%">2. </td>
			
          <td class="style2" style="text-align:left" width="21%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="14%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="15%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="15%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="10%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="21%">Disperindag</td>
          </tr>
		  <tr class="style2">
            
          <td class="style2" style="text-align:left" width="4%">3. </td>
			
          <td class="style2" style="text-align:left" width="21%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="14%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="15%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="15%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="10%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="21%">&nbsp;</td>
          </tr>
		  <tr class="style2">
            
          <td class="style2" style="text-align:left" width="4%">4. </td>
			
          <td class="style2" style="text-align:left" width="21%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="14%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="15%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="15%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="10%">&nbsp;</td>
			
          <td class="style2" style="text-align:left" width="21%">&nbsp;</td>
          </tr>
	  </table>
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