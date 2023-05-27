<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeUserPlanColumnOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (DB::getDriverName() === 'pgsql') {
            DB::statement('ALTER TABLE users ALTER COLUMN user_plan TYPE bigint USING (trim(user_plan))::bigint');
            DB::statement('ALTER TABLE users ALTER COLUMN plan TYPE bigint USING (trim(plan))::bigint');
        } else {
            Schema::table('users', function (Blueprint $table) {
                $table->bigInteger('user_plan')->change();
                $table->bigInteger('plan')->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
