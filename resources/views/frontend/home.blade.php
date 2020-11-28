@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')
    <section class="home-slider owl-carousel">
        @foreach ($data['slider'] as $slider)
            <div class="slider-item" style="background-image:url({{ $slider->image }});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center justify-content-start"
                        data-scrollax-parent="true">
                        <div class="col-md-6 fadeInUp ftco-animated">

                            {!! $slider->content !!}

                        </div>
                    </div>
                </div>
            </div>

        @endforeach


    </section>
    <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">

                        <h2>Welcome to Board of Secondary Education <span> Karachi</span></h2>
                        <div class="feature-head">
                            <div class="feature-head">

                                <p>BSEK was established in 1950 the major ambition of this board is to promote school
                                    education and this board work for betterment of education and maintain high standards of
                                    education in Karachi</p>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>

    </section>
    <section class="ftco-section bg-light">
        <div class="container-fluid px-4">
            <div class="row justify-content-center mb-5 pb-2">

                <div class="col-md-12 text-center heading-section ">
                    <div class="section-title">

                        <h2>Board Of Directors</h2>

                    </div>

                </div>

            </div>
            <div class="row justify-content-center">
                @foreach ($data['directors'] as $director)
                    <div class="col-md-6 col-lg-3 fadeInUp ftco-animated">
                        <div class="staff">
                            <div class="img-wrap d-flex align-items-stretch">
                                <a href="{{ $director->image }}" class="gallery image-popup img d-flex align-items-center"
                                    style="background-image: url({{ $director->image }});">

                                </a>

                            </div>
                            <div class="text pt-3 text-center">
                                <h3>{{ $director->name }}</h3>
                                <span class="position mb-2">{{ $director->position }}</span>
                                <blockquote><q>
                                        {{ $director->message }}</q>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="ftco-gallery">
        <div class="row justify-content-center mb-5 pb-2">

            <div class="col-md-12 text-center heading-section ">
                <div class="section-title">

                    <h2>Certified Teachers</h2>

                </div>

            </div>

        </div>
        <div class="row justify-content-center">
            @foreach ($data['teachers'] as $teacher)
                <div class="col-md-6 col-lg-3 fadeInUp ftco-animated">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <a href="{{ $teacher->image }}" class="gallery image-popup img d-flex align-items-center"
                                style="background-image: url({{ $teacher->image }});">

                            </a>

                        </div>
                        <div class="text pt-3 text-center">
                            <h3>{{ $teacher->name }}</h3>
                            <span class="position mb-2">{{ $teacher->position }}</span>
                            <blockquote><q>
                                    {{ $teacher->message }}</q>
                            </blockquote>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ">
                    <h2 class="mb-4">Student Says About Us</h2>

                </div>
            </div>
            <div class="row  justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        @foreach ($data['testimonal'] as $testimonal)

                        @endforeach
                        <div class="item">
                            <div class="testimony-wrap d-flex">
                                <div class="user-img mr-4" style="background-image: url({{ $testimonal->image }})">
                                </div>
                                <div class="text ml-2">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                    <p>{{ $testimonal->message }}</p>
                                    <p class="name">{{ $testimonal->message }}</p>
                                    <span class="position">{{ $testimonal->relation }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
