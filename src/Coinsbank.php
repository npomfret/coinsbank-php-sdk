<?php

namespace Coinsbank;

use Coinsbank\Constant\Rest;
use Coinsbank\Transport\HttpClient;

/**
 * Class Coinsbank
 *
 * @package Coinsbank
 *
 */
class Coinsbank
{
    /**
     * @var string REST-API key.
     */
    protected $key;

    /**
     * @var string REST-API secret.
     */
    protected $secret;

    /**
     * @var HttpClient Client.
     */
    protected $client;

    /**
     * Coinsbank constructor.
     *
     * @param $key
     * @param $secret
     * @param array $httpSettings
     */
    public function __construct($key, $secret, $httpSettings = [])
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->client = new HttpClient($httpSettings);
    }

    /**
     * Sends a DELETE request to REST-API and returns the result.
     *
     * @param $endpoint
     * @param array $data
     * @return Transport\Response
     */
    public function delete($endpoint, array $data = [])
    {
        return $this->sendRequest(
            Rest::DELETE,
            $endpoint,
            ['form_params' => $data]
        );
    }

    /**
     * Sends a GET request to REST-API and returns the result.
     *
     * @param $endpoint
     * @param array $data
     * @return Transport\Response
     */
    public function get($endpoint, array $data = [])
    {
        return $this->sendRequest(
            Rest::GET,
            $endpoint,
            ['query' => $data]
        );
    }

    /**
     * Returns HttpClient
     *
     * @return HttpClient
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Sends a POST request to REST-API and returns the result.
     *
     * @param $uri
     * @param array $data
     * @param bool $isMultipart
     * @return Transport\Response
     */
    public function post($uri, array $data = [], $isMultipart = false)
    {
        return $this->sendRequest(
            Rest::POST,
            $uri,
            $isMultipart ? ['multipart' => $data] : ['form_params' => $data]
        );
    }

    /**
     * Sends a DELETE request to REST-API and returns the result.
     *
     * @param $uri
     * @param array $data
     * @return Transport\Response
     */
    public function put($uri, array $data = [])
    {
        return $this->sendRequest(
            Rest::PUT,
            $uri,
            ['form_params' => $data]
        );
    }


    /**
     * Sends a request to REST-API and returns the result.
     *
     * @param $method
     * @param $uri
     * @param array $data
     * @return Transport\Response
     */
    public function sendRequest(
        $method,
        $uri,
        array $data = []
    ) {
        return $this->client->send($method, $uri, $data);
    }
}