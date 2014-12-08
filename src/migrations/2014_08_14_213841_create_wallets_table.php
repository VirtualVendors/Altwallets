<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletsTable extends Migration {

  /**
   * Run the migrations.
   * @return void
   */
  public function up()
  {
    Schema::create('wallets', function (Blueprint $table)
    {
      $table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->integer('currency_id')->unsigned();
      $table->string('address');
      $table->decimal('balance', 65, 8);
      $table->timestamps();

      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');

      $table->foreign('currency_id')
        ->references('id')
        ->on('currencies')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   * @return void
   */
  public function down()
  {
    Schema::drop('wallets');
  }
}
