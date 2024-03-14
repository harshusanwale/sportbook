<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('website_url');
            $table->unsignedBigInteger('player_name');
            $table->unsignedBigInteger('agent_id');
            $table->date('bet_date');
            $table->time('bet_time');
            $table->date('game_date');
            $table->time('game_time');
            $table->string('trans_number');
            $table->string('pick');
            $table->unsignedBigInteger('period_id');
            $table->unsignedBigInteger('bet_type_id');
            $table->integer('side');
            $table->integer('handicap');
            $table->decimal('bet_price', 10, 2); // Precision: 10, Scale: 2
            $table->integer('reference_num');
            $table->decimal('gross_risk', 10, 2); // Decimal data type for monetary values
            $table->decimal('gross_win', 10, 2);
            $table->decimal('net_risk', 10, 2);
            $table->decimal('net_win', 10, 2);
            $table->decimal('gross_profit', 10, 2);
            $table->decimal('net_profit', 10, 2);
            $table->string('result');
            $table->string('author');
            $table->string('family');
            $table->string('type');
            $table->timestamps();

            $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('player_name')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('period_id')->references('id')->on('period')->onDelete('cascade');
            $table->foreign('bet_type_id')->references('id')->on('bet_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
