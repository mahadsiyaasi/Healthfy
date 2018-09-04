<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDaignosisListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('daignosis_list', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 100)->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('inclusion_termenole', 50)->nullable();
			$table->integer('parent_id')->nullable();
			$table->integer('section_id')->nullable();
			$table->integer('type_id')->nullable();
			$table->integer('body_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('daignosis_list');
	}

}
