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
abstract class Coinsbank
{
    protected $context;

    abstract protected function getApiUri();

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
     * Sends a DELETE request to REST-API and returns the result.
     *
     * @param string $uri
     * @param array|object $data
     * @param array $headers
     * @return CoinsbankResponse
     */
    public function delete($uri, $data = array(), $headers = array())
    {
        return $this->sendRequest(
            CoinsbankRest::DELETE,
            $uri,
            array('json' => $data),
            $headers
        );
    }

    /**
     * Sends a GET request to REST-API and returns the result.
     *
     * @param string $uri
     * @param array|object $data
     * @param array $headers
     * @return CoinsbankResponse
     */
    public function get($uri, $data = array(), $headers = array())
    {
        return $this->sendRequest(
            CoinsbankRest::GET,
            $uri,
            array('query' => $data),
            $headers
        );
    }

    /**
     * Sends a POST request to REST-API and returns the result.
     *
     * @param string $uri
     * @param array|object $data
     * @param array $headers
     * @param bool $isMultipart
     * @return CoinsbankResponse
     */
    public function post($uri, $data = array(), $headers = array(), $isMultipart = false)
    {
        return $this->sendRequest(
            CoinsbankRest::POST,
            $uri,
            $isMultipart ? array('multipart' => $data) : array('json' => $data),
            $headers
        );
    }

    /**
     * Sends a DELETE request to REST-API and returns the result.
     *
     * @param string $uri
     * @param array|object $data
     * @param array $headers
     * @return CoinsbankResponse
     */
    public function put($uri, $data = array(), $headers = array())
    {
        return $this->sendRequest(
            CoinsbankRest::PUT,
            $uri,
            array('json' => $data),
            $headers
        );
    }

    /**
     * Sends a request to REST-API and returns the result.
     *
     * @param string $method
     * @param string $path
     * @param array|object $data
     * @param array $headers
     * @return CoinsbankResponse
     */
    public function sendRequest(
        $method,
        $path,
        $data = array(),
        array $headers = array()
    ) {
        $data['headers'] = array_replace(!isset($data['multipart']) ? array('Content-Type' => 'application/json') : array(), $headers);

        return $this->context->getClient()->send($method, $this->getApiUri() . $path, $data);
    }
}