<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('sex');
            $table->unsignedTinyInteger('age');
            $table->string('status');
            $table->double('height', 5, 2)->nullable();
            $table->double('weight', 5, 2)->nullable();
            $table->date('birthday');
            $table->string('home_address');
            $table->string('work_address')->nullable();
            $table->string('occupation')->nullable();
            $table->string('email')->nullable();
            $table->string('person_to_notify')->nullable();
            $table->string('home_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('work_number')->nullable();
            $table->string('emergency_contact_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
