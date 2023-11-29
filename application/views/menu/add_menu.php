<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard';?>">Dashboard</a>
                        </li>
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
                     $attributes = array('class' => 'form', 'id' => 'menu_form');
                     echo form_open('', $attributes);
                  ?>
                        <div class="form-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Menu Name</label>
                                        <input type="text" class="form-control" name='mname'>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Menu Description</label>
                                        <input type="text" class="form-control" name='mdesc'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyinput1">Status</label>
                                        <select class="form-control select-single" name="mstatus">
                                            <option value="1" selected>Active</option>
                                            <option value="0">De-active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="form-actions">

                            <button type="submit" id="btn_menu" class="btn btn-primary">
                                Save
                            </button>
                            <a href="<?php echo base_url().'menu/menu'; ?>" class="btn btn-outline-danger">
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