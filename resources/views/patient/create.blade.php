@extends('layouts.app')

@section('content')
	<section class="hero is-primary is-small is-bold">
	  <div class="hero-body">
	    <div class="container">
	      <h1 class="title">
	        New Patient
	      </h1>
	      <h2 class="subtitle">
	        Place patient information in this form
	      </h2>
	    </div>
	  </div>
	</section>
	<div class="container is-fluid">
		<div class="section">
			<div class="content">
				<div class="columns">
					<div class="column">
						@include('patient.patientForm')
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
</script>
@endsection
