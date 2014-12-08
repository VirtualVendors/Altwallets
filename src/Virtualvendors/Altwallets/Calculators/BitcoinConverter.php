<?php namespace Virtualvendors\Altwallets\Calculators;

use Illuminate\Support\Facades\Config;

class BitcoinConverter {

  /**
   * @var TradeRates
   */
  private $rates;

  /**
   * @param TradeRates $rates
   */
  function __construct(TradeRates $rates)
  {
    $this->rates = $rates;
  }

  /**
   * @param $amount
   *
   * @return mixed
   */
  public function convert($amount)
  {
    $rate = $this->fetchRate();

    return $amount * $rate;
  }

  /**
   * @return mixed
   */
  public function fetchRate()
  {
    $id = Config::get('altwallets::calculation.btc_market_id');

    return $this->rates->fetch(2);
  }
}