<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHealthfeedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('healthfeed', function(Blueprint $table)
		{
			$table->foreign('user_id', 'FK_healthfeed')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('healthfeed', function(Blueprint $table)
		{
			$table->dropForeign('FK_healthfeed');
		});
	}

}
