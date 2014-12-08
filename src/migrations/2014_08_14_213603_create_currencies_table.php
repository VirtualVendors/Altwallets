<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration {

  /**
   * Run the migrations.
   * @return void
   */
  public function up()
  {
    Schema::create('currencies', function (Blueprint $table)
    {
      $table->increments('id');
      $table->string('code');
      $table->string('name');
      $table->boolean('active');
      $table->string('scheme');
      $table->string('username');
      $table->string('password');
      $table->string('address');
      $table->string('port');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   * @return void
   */
  public function down()
  {
    Schema::drop('currencies');
  }
}
