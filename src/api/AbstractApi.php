<?php

namespace h0rseduck\etherscan\api;

use h0rseduck\etherscan\ApiInterface;
use h0rseduck\etherscan\Client;

/**
 * Class AbstractApi
 * @package h0rseduck\etherscan\api
 */
abstract class AbstractApi implements ApiInterface
{
    /**
     * Etherscan client.
     * @var Client
     */
    protected $client;

    /**
     * Yii Http Client
     * @var \yii\httpclient\Client
     */
    protected $httpClient;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->httpClient = new \yii\httpclient\Client([
            'baseUrl' => $this->client->getAPIUrl(),
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
    }

    /**
     * @return \yii\httpclient\Request
     */
    public function getRequest()
    {
        return $this->httpClient->createRequest();
    }
}