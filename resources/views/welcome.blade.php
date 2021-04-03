<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Medila - Medical Treatment & Health Care Landing Page Template</title>

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
                                <a href="#"><span class="icon-call"></span> 1800 789 123</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">

                            @if (Route::has('login'))
                            <li class="dropdown mm-menu">
                                @auth
                                <a class="page-scroll" href="{{ url('/home') }}">Home</a>
                            </li>
                            @endauth
                            @endif
                            <li class="dropdown mm-menu">
                                <a class="page-scroll" href="#features">Features</a>
                            </li>

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
                        <p>Lorem ipsum dolor sit amet consec tetur elit amet voluptas accusamus <br>dolorum veritatis ea odio dolor emque.</p>
                        <div class="row">
                            <div class="col-md-10">
                                <ul class="features-list">
                                    <li>
                                        <i class="ilmosys-microscope"></i>
                                        <h5>Equipment Inventory Support</h5>
                                    </li>

                                    <li>
                                        <i class="ilmosys-x-ray"></i>
                                        <h5>Ticket Management</h5>
                                    </li>

                                    <li>
                                        <i class="ilmosys-ambulance"></i>
                                        <h5>Detailed Analytics</h5>
                                    </li>

                                    <li>
                                        <i class="ilmosys-clinic"></i>
                                        <h5>Ward/ Indoor facility</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-sm-5 col-md-7">
                        <div class="intro-form" id="join-us-form contact-form">
                            <h4>Sydney's #1 Medical Treatment Service Center.</h4>
                            
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
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div id="stats2" class="bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="stats2-info">
                            <i class="fa fa-users"></i>
                            <p><span class="count">5500</span></p>
                            <h2>Healthy Clients</h2>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="stats2-info">
                            <i class="ilmosys-doctor"></i>
                            <p><span class="count">85</span></p>
                            <h2>Proffesional Doctors</h2>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="stats2-info">
                            <i class="ilmosys-ambulance"></i>
                            <p><span class="count">30</span></p>
                            <h2>Ambulance</h2>
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
                    <p>- FEATURES -</p>
                    <h3>Check out some of our professional<br> features! </h3>
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
                            <h3>The Perfect Template for Medical. </h3>
                            <ul class="list">
                                <li><i class="icon-check"></i> Nunc quis justo sed odio scelerisque.</li>
                                <li><i class="icon-check"></i> Duis tristique lorem non risus dignissim.</li>
                                <li><i class="icon-check"></i>Vivamus accumsan sem sit amet.</li>
                                <li><i class="icon-check"></i>Morbi sed orci a tortor bibendum finibus vitae.</li>
                                <li><i class="icon-check"></i>Nam sed sem quis nisi faucibus tempor.</li>
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
                            <h3>Watch youtube video and get details of our center. </h3>
                            <ul class="list">
                                <li><i class="icon-check"></i> Nunc quis justo sed odio scelerisque.</li>
                                <li><i class="icon-check"></i> Duis tristique lorem non risus dignissim.</li>
                                <li><i class="icon-check"></i>Vivamus accumsan sem sit amet.</li>
                                <li><i class="icon-check"></i>Morbi sed orci a tortor bibendum finibus vitae.</li>
                                <li><i class="icon-check"></i>Nam sed sem quis nisi faucibus tempor.</li>
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
                        <h3>Honesty is the best policy.</h3>
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
                    <p>- SERVICES -</p>
                    <h3>Our Medical Service </h3>
                    <p>We're different from typical health checkup center. We're out to create magic. The goal is to WOW you with outstanding treatment.</p>
                </div>

                <div class="services-s5 row">
                    <div class="col-md-3">
                        <div class="service-content">
                            <i class="ilmosys-astronaut"></i>
                            <h4>Robotic Surgery</h4>
                            <p>Lorem ipsum dolor sit amet elit convallis neque convallis est non turpis nisl ac justo rutrum sollic itudin urna interdum.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-content">
                            <i class="ilmosys-women"></i>
                            <h4>Women’s Care</h4>
                            <p>Lorem ipsum dolor sit amet elit convallis neque convallis est non turpis nisl ac justo rutrum sollic itudin urna interdum.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-content">
                            <i class="ilmosys-virus-2"></i>
                            <h4>Cancer Services</h4>
                            <p>Lorem ipsum dolor sit amet elit convallis neque convallis est non turpis nisl ac justo rutrum sollic itudin urna interdum.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service-content">
                            <i class="ilmosys-first-aid"></i>
                            <h4>Emergency Services</h4>
                            <p>Lorem ipsum dolor sit amet elit convallis neque convallis est non turpis nisl ac justo rutrum sollic itudin urna interdum.</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="space50"></div>
                        <div class="service-content">
                            <i class="ilmosys-medicine-2"></i>
                            <h4>Wellness Center</h4>
                            <p>Lorem ipsum dolor sit amet elit convallis neque convallis est non turpis nisl ac justo rutrum sollic itudin urna interdum.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="space50"></div>
                        <div class="service-content">
                            <i class="ilmosys-hospital-2"></i>
                            <h4>Orthopaedic & Spine Institute</h4>
                            <p>Lorem ipsum dolor sit amet elit convallis neque convallis est non turpis nisl ac justo rutrum sollic itudin urna interdum.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="space50"></div>
                        <div class="service-content">
                            <i class="ilmosys-brain-3"></i>
                            <h4>Barin Checkup</h4>
                            <p>Lorem ipsum dolor sit amet elit convallis neque convallis est non turpis nisl ac justo rutrum sollic itudin urna interdum.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="space50"></div>
                        <div class="service-content">
                            <i class="ilmosys-heart"></i>
                            <h4>Heart Care Services</h4>
                            <p>Lorem ipsum dolor sit amet elit convallis neque convallis est non turpis nisl ac justo rutrum sollic itudin urna interdum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- TESTIMONIALS -->
        <div id="reviews">

            <div class="container">
                <div class="about-inline text-center">
                    <p>- REVIEWS -</p>
                    <h3>Read what our past patients said <br> about our medical center. </h3>
                </div>

                <!-- TESTIMONIALS -->
                <div class="testimonials-white">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="quote2">
                                <div>
                                    <i class="icon2-bubble"></i>
                                    <p>From the telephone appointment system to seeing a GP, my experience has been flawless. All the team from reception, telephone and nursing staff are polite, thorough and cheerful, which in itself is comforting.</p>
                                    <span class="author">Mark Dave - Teacher</span>
                                </div>

                                <div>
                                    <i class="icon2-bubble"></i>
                                    <p>Medical Surgery in my opinion has to be one of the best in the area. I have never had a problem getting to see a doctor or getting through from the telephone. All the Doctors here are very good and very considerate
                                        and more importantly very efficient .</p>
                                    <span class="author">John Doe - Business Men</span>
                                </div>

                                <div>
                                    <i class="icon2-bubble"></i>
                                    <p>I'm simply extremely satisfied with the quality and level of care received from Medical Centre not only to myself, but also my children and an elderly relative. excellent work</p>
                                    <span class="author">Jackina Doe - House Wife</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space100"></div>
            </div>
        </div>
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
            <div class="cta-wrap">
                <div class="container">
                    <div class="col-md-12">
                        <h1>Hurry up! and get <br> <u>Free</u> treatment for <span> first 50 person</span></h1>
                        <p>Limited time offer for this month. No credit card required.</p>
                        <a href="#home" class="page-scroll btn btn-primary">Make an Appointment</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- GOOGLE MAP -->
        <div class="google-map">
            <div class="container-fluid no-padding">
                <div id="map"></div>
            </div>
        </div>

        <!-- CONTACT INFO -->
        <div id="contact-info">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="c-info">
                            <h5><b>Call Us</b></h5>
                            <p>(080) 123 456 7890</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="c-info">
                            <h5><b>Email</b></h5>
                            <p><a href="#">care@domain.com</a></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="c-info">
                            <h5><b>Address</b></h5>
                            <p>72, Wallstreet, NY 20110</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="c-info">
                            <h5><b>WEBSITE</b></h5>
                            <p><a href="#"> www.domain.com</a></p>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <footer class="footer2" id="footer2">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 footerP">
                        <h5>RELATED LINKS</h5><ul>
                        <li>
                            <a href="#">
                                <p>About Us</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Why Buy With Us?</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Our Team</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Contact Us</p>
                            </a>
                        </li>
                        </ul>
                    </div>

                    <div class="col-md-3 footerP">
                        <h5>OTHER LINKS</h5><ul>
                        <li>
                            <a href="#">
                                <p>Register</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Forum</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Affiliate</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>FAQ</p>
                            </a>
                        </li></ul>
                    </div>

                    <div class="col-md-3 footerP">
                        <h5>RELATED LINKS</h5><ul>
                        <li>
                            <a href="#">
                                <p>About Us</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Why Buy With Us?</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Our Team</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Contact Us</p>
                            </a>
                        </li></ul>
                    </div>

                    <div class="col-md-3 footerP">
                        <h5>About Us</h5>
                        <p>Mauris feugiat erat tellus.Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                        <h5>Social</h5>
                        <div class="footer-social">
                            <a href="#" class="fa fa-facebook"></a>
                            <a href="#" class="fa fa-twitter"></a>
                            <a href="#" class="fa fa-dribbble"></a>
                            <a href="#" class="fa fa-google-plus"></a>
                             <a href="#" class="fa fa-linkedin"></a>
                            <a href="#" class="fa fa-instagram"></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- COPYRIGHT -->
        <div class="footer-copy">
            <div class="container">
                &copy; 2019. Medila. All rights reserved.
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