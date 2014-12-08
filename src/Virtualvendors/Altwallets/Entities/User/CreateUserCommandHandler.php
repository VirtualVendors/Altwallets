<?php namespace Virtualvendors\Altwallets\Entities\User;

use Adamgoose\Commander\BaseCommand;
use Adamgoose\Commander\CommandHandler;
use Virtualvendors\Altwallets\User;

class CreateUserCommandHandler implements CommandHandler {

  /**
   * Handle the command
   *
   * @param $command
   *
   * @return mixed
   */
  public function handle(BaseCommand $command)
  {
    $user = User::create($command->all());

    return $user;
  }
}