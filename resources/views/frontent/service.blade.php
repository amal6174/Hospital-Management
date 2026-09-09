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
            <li class="list-inline-item"><a href="#" class="text-white-50">Our services</a></li>
          </ul> -->
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section service-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5">
                    <img src="images/service/service-1.jpg" alt="" class="img-fluid">
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">Child care</h4>
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5">
                    <img src="images/service/service-2.jpg" alt="" class="img-fluid">
                    <div class="content">
                        <h4 class="mt-4 mb-2  title-color">Personal Care</h4>
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5">
                    <img src="images/service/service-3.jpg" alt="" class="img-fluid">
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">CT scan</h4>
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5 mb-lg-0">
                    <img src="images/service/service-4.jpg" alt="" class="img-fluid">
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">Joint replacement</h4>
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5 mb-lg-0">
                    <img src="images/service/service-6.jpg" alt="" class="img-fluid">
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">Examination & Diagnosis</h4>
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5 mb-lg-0">
                    <img src="images/service/service-8.jpg" alt="" class="img-fluid">
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">Alzheimer's disease</h4>
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section cta-page" style="background: url('{{ asset('storage/' . $page_content['image_2']) }}') no-repeat;
            background-size: cover;
            position: relative;">>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="cta-content">
                    <div class="divider mb-4"></div>
                    @php
                    $heroText = explode('|', $page_content['title_2']);
                    @endphp
                    <h2 class="mb-5 text-lg">{{ $heroText[0] ?? '' }} <span class="title-color"> {{ $heroText[1] ?? '' }}</span></h2>
                    <a href="appoinment.html" class="btn btn-main-2 btn-round-full">Get appoinment<i
                            class="icofont-simple-right  ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection;
