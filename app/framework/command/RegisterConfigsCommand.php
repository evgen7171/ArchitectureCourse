<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 12.04.2020
 * Time: 20:09
 */

namespace Framework\Command;

use Framework\Contract\CommandInterface;
use Kernel;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

/**
 * @property ContainerBuilder containerBuilder
 */
class RegisterConfigsCommand implements CommandInterface
{
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
        try {
            $fileLocator = new FileLocator(__DIR__ . DIRECTORY_SEPARATOR . 'config');
            $loader = new PhpFileLoader($this->containerBuilder, $fileLocator);
            $loader->load('parameters.php');
        } catch (\Throwable $e) {
            die('Cannot read the config file. File: ' . __FILE__ . '. Line: ' . __LINE__);
        }
    }
}