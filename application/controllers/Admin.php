<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	 public function __construct(){
        parent::__construct();
    	$this->load->model('admin_model');

    }
	public function index()
	{
		if($this->input->post('isAjax')==1)
		{
			$this->form_validation->set_rules("username","Username","trim|required");
			$this->form_validation->set_rules("userpassword","Password","trim|required");
			if($this->form_validation->run()==FALSE):
				echo json_encode($this->form_validation->error_array());exit;
			else:
				$record = $this->input->post();
				$condition = array('admin_name' =>$record['username'],'admin_password'=>$record['userpassword']);
				$logindata = $this->admin_model->getWhere('adminmaster',$condition);
				if(!empty($logindata) && is_array($logindata)):
					$adminSession = array(
						'isAdmin' => 1,
						'userid' => $logindata[0]['id'],
						'adminStatus'=> $logindata[0]['admin_status'],
						'adminName'=>strtolower($logindata[0]['admin_name']),
						'adminFullName'=>strtoupper($logindata[0]['admin_fullname']),
						'adminRole'=>$logindata[0]['admin_role']
					);
					$this->session->set_userdata($adminSession);
					echo 1;
				else:
					echo 2;
				endif;
			endif;
		}
		else{
			$adminSession = $this->session->userdata('userid');
			if(!empty($adminSession) || $this->session->userdata('adminStatus')=='2')
			{
				redirect(base_url().'admin/dashboard');
			}
			else
			{
				$data['title'] = 'Krishgen login';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/adminlogin');
				$this->load->view('admin/footer');
			}	
		}
	}

	public function dashboard()
	{
		$adminSession = $this->session->userdata('userid');
		if(empty($adminSession) || $this->session->userdata('adminStatus')=='2')
		{
			redirect(base_url().'admin');
		}
		else
		{

			$data['title'] = 'Krishgen login';
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sidebar');
			$this->load->view('admin/dashboard');
			$this->load->view('admin/footer');
		}
	}

	public function logout()
	{  $isAdmin = $this->session->userdata('isAdmin');
		if(!empty($isAdmin))
		{
				$adminSession = array('isAdmin','userid','adminStatus','adminName','adminRole');
				$this->session->unset_userdata($adminSession);
				redirect(base_url().'admin');
		}
		else
		{
			redirect(base_url().'admin/dashboard');
		}
	}

	public function changepassword()
	{
		$adminSession = $this->session->userdata('userid');
		if(empty($adminSession) || $this->session->userdata('adminStatus')=='2')
		{
			redirect(base_url().'admin/dashboard');
		}
		else
		{
			if($this->input->post('isAjax')==1)
			{
				$this->form_validation->set_rules('opass','Old password','trim|required|xss_clean');
				$this->form_validation->set_rules('npass','New Password','trim|required|xss_clean');
				$this->form_validation->set_rules('cpass','Confirm Password','trim|required|matches[npass]|xss_clean');

				$this->form_validation->set_message('matches', 'New password and Confirm password dosent match');
				if($this->form_validation->run()==FALSE):
					echo json_encode($this->form_validation->error_array());exit;
				else:
					$username = $this->session->userdata('adminName');
					
					$record = $this->input->post();
					$opass = sha1($record['opass']);

					$npass = sha1($record['npass']);

					$user_details = $this->admin_model->getWhere('adminmaster',array('admin_name'=>$username,'admin_password'=>$opass));

					if(is_array($user_details)):
						$update_data = array('admin_password'=>$npass,'updated_date'=>date('Y-m-d h:i:s'));
							
						$this->db->update("adminmaster",$update_data,array('admin_name'=>$username));
					
						$data['result'] = 'success';
						$json = json_encode($data);
						echo $json;
					else:
						$data['result'] = 'fail';
						$json = json_encode($data);
						echo $json;
					endif;
				endif;
			}
			else{			
				$data['title'] = 'Change Password';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/sidebar');
				$this->load->view('admin/changepassword');
				$this->load->view('admin/footer');
			}

		}
	}
}
