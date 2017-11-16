<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Record;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all records but only for the logged in doctor
        return view('record.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Place here the initial data and show
        // Ahh screw it, Show Everything!!!

        return view('record.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'notes' => 'required'
        ]);

        // Create the Patient record, Note, Patient ID and Doctors ID should be included

        $patient = Patient::create([
            'first_name' => session()->pull('first_name'),
            'last_name' => session()->pull('last_name'),
            'age' => session()->pull('age'),
            'sex' => session()->pull('sex'),
            'status' => session()->pull('status'),
            'height' => session()->pull('height'),
            'weight' => session()->pull('weight'),
            'birthday' => session()->pull('birthday'),
            'home_address' => session()->pull('home_address'),
            'work_address' => session()->pull('work_address'),
            'occupation' => session()->pull('occupation'),
            'email' => session()->pull('email'),
            'home_number' => session()->pull('home_number'),
            'work_number' => session()->pull('work_number'),
            'mobile_number' => session()->pull('mobile_number'),
            'person_to_notify' => session()->pull('person_to_notify'),
            'emergency_contact_number' => session()->pull('emergency_contact_number')
        ]);

        Record::create([
            'user_id' => auth()->id(),
            'patient_id' => $patient->id,
            'age' => $patient->age,
            'status' => $patient->status,
            'height' => $patient->height,
            'weight' => $patient->weight,
            'notes' => request('notes')
        ]);

        // CREATE PATIENT FROM SESSION



        session()->flash('message', 'The Patient Record has been Stored');


        return redirect()->route('record.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        return view('record.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        return view('record.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Record $record)
    {

        // Validate Inputs
        $this->validate(request(), [
            'notes' => 'required',
            'age' => 'required|integer',
            'status' => 'required|string',
            'weight' => 'nullable|numeric',
            'cm' => 'nullable|numeric',
            'ft' => 'nullable|numeric',
            'in' => 'nullable|numeric'
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

        $record = Record::find($record->id);
        $record->age = request('age');
        $record->status = request('status');
        $record->height = $inches;
        $record->weight = request('weight');
        $record->notes = request('notes');
        $record->save();

        session()->flash('message', 'The Patient Record has been Updated');

        return redirect()->route('record.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        $record->delete();
        echo "Record is Deleted";
    }

    public function getRecords()
    {
        $records = Record::with('patient')->where('user_id', auth()->id())->orderBy('updated_at', 'desc')->get();

        $datajson = array('data' => $records);

        return $datajson;
    }
}
