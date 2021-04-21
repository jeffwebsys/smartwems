<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="<?php echo e(route('home')); ?>">
                    <img src="<?php echo e(asset('assets/img/90x90.jpg')); ?>" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <?php
                 if(auth()->user()->user_type == 1):
                 $role =  'Admin';
                elseif(auth()->user()->user_type == 2):
                 $role =  'Supervisor';
                elseif(auth()->user()->user_type == 3):
                 $role =  'Maintenance Staff';
                elseif(auth()->user()->user_type == 4):
                 $role =  'Staff';
                elseif(auth()->user()->user_type == 5):
                 $role =  'Supply Officer';
                elseif(auth()->user()->user_type == 6):
                 $role =  'Supplier';
                 else: 
                $role = 'Not Logged In';
                endif;
                ?>

                
                <a href="<?php echo e(route('home')); ?>" class="nav-link">Smart Equipment | <?php echo e($role); ?> </a>
            </li>
        </ul>
       
        <ul class="navbar-item flex-row ml-md-auto">
            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i data-feather="user"></i><span class="icon-name"> <?php echo e(auth()->user()->name); ?></span> 
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        <div class="dropdown-item">
                            <a class="" href="<?php echo e(route('myprofile')); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                        </div>
                      
                       
                        <div class="dropdown-item">
                            <a class="" href="<?php echo e(route('logout')); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">
                    <div class="page-title">
                        <h3><?php echo $__env->yieldContent('title'); ?></h3>
                    </div>
                </div>
            </li>
        </ul>
       
    </header>
</div><?php /**PATH D:\xampp\htdocs\capstone2\resources\views/layouts/extras/navbar.blade.php ENDPATH**/ ?>