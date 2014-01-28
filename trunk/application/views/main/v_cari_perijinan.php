<style>
input[type="text"]{
background-color: #ffffff;
}
</style>
<div class="hero-unit">
	<?php
	echo form_open(site_url("informasi_p/cari_izin"));
	?>
	<p>
		<label>Pilih Jenis Perijinan</label>
		<hr>
		<select name="jenis_ijin">
			<?php
			foreach($query as $row){
			?>
				<option value="<?php echo $row["ID_IJIN"]; ?>"><?php echo $row["NAMA_IJIN"]; ?></option>
			<?php
			}
			?>
		</select>
	</p>
	<p>
		<!--<label>Cari Berdasarkan</label>
		<hr>
		<select name="jenis_ijin" id="jenis_ijin">
				<option value=""> -- Pilih Jenis Pencarian -- </option>
				<option value="1">Nomor SK</option>
				<option value="2">Nama Perusahaan / Nama Pemohon</option>
		</select>
		<p style="display:none" id="text-cari">
			<input type="text" name="value">
		</p>-->
	</p>
	<!--<p>
		<button type="submit" class="btn btn-primary">
			<span class="icon-zoom-in icon-white"></span> Cari
		</button>
	</p>-->
	<?php
	echo form_close();
	?>
</div>
<script language="javascript">
/* 	$("#jenis_ijin").change(function(){
		if($("#jenis_ijin").val() != ""){
			$("#text-cari").show();
			// alert("ye");
		}else{
			// alert("no");
			$("#text-cari").hide();
		}
	}); */
</script>