<?php

	$bulan = array("1"=>"Januari","2"=>"Februari","3"=>"Maret","4"=>"April","5"=>"Mei","6"=>"Juni","7"=>"Juli","8"=>"Agustus","9"=>"September","10"=>"Oktober","11"=>"Nopember","12"=>"Desember");	
	$hariIndo = array("1"=>"Senin","2"=>"Selasa","3"=>"Rabu","4"=>"Kamis","5"=>"Jumat","6"=>"Sabtu","7"=>"Minggu");

	$id = $_GET['id'];
	$jenis = $_GET['jenis'];
	
?>



<?php
	if($jenis=="sk"){		

		$data_permohonan_list = $this->Permohonan_cetak_model->get_detil_permohonan($id);		
		$jpermohonan_id = $this->Permohonan_cetak_model->get_jpermohonan_id($id);	
		$data_lokasi_list = $this->Lokasi_cetak_sk_model->get_detil_lokasi_by_permohonan_id($id);			
		$pejabat_list = $this->Permohonan_cetak_model->get_pejabat(4);
		
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
	font-family: Times New Roman, Times, serif, Arial, Helvetica, sans-serif;
	text-align: justify;
	color: #000000;
	margin: 47px 0px 0px 0px;
	word-spacing: 0;
}

.style1 {
	font-size: 13px;
	font-weight: bold;
	word-spacing: 0
}

.style2 {
	font-size: 11.0pt;
	font-weight: normal
}

.style3 {
	font-size: 11.0pt;
	font-weight: bold;
	word-spacing: 0
}

.style4 {
	font-size: 11.0pt;
	font-weight: bold;
	word-spacing: 0;
	text-decoration: underline
}

.style5 {
	font-size: 10.0pt;
	font-weight: normal
}

.style6 {
	font-size: 12.0pt;
	font-weight: bold;
	word-spacing: 0
}
-->
</style>
<title>Sistem Perijinan Kota Bontang</title>
</head>
<body onload="printDiv('printableArea')">

