<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;
use Coinsbank\Constant\CoinsbankRest;

class CoinsbankFreeze extends CoinsbankSapi
{
    const URL = '/freeze';

    /**
     * Returns transactions list.
     *
     * @param int $page
     * @param int $pageSize
     * @return \Coinsbank\Transport\CoinsbankResponse
     */
    public function getData($page = 0, $pageSize = CoinsbankRest::DEFAULT_PAGE_SIZE)
    {
        return $this->get(self::URL, compact('page', 'pageSize'));
    }
}