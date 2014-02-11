<?php
class C_home extends CI_Controller{
	function __construct(){
		parent::__construct();
		session_start();
	}
	function index(){
		// $this->load->model("m_acl");
		// $this->load->model("m_groupmenu");
		// $this->load->model("m_useracl");
		// $data["grup"]	= $this->m_groupmenu->get_by(array("publik"=>1),FALSE,FALSE,FALSE,"order ASC");
		$this->load->view('home');
	}
	function ubahpassword(){
		$password_old=$this->input->post("password_old");
		$password_new=$this->input->post("password_new");
		$user_id = $_SESSION['USERID'];
		$passdb = $this->db->where('ID_USER', $user_id)->get('master_user')->row()->PASS;
		$this->firephp->log($passdb);
		$this->firephp->log($password_old);
		if($passdb == $password_old){
			$data=array("PASS"=>$password_new);
			$this->db->where('ID_USER', $user_id)->update('master_user', $data);
			if($this->db->affected_rows()){
				echo "success";
			}else{
				echo "fail";
			}
		}else{
			echo "diff";
		}
	}
}