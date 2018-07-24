<?php

namespace h0rseduck\etherscan\api;

use yii\httpclient\Response;

/**
 * Class Block
 * @package h0rseduck\etherscan\api
 */
class Block extends AbstractApi
{
    /**
     * Get Block And Uncle Rewards by BlockNo.
     * @param int $blockNumber
     * @return array|mixed
     */
    public function getBlockReward($blockNumber)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "block",
            'action' => "getblockreward",
            'blockno' => $blockNumber
        ])->send();
        return $response->getData();
    }
}