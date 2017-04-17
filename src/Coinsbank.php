<?php

namespace Coinsbank;

use Coinsbank\Auth\Signature;
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
    const DEFAULT_CONNECTION_TIMEOUT = 30;

    /**
     * @var Signature REST-API Signature-generator.
     */
    protected $signature;

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
     * @param int $connectionTimeout
     */
    public function __construct(
        $key,
        $secret,
        $httpSettings = [],
        $connectionTimeout = self::DEFAULT_CONNECTION_TIMEOUT
    ) {
        $this->signature = new Signature($key, $secret);
        $httpSettings = array_merge($httpSettings, array(
            'curl' => array(
                CURLOPT_TIMEOUT        => $connectionTimeout,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
                // CURLOPT_PROXY          => '',
                //  CURLOPT_FORBID_REUSE   => true,
                CURLOPT_RETURNTRANSFER => true,
            )
        ));
        $this->client = new HttpClient($httpSettings);
    }

    /**
     * Sends a DELETE request to REST-API and returns the result.
     *
     * @param $uri
     * @param array $data
     * @return Transport\Response
     */
    public function delete($uri, array $data = [])
    {
        return $this->sendRequest(
            Rest::DELETE,
            $uri,
            array('form_params' => $data)
        );
    }

    /**
     * Sends a GET request to REST-API and returns the result.
     *
     * @param $uri
     * @param array $data
     * @return Transport\Response
     */
    public function get($uri, array $data = [])
    {
        return $this->sendRequest(
            Rest::GET,
            $uri,
            array('query' => $data)
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
            $isMultipart ? array('multipart' => $data) : array('form_params' => $data)
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
            array('form_params' => $data)
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
        array $data = array()
    ) {
        $data['headers'] = array('Content-Type' => 'application/json', 'Key' => $this->signature->getKey(), 'Signature' => $this->signature->generate($data, $uri, $method));

        return $this->client->send($method, $uri, $data);
    }
}