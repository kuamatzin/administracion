<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAccountIdToIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->integer('account_id')->unsigned()->nullable()->after('id');
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->integer('construction_id')->unsigned()->nullable()->after('id');
            $table->foreign('construction_id')->references('id')->on('constructions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->dropForeign('incomes_account_id_foreign');
            $table->dropForeign('incomes_construction_id_foreign');
        });
    }
}
