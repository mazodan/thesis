@extends('layouts.app')

@section('content')
	<section class="hero is-warning is-small is-bold">
	  <div class="hero-body">
	    <div class="container">
	      <h1 class="title">
	        Edit Patient
	      </h1>
	      <h2 class="subtitle">
	        Edit patient information in this form <br><br>
	        Note: Some data in Patients Records will not be Modified, as these data is preserved within the context of 
	        the record during the time of the records creation. You will have to modify the record yourself should you want to change the data in the Patients Record.
	      </h2>
	    </div>
	  </div>
	</section>
	<div class="container is-fluid">
		<div class="section">
			<div class="content">
				<div class="columns">
					<div class="column">
						@include('patient.editPatientForm')
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
{{-- <script type="text/javascript">
	$('document').ready(function (){
		$('#height').change(function (){
			var val = $('#height').val();
			if (val == 'cm') {
				$('#cm').toggleClass('is-hidden');
				$('#ft').toggleClass('is-hidden');
				$('#in').toggleClass('is-hidden');
				$('#ft').val('');
				$('#in').val('');
			} else {
				$('#cm').toggleClass('is-hidden');
				$('#ft').toggleClass('is-hidden');
				$('#in').toggleClass('is-hidden');
				$('#cm').val('');
			}
		})
	});
</script> --}}
@endsection
