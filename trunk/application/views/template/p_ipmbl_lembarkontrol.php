<!DOCTYPE html>
<html>
<head>
	<title>Kelengkapan Izin</title>
	<style>
		.tablebordered, .tablebordered tr, .tablebordered td{
			border : 1px solid black;
			border-collapse : collapse;
		}
	</style>
</head>
<body onLoad="window.print();">
	<?php extract((array)$printrecord[0]); ?>
	<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="3" align="center"><img src="<?php echo base_url(); ?>assets/images/logo-bontang.jpg" width="50px" height="60px"></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><h3 style="margin:0px;">PEMERINTAH KOTA BONTANG</h3></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><h2 style="margin:0px;">BADAN PELAYANAN PERIJINAN TERPADU<br>DAN PENANAMAN MODAL</h2></td>
		</tr>
		<tr>
			<td colspan="3" align="center">JL. MT. Haryono No. 31 LT. 1 Telp./Fax (0548) 20594</td>
		</tr>
		<tr>
			<td colspan="3" align="center">Website : www.bppm.bontangkota.go.id E-mail : layanan.bppm@gmail.com</td>
		</tr>
		<tr>
			<td colspan="3" align="center"><b>KOTA BONTANG</b></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><hr></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">
				<table>
					<tr>
						<td>Nama Pemohon</td>
						<td>: <?php echo $det_ipmbl_nama; ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>: <?php echo $det_ipmbl_alamat; ?></td>
					</tr>
					<tr>
						<td>Nama Perusahaan</td>
						<td>: <?php echo $ipmbl_usaha; ?></td>
					</tr>
					<tr>
						<td>Nomor Agenda</td>
						<td>: <?php echo $det_ipmbl_nomoragenda; ?></td>
					</tr>
					<tr>
						<td>Tgl Masuk berkas</td>
						<td>: <?php echo date('d-m-Y', strtotime($det_ipmbl_berkasmasuk)); ?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" align="center"><h3 style="margin:0px;">SURAT IZIN PERTAMBANGAN UMUM DAERAH ( SIPUD )</h3></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td></td>
			<td colspan="2">1. Daftar Kelengkapan Permohonan</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">
				<table class="tablebordered">
					<tr>
						<td align="center" width="30px">No.</td>
						<td align="center" width="440px">Jenis Permohonan</td>
						<td align="center" width="250px">Keterangan</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">2. Riwayat Dokumen</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">
				<table class="tablebordered">
					<tr>
						<td align="center" width="30px">No.</td>
						<td align="center" width="138px">Diterima</td>
						<td align="center" width="138px">Jabatan</td>
						<td align="center" width="138px">Tanggal</td>
						<td align="center" width="138px">Tanda Tangan</td>
						<td align="center" width="138px">Keterangan</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>