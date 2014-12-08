<?php namespace Virtualvendors\Altwallets\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Virtualvendors\Altwallets\Entities\Wallet\TradeKey\GetNewTradeKeyCommand;
use Virtualvendors\Altwallets\TradeKey;
use Virtualvendors\Altwallets\Wallet;

class TradeKeysController extends BaseController {

  /**
   * Display a listing of the resource.
   *
   * @param Wallet $wallet
   *
   * @return Response
   */
  public function index(Wallet $wallet)
  {
    //
  }


  /**
   * Show the form for creating a new resource.
   *
   * @param Wallet $wallet
   *
   * @return Response
   */
  public function create(Wallet $wallet)
  {
    $this->view('wallets.tradekeys.create', compact('wallet'));
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param Wallet $wallet
   *
   * @return Response
   */
  public function store(Wallet $wallet)
  {
    $input = Input::only('label', 'tradekey');

    $this->commandBus->execute(new GetNewTradeKeyCommand($input, $wallet));

    return Redirect::route('wallets.show', $wallet->id);
  }


  /**
   * Display the specified resource.
   *
   * @param Wallet   $wallet
   * @param TradeKey $tradekey
   *
   * @internal param int $id
   * @return Response
   */
  public function show(Wallet $wallet, TradeKey $tradekey)
  {
    //
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param Wallet   $wallet
   * @param TradeKey $tradekey
   *
   * @internal param int $id
   * @return Response
   */
  public function edit(Wallet $wallet, TradeKey $tradekey)
  {
    //
  }


  /**
   * Update the specified resource in storage.
   *
   * @param Wallet   $wallet
   * @param TradeKey $tradekey
   *
   * @internal param int $id
   * @return Response
   */
  public function update(Wallet $wallet, TradeKey $tradekey)
  {
    //
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param Wallet   $wallet
   * @param TradeKey $tradekey
   *
   * @internal param int $id
   * @return Response
   */
  public function destroy(Wallet $wallet, TradeKey $tradekey)
  {
    //
  }
}
