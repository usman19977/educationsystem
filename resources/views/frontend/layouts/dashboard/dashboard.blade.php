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


            <div class="row">
                <div class="col-xs-3 col-md-6 col-xs-12">
                    <div class="card">
                        <div class="card-body bg-blue white">
                        <h5 style="color: white;font-weight: bold">Total Requests</h5>
                        <h5 style="color: white;font-weight: inherit">{{$data['total_requests']}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 col-md-6 col-xs-12">
                    <div class="card">
                        <div class="card-body bg-red white">
                            <h5 style="color: white;font-weight: bold">Pending Requests</h5>
                            <h5 style="color: white;font-weight: inherit">{{$data['pending_request']}}</h5>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-3 col-md-6 col-xs-12">
                    <div class="card">
                        <div class="card-body bg-success white">

                            <h5 style="color: white;font-weight: bold">Approved Requests</h5>
                            <h5 style="color: white;font-weight: inherit">{{$data['approved_request']}}</h5>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-6 col-xs-12">
                    <div class="card">
                        <div class="card-body bg-amber white" >

                            <h5 style="color: white;font-weight: bold">Admit Cards</h5>
                            <h5 style="color: white;font-weight: inherit">{{$data['admit_card']}}</h5>

                        </div>
                    </div>
                </div>
            </div>

        <div>

    </div>

    </div>
</section>
@endsection




