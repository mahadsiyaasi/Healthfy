<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 50)->nullable();
			$table->string('email', 250)->nullable();
			$table->string('password', 250)->nullable();
			$table->string('remember_token', 250)->nullable();
			$table->integer('status_id')->nullable();
			$table->integer('default_language_id')->nullable();
			$table->integer('company_id')->nullable();
			$table->string('mobile', 50)->nullable();
			$table->string('phone', 50)->nullable();
			$table->string('address', 50)->nullable();
			$table->string('city', 50)->nullable();
			$table->string('country', 50)->nullable();
			$table->integer('default_cash_account_id')->nullable();
			$table->integer('role_type_id')->nullable()->index('role_type_id');
			$table->date('date');
			$table->dateTime('updated_date');
			$table->integer('registered_by');
			$table->dateTime('updated_at');
			$table->text('image', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
