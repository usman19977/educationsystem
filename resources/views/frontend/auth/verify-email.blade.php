@extends('frontend.layouts.master')
@section('title', 'Apply')
@section('content')
<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">

            <div class="col-md-12 p-4 p-md-5 order-md-last bg-light"  align="center">
                @if (session('status'))

                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            <h5 class="navbar-brand" > YOU MUST VERIFY YOUR EMAIL BEFORE YOU PROCEED<h5>
                <hr>
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }}
                <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                    @csrf

<hr>
      <div class="form-group">
        <input type="submit" value="{{ __('Click here to request another') }}" class="btn btn-primary py-3 px-5">

    </div>
    </form>
            </div>


        </div>
    </div>
</section>
@endsection
