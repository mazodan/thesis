<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Record;
use DB;

class ChartController extends Controller
{
    // AJAX REQUESTS FOR CHART DATA
    public function get_patient_freq()
    {
    	// That was the query???
    	$patient_stat = DB::select(DB::raw('select DATE(created_at) as date, count(*) as freq from records group by date'));

    	return $patient_stat;
    }

    public function get_patient_age()
    {
    	$age_stat = DB::select('SELECT age, COUNT(*) as freq FROM patients GROUP BY age');

    	return $age_stat;
    }

    public function get_patient_weight()
    {
    	$age_stat = DB::select('SELECT weight, COUNT(*) as freq FROM patients GROUP BY weight');

    	return $age_stat;
    }
}
