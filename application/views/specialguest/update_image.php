<main>
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
               <ol class="breadcrumb pt-0">
                  <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="<?php echo base_url().'homeslider';?>">Home Banner Image</a></li>
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
                      $attributes = array('class'=> 'form','id'=>'specialguest_form','enctype'=>'multipart/form-data');
                      echo form_open('',$attributes);
                  ?>
                     <div class="form-body">
                        
                         <input type="hidden" class="form-control" name="isAjax" value="1">

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Image</label>
                                 <input type="file" class="form-control" name="image">
                                 <a href="<?php echo base_url().'upload/specialguest/'.$img['s_img'];?>" target='_blank'><?php echo $img['s_img']?></a>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Title</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo $img['s_title'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Short Description</label>
                                        <input type="text" class="form-control"name="shortdesc" value="<?php echo $img['s_desc'];?>">
                                     
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">First Title</label>
                                        <input type="text" class="form-control" name="ftitle"  value="<?php echo $img['s_ftitle'];?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">First Short Description</label>
                                        <input type="text" class="form-control"name="first_desc"  value="<?php echo $img['s_fdesc'];?>">
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Second Title</label>
                                        <input type="text" class="form-control"  name="second_title"  value="<?php echo $img['s_stitle'];?>">
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Second Short Description</label>
                                        <input type="text" class="form-control" name="second_desc"  value="<?php echo $img['s_sdesc'];?>">
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Link</label>
                                        <input type="text" class="form-control" name="link"  value="<?php echo $img['s_link'];?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Youtube Link</label>
                                        <input type="text" class="form-control" name="ylink"  value="<?php echo $img['s_ylink'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option label="&nbsp;">&nbsp;</option>
                                    <option value="1" selected="">Active</option>
                                    <option value="0">Delete</option>
                                </select>
                            </div>
                    <div class="form-actions">                        
                        <button type="submit" id="btn_specialguest" class="btn btn-primary">
                         Save
                        </button>
                        <a href="<?php echo base_url().'specialguest'; ?>" class="btn btn-outline-danger">
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