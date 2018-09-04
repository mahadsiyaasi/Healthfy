<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPermissionMapingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('permission_maping', function(Blueprint $table)
		{
			$table->foreign('entity_id', 'permission_maping_ibfk_1')->references('id')->on('role')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('permission_id', 'permission_maping_ibfk_2')->references('id')->on('permissions')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('permission_maping', function(Blueprint $table)
		{
			$table->dropForeign('permission_maping_ibfk_1');
			$table->dropForeign('permission_maping_ibfk_2');
		});
	}

}
