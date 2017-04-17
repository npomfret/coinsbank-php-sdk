<?php

namespace Coinsbank\Auth;

use Coinsbank\Transport\CoinsbankHttpClient;

/**
 * Class CoinsbankAuth
 *
 * @package Coinsbank\Auth
 */
class CoinsbankApiContext
{
    const DEFAULT_CONNECTION_TIMEOUT = 10;
    const DEFAULT_CURL_TIMEOUT = 30;

    protected $httpConfig;

    protected $key;

    protected $secret;

    protected $signature;

    public function __construct($key, $secret, $httpSettings = [])
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->signature = new CoinsbankSignature($key, $secret);
        $httpSettings = array_merge($httpSettings, array(
            'curl' => array(
                CURLOPT_CONNECTTIMEOUT => self::DEFAULT_CONNECTION_TIMEOUT,
                CURLOPT_TIMEOUT        => self::DEFAULT_CURL_TIMEOUT,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_USERAGENT      => 'Coinsbank-PHP-SDK',
                // CURLOPT_PROXY          => '',
                //  CURLOPT_FORBID_REUSE   => true,
                CURLOPT_RETURNTRANSFER => true,
            )
        ));
        $this->client = new CoinsbankHttpClient($httpSettings);
    }

    /**
     * Returns REST-API key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Returns REST-API secret
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function getClient()
    {
        return $this->client;
    }
}