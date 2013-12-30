<!DOCTYPE html>
<html>
<head>
	<title>Surat Keputusan IDAM</title>
</head>
<body onLoad="window.print();">
	<?php extract((array)$printrecord[0]); ?>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="4" align="center"><img src="<?php echo base_url(); ?>assets/images/logo-bontang.jpg" width="50px" height="60px"></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h3 style="margin:0px;">PEMERINTAH KOTA BONTANG</h3></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h2 style="margin:0px;">BADAN PELAYANAN PERIJINAN TERPADU<br>DAN PENANAMAN MODAL</h2></td>
		</tr>
		<tr>
			<td colspan="4" align="center">JL. MT. Haryono No. 31 LT. 1 Telp./Fax (0548) 20594</td>
		</tr>
		<tr>
			<td colspan="4" align="center">Website : www.bppm.bontangkota.go.id E-mail : layanan.bppm@gmail.com</td>
		</tr>
		<tr>
			<td colspan="4" align="center"><b>KOTA BONTANG</b></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><hr></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h3 style="margin:0px;">SURAT KETERANGAN</h3></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h3 style="margin:0px;">LAIK HYGIENE SANITASI DAPOT AIR MINUM</h3></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><h3 style="margin:0px;">Nomor : <?php echo $det_idam_sk; ?></h3></td>
		</tr>
		<tr>
			<td width="30px">&nbsp;</td>
			<td width="250px">&nbsp;</td>
			<td>&nbsp;</td>
			<td width="250px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4">Berdasarkan pertimbangan :</td>
		</tr>
		<tr>
			<td valign="top">a. </td>
			<td colspan="3" align="justify">
				Undang-undang No. 36 Tahun 2009 tentang Kesehatan
			</td>
		</tr>
		<tr>
			<td valign="top">b. </td>
			<td colspan="3" align="justify">
				Permenkes No.492/Menkes/Per/IV/2010 tentang Persyaratan Kualitas Air Minum
			</td>
		</tr>
		<tr>
			<td valign="top">c. </td>
			<td colspan="3" align="justify">
				Permenkes RI. No. 736/Menkes/Per/VI/2010 tentang Tata Laksana Pengawasan Kualitas Air Minum
			</td>
		</tr>
		<tr>
			<td valign="top">d. </td>
			<td colspan="3" align="justify">
				Perda No. 7 tahun 2010 tentang Perijinan Tempat Usaha
			</td>
		</tr>
		<tr>
			<td valign="top">e. </td>
			<td colspan="3" align="justify">
				Telah memenuhi kelengkapan persyaratan administrasi dan hasil pemeriksaan uji kelaikkan hygiene sanitasi Depot Air Minum
			</td>
		</tr>
		<tr>
			<td colspan="4" align="justify">
				Deberikan <b>Laik Sementara Hygiene Sanitasi Depot Airm Minum,</b> Kepada :
			</td>
		</tr>
		<tr>
			<td valign="top">1. </td>
			<td valign="top">Nama Usaha</td>
			<td colspan="2">: <?php echo $idam_usaha; ?></td>
		</tr>
		<tr>
			<td valign="top">2. </td>
			<td valign="top">Nama Pengusaha/Penanggung Jawab</td>
			<td colspan="2">: <?php echo $pemohon_nama; ?></td>
		</tr>
		<tr>
			<td valign="top">3. </td>
			<td valign="top">Alamat Usaha</td>
			<td colspan="2">: <?php echo $idam_alamat; ?></td>
		</tr>
		<tr>
			<td colspan="4" align="justify">
				Dengan ketentuan sebagai berikut :
			</td>
		</tr>
		<tr>
			<td valign="top">1. </td>
			<td colspan="3" align="justify">
				Laik Hygiene Sanitasi (Sementara) berlaku selama 6 (enam) bulan sejak tanggal <?php echo date('d-m-Y',strtotime($det_idam_berlaku)); ?>
				S.D <?php echo date('d-m-Y',strtotime($det_idam_kadaluarsa)); ?>, kecuali terjadi perubahan / mutasi, atau tidak memenuhi persyaratan hygiense
				sanitasi berdasarkan peraturan perundang-undangan yang berlaku
			</td>
		</tr>
		<tr>
			<td valign="top">2. </td>
			<td colspan="3" align="justify">
				Pemeriksaaan sampel air DAM dlakukan setiap 3 (tiga) bulan sekali untuk <b>Bakteriologi</b>
				dan 1 (satu) tahun sekali untuk pemeriksaan <b>Kimia</b>
			</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>
				<table>
					<tr>
						<td>Ditetapkan di</td>
						<td>: Bontang</td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>: <?php echo date('d-m-Y',strtotime($det_idam_berlaku)); ?></td>
					</tr>
					<tr>
						<td colspan="3"><hr></td>
					</tr>
					<tr>
						<td colspan="3"><b>Kepala Dinas Kesehatan</b></td>
					</tr>
					<tr>
						<td colspan="3"><b>Kota Bontang</b></td>
					</tr>
					<tr>
						<td colspan="3" height="100" valign="bottom"><b><u><?php echo @$dataijin->NAMA_PEJABAT; ?></u></b></td>
					</tr>
					<tr>
						<td colspan="3"><b><?php echo @$dataijin->PANGKAT; ?></b></td>
					</tr>
					<tr>
						<td colspan="3"><b>NIP. <?php echo @$dataijin->NIP_PEJABAT; ?></b></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="4"><u>Tembusan :</u></td>
		</tr>
		<tr>
			<td colspan="4">1. Walikota Bontang (sebagai laporan)</td>
		</tr>
		<tr>
			<td colspan="4">2. Disperindagkop Kota Bontang</td>
		</tr>
		<tr>
			<td colspan="4">3. Kepala Dinas Kesehatan Prop. Kalimantan Timur</td>
		</tr>
		<tr>
			<td colspan="4">4. Arsip</td>
		</tr>
	</table>
</body>
</html>