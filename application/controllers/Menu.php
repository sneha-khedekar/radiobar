<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
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
			$data['title'] = 'Menu';
			$condition = array('m_status'=>1);
			$data['menu'] = $this->admin_model->getWhere('menu',$condition);			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sidebar');
			$this->load->view('menu/menu',$data);
			$this->load->view('admin/footer');
		}
	}

	public function add_menu()
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
				
				$this->form_validation->set_rules('mname','Menu Name', 'required|xss_clean');
				$this->form_validation->set_rules('mdesc','Menu Description', 'required|xss_clean');
				
				
	            if ($this->form_validation->run() == FALSE)
	            {
	         		echo json_encode($this->form_validation->error_array());
	         		exit;
	            }
	            else
	            {

	            	$insertmenu = array(
						'm_name' => $post['mname'],
	            		'm_desc' => $post['mdesc'],
	            		'm_status'=>'1'
	     
	            	 );

				// pre($insertroadshow);exit;
	           		$res = $this->db->insert('menu',$insertmenu);

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
				$data['title'] = 'Menu';
				$data['menu'] = '';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/sidebar');
				$this->load->view('menu/add_menu',$data);
				$this->load->view('admin/footer');	
			}
		}
	}

	public function update_menu($id)
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
				$this->form_validation->set_rules('mname','Menu Name', 'required|xss_clean');
				$this->form_validation->set_rules('mdesc','Menu Description', 'required|xss_clean');

		     
		        if ($this->form_validation->run() == FALSE)
		        {
		     		echo json_encode($this->form_validation->error_array());
		     		exit;
		        }
		        else
		        {
		        	$post = $this->input->post();
			         $updatemenu = array(
						'm_name' => $post['mname'],
	            		'm_desc' => $post['mdesc'],
	            		'm_status'=>'1'
	     
		            	 );
			         // pre($updateevents);exit;
			         $condition = array('m_id'=>$id);
			          $res = $this->db->update('menu',$updatemenu,$condition);
		       		
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
					$details = $this->admin_model->menu_details($id);
					if($details[0]['m_id']!=NULL):
						$data['title'] = 'Menu Upadte';
						$data['val'] = $details[0];
						$this->load->view('admin/header',$data);
						$this->load->view('admin/sidebar');
						$this->load->view('events/update_menu',$data);  	
						$this->load->view('admin/footer');
					else:
						redirect(base_url());
					endif;	
			}
		}
	}

	public function update_menuimg($id)
    {
        if($this->input->post('isAjax')==1)
    	{
            $post = $this->input->post();
           

            $config['upload_path']          = './upload/menuimg/';
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
                    $updateImg['m_img'] = $img_data['upload_data']['file_name'];
            }

            $res = $this->db->update('menu',$updateImg,array('m_id' => $id,'m_status'=> 1));
            if($res)
            {
                echo 1;
            }
            else{

                echo 2; exit;
            }
        }

        else{
                $details = $this->admin_model->menu_details($id);
                if($details[0]['m_id']!=NULL):
					$data['title'] = 'Menu Details';
                    $data['img'] = $details[0];
                    $condition = array('m_status'=>1);
                    $data['menu'] = $this->admin_model->getWhere('menu',$condition);
                    $this->load->view('admin/header',$data);
                    $this->load->view('admin/sidebar');
                    $this->load->view('menu/update_menuimg',$data);
                    $this->load->view('admin/footer');
                else:
                    redirect(base_url());
                endif;  
        }
    }

}