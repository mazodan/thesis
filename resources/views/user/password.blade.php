@extends('layouts.app')

@section('content')
	<section class="hero is-warning is-bold">
	  <div class="hero-body">
	    <div class="container">
	      <h1 class="title">
	        Change Password
	      </h1>
	      <h2 class="subtitle">
	        Change your password here
	      </h2>
	    </div>
	  </div>
	</section>
	<div class="container">
		<div class="columns is-marginless is-centered">
			<div class="column is-7">
				<div class="card">
					<header class="card-header">
	                    <p class="card-header-title">Update Profile</p>
		            </header>
		            <div class="card-content">
                        @if($flash = session('pass-error'))
                            <div class="notification is-danger">
                                {{$flash}}
                            </div>
                        @endif
		            	<form method="POST" action="{{route('patchPassword')}}">
                        {{ csrf_field() }}

                        <div class="field is-horizontal">
                            <div class="field-label column is-3">
                                <label class="label">Old Password</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input column is-9" id="oldPassword" type="password" name="oldPassword" required>
                                    </p>

                                    @if ($errors->has('oldPassword'))
                                        <p class="help is-danger">
                                            {{ $errors->first('oldPassword') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label column is-3">
                                <label class="label">New Password</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input column is-9" id="password" type="password" name="password" required>
                                    </p>

                                    @if ($errors->has('password'))
                                        <p class="help is-danger">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label column is-3">
                                <label class="label">Confirm New Password</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control column is-9">
                                        <input class="input" id="password-confirm" type="password"
                                               name="password_confirmation" required>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
		            	<input type="hidden" name="_method" value="PATCH">

                        <div class="field is-horizontal">
                            <div class="field-label"></div>

                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button is-warning">Update Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>

		            	</form>
		            </div>
				</div>
			</div>
		</div>
	</div>
@endsection