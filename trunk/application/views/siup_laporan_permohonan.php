<?php
//session_start();

header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="Laporan permohonan SIUP.xls"');
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Pragma: public");

//include_once("../includes/class_ez_sql.php");
//include_once('../includes/class_permohonan.php');
//include_once('../includes/class_string.php');

$string		= new fstring();
$permohonan	= new permohonan();
$tglawal	= isset($_GET['tgl1'])&& !empty($_GET['tgl1']) ? date("Y-m-d",strtotime($_GET['tgl1']))." 00:00:00" : date("Y-m-d")." 00:00:00";
$tglakhir	= isset($_GET['tgl2'])&& !empty($_GET['tgl2']) ? date("Y-m-d",strtotime($_GET['tgl2']))." 23:59:59" : date("Y-m-d")." 23:59:00";
$jsiup		= isset($_GET['jsiup']) ? $_GET['jsiup'] : -1;
$kecamatan	= isset($_GET['kec']) ? $_GET['kec'] : 1;
$desa		= isset($_GET['desa']) ? $_GET['desa'] : 1;
$filter		= "";
$filter		.= " AND a.tglpermohonan >= '$tglawal' AND a.tglpermohonan <= '$tglakhir'";
$filter		.= $kecamatan > 0 ? " AND d.kecamatan_id = '$kecamatan'" : "";
$filter		.= $desa > 0 ? " AND d.desa_id = '$desa'" : "";
$filter		.= $jsiup==1 ? " AND c.modal <= 200000000" : "";
$filter		.= $jsiup==2 ? " AND c.modal > 200000000 AND c.modal <=500000000" : "";
$filter		.= $jsiup==3 ? " AND c.modal > 500000000 AND c.modal <= 10000000000" : "";
$filter		.= $jsiup==4 ? " AND c.modal > 10000000000" : "";

$sql		= "	SELECT a.tglpermohonan,f.status AS spermohonan,a.tglsk,a.nosk,c.nama AS perusahaan,d.nama AS pemilik, c.alamat AS alamat2,c.rt AS rt2,c.rw AS rw2,
				c.desa AS desa2,c.kecamatan AS kecamatan2,e.bidang, d.alamat AS alamat1,d.rt AS rt1,d.rw AS rw1,
				d.desa AS desa1,d.kecamatan AS kecamatan1,d.nama    
				FROM permohonan a 
				INNER JOIN siup b ON a.id=b.permohonan_id 
				LEFT OUTER JOIN
				(
					SELECT a.id,a.kualifikasi_id,a.nama,a.kecamatan_id,a.desa_id,a.alamat,a.rt,a.rw,b.kecamatan,c.desa,a.modal   
					FROM perusahaan a 
					LEFT OUTER JOIN kecamatan b ON a.kecamatan_id=b.id 
					LEFT OUTER JOIN desa c ON a.desa_id=c.id 
				) c ON b.perusahaan_id=c.id 								
				LEFT OUTER JOIN 
				(
						SELECT a.*,b.kecamatan,c.desa,d.warga  
						FROM pemohon a 
						LEFT OUTER JOIN kecamatan b ON a.kecamatan_id=b.id 
						LEFT OUTER JOIN desa c ON a.desa_id=c.id 
						LEFT OUTER JOIN warga d ON a.warga_id=d.id 						 
				) d ON a.pemohon_id=d.id 
				LEFT OUTER JOIN busaha e ON b.busaha_id=e.id 
				LEFT OUTER JOIN spermohonan f ON a.spermohonan_id=f.id 
				WHERE a.ijin_id='4' AND a.spermohonan_id > 1 AND a.spermohonan_id <> 6 $filter
				ORDER BY a.tglpermohonan, a.nosk ASC";
//echo $sql;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
<!--
.header {
	color: #000099;
	text-align: center;
	font-size: 12px;
	font-weight: bold;
	font-family: "Times New Roman";
}

.subHeader {
	color: #FFFFFF;
	text-align: center;
	font-weight: bold;
	font-size: 11px;
	font-family: Arial;
	background-color: #003366;
}

.isi {
	font-size: 9px;
	font-family: Arial;
}

.summary {
	color: #000099;
	font-size: 9px;
	font-weight: bold;
	font-family: Arial;
}
-->
</style>
	<title>Sistem Perijinan Kota Bontang</title>