<div id="printableArea">

	<table width="720" border="0" align="center">
		<tr>
			<td colspan="2"><br>
			</td>
		</tr>
		<tr>
			<td colspan="2"><br>
			</td>
		</tr>
		<tr>
			<td colspan="2"><br>
			</td>
		</tr>
		<tr>
			<td colspan="2"><br>
			</td>
		</tr>
		<tr>
			<td colspan="2"><br>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2" class="style6">KEPUTUSAN WALIKOTA
				BONTANG</td>
		</tr>
		<tr>
			<td align="center" colspan="2" class="style6">NOMOR : <?php echo $data_permohonan_list->nosk?>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2" class="style6"><br> <br> TENTANG</td>
		</tr>
		<tr>
			<td align="center" colspan="2" class="style6">PEMBERIAN IJIN LOKASI
				UNTUK KEPERLUAN&nbsp; <br> <?php echo $data_lokasi_list->peruntukan ? strtoupper($data_lokasi_list->peruntukan) : "&nbsp;"?>&nbsp;</td>
		</tr>
		<tr>
			<td align="center" colspan="2" class="style6"><br> <br> WALIKOTA
				BONTANG <br> <br> <br></td>
		</tr>
		<tr>
			<td height="540" colspan="2" class="style2">

				<table border="0" width="100%" height="529">
					<tr>
						<td width="20%" height="43" valign="top" class="style3">MEMBACA</td>
						<td width="1%" height="43" valign="top">:</td>
						<td width="3%" height="43" valign="top" align="justify">a.</td>
						<td width="76%" height="43" valign="top" align="justify">Surat
							permohonan <?php echo $data_permohonan_list->nama?> tanggal <?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglpermohonan)?>
							dengan alamat <?
							$alamat	= "";
							$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->alamat)==false ? $data_permohonan_list->alamat : "";
							$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->rt)==false ? " RT. ".$data_permohonan_list->rt : "";
							$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->rw)==false ? " RW. ".$data_permohonan_list->rw : "";
							echo $alamat;
							?> perihal Permohonan Ijin Lokasi untuk&nbsp; <?php echo $data_lokasi_list->peruntukan?>
							&nbsp; seluas&nbsp;&nbsp; <u>+</u> <?php echo number_format($data_lokasi_list->luas,2,",",".")?>
							M<sup>2</sup>&nbsp; terletak di <?
							$alamat	= "";
							$alamat	.= $data_lokasi_list->alamat ? $data_lokasi_list->alamat : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->rt)==false ? " RT. ".$data_lokasi_list->rt : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->rw)==false ? " RW. ".$data_lokasi_list->rw : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->desa)==false ? " Kel. ".ucwords(strtolower($data_lokasi_list->desa)) : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->kecamatan)==false ? ", Kec. ".ucwords(strtolower($data_lokasi_list->kecamatan )): "";
							echo $alamat;
							?>, untuk keperluan <?php echo $data_lokasi_list->peruntukan?> </span>
							</div></td>
					</tr>
					<tr>
						<td width="20%" height="22" valign="top"></td>
						<td width="1%" height="22" valign="top"></td>
						<td width="3%" height="22" valign="top" align="justify">b.</td>
						<td width="76%" height="22" valign="top" align="justify">Uraian
							Rencana <?php echo $data_lokasi_list->peruntukan?> di <?
							$alamat	= "";
							$alamat	.= $data_lokasi_list->alamat ? $data_lokasi_list->alamat : "";
							$alamat	.= $data_lokasi_list->rt ? " RT ".$data_lokasi_list->rt : "";
							$alamat	.= $data_lokasi_list->rw ? " RW ".$data_lokasi_list->rw : "";
							$alamat	.= $data_lokasi_list->desa ? " Kel. ".ucwords(strtolower($data_lokasi_list->desa)) : "";
							$alamat	.= $data_lokasi_list->kecamatan ? ", Kec. ".ucwords(strtolower($data_lokasi_list->kecamatan )): "";
							echo $alamat;
							?> &nbsp; Kota Bontang.</td>
					</tr>
					<tr>
						<td width="20%" height="15" valign="top"></td>
						<td width="1%" height="15" valign="top"></td>
						<td width="3%" height="15" valign="top" align="justify"></td>
						<td width="76%" height="15" valign="top" align="justify"></td>
					</tr>
					<tr>
						<td width="20%" height="1" valign="top" class="style3">MEMPERHATIKAN&nbsp;</td>
						<td width="1%" height="1" valign="top">:</td>
						<td width="3%" height="1" valign="top" align="justify">1.</td>
						<td width="76%" height="1" valign="top" align="justify"><?php echo $data_lokasi_list->point1?>
						</td>
					</tr>
					<tr>
						<td width="20%" height="1" valign="top" class="style3"></td>
						<td width="1%" height="1" valign="top">:</td>
						<td width="3%" height="1" valign="top" align="justify">2.</td>
						<td width="76%" height="1" valign="top" align="justify"><?php echo $data_lokasi_list->point1_2?>
						</td>
					</tr>
					<tr>
						<td width="20%" height="21" valign="top"></td>
						<td width="1%" height="21" valign="top"></td>
						<td width="3%" height="21" valign="top" align="justify">3.</td>
						<td width="76%" height="21" valign="top" align="justify">Rencana
							Tata Ruang Kota Bontang Tahun 2000-2010.</td>
					</tr>
					<tr>
						<td width="20%" height="15" valign="top"></td>
						<td width="1%" height="15" valign="top"></td>
						<td width="3%" height="15" valign="top" align="justify"></td>
						<td width="76%" height="15" valign="top" align="justify"></td>
					</tr>
					<tr>
						<td width="20%" height="40" valign="top" class="style3">MENIMBANG</td>
						<td width="1%" height="40" valign="top">:</td>
						<td width="3%" height="40" valign="top" align="justify">1.</td>
						<td width="76%" height="40" valign="top" align="justify">Bahwa
							saat ini Kota Bontang merupakan daerah yang pesat pertambahan
							penduduknya seiring dengan bergulirnya&nbsp;Otonomi Daerah;</td>
					</tr>
					<tr>
						<td width="20%" height="1" valign="top"></td>
						<td width="1%" height="1" valign="top"></td>
						<td width="3%" height="1" valign="top" align="justify">2.</td>
						<td width="76%" height="1" valign="top" align="justify"><?php echo $data_lokasi_list->point2?>
						</td>
					</tr>
					<tr>
						<td width="20%" height="1" valign="top"></td>
						<td width="1%" height="1" valign="top"></td>
						<td width="3%" height="1" valign="top" align="justify">3.</td>
						<td width="76%" height="1" valign="top" align="justify"><?php echo $data_lokasi_list->point3?>
						</td>
					</tr>
					<tr>
						<td width="20%" height="15" valign="top"></td>
						<td width="1%" height="15" valign="top"></td>
						<td width="3%" height="15" valign="top" align="justify"></td>
						<td width="76%" height="15" valign="top" align="justify"></td>
					</tr>
					<tr>
						<td width="20%" height="21" valign="top" class="style3">MENGINGAT</td>
						<td width="1%" height="21" valign="top">:</td>
						<td width="3%" height="21" valign="top" align="justify">1.</td>
						<td width="76%" height="21" valign="top" align="justify">
							Undang-undang Nomor 5 Tahun 1960 tentang Peraturan Dasar
							Pokok-pokok Agraria;</td>
					</tr>
					<tr>
						<td width="20%" height="21" valign="top"></td>
						<td width="1%" height="21" valign="middle"></td>
						<td width="3%" height="21" valign="top" align="justify">2.</td>
						<td width="76%" height="21" valign="top" align="justify">

							Undang-undang Nomor 23 Tahun 1997 tentang Pengelolaan Lingkungan
							Hidup;</td>
					</tr>
					<tr>
						<td width="20%" height="21" valign="top"></td>
						<td width="1%" height="21" valign="middle"></td>
						<td width="3%" height="21" valign="top" align="justify">3.</td>
						<td width="76%" height="21" valign="top" align="justify">

							Undang-undang Nomor 32 Tahun 2004 tentang Pemerintahan Daerah
							sebagaimana telah diubah dengan Undang-undang Nomor 12 Tahun
							2008;</td>
					</tr>
					<tr>
						<td width="20%" height="21" valign="top"></td>
						<td width="1%" height="21" valign="middle"></td>
						<td width="3%" height="21" valign="top" align="justify">4.</td>
						<td width="76%" height="21" valign="top" align="justify">

							Undang-undang Nomor 25 Tahun 2007 tentang Penanaman Modal;</td>
					</tr>
					<tr>
						<td width="20%" height="21" valign="top"></td>
						<td width="1%" height="21" valign="middle"></td>
						<td width="3%" height="21" valign="top" align="justify">5.</td>
						<td width="76%" height="21" valign="top" align="justify">

							Undang-undang Nomor 26 Tahun 2007 tentang Penataan Ruang;</td>
					</tr>
					<tr>
						<td width="20%" height="38" valign="top"></td>
						<td width="1%" height="38" valign="middle"></td>
						<td width="3%" height="38" valign="top" align="justify">6.</td>
						<td width="76%" height="38" valign="top" align="justify">

							Peraturan Pemerintah Nomor 13 Tahun 2010 tentang Jenis dan Tarif
							atas Jenis Penerimaan Negara Bukan Pajak yang Berlaku pada Badan
							Pertanahan Nasional (Lembaran Negara Republik Indonesia Tahun
							2010 Nomor 18, Tambahan Lembaran Negara Republik Indonesia Nomor
							5100);</td>
					</tr>
					<tr>
						<td width="20%" height="38" valign="top"></td>
						<td width="1%" height="38" valign="middle"></td>
						<td width="3%" height="38" valign="top" align="justify">7.</td>
						<td width="76%" height="38" valign="top" align="justify">

							Peraturan Menteri Negara Agraria/Kepala Badan Pertanahan Nasional
							Nomor 2 Tahun 1999 tentang Izin Lokasi;</td>
					</tr>
					<tr>
						<td width="20%" height="38" valign="top"></td>
						<td width="1%" height="38" valign="middle"></td>
						<td width="3%" height="38" valign="top" align="justify">8.</td>
						<td width="76%" height="38" valign="top" align="justify">

							Peraturan Kepala Badan Pertanahan Nasional Republik Indonesia
							Nomor 2 Tahun 2011 tentang Pedoman Pertimbangan Teknis Pertanahan
							dalam Penerbitan Izin Lokasi, Penetapan Lokasi dan Izin Perubahan
							Penggunaan Tanah.</td>
					</tr>
					<tr>
						<td width="20%" height="21" valign="top"></td>
						<td width="1%" height="21" valign="middle"></td>
						<td width="3%" height="21" valign="top" align="justify">9.</td>
						<td width="76%" height="21" valign="top" align="justify">Peraturan
							Daerah Kota Bontang Nomor 3 Tahun 2003 tentang Rencana Tata Ruang
							Wilayah Kota Bontang.</td>
					</tr>

				</table>
			</td>
		</tr>
		<tr>
			<td height="37" colspan="2" class="style3">
				<p align="center">MEMUTUSKAN :
			
			</td>
		</tr>
		<tr>
			<td height="600" colspan="2" class="style2">
				<table border="0" width="100%" height="657">
					<tr>
						<td width="21%" valign="top" height="93" class="style3">
							MENETAPKAN<br> PERTAMA</td>
						<td width="3%" valign="top" height="93"><font face="Arial"
							size="2">:</font></td>
						<td width="85%" valign="top" height="93">Memberikan ijin lokasi
							kepada <?php echo $data_permohonan_list->nama?> dengan alamat&nbsp; <?
							$alamat	= "";
							$alamat	.= $data_permohonan_list->alamat ? $data_permohonan_list->alamat : "";
							$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->rt)==false ? " RT. ".$data_permohonan_list->rt : "";
							$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->rw)==false ? " RW. ".$data_permohonan_list->rw : "";
							echo $alamat;
							?> untuk keperluan <?php echo $data_lokasi_list->peruntukan?>&nbsp;&nbsp;&nbsp;
							seluas <u>+</u> <?php echo number_format($data_lokasi_list->luas,2,",",".")?> M<sup>2</sup>
							di <?php
							$alamat	= "";
							$alamat	.= $data_lokasi_list->alamat ? $data_lokasi_list->alamat : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->rt)==false  ? " RT. ".$data_lokasi_list->rt : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->rw)==false  ? " RW. ".$data_lokasi_list->rw : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->desa)==false  ? " Kel. ".ucwords(strtolower($data_lokasi_list->desa)) : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->kecamatan)==false ? ", Kec. ".ucwords(strtolower($data_lokasi_list->kecamatan )): "";
							echo $alamat;
							?> &nbsp; Kota Bontang, sebagaimana tercantum dalam Peta Lokasi
							Tanah pada Lampiran surat keputusan ini.</td>
					</tr>
					<tr>
						<td width="21%" rowspan="2" valign="top" height="150"
							class="style3">KEDUA &nbsp;</td>
						<td width="3%" rowspan="2" valign="top" height="150"><font
							face="Arial" size="2">:</font></td>
						<td width="85%" valign="top" height="10">Pemberian ijin lokasi ini
							disertai persyaratan sebagai berikut:</td>
					</tr>
					<tr>
						<td width="85%" valign="top">
							<table width="100%" height="289" border="0" cellpadding="0"
								cellspacing="0">
								<tr>
									<td width="4%" height="40" valign="top">1.</td>
									<td width="96%" valign="top" align="justify">
										Menyelesaikan/melepaskan hak-hak masyarakat/pihak lain apabila
										ditemukan di atas tanah yang diberikan ijin lokasi,
										berdasarkan ketentuan yang berlaku;</td>
								</tr>
								<tr>
									<td width="4%" height="55" valign="top">2.</td>
									<td width="96%" valign="top" align="justify">Perolehan tanah
										harus diselesaikan dalam jangka waktu <?php echo $this->String_model->getLamaIjin($data_lokasi_list->luas) ?>
										sejak tanggal ditetapkan keputusan ini dan apabila memenuhi
										persyaratan dapat diperpanjang untuk paling lama 12 (dua
										belas) bulan, melalui proses permohonan perpanjangan ijin
										lokasi;</td>
								</tr>
								<tr>
									<td width="4%" height="55" valign="top">3.</td>
									<td width="96%" valign="top" align="justify">Luas dan batas
										tanah yang tercantum dalam Peta Lokasi yang menjadi Lampiran
										Surat Keputusan ini belum berarti sama dengan luas yang akan
										diberikan haknya, adapun luas yang akan diberikan hak setelah
										dilakukan pengukuran secara kadasteral;</td>
								</tr>
								<tr>
									<td width="4%" height="41" valign="top">4.</td>
									<td width="96%" valign="top" align="justify">Membuat laporan
										perkembangan kegiatan setiap 3 (tiga) bulan sekali kepada
										Walikota Bontang yang tembusannya disampaikan kepada Kantor
										Pertanahan Kota Bontang;</td>
								</tr>
								<tr>
									<td width="4%" height="40" valign="top">5.</td>
									<td width="96%" valign="top" align="justify">Penerima ijin
										lokasi dalam mendirikan bangunan agar memperhatikan
										ketentuan-ketentuan yang ditetapkan oleh Pemerintah Kota
										Bontang;</td>
								</tr>
								<tr>
									<td width="4%" height="43" valign="top">6.</td>
									<td width="96%" valign="top" align="justify">Segera
										menyelesaikan ijin-ijin yang diperlukan seperti Ijin
										Mendirikan Bangunan (IMB), <?php echo $data_lokasi_list->point6?> serta
										perijinan lainnya kepada instansi berwenang;</td>
								</tr>
								<tr>
									<td width="4%" height="40" valign="top">7.</td>
									<td width="96%" valign="top" align="justify">Ijin Lokasi ini
										bukan merupakan hak atas tanah dan tidak berlaku untuk
										dialihkan dalam bentuk apapun.</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td width="21%" valign="top" height="5"></td>
						<td width="3%" valign="top" height="5"></td>
						<td width="85%" height="5"></td>
					</tr>
					<tr>
						<td width="21%" valign="top" height="56" class="style3">KETIGA</td>
						<td width="3%" valign="top" height="56">:</td>
						<td width="85%" valign="top" height="56" align="justify">Surat
							Keputusan ini berlaku selama <?php $this->String_model->getLamaIjin($data_lokasi_list->luas) ?>
							sejak tanggal ditetapkan, dan atas permohonan yang bersangkutan
							dapat diperpanjang satu kali selama 12 (dua belas) bulan apabila
							tanah yang sudah diperoleh mencapai 50% dari luas tanah yang
							ditunjuk dalam ijin lokasi ini.</td>
					</tr>
					<tr>
						<td width="21%" valign="top" height="1"></td>
						<td width="3%" valign="top" height="1"></td>
						<td width="85%" height="1"></td>
					</tr>
					<tr>
						<td width="21%" valign="top" height="73" class="style3">KEEMPAT</td>
						<td width="3%" valign="top" height="73">:</td>
						<td width="85%" valign="top" height="73" align="justify">Apabila
							Surat Keputusan ini telah berakhir masa berlakunya dan tidak
							mengajukan perpanjangan, maka pemegang ijin lokasi ini dianggap
							tidak berminat lagi untuk meneruskan usahanya dan ijin lokasi
							gugur dengan sendirinya. Selanjutnya lokasi tersebut akan
							diberikan kepada pihak lain yang memerlukan tanpa pemberitahuan
							terlebih dahulu.</td>
					</tr>
					<tr>
						<td width="21%" valign="top" height="1"></td>
						<td width="3%" valign="top" height="1"></td>
						<td width="85%" height="1" valign="top"></td>
					</tr>
					<tr>
						<td width="21%" valign="top" height="1" class="style3">KELIMA</td>
						<td width="3%" valign="top" height="1"><font face="Arial" size="2">:</font>
						</td>
						<td width="85%" height="1" valign="top" align="justify">Apabila
							dalam penetapan ini dikemudian hari ternyata terdapat kekeliruan,
							akan diadakan perbaikan serta perubahan seperlunya.</td>
					</tr>
					<tr>
						<td width="21%" valign="top" height="1">&nbsp;</td>
						<td width="3%" valign="top" height="1"></td>
						<td width="85%" height="1"><br> Keputusan ini mulai berlaku sejak
							tanggal ditetapkan.</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td width="394" height="200"></td>
			<td width="316" height="200">
				<table border="0" width="100%" height="198" cellspacing="0"
					cellpadding="3">
					<tr class="style2">
						<td width="48%" height="16" style="padding-left: 60px">Ditetapkan
							di</td>
						<td width="4%" height="16">:</td>
						<td width="48%" height="16">Bontang</td>
					</tr>
					<tr class="style2">
						<td width="48%" height="16" style="padding-left: 60px">Pada
							tanggal</td>
						<td width="4%" height="16">:</td>
						<td width="48%" height="16"><?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglsk)?>
						</td>
					</tr>

					<tr>
						<td height="152" colspan="3" align="center"><span class="style3">
						<?php echo isset($data_permohonan_list->jabatan) ? $data_permohonan_list->jabatan : '&nbsp;'?>
						</span> <br> <br> <br> <br> <br> <span class="style3"> <?php echo isset($data_permohonan_list->pejabat) ? $data_permohonan_list->pejabat : '&nbsp;'?>
						</span> <br> <span class="style2"> <?php echo isset($data_permohonan_list->pangkat) ? $data_permohonan_list->pangkat : '&nbsp;'?>
						</span>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="left" class="style4">Tembusan disampaikan
				kepada Yth :</td>
		</tr>
		<tr>
			<td colspan="2" align="left" class="style5">
				<table border="0" width="61%" cellspacing="0" cellpadding="0">
					<tr>
						<td width="5%">1.</td>
						<td width="95%">Gubernur Kalimantan Timur di Samarinda;</td>
					</tr>
					<tr>
						<td width="5%">2.</td>
						<td width="95%">Kepala Kanwil BPN Provinsi Kalimantan Timur
							di-Samarinda;</td>
					</tr>
					<tr>
						<td width="5%">3.</td>
						<td width="95%">Kepala Inspektorat Wilayah Kota Bontang
							di-Bontang;</td>
					</tr>
					<tr>
						<td width="5%">4.</td>
						<td width="95%">Kepala Bappeda Kota Bontang di-Bontang;</td>
					</tr>
					<tr>
						<td width="5%">5.</td>
						<td width="95%">Kepala Dinas Tata Ruang Kota Bontang di-Bontang;</td>
					</tr>
					<tr>
						<td width="5%">6.</td>
						<td width="95%">Kepala Kantor Pertanahan Kota Bontang di-Bontang;</td>
					</tr>
					<tr>
						<td width="5%">7.</td>
						<td width="95%">Bagian Pemerintahan Sekretariat Daerah Kota
							Bontang di-Bontang;</td>
					</tr>
					<tr>
						<td width="5%">8.</td>
						<td width="95%">Camat <?php echo $data_lokasi_list->kecamatan?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2"></td>
		</tr>
	</table>
