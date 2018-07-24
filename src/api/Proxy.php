<?php

namespace h0rseduck\etherscan\api;

use h0rseduck\etherscan\Client;
use yii\httpclient\Response;

/**
 * Class Proxy
 * @package h0rseduck\etherscan\api
 */
class Proxy extends AbstractApi
{
    /**
     * Returns the number of most recent block
     * @return array|mixed
     */
    public function ethBlockNumber()
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "proxy",
            'action' => "eth_blockNumber"
        ])->send();
        return $response->getData();
    }

    /**
     * Returns information about a block by block number.
     * @param string $tag
     * @param bool $boolean
     * @return array|mixed
     */
    public function ethGetBlockByNumber($tag, $boolean)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "proxy",
            'action' => "eth_getBlockByNumber",
            'tag' => $tag,
            'boolean' => $boolean
        ])->send();
        return $response->getData();
    }

    /**
     * Returns information about a uncle by block number.
     * @param string $tag
     * @param string $index
     * @return array|mixed
     */
    public function ethGetUncleByBlockNumberAndIndex($tag, $index)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "proxy",
            'action' => "eth_getUncleByBlockNumberAndIndex",
            'tag' => $tag,
            'index' => $index
        ])->send();
        return $response->getData();
    }

    /**
     * Returns the number of transactions in a block from a block matching the given block number
     * @param string $tag
     * @return array|mixed
     */
    public function ethGetBlockTransactionCountByNumber($tag)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "proxy",
            'action' => "eth_getBlockTransactionCountByNumber",
            'tag' => $tag
        ])->send();
        return $response->getData();
    }

    /**
     * Returns the information about a transaction requested by transaction hash
     * @param string $txhash
     * @return array|mixed
     */
    public function ethGetTransactionByHash($txhash)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "proxy",
            'action' => "eth_getTransactionByHash",
            'txhash' => $txhash
        ])->send();
        return $response->getData();
    }

    /**
     * Returns information about a transaction by block number and transaction index position
     * @param string $tag
     * @return array|mixed
     */
    public function ethGetTransactionByBlockNumberAndIndex($tag)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "proxy",
            'action' => "eth_getTransactionByBlockNumberAndIndex",
            'tag' => $tag
        ])->send();
        return $response->getData();
    }

    /**
     * Returns the number of transactions sent from an address
     * @param string $address
     * @param string $tag
     * @return array|mixed
     */
    public function ethGetTransactionCount($address, $tag = Client::TAG_LATEST)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "proxy",
            'action' => "eth_getTransactionCount",
            'address' => $address,
            'tag' => $tag
        ])->send();
        return $response->getData();
    }

    /**
     * Creates new message call transaction or a contract creation for signed transactions
     * @param string $hex
     * @return array|mixed
     */
    public function ethSendRawTransaction($hex)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "proxy",
            'action' => "eth_sendRawTransaction",
            'hex' => $hex
        ])->send();
        return $response->getData();
    }

    /**
     * Returns the receipt of a transaction by transaction hash
     * @param string $txhash
     * @return array|mixed
     */
    public function ethGetTransactionReceipt($txhash)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "proxy",
            'action' => "eth_getTransactionReceipt",
            'txhash' => $txhash
        ])->send();
        return $response->getData();
    }

    /**
     * Executes a new message call immediately without creating a transaction on the block chain
     * @param string $data
     * @param string $tag
     * @return array|mixed
     */
    public function ethCall($data, $tag = Client::TAG_LATEST)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "proxy",
            'action' => "eth_call",
            'data' => $data,
            'tag' => $tag
        ])->send();
        return $response->getData();
    }

    /**
     * Returns code at a given address
     * @param string $address
     * @param string $tag
     * @return array|mixed
     */
    public function ethGetCode($address, $tag = Client::TAG_LATEST)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "proxy",
            'action' => "eth_getCode",
            'address' => $address,
            'tag' => $tag
        ])->send();
        return $response->getData();
    }

    /**
     * Returns the current price per gas in wei.
     * @return array|mixed
     */
    public function ethGasPrice()
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "proxy",
            'action' => "eth_gasPrice"
        ])->send();
        return $response->getData();
    }

    /**
     * Makes a call or transaction, which won't be added to the blockchain and returns the used gas,
     * which can be used for estimating the used gas
     * @param string $to
     * @param string $value
     * @param string $gasPrice
     * @param string $gas
     * @return array|mixed
     */
    public function ethEstimateGas($to, $value, $gasPrice, $gas)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "proxy",
            'action' => "eth_estimateGas",
            'to' => $to,
            'value' => $value,
            'gasPrice' => $gasPrice,
            'gas' => $gas
        ])->send();
        return $response->getData();
    }
}