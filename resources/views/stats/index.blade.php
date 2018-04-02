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
				<div class="column is-half">
					<canvas id="ageDist"></canvas>
				</div>
			</div>
			<div class="columns">
				<div class="column is-half">
					<canvas id="wDist"></canvas>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/Chart.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/chartPatFreq.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/chartAge.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/chartWeight.js')}}"></script>

@endsection