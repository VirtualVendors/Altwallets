<?php namespace Virtualvendors\Altwallets\Entities\Wallet;

use Adamgoose\Commander\BaseCommand;
use Virtualvendors\Altwallets\Wallet;

class SendCoinCommand extends BaseCommand {

  /**
   * @var Wallet
   */
  public $sender;

  function __construct(array $attributes, Wallet $sender)
  {
    parent::__construct($attributes);
    $this->sender = $sender;
  }
}