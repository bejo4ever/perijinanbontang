<?php
class M_public_function extends App_Model{
	function getNomorSk($id_ijin){
		$romawi=array('I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$counter= 0;
		$format	= '';
		$rs = $this->db->where('ijin',$id_ijin)->where('tahun',date('Y'))->get('nosk')->row();
		$counter=$rs->counter;
		$format=$rs->format;
		$counter++;
		$temp	= explode('/',$format);
		$result	= '';
		for($i=0;$i<count($temp);$i++) {
			if($temp[$i]=='xC')$temp[$i]=$counter;
			if($temp[$i]=='xB')$temp[$i]=$romawi[date('n')-1];
			if($temp[$i]=='xT')$temp[$i]=date('Y');
			$result.=$result ? "/".$temp[$i] :$temp[$i]; 
		}
		$data=array('counter'=>$counter);
		$this->db->where('id',$rs->id)->update('nosk', $data);
		return $result;
	}
	
	function getNomorReg($id_ijin){
		$counter= 0;
		$format	= '';
		$rs = $this->db->where('ijin_id',1)->get('noregistrasi')->row();
		$counter=$rs->counter;
		$format=$rs->format;
		$counter++;
		$temp	= explode('/',$format);
		$result	= '';
		for($i=0;$i<count($temp);$i++) {
			if($temp[$i]=='X')$temp[$i]=$counter;
			if($temp[$i]=='M')$temp[$i]=date('m');
			if($temp[$i]=='Y')$temp[$i]=date('Y');
			$result.=$result ? "/".$temp[$i] :$temp[$i]; 
		}
		$data=array('counter'=>$counter);
		$this->db->where('id',$rs->id)->update('noregistrasi', $data);
		return $result;
	}
}