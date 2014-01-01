<!DOCTYPE html>
<html>
<head>
	<title>Surat Izin HO</title>
</head>
<body onLoad="window.print();">
	<?php extract((array)$printrecord[0]); ?>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="4" align="center"><h4 style="margin:0px;">PEMERINTAH KOTA BONTANG</h4></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h4 style="margin:0px;">BADAN PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL</h4></td>
		</tr>
		<tr>
			<td colspan="4" align="center">Jl. Awang Long No. 2 Telp. (0548) 20594 Fax. (0548) 20598</td>
		</tr>
		<tr>
			<td colspan="4" align="center"><hr></td>
		</tr>
		<tr>
			<td colspan="4" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td width="150px">&nbsp;</td>
			<td width="250px">&nbsp;</td>
			<td width="70px">&nbsp;</td>
			<td width="250px">&nbsp;</td>
		</tr>
		<tr>
			<td>PETIKAN</td>
			<td colspan="3">: <b><u>IZIN TEMPAT PENJUALAN MINUMAN BERALKOHOL</u></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="3"></td>
		</tr>
		<tr>
			<td>Menimbang</td>
			<td colspan="3">: dsb.nya</td>
		</tr>
		<tr>
			<td>Mengingat</td>
			<td colspan="3">: dsb.nya</td>
		</tr>
		<tr>
			<td colspan="4">MEMUTUSKAN</td>
		</tr>
		<tr>
			<td>Menetapkan</td>
			<td colspan="3">: </td>
		</tr>
		<tr>
			<td valign="top">Pertama</td>
			<td colspan="3">: Memberikan Izin Tempat Penjualan Minuman Beralkohol Kepada :</td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td>a. Nama Pemilik/Kuasa Perusahaan</td>
			<td colspan="2"><?php echo $pemohon_nama; ?></td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td>b. Nama Perusahaan</td>
			<td colspan="2"><?php echo $simb_per_nama; ?></td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td>c. Kewarganegaraan</td>
			<td colspan="2"><?php echo $pemohon_wn; ?></td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td>d. Alamat Tempat Tinggal</td>
			<td colspan="2"><?php echo $pemohon_alamat; ?></td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td>e. Jenis Usaha</td>
			<td colspan="2"><?php echo $simb_jenisusaha; ?></td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td>f. Alamat Tempat Usaha</td>
			<td colspan="2"><?php echo $simb_alamat; ?></td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td>g. Berbatasan Dengan</td>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;a. Sebelah Utara</td>
			<td colspan="2"><?php echo $simb_batasutara; ?></td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;b. Sebelah Timur</td>
			<td colspan="2"><?php echo $simb_batastimur; ?></td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;c. Sebelah Selatan</td>
			<td colspan="2"><?php echo $simb_batasselatan; ?></td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;d. Sebelah Barat</td>
			<td colspan="2"><?php echo $simb_batasbarat; ?></td>
		</tr>
		<tr>
			<td valign="top">Kedua</td>
			<td colspan="3">: Masa Berlaku Izin Penjualan Minuman Beralkohol sesuai pasal 4 ayat (1) Peraturan Daerah Kota Bontang
			Nomor 27 Tahun 2002 adalah 1 (satu) tahun sejak tanggal ditetapkan s/d <?php echo date('d-m-Y', strtotime($det_simb_kadaluarsa)); ?></td>
		</tr>
		<tr>
			<td valign="top">Ketiga</td>
			<td colspan="3">: Satu bulan sebelum berakhir masa berlaku Izin diwajibkan memperbaharui Izin.</td>
		</tr>
		<tr>
			<td valign="top">Keempat</td>
			<td colspan="3">: Pemilik Perusahaan / Pemegang Izin wajib memenuhi ketentuan yang tertera dibagian belakang.</td>
		</tr>
		<tr>
			<td valign="top">Kelima</td>
			<td colspan="3">: Keputusan ini mulai berlaku pada tanggal ditetapkan dengan ketentuan akan diadakan perubahan sebagaimana 
			mestinya, apabila terdapat kekeliruan dalam penetapannya.</td>
		</tr>
		<tr>
			<td colspan="4" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td colspan="2"></td>
			<td>Ditetapkan di : Bontang</td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td colspan="2"></td>
			<td>Pada Tanggal : <?php echo date('d-m-Y', strtotime($det_simb_berlaku)); ?></td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td colspan="2"></td>
			<td height="100px" valign="top" align="center">WALIKOTA BONTANG</td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td colspan="2"></td>
			<td align="center">ADI DARMA</td>
		</tr>
	</table>
</body>
</html>