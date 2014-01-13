<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_admin_home extends CI_Controller {

		 
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			header('location:'.base_url().'app_admin');
		}
		else
		{
			
			/*$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			
			$config['base_url'] = base_url() . 'app_admin_data_pemilih/index/';
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();*/
			
			
			
			$this->load->view("app_admin/global/header");
			//$this->load->view("app_admin/data_pemilih/home");
			//$this->load->view("app_admin/global/footer");
		}
	}
}

/* End of file app_admin_home.php */
/* Location: ./application/controllers/app_admin_home.php */