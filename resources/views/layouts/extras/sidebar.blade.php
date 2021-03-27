<div class="sidebar-wrapper sidebar-theme">
            
    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            {{-- <li class="menu">
                <a href="#dashboard" data-active="true" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Municipalities</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                    <li class="active">
                        <a href="index.html"> Dashboard </a>
                    </li>
                  
                </ul>
            </li> --}}
            <li class="menu">
                <a href="{{ route('home') }}" {{ request()->routeIs('home') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i data-feather="grid"></i>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
               <!-- Admin -->
            @if(auth()->user()->user_type == 1)
            <li class="menu">
                <a href="{{ route('admin.account') }}" {{ request()->routeIs('admin.account') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                        <span>Moderate</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                        <a href="{{ route('admin.account') }}" {{ request()->routeIs('admin.account') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle collapsed">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                <span>Equipments</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="submenu list-unstyled collapse show" id="elements" data-parent="#accordionExample" style=""> 
                            <li>
                                <a href="element_alerts.html"> Alerts </a>
                            </li>
                           
                        </ul>
                    </li>
            <li class="menu">
                <a href="{{ route('admin.users') }}" {{ request()->routeIs('admin.users') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Manage Account</span>
                    </div>
                </a>
            </li>
            
               <!-- Supervisor -->
            @elseif(auth()->user()->user_type == 2)
            <li class="menu">
                <a href="{{ route('supervisor.stafflist') }}" {{ request()->routeIs('supervisor.stafflist') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span>Assign Service Request</span>
                    </div>
                </a>
            </li>
             <li class="menu">
                <a href="{{ route('supervisor.notify') }}" {{ request()->routeIs('supervisor.notify') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span>Ticket Update</span>
                    </div>
                </a>
            </li>
             <li class="menu">
                        <a href="{{ route('admin.account') }}" {{ request()->routeIs('admin.account') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle collapsed">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                <span>Reports</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="submenu list-unstyled collapse show" id="elements" data-parent="#accordionExample" style=""> 
                            <li>
                                <a href="element_alerts.html"> Assets Depreciation </a>
                            </li>
                           
                        </ul>
                    </li>
                <!-- Maintenance Staff -->
            @elseif(auth()->user()->user_type == 3)
            <li class="menu">
                <a href="{{ route('maintenancestaff.pending') }}" {{ request()->routeIs('maintenancestaff.pending') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                        <span>Pending SR</span>
                    </div>
                </a>
            </li>
             <li class="menu">
                <a href="{{ route('maintenancestaff.completed') }}" {{ request()->routeIs('maintenancestaff.completed') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span>Completed SR</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{ route('maintenancestaff.procurement') }}" {{ request()->routeIs('maintenancestaff.procurement') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        <span>Procurement Requests</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{ route('maintenancestaff.inventory') }}" {{ request()->routeIs('maintenancestaff.inventory') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-navigation"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                        <span>View Equipment Inv</span>
                    </div>
                </a>
            </li> 
              <!--  Staff -->
            @elseif(auth()->user()->user_type == 4)
            <li class="menu">
                <a href="{{ route('staff.servicelist') }}" {{ request()->routeIs('staff.servicelist') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span>Create SR</span>
                    </div>
                </a>
            </li>
             <li class="menu">
                <a href="{{ route('staff.equipment') }}" {{ request()->routeIs('staff.equipment') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <span>Equipments</span>
                    </div>
                </a>
            </li>
            <!-- Supply Officer -->
            @elseif(auth()->user()->user_type == 5)
            <li class="menu">
                <a href="{{ route('supplyofficer.equipment') }}" {{ request()->routeIs('supplyofficer.equipment') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                        <span>View Equipments</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{ route('supplyofficer.procurement') }}" {{ request()->routeIs('supplyofficer.procurement') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <span>Procurements</span>
                    </div>
                </a>
            </li>
            
            
             <li class="menu">
                        <a href="{{ route('supplyofficer.reports') }}" {{ request()->routeIs('supplyofficer.reports') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle collapsed">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                <span>Reports</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="submenu list-unstyled collapse show" id="elements" data-parent="#accordionExample" style=""> 
                            <li>
                                <a href="element_alerts.html"> Assets Depreciation </a>
                            </li>
                           
                        </ul>
                    </li>
                      <!-- Supplier -->
                @elseif(auth()->user()->user_type == 6)
                 <li class="menu">
                <a href="{{ route('supplier.servicerequest') }}" {{ request()->routeIs('supplier.servicerequest') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-navigation"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                        <span>View Service Request</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{ route('supplier.procurement') }}" {{ request()->routeIs('supplier.procurement') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        <span>View Procurement Request</span>
                    </div>
                </a>
            </li>
             {{-- <li class="menu">
                <a href="{{ route('supplyofficer.equipment') }}" {{ request()->routeIs('supplyofficer.equipment') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        <span>Update Procurement Request</span>
                    </div>
                </a>
            </li> --}}
        
             {{-- <li class="menu">
                <a href="{{ route('supplyofficer.equipment') }}" {{ request()->routeIs('supplyofficer.equipment') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        <span>Update Service Request</span>
                    </div>
                </a>
            </li> --}}
                @endif
                <li class="menu">
                    <a href="{{ route('myprofile') }}" {{ request()->routeIs('myprofile') ? 'data-active=true' : '' }} aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="user"></i>
                            <span>My Profile</span>
                        </div>
                    </a>
                </li>
            {{-- <li class="menu">
                <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>Barangay</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#accordionExample">
                    <li>
                        <a href="apps_chat.html"> Chat </a>
                    </li>
                    <li>
                        <a href="apps_mailbox.html"> Mailbox  </a>
                    </li>
                    <li>
                        <a href="apps_todoList.html"> Todo List </a>
                    </li>                            
                    <li>
                        <a href="apps_notes.html"> Notes </a>
                    </li>
                    <li>
                        <a href="apps_scrumboard.html">Scrumboard</a>
                    </li>
                    <li>
                        <a href="apps_contacts.html"> Contacts </a>
                    </li>
                    <li>
                        <a href="apps_invoice.html"> Invoice List </a>
                    </li>
                    <li>
                        <a href="apps_calendar.html"> Calendar </a>
                    </li>
                </ul>
            </li> --}}
        
           <!-- end UL class -->
            
        </ul>
        <!-- <div class="shadow-bottom"></div> -->
        
    </nav>

</div>