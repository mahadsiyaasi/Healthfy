<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tests', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 50)->nullable();
			$table->decimal('amount', 10, 0)->nullable();
			$table->string('type', 50)->nullable();
			$table->integer('parent_id')->nullable();
			$table->text('advice', 65535)->nullable();
			$table->string('report', 50)->nullable();
			$table->string('low', 50)->nullable();
			$table->integer('status_id');
			$table->text('description', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tests');
	}

}
