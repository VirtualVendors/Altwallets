<?php namespace Virtualvendors\Altwallets\Services;

use Virtualvendors\Altwallets\User;

class UserMailer {

  /**
   * @var Mailer
   */
  private $mailer;

  /**
   * @param Mailer $mailer
   */
  function __construct(Mailer $mailer)
  {
    $this->mailer = $mailer;
  }

  /**
   * @param User $user
   */
  public function sendRegistrationEmail(User $user)
  {
    $name = $user->email;
    $email = $user->email;
    $subject = "Welcome to AltWallets";
    $view = 'emails.auth.registered';
    $data = compact('user');

    $this->mailer->sendTo($name, $email, $subject, $view, $data);
  }
}