<?php namespace Virtualvendors\Altwallets\Calculators;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class TradeRates {

  /**
   * @var string
   */
  protected $url = 'http://pubapi.cryptsy.com/api.php?method=singlemarketdata&marketid=';

  public function fetch($marketId)
  {
    $markets = (array) $this->getJson($marketId)->return->markets;

    return $markets[array_keys($markets)[0]]->lasttradeprice;
  }

  /**
   * @param $marketId
   *
   * @return mixed
   */
  public function getJson($marketId)
  {
    $ttl = Config::get('altwallets::calculation.trade_rate_ttl');

    return Cache::remember('lasttradeprice.' . $marketId, $ttl, function () use ($marketId)
    {
      return json_decode(file_get_contents($this->url . $marketId));
    });
  }
}