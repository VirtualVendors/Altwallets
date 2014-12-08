<?php namespace Virtualvendors\Altwallets\Entities\Wallet\Recipient;

use Adamgoose\Commander\BaseCommand;
use Adamgoose\Commander\CommandHandler;
use Virtualvendors\Altwallets\Recipient;

class GetNewRecipientCommandHandler implements CommandHandler {

  /**
   * Handle the command
   *
   * @param GetNewRecipientCommand|BaseCommand $command
   *
   * @return mixed
   */
  public function handle(BaseCommand $command)
  {
    $wallet = $command->wallet;

    $recipient = new Recipient ([
      'label'     => $command->label,
      'recipient' => $command->recipient,
    ]);
    $recipient->currency()->associate($command->wallet->currency);

    $wallet->recipients()->save($recipient);

    return $recipient;
  }
}