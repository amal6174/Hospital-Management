
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
          <h1 class="text-capitalize mb-5 text-lg">{{ $page_content['title_1']}} </h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">All Doctors</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>


<!-- portfolio -->
<section class="section doctors">
  <div class="container">
  	  <div class="row justify-content-center">
             <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Doctors</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>{{ $page_content['small_description_1']  }}</p>
                </div>
            </div>
        </div>

    <div class="col-12 text-center mb-5">

    <div class="btn-group btn-group-toggle" data-toggle="buttons">

        {{-- All Department --}}
        <label class="btn active">

            <input
                type="radio"
                name="shuffle-filter"
                value="all"
                checked="checked"
            />

            All Department

        </label>


        {{-- Dynamic Departments --}}
        @foreach($categories as $category)

            <label class="btn">

                <input
                    type="radio"
                    name="shuffle-filter"
                    value="cat{{ $category->id }}"
                />

                {{ $category->category_name }}

            </label>

        @endforeach

    </div>

</div>

    <div class="row shuffle-wrapper portfolio-gallery">
        @foreach ($doctors as  $doctor)


      	<div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" ="[&quot;cat1&quot;,&quot;cat2&quot;]"
            data-groups='["cat{{ $doctor->category_id }}"]'>
	      	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
	               <div class="doctor-img">
	               		<img src="{{ asset('storage/'.$doctor->image) }}" alt="doctor-image" class="img-fluid w-100"
                        style="width:80px; height:220px; ">
	               </div>
	            </div>
                <div class="content mt-3">
                	<h4 class="mb-0"><a href="{{ route('single-doctor',$doctor->slug) }}">{{ $doctor->name}}</a></h4>
                	<p>{{ $doctor->category->category_name}}</p>
                </div>
	      	</div>
      	</div>
                  @endforeach
      {{-- <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat2&quot;]">
        	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
		        	<div class="doctor-img">
		               <img src="images/team/2.jpg" alt="doctor-image" class="img-fluid w-100">
		            </div>
	            </div>
                <div class="content mt-3">
                	<h4 class="mb-0"><a href="doctor-single.html">Harrision Samuel</a></h4>
                	<p>Radiology</p>
                </div>
	      	</div>
      </div> --}}

      {{-- <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat3&quot;]">
        	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
		        	<div class="doctor-img">
		               <img src="images/team/3.jpg" alt="doctor-image" class="img-fluid w-100">
		            </div>
	            </div>
                <div class="content mt-3">
                	<h4 class="mb-0"><a href="doctor-single.html">Alexandar James</a></h4>
                	<p>Dental</p>
                </div>
	      	</div>
      </div> --}}

      {{-- <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat3&quot;,&quot;cat4&quot;]">
        	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
		        	<div class="doctor-img">
		               <img src="images/team/4.jpg" alt="doctor-image" class="img-fluid w-100">
		            </div>
	            </div>
                <div class="content mt-3">
                	<h4 class="mb-0"><a href="doctor-single.html">Edward john</a></h4>
                	<p>Pediatry</p>
                </div>
	      	</div>
      </div> --}}

      	{{-- <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat5&quot;]">
        	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
		        	<div class="doctor-img">
		               <img src="images/team/1.jpg" alt="doctor-image" class="img-fluid w-100">
		            </div>
	            </div>
                <div class="content mt-3">
                	<h4 class="mb-0"><a href="doctor-single.html">Thomas Henry</a></h4>
                	<p>Neurology</p>
                </div>
	      	</div>
      	</div> --}}

      {{-- <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat6&quot;]">
       		 <div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
		        	<div class="doctor-img">
		               <img src="images/team/3.jpg" alt="doctor-image" class="img-fluid w-100">
		            </div>
	            </div>
                <div class="content mt-3">
                	<h4 class="mb-0"><a href="doctor-single.html">Henry samuel</a></h4>
                	<p>Palmology</p>
                </div>
	      	</div>
      </div> --}}

      {{-- <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat4&quot;]">
        	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
		        	<div class="doctor-img">
		               <img src="images/team/1.jpg" alt="doctor-image" class="img-fluid w-100">
		            </div>
	            </div>
                <div class="content mt-3">
                	<h4 class="mb-0"><a href="doctor-single.html">Thomas alexandar</a></h4>
                	<p>Cardiology</p>
                </div>
	        </div>
      </div> --}}

      {{-- <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat5&quot;,&quot;cat6&quot;,&quot;cat1&quot;]">
        	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
		        	<div class="doctor-img">
		               <img src="images/team/3.jpg" alt="doctor-image" class="img-fluid w-100">
		             </div>
	             </div>
                <div class="content mt-3">
                	<h4 class="mb-0"><a href="doctor-single.html">HarissonThomas </a></h4>
                	<p>Traumatology</p>
                </div>
	      	</div>
      </div> --}}

      {{-- <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item illustration" data-groups="[&quot;cat2&quot;]">
        	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
		        	<div class="doctor-img">
		               <img src="images/team/4.jpg" alt="doctor-image" class="img-fluid w-100">
		            </div>
	            </div>
                <div class="content mt-3">
                	<h4 class="mb-0"><a href="doctor-single.html">Jonas Thomson</a></h4>
                	<p>Cardiology</p>
                </div>
	      	</div>
        </div> --}}

         {{-- <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat5&quot;,&quot;cat6&quot;,&quot;cat1&quot;]">
        	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
		        	<div class="doctor-img">
		               <img src="images/team/3.jpg" alt="doctor-image" class="img-fluid w-100">
		            </div>
	            </div>
                <div class="content mt-3">
                	<h4 class="mb-0"><a href="doctor-single.html">Henry Forth</a></h4>
                	<p>hematology</p>
                </div>
	      	</div>
      </div> --}}

      {{-- <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item illustration" data-groups="[&quot;cat2&quot;]">
        	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
		        	<div class="doctor-img">
		               <img src="images/team/4.jpg" alt="doctor-image" class="img-fluid w-100">
		             </div>
	             </div>
                <div class="content mt-3">
                	<h4 class="mb-0"><a href="doctor-single.html">Thomas Henry</a></h4>
                	<p>Dental</p>
                </div>
	      	</div>
        </div> --}}
    </div>
  </div>
</section>
<!-- /portfolio -->
<section class="section cta-page"
style="background: url('{{ asset('storage/'.$page_content['image_2']) }}')  no-repeat;
background-size: cover;
            background-position: center;
            position: relative;

       ">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="cta-content">
					<div class="divider mb-4"></div>
					<h2 class="mb-5 text-lg">We are pleased to offer you the <span class="title-color">chance to have the healthy</span></h2>
					<a href="appoinment.html" class="btn btn-main-2 btn-round-full">Get appoinment<i class="icofont-simple-right  ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- footer Start -->
@endsection;
