<?php namespace Virtualvendors\Altwallets;

use Carbon\Carbon;
use Illuminate\Support\Facades\HTML;
use Illuminate\Support\Str;

class Transaction {

  /**
   * @var array
   */
  private $attributes;

  /**
   * @param array $attributes
   */
  function __construct(array $attributes)
  {
    $this->attributes = $attributes;
  }

  /**
   * @return static
   */
  public function getTimestampAttribute()
  {
    return Carbon::createFromTimestamp($this->time);
  }

  /**
   * @param $amount
   *
   * @return string
   */
  public function getAmountAttribute($amount)
  {
    return number_format($amount, 8);
  }

  /**
   * @return null|string
   */
  public function getClassAttribute()
  {
    switch($this->category)
    {
      case 'send':
        return 'danger';
        break;
      case 'receive':
        return 'success';
        break;
      case 'move':
        return $this->amount > 0 ? 'success' : 'danger';
        break;
    }

    return null;
  }

  /**
   * @param Currency $currency
   *
   * @return string
   */
  public function getTransactionLink(Currency $currency)
  {
    if($this->category == 'move')
      return '';

    if($currency->explorer)
    {
      return HTML::link(str_replace('%id', $this->txid, $currency->explorer), Str::limit($this->txid, 20), ['target' => '_blank']) . " <span class='fa fa-new-window'></span>";
    }

    return HTML::link('#', Str::limit($this->txid, 20), ['data-toggle' => 'tooltip', 'title' => $this->txid]);
  }

  /**
   * @param $value
   *
   * @return mixed|string
   */
  public function getAddressAttribute($value)
  {
    if($this->category == 'move')
    {
      $wallet = Wallet::find((int) $this->otheraccount);
      if($wallet)
        return $wallet->address;

      return '';
    } else
      return $value;
  }

  /**
   * @param $name
   *
   * @return mixed|null
   */
  function __get($name)
  {
    $method = 'get' . Str::studly($name) . 'Attribute';

    if(method_exists($this, $method))
      return call_user_func([$this, $method], @$this->attributes[$name]);

    if(array_key_exists($name, $this->attributes))
      return $this->attributes[$name];

    return null;
  }
}