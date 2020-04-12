<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 12.04.2020
 * Time: 12:03
 */

namespace Comparator;

use Contract\ComparatorInterface;
use Model\Entity\Product;

class PriceComparator implements ComparatorInterface
{
    /**
     * @param Product $a
     * @param Product $b
     * @return int
     */
    public function compare($a, $b): int
    {
        return $a->getPrice() <=> $b->getPrice();
    }
}