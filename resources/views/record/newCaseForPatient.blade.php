@extends('layouts.app')

@section('content')
	<section class="hero is-link is-small is-bold">
	  <div class="hero-body">
	    <div class="container">
	      <h1 class="title">
	        {{$patient->last_name}}, {{$patient->first_name}}
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
							<p class="tile is-child"><strong>Name: </strong>{{$patient->last_name}}, {{$patient->first_name}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Age: </strong>{{$patient->age}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Sex: </strong>{{$patient->sex}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Status: </strong>{{$patient->status}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Height: </strong>{{(int) ($patient->height / 12)}} ft {{$patient->height % 12}} in</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Weight: </strong>{{$patient->weight}} kg</p>
						</div>
					</div>
					<div class="tile is-ancestor">
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Birthday: </strong>{{ Carbon\Carbon::parse($patient->birthday)->toFormattedDateString() }}</p>
						</div>
						<div class="tile is-parent is-3">
							<p class="tile is-child"><strong>Occupation: </strong>{{$patient->occupation}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Email: </strong>{{$patient->email}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Landline: </strong>{{$patient->home_number}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Mobile: </strong>{{$patient->mobile_number}}</p>
						</div>
					</div>
					<div class="tile is-ancestor">
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Work Number: </strong>{{$patient->work_number}}</p>
						</div>
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Emergency Contact no: </strong>{{$patient->emergency_contact_number}}011899922848</p>
						</div>
						<div class="tile is-parent is-6">
							<p class="tile is-child"><strong>Person to notify <small>In case of emergency</small>: </strong>{{$patient->person_to_notify}}</p>
						</div>
					</div>
					<div class="tile is-ancestor">
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Address: </strong>{{$patient->home_address}}</p>
						</div>
					</div>
					<div class="tile is-ancestor">
						<div class="tile is-parent">
							<p class="tile is-child"><strong>Work Address: </strong>{{$patient->work_address}}</p>
						</div>
					</div>
					<h3>Notes</h3>
					<div class="section">
						<form method="POST" action="{{route('newRecord', $patient->id)}}">
							{{csrf_field()}}
							<div class="field">
								<label class="label">Notes: </label>
								<div class="control">
									@if ($errors->has('notes'))
			                            <p class="help is-danger has-text-weight-bold">
			                                {{ $errors->first('notes') }}
			                            </p>
				                    @endif
									<div class="content">
										<textarea name="notes" id="recordNotes" class="textarea" required></textarea>
									</div>
								</div>
							</div>
							<div class="field is-grouped">
								<p class="control">
									<button type="submit" class="button is-link is-large">Add Record</button>
								</p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		CKEDITOR.replace('recordNotes');
	</script>
@endsection