<?php 
   $menu = $this->uri->segment(1);
   $function = $this->uri->segment(2);
   $admin_roles = explode(',',$this->session->userdata('adminRole'));
   // pre($function);exit;
?>  
<body id="app-container" class="menu-default show-spinner">
   <nav class="navbar fixed-top">
      <div class="d-flex align-items-center navbar-left">
         <a href="#" class="menu-button d-none d-md-block">
            <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
               <rect x="0.48" y="0.5" width="7" height="1" />
               <rect x="0.48" y="7.5" width="7" height="1" />
               <rect x="0.48" y="15.5" width="7" height="1" />
            </svg>
            <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
               <rect x="1.56" y="0.5" width="16" height="1" />
               <rect x="1.56" y="7.5" width="16" height="1" />
               <rect x="1.56" y="15.5" width="16" height="1" />
            </svg>
         </a>
         <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
               <rect x="0.5" y="0.5" width="25" height="1" />
               <rect x="0.5" y="7.5" width="25" height="1" />
               <rect x="0.5" y="15.5" width="25" height="1" />
            </svg>
         </a>
      </div><span class="logo d-none d-xs-block"></span> <span class="logo-mobile d-block d-xs-none"></span>
      <div class="navbar-right">
         <div class="user d-inline-block">
            <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="name"><?php echo ucfirst($this->session->userdata('adminName')); ?></span>  <span><img alt="Profile Picture" src="<?php echo base_url().'app-assets/img/profiles/1.jpg'?>"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="<?php echo base_url().'admin/changepassword';?>">Change password</a>
                <a class="dropdown-item" href="<?php echo base_url().'admin/logout';?>">Sign out</a>
            </div>
            
         </div>
      </div>
   </nav> 
   <div class="menu">
      <div class="main-menu">
         <div class="scroll">
            <ul class="list-unstyled">
               <li <?php if($function == 'dashboard'): ?> class= "active"<?php endif;?>><a href="<?php echo base_url().'admin/dashboard';?>"><i class="iconsminds-shop-4"></i> <span>Dashboard</span></a></li>

              <li><a href="#home"><i class="iconsminds-home-4"></i>Home</a>
               </li>
               <li><a href="#events"><i class="iconsminds-home-4"></i>Events</a>
               </li>
               <li><a href="#franchise"><i class="iconsminds-home-4"></i>Franchise</a>
               </li>
              
            
                
            </ul>
         </div>
      </div>
      <div class="sub-menu">
         <div class="scroll">
         <ul class="list-unstyled" data-link="home" id="home">               
               <?php if(in_array('2',$admin_roles)): ?>
                  <li>
                     <a href="<?php echo base_url().'homeslider';?>"><i class="iconsminds-shopping-bag"></i> <span class="d-inline-block">Banner</span></a>
                  </li>
               <?php endif;?>
               <?php if(in_array('2',$admin_roles)): ?>
                  <li>
                     <a href="<?php echo base_url().'specialguest';?>"><i class="iconsminds-shopping-bag"></i> <span class="d-inline-block">Specialguest</span></a>
                  </li>
               <?php endif;?>
               <?php if(in_array('2',$admin_roles)): ?>
                  <li>
                     <a href="<?php echo base_url().'client';?>"><i class="iconsminds-shopping-bag"></i> <span class="d-inline-block">Client</span></a>
                  </li>
               <?php endif;?>
              
              
             
                          
            </ul>
            <ul class="list-unstyled" data-link="events" id="events">               
               <?php if(in_array('2',$admin_roles)): ?>
                  <li>
                     <a href="<?php echo base_url().'events';?>"><i class="iconsminds-shopping-bag"></i> <span class="d-inline-block">Events</span></a>
                  </li>
               <?php endif;?>
               <?php if(in_array('2',$admin_roles)): ?>
                  <li>
                     <a href="<?php echo base_url().'events/add_events';?>"><i class="iconsminds-shopping-bag"></i> <span class="d-inline-block">Add Events</span></a>
                  </li>
               <?php endif;?>       
            </ul>

            <ul class="list-unstyled" data-link="franchise" id="franchise">               
               <?php if(in_array('2',$admin_roles)): ?>
                  <li>
                     <a href="<?php echo base_url().'franchise';?>"><i class="iconsminds-shopping-bag"></i> <span class="d-inline-block">Franchise</span></a>
                  </li>
               <?php endif;?>
               <?php if(in_array('2',$admin_roles)): ?>
                  <li>
                     <a href="<?php echo base_url().'franchise/add_franchise';?>"><i class="iconsminds-shopping-bag"></i> <span class="d-inline-block">Add Franchise</span></a>
                  </li>
               <?php endif;?>       
            </ul>

            
         </div>
      </div>
   </div>