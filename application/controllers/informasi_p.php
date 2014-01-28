<?php
class Informasi_p extends CI_Controller{
	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_login');
		$this->load->model('m_master_ijin');
		$this->load->helper('form');
	}
	// function index(){
		// $this->load->view('front');
	// }
	function cari_izin(){
		$data["query"]	= $this->m_master_ijin->get_all();
		$data["content"]= $this->load->view('main/v_cari_perijinan',$data,true);
		$this->load->view('front',$data);
	}
	function perijinan(){
		$data["query"]	= $this->m_master_ijin->get_all();
		$data["content"]= $this->load->view('main/v_informasi_perijinan',$data,true);
		$this->load->view('front',$data);
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