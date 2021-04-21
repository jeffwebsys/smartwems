<div class="sidebar-wrapper sidebar-theme">
            
    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            
            <li class="menu">
                <a href="<?php echo e(route('home')); ?>" <?php echo e(request()->routeIs('home') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="grid"></i>
                        <span style="font-size: 12px;">Dashboard</span>
                    </div>
                </a>
            </li>
               <!-- Admin -->
            <?php if(auth()->user()->user_type == 1): ?>
            <li class="menu">
                <a href="<?php echo e(route('admin.equipment')); ?>" <?php echo e(request()->routeIs('admin.equipment') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                        <span style="font-size: 12px;">Equipments</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="<?php echo e(route('admin.users')); ?>" <?php echo e(request()->routeIs('admin.users') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span style="font-size: 12px;">Manage Account</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="<?php echo e(route('admin.settings')); ?>" <?php echo e(request()->routeIs('admin.settings') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
                        <span style="font-size: 12px;">Settings</span>
                    </div>
                </a>
            </li>
            
               <!-- Supervisor -->
            <?php elseif(auth()->user()->user_type == 2): ?>
            <li class="menu">
                <a href="<?php echo e(route('supervisor.stafflist')); ?>" <?php echo e(request()->routeIs('supervisor.stafflist') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span style="font-size: 12px;">Assign Service Request</span>
                    </div>
                </a>
            </li>
             <li class="menu">
                <a href="<?php echo e(route('supervisor.notify')); ?>" <?php echo e(request()->routeIs('supervisor.notify') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        <span style="font-size: 12px;">Ticket Update</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="<?php echo e(route('supervisor.assets')); ?>" <?php echo e(request()->routeIs('supervisor.assets') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                        <span style="font-size: 12px;">Asset Reports</span>
                    </div>
                </a>
            </li>
                <!-- Maintenance Staff -->
            <?php elseif(auth()->user()->user_type == 3): ?>
            <li class="menu">
                <a href="<?php echo e(route('maintenancestaff.pending')); ?>" <?php echo e(request()->routeIs('maintenancestaff.pending') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                        <span style="font-size: 12px;">Service Request</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="<?php echo e(route('maintenancestaff.procurement')); ?>" <?php echo e(request()->routeIs('maintenancestaff.procurement') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        <span style="font-size: 12px;">Procurements</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="<?php echo e(route('maintenancestaff.inventory')); ?>" <?php echo e(request()->routeIs('maintenancestaff.inventory') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-navigation"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                        <span style="font-size: 12px;">Equipments</span>
                    </div>
                </a>
            </li> 
              <!--  Staff -->
            <?php elseif(auth()->user()->user_type == 4): ?>
            <li class="menu">
                <a href="<?php echo e(route('staff.servicelist')); ?>" <?php echo e(request()->routeIs('staff.servicelist') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span style="font-size: 12px;">Create SR</span>
                    </div>
                </a>
            </li>
             <li class="menu">
                <a href="<?php echo e(route('staff.equipment')); ?>" <?php echo e(request()->routeIs('staff.equipment') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <span style="font-size: 12px;">Equipments</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="<?php echo e(route('staff.track')); ?>" <?php echo e(request()->routeIs('staff.track') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        <span style="font-size: 12px;">Track Tickets</span>
                    </div>
                </a>
            </li>
            <!-- Supply Officer -->
            <?php elseif(auth()->user()->user_type == 5): ?>
            <li class="menu">
                <a href="<?php echo e(route('supplyofficer.equipment')); ?>" <?php echo e(request()->routeIs('supplyofficer.equipment') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                        <span style="font-size: 12px;">View Equipments</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="<?php echo e(route('supplyofficer.procurement')); ?>" <?php echo e(request()->routeIs('supplyofficer.procurement') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <span style="font-size: 12px;">Procurements</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="<?php echo e(route('supplyofficer.assets')); ?>" <?php echo e(request()->routeIs('supplyofficer.assets') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                        <span style="font-size: 12px;">Asset Reports</span>
                    </div>
                </a>
            </li>
            
           
                      <!-- Supplier -->
                <?php elseif(auth()->user()->user_type == 6): ?>
                 
            <li class="menu">
                <a href="<?php echo e(route('supplier.procurement')); ?>" <?php echo e(request()->routeIs('supplier.procurement') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <span style="font-size: 12px;">Procurements</span>
                    </div>
                </a>
            </li>
             
        
             
                <?php endif; ?>
                <li class="menu">
                    <a href="<?php echo e(route('myprofile')); ?>" <?php echo e(request()->routeIs('myprofile') ? 'data-active=true' : ''); ?> aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="user"></i>
                            <span style="font-size: 12px;">My Profile</span>
                        </div>
                    </a>
                </li>
            
        
           <!-- end UL class -->
            
        </ul>
        <!-- <div class="shadow-bottom"></div> -->
        
    </nav>

</div><?php /**PATH D:\xampp\htdocs\capstone2\resources\views/layouts/extras/sidebar.blade.php ENDPATH**/ ?>