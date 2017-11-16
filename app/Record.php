<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
	protected $fillable = [
        'id', 'user_id', 'patient_id', 'notes', 'age', 'status', 'height', 'weight'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function patient()
    {
    	return $this->belongsTo(Patient::class);
    }
}