</div>    
</body>
</html>


<?php
	}else if($jenis=="skatas"){

		$data_permohonan_list = $this->Permohonan_cetak_model->get_detil_permohonan($id);	
		$data_lokasi_list = $this->Lokasi_cetak_sk_model->get_detil_lokasi_by_permohonan_id($id);			
		$pejabat_list = $this->Permohonan_cetak_model->get_pejabat(4);
		
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
	font-family: Times New Roman, Times, serif, Arial, Helvetica, sans-serif;
	text-align: justify;
	color: #000000;
	margin: 47px 0px 0px 0px;
	word-spacing: 0;
}

.style1 {
	font-size: 13px;
	font-weight: bold;
	word-spacing: 0
}

.style2 {
	font-size: 11.0pt;
	font-weight: normal
}

.style3 {
	font-size: 11.0pt;
	font-weight: bold;
	word-spacing: 0
}

.style4 {
	font-size: 11.0pt;
	font-weight: bold;
	word-spacing: 0;
	text-decoration: underline
}
-->
</style>
<title>Sistem Perijinan Kota Bontang</title>
</head>

<body onLoad="printDiv('printableArea')">

<div id="printableArea">

	<table width="720" border="0" align="center">
		<tr>
			<td colspan="2"><br>
			</td>
		</tr>
		<tr>
			<td colspan="2"><br>
			</td>
		</tr>
		<tr>
			<td colspan="2"><br>
			</td>
		</tr>
		<tr>
			<td colspan="2"><br>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2" class="style3"><br> <br> <br>
				KEPUTUSAN WALIKOTA BONTANG</td>
		</tr>
		<tr>
			<td align="center" colspan="2" class="style3">NOMOR : <?php echo $data_permohonan_list->nosk?>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2" class="style3"><br> <br> TENTANG</td>
		</tr>
		<tr>
			<td align="center" colspan="2" class="style3">PEMBERIAN IJIN LOKASI
				UNTUK KEPERLUAN&nbsp; <br> <?php echo $data_lokasi_list->peruntukan ? strtoupper($data_lokasi_list->peruntukan) : "&nbsp;"?>&nbsp;</td>
		</tr>
		<tr>
			<td align="center" colspan="2" class="style3"><br> WALIKOTA BONTANG <br>
				<br></td>
		</tr>
		<tr>
			<td height="543" colspan="2" class="style2">

				<table border="0" width="100%" height="529">
					<tr>
						<td width="20%" height="43" valign="top" class="style3">MEMBACA</td>
						<td width="1%" height="43" valign="top">:</td>
						<td width="3%" height="43" valign="top" align="justify">a.</td>
						<td width="76%" height="43" valign="top" align="justify">Surat
							permohonan <?php echo $data_permohonan_list->nama?> tanggal <?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglpermohonan)?>
							dengan alamat <?
							$alamat	= "";
							$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->alamat)==false ? $data_permohonan_list->alamat : "";
							$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->rt)==false ? " RT. ".$data_permohonan_list->rt : "";
							$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->rw)==false ? " RW. ".$data_permohonan_list->rw : "";
							echo $alamat;
							?> perihal Permohonan Ijin Lokasi untuk&nbsp; <?php echo $data_lokasi_list->peruntukan?>
							seluas&nbsp;&nbsp; <u>+</u> <?php echo number_format($data_lokasi_list->luas,2,",",".")?>
							M<sup>2</sup> terletak di <?
							$alamat	= "";
							$alamat	.= $data_lokasi_list->alamat ? $data_lokasi_list->alamat : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->rt)==false ? " RT. ".$data_lokasi_list->rt : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->rw)==false ? " RW. ".$data_lokasi_list->rw : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->desa)==false ? " Kel. ".ucwords(strtolower($data_lokasi_list->desa)) : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->kecamatan)==false ? ", Kec. ".ucwords(strtolower($data_lokasi_list->kecamatan )): "";
							echo $alamat;
							?>, untuk keperluan <?php echo $data_lokasi_list->peruntukan?> </span>
							</div></td>
					</tr>
					<tr>
						<td width="20%" height="22" valign="top"></td>
						<td width="1%" height="22" valign="top"></td>
						<td width="3%" height="22" valign="top" align="justify">b.</td>
						<td width="76%" height="22" valign="top" align="justify">Uraian
							Rencana <?php echo $data_lokasi_list->peruntukan?> di <?
							$alamat	= "";
							$alamat	.= $data_lokasi_list->alamat ? $data_lokasi_list->alamat : "";

							$alamat	.= $data_lokasi_list->rt ? " RT ".$data_lokasi_list->rt : "";
							$alamat	.= $data_lokasi_list->rw ? " RW ".$data_lokasi_list->rw : "";
							$alamat	.= $data_lokasi_list->desa ? " Kel. ".ucwords(strtolower($data_lokasi_list->desa)) : "";
							$alamat	.= $data_lokasi_list->kecamatan ? ", Kec. ".ucwords(strtolower($data_lokasi_list->kecamatan )): "";
							echo $alamat;
							?> &nbsp; Kota Bontang.</td>
					</tr>
					<tr>
						<td width="20%" height="15" valign="top"></td>
						<td width="1%" height="15" valign="top"></td>
						<td width="3%" height="15" valign="top" align="justify"></td>
						<td width="76%" height="15" valign="top" align="justify"></td>
					</tr>
					<tr>
						<td width="20%" height="1" valign="top" class="style3">MEMPERHATIKAN&nbsp;</td>
						<td width="1%" height="1" valign="top">:</td>
						<td width="3%" height="1" valign="top" align="justify">1.</td>
						<td width="76%" height="1" valign="top" align="justify"><?php echo $data_lokasi_list->point1?>
						</td>
					</tr>
					<tr>
						<td width="20%" height="1" valign="top" class="style3"></td>
						<td width="1%" height="1" valign="top">:</td>
						<td width="3%" height="1" valign="top" align="justify">2.</td>
						<td width="76%" height="1" valign="top" align="justify"><?php echo $data_lokasi_list->point1_2?>
						</td>
					</tr>
					<tr>
						<td width="20%" height="21" valign="top"></td>
						<td width="1%" height="21" valign="top"></td>
						<td width="3%" height="21" valign="top" align="justify">3.</td>
						<td width="76%" height="21" valign="top" align="justify">Rencana
							detail Tata Ruang Kota Bontang Tahun 2000-2010.</td>
					</tr>
					<tr>
						<td width="20%" height="15" valign="top"></td>
						<td width="1%" height="15" valign="top"></td>
						<td width="3%" height="15" valign="top" align="justify"></td>
						<td width="76%" height="15" valign="top" align="justify"></td>
					</tr>
					<tr>
						<td width="20%" height="40" valign="top" class="style3">MENIMBANG</td>
						<td width="1%" height="40" valign="top">:</td>
						<td width="3%" height="40" valign="top" align="justify">1.</td>
						<td width="76%" height="40" valign="top" align="justify">Bahwa
							saat ini Kota Bontang merupakan daerah yang pesat pertambahan
							penduduknya seiring dengan bergulirnya&nbsp;otonomi Daerah;</td>
					</tr>
					<tr>
						<td width="20%" height="1" valign="top"></td>
						<td width="1%" height="1" valign="top"></td>
						<td width="3%" height="1" valign="top" align="justify">2.</td>
						<td width="76%" height="1" valign="top" align="justify"><?php echo $data_lokasi_list->point2?>
						</td>
					</tr>
					<tr>
						<td width="20%" height="1" valign="top"></td>
						<td width="1%" height="1" valign="top"></td>
						<td width="3%" height="1" valign="top" align="justify">3.</td>
						<td width="76%" height="1" valign="top" align="justify"><?php echo $data_lokasi_list->point3?>
						</td>
					</tr>
					<tr>
						<td width="20%" height="15" valign="top"></td>
						<td width="1%" height="15" valign="top"></td>
						<td width="3%" height="15" valign="top" align="justify"></td>
						<td width="76%" height="15" valign="top" align="justify"></td>
					</tr>
					<tr>
						<td width="20%" height="21" valign="top" class="style3">MENGINGAT</td>
						<td width="1%" height="21" valign="top">:</td>
						<td width="3%" height="21" valign="top" align="justify">1.</td>
						<td width="76%" height="21" valign="top" align="justify">
							Undang-undang Nomor 5 Tahun 1960 tentang Peraturan Dasar
							Pokok-pokok Agraria;</td>
					</tr>
					<tr>
						<td width="20%" height="21" valign="top"></td>
						<td width="1%" height="21" valign="middle"></td>
						<td width="3%" height="21" valign="top" align="justify">2.</td>
						<td width="76%" height="21" valign="top" align="justify">

							Undang-undang Nomor 23 Tahun 1997 tentang Pengelolaan Lingkungan
							Hidup;</td>
					</tr>
					<tr>
						<td width="20%" height="21" valign="top"></td>
						<td width="1%" height="21" valign="middle"></td>
						<td width="3%" height="21" valign="top" align="justify">3.</td>
						<td width="76%" height="21" valign="top" align="justify">

							Undang-undang Nomor 32 Tahun 2004 tentang Pemerintahan Daerah
							sebagaimana telah diubah dengan Undang-undang Nomor 12 Tahun
							2008;</td>
					</tr>
					<tr>
						<td width="20%" height="21" valign="top"></td>
						<td width="1%" height="21" valign="middle"></td>
						<td width="3%" height="21" valign="top" align="justify">4.</td>
						<td width="76%" height="21" valign="top" align="justify">

							Undang-undang Nomor 25 Tahun 2007 tentang Penanaman Modal;</td>
					</tr>
					<tr>
						<td width="20%" height="21" valign="top"></td>
						<td width="1%" height="21" valign="middle"></td>
						<td width="3%" height="21" valign="top" align="justify">5.</td>
						<td width="76%" height="21" valign="top" align="justify">

							Undang-undang Nomor 26 Tahun 2007 tentang Penataan Ruang;</td>
					</tr>
					<tr>
						<td width="20%" height="38" valign="top"></td>
						<td width="1%" height="38" valign="middle"></td>
						<td width="3%" height="38" valign="top" align="justify">6.</td>
						<td width="76%" height="38" valign="top" align="justify">

							Peraturan Pemerintah Nomor 13 Tahun 2010 tentang Jenis dan Tarif
							atas Jenis Penerimaan Negara Bukan Pajak yang Berlaku pada Badan
							Pertanahan Nasional (Lembaran Negara Republik Indonesia Tahun
							2010 Nomor 18, Tambahan Lembaran Negara Republik Indonesia Nomor
							5100);</td>
					</tr>
					<tr>
						<td width="20%" height="38" valign="top"></td>
						<td width="1%" height="38" valign="middle"></td>
						<td width="3%" height="38" valign="top" align="justify">7.</td>
						<td width="76%" height="38" valign="top" align="justify">

							Peraturan Menteri Negara Agraria/Kepala Badan Pertanahan Nasional
							Nomor 2 Tahun 1999 tentang Izin Lokasi;</td>
					</tr>
					<tr>
						<td width="20%" height="38" valign="top"></td>
						<td width="1%" height="38" valign="middle"></td>
						<td width="3%" height="38" valign="top" align="justify">8.</td>
						<td width="76%" height="38" valign="top" align="justify">

							Peraturan Kepala Badan Pertanahan Nasional Republik Indonesia
							Nomor 2 Tahun 2011 tentang Pedoman Pertimbangan Teknis Pertanahan
							dalam Penerbitan Izin Lokasi, Penetapan Lokasi dan Izin Perubahan
							Penggunaan Tanah.</td>
					</tr>
					<tr>
						<td width="20%" height="21" valign="top"></td>
						<td width="1%" height="21" valign="middle"></td>
						<td width="3%" height="21" valign="top" align="justify">9.</td>
						<td width="76%" height="21" valign="top" align="justify">

							Peraturan Daerah Kota Bontang Nomor 3 Tahun 2003 tentang Rencana
							Tata Ruang Wilayah Kota Bontang.</td>
					</tr>

				</table>
			</td>
		</tr>
		<tr>
			<td height="37" colspan="2" class="style3">
				<p align="center">MEMUTUSKAN :
			
			</td>
		</tr>
		<tr>
			<td height="600" colspan="2" class="style2">
				<table border="0" width="100%" height="657">
					<tr>
						<td width="21%" valign="top" height="93" class="style3">
							MENETAPKAN<br> PERTAMA</td>
						<td width="3%" valign="top" height="93"><font face="Arial"
							size="2">:</font></td>
						<td width="85%" valign="top" height="93">Memberikan ijin lokasi
							kepada <?php echo $data_permohonan_list->nama?> dengan alamat&nbsp; <?
							$alamat	= "";
							$alamat	.= $data_permohonan_list->alamat ? $data_permohonan_list->alamat : "";
							$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->rt)==false ? " RT. ".$data_permohonan_list->rt : "";
							$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->rw)==false ? " RW. ".$data_permohonan_list->rw : "";
							echo $alamat;
							?> untuk keperluan <?php echo $data_lokasi_list->peruntukan?>&nbsp;&nbsp;&nbsp;
							seluas <u>+</u> <?php echo number_format($data_lokasi_list->luas,2,",",".")?> M<sup>2</sup>
							di <?
							$alamat	= "";
							$alamat	.= $data_lokasi_list->alamat ? $data_lokasi_list->alamat : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->rt)==false  ? " RT. ".$data_lokasi_list->rt : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->rw)==false  ? " RW. ".$data_lokasi_list->rw : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->desa)==false  ? " Kel. ".ucwords(strtolower($data_lokasi_list->desa)) : "";
							$alamat	.= $this->String_model->IsEmpty($data_lokasi_list->kecamatan)==false ? ", Kec. ".ucwords(strtolower($data_lokasi_list->kecamatan )): "";
							echo $alamat;
							?> &nbsp; Kota Bontang, sebagaimana tercantum dalam Peta Lokasi
							Tanah pada Lampiran surat keputusan ini.</td>
					</tr>
					<tr>
						<td width="21%" rowspan="2" valign="top" height="150"
							class="style3">KEDUA &nbsp;</td>
						<td width="3%" rowspan="2" valign="top" height="150"><font
							face="Arial" size="2">:</font></td>
						<td width="85%" valign="top" height="10">Pemberian ijin lokasi ini
							disertai persyaratan sebagai berikut:</td>
					</tr>
					<tr>
						<td width="85%" valign="top">
							<table width="100%" height="309" border="0" cellpadding="0"
								cellspacing="0">
								<tr>
									<td width="4%" height="40" valign="top">1.</td>
									<td width="96%" valign="top" align="justify">
										Menyelesaikan/melepaskan hak-hak masyarakat/pihak lain apabila
										ditemukan di atas tanah yang diberikan ijin lokasi,
										berdasarkan ketentuan yang berlaku;</td>
								</tr>
								<tr>
									<td width="4%" height="55" valign="top">2.</td>
									<td width="96%" valign="top" align="justify">Perolehan tanah
										harus diselesaikan dalam jangka waktu <?php echo $this->String_model->getLamaIjin($data_lokasi_list->luas) ?>
										sejak tanggal ditetapkan keputusan ini dan apabila memenuhi
										persyaratan dapat diperpanjang untuk paling lama 12 (dua
										belas) bulan, melalui proses permohonan perpanjangan ijin
										lokasi;</td>
								</tr>
								<tr>
									<td width="4%" height="55" valign="top">3.</td>
									<td width="96%" valign="top" align="justify">Luas dan batas
										tanah yang tercantum dalam Peta Lokasi yang menjadi Lampiran
										Surat Keputusan ini belum berarti sama dengan luas yang akan
										diberikan haknya, adapun luas yang akan diberikan hak setelah
										dilakukan pengukuran secara kadasteral;</td>
								</tr>
								<tr>
									<td width="4%" height="41" valign="top">4.</td>
									<td width="96%" valign="top" align="justify">Membuat laporan
										perkembangan kegiatan setiap 3 (tiga) bulan sekali kepada
										Walikota Bontang yang tembusannya disampaikan kepada Kantor
										Pertanahan Kota Bontang;</td>
								</tr>
								<tr>
									<td width="4%" height="40" valign="top">5.</td>
									<td width="96%" valign="top" align="justify">Penerima ijin
										lokasi dalam mendirikan bangunan agar memperhatikan
										ketentuan-ketentuan yang ditetapkan oleh Pemerintah Kota
										Bontang;</td>
								</tr>
								<tr>
									<td width="4%" height="43" valign="top">6.</td>
									<td width="96%" valign="top" align="justify">Segera
										menyelesaikan ijin-ijin yang diperlukan seperti Ijin
										Mendirikan Bangunan (IMB), UKL dan UPL serta perijinan lainnya
										kepada instansi berwenang;</td>
								</tr>
								<tr>
									<td width="4%" height="40" valign="top">7.</td>
									<td width="96%" valign="top" align="justify">Ijin Lokasi ini
										bukan merupakan hak atas tanah dan tidak berlaku untuk
										dialihkan dalam bentuk apapun.</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td width="21%" valign="top" height="5"></td>
						<td width="3%" valign="top" height="5"></td>
						<td width="85%" height="5"></td>
					</tr>
					<tr>
						<td width="21%" valign="top" height="56" class="style3">KETIGA</td>
						<td width="3%" valign="top" height="56">:</td>
						<td width="85%" valign="top" height="56" align="justify">Surat
							Keputusan ini berlaku selama <?php echo $this->String_model->getLamaIjin($data_lokasi_list->luas) ?>
							sejak tanggal ditetapkan, dan atas permohonan yang bersangkutan
							dapat diperpanjang satu kali selama 12 (dua belas) bulan apabila
							tanah yang sudah diperoleh mencapai 50% dari luas tanah yang
							ditunjuk dalam ijin lokasi ini.</td>
					</tr>
					<tr>
						<td width="21%" valign="top" height="1"></td>
						<td width="3%" valign="top" height="1"></td>
						<td width="85%" height="1"></td>
					</tr>
					<tr>
						<td width="21%" valign="top" height="73" class="style3">KEEMPAT</td>
						<td width="3%" valign="top" height="73">:</td>
						<td width="85%" valign="top" height="73" align="justify">Apabila
							Surat Keputusan ini telah berakhir masa berlakunya dan tidak
							mengajukan perpanjangan, maka pemegang ijin lokasi ini dianggap
							tidak berminat lagi untuk meneruskan usahanya dan ijin lokasi
							gugur dengan sendirinya. Selanjutnya lokasi tersebut akan
							diberikan kepada pihak lain yang memerlukan tanpa pemberitahuan
							terlebih dahulu.</td>
					</tr>
					<tr>
						<td width="21%" valign="top" height="1"></td>
						<td width="3%" valign="top" height="1"></td>
						<td width="85%" height="1" valign="top"></td>
					</tr>
					<tr>
						<td width="21%" valign="top" height="1" class="style3">KELIMA</td>
						<td width="3%" valign="top" height="1"><font face="Arial" size="2">:</font>
						</td>
						<td width="85%" height="1" valign="top" align="justify">Apabila
							dalam penetapan ini dikemudian hari ternyata terdapat kekeliruan,
							akan diadakan perbaikan serta perubahan seperlunya.</td>
					</tr>
					<tr>
						<td width="21%" valign="top" height="40">&nbsp;</td>
						<td width="3%" valign="top" height="40"></td>
						<td width="85%" height="40"><br> Keputusan ini mulai berlaku sejak
							tanggal ditetapkan.</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td width="394" height="200"></td>
			<td width="316" height="200">
				<table border="0" width="100%" height="209" cellspacing="0"
					cellpadding="3">
					<tr class="style2">
						<td width="48%" height="16" style="padding-left: 60px">Ditetapkan
							di</td>
						<td width="4%" height="16">:</td>
						<td width="48%" height="16">Bontang</td>
					</tr>
					<tr class="style2">
						<td width="48%" height="16" style="padding-left: 60px">Pada
							tanggal</td>
						<td width="4%" height="16">:</td>
						<td width="48%" height="16"><?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglsk)?>
						</td>
					</tr>

					<tr>
						<td height="157" colspan="3" align="center"><span class="style3"
							style="color: #FFFFFF"> <?php echo isset($data_permohonan_list->jabatan) ? $data_permohonan_list->jabatan : '&nbsp;'?>
						</span> <br> <br> <br> <br> <br> <span class="style4"
							style="color: #FFFFFF"> <?php echo isset($data_permohonan_list->pejabat) ? $data_permohonan_list->pejabat : '&nbsp;'?>
						</span> <br> <span class="style2" style="color: #FFFFFF"> <?php echo isset($data_permohonan_list->pangkat) ? $data_permohonan_list->pangkat : '&nbsp;'?>
						</span>
						</td>

					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="left" class="style4">Tembusan disampaikan
				kepada Yth :</td>
		</tr>
		<tr>
			<td colspan="2" align="left" class="style2">
				<table border="0" width="61%" cellspacing="0" cellpadding="0">
					<tr>
						<td width="5%">1.</td>
						<td width="95%">Gubernur Kalimantan Timur di Samarinda;</td>
					</tr>
					<tr>
						<td width="5%">2.</td>
						<td width="95%">Kepala Kanwil BPN Provinsi Kalimantan Timur
							di-Samarinda;</td>
					</tr>
					<tr>
						<td width="5%">3.</td>
						<td width="95%">Kepala Inspektorat Wilayah Kota Bontang
							di-Bontang;</td>
					</tr>
					<tr>
						<td width="5%">4.</td>
						<td width="95%">Kepala Bappeda Kota Bontang di-Bontang;</td>
					</tr>
					<tr>
						<td width="5%">5.</td>
						<td width="95%">Kepala Dinas Tata Ruang Kota Bontang di-Bontang;</td>
					</tr>
					<tr>
						<td width="5%">6.</td>
						<td width="95%">Kepala Kantor Pertanahan Kota Bontang di-Bontang;</td>
					</tr>
					<tr>
						<td width="5%">7.</td>
						<td width="95%">Bagian Pemerintahan Sekretariat Daerah Kota
							Bontang di-Bontang;</td>
					</tr>
					<tr>
						<td width="5%">8.</td>
						<td width="95%">Camat <?php echo $data_lokasi_list->kecamatan?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2"></td>
		</tr>
	</table>
