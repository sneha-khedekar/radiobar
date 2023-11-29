<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Franchises extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('website_model');
    }
	public function index()
	{
		$data['franchise'] = $this->website_model->getWhere('franchise',array('f_status' =>'1'));
		$this->load->view('website/header');
		$this->load->view('website/nav');
		$this->load->view('website/franchises',$data);
		$this->load->view('website/footer');
	}
	public function detail($id)
	{

		$franchise = $this->website_model->getWhere('franchise',array('f_status' =>'1','f_url'=>$id));
		
		if (is_array($franchise)) {
			
			$data['franchise'] = $franchise[0];
			/*pre($data);
			exit;*/
			$data['otherfranchise'] = $this->website_model->getWhere('franchise',array('f_status' =>'1','f_id!='=>$franchise[0]['f_id']));
			
			$this->load->view('website/header');
			$this->load->view('website/nav');
			$this->load->view('website/franchies_detail',$data);
			$this->load->view('website/footer');
		}
		else{

			redirect(base_url().'/franchises');
		}
	
	}
}