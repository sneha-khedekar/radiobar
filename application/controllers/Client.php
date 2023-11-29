<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	public function __construct(){
        parent::__construct();
    	$this->load->model('admin_model');
    }

    public function index()
	{

		$adminSession = $this->session->userdata('userid');
		if(empty($adminSession) || $this->session->userdata('adminStatus')=='2')
		{
			redirect(base_url().'admin');
		}
		else
		{

			redirect(base_url().'client/client');

		}
	}

	/*testimonial add , update , delete*/

		public function client()
		{
			$adminSession = $this->session->userdata('userid');
			if(empty($adminSession) || $this->session->userdata('adminStatus')=='2')
			{
				redirect(base_url().'admin');
			}
			else
			{
				$data['title'] = 'client - client';
				$condition = array('c_status'=>1);
				$data['client'] = $this->admin_model->getWhere('client',$condition);			
				$this->load->view('admin/header',$data);
				$this->load->view('admin/sidebar');
				$this->load->view('client/client',$data);
				$this->load->view('admin/footer');
			}
		}	 

		public function add_client()
		{
			$adminSession = $this->session->userdata('userid');
			if(empty($adminSession) || $this->session->userdata('adminStatus')=='2')
			{
				redirect(base_url().'admin');
			}
			else
			{
				if($this->input->post('isAjax')==1)
				{

					$this->form_validation->set_rules('name','Name', 'required|xss_clean');
					
					
				

		            if ($this->form_validation->run() == FALSE)
		            {
		         		echo json_encode($this->form_validation->error_array());
		         		exit;
		            }
		            else
		            {
			           $post = $this->input->post();
			           $insertclient = array('c_name' =>$post['name'],'c_status'=>'1');
			            $config['upload_path']   = 'upload/clientimg/';
		                $config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG';
 						$this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                $this->upload->overwrite = true;

			            if ( ! $this->upload->do_upload('image'))
			            {

			                    $error = array('error' => $this->upload->display_errors());
			                    echo json_encode($error);
			                    exit;
			            }
			            else
			            {
			                    $client_data = array('upload_data' => $this->upload->data());
			                    $insertclient['c_img'] = $client_data['upload_data']['file_name'];
			            }
			           
						$res = $this->db->insert('client',$insertclient);
			           		
		           		if($res)
		           		{
		           			$this->session->set_flashdata('clientmsg',$insertclient['c_img'].' client details added Successfully!!!');

							$response['result'] = 'success';
							$json = json_encode($response);
							echo $json;
		           		}
		           		else{

							$response['result'] = 'fail';
							$json = json_encode($response);
							echo $json;
		           		}

		            }

				}



				else{

					$data['title'] = 'client';
					$data['client'] = '';
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('client/add_client',$data);
					$this->load->view('admin/footer');
				}
			}
		}

public function update_client($id)
		{
			$adminSession = $this->session->userdata('userid');
			if(empty($adminSession) || $this->session->userdata('adminStatus')=='2')
			{
				redirect(base_url().'admin');
			}
			else
			{
				if($this->input->post('isAjax')==1)
				{

					$this->form_validation->set_rules('name','Name', 'required|xss_clean');
				
					
				

		            if ($this->form_validation->run() == FALSE)
		            {
		         		echo json_encode($this->form_validation->error_array());
		         		exit;
		            }
		            else
		            {
			           $post = $this->input->post();
			           $updateclient = array('c_name' =>$post['name'],'c_status'=>'1');
			           	if($_FILES['image']['name']):
			            $config['upload_path']   = 'upload/clientimg/';
		                $config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG';

 						$this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                $this->upload->overwrite = true;

			            if ( ! $this->upload->do_upload('image'))
			            {

			                    $error = array('error' => $this->upload->display_errors());
			                    echo json_encode($error);
			                    exit;
			            }
			            else
			            {
			                    $client_data = array('upload_data' => $this->upload->data());
			                    $updateclient['c_img'] = $client_data['upload_data']['file_name'];
			            }
			          	endif;
						$res = $this->db->update('client',$updateclient ,array('c_id' => $id,'c_status'=>1));
			           		
		           		if($res)
		           		{
		           			$this->session->set_flashdata('client',$updateclient['c_name'].'clinet details added Successfully!!!');

							$response['result'] = 'success';
							$json = json_encode($response);
							echo $json;
		           		}
		           		else{

							$response['result'] = 'fail';
							$json = json_encode($response);
							echo $json;
		           		}

		            }

				}



				else{

					$details = $this->admin_model->client_details($id);
					if($details[0]['c_id']!=NULL):
					
						$data['c'] = $details[0];
						$this->load->view('admin/header');
						$this->load->view('admin/sidebar');
						$this->load->view('client/update_client',$data); 
						$this->load->view('admin/footer'); 	
						
					else:
						redirect(base_url());
					endif;	
				
				}
			}
		}


	/*management add , update , delete*/



}