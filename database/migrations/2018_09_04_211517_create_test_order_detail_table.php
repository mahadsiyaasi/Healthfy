<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestOrderDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test_order_detail', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('test_order_id')->nullable();
			$table->text('result', 65535)->nullable();
			$table->text('note', 65535)->nullable();
			$table->integer('test_id')->nullable();
			$table->integer('status_id')->nullable();
			$table->decimal('amount', 10, 0);
			$table->string('ranges', 50)->nullable();
			$table->string('units', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('test_order_detail');
	}

}
