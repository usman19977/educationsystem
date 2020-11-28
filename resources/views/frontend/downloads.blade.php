@extends('frontend.layouts.master')
@section('title', 'Downloads')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{url(
    'frontend/images/bredcrum-bg.jpg'
)}});">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 text-center fadeInUp ftco-animated">
          <h1 class="mb-2 bread">Downloads</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>
<div class="row justify-content-center">
    <div class="col-auto" style="padding: 5%">
<table class="ui celled table" id="download-table" style="width:100%" >


        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Downloads</th>

            </tr>
        </thead>

</table>
    </div>
</div>

@endsection

