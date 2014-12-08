<?php namespace Virtualvendors\Altwallets\Entities\Wallet;

use Adamgoose\Commander\BaseCommand;
use Adamgoose\Commander\CommandHandler;
use Virtualvendors\Altwallets\Currency;

class MoveCoinCommandHandler implements CommandHandler {

  /**
   * Handle the command
   *
   * @param MoveCoinCommand|BaseCommand $command
   *
   * @return mixed
   */
  public function handle(BaseCommand $command)
  {
    $sender = $command->sender;
    /** @var Currency $currency */
    $currency = $command->sender->currency;

    $currency->client->sendfrom((string) $sender->id, $command->address, $command->amount);
  }
}