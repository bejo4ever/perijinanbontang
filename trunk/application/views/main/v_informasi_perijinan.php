<div class="hero-unit">
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<td>No</td>
				<td>Jenis Perijinan</td>
				<td>Waktu Penyelesaian</td>
				<td>Retribusi</td>
			</tr>
		</thead>
		<tbody>
		<?php
		$no=1;
		foreach($query as $row){
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row["NAMA_IJIN"]; ?></td>
			<td><?php echo $row["WAKTUSELESAI"]; ?></td>
			<td><?php echo "-"; ?></td>
		</tr>
		<?php
		$no++;
		}
		?>
		</tbody>
	</table>
</div>