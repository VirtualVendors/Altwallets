<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLabelColumnToWalletsTable extends Migration {

  /**
   * Run the migrations.
   * @return void
   */
  public function up()
  {
    Schema::table('wallets', function (Blueprint $table)
    {
      $table->string('label')->after('address');
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
      $table->dropColumn('label');
    });
  }
}
