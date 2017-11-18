@extends('layouts.app')

@section('content')
	<section class="hero is-link is-small is-bold">
	  <div class="hero-body">
	    <div class="container">
	      <h1 class="title">
	        Patients
	      </h1>
	      <h2 class="subtitle">
	        The list of Patients are displayed here
	      </h2>
	    </div>
	  </div>
	</section>
	<div class="container is-fluid">
		<div class="section content">
			<div class="columns">
				<div class="column is-2">
					{{-- Reserved for Menu --}}
				</div>
				<div class="column">
					<h3>Patients</h3>
					<table class="table" id="records" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Age</th>
								<th>Sex</th>
								<th>Mobile Number</th>
								<th>Landline</th>
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
	<script type="text/javascript">
		$(document).ready(function (){


			var table = $('#records').DataTable({
				"ajax": "{{route('getPatients')}}",
				"columns": [
					{"data": "id"},
					{
						"data": "name",
						"render": function(data, type, row){
							return '<a href="patient/' + row.id + '/records">' + data + '</a>';
						}
					},
					{"data": "age"},
					{"data": "sex"},
					{"data": "mobile_number"},
					{"data": "home_number"}
				],
				"aaSorting": []
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