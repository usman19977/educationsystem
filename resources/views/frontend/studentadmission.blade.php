@extends('frontend.layouts.master')
@section('title', 'Student Admission')
@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url({{ url('frontend/images/bredcrum-bg.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 text-center fadeInUp ftco-animated">
                    <h1 class="mb-2 bread">Student Admission</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Student Admission <i
                                class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pt ftc-no-pb">
        <div class="col-lg-6  col-12 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-sm-12 mt-5 mb-1">
                    </div>
                    <div class="col-md-12 col-sm-12 mt-3 mb-10">
                        {!! $data['content'][0]->content !!}
                        <hr>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
