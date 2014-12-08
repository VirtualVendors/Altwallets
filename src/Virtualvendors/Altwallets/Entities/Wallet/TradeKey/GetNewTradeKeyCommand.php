<?php namespace Virtualvendors\Altwallets\Entities\Wallet\TradeKey;

use Adamgoose\Commander\BaseCommand;
use Virtualvendors\Altwallets\Wallet;

class GetNewTradeKeyCommand extends BaseCommand {

  /**
   * @var Wallet
   */
  public $wallet;

  /**
   * @param array  $attributes
   * @param Wallet $wallet
   */
  function __construct(array $attributes, Wallet $wallet)
  {
    parent::__construct($attributes);
    $this->wallet = $wallet;
  }
}