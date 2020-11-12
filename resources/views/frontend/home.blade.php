@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image:url(images/bg_1.jpg);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-6 ftco-animate">
          <h1 class="mb-4">Education Needs Complete Solution</h1>
          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          <p><a href="/apply" class="btn btn-primary px-4 py-3 mt-3">Contact Us</a></p>
        </div>
      </div>
      </div>
    </div>

    <div class="slider-item" style="background-image:url(images/bg_2.jpg);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-6 ftco-animate">
          <h1 class="mb-4">University, College School Education</h1>
          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          <p><a href="/apply" class="btn btn-primary px-4 py-3 mt-3">Contact Us</a></p>
        </div>
      </div>
      </div>
    </div>
  </section>
@endsection
