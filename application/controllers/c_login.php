<?php
class c_login extends CI_Controller{
	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_login');
	}
	function index(){
		$data["content"]	= $this->load->view("main/v_front_content","",true);
		$this->load->view('front',$data);
	}
	function form(){
		$this->load->view('v_login');
	}
	function verifikasiLogin(){
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$result = $this->m_login->verifikasiLogin($username, $password);
		echo $result;
	}
	function logout(){
		$_SESSION['USERID']	='';
		$_SESSION['PERIJINAN_USERNAME']	='';
		$_SESSION['PERIJINAN_NAMA']		='';
		$_SESSION['PERIJINAN_NIP']		='';
		$_SESSION['IDHAK']		='';
		session_destroy();
		redirect('');
	}
}