<?php namespace Virtualvendors\Altwallets\Entities\Wallet\Recipient;

use Adamgoose\Commander\BaseCommand;
use Virtualvendors\Altwallets\Wallet;

class GetNewRecipientCommand extends BaseCommand {

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