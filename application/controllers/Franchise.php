<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Franchise extends CI_Controller {
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
			$data['title'] = 'Franchises';
			$condition = array('f_status'=>1);
			$data['news'] = $this->admin_model->getWhere('franchise',$condition);
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sidebar');
			$this->load->view('franchises/franchises',$data);
			$this->load->view('admin/footer');
		}
	}
	

	public function add_franchise()
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
				$post = $this->input->post();
				//pre($post);exit;
				$this->form_validation->set_rules('ftitle','Title', 'required|xss_clean');
				$this->form_validation->set_rules('fdate','Publish Date', 'required|xss_clean');
				$this->form_validation->set_rules('furl','Franchise Url', 'required|xss_clean');
				$this->form_validation->set_rules('fvenue','Venue', 'xss_clean');
				$this->form_validation->set_rules('fheading','Franchise Heading', 'required|xss_clean');
				$this->form_validation->set_rules('fdescription1','fdescription1', 'xss_clean');
				$this->form_validation->set_rules('fdescription2','fdescription2', 'xss_clean');
		

	            if ($this->form_validation->run() == FALSE)
	            {
	         		echo json_encode($this->form_validation->error_array());
	         		exit;
	            }
	            else
	            {

	            	$insertfranchise = array(
	            		'f_title' => $post['ftitle'],
	            		'f_date' =>$post['fdate'],
	            		'f_url' =>$post['furl'],
	            		'f_heading' =>$post['fheading'],
	            		'f_venue'=>$post['fvenue'],
						'f_shortdesc' =>$post['fdescription1'],
	            		'f_description' =>$post['fdescription2'],
	            		'f_status'=>'1'
	     
	            	 );

					 
	           		$res = $this->db->insert('franchise',$insertfranchise);
					
	           		if($res)
	           		{

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

				$data['title'] = 'franchises';
				// $data['newsevents'] = '';

				$this->load->view('admin/header',$data);
				$this->load->view('admin/sidebar');
				$this->load->view('franchises/add_franchises',$data);
				$this->load->view('admin/footer');
			}
		}
	}

	public function update_franchise($id)
	{

		if($this->input->post('isAjax')==1)
		{
		    $post = $this->input->post();
		    // pre($post);exit;
			$this->form_validation->set_rules('ftitle','Title', 'required|xss_clean');
				$this->form_validation->set_rules('fdate','Publish Date', 'required|xss_clean');
				$this->form_validation->set_rules('furl','Franchise Url', 'required|xss_clean');
				$this->form_validation->set_rules('fvenue','Venue', 'xss_clean');
				$this->form_validation->set_rules('fheading','Franchise Heading', 'required|xss_clean');
				$this->form_validation->set_rules('fdescription1','fdescription1', 'xss_clean');
				$this->form_validation->set_rules('fdescription2','fdescription2', 'xss_clean');

		 
		    if ($this->form_validation->run() == FALSE)
		    {
		 		echo json_encode($this->form_validation->error_array());
		 		exit;
		    }
		    else
		    {
		    	$post = $this->input->post();
		         $updatefranchise = array(
						'f_title' => $post['ftitle'],
	            		'f_date' =>$post['fdate'],
	            		'f_url' =>$post['furl'],
	            		'f_heading' =>$post['fheading'],
	            		'f_venue'=>$post['fvenue'],
						'f_shortdesc' =>$post['fdescription1'],
	            		'f_description' =>$post['fdescription2'],
	            		'f_status'=>'1'
	     
		        	 );
					
		         $condition = array('f_id'=>$id);
		          $res = $this->db->update('franchise',$updatefranchise,$condition);
		   		
		   				if($res)
		           		{

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
				$details = $this->admin_model->franchise_details($id);
			
				if($details[0]['f_id']!=NULL):
				
					$data['val'] = $details[0];
					
					$data['title'] = 'franchises';
					
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('franchises/update_franchises',$data);  	
					$this->load->view('admin/footer');
				else:
					redirect(base_url());
				endif;	
		}
	}

public function update_franchiseimg($id)
    {
        if($this->input->post('isAjax')==1)
    	{
            $post = $this->input->post();
			// pre($_FILES);exit;          
            $config['upload_path']          = './upload/franchiseimg/';
            $config['allowed_types']        = 'jpeg|jpg|png|JPEG|JPG|PNG';
            $config['max_size'] = 1000;
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
                    $img_data = array('upload_data' => $this->upload->data());
                    $updateImg['f_image'] = $img_data['upload_data']['file_name'];
            }

            $res = $this->db->update('franchise',$updateImg,array('f_id' => $id,'f_status'=> 1));
            if($res)
            {
                echo 1;
            }
            else{

                echo 2; exit;
            }
        }

        else{
                $details = $this->admin_model->franchise_details($id);
                if($details[0]['f_id']!=NULL):
                    $data['img'] = $details[0];
					$data['title'] = 'franchises Image';
                    $condition = array('f_status'=>1);
                    $data['news'] = $this->admin_model->getWhere('franchise',$condition);
                    $this->load->view('admin/header',$data);
                    $this->load->view('admin/sidebar');
                    $this->load->view('franchises/update_franchiseimg',$data);
                    $this->load->view('admin/footer');
                else:
                    redirect(base_url());
                endif;  
        }

    }


}