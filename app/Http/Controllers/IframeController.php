<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use App\Patient;

class IframeController extends Controller
{
    public function index()
    {
    	return view('iframe.index');
    }

    public function show(Record $record)
    {
    	return view('iframe.show', compact('record'));
    }

    public function generate(Request $request)
    {
    	$patient = Patient::where('id', $request->p_id)->first();

    	if ($request->selectedForm == 'MC') {
    		$pdf = \PDF::loadView('medical.mc', ['type' => 'Medical Certificate',
    											 'body' => $request->body,
    											 'patient' => $patient]);
    		$pdf->setPaper('letter', 'portrait');
        	return $pdf->stream();

    		// return redirect()->route('makeCert', ['type' => 'MC']);
    	} else {
    		$pdf = \PDF::loadView('medical.mc', ['type' => 'Clinical Abstract',
    											 'body' => $request->body,
    											 'patient' => $patient]);
    		$pdf->setPaper('letter', 'portrait');
        	return $pdf->stream();
    	}
    }

    public function downloadRecord(Request $request)
    {
        $record = Record::where('id', $request->record_id)->first();

        $pdf = \PDF::loadView('record.stream', ['record' => $record]);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream();
    }

}
