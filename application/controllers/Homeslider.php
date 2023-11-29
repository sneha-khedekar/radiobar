<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homeslider extends CI_Controller {
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
                        $data['title'] = 'Home Slider - image';
                        $condition = array('hs_status'=>1);
                        $data['image'] = $this->admin_model->getWhere('homeslider',$condition);
                        $this->load->view('admin/header',$data);
                        $this->load->view('admin/sidebar');
                        $this->load->view('home/image',$data);
                        $this->load->view('admin/footer');

                }
    }


    public function add()
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
                         $this->form_validation->set_rules('address', 'address', 'xss_clean|required');
                         $this->form_validation->set_rules('status', 'Status', 'xss_clean|required');
                         $this->form_validation->set_rules('title', 'Link', 'xss_clean|required');
                         $this->form_validation->set_rules('link', 'Link', 'xss_clean|required');
                         $this->form_validation->set_rules('date', 'date', 'xss_clean|required');
                         $this->form_validation->set_rules('stime', 'Start Time', 'xss_clean|required');
                         $this->form_validation->set_rules('etime', 'End Time', 'xss_clean|required');
                         $this->form_validation->set_rules('ename', 'Event Name', 'xss_clean|required');
                         $this->form_validation->set_rules('attending', 'attending', 'xss_clean|required');
                         $this->form_validation->set_rules('date', 'Counter date', 'xss_clean|required');
                         $this->form_validation->set_rules('status', 'Status', 'xss_clean|required');

                
                if ($this->form_validation->run() == FALSE)
                {
                    echo json_encode($this->form_validation->error_array());
                    exit;
                }
                else
                {
                    $post = $this->input->post();
                    $insertImg = array('hs_address' =>$post['address'],
                                        'hs_status' =>$post['status'],
                                        'hs_title' =>$post['title'],
                                        'hs_link' =>$post['link'],
                                        'hs_date' =>$post['date'],
                                        'hs_stime' =>$post['stime'],
                                        'hs_etime' =>$post['etime'],
                                        'hs_ename' =>$post['ename'],
                                        'hs_attending' =>$post['attending'],
                                        'hs_cdate' =>$post['cdate'],
                                        'hs_link' =>$post['link']);
                                   

                    $config['upload_path']          = './upload/homeslider/';
                    $config['allowed_types']        = 'jpeg|jpg|png|JPEG|JPG|PNG|svg|SVG';
                    //$config['max_size'] = 2048;
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
                            $insertImg['hs_img'] = $img_data['upload_data']['file_name'];
                    }
                    $res = $this->db->insert('homeslider',$insertImg);
                    // pre($res);exit;
                    if($res)
                    {
                        $response['result'] = 'success';
                        $json = json_encode($response);
                        echo $json;
                
                    }
                    else{

                        echo 2; exit;
                    }

                }
            }

            else{

                                    $data['title'] = 'homeslider_image';
                                    $this->load->view('admin/header',$data);
                                    $this->load->view('admin/sidebar');
                                    $this->load->view('home/add_image',$data);
                                    $this->load->view('admin/footer');

            }

        }   
    }


public function update($id)
    {
        if($this->input->post('isAjax')==1)
        {
                $this->form_validation->set_rules('address', 'address', 'xss_clean|required');
                $this->form_validation->set_rules('status', 'Status', 'xss_clean|required');
                $this->form_validation->set_rules('link', 'Link', 'xss_clean|required');
                $this->form_validation->set_rules('date', 'date', 'xss_clean|required');
                $this->form_validation->set_rules('stime', 'Start Time', 'xss_clean|required');
                $this->form_validation->set_rules('etime', 'End Time', 'xss_clean|required');
                $this->form_validation->set_rules('ename', 'Event Name', 'xss_clean|required');
                $this->form_validation->set_rules('attending', 'attending', 'xss_clean|required');
                $this->form_validation->set_rules('date', 'Counter date', 'xss_clean|required');
               

            
            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode($this->form_validation->error_array());
                exit;
            }
            else
            {
                $post = $this->input->post();
                $updateImg = array();
              
                    $updateImg = array('hs_address' =>$post['address'],
                                        'hs_status' =>$post['status'],
                                        'hs_title' =>$post['title'],
                                        'hs_link' =>$post['link'],
                                        'hs_date' =>$post['date'],
                                        'hs_stime' =>$post['stime'],
                                        'hs_etime' =>$post['etime'],
                                        'hs_ename' =>$post['ename'],
                                        'hs_attending' =>$post['attending'],
                                        'hs_cdate' =>$post['date'],
                                        'hs_link' =>$post['link']);
                if($_FILES['image']['name']!='')
                {
                
                
                    $config['upload_path']          = './upload/homeslider/';
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
                            $updateImg['hs_img'] = $img_data['upload_data']['file_name'];
                    }
                }


                $res = $this->db->update('homeslider',$updateImg,array('hs_id' => $id,'hs_status'=> 1));
                if($res)
                {

                    $response['result'] = 'success';
                    $json = json_encode($response);
                    echo $json;

                }
                else{

                    echo 2; exit;
                }

            }
        }

        else{
                $details = $this->admin_model->hsimage_details($id);

                if($details[0]['hs_id']!=NULL):
                    $data['img'] = $details[0];
                    $this->load->view('admin/header');
                    $this->load->view('admin/sidebar');
                    $this->load->view('home/update_image',$data);
                    $this->load->view('admin/footer');
                else:
                    redirect(base_url());
                endif;  
        }

    }

        public function update_mobileimg($id)
    {
        if($this->input->post('isAjax')==1)
        {
            $post = $this->input->post();
           // pre($_FILES);exit;

            $config['upload_path']          = './upload/homeslider/';
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
                    $updateImg['hs_mobimg'] = $img_data['upload_data']['file_name'];
            }

            $res = $this->db->update('homeslider',$updateImg,array('hs_id' => $id,'hs_status'=> 1));
            if($res)
            {
                echo 1; exit;
            }
            else{

                echo 2; exit;
            }
        }

        else{
                $details = $this->admin_model->hsimage_details($id);
                if($details[0]['hs_id']!=NULL):
                    $data['img'] = $details[0];
                    $this->load->view('admin/header');
                    $this->load->view('admin/sidebar');
                    $this->load->view('home/update_mobileimg',$data);
                    $this->load->view('admin/footer');
                else:
                    redirect(base_url());
                endif;  
        }
    }


}