<?php

namespace Ivoz\Provider\Infrastructure\Domain\Service\RoutingTag;

use Ivoz\Core\Infrastructure\Domain\Service\XmlRpc\XmlRpcTrunksRequest;
use Ivoz\Provider\Domain\Model\RoutingTag\RoutingTagInterface;
use Ivoz\Provider\Domain\Service\RoutingTag\RoutingTagLifecycleEventHandlerInterface;

class SendTrunksLcrReloadRequest implements RoutingTagLifecycleEventHandlerInterface
{
    protected $trunksLcrReload;

    public function __construct(
        XmlRpcTrunksRequest $trunksLcrReload
    ) {
        $this->trunksLcrReload = $trunksLcrReload;
    }

    public static function getSubscribedEvents()
    {
        return [
            self::EVENT_ON_COMMIT => 10
        ];
    }

    public function execute(RoutingTagInterface $routingTag, $isNew)
    {
        $this->trunksLcrReload->send();
    }
}