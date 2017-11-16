@extends('layouts.app')

@section('content')
	<div class="columns">
				<div class="column is-2">
				{{-- Reserve for sidebar --}}
				</div>
				<div class="column">
					@yield('main-content')
				</div>
			</div>
	
@endsection