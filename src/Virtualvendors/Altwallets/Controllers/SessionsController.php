<?php namespace Virtualvendors\Altwallets\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class SessionsController extends BaseController {

  /**
   *
   */
  public function getLogin()
  {
    $this->view('auth.login');
  }

  /**
   *
   */
  public function postLogin()
  {
    $credentials = Input::only('email', 'password');
    $credentials['active'] = true;

    if(Auth::attempt($credentials, Input::has('remember')))
      return Redirect::home()->with([
        'flash_message' => 'Welcome back!',
        'flash_level'   => 'success',
      ]);

    return Redirect::back()->withInput()->with([
      'flash_message' => 'Could not log you in.',
      'flash_level'   => 'danger'
    ]);
  }

  /**
   *
   */
  public function getLogout()
  {
    Auth::logout();

    return Redirect::home();
  }
}