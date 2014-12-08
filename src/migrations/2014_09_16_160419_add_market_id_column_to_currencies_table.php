<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMarketIdColumnToCurrenciesTable extends Migration {

  /**
   * Run the migrations.
   * @return void
   */
  public function up()
  {
    Schema::table('currencies', function (Blueprint $table)
    {
      $table->integer('market_id')->after('explorer')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   * @return void
   */
  public function down()
  {
    Schema::table('currencies', function (Blueprint $table)
    {
      $table->dropColumn('market_id');
    });
  }
}
