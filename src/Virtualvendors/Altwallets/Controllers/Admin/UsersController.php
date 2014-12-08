<?php namespace Virtualvendors\Altwallets\Controllers\Admin;

use Virtualvendors\Altwallets\Entities\User\CreateUserCommand;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Virtualvendors\Altwallets\User;
use Virtualvendors\Altwallets\Controllers\BaseController;

class UsersController extends BaseController {

  /**
   * Display a listing of the resource.
   * @return \Response
   */
  public function index()
  {
    $users = User::paginate();

    $this->view('admin.users.index', compact('users'));
  }


  /**
   * Show the form for creating a new resource.
   * @return \Response
   */
  public function create()
  {
    $this->view('admin.users.create');
  }


  /**
   * Store a newly created resource in storage.
   * @return \Response
   */
  public function store()
  {
    $input = Input::only('email', 'password');

    $this->commandBus->execute(new CreateUserCommand($input));

    return Redirect::route('admin.users.index');
  }


  /**
   * Display the specified resource.
   *
   * @param User $user
   *
   * @internal param int $id
   * @return \Response
   */
  public function show(User $user)
  {
    //
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param User $user
   *
   * @internal param int $id
   * @return \Response
   */
  public function edit(User $user)
  {
    //
  }


  /**
   * Update the specified resource in storage.
   *
   * @param User $user
   *
   * @internal param int $id
   * @return \Response
   */
  public function update(User $user)
  {
    //
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param User $user
   *
   * @internal param int $id
   * @return \Response
   */
  public function destroy(User $user)
  {
    //
  }
}
