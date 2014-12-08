<?php namespace Virtualvendors\Altwallets\Entities\Wallet\Tradekey;

use Adamgoose\Commander\BaseCommand;
use Adamgoose\Commander\CommandHandler;
use Virtualvendors\Altwallets\TradeKey;

class GetNewTradeKeyCommandHandler implements CommandHandler {

  /**
   * Handle the command
   *
   * @param GetNewTradeKeyCommand|BaseCommand $command
   *
   * @return mixed
   */
  public function handle(BaseCommand $command)
  {
    $wallet = $command->wallet;

    $tradekey = new TradeKey ([
      'label'    => $command->label,
      'tradekey' => $command->tradekey,
    ]);
    $tradekey->currency()->associate($command->wallet->currency);

    $wallet->tradekeys()->save($tradekey);

    return $tradekey;
  }
}