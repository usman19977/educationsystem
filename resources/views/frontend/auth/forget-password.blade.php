@extends('frontend.layouts.master')
@section('title', 'Authentication')
@section('content')
<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-6 p-4 p-md-5 order-md-last bg-light" align="center">
                <h1 class="navbar-brand" style="font-size: 100px;"> FORGET<h1>
            </div>
            <div class="col-md-6 p-4 p-md-5 order-md-last bg-light ">
                @if(session('status'))
                        <div class="alert alert-success" role="alert">
                        {{session('status')}}
                        </div>
                @endif
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
      <div class="form-group">
        <input
        type="email"
        class="form-control
         @error('email') is-invalid @enderror"
         name="email" value="{{ old('email') }}"
         placeholder="Your Email"
          required autocomplete="email" autofocus>


        @error('email')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>



      <div class="form-group">
        <input type="submit" value=" {{ __('Send Password Reset Link') }}" class="btn btn-primary py-3 px-5" >
      </div>
    </form>
            </div>


        </div>
    </div>
</section>
@endsection
