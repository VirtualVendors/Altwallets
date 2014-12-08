<?php namespace Virtualvendors\Altwallets\Entities\Currency;

use Adamgoose\Commander\Validation\CommandValidator;

class EditCurrencyValidator extends CommandValidator {

  public static $rules = [
    'code'      => 'required|size:3',
    'name'      => 'required',
    'scheme'    => 'required|in:http,https',
    'username'  => 'required',
    'password'  => 'required',
    'address'   => 'required|ip',
    'port'      => 'required|numeric',
    'active'    => 'boolean',
    'explorer'  => 'validExplorer',
    'market_id' => 'numeric',
  ];

}