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
		
		if (jenis=='reklame')
		{
		$.ajax({
            'url' : base_url + '/' + 'master/get_data_reklame/'+id,            
            'success' : function(data){	
						
				var obj = jQuery.parseJSON(data);	
				$('#reklame_id').val(obj.reklame_id);
				$('#tglmohon').val(obj.tglpermohonan);
				$("#jnspermohonan option[value='" + obj.jpermohonan_id + "']").attr("selected", true);
				$('#no_agenda').val(obj.no_agenda);			
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
				
				$('#retribusi').val(obj.retribusi);
				$('#tglbayar').val(obj.tglbayar);				
				$("#sbayar[value='"+ obj.sbayar +"']").attr('checked', true);
				$('#ketbayar').val(obj.ketbayar);
				

				$("#jenisreklame_id1 option[value='" + obj.jenisreklame_id1 + "']").attr("selected", true);		
				$('#jumlah1').val(obj.jumlah1);				
				$('#ukuran1').val(obj.ukuran1);				
				$('#cakupan_media1').val(obj.cakupan_media1);
				$("#ilreklame_id1 option[value='" + obj.ilreklame_id1 + "']").attr("selected", true);		
				$('#harga1').val(obj.harga1);
				$("#Ctanah_pemerintah1[value='"+ obj.tanah_pemerintah1 +"']").attr('checked', true);
				$('#tanah_pemerintah1').val(obj.tanah_pemerintah1);
				$("#sifat_reklame1[value='"+ obj.sifat_reklame1 +"']").attr('checked', true);
				$("#Crokok_alkohol1[value='"+ obj.rokok_alkohol1 +"']").attr('checked', true);
				$('#rokok_alkohol1').val(obj.rokok_alkohol1);
				$('#tempat1').val(obj.tempat1);
				$('#tglmulai1').val(obj.tglmulai1);
				$('#jangkawaktu1').val(obj.jangkawaktu1);				
				$("#satuanwaktu_id1 option[value='" + obj.satuanwaktu_id1 + "']").attr("selected", true);		
				$('#ReklameDetail_id1').val(obj.reklamedetail_id1);

				
				$('#nosk').val(obj.nosk);
				$('#tglterbit').val(obj.tglsk);
				$('#tglexpired').val(obj.tglexpired);
				$('#expiredpajak').val(obj.expiredpajak);
				$('#catatan_bo').val(obj.catatan_bo);

				$("#totaldatareklame").val(obj.totaldatareklame);		
						
				countRow=1;
					
				if (eval(obj.totaldatareklame-1)>0)
					{
					var a=eval(obj.totaldatareklame-1);
					
					for (var i=1;i<=a;i++)
						{
						var j=i+1;						
						countRow=i;						
						addDataReklame();						
						$("#ReklameDetail_id"+j).val(obj["reklamedetail_id"+j]);	
						$("#jenisreklame_id"+j+" option[value='" + obj["jenisreklame_id"+j] + "']").attr("selected", true);		
						$("#jumlah"+j).val(obj["jumlah"+j]);				
						$("#ukuran"+j).val(obj["ukuran"+j]);				
						$("#cakupan_media"+j).val(obj["cakupan_media"+j]);
						$("#ilreklame_id"+j+" option[value='" + obj["ilreklame_id"+j] + "']").attr("selected", true);		
						$("#harga"+j).val(obj["harga"+j]);
						$("#Ctanah_pemerintah"+j+"[value='"+ obj["tanah_pemerintah"+j] +"']").attr('checked', true);
						$("#tanah_pemerintah"+j).val(obj["tanah_pemerintah"+j]);
						$("#sifat_reklame"+j+"[value='"+ obj["sifat_reklame"+j] +"']").attr('checked', true);
						$("#Crokok_alkohol"+j+"[value='"+ obj["rokok_alkohol"+j] +"']").attr('checked', true);
						$("#rokok_alkohol"+j).val(obj["rokok_alkohol"+j]);
						$("#tempat"+j).val(obj["tempat"+j]);
						$("#tglmulai"+j).val(obj["tglmulai"+j]);
						$("#jangkawaktu"+j).val(obj["jangkawaktu"+j]);				
						$("#satuanwaktu_id"+j+" option[value='" + obj["satuanwaktu_id"+j] + "']").attr("selected", true);
			
						}
					}
            },
			'error' : function(data){
               alert(data);	
            }
        });
		}        
		else if (jenis=='pemohon')
		{
		$.ajax({
            'url' : base_url + '/' + 'master/get_data_pemohon/'+id,            
            'success' : function(data){
				var obj = jQuery.parseJSON(data);
				
				$('#pemohon_id').val(obj.pemohon_id);
				$('#ktp').val(obj.ktp);
                $('#nama').val(obj.nama1);
				$('#tlahir').val(obj.tempatlahir);
				$('#tgllahir').val(obj.tgllahir);
				$('#pekerjaan').val(obj.pekerjaan);
				$("#warga_id1 option[value='" + obj.warga_id + "']").attr("selected", true);
				$('#jalan1').val(obj.alamat1);
				$('#rt1').val(obj.rt);
				$("#kec1 option[value='" + obj.kecamatan_id1 + "']").attr("selected", true);				
				PilihDesa(document.getElementById('kec1'),document.getElementById('desa1'),'');
				$("#desa1 option[value='" + obj.desa_id1 + "']").attr("selected", true);
				$('#telp1').val(obj.telp1);
				$('#hp1').val(obj.hp);
            },
			'error' : function(data){
               alert(data);	
            }
        });
		}
		else if (jenis=='perus')
		{
		$.ajax({
            'url' : base_url + '/' + 'master/get_data_perusahaan/'+id,            
            'success' : function(data){
				var obj = jQuery.parseJSON(data);
	
				$('#perusahaan_id').val(obj.perusahaan_id);
				$('#npwp2').val(obj.npwp);
                $('#nama2').val(obj.nama2);
				$('#noakta2').val(obj.noakta);
				$('#tglakta2').val(obj.tglakta);
                $('#notaris2').val(obj.notaris);			
				$("#bentuk2 option[value='" + obj.bentuk_id + "']").attr("selected", true);	
				$("#sperusahaan_id2 option[value='" + obj.sperusahaan_id + "']").attr("selected", true);	
				$('#jalan2').val(obj.alamat2);	
				$('#rt2').val(obj.rt2);
				$("#kec2 option[value='" + obj.kecamatan_id2 + "']").attr("selected", true);
				PilihDesa(document.getElementById('kec2'),document.getElementById('desa2'),'');
				$("#desa2 option[value='" + obj.desa_id2 + "']").attr("selected", true);
				$('#telp2').val(obj.telp2);
				$('#fax2').val(obj.fax);
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
		$( "#tglmulai1" ).datepicker();				
		$( "#tglmulai1" ).datepicker( "option", "showAnim", "drop" );
		$( "#tglmulai1" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	});

	$(function() {
		$( "#tglterbit" ).datepicker({
		onSelect : function (dateStr)
			{
			var d = $.datepicker.parseDate('dd-mm-yy', dateStr);
        	var years = 1;

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
		
		if ($('#jnsrek').val()==2) $('#RowHO').hide();
		else $('#RowHO').show();
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

		$("input[name='jnsrek']").change(function () {			    
     		if (this.value==2) $('#RowHO').hide();
			else $('#RowHO').show();    		
   		});

		

		
	});

	function klik_tanah_pemerintah(i)
	{
		$(function() {			
     		if ($('#Ctanah_pemerintah'+i).is(':checked')) $('#tanah_pemerintah'+i).val(1);
			else $('#tanah_pemerintah'+i).val(0);		    								   			
		});	
	}

	function klik_rokok_alkohol(i)
	{
		$(function() {
     		if ($('#Crokok_alkohol'+i).is(':checked')) $('#rokok_alkohol'+i).val(1);
			else $('#rokok_alkohol'+i).val(0);		   								   			
		});	
	}
	</script>
    <style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
    </style>
</head>
<?
$id=$_GET['id'];

$noho=array(
			'name' 		=>'noho', 
			'id'		=>'noho',					
			'value'		=>''
			);

$expiredpajak=array(
			'name' 		=>'expiredpajak', 
			'id'		=>'expiredpajak',				
			'value'		=>''
			);


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

$cari=array(
			'name' 	=>'cari', 
			'id'	=>'cari',
			'class'		=>'input-medium',
			'size' 		=>'10',
			'maxlength'	=>'10',
			'value'	=>''
			);

$data_jenis_permohonan = $this->Permohonan_model->get_jenis_permohonan(18);



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

$ketbayar=array(
			'name' 	=>'ketbayar', 
			'id'	=>'ketbayar',
			'class'		=>'input-xlarge',			
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



$data_listPersyaratan = $this->Permohonan_model->get_listPersyaratan(3);
$jenisreklame_id = $this->Reklame_model->getJenisreklameList();
$ilreklame_id = $this->Reklame_model->getIlreklameList();

$jumlah=array(
			'name' 	=>'jumlah1', 
			'id'	=>'jumlah1',		
			'class'	=>'input-mini',			
			'maxlength'	=>'',
			'value'	=>''
			);

$ukuran=array(
			'name' 	=>'ukuran1', 
			'id'	=>'ukuran1',						
			'maxlength'	=>'',
			'value'	=>''
			);

$cakupan_media=array(
			'name' 	=>'cakupan_media1', 
			'id'	=>'cakupan_media1',						
			'maxlength'	=>'',
			'value'	=>''
			);

$harga=array(
			'name' 	=>'harga1', 
			'id'	=>'harga1',						
			'maxlength'	=>'',
			'value'	=>''
			);

$tempat=array(
			'name' 	=>'tempat1', 
			'id'	=>'tempat1',						
			'maxlength'	=>'',
			'value'	=>''
			);

$jangkawaktu=array(
			'name' 	=>'jangkawaktu1', 
			'id'	=>'jangkawaktu1',	
			'class'	=>'input-mini',					
			'maxlength'	=>'',
			'value'	=>''
			);
$satuanwaktu_id = $this->Reklame_model->getSatuanwaktuList();
$catatan_bo=array(
			'name' 	=>'catatan_bo', 
			'id'	=>'catatan_bo',
			'class'		=>'input-xlarge',			
			'maxlength'	=>'',
			'value'	=>''
			);

?>
<script>
var countRow		= 1;
function addDataReklame(flagBaru)
{
	$(function() {		
		countRow++;
		var counter1 = countRow;						
		$("#totaldatareklame").val(countRow);		
		

		var newDiv = $(document.createElement('tr')).attr("id", 'datareklame1' + counter1);		
			newDiv.html('<td><div align="right"><strong>Reklame ke-'+counter1+'</strong></div></td>'+
      					'<td>&nbsp;</td>'+
      					'<td>&nbsp;</td>');
    		newDiv.appendTo("#datareklame");
		var newDiv = $(document.createElement('tr')).attr("id", 'datareklame2' + counter1);		
			newDiv.html('<td><div align="right">Jenis Reklame</div></td>'+
      					'<td><div align="center">:</div></td>'+
      					'<td><div align="left">'+
						'<select name="jenisreklame_id'+counter1+'" id="jenisreklame_id'+counter1+'">'+
					 	<?
					 	for($i=1;$i<=count($jenisreklame_id);$i++)
  		    		 	{
					 	?>
					 	'<option value="<?=key($jenisreklame_id)?>"><?=$jenisreklame_id[$i]?></option>'+
					 	<?
					 	next($jenisreklame_id);
					 	}
					 	?>	
					 	'</select>'+
						'<span id="delDataReklame'+counter1+'"><input type="button" name="button" value="Hapus Data Reklame" onclick=hapusDataReklame('+counter1+')></span></td>');			
    		newDiv.appendTo("#datareklame");
		var newDiv = $(document.createElement('tr')).attr("id", 'datareklame3' + counter1);		
			newDiv.html('<td><div align="right">Jumlah</div></td>'+
      					'<td><div align="center">:</div></td>'+
      					'<td><div align="left"><input type="text" name="jumlah'+counter1+'" id="jumlah'+counter1+'" class="<?=$jumlah["class"]?>"></div></td>');
			newDiv.appendTo("#datareklame");
		var newDiv = $(document.createElement('tr')).attr("id", 'datareklame4' + counter1);		
			newDiv.html('<td><div align="right">Ukuran masing-masing Reklame</div></td>'+
      					'<td><div align="center">:</div></td>'+
      					'<td><div align="left"><input type="text" name="ukuran'+counter1+'" id="ukuran'+counter1+'"></div></td>');
			newDiv.appendTo("#datareklame");
		var newDiv = $(document.createElement('tr')).attr("id", 'datareklame5' + counter1);		
			newDiv.html('<td><div align="right">Cakupan Media</div></td>'+
      					'<td><div align="center">:</div></td>'+
      					'<td><div align="left"><input type="text" name="cakupan_media'+counter1+'" id="cakupan_media'+counter1+'"></div></td>');
			newDiv.appendTo("#datareklame");
		var newDiv = $(document.createElement('tr')).attr("id", 'datareklame6' + counter1);		
			newDiv.html('<td><div align="right">Indeks Lokasi</div></td>'+
      					'<td><div align="center">:</div></td>'+
      					'<td><div align="left">'+
						'<select name="ilreklame_id'+counter1+'" id="ilreklame_id'+counter1+'">'+
					 	<?
					 	for($i=1;$i<=count($ilreklame_id);$i++)
  		    		 	{
					 	?>
					 	'<option value="<?=key($ilreklame_id)?>"><?=$ilreklame_id[$i]?></option>'+
					 	<?
					 	next($ilreklame_id);
					 	}
					 	?>	
					 	'</select>'+
						'</td>');			
    		newDiv.appendTo("#datareklame");
		var newDiv = $(document.createElement('tr')).attr("id", 'datareklame7' + counter1);		
			newDiv.html('<td><div align="right">Harga Penjualan</div></td>'+
      					'<td><div align="center">:</div></td>'+
      					'<td><div align="left"><input type="text" name="harga'+counter1+'" id="harga'+counter1+'"></div></td>');
			newDiv.appendTo("#datareklame");
		var newDiv = $(document.createElement('tr')).attr("id", 'datareklame8' + counter1);		
			newDiv.html('<td><div align="right">Reklame Terletak Diatas Tanah Pemerintah</div></td>'+
      					'<td><div align="center">:</div></td>'+
      					'<td><div align="left"><input type="checkbox" name="Ctanah_pemerintah'+counter1+'" id="Ctanah_pemerintah'+counter1+'" value="1" onChange="klik_tanah_pemerintah('+counter1+')"> Ya <input type="hidden" name="tanah_pemerintah'+counter1+'" id="tanah_pemerintah'+counter1+'"></div></td>');
			newDiv.appendTo("#datareklame");
		var newDiv = $(document.createElement('tr')).attr("id", 'datareklame9' + counter1);		
			newDiv.html('<td><div align="right">Sifat Reklame (Komersial/Sosial)</div></td>'+
      					'<td><div align="center">:</div></td>'+
      					'<td><div align="left">'+ 
						'<input name="sifat_reklame'+counter1+'" type="radio" id="sifat_reklame'+counter1+'" value="0" checked> Komersial '+      					
      					'<input name="sifat_reklame'+counter1+'" id="sifat_reklame'+counter1+'" type="radio" value="1"> Sosial</div></td>');
			newDiv.appendTo("#datareklame");
		var newDiv = $(document.createElement('tr')).attr("id", 'datareklame10' + counter1);		
			newDiv.html('<td><div align="right">Reklame Rokok/Minuman Beralkohol</div></td>'+
      					'<td><div align="center">:</div></td>'+
      					'<td><div align="left"><input type="checkbox" name="Crokok_alkohol'+counter1+'" id="Crokok_alkohol'+counter1+'" value="1" " onChange="klik_rokok_alkohol('+counter1+')"> Ya <input type="hidden"  name="rokok_alkohol'+counter1+'" id="rokok_alkohol'+counter1+'"></div></td>');
			newDiv.appendTo("#datareklame");
		var newDiv = $(document.createElement('tr')).attr("id", 'datareklame11' + counter1);		
			newDiv.html('<td><div align="right">Tempat Pemasangan</div></td>'+
      					'<td><div align="center">:</div></td>'+
      					'<td><div align="left"><input type="text" name="tempat'+counter1+'" id="tempat'+counter1+'"></div></td>');
			newDiv.appendTo("#datareklame");
		var newDiv = $(document.createElement('tr')).attr("id", 'datareklame12' + counter1);		
			newDiv.html('<td><div align="right">Tanggal Mulai di pasang</div></td>'+
      					'<td><div align="center">:</div></td>'+
      					'<td><div align="left"><input type="text" name="tglmulai'+counter1+'" id="tglmulai'+counter1+'"></div></td>');
			newDiv.appendTo("#datareklame");
		var newDiv = $(document.createElement('tr')).attr("id", 'datareklame13' + counter1);		
			newDiv.html('<td><div align="right">Jangka Waktu Pemasangan</div></td>'+
      					'<td><div align="center">:</div></td>'+
      					'<td><div align="left"><input type="text" name="jangkawaktu'+counter1+'" id="jangkawaktu'+counter1+'" class="<?=$jangkawaktu["class"]?>"> '+
						'<select name="satuanwaktu_id'+counter1+'" id="satuanwaktu_id'+counter1+'">'+
					 	<?
					 	for($i=1;$i<=count($satuanwaktu_id);$i++)
  		    		 	{
					 	?>
					 	'<option value="<?=key($satuanwaktu_id)?>"><?=$satuanwaktu_id[$i]?></option>'+
					 	<?
					 	next($satuanwaktu_id);
					 	}
					 	?>	
					 	'</select>'+
						'</div></td>');
			newDiv.appendTo("#datareklame");
		var newDiv = $(document.createElement('tr')).attr("id", 'datareklame14' + counter1);		
			newDiv.html('<td><input type="hidden" name="ReklameDetail_id'+counter1+'" id="ReklameDetail_id'+counter1+'"></td>'+
      					'<td>&nbsp;</td>'+
      					'<td>&nbsp;</td>');
			newDiv.appendTo("#datareklame");

		
		$( '#tglmulai'+counter1 ).datepicker();				
		$( '#tglmulai'+counter1 ).datepicker( "option", "showAnim", "drop" );
		$( '#tglmulai'+counter1 ).datepicker( "option", "dateFormat", "dd-mm-yy" );
		
		permohonan_id=$('#id').val();		
		if (flagBaru==1)
		{
		var base_url = '<?echo site_url()?>';	
		
		$.ajax({
            'url' : base_url + '/' + 'reklame/put_reklamedetail/'+permohonan_id,            
            'success' : function(data){
				alert("Data Reklame Berhasil Ditambah");
            },
			'error' : function(data){
               alert(data);	
            }
        });
		}

		$('#delDataReklame'+(counter1-1)).hide();				
	});
}

function hapusDataReklame(div)
   {
   idReklameDetail=$("#ReklameDetail_id"+div).val();	
   if (confirm("Anda yakin ingin menghapus data yang dipilih?"))
   {	
   $(function() {
		var base_url = '<?echo site_url()?>';
		
		$.ajax({
            'url' : base_url + '/' + 'reklame/del_ReklameDetail/'+idReklameDetail,            
            'success' : function(data){				
				alert("Data Reklame Berhasil Dihapus");
            },
			'error' : function(data){
               alert(data);	
            }
        });

		$("#datareklame1"+div).remove();
   		$("#datareklame2"+div).remove();     
		$("#datareklame3"+div).remove(); 	
		$("#datareklame4"+div).remove();
   		$("#datareklame5"+div).remove();     
		$("#datareklame6"+div).remove(); 		
		$("#datareklame7"+div).remove();
   		$("#datareklame8"+div).remove();     
		$("#datareklame9"+div).remove(); 	
		$("#datareklame10"+div).remove();
   		$("#datareklame11"+div).remove();     
		$("#datareklame12"+div).remove(); 
		$("#datareklame13"+div).remove();
		$("#datareklame14"+div).remove(); 	
   });
	countRow--;	   
	$("#totaldatareklame").val(countRow);
	$('#delDataReklame'+countRow).show();
   }
   } 
</script>
<body>
<div id="Ajax"></div>
<div id="Mho" class="modal">    
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h2>Pencarian data HO</h2>
	</div>	
    <div class="modal-body">		 
        <p><?=$output['output']->output?></p>  
    </div>  
</div>
<div id="Mktp" class="modal">    
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h2>Pencarian data Pemohon</h2>
	</div>	
    <div class="modal-body">		 
        <p><?=$output['output1']->output?></p>  
    </div>  
</div>

<div id="Mperus" class="modal">    
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h2>Pencarian data Perusahaan</h2>
	</div>	
    <div class="modal-body">		 
        <p><?=$output['output2']->output?></p>  
    </div>  
</div>
<form name="kirim" class="form-vertical" action="<?=site_url()."/reklame"?>" method="post">
<fieldset>
  <table width="100%"  border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" ><p><h1>
        <div id="wmy">Edit Data Permohonan Reklame 
          <input type="hidden" name="id" id="id" value="<?=$id?>">
          <input type="hidden" name="reklame_id" id="reklame_id">
          <input type="hidden" name="noregistrasi" id="noregistrasi">
</div>
      </h1></p>
      <p>1. Jenis Permohonan</p></td>
    </tr>
    <tr class="font3">
      <td width="28%" align="right" style="padding-left:10px ">Tanggal Permohonan</td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="71%" align="left"><input type="text" name="tglmohon" id="tglmohon" class="input-small" size="10" readonly /></td>
    </tr>
    <tr class="font3" >
      <td width="28%" align="right"  style="padding-left:10px ">Jenis Permohonan </td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="71%" align="left"><? echo form_dropdown('jnspermohonan', $data_jenis_permohonan,'','id="jnspermohonan"');?></td>
    </tr>
    <!--SIUP baru-->	
    <tr class="font3">
      <td align="right" style="padding-left:10px ">No. Agenda</td>
      <td align="center" class="text">:</td>
      <td align="left"><? echo form_input($no_agenda);?></td>
    </tr>	
    <!--SIUP lama-->
    <tr>
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2">2. Data Pemohon</td>
    </tr>
    <tr class="font3" >
      <td width="28%" align="right" style="padding-left:10px ">Nomor KTP </td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="71%" align="left" ><? echo form_input($ktp1);?>&nbsp;
      <input type="hidden" name="pemohon_id" id="pemohon_id"></td>
    </tr>
    <tr class="font3">
      <td width="28%" align="right"  style="padding-left:10px ">Nama Lengkap </td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="71%" align="left"><? echo form_input($nama1);?> </td>
    </tr>
    <tr class="font3">
      <td width="28%" align="right" style="padding-left:10px ">TTL</td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="71%" align="left"><? echo form_input($tlahir1);?> <input name="tgllahir1" type="text" id="tgllahir" class="input-small" size="10"/></td>
    </tr>
    <tr class="font3">
      <td width="28%" align="right"  style="padding-left:10px ">Pekerjaan / Jabatan</td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="71%" align="left"><? echo form_input($pekerjaan1);?> </td>
    </tr>
    <tr class="font3" >
      <td width="28%" align="right"  style="padding-left:10px ">Warga Negara </td>
      <td width="1%" align="center"  class="text">:</td>
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
      <td align="left" class="font3"><span class="text"><? echo form_input($npwp2);?></span>&nbsp;&nbsp;
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
      <td colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" >4. Pajak </td>
    </tr>
    <tr>
      <td align="right">Besar Pajak </td>
      <td><div align="center">:</div></td>
      <td>Rp . <span class="text"><? echo form_input($retribusi);?></span> </td>
    </tr>
    <tr valign="top" class="font3" >
      <td align="right"  style="padding-left:10px ">Pembayaran</td>
      <td><div align="center">:</div></td>
      <td align="left"><div>
          <input  name="sbayar" id="sbayar" value="1" type="radio" >
        Sudah dibayar, tanggal        <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.getElementById('tglbayar'));return false;" hidefocus="HIDEFOCUS">  </a>
          <input name="tglbayar" type="text" id="tglbayar" size="10" class="input-small"/>
          <br><input name="sbayar" id="sbayar" onchange="SetRetribusi(this)"  value="0" type="radio" checked />
Belum dibayar<br> <span class="text">Keterangan <? echo form_input($ketbayar);?></span>
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
    <tr align="right">
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" >6. Data Ijin Reklame</div></td>
    </tr>
    <tr align="right">
      <td>No. Reg. Izin Reklame</td>
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
      <td>Masa berlaku pajak sampai dengan</td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_input($expiredpajak);?></span>
      </div></td>
    </tr>
    <tr align="right">
      <td colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" >7. Reklame</td>
    </tr>
	<tbody id="datareklame">
    <tr align="right">
      <td><strong>Reklame ke-1</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr align="right">
      <td>Jenis Reklame</td>
      <td><div align="center">:</div></td>
      <td><div align="left"><? echo form_dropdown('jenisreklame_id1', $jenisreklame_id,'','id="jenisreklame_id1"');?></div></td>
    </tr>
    <tr align="right">
      <td>Jumlah</td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_input($jumlah);?></span></div></td>
    </tr>
    <tr align="right">
      <td>Ukuran masing-masing Reklame</td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_input($ukuran);?></span></div></td>
    </tr>
    <tr align="right">
      <td>Cakupan Media</td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_input($cakupan_media);?></span></div></td>
    </tr>
    <tr align="right">
      <td>Indeks Lokasi</td>
      <td><div align="center">:</div></td>
      <td><div align="left"><? echo form_dropdown('ilreklame_id1', $ilreklame_id,'','id="ilreklame_id1"');?></div></td>
    </tr>
    <tr align="right">
      <td>Harga Penjualan</td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_input($harga);?></span></div></td>
    </tr>
    <tr align="right">
      <td>Reklame Terletak Diatas Tanah Pemerintah</td>
      <td><div align="center">:</div></td>
      <td><div align="left">
        <input type="checkbox" name="Ctanah_pemerintah1" id="Ctanah_pemerintah1" value="1" onChange="klik_tanah_pemerintah(1)">
Ya&nbsp;
<input type="hidden" name="tanah_pemerintah1" id="tanah_pemerintah1">
      </div></td>
    </tr>
    <tr align="right">
      <td>Sifat Reklame (Komersial/Sosial)</td>
      <td><div align="center">:</div></td>
      <td><div align="left">
        <input name="sifat_reklame1" type="radio" id="sifat_reklame1" value="0" checked>
Komersial
<input name="sifat_reklame1" id="sifat_reklame1" type="radio" value="1">
Sosial</div></td>
    </tr>
    <tr align="right">
      <td>Reklame Rokok/Minuman Beralkohol</td>
      <td><div align="center">:</div></td>
      <td><div align="left">
        <input type="checkbox" name="Crokok_alkohol1" id="Crokok_alkohol1" value="1"  onChange="klik_rokok_alkohol(1)">
Ya
<input type="hidden"  name="rokok_alkohol1" id="rokok_alkohol1">
      </div></td>
    </tr>
    <tr align="right">
      <td>Tempat Pemasangan</td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_input($tempat);?></span></div></td>
    </tr>
    <tr align="right">
      <td>Tanggal Mulai di pasang </td>
      <td><div align="center">:</div></td>
      <td><div align="left">
        <input name="tglmulai1" type="text" id="tglmulai1" size="10" class="input-small"/>
      </div></td>
    </tr>
    <tr align="right">
      <td>Jangka Waktu Pemasangan</td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_input($jangkawaktu);?> <? echo form_dropdown('satuanwaktu_id1', $satuanwaktu_id,'','id="satuanwaktu_id1"');?>
            <input type="hidden" name="totaldatareklame" id="totaldatareklame" value="1">
            <input type="hidden" name="ReklameDetail_id1" id="ReklameDetail_id1">
</span></div></td>
    </tr>
    <tr align="right">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	</tbody>
    <tr align="right">
      <td><div align="left">
        <input type="button" name="Button2" value="Tambah Reklame" onClick="addDataReklame(1)">
      </div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr align="right">
      <td>Catatan Petugas Back Office</td>
      <td>&nbsp;</td>
      <td><div align="left"><span class="text"><? echo form_textarea($catatan_bo);?></span></div></td>
    </tr>
    <tr align="right">
      <td colspan="3">&nbsp;</td>
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
		document.kirim.action="<?=site_url()."/reklame/simpen_ubah"?>";
		document.kirim.submit();
		}
	}
	OnLoad();
<? 
if ($id<>"")
{
?> 
Tpilih('reklame',<?=$id?>);
<?
}
?>
 </script>
</body>
</html>
