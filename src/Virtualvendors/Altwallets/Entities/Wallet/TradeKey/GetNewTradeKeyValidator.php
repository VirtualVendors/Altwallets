<?php namespace Virtualvendors\Altwallets\Entities\Wallet\TradeKey;

use Adamgoose\Commander\Validation\CommandValidator;

class GetNewTradeKeyValidator extends CommandValidator {

  public static $rules = [
    'label'    => 'required',
    'tradekey' => 'required',
  ];

} 