<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTpTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tp__transactions', function (Blueprint $table) {
            // $table->string('assets')->nullable()->after('type');
            $table->decimal('open_rate', 12, 3)->nullable()->default(0.00)->after('type');
            $table->decimal('closed_rate', 12, 3)->nullable()->default(0.00)->after('open_rate');
            $table->decimal('roll_over', 12, 3)->nullable()->default(0.00)->after('closed_rate');
            $table->decimal('profit', 12, 3)->nullable()->default(0.00)->after('roll_over');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tp_transactions', function (Blueprint $table) {
            //
        });
    }
}
