<html>
	<head>
		<title>SK Ijin Prinsip</title>
		<style>
		#wrapper{
			width:1000px;
			margin:auto;
		}
		#header{
			width:1000px;
			float:left;
			text-align:center;
			border-bottom:4px double #000000;
		}
		#container{
			width:1000px;
			float:left;
		}
		#tb-head{
			margin:auto;
			margin-top:10px;
			margin-bottom:20px;
			text-align:center;
			width:80%;
			text-transform:uppercase;
		}
		#tb-content{
			width:80%;
			margin:auto;
		}
		#tb-content #col1{
			width:200px;
			vertical-align:top;
		}
		#tb-content #col2{
			width:10px;
			vertical-align:top;
		}
		#tb-content #col3{
			width:790px;
			text-align:justify;
		}
		#tb-stamp{
			float:right;
			margin-top:20px;
		}
		#tb-tembusan{
			float:left;
			width:80%;
		}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<img src="<?php echo base_url(); ?>assets/images/garuda.jpg" style="width:100px;height:100px;">
				<h1>WALIKOTA BONTANG</h1>
			</div>
			<div id="container">
				<table id="tb-head" style="width:30%;float:left;text-align:left;">
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td>Nomor : <?php echo $prinsip["NO_SK"]; ?></td>
					</tr>
					<tr>
						<td>Lampiran : -</td>
					</tr>
					<tr>
						<td>Sifat : Penting/ Segera</td>
					</tr>
					<tr>
						<td>Perihal : </td>
					</tr>
				</table>
				<table id="tb-head" style="width:30%;float:right;text-align:left;">
					<tr>
						<td>Bontang <?php echo date("d-m-Y"); ?></td>
					</tr>
					<tr>
						<td>Kepada</td>
					</tr>
					<tr>
						<td>Yth</td>
					</tr>
					<tr>
						<td><?php echo $prinsip["NAMA_PERUSAHAAN"]; ?></td>
					</tr>
					<tr>
						<td>DI - </td>
					</tr>
					<tr>
						<td>Bontang</td>
					</tr>
				</table>
				<table id="tb-content">
					<tr>
						<td>
						Sehubungan dengan surat permohonan <?php echo $prinsip["NAMA_PERUSAHAAN"]; ?> Nomor <?php echo $prinsip["NO_SK"]; ?> tanggal <?php echo $prinsip["TGL_BERLAKU"]; ?>, perihal Permohonan perpanjangan Izin Prinsip <?php echo $prinsip["PERIHAL"]; ?> di lokasi <?php echo $prinsip["NAMA_LOKASI"]; ?>, bersama ini kami sampaikan bahwa berdasarkan pertimbangan teknis tata ruang dan ketentuan lainnya yang berlaku, maka kami dapat memberikan Izin Prinsip pemanfaatan ruang untuk <?php echo $prinsip["PERIHAL"]; ?> Kota Bontang pada lokasi dan titik koordinat sebagai berikut.
						</td>
					</tr>
					<tr>
						<td>
						<table border="1" style="border-collapse:collapse;margin:auto;margin-top:10px;margin-bottom:10px;">
							<tr>
								<td>No</td>
								<td colspan="2">Koordinat (UTM)</td>
								<td>Lokasi</td>
							</tr>
							<tr>
								<td>1</td>
								<td><?php echo $prinsip["LONGITUDE"]; ?></td>
								<td><?php echo $prinsip["LATITUDE"]; ?></td>
								<td><?php echo $prinsip["NAMA_LOKASI"]; ?></td>
							</tr>
						</table>
						</td>
					</tr>
					<tr>
						<td>
						Izin Prinsip ini berlaku 1 (satu) tahun terhitung sejak diterbitkannya surat ini. Apabila dalam jangka waktu tersebut belum mengurus perizinan lainnya dan atau kegiatan pembangunannya menyimpang dari ketentuan dan persyaratan yang berlaku, maka Izin Prinsip ini menjadi batal;
						</td>
					</tr>
					<tr>
						<td>
						Sehubungan dengan dikeluarkannya Izin Prinsip ini maka agar segera diselesaikan Izin-Izin yang lainnya sesuai dengan ketentuan dan peraturan yang berlaku sebelum memulai pembangunan di lokasi yang dimaksud; Demikian kami sampaikan, untuk dapat dipergunakan sebagaimana mestinya.
						</td>
					</tr>
					<tr>
						<td>
						Demikian kami sampaikan, untuk dapat dipergunakan sebagaimana mestinya.
						</td>
					</tr>
				</table>
				<table id="tb-stamp">
					<tr>
						<td><b><?php echo $ijin["JABATAN"]; ?></b></td>
					</tr>
					<tr>
						<td height="100"></td>
					</tr>
					<tr>
						<td><b><?php echo $ijin["NAMA_PEJABAT"]; ?></b></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>
