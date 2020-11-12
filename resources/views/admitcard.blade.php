<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Admit Card</title>



  </head>
  <body>

    <div class="container">
        <div class="card">
      <div class="card-header">
      EDUCATION
      <strong>SYSTEM</strong>
        <span class="float-right"> <strong>MATRICULATION EDUCATION</strong> </span><br>
        ENROLLMENT NO : <strong> {{ Str::upper($data->roll_number) }}</strong>

      </div>
      <div class="card-body">

      <div class="row mb-4">
      <div class="col-sm-6">


      <div>
     <h5> <strong>CANDIDATE DETAILS</strong></h5>
      </div>
      <div> <strong>NAME&nbsp;&nbsp;&nbsp;</strong>{{ Str::upper($data->candidate_name) }}</div>
      <div> <strong>FATHERS NAME&nbsp;&nbsp;&nbsp;</strong>{{ Str::upper($data->father_name) }}</div>
      <div> <strong>SCHOOL NAME&nbsp;&nbsp;&nbsp;</strong>{{ Str::upper($data->student->school->name) }}</div>

      <div> <strong>ADDRESS&nbsp;&nbsp;&nbsp;</strong>{{ Str::upper($data->student->address) }}</div>
      <div> <strong>CNIC / B-FORM&nbsp;&nbsp;&nbsp;</strong>{{ Str::upper($data->student->cnic) }}</div>
      <div> <strong>RELIGION&nbsp;&nbsp;&nbsp;</strong>{{ Str::upper($data->student->religion) }}</div>
      <div> <strong>GENDER&nbsp;&nbsp;&nbsp;</strong>{{ Str::upper($data->student->gender) }}</div>
      <div> <strong>DATE OF BIRTH&nbsp;&nbsp;&nbsp;</strong>{{ Str::upper($data->student->date_of_birth) }}</div>

    </div>

      <div class="col-lg-6" >
        {!! QrCode::size(120)->generate(Request::url()); !!}



      <img style="padding: 0.5%;

      border-style: solid;border-radius: 2" height='120' width='120'src="{{ asset($data->student->image) }}">



    </div>





      </div>

      <div class="table-responsive-sm">
      <table class="table table-striped">
      <thead>
      <tr>

      <th>DATE</th>
      <th>SHIFT</th>
      <th>TIMING</th>

      <th>EXAM</th>


      </tr>
      </thead>
      <tbody>
        @php
            $i = 0;
        @endphp
          @foreach ($data->request->subjects as $subject )
          <tr>

            <td class="left strong">Monday 2{{$i++}} December 2020</td>
            <td class="left strong">{{$data->request->shift->name}}</td>

            <td class="left">{{$data->request->shift->from.  '   -   '  .$data->request->shift->to}}</td>
            <td class="left">{{$subject->name}}</td>



            </tr>

          @endforeach




      </tbody>
      </table>
      </div>
      <div class="row">
      <div class="col-lg-4 col-sm-5">

      </div>

      <div class="col-lg-4 col-sm-5 ml-auto">
      <table class="table table-clear">
      <tbody>
      <tr>



      </tbody>
      </table>

      </div>

      </div>

      </div>
      </div>
      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
