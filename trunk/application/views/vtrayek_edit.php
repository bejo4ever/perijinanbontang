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
<link href="../../assets/self/me.css" rel="stylesheet">

<link rel="stylesheet" href="../../assets/jQuery/ui/themes/base/jquery.ui.all.css">
	<script> var jenis = '1'; //jenis permohonan </script>
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
		
		if (jenis=='trayek')
		{
		$.ajax({
            'url' : base_url + '/' + 'master/get_data_trayek/'+id,            
            'success' : function(data){				
				var obj = jQuery.parseJSON(data);
				$('#trayek_id').val(obj.trayek_id);				
				$('#no_sk').val(obj.nosk);
				$('#pemohon_id').val(obj.pemohon_id);
				$('#tglmohon').val(obj.tglpermohonan);
				$("#jnspermohonan option[value='" + obj.jpermohonan_id + "']").attr("selected", true);
				$('#no_agenda').val(obj.no_agenda);
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
                $('#notaris2').val(obj.notaris);							
				$("#bentuk_id2 option[value='" + obj.bentuk_id + "']").attr("selected", true);	
				$("#sperusahaan_id2 option[value='" + obj.sperusahaan_id + "']").attr("selected", true);	
				$('#jalan2').val(obj.alamat2);	
				$('#rt2').val(obj.rt2);
				$('#kodepos2').val(obj.kodepos2);
				$("#kec2 option[value='" + obj.kecamatan_id2 + "']").attr("selected", true);
				PilihDesa(document.getElementById('kec2'),document.getElementById('desa2'),'');
				$("#desa2 option[value='" + obj.desa_id2 + "']").attr("selected", true);
				$('#telp2').val(obj.telp2);
				$('#fax2').val(obj.fax);		
				
				$("#kec4 option[value='" + obj.kecamatan_id4 + "']").attr("selected", true);
				PilihDesa(document.getElementById('kec4'),document.getElementById('desa4'),'');
				$("#desa4 option[value='" + obj.desa_id4 + "']").attr("selected", true);
				
				$('#nomor_kendaraan4').val(obj.nomor_kendaran);
    			$('#nama_pemilik4').val(obj.nama_pemilik);
    			$('#alamat_pemilik4').val(obj.alamat_pemilik);
				$('#no_hp4').val(obj.no_hp);
				$('#nomor_rangka4').val(obj.nomor_rangka);
    			$('#nomor_mesin4').val(obj.nomor_mesin);
    			$('#kode_trayek4').val(obj.kode_trayek);
    			$('#nom_uji_berkala4').val(obj.nomor_uji_berkala);
    			$('#rt4').val(obj.rt);
    			
    			
				$('#no_suratpermohonan').val(obj.no_surat_permohonan);
				$('#tglsuratmohon').val(obj.tgl_surat_permohonan);		
	
    			$('#no_rekomendasidishubkominfo').val(obj.no_rekomendasi);
				$('#tglrekomendasidishubkominfo').val(obj.tgl_rekomendasi);
				$('#merk_kendaraan4').val(obj.merk_kendaraan);
				$('#tahun_pembuatan4').val(obj.tahun_pembuatan);
				$('#daya_angkut4').val(obj.daya_angkut);
				$('#kode_pelayanan4').val(obj.kode_pelayanan);		
				
				

				$('#retribusi').val(obj.retribusi);
				$('#tglbayar').val(obj.tglbayar);				
				$("#sbayar[value='"+ obj.sbayar +"']").attr('checked', true);			
				
				$('#nosk').val(obj.nosk);
				$('#tglterbit').val(obj.tglsk);
				$('#tglexpired').val(obj.tglexpired);
				$('#catatan_bo').val(obj.catatan_bo);
									
			/*$data["no_surat_permohonan"]=$row->no_surat_permohonan;
			$data["tgl_surat_permohonan"]=$row->tgl_surat_permohonan;*/
			
				
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
		$( "#tglsurvey" ).datepicker();				
		$( "#tglsurvey" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglsurvey" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});	

	$(function() {
		$( "#tglbayar" ).datepicker();				
		$( "#tglbayar" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglbayar" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});

	$(function() {
		$( "#tglakte" ).datepicker();				
		$( "#tglakte" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglakte" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});
	
	$(function() {
		$( "#tglsuratmohon" ).datepicker();				
		$( "#tglsuratmohon" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglsuratmohon" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});

	$(function() {
		$( "#tglrekomendasidishubkominfo" ).datepicker();				
		$( "#tglrekomendasidishubkominfo" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglrekomendasidishubkominfo" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});

	$(function() {
		$( "#tglterbit" ).datepicker({
		onSelect : function (dateStr)
			{
			var d = $.datepicker.parseDate('dd-mm-yy', dateStr);
        	var years = 3;

        	d.setFullYear(d.getFullYear() + years);
			$('#tglexpired').datepicker('setDate', d);
			}
		});					
		$( "#tglterbit" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglterbit" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});

	$(function() {
		$( "#tglexpired" ).datepicker();				
		$( "#tglexpired" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglexpired" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});

	
	$(function() {
		$("#luas1").keypress(function (e) {     
     		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {       
               return false;
    		}
   		});
		$(".defaultText").focus(function(srcc)
    	{
        	if ($(this).val() == $(this)[0].title)
        	{
            	$(this).removeClass("defaultTextActive");
            	$(this).val("");
        	}
    	});
    
    	$(".defaultText").blur(function()
    	{
        	if ($(this).val() == "")
        	{
            	$(this).addClass("defaultTextActive");
            	$(this).val($(this)[0].title);
        	}
    	});
    
    	$(".defaultText").blur();

		if ($('#jnspermohonan').val()==1) $('#RowSK').hide();
		else $('#RowSK').show();
		

	});

	$(function() {
		$("#luas2").keypress(function (e) {     
     		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {       
               return false;
    		}
   		});

		$('#jnspermohonan').change(function () {      
     		if (this.value==1) $('#RowSK').hide();
			else $('#RowSK').show();    		
   		});
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
$nosk_lama=array(
			'name' 	=>'nosk_lama', 
			'id'	=>'nosk_lama',
			'class'		=>'input-medium',
			'size' 		=>'10',
			'maxlength'	=>'10',
			'value'	=>''
			);
$data_jenis_permohonan = $this->Permohonan_model->get_jenis_permohonan(18);

$no_suratpermohonan=array(
			'name' 	=>'no_suratpermohonan', 
			'id'	=>'no_suratpermohonan',		
			'maxlength'	=>'',
			'value'	=>''
			);

$no_rekomendasidishubkominfo=array(
			'name' 	=>'no_rekomendasidishubkominfo', 
			'id'	=>'no_rekomendasidishubkominfo',		
			'maxlength'	=>'',
			'value'	=>''
			);

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
$bentuk2 = $this->Perusahaan_model->ListBentukPerush();
$kualifikasi2 = $this->Perusahaan_model->ListKualifikasiPerusahaan();
$status = $this->Perusahaan_model->ListStatusPerusahaan();
$jenisjasa = $this->Perusahaan_model->ListJenisJasa();
$nosk=array(
			'name' 	=>'nosk', 
			'id'	=>'nosk',			
			'maxlength'	=>'',
			'value'	=>''
			);
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

$nomor_kendaraan4=array(
			'name' 	=>'nomor_kendaraan4', 
			'id'	=>'nomor_kendaraan4',			
			'maxlength'	=>'',
			'value'	=>''
			);

$nama_pemilik4=array(
			'name' 	=>'nama_pemilik4', 
			'id'	=>'nama_pemilik4',			
			'maxlength'	=>'',
			'value'	=>''
			);

$merk_kendaraan4=array(
			'name' 	=>'merk_kendaraan4', 
			'id'	=>'merk_kendaraan4',			
			'maxlength'	=>'',
			'value'	=>''
			);


$tahun_pembuatan4=array(
			'name' 	=>'tahun_pembuatan4', 
			'id'	=>'tahun_pembuatan4',
			'class'		=>'input-mini',
			'maxlength'	=>'4',
			'value'	=>''
			);

$daya_angkut4=array(
			'name' 	=>'daya_angkut4', 
			'id'	=>'daya_angkut4',			
			'maxlength'	=>'',
			'value'	=>''
			);

$kode_pelayanan4=array(
			'name' 	=>'kode_pelayanan4', 
			'id'	=>'kode_pelayanan4',			
			'maxlength'	=>'',
			'value'	=>''
			);

$alamat_pemilik4=array(
			'name' 	=>'alamat_pemilik4', 
			'id'	=>'alamat_pemilik4',
			'class'		=>'input-xlarge',			
			'maxlength'	=>'',
			'value'	=>''
			);

$rt4=array(
			'name' 	=>'rt4', 
			'id'	=>'rt4',
			'class'		=>'input-mini',			
			'value'	=>''
			);

$no_hp4=array(
			'name' 	=>'no_hp4', 
			'id'	=>'no_hp4',			
			'maxlength'	=>'',
			'value'	=>''
			);

$nomor_rangka4=array(
			'name' 	=>'nomor_rangka4', 
			'id'	=>'nomor_rangka4',			
			'maxlength'	=>'',
			'value'	=>''
			);

$nomor_mesin4=array(
			'name' 	=>'nomor_mesin4', 
			'id'	=>'nomor_mesin4',			
			'maxlength'	=>'',
			'value'	=>''
			);

$kode_trayek4=array(
			'name' 	=>'kode_trayek4', 
			'id'	=>'kode_trayek4',			
			'maxlength'	=>'',
			'value'	=>''
			);

$nom_uji_berkala4=array(
			'name' 	=>'nom_uji_berkala4', 
			'id'	=>'nom_uji_berkala4',			
			'maxlength'	=>'',
			'value'	=>''
			);

$retribusi=array(
			'name' 	=>'retribusi', 
			'id'	=>'retribusi',
			'size' 		=>'15',
			'maxlength'	=>'',
			'value'	=>'0'
			);

$data_listPersyaratan = $this->Permohonan_model->get_listPersyaratan(18);

$nosk=array(
			'name' 	=>'nosk', 
			'id'	=>'nosk',
			'class'		=>'input-medium',			
			'maxlength'	=>'',
			'value'	=>''
			);

$catatan_bo=array(
			'name' 	=>'catatan_bo', 
			'id'	=>'catatan_bo',
			'class'		=>'input-xlarge',			
			'maxlength'	=>'',
			'value'	=>''
			);

?>

<body>
<div id="Ajax"></div>
<div id="Mho" class="modal">    
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h2>Pencarian data HO</h2>
	</div>	
    <div class="modal-body">		 
        <p><?=$output?></p>  
    </div>  
</div>
<form name="kirim" class="form-vertical" action="<?=site_url()."/trayek"?>" method="post">
<fieldset>
  <table width="100%"  border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" ><p><h1>
        <div id="wmy">Edit Data Permohonan Trayek
          <input type="hidden" name="id" id="id" value="<?=$id?>">
          <input type="hidden" name="trayek_id" id="trayek_id">
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
      <td width="71%" align="left"><? echo form_dropdown('jnspermohonan', $data_jenis_permohonan,'','id="jnspermohonan"');?></td>
    </tr>
    <!--SIUP baru-->	
    <tr class="font3" id="RowSK">
      <td align="right" style="padding-left:10px ">Pencarian Data No SK Lama</td>
      <td align="center" class="text">:</td>
      <td align="left"><? echo form_input($nosk_lama);?><a href="#Mho" data-toggle="modal"><img src="../../assets/images/search.gif" width="16" height="16" align="Cari" title="Cari SIUP"></a></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:10px ">No. Agenda</td>
      <td align="center" class="text">:</td>
      <td align="left"><? echo form_input($no_agenda);?></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:10px ">No. Surat Permohonan</td>
      <td align="center" class="text">:</td>
      <td align="left"><? echo form_input($no_suratpermohonan);?></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:10px ">Tanggal Surat Permohonan</td>
      <td align="center" class="text">:</td>
      <td align="left"><input name="tglsuratmohon" type="text" id="tglsuratmohon" class="input-small" size="10"/></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:10px ">No. Rekomendasi Dishubkominfo</td>
      <td align="center" class="text">:</td>
      <td align="left"><? echo form_input($no_rekomendasidishubkominfo);?></td>
    </tr>
    <tr class="font3">
      <td width="29%" align="right" style="padding-left:10px ">Tanggal Rekomendasi Dishubkominfo</td>
      <td width="2%" align="center" class="text">:</td>
      <td width="71%" align="left"><input name="tglrekomendasidishubkominfo" type="text" id="tglrekomendasidishubkominfo" class="input-small" size="10"/></td>
    </tr>	
    <!--SIUP lama-->
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
    <tr class="font3">
      <td align="right" style="padding-left:10px ">Bentuk Perusahaan </td>
      <td align="center"  class="text">:</td>
      <td align="left"><? echo form_dropdown('bentuk2', $bentuk2,'','id="bentuk2"');?> </td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Alamat Perusahaan</td>
      <td align="center"  class="text">:</td>
      <td align="left" class="font3">
<span class="text"><? echo form_input($alamat2);?></span>&nbsp;RT : <span class="text">&nbsp;<? echo form_input($rt2);?></span> </td>
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
      <td style="padding:5px 0px 5px 0px; border-bottom:1px dashed #000000;  " colspan="3" align="left" valign="bottom"  class="font2">4. Data Pendukung</td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Nomor Kendaraan</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($nomor_kendaraan4);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Nama Pemilik</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($nama_pemilik4);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Merk Kendaraan</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($merk_kendaraan4);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Tahun Pembuatan</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($tahun_pembuatan4);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Daya Angkut</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($daya_angkut4);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Kode Pelayanan</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($kode_pelayanan4);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Alamat Pemilik</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($alamat_pemilik4);?> RT : <? echo form_input($rt4);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Kecamatan</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><select name="kec4" id="kec4" onChange="PilihDesa(this,document.getElementById('desa4'),'')">
      </select></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Kelurahan</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><select name="desa4" id="desa4">
      </select></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >No. HP</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($no_hp4);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Nomor Rangka</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($nomor_rangka4);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Nomor Mesin</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($nomor_mesin4);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Kode Trayek</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($kode_trayek4);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Nomor Uji Berkala</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($nom_uji_berkala4);?></td>
    </tr>
    <tr class="font3"  >
      <td colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" >5. Retribusi </td>
    </tr>
    <tr>
      <td align="right">Retribusi</td>
      <td>:&nbsp;</td>
      <td>Rp . <span class="text"><? echo form_input($retribusi);?></span> </td>
    </tr>
    <tr valign="top" class="font3" >
      <td align="right"  style="padding-left:10px ">Pembayaran</td>
      <td>:&nbsp;</td>
      <td align="left"><div>
          <input  name="sbayar" id="sbayar" value="1" type="radio" >
        Sudah dibayar, tanggal        <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.getElementById('tglbayar'));return false;" hidefocus="HIDEFOCUS">  </a>
          <input name="tglbayar" type="text" id="tglbayar" size="10" class="input-small"/>
          <br><input name="sbayar" id="sbayar" onchange="SetRetribusi(this)"  value="0" type="radio" checked />
Belum dibayar <br>
</div>          </td>
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
              <input type="hidden" name="Hsyarat<?=$i?>" id="Hsyarat<?=$i?>2" value="<?=$syarat_id[$i]?>"></td>
          <td valign="top"><?=$data[$i]?></td>
          <td><div align="center">
              <input type="text" name="syarat<?=$i?>" id="syarat<?=$i?>2" value="<?=$this->Permohonansyarat_model->get_data_permohonansyarat($id,$syarat_id[$i])?>">
          </div></td>
        </tr>
        <?
				}
		 ?>
        <input type="hidden" name="jumlah" value="<?=$jml?>"/>
      </table></td>
    </tr>
	<tbody id="datasurveyor">
	</tbody>
    <tr align="right">
      <td colspan="3">&nbsp;      </td>
    </tr>
    <tr align="right">
      <td>No. Reg Izin Trayek</td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_input($nosk);?></span></div></td>
    </tr>
    <tr align="right">
      <td>Tanggal terbit</td>
      <td><div align="center">:</div></td>
      <td><div align="left">
        <input name="tglterbit" type="text" id="tglterbit" size="10" class="input-small"/>
      </div></td>
    </tr>
    <tr align="right">
      <td>Berlaku sampai dengan</td>
      <td><div align="center">:</div></td>
      <td><div align="left">
        <input name="tglexpired" type="text" id="tglexpired" size="10" class="input-small"/>
      </div></td>
    </tr>
    <tr align="right">
      <td>Catatan Petugas Back Office</td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_textarea($catatan_bo);?></span></div></td>
    </tr>
    <tr align="right">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr align="right">
      <td colspan="3"><input type="button" name="Button" value="Simpan" onClick="simpen()">
      <input type="button" name="Submit2" value="Batal" onClick="document.kirim.submit()"></td>
    </tr>
  </table>
</fieldset>
</form>
<script language="javascript">
	function hitungRetribusi()
	{	
	var var_retjusaha=0;
	var var_indeksgangguan=0;
	var var_indekslokasi=0;
	var base_url = '<?echo site_url()?>';				
	
	
	var luas1=$('#luas1').val();
	var luas2=$('#luas2').val();	
	if (luas2!="")	
		var luas=luas1+'.'+luas2
	else
		var luas=luas1;
	//document.write(base_url + '/' + 'ho/get_tarif_ho/' + $('#jenis_perusahaan2').val() + '/' + $('#indeksgangguan_id3').val() + '/' +  $('#indekslokasi_id3').val() + '/' + luas);            
	$.ajax({
    	'url' : base_url + '/' + 'ho/get_tarif_ho/' + $('#jenis_perusahaan2').val() + '/' + $('#indeksgangguan_id3').val() + '/' +  $('#indekslokasi_id3').val() + '/' + luas,            
        'success' : function(data){				
			var obj = jQuery.parseJSON(data);
			$('#retribusi').val(eval(luas)*eval(obj.tarif)*eval(obj.indeksgangguan)*eval(obj.indekslokasi));			
        },
		'error' : function(data){
            alert(data);	
        }
        });		
	
	}

	function OnLoad()
	{	
		CreateKecamatan(document.getElementById('kec1'),'<?=isset($dataPermohonan->kecamatan_id) ? $dataPermohonan->kecamatan_id : ''?>'); 
		PilihDesa(document.getElementById('kec1'),document.getElementById('desa1'),'<?=isset($dataPermohonan->desa_id) ? $dataPermohonan->desa_id : ''?>');
		CreateKecamatan(document.getElementById('kec2'),'<?=isset($dataPerusahaan->kecamatan_id) ? $dataPerusahaan->kecamatan_id : ''?>'); 
		PilihDesa(document.getElementById('kec2'),document.getElementById('desa2'),'<?=isset($dataPerusahaan->desa_id) ? $dataPerusahaan->desa_id : ''?>');			
		CreateKecamatan(document.getElementById('kec4'),'<?=isset($dataPerusahaan->kecamatan_id) ? $dataPerusahaan->kecamatan_id : ''?>'); 
		PilihDesa(document.getElementById('kec4'),document.getElementById('desa4'),'<?=isset($dataPerusahaan->desa_id) ? $dataPerusahaan->desa_id : ''?>');			
	}
	
	function simpen()
	{
	if (confirmSubmit())
		{
		document.kirim.action="<?=site_url()."/trayek/simpen_ubah"?>";
		document.kirim.submit();
		}
	}
	OnLoad();
<? 
if ($id<>"")
{
?> 
Tpilih('trayek',<?=$id?>);
<?
}
?>
 </script>
</body>
</html>
