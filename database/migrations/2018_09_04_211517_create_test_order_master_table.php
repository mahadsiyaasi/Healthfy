<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestOrderMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test_order_master', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('patient_id')->nullable();
			$table->integer('company_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('doctor_id')->nullable();
			$table->decimal('total_amount', 10, 0)->nullable();
			$table->integer('status_id')->nullable();
			$table->dateTime('date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('test_order_master');
	}

}
