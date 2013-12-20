<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Pemohon</title>
	<xml>
	 <x:ExcelWorkbook>
	  <x:ExcelWorksheets>
	   <x:ExcelWorksheet>
		<x:Name>Sheet</x:Name>
		<x:WorksheetOptions>
		 <x:Print>
			<x:Gridlines />
		 </x:Print>
		</x:WorksheetOptions>
	   </x:ExcelWorksheet>
	  </x:ExcelWorksheets>
	 </x:ExcelWorkbook>
	</xml>
</head>
<body>
<?php }else{ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Pemohon</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Pemohon</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">pemohon_nama</td>
				<th align="center">pemohon_alamat</td>
				<th align="center">pemohon_telp</td>
				<th align="center">pemohon_npwp</td>
				<th align="center">pemohon_rt</td>
				<th align="center">pemohon_rw</td>
				<th align="center">pemohon_kel</td>
				<th align="center">pemohon_kec</td>
				<th align="center">pemohon_nik</td>
				<th align="center">pemohon_stra</td>
				<th align="center">pemohon_surattugas</td>
				<th align="center">pemohon_pekerjaan</td>
				<th align="center">pemohon_tempatlahir</td>
				<th align="center">pemohon_tanggallahir</td>
				<th align="center">pemohon_user_id</td>
				<th align="center">pemohon_pendidikan</td>
				<th align="center">pemohon_tahunlulus</td>
				</tr>
		</thead>
		<tbody>
			<?php
			$total_record = 0; 
			if(count($records) > 0){ 
				foreach($records as $subrecord){
					$total_record++;
			?>
				<tr>
					<td><?php echo $total_record; ?></td>
					<td><?php echo $subrecord->pemohon_nama; ?></td>
					<td><?php echo $subrecord->pemohon_alamat; ?></td>
					<td><?php echo $subrecord->pemohon_telp; ?></td>
					<td><?php echo $subrecord->pemohon_npwp; ?></td>
					<td><?php echo $subrecord->pemohon_rt; ?></td>
					<td><?php echo $subrecord->pemohon_rw; ?></td>
					<td><?php echo $subrecord->pemohon_kel; ?></td>
					<td><?php echo $subrecord->pemohon_kec; ?></td>
					<td><?php echo $subrecord->pemohon_nik; ?></td>
					<td><?php echo $subrecord->pemohon_stra; ?></td>
					<td><?php echo $subrecord->pemohon_surattugas; ?></td>
					<td><?php echo $subrecord->pemohon_pekerjaan; ?></td>
					<td><?php echo $subrecord->pemohon_tempatlahir; ?></td>
					<td><?php echo $subrecord->pemohon_tanggallahir; ?></td>
					<td><?php echo $subrecord->pemohon_user_id; ?></td>
					<td><?php echo $subrecord->pemohon_pendidikan; ?></td>
					<td><?php echo $subrecord->pemohon_tahunlulus; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="17" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>