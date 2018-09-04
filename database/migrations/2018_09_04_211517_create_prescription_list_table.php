<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrescriptionListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prescription_list', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('patient_id')->nullable();
			$table->integer('doctor_id')->nullable();
			$table->integer('status_id')->nullable();
			$table->date('date')->nullable();
			$table->integer('company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prescription_list');
	}

}
