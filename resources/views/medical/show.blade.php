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
                <h5 class="has-text-centered"><strong>Citimedic Medical Arts </strong></h5>
                
                <h5 class="has-text-centered">Medical Certifircate</h5>
                <h6>Patient: Dan Mikko S. Mazo</h6>
                <p>This Medical Certificate certifies that Dan Mikko S. Mazo has suffered a certain migrane that caused him to miss his classes, please excuse him</p>
                <br>

                <div class="columns">
                    <div class="column is-4 is-offset-8">
                        <h6 class="has-text-centered">Signature above printed name</h6>
                        <h5 class="has-text-centered">Physician</h5>
                    </div>
                </div>

                {{-- 
                <h3 class="has-text-centered">Hello From Bulma CSS</h3>
                <p>Lorem ipsum Dolor sit amet </p>
                <p>This is for letter, nor A4 and Legal</p> --}}
            </div>
        </div>
	</body>
</html>