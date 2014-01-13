<?
class String_model extends CI_Model {   
		
	var $bulan=array("1"=>"Januari","2"=>"Februari","3"=>"Maret","4"=>"April","5"=>"Mei","6"=>"Juni","7"=>"Juli","8"=>"Agustus","9"=>"September","10"=>"Oktober","11"=>"Nopember","12"=>"Desember");
	var $hariIndo=array("1"=>"Senin","2"=>"Selasa","3"=>"Rabu","4"=>"Kamis","5"=>"Jumat","6"=>"Sabtu","7"=>"Minggu");
	var $dasar = array(1 => 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam','tujuh', 'delapan', 'sembilan');
	var $angka = array(1000000000, 1000000, 1000, 100, 10, 1);
	var $satuan = array('milyar', 'juta', 'ribu', 'ratus', 'puluh', '');
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function DateTimeDivision($code,$date)
    {
        ## RECEIVE FORMAT YYYY-MM-DD HH:MI:SS ##
        ## EXAMPLE : 2009-12-21 13:26:50
        $result = null;
        if (!empty($date)){
            switch($code)
            {
                case 'd': ##GET DATE				
                    $result = substr($date,8,2) && substr($date,8,2)!='00'? substr($date,8,2):'';
                    break;
                case 'm': ##GET MONTH IN 2 DIGIT				
                    $result = substr($date,5,2) && substr($date,5,2)!='00'? substr($date,5,2):'';
                    break;
                case 'n': ##GET MONTH IN INTEGER			
                    $result = substr($date,5,2)&& substr($date,5,2)!='00'? (int)substr($date,5,2):'';
                    break;    
                case 'Y': ##GET YEAR				
                    $result = substr($date,0,4) && substr($date,0,4)!='0000'? substr($date,0,4):'';
                    break;     
            }
            //continue;    
        }
        return $result;
        
    }
	
	function DateMonthWord($string)
	{
		## RECEIVE FORMAT YYYY-MM-DD HH:MI:SS ##
        ## EXAMPLE : 2009-12-21 13:26:50
		//echo $string;
		$result = "";
		if(!empty($string) && $string !="0000-00-00" && $string!="0000-00-00 00:00:00")
		{
			$result =	$this->DateTimeDivision("d",$string);
			$result .=	" ".$this->bulan[$this->DateTimeDivision("n",$string)];
			$result .=	" ".$this->DateTimeDivision("Y",$string);
		}	
		return $result;
	}
	
	function IsEmpty($str)
	{
		$str	= ltrim(rtrim($str));
		$result	= strlen($str) > 0 ? false : true;
		return $result;
	}
	
	function UcfirstEachWord($string)
	{
		$split=explode(" ", $string);
		$count = $split?count($split):0;
		$changedText = ucfirst(strtolower($string));
		if ($count >0)
			$changedText = "";
		for ($i = 0; $i < $count; $i++){
			$new= ucfirst(strtolower($split[$i]));
			if ($i<$count-1)
				$changedText .= $new." "; 
			else
				$changedText .= $new;
		}
		return $changedText;
	}

	function terbilang($n) {
		$i = 0;
		$str = "";
		while ($n != 0) {
			$count = (int)($n/$this->angka[$i]);
			//if ($count >= 10) $str .= $this->eja($count). " ".$this->satuan[$i]." ";
			if ($count >= 10) $str .= $this->satuan[$i]." ";
			else if($count > 0 && $count < 10) $str .= $this->dasar[$count] . " ".$this->satuan[$i]." ";
			$n -= $this->angka[$i] * $count;
			$i++;
		}
		$str = preg_replace("/satu puluh (\w+)/i", "\\1 belas", $str);
		$str = preg_replace("/satu (ribu|ratus|puluh|belas)/i", "se\\1", $str);
		return $str;
	}
	
    function DateTimeToDate($date, $separate='/')
    {
		$date = !empty($date)? substr($date,8,2).$separate.substr($date,5,2).$separate.substr($date,0,4):null;
		$date = $date == "00".$separate."00".$separate."0000" ? null:$date;
		return $date;
    }	
	
	function cIndMnth($month){
		$bulan = '';
		switch($month){
			case 1:$bulan="januari";break;
			case 2:$bulan="februari";break;
			case 3:$bulan="maret";break;
			case 4:$bulan="april";break;
			case 5:$bulan="mei";break;
			case 6:$bulan="juni";break;
			case 7:$bulan="juli";break;
			case 8:$bulan="agustus";break;
			case 9:$bulan="september";break;
			case 10:$bulan="oktober";break;
			case 11:$bulan="nopember";break;
			case 12:$bulan="desember";break;
		}
		return $bulan;
	}
	
	function getLamaIjin($luasLokasi) {
		$lamaIjin = '';
		if ($luasLokasi <= 250000)
		$lamaIjin = "12 (Dua Belas) bulan";
		else if ($luasLokasi > 250000 && $luasLokasi <= 500000)
		$lamaIjin = "24 (Dua Puluh Empat) bulan";
		else $lamaIjin = "36 (Tiga Puluh Enam) bulan";
	return $lamaIjin;
}
	
}
?>