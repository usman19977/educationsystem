@extends('frontend.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
        <div class="container">
            <div class="row d-flex align-items-stretch no-gutters">
                <div class="col-md-3 p-4 p-md-5 order-md-last" style=" background-color: #0d1128;">
                    @include('frontend.layouts.partials.dashboard-nav')
                </div>

                <div class="col-md-9 p-4 p-md-5 order-md-last bg-light">
                    <div class="container">

                        <h2>Create Carier Request
                            <a type="button" href={{ url()->previous() }}
                                class="btn btn-outline-primary float-right">Back</a>
                        </h2>
                        <form method="POST" action="{{ route('carier-request.store') }}">
                            @csrf
                            @if ($message = Session::get('successCreateCarierRequest'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <div class="form-group">
                                <select name="shifts" class="form-control input-lg dynamic" data-dependent="state"
                                    id="shift_select" required>
                                    <option value="">Select Shift</option>
                                    @foreach ($shift as $shiftz)
                                        <option value="{{ $shiftz->id }}">{{ $shiftz->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="criteria" class="form-control input-lg dynamic" data-dependent="state"
                                    id="criteria_select" onchange="change_criteria_combo_function(this);" required>
                                    <option value="">Select Criteria</option>
                                    @foreach ($criterias as $criteria)
                                        <option value="{{ $criteria->id }}">{{ $criteria->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-lg">
                                <h2>Subjects : </h2>
                                <div align="center" id="select_criteria_heading">
                                    <h2 style="color: olivedrab"> SELECT CRITERIA<h2>
                                </div>
                                <div align="center" id="loader" style="display: none">
                                    <img src="{{ url('frontend/images/loader.gif') }}">
                                </div>
                                <div class="row">

                                    <div id="result" style="display: none" class="row justify-content-center">

                                    </div>


                                </div>


                            </div>
                            <div class="form-group" id="submitbutton" style="display: none">
                                <input type="submit" value="Create Carier Request" class="btn btn-primary float-right"
                                    style="font-size: 0.5cm">
                            </div>
                        </form>


                    </div>

                    <div>

                    </div>

                </div>
    </section>

@endsection
