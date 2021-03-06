<?php

namespace Ivoz\Core\Infrastructure\Domain\Service\Cgrates;

use Graze\GuzzleHttp\JsonRpc\ClientInterface;

abstract class AbstractApiBasedService
{
    /**
     * @var ClientInterface
     */
    protected $jsonRpcClient;

    public function __construct(
        ClientInterface $jsonRpcClient
    ) {
        $this->jsonRpcClient = $jsonRpcClient;
    }

    /**
     * @param $payload
     * @throws \DomainException
     * @return void
     * @throws \DomainException
     */
    protected function sendRequest($method, array $payload)
    {
        /** @var \Graze\GuzzleHttp\JsonRpc\Message\Request $request */
        $request = $this->jsonRpcClient
            ->request(
                1,
                $method,
                [$payload]
            );

        /** @var \Graze\GuzzleHttp\JsonRpc\Message\Response $response */
        $response = $this->jsonRpcClient->send($request);
        $stringResponse = $response->getBody()->__toString();
        $objectResponse = json_decode($stringResponse);

        if ($objectResponse->error) {
            $errorMsg = sprintf(
                'CgRates API error response:  %s',
                $objectResponse->error
            );
            throw new \RuntimeException($errorMsg);
        }
    }
}
