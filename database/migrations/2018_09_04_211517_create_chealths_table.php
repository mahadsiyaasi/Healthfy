<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChealthsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chealths', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 70)->nullable();
			$table->text('slogan', 65535)->nullable();
			$table->text('logo', 65535)->nullable();
			$table->string('country', 70)->nullable();
			$table->string('state', 70)->nullable();
			$table->string('city', 70)->nullable();
			$table->string('distruct', 70)->nullable();
			$table->string('address', 70)->nullable();
			$table->integer('default_curency_id')->nullable();
			$table->string('tell', 70)->nullable();
			$table->string('mobile', 70)->nullable();
			$table->string('email')->nullable();
			$table->integer('parent_id')->nullable();
			$table->integer('status_id')->nullable();
			$table->string('code', 70)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chealths');
	}

}
