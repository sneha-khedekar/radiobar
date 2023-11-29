<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {
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

			redirect(base_url().'testimonial/testimonial');

		}
	}

	/*testimonial add , update , delete*/

		public function testimonial()
		{
			$adminSession = $this->session->userdata('userid');
			if(empty($adminSession) || $this->session->userdata('adminStatus')=='2')
			{
				redirect(base_url().'admin');
			}
			else
			{
				$data['title'] = 'Testimonial - Team';
				$condition = array('t_status'=>1);
				$data['testimonials'] = $this->admin_model->getWhere('testimonials',$condition);			
				$this->load->view('admin/header',$data);
				$this->load->view('admin/sidebar');
				$this->load->view('testimonial/testimonial',$data);
				$this->load->view('admin/footer');
			}
		}	 

		public function add_testimonial()
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
					$this->form_validation->set_rules('designation','Designation','required|xss_clean');
					$this->form_validation->set_rules('description','description', 'required|xss_clean');
					
				

		            if ($this->form_validation->run() == FALSE)
		            {
		         		echo json_encode($this->form_validation->error_array());
		         		exit;
		            }
		            else
		            {
			           $post = $this->input->post();
			           $inserttestimonails = array('t_name' =>$post['name'],'t_designation'=>$post['designation'],'t_description'=>$post['description'],'t_status'=>'1');
			            $config['upload_path']   = 'upload/testimonialimg/';
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
			                    $testimonial_data = array('upload_data' => $this->upload->data());
			                    $inserttestimonails['t_img'] = $testimonial_data['upload_data']['file_name'];
			            }
			           
						$res = $this->db->insert('testimonials',$inserttestimonails);
			           		
		           		if($res)
		           		{
		           			$this->session->set_flashdata('Testimonialsmsg',$inserttestimonails['t_name'].' aboutus details added Successfully!!!');

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

					$data['title'] = 'Testimonial';
					$data['testimonials'] = '';
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('testimonial/add_testimonial',$data);
					$this->load->view('admin/footer');
				}
			}
		}

public function update_testimonial($id)
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
					$this->form_validation->set_rules('designation','Designation','required|xss_clean');
					$this->form_validation->set_rules('description','description', 'required|xss_clean');
					
				

		            if ($this->form_validation->run() == FALSE)
		            {
		         		echo json_encode($this->form_validation->error_array());
		         		exit;
		            }
		            else
		            {
			           $post = $this->input->post();
			           $updatetestimonial = array('t_name' =>$post['name'],'t_designation'=>$post['designation'],'t_description'=>$post['description'],'t_status'=>'1');
			           	if($_FILES['image']['name']):
			            $config['upload_path']   = 'upload/testimonialimg/';
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
			                    $testimonial_data = array('upload_data' => $this->upload->data());
			                    $updatetestimonial['t_img'] = $testimonial_data['upload_data']['file_name'];
			            }
			          	endif;
						$res = $this->db->update('testimonials',$updatetestimonial ,array('t_id' => $id,'t_status'=>1));
			           		
		           		if($res)
		           		{
		           			$this->session->set_flashdata('testimonials',$updatetestimonial['t_name'].'testimonials details added Successfully!!!');

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

					$details = $this->admin_model->testimonial_details($id);
					if($details[0]['t_id']!=NULL):
					
						$data['t'] = $details[0];
						$this->load->view('admin/header');
						$this->load->view('admin/sidebar');
						$this->load->view('testimonial/update_testimonial',$data); 
						$this->load->view('admin/footer'); 	
						
					else:
						redirect(base_url());
					endif;	
				
				}
			}
		}


	/*management add , update , delete*/



}