</div>    
</body>
</html>


<?php
	}else if($jenis=="kontrol"){

		$data_permohonan_list = $this->Permohonan_cetak_model->get_detil_permohonan($id);?>

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
				<table width="100%" border="0" cellspacing="0" cellpadding="3">
					<tr valign="top">
						<td height="28" align="left" class="style1">Nama Pemohon / Nama
							Perusahaan</td>
						<td align="center">:</td>
						<td align="left" class="style2"><?php echo $data_permohonan_list->nama;?></td>
					</tr>
					<tr valign="top">
						<td height="28" align="left" class="style1">Alamat</td>
						<td align="center">:</td>
						<td align="left" class="style2"><?php echo $data_permohonan_list->alamat?> <?php echo $this->String_model->IsEmpty($data_permohonan_list->rt)==false ? " RT. ".$data_permohonan_list->rt : ""?>
						<?php echo $this->String_model->IsEmpty($data_permohonan_list->rw)==false ? " RW. ".$data_permohonan_list->rw : ""?>
						</td>
					</tr>
					<tr valign="top">
						<td align="left" class="style1">Tanggal Masuk</td>
						<td align="center">:</td>
						<td height="30" align="left" class="style2"><?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglpermohonan)?>
						</td>
					</tr>
					<tr valign="top">
						<td width="34%" align="left" class="style1">Nomor Agenda</td>
						<td width="2%" align="center">:</td>
						<td width="64%" height="30" align="left" class="style2">&nbsp;</td>
					</tr>
					<tr valign="top">
						<td width="34%" align="left" class="style1">Jenis Permohonan</td>
						<td width="2%" align="center">:</td>
						<td width="64%" height="30" align="left" class="style2"><?php echo $data_permohonan_list->jenispermohonan?>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td height="64" colspan="3" align="center" valign="middle"
				style="font-family: 'Times New Roman', Times, serif; font-size: 16px; font-weight: bold; margin-top: 10px; margin-bottom: 10px">
				IJIN LOKASI</td>
		</tr>
		<tr>
			<td height="39" colspan="3" style="padding-left: 20px">I. Daftar
				Kelengkapan Permohonan</td>
		</tr>
		<tr>
			<td colspan="3" style="padding-left: 20px">
				<table width="100%" border="1" cellpadding="3" cellspacing="0"
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
						<td align="center"><?php echo $i?>.</td>
						<td style="padding-left: 10px"><?php echo $val_data_syarat->syarat?></td>
						<td align="center"><?php echo $val_data_syarat->keterangan ? $val_data_syarat->keterangan : "-"?>
						</td>
					</tr>
					<?
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
					border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
					<tr align="center" valign="middle">
						<td width="4%">No.</td>
						<td width="30%">Diterima Oleh</td>
						<td width="30%">Jabatan</td>
						<td width="15%">Tanggal</td>
						<td width="15%">Tanda Tangan</td>
						<td width="17%">Keterangan</td>
					</tr>
					<tr align="center">
						<td>1.</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr align="center">
						<td>2.</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr align="center">
						<td>3.</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</table></td>
		</tr>
	</table>
