<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 12.04.2020
 * Time: 20:12
 */

namespace Framework\Contract;

use Kernel;

interface CommandInterface
{
    /**
     * выполнение команды
     */
    public function excute():void;
}