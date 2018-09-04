<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 50)->nullable();
			$table->integer('parent_id')->nullable();
			$table->integer('level_id')->nullable();
			$table->string('sort', 50)->nullable();
			$table->integer('type_id')->nullable();
			$table->string('url', 500)->nullable();
			$table->string('target', 50)->nullable();
			$table->integer('status_id')->nullable();
			$table->string('icon', 50);
			$table->text('event', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permissions');
	}

}
