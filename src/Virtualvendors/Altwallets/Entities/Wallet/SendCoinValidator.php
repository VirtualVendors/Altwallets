<?php namespace Virtualvendors\Altwallets\Entities\Wallet;

use Adamgoose\Commander\Validation\CommandValidator;

class SendCoinValidator extends CommandValidator {

  public static $rules = '@getRules';

  public function getRules(SendCoinCommand $command)
  {
    return [
      'address'  => 'required_without_all:label,tradekey|validCoinAddress:' . $command->sender->currency->id,
      'label'    => 'required_without_all:address,tradekey',
      'tradekey' => 'required_without_all:address,label',
      'amount'   => 'required|numeric',
    ];
  }
}