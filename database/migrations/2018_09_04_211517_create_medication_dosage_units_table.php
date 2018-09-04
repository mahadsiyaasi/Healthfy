<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedicationDosageUnitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medication_dosage_units', function(Blueprint $table)
		{
			$table->integer('mdu_id', true);
			$table->integer('medication_id')->nullable();
			$table->integer('dosage_unit_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('medication_dosage_units');
	}

}
