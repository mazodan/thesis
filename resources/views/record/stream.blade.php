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


    </head>
	<body>
		<div class="container">
            <div class="section content">
                <h4 class="has-text-centered">Citimedic Medical Arts</h4>
                <h5 class="has-text-centered">Patient Record</h5>
                <br>
                <h6 class="has-text-right"><b>Date</b>: {{ Carbon\Carbon::parse($record->updated_at)->toFormattedDateString() }}</h6>
                <br>
                <p><b>Name</b>: <u>{{$record->patient->last_name}}, {{$record->patient->first_name}}</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Age</b>: <u>{{$record->age}}</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Sex</b>: <u>{{$record->patient->sex}}</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Status</b>: <u>{{$record->status}}</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Height</b>: <u>{{(int) ($record->height / 12)}} ft {{$record->height % 12}} in</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Weight</b>: <u>{{$record->weight}} kg</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Birthday</b>: <u>{{ Carbon\Carbon::parse($record->patient->birthday)->toFormattedDateString() }}</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Occupation</b>: <u>{{$record->patient->occupation}}</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Email</b>: <u>{{$record->patient->email}}</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Landline</b>: <u>{{$record->patient->home_number}}</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Mobile</b>: <u>{{$record->patient->mobile_number}}</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Work Number</b>: <u>{{$record->patient->work_number}}</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Emergency Contact no</b>: <u>{{$record->patient->emergency_contact_number}}</u>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Person to notify <small>In case of emergency</small>: <u>{{$record->patient->person_to_notify}}</u>&nbsp;&nbsp;&nbsp;&nbsp;</p>

                <p><b>Address</b>: <u>{{$record->patient->home_address}}</u>&nbsp;&nbsp;&nbsp;&nbsp;<b>Work Address</b>: <u>{{$record->patient->work_address}}</u></p>
                <br>
                <h5>Notes:</h5>
                <div class="section">
                    {!! $record->notes !!}
                </div>

                

            </div>
        </div>
	</body>
</html>