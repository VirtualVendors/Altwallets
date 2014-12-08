<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

  /**
   * Run the migrations.
   * @return void
   */
  public function up()
  {
    Schema::create('addresses', function (Blueprint $table)
    {
      $table->increments('id');
      $table->integer('wallet_id')->unsigned();
      $table->string('address');
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
    Schema::drop('addresses');
  }
}
