<?php

namespace Coinsbank\Transport;

use Coinsbank\Exception\CoinsbankRequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * Class HttpClient
 *
 * @package Coinsbank\Transport
 */
class CoinsbankHttpClient
{
    protected $guzzleClient;

    /**
     * HttpClient constructor.
     *
     * @param array $options Curl options
     */
    public function __construct($options = [])
    {
        $this->guzzleClient = new Client($options);
    }

    /**
     * Sends request to the endpoint.
     *
     * @param $method
     * @param $uri
     * @param $options
     * @return CoinsbankResponse
     * @throws CoinsbankRequestException
     */
    public function send($method, $uri, $options)
    {
        try {
            $response = $this->guzzleClient->request($method, $uri, $options);
        } catch (RequestException $e) {
            throw new CoinsbankRequestException($uri, $e->getResponse(), $e->getMessage(), $e->getCode(), $e);
        }
        $responseHeaders = $response->getHeaders();
        $responseBody = $response->getBody()->getContents();
        $httpResponseCode = $response->getStatusCode();

        return new CoinsbankResponse($responseHeaders, $responseBody, $httpResponseCode);
    }
}