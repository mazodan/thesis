<h1>Patient Information</h1>
				<form method="POST" action="{{route('patient.update', $patient->id)}}">
					{{ csrf_field() }}
					{{ method_field('PUT') }}

					<div class="columns">
						<div class="column">
							<div class="field">
							    <label class="label">First Name<span class="has-text-danger">*</span></label>
  								<div class="control">
    								<input name="first_name" class="input" type="text" value="{{ $patient->first_name }}" required>
                                    @if ($errors->has('first_name'))
                                        <p class="help is-danger has-text-weight-bold">
                                            {{ $errors->first('first_name') }}
                                        </p>
                                    @endif
  								</div>
							</div>
						</div>
						<div class="column">
							<div class="field">
  								<label class="label">Last Name<span class="has-text-danger">*</span></label>
  								<div class="control">
    								<input class="input" type="text" name="last_name" value="{{ $patient->last_name }}" required>
  								</div>
  								@if ($errors->has('last_name'))
                                    <p class="help is-danger has-text-weight-bold">
                                        {{ $errors->first('last_name') }}
                                    </p>
                                @endif
							</div>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<div class="field">
							    <label class="label">Age<span class="has-text-danger">*</span></label>
  								<div class="control">
    								<input class="input" type="text" name="age" value="{{ $patient->age }}" required>
  								</div>
  								@if ($errors->has('age'))
                                    <p class="help is-danger has-text-weight-bold">
                                        {{ $errors->first('age') }}
                                    </p>
                                @endif
							</div>
						</div>
						<div class="column">
							<div class="field">
							    <label class="label">Sex<span class="has-text-danger">*</span></label>
  								<div class="control">
    								<div class="select">
    									<select name="sex" required>
    										<option selected value="{{$patient->sex}}">{{$patient->sex}}</option>
    										<option disabled>&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;</option>
    										<option>Male</option>
    										<option>Female</option>
    									</select>
    								</div>
  								</div>
  								@if ($errors->has('sex'))
                                    <p class="help is-danger has-text-weight-bold">
                                        {{ $errors->first('sex') }}
                                    </p>
                                @endif
							</div>
						</div>
						<div class="column">
							<div class="field">
							    <label class="label">Status<span class="has-text-danger">*</span></label>
  								<div class="control">
    								<div class="select">
    									<select name="status" required>
    										<option selected value="{{$patient->status}}">{{$patient->status}}</option>
    										<option disabled>&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;</option>
    										<option>Single</option>
    										<option>Married</option>
    										<option>Widowed</option>
    									</select>
    								</div>
  								</div>
  								@if ($errors->has('status'))
                                    <p class="help is-danger has-text-weight-bold">
                                        {{ $errors->first('status') }}
                                    </p>
                                @endif
							</div>
						</div>
						<div class="column">
							<label class="label">Height</label>
							<div class="field has-addons">
								<div class="control">
    								<input id="cm" name="cm" class="input is-hidden disabled" type="text" placeholder="cm">
  								</div>
							    <div class="control">
    								<input id="ft" name="ft" class="input" type="text" placeholder="ft" value="{{ (int) ($patient->height / 12) }}">
  								</div>
  								<div class="control">
    								<input id="in" name="in" class="input" type="text" placeholder="in" value="{{ $patient->height % 12 }}">
  								</div>
  								<div class="control">
  									<div class="select is-link">
    									<select id="height">
    										<option>ft in</option>
    										<option>cm</option>
    									</select>
    								</div>
  								</div>
							</div>
							@if ($errors->has('cm'))
	                            <p class="help is-danger has-text-weight-bold">
	                                {{ $errors->first('cm') }}
	                            </p>
		                    @endif
		                    @if ($errors->has('ft'))
	                            <p class="help is-danger has-text-weight-bold">
	                                {{ $errors->first('ft') }}
	                            </p>
		                    @endif
		                    @if ($errors->has('in'))
	                            <p class="help is-danger has-text-weight-bold">
	                                {{ $errors->first('in') }}
	                            </p>
		                    @endif
						</div>
						<div class="column">
							<div class="field">
							    <label class="label">Weight</label>
  								<div class="control">
    								<input class="input" type="text" name="weight" value="{{ $patient->weight }}">
  								</div>
  								@if ($errors->has('weight'))
		                            <p class="help is-danger has-text-weight-bold">
		                                {{ $errors->first('weight') }}
		                            </p>
			                    @endif
							</div>
						</div>
						<div class="column">
							<div class="field">
							    <label class="label">Birthday<span class="has-text-danger">*</span></label>
  								<div class="control">
    								<input name="birthday" class="input" type="date" required value="{{ $patient->birthday }}">
  								</div>
  								@if ($errors->has('birthday'))
                                    <p class="help is-danger has-text-weight-bold">
                                        {{ $errors->first('birthday') }}
                                    </p>
                                @endif
							</div>
						</div>
					</div>
					<div class="field">
					    <label class="label">Address<span class="has-text-danger">*</span></label>
						<div class="control">
							<input class="input" type="text" required name="home_address" value="{{ $patient->home_address }}">
						</div>
						@if ($errors->has('home_address'))
                            <p class="help is-danger has-text-weight-bold">
                                {{ $errors->first('home_address') }}
                            </p>
                        @endif
					</div>
					<div class="field">
					    <label class="label">Work Address</label>
						<div class="control">
							<input class="input" type="text" name="work_address" value="{{ $patient->work_address }}">
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<div class="field">
								<label class="label">Occupation</label>
								<div class="control">
									<input class="input" type="text" name="occupation" value="{{ $patient->occupation }}">
								</div>
							</div>
						</div>
						<div class="column">
							<div class="field">
								<label class="label">Email Address</label>
								<div class="control">
									<input class="input" type="email" name="email" value="{{ $patient->email }}">
								</div>
							</div>
						</div>
						<div class="column">
							<div class="field">
								<label class="label">Home Number</label>
								<div class="control">
									<input class="input" type="text" name="home_number" value="{{ $patient->home_number }}">
								</div>
							</div>
						</div>
						<div class="column">
							<div class="field">
								<label class="label">Work Number</label>
								<div class="control">
									<input class="input" type="text" name="work_number" value="{{ $patient->work_number }}">
								</div>
							</div>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<div class="field">
								<label class="label">Mobile Number</label>
								<div class="control">
									<input class="input" type="text" name="mobile_number" value="{{ $patient->mobile_number }}">
								</div>
							</div>
						</div>
						<div class="column">
							<div class="field">
								<label class="label">Person to notify <small>(in case of emergencies)</small></label>
								<div class="control">
									<input class="input" type="text" name="person_to_notify" value="{{ $patient->person_to_notify }}">
								</div>
							</div>
						</div>
						<div class="column">
							<div class="field">
								<label class="label">Emergency Contact No.</label>
								<div class="control">
									<input class="input" type="text" name="emergency_contact_number" value="{{ $patient->emergency_contact_number }}">
								</div>
							</div>
						</div>
					</div>
					<div class="field is-grouped">
						<div class="control">
							<button type="submit" class="button is-link is-large">Update Patient</button>
						</div>
						<p class="has-text-danger has-text-weight-bold">* required</p>
					</div>
				</form>