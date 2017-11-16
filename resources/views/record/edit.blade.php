@extends('layouts.app')

@section('content')
	<section class="hero is-link is-small is-bold">
	  <div class="hero-body">
	    <div class="container">
	      <h1 class="title">
	        Edit Medical Record of {{$record->patient->last_name}}, {{$record->patient->first_name}} - {{$record->updated_at->toDayDateTimeString()}}
	      </h1>
	      <h2 class="subtitle">
	        Note: This would change the record permanently, If you want to update the Patients Record and Preserve the Personal data inside the record, Choose Returning Patients in the Dashboard
	      </h2>
	    </div>
	  </div>
	</section>
	<div class="container is-fluid">
		<div class="section">
			<div class="content">
				<div class="columns">
					<div class="column is-2">
						{{-- Sidebar --}}
					</div>
					<div class="column">
		 				<h1>Patient Record</h1>
						{{-- Put Main form here --}}
						<p><strong>Date: </strong>{{ Carbon\Carbon::parse($record->created_at)->toFormattedDateString() }}</p>
						
						<form method="POST" action="{{route('record.update', $record->id)}}">
							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<div class="columns">
								<div class="column is-4">
									<p class="is-size-5"><strong>First Name: </strong><input class="input" type="text" name="first_name" value="{{$record->patient->first_name}}"><strong>Last Name: </strong> <input class="input" type="text" name="last_name" value="{{$record->patient->last_name}}"></p>
								</div>
								<div class="column is-2">
									<p class="is-size-5"><strong>Sex: </strong> <input class="input" type="text" name="sex" value="{{$record->patient->sex}}"></p>
									<div class="is-size-5">
										<strong>Height: </strong>
										<div class="field has-addons">
											<div class="control">
			    								<input id="cm" name="cm" class="input is-hidden disabled" type="text" placeholder="cm">
			  								</div>
										    <div class="control">
			    								<input id="ft" name="ft" class="input" type="text" placeholder="ft" value="{{(int) ($record->height / 12)}}">
			  								</div>
			  								<div class="control">
			    								<input id="in" name="in" class="input" type="text" placeholder="in" value="{{$record->height % 12}}">
			  								</div>
			  								<div class="control">
			  									<div class="select is-link">
			    									<select id="height">
			    										<option>ft in</option>
			    										<option>cm</option>
			    									</select>
			    								</div>
			  								</div>
			  							</div>
									</div>				
								</div>
								<div class="column is-1">
									<p class="is-size-5"><strong>Age:</strong> <input class="input" type="text" name="age" value="{{$record->age}}"></p>
									<p class="is-size-5"><strong>Weight:</strong> <input class="input" type="text" name="weight" value="{{$record->weight}}"></p>
								</div>
								<div class="column is-2">
									<div class="is-size-5"><strong>Status:</strong>
										<div class="select">
	    									<select name="status" required>
	    										<option selected value="{{$record->status}}">{{$record->status}}</option>
	    										<option disabled>&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;</option>
	    										<option value="Single">Single</option>
	    										<option value="Married">Married</option>
	    										<option value="Widowed">Widowed</option>
	    									</select>
	    								</div>
									</div>
								</div>
							</div>
							
							<div class="field">
								<label class="label">Notes: </label>
								<div class="control">
									@if ($errors->has('notes'))
			                            <p class="help is-danger has-text-weight-bold">
			                                {{ $errors->first('notes') }}
			                            </p>
				                    @endif
									<div class="content">
										<textarea name="notes" id="recordNotes" class="textarea" required>{{$record->notes}}</textarea>
									</div>
								</div>
							</div>
							<div class="field is-grouped">
								<p class="control">
									<button type="submit" class="button is-link is-large">Submit</button>
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

		$('document').ready(function (){
		$('#height').change(function (){
			var val = $('#height').val();
			if (val == 'cm') {
				$('#cm').toggleClass('is-hidden');
				$('#ft').toggleClass('is-hidden');
				$('#in').toggleClass('is-hidden');
				$('#cm').toggleClass('disabled');
				$('#ft').toggleClass('disabled');
				$('#in').toggleClass('disabled');
			} else {
				$('#cm').toggleClass('is-hidden');
				$('#ft').toggleClass('is-hidden');
				$('#in').toggleClass('is-hidden');
				$('#cm').toggleClass('disabled');
				$('#ft').toggleClass('disabled');
				$('#in').toggleClass('disabled');
			}
		})
	});
	</script>
@endsection