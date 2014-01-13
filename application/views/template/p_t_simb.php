<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Simb</title>
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
	<title>Daftar Data Simb</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Simb</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">simb_per_npwp</td>
				<th align="center">simb_per_nama</td>
				<th align="center">simb_per_akta</td>
				<th align="center">simb_per_bentuk</td>
				<th align="center">simb_per_alamat</td>
				<th align="center">simb_per_kel</td>
				<th align="center">simb_per_kec</td>
				<th align="center">simb_per_kota</td>
				<th align="center">simb_per_telp</td>
				<th align="center">simb_jenis</td>
				<th align="center">simb_status</td>
				<th align="center">simb_jenisusaha</td>
				<th align="center">simb_panjang</td>
				<th align="center">simb_lebar</td>
				<th align="center">simb_alamat</td>
				<th align="center">simb_kel</td>
				<th align="center">simb_kec</td>
				<th align="center">simb_bentuk</td>
				<th align="center">simb_lokasi</td>
				<th align="center">simb_gangguan</td>
				<th align="center">simb_batasutara</td>
				<th align="center">simb_batastimur</td>
				<th align="center">simb_batasselatan</td>
				<th align="center">simb_batasbarat</td>
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
					<td><?php echo $subrecord->simb_per_npwp; ?></td>
					<td><?php echo $subrecord->simb_per_nama; ?></td>
					<td><?php echo $subrecord->simb_per_akta; ?></td>
					<td><?php echo $subrecord->simb_per_bentuk; ?></td>
					<td><?php echo $subrecord->simb_per_alamat; ?></td>
					<td><?php echo $subrecord->simb_per_kel; ?></td>
					<td><?php echo $subrecord->simb_per_kec; ?></td>
					<td><?php echo $subrecord->simb_per_kota; ?></td>
					<td><?php echo $subrecord->simb_per_telp; ?></td>
					<td><?php echo $subrecord->simb_jenis; ?></td>
					<td><?php echo $subrecord->simb_status; ?></td>
					<td><?php echo $subrecord->simb_jenisusaha; ?></td>
					<td><?php echo $subrecord->simb_panjang; ?></td>
					<td><?php echo $subrecord->simb_lebar; ?></td>
					<td><?php echo $subrecord->simb_alamat; ?></td>
					<td><?php echo $subrecord->simb_kel; ?></td>
					<td><?php echo $subrecord->simb_kec; ?></td>
					<td><?php echo $subrecord->simb_bentuk; ?></td>
					<td><?php echo $subrecord->simb_lokasi; ?></td>
					<td><?php echo $subrecord->simb_gangguan; ?></td>
					<td><?php echo $subrecord->simb_batasutara; ?></td>
					<td><?php echo $subrecord->simb_batastimur; ?></td>
					<td><?php echo $subrecord->simb_batasselatan; ?></td>
					<td><?php echo $subrecord->simb_batasbarat; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="24" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>