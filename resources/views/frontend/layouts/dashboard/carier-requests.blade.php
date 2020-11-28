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
            <div class="container">

                <h2>Carier Requests
                    <a
                    type="button"
                    href={{route('carier-request.create')}}
                    class="btn btn-outline-primary float-right">Create</a>
                </h2>

              <table class="table">
                  <thead>
                    <tr>
                      <th>School</th>
                      <th>Criteria</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($carier_requests as $request )
                  <tr>
                    <td>{{$request->school->name}}</td>
                    <td>{{$request->criteria->name}}</td>
                    <td>
                    @switch($request->status)
                        @case('Pending')
                            <span class="badge badge-warning">Pending</span>
                            @break
                        @case('Admit Card Generated')
                            <span class="badge badge-success">Approved</span>
                            @break
                        @case('Approved By School')
                            <span class="badge badge-warning">Pending Approved By School</span>
                            @break
                        @default
                            <span class="badge badge-danger">Rejected</span>
                            @break
                    @endswitch
                    </td>
                  </tr>
                  @endforeach

                  </tbody>
                </table>
              </div>

        <div>

    </div>

    </div>
</section>

@endsection




