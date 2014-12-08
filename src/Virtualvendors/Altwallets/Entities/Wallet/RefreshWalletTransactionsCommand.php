<?php namespace Virtualvendors\Altwallets\Entities\Wallet;

use Adamgoose\Commander\BaseCommand;
use Virtualvendors\Altwallets\Wallet;

class RefreshWalletTransactionsCommand extends BaseCommand {

  /**
   * @var Wallet
   */
  public $wallet;

  function __construct(Wallet $wallet)
  {
    $this->wallet = $wallet;
  }
}