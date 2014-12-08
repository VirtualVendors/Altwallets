<?php namespace Virtualvendors\Altwallets;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class Wallet extends Model {

  /**
   * @var array
   */
  protected $fillable = [
    'address',
    'label',
    'tradekey',
    'balance',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user()
  {
    return $this->belongsTo('Virtualvendors\Altwallets\User');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function currency()
  {
    return $this->belongsTo('Virtualvendors\Altwallets\Currency');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function addresses()
  {
    return $this->hasMany('Virtualvendors\Altwallets\Address');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function tradekeys()
  {
    return $this->hasMany('Virtualvendors\Altwallets\TradeKey');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function recipients()
  {
    return $this->hasMany('Virtualvendors\Altwallets\Recipient');
  }

  /**
   * @return mixed
   */
  public function getTransactionsAttribute()
  {
    return Cache::remember('transactions-for-' . $this->id, Cache::get('altwallets::transactions.ttl'), function ()
    {
      $transactions = $this->currency->client->listtransactions($this->id, 20, 0);

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