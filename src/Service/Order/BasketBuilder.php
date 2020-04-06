<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 06.04.2020
 * Time: 14:08
 */

namespace Service\Order;


class CheckoutBuilder
{
    private $billing;
    private $discount;
    private $communication;

    public function setBilling(Card $billing)
    {
        $this->billing = $billing;
    }

    public function getBilling(): Card
    {
        return $this->billing;
    }

    public function build(): Order
    {
        return new Order($this);
    }

}