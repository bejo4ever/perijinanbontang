<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Iujt_det</title>
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
	<title>Daftar Data Iujt_det</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Iujt_det</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">det_iujt_iujt_id</td>
				<th align="center">det_iujt_jenis</td>
				<th align="center">det_iujt_nama</td>
				<th align="center">det_iujt_npwp</td>
				<th align="center">det_iujt_alamat</td>
				<th align="center">det_iujt_sk</td>
				<th align="center">det_iujt_berlaku</td>
				<th align="center">det_iujt_kadaluarsa</td>
				<th align="center">det_iujt_surveylulus</td>
				<th align="center">det_iujt_tanggal</td>
				<th align="center">det_iujt_nopermohonan</td>
				<th align="center">det_iujt_cekpetugas</td>
				<th align="center">det_iujt_cektanggal</td>
				<th align="center">det_iujt_ceknip</td>
				<th align="center">det_iujt_catatan</td>
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
					<td><?php echo $subrecord->det_iujt_iujt_id; ?></td>
					<td><?php echo $subrecord->det_iujt_jenis; ?></td>
					<td><?php echo $subrecord->det_iujt_nama; ?></td>
					<td><?php echo $subrecord->det_iujt_npwp; ?></td>
					<td><?php echo $subrecord->det_iujt_alamat; ?></td>
					<td><?php echo $subrecord->det_iujt_sk; ?></td>
					<td><?php echo $subrecord->det_iujt_berlaku; ?></td>
					<td><?php echo $subrecord->det_iujt_kadaluarsa; ?></td>
					<td><?php echo $subrecord->det_iujt_surveylulus; ?></td>
					<td><?php echo $subrecord->det_iujt_tanggal; ?></td>
					<td><?php echo $subrecord->det_iujt_nopermohonan; ?></td>
					<td><?php echo $subrecord->det_iujt_cekpetugas; ?></td>
					<td><?php echo $subrecord->det_iujt_cektanggal; ?></td>
					<td><?php echo $subrecord->det_iujt_ceknip; ?></td>
					<td><?php echo $subrecord->det_iujt_catatan; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="15" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>