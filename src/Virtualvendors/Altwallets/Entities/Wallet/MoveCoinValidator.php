<?php namespace Virtualvendors\Altwallets\Entities\Wallet;

use Adamgoose\Commander\Validation\CommandValidator;

class MoveCoinValidator extends CommandValidator {

  public static $rules = '@getRules';

  public function getRules(MoveCoinCommand $command)
  {
    return [
      'address' => 'required|validCoinAddress:' . $command->sender->currency->id,
      'amount'  => 'required|numeric',
    ];
  }
}