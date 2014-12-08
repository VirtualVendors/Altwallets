<?php

Route::filter('admin', function ()
{
  if(!Auth::user()->super)
    return Redirect::home();
});

View::composer('altwallets::layout', function($view){
  $markets = Cache::remember('market.values', Config::get('altwallets::market_values.ttl'), function()
  {
    return (array)json_decode(file_get_contents('http://btc.blockr.io/api/v1/coin/info'));
  });
	$view->with('markets', $markets);
});
