<?php namespace Virtualvendors\Altwallets\Controllers\Admin;

use Virtualvendors\Altwallets\Entities\Currency\EditCurrencyCommand;
use Virtualvendors\Altwallets\Entities\Currency\NewCurrencyCommand;
use Virtualvendors\Altwallets\Controllers\BaseController;
use Virtualvendors\Altwallets\Currency;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CurrenciesController extends BaseController {

  /**
   * Display a listing of the resource.
   * @return \Response
   */
  public function index()
  {
    $currencies = Currency::paginate();

    $this->view('admin.currencies.index', compact('currencies'));
  }


  /**
   * Show the form for creating a new resource.
   * @return \Response
   */
  public function create()
  {
    $this->view('admin.currencies.create');
  }


  /**
   * Store a newly created resource in storage.
   * @return \Response
   */
  public function store()
  {
    $input = $this->fetchInput();

    $currency = $this->commandBus->execute(new NewCurrencyCommand($input));

    return Redirect::route('admin.currencies.show', $currency->id);
  }


  /**
   * Display the specified resource.
   *
   * @param Currency $currency
   *
   * @internal param int $id
   * @return \Response
   */
  public function show(Currency $currency)
  {
    $currency->load('wallets.user');

    $this->view('admin.currencies.show', compact('currency'));
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param Currency $currency
   *
   * @internal param int $id
   * @return \Response
   */
  public function edit(Currency $currency)
  {
    $this->view('admin.currencies.edit', compact('currency'));
  }


  /**
   * Update the specified resource in storage.
   *
   * @param Currency $currency
   *
   * @internal param int $id
   * @return \Response
   */
  public function update(Currency $currency)
  {
    $input = $this->fetchInput();

    $currency = $this->commandBus->execute(new EditCurrencyCommand($input, $currency));

    return Redirect::route('admin.currencies.show', $currency->id);
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param Currency $currency
   *
   * @internal param int $id
   * @return \Response
   */
  public function destroy(Currency $currency)
  {
    //
  }

  private function fetchInput()
  {
    $input = Input::only([
      'code',
      'name',
      'scheme',
      'username',
      'password',
      'address',
      'port',
      'explorer',
      'market_id',
    ]);

    $input['active'] = Input::has('active');

    return $input;
  }
}
