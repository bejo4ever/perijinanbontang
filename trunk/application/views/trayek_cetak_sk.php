<?php

	$bulan = array("1"=>"Januari","2"=>"Februari","3"=>"Maret","4"=>"April","5"=>"Mei","6"=>"Juni","7"=>"Juli","8"=>"Agustus","9"=>"September","10"=>"Oktober","11"=>"Nopember","12"=>"Desember");	
	$hariIndo = array("1"=>"Senin","2"=>"Selasa","3"=>"Rabu","4"=>"Kamis","5"=>"Jumat","6"=>"Sabtu","7"=>"Minggu");

	$id = $_GET['id'];
	$jenis = $_GET['jenis'];
	
?>



<?php
	if($jenis=="sk"){		

?>

<?php
	}else if($jenis=="skatas"){

?>

<?php
	}else if($jenis=="kontrol"){

		$data_permohonan_list = $this->Permohonan_cetak_model->get_detil_permohonan($id);			
		$itr_list = $this->Trayek_cetak_sk_model->get_detil_itr_by_permohonan_id($id);
		$data_perusahaan_list = $this->Permohonan_cetak_model->get_detil_data_perusahaan($itr_list->perusahaan_id);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Sistem Perijinan Kota Bontang</title>
	<style type="text/css">
<!--
body {
	margin-top: 0px;
}

.style1 {
	padding-left: 10px
}

.style3 {
	font-size: 12pt
}
-->
</style>

</head>

<body onLoad="printDiv('printableArea')">

<div id="printableArea">

	<table width="700" border="0" align="center" cellpadding="0"
		cellspacing="0" style="margin-top: 10px">
		<tr>
			<td height="350" colspan="3" align="center" valign="middle"
				style="font-family: 'Times New Roman', Times, serif; font-size: 14px;">
				<p align="center">
					<strong><img src="../images/logo4.jpg" width="88" height="105"
						align="top" /> </strong>
				</p>
				<p align="center">
					<strong>PEMERINTAH KOTA BONTANG <br /> <br /> BADAN PELAYANAN
						PERIJINAN TERPADU DAN PENANAMAN MODAL KOTA BONTANG<br /> TAHUN
						ANGGARAN 2009</strong>
				</p>
				<p align="center">
					Jl. MT.Haryono No.31 Telp (0548) 20594 Fax. (0548) 20598 Kode Pos
					75311 BONTANG<br />
				</p>
				<hr />
				<table width="78%" border="0" cellspacing="0" cellpadding="5">
					<tr>
						<td width="26%"><div align="left">
								<span class="style3">Nama Perusahaan </span>
							</div></td>
						<td width="2%">:</td>
						<td width="72%"><div align="left">
						<?php echo $data_perusahaan_list->nama?>
							</div></td>
					</tr>
					<tr>
						<td width="26%"><div align="left">
								<span class="style3">Nama Pemohon </span>
							</div></td>
						<td width="2%">:</td>
						<td width="72%"><div align="left">
						<?php echo $data_permohonan_list->nama?>
							</div></td>
					</tr>

					<tr>
						<td><div align="left">
								<span class="style3">Nomor Agenda </span>
							</div></td>
						<td>:</td>
						<td><div align="left">
						<?php echo $data_permohonan_list->no_agenda ? $data_permohonan_list->no_agenda:""?>
							</div></td>
					</tr>
					<tr>
						<td><div align="left">
								<span class="style3">Tanggal Masuk </span>
							</div></td>
						<td>:</td>
						<td><div align="left">
						<?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglpermohonan)?>
							</div></td>
					</tr>
					<tr>
						<td><div align="left">
								<span class="style3">Jenis Permohonan</span>
							</div></td>
						<td>:</td>
						<td><div align="left">
						<?php echo $data_permohonan_list->jenispermohonan ? $data_permohonan_list->jenispermohonan:""?>
							</div></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="64" colspan="3" align="center" valign="middle"
				style="font-family: 'Times New Roman', Times, serif; font-size: 16px; font-weight: bold; margin-top: 10px; margin-bottom: 10px">
				IJIN TRAYEK<br>
			
			</td>
		</tr>
		<tr>
			<td height="39" colspan="3" style="padding-left: 20px"><strong>I.
					Daftar Kelengkapan Permohonan </strong></td>
		</tr>
		<tr>
			<td colspan="3" style="padding-left: 20px">
				<table width="100%" border="1" cellpadding="2" cellspacing="0"
					bordercolor="#000000" style="border-collapse: collapse">
					<tr align="center" valign="middle">
						<td width="5%"><strong>No.</strong></td>
						<td width="70%">Jenis Lampiran</td>
						<td width="25%">Keterangan</td>
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
						<td class="style1"><?php echo $val_data_syarat->syarat?></td>
						<td align="center"><?php echo $val_data_syarat->keterangan ? $val_data_syarat->keterangan : "-"?>
						</td>
					</tr>
					<?
					}
			  ?>
				</table></td>
		</tr>
		<tr>
			<td height="43" colspan="3" style="padding-left: 20px"><p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>
					<strong>II. Riwayat Dokumen</strong><br />
				</p>
			</td>
		</tr>

		<tr>
			<td colspan="3" style="padding-left: 20px">
				<table width="100%" border="1" cellpadding="4" cellspacing="0"
					bordercolor="#000000" style="border-collapse: collapse">
					<tr align="center" valign="middle">
						<td width="5%"><strong>No.</strong></td>
						<td width="25%"><strong>Diterima</strong></td>
						<td width="25%"><strong>Tanggal Masuk</strong></td>
						<td width="25%"><strong>Tanggal Kirim</strong></td>
						<td width="14%"><strong>Tanggal Kembali</strong></td>
						<td width="15%"><strong>Tanda Tangan</strong></td>
						<td width="15%"><strong>Keterangan</strong></td>
					</tr>
					<tr>
						<td>1.</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>2.</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>3.</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</table>
				<p align="right">
					<?php echo $this->Permohonan_cetak_model->get_no_form(14); ?>
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
		$itr_list = $this->Trayek_cetak_sk_model->get_detil_itr_by_permohonan_id($id);
		$data_perusahaan_list = $this->Permohonan_cetak_model->get_detil_data_perusahaan($itr_list->perusahaan_id);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Sistem Perijinan Kota Bontang</title>
	<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	color: #000000;
	font-family: 'Times New Roman', Times, serif;
	font-weight: bold;
}
-->
</style>

