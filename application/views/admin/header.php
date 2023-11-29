<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>RadioBar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>
    <link rel="stylesheet" href="<?php echo base_url().'app-assets/font/iconsmind/css/iconsminds.css'?>" />
    <link rel="stylesheet" href="<?php echo base_url().'app-assets/font/simple-line-icons/css/simple-line-icons.css'?>" />
    <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/vendor/bootstrap.min.css'?>" />
    <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/vendor/bootstrap-float-label.min.css'?>" />
    <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/main.css'?>" />
    <?php if($this->session->userdata('userid')!=''):?>
        <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/vendor/fullcalendar.min.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/vendor/dataTables.bootstrap4.min.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/vendor/datatables.responsive.bootstrap4.min.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/vendor/select2.min.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/vendor/perfect-scrollbar.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/vendor/owl.carousel.min.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/vendor/bootstrap-stars.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/vendor/nouislider.min.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/vendor/quill.snow.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/vendor/quill.bubble.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/vendor/component-custom-switch.min.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'app-assets/css/vendor/bootstrap-datepicker3.min.css'?>" />
    

    <?php endif;?>
</head>
