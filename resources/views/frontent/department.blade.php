@extends('layouts.app')

@section('content')


<section class="page-title bg-1" style="background: url('{{ asset('storage/'.$page_content->image_1) }}')"
    background-repeat: no-repeat;
    background-position: 50% 50%;
    background-size: cover;
    position: relative>
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">{{$page_content->small_title_1}}</span>
                    <h1 class="text-capitalize mb-5 text-lg">{{$page_content->title_1}}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section service-2">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <h2>{{$page_content->title_2}}</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>
                        {{ $page_content->small_description_1}}
                    </p>
                </div>
            </div>
        </div>

        <div class="row">

            @forelse($departmment as $dept)

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="department-block">

                    <img src="{{ asset('categories/' . $dept->image) }}" alt="{{ $dept->category_name }}"
                        class="img-fluid w-100"
                        style="width: 60px; height:250px">

                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">
                            {{ $dept->category_name }}
                        </h4>

                        <p class="mb-4">
                            {{ $dept->description }}
                        </p>

                        <a href="#" class="read-more">
                            Learn More
                            <i class="icofont-simple-right ml-2"></i>
                        </a>
                    </div>

                </div>
            </div>

            @empty

            <div class="col-12 text-center">
                <h4>No Department Found</h4>
            </div>

            @endforelse

        </div>

    </div>
</section>

<!-- footer Start -->

@endsection;
