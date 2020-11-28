@extends('frontend.layouts.master')
@section('title', 'Tenders')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{url(
    'frontend/images/bredcrum-bg.jpg'
)}});">
<div class="overlay"></div>
<div class="container">
  <div class="row no-gutters slider-text align-items-center justify-content-center">
    <div class="col-md-9  text-center fadeInUp ftco-animated">
      <h1 class="mb-2 bread">Tender</h1>
      <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
    </div>
  </div>
</div>

</section>

<div style="padding: 10%">
<div class="container">
    <div class="row">

<!-- col-8 starts -->
        <div class="col-lg-12  col-12">
            <div class="row">
                @foreach ($data['content'] as $tender )

              <div style="padding: 2%">
                <a class="fancybox" rel="group" href="{{ url($tender->image) }}"><img height=400 width=300 src="{{ url($tender->image) }}" alt="" /></a>

                <h1 style="padding:10px">{{ ucfirst($tender->name)}}</h1>
                <h4 style="padding:10px">{{ ucfirst($tender->created_at)}}</h4>

                <hr>
              </div>



                @endforeach


       </div>
    </div>
<!-- col-8 End -->




</div>



</div>
</div>
@endsection
