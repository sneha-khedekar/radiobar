<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url().'homeslider';?>">Home Slider</a></li>
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
                      $attributes = array('class'=> 'form','id'=>'homesliderimg_form','enctype'=>'multipart/form-data');
                      echo form_open('',$attributes);
                  ?>
                        <div class="form-body">

                            <input type="hidden" class="form-control" name="isAjax" value="1">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Address</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Title</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Date</label>
                                        <input type="date" class="form-control" name='date'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Start Time</label>
                                        <input type="time" class="form-control" name='stime'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">End Time</label>
                                        <input type="time" class="form-control" name='etime'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Event Name</label>
                                        <input type="text" class="form-control" name="ename">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Attending</label>
                                        <input type="text" class="form-control" name="attending">
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Counter Date</label>
                                        <input type="text" class="form-control" name="cdate">
                                    </div>
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Link</label>
                                        <input type="text" class="form-control" name="link">
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
                                <button type="submit" id="btn_homesliderimg" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="<?php echo base_url().'homeslider'; ?>" class="btn btn-outline-danger">
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