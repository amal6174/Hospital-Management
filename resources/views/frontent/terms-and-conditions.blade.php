@extends('layouts.app')

@section('content')

{{-- Page Title --}}
<section class="page-title bg-1"
         style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/images/bg/bg-2.jpg') no-repeat center center;
                background-size: cover;
                position: relative;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Legal</span>
                    <h1 class="text-capitalize mb-5 text-lg">Terms &amp; Conditions</h1>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Terms Content --}}
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <p class="text-muted mb-5">
                    Last updated: {{ date('F d, Y') }}.
                    Please read these Terms and Conditions carefully before using our services.
                </p>

                {{-- Dynamic terms from DB --}}
                @forelse($terms as $term)
                    <div class="mb-5">
                        <h4 class="title-color mb-3">{{ $loop->iteration }}. {{ $term->title }}</h4>
                        <div class="divider mb-4"></div>
                        <div>{!! $term->description !!}</div>
                    </div>
                @empty
                    {{-- Fallback static content if no terms added yet --}}
                    <div class="mb-5">
                        <h4 class="title-color mb-3">1. Acceptance of Terms</h4>
                        <div class="divider mb-4"></div>
                        <p>By accessing or using the services provided by <strong>Novena Health &amp; Care</strong>,
                            you agree to be bound by these Terms and Conditions and all applicable laws and regulations.</p>
                    </div>
                    <div class="mb-5">
                        <h4 class="title-color mb-3">2. Medical Services</h4>
                        <div class="divider mb-4"></div>
                        <p>All medical services are provided by qualified and licensed medical professionals.
                            The information on this site should not be used as a substitute for professional medical advice.</p>
                    </div>
                @endforelse

                {{-- Back link --}}
                <div class="mt-4">
                    <a href="{{ route('home') }}" class="btn btn-main-2 btn-round-full">
                        <i class="icofont-arrow-left mr-2"></i> Back to Home
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
