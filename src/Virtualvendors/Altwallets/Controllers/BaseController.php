<?php namespace Virtualvendors\Altwallets\Controllers;

use Adamgoose\Commander\ValidationCommandBus;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

class BaseController extends Controller {

  /**
   * @var string
   */
  public $layout = 'altwallets::layout';
  /**
   * @var
   */
  protected $commandBus;

  /**
   * @param ValidationCommandBus $commandBus
   */
  function __construct(ValidationCommandBus $commandBus)
  {
    $this->commandBus = $commandBus;
  }

  /**
   * Setup the layout used by the controller.
   * @return void
   */
  protected function setupLayout()
  {
    if( ! is_null($this->layout))
    {
      $this->layout = View::make($this->layout);
    }
  }

  /**
   * @param       $view
   * @param array $data
   */
  public function view($view, array $data = [])
  {
    $this->layout->content = View::make('altwallets::' . $view, $data);
  }
}
