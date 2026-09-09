<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Novena- Health & Care Medical template</title>


  <!-- Favicon -->
  {{-- <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
 --}}






  <!-- Favicon -->

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />

<!-- Bootstrap CSS -->

<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">

<!-- Icon Font CSS -->

<link rel="stylesheet" href="{{ asset('plugins/icofont/icofont.min.css') }}">

<!-- Slick Slider CSS -->

<link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick/slick.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick/slick-theme.css') }}">

<!-- Main Stylesheet -->

<link rel="stylesheet" href="{{ asset('css/style.css') }}">


  <style>
    .partner-logo {
    width: 180px;
    height: 100px;

    display: flex;
    align-items: center;
    justify-content: center;
}

.partner-logo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
  </style>

  <script>
  document.addEventListener('DOMContentLoaded', function () {

            const categorySelect = document.getElementById('category_id');

            const doctorSelect = document.getElementById('doctor_id');


            categorySelect.addEventListener('change', async function () {

                const categoryId = this.value;

                doctorSelect.innerHTML = '<option value="">Select Doctor</option>';

                if (!categoryId) {
                    return;
                }

                const response = await fetch(`/get-doctors/${categoryId}`);

                const doctors = await response.json();

                doctors.forEach(doctor => {

                    doctorSelect.innerHTML += `
                        <option value="${doctor.id}">
                            ${doctor.name}
                        </option>
                    `;

                });

            });

        });
    </script>
</script>

</head>

<body id="top">

<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>  {{ $general_settings['email_for_contact'] ?? '' }}</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Ta-134/A, New York, USA </li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+23-345-67890" >
							<span>Call Now : </span>
							<span class="h4">{{ $general_settings['contac_phone'] ?? '' }}</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
		 	 <a class="navbar-brand" href="index.html">
			  	<img src="{{ asset('storage/'.$general_settings['logo']) }}" alt="" class="img-fluid"
                 style="height:80px;
                         width:100px;
                         background: transparent;">
			  </a>

{{-- <img src="{{ asset('storage/'.$general_settings['logo']) }}" alt="" class="img-fluid"
                        style="height:120px;
                         width:120px;
                         background: transparent;"
                        > --}}



		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarmain">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="/">Home</a>
			  </li>
			   <li class="nav-item"><a class="nav-link" href="{{route('about')}}">About</a></li>
			    <li class="nav-item"><a class="nav-link" href="{{route('service')}}">Services</a></li>

			    <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="{{route('department')}}" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Department <i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown02">
						<li><a class="dropdown-item" href="{{route('department')}}">Departments</a></li>
						<li><a class="dropdown-item" href="{{route('single_department')}}">Department Single</a></li>
					</ul>
			  	</li>

			  	<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="doctor.html" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Doctors <i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown03">
						<li><a class="dropdown-item" href="{{route('doctor')}}">Doctors</a></li>
						<li><a class="dropdown-item" href="">Doctor Single</a></li>
						<li><a class="dropdown-item" href="{{route('appointment')}}">Appoinment</a></li>
					</ul>
			  	</li>

			   <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="blog-sidebar.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog <i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown05">
						<li><a class="dropdown-item" href="{{route('blog-sidebar') }}">Blog with Sidebar</a></li>

						<li><a class="dropdown-item" href="">Blog Single</a></li>
					</ul>
			  	</li>
			   <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
			</ul>
		  </div>
		</div>
	</nav>
</header>




@yield('content')



<footer class="footer section gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<div class="logo mb-4">
						<img src="{{ asset('storage/'.$general_settings['logo']) }}" alt="" class="img-fluid"
                        style="height:130px;
                         width:140px;
                         background: transparent;"
                        >
					</div>
					<p>{{ $general_settings['desc'] ?? '' }}</p>

					<ul class="list-inline footer-socials mt-4">
						<li class="list-inline-item"><a href="{{ $general_settings['facebook'] ?? '' }}"><i class="icofont-facebook"></i></a></li>
						<li class="list-inline-item"><a href="{{ $general_settings['twitter'] ?? '' }}"><i class="icofont-twitter"></i></a></li>
						<li class="list-inline-item"><a href="{{ $general_settings['linkdin'] ?? '' }}"><i class="icofont-linkedin"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Department</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
                        @foreach ($departments as $department )
                        	<li><a href="#">{{ $department->category_name }} </a></li>

                        @endforeach
						{{-- <li><a href="#">Surgery </a></li>
						<li><a href="#">Wome's Health</a></li>
						<li><a href="#">Radiology</a></li>
						<li><a href="#">Cardioc</a></li>
						<li><a href="#">Medicine</a></li> --}}
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Support</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="{{ route('terms') }}">Terms &amp; Conditions</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Company Support </a></li>
						<li><a href="#">FAQuestions</a></li>
						<li><a href="#">Company Licence</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget widget-contact mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Get in Touch</h4>
					<div class="divider mb-4"></div>

					<div class="footer-contact-block mb-4">
						<div class="icon d-flex align-items-center">
							<i class="icofont-email mr-3"></i>
							<span class="h6 mb-0">Support Available for 24/7</span>
						</div>
						<h4 class="mt-2"><a href="tel:+23-345-67890">{{ $general_settings['email_for_contact'] ?? '' }}</a></h4>
					</div>

					<div class="footer-contact-block">
						<div class="icon d-flex align-items-center">
							<i class="icofont-support mr-3"></i>
							<span class="h6 mb-0">Mon to Fri : 08:30 - 18:00</span>
						</div>
						<h4 class="mt-2"><a href="tel:+23-345-67890">{{ $general_settings['contac_phone'] ?? '' }}</a></h4>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-btm py-4 mt-5">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6">
					<div class="copyright">
						© Copyright Reserved to <span class="text-color">InfoSolze Consaltancy Service Private Ltd.</span> by <a href="https://themefisher.com/" target="_blank">Themefisher</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="subscribe-form text-lg-right mt-5 mt-lg-0">
						<form action="#" class="subscribe">
							<input type="text" class="form-control" placeholder="Your Email address">
							<a href="#" class="btn btn-main-2 btn-round-full">Subscribe</a>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
					<a class="backtop js-scroll-trigger reveal" href="#top">
						<i class="icofont-long-arrow-up"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>




    <!--
    Essential Scripts
    =====================================-->
<!-- Main jQuery -->

<script src="{{ asset('plugins/jquery/jquery.js') }}"></script>

<!-- Bootstrap 4.3.2 -->

<script src="{{ asset('plugins/bootstrap/js/popper.js') }}"></script>

<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Counterup -->

<script src="{{ asset('plugins/counterup/jquery.easing.js') }}"></script>

<!-- Slick Slider -->

<script src="{{ asset('plugins/slick-carousel/slick/slick.min.js') }}"></script>

<script src="{{ asset('plugins/counterup/jquery.waypoints.min.js') }}"></script>

<script src="{{ asset('plugins/shuffle/shuffle.min.js') }}"></script>

<script src="{{ asset('plugins/counterup/jquery.counterup.min.js') }}"></script>

<!-- Google Map -->

<script src="{{ asset('plugins/google-map/map.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

<!-- Custom Scripts -->

<script src="{{ asset('js/script.js') }}"></script>

<script src="{{ asset('js/contact.js') }}"></script>


  </body>
  </html>
