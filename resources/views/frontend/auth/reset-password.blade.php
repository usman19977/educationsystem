@extends('frontend.layouts.master')
@section('title', 'Authentication')
@section('content')
<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-6 p-4 p-md-5 order-md-last bg-light" align="center">
                <h1 class="navbar-brand" style="font-size: 100px;"> RESET<h1>
            </div>
            <div class="col-md-6 p-4 p-md-5 order-md-last bg-light ">
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                <input name="token" type="hidden" value="{{ $request->route('token')}}">
    <div class="form-group">


          <input type="email"
          class="form-control @error('email') is-invalid @enderror"
          name="email" value="{{ $request->email }}"
          >

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>





  <div class="form-group">


    <input  type="password"
    placeholder="New Password"
    class="form-control @error('password') is-invalid @enderror"
    name="password"
    required
    autocomplete="new-password">

    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>


<div class="form-group">


    <input  type="password"
    placeholder="Confrim Password"
    class="form-control"
    name="password_confirmation"
    required
    autocomplete="new-password">

</div>





      <div class="form-group">
        <input type="submit" value=" {{ __('Reset Password') }}" class="btn btn-primary py-3 px-5">
      </div>
    </form>
            </div>


        </div>
    </div>
</section>
@endsection
