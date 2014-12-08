<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExplorerColumnToCurrenciesTable extends Migration {

  /**
   * Run the migrations.
   * @return void
   */
  public function up()
  {
    Schema::table('currencies', function (Blueprint $table)
    {
      $table->string('explorer')->after('port');
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
      $table->dropColumn('explorer');
    });
  }
}
