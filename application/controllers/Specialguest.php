<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Specialguest extends CI_Controller {
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
                        $data['title'] = 'Special Guest Spotlight - image';
                        $condition = array('s_status'=>1);
                        $data['image'] = $this->admin_model->getWhere('specialguest',$condition);
                        $this->load->view('admin/header',$data);
                        $this->load->view('admin/sidebar');
                        $this->load->view('specialguest/image',$data);
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
                       
                         $this->form_validation->set_rules('status', 'Status', 'xss_clean|required');
                         $this->form_validation->set_rules('title', 'Link', 'xss_clean|required');
                         $this->form_validation->set_rules('shortdesc', 'Short Description', 'xss_clean|required');
                         $this->form_validation->set_rules('ftitle', 'First Title', 'xss_clean|required');
                         $this->form_validation->set_rules('first_desc', 'First Description', 'xss_clean|required');
                         $this->form_validation->set_rules('second_title', 'Second Title', 'xss_clean|required');
                         $this->form_validation->set_rules('second_desc', 'Second Description', 'xss_clean|required');
                         $this->form_validation->set_rules('link', 'Link', 'xss_clean|required');
                         $this->form_validation->set_rules('ylink', 'Youtube Link', 'xss_clean|required');
                         $this->form_validation->set_rules('status', 'Status', 'xss_clean|required');

                
                if ($this->form_validation->run() == FALSE)
                {
                    echo json_encode($this->form_validation->error_array());
                    exit;
                }
                else
                {
                    $post = $this->input->post();
                    $insertImg = array(
                                        's_status' =>$post['status'],
                                        's_title' =>$post['title'],
                                        's_desc' =>$post['shortdesc'],
                                        's_ftitle' =>$post['ftitle'],
                                        's_fdesc' =>$post['first_desc'],
                                        's_stitle' =>$post['second_title'],
                                        's_sdesc' =>$post['second_desc'],
                                        's_link' =>$post['link'],
                                        's_ylink' =>$post['ylink']);
                                   

                    $config['upload_path']          = './upload/specialguest/';
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
                            $insertImg['s_img'] = $img_data['upload_data']['file_name'];
                    }
                    $res = $this->db->insert('specialguest',$insertImg);
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

                                    $data['title'] = 'specialguest';
                                    $this->load->view('admin/header',$data);
                                    $this->load->view('admin/sidebar');
                                    $this->load->view('specialguest/add_image',$data);
                                    $this->load->view('admin/footer');

            }

        }   
    }


public function update($id)
    {
        if($this->input->post('isAjax')==1)
        {
                $this->form_validation->set_rules('status', 'Status', 'xss_clean|required');
                         $this->form_validation->set_rules('title', 'Link', 'xss_clean|required');
                         $this->form_validation->set_rules('shortdesc', 'Short Description', 'xss_clean|required');
                         $this->form_validation->set_rules('ftitle', 'First Title', 'xss_clean|required');
                         $this->form_validation->set_rules('first_desc', 'First Description', 'xss_clean|required');
                         $this->form_validation->set_rules('second_title', 'Second Title', 'xss_clean|required');
                         $this->form_validation->set_rules('second_desc', 'Second Description', 'xss_clean|required');
                         $this->form_validation->set_rules('link', 'Link', 'xss_clean|required');
                         $this->form_validation->set_rules('ylink', 'Youtube Link', 'xss_clean|required');
                  
               

            
            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode($this->form_validation->error_array());
                exit;
            }
            else
            {
                $post = $this->input->post();
                $updateImg = array();
              
                    $updateImg = array( 
                                        's_status' =>$post['status'],
                                        's_title' =>$post['title'],
                                        's_desc' =>$post['shortdesc'],
                                        's_ftitle' =>$post['ftitle'],
                                        's_fdesc' =>$post['first_desc'],
                                        's_stitle' =>$post['second_title'],
                                        's_sdesc' =>$post['second_desc'],
                                        's_link' =>$post['link'],
                                        's_ylink' =>$post['ylink']);
                                        
               
                if($_FILES['image']['name']!='')
                {
                
                
                    $config['upload_path']          = './upload/specialguest/';
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
                            $updateImg['s_img'] = $img_data['upload_data']['file_name'];
                    }
                }

                $res = $this->db->update('specialguest',$updateImg,array('s_id' => $id,'s_status'=> 1));
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
                $details = $this->admin_model->simage_details($id);

                if($details[0]['s_id']!=NULL):
                    $data['img'] = $details[0];
                    $this->load->view('admin/header');
                    $this->load->view('admin/sidebar');
                    $this->load->view('specialguest/update_image',$data);
                    $this->load->view('admin/footer');
                else:
                    redirect(base_url());
                endif;  
        }

    }

//         public function update_mobileimg($id)
//     {
//         if($this->input->post('isAjax')==1)
//         {
//             $post = $this->input->post();
//            // pre($_FILES);exit;

//             $config['upload_path']          = './upload/homeslider/';
//             $config['allowed_types']        = 'jpeg|jpg|png|JPEG|JPG|PNG';
//             $config['max_size'] = 1000;
//             $this->load->library('upload', $config);
            
//             $this->upload->initialize($config);
//             $this->upload->overwrite = true;

            

//             if ( ! $this->upload->do_upload('image'))
//             {

//                     $error = array('error' => $this->upload->display_errors());
//                     echo json_encode($error);
//                     exit;
//             }
//             else
//             {
//                     $img_data = array('upload_data' => $this->upload->data());
//                     $updateImg['hs_mobimg'] = $img_data['upload_data']['file_name'];
//             }

//             $res = $this->db->update('homeslider',$updateImg,array('hs_id' => $id,'hs_status'=> 1));
//             if($res)
//             {
//                 echo 1; exit;
//             }
//             else{

//                 echo 2; exit;
//             }
//         }

//         else{
//                 $details = $this->admin_model->hsimage_details($id);
//                 if($details[0]['hs_id']!=NULL):
//                     $data['img'] = $details[0];
//                     $this->load->view('admin/header');
//                     $this->load->view('admin/sidebar');
//                     $this->load->view('home/update_mobileimg',$data);
//                     $this->load->view('admin/footer');
//                 else:
//                     redirect(base_url());
//                 endif;  
//         }
//     }


}