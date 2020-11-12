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
                    @csrf
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
        required autocomplete="current-password" placeholder="Your Password" required>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember"
                   id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
    </div>

    @if (Route::has('password.request'))
    <div align="right">
    <a  href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
</div>
    @endif
      <div class="form-group">
        <input type="submit" value="Login" class="btn btn-primary py-3 px-5">
      </div>
    </form>
            </div>


        </div>
    </div>
</section>
@endsection
