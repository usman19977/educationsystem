@extends('frontend.layouts.master')
@section('title', 'Register')
@section('content')
<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-6 p-4 p-md-5 order-md-last bg-light" align="center">
                <h1 class="navbar-brand" style="font-size: 100px;"> REGISTER<h1>
            </div>
            <div class="col-md-6 p-4 p-md-5 order-md-last bg-light"align="right">
            <form action="{{ route('register')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name"
                        required autocomplete="name" placeholder="Your Name" >
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
        value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your Email" required>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
     </div>
    <div class="form-group">
        <input type="password"  class="form-control @error('password') is-invalid @enderror" name="password"
        required autocomplete="password" placeholder="Your Password" required>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
      <div class="form-group">
        <input type="password"  class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
        required autocomplete="password_confirmation" placeholder="Confirm Password" required>
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>


      <div class="form-group">
        <input type="submit" value="Register" class="btn btn-primary py-3 px-5">
      </div>
    </form>
            </div>


        </div>
    </div>
</section>
@endsection
