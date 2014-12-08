<?php namespace Virtualvendors\Altwallets\Entities\User;

use Adamgoose\Commander\BaseCommand;
use Adamgoose\Commander\CommandHandler;
use Illuminate\Support\Facades\App;
use Virtualvendors\Altwallets\User;

class RegisterUserCommandHandler implements CommandHandler {

  /**
   * Handle the command
   *
   * @param BaseCommand|RegisterUserCommand $command
   *
   * @return mixed
   */
  public function handle(BaseCommand $command)
  {
    $user = new User($command->all());

    $user->save();

    App::make('Altwallets\Services\UserMailer')->sendRegistrationEmail($user);

    return $user;
  }
}