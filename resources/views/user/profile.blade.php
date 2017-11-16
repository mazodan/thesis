@extends('layouts.app')

@section('content')
	<section class="hero is-info is-bold">
	  <div class="hero-body">
	    <div class="container">
	      <h1 class="title">
	        Edit Profile
	      </h1>
	      <h2 class="subtitle">
	        Update your profile here
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
		            	<form method="POST" action="{{route('putProfile')}}">
                        {{ csrf_field() }}
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Name:</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <p class="help has-text-weight-bold">First Name</p>
                                        <input class="input" id="fname" type="text" name="fname" value="{{ Auth::user()->fname }}"
                                               required autofocus placeholder="First Name">
                                    </p>

                                    @if ($errors->has('fname'))
                                        <p class="help is-danger has-text-weight-bold">
                                            {{ $errors->first('fname') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="field">
                                    <p class="control">
                                        <p class="help has-text-weight-bold">Last Name</p>
                                        <input class="input" id="lname" type="text" name="lname" value="{{ Auth::user()->lname }}"
                                               required autofocus placeholder="Last Name">
                                    </p>

                                    @if ($errors->has('lname'))
                                        <p class="help is-danger has-text-weight-bold">
                                            {{ $errors->first('lname') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">E-mail Address</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="email" type="email" name="email"
                                               value="{{ Auth::user()->email }}" required autofocus>
                                    </p>

                                    @if ($errors->has('email'))
                                        <p class="help is-danger has-text-weight-bold">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Specialty</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <div class="select">
                                            <select id="specialty" name="specialty" required>
                                            	<option selected value="{{Auth::user()->specialty}}">{{Auth::user()->specialty}}</option>
                                                <option value="Allergy and immunology">Allergy and immunology</option>
                                                <option value="Adolescent medicine">Adolescent medicine</option>
                                                <option value="Anaesthesiology">Anaesthesiology</option>
                                                <option value="Aerospace medicine">Aerospace medicine</option>
                                                <option value="Pathology">Pathology</option>
                                                <option value="Cardiology">Cardiology</option>
                                                <option value="Cardiothoracic surgery">Cardiothoracic surgery</option>
                                                <option value="Child and Adolescent Psychiatry and Psychotherapy">Child and Adolescent Psychiatry and Psychotherapy</option>
                                                <option value="Clinical neurophysiology">Clinical neurophysiology</option>
                                                <option value="Colon and Rectal Surgery">Colon and Rectal Surgery</option>
                                                <option value="Dermatology-Venereology">Dermatology-Venereology</option>
                                                <option value="Emergency medicine">Emergency medicine</option>
                                                <option value="Endocrinology">Endocrinology</option>
                                                <option value="Gastroenterology">Gastroenterology</option>
                                                <option value="General practice">General practice</option>
                                                <option value="Geriatrics">Geriatrics</option>
                                                <option value="Obstetrics and Gynaecology">Obstetrics and Gynaecology</option>
                                                <option value="Infectious disease">Infectious disease</option>
                                                <option value="Internal medicine">Internal medicine</option>
                                                <option value="Interventional radiology">Interventional radiology</option>
                                                <option value="Vascular medicine">Vascular medicine</option>
                                                <option value="Nephrology">Nephrology</option>
                                                <option value="Neurology">Neurology</option>
                                                <option value="Neurosurgery">Neurosurgery</option>
                                                <option value="Occupational medicine">Occupational medicine</option>
                                                <option value="Ophthalmology">Ophthalmology</option>
                                                <option value="Orthodontics">Orthodontics</option>
                                                <option value="Orthopaedics">Orthopaedics</option>
                                                <option value="Oral and maxillofacial surgery">Oral and maxillofacial surgery</option>
                                                <option value="Otorhinolaryngology">Otorhinolaryngology</option>
                                                <option value="Paediatrics">Paediatrics</option>
                                                <option value="Paediatric surgery">Paediatric surgery</option>
                                                <option value="Physiatry">Physiatry</option>
                                                <option value="Pulmonology">Pulmonology</option>
                                                <option value="Psychiatry">Psychiatry</option>
                                                <option value="Public Health">Public Health</option>
                                                <option value="Radiology">Radiology</option>
                                                <option value="Neuroradiology">Neuroradiology</option>
                                                <option value="General surgery">General surgery</option>
                                                <option value="Urology">Urology</option>
                                                <option value="Vascular surgery">Vascular surgery</option>
                                            </select>
                                        </div>
                                    </p>

                                    @if ($errors->has('specialty'))
                                        <p class="help is-danger">
                                            {{ $errors->first('specialty') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
		            	<input type="hidden" name="_method" value="PUT">

                        <div class="field is-horizontal">
                            <div class="field-label"></div>

                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button is-primary">Update Profile</button>
                                    </div>
                                    <div class="control">
                                        <a href="/password" class="button is-warning">Change Password</a>
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