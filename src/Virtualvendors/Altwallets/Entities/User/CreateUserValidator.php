<?php namespace Virtualvendors\Altwallets\Entities\User;

use Adamgoose\Commander\Validation\CommandValidator;

class CreateUserValidator extends CommandValidator {

  public static $rules = [
    'email'    => 'required|email|unique:users',
    'password' => 'required|min:7',
  ];

} 