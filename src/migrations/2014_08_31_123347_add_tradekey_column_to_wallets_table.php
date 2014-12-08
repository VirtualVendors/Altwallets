<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTradekeyColumnToWalletsTable extends Migration {

  /**
   * Run the migrations.
   * @return void
   */
  public function up()
  {
    Schema::table('wallets', function (Blueprint $table)
    {
      $table->string('tradekey')->after('label');
    });
  }

  /**
   * Reverse the migrations.
   * @return void
   */
  public function down()
  {
    Schema::table('wallets', function (Blueprint $table)
    {
      $table->dropColumn('tradekey');
    });
  }
}
