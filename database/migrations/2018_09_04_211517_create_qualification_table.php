<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQualificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qualification', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('doctor_id')->nullable();
			$table->string('qualification', 50)->nullable();
			$table->string('school', 50)->nullable();
			$table->integer('year')->nullable();
			$table->date('date')->nullable();
			$table->integer('status_id');
			$table->string('file', 500);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qualification');
	}

}
