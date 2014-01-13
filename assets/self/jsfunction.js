function Confirm(msg,url)
{
	if(window.confirm(msg))
	{
		GoToUrl(url);
	}
}
function Confirm2(msg)
{
	if(window.confirm(msg))
	{
		return true;
	}
	else
	{
		return false;
	}
}
function Confirm3(msg)
{
	if(window.confirm(msg))
	{
		if (window.confirm('CEK KEMBALI BENTUK PERUSAHAAN SUDAH BENAR ATAU BELUM'))
			return true;
		else 
			return false;
	}
	else
	{
		return false;
	}
}

function confirmSubmit()
{
	/*var userLogin = '<?=$_SESSION['ss_hakAkses']?>';
	var date =document.getElementById('tglbayar').value;
	var dateOld =document.getElementById('tglbayar').value;
	var lastLock =document.getElementById('lastLock').value;
	var timeNow = Date.parseDate(date, "d-m-Y");
	var timeOld = Date.parseDate(dateOld, "d-m-Y");
	var timeLast = Date.parseDate(lastLock, "Y-m-d");*/
	//alert (jenis);
	//if (userLogin!='admin'&&(timeNow <= timeLast && jenis!=17)) {
	if (jenis!=1) {
		alert ('Tanggal bayar yang Anda masukan telah di rekap kasir. Silahkan ganti tanggal bayar Anda atau hubungi kasir');
		return false;
	}
	else
	{
		if (Confirm3('Anda yakin data yang anda masukkan sudah benar ?'))
			return true;
		else
			return false;
	}
}

function Thapus(Vurl,id)		
{
if (confirm("Yakin ingin menghapus data yang dipilih?"))
	{
	document.kirim.id.value=id;
	document.kirim.action=Vurl;
	document.kirim.submit();
	}
}

function formatCurrency(num) {
	num = num.toString().replace(/\$|\,/g,'');
	if(isNaN(num))
	num = "0";
	sign = (num == (num = Math.abs(num)));
	num = Math.floor(num*100+0.50000000001);
	cents = num%100;
	num = Math.floor(num/100).toString();
	if(cents<10)
	cents = "0" + cents;
	for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
	num = num.substring(0,num.length-(4*i+3))+','+
	num.substring(num.length-(4*i+3));
	if(cents != "00")
		return (((sign)?'':'-') +  num + '.' + cents);
	else
		return (((sign)?'':'-') +  num);
}