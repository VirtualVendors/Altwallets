<?php namespace Virtualvendors\Altwallets\Entities\User;

use Adamgoose\Commander\Validation\CommandValidator;

class RegisterUserValidator extends CommandValidator {

  /**
   * @var array
   */
  public static $rules = [
    'email'    => 'required|unique:users',
    'password' => 'required|min:7|confirmed',
    'no_good'  => 'accepted',
  ];

} 