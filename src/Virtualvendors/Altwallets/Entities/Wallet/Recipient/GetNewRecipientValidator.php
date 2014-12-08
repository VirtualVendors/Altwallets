<?php namespace Virtualvendors\Altwallets\Entities\Wallet\Recipient;

use Adamgoose\Commander\Validation\CommandValidator;

class GetNewRecipientValidator extends CommandValidator {

  public static $rules = '@getRules';

  public function getRules(GetNewRecipientCommand $command)
  {
    return [
      'recipient' => 'required|validCoinAddress:' . $command->wallet->currency->id,
      'label'     => 'required',
    ];
  }
}