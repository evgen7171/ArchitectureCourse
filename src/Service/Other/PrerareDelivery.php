<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 06.04.2020
 * Time: 15:26
 */

namespace Service\Order;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class PrerareDelivery
{
    public function __construct()
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->setParameter('delivery.notification', 'shipping notice');
        $containerBuilder->setParameter('delivery.address', 'N-city, Dragomilova, 12');
        $containerBuilder->setParameter('delivery.action', 'send package');
        $containerBuilder->setParameter('delivery.status', 'ready to ship');
        $containerBuilder
            ->register('delivery', 'Delivery')
            ->addArgument('%delivery.notification%')
            ->addArgument('%delivery.address%')
            ->addArgument('%delivery.action%')
            ->addArgument('%delivery.status%');
    }
}