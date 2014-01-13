var optKecID = new Array('1','2','3','4');
var optKec = new Array('BONTANG BARAT','BONTANG SELATAN','BONTANG UTARA','--');
var optDesa    = new Array();
var optDesaID  = new Array();
optDesaID[0] =Array('1','2','3');
optDesaID[1] =Array('4','5','6','7','8','9');
optDesaID[2] =Array('10','11','12','13','14','15');
optDesaID[3] =Array('16');
optDesa[0] =Array('BELIMBING','KANAAN','TELIHAN');
optDesa[1] =Array('TANJUNG LAUT','TANJUNG LAUT INDAH','BERBAS TENGAH','BERBAS PANTAI','BONTANG LESTARI','SATIMPO');
optDesa[2] =Array('API - API','BONTANG BARU','BONTANG KUALA','GUNTUNG','GUNUNG ELAI','LOKTUAN');
optDesa[3] =Array('--');

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

