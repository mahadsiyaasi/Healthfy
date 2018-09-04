<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('model_type', 191);
			$table->bigInteger('model_id')->unsigned();
			$table->string('collection_name', 191);
			$table->string('name', 191);
			$table->string('file_name', 191);
			$table->string('mime_type', 191)->nullable();
			$table->string('disk', 191);
			$table->integer('size')->unsigned();
			$table->string('manipulations', 191);
			$table->string('custom_properties', 191);
			$table->string('responsive_images', 191);
			$table->integer('order_column')->unsigned()->nullable();
			$table->timestamps();
			$table->index(['model_type','model_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('media');
	}

}
