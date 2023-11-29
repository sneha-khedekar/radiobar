<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('website_model');
		$this->load->model('web_model');
    }
	public function index()
	{
		$condition = array('hs_status'=>1);
        $data['homesliders'] = $this->web_model->getWhere('homeslider',$condition);	
		$condition = array('s_status'=>1);
		$data['specialguest'] = $this->web_model->getWhere('specialguest',$condition);	
		$data['franchise'] = $this->website_model->getWhere('franchise',array('f_status' =>'1'));
		$data['client'] = $this->website_model->getWhere('client',array('c_status' =>'1'));
		$data['gallery'] = $this->website_model->getWhere('gallery',array('g_status' =>'1'));


		$condition = array('ae_type'=>'day1','ae_status'=>'1');
		$data['day1'] = $this->website_model->getWhere('events',$condition);

		$condition = array('ae_type'=>'day2','ae_status'=>'1');
		$data['day2'] = $this->website_model->getWhere('events',$condition);

		$condition = array('ae_type'=>'day3','ae_status'=>'1');
		$data['day3'] = $this->website_model->getWhere('events',$condition);

		$condition = array('m_status'=>1);
        $data['menu'] = $this->web_model->getWhere('menu',$condition);	

		$this->load->view('website/header');
		$this->load->view('website/nav');
		$this->load->view('website/home',$data);
		$this->load->view('website/footer');
	}
}
