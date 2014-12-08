<?php namespace Virtualvendors\Altwallets\Entities\Wallet\Address;

use Adamgoose\Commander\Validation\CommandValidator;

class GetNewAddressValidator extends CommandValidator {

  public static $rules = [
    'label' => 'required',
  ];

} 