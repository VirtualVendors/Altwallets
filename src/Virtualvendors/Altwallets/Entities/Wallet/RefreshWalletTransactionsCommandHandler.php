<?php namespace Virtualvendors\Altwallets\Entities\Wallet;

use Adamgoose\Commander\BaseCommand;
use Adamgoose\Commander\CommandHandler;
use Illuminate\Support\Facades\Cache;

class RefreshWalletTransactionsCommandHandler implements CommandHandler {

  /**
   * Handle the command
   *
   * @param RefreshWalletTransactionsCommand|BaseCommand $command
   *
   * @return mixed
   */
  public function handle(BaseCommand $command)
  {
    $wallet = $command->wallet;

    Cache::forget('transactions-for-' . $wallet->id);
  }
}