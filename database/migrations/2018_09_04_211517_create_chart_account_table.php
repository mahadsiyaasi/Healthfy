<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChartAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chart_account', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('number')->nullable();
			$table->string('name', 50)->nullable();
			$table->text('description', 65535)->nullable();
			$table->integer('parent_id')->nullable();
			$table->string('type', 50)->nullable();
			$table->string('category', 50)->nullable();
			$table->integer('company_id')->nullable();
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
		Schema::drop('chart_account');
	}

}
