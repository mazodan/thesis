@extends('layouts.app')

@section('content')
	<section class="hero is-link is-small is-bold">
	  <div class="hero-body">
	    <div class="container">
	      <h1 class="title">
	        Statistics
	      </h1>
	      <h2 class="subtitle">
	        Statistical information about your patients
	      </h2>
	    </div>
	  </div>
	</section>
	<div class="container is-fluid">
		<div class="content">
			<div class="columns">
				<div class="column is-half">
					<canvas id="newPatients"></canvas>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{asset('js/Chart.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
	<script type="text/javascript">
		// Jquery selector for new patient Chart
		var cnpt = $("#newPatients");

		var data = {
			labels: [],
			datasets: [{
				label: '',
				data: [],
				backgroundColor: []
			}]
		};

		var pchart = new Chart(cnpt, {
			type: 'line',
			data: data,
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'No. of Patients for the last 30 days'
				}
			}
		});

		// Use Ajax to Populate Data
		function load_patient_freq() {
			$.ajax({
				url: "record/",
				method: "GET",
				
			});
		}


	</script>
@endsection