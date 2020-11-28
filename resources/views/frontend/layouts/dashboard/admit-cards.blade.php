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

                        <h2>Admit Cards

                        </h2>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Enrollment</th>
                                    <th>Candidate Name</th>
                                    <th>Status</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admit_cards as $admitcard)
                                    <tr>
                                        <td>{{ $admitcard->roll_number }}</td>
                                        <td>{{ $admitcard->candidate_name }}</td>
                                        <td>
                                            @switch($admitcard->status)
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
                                        <td><a href="/admit-cards/{{ $admitcard->id }}/download" target="_blank">
                                                Click here to download
                                            </a> </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div>

                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
