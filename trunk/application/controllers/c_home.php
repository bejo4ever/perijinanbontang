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
}