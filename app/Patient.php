<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
	public function records()
	{
		return $this->hasMany(Record::class)->orderBy('updated_at', 'desc');
	}



    //
	protected $fillable = ['id', 'first_name', 'last_name', 'age', 'sex', 'status', 'height', 'weight', 'birthday', 'home_address', 'work_address', 'occupation', 'email', 'home_number', 'work_number', 'mobile_number', 'person_to_notify', 'emergency_contact_number'];


	// No Timestamps
    public $timestamps = false;
}
