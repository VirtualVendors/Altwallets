<?php namespace Virtualvendors\Altwallets\Entities\Wallet;

use Adamgoose\Commander\BaseCommand;
use Adamgoose\Commander\CommandHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Virtualvendors\Altwallets\Currency;
use Virtualvendors\Altwallets\Wallet;

class CreateWalletCommandHandler implements CommandHandler {

  /**
   * Handle the command
   *
   * @param $command
   *
   * @return mixed
   */
  public function handle(BaseCommand $command)
  {
    $currency = Currency::find($command->currency_id);

    $wallet = new Wallet([
      'balance' => 0,
      'label'   => $command->label,
    ]);
    $wallet->currency()->associate($currency);

    Auth::user()->wallets()->save($wallet);

    $address = $currency->client->getaccountaddress($wallet->id);

    $wallet->address = $address;
    $wallet->tradekey = Str::random(32, 'alpha');
    $wallet->save();

    return $wallet;
  }
}