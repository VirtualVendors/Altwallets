<?php namespace Virtualvendors\Altwallets\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Virtualvendors\Altwallets\Entities\Wallet\Recipient\GetNewRecipientCommand;
use Virtualvendors\Altwallets\Recipient;
use Virtualvendors\Altwallets\Wallet;

class RecipientsController extends BaseController {

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
    $this->view('wallets.recipients.create', compact('wallet'));
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
    $input = Input::only('label', 'recipient');

    $this->commandBus->execute(new GetNewRecipientCommand($input, $wallet));

    return Redirect::route('wallets.show', $wallet->id);
  }


  /**
   * Display the specified resource.
   *
   * @param Wallet    $wallet
   * @param Recipient $recipient
   *
   * @internal param int $id
   * @return Response
   */
  public function show(Wallet $wallet, Recipient $recipient)
  {
    //
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param Wallet    $wallet
   * @param Recipient $recipient
   *
   * @internal param int $id
   * @return Response
   */
  public function edit(Wallet $wallet, Recipient $recipient)
  {
    //
  }


  /**
   * Update the specified resource in storage.
   *
   * @param Wallet    $wallet
   * @param Recipient $recipient
   *
   * @internal param int $id
   * @return Response
   */
  public function update(Wallet $wallet, Recipient $recipient)
  {
    //
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param Wallet    $wallet
   * @param Recipient $recipient
   *
   * @internal param int $id
   * @return Response
   */
  public function destroy(Wallet $wallet, Recipient $recipient)
  {
    //
  }
}
