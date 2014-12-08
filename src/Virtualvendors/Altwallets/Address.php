<?php namespace Virtualvendors\Altwallets;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

  /**
   * @var array
   */
  protected $fillable = [
    'address',
    'label',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function wallet()
  {
    return $this->belongsTo('Virtualvendors\Altwallets\Wallet');
  }
}