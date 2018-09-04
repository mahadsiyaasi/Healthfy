<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patients', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('patient_name', 50)->nullable();
			$table->string('patient_tell', 50)->nullable();
			$table->text('country', 65535)->nullable();
			$table->string('state', 50)->nullable();
			$table->string('district', 50)->nullable();
			$table->string('address', 50)->nullable();
			$table->date('datebirth')->nullable();
			$table->string('gender', 50);
			$table->dateTime('date');
			$table->integer('status_id');
			$table->integer('user_id');
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
		Schema::drop('patients');
	}

}
