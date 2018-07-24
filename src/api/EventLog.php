<?php

namespace h0rseduck\etherscan\api;

use h0rseduck\etherscan\Client;
use yii\httpclient\Response;

/**
 * Class EventLog
 * @package h0rseduck\etherscan\api
 */
class EventLog extends AbstractApi
{
    /**
     * Get Event Logs
     * @param $address
     * @param $topic
     * @param int $startBlock
     * @param string $endBlock
     * @return array|mixed
     */
    public function getLogs($address, $topic, $startBlock = 0, $endBlock = Client::TAG_LATEST)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => 'logs',
            'action' => 'getLogs',
            'fromBlock' => $startBlock,
            'toBlock' => $endBlock,
            'address' => $address,
            'topic0' => $topic,
        ])->send();
        return $response->getData();
    }
}