</head>
<body>
	<table width="1500" border="1" cellpadding="0" cellspacing="0"
		bordercolor="#000000">
		<tr>
			<td colspan="10">
				<table width="1500" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td colspan="11" class="header">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="11" class="header">BADAN PELAYANAN PERIJINAN TERPADU
							DAN PENANAMAN MODAL</td>
					</tr>
					<tr>
						<td colspan="11" class="header">KOTA BONTANG</td>
					</tr>
					<tr>
						<td colspan="11" class="header">LAPORAN PERMOHONAN SIUP <?
						switch($jsiup)
						{
							case '1':
								$jnsSIUP= "Mikro";
								break;
							case '2':
								$jnsSIUP= "Kecil";
								break;
							case '3':
								$jnsSIUP= "Menengah";
								break;
							case '4':
								$jnsSIUP= "Besar";
								break;
							default :
								$jnsSIUP	='';
						}
						echo strtoupper($jnsSIUP);
						?>
						</td>
					</tr>
					<tr>
						<td colspan="11" class="header">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="6" width="82%" style="padding-left: 5px">Tanggal
							Permohonan : <?=$string->DateMonthWord($tglawal,'-')?> s/d <?=$string->DateMonthWord($tglakhir)?>
						</td>
						<td colspan="5" width="18%" align="right"
							style="padding-left: 5px">&nbsp;</td>
					</tr>
				</table></td>
		</tr>
		<tr align="center" class="subHeader">
			<td width="53">No</td>
			<td width="178">Nama Pemohon</td>
			<td width="178">Alamat Pemohon</td>
			<td width="218">Nama Perusahaan</td>
			<td width="179">Alamat Perusahaan</td>
			<td width="132">Bidang Usaha</td>
			<td width="135">Tgl. Permohonan</td>
			<td width="236">Status Permohonan</td>
			<td width="98">No. SK</td>
			<td width="75">Tgl. Terbit SK</td>
		</tr>
		<?
		$i	= 0;
		if ($rs = $db->get_results($sql))
		{
			foreach ($rs as $row)
			{
				$i++;
				?>
		<tr valign="top">
			<td align="center"><?=$i?></td>
			<td><?=$row->nama ? $row->nama : "&nbsp;"?></td>
			<td><?
			$alamat	= "";
			$alamat	.= $row->alamat1 ? $row->alamat1 : "";
			$alamat	.= $row->rt1 ? " RT ".$row->rt1 : "";
			$alamat	.= $row->rw1 ? " RW ".$row->rw1 : "";
			$alamat	.= $row->desa1 ? " Kel. ".ucwords(strtolower($row->desa1)) : "";
			$alamat	.= $row->kecamatan1 ? ",Kec. ".ucwords(strtolower($row->kecamatan1 )): "";
			?> <?=$alamat ? $alamat : "&nbsp;"?>
			</td>
			<td><?=$row->perusahaan ? $row->perusahaan : '&nbsp;'?>
			</td>
			<td><?
			$alamat	= "";
			$alamat	.= $row->alamat2 ? $row->alamat2 : "";
			$alamat	.= $row->rt2 ? " RT ".$row->rt2 : "";
			$alamat	.= $row->rw2 ? " RW ".$row->rw2 : "";
			$alamat	.= $row->desa2 ? " ".ucwords(strtolower($row->desa2)) : "";
			$alamat	.= $row->kecamatan2 ? ", ".ucwords(strtolower($row->kecamatan2 )): "";
			?> <?=$alamat ? $alamat : "&nbsp;"?>
			</td>
			<td><?=$row->bidang ? $row->bidang : "&nbsp;"?></td>
			<td align="center"><?=$string->DateTimeToDate($row->tglpermohonan)?>
			</td>
			<td><?=$row->spermohonan ? $row->spermohonan : "&nbsp;"?></td>
			<td align="left"><?=$row->nosk ? $row->nosk : "&nbsp;"?>&nbsp;</td>
			<td align="center"><?=$string->DateTimeToDate($row->tglsk)?></td>
		</tr>
		<?
			}
		}
		if($i < 1)
		{
			?>
		<tr valign="top">
			<td colspan="10" align="center">Tidak ada data</td>
		</tr>
		<?
	}
?>

	</table>
</body>
</html>
