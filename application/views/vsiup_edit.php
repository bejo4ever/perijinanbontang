<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<link rel="stylesheet" href="../../assets/jQuery/ui/themes/base/jquery.ui.all.css">
	<script src="../../assets/self/wilayah.js"></script>
	<script src="../../assets/self/jsfunction.js"></script>			
	<script src="../../assets/jQuery/ui/ui/jquery.ui.core.js"></script>
	<script src="../../assets/jQuery/ui/ui/jquery.ui.effect.js"></script>
	<script src="../../assets/jQuery/ui/ui/jquery.ui.effect-drop.js"></script>
	<script src="../../assets/jQuery/ui/ui/jquery.ui.widget.js"></script>		
	<script src="../../assets/jQuery/ui/ui/jquery.ui.datepicker.js"></script>
	<script src="../../assets/jQuery/ui/ui/jquery.ui.autocomplete.js"></script>	
     	
	<script>
	

	function Tpilih(jenis,id)
		{		
		var base_url = '<?echo site_url()?>';
		
		if (jenis=='siup')
		{
		$.ajax({
            'url' : base_url + '/' + 'master/get_data_siup/'+id,            
            'success' : function(data){				
				var obj = jQuery.parseJSON(data);				
				$('#siup_id').val(obj.siup_id);
				$('#noregistrasi').val(obj.noregistrasi);
				$('#tglmohon').val(obj.tglpermohonan);
				$("#jnspermohonan option[value='" + obj.jpermohonan_id + "']").attr("selected", true);				
				$('#no_agenda').val(obj.no_agenda);

				$('#pemohon_id').val(obj.pemohon_id);
				$('#ktp').val(obj.ktp);
                $('#nama').val(obj.nama1);
				$('#tlahir').val(obj.tempatlahir);
				$('#tgllahir').val(obj.tgllahir);
				$('#pekerjaan').val(obj.pekerjaan);
				$("#warga_id1 option[value='" + obj.warga_id + "']").attr("selected", true);
				$('#jalan1').val(obj.alamat1);
				$('#rt1').val(obj.rt1);
				$("#kec1 option[value='" + obj.kecamatan_id1 + "']").attr("selected", true);
				PilihDesa(document.getElementById('kec1'),document.getElementById('desa1'),'');
				$("#desa1 option[value='" + obj.desa_id1 + "']").attr("selected", true);
				$('#telp1').val(obj.telp1);
				$('#hp1').val(obj.hp);

				$('#perusahaan_id').val(obj.perusahaan_id);
				$('#npwp2').val(obj.npwp);
                $('#nama2').val(obj.nama2);
				$('#noakta2').val(obj.noakta);
				$('#tglakta2').val(obj.tglakta);
                $('#notaris2').val(obj.notaris);			
				$("#merk option[value='" + obj.merk + "']").attr("selected", true);
				$("#bentuk_id2 option[value='" + obj.bentuk_id + "']").attr("selected", true);	
				$("#sperusahaan_id2 option[value='" + obj.sperusahaan_id + "']").attr("selected", true);	
				$('#jalan2').val(obj.alamat2);	
				$('#rt2').val(obj.rt2);
				$('#kodepos2').val(obj.kodepos);
				$("#kec2 option[value='" + obj.kecamatan_id2 + "']").attr("selected", true);
				PilihDesa(document.getElementById('kec2'),document.getElementById('desa2'),'');
				$("#desa2 option[value='" + obj.desa_id2 + "']").attr("selected", true);
				$('#telp2').val(obj.telp2);
				$('#fax2').val(obj.fax);
				$("#tempat option[value='" + obj.stempat_id + "']").attr("selected", true);
				$('#modal').val(obj.modal);
				$('#kbli').val(obj.kbli);
				$("#kelembagaan option[value='" + obj.kelembagaan_id + "']").attr("selected", true);
				$('#lembaga').val(obj.lembaga);
				$("#busaha option[value='" + obj.busaha_id + "']").attr("selected", true);
				$('#dagangan').val(obj.dagangan);

				$('#retribusi').val(obj.retribusi);
				$('#tglbayar').val(obj.tglbayar);				
				$("#sbayar[value='"+ obj.sbayar +"']").attr('checked', true);

				$('#nama_bibit').val(obj.nama_bibit);
				$('#jumlah_bibit').val(obj.jumlah_bibit);
				
				$('#nosk').val(obj.nosk);
				$('#tglterbit').val(obj.tglsk);
				$('#tglexpired').val(obj.tglexpired);
				$('#catatan_bo').val(obj.catatan_bo);
            },
			'error' : function(data){
               alert(data);	
            }
        });
		}        
				
		}

	
	$(function() {
		$( "#tgllahir" ).datepicker();				
		$( "#tgllahir" ).datepicker( "option", "showAnim", "drop" );
		$( "#tgllahir" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});

	$(function() {
		$( "#tglakta2" ).datepicker();				
		$( "#tglakta2" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglakta2" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});

	$(function() {
		$( "#tgl_menkeh3" ).datepicker();				
		$( "#tgl_menkeh3" ).datepicker( "option", "showAnim", "drop" );
		$( "#tgl_menkeh3" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});

	$(function() {
		$( "#tgl_aapad3" ).datepicker();				
		$( "#tgl_aapad3" ).datepicker( "option", "showAnim", "drop" );
		$( "#tgl_aapad3" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});

	$(function() {
		$( "#tgl_lpad3" ).datepicker();				
		$( "#tgl_lpad3" ).datepicker( "option", "showAnim", "drop" );
		$( "#tgl_lpad3" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});

	$(function() {
		$( "#tglbayar" ).datepicker();				
		$( "#tglbayar" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglbayar" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});

	$(function() {
		$( "#tglterbit" ).datepicker();				
		$( "#tglterbit" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglterbit" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});

	$(function() {
		$( "#tglexpired" ).datepicker();				
		$( "#tglexpired" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglexpired" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});
	</script>
    <style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
    </style>
</head>
<?
$id=$_GET['id'];

$counter_daftar=array(
			'name' 		=>'counter_daftar', 
			'id'		=>'counter_daftar',
			'class'		=>'input-small',
			'size' 		=>'3',
			'maxlength'	=>'5',
			'value'		=>''
			);
$no_agenda=array(
			'name' 	=>'no_agenda', 
			'id'	=>'no_agenda',
			'class'		=>'input-medium',
			'size' 		=>'10',
			'maxlength'	=>'10',
			'value'	=>''
			);
$data_jenis_permohonan = $this->Permohonan_model->get_jenis_permohonan(4);
$ktp1=array(
			'name' 	=>'ktp1', 
			'id'	=>'ktp',
			'size' 		=>'21',
			'maxlength'	=>'20',
			'value'	=>''
			);
$nama1=array(
			'name' 	=>'nama1', 
			'id'	=>'nama',
			'class'		=>'input-xlarge',
			'size' 		=>'50',
			'maxlength'	=>'',
			'value'	=>''
			);
$tlahir1=array(
			'name' 	=>'tlahir1', 
			'id'	=>'tlahir',
			'size' 		=>'20',
			'maxlength'	=>'',
			'value'	=>''
			);
$pekerjaan1=array(
			'name' 	=>'pekerjaan1', 
			'id'	=>'pekerjaan',
			'size' 		=>'62',
			'maxlength'	=>'',
			'value'	=>''
			);
$warga_id1 = $this->Umum_model->ListWargaNegara();
$jalan1=array(
			'name' 	=>'jalan1', 
			'id'	=>'jalan1',
			'class'		=>'input-xlarge',
			'size' 		=>'50',
			'maxlength'	=>'',
			'value'	=>''
			);
$rt1=array(
			'name' 	=>'rt1', 
			'id'	=>'rt1',
			'class'		=>'input-small',
			'size' 		=>'2',
			'maxlength'	=>'',
			'value'	=>''
			);
$telp1=array(
			'name' 	=>'telp1', 
			'id'	=>'telp1',
			'size' 		=>'21',
			'maxlength'	=>'',
			'value'	=>''
			);
$hp1=array(
			'name' 	=>'hp1', 
			'id'	=>'hp1',
			'size' 		=>'13',
			'maxlength'	=>'',
			'value'	=>''
			);
$npwp2=array(
			'name' 	=>'npwp2', 
			'id'	=>'npwp2',
			'size' 		=>'50',
			'maxlength'	=>'',
			'value'	=>''
			);
$nama2=array(
			'name' 	=>'nama2', 
			'id'	=>'nama2',
			'class'		=>'input-xlarge',
			'size' 		=>'50',		
			'maxlength'	=>'',
			'value'	=>''
			);
$noakta2=array(
			'name' 	=>'noakta2', 
			'id'	=>'noakta2',
			'size' 		=>'',
			'maxlength'	=>'',
			'value'	=>''
			);
$notaris2=array(
			'name' 	=>'notaris2', 
			'id'	=>'notaris2',
			'size' 		=>'',
			'maxlength'	=>'',
			'value'	=>''
			);
$bentuk_id2 = $this->Perusahaan_model->ListBentukPerushTDP();
$sperusahaan_id2 = $this->Perusahaan_model->ListStatusPerusahaan();
$tempat = $this->Siup_model->ListStatusTempat();
$kelembagaan = $this->Siup_model->ListKelembagaan();
$busaha = $this->Siup_model->ListBidangUsaha();
$merk = $this->Siup_model->ListMerk();
$alamat2=array(
			'name' 	=>'alamat2', 
			'id'	=>'jalan2',
			'class'		=>'input-xlarge',
			'size' 		=>'50',
			'maxlength'	=>'',
			'value'	=>''
			);
$rt2=array(
			'name' 	=>'rt2', 
			'id'	=>'rt2',
			'class'		=>'input-small',
			'size' 		=>'2',
			'maxlength'	=>'',
			'value'	=>''
			);
$telp2=array(
			'name' 	=>'telp2', 
			'id'	=>'telp2',
			'size' 		=>'21',
			'maxlength'	=>'',
			'value'	=>''
			);
$fax2=array(
			'name' 	=>'fax2', 
			'id'	=>'fax2',
			'size' 		=>'21',
			'maxlength'	=>'',
			'value'	=>''
			);
$kodepos2=array(
			'name' 	=>'kodepos2', 
			'id'	=>'kodepos2',
			'class'		=>'input-small',
			'size' 		=>'5',
			'maxlength'	=>'5',
			'value'	=>''
			);
$modal=array(
			'name' 	=>'modal', 
			'id'	=>'modal',
			'size' 		=>'',
			'maxlength'	=>'',
			'value'	=>''
			);
$kbli=array(
			'name' 	=>'kbli', 
			'id'	=>'kbli',
			'size' 		=>'',
			'maxlength'	=>'',
			'value'	=>''
			);
$lembaga=array(
			'name' 	=>'lembaga', 
			'id'	=>'lembaga',
			'size' 		=>'',
			'maxlength'	=>'',
			'value'	=>''
			);
$dagangan=array(
			'name' 	=>'dagangan', 
			'id'	=>'dagangan',						
			'maxlength'	=>'',
			'rows'	=>'5',
			'cols'	=>'30'
			);

$retribusi=array(
			'name' 	=>'retribusi', 
			'id'	=>'retribusi',
			'size' 		=>'15',
			'maxlength'	=>'',
			'value'	=>'0'
			);

$nama_bibit=array(
			'name' 	=>'nama_bibit', 
			'id'	=>'nama_bibit',
			'size' 		=>'40',
			'maxlength'	=>'',
			'value'	=>''
			);

$jumlah_bibit=array(
			'name' 	=>'jumlah_bibit', 
			'id'	=>'jumlah_bibit',
			'class'		=>'input-small',
			'size' 		=>'5',
			'maxlength'	=>'',
			'value'	=>'0'
			);
$data_listPersyaratan = $this->Permohonan_model->get_listPersyaratan(4);
$nosk=array(
			'name' 	=>'nosk', 
			'id'	=>'nosk',			
			'size' 		=>'20',
			'maxlength'	=>''
			);
?>
<body>
<div id="Mho" class="modal">    
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h2>Pencarian data HO</h2>
	</div>	
    <div class="modal-body">		 
        <p><?=$output?></p>  
    </div>  
</div>

<form name="kirim" class="form-vertical" action="<?=site_url()."/siup"?>" method="post">
<fieldset>
  <table width="100%"  border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" ><p><h1>
        <div id="wmy">Edit Data Permohonan SIUP 
          <input type="hidden" name="id" id="id" value="<?=$id?>">
          <input type="hidden" name="siup_id" id="siup_id">
          <input type="hidden" name="noregistrasi" id="noregistrasi">
</div>
      </h1></p>
      <p>1. Jenis Permohonan</p></td>
    </tr>
    <tr class="font3">
      <td width="29%" align="right" style="padding-left:10px ">Tanggal Permohonan</td>
      <td width="2%" align="center"  class="text">:</td>
      <td width="71%" align="left"><input type="text" name="tglmohon" id="tglmohon" class="input-small" size="10" readonly /></td>
    </tr>
    <tr class="font3" >
      <td width="29%" align="right"  style="padding-left:10px ">Jenis Permohonan </td>
      <td width="2%" align="center"  class="text">:</td>
      <td width="71%" align="left"><? echo form_dropdown('jnspermohonan', $data_jenis_permohonan,'','id="jnspermohonan"');?> </td>
    </tr>
    <!--SIUP baru-->
    <!--SIUP lama-->
    <tr class="font3">
      <td align="right" style="padding-left:10px ">No. Agenda </td>
      <td align="center"  class="text">:</td>
      <td align="left" ><label><? echo form_input($no_agenda);?> </label></td>
    </tr>
    <tr>
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2">2. Data Pemohon</td>
    </tr>
    <tr class="font3" >
      <td width="29%" align="right" style="padding-left:10px ">Nomor KTP </td>
      <td width="2%" align="center"  class="text">:</td>
      <td width="71%" align="left" ><? echo form_input($ktp1);?>&nbsp;
        <input type="hidden" name="pemohon_id" id="pemohon_id">
</td>
    </tr>
    <tr class="font3">
      <td width="29%" align="right"  style="padding-left:10px ">Nama Lengkap </td>
      <td width="2%" align="center"  class="text">:</td>
      <td width="71%" align="left"><? echo form_input($nama1);?> </td>
    </tr>
    <tr class="font3">
      <td width="29%" align="right" style="padding-left:10px ">TTL</td>
      <td width="2%" align="center"  class="text">:</td>
      <td width="71%" align="left"><? echo form_input($tlahir1);?> <input name="tgllahir1" type="text" id="tgllahir" class="input-small" size="10"/></td>
    </tr>
    <tr class="font3">
      <td width="29%" align="right"  style="padding-left:10px ">Pekerjaan / Jabatan</td>
      <td width="2%" align="center"  class="text">:</td>
      <td width="71%" align="left"><? echo form_input($pekerjaan1);?> </td>
    </tr>
    <tr class="font3" >
      <td width="29%" align="right"  style="padding-left:10px ">Warga Negara </td>
      <td width="2%" align="center"  class="text">:</td>
      <td width="71%" align="left" ><? echo form_dropdown('warga_id1', $warga_id1,'','id="warga_id1"');?>
      </td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Alamat</td>
      <td align="center"  class="text">:</td>
      <td align="left" ><? echo form_input($jalan1);?> RT :
      <? echo form_input($rt1);?> </td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Kecamatan</td>
      <td align="center"  class="text">:</td>
      <td align="left" id="alamat2"><select name="kec1" id="kec1" onChange="PilihDesa(this,document.getElementById('desa1'),'')">
      </select>
      </td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Kelurahan</td>
      <td align="center"  class="text">:</td>
      <td align="left" id="tddesa2"><select name="desa1" id="desa1">
      </select> </td>
    </tr>
    <tr class="font3"  >
      <td align="right"  class="text" >Telepon</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text">
<? echo form_input($telp1);?>&nbsp; HP :
<? echo form_input($hp1);?> </td>
    </tr>
    <tr>
      <td height="25" style="padding:5px 0px 5px 0px; border-bottom:1px dashed #000000;  " colspan="3" align="left" valign="bottom"  class="font2">3. Data Perusahaan</td>
    </tr>
    <tr class="font3">
      <td align="right"  style="padding-left:10px ">NPWP/NPWPD </td>
      <td align="center"  class="text">:</td>
      <td align="left" class="font3"><span class="text"><? echo form_input($npwp2);?></span>&nbsp;
      <input type="hidden" name="perusahaan_id" id="perusahaan_id"></td>
    </tr>
    <tr class="font3">
      <td align="right"  style="padding-left:10px ">Nama</td>
      <td align="center"  class="text">:</td>
      <td align="left"><span class="text"><? echo form_input($nama2);?></span></td>
    </tr>
    <tr>
      <td><div align="right">No. Akte</div></td>
      <td><div align="center">:</div></td>
      <td><span class="text"><? echo form_input($noakta2);?></span></td>
    </tr>
    <tr>
      <td align="right">Tanggal Akte</td>
      <td><div align="center">:</div></td>
      <td>         
      <input name="tglakta2" type="text" id="tglakta2" size="10" class="input-small"/></td>
    </tr>
    <tr>
      <td align="right">Notaris</td>
      <td><div align="center">:</div></td>
      <td><span class="text"><? echo form_input($notaris2);?></span></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:10px ">Bentuk Perusahaan </td>
      <td align="center"  class="text">:</td>
      <td align="left"><? echo form_dropdown('bentuk_id2', $bentuk_id2,'','id="bentuk_id2"');?> </td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:10px ">Status Perusahaan </td>
      <td align="center"  class="text">:</td>
      <td align="left"><? echo form_dropdown('sperusahaan_id2', $sperusahaan_id2,'','id="sperusahaan_id2"');?>
      </td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Merk</td>
      <td align="center"  class="text">:</td>
      <td align="left" class="font3"><span class="text"><? echo form_dropdown('merk', $merk,'','id="merk"');?></span></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Alamat Perusahaan</td>
      <td align="center"  class="text">:</td>
      <td align="left" class="font3">
<span class="text"><? echo form_input($alamat2);?></span>&nbsp;RT : <span class="text">&nbsp;<? echo form_input($rt2);?></span> <span class="text">Kode Pos : <? echo form_input($kodepos2);?></span></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Kecamatan</td>
      <td align="center"  class="text">:</td>
      <td align="left" id="alamat1"><select name="kec2" id="kec2" onChange="PilihDesa(this,document.getElementById('desa2'),'')">
      </select>
      </td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Kelurahan</td>
      <td align="center"  class="text">:</td>
      <td align="left" id="tddesa1"><select name="desa2" id="desa2">
      </select>
      </td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Telepon</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($telp2);?> Fax : <? echo form_input($fax2);?> </td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Status Tempat Usaha</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_dropdown('tempat', $tempat,'','id="tempat"');?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Modal</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text">Rp. <? echo form_input($modal);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Kegiatan Usaha (KBLI) </td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($kbli);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Klasifikasi</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_dropdown('kelembagaan', $kelembagaan,'','id="kelembagaan"');?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Kelembagaan</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($lembaga);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Bidang Usaha</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_dropdown('busaha', $busaha,'','id="busaha"');?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Jenis Barang / Jasa Dagangan Utama</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_textarea($dagangan);?></td>
    </tr>
    <tr>
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" >4. Retribusi</td>
    </tr>
    <tr>
      <td align="right">Retribusi</td>
      <td><div align="center">:</div></td>
      <td>Rp . <span class="text"><? echo form_input($retribusi);?></span> </td>
    </tr>
    <tr valign="top" class="font3" >
      <td align="right"  style="padding-left:10px ">Pembayaran</td>
      <td><div align="center">:</div></td>
      <td align="left"><div>
          <input  name="sbayar" id="sbayar" type="radio" value="1">
        Sudah dibayar, tanggal        <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.getElementById('tglbayar'));return false;" hidefocus="HIDEFOCUS">  </a>
          <input name="tglbayar" type="text" id="tglbayar" size="10" class="input-small"/>
          <br><input name="sbayar" id="sbayar" onchange="SetRetribusi(this)"  value="0" type="radio" />
Belum dibayar <br>
<input  name="sbayar" id="sbayar" onChange="SetRetribusi(this)"  value="-1" type="radio">
Gratis  </div>          </td>
    </tr>
    <tr>
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" >5. Data Bibit Tanaman </td>
    </tr>
    <tr class="font3">
      <td align="right"  style="padding-left:10px ">Nama Bibit </td>
      <td align="center"  class="text">:</td>
      <td align="left" ><label><span class="text"><? echo form_input($nama_bibit);?></span> </label></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:10px ">Jumlah </td>
      <td align="center"  class="text">:</td>
      <td align="left"><span class="text"><? echo form_input($jumlah_bibit);?></span></td>
    </tr>
    <tr>
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" >6. Lampiran Persyaratan</td>
    </tr>
    <tr class="font3" >
      <td colspan="3" align="center"  style="padding-left:10px "><table width="100%"  border="0" cellspacing="1" cellpadding="1">
          <tr bgcolor="#003399">
            <th width="5%"><span class="style1">No</span></th>
            <th width="62%"><span class="style1">Jenis Lampiran </span></th>
            <th width="33%"><span class="style1">Keterangan</span></th>
          </tr>
		  <?
		  $jml=$data_listPersyaratan[0];
		  $data=$data_listPersyaratan[1];
		  $syarat_id=$data_listPersyaratan[2];
		  for($i=0;$i<$jml;$i++)
				{		  
		  ?>
          <tr <? if ($i%2<>0) {?> bgcolor="#E7F0FE" <? }?>>
            <td valign="top" align="center"><?=($i+1)?>
            <input type="hidden" name="Hsyarat<?=$i?>" id="Hsyarat<?=$i?>" value="<?=$syarat_id[$i]?>"></td>
            <td valign="top"><?=$data[$i]?></td>
            <td><div align="center">
              <input type="text" name="syarat<?=$i?>" id="syarat<?=$i?>" value="<?=$this->Permohonansyarat_model->get_data_permohonansyarat($id,$syarat_id[$i])?>">
            </div></td>
          </tr>
         <?
				}
		 ?>
          <input type="hidden" name="jumlah" value="<?=$jml?>">
          
      </table></td>
    </tr>
    <tr align="right">
      <td colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;"><div align="left"><span class="font2">7. Data Ijin SIUP </span></div></td>
    </tr>
    <tr align="right">
      <td>No. SIUP </td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_input($nosk);?></span></div></td>
    </tr>
    <tr align="right">
      <td>Tanggal terbit</td>
      <td><div align="center">:</div></td>
      <td><div align="left">
        <input name="tglterbit" type="text" id="tglterbit" class="input-small" size="10"/>
      </div></td>
    </tr>
    <tr align="right">
      <td>Pendaftaran Ulang pada Tanggal </td>
      <td><div align="center">:</div></td>
      <td><div align="left">
        <input name="tglexpired" type="text" id="tglexpired" class="input-small" size="10"/>
      </div></td>
    </tr>
    <tr align="right">
      <td colspan="3"><input type="button" name="Button" value="Simpan" onClick="simpen()">
      <input type="button" name="Submit2" value="Batal" onClick="document.kirim.submit()"></td>
    </tr>
  </table>
</fieldset>
</form>

<script language="javascript">
	
	function OnLoad()
	{	
		CreateKecamatan(document.getElementById('kec1'),'<?=isset($dataPermohonan->kecamatan_id) ? $dataPermohonan->kecamatan_id : ''?>'); 
		PilihDesa(document.getElementById('kec1'),document.getElementById('desa1'),'<?=isset($dataPermohonan->desa_id) ? $dataPermohonan->desa_id : ''?>');
		CreateKecamatan(document.getElementById('kec2'),'<?=isset($dataPerusahaan->kecamatan_id) ? $dataPerusahaan->kecamatan_id : ''?>'); 
		PilihDesa(document.getElementById('kec2'),document.getElementById('desa2'),'<?=isset($dataPerusahaan->desa_id) ? $dataPerusahaan->desa_id : ''?>');	
		
	}
	
	function simpen()
	{
	if (Confirm3('Anda yakin data yang anda masukkan sudah benar ?'))
		{
		document.kirim.action="<?=site_url()."/siup/simpen_ubah"?>";
		document.kirim.submit();
		}
	}		
	OnLoad();
<? 
if ($id<>"")
{
?> 
Tpilih('siup',<?=$id?>);
<?
}
?>
 </script>
</body>
</html>
