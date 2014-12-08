<?php namespace Virtualvendors\Altwallets\Controllers;

use Illuminate\Support\Facades\Redirect;
use Virtualvendors\Altwallets\Address;
use Virtualvendors\Altwallets\Entities\Wallet\Address\GetNewAddressCommand;
use Virtualvendors\Altwallets\Wallet;

class AddressesController extends BaseController {

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
    $this->view('wallets.addresses.create', compact('wallet'));
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
    $input = Input::only('label');

    $this->commandBus->execute(new GetNewAddressCommand($input, $wallet));

    return Redirect::route('wallets.show', $wallet->id);
  }


  /**
   * Display the specified resource.
   *
   * @param Wallet  $wallet
   * @param Address $address
   *
   * @internal param int $id
   * @return Response
   */
  public function show(Wallet $wallet, Address $address)
  {
    //
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param Wallet  $wallet
   * @param Address $address
   *
   * @internal param int $id
   * @return Response
   */
  public function edit(Wallet $wallet, Address $address)
  {
    //
  }


  /**
   * Update the specified resource in storage.
   *
   * @param Wallet  $wallet
   * @param Address $address
   *
   * @internal param int $id
   * @return Response
   */
  public function update(Wallet $wallet, Address $address)
  {
    //
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param Wallet  $wallet
   * @param Address $address
   *
   * @internal param int $id
   * @return Response
   */
  public function destroy(Wallet $wallet, Address $address)
  {
    //
  }
}