</head>

<body onLoad="printDiv('printableArea')">

<div id="printableArea">

	<table width="700" border="0" align="center" cellpadding="0"
		cellspacing="0" style="border: 5px double #000;">
		<tr>
			<td width="96" align="center" class="style1"><img
				src="../images/logo3.gif" width="50" height="60" />
			</td>
			<td width="502" align="center" class="style1" style="padding: 10px">
				<br> BUKTI PENERIMAAN DOKUMEN IZIN TRAYEK <br /> BADAN PELAYANAN
					PERIJINAN TERPADU DAN PENANAMAN MODAL <br> KOTA BONTANG <br> Telp.
							(0548) 20594 ; Fax. (0548) 20598 
			
			</td>
			<td width="96" align="center" class="style1">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" style="padding: 0px 48px 0px 48px">
				<hr style="color: #000000; border: 1px solid #000">
			
			</td>
		</tr>
		<tr>
			<td colspan="3" style="padding: 0px 48px 0px 48px">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr valign="top">
						<td width="27%" height="30">Nama Perusahaan</td>
						<td width="2%" align="center">:</td>
						<td width="71%"><?php echo $data_perusahaan_list->nama?></td>
					</tr>
					<tr valign="top">
						<td height="30">Nama Direktur</td>
						<td align="center">:</td>
						<td><?php echo $data_permohonan_list->nama?></td>
					</tr>
					<tr valign="top">
						<td height="30">Alamat Perusahaan</td>
						<td align="center">:</td>
						<td><?php				
						$alamat	= "";
						$alamat	.= $data_perusahaan_list->alamat ? $data_perusahaan_list->alamat : "";
						$alamat	.= $this->String_model->IsEmpty($data_perusahaan_list->rt)==false ? " RT. ".$data_perusahaan_list->rt : "";
						$alamat	.= $this->String_model->IsEmpty($data_perusahaan_list->rw)==false ? " RW. ".$data_perusahaan_list->rw : "";
						$alamat	.= $data_perusahaan_list->desa ? " Kel. ".ucwords(strtolower($data_perusahaan_list->desa)) : "";
						echo $alamat;
						?>
						</td>
					</tr>
					<tr valign="top">
						<td height="30">Tanggal Masuk</td>
						<td align="center">:</td>
						<td><?php echo $this->String_model->DateMonthWord($data_permohonan_list->tglpermohonan)?></td>
					</tr>
					<tr valign="top">
						<td height="30">Perkiraan Selesai</td>
						<td align="center">:</td>
						<td><?php echo $this->Permohonan_cetak_model->get_tgl_selesai(2);?>&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="right">
				<table width="169" border="0" cellspacing="0" cellpadding="0"
					style="margin-right: 100px; margin-bottom: 20px; margin-top: 20px">
					<tr>
						<td width="169" align="center">Petugas</td>
					</tr>
					<tr>
						<td height="50" align="center">&nbsp;</td>
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
		<tr>
			<td colspan="3" align="right" style="padding-right: 5px"><?php echo $this->Permohonan_cetak_model->get_no_form(4); ?>
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