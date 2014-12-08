<?php namespace Virtualvendors\Altwallets\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Virtualvendors\Altwallets\Currency;
use Virtualvendors\Altwallets\Entities\Wallet\CreateWalletCommand;
use Virtualvendors\Altwallets\Entities\Wallet\RefreshWalletBalanceCommand;
use Virtualvendors\Altwallets\Entities\Wallet\RefreshWalletTransactionsCommand;
use Virtualvendors\Altwallets\Entities\Wallet\SendCoinCommand;
use Virtualvendors\Altwallets\Wallet;

class WalletsController extends BaseController {

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index()
  {
    //
  }


  /**
   * Show the form for creating a new resource.
   * @return Response
   */
  public function create()
  {
    $currencies = Currency::all();

    $this->view('wallets.create', compact('currencies'));
  }


  /**
   * Store a newly created resource in storage.
   * @return Response
   */
  public function store()
  {
    $input = Input::only('currency_id', 'label');

    $wallet = $this->commandBus->execute(new CreateWalletCommand($input));

    return Redirect::route('wallets.show', $wallet->id);
  }


  /**
   * Display the specified resource.
   *
   * @param Wallet $wallet
   *
   * @internal param int $id
   * @return Response
   */
  public function show(Wallet $wallet)
  {
    $this->view('wallets.show', compact('wallet'));
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param Wallet $wallet
   *
   * @internal param int $id
   * @return Response
   */
  public function edit(Wallet $wallet)
  {
    //
  }


  /**
   * Update the specified resource in storage.
   *
   * @param Wallet $wallet
   *
   * @internal param int $id
   * @return Response
   */
  public function update(Wallet $wallet)
  {
    //
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param Wallet $wallet
   *
   * @internal param int $id
   * @return Response
   */
  public function destroy(Wallet $wallet)
  {
    //
  }

  /**
   * @param Wallet $wallet
   *
   * @return Wallet
   */
  public function getRefresh(Wallet $wallet)
  {
    $this->commandBus->execute(new RefreshWalletBalanceCommand(compact('wallet')));
    $this->commandBus->execute(new RefreshWalletTransactionsCommand($wallet));

    return Redirect::route('wallets.show', $wallet->id);
  }

  /**
   * @param Wallet $wallet
   *
   * @return mixed
   */
  public function postSend(Wallet $wallet)
  {
    if($wallet->user_id != Auth::user()->id)
      dd('THIS IS NOT YOUR MONEY!');

    $input = Input::only('address', 'label', 'tradekey', 'amount');

    $this->commandBus->execute(new SendCoinCommand($input, $wallet));

    return Redirect::route('wallets.refresh', $wallet->id);
  }

  /**
   * @param Wallet $wallet
   */
  public function postMove(Wallet $wallet)
  {
    dd($wallet);
  }
}
