<?php namespace Virtualvendors\Altwallets\Services;

use Illuminate\Mail\Mailer as LaravelMailer;

class Mailer {

  /**
   * @var LaravelMailer
   */
  private $mail;

  /**
   * @param LaravelMailer $mail
   */
  function __construct(LaravelMailer $mail)
  {
    $this->mail = $mail;
  }

  /**
   * @param       $name
   * @param       $email
   * @param       $subject
   * @param       $view
   * @param array $data
   */
  public function sendTo($name, $email, $subject, $view, array $data = [])
  {
    $this->mail->send($view, $data, function ($message) use ($name, $email, $subject)
    {
      $message->to($email, $name)->subject($subject);
    });
  }
}