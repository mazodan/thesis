@extends('layouts.app')

@section('content')
	<section class="hero is-link is-bold">
	  <div class="hero-body">
	    <div class="container">
	      <h1 class="title">
	        Patient Records
	      </h1>
	      <h2 class="subtitle">
	        Patient records are displayed here
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
					<h3>Patient Records</h3>
					<table class="table" id="records" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Patient</th>
								<th>Age</th>
								<th>Sex</th>
								<th>Mobile Number</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>

	{{-- Modal Test --}}
	<div id="destroy" class="modal">
		<div class="modal-background"></div>
		<div class="modal-card">
			<header class="modal-card-head">
				<p class="modal-card-title is-danger">Warning</p>
				<button class="delete" aria-label="close"></button>
			</header>
			<section class="modal-card-body">
				<p>This Record will be permanently deleted and this action cannot be reversed</p>
				<p>Proceed?</p>
			</section>
			<footer class="modal-card-foot">
		      <button id="remove" class="button is-danger">Delete</button>
		      <button id="cancel" class="button">Cancel</button>
		    </footer>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function (){
			var userID = {};	//Store UserID, depends if User wants to delete

			function assignDataID(id) {
				userID.id = id;
			}

			function assignRowIndex(indx) {
				userID.indx = indx;
			}

			function deleteRecord(){
				// Delete by ID using AJAX
			    $.ajax({
			    	headers: {
			    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    	},
			    	url: "record/"+userID.id,
			    	method: "DELETE",
			    	success: function (data) {
						console.log(data);
					},
					error: function (error) {
						alert(JSON.stringify(error));
					}
			    });
			} 



			var table = $('#records').DataTable({
				"ajax": "{{route('getRecords')}}",
				"columns": [
					{"data": "id"},
					{
						"data": "patient",
						"render": function(data, type, row){
							return '<a href="record/' + row.id + '">' + data.last_name + ', ' + data.first_name + '</a>';
							// return data.last_name + ', ' + data.first_name;
						}
					},
					{
						"data": "patient",
						"render": function(data, type, row){
							return data.age;
						}
					},
					{
						"data": "patient",
						"render": function(data, type, row){
							return data.sex;
						}
					},
					{
						"data": "patient",
						"render": function(data, type, row){
							return data.mobile_number;
						}
					},
					{
						"data": "updated_at",
						"render": function(data,type,row){
							var d = new Date(data);
							var n = d.toLocaleString();
							return n;
						}
					},
					{
						"data": "id",
						"render": function(data, type, row){
							return '<a class="button is-info is-small" href="record/'+ data +'/edit" >' + "Edit" + '</a>&nbsp;<a class="button is-danger is-small destroy" data-id="'+ data +'" >' + "Delete" + '</a>';
						}
					}
				],
				"aaSorting": []
			});

			$('#records tbody').on( 'click', '.destroy', function () {
				$('#destroy').toggleClass('is-active');
				assignRowIndex($(this).closest('tr').index());
				assignDataID($(this).data('id'));
			});
			$('#cancel, .delete').click(function() {
				$('#destroy').toggleClass('is-active');
			});

			$('#remove').click(function() {
				deleteRecord();
				table
			    	.row( userID.indx )
			        .remove()
			        .draw();
				$('#destroy').toggleClass('is-active');
			});


			// Jquery pseudocode

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