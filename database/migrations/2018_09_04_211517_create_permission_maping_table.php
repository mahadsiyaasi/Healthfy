<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionMapingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permission_maping', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('entity_id')->nullable()->index('entity_id');
			$table->integer('entity_type_id')->nullable();
			$table->integer('permission_id')->nullable()->index('permission_id');
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
		Schema::drop('permission_maping');
	}

}
