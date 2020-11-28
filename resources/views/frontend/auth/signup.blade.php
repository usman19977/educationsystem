@extends('frontend.layouts.master')
@section('title', 'Register')
@section('content')
    <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
        <div class="container">
            <div class="row d-flex align-items-stretch no-gutters">
                <div class="col-md-12 p-4 p-md-5 order-md-last bg-light" align="center">
                    <h1 class="justify-center" style="font-size: 30px;"> STUDENT REGISTRATION</h1>
                </div>
                <div class="col-md-12 p-4 p-md-5 order-md-last bg-light" align="center">
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-5  order-md-last bg-light float-left">
                            <div class="form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    required autocomplete="name" placeholder="Candidate Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('father_name') is-invalid @enderror"
                                    name="father_name" value="{{ old('father_name') }}" required autocomplete="father_name"
                                    autofocus placeholder="Father Name" required>
                                @error('father_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    required autocomplete="phone" placeholder="Phone" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" required autocomplete="address" placeholder="Address" required>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control @error('cnic') is-invalid @enderror" name="cnic"
                                    required autocomplete="name" placeholder="CNIC">
                                @error('cnic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('religion') is-invalid @enderror"
                                    name="religion" required autocomplete="religion" placeholder="Religion" required>
                                @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control @error('school_rollnumber') is-invalid @enderror"
                                    name="school_rollnumber" required autocomplete="school_rollnumber"
                                    placeholder="School Roll No" required>
                                @error('school_rollnumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select name="gender" class="form-control input-lg dynamic" data-dependent="state"
                                    id="gender" onchange="" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>


                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                    name="date_of_birth" value="{{ old('date_of_birth') }}" required
                                    autocomplete="date_of_birth" autofocus placeholder="Date Of Birth" required>
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select name="school_select" class="form-control input-lg dynamic" data-dependent="state"
                                    id="school_select" required>
                                    <option value="">Select School</option>
                                    @foreach ($schools as $criteria)
                                        <option value="{{ $criteria->id }}">{{ $criteria->name }}</option>
                                    @endforeach
                                </select>
                                @error('school_select')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Choose Image</label>
                                <input id="image" type="file" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>






                            <div class="form-group ">
                                <input type="submit" value="Register" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>



                        <div class="col-md-5 order-md-last bg-light float-right">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" required autocomplete="email" placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="password" placeholder="Password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" required autocomplete="password_confirmation"
                                    placeholder="Confirm Password" required>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
