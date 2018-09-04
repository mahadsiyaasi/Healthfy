<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staff', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 50)->nullable();
			$table->string('tell', 50)->nullable();
			$table->text('email', 65535)->nullable();
			$table->text('specialization', 65535)->nullable();
			$table->string('salary', 50)->nullable();
			$table->string('visit_amount', 50)->nullable();
			$table->string('nationality', 50);
			$table->date('datebirth')->nullable();
			$table->text('address', 65535)->nullable();
			$table->integer('status_id');
			$table->integer('user_id')->nullable()->index('user_id');
			$table->string('type', 50);
			$table->integer('company_id');
			$table->string('gender', 50);
			$table->string('degree', 50);
			$table->string('city', 50);
			$table->string('experience', 50);
			$table->text('about', 65535);
			$table->string('title', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('staff');
	}

}
