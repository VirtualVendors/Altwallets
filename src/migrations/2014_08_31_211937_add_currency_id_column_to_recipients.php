<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCurrencyIdColumnToRecipients extends Migration {

  /**
   * Run the migrations.
   * @return void
   */
  public function up()
  {
    Schema::table('recipients', function (Blueprint $table)
    {
      $table->integer('currency_id')->unsigned()->after('wallet_id');

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
    Schema::table('recipients', function (Blueprint $table)
    {
      $table->dropForeign('recipients_currency_id_foreign');
      $table->dropColumn('currency_id');
    });
  }
}
