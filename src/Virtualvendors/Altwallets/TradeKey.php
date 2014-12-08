<?php namespace Virtualvendors\Altwallets;

use Illuminate\Database\Eloquent\Model;

class TradeKey extends Model {

  /**
   * @var string
   */
  protected $table = 'tradekeys';

  /**
   * @var array
   */
  protected $fillable = [
    'tradekey',
    'label',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function wallet()
  {
    return $this->belongsTo('Virtualvendors\Altwallets\Wallet');
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function currency()
  {
    return $this->belongsTo('Virtualvendors\Altwallets\Currency');
  }
}