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
		
		if (jenis=='lokasi')
		{		
		$.ajax({
            'url' : base_url + '/' + 'master/get_data_lokasi/'+id,            
            'success' : function(data){				
				
				var obj = jQuery.parseJSON(data);				
				
				$('#tglmohon').val(obj.tglpermohonan);
				$("#jnspermohonan option[value='" + obj.jpermohonan_id + "']").attr("selected", true);	
				if (obj.jpermohonan_id==4) {$('#RowSK').show();$('#RowSK1').show();}
				$('#lokasi_id').val(obj.lokasi_id);
				$('#pemohon_id').val(obj.pemohon_id);
				$('#nosklama').val(obj.nosk_lama);
				$('#tglsklama').val(obj.tglsk_lama);
				$('#nosurat').val(obj.nosurat);
				$('#tglsurat').val(obj.tglsurat);

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

				$('#alamat2').val(obj.alamat2);				
				$('#rt2').val(obj.rt2);
				$("#kec2 option[value='" + obj.kecamatan_id2 + "']").attr("selected", true);
				PilihDesa(document.getElementById('kec2'),document.getElementById('desa2'),'');
				$("#desa2 option[value='" + obj.desa_id2 + "']").attr("selected", true)
				$('#luas').val(obj.luas);
				$('#peruntukan').val(obj.peruntukan);
								
				$('#retribusi').val(obj.retribusi);
				$('#tglbayar').val(obj.tglbayar);				
				$("#sbayar[value='"+ obj.sbayar +"']").attr('checked', true);
				$('#ketbayar').val(obj.ketbayar);

				$('#point1').val(obj.point1);
				$('#point1_2').val(obj.point1_2);
				$('#point1_3').val(obj.point1_3);
				$('#point2').val(obj.point2);
				$('#point3').val(obj.point3);
				$('#point6').val(obj.point6);
				$('#nosk').val(obj.nosk);
				$('#tglterbit').val(obj.tglterbit);
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
		$( "#tglsklama" ).datepicker();				
		$( "#tglsklama" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglsklama" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});

	$(function() {
		$( "#tglsurat" ).datepicker();				
		$( "#tglsurat" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglsurat" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
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

		if ($('#jnspermohonan').val()==1) {$('#RowSK').hide();$('#RowSK1').hide();}
		else {$('#RowSK').show();$('#RowSK1').show();}
		

	});

	$(function() {
		$("#luas2").keypress(function (e) {     
     		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {       
               return false;
    		}
   		});

		$('#jnspermohonan').change(function () {      
     		if (this.value==1) {$('#RowSK').hide();$('#RowSK1').hide();}
			else {$('#RowSK').show();$('#RowSK1').show();}    		    		
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
$nosklama=array(
			'name' 	=>'nosklama', 
			'id'	=>'nosklama',			
			'size' 		=>'',
			'maxlength'	=>'',
			'value'	=>''
			);
$nosurat=array(
			'name' 	=>'nosurat', 
			'id'	=>'nosurat',			
			'size' 		=>'',
			'maxlength'	=>'',
			'value'	=>''
			);
$data_jenis_permohonan = $this->Permohonan_model->get_jenis_permohonan(10);
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

$nosk=array(
			'name' 	=>'nosk', 
			'id'	=>'nosk',			
			'maxlength'	=>'',
			'value'	=>''
			);
$alamat2=array(
			'name' 	=>'alamat2', 
			'id'	=>'alamat2',
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

$peruntukan=array(
			'name' 	=>'peruntukan', 
			'id'	=>'peruntukan',			
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

$data_listPersyaratan = $this->Permohonan_model->get_listPersyaratan(10);

$point1=array(
			'name' 	=>'point1', 
			'id'	=>'point1',	
			'class'		=>'input-large',		
			'maxlength'	=>'',
			'value'	=>''
			);

$point1_2=array(
			'name' 	=>'point1_2', 
			'id'	=>'point1_2',	
			'class'		=>'input-large',		
			'maxlength'	=>'',
			'value'	=>''
			);

$point1_3=array(
			'name' 	=>'point1_3', 
			'id'	=>'point1_3',	
			'class'		=>'input-large',		
			'maxlength'	=>'',
			'value'	=>''
			);

$point2=array(
			'name' 	=>'point2', 
			'id'	=>'point2',	
			'class'		=>'input-large',		
			'maxlength'	=>'',
			'value'	=>''
			);

$point3=array(
			'name' 	=>'point3', 
			'id'	=>'point3',	
			'class'		=>'input-large',		
			'maxlength'	=>'',
			'value'	=>''
			);

$point6=array(
			'name' 	=>'point6', 
			'id'	=>'point6',				
			'maxlength'	=>'',
			'value'	=>''
			);


$catatan_bo=array(
			'name' 	=>'catatan_bo', 
			'id'	=>'catatan_bo',	
			'class'		=>'input-large',		
			'maxlength'	=>'',
			'value'	=>''
			);

$luas=array(
			'name' 	=>'luas', 
			'id'	=>'luas',
			'maxlength'	=>'',
			'value'	=>'0'
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
<form name="kirim" class="form-vertical" action="<?=site_url()."/lokasi"?>" method="post">
<fieldset>
  <table width="100%"  border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" ><p><h1>
        <div id="wmy">Edit Data Permohonan Lokasi 
          <input type="hidden" name="id" id="id" value="<?=$id?>">
          <input type="hidden" name="lokasi_id" id="lokasi_id">
          <input type="hidden" name="noregistrasi" id="noregistrasi">
        </div>
      </h1></p>
      <p>1. Jenis Permohonan</p></td>
    </tr>
    <tr class="font3">
      <td width="32%" align="right" style="padding-left:10px ">Tanggal Permohonan</td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="67%" align="left"><input type="text" name="tglmohon" id="tglmohon" class="input-small" size="10" readonly /></td>
    </tr>
    <tr class="font3" >
      <td width="32%" align="right"  style="padding-left:10px ">Jenis Permohonan </td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="67%" align="left"><? echo form_dropdown('jnspermohonan', $data_jenis_permohonan,'','id="jnspermohonan"');?></td>
    </tr>
    <!--SIUP baru-->	
    <tr class="font3" id="RowSK">
      <td align="right" style="padding-left:10px ">Pencarian Data No SK Lama</td>
      <td align="center" class="text">:</td>
      <td align="left"><? echo form_input($nosklama);?></td>
    </tr>
    <tr class="font3" id="RowSK1">
      <td align="right" style="padding-left:10px ">Tanggal SK Lama</td>
      <td align="center" class="text">:</td>
      <td align="left"><input name="tglsklama" type="text" id="tglsklama" class="input-small" size="10"/></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:10px ">Surat Permohonan Perpanjangan Tanggal</td>
      <td align="center" class="text">:</td>
      <td align="left"><input name="tglsurat" type="text" id="tglsurat" class="input-small" size="10"/></td>
    </tr>
    <tr class="font3">
      <td width="32%" align="right" style="padding-left:10px ">Surat Permohonan Perpanjangan Nomor</td>
      <td width="1%" align="center" class="text">:</td>
      <td width="67%" align="left"><? echo form_input($nosurat);?></td>
    </tr>	
    <!--SIUP lama-->
    <tr>
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2">2. Data Pemohon</td>
    </tr>
    <tr class="font3" >
      <td width="32%" align="right" style="padding-left:10px ">Nomor KTP </td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="67%" align="left" ><? echo form_input($ktp1);?>&nbsp;
        <input type="hidden" name="pemohon_id" id="pemohon_id">
</td>
    </tr>
    <tr class="font3">
      <td width="32%" align="right"  style="padding-left:10px ">Nama Lengkap </td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="67%" align="left"><? echo form_input($nama1);?> </td>
    </tr>
    <tr class="font3">
      <td width="32%" align="right" style="padding-left:10px ">TTL</td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="67%" align="left"><? echo form_input($tlahir1);?> <input name="tgllahir1" type="text" id="tgllahir" class="input-small" size="10"/></td>
    </tr>
    <tr class="font3">
      <td width="32%" align="right"  style="padding-left:10px ">Pekerjaan / Jabatan</td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="67%" align="left"><? echo form_input($pekerjaan1);?> </td>
    </tr>
    <tr class="font3" >
      <td width="32%" align="right"  style="padding-left:10px ">Warga Negara </td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="67%" align="left" ><? echo form_dropdown('warga_id1', $warga_id1,'','id="warga_id1"');?>
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
      <td align="left"><select name="kec1" id="kec1" onChange="PilihDesa(this,document.getElementById('desa1'),'')">
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
      <td height="25" style="padding:5px 0px 5px 0px; border-bottom:1px dashed #000000;  " colspan="3" align="left" valign="bottom"  class="font2">3. Data Lokasi </td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Alamat</td>
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
      <td align="right" style="padding-left:10px " >Luas Tanah </td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($luas);?> </td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Peruntukan</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($peruntukan);?></td>
    </tr>
    <tr class="font3"  >
      <td colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" >4. Retribusi </td>
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
        <input name="sbayar" id="sbayar" value="1" type="radio" >
Sudah dibayar, tanggal <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.getElementById('tglbayar'));return false;" hidefocus="HIDEFOCUS"> </a>
<input name="tglbayar" type="text" id="tglbayar" size="10" class="input-small"/>
<br>
<input name="sbayar" id="sbayar" onchange="SetRetribusi(this)"  value="0"type="radio" />
Belum dibayar <br>
<input  name="sbayar" id="sbayar" onChange="SetRetribusi(this)"  value="-1" type="radio" checked>
Gratis <br>
</div>          </td>
    </tr>
    <tr>
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" >5. Lampiran Persyaratan</td>
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
    <tr>
      <td colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" >6. Data Ijin Lokasi </td>
    </tr>
    <tr>
      <td><div align="right">Memperhatikan Point 1 </div></td>
      <td><div align="center">:</div></td>
      <td><span class="text"><? echo form_textarea($point1);?></span></td>
    </tr>
    <tr>
      <td><div align="right">Memperhatikan Point 2</div></td>
      <td><div align="center">:</div></td>
      <td><span class="text"><? echo form_textarea($point1_2);?></span></td>
    </tr>
    <tr>
      <td><div align="right">Memperhatikan Point 3 (Khusus Perpanjangan)</div></td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_textarea($point1_3);?></span></div></td>
    </tr>
    <tr>
      <td><div align="right">Menimbang Point 2 </div></td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_textarea($point2);?></span></div></td>
    </tr>
    <tr>
      <td><div align="right">Menimbang Point 3</div></td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_textarea($point3);?></span></div></td>
    </tr>
    <tr>
      <td><div align="right">Memutuskan Kedua Point 6</div></td>
      <td><div align="center">:</div></td>
      <td><div align="left">Segera menyelesaikan ijin-ijin yang diperlukan seperti Ijin Mendirikan Bangunan (IMB), <span class="text"><? echo form_input($point6);?></span> serta perijinan lainnya kepada instansi berwenang;	</div></td>
    </tr>
    <tr>
      <td><div align="right">No. SK </div></td>
      <td><div align="center">:</div></td>
      <td><span class="text"><? echo form_input($nosk);?></span></td>
    </tr>
    <tr>
      <td><div align="right">Tanggal Terbit </div></td>
      <td><div align="center">:</div></td>
      <td><input name="tglterbit" type="text" id="tglterbit" class="input-small" size="10"/></td>
    </tr>
    <tr align="right">
      <td>Catatan Petugas Back Office </td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_textarea($catatan_bo);?></span>
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
	if (confirmSubmit())
		{
		document.kirim.action="<?=site_url()."/lokasi/simpen_ubah"?>";
		document.kirim.submit();
		}
	}
	OnLoad();

<? 
if ($id<>"")
{
?> 
Tpilih('lokasi',<?=$id?>);
<?
}
?>
 </script>
</body>
</html>
