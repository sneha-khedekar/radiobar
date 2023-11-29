
<body class="home-1">

<div class="preloader">
    <dotlottie-player 
        src="https://lottie.host/d851f1dc-6ef5-40be-8ca8-bbffcd018276/wutdxEizj0.json" 
        background="#04000A" 
        speed="1" 
        style="width: 100%; height: 100%" 
        direction="1" 
        mode="normal" 
        loop 
        autoplay>
    </dotlottie-player>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
</div>

<!-- Header ======================-->	
<header class="header-section header-2 ordered-list-header sticky-navbar">
    <div class="container">
        <nav class="navbar navbar-expand-xl">
            <div class="d-flex w-100 justify-content-between align-items-center" style="height:120px">
                <a class="navbar-brand" href="index.html" aria-label="nav-brands">
                    <img src="<?php echo base_url().'web-assets/images/global/radiobar logo (1).png'?>" class="logo-light" alt="logo">
                    <img src="<?php echo base_url().'web-assets/images/global/radiobar logo.png'?>" class="logo-dark" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navContentmenu" aria-controls="navContentmenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>		
                </button>

                <div class="d-none d-xl-block" style="font-size:20px">
                    <div class="d-flex gap-40 align-items-center">
                        <ul class="list-unstyled d-flex gap-40 navbar-nav mb-2 me-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-end gap-0 flex-column text-uppercase" aria-current="page" href="<?php echo base_url()?>" aria-label="nav-links">
                                   
                                    <span class="fw-semibold">Home</span>
                                </a>
                            </li>									

                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-end gap-0 flex-column text-uppercase" href="<?php echo base_url().'aboutus'?>" aria-label="nav-links">
                                    <!-- <span class="fw-bold">03</span> -->
                                    <span class="fw-semibold">About</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  d-flex align-items-end gap-0 flex-column text-uppercase" href="<?php echo base_url().'franchises'?>" aria-label="nav-links">
                                    <!-- <span class="fw-bold">03</span> -->
                                    <span class="fw-semibold">Explore Our Locations</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  d-flex align-items-end gap-0 flex-column text-uppercase" href="<?php echo base_url().'contactus'?>" aria-label="nav-links">
                                    <!-- <span class="fw-bold">03</span> -->
                                    <span class="fw-semibold">Contact Us</span>
                                </a>
                            </li>			
                            <!-- <li class="nav-item">
                                <a class="nav-link d-flex align-items-end gap-0 flex-column text-uppercase" href="#line-up" aria-label="nav-links">
                                    <span class="fw-bold">03</span>
                                    <span class="fw-semibold">Spekers</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-end gap-0 flex-column text-uppercase" href="#schedule" aria-label="nav-links">
                                    <span class="fw-bold">04</span>
                                    <span class="fw-semibold">Events</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-end gap-0 flex-column text-uppercase" href="#sponsor" aria-label="nav-links">
                                    <span class="fw-bold">05</span>
                                    <span class="fw-semibold">Sponsors</span>
                                </a>
                            </li>			   -->
                        </ul>
                        <a href="#pricing" class="btn btn-gradient d-inline-flex align-items-center gap-2" aria-label="buttons"><span class="buttons-logo"><svg width="25" height="25"style="display:none"><use xlink:href="#buttons-logo"></use></svg></span> Buy Tickets</a>
                    </div>							
                </div>
            </div>
        </nav>
    </div>			
</header>
<!-- Header ======================-->
	<div class="offcanvas offcanvas-top" id="navContentmenu" data-bs-backdrop="static" tabindex="-1">
			<div class="offcanvas-header">
			<a class="navbar-brand" href="index.html" aria-label="nav-brands"><img src="<?php echo base_url().'web-assets/images/global/radiobar logo.png'?>" alt="logo"></a>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body d-flex justify-content-center">				
				<ul class="navbar-nav custom-navbar-nav mb-2 mb-lg-0">
					<li class="nav-item" data-bs-dismiss="offcanvas">
						<a class="nav-link active" aria-current="page" href="#" aria-label="nav-links">Home</a>
					</li>									
					<li class="nav-item dropdown offcanvas-pages-dropdown">
						<a class="nav-link dropdown-toggle" href="#" aria-label="nav-links" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="blog.html" target="_blank" aria-label="single-pages">Blog</a></li>
							<li><a class="dropdown-item" href="blog-single-1.html" target="_blank" aria-label="single-pages">Blog Single 1</a></li>
							<li><a class="dropdown-item" href="blog-single-2.html" target="_blank" aria-label="single-pages">Blog Single 2</a></li>
							<li><a class="dropdown-item" href="blog-single-3.html" target="_blank" aria-label="single-pages">Blog Single 3</a></li>
							<li><a class="dropdown-item" href="about-us.html" target="_blank" aria-label="single-pages">About Us</a></li>
							<li><a class="dropdown-item" href="contact-us.html" target="_blank" aria-label="single-pages">Contact Us</a></li>
						</ul>								
					</li>	
					<li class="nav-item" data-bs-dismiss="offcanvas">
						<a class="nav-link" href="#line-up" aria-label="nav-links">Speakers</a>
					</li>
					<li class="nav-item" data-bs-dismiss="offcanvas">
						<a class="nav-link" href="#schedule" aria-label="nav-links">Events</a>
					</li>
					<li class="nav-item" data-bs-dismiss="offcanvas">
						<a class="nav-link" href="#sponsor" aria-label="nav-links">Sponsors</a>
					</li>			  
				</ul>				
			</div>
		</div>