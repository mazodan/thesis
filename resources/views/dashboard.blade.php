@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="section">
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <a href="{{route('patient.create')}}" id="newPatient" class="tile is-child box">
                        <div>
                            <p style="color: #C8F93B !important;" class="title">New Patient Form</p>
                            <p class="subtitle has-text-white">For New patients</p>
                        </div>
                    </a>
                </div>
                <div class="tile is-parent">
                    <a href="{{route('retPatient')}}" id="returnPatient" class="tile is-child box">
                        <p class="title has-text-white">For Returning Patients</p>
                        <p class="subtitle has-text-white">Update their clinical records here</p>
                    </a>
                </div>
                <div class="tile is-parent">
                    <a href="{{route('newCaseIndex')}}" id="newCase" class="tile is-child box">
                        <p class="title">Returning Patients with new Case</p>
                        <p class="subtitle">Review Patient Info and go directly to consultation</p>
                    </a>     
                </div>                    
            </div>
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <div id="clinicAbstract" class="tile is-child box">
                        <p style="color: #1e34ff !important;" class="title">Clinical Abstract/Medical Certificate</p>
                        <p class="subtitle">Refer to the Patient Record for Reference</p>
                    </div>
                </div>
                <div class="tile is-parent">
                    <a href="{{route('patient.index')}}" id="patientDb" class="tile is-child box">
                        <p style="color: #1e34ff !important;" class="title">Patient Database</p>
                        <p class="subtitle">Search List of Patients and review their records</p>
                    </a>
                </div>
            </div>
            <div class="tile is-ancestor">
                 <div class="tile is-parent">
                    <a href="{{route('record.index')}}" id="recordDb" class="tile is-child box">
                        <p style="color: #e8e6be !important;" class="title">Patient Record Database</p>
                        <p class="subtitle has-text-white">Search List of Records</p>
                    </a>
                </div>
                <div class="tile is-parent">
                    <div id="stats" class="tile is-child box">
                        <p class="title has-text-white">Statistics</p>
                        <p class="subtitle has-text-white">Analysis of the aggregated data of your patients</p>
                        <p class="has-text-white">Note: Sensitive Personal Information is not included in the statistics</p>
                    </div>
                </div>
                <div class="tile is-parent">
                    <div id="docs" class="tile is-child box">
                        <p style="color: #c9edd3 !important;" class="title">Documentation</p>
                        <p class="subtitle has-text-white">Help with using the system</p>
                        <p class="has-text-white">Note: Documentation is work in progress</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
