<?php namespace Virtualvendors\Altwallets\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Virtualvendors\Altwallets\Entities\User\RegisterUserCommand;
use Virtualvendors\Altwallets\User;

class RegistrationController extends BaseController {

  /**
   *
   */
  public function getRegister()
  {
    $this->view('auth.register');
  }

  /**
   * @return mixed
   */
  public function postRegister()
  {
    $input = Input::only('email', 'password', 'password_confirmation', 'no_good');

    $this->commandBus->execute(new RegisterUserCommand($input));

    return Redirect::route('login')
      ->withFlashMessage('Check your email to activate your account.');
  }

  /**
   * @return \Illuminate\Http\RedirectResponse
   */
  public function getActivate()
  {
    try
    {
      $token = Input::get('token');
      $email = Input::get('email');
      $id = Crypt::decrypt($token);

      $user = User::where([
        'id'    => $id,
        'email' => $email,
      ])->firstOrFail();

      $user->active = true;
      $user->save();

      Auth::loginUsingId($user->id);

      return Redirect::route('home');
    } catch(\Exception $e)
    {
      return Redirect::route('login');
    }
  }
}