<main>
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
               <ol class="breadcrumb pt-0">
                  <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="<?php echo base_url().'events/events';?>">Events</a></li>
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
                     $attributes = array('class' => 'form', 'id' => 'events_form');
                     echo form_open('', $attributes);
                  ?>
                    <div class="form-body">
                      <div class="row">
                       <div class="col-md-12">
                          <div class="form-group">
                             <label for="companyinput1" >Event Day</label>
                             <select class="form-control select-single" name="type">
                                <option value="day1" selected>Day 1</option>
                                <option value="day2">Day 2</option>
                                <option value="day3" >Day 3</option>
                              
                             </select>
                          </div>
                       </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                             <label for="companyinput1" >Event Name</label>
                               <input type="text" class="form-control"name ='title'>
                          </div>
                        </div>
                      </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Events Date</label>
                                   <input type="date" class="form-control"name ='event_date'>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Events Url</label>
                                   <input type="text" class="form-control"name ='wurl'>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="companyinput1" >Description</label>
                                <input type="text" class="form-control" name="shortdesc">

                              </div>
                           </div>
                        </div>


                      

                        

                        <div class="row">
                         <div class="col-md-12">
                            <div class="form-group">
                            <label for="companyinput1" >Event Time</label>
                                 <input type="time" class="form-control"name ='time'>
                            </div>
                         </div>
                        </div> 

                        

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="companyinput1" >Status</label>
                                 <select class="form-control select-single" name="status">
                                    <option value="1" selected>Active</option>
                                    <option value="0">De-active</option>
                                 </select>
                              </div>
                            </div>
                        </div>
                      
                         
                        </div>

                      <div class="form-actions">
                        
                        <button type="submit" id="btn_events" class="btn btn-primary">
                         Save
                        </button>
                        <a href="<?php echo base_url().'events/events'; ?>" class="btn btn-outline-danger">
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