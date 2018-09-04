<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointment', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('patient_id')->nullable();
			$table->string('disease', 100)->nullable();
			$table->string('doctor_id', 50)->nullable();
			$table->decimal('amount', 10, 0)->nullable();
			$table->dateTime('date')->nullable();
			$table->text('note', 65535);
			$table->integer('status_id');
			$table->integer('company_id');
			$table->date('start_date');
			$table->date('end_date');
			$table->time('start_time');
			$table->time('end_time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('appointment');
	}

}
