<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url().'blogs';?>">Event</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Event</li>
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
                     $attributes = array('class' => 'form', 'id' => 'franchise_form');
                     echo form_open('', $attributes);
                  ?>
                       
                       <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Title</label>
                                        <input type="text" class="form-control" name='ftitle' value="<?php echo $val['f_title'];?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Franchise Date</label>
                                        <input type="date" class="form-control" name='fdate' value="<?php echo $val['f_date'];?>" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">franchise Url</label>
                                        <input type="text" class="form-control" name='furl' value="<?php echo $val['f_url'];?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Franchise Published By</label>
                                        <input type="text" class="form-control" name='fvenue' value="<?php echo $val['f_venue'];?>">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Headline</label>
                                        <textarea rows="5" class="form-control" name="fheading"><?php echo $val['f_heading'];?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Short Description</label>

                                        <textarea cols="80" rows="10" class="form-control" name="fdescription1"><?php echo $val['f_shortdesc'];?></textarea>
                                        <!-- <textarea rows="5" class="form-control" name="description"></textarea> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Description</label>

                                        <textarea cols="80" rows="10" class="form-control"  name="fdescription2"><?php echo $val['f_description'];?></textarea>
                                        <!-- <textarea rows="5" class="form-control" name="description"></textarea> -->
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">

                        <button type="submit" id="btn_franchise" class="btn btn-primary">
                           Save
                        </button>
                        <a href="<?php echo base_url().'franchise'; ?>" class="btn btn-outline-danger">
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
CKEDITOR.replace('editor1', {
    language: 'en',
    removeButtons: 'PasteFromWord'
});
CKEDITOR.replace('editor2', {
    language: 'en',
    removeButtons: 'PasteFromWord'
});
</script>