<?php namespace Virtualvendors\Altwallets\Entities\Currency;

use Adamgoose\Commander\BaseCommand;
use Adamgoose\Commander\CommandHandler;
use Virtualvendors\Altwallets\Currency;

class NewCurrencyCommandHandler implements CommandHandler {

  /**
   * Handle the command
   *
   * @param NewCurrencyCommand|BaseCommand $command
   *
   * @return mixed
   */
  public function handle(BaseCommand $command)
  {
    $currency = Currency::create($command->all());

    return $currency;
  }
}