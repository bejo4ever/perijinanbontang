<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info_cekpermohonan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->database();
		$this->load->helper('url');
		$this->view_data['base_url']=base_url();
		$this->load->library('grocery_CRUD');	
		//$this->load->library('calendar');

	}
	
	public function index()
    {
		$this->load->view('home.php');
        $this->load->view('vinfocek.php');
    }



		
}
