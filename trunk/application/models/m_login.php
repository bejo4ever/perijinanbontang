<?php
class M_login extends App_model{
	function verifikasiLogin($username, $password){
		$this->db->where('USER', $username);
		$this->db->where('PASS', $password);
		$res = $this->db->get('master_user');
		if($res->num_rows() === 1){
			$result = $res->row();
			$_SESSSION['PERIJINAN_USERNAME'] = $result->USER;
			$_SESSSION['PERIJINAN_NAMA'] = $result->NAMA;
			$_SESSSION['PERIJINAN_NIP'] = $result->NIP;
			return 'success';
		}else{
			return 'fail';
		}
	}
}