<?php namespace Virtualvendors\Altwallets\Entities\Wallet\Address;

use Adamgoose\Commander\BaseCommand;
use Adamgoose\Commander\CommandHandler;
use Virtualvendors\Altwallets\Address;

class GetNewAddressCommandHandler implements CommandHandler {

  /**
   * Handle the command
   *
   * @param GetNewAddressCommand|BaseCommand $command
   *
   * @return mixed
   */
  public function handle(BaseCommand $command)
  {
    $wallet = $command->wallet;

    $currency = $wallet->currency;

    $address = new Address([
      'label'   => $command->label,
      'address' => $currency->client->getnewaddress($wallet->id),
    ]);

    $wallet->addresses()->save($address);

    return $address;
  }
}