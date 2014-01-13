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
		
		if (jenis=='imb')
		{
		$.ajax({
            'url' : base_url + '/' + 'master/get_data_imb/'+id,            
            'success' : function(data){				
				var obj = jQuery.parseJSON(data);
				$('#imb_id').val(obj.imb_id);
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
				$('#rt1').val(obj.rt);
				$("#kec1 option[value='" + obj.kecamatan_id1 + "']").attr("selected", true);				
				PilihDesa(document.getElementById('kec1'),document.getElementById('desa1'),'');
				$("#desa1 option[value='" + obj.desa_id1 + "']").attr("selected", true);
				$('#telp1').val(obj.telp1);
				$('#hp1').val(obj.hp);

				$('#jalan2').val(obj.lokasi2);	
				$('#rt2').val(obj.rt2);
				$("#kec2 option[value='" + obj.kecamatan_id2 + "']").attr("selected", true);
				PilihDesa(document.getElementById('kec2'),document.getElementById('desa2'),'');
				$("#desa2 option[value='" + obj.desa_id2 + "']").attr("selected", true);

				$("#sertifikat option[value='" + obj.sertifikat_id + "']").attr("selected", true);
				$('#luas').val(obj.luas);									
				$('#peruntukan').val(obj.peruntukan);					
				$('#sutara').val(obj.butara);	
				$('#sselatan').val(obj.bselatan);	
				$('#sbarat').val(obj.bbarat);	
				$('#stimur').val(obj.btimur);	
				$('#bpondasi').val(obj.pondasi);	
				$('#btiang').val(obj.tiang);	
				$('#bdinding').val(obj.dinding);	
				$('#bsloof').val(obj.sloof);	
				$('#bratap').val(obj.ratap);	
				$('#bpatap').val(obj.patap);	
				$('#blantai').val(obj.lantai);	
				$('#plafoon').val(obj.plafoon);

				$('#retribusi').val(obj.retribusi);
				$('#tglbayar').val(obj.tglbayar);				
				$("#sbayar[value='"+ obj.sbayar +"']").attr('checked', true);
				$('#no_rekomendasi').val(obj.no_rekomendasi);				
				$('#nama_bibit').val(obj.nama_bibit);
				$('#jumlah_bibit').val(obj.jumlah_bibit);
				
				$('#nosk').val(obj.nosk);
				$('#tglterbit').val(obj.tglsk);
				$('#no_registrasi').val(obj.noregistrasi);				
			
				$("#klokasi1 option[value='" + obj.lokasi_id1 + "']").attr("selected", true);
				$('#luasbangunan1').val(obj.luas1);
				$("#kfungsi1 option[value='" + obj.fungsi_id1 + "']").attr("selected", true);
				$("#ktingkat1 option[value='" + obj.tingkat_id1 + "']").attr("selected", true);
				$("#kstruktur1 option[value='" + obj.struktur_id1 + "']").attr("selected", true);
				$("#ImbData_id1").val(obj["imbdata_id1"]);
		
				$("#a1").val(obj["nkluas1"]);
				$("#b1").val(obj["nktingkat1"]);
				$("#c1").val(obj["nklokasi1"]);
				$("#d1").val(obj["nkfungsi1"]);
				$("#e1").val(obj["nkstruktur1"]);
				$("#harga1").val(obj["hargataksir1"]);
				$("#unit1").val(obj["banyakunit1"]);
				$("#ImbIndeks_id1").val(obj["imbindeks_id1"]);


				$("#totaldatabangunan").val(obj.totaldatabangunan);				
				countRow=1;
					
				if (eval(obj.totaldatabangunan-1)>0)
					{
					var a=eval(obj.totaldatabangunan-1);
					
					for (var i=1;i<=a;i++)
						{
						var j=i+1;						
						countRow=i;						
						addDataBangunan(0);						
						$("#klokasi"+j+" option[value='" + obj["lokasi_id"+j] +"']").attr("selected", true);
						$("#luasbangunan"+j).val(obj["luas"+j]);
						$("#kfungsi"+j+" option[value='" + obj["fungsi_id"+j] +"']").attr("selected", true);
						$("#ktingkat"+j+" option[value='" + obj["tingkat_id"+j] +"']").attr("selected", true);
						$("#kstruktur"+j+" option[value='" + obj["struktur_id"+j] +"']").attr("selected", true);						
						$("#ImbData_id"+j).val(obj["imbdata_id"+j]);
						
						$("#a"+j).val(obj["nkluas"+j]);
						$("#b"+j).val(obj["nktingkat"+j]);
						$("#c"+j).val(obj["nklokasi"+j]);
						$("#d"+j).val(obj["nkfungsi"+j]);
						$("#e"+j).val(obj["nkstruktur"+j]);
						$("#harga"+j).val(obj["hargataksir"+j]);
						$("#unit"+j).val(obj["banyakunit"+j]);
						$("#ImbIndeks_id"+j).val(obj["imbindeks_id"+j]);
						}
					}
					HitungTotalRetribusi();
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
$data_jenis_permohonan = $this->Permohonan_model->get_jenis_permohonan(1);
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

$jalan2=array(
			'name' 	=>'jalan2', 
			'id'	=>'jalan2',		
			'value'	=>''
			);
$rt2=array(
			'name' 	=>'rt2', 
			'id'	=>'rt2',
			'class'		=>'input-small',
			'size' 		=>'3',
			'maxlength'	=>'',
			'value'	=>''
			);
$klokasi1 = $this->Imb_model->ListLokasiBangunan();
$luas=array(
			'name' 	=>'luas', 
			'id'	=>'luas',
			'size' 		=>'15',
			'class'		=>'input-small',
			'maxlength'	=>'',
			'value'	=>''
			);
$luasbangunan1=array(
			'name' 	=>'luasbangunan1', 
			'id'	=>'luasbangunan1',
			'size' 		=>'15',
			'class'		=>'input-small',
			'maxlength'	=>'',
			'value'	=>''
			);
$sertifikat = $this->Imb_model->ListJenisSertifikat();
$kfungsi1 = $this->Imb_model->ListFungsiBangunan();
$retribusi=array(
			'name' 	=>'retribusi', 
			'id'	=>'retribusi',
			'size' 		=>'15',
			'maxlength'	=>'',
			'value'	=>'0',
			'onKeyUp' =>'HitungTotalRetribusi()'
			);
$peruntukan=array(
			'name' 	=>'peruntukan', 
			'id'	=>'peruntukan',
			'size' 		=>'30',
			'maxlength'	=>'',
			'value'	=>''
			);
$ktingkat1 = $this->Imb_model->ListTingkatBangunan();
$kstruktur1 = $this->Imb_model->ListKonstruksiBangunan();

$sutara=array(
			'name' 	=>'sutara', 
			'id'	=>'sutara',
			'size' 		=>'30',
			'maxlength'	=>'',
			'value'	=>''
			);
$sselatan=array(
			'name' 	=>'sselatan', 
			'id'	=>'sselatan',
			'size' 		=>'30',
			'maxlength'	=>'',
			'value'	=>''
			);
$sbarat=array(
			'name' 	=>'sbarat', 
			'id'	=>'sbarat',
			'size' 		=>'30',
			'maxlength'	=>'',
			'value'	=>''
			);
$stimur=array(
			'name' 	=>'stimur', 
			'id'	=>'stimur',
			'size' 		=>'30',
			'maxlength'	=>'',
			'value'	=>''
			);
$bpondasi=array(
			'name' 	=>'bpondasi', 
			'id'	=>'bpondasi',
			'size' 		=>'30',
			'maxlength'	=>'',
			'value'	=>''
			);
$btiang=array(
			'name' 	=>'btiang', 
			'id'	=>'btiang',
			'size' 		=>'30',
			'maxlength'	=>'',
			'value'	=>''
			);
$bdinding=array(
			'name' 	=>'bdinding', 
			'id'	=>'bdinding',
			'size' 		=>'30',
			'maxlength'	=>'',
			'value'	=>''
			);
$bsloof=array(
			'name' 	=>'bsloof', 
			'id'	=>'bsloof',
			'size' 		=>'30',
			'maxlength'	=>'',
			'value'	=>''
			);
$bratap=array(
			'name' 	=>'bratap', 
			'id'	=>'bratap',
			'size' 		=>'30',
			'maxlength'	=>'',
			'value'	=>''
			);
$bpatap=array(
			'name' 	=>'bpatap', 
			'id'	=>'bpatap',
			'size' 		=>'30',
			'maxlength'	=>'',
			'value'	=>''
			);
$blantai=array(
			'name' 	=>'blantai', 
			'id'	=>'blantai',
			'size' 		=>'30',
			'maxlength'	=>'',
			'value'	=>''
			);
$plafoon=array(
			'name' 	=>'plafoon', 
			'id'	=>'plafoon',
			'size' 		=>'30',
			'maxlength'	=>'',
			'value'	=>''
			);
$no_rekomendasi=array(
			'name' 	=>'no_rekomendasi', 
			'id'	=>'no_rekomendasi',
			'size' 		=>'30',
			'maxlength'	=>'',
			'value'	=>''
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
$data_listPersyaratan = $this->Permohonan_model->get_listPersyaratan(1);
$nosk=array(
			'name' 	=>'nosk', 
			'id'	=>'nosk',			
			'size' 		=>'20',
			'maxlength'	=>''
			);
$no_registrasi=array(
			'name' 	=>'no_registrasi', 
			'id'	=>'no_registrasi',			
			'maxlength'	=>'',
			'value'	=>''
			);

$totaldatabangunan=array(
			'name' 	=>'totaldatabangunan', 
			'id'	=>'totaldatabangunan',
			'size' 		=>'15',
			'class'		=>'input-mini',
			'class1'	=>'input-small',
			'maxlength'	=>'',
			'value'	=>''
			);
?>
<script>
var countRow		= 1;

function setKoefisien(bRow,bColom,bId,Tabel)
{	
	var base_url = '<?echo site_url()?>';			
	if (Tabel!='')
	{
	$.ajax({
    	'url' : base_url + '/' + 'imb/get_indeks/'+ Tabel +'/'+bId,            
        'success' : function(data){				
			var obj = jQuery.parseJSON(data);
			$('#'+bColom+bRow).val(obj.indeks);				
			HitungTotalRetribusi();				
        },
		'error' : function(data){
            alert(data);	
        }
        });
	}
	else
	{
		var nilaiLuasBangunan=setNilaiKoef(bId);
		$('#'+bColom+bRow).val(nilaiLuasBangunan);
	}
}

function addRetribusi(counter1)
{
	var newDiv = $(document.createElement('tr')).attr("id", 'row' + counter1);
	newDiv.html('<td align="center" bgcolor="#DCEEFF" class="text">'+
				'<input type="text" name="a'+counter1+'" id="a'+counter1+'" class="<?=$totaldatabangunan["class"]?>" onKeyUp="HitungTotalRetribusi()" />'+
				'</td>'+
          		'<td align="center" bgcolor="#DCEEFF">'+
				'<input type="text" name="b'+counter1+'" id="b'+counter1+'" class="<?=$totaldatabangunan["class"]?>" onKeyUp="HitungTotalRetribusi()" />'+	
				'</td>'+
          		'<td align="center" bgcolor="#DCEEFF">'+
				'<input type="text" name="c'+counter1+'" id="c'+counter1+'" class="<?=$totaldatabangunan["class"]?>" onKeyUp="HitungTotalRetribusi()" />'+	
				'</td>'+
          		'<td align="center" bgcolor="#DCEEFF">'+
				'<input type="text" name="d'+counter1+'" id="d'+counter1+'" class="<?=$totaldatabangunan["class"]?>" onKeyUp="HitungTotalRetribusi()" />'+	
				'</td>'+
          		'<td align="center" bgcolor="#DCEEFF">'+
				'<input type="text" name="e'+counter1+'" id="e'+counter1+'"class="<?=$totaldatabangunan["class"]?>" onKeyUp="HitungTotalRetribusi()" />'+	
				'</td>'+
          		'<td align="center" bgcolor="#DCEEFF">Rp. '+
				'<input type="text" name="harga'+counter1+'" id="harga'+counter1+'" class="<?=$totaldatabangunan["class1"]?>" onKeyUp="HitungTotalRetribusi()" />'+	
				'</td>'+
          		'<td align="center" bgcolor="#DCEEFF">'+
				'<input type="text" name="unit'+counter1+'" id="unit'+counter1+'" class="<?=$totaldatabangunan["class"]?>" onKeyUp="HitungTotalRetribusi()" />'+	
				'</td>'+
          		'<td align="right" bgcolor="#DCEEFF" id="jumlah'+counter1+'">&nbsp;</td>'+
          		'<td align="center" bgcolor="#DCEEFF"><span id="HRow'+counter1+'"><a href="javascript:hapusDataBangunan('+counter1+')"><img src="../../assets/images/b_drop.png" width="16" height="16"></a></span><input type="hidden" name="ImbIndeks_id'+counter1+'" id="ImbIndeks_id'+counter1+'"></td>');
	newDiv.appendTo("#dataretribusi");	
}

function hapusDataBangunan(div)
   {
   idDataIMB=$("#ImbData_id"+div).val();
   idIndeksIMB=$("#ImbIndeks_id"+div).val();

   $("#dataklokasi"+div).remove();
   if (confirm("Anda yakin ingin menghapus data yang dipilih?"))
   {	
   $(function() {
		var base_url = '<?echo site_url()?>';
		$.ajax({
            'url' : base_url + '/' + 'imb/del_imbdata_imbindeks/'+idDataIMB+'/'+idIndeksIMB,            
            'success' : function(data){
				alert("Data Bangunan Berhasil Dihapus");
            },
			'error' : function(data){
               alert(data);	
            }
        });

		$("#datalabel"+div).remove();
   		$("#dataklokasi"+div).remove();     
		$("#dataktingkat"+div).remove(); 		
		$("#datakfungsi"+div).remove(); 	
		$("#datakstruktur"+div).remove();	
		$("#datakluas"+div).remove();
		$("#databatas"+div).remove();
		$("#row"+div).remove();	
   });
	countRow--;	   
	$("#totaldatabangunan").val(countRow);
	$('#delDataBangunan'+countRow).show();
	$('#HRow'+countRow).show();	
	HitungTotalRetribusi();
   }
   } 

function addDataBangunan(flagBaru)
{
	$(function() {		
		countRow++;
		var counter1 = countRow;						
		$("#totaldatabangunan").val(countRow);
		addRetribusi(counter1);
		
		var newDiv = $(document.createElement('tr')).attr("id", 'datalabel' + counter1);	
	    newDiv.html('<td align="right" style="padding-left:20px "><b>Data Bangunan Ke-'+counter1+'</b></td>'+
      				'<td align="center"  class="text"><div align="center">&nbsp</div></td>'+
      				'<td align="left" id="tddesa1"><span class="text">&nbsp</td>');
		newDiv.appendTo("#databangunan");

		var newDiv = $(document.createElement('tr')).attr("id", 'dataklokasi' + counter1);	
		newDiv.html('<td align="right" style="padding-left:20px ">Lokasi Bangunan</td>'+
      				 '<td align="center"  class="text"><div align="center">:</div></td>'+
                     '<td align="left" id="tddesa1">' +
					 '<select name="klokasi'+counter1+'" id="klokasi'+counter1+'" onChange="setKoefisien('+counter1+',\'c\',this.value,\'lokasibangunan\')">'+
					 <?
					 for($i=0;$i<count($klokasi1);$i++)
  		    		 {
					 ?>
					 '<option value="<?=key($klokasi1)?>"><?=$klokasi1[$i]?></option>'+
					 <?
					 next($klokasi1);
					 }
					 ?>	
					 '</select>'+
					 '<span id="delDataBangunan'+counter1+'"><input type="button" name="button" value="Hapus Data Bangunan" onclick=hapusDataBangunan('+counter1+')></span)</td>');       
		newDiv.appendTo("#databangunan");

	  var newDiv = $(document.createElement('tr')).attr("id", 'dataktingkat' + counter1);	
	  newDiv.html('<td align="right" style="padding-left:20px ">Tingkat Bangunan</td>'+
      			  '<td align="center"  class="text"><div align="center">:</div></td>'+
      			  '<td align="left" id="tddesa1">'+
				  '<select name="ktingkat'+counter1+'" id="ktingkat'+counter1+'" onChange="setKoefisien('+counter1+',\'b\',this.value,\'indekstingkat\')">'+
					 <?
					 for($i=0;$i<count($ktingkat1);$i++)
  		    		 {
					 ?>
					 '<option value="<?=key($ktingkat1)?>"><?=$ktingkat1[$i]?></option>'+
					 <?
					 next($ktingkat1);
					 }
					 ?>	
					 '</select>'+
				  '</td>');
		newDiv.appendTo("#databangunan");

		var newDiv = $(document.createElement('tr')).attr("id", 'datakfungsi' + counter1);	
	    newDiv.html('<td align="right" style="padding-left:20px ">Kategori Penggunaan Bangunan </td>'+
      				'<td align="center"  class="text"><div align="center">:</div></td>'+
      				'<td align="left" id="tddesa1">'+
					'<select name="kfungsi'+counter1+'" id="kfungsi'+counter1+'" onChange="setKoefisien('+counter1+',\'d\',this.value,\'fsbangunan\')">'+
					 <?
					 for($i=0;$i<count($kfungsi1);$i++)
  		    		 {
					 ?>
					 '<option value="<?=key($kfungsi1)?>"><?=$kfungsi1[$i]?></option>'+
					 <?
					 next($kfungsi1);
					 }
					 ?>	
					 '</select>'+
					 '</td>');
		newDiv.appendTo("#databangunan");

		var newDiv = $(document.createElement('tr')).attr("id", 'datakstruktur' + counter1);	
	    newDiv.html('<td align="right" style="padding-left:20px ">Konstruksi Bangunan</td>'+
      				'<td align="center"  class="text"><div align="center">:</div></td>'+
      				'<td align="left" id="tddesa1">'+'<select name="kstruktur'+counter1+'" id="kstruktur'+counter1+'" onChange="setKoefisien('+counter1+',\'e\',this.value,\'struktur\')">'+
					 <?
					 for($i=0;$i<count($kstruktur1);$i++)
  		    		 {
					 ?>
					 '<option value="<?=key($kstruktur1)?>"><?=$kstruktur1[$i]?></option>'+
					 <?
					 next($kstruktur1);
					 }
					 ?>	
					 '</select>'+
					'</td>');
		newDiv.appendTo("#databangunan");

		var newDiv = $(document.createElement('tr')).attr("id", 'datakluas' + counter1);	
	    newDiv.html('<td align="right" style="padding-left:20px ">Luas Bangunan</td>'+
      				'<td align="center"  class="text"><div align="center">:</div></td>'+
      				'<td align="left" id="tddesa1"><span class="text"><input type="text" name="luasbangunan'+counter1+'" id="luasbangunan'+counter1+'" onKeyUp="setKoefisien('+counter1+',\'a\',this.value,\'\')" class="<?=$totaldatabangunan["class"]?>"></span> M <sup>2</sup></td>');
		newDiv.appendTo("#databangunan");

		var newDiv = $(document.createElement('tr')).attr("id", 'databatas' + counter1);	
	    newDiv.html('<td align="right" style="padding-left:20px ">&nbsp</td>'+
      				'<td align="center"  class="text"><div align="center">&nbsp</div></td>'+
      				'<td align="left" id="tddesa1"><span class="text"><input type="hidden" name="ImbData_id'+counter1+'" id="ImbData_id'+counter1+'"></td>');
		newDiv.appendTo("#databangunan");

		$('#delDataBangunan'+(counter1-1)).hide();		
		$('#HRow'+(counter1-1)).hide();
		imb_id=$('#imb_id').val();		
		if (flagBaru==1)
		{
		var base_url = '<?echo site_url()?>';	
		$.ajax({
            'url' : base_url + '/' + 'imb/put_imbdata_imbindeks/'+imb_id,            
            'success' : function(data){
				alert("Data Bangunan Berhasil Ditambah");
            },
			'error' : function(data){
               alert(data);	
            }
        });
		}
	});
}
</script>
<body>
<div id="Mktp" class="modal">    
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h2>Pencarian data Pemohon</h2>
	</div>	
    <div class="modal-body">		 
        <p><?=$output?></p>  
    </div>  
</div>
<form name="kirim" class="form-vertical" action="<?=site_url()."/imb"?>" method="post">
<fieldset>
  <table width="100%"  border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" ><p><h1>
        <div id="wmy">Edit Data Permohonan IMB 
          <input type="hidden" name="id" id="id" value="<?=$id?>">
          <input type="hidden" name="imb_id" id="imb_id">
          <input type="hidden" name="noregistrasi" id="noregistrasi">
</div>
      </h1></p>
      <p>1. Jenis Permohonan</p></td>
    </tr>
    <tr class="font3">
      <td width="26%" align="right" style="padding-left:10px ">Tanggal Permohonan</td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="73%" align="left"><input type="text" name="tglmohon" id="tglmohon" class="input-small" size="10" readonly /></td>
    </tr>
    <tr class="font3" >
      <td width="26%" align="right"  style="padding-left:10px ">Jenis Permohonan </td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="73%" align="left"><? echo form_dropdown('jnspermohonan', $data_jenis_permohonan);?></td>
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
      <td width="26%" align="right" style="padding-left:10px ">Nomor KTP </td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="73%" align="left" ><? echo form_input($ktp1);?>&nbsp;<a href="#Mktp" data-toggle="modal"><img src="../../assets/images/search.gif" width="16" height="16" align="Cari" title="Cari data pemohon"></a>
        <input type="hidden" name="pemohon_id" id="pemohon_id">
</td>
    </tr>
    <tr class="font3">
      <td width="26%" align="right"  style="padding-left:10px ">Nama Lengkap </td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="73%" align="left"><? echo form_input($nama1);?> </td>
    </tr>
    <tr class="font3">
      <td width="26%" align="right" style="padding-left:10px ">TTL</td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="73%" align="left"><? echo form_input($tlahir1);?> <input name="tgllahir1" type="text" id="tgllahir" class="input-small" size="10"/></td>
    </tr>
    <tr class="font3">
      <td width="26%" align="right"  style="padding-left:10px ">Pekerjaan / Jabatan</td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="73%" align="left"><? echo form_input($pekerjaan1);?> </td>
    </tr>
    <tr class="font3" >
      <td width="26%" align="right"  style="padding-left:10px ">Warga Negara </td>
      <td width="1%" align="center"  class="text">:</td>
      <td width="73%" align="left" ><? echo form_dropdown('warga_id1', $warga_id1,'','id="warga_id1"');?>
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
      <td height="25" style="padding:5px 0px 5px 0px; border-bottom:1px dashed #000000;  " colspan="3" align="left" valign="bottom"  class="font2">3. Data Bangunan </td>
    </tr>
	<tbody id="databangunan">
    <tr class="font3">
      <td align="right"  style="padding-left:10px ">Lokasi Bangunan </td>
      <td align="center"  class="text">:</td>
      <td align="left" class="font3"><span class="text"><? echo form_input($jalan2);?></span>&nbsp;RT : <span class="text">&nbsp;<? echo form_input($rt2);?></span>
        <select name="klokasi1" id="klokasi1" onChange="setKoefisien(1,'c',this.value,'lokasibangunan')">
          <?		
		reset($klokasi1);
		for($i=0;$i<count($klokasi1);$i++)
  			{
			?>
          <option value="<?=key($klokasi1)?>">
          <?=$klokasi1[$i]?>
          </option>
          <?
			next($klokasi1);
			}
			?>
        </select>        
        </td>
    </tr>
    <tr class="font3">
      <td align="right"  style="padding-left:10px ">Kecamatan</td>
      <td align="center"  class="text">:</td>
      <td align="left"><span class="text">
        <select name="kec2" id="kec2" onChange="PilihDesa(this,document.getElementById('desa2'),'')">
        </select>
      </span></td>
    </tr>
    <tr>
      <td><div align="right">Kelurahan</div></td>
      <td>:&nbsp;</td>
      <td><span class="text">
        <select name="desa2" id="desa2">
        </select>
      </span></td>
    </tr>
    <tr>
      <td align="right"><div align="right">Luas Tanah </div></td>
      <td><div align="center">:</div></td>
      <td><span class="text"><? echo form_input($luas);?></span> M <sup>2</sup> </td>
    </tr>
    <tr>
      <td align="right"><div align="right">Luas Bangunan</div></td>
      <td><div align="center">:</div></td>
      <td><span class="text">
        <input type="text" name="luasbangunan1" id="luasbangunan1" class="<?=$totaldatabangunan["class"]?>" onKeyUp="setKoefisien(1,'a',this.value,'')"> 
        M <sup>2</sup> </span></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:10px ">Jenis Sertifikat </td>
      <td align="center"  class="text">:</td>
      <td align="left"><? echo form_dropdown('sertifikat', $sertifikat,'','id="sertifikat"');?> </td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:10px ">Kategori Penggunaan Bangunan </td>
      <td align="center"  class="text">:</td>
      <td align="left"><select name="kfungsi1" id="kfungsi1" onChange="setKoefisien(1,'d',this.value,'fsbangunan')">
        <?		
		reset($kfungsi1);
		for($i=0;$i<count($kfungsi1);$i++)
  			{
			?>
        <option value="<?=key($kfungsi1)?>">
        <?=$kfungsi1[$i]?>
        </option>
        <?
			next($kfungsi1);
			}
			?>
      </select>
      </td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Peruntukan Bangunan </td>
      <td align="center"  class="text">:</td>
      <td align="left" class="font3">
<span class="text"><? echo form_input($peruntukan);?></span>&nbsp;</td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Tingkat Bangunan </td>
      <td align="center"  class="text">:</td>
      <td align="left" id="alamat1"><select name="ktingkat1" id="ktingkat1" onChange="setKoefisien(1,'b',this.value,'indekstingkat')">
        <?		
		reset($ktingkat1);
		for($i=0;$i<count($ktingkat1);$i++)
  			{
			?>
        <option value="<?=key($ktingkat1)?>">
        <?=$ktingkat1[$i]?>
        </option>
        <?
			next($ktingkat1);
			}
			?>
      </select> </td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">Konstruksi Bangunan</td>
      <td align="center"  class="text">:</td>
      <td align="left" id="tddesa1"><select name="kstruktur1" id="kstruktur1" onChange="setKoefisien(1,'e',this.value,'struktur')">
        <?		
		reset($kstruktur1);
		for($i=0;$i<count($kstruktur1);$i++)
  			{
			?>
        <option value="<?=key($kstruktur1)?>">
        <?=$kstruktur1[$i]?>
        </option>
        <?
			next($kstruktur1);
			}
			?>
      </select>
        <input type="hidden" name="totaldatabangunan" id="totaldatabangunan" value="1">
        <input type="hidden" name="ImbData_id1" id="ImbData_id1"></td>
    </tr>
    <tr class="font3">
      <td align="right" style="padding-left:20px ">&nbsp;</td>
      <td align="center"  class="text">&nbsp;</td>
      <td align="left" id="tddesa1">&nbsp;</td>
    </tr>
	</tbody>
    <tr class="font3"  >
      <td colspan="3" align="right" style="padding-left:10px " ><div align="left">
        <input type="button" name="TambahDataBangunan" id="TambahDataBangunan" value="Tambah Data Bangunan" onclick="addDataBangunan(1)">
      </div></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " ><strong>Batas-Batas  Bangunan</strong></td>
      <td align="center"  class="text"><div align="center"></div></td>
      <td align="left"  class="text">&nbsp;</td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Sebelah Utara </td>
      <td align="center"  class="text"><div align="center">:</div></td>
      <td align="left"  class="text"><? echo form_input($sutara);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Sebelah Selatan </td>
      <td align="center"  class="text"><div align="center">:</div></td>
      <td align="left"  class="text"><? echo form_input($sselatan);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Sebelah Barat </td>
      <td align="center"  class="text"><div align="center">:</div></td>
      <td align="left"  class="text"><? echo form_input($sbarat);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Sebelah Timur </td>
      <td align="center"  class="text"><div align="center">:</div></td>
      <td align="left"  class="text"><? echo form_input($stimur);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " ><strong>Bahan-Bahan Bangunan</strong></td>
      <td align="center"  class="text">&nbsp;</td>
      <td align="left"  class="text">&nbsp;</td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Pondasi</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($bpondasi);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Tiang</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($btiang);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Dinding</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($bdinding);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Ring Balk </td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($bsloof);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Rangka Atap</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($bratap);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Atap</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($bpatap);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Lantai</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($blantai);?></td>
    </tr>
    <tr class="font3"  >
      <td align="right" style="padding-left:10px " >Plafoon</td>
      <td align="center"  class="text">:</td>
      <td align="left"  class="text"><? echo form_input($plafoon);?></td>
    </tr>
    <tr>
      <td height="25" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;" align="left" valign="bottom" class="font2" >4. Retribusi</td>
    </tr>
    <tr>
      <td colspan="3" align="right"><table width="100%" id="tableRetribusi"  border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF" style="border:1px solid #000 ">
        <tr align="center">
          <th colspan="5">Nilai Koefisien </th>
          <th width="21%" rowspan="2">Harga Bangunan</th>
          <th width="12%" rowspan="2">Banyak Unit</th>
          <th width="13%" rowspan="2"><div align="right">Jumlah</div></th>
          <th width="19%" rowspan="2">Aksi</th>
        </tr>
        <tr align="center">
          <th width="7%">A</th>
          <th width="7%">B</th>
          <th width="7%">C</th>
          <th width="7%">D</th>
          <th width="7%">E</th>
        </tr>
		<tbody id="dataretribusi">
        <tr valign="top" id="row1" >
          <td align="center" bgcolor="#DCEEFF"><?
			$a=array(
				'name' 	=>'a1', 
				'id'	=>'a1',				
				'class'		=>'input-mini',
				'maxlength'	=>'',
				'value'	=>'',
				'onKeyUp' => 'HitungTotalRetribusi()'
			);
			echo form_input($a);
			?></td>
          <td align="center" bgcolor="#DCEEFF"><?
			$b=array(
				'name' 	=>'b1', 
				'id'	=>'b1',				
				'class'		=>'input-mini',
				'maxlength'	=>'',
				'value'	=>'',
				'onKeyUp' => 'HitungTotalRetribusi()'
			);
			echo form_input($b);
			?></td>
          <td align="center" bgcolor="#DCEEFF"><?
			$c=array(
				'name' 	=>'c1', 
				'id'	=>'c1',				
				'class'		=>'input-mini',
				'maxlength'	=>'',
				'value'	=>'',
				'onKeyUp' => 'HitungTotalRetribusi()'
			);
			echo form_input($c);
			?></td>
          <td align="center" bgcolor="#DCEEFF"><?
			$d=array(
				'name' 	=>'d1', 
				'id'	=>'d1',				
				'class'		=>'input-mini',
				'maxlength'	=>'',
				'value'	=>'',
				'onKeyUp' => 'HitungTotalRetribusi()'
			);
			echo form_input($d);
			?></td>
          <td align="center" bgcolor="#DCEEFF"><?
			$e=array(
				'name' 	=>'e1', 
				'id'	=>'e1',				
				'class'		=>'input-mini',
				'maxlength'	=>'',
				'value'	=>'',
				'onKeyUp' => 'HitungTotalRetribusi()'
			);
			echo form_input($e);
			?></td>
          <td align="center" bgcolor="#DCEEFF">Rp.
            <?
			$harga=array(
				'name' 	=>'harga1', 
				'id'	=>'harga1',				
				'class'		=>'input-small',
				'maxlength'	=>'',
				'value'	=>'',
				'onKeyUp' => 'HitungTotalRetribusi()'
			);
			echo form_input($harga);
			?></td>
          <td align="center" bgcolor="#DCEEFF"><?
			$unit=array(
				'name' 	=>'unit1', 
				'id'	=>'unit1',				
				'class'		=>'input-mini',
				'maxlength'	=>'',
				'value'	=>'',
				'onKeyUp' => 'HitungTotalRetribusi()'
			);
			echo form_input($unit);
			?></td>
          <td align="right" bgcolor="#DCEEFF" id="jumlah1">&nbsp;</td>
          <td align="center" bgcolor="#DCEEFF"><input type="hidden" name="ImbIndeks_id1" id="ImbIndeks_id1"></td>
        </tr>
		</tbody>
        <tr valign="top" style="font-weight:bold ">
          <td colspan="7" align="right" valign="middle" bgcolor="#DCEEFF">Total Retribusi&nbsp;</td>
          <td align="right" valign="middle" bgcolor="#DCEEFF" id="totalRetribusi">&nbsp;</td>
          <td align="center" valign="middle" bgcolor="#DCEEFF"><a href="javascript:addDataBangunan(1)"><img src="../../assets/images/add.gif" width="21" height="21" onClick="AddRow()" ></a></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="right">Retribusi IMB yang telah dibayarkan</td>
      <td><div align="center">:</div></td>
      <td>Rp . <span class="text"><? echo form_input($retribusi);?></span> </td>
    </tr>
    <tr valign="top" class="font3" >
      <td align="right"  style="padding-left:10px "><strong>Besar Retribusi yang harus dibayarkan</strong></td>
      <td><div align="center"><strong>=</strong></div></td>
      <td align="left"><strong>Total Retribusi - Retribusi IMB yang telah dibayarkan </strong></td>
    </tr>
    <tr valign="top" class="font3" style="font-weight:bold ">
      <td align="right"  style="padding-left:10px ">&nbsp;</td>
      <td><div align="center"><strong>=</strong></div></td>
      <td align="left" id="totalAkhir">&nbsp;</td>
    </tr>
    <tr valign="top" class="font3" >
      <td align="right"  style="padding-left:10px ">Pembayaran</td>
      <td><div align="center">:</div></td>
      <td align="left"><div>
          <input  name="sbayar" id="sbayar" value="1" type="radio" >
        Sudah dibayar, tanggal        <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.getElementById('tglbayar'));return false;" hidefocus="HIDEFOCUS"> </a>
        <input name="tglbayar" type="text" id="tglbayar" size="10" class="input-small"/>
        <br><input name="sbayar" type="radio" id="sbayar" onchange="SetRetribusi(this)" value="0" checked />
Belum dibayar <br>
</div>          </td>
    </tr>
    <tr>
      <td height="25" class="font2"><div align="right">No Rekomendasi</div></td>
      <td height="25" class="font2"><div align="center">:</div></td>
      <td height="25" class="font2"><span class="text"><? echo form_input($no_rekomendasi);?></span></td>
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
          <input type="hidden" name="jumlah" value="<?=$jml?>"/>
          
      </table></td>
    </tr>
    
    <tr align="right">
      <td height="30" colspan="3" style="padding:10px 0px 10px 0px; border-bottom:1px dashed #000000;"><div align="left"><span class="font2">7. Data IMB </span></div></td>
    </tr>
    <tr align="right">
      <td>No. IMB </td>
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
      <td> No. Reg Kehilangan IMB </td>
      <td><div align="center">:</div></td>
      <td><div align="left"><span class="text"><? echo form_input($no_registrasi);?></span></div></td>
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
	if (Confirm2("Anda yakin data yang anda masukkan sudah benar ?"))
		{
		document.kirim.action="<?=site_url()."/imb/simpen_ubah"?>";
		document.kirim.submit();
		}
	}

	function HitungTotalRetribusi()
	{
		total=0;
				
		for(i=1;i<=countRow;i++)
		{			
			compA=$('#a'+i).val();			
			compB=$('#b'+i).val();
			compC=$('#c'+i).val();
			compD=$('#d'+i).val();
			compE=$('#e'+i).val();
			compHarga=$('#harga'+i).val();
			compUnit=$('#unit'+i).val();					
				jumlah	=0;
				if(compA && compB && compC && compD && compE && compHarga && compUnit)
				{
				
					a		= isNaN(compA) ? 0 : parseFloat(compA);
					b		= isNaN(compB) ? 0 : parseFloat(compB);
					c		= isNaN(compC) ? 0 : parseFloat(compC);
					d		= isNaN(compD) ? 0 : parseFloat(compD);
					e		= isNaN(compE) ? 0 : parseFloat(compE);
					harga	= isNaN(compHarga) ? 0 : parseFloat(compHarga);
					bunit	= isNaN(compUnit) ? 0 : parseFloat(compUnit);
					jumlah	= a * b * c * d * e * harga * bunit;
					jumlah	= isNaN(jumlah) ? 0 : jumlah;															
					$('#jumlah'+i).html('Rp. '+formatCurrency(jumlah.toString()));
				}
				total+=jumlah;				
				$('#totalRetribusi').html('Rp. '+formatCurrency(total.toString()));
				var jumlahbayar=0;
				var jumlahharusbayar=0;
				jumlahbayar=$('#retribusi').val();				
				jumlahharusbayar=total-jumlahbayar;				
				$('#totalAkhir').html('Rp. '+formatCurrency(jumlahharusbayar.toString()));
				
		}		
	}

	function setNilaiKoef(lbangunan)
  		{  	  					
  	  		var lbangunan2;
			lbangunan2		= isNaN(lbangunan) ? 0 : parseFloat(lbangunan);
  			if(lbangunan2 <= 50){
  		    	return "1.00";
      		}
      		else if(lbangunan2 > 50 && lbangunan2 <= 100){
      			return "1.25";
      		}
      		else if(lbangunan2 > 100 && lbangunan2 <= 150){
      			return "1.50";
      		}
      		else if(lbangunan2 > 150 && lbangunan2 <= 200){
      			return "1.75";
      		}
      		else if(lbangunan2 > 200 && lbangunan2 <= 250){
      			return "2.00";
      		}
      		else if(lbangunan2 > 250 && lbangunan2 <= 300){
      			return "2.25";
      		}
      		else if(lbangunan2 > 300 && lbangunan2 <= 500){
      			return "2.50";
      		}
      		else if(lbangunan2 > 500 && lbangunan2 <= 1000){
      			return "3.00";
      		}
      		else if(lbangunan2 > 1000 && lbangunan2 <= 2000){
      			return "3.50";
      		}
      		else if(lbangunan2 > 2000 && lbangunan2 <= 3000){
      			return "4.00";
      		}			    		
      		else{
      			return "5.00";
      		}
  		}

	OnLoad();
<? 
if ($id<>"")
{
?> 
Tpilih('imb',<?=$id?>);
<?
}
?>
 </script>
</body>
</html>
