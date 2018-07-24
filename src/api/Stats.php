<?php

namespace h0rseduck\etherscan\api;

use yii\httpclient\Response;

/**
 * Class Stats
 * @package h0rseduck\etherscan\api
 */
class Stats extends AbstractApi
{
    /**
     * Get Token TotalSupply by TokenName (Supported TokenNames: DGD, MKR,
     * FirstBlood, HackerGold, ICONOMI, Pluton, REP, SNGLS).
     * or
     * by ContractAddress.
     * @param string $tokenIdentifier Token name from the list or contract address.
     * @return array|mixed
     */
    public function tokenSupply($tokenIdentifier)
    {
        $params = [
            'apikey' => $this->client->getApiKey(),
            'module' => "stats",
            'action' => "tokensupply",
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

    /**
     * Get Total Supply of Ether.
     * @return array|mixed Result returned in Wei, to get value in Ether divide resultAbove / 1000000000000000000
     */
    public function ethSupply()
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "stats",
            'action' => "ethsupply",
        ])->send();
        return $response->getData();
    }

    /**
     * Get Ether LastPrice Price.
     * @return array|mixed
     */
    public function ethPrice()
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "stats",
            'action' => "ethprice",
        ])->send();
        return $response->getData();
    }
}