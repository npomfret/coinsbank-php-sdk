<?php

namespace Coinsbank;

use Coinsbank\Constant\CoinsbankRest;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class CoinsbankApi
 *
 * @package Coinsbank
 */
class CoinsbankSapi extends Coinsbank
{
    /**
     * Returns proper REST-API uri.
     *
     * @return string
     */
    protected function getApiUri()
    {
        switch ($this->context->getMode()) {
            case CoinsbankApiContext::MODE_SANDBOX:
                $uri = CoinsbankRest::REST_SAPI_SANDBOX_URI;
                break;
            case CoinsbankApiContext::MODE_PRODUCTION:
            default:
                $uri = CoinsbankRest::REST_SAPI_URI;
                break;
        }

        return $uri;
    }

    /**
     * Returns prepared path with ID.
     *
     * @param string $path
     * @param string $id
     * @return string
     */
    protected function getPathWithId($path, $id)
    {
        return sprintf('%s/_%s', $path, $id);
    }

    /**
     * Sends a request to REST-API and returns the result.
     *
     * @param string $method
     * @param string $path
     * @param array $data
     * @param array $headers
     * @return CoinsbankResponse
     */
    public function sendRequest(
        $method,
        $path,
        array $data = array(),
        array $headers = array()
    ) {
        $headers = array_replace(array('Key' => $this->context->getKey(), 'Signature' => $this->context->getSignature()->generate($data, $path, $method)), $headers);

        return parent::sendRequest($method, $path, $data, $headers);
    }
}