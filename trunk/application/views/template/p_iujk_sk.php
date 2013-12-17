<!DOCTYPE html>
<html>
<head>
	<title>Surat Keputusan IUJK</title>
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
			<td colspan="4" align="center"><h3 style="margin:0px;"><u>IJIN USAHA JASA KONSTRUKSI</u></h3></td>
		</tr>
		<tr>
			<td colspan="4" align="center">No. Reg. : <?php echo $det_iujk_nomorreg; ?></td>
		</tr>
		<tr>
			<td colspan="4" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">Nama Badan Usaha</td>
			<td colspan="2">: <b><?php echo $iujk_perusahaan; ?></b></td>
		</tr>
		<tr>
			<td colspan="2">Alamat Kantor Badan Usaha</td>
			<td colspan="2">:</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Jalan, Nomor</td>
			<td colspan="2">: <b><?php echo $iujk_alamat; ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Kelurahan</td>
			<td colspan="2">: <b><?php echo $iujk_kelurahan; ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>RT/RW</td>
			<td colspan="2">: <b><?php echo $iujk_rt.' / '.$iujk_rw; ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Kota</td>
			<td colspan="2">: <b><?php echo $iujk_kota; ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Propinsi</td>
			<td colspan="2">: <b>Kalimantan Timur</b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Kode Pos</td>
			<td colspan="2">: <b><?php echo $iujk_kodepos; ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Nomor Telepon</td>
			<td colspan="2">: <b><?php echo $iujk_telepon; ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Fax</td>
			<td colspan="2">: <b><?php echo $iujk_fax; ?></b></td>
		</tr>
		<tr>
			<td colspan="4">Nama Penanggung Jawab Badan Usaha / Direktur Utama / Direktur :</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Nama1</td>
			<td colspan="2">: <b><?php echo $det_iujk_pj1; ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Nama2</td>
			<td colspan="2">: <b><?php echo $det_iujk_pj2; ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Nama3</td>
			<td colspan="2">: <b><?php echo $det_iujk_pj3; ?></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>N.P.W.P Badan Usaha</td>
			<td colspan="2">: <b><?php echo $iujk_npwp; ?></b></td>
		</tr>
		<tr>
			<td colspan="4" align="justify">Izin Usaha Jasa Konstruksi (IUJK) ini berlaku untuk melakukan Kegiatan Usaha Jasa Pelaksana Konstruksi 
			di Seluruh Wilayah Republik Indonesia</td>
		</tr>
		<tr>
			<td colspan="2">Kualifikasi</td>
			<td colspan="2">: <b><?php echo $iujk_kualifikasi; ?></b></td>
		</tr>
		<tr>
			<td colspan="2">Nama Penanggung Jawab-Teknis</td>
			<td colspan="2">: <b><?php echo $det_iujk_pjteknis; ?></b></td>
		</tr>
		<tr>
			<td colspan="2">No. PJT - BU</td>
			<td colspan="2">: <b><?php echo $det_iujk_pjtbu; ?></b></td>
		</tr>
		<tr>
			<td colspan="2">Klasifikasi</td>
			<td colspan="2">: <b>(Tertera dilembar belakang IUJK Nasional)</b></td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4">Berlaku sampai dengan tanggal : <b><?php echo date('d-m-Y',strtotime($det_iujk_kadaluarsa)); ?></b></td>
		</tr>
		<tr>
			<td width="100px">&nbsp;</td>
			<td width="200px">&nbsp;</td>
			<td width="50px">&nbsp;</td>
			<td width="360px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>
				<table>
					<tr>
						<td>Dikeluarkan di</td>
						<td><b>: Bontang</b></td>
					</tr>
					<tr>
						<td>Pada Tanggal</td>
						<td><b>: <?php echo date('d-m-Y',strtotime($det_iujk_berlaku)); ?></b></td>
					</tr>
					<tr>
						<td colspan="3"><hr></td>
					</tr>
					<tr>
						<td colspan="3" align="center"><b>a.n WALIKOTA BONTANG</b></td>
					</tr>
					<tr>
						<td colspan="3" align="center"><b>KEPALA BADAN PELAYANAN PERIZINAN</b></td>
					</tr>
					<tr>
						<td colspan="3" align="center"><b>TERPADU DAN PENANAMAN MODAL</b></td>
					</tr>
					<tr>
						<td colspan="3" align="center"><b>KOTA BONTANG</b></td>
					</tr>
					<tr>
						<td colspan="3" height="100" valign="bottom" align="center"><b><u>RACHMAN, SE</u></b></td>
					</tr>
					<tr>
						<td colspan="3" align="center">Pembina Utama Muda</td>
					</tr>
					<tr>
						<td colspan="3" align="center">NIP. 19570411 198503 1 010</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>