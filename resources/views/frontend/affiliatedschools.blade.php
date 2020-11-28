@extends('frontend.layouts.master')
@section('title', 'Affiliated Schools')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{url(
    'frontend/images/bredcrum-bg.jpg'
)}});">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 text-center fadeInUp ftco-animated">
          <h1 class="mb-2 bread">Affiliated Schools</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>
<section>
    <div class="row justify-content-center">
        <div class="col-auto" style="padding: 5%">
          <table class="ui celled table" style="width:100%" id="school-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>School Code</th>
                    <th>Phone</th>
                    <th>Address</th>

                </tr>
            </thead>
        </table>

        </div>
      </div>
</section>
@endsection
