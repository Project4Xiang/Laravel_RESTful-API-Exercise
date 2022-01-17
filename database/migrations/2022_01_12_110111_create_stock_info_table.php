<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_info', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('stock_id');
            $table->bigInteger('shares');
            $table->bigInteger('amount');
            $table->float('opening_price');
            $table->float('closing_price');
            $table->float('highest');
            $table->float('lowest');
            $table->float('diff');
            $table->Integer('volume');
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_info');
    }
}
