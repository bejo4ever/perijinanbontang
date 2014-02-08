<!DOCTYPE html>
<html>
<head>
	<title>Surat Keputusan Bongkar Trotoar</title>
</head>
<body onLoad="window.print();">
		<table width="720px" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="4" align="center"><img src="<?php echo base_url(); ?>/assets/images/logo-bontang.jpg" width="50px" height="60px"></td>
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
			  <td>Nomor</td>	
			  <td > : <?php echo $trotoar["NO_SK"]; ?></td>
			 <td width="250px">&nbsp;</td>
			  <td>Kepada Yth,</td>
			  </tr>
			<tr>
			  <td>Lampiran</td>
			  <td> : -</td>
			<td width="250px">&nbsp;</td>		  
			 <td width=350px>Sdr. <?php echo $trotoar["pemohon_nama"]; ?></td>
			</tr>
			<tr>
			  <td>Perihal</td>
			  <td> : <b>Izin Bongkar Trotoar untuk Akses Jalan<b></td>
			  <td width="250px">&nbsp;</td>
			  <td>di-<br>Bontang</td>
			</tr>
		<tr>
			<td width="30px">&nbsp;</td>
			<td width="250px">&nbsp;</td>
			<td>&nbsp;</td>
			<td width="250px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="justify">Sehubungan dengan surat permohonan dari <?php echo $trotoar["NAMA_PERUSAHAAN"]; ?> tanggal <?php echo date("d-m-Y",strtotime($trotoar["TGL_PERMOHONAN"])) ; ?> perihal Permohonan Izin Bongakar Trotoar untuk akses jalan, setelah dilakukan evaluasi persyaratan administrasi dan persyaratan teknis serta hasil peninjauan lapangan pada prinsipnya permohonan Saudara dapat disetujui yang berlokasi di <?php echo $trotoar["ALAMAT_LOKASI"]; ?>, kepada <?php echo $trotoar["NAMA_PERUSAHAAN"]; ?> diharuskan memenuhi ketentuan sebagi berikut:</td>
		</tr>
		<tr>
			<td valign="top">1. </td>
			<td colspan="3" align="justify">
				Wajib melaksanakan pengaturan lalulintas;
			</td>
		</tr>
		<tr>
			<td valign="top">2. </td>
			<td colspan="3" align="justify">
				Pelaksanaan penggalian, pemasangan dan pengembalian konstruksi jalan wajib diawasi petugas;
			</td>
		</tr>
		<tr>
			<td valign="top">3. </td>
			<td colspan="3" align="justify">
				Wajib menjaga, memelihara dan bertanggung jawab terhadap segala kerusakan jalan yang disebabkan oleh kegiatan tersebut;
			</td>
		</tr>
		<tr>
			<td colspan="4" align="justify">
				<br>Surat Izin ini berlaku sampai dengan <?php echo date("d-m-Y",strtotime($trotoar["TGL_BERLAKU"])); ?> sejak tanggal diterbitkan Surat Izin ini;
			</td>
		</tr>
		
		<tr>
			<td colspan="4" align="justify">
				<br>Demikian surat Izin ini diterbitkan untuk dilaksanakn sebagaimana mestinya.
			</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td>
				<table>
					<tr>
						<td colspan="3"><b><?php echo $ijin["JABATAN"]; ?>,</b></td>
					</tr>
					<tr>
						<td colspan="3" height="100" valign="bottom"><b><u><?php echo $ijin["NAMA_PEJABAT"]; ?></u></b></td>
					</tr>
					<tr>
						<td colspan="3"><b><?php echo $ijin["PANGKAT"]; ?></b></td>
					</tr>
					<tr>
						<td colspan="3"><b>NIP <?php echo $ijin["NIP_PEJABAT"]; ?></b></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="4"><b><u>Tembusan : disampaikan kepada Yth :</u></b></td>
		</tr>
		<tr>
			<td colspan="4">1. Kepala Dinas Pekerjaan Umum Kota Bontang</td>
		</tr>
		<tr>
			<td colspan="4">2. Kepala DishubKominfo Kota Bontang</td>
		</tr>
		<tr>
			<td colspan="4">3. Kepala DKPPK Kota Bontang</td>
		</tr>
		<tr>
			<td colspan="4">4. Camat Bontang Utara</td>
		</tr>
	</table>
</body>
</html>