<?php namespace Virtualvendors\Altwallets\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends BaseController {

  /**
   * @return string
   */
  public function getIndex()
  {
    Auth::check() ? $this->getUserIndex() : $this->getGuestIndex();
  }

  /**
   *
   */
  private function getUserIndex()
  {
    $my = Auth::user()->load('wallets.currency');

    $this->view('index', compact('my'));
  }

  /**
   *
   */
  private function getGuestIndex()
  {
    $this->view('guest');
  }
}
