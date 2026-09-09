@extends('layouts.app')

@section('content')



<section class="page-title bg-1"
           style="background: url('{{ asset('storage/' . $page_content['image_1']) }}') no-repeat 50% 50%;
           background-size: cover;
           position: relative;">

  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">{{$page_content['small_title_1']}}</span>
          <h1 class="text-capitalize mb-5 text-lg">{{$page_content['title_1']}}</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">About Us</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section about-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h2 class="title-color">Personal care for your healthy living</h2>
			</div>
			<div class="col-lg-8">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, quod laborum alias. Vitae dolorum, officia sit! Saepe ullam facere at, consequatur incidunt, quae esse, quis ut reprehenderit dignissimos, libero delectus.</p>
				<img src="images/about/sign.png" alt="" class="img-fluid">
			</div>
		</div>
	</div>
</section>

<section class="fetaure-page ">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="about-block-item mb-5 mb-lg-0">
					<img src="images/about/about-1.jpg" alt="" class="img-fluid w-100">
					<h4 class="mt-3">Healthcare for Kids</h4>
					<p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="about-block-item mb-5 mb-lg-0">
					<img src="images/about/about-2.jpg" alt="" class="img-fluid w-100">
					<h4 class="mt-3">Medical Counseling</h4>
					<p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="about-block-item mb-5 mb-lg-0">
					<img src="images/about/about-3.jpg" alt="" class="img-fluid w-100">
					<h4 class="mt-3">Modern Equipments</h4>
					<p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="about-block-item">
					<img src="images/about/about-4.jpg" alt="" class="img-fluid w-100">
					<h4 class="mt-3">Qualified Doctors</h4>
					<p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section awards">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4">
				<h2 class="title-color">Our Doctors achievements </h2>
				<div class="divider mt-4 mb-5 mb-lg-0"></div>
			</div>
			<div class="col-lg-8">
				<div class="row">

             @foreach ($achives as $achive )


                    <div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="{{ asset('storage/'.$achive->image) }}" alt="" class="img-fluid"
                             style="width: 150px; height:180px;">
						</div>
					</div>
                     @endforeach
{{--
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="images/about/3.png" alt="" class="img-fluid">
						</div>
					</div>

					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="images/about/4.png" alt="" class="img-fluid">
						</div>
					</div>

					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="images/about/1.png" alt="" class="img-fluid">
						</div>
					</div>

					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="images/about/2.png" alt="" class="img-fluid">
						</div>
					</div>

					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="images/about/5.png" alt="" class="img-fluid">
						</div>

					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="images/about/6.png" alt="" class="img-fluid">
						</div>
					</div> --}}


				</div>
			</div>
		</div>
	</div>
</section>

<section class="section team">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center">
					<h2 class="mb-4">Meet Our Specialist</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Today’s users expect effortless experiences. Don’t let essential people and processes stay stuck in the past. Speed it up, skip the hassles</p>
				</div>
			</div>
		</div>

		<div class="row">
            @foreach ($doctors as $doctor  )


			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="team-block mb-5 mb-lg-0">
					<img src="{{ asset('storage/'.$doctor->image) }}" alt="" class="img-fluid w-100"
                    style="width: 50px; height:200px">

					<div class="content">
						<h4 class="mt-4 mb-0"><a href="doctor-single.html">{{$doctor->name}}</a></h4>
						<p>{{$doctor->category->category_name}}</p>
					</div>
				</div>
			</div>
          @endforeach
			{{-- <div class="col-lg-3 col-md-6 col-sm-6">
				<div class="team-block mb-5 mb-lg-0">
					<img src="images/team/2.jpg" alt="" class="img-fluid w-100">

					<div class="content">
						<h4 class="mt-4 mb-0"><a href="doctor-single.html">Marshal Root</a></h4>
						<p>Surgeon, Сardiologist</p>
					</div>
				</div>
			</div> --}}

			{{-- <div class="col-lg-3 col-md-6 col-sm-6">
				<div class="team-block mb-5 mb-lg-0">
					<img src="images/team/3.jpg" alt="" class="img-fluid w-100">

					<div class="content">
						<h4 class="mt-4 mb-0"><a href="doctor-single.html">Siamon john</a></h4>
						<p>Internist, General Practitioner</p>
					</div>
				</div>
			</div> --}}
			{{-- <div class="col-lg-3 col-md-6 col-sm-6">
				<div class="team-block">
					<img src="images/team/4.jpg" alt="" class="img-fluid w-100">

					<div class="content">
						<h4 class="mt-4 mb-0"><a href="doctor-single.html">Rishat Ahmed</a></h4>
						<p>Orthopedic Surgeon</p>
					</div>
				</div>
			</div> --}}
		</div>
	</div>
</section>

<section class="section" style="padding: 40px 0;">
	<div class="container">

		{{-- Section heading --}}
		<div class="row justify-content-center mb-4">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2 class="mb-2">What they say about us</h2>
					<div class="divider mx-auto my-3"></div>
					<p class="text-muted">Hear from our patients about their experience with our doctors and services.</p>
				</div>
			</div>
		</div>

		{{-- Two-column: image left, testimonials right --}}
		<div class="row align-items-center">

			{{-- Left: image --}}
			<div class="col-lg-5 col-md-5 text-center mb-4 mb-md-0">
				<img src="{{ asset('storage/'.$page_content['image_2']) }}"
				     alt="Testimonial"
				     class="img-fluid rounded"
				     style="width: 460px; height: 500px; object-fit: contain;">
			</div>

			{{-- Right: testimonials (3 items to match image height) --}}
			<div class="col-lg-7 col-md-7">
				<div class="testimonial-block" style="margin-bottom: 15px;">
					<div class="client-info">
						<h4 style="font-size:16px; margin-bottom:2px;">Amazing service!</h4>
						<span>John Partho</span>
					</div>
					<p style="font-size:13px; margin-bottom:5px;">They provide great service facilty consectetur adipisicing elit. Itaque rem, praesentium, iure, ipsum magnam deleniti a vel eos adipisci suscipit fugit placeat.</p>
					<i class="icofont-quote-right"></i>
				</div>
				<div class="testimonial-block" style="margin-bottom: 15px;">
					<div class="client-info">
						<h4 style="font-size:16px; margin-bottom:2px;">Expert doctors!</h4>
						<span>Mullar Sarth</span>
					</div>
					<p style="font-size:13px; margin-bottom:5px;">They provide great service facilty consectetur adipisicing elit. Itaque rem, praesentium, iure, ipsum magnam deleniti a vel eos adipisci suscipit fugit placeat.</p>
					<i class="icofont-quote-right"></i>
				</div>
				<div class="testimonial-block" style="margin-bottom: 0;">
					<div class="client-info">
						<h4 style="font-size:16px; margin-bottom:2px;">Good Support!</h4>
						<span>Kolis Mullar</span>
					</div>
					<p style="font-size:13px; margin-bottom:5px;">They provide great service facilty consectetur adipisicing elit. Itaque rem, praesentium, iure, ipsum magnam deleniti a vel eos adipisci suscipit fugit placeat.</p>
					<i class="icofont-quote-right"></i>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- footer Start -->

@endsection
