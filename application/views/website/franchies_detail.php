
    <div class="main" data-bs-spy="scroll" data-bs-target="#navContentmenu" data-bs-root-margin="0px 0px -50%" data-bs-smooth-scroll="true">


        <!--Blog-content Section ======================-->
        <section class="blog-content-section py-50 py-lg-80 py-xxl-100">
            <div class="container">
                <div class="row align-items-start position-relative">

                    <div class="col-12">
                        <div class="blog-content-image my-40 my-lg-50 position-relative overflow-hidden">
                            <picture>
                                <source media="(max-width:575px)" srcset="<?php echo base_url().'/upload/franchiseimg/'.$franchise['f_image']?>">
                                <img src="<?php echo base_url().'/upload/franchiseimg/'.$franchise['f_image']?>" class="img-fluid" alt="img">
                            </picture>
                        </div>
                        <!-- blog-content-image -->
                    </div>


                


                    <div class="col-lg-12">

                        <div class="blog-inner-content position-relative pt-40 pt-lg-0 mb-30 mb-lg-50">
                           
                            <!-- <h2 class="blog-heading display-4 pt-4 pt-lg-30 pb-30 pb-lg-60 fw-extra-bold custom-jakarta mb-0"><?php echo $franchise['f_comment'];?></h2> -->
                            <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-20 gap-lg-4">
                                <div class="blog-author-details d-flex align-items-center gap-10">
                                   
                                    <div>
                                        <p class="fw-medium mb-1">Venue</p>
                                        <h6 class="mb-0 fw-bold"><?php echo $franchise['f_venue'];?></h6>
                                    </div>
                                    
                                    
                                </div>
                                <div class="blog-author-info d-flex gap-20 gap-lg-30">
                                    <div>
                                        <p class="fw-medium mb-1">Published</p>
                                        <h6 class="mb-0 fw-bold"><?php echo date('d  M  Y',strtotime($franchise['f_date']));?></h6>
                                    </div>
                                   
                                </div>
                             
                            </div>
                        </div>
                        <!-- blog-inner-content -->


                        <div class="blog-inner-content">
                            <b class="blog-inner-text"><?php echo htmlspecialchars_decode($franchise['f_shortdesc']);?></b>


                            <p class="blog-inner-text"><?php echo htmlspecialchars_decode($franchise['f_description']);?></p>

                           

                           
                        </div>
                        <!-- blog-inner-content -->

                     
                     
                     
                    </div>
                </div>

            </div>
        </section>
        <!--Blog-content Section ======================-->


     
    </div>
