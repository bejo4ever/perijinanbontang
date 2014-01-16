<?php
class C_t_laporan extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_t_laporan');
	}
	
	function index(){
		$this->load->view('home.php');
		$this->load->view('main/v_t_laporan');
	}
	
	function switchAction(){
		$action = $this->input->post('action');
		switch($action){
			case 'cetaklaporan':
				$this->cetaklaporan();
			break;
			default :
				echo '{ failure : true }';
			break;
		}
	}
	
	function cetaklaporan(){
		$idamdet_id  = $this->input->post('idamdet_id');
		$params = array(
			"det_idam_id"=>$idamdet_id,
			"return_type"=>'array',
		);
		$printrecord = $this->m_t_laporan->search($params);
		$data['printrecord'] = $printrecord[1];		
		$print_view=$this->load->view('template/p_idam_sk.php',$data,TRUE);
		$print_file=fopen('print/idam_sk.html','w+');
		fwrite($print_file, $print_view);
		echo 'success';
	}
	
}