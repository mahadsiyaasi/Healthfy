<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table)
		{
			$table->integer('payment_id', true);
			$table->integer('patient_id')->nullable();
			$table->integer('order_id')->nullable();
			$table->string('order_type', 50)->nullable();
			$table->decimal('amount', 10, 0)->nullable();
			$table->decimal('discount', 10, 0)->nullable();
			$table->decimal('balance', 10, 0)->nullable();
			$table->string('status', 50)->nullable();
			$table->date('date')->nullable();
			$table->string('account', 50);
			$table->string('trunsaction_type', 50);
			$table->integer('company_id');
			$table->integer('status_id');
			$table->integer('doctor_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transactions');
	}

}
