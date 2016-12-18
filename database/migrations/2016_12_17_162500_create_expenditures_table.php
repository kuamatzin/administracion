<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpendituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenditures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expenditure_type_id')->unsigned();
            $table->foreign('expenditure_type_id')->references('id')->on('expenditure_types')->onDelete('cascade');
            $table->string('concept');
            $table->string('measure_unit');
            $table->double('unit_cost');
            $table->double('quantity');
            $table->double('total');
            $table->boolean('deductible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenditures');
    }
}
