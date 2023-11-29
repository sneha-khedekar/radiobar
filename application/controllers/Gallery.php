<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
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

			redirect(base_url().'gallery/gallery');

		}
	}

	/*testimonial add , update , delete*/

		public function gallery()
		{
			$adminSession = $this->session->userdata('userid');
			if(empty($adminSession) || $this->session->userdata('adminStatus')=='2')
			{
				redirect(base_url().'admin');
			}
			else
			{
				$data['title'] = 'gallery - gallery';
				$condition = array('g_status'=>1);
				$data['gallery'] = $this->admin_model->getWhere('gallery',$condition);			
				$this->load->view('admin/header',$data);
				$this->load->view('admin/sidebar');
				$this->load->view('gallery/gallery',$data);
				$this->load->view('admin/footer');
			}
		}	 

		public function add_gallery()
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
			           $insertclient = array('g_name' =>$post['name'],'g_status'=>'1');
			            $config['upload_path']   = 'upload/galleryimg/';
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
			                    $gallery_data = array('upload_data' => $this->upload->data());
			                    $insertgallery['g_img'] = $gallery_data['upload_data']['file_name'];
			            }
			           
						$res = $this->db->insert('gallery',$insertgallery);
			           		
		           		if($res)
		           		{
		           			$this->session->set_flashdata('clientmsg',$insertgallery['g_img'].' image details added Successfully!!!');

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

					$data['title'] = 'gallery';
					$data['gallery'] = '';
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('gallery/add_gallery',$data);
					$this->load->view('admin/footer');
				}
			}
		}

public function update_gallery($id)
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
			           $updategalleryimg = array('g_name' =>$post['name'],'g_status'=>'1');
			           	if($_FILES['image']['name']):
			            $config['upload_path']   = 'upload/galleryimg/';
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
			                    $gallery_data = array('upload_data' => $this->upload->data());
			                    $updategalleryimg['g_img'] = $gallery_data['upload_data']['file_name'];
			            }
			          	endif;
						$res = $this->db->update('gallery',$updategalleryimg ,array('g_id' => $id,'g_status'=>1));
			           		
		           		if($res)
		           		{
		           			$this->session->set_flashdata('gallery',$updategalleryimg['g_name'].'clinet details added Successfully!!!');

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

					$details = $this->admin_model->gallery_details($id);
					if($details[0]['g_id']!=NULL):
					
						$data['g'] = $details[0];
						$this->load->view('admin/header');
						$this->load->view('admin/sidebar');
						$this->load->view('gallery/update_gallery',$data); 
						$this->load->view('admin/footer'); 	
						
					else:
						redirect(base_url());
					endif;	
				
				}
			}
		}


	/*management add , update , delete*/



}