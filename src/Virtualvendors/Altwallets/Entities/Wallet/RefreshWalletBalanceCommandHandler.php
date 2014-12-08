<?php namespace Virtualvendors\Altwallets\Entities\Wallet;

use Adamgoose\Commander\BaseCommand;
use Adamgoose\Commander\CommandHandler;

class RefreshWalletBalanceCommandHandler implements CommandHandler {

  /**
   * Handle the command
   *
   * @param $command
   *
   * @return mixed
   */
  public function handle(BaseCommand $command)
  {
    $wallet = $command->wallet;

    $currency = $wallet->currency;

    $balance = $currency->client->getbalance($wallet->id);

    $wallet->update([
      'balance' => $balance,
    ]);

    return $wallet;
  }
}