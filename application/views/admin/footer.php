    <script type="text/javascript">
        var base_url = "<?php echo base_url();?>";
    </script>
    <script src="<?php echo base_url().'app-assets/js/vendor/jquery-3.3.1.min.js'?>"></script>
    <script src="<?php echo base_url().'app-assets/js/vendor/bootstrap.bundle.min.js'?>"></script>
    <script src="<?php echo base_url().'app-assets/js/dore.script.js'?>"></script>
    <script src="<?php echo base_url().'app-assets/js/scripts.js'?>"></script>
    <script src="<?php echo base_url().'app-assets/js/common.js'?>"></script>
    <script src="<?php echo base_url().'app-assets/js/sha1.js'?>"></script>
    <script src="<?php echo base_url().'app-assets/js/admin/adminlogin.js'?>"></script>

    <?php if($this->session->userdata('userid')!=''):?>
        <script src="<?php echo base_url().'app-assets/js/vendor/Chart.bundle.min.js'?>"></script>
        <script src="<?php echo base_url().'app-assets/js/vendor/chartjs-plugin-datalabels.js'?>"></script>
        <script src="<?php echo base_url().'app-assets/js/vendor/moment.min.js'?>"></script>
        <script src="<?php echo base_url().'app-assets/js/vendor/fullcalendar.min.js'?>"></script>
        <script src="<?php echo base_url().'app-assets/js/vendor/datatables.min.js'?>"></script>
        <script src="<?php echo base_url().'app-assets/js/vendor/perfect-scrollbar.min.js'?>"></script>
        <script src="<?php echo base_url().'app-assets/js/vendor/owl.carousel.min.js'?>"></script>
        <script src="<?php echo base_url().'app-assets/js/vendor/progressbar.min.js'?>"></script>
        <script src="<?php echo base_url().'app-assets/js/vendor/jquery.barrating.min.js'?>"></script>
        <script src="<?php echo base_url().'app-assets/js/vendor/select2.full.js'?>"></script>
        <script src="<?php echo base_url().'app-assets/js/vendor/nouislider.min.js'?>"></script>
        <script src="<?php echo base_url().'app-assets/js/vendor/bootstrap-datepicker.js'?>"></script>
        <script src="<?php echo base_url().'app-assets/js/vendor/Sortable.js'?>"></script>
        <script src="<?php echo base_url().'app-assets/js/vendor/mousetrap.min.js'?>"></script>
        <script src="<?php echo base_url().'app-assets/js/admin/adminproject.js'?>"></script>   
    <?php endif;?>
   
</body>

</html>