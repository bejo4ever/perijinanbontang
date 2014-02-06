<html>
	<head>
		<title>SK Trayek</title>
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
		#header p{
			line-height:3px;
		}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<img src="<?php echo base_url(); ?>assets/images/logo-bontang.jpg" style="width:100px;height:100px;">
				<p>PEMERINTAH KOTA BONTANG</p>
				<p style="font-size:16pt;font-weight:bold;">DINAS TATA RUANG KOTA</p>
				<p>Jl. Bessai Berinta Gd. GTP Blok IV Lt. 2 Bontang Lestari Telp. (0548) - Kode Pos 75326</p>
				<p style="font-weight:bold;">BONTANG<p>
			</div>
			<div id="container">
				<table id="tb-head">
					<tr>
						<td><u>SURAT KETERANOAN KESESUAIAN TATA RUANG</u></td>
					</tr>
					<tr>
						<td>Nomor : <?php echo $sktr["NO_SK"]; ?></td>
					</tr>
					<tr>
						<td></td>
					</tr>
				</table>
				<p>Memperhatikan surat permohonan atas nama : <?php echo $sktr["pemohon_nama"]; ?></p>
				<ol type="1">
					<li>Bahwa lokasi yang dimaksud dalam hal ini <?php echo $sktr["ALAMAT_BANGUNAN"]; ?></li>
					<li>Bahwa berdasarkan Rencana Tata Ruang Kawasan (RTRK) Kelurahan Satimpo
						<ol type="a">
							<li>Kawasan Perumahan dan Permukiman termasuk di dalamnya Fasilitas Pendukung (Fasum dan Fasos)</li>
							<li>Dan untuk pengembangan diarahkan dengan mengikuti orientasi pola jalan yang telah ada, dan juga dengan memperhatikan topografi kawasan;</li>
							<li>Untuk pelayanan, lokasi mudah dijangkau oleh seluruh bagian wilayah serta akses parkir.</li>
						</ol>
					</li>
				</ol>
				<p>Dengan pertimbangan - pertimbangan tersebut diatas, bahwa lokasi yang diajukan sebagai fungsi Rumah Tinggai dan Tempat Usaha SESUA1 dengan peruntukannya</p>
				<p>Dalam hal pembangunan, diharuskan untuk memperhatikan ketentuan-ketentuan yang berkaitan dengan daya dukung lahan diantaranya adalah sebagai berikut :</p>
				<ol type="1">
					<li>Setiap bangunan dan bangun-bangunan yang berorientasi pada kepentingan umum wajib mempunyai tempat parkir khusus dengan ketentuan : 
						<ol type="a">
							<li>Luas, distribusi dan perletakan fasilitas parkir diupayakan tidak menganggu kegiatan bangunan dan lingkungannya serta disesuaikan dengan daya tampung lahan; </li>
							<li>Ketidak layakan antara luasan parkir dengan aktifitas pelayan usaha akan dilakukan penyesuaian bangunan oleh pemilik bangunan</li>
						</ol>
					</li>
					<li>Kondisi eksisting bangunan saat peninjauan ke lapangan untuk adalah 100%;</li>
					<li>Ketersediaan Ruang Terbuka Hijau (RTH) Privat minimal 10 % dari luasan lahan persil, berdasarkan permohonan dan luasan tanah dalam surat tanah, diketahui bahwa luasan tanah adalah 389 M 2 , sehingga ketersediaan Ruang Terbuka Hijau Privat minima! adalah 38.9 M <sup>2</sup> ;
					</li>
					<li>Garis Sempadan Bangunan (GSB) yang terukur adalah 6.5 meter (pada rencana gambar) dari ukuran GSB yang ditetapkan 5.0 meter (terukur dari as jalan sampai pada dinding terluar bangunan);</li>
					<li>Bangunan tetap memperhatikan Koefisien Dasar Bangunan (KDB) : 70 % (maksimal) dan Koeflsien Lantai Bangunan (KLB): 3.0 (maksimal); </li>
					<li>Untuk bangunan yang menyalahi peruntukkannya dari ketentuan teknis ruangnya akan ditindaklanjuti dengan pencabutan semua perijinan terkait pemanfaatan bangunan sesuai dengan Perda No.4 Tahun 2003 tentang Ijin Mendirikan Bangunan (1MB); </li>
					<li>Selama dan setelah proses pembangunan, tetap memperhatikan dan menjaga kualitas Lingkungan</li>
				</ol>
				<p>Demikian surat keterangan ini dibuat sebagai bahan acuan dalam melakukan pembangunan.</p>
				<table id="tb-stamp">
					<tr>
						<td>BONTANG, <?php echo $sktr["TGL_BERLAKU"]; ?></td>
					</tr>
					<tr>
						<td><?php echo $ijin["JABATAN"]; ?></td>
					</tr>
					<tr>
						<td height="100"></td>
					</tr>
					<tr>
						<td><?php echo $ijin["NAMA_PEJABAT"]; ?></td>
					<tr>
						<td><?php echo $ijin["PANGKAT"]; ?></td>
					</tr>
					<tr>
						<td>NIP. <?php echo $ijin["NIP_PEJABAT"]; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>
