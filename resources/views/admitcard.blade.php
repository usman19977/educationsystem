<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admit Card</title>
    <style>
        /* @font-face {
            font-family: SourceSansPro;
            src: url('css/SourceSansPro-Regular.ttf');
        } */

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #78c300;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #ffffff;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #aaaaaa;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }

        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #78c300;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087c3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 20px;
            background: #eeeeee;
            text-align: center;
            border-bottom: 1px solid #ffffff;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #57b223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #ffffff;
            font-size: 1.6em;
            background: #57b223;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #dddddd;
        }

        table .qty {}

        table .total {
            background: #57b223;
            color: #ffffff;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #ffffff;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #aaaaaa;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57b223;
            font-size: 1.4em;
            border-top: 1px solid #57b223;
        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #78c300;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #aaaaaa;
            padding: 8px 0;
            text-align: center;
        }

    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <h1>
                BSEK
                <strong>ADMIT CARD</strong>
            </h1>
            <h3>ENROLLMENT NO : <b>{{ Str::upper($data->roll_number) }}<b></h3>
        </div>
        <div id="company">
            <h2 class="name">BSEK</h2>
            <div>Dilawar Figar Road, Block 5 Nazimabad,</div>
            <div> Karachi, Karachi City, Sindh 74600</div>
            <div>+92-21-99260256</div>
            <div><a href="mailto:company@example.com">complaint@bsek.edu.pk</a></div>
        </div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">CANDIDATE DETAILS</div>
                <h2 class="name">{{ Str::upper($data->candidate_name) }}</h2>
                <div class="address">FATHER NAME : {{ Str::upper($data->father_name) }}</div>
                <div class="address">SCHOOL : {{ Str::upper($data->student->school->name) }}</div>
                <div class="address">ADDRESS : {{ Str::upper($data->student->address) }}</div>
                <div class="address">CNIC / B-FORM : {{ Str::upper($data->student->cnic) }}</div>
                <div class="address">RELIGION : {{ Str::upper($data->student->religion) }}</div>
                <div class="address">GENDER : {{ Str::upper($data->student->gender) }}</div>
                <div class="address">DATE OF BIRTH : {{ Str::upper($data->student->date_of_birth) }}</div>







            </div>
            <div id="invoice">
                {!! QrCode::size(120)->generate(Request::url()) !!}
                <img style="
      border:2px solid green;" height='120' width='120' src="{{ asset($data->student->image) }}">

            </div>


        </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="desc">EXAM</th>
                    <th class="unit">DATE</th>
                    <th class="qty">SHIFT</th>
                    <th class="total">TIMING</th>
                </tr>
            </thead>
            <tbody>

                @php
                $i = 0;
                $j=1;
                @endphp
                @foreach ($data->request->subjects as $subject)
                    <tr>

                        <td class="no">{{ $j++ }}</td>
                        <td class="desc">{{ $subject->name }}</td>
                        <td class="unit">Monday 2{{ $i++ }} December 2020</td>
                        <td class="qty">{{ $data->request->shift->name }}</td>
                        <td class="total">{{ $data->request->shift->from . '   -   ' . $data->request->shift->to }}</td>



                    </tr>

                @endforeach

            </tbody>

        </table>

    </main>
    <footer>
        Admitcard was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>
