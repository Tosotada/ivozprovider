<?php

namespace Ivoz\Provider\Infrastructure\Domain\Service\OutgoingRouting;

use Ivoz\Core\Infrastructure\Domain\Service\XmlRpc\XmlRpcTrunksRequestInterface;
use Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingInterface;
use Ivoz\Provider\Domain\Service\OutgoingRouting\OutgoingRoutingLifecycleEventHandlerInterface;

class SendTrunksLcrReloadRequest implements OutgoingRoutingLifecycleEventHandlerInterface
{
    protected $trunksLcrReload;

    public function __construct(
        XmlRpcTrunksRequestInterface $trunksLcrReload
    ) {
        $this->trunksLcrReload = $trunksLcrReload;
    }

    public static function getSubscribedEvents()
    {
        return [
            self::EVENT_ON_COMMIT => 10
        ];
    }

    public function execute(OutgoingRoutingInterface $entity)
    {
        $this->trunksLcrReload->send();
    }
}
