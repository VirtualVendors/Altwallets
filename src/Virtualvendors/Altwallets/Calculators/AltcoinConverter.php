<?php namespace Virtualvendors\Altwallets\Calculators;

use Virtualvendors\Altwallets\Currency;

class AltcoinConverter {

  /**
   * @var TradeRates
   */
  private $rates;

  /**
   * @var BitcoinConverter
   */
  private $btc;

  /**
   * @param TradeRates       $rates
   * @param BitcoinConverter $btc
   */
  function __construct(TradeRates $rates, BitcoinConverter $btc)
  {
    $this->rates = $rates;
    $this->btc = $btc;
  }

  /**
   * @param Currency $currency
   * @param          $amount
   *
   * @return mixed
   */
  public function convert(Currency $currency, $amount)
  {
    $btc = $this->altToBtc($currency, $amount);
    $usd = $this->btcToUsd($btc);

    return $usd;
  }

  /**
   * @param Currency $currency
   * @param          $amount
   *
   * @return mixed
   */
  public function altToBtc(Currency $currency, $amount)
  {
    $rate = $this->fetchRate($currency);

    return $amount * $rate;
  }

  /**
   * @param $btc
   *
   * @return mixed
   */
  public function btcToUsd($btc)
  {
    return $this->btc->convert($btc);
  }

  /**
   * @param Currency $currency
   *
   * @return mixed
   */
  private function fetchRate(Currency $currency)
  {
    return $this->rates->fetch($currency->market_id);
  }
}