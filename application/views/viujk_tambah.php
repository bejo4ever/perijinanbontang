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
<link href="../../assets/bootstrap/css/bootstrap.css" rel="stylesheet">
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
    <script src="../../assets/bootstrap/js/bootstrap.js"></script> 	
	<script>
	

	function Tpilih(jenis,id)
		{		
		var base_url = '<?echo site_url()?>';
		
		if (jenis=='ho')
		{
		$.ajax({
            'url' : base_url + '/' + 'master/get_data_vho/'+id,            
            'success' : function(data){				
				var obj = jQuery.parseJSON(data);				
				$('#no_sk').val(obj.nosk);
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
				$("#jenis_perusahaan2 option[value='" + obj.jenis_perusahaan + "']").attr("selected", true);		

				$('#usaha2').val(obj.usaha);				
				$("#statustempat_id3 option[value='" + obj.statustempat_id + "']").attr("selected", true);			
				
				var num=obj.luas
				var parts = num.toString().split('.');		
				if (parts[0]=="") parts[0]=0;
				if (parts[1]=="") parts[1]=0;		
				$('#luas1').val(parts[0]);
				$('#luas2').val(parts[1]);			    			
    			$('#alamat3').val(obj.alamat3);    			
				$("#kec3 option[value='" + obj.kecamatan_id3 + "']").attr("selected", true);
				PilihDesa(document.getElementById('kec3'),document.getElementById('desa3'),'');    			
				$("#bentukbangunan_id3 option[value='" + obj.bentukbangunan + "']").attr("selected", true);
    			$('#butara3').val(obj.butara);
    			$('#btimur3').val(obj.butimur);
    			$('#bselatan3').val(obj.bselatan);
    			$('#bbarat3').val(obj.bbarat);
				$("#indeksgangguan_id3 option[value='" + obj.indeksgangguan_id + "']").attr("selected", true);			
				$("#indekslokasi_id3 option[value='" + obj.indekslokasi_id + "']").attr("selected", true);
    			$('#tglsurvey').val(obj.tglsurvey);
    			$('#ket').val(obj.keterangan);
    			$('#no_imb').val(obj.no_imb);
				hitungRetribusi();
				
				
            },
			'error' : function(data){
               alert(data);	
            }
        });
		}        
				
		}

	$(function() {
		$( "#tglmohon" ).datepicker();				
		$( "#tglmohon" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglmohon" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
		$( "#tglmohon" ).val('<?=date('d-m-Y')?>');	
	});

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
		$( "#tglrekomendasi" ).datepicker();				
		$( "#tglrekomendasi" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglrekomendasi" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
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
$no_sk=array(
			'name' 	=>'no_sk', 
			'id'	=>'no_sk',
			'class'		=>'input-medium',
			'size' 		=>'10',
			'maxlength'	=>'10',
			'value'	=>''
			);
$data_jenis_permohonan = $this->Permohonan_model->get_jenis_permohonan(5);
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

$dirut1=array(
			'name' 	=>'dirut1', 
			'id'	=>'dirut1',			
			'maxlength'	=>'',
			'value'	=>''
			);

$dirut2=array(
			'name' 	=>'dirut2', 
			'id'	=>'dirut2',			
			'maxlength'	=>'',
			'value'	=>''
			);

$dirut3=array(
			'name' 	=>'dirut3', 
			'id'	=>'dirut3',
			'maxlength'	=>'',
			'value'	=>''
			);


$grade=array(
			'name' 	=>'grade', 
			'id'	=>'grade',
			'class'		=>'input-mini',
			'maxlength'	=>'',
			'value'	=>''
			);


$nama_pjt=array(
			'name' 	=>'nama_pjt', 
			'id'	=>'nama_pjt',
			'maxlength'	=>'',
			'value'	=>''
			);


$no_pjt=array(
			'name' 	=>'no_pjt', 
			'id'	=>'no_pjt',
			'maxlength'	=>'',
			'value'	=>''
			);


$no_imb=array(
			'name' 	=>'no_imb', 
			'id'	=>'no_imb',
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
$data_listPersyaratan = $this->Permohonan_model->get_listPersyaratan(5);

$catatan_bo=array(
			'name' 	=>'catatan_bo', 
			'id'	=>'catatan_bo',	
			'class'		=>'input-xlarge',		
			'maxlength'	=>'',
			'value'	=>''
			);

$data_bidangjasa = $this->Iujk_model->ListBidangJasaIUJK();
?>
<script>
var countRow		= 1;
function addDataSurveyor()
{
	$(function() {		
		countRow++;
		var counter1 = countRow;						
		$("#totaldatasurveyor").val(countRow);		
		
		var newDiv = $(document.createElement('tr')).attr("id", 'datasurvey1' + counter1);		
			newDiv.html('<td><div align="right"><strong>Tim Survey '+counter1+'</strong></div></td>'+
					    '<td>&nbsp;</td>'+
						'<td>&nbsp;</td>');
    		newDiv.appendTo("#datasurveyor");
		var newDiv = $(document.createElement('tr')).attr("id", 'datasurvey2' + counter1);		
    		newDiv.html('<td><div align="right">Nama</div></td>'+
      					'<td><div align="center">:</div></td>'+
      					'<td>'+
						'<input type="text" name="nama_surveyor'+counter1+'" id="nama_surveyor'+counter1+'"/>'+							
						'<span id="delDataSurveyor'+counter1+'"><input type="button" name="button" value="Hapus Data Surveyor" onclick=hapusDataSurveyor('+counter1+')></span)</td>');
    		newDiv.appendTo("#datasurveyor");			
		var newDiv = $(document.createElement('tr')).attr("id", 'datasurvey3' + counter1);		
    		newDiv.html('<td><div align="right">Instansi/Jabatan</div></td>'+
      					'<td><div align="center">:</div></td>'+
      					'<td>'+
						'<input type="text" name="jabatan_surveyor'+counter1+'" id="jabatan_surveyor'+counter1+'"/>'+							
						'</td>');    					
			newDiv.appendTo("#datasurveyor");		
		$('#delDataSurveyor'+(counter1-1)).hide();				
	});
}

function hapusDataSurveyor(div)
   {
   if (confirm("Anda yakin ingin menghapus data yang dipilih?"))
   {	
   $(function() {
		$("#datasurvey1"+div).remove();
   		$("#datasurvey2"+div).remove();     
		$("#datasurvey3"+div).remove(); 	
			
   });
	countRow--;	   
	$("#totaldatasurveyor").val(countRow);
	$('#delDataSurveyor'+countRow).show();
   }
   } 
</script>
<body>
<div id="Ajax"></div>
<div id="Mho" class="modal hide">    
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h2>Pencarian data HO</h2>
	</div>	
    <div class="modal-body">		 
        <p><?=$output?></p>  
    </div>  
</div>
<form name="kirim" class="form-vertical" action="<?=site_url()."/iujk"?>" method="post">
<fieldset>
  <table width="100%"  border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" ><p><h1>
        <div id="wmy">Tambah Data Permohonan IUJK </div>
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
      <td width="29%" align="right" style="padding-left:10px ">Pencarian Data No SK Lama </td>
      <td width="2%" align="center" class="text">:</td>
      <td width="71%" align="left"><? echo form_input($no_sk);?><a href="#Mho" data-toggle="modal"><img src="../../assets/images/search.gif" width="16" height="16" align="Cari" title="Cari SIUP"></a></td>
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
      <td align="right"  style="padding-left:10px ">Nama Direktur 1 </td>
      <td align="center"  class="text"><div align="center">:</div></td>
      <td align="left" class="font3"><span class="text"><? echo form_input($dirut1);?></span></td>
    </tr>
    <tr class="font3">
      <td align="right"  style="padding-left:10px ">Nama Direktur 2 </td>
      <td align="center"  class="text"><div align="center">:</div></td>
      <td align="left" class="font3"><span class="text"><? echo form_input($dirut2);?></span></td>
    </tr>
    <tr class="font3">
      <td align="right"  style="padding-left:10px ">Nama Direktur 3 </td>
      <td align="center"  class="text"><div align="center">:</div></td>
      <td align="left" class="font3"><span class="text"><? echo form_input($dirut3);?></span></td>
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
      <td align="right" style="padding-left:20px ">Kualifikasi</td>
      <td align="center"  class="text">:</td>
      <td align="left" class="font3"><? echo form_dropdown('kualifikasi2', $kualifikasi2,'','id="kualifikasi2"');?></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Grade</td>
      <td align="center"  class="text">:</td>
      <td align="left" class="font3"><span class="text"><? echo form_input($grade);?></span></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Nama Penanggung Jawab Teknis </td>
      <td align="center"  class="text">:</td>
      <td align="left" class="font3"><span class="text"><? echo form_input($nama_pjt);?></span></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">No. PJT-BU </td>
      <td align="center"  class="text">:</td>
      <td align="left" class="font3"><span class="text"><? echo form_input($no_pjt);?></span></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Status Perusahaan </td>
      <td align="center"  class="text">:</td>
      <td align="left" class="font3"><? echo form_dropdown('status', $status,'','id="status"');?></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Jenis Usaha Jasa </td>
      <td align="center"  class="text">:</td>
      <td align="left" class="font3"><? echo form_dropdown('jenisjasa', $jenisjasa,'','id="jenisjasa"');?></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Bidang Pekerjaan </td>
      <td align="center"  class="text">:</td>
      <td align="left" class="font3">
		<?
		 $jml=$data_bidangjasa[0];
		 $data=$data_bidangjasa[1];
		 $id=$data_bidangjasa[2];
		 for($i=0;$i<$jml;$i++)
			{
		 ?>
		 <input type="checkbox" name="checkbox" value="<?=$id[$i]?>"> 
		 <?
			echo $data[$i];
			echo "<br>";
			}
		?>
		</td>
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
      <td align="right" style="padding-left:10px " ><strong>Akte Perusahaan </strong></td>
      <td align="center"  class="text">&nbsp;</td>
      <td align="left"  class="text">&nbsp;</td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Notaris</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($notaris2);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >No.Akte</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($noakta2);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Tanggal Terbit </td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><input name="tglakte" type="text" id="tglakte" size="10" class="input-small"/></td>
    </tr>
    <tr class="font3"  >
      <td colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" >4. Data Pendukung </td>
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
          <input  name="sbayar"value="1" type="radio" >
        Sudah dibayar, tanggal        <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.getElementById('tglbayar'));return false;" hidefocus="HIDEFOCUS">  </a>
          <input name="tglbayar" type="text" id="tglbayar" size="10" class="input-small"/>
          <br><input name="sbayar" onchange="SetRetribusi(this)"  value="0"type="radio" checked />
Belum dibayar <br>
</div>          </td>
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
		  $id=$data_listPersyaratan[2];
		  for($i=0;$i<$jml;$i++)
				{
		  ?>
          <tr <? if ($i%2<>0) {?> bgcolor="#E7F0FE" <? }?>>
            <td valign="top" align="center"><?=($i+1)?>
            <input type="hidden" name="Hsyarat<?=$i?>" id="Hsyarat<?=$i?>" value="<?=$id[$i]?>"></td>
            <td valign="top"><?=$data[$i]?></td>
            <td><div align="center">
              <input type="text" name="syarat<?=$i?>" id="syarat<?=$i?>">
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
      <td colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" >7. Data IUJK</td>
    </tr>
    <tr>
      <td><div align="right">Tanggal Survei</div></td>
      <td><div align="center">:</div></td>
      <td><input name="tglsurvey" type="text" id="tglsurvey" class="input-small" size="10"/></td>
    </tr>
    <tr>
      <td><div align="right">Tanggal Rekomendasi </div></td>
      <td><div align="center">:</div></td>
      <td><input name="tglrekomendasi" type="text" id="tglrekomendasi" class="input-small" size="10"/></td>
    </tr>
    <tr>
      <td><div align="right">No. Reg. IUJK</div></td>
      <td><div align="center">:</div></td>
      <td><span class="text"><? echo form_input($nosk);?></span></td>
    </tr>
    <tr>
      <td><div align="right">Tanggal Terbit </div></td>
      <td><div align="center">:</div></td>
      <td><input name="tglterbit" type="text" id="tglterbit" class="input-small" size="10"/></td>
    </tr>
    <tr align="right">
      <td>Berlaku Sampai       </td>
      <td><div align="center">:</div></td>
      <td><div align="left">
        <input name="tglexpired" type="text" id="tglexpired" class="input-small" size="10"/>
      </div></td>
    </tr>
    <tr align="right">
      <td colspan="3"><input type="button" name="Button" value="Simpan">
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
		CreateKecamatan(document.getElementById('kec3'),'<?=isset($dataPerusahaan->kecamatan_id) ? $dataPerusahaan->kecamatan_id : ''?>'); 
		PilihDesa(document.getElementById('kec3'),document.getElementById('desa3'),'<?=isset($dataPerusahaan->desa_id) ? $dataPerusahaan->desa_id : ''?>');			
	}
	
	function simpen()
	{
	if (confirmSubmit())
		{
		document.kirim.action="<?=site_url()."/iujk/simpen_baru"?>";
		document.kirim.submit();
		}
	}
	OnLoad();
 </script>
</body>
</html>
