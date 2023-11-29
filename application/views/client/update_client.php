<main>
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
               <ol class="breadcrumb pt-0">
                  <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="<?php echo base_url().'client/client';?>">client</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add</li>
               </ol>
            </nav>
            <div class="separator mb-5"></div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card mb-4">
               <div class="card-body">
                  <?php 
                      $attributes = array('class'=> 'form','id'=>'client_form','enctype'=>'multipart/form-data');
                      echo form_open('',$attributes);
                  ?>
                     <div class="form-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Name</label>
                                  <input type="text" class="form-control" name="name" value="<?php echo $c['c_name'];?>">
                              </div>
                           </div>
                        </div> 
                         <input type="hidden" class="form-control" name="isAjax" value="1">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Image</label>
                                 <!-- <input type="file" class="form-control" name="image" value="<?php echo $ao['c_img'];?>"> -->
                                 <input type="file"  name ='image'>
                                 
                                  <a href="<?php echo base_url().'upload/clientimg/'.$c['c_img'];?>" target = "_blank">
                               <img src="<?php echo base_url().'upload/clientimg/'.$c['c_img'];?>" width = "50px" height = "50">
                                </a>


                              </div>
                           </div>
                         
                        </div>
                       
                       

                     </div>
                     
                     <div class="form-actions">                        
                        <button type="submit" id="btn_client" class="btn btn-primary">
                         Save
                        </button>
                        <a href="<?php echo base_url().'client/client'; ?>" class="btn btn-outline-danger">
                        Back
                        </a>
                     </div>
                  <?php echo form_close(); ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>