<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 12.04.2020
 * Time: 20:10
 */

namespace Framework\Command;

use Framework\Contract\CommandInterface;
use Kernel;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @property ContainerBuilder containerBuilder
 * @property mixed routeCollection
 */
class RegisterRoutesCommand implements CommandInterface
{
    protected $routeCollection;
    protected $containerBuilder;

    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
        $this->containerBuilder = $kernel->getContainerBuilder();
    }

    /**
     * выполение команды
     */
    public function excute(): void
    {
        $this->routeCollection = require __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routing.php';
        $this->containerBuilder->set('route_collection', $this->routeCollection);
    }
}