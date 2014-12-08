<?php namespace Virtualvendors\Altwallets\Entities\Currency;

use Adamgoose\Commander\BaseCommand;
use Virtualvendors\Altwallets\Currency;

class EditCurrencyCommand extends BaseCommand {

  /**
   * @var Currency
   */
  public $currency;

  function __construct(array $attributes, Currency $currency)
  {
    parent::__construct($attributes);
    $this->currency = $currency;
  }
}