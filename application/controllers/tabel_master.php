<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tabel_master extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		session_start();
		//$this->load->database();
		$this->load->helper('url');
		$this->view_data['base_url']=base_url();
		//$this->load->library('grocery_CRUD');	
		//$this->load->library('table');
	}
	
	public function index()
    {
		$this->load->view('home.php');
        $this->load->view('vmastermenu.php');
    }


		
}
