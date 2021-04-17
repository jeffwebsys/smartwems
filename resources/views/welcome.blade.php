<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>San Jose - Smart Equipment</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ asset('landing/images/favicon.html') }}">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">

    <!-- ICONS -->
    <link rel="stylesheet" href="{{ asset('landing/css/ilmosys-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/icons/fontawesome/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/icons/icon2/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/js/vendors/swipebox/css/swipebox.min.css') }}">


    <!-- THEME / PLUGIN CSS -->
    <link rel="stylesheet" href="{{ asset('landing/js/vendors/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body id="page-top">

    <div class="body">
        <!-- HEADER -->
        <header>
            <nav class="navbar-inverse navbar-lg navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="intro.html" class="navbar-brand brand"><img src="{{ asset('landing/images/logo.png') }}" alt="logo"></a>
                    </div>

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right navbar-contact">
                            <li>
                                <a href="#"><span class="icon-call"></span> 911</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">

                            @if (Route::has('login'))
                            @auth
                            <li class="dropdown mm-menu">
                                <a class="page-scroll" href="{{ url('/home') }}">dashboard</a>
                            </li>
                           
                            @else
                            <li class="dropdown mm-menu">
                                <a class="page-scroll" href="{{ route('login') }}">Login</a>
                            </li>
                            @endauth
                            @endif


                            <li class="dropdown mm-menu">
                                <a class="page-scroll" href="#services">Services</a>
                            </li>

                            <li class="dropdown mm-menu">
                                <a class="page-scroll" href="#reviews">Reviews</a>
                            </li>

                            <li class="dropdown mm-menu">
                                <a class="page-scroll" href="#contact-info">Contact</a>
                            </li>
                           


                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- INTRO -->
        <div id="home" class="intro intro1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row center-content">
                    <div class="col-sm-10">
                        <h2>Equipment QR Scanner<br>Integration</h2>
                        <p style="font-weight: 800">Our commitment is to provide first class quality healthcare service to the underprivileged class of the city and adjacent localities. </p>
                        <div class="row">
                            <div class="col-md-10">
                                <ul class="features-list">
                                    <li>
                                        <i class="ilmosys-book"></i>
                                        <h5>Equipment Inventory Support</h5>
                                    </li>

                                    <li>
                                        <i class="ilmosys-ticket"></i>
                                        <h5>Ticket Management</h5>
                                    </li>

                                    <li>
                                        <i class="ilmosys-dashboard"></i>
                                        <h5>Detailed Analytics</h5>
                                    </li>

                                    <li>
                                        <i class="ilmosys-user"></i>
                                        <h5>User Management</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br><br>
                  
               
                    {{-- <div class="col-sm-5 col-md-7">
                        <div class="intro-form" id="join-us-form contact-form">
                            <h4>Smart QR</h4>
                            
                            <div id="join-us-results"></div>
                            
                            
                             
                            
                                      <!-- Form -->
		    <div class="form-group">
              <input type="text" name="first_name" id="first_name" class="form-control f-input input-field" placeholder="First Name" />
            </div>
            <div class="form-group">
              <input type="text" name="last_name" id="last_name" class="form-control f-input input-field" placeholder="Last Name" />
            </div>
            <div class="form-group">
              <input type="text" name="email" class="form-control f-input input-field" placeholder="Email" />
            </div>
            <div class="form-group">
              <input type="text" name="phone" maxlength="15"  class="form-control f-input input-field" placeholder="Phone" />
            </div>
            <div class="form-group">
              <input type="text" name="website" class="form-control f-input input-field" placeholder="website" />
            </div>
			<button type="submit" class="btn btn-block btn-lg btn-primary" id="submit_btn">Make an Appointment</button>
        </div>
					<div id="sendingMessage" class="statusMessage">
						<p><i class="fa fa-spin fa-cog"></i> Sending your message. Please wait...</p>
					</div>

					<div id="successMessage" class="successmessage">
						<p><span class="success-ico"></span> Thanks for sending your message! We'll get back to you shortly.</p>
					</div>
					<div id="failureMessage" class="errormessage">
						<p><span class="error-ico"></span> There was a problem sending your message. Please try again.</p>
					</div>
					<div id="incompleteMessage" class="statusMessage">
						<p><i class="fa fa-warning"></i> Please complete all the fields in the form before sending.</p>
					</div>
                            
                        </div> --}}
                      
                       
                    </div>

                </div>
            </div>
        </div>

        <div id="stats2" class="bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="stats2-info">
                            <i class="ilmosys-book"></i>
                            <p><span class="count">5500</span></p>
                            <h2>Registered Equipments</h2>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="stats2-info">
                            <i class="ilmosys-user"></i>
                            <p><span class="count">85</span></p>
                            <h2>Suppliers</h2>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="stats2-info">
                            <i class="ilmosys-ambulance"></i>
                            <p><span class="count">1</span></p>
                            <h2>Smart Health Care Facility</h2>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="stats2-info">
                           <i class="ilmosys-hospital-2"></i>
                            <p><span class="count">200</span></p>
                            <h2>Rooms</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- ABOUT -->
        <div id="features" class="container">
            <div class="about-inline text-center">
                <div class="container">
                    <p>- OLSJ -</p>
                    <h3>OLSJ Mission and Values</h3>
                </div>
            </div>


            <!-- INFO CONTENT -->
            <div class="info-content">
                <div class="container">
                    <div class="row center-content">
                        <div class="col-md-8 text-center">
                            <img src="{{ asset('landing/images/services/2.jpg') }}" class="pull-right img-responsive" alt="">
                        </div>
                        <div class="col-md-4">
                            <h3>OLSJ MISSION</h3>
                            <ul class="list">
                                <li><i class="icon-check"></i>Our commitment is to provide first class quality healthcare service to the underprivileged class of the city and adjacent localities.
