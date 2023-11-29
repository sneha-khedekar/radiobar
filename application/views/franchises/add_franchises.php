<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url().'franchise';?>">Franchise</a></li>
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
                     $attributes = array('class' => 'form', 'id' => 'franchise_form');
                     echo form_open('', $attributes);
                  ?>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Title</label>
                                        <input type="text" class="form-control" name='ftitle'>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">franchise Date</label>
                                        <input type="date" class="form-control" name='fdate'>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">franchise Url</label>
                                        <input type="text" class="form-control" name='furl'>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Franchise Published By</label>
                                        <input type="text" class="form-control" name='fvenue'>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Headline</label>
                                        <textarea rows="5" class="form-control" name="fheading"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Short Description</label>

                                        <textarea cols="80"  class="form-control"rows="10" name="fdescription1" data-sample-short></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Description</label>
                                        <textarea cols="80" rows="10"  class="form-control" name="fdescription2" data-sample-short></textarea>
                                    </div>
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