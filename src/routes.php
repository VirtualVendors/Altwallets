<?php

use Virtualvendors\Altwallets\Wallet;

Route::group(['namespace' => 'Virtualvendors\Altwallets\Controllers'], function ()
{
  /* Global Routes */
  Route::get('/', ['as' => 'home', 'uses' => 'HomeController@getIndex']);

  /* Logged Out Routes */
  Route::group(['before' => 'guest'], function ()
  {
    Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@getLogin']);
    Route::post('login', ['as' => 'login', 'uses' => 'SessionsController@postLogin']);

    //Route::controller('password', 'RemindersController');

    Route::get('register', ['as' => 'register', 'uses' => 'RegistrationController@getRegister']);
    Route::post('register', ['as' => 'register', 'uses' => 'RegistrationController@postRegister']);
    Route::get('register/activate', ['as' => 'register.activate', 'uses' => 'RegistrationController@getActivate']);
  });

  /* Logged In Routes */
  Route::group(['before' => 'auth'], function ()
  {

    Route::resource('wallets', 'WalletsController');
    Route::get('wallets/{wallets}/refresh', ['as' => 'wallets.refresh', 'uses' => 'WalletsController@getRefresh']);
    Route::post('wallets/{wallets}/send', ['as' => 'wallets.send', 'uses' => 'WalletsController@postSend']);
    Route::post('wallets/{wallets}/move', ['as' => 'wallets.move', 'uses' => 'WalletsController@postMove']);
    Route::bind('wallets', function ($id)
    {
      $wallet = Wallet::findOrFail($id);

      if( ! Auth::user()->super && $wallet->user_id != Auth::user()->id)
        throw new Illuminate\Database\Eloquent\ModelNotFoundException('No query results for model [Wallet].');

      return $wallet;
    });

    Route::resource('wallets.addresses', 'AddressesController');
    Route::model('addresses', 'Virtualvendors\Altwallets\Address');

    Route::resource('wallets.tradekeys', 'TradeKeysController');
    Route::model('tradekeys', 'Virtualvendors\Altwallets\TradeKey');

    Route::resource('wallets.recipients', 'RecipientsController');
    Route::model('recipients', 'Virtualvendors\Altwallets\Recipient');

    Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@getLogout']);

    /* Admin Routes */
    Route::group(['before' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function ()
    {
      Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@getIndex']);

      Route::resource('users', 'UsersController');
      Route::model('users', 'Virtualvendors\Altwallets\User');

      Route::resource('currencies', 'CurrenciesController');
      Route::model('currencies', 'Virtualvendors\Altwallets\Currency');
    });
  });
});