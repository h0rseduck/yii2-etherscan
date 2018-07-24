<?php

namespace h0rseduck\etherscan\api;

/**
 * Class Contract
 * @package h0rseduck\etherscan\api
 */
class Contract extends AbstractApi
{
    /**
     * Get Contract ABI for Verified Contract Source Codes.
     * (Newly verified Contracts are synched to the API servers within 5 minutes or less).
     * @param string $address Ether address.
     * @return array|mixed
     */
    public function getABI($address)
    {
        $request = $this->getRequest();
        /** @var Response $response */
        $response = $request->setData([
            'apikey' => $this->client->getApiKey(),
            'module' => "contract",
            'action' => "getabi",
            'address' => $address
        ])->send();
        return $response->getData();
    }
}