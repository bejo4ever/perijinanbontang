<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cek_permohonan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		$this->view_data['base_url']=base_url();
		$this->load->library('grocery_CRUD');			

	}
	
	public function index()
    {
		$this->cek_mohon(); 		  
    }

	public function cek_mohon()
    {		
		$this->load->model('Umum_model');

        $this->load->view('vcek_permohonan.php');
	}

	
				
}
