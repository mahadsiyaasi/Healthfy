<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('permission.table_names');

        Schema::create($tableNames['permissions'], function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('parent_id');
            $table->string('level_id');
            $table->string('sort');
            $table->string('type_id');
            $table->string('url');
            $table->string('target');
            $table->string('status_id');
            $table->string('icon');
            $table->string('event');
            //$table->timestamps();
        });

        Schema::create($tableNames['roles'], function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('guard_name');
            $table->string('status_id');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create($tableNames['permission_maping'], function (Blueprint $table) use ($tableNames) {
             $table->increments('id');
            $table->unsignedInteger('permission_id');
            $table->morphs('model');
            $table->foreign('permission_id')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->primary(['permission_id', 'model_id', 'model_type']);
        });

        Schema::create($tableNames['model_has_roles'], function (Blueprint $table) use ($tableNames) {
             $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->morphs('model');
            $table->foreign('role_id')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');
            $table->primary(['role_id', 'model_id', 'model_type']);
        });

        Schema::create($tableNames['user_role_maping'], function (Blueprint $table) use ($tableNames) {
              $table->increments('id');
              $table->string('status_id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
                ->on($tableNames['users'])
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);

            app('cache')->forget('spatie.permission.cache');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('permission.table_names');
        Schema::drop($tableNames['permission_maping']);
        Schema::drop($tableNames['model_has_roles']);
        Schema::drop($tableNames['user_role_maping']);
        Schema::drop($tableNames['roles']);
        Schema::drop($tableNames['permissions']);
    }
}
