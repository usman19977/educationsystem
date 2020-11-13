@extends('frontend.layouts.master')
@section('title', 'Dashboard')
@section('content')
<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-3 p-4 p-md-5 order-md-last" style=" background-color: #0d1128;">
    @include('frontend.layouts.partials.dashboard-nav')
            </div>
        <div class="col-md-9 p-4 p-md-5 order-md-last bg-light" >


        <h4>Two Step Authentication</h4>
@if(!auth()->user()->two_factor_secret)
<div class="alert alert-warning" role="alert">
    You have not enabled 2FA
  </div>
  <form method="POST" action="{{ url('user/two-factor-authentication')}}">
    @csrf
        <button type="submit" class="btn btn-success">
        Enable 2FA
        </button>

    </form>


            @else
            <div class="alert alert-success" role="alert">
                2FA enabled
              </div>
              <form method="POST" action="{{ url('user/two-factor-authentication')}}">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                    Disable 2FA
                    </button>

                </form>
            @endif
            <hr>
            @if (session('status') == 'two-factor-authentication-enabled')
            <div class="alert alert-success" role="alert">
               You have now enabled 2FA , please scan the following QR code into your phone authenticator application.
              </div>
              <p>Please store these codes in somewhere save don't share with anyone<p>
              {!! auth()->user()->twoFactorQrCodeSvg() !!}
              @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes,true)) as $code)
              <br>   {{ trim($code)}}

              @endforeach
            @endif



    </div>
</section>
@endsection




