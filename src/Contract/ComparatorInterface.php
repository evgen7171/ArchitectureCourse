<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 12.04.2020
 * Time: 11:59
 */

namespace Contract;


interface ComparatorInterface
{
    /**
     * @param $a
     * @param $b
     * @return int
     */
    public function compare($a, $b): int;
}