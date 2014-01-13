<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		$this->view_data['base_url']=base_url();		

	}

	public function put_ubah_statuspermohonan()
    {   
		$this->load->model('Permohonan_model');

		$idpermohonan=$_GET['idpermohonan'];
		$status=$_GET['status'];
		$control=$_GET['control'];
		$this->Permohonan_model->put_insert_statuspermohonan($idpermohonan,$status,date("Y-m-d H:i:s"));
		
		redirect(site_url()."/$control");

    }

	public function get_data_tdp($id)
    {   
		$this->load->model('Tdp_model');     
		$this->load->model('Pemohon_model');
		$this->load->model('Perusahaan_model');        		
		
		$data_siup=$this->Tdp_model->get_data_tdp($id);				
	
        $data_pemohon=$this->Pemohon_model->get_data_pemohon($data_siup["pemohon_id"]);		
		$data_perus=$this->Perusahaan_model->get_data_perusahaan($data_siup["perusahaan_id"]);		
		$data=array_merge($data_siup,$data_pemohon, $data_perus);
		echo json_encode($data);

    }
	
	public function get_data_vsiup($id)
    {   
		$this->load->model('Umum_model');     
		$this->load->model('Pemohon_model');
		$this->load->model('Perusahaan_model');        		
		
		$data_siup=$this->Umum_model->get_data_vsiup($id);	
			
		$data_pemohon=$this->Pemohon_model->get_data_pemohon($data_siup["pemohon_id"]);		
		$data_perus=$this->Perusahaan_model->get_data_perusahaan($data_siup["perusahaan_id"]);				
		$data=array_merge($data_siup,$data_pemohon, $data_perus);
		echo json_encode($data);

    }

	public function get_data_siup($id)
    {   
		$this->load->model('Siup_model');     
		$this->load->model('Pemohon_model');
		$this->load->model('Perusahaan_model');        		
		
		$data_siup=$this->Siup_model->get_data_siup($id);	
			
		$data_pemohon=$this->Pemohon_model->get_data_pemohon($data_siup["pemohon_id"]);		
		$data_perus=$this->Perusahaan_model->get_data_perusahaan($data_siup["perusahaan_id"]);				
		$data_perus_siup=$this->Siup_model->get_data_perusahaan_siup($data_siup["perusahaan_id"],$id);		
		$data=array_merge($data_siup,$data_pemohon, $data_perus, $data_perus_siup);
		echo json_encode($data);

    }

	public function get_data_imb($id)
    {   
		$this->load->model('Imb_model');     
		$this->load->model('Pemohon_model');		
		
		$data_imb=$this->Imb_model->get_data_imb($id);	
			
		$data_pemohon=$this->Pemohon_model->get_data_pemohon($data_imb["pemohon_id"]);				
		$data_imbdata=$this->Imb_model->get_data_imbdata($data_imb["imb_id"]);
		$data_imbindeks=$this->Imb_model->get_data_imbindeks($data_imb["imb_id"]);				
		$data=array_merge($data_imb,$data_pemohon,$data_imbdata,$data_imbindeks);
		echo json_encode($data);
		
    }

	public function get_data_ho($id)
    {
		$this->load->model('Ho_model');    
		$this->load->model('Umum_model');     
		$this->load->model('Pemohon_model');
		$this->load->model('Perusahaan_model');        		
		
		
		$data_ho=$this->Ho_model->get_data_ho($id);
			
        $data_pemohon=$this->Pemohon_model->get_data_pemohon($data_ho["pemohon_id"]);		
		$data_perus=$this->Perusahaan_model->get_data_perusahaan($data_ho["perusahaan_id"]);
	    $data_surveyor=$this->Ho_model->get_data_surveyor($data_ho["ho_id"]);
		$data=array_merge($data_ho,$data_pemohon, $data_perus, $data_surveyor);
		echo json_encode($data);

    }

	public function get_data_vho($id)
    {
		$this->load->model('Ho_model');    
		$this->load->model('Umum_model');     
		$this->load->model('Pemohon_model');
		$this->load->model('Perusahaan_model');        		
		
		
		$data_ho=$this->Ho_model->get_data_vho($id);
			
        $data_pemohon=$this->Pemohon_model->get_data_pemohon($data_ho["pemohon_id"]);		
		$data_perus=$this->Perusahaan_model->get_data_perusahaan($data_ho["perusahaan_id"]);
				
		$data=array_merge($data_ho,$data_pemohon, $data_perus);
		echo json_encode($data);

    }

	public function get_data_ho_siup($id)
    {
		$this->load->model('Siup_model');    
		$this->load->model('Ho_model');     
		$this->load->model('Pemohon_model');
		$this->load->model('Perusahaan_model');        		
		
		//$data_siup=$this->Umum_model->get_data_ho($id);	
		$data_ho=$this->Ho_model->get_data_ho($id);
			
        $data_pemohon=$this->Pemohon_model->get_data_pemohon($data_ho["pemohon_id"]);		
		$data_perus=$this->Perusahaan_model->get_data_perusahaan($data_ho["perusahaan_id"]);
		$data_perus_siup=$this->Siup_model->get_data_perusahaan_siup($data_ho["perusahaan_id"],$data_ho["pemohon_id"]);		
		$data=array_merge($data_ho,$data_pemohon, $data_perus,$data_perus_siup);
		echo json_encode($data);

    }

	public function get_data_pemohon($id)
    {        
		$this->load->model('Pemohon_model');        		
		
        $data=$this->Pemohon_model->get_data_pemohon($id);		
		echo json_encode($data);

    }

	public function get_data_limbah($id)
    {
		$this->load->model('Limbah_model');    
		$this->load->model('Umum_model');     
		$this->load->model('Pemohon_model');
		$this->load->model('Perusahaan_model');        		
		
		
		$data_limbah=$this->Limbah_model->get_data_limbah($id);
			
        $data_pemohon=$this->Pemohon_model->get_data_pemohon($data_limbah["pemohon_id"]);		
		$data_perus=$this->Perusahaan_model->get_data_perusahaan($data_limbah["perusahaan_id"]);
		$data=array_merge($data_limbah,$data_pemohon, $data_perus);
		echo json_encode($data);
    }

	public function get_data_trayek($id)
    {
		$this->load->model('Trayek_model');    
		$this->load->model('Umum_model');     
		$this->load->model('Pemohon_model');
		$this->load->model('Perusahaan_model');        		
		
		
		$data_trayek=$this->Trayek_model->get_data_trayek($id);
			
        $data_pemohon=$this->Pemohon_model->get_data_pemohon($data_trayek["pemohon_id"]);		
		$data_perus=$this->Perusahaan_model->get_data_perusahaan($data_trayek["perusahaan_id"]);
		$data=array_merge($data_trayek,$data_pemohon, $data_perus);
		echo json_encode($data);
    }

	public function get_data_reklame($id)
    {
		$this->load->model('Reklame_model');    
		$this->load->model('Umum_model');     
		$this->load->model('Pemohon_model');
		$this->load->model('Perusahaan_model');        		
		
		
		$data_reklame=$this->Reklame_model->get_data_reklame($id);
		$data_reklame_detail=$this->Reklame_model->get_data_reklame_detail($id);	
        $data_pemohon=$this->Pemohon_model->get_data_pemohon($data_reklame["pemohon_id"]);		
		$data_perus=$this->Perusahaan_model->get_data_perusahaan($data_reklame["perusahaan_id"]);
		$data=array_merge($data_reklame,$data_reklame_detail,$data_pemohon, $data_perus);
		echo json_encode($data);
    }

	public function get_data_lokasi($id)
    {
		$this->load->model('Lokasi_model');    
		$this->load->model('Umum_model');     
		$this->load->model('Pemohon_model');
		$this->load->model('Perusahaan_model');        		
		
		
		$data_lokasi=$this->Lokasi_model->get_data_lokasi($id);
        $data_pemohon=$this->Pemohon_model->get_data_pemohon($data_lokasi["pemohon_id"]);				
		$data=array_merge($data_lokasi,$data_pemohon);
		echo json_encode($data);
    }

	public function get_data_perusahaan($id)
    {        
		$this->load->model('Perusahaan_model');        		
		
        $data=$this->Perusahaan_model->get_data_perusahaan($id);		
		echo json_encode($data);

    }

	public function get_data_klui($id)
    {        
		$this->load->model('Perusahaan_model');        		
		
        $data=$this->Perusahaan_model->get_data_klui($id);		
		echo json_encode($data);

    }

			
}
