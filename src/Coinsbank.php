<?php

namespace Coinsbank;

use Coinsbank\Constant\CoinsbankRest;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class Coinsbank
 *
 * @package Coinsbank
 *
 */
class Coinsbank
{
    protected $context;

    /**
     * Coinsbank constructor.
     *
     * @param CoinsbankApiContext $context
     */
    public function __construct(CoinsbankApiContext $context)
    {
        $this->context = $context;
    }

    /**
     * Returns proper API uri.
     *
     * @return string
     */
    protected function getApiUri()
    {
        switch ($this->context->getMode()) {
            case CoinsbankApiContext::MODE_SANDBOX:
                $uri = CoinsbankRest::REST_API_SANDBOX_URI;
                break;
            case CoinsbankApiContext::MODE_PRODUCTION:
            default:
                $uri = CoinsbankRest::REST_API_URI;
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
     * Returns proper REST-API uri.
     *
     * @return string
     */
    protected function getSapiUri()
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
     * Sends a DELETE request to REST-API and returns the result.
     *
     * @param string $uri
     * @param array $data
     * @return CoinsbankResponse
     */
    public function delete($uri, array $data = array())
    {
        return $this->sendRequest(
            CoinsbankRest::DELETE,
            $uri,
            array('json' => $data)
        );
    }

    /**
     * Sends a GET request to REST-API and returns the result.
     *
     * @param string $uri
     * @param array $data
     * @return CoinsbankResponse
     */
    public function get($uri, array $data = array())
    {
        return $this->sendRequest(
            CoinsbankRest::GET,
            $uri,
            array('query' => $data)
        );
    }

    /**
     * Sends a POST request to REST-API and returns the result.
     *
     * @param string $uri
     * @param array $data
     * @param bool $isMultipart
     * @return CoinsbankResponse
     */
    public function post($uri, array $data = array(), $isMultipart = false)
    {
        return $this->sendRequest(
            CoinsbankRest::POST,
            $uri,
            $isMultipart ? array('multipart' => $data) : array('json' => $data)
        );
    }

    /**
     * Sends a DELETE request to REST-API and returns the result.
     *
     * @param string $uri
     * @param array $data
     * @return CoinsbankResponse
     */
    public function put($uri, array $data = array())
    {
        return $this->sendRequest(
            CoinsbankRest::PUT,
            $uri,
            array('json' => $data)
        );
    }

    /**
     * Sends a request to REST-API and returns the result.
     *
     * @param string $method
     * @param string $path
     * @param array $data
     * @return CoinsbankResponse
     */
    public function sendRequest(
        $method,
        $path,
        array $data = array()
    ) {
        $data['headers'] = array('Content-Type' => 'application/json', 'Key' => $this->context->getKey(), 'Signature' => $this->context->getSignature()->generate($data, $path, $method));

        return $this->context->getClient()->send($method, $this->getSapiUri() . $path, $data);
    }
}