<?php namespace Virtualvendors\Altwallets;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model {

  /**
   * @var array
   */
  protected $fillable = [
    'recipient',
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