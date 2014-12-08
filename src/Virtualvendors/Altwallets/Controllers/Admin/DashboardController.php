<?php namespace Virtualvendors\Altwallets\Controllers\Admin;

use Virtualvendors\Altwallets\Controllers\BaseController;

class DashboardController extends BaseController {

  public function getIndex()
  {
    $this->view('admin.dashboard');
  }
}