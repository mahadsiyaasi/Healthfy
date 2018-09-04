<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrescriptionDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prescription_detail', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('prescription_id')->nullable();
			$table->integer('medication_id')->nullable();
			$table->string('dosage', 50)->nullable();
			$table->integer('frequency_id')->nullable();
			$table->string('duration', 50)->nullable();
			$table->string('instruction', 50)->nullable();
			$table->integer('status_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prescription_detail');
	}

}
