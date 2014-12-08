<?php namespace Virtualvendors\Altwallets\Entities\Wallet;

use Adamgoose\Commander\BaseCommand;
use Adamgoose\Commander\CommandHandler;
use Virtualvendors\Altwallets\Currency;
use Virtualvendors\Altwallets\Recipient;
use Virtualvendors\Altwallets\Wallet;

class SendCoinCommandHandler implements CommandHandler {

  /**
   * Handle the command
   *
   * @param SendCoinCommand|BaseCommand $command
   *
   * @return mixed
   */
  private static $label;

  public function handle(BaseCommand $command)
  {
    $sender = $command->sender;
    $address = $command->address;
    $label = $command->label;
    $tradekey = $command->tradekey;
    /** @var Currency $currency */
    $currency = $command->sender->currency;

    if($address)
    {
      $currency->client->sendfrom((string) $sender->id, $command->address, $command->amount);
    } elseif($label)
    {
      $recipient = Recipient::where(['label' => $label, 'currency_id' => $currency->id])->first();

      $currency->client->sendfrom((string) $sender->id, $recipient->recipient, $command->amount);
    } elseif($tradekey)
    {
      $trade = Wallet::where('tradekey', '=', $tradekey)->first();
      $currency->client->move((string) $sender->id, (string) $trade->id, $command->amount);
    }
  }
}