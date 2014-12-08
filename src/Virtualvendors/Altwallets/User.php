<?php namespace Virtualvendors\Altwallets;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class User extends Model implements UserInterface, RemindableInterface {

  use UserTrait, RemindableTrait;

  /**
   * @var string
   */
  protected $table = 'users';

  /**
   * @var array
   */
  protected $hidden = ['password', 'remember_token'];

  /**
   * @var array
   */
  protected $fillable = [
    'email',
    'password',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function wallets()
  {
    return $this->hasMany('Virtualvendors\Altwallets\Wallet');
  }

  /**
   * @param Builder $query
   *
   * @return mixed
   */
  public function scopeActive(Builder $query)
  {
    return $query->whereActive(true);
  }

  /**
   * @param $value
   */
  public function setPasswordAttribute($value)
  {
    $this->attributes['password'] = Hash::make($value);
  }

  /**
   * @return array
   */
  public function getNetWorthAttribute()
  {
    $balances = [];
    /** @var \Virtualvendors\Altwallets\Calculators\AltcoinConverter $converter */
    $converter = App::make('Virtualvendors\Altwallets\Calculators\AltcoinConverter');

    foreach($this->wallets as $wallet)
    {
      if( ! array_key_exists($wallet->currency_id, $balances))
        $balances[$wallet->currency_id] = 0;

      $balances[$wallet->currency_id] += $wallet->balance;
    }

    $worths = [];
    foreach($balances as $currency_id => $balance)
    {
      /** @var Currency $currency */
      $currency = Currency::find($currency_id);

      $worths[$currency->code] = $converter->convert($currency, $balance);
    }

    return $worths;
  }
}
