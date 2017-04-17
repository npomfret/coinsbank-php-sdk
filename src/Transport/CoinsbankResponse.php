<?php

namespace Coinsbank\Transport;

/**
 * Class Response
 *
 * @package Coinsbank\Transport
 */
class CoinsbankResponse
{
    /**
     * @var array The response headers.
     */
    protected $headers;

    /**
     * @var string The response body.
     */
    protected $body;

    /**
     * @var int The HTTP status response code.
     */
    protected $httpResponseCode;

    /**
     * Response constructor.
     *
     * @param $headers
     * @param $body
     * @param null $httpResponseCode
     */
    public function __construct($headers, $body, $httpResponseCode = null)
    {
        $this->httpResponseCode = (int)$httpResponseCode;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * Returns the body of the response.
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Returns the JSON-decoded body
     *
     * @return string
     */
    public function getBodyAsJSON()
    {
        return json_encode($this->body, true);
    }

    /**
     * Returns the response headers.
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Returns the HTTP response code.
     *
     * @return int
     */
    public function getHttpResponseCode()
    {
        return $this->httpResponseCode;
    }
}