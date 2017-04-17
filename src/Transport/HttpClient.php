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
class HttpClient
{
    protected $guzzleClient;

    /**
     * HttpClient constructor.
     *
     * @param array $options Curl options
     */
    public function __construct($options = [])
    {
        $options = array_merge([
            'curl' => [
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_PROXY          => '',
                CURLOPT_FORBID_REUSE   => true,
            ]
        ], $options);
        $this->guzzleClient = new Client($options);
    }

    /**
     * Sends request to the endpoint.
     *
     * @param $method
     * @param $uri
     * @param $body
     * @return Response
     * @throws CoinsbankRequestException
     */
    public function send($method, $uri, $body)
    {
        try {
            $response = $this->guzzleClient->request($method, $uri, $body);
        } catch (RequestException $e) {
            throw new CoinsbankRequestException($uri, $e->getResponse(), $e->getMessage(), $e->getCode(), $e);
        }
        $responseHeaders = $response->getHeaders();
        $responseBody = $response->getBody()->getContents();
        $httpResponseCode = $response->getStatusCode();

        return new Response($responseHeaders, $responseBody, $httpResponseCode);
    }
}