<?php

namespace Coinsbank\Auth;

/**
 * Class Signature
 *
 * @package Coinsbank\Auth
 */
class CoinsbankSignature
{
    /**
     * @var string REST-API key
     */
    protected $key;

    /**
     * @var string REST-API secret
     */
    protected $secret;

    /**
     * Signature constructor.
     *
     * @param $key
     * @param $secret
     */
    public function __construct($key, $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
    }

    /**
     * Extracts path from URI.
     *
     * @param $pathInfo
     * @return bool|string
     */
    protected function getPath($pathInfo)
    {
        return trim(parse_url($pathInfo, PHP_URL_PATH), "/");
    }

    /**
     * Extracts body part of request data.
     *
     * @param $data
     * @return mixed
     */
    protected function getBody($data)
    {
        return !is_array($data) ? [] : (isset($data['json']) ? $data['json'] : (isset($data['multipart']) ? $data['multipart'] : isset($data['query']) ? $data['query'] : $data));
    }

    /**
     * Generates signature for auth.
     *
     * @param $data
     * @param $uri
     * @param $requestType - POST|GET|PUT|DELETE
     * @return string
     */
    public function generate($data, $uri, $requestType)
    {
        $signatureData = http_build_query(array('_key' => $this->key, '_method' => $this->getPath($uri), '_type' => strtoupper($requestType)) + $this->getBody($data));

        return hash_hmac('sha512', $signatureData, $this->secret);
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
}