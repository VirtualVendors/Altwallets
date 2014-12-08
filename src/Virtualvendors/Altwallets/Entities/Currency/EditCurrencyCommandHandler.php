<?php namespace Virtualvendors\Altwallets\Entities\Currency;

use Adamgoose\Commander\BaseCommand;
use Adamgoose\Commander\CommandHandler;

class EditCurrencyCommandHandler implements CommandHandler {

  /**
   * Handle the command
   *
   * @param EditCurrencyCommand|BaseCommand $command
   *
   * @return mixed
   */
  public function handle(BaseCommand $command)
  {
    $currency = $command->currency;

    $currency->fill($command->all());
    $currency->save();

    return $currency;
  }
}