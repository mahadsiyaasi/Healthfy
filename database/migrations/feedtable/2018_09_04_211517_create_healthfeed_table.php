<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHealthfeedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('healthfeed', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title', 500)->nullable();
			$table->text('image_title', 65535)->nullable();
			$table->text('post', 65535)->nullable();
			$table->text('image_post', 65535)->nullable();
			$table->integer('user_id')->nullable()->index('FK_healthfeed');
			$table->dateTime('date')->nullable();
			$table->dateTime('updated_at')->nullable();
			$table->integer('status_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('healthfeed');
	}

}
