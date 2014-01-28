<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_menu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		session_start();
		// $this->load->model("");
	}
	public function index()
    {
		$this->load->view('home.php');
        $this->load->view('vmastermenu.php');
    }
}
