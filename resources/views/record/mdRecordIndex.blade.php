@extends('layouts.app')

@section('content')
	<section class="hero is-link is-small is-bold">
	  <div class="hero-body">
	    <div class="container">
	      <h1 class="title">
	        Records of {{$patient->last_name}}, {{$patient->first_name}}
	      </h1>
	      <h2 class="subtitle">
	        The list of Records for the Patient are displayed here
	      </h2>
	    </div>
	  </div>
	</section>
	<div class="container is-fluid">
		<div class="section content">
			<div class="columns">
				<div class="column is-5 is-offset-2">
					<iframe src="https://citimedic.local/iframe" width="100%" height="300px"></iframe>
				</div>
				<div class="column is-5">
					<h2>Form:</h2>
					<form method="POST" action="">
						<div class="field">
							<div class="control has-text-centered">
								<label class="radio">
									<input type="radio" name="selectedForm" value="MC" checked>
									Medical Certificate
								</label>
								<label class="radio">
									<input type="radio" name="selectedForm" value="CA">
									Clinical Abstract
								</label>
							</div>
						</div>
						<div class="field">
							<label class="label">Body:</label>
							<div class="control">
								<textarea id="text-body" class="textarea is-primary" placeholder="Contents of the Medical certificate"></textarea>
							</div>
						</div>
						<div class="field is-grouped is-grouped-right">
							<div class="control">
								<button id="certs" class="button is-link">Generate Form</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="columns">
				<div class="column is-2">
					{{-- Reserved for Menu --}}
				</div>
				<div class="column">
					<h3>Patients</h3>
					<table class="table is-pulled-left" id="records" width="40%">
						<thead>
							<tr>
								<th>Record ID</th>
								<th>Updated at</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	
@endsection

@section('scripts')
	<script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function (){


			var table = $('#records').DataTable({
				"ajax": "{{route('retRecords', $patient->id)}}",
				"columns": [
					{
						"data":"id",
						"render": function(data, type, row){
							return '<a href="/record/' + data + '/iframe">' + data + '</a>';
						}
					},
					{
						"data": "updated_at",
						"render": function(data,type,row){
							var date = moment(data).format('MMMM Do YYYY, h:mm:ss a')
							return date;
						}
					}
				],
				"aaSorting": [],
				"columnDefs": [
				    { className: "has-text-centered", "targets": [ 0 ] }
				]
			});

			$('#certs').click(function(event) {
				event.preventDefault();
				var body = $('#text-body').val();
				var url = 'https://' + location.hostname + '/MedCert?body="' + body + '"';
				alert(encodeURIComponent(body));
			});

		});
	</script>
@endsection

@section('css')
	<style type="text/css">
		.notification:not(:last-child) {
			margin-bottom: 0 !important;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.min.css')}}">
@endsection