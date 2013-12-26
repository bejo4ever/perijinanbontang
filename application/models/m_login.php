<?php
class M_login extends App_model{
	function verifikasiLogin($username, $password){
		$this->db->where('USER', $username);
		$this->db->where('PASS', $password);
		$res = $this->db->get('master_user');
		if($res->num_rows() === 1){
			$result = $res->row();
			$_SESSION['USERID']				= $result->ID_USER;
			$_SESSION['IDHAK']				= $result->ID_HAK;
			$_SESSION['PERIJINAN_USERNAME']	= $result->USER;
			$_SESSION['PERIJINAN_NAMA']		= $result->NAMA;
			$_SESSION['PERIJINAN_NIP']		= $result->NIP;
			return 'success';
		}else{
			return 'fail';
		}
	}
}