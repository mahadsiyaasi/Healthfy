<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedicationStrenghtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medication_strenght', function(Blueprint $table)
		{
			$table->integer('ms_id', true);
			$table->integer('medication_id')->nullable();
			$table->integer('strenght')->nullable();
			$table->integer('strenght_unit_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('medication_strenght');
	}

}
