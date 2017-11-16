@extends('layouts.app')

@section('content')
	<section class="hero is-link is-small is-bold">
	  <div class="hero-body">
	    <div class="container">
	      <h1 class="title">
	        {{$record->patient->last_name}}, {{$record->patient->first_name}} - {{$record->updated_at->toDayDateTimeString()}}
	      </h1>
	      <h2 class="subtitle">
	        The record is displayed here
	      </h2>
	    </div>
	  </div>
	</section>
	<div class="container is-fluid">
		<div class="section content">
			<div class="columns">
				<div class="column is-2">
					{{-- Reserve For Menu --}}
				</div>
				<div class="column">
					<h3>Basic Information</h3>
					<div class="tile is-ancestor">
						<div class="tile is-parent is-3">
							<p class="tile is-child"><strong>Name: </strong>{{$record->patient->last_name}}, {{$record->patient->first_name}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Age: </strong>{{$record->age}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Sex: </strong>{{$record->patient->sex}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Status: </strong>{{$record->status}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Height: </strong>{{(int) ($record->height / 12)}} ft {{$record->height % 12}} in</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Weight: </strong>{{$record->weight}} kg</p>
						</div>
					</div>
					<div class="tile is-ancestor">
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Birthday: </strong>{{ Carbon\Carbon::parse($record->patient->birthday)->toFormattedDateString() }}</p>
						</div>
						<div class="tile is-parent is-3">
							<p class="tile is-child"><strong>Occupation: </strong>{{$record->patient->occupation}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Email: </strong>{{$record->patient->email}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Landline: </strong>{{$record->patient->home_number}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Mobile: </strong>{{$record->patient->mobile_number}}</p>
						</div>
					</div>
					<div class="tile is-ancestor">
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Work Number: </strong>{{$record->patient->work_number}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Emergency Contact no: </strong>{{$record->patient->emergency_contact_number}}011899922848</p>
						</div>
						<div class="tile is-parent is-6">
							<p class="tile is-child"><strong>Person to notify <small>In case of emergency</small>: </strong>{{$record->patient->person_to_notify}}</p>
						</div>
					</div>
					<div class="tile is-ancestor">
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Address: </strong>{{$record->patient->home_address}}</p>
						</div>
					</div>
					<div class="tile is-ancestor">
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Work Address: </strong>{{$record->patient->work_address}}</p>
						</div>
					</div>
					<h3>Notes</h3>
					<div class="section">
						{!! $record->notes !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection