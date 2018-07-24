<?php

namespace h0rseduck\etherscan\api;

use yii\httpclient\Response;

/**
 * Class Transaction
 * @package h0rseduck\etherscan\api
 */
class Transaction extends AbstractApi
{
    /**
     * Check Contract Execution Status (if there was an error during contract execution).
     * Note: isError":"0" = Pass , isError":"1" = Error during Contract Execution.
     * @param string $transactionHash
     * @return array
     */
    public function getStatus($transactionHash)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "transaction",
            'action' => "getstatus",
            'txhash' => $transactionHash
        ])->send();
        return $response->getData();
    }
}