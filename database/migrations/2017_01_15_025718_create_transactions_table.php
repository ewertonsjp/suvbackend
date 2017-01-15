<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up() {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->decimal('amount', 5, 2);
            $table->integer('invoice_id');
            $table->timestamps();
        });

        /*Schema::table('transactions', function (Blueprint $table) {
          $table->integer('invoice_id')->unsigned();
          $table->foreign('invoice_id')->references('id')->on('invoices');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('transactions');
    }
}
