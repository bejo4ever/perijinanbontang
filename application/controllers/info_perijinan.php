<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info_perijinan extends CI_Controller {

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
		
        $crud->set_table('ijin');
		$crud->set_subject('Ijin');
		$crud->columns('nama','waktu','retribusi');

		$crud->display_as('nama','Jenis Perijinan');
		$crud->display_as('waktu','Waktu (hari kerja)');
		$crud->display_as('retribusi','Retribusi');

		//$crud->unset_print();
		//$crud->unset_export();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();
		
        $output = $crud->render();
		$js_files = $output->js_files;
		$css_files = $output->css_files;
 		$data['output'] = $output;
		$data['label'] = "Info Perijinan";
		
 		$this->load->view('home.php');
        $this->load->view('vinformasi.php',array(
											'js_files' => $js_files,
											'css_files' => $css_files,
											'output'	=> $data));
	}

		
}
