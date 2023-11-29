<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {
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
			$data['title'] = 'Blogs';
			$condition = array('b_status'=>1);
			$data['news'] = $this->admin_model->getWhere('blogs',$condition);
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sidebar');
			$this->load->view('blogs/blogs',$data);
			$this->load->view('admin/footer');
		}
	}
	

	public function add_blogs()
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
				$this->form_validation->set_rules('title','Title', 'required|xss_clean');
				$this->form_validation->set_rules('blogs_date','Blogs Date', 'required|xss_clean');
				$this->form_validation->set_rules('burl','Blogs Url', 'required|xss_clean');
				$this->form_validation->set_rules('venue','Venue', 'xss_clean');
				$this->form_validation->set_rules('comment','Comment', 'xss_clean');
				$this->form_validation->set_rules('time','Time', 'xss_clean');
				$this->form_validation->set_rules('other','Other', 'xss_clean');
				$this->form_validation->set_rules('meta_tag_title','Meta Tag Title', 'xss_clean');
				$this->form_validation->set_rules('Description1','Description1', 'xss_clean');
				$this->form_validation->set_rules('Description2','Description2', 'xss_clean');
				$this->form_validation->set_rules('meta_tag_description','Meta Tag Description', 'xss_clean');
				$this->form_validation->set_rules('meta_tag_keyword','Meta Tag Keyword', 'xss_clean');
				$this->form_validation->set_rules('description','Description', 'xss_clean');

	            if ($this->form_validation->run() == FALSE)
	            {
	         		echo json_encode($this->form_validation->error_array());
	         		exit;
	            }
	            else
	            {

	            	$insertblogs = array(
	            		'b_title' => $post['title'],
	            		'b_blog_date' =>$post['blogs_date'],
	            		'b_url' =>$post['burl'],
	            		'b_shortdesc' =>htmlspecialchars($post['Description1']),
	            		'b_description' =>htmlspecialchars($post['Description2']),
	            		'b_venue'=>$post['venue'],
	            		'b_comment'=>$post['comment'],
	            		'b_current_time'=>$post['time'],
	            		'b_meta_tag_title'=>$post['meta_tag_title'],
	            		'b_meta_tag_description'=>$post['meta_tag_description'],
	            		'b_meta_tag_keyword'=>$post['meta_tag_keyword'],
	            		'b_status'=>'1'
	     
	            	 );


	           		$res = $this->db->insert('blogs',$insertblogs);

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

				$data['title'] = 'Blogs';
				// $data['newsevents'] = '';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/sidebar');
				$this->load->view('blogs/add_blogs',$data);
				$this->load->view('admin/footer');
			}
		}
	}

	public function update_blogs($id)
	{

		if($this->input->post('isAjax')==1)
		{
		    $post = $this->input->post();
		    //pre($post);exit;
			$this->form_validation->set_rules('title','Title', 'required|xss_clean');
			$this->form_validation->set_rules('blogs_date','Blogs Date', 'required|xss_clean');
			$this->form_validation->set_rules('burl','Blogs Url', 'required|xss_clean');
			$this->form_validation->set_rules('venue','Venue', 'xss_clean');
			$this->form_validation->set_rules('comment','Comment', 'xss_clean');
			$this->form_validation->set_rules('time','Time', 'xss_clean');
			$this->form_validation->set_rules('other','Other', 'xss_clean');
			$this->form_validation->set_rules('meta_tag_title','Meta Tag Title', 'xss_clean');
			$this->form_validation->set_rules('Description1','Description1', 'xss_clean');
			$this->form_validation->set_rules('Description2','Description2', 'xss_clean');
			$this->form_validation->set_rules('meta_tag_description','Meta Tag Description', 'xss_clean');
			$this->form_validation->set_rules('meta_tag_keyword','Meta Tag Keyword', 'xss_clean');
			$this->form_validation->set_rules('description','Description', 'xss_clean');

		 
		    if ($this->form_validation->run() == FALSE)
		    {
		 		echo json_encode($this->form_validation->error_array());
		 		exit;
		    }
		    else
		    {
		    	$post = $this->input->post();
		         $updateblogs = array(
		         		'b_title' => $post['title'],
	            		'b_blog_date' =>$post['blogs_date'],
	            		'b_url' =>$post['burl'],
	            		'b_shortdesc' =>htmlspecialchars($post['Description1']),
	            		'b_description' =>htmlspecialchars($post['Description2']),
	            		'b_venue'=>$post['venue'],
	            		'b_comment'=>$post['comment'],
	            		'b_current_time'=>$post['time'],
	            		'b_meta_tag_title'=>$post['meta_tag_title'],
	            		'b_meta_tag_description'=>$post['meta_tag_description'],
	            		'b_meta_tag_keyword'=>$post['meta_tag_keyword'],
		        		'b_status'=>$post['status']
		        	 );
		         $condition = array('b_id'=>$id);
		          $res = $this->db->update('blogs',$updateblogs,$condition);
		   		
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
				$details = $this->admin_model->blogs_details($id);
				if($details[0]['b_id']!=NULL):
				
					$data['val'] = $details[0];
					$data['title'] = 'Blogs';
					// pre($data);exit;
					$this->load->view('admin/header',$data);
					$this->load->view('admin/sidebar');
					$this->load->view('blogs/update_blogs',$data);  	
					$this->load->view('admin/footer');
				else:
					redirect(base_url());
				endif;	
		}
	}

public function update_blogsimg($id)
    {
        if($this->input->post('isAjax')==1)
    	{
            $post = $this->input->post();
			// pre($_FILES);exit;          
            $config['upload_path']          = './upload/blogsimg/';
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
                    $updateImg['b_image'] = $img_data['upload_data']['file_name'];
            }

            $res = $this->db->update('blogs',$updateImg,array('b_id' => $id,'b_status'=> 1));
            if($res)
            {
                echo 1;
            }
            else{

                echo 2; exit;
            }
        }

        else{
                $details = $this->admin_model->blogs_details($id);
                if($details[0]['b_id']!=NULL):
                    $data['img'] = $details[0];
					$data['title'] = 'Blogs Image';
                    $condition = array('b_status'=>1);
                    $data['news'] = $this->admin_model->getWhere('blogs',$condition);
                    $this->load->view('admin/header',$data);
                    $this->load->view('admin/sidebar');
                    $this->load->view('blogs/update_blogsimg',$data);
                    $this->load->view('admin/footer');
                else:
                    redirect(base_url());
                endif;  
        }

    }


}