<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Laporan SIUP</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php /*
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; */

?>
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
		var base_url = '<?php echo site_url();?>';
		
		if (jenis=='siup')
		{
		$.ajax({
            'url' : base_url + '/' + 'master/get_data_vsiup/'+id,            
            'success' : function(data){				
				var obj = jQuery.parseJSON(data);
				$('#datasiup').val(obj.nosk);
	
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

				$('#perusahaan_id').val(obj.perusahaan_id);
				$('#npwp2').val(obj.npwp);
                $('#nama2').val(obj.nama2);
				$('#noakta2').val(obj.noakta);
				$('#tglakta2').val(obj.tglakta);
                $('#notaris2').val(obj.notaris);			
				$("#bentuk_id2 option[value='" + obj.bentuk_id + "']").attr("selected", true);	
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
				$("#bentuk_id2 option[value='" + obj.bentuk_id + "']").attr("selected", true);	
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
		else if (jenis=='klui')
		{
		$.ajax({
            'url' : base_url + '/' + 'master/get_data_klui/'+id,            
            'success' : function(data){
				var obj = jQuery.parseJSON(data);
				$('#klui3').val(obj.kbli);
                $('#klui_pokok3').val(obj.kegiatan_pokok);				
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
		$( "#tglmohon" ).val('<?php echo date('d-m-Y');?>');	
	});

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
	</script>
 
<style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
</style>
</head>
<body bgcolor="eeeeee">
<?php
//include("class_permohonan.php");
//$permohonan	= new permohonan();
$tglawal	= mktime(0,0,0,(date('m')-1),date('d'),date('Y'));
$tglakhir	= mktime(0,0,0,date('m'),date('d'),date('Y'));
?>
<form action="" method="post" name="kirim" >
<table width="100%"  border="0" cellspacing="1" cellpadding="1"> 
  <tr >
    <td class="bold" colspan="4" align="left">Filter Laporan </td>
  </tr>
  <tr >
    <td width="2%" align="center">&nbsp;</td>
    <td width="22%">Tanggal Permohonan </td>
    <td width="1%" align="center">:</td>
    <td width="75%">
	Dari tanggal 
	  <input type="text" name="tglmohon" id="tglmohon" class="input-small" size="10" readonly />
		</td>
  </tr>
   <tr>
     <td align="center">&nbsp;</td>
     <td>Jenis SIUP </td>
     <td align="center">:</td>
    <td>
	<select name="jsiup" id="jsiup">
	<option value="1">MIKRO</option>
	<option value="2">KECIL</option>
	<option value="3">MENENGAH</option>
	<option value="4">BESAR</option>
	<option value="-1" selected>-SEMUA-</option>
	</select>	</td>
  </tr>
   <tr>
     <td align="center">&nbsp;</td>
     <td>Kecamatan</td>
    <td align="center">:</td>
    <td><select name="kec1" id="kec1" onChange="PilihDesa(this,document.getElementById('desa1'),'')"></select></td>
  </tr>
   <tr >
     <td align="center">&nbsp;</td>
     <td>Kelurahan</td>
    <td align="center">:</td>
    <td><select name="desa1" id="desa1"></select></td>
  </tr>
   <tr >
    <td class="bold" colspan="4" align="left">Jenis Laporan</td>
  </tr>
  <tr >
     <td align="center">&nbsp;</td>
     <td height="25" colspan="3"><a href="/laporansiup1" >Cetak Laporan Permohonan</a>
</td>
 </tr>
 <tr>
     <td align="center">&nbsp;</td>
     <td height="25" colspan="3"><a href="/laporansiup2" >Cetak Rekap Permohonan</a>
</td>
 </tr>
 <tr >
     <td align="center">&nbsp;</td>
     <td height="25" colspan="3"><a href="/laporansiup3" >Cetak Laporan SK Keluar</a>
</td>
 </tr>	
</table>
</form>
<script language="javascript">	
var optKecID = new Array('1','2','3','4');
var optKec = new Array('BONTANG BARAT','BONTANG SELATAN','BONTANG UTARA','-SEMUA-');
var optDesa    = new Array();
var optDesaID  = new Array();
optDesaID[0] =Array('1','2','3','17');
optDesaID[1] =Array('4','5','6','7','8','9','18');
optDesaID[2] =Array('10','11','12','13','14','15','19');
optDesaID[3] =Array('16');
optDesa[0] =Array('BELIMBING','KANAAN','TELIHAN','-SEMUA-');
optDesa[1] =Array('TANJUNG LAUT','TANJUNG LAUT INDAH','BERBAS TENGAH','BERBAS PANTAI','BONTANG LESTARI','SATIMPO','-SEMUA-');
optDesa[2] =Array('API - API','BONTANG BARU','BONTANG KUALA','GUNTUNG','GUNUNG ELAI','LOKTUAN','-SEMUA-');
optDesa[3] =Array('-SEMUA-');

function PilihDesa(kecamatan,desa,def) {
	var currKecamatan = kecamatan.selectedIndex;	
	desa.length = 0;
	var currDesa = optDesa[currKecamatan];
	var currDesaID = optDesaID[currKecamatan];
	var j = currDesa.length;
	desa.options.length=0;
	for (i=0; i<j; i++)
	{
		
		desa.options[i] = new Option(currDesa[i], currDesaID[i]);		
		if(currDesaID[i]==def)
		{			
			desa.options[i].selected;
			desa.selectedIndex=i;
		}
	}
	return true;
}

function CreateKecamatan(kecamatan,def) {
	kecamatan.length=0
	//alert(def);
	var j = optKec.length;
	for (i=0; i<j; i++)
	{
		kecamatan.options[i] = new Option(optKec[i], optKecID[i]);
		if(optKecID[i]==def)
		{
			//alert(optKecID[i]+'=='+def)
			kecamatan.selectedIndex=i;
			//kecamatan.options[i].selected;
		}
	}
	return true;
}

/*	function --OnLoad()
	{	
		compKec=GetObject('kecamatan');
		compDes=GetObject('desa');
		if(compKec && compDes)
		{
			CreateKecamatan(compKec,''); 
			PilihDesa(compKec,compDes,'');		
		}
		AddOption('kecamatan','-SEMUA-','-1',true);
		AddOption('desa','-SEMUA-','-1',true);
	}
	function AddOption(idComp,name,val,selected)
	{
		comp=GetObject(idComp);		
		index=comp.options.length;
		comp.options[index]=new Option(name,val);		
		if(selected)
		{
			comp.selectedIndex=index;	
		}	
	}	
	function SetDesa()
	{
		compKec=GetObject('kecamatan');
		compDes=GetObject('desa');
		if(compKec && compDes)
		{
			if(compKec.value > 0)
			{
				PilihDesa(compKec,compDes,'');
				AddOption('desa','-SEMUA-','-1',true);
			}
			else
			{
				compDes.options.length=0;
				AddOption('desa','-SEMUA-','-1',true)
			}
			
		}
	}	*/
	function CetakLaporan(file)
	{	
		compTglAwal		= GetObject('tglawal');
		compTglAkhir	= GetObject('tglakhir');
		compSIUP		= GetObject('jsiup');
		compKec			= GetObject('kec1');		
		compDesa		= GetObject('desa1');
		url				= '/cetak/'+file+'?tgl1='+compTglAwal.value+'&tgl2='+compTglAkhir.value+'&kec='+compKec.value+'&desa='+compDesa.value+'&jsiup='+compSIUP.value;
		GoToUrl(url);
	}

	function OnLoad()
	{	
		CreateKecamatan(document.getElementById('kec1'),'<?php echo isset($dataPermohonan->kecamatan_id) ? $dataPermohonan->kecamatan_id : ''?>'); 
		PilihDesa(document.getElementById('kec1'),document.getElementById('desa1'),'<?php echo isset($dataPermohonan->desa_id) ? $dataPermohonan->desa_id : ''?>');
		CreateKecamatan(document.getElementById('kec2'),'<?php echo isset($dataPerusahaan->kecamatan_id) ? $dataPerusahaan->kecamatan_id : ''?>'); 
		PilihDesa(document.getElementById('kec2'),document.getElementById('desa2'),'<?php echo isset($dataPerusahaan->desa_id) ? $dataPerusahaan->desa_id : ''?>');	
	}

	OnLoad();
</script>
</body>

</html>
