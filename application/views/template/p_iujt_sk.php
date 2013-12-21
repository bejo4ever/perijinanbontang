<!DOCTYPE html>
<html>
<head>
	<title>SK IUJT</title>
</head>
<body onLoad="window.print();">
	<?php extract((array)$printrecord[0]); ?>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="5" align="center"><h2 style="margin:0px;">PEMERINTAH KOTA BONTANG</h2></td>
		</tr>
		<tr>
			<td colspan="5" align="center"><h3 style="margin:0px;">DINAS PERHUBUNGAN KOMUNIKASI DAN INFORMATIKA</h3></td>
		</tr>
		<tr>
			<td colspan="5" align="center">JALAN RE. MARTADINATA TELP.(0548) 5116504, FAX.(0548) 20089</td>
		</tr>
		<tr>
			<td colspan="5" align="center"><h3 style="margin:0px;">KOTA BONTANG</h3></td>
		</tr>
		<tr>
			<td colspan="5"><hr></td>
		</tr>
		<tr>
			<td colspan="5" align="center"><b><u>IZIN USAHA JASA TITIPAN</u></b></td>
		</tr>
		<tr>
			<td colspan="5" align="center"><b>Nomor:<?php echo $det_iujt_sk; ?></b></td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top">Menimbang</td>
			<td valign="top">:a.</td>
			<td colspan="3" align="justify">
				bahwa berdasarkan Undang-undang Nomor 6 Tahun 1984 tentang Pos, diatur bahwa penyelenggaraan pengiriman barang berupa paket,
				dokumen dan surat-surat berharga laiinya dapat dilakukan oleh pihak swasta yang memiliki badan hukum.
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td valign="top">&nbsp;b.</td>
			<td colspan="3" align="justify">
				bahwa berdasarkan hasil kajian yang dilakukan pada perusahaan yang bersangkutan telah memenuhi persyaratan administrasi teknis yang telah ditentukan.
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td valign="top">&nbsp;c.</td>
			<td colspan="3" align="justify">
				bahwa berdasarkan pertimbangan sebagaimana dimaksud dalam huruf a dan b, perlu menetapkan untuk dapat diberikan izin usaha jasa titipan sebagai agen kepada pemohon.
			</td>
		</tr>
		<tr>
			<td valign="top">Mengingat</td>
			<td valign="top">:a.</td>
			<td colspan="3" align="justify">
				Undang-undang R.I Nomor 6 tahun 1984 tentang Pos.
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td valign="top">&nbsp;b.</td>
			<td colspan="3" align="justify">
				Peraturan Pemerintah R.I Nomor 37 Tahun 1985 tentang Penyelenggaraan Pos;
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td valign="top">&nbsp;c.</td>
			<td colspan="3" align="justify">
				Keputusan Menteri Pariwisata Pos dan Telekomunikasi Nomor KM.38/KP.102/MPPT-94 tentang Pengusaha Jasa Titipan;
			</td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5" align="center"><b>MEMUTUSKAN</b></td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td>Menetapkan&nbsp;&nbsp;</td>
			<td colspan="4">:</td>
		</tr>
		<tr>
			<td valign="top">Pertama</td>
			<td colspan="4">:Memberikan Izin usaha Jasa Titipan selaku Agen kepada:</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="4">
				<table>
					<tr>
						<td>Nama</td>
						<td>: <?php echo $pemohon_nama; ?></td>
					</tr>
					<tr>
						<td>Perusahaan</td>
						<td>: <?php echo $iujt_usaha; ?></td>
					</tr>
					<tr>
						<td>NPWP</td>
						<td>: <?php echo $pemohon_npwp; ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>: <?php echo $pemohon_alamat; ?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td valign="top">Kedua</td>
			<td colspan="4" align="justify">:Masa berlaku Izin Usaha Jasa Titipan selaku Agen adalaj selama 3 (tiga)
			tahun tehitung sejak tanggal ditetapkan.</td>
		</tr>
		<tr>
			<td valign="top">Ketiga</td>
			<td colspan="4" align="justify">:Pemilik perusahaan / pemegang izin wajib memenuhi segala peraturan perundang-undangan yang berlaku.</td>
		</tr>
		<tr>
			<td valign="top">Keempat</td>
			<td colspan="4" align="justify">:Keputusan ini berlaku sejak tanggal ditetapkan dan apabila terdapat kesalahan dalam penetapannya, 
			maka akan diadakan perbaikan sebagaimana mestinya.</td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td colspan="3">
				<table>
					<tr>
						<td>Ditetapkan di</td>
						<td>: Bontang</td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>: <?php echo date('d-m-Y', strtotime($det_iujt_berlaku)); ?></td>
					</tr>
					<tr>
						<td colspan="3"><hr></td>
					</tr>
					<tr>
						<td colspan="3"><b>Kepala Dinas,</b></td>
					</tr>
					<tr>
						<td colspan="3" height="100" valign="bottom"><b><u>Drs. Akhmad Suharto, M.Si</u></b></td>
					</tr>
					<tr>
						<td colspan="3"><b>Pembina Tingkat I</b></td>
					</tr>
					<tr>
						<td colspan="3"><b>NIP. 196609101986091001</b></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>