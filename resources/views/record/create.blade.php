@extends('layouts.app')

@section('content')
	<section class="hero is-link is-small is-bold">
	  <div class="hero-body">
	    <div class="container">
	      <h1 class="title">
	        New Medical Record
	      </h1>
	      <h2 class="subtitle">
	        Place patient medical record in this form
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
						<p><strong>Date: </strong>{{ Carbon\Carbon::now()->toFormattedDateString() }}</p>
						<div class="columns">
							<div class="column is-4">
								<p class="is-size-5"><strong>Name: </strong>{{session('last_name')}}, {{session('first_name')}}</p>
							</div>
							<div class="column is-3">
								<p class="is-size-5"><strong>Sex: </strong> {{session('sex')}}</p>
								<p class="is-size-5"><strong>Height: </strong>{{(int) (session('height') / 12)}} ft {{session('height') % 12}} in</p>				
							</div>
							<div class="column is-2">
								<p class="is-size-5"><strong>Age:</strong> {{session('age')}}</p>
								<p class="is-size-5"><strong>Weight:</strong> {{session('weight')}} kg</p>
							</div>
							<div class="column is-3">
								<p class="is-size-5"><strong>Status:</strong> {{session('status')}}</p>
							</div>
						</div>
						<form method="POST" action="{{route('record.store')}}">
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
	</script>
@endsection