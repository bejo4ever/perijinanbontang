<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info_tambahpengaduan extends CI_Controller {

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
		
        $crud->set_table('pengaduan');
		$crud->set_subject('Daftar Pengaduan');
		$crud->columns('nama','pengaduan','tglpengaduan');

		$crud->display_as('nama','Nama Pengadu');
		$crud->display_as('pengaduan','Isi');
		$crud->display_as('tglpengaduan','Tanggal Masuk');

		$crud->unset_print();
		$crud->unset_export();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_read();
		
        $output = $crud->render();
 		$this->load->view('home.php');
        $this->load->view('vinfotambahpengaduan.php',$output);
	}

	public function simpen_baru()
    {
	$this->load->model('M_info_tambahpengaduan');
						
				
				$data["txtnama"]=$_POST['txtnama'];
				$data["txtalamat"]=$_POST['txtalamat'];
				$data["txtrt"]=$_POST['txtrt'];
				$data["txtrw"]=$_POST['txtrw'];
				$data["cbocamat"]=$_POST['kec1'];
				$data["cbodesa"]=$_POST['desa1'];
                $data["txttelp"]=$_POST['txttelp'];
				$data["txthp"]=$_POST['txthp'];
				$data["txtemail"]=$_POST['txtemail'];
				$data["txtareaisi"]=$_POST['txtareaisi'];

				$this->M_info_tambahpengaduan->put_insert_pengaduan($data);

	redirect('info_tambahpengaduan');
	}

		
}
