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
						@if($flash = session('newCasePatient'))
						{{-- Put here the card with some option to skip validation. Note: set validation the same either by update or skip --}}
							<article class="message is-info">
								<div class="message-header">
									<p>Info</p>
								</div>
								<div class="message-body">
									<p>Here, You can update the Patient Information, Check if the Information is Accurate</p>
									<p><em>It will not affect some data in the Existing Records, But the Updated Data will be used for the blah</em></p>
									<p><strong>Warning: Refreshing this Page will discard making the new case, and will revert to just editing the Patient</strong></p>
								</div>
							</article>
							{{-- Embedding PHP CODE for SESSION --}}
							@php
        						// Redirects to Create Record
        						session()->flash('updateNewCasePatient', 'True'); 
							@endphp
						@endif
						@include('patient.editPatientForm')
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
<script type="text/javascript">
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
