<!DOCTYPE html>
<html>
<head>
	<title>Surat Keputusan Apotek</title>
</head>
<body onLoad="window.print();">
	<?php extract((array)$printrecord[0]); ?>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="5" align="center"><h4 style="margin:0px;">PEMERINTAH KOTA BONTANG</h4></td>
		</tr>
		<tr>
			<td colspan="5" align="center"><h4 style="margin:0px;">BADAN PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL</h4></td>
		</tr>
		<tr>
			<td colspan="5" align="center">Jl. Awang Long No. 2 Telp. (0548) 20594 Fax. (0548) 20598</td>
		</tr>
		<tr>
			<td colspan="5" align="center"><hr></td>
		</tr>
		<tr>
			<td colspan="5" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5" align="center"><h2 style="margin:0px;">SURAT KEPUTUSAN</h2></td>
		</tr>
		<tr>
			<td colspan="5" align="center"><h3 style="margin:0px;">Nomor : <?php echo $det_apotek_sk; ?></h3></td>
		</tr>
		<tr>
			<td width="75px">&nbsp;</td>
			<td width="75px">&nbsp;</td>
			<td width="30px">&nbsp;</td>
			<td width="240px">&nbsp;</td>
			<td width="300px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5" align="center"><b><u>KEPALA DINAS KESEHATAN KOTA BONTANG</u></b></td>
		</tr>
		<tr>
			<td colspan="5" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" valign="top"><b>MEMBACA</b></td>
			<td>:</td>
			<td colspan="2" align="justify">Surat Permohonan <?php echo $pemohon_nama; ?> tanggal <?php echo date('d-m-Y', strtotime($det_apotek_tanggal)); ?> tentang Permohonan <?php echo (@$det_apotek_jenis == 2)?'Perpanjangan ':'';?>Izin Apotek</td>
		</tr>
		<tr>
			<td colspan="2" valign="top"><b>MENIMBANG</b></td>
			<td>:</td>
			<td colspan="2" align="justify">Bahwa permohonan telah memenuhi persyaratan yang telah ditetapkan dan permohonannya dapat disetujui, oleh karena itu menganggap perlu dan menetapkan dengan suatu Surat Keputusan.</td>
		</tr>
		<tr>
			<td colspan="2" valign="top"><b>MENGINGAT</b></td>
			<td>:</td>
			<td colspan="2" align="justify">1. Undang-undang No. 23 tahun 1992 tentang Kesehatan.</td>
		</tr>
		<tr>
			<td colspan="2" valign="top">&nbsp;</td>
			<td>:</td>
			<td colspan="2" align="justify">2. Undang-undang Obat Keras (ST. 1937 No. 541).</td>
		</tr>
		<tr>
			<td colspan="2" valign="top">&nbsp;</td>
			<td>:</td>
			<td colspan="2" align="justify">3. Undang-undang No. 5 Tahun 1997 tentang Psikotropika.</td>
		</tr>
		<tr>
			<td colspan="2" valign="top">&nbsp;</td>
			<td>:</td>
			<td colspan="2" align="justify">4. Undang-undang No. 22 Tahun 1997 tentang Narkotika.</td>
		</tr>
		<tr>
			<td colspan="2" valign="top">&nbsp;</td>
			<td>:</td>
			<td colspan="2" align="justify">5. Peraturan Pemerintah No. 25 Tahun 1980 tentang Perubahan dan Tambahan Peraturan Pemerintah No. 26 tahun 1965.</td>
		</tr>
		<tr>
			<td colspan="2" valign="top">&nbsp;</td>
			<td>:</td>
			<td colspan="2" align="justify">6. Peraturan Menteri Kesehatan RI Nomor : 922/Menkes/Per/X/1993 Tanggal 23 Oktober 1993 tentang Ketentuan dan Tata Cara Pemberian Izin Apotek.</td>
		</tr>
		<tr>
			<td colspan="2" valign="top">&nbsp;</td>
			<td>:</td>
			<td colspan="2" align="justify">7. Peraturan Pemerintah Ri No. 41 Tahun 1990 tentang Masa Bhakti dan Izin Tenaga Apoteker.</td>
		</tr>
		<tr>
			<td colspan="2" valign="top">&nbsp;</td>
			<td>:</td>
			<td colspan="2" align="justify">8. Peraturan Daerah Kota Bontang No. 5 Tahun 2001 tentang Pembentukan, Sususan Organisasi Dinas Daerah.</td>
		</tr>
		<tr>
			<td colspan="2" valign="top">&nbsp;</td>
			<td>:</td>
			<td colspan="2" align="justify">9. Peraturan Daerah Kota Bontang, No. 7 Tahun 2010 tentang Perizinan Bidang Kesehatan.</td>
		</tr>
		<tr>
			<td colspan="5" align="center"><h3 style="margin:0px;">MEMUTUSKAN</h3></td>
		</tr>
		<tr>
			<td colspan="5"><h3 style="margin:0px;">MENETAPKAN</h3></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><b>Pertama</b></td>
			<td>:</td>
			<td colspan="2">Memberikan Izin Tetap Sementara Perubahan Ke - II Pengelola Apotek</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>Nama</td>
			<td>: <b><?php echo $pemohon_nama; ?></b></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>Alamat</td>
			<td>: <?php echo $pemohon_alamat; ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>Nomor SIK</td>
			<td>: <?php echo $pemohon_surattugas; ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>Nama Apotek</td>
			<td>: <?php echo $pemohon_nama; ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>Alamat</td>
			<td>: <?php echo $apotek_nama; ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>Kota</td>
			<td>: Bontang</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>Propinsi</td>
			<td>: Kalimantan Timur</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>Dengan Menggunakan Sarana</td>
			<td>: <?php echo $apotek_kepemilikan; ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>Nama Pemilik Sarana</td>
			<td>: <?php echo $apotek_pemilik; ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>Alamat Sarana</td>
			<td>: <?php echo $apotek_pemilikalamat; ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>Akte Perjanjian Kerja Sama</td>
			<td>: <?php echo $det_apotek_notaris; ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>Yang dibuat dihadapan Notaris</td>
			<td>: <?php echo $det_apotek_aktano; ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>Di</td>
			<td>: Bontang</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td colspan="2"><b>Dengan ketentuan sebagai berikut :</b></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
			<td>:</td>
			<td colspan="2">1. Izin Apotek berlaku untuk Apoteker atau Apoteker bekerja sama dengan
			pemilik sarana Apotek, di lokasi dan sarana sebagaimana tersebut diatas.</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td colspan="2">2. Penyelenggaraan Apotek harus selalu mematuhi ketentuan peraturan perundang-undangan yang berlaku.</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td colspan="2">3. Sertifikat ini hanya berlaku dalam wilayah kota Bontang.</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td colspan="2">4. Pemilik wajib melakukan Registrasi Ulang setelah memeperoleh Surat Tanda
			Registrasi Apoteker</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td valign="top"><b>Kedua</b></td>
			<td valign="top">:</td>
			<td colspan="2">Surat Keputusan ini dicabut kembali apabila terjadi hal-hal yang dimaksud dalam pasal 25 Peraturan Menteri Kesehatan
			Ri Nomor : 922/Menkes/Per/X/1993 tentang Ketentuan dan Tata Cara Pemberuan Izin Apotek.</td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
			<td>Dikeluarkan di : Bontang</td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
			<td style="border-bottom:1px solid black;">Pada tanggal : </td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
			<td valign="top" height="80"><b>KEPALA DINAS</b></td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
			<td><b><u>Dr. Indriati As'ad. MM</u></b></td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
			<td>NIP. 196202091988032006</td>
		</tr>
		<tr>
			<td colspan="5"><u>Tembusan Kepada Yth. : </u></td>
		</tr>
		<tr>
			<td colspan="5">1. Menteri Kesehatan RI di Jakarta</td>
		</tr>
		<tr>
			<td colspan="5">2. Kepala Dinas Kesehatan Prop. Kaltim di Samarinda</td>
		</tr>
		<tr>
			<td colspan="5">3. Kepala Balai POM di Samarinda</td>
		</tr>
	</table>
</body>
</html>