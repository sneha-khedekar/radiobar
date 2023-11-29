<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
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
			$data['title'] = 'Events';
			$condition = array('ae_status'=>1);
			$data['events'] = $this->admin_model->getWhere('events',$condition);			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sidebar');
			$this->load->view('events/events',$data);
			$this->load->view('admin/footer');
		}
	}

	public function add_events()
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
				
				$this->form_validation->set_rules('type','Type', 'required|xss_clean');
				$this->form_validation->set_rules('title','Title', 'required|xss_clean');
				$this->form_validation->set_rules('event_date','Event_date', 'required|xss_clean');
				$this->form_validation->set_rules('wurl','webinar Url', 'required|xss_clean');
				$this->form_validation->set_rules('time','Time', 'xss_clean');
				$this->form_validation->set_rules('shortdesc','Short Description', 'xss_clean');
				
				
		


				
	            if ($this->form_validation->run() == FALSE)
	            {
	         		echo json_encode($this->form_validation->error_array());
	         		exit;
	            }
	            else
	            {

	            	$insertevents = array(
						'ae_type' => $post['type'],
	            		'ae_title' => $post['title'],
	            		'ae_event_date' =>$post['event_date'],
	            		'ae_url' =>$post['wurl'],
						'ae_shortdescription' =>$post['shortdesc'],
	            		'ae_current-time'=>$post['time'],
	            		'ae_status'=>'1'
	     
	            	 );

				// pre($insertroadshow);exit;
	           		$res = $this->db->insert('events',$insertevents);

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
				$data['title'] = 'aboutus - events';
				$data['events'] = '';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/sidebar');
				$this->load->view('events/add_events',$data);
				$this->load->view('admin/footer');	
			}
		}
	}

	public function update_events($id)
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
				$this->form_validation->set_rules('type','Type', 'required|xss_clean');
				$this->form_validation->set_rules('title','Title', 'required|xss_clean');
				$this->form_validation->set_rules('event_date','Event_date', 'required|xss_clean');
				$this->form_validation->set_rules('wurl','webinar Url', 'required|xss_clean');
				$this->form_validation->set_rules('time','Time', 'xss_clean');
				$this->form_validation->set_rules('shortdesc','Short Description', 'xss_clean');


		     
		        if ($this->form_validation->run() == FALSE)
		        {
		     		echo json_encode($this->form_validation->error_array());
		     		exit;
		        }
		        else
		        {
		        	$post = $this->input->post();
			         $updateevents = array(
						'ae_type' => $post['type'],
	            		'ae_title' => $post['title'],
	            		'ae_event_date' =>$post['event_date'],
	            		'ae_url' =>$post['wurl'],
						'ae_shortdescription' =>$post['shortdesc'],
	            		'ae_current-time'=>$post['time'],
	            		'ae_status'=>'1'
		     
		            	 );
			         // pre($updateevents);exit;
			         $condition = array('ae_id'=>$id);
			          $res = $this->db->update('events',$updateevents,$condition);
		       		
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
					$details = $this->admin_model->events_details($id);
					if($details[0]['ae_id']!=NULL):
						$data['title'] = 'Events Upadte';
						$data['val'] = $details[0];
						$this->load->view('admin/header',$data);
						$this->load->view('admin/sidebar');
						$this->load->view('events/update_events',$data);  	
						$this->load->view('admin/footer');
					else:
						redirect(base_url());
					endif;	
			}
		}
	}

	public function update_eventsimg($id)
    {
        if($this->input->post('isAjax')==1)
    	{
            $post = $this->input->post();
           

            $config['upload_path']          = './upload/eventsimg/';
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
                    $updateImg['ae_image'] = $img_data['upload_data']['file_name'];
            }

            $res = $this->db->update('events',$updateImg,array('ae_id' => $id,'ae_status'=> 1));
            if($res)
            {
                echo 1;
            }
            else{

                echo 2; exit;
            }
        }

        else{
                $details = $this->admin_model->events_details($id);
                if($details[0]['ae_id']!=NULL):
					$data['title'] = 'Events Image';
                    $data['img'] = $details[0];
                    $condition = array('ae_status'=>1);
                    $data['news'] = $this->admin_model->getWhere('events',$condition);
                    $this->load->view('admin/header',$data);
                    $this->load->view('admin/sidebar');
                    $this->load->view('events/update_eventsimg',$data);
                    $this->load->view('admin/footer');
                else:
                    redirect(base_url());
                endif;  
        }
    }

}