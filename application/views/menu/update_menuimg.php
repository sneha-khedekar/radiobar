<main>
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
               <ol class="breadcrumb pt-0">
                  <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="<?php echo base_url().'events';?>">Events</a></li>
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
                      $attributes = array('class'=> 'form','id'=>'img_menuimgform','enctype'=>'multipart/form-data');
                      echo form_open('',$attributes);
                  ?>
                         <input type="hidden" class="form-control" name="isAjax" value="1">

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Image</label>
                                 <input type="file"  name="image">
                              </div>
                            </div>
                        </div>
                    <div class="form-actions">                        
                        <button type="submit" id="btn_menuimg" class="btn btn-primary">
                         Save
                        </button>
                        <a href="<?php echo base_url().'menu'; ?>" class="btn btn-outline-danger">
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