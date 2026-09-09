@extends('layouts.app')

@section('content')






<!-- Slider Start -->
<section class="banner" style="
        position: relative;
        overflow: hidden;
        background: #fff;
        background: url('{{ asset('storage/' . $page_content['image_1']) }}') no-repeat;
        background-size: cover;
        min-height: 550px;
    ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">
                    <div class="divider mb-3"></div>
                    <span class="text-uppercase text-sm letter-spacing ">{{$page_content['small_title_1']}}</span>
                    <h1 class="mb-3 mt-3">{{$page_content['title_1']}}</h1>

                    <p class="mb-4 pr-5">{{$page_content['small_description_1']}}</p>
                    <div class="btn-container ">
                        <a href="{{ route('home') }}" target="_blank" class="btn btn-main-2 btn-icon btn-round-full">Make
                            appoinment <i class="icofont-simple-right ml-2  "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-block d-lg-flex">
                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-surgeon-alt"></i>
                        </div>
                        <span>24 Hours Service</span>
                        <h4 class="mb-3">Online Appoinment</h4>
                        <p class="mb-4">Get ALl time support for emergency.We have introduced the principle of family
                            medicine.</p>
                        <a href="{{ route('home') }}" class="btn btn-main btn-round-full">Make a appoinment</a>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-ui-clock"></i>
                        </div>
                        <span>Timing schedule</span>
                        <h4 class="mb-3">Working Hours</h4>
                        <ul class="w-hours list-unstyled">
                            <li class="d-flex justify-content-between">Sun - Wed : <span>8:00 - 17:00</span></li>
                            <li class="d-flex justify-content-between">Thu - Fri : <span>9:00 - 17:00</span></li>
                            <li class="d-flex justify-content-between">Sat - sun : <span>10:00 - 17:00</span></li>
                        </ul>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-support"></i>
                        </div>
                        <span>Emegency Cases</span>
                        <h4 class="mb-3">1-800-700-6200</h4>
                        <p>Get ALl time support for emergency.We have introduced the principle of family medicine.Get
                            Conneted with us for any urgency .</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-sm-6">
                <div class="about-img">
                    <img src="{{ asset('storage/'.$page_content['image_2']) }}" alt="" class="img-fluid">
                    <img src="{{ asset('storage/'.$page_content['image_3']) }}" alt="" class="img-fluid mt-4">
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="about-img mt-4 mt-lg-0">
                    <img src="{{ asset('storage/'.$page_content['image_4']) }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-content pl-4 mt-4 mt-lg-0">
                    <h2 class="title-color"> {!! str_replace('&', '<br>&', $page_content['small_title_2']) !!}</h2>
                    <p class="mt-4 mb-5">{{ $page_content['small_description_2']}}</p>

                    <a href="service.html" class="btn btn-main-2 btn-round-full btn-icon">Services<i
                            class="icofont-simple-right ml-3"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cta-section ">
    <div class="container">
        <div class="cta position-relative">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-doctor"></i>
                        <span class="h3">58</span>k
                        <p>Happy People</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-flag"></i>
                        <span class="h3">700</span>+
                        <p>Surgery Comepleted</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-badge"></i>
                        <span class="h3">{{ $doctors }}</span>+
                        <p>Expert Doctors</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-globe"></i>
                        <span class="h3">20</span>
                        <p>Worldwide Branch</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section service gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <h2>Award winning patient care</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt
                        molestias nostrum laudantium. Maiores porro cumque quaerat.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-4">
                    <div class="icon d-flex align-items-center">
                        <i class="icofont-laboratory text-lg"></i>
                        <h4 class="mt-3 mb-3">Laboratory services</h4>
                    </div>

                    <div class="content">
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-4">
                    <div class="icon d-flex align-items-center">
                        <i class="icofont-heart-beat-alt text-lg"></i>
                        <h4 class="mt-3 mb-3">Heart Disease</h4>
                    </div>
                    <div class="content">
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-4">
                    <div class="icon d-flex align-items-center">
                        <i class="icofont-tooth text-lg"></i>
                        <h4 class="mt-3 mb-3">Dental Care</h4>
                    </div>
                    <div class="content">
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-4">
                    <div class="icon d-flex align-items-center">
                        <i class="icofont-crutch text-lg"></i>
                        <h4 class="mt-3 mb-3">Body Surgery</h4>
                    </div>

                    <div class="content">
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-4">
                    <div class="icon d-flex align-items-center">
                        <i class="icofont-brain-alt text-lg"></i>
                        <h4 class="mt-3 mb-3">Neurology Sargery</h4>
                    </div>
                    <div class="content">
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-4">
                    <div class="icon d-flex align-items-center">
                        <i class="icofont-dna-alt-1 text-lg"></i>
                        <h4 class="mt-3 mb-3">Gynecology</h4>
                    </div>
                    <div class="content">
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section appoinment">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 ">
                <div class="appoinment-content">
                    <img src="{{ asset('storage/'.$page_content['image_5']) }}" alt="" class="img-fluid">
                    <div class="emergency">
                        <h2 class="text-lg"><i class="icofont-phone-circle text-lg"> +91
                            @foreach ($general_settings as $general_setting)

                             @if($general_setting->field_name == 'contac_phone')

                             {{ $general_setting->value }}

                             @endif

                        @endforeach</i></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10 ">
                <div class="appoinment-wrap mt-5 mt-lg-0">
                    <h2 class="mb-2 title-color">Book appoinment</h2>
                    <p class="mb-4">Mollitia dicta commodi est recusandae iste, natus eum asperiores corrupti qui velit
                        . Iste dolorum atque similique praesentium soluta.</p>
                    <form id="#" class="appoinment-form" method="post" action="{{ route('appointment.create') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select class="form-control" id="category_id" name="categoy_id"
                                        id="exampleFormControlSelect1">
                                        <option>Choose Department</option>
                                        @foreach ($categories as $category )


                                        <option value="{{ $category->id }}">{{ $category->category_name}}</option>
                                        @endforeach
                                        {{-- <option>Development cycle</option>
                                        <option>Software Development</option>
                                        <option>Maintenance</option>
                                        <option>Process Query</option>
                                        <option>Cost and Duration</option>
                                        <option>Modal Delivery</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select class="form-control" name="doctor_id" id="doctor_id">

                                        {{-- <option>Select Doctors</option>
                                        <option>Software Design</option>
                                        <option>Development cycle</option>
                                        <option>Software Development</option>
                                        <option>Maintenance</option>
                                        <option>Process Query</option>
                                        <option>Cost and Duration</option>
                                        <option>Modal Delivery</option> --}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="appointment_date" id="date" type="date" class="form-control"
                                        placeholder="dd/mm/yyyy">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="appointment_time" id="time" type="time" class="form-control"
                                        placeholder="Time">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="name" id="name" type="text" class="form-control"
                                        placeholder="Full Name">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="phone" id="phone" type="Number" class="form-control"
                                        placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group-2 mb-4">
                            <textarea name="message" id="message" class="form-control" rows="6"
                                placeholder="Your Message"></textarea>
                        </div>

                        {{-- <a class="btn btn-main btn-round-full" type="submit">Make Appoinment <i
                                class="icofont-simple-right ml-2  "></i></a> --}}
                        <button class="btn btn-main btn-round-full" tyepe="submit">Make Appoinment <i
                                class="iconfont-simple-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section testimonial-2 gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title text-center">
                    <h2>We served over 5000+ Patients</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt
                        molestias nostrum laudantium. Maiores porro cumque quaerat.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 testimonial-wrap-2">
                <div class="testimonial-block style-2  gray-bg">
                    <i class="icofont-quote-right"></i>

                    <div class="testimonial-thumb">
                        <img src="images/team/test-thumb1.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="client-info ">
                        <h4>Amazing service!</h4>
                        <span>John Partho</span>
                        <p>
                            They provide great service facilty consectetur adipisicing elit. Itaque rem, praesentium,
                            iure, ipsum magnam deleniti a vel eos adipisci suscipit fugit placeat.
                        </p>
                    </div>
                </div>

                <div class="testimonial-block style-2  gray-bg">
                    <div class="testimonial-thumb">
                        <img src="images/team/test-thumb2.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="client-info">
                        <h4>Expert doctors!</h4>
                        <span>Mullar Sarth</span>
                        <p>
                            They provide great service facilty consectetur adipisicing elit. Itaque rem, praesentium,
                            iure, ipsum magnam deleniti a vel eos adipisci suscipit fugit placeat.
                        </p>
                    </div>

                    <i class="icofont-quote-right"></i>
                </div>

                <div class="testimonial-block style-2  gray-bg">
                    <div class="testimonial-thumb">
                        <img src="images/team/test-thumb3.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="client-info">
                        <h4>Good Support!</h4>
                        <span>Kolis Mullar</span>
                        <p>
                            They provide great service facilty consectetur adipisicing elit. Itaque rem, praesentium,
                            iure, ipsum magnam deleniti a vel eos adipisci suscipit fugit placeat.
                        </p>
                    </div>

                    <i class="icofont-quote-right"></i>
                </div>

                <div class="testimonial-block style-2  gray-bg">
                    <div class="testimonial-thumb">
                        <img src="images/team/test-thumb4.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="client-info">
                        <h4>Nice Environment!</h4>
                        <span>Partho Sarothi</span>
                        <p class="mt-4">
                            They provide great service facilty consectetur adipisicing elit. Itaque rem, praesentium,
                            iure, ipsum magnam deleniti a vel eos adipisci suscipit fugit placeat.
                        </p>
                    </div>
                    <i class="icofont-quote-right"></i>
                </div>

                <div class="testimonial-block style-2  gray-bg">
                    <div class="testimonial-thumb">
                        <img src="images/team/test-thumb1.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="client-info">
                        <h4>Modern Service!</h4>
                        <span>Kolis Mullar</span>
                        <p>
                            They provide great service facilty consectetur adipisicing elit. Itaque rem, praesentium,
                            iure, ipsum magnam deleniti a vel eos adipisci suscipit fugit placeat.
                        </p>
                    </div>
                    <i class="icofont-quote-right"></i>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section clients">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title text-center">
                    <h2>Partners who support us</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt
                        molestias nostrum laudantium. Maiores porro cumque quaerat.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row clients-logo">

            {{-- <div class="col-lg-2">
                <div class="client-thumb">
                    <img src="images/about/1.png" alt="" class="img-fluid">
                </div>
            </div> --}}


            @foreach ($partners as $partner )
            <div class="col-lg-2">
                <div class="client-thumb">
                    <img src="{{ asset('storage/'.$partner->image) }}" alt="" class="img-fluid"
                    style="width: 110px; height:80px">
                </div>
            </div>

            @endforeach
            {{-- <div class="col-lg-2">
                <div class="client-thumb">
                    <img src="images/about/3.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="client-thumb">
                    <img src="images/about/4.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="client-thumb">
                    <img src="images/about/5.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="client-thumb">
                    <img src="images/about/6.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="client-thumb">
                    <img src="images/about/3.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="client-thumb">
                    <img src="images/about/4.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="client-thumb">
                    <img src="images/about/5.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="client-thumb">
                    <img src="images/about/6.png" alt="" class="img-fluid">
                </div>
            </div> --}}

        </div>
    </div>
</section>
<!-- footer Start -->

@endsection
