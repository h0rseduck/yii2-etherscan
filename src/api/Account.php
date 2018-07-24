<?php

namespace h0rseduck\etherscan\api;

use h0rseduck\etherscan\Client;
use yii\base\InvalidArgumentException;
use yii\httpclient\Response;

/**
 * Class Account
 * @package h0rseduck\etherscan\api
 */
class Account extends AbstractApi
{
    /**
     * Get Ether Balance for a single Address
     * @param string $address
     * @param string $tag
     * @return array|mixed
     */
    public function balance($address, $tag = Client::TAG_LATEST)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "account",
            'action' => "balance",
            'address' => $address,
            'tag' => $tag
        ])->send();
        return $response->getData();
    }

    /**
     * Get Ether Balance for multiple Addresses in a single call.
     * @param array|string $addresses
     * @param string $tag
     * @return array|mixed
     */
    public function balanceMulti($addresses, $tag = Client::TAG_LATEST)
    {
        if (is_array($addresses)) {
            $addresses = implode(",", $addresses);
        }
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "account",
            'action' => "balancemulti",
            'address' => $addresses,
            'tag' => $tag
        ])->send();
        return $response->getData();
    }

    /**
     * Get a list of 'Normal' Transactions By Address
     * (Returns up to a maximum of the last 10000 transactions only).
     * @param string $address Ether address.
     * @param int $startBlock Starting blockNo to retrieve results
     * @param int $endBlock Ending blockNo to retrieve results
     * @param string $sort 'asc' or 'desc'
     * @param int $page Page number
     * @param int $offset Offset
     * @return array|mixed
     */
    public function transactionListByAddress($address, $startBlock = 0, $endBlock = 99999999, $sort = "asc", $page = null, $offset = null)
    {
        $params = [
            'apikey' => $this->client->getApiKey(),
            'module' => "account",
            'action' => "txlist",
            'address' => $address,
            'startblock' => $startBlock,
            'endblock' => $endBlock,
            'sort' => $sort
        ];
        if (!is_null($page)) {
            $params['page'] = (int)$page;
        }
        if (!is_null($offset)) {
            $params['offset'] = (int)$offset;
        }
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData($params)->send();
        return $response->getData();
    }


    /**
     * Get a list of 'Internal' Transactions by Address
     * (Returns up to a maximum of the last 10000 transactions only).
     * @param string $address Ether address.
     * @param int $startBlock Starting blockNo to retrieve results
     * @param int $endBlock Ending blockNo to retrieve results
     * @param string $sort 'asc' or 'desc'
     * @param int $page Page number
     * @param int $offset Offset
     * @return array|mixed
     */
    public function transactionListInternalByAddress($address, $startBlock = 0, $endBlock = 99999999, $sort = "asc", $page = null, $offset = null)
    {
        $params = [
            'apikey' => $this->client->getApiKey(),
            'module' => "account",
            'action' => "txlistinternal",
            'address' => $address,
            'startblock' => $startBlock,
            'endblock' => $endBlock,
            'sort' => $sort
        ];
        if (!is_null($page)) {
            $params['page'] = (int)$page;
        }
        if (!is_null($offset)) {
            $params['offset'] = (int)$offset;
        }
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData($params)->send();
        return $response->getData();
    }

    /**
     * Get "Internal Transactions" by Transaction Hash.
     * @param string $transactionHash
     * @return array|mixed
     */
    public function transactionListInternalByHash($transactionHash)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "account",
            'action' => "txlistinternal",
            'txhash' => $transactionHash
        ])->send();
        return $response->getData();
    }

    /**
     * Get list of Blocks Mined by Address.
     * @param string $address Ether address
     * @param string $blockType "blocks" or "uncles"
     * @param int $page Page number
     * @param int $offset Offset
     * @return array|mixed
     * @throws InvalidArgumentException
     */
    public function getMinedBlocks($address, $blockType = Client::BLOCK_TYPE_BLOCKS, $page = null, $offset = null)
    {
        if (!in_array($blockType, Client::$blockTypes)) {
            throw new InvalidArgumentException("Invalid block type");
        }
        $params = [
            'apikey' => $this->client->getApiKey(),
            'module' => "account",
            'action' => "getminedblocks",
            'address' => $address,
            'blocktype' => $blockType,
        ];

        if (!is_null($page)) {
            $params['page'] = (int)$page;
        }

        if (!is_null($offset)) {
            $params['offset'] = (int)$offset;
        }
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData($params)->send();
        return $response->getData();
    }


    /**
     * Get Token Account Balance by known TokenName (Supported TokenNames: DGD,
     * MKR, FirstBlood, HackerGold, ICONOMI, Pluton, REP, SNGLS).
     * or
     * for TokenContractAddress.
     * @param string $tokenIdentifier Token name from the list or contract address.
     * @param string $address Ether address.
     * @param string $tag
     * @return array|mixed
     */
    public function tokenBalance($tokenIdentifier, $address, $tag = Client::TAG_LATEST)
    {
        $params = [
            'apikey' => $this->client->getApiKey(),
            'module' => "account",
            'action' => "tokenbalance",
            'address' => $address,
            'tag' => $tag
        ];
        if (strlen($tokenIdentifier) === 42) {
            $params['contractaddress'] = $tokenIdentifier;
        } else {
            $params['tokenname'] = $tokenIdentifier;
        }
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData($params)->send();
        return $response->getData();
    }
}