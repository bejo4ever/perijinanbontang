<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_dokumen extends CI_Controller {

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
		$this->tabelnya(); 		  
    }

	public function tabelnya()
    {
		$crud = new grocery_CRUD();
		
        $crud->set_table('dokumen');
		$crud->set_subject('Dokumen');
		//$crud->columns('judul');

		//$crud->unset_print();
		//$crud->unset_export();
		//$crud->unset_add();
		//$crud->unset_edit();
		//$crud->unset_delete();
		$crud->unset_read();
		
        $output = $crud->render();
 		$js_files = $output->js_files;
		$css_files = $output->css_files;
 		$data['output'] = $output;
		$data['label'] = "Master Dokumen";
		
 		$this->load->view('home.php');
        $this->load->view('vtabel_master.php',array(
											'js_files' => $js_files,
											'css_files' => $css_files,
											'output'	=> $data));
	}

		
}
