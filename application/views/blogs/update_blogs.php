<main>
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
               <ol class="breadcrumb pt-0">
                  <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="<?php echo base_url().'blogs';?>">Blogs</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Update Blog</li>
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
                     $attributes = array('class' => 'form', 'id' => 'blogs_form');
                     echo form_open('', $attributes);
                  ?>
                     <div class="form-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Title</label>
                                   <input type="text" class="form-control"name ='title' value="<?php echo $val['b_title'];?>">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Blog Date</label>
                                   <input type="date" class="form-control"name ='blogs_date' value="<?php echo $val['b_blog_date'];?>">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Blog Url</label>
                                   <input type="text" class="form-control"name ='burl' value="<?php echo $val['b_url'];?>">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Blog Published By</label>
                                 <input type="text" class="form-control"name ='venue' value="<?php echo $val['b_venue'];?>">

                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Headline</label>
                                 <textarea rows="5" class="form-control" name="comment"><?php echo $val['b_comment'];?></textarea>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Short Description</label>
                                 <textarea cols="80" id="editor1"  rows="10" data-sample-short><?php echo htmlspecialchars_decode($val['b_shortdesc']);?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Description</label>
                                 <textarea cols="80" id="editor2"  rows="10" data-sample-short><?php echo htmlspecialchars_decode($val['b_description']);?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                              <label for="companyinput1" >Current Time</label>
                                   <input type="time" class="form-control"name ='time' value="<?php echo $val['b_current_time'];?>">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                           <label for="companyinput1" >Meta Tag Title</label>
                                   <input type="text" class="form-control"name ='meta_tag_title' value="<?php echo $val['b_meta_tag_title'];?>">
                              </div>
                           </div>
                        </div> 

                         <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                     <label for="companyinput1" >Meta Tag Description</label>
                                   <input type="text" class="form-control"name ='meta_tag_description' value="<?php echo $val['b_meta_tag_description'];?>">
                              </div>
                           </div>
                        </div> 

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Meta Tag Keyword</label>
                                 <input type="text" class="form-control"name ='meta_tag_keyword' value="<?php echo $val['b_meta_tag_keyword'];?>">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="companyinput4">Status</label>
                                  <select class="form-control" name='status'>
                                      <option value="1" <?php if ($val['b_status']==1): ?>selected
                                          <?php endif ?>>Activate</option>
                                      <option value="0" <?php if ($val['b_status']==0): ?>selected
                                          <?php endif ?>>De-Activate</option>
                                  </select>
                              </div>
                          </div>
                        </div>
                     </div>
                               
                     <div class="form-actions">
                        
                        <button type="submit" id="btn_blogs" class="btn btn-primary">
                         Save
                        </button>
                        <a href="<?php echo base_url().'blogs'; ?>" class="btn btn-outline-danger">
                        Back
                        </a>
                     </div>

                     </div>
                     
                  <?php echo form_close(); ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>


<script type="text/javascript">
   CKEDITOR.replace('editor1',{
      language:'en',
      removeButtons:'PasteFromWord'
   });
    CKEDITOR.replace('editor2',{
      language:'en',
      removeButtons:'PasteFromWord'
   });
</script>
