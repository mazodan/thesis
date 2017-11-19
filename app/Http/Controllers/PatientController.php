<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Record;
use DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patient.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // Validation rules
        $this->validate(request(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'age' => 'required|integer',
            'sex' => 'required|string',
            'status' => 'required|string',
            'cm' => 'nullable|numeric',
            'ft' => 'nullable|numeric',
            'in' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'birthday' => 'required|date',
            'home_address' => 'required|string',
            'work_address' => 'nullable|string',
            'occupation' => 'nullable|string',
            'email' => 'nullable|email',
            'home_number' => 'nullable|string',
            'work_number' => 'nullable|string',
            'mobile_number' => 'nullable|string',
            'person_to_notify' => 'nullable|string',
            'emergency_contact_number' => 'nullable|string',
        ]);

        $inches = 0;

        // Filipinos use Imperial Units to measure height
        if (request('ft') !== null && request('in') !== null) {
            $inches = (request('ft') * 12) + request('in');
        } elseif (request('ft') !== null ) {
            $inches = (request('ft') * 12);
        } elseif (request('cm') !== null) {
            $inches = request('cm') / 2.54;
        }

        // BETA - Store it in session first
        // THEN - If user submits in records, GO FISH

        session([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'age' => request('age'),
            'sex' => request('sex'),
            'status' => request('status'),
            'height' => $inches,
            'weight' => request('weight'),
            'birthday' => request('birthday'),
            'home_address' => request('home_address'),
            'work_address' => request('work_address'),
            'occupation' => request('occupation'),
            'email' => request('email'),
            'home_number' => request('home_number'),
            'work_number' => request('work_number'),
            'mobile_number' => request('mobile_number'),
            'person_to_notify' => request('person_to_notify'),
            'emergency_contact_number' => request('emergency_contact_number')
        ]);

        return redirect()->route('record.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('patient.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Patient $patient)
    {

        $this->validate(request(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'age' => 'required|integer',
            'sex' => 'required|string',
            'status' => 'required|string',
            'cm' => 'nullable|numeric',
            'ft' => 'nullable|numeric',
            'in' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'birthday' => 'required|date',
            'home_address' => 'required|string',
            'work_address' => 'nullable|string',
            'occupation' => 'nullable|string',
            'email' => 'nullable|email',
            'home_number' => 'nullable|string',
            'work_number' => 'nullable|string',
            'mobile_number' => 'nullable|string',
            'person_to_notify' => 'nullable|string',
            'emergency_contact_number' => 'nullable|string',
        ]);

        $inches = 0;

        // Filipinos use Imperial Units to measure height
        if (request('ft') !== null && request('in') !== null) {
            $inches = (request('ft') * 12) + request('in');
        } elseif (request('ft') !== null ) {
            $inches = (request('ft') * 12);
        } elseif (request('cm') !== null) {
            $inches = request('cm') / 2.54;
        }

        $patient = Patient::find($patient->id);
        $patient->first_name = request('first_name');
        $patient->last_name = request('last_name');
        $patient->age = request('age');
        $patient->sex = request('sex');
        $patient->status = request('status');
        $patient->height = $inches;
        $patient->weight = request('weight');
        $patient->birthday = request('birthday');
        $patient->home_address = request('home_address');
        $patient->work_address = request('work_address');
        $patient->occupation = request('occupation');
        $patient->email = request('email');
        $patient->home_number = request('home_number');
        $patient->work_number = request('work_number');
        $patient->mobile_number = request('mobile_number');
        $patient->person_to_notify = request('person_to_notify');
        $patient->emergency_contact_number = request('emergency_contact_number');
        $patient->save();

        if ($flash = session('updateNewCasePatient')) {
            // Create new route specifically for the creation of Patient records inspired by record update of follow up patients
            // Because both of the two use sessions from patient creation or search from the created record.
            // Programming is hard work, but really rewarding.


            return redirect()->route('newCaseShow', $patient->id);
        }

        session()->flash('message', 'The Patient has been Updated');
        session()->flash('message-warn', 'Some data in the respective patient record is preserved, you will have to change it yourself in the records');

        return redirect()->route('patient.index');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        // Delete all records associated with the patient
        Record::where('patient_id', $patient->id)->delete();
        // Delete the patient
        $patient->delete();
        echo "Patient and Record of the patient is Deleted";
    }

    public function retPatientIndex()
    {
        return view('patient.retPatientIndex');
    }

    public function newCaseIndex()
    {
        return view('patient.retCasePatientIndex');
    }


    // Redirect from datatables to edit
    public function newCaseUpdate(Patient $patient)
    {
        session()->flash('newCasePatient', 'True'); 
        return redirect()->route('patient.edit', compact('patient'));
    }

    // For Ajax Calls

    public function getRecords()
    {
        // Had to use query builder to concatenate
        $patients = DB::table('patients')->select(DB::raw('id, CONCAT_WS(", ", last_name, first_name) AS name, sex, age, mobile_number, home_number'))->orderBy('id', 'desc')->get();

        $datajson = array('data' => $patients);

        return $datajson;
    }
}
