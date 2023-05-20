<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsOnWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE withdrawals ALTER COLUMN amount TYPE integer USING (trim(amount))::integer');
        DB::statement('ALTER TABLE withdrawals ALTER COLUMN to_deduct TYPE integer USING (trim(to_deduct))::integer');
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