</div>    
</body>
</html>

<?php
	}else if($jenis=="bukti"){

		$data_permohonan_list = $this->Permohonan_cetak_model->get_detil_permohonan($id);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Sistem Perijinan Kota Bontang</title>

</head>
<body onLoad="window.print()">
	<table width="700" border="0" align="center" cellpadding="0"
		cellspacing="0" style="border: 5px double #000;">
		<tr>
			<td height="106" colspan="3" align="center"><img
				src="../images/logo3.gif" width="60"> <span
					style="color: #000000; font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 24px">
				</span>
			
			</td>
			<td width="502" align="center"><span
				style="color: #000000; font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 18px">BUKTI
					PENERIMAAN DOKUMEN IJIN LOKASI </span> <br /> <span
				style="color: #000000; font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 18px">
					BADAN PELAYANAN PERIJINAN TERPADU DAN PENANAMAN MODAL </span> <br />
				<span
				style="color: #000000; font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 18px">
					KOTA BONTANG </span> <br /> <span
				style="color: #000000; font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: 16px">
					Telp. (0548) 20594; Fax. (0548) 20598</span>
			</td>
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
						<td width="27%">No. Registrasi</td>
						<td width="2%" align="center">:</td>
						<td width="71%" height="30"><?php echo $data_permohonan_list->noregistrasi?></td>
					</tr>
					<tr valign="top">
						<td width="22%">Nama Pemohon</td>
						<td width="4%" align="center">:</td>
						<td width="74%" height="30"><?php echo $data_permohonan_list->nama?></td>
					</tr>
					<tr valign="top">
						<td>Alamat</td>
						<td align="center">:</td>
						<td height="30"><?
						$alamat	= "";
						$alamat	.= $data_permohonan_list->alamat ? $data_permohonan_list->alamat : "";
						$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->rt)==false ? " RT. ".$data_permohonan_list->rt : "";
						$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->rw)==false ? " RW. ".$data_permohonan_list->rw : "";
						$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->desa)==false ? " Kel. ".ucwords(strtolower($data_permohonan_list->desa)) : "";
						$alamat	.= $this->String_model->IsEmpty($data_permohonan_list->kecamatan)==false ? " Kec. ".ucwords(strtolower($data_permohonan_list->kecamatan )): "";
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
					<tr valign="top">
						<td height="30">Perkiraan Selesai</td>
						<td align="center">:</td>
						<td><?php echo $this->Permohonan_cetak_model->get_tgl_selesai(10);?>&nbsp;</td>
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
							<?php echo isset($_SESSION['ss_nama']) ? $_SESSION['ss_nama'] : "&nbsp;"?>
						</span> <br> <span
								style="color: #000000; font-family: 'Times New Roman', Times, serif; font-size: 12px; font-weight: bold; text-decoration: none">
									NIP. <?php echo isset($_SESSION['ss_nip']) ? $_SESSION['ss_nip'] : "&nbsp;"?>
							</span>
						
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
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