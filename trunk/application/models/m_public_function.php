<?php
class M_public_function extends App_Model{
	function getNomorSk($id_ijin){
		$romawi=array('I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$counter= 0;
		$format	= '';
		$rs = $this->db->where('ijin',$id_ijin)->where('tahun',date('Y'))->get('nosk')->row();
		$counter=$rs->counter;
		$format=trim($rs->format);
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
		$rs = $this->db->where('ijin_id',$id_ijin)->get('noregistrasi')->row();
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
	function get_kelurahan($params){
		extract($params);
		$arraysearch = array('desa'=>strtolower($searchText));
		$result = $this->db->or_like($arraysearch)->get('desa', $limit_end, $limit_start);
		$total_rows = $result->num_rows();
		$json_result = json_encode($result->result());
		$result = '({"total":"'.$total_rows.'","results":'.$json_result.'})';
		return $result;
	}
	function get_kecamatan($params){
		extract($params);
		$arraysearch = array('kecamatan'=>strtolower($searchText));
		$result = $this->db->or_like($arraysearch)->get('kecamatan', $limit_end, $limit_start);
		$total_rows = $result->num_rows();
		$json_result = json_encode($result->result());
		$result = '({"total":"'.$total_rows.'","results":'.$json_result.'})';
		return $result;
	}
	function get_bentuk_perusahaan($params){
		extract($params);
		$arraysearch = array('nama'=>strtolower($searchText));
		$result = $this->db->or_like($arraysearch)->get('bentukperusahaan', $limit_end, $limit_start);
		$total_rows = $result->num_rows();
		$json_result = json_encode($result->result());
		$result = '({"total":"'.$total_rows.'","results":'.$json_result.'})';
		return $result;
	}
	function get_kualifikasi($params){
		extract($params);
		$arraysearch = array('kualifikasi'=>strtolower($searchText));
		$result = $this->db->or_like($arraysearch)->get('kualifikasi', $limit_end, $limit_start);
		$total_rows = $result->num_rows();
		$json_result = json_encode($result->result());
		$result = '({"total":"'.$total_rows.'","results":'.$json_result.'})';
		return $result;
	}
	function get_propinsi($params){
		extract($params);
		$arraysearch = array('propinsi'=>strtolower($searchText));
		$result = $this->db->or_like($arraysearch)->get('propinsi', $limit_end, $limit_start);
		$total_rows = $result->num_rows();
		$json_result = json_encode($result->result());
		$result = '({"total":"'.$total_rows.'","results":'.$json_result.'})';
		return $result;
	}
	function get_kabkota($params){
		extract($params);
		$arraysearch = array('kabkota'=>strtolower($searchText));
		$result = $this->db->or_like($arraysearch)->get('kabkota', $limit_end, $limit_start);
		$total_rows = $result->num_rows();
		$json_result = json_encode($result->result());
		$result = '({"total":"'.$total_rows.'","results":'.$json_result.'})';
		return $result;
	}
	function get_status_tempat($params){
		extract($params);
		$arraysearch = array('status'=>strtolower($searchText));
		$result = $this->db->or_like($arraysearch)->get('statustempat', $limit_end, $limit_start);
		$total_rows = $result->num_rows();
		$json_result = json_encode($result->result());
		$result = '({"total":"'.$total_rows.'","results":'.$json_result.'})';
		return $result;
	}
	function get_status_usaha($params){
		extract($params);
		$arraysearch = array('status'=>strtolower($searchText));
		$result = $this->db->or_like($arraysearch)->get('sperusahaan', $limit_end, $limit_start);
		$total_rows = $result->num_rows();
		$json_result = json_encode($result->result());
		$result = '({"total":"'.$total_rows.'","results":'.$json_result.'})';
		return $result;
	}
	function get_merk($params){
		extract($params);
		$arraysearch = array('merk'=>strtolower($searchText));
		$result = $this->db->or_like($arraysearch)->get('merk', $limit_end, $limit_start);
		$total_rows = $result->num_rows();
		$json_result = json_encode($result->result());
		$result = '({"total":"'.$total_rows.'","results":'.$json_result.'})';
		return $result;
	}
	function get_jenis_usaha($params){
		extract($params);
		$arraysearch = array('usaha'=>strtolower($searchText));
		$result = $this->db->or_like($arraysearch)->get('jusaha', $limit_end, $limit_start);
		$total_rows = $result->num_rows();
		$json_result = json_encode($result->result());
		$result = '({"total":"'.$total_rows.'","results":'.$json_result.'})';
		return $result;
	}
}