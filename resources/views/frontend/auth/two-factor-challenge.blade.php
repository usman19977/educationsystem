@extends('frontend.layouts.master')
@section('title', 'Authentication')
@section('content')
<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-6 p-4 p-md-5 order-md-last bg-light" align="center">
                <h1 class="navbar-brand" style="font-size: 40px;"> 2FA CODE<h1>
            </div>
            <div class="col-md-6 p-4 p-md-5 order-md-last bg-light" align="right">
            <form action="{{ url('/two-factor-challenge')}}" method="POST">
                    @csrf

      <div class="form-group">
        <input type="text"  class="form-control" name="code"
        required autocomplete="code" placeholder="Enter the 2FA code" required>

    </div>

      <div class="form-group">
        <input type="submit" value="Confrim code" class="btn btn-primary py-3 px-5">
      </div>
    </form>
<hr>
    <form action="{{ url('/two-factor-challenge')}}" method="POST">
        @csrf

<div class="form-group">
<input type="text"  class="form-control" name="recovery_code"
required autocomplete="recovery_code" placeholder="Enter the 2FA backup recovery code" required>

</div>

<div class="form-group">
<input type="submit" value="Confrim code" class="btn btn-primary py-3 px-5">
</div>
</form>
            </div>


        </div>
    </div>
</section>
@endsection
