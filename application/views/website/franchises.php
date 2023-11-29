
<div class="main"  data-bs-spy="scroll" data-bs-target="#navContentmenu" data-bs-root-margin="0px 0px -50%" data-bs-smooth-scroll="true">

<!--Banner Section ======================-->
<section class="banner-section banner-1 position-relative parallax">		
    <div class="container">
        <div class="banner-wrapper d-flex gap-20 gap-lg-40 justify-content-center align-items-lg-center flex-column">
            <h2 class="banner-heading display-3 fw-extra-bold custom-jakarta mb-0">Explore Our Locations</h2>
            <nav aria-label="breadcrumb">
                <ol class="blog-breadcrumb breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>  /
                  <li class="breadcrumb-item"> <a href="<?php echo base_url().'franchises'?>">Explore Our Locations</a></li>
                </ol>
            </nav>
        </div>
    </div>								
</section>
<!--Banner Section ======================-->


<!--Blog-content Section ======================-->
<section class="blog-content-section py-50 py-lg-80 py-xxl-100" style="background-color: black;">
    <div class="container">				
            
        <div class="blog-wrapper">	
            <div class="blog-content blog-content-2 custom-inner-bg p-4 mb-30 mb-lg-50" style="background-color: #261f3038;">									
                <div class="row justify-content-between g-5 align-items-center">
                    <div class="col-lg-7">
                        <div class="blog-image">
                            <img src="<?php echo base_url().'web-assets/images/gallery-3.jpg'?>" class="img-fluid" alt="img"> 
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="blog-left-content" style="color:white">                            
                            <h2 class="blog-link fs-4 fw-bold" style="color:rgb(142, 133, 133)"><a href="blog-single-3.html" style="color:white">Unveils Star-Studded Lineup for Epic Comeback Event! </a></h2> 
                            <p class="pt-3 pt-lg-4">Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>                            
                        </div>
                        <div class="d-flex align-items-center justify-content-between py-20 py-lg-30">
                            <div class="d-flex align-items-center gap-10">
                                <img src="<?php echo base_url().'web-assets/images/blog-author-image-6.png'?>" class="blog-author-image" alt="img">     
                                <p class="card-text fs-5 fw-semibold mb-0">Luna Echo</p>
                            </div>
                            <p class="mb-0"><span class="calendar me-10"><svg width="16" height="16"><use xlink:href="#calendar"></use></svg></span>09 Aug 2023</p>
                        </div>
                        <div>
                            <a href="blog-single-3.html" class="download-link d-flex align-items-center gap-30" aria-label="buttons">Read more</a>
                        </div>
                    </div>
                </div>
            </div>								
            <div class="row g-4">
              
                <?php
                if(is_array($franchise) && !empty($franchise))
                {
                    foreach($franchise as $val)
                    {
                    ?>
                <div class="col-lg-4">
                    <div class="blog-content blog-content-2 custom-inner-bg" style="background-color: #261f3038;">
                        <div class="row gy-4 align-items-center justify-content-between">
                            <div class="col-12">
                                <div class="blog-image">
                                    <img src="<?php echo base_url().'/upload/franchiseimg/'.$val['f_image']?>" class="img-fluid" alt="img">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="blog-left-content">
                                    <div class="d-flex align-items-center justify-content-between py-20 py-lg-30">
                                        <div class="d-flex align-items-center gap-10">
                                         
                                            <p class="card-text fs-5 fw-semibold mb-0" style="color:white"><?php echo htmlspecialchars_decode($val['f_venue']);?></p>
                                        </div>
                                        <!-- <p class="mb-0"><span class="calendar me-10"><svg width="16" height="16"><use xlink:href="#calendar"></use></svg></span>09 Aug 2023</p> -->
                                    </div>
                                    
                                    <h2 class="blog-link fs-4 fw-bold"><a class="text-decoration-none" href="<?php echo base_url().'franchise/detail/'.$val['f_url'];?>" style="color:white"><?php echo htmlspecialchars_decode($val['f_title']);?></a></h2>													
                                    <p class="py-20 mb-3 mb-lg-0" style="color:white"><?php echo htmlspecialchars_decode($val['f_shortdesc']);?></p>
                                    <div>
                                        <a href="<?php echo base_url().'franchise/detail/'.$val['f_url'];?>" class="download-link d-flex align-items-center gap-30" aria-label="buttons" >Read more</a>
                                    </div>
                                </div>
                                <!-- left-content -->
                            </div>									
                        </div>	
                    </div>
                </div>
                <?php }}?>

            
            </div>								
        </div>
        <!-- blog-content -->												
            
        <!-- <div class="blog-pagination mt-30 mt-lg-70">
            <nav aria-label="Page navigation example">
                <ul class="pagination gap-2 mb-0">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </nav>
        </div> -->
    </div>
</section>
<!--Blog-content Section ======================-->



</div>