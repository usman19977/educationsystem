@extends('frontend.layouts.master')
@section('title', 'Authentication')
@section('content')
<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-6 p-4 p-md-5 order-md-last bg-light" align="center">
                <h1 class="navbar-brand" style="font-size: 100px;"> LOGIN<h1>
            </div>
            <div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
                <form action="/login" method="POST">
      <div class="form-group">
        <input type="email" class="form-control" placeholder="Your Email" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Your Password" required>
      </div>


      <div class="form-group">
        <input type="submit" value="Login" class="btn btn-primary py-3 px-5">
      </div>
    </form>
            </div>


        </div>
    </div>
</section>
@endsection
