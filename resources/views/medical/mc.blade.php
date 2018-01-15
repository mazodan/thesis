<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} {{ app()->version() }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="D:\xampp\htdocs\citimedic\public\css\app.css" media="all" />

        <style type="text/css">
            p {text-indent: 40px;}
        </style>


    </head>
	<body>
		<div class="container">
            <div class="section content">
                <h5 class="has-text-centered"><strong>Citimedic Medical Arts </strong></h5>
                
                <h5 class="has-text-centered">{{ $type }}</h5>
                <br>
                <h6 class="has-text-right"><b>Date</b>: {{ Carbon\Carbon::parse(Carbon\Carbon::now())->toFormattedDateString() }}</h6>
                <h6><b>Patient</b>: <u>{{$patient->last_name}}, {{$patient->first_name}}</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Age</b>: <u>{{$patient->age}}</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Sex</b>: <u>{{$patient->sex}}</u></h6>
                
                <div class="has-text-justified">
                    {!! $body !!}
                </div>
                <br>

                <div class="columns">
                    <div class="column is-4 is-offset-8">
                        <h6 class="has-text-centered"><b>{{auth()->user()->fname}} {{auth()->user()->lname}}, M.D.</b></h6>
                        <h5 class="has-text-centered">Physician</h5>
                    </div>
                </div>

            </div>
        </div>
	</body>
</html>