</li>
                               
                            </ul>
                            <div class="space30"></div>
                            <a href="#" class="btn btn-lg btn-primary">Learn More <i class="icon-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <br> <br><br>

            <!-- INFO CONTENT -->
            <div class="info-content">
                <div class="container">
                    <div class="row center-content">
                        <div class="col-md-4">
                            <h3>OLSJ VISION</h3>
                            <ul class="list">
                                <li><i class="icon-check"></i> Ospital ng Lungsod ng San Jose will be recognized as the leading service-oriented local government hospital in the country, a paradigm in quality healthcare with state of the art facilities.
</li>
                            </ul>
                            <div class="space30"></div>
                            <a href="#" class="btn btn-lg btn-primary">Learn More <i class="icon-arrow-right"></i></a>
                        </div>
                        <div class="col-md-8 text-center">
                            <!-- YouTube -->
                            <div class="video">
                                <iframe src="https://www.youtube.com/embed/CJbG0TS2d2A?rel=0&amp;showinfo=0"  height="315" width="560"></iframe>
                            </div>
                            <!-- End YouTube -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space100"></div>

        <!-- INFO CONTENT -->
        <div class="info-content2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>OLSJ Perfect Care.</h3>
                        <div class="space10"></div>
                        <p>We communicate honestly. No hidden fees, no surprises, no upsells! Only honest work and trustworthy staff.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- SERVICES -->
        <section id="services" class="services bg-light">
            <div class="container">

                <div class="about-inline text-center">
                    <p>-CORE VALUES -</p>
                    <h3> CORE VALUES </h3>
                    <p>We're different from typical health checkup center. We're out to create magic. The goal is to WOW you with outstanding treatment.</p>
                </div>

                <div class="services-s5 row">
                    <div class="col-md-3">
                        <div class="service-content">
                            <i class="ilmosys-astronaut"></i>
                            <h4>SERVICE</h4>
                            <p>To deliver competent, dedicated and compassionate medical service to the public</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-content">
                            <i class="ilmosys-women"></i>
                            <h4>EFFICIENCY</h4>
                            <p>To adapt to the advancement in medical technology to aid in the delivery of fast and reliable medical service</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-content">
                            <i class="ilmosys-virus-2"></i>
                            <h4>FLEXIBILITY</h4>
                            <p>To work independently and in partnership with other organization and ensure the sustainability of the service and
</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-content">
                            <i class="ilmosys-first-aid"></i>
                            <h4>EXCELLENCE</h4>
                            <p>To continuously update, disseminate, train and apply new health information as an advocate for the quest for excellence in health
 
</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- TESTIMONIALS -->
        
        <!-- TESTIMONIALS -->


        <!-- PARALLAX -->
        <section class="parallax-content parallax1 text-center" data-stellar-background-ratio="0.4">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h4>Over 300+ peoples are daily visit our medical center.</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="#" class="btn btn-lg btn-primary pull-left">Learn More <i class="icon-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- PARALLAX -->
        <section class="text-center">


            <!-- ELEMENTS - CALL TO ACTION -->
           
        </section>

        <!-- GOOGLE MAP -->
     

        <!-- CONTACT INFO -->
        <div id="contact-info">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="c-info">
                            <h5><b>Call Us</b></h5>
                            <p>911</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="c-info">
                            <h5><b>Email</b></h5>
                            <p><a href="#">olsj@smartwems.com</a></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="c-info">
                            <h5><b>Address</b></h5>
                            <p>San Jose, Nueva Ecija</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="c-info">
                            <h5><b>WEBSITE</b></h5>
                            <p><a href="#"> www.smartwems.com</a></p>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <!-- FOOTER -->
       

        <!-- COPYRIGHT -->
        <div class="footer-copy">
            <div class="container">
                &copy; 2021.OLSJ. All rights reserved.
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT =============================-->
    <script src="{{ asset('landing/js/jquery.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/vendors/slick/slick.min.js') }}"></script>
    <script src="{{ asset('landing/js/vendors/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('landing/js/vendors/stellar.js') }}"></script>
    <script src="{{ asset('landing/js/vendors/isotope/isotope.pkgd.js') }}"></script>
    <script src="{{ asset('landing/js/vendors/swipebox/js/jquery.swipebox.min.js') }}"></script>
    <script src="{{ asset('landing/js/main.js') }}"></script>
    <script src="{{ asset('landing/js/vendors/mc/jquery.ketchup.all.min.js') }}"></script>
    <script src="{{ asset('landing/js/vendors/mc/main.js') }}"></script>
    <script src="{{ asset('landing/js/vendors/contact.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="{{ asset('landing/js/vendors/gmap.js') }}"></script>

</body>


</html>