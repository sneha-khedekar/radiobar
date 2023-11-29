<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {

	public function index()
	{
		$this->load->view('website/header');
		$this->load->view('website/nav');
		$this->load->view('website/contactus');
		$this->load->view('website/footer');
	}
}
