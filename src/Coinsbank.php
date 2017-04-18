<?php

namespace Coinsbank;

use Coinsbank\Constant\CoinsbankRest;

/**
 * Class Coinsbank
 *
 * @package Coinsbank
 *
 */
class Coinsbank
{
    const DEFAULT_PAGE_SIZE = 50;

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
     * Sends a DELETE request to REST-API and returns the result.
     *
     * @param $uri
     * @param array $data
     * @return Transport\CoinsbankResponse
     */
    public function delete($uri, array $data = [])
    {
        return $this->sendRequest(
            CoinsbankRest::DELETE,
            $uri,
            array('form_params' => $data)
        );
    }

    /**
     * Sends a GET request to REST-API and returns the result.
     *
     * @param $uri
     * @param array $data
     * @return Transport\CoinsbankResponse
     */
    public function get($uri, array $data = [])
    {
        return $this->sendRequest(
            CoinsbankRest::GET,
            $uri,
            array('query' => $data)
        );
    }

    /**
     * Returns prepared path with ID.
     *
     * @param $path
     * @param $id
     * @return string
     */
    public function getPathWithId($path, $id)
    {
        return sprintf('%s/_$s', $path, $id);
    }

    /**
     * Sends a POST request to REST-API and returns the result.
     *
     * @param $uri
     * @param array $data
     * @param bool $isMultipart
     * @return Transport\CoinsbankResponse
     */
    public function post($uri, array $data = [], $isMultipart = false)
    {
        return $this->sendRequest(
            CoinsbankRest::POST,
            $uri,
            $isMultipart ? array('multipart' => $data) : array('form_params' => $data)
        );
    }

    /**
     * Sends a DELETE request to REST-API and returns the result.
     *
     * @param $uri
     * @param array $data
     * @return Transport\CoinsbankResponse
     */
    public function put($uri, array $data = [])
    {
        return $this->sendRequest(
            CoinsbankRest::PUT,
            $uri,
            array('form_params' => $data)
        );
    }


    /**
     * Sends a request to REST-API and returns the result.
     *
     * @param $method
     * @param $uri
     * @param array $data
     * @return Transport\CoinsbankResponse
     */
    public function sendRequest(
        $method,
        $uri,
        array $data = array()
    ) {
        $data['headers'] = array('Content-Type' => 'application/json', 'Key' => $this->context->getKey(), 'Signature' => $this->context->getSignature()->generate($data, $uri, $method));

        return $this->context->getClient()->send($method, CoinsbankRest::REST_API_URI . $uri, $data);
    }
}