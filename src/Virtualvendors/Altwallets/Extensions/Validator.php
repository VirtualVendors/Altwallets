<?php namespace Virtualvendors\Altwallets\Extensions;

use Illuminate\Support\Str;
use Illuminate\Validation\Validator as IlluminateValidator;
use Virtualvendors\Altwallets\Currency;

class Validator extends IlluminateValidator {

  /**
   * @param $attribute
   * @param $value
   * @param $parameters
   *
   * @return mixed
   */
  public function validateValidCoinAddress($attribute, $value, $parameters)
  {
    $currency = Currency::find($parameters[0]);

    return $currency->client->validateaddress($value)->isvalid;
  }

  /**
   * @param $message
   * @param $attribute
   * @param $rule
   * @param $parameters
   *
   * @return mixed
   */
  public function replaceValidCoinAddress($message, $attribute, $rule, $parameters)
  {
    return str_replace(':currency', Currency::find($parameters[0])->code, $message);
  }

  /**
   * @param $attribute
   * @param $value
   * @param $parameters
   *
   * @return bool
   */
  public function validateValidExplorer($attribute, $value, $parameters)
  {
    return Str::contains($value, '%id');
  }
}