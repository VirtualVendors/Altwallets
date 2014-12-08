<?php namespace Virtualvendors\Altwallets;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Nbobtc\Bitcoind\Bitcoind;
use Nbobtc\Bitcoind\Client;

class Currency extends Model {

  /**
   * @var array
   */
  protected $fillable = [
    'code',
    'name',
    'active',
    'scheme',
    'username',
    'password',
    'address',
    'port',
    'explorer',
    'market_id',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function wallets()
  {
    return $this->hasMany('Virtualvendors\Altwallets\Wallet');
  }

  /**
   * @param $password
   *
   * @return string
   */
  public function getPasswordAttribute($password)
  {
    return Crypt::decrypt($password);
  }

  /**
   * @param $password
   */
  public function setPasswordAttribute($password)
  {
    $this->attributes['password'] = Crypt::encrypt($password);
  }

  /**
   * @return string
   */
  public function getProtectedLocationAttribute()
  {
    return $this->scheme . '://' . $this->username . ':*******@' . $this->address . ':' . $this->port;
  }

  public function getLocationAttribute()
  {
    return $this->scheme . '://' . $this->username . ':' . $this->password . '@' . $this->address . ':' . $this->port . '/';
  }

  public function getClientAttribute()
  {
    if( ! ($this->rpcClient instanceof Client))
      $this->rpcClient = $this->getClient();

    return $this->rpcClient;
  }

  protected function getClient()
  {
    return new Bitcoind(new Client($this->location));
  }

  public function getTransactionsAttribute()
  {
    return Cache::remember('transactions-on-currency-' . $this->id, Cache::get('altwallets.transactions.ttl'), function ()
    {
      $transactions = $this->client->listtransactions();

      $filtered = array_reverse(Arr::where($transactions, function ($key, $transaction)
      {
        if(in_array($transaction->category, ['send', 'receive', 'move']))
          return true;

        return false;
      }));

      return array_map(function ($transaction)
      {
        return new Transaction((array) $transaction);
      }, $filtered);
    });
  }
}