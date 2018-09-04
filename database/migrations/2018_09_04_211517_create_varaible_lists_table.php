<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVaraibleListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('varaible_lists', function(Blueprint $table)
		{
			$table->integer('status_id', true);
			$table->string('status_name', 50)->nullable();
			$table->string('description', 50)->nullable();
			$table->string('group_key', 50)->nullable();
			$table->string('type_key', 50);
			$table->integer('parent_id');
			$table->integer('number');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('varaible_lists');
	}

}
