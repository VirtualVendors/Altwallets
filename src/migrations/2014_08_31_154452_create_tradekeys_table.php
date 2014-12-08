<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradekeysTable extends Migration {

  /**
   * Run the migrations.
   * @return void
   */
  public function up()
  {
    Schema::create('tradekeys', function (Blueprint $table)
    {
      $table->increments('id');
      $table->integer('wallet_id')->unsigned();
      $table->string('tradekey');
      $table->string('label');
      $table->timestamps();

      $table->foreign('wallet_id')
        ->references('id')
        ->on('wallets');
    });
  }

  /**
   * Reverse the migrations.
   * @return void
   */
  public function down()
  {
    Schema::drop('tradekeys');
  }
}
