<html>
	<head>
		<title>Surat Pernyataan</title>
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
		#tb-header{
			width:100%;
		}
		#tb-header h2{
			line-height:4px;
		}
		#tb-header h4{
			line-height:4px;
		}
		#tb-head{
			margin:auto;
			margin-top:30px;
			margin-bottom:20px;
			text-align:center;
			width:80%;
			text-transform:uppercase;
			font-weight:bold;
		}
		#tb-content{
			width:95%;
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
			width:300px;
			margin-top:15px;
		}
		#tb-stamp td{
			width:50%;
			text-align:center;
		}
		#tb-stamp td table td{
			text-align:left;
		}
		</style>
	</head>
	<body onload="window.print();">
		<div id="wrapper">
			<div id="header">
				<table id="tb-header">
					<h3>SURAT PERNYATAAN KESANGGUPAN PENGELOLAAN DAN PEMANTAUAN LINGKUNGAN HIDUP (SPPL)<h3>
				</table>
			</div>
			<div id="container">
				<p>Kami yang bertanda tangan dibawah ini : </p>
				<table id="tb-content">
					<tr>
						<td id="col1">Nama</td>
						<td id="col2">:</td>
						<td id="col3"><?php echo $sppl["PENANGGUNG_JAWAB"]; ?></td>
					</tr>
					<tr>
						<td id="col1">Jabatan</td>
						<td id="col2">:</td>
						<td id="col3"><?php echo $sppl["JABATAN"]; ?></td>
					</tr>
					<tr>
						<td id="col1">Alamat</td>
						<td id="col2">:</td>
						<td id="col3"><?php echo $sppl["pemohon_alamat"]; ?></td>
					</tr>
					<tr>
						<td id="col1">Nomor Telepon</td>
						<td id="col2">:</td>
						<td id="col3"><?php echo $sppl["pemohon_telp"]; ?></td>
					</tr>
				</table>
				<table id="tb-content">
					<p>Selaku penanggung jawab atas pengelolaan Hngkungan dari:</p>
					<tr>
						<td id="col1">Nama perusahaan/ Usaha</td>
						<td id="col2">:</td>
						<td id="col3"><?php echo $sppl["NAMA_USAHA"]; ?></td>
					</tr>
					<tr>
						<td id="col1">Alamat perusahaan/ Usaha</td>
						<td id="col2">:</td>
						<td id="col3"><?php echo $sppl["ALAMAT_USAHA"]; ?></td>
					</tr>
					<tr>
						<td id="col1">Nomor telp.Perusahaan</td>
						<td id="col2">:</td>
						<td id="col3"><?php echo $sppl["NO_TELP"]; ?></td>
					</tr>
					<tr>
						<td id="col1">Jenis Usaha/ sifat usaha</td>
						<td id="col2">:</td>
						<td id="col3"><?php echo $sppl["JENIS_USAHA"]; ?></td>
					</tr>
					<tr>
						<td id="col1">Luas</td>
						<td id="col2">:</td>
						<td id="col3"><?php echo $sppl["LUAS_LAHAN"]; ?></td>
					</tr>
				</table>
				<p>Dengan dampak Hngkungan yang teijadi berupa :</p>
				<ol type="1">
					<li>Kemacetan lalu lintas.</li>
					<li>Umbah domestik saat operasi; </li>
				</ol>
				<p>Merencanakan untuk melakukan pengelolaan dan pemantauan dampak Hngkungan melalui: </p>
				<ol type="a">
					<li>Mengatur lalu lalang kendaraan keluar masuk gura mencegah kemacetan; </li>
					<li>Menyediakan lahan parkir yang raemadai sehingga tidak mengganggu Hngkungan; </li>
					<li>Menyiapkan RTH privat minimal 10% dari luas lahan;</li>
					<li>MMenanam pohon di lokasi kegiatan; </li>
					<li>Melakukan pemilahan sampah di lokasi kegiatan dengan menyediakan tempat sampah organik dan sampah anorganikyang tertutup; </li>
					<li>Menerapkan pemanfaatan sampah dengan menggunakan prinsip 3R (Reduce, Reuse, Recycle); </li>
					<li>Mengolah Umbah domestik di septik tank; </li>
					<li>Membuat lubang resapan biopori;  </li>
					<li>Melakukan penghematan energi (air, listrik dan BUM).</li>
				</ol>
				<p>Pada prinsipnya bersedia dengan sungguh-sungguh untuk melaksanakan seluruh pengelolaan dan pemantauan dampak Hngkungan sebagaimana tersebut di atas, dan bersedia untuk diawasi oleh instansi yang berwenang.</p>
				<table id="tb-stamp">
					<tr>
						<td>Bontang, 3 Oktober 2013</td>
					</tr>
					<tr>
						<td>Yang Menyatakan,</td>
					</tr>
					<tr>
						<td style="height:100px;"></td>
					</tr>
					<tr>
						<td><?php echo $sppl["PENANGGUNG_JAWAB"]; ?></td>
					</tr>
					<tr>
						<td>Penanggung jawab kegiatan</td>
					</tr>
				</table>
				<table border="1" style="width:100%;border-collapse:collapse;margin-top:10px;">
					<tr>
						<td style="width:40%;">Nomor bukti penerimaan oleh instansi LH </td>
						<td style="width:2%;"> : </td>
						<td></td>
					</tr>
					<tr>
						<td>Tanggal </td>
						<td> : </td>
						<td></td>
					</tr>
					<tr>
						<td>Penerima </td>
						<td> : </td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>
