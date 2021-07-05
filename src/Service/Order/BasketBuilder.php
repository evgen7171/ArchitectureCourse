<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 06.04.2020
 * Time: 14:08
 */

namespace Service\Order;

use Service\Billing\Transfer\Card;
use Service\Communication\Sender\Email;
use Service\Discount\NullObject;
use Service\User\Security;

class BasketBuilder
{
    private $billing;
    private $discount;
    private $communication;
    private $security;

    public function setBilling(Card $billing)
    {
        $this->billing = $billing;
        return $this;
    }

    public function getBilling(): Card
    {
        return $this->billing;
    }

    public function setDiscount(NullObject $discount)
    {
        $this->discount = $discount;
        return $this;
    }

    public function getDiscount(): NullObject
    {
        return $this->discount;
    }

    public function setCommunication(Email $communication)
    {
        $this->communication = $communication;
        return $this;
    }

    public function getCommunication(): Email
    {
        return $this->communication;
    }

    public function setSecurity(Security $security)
    {
        $this->security = $security;
        return $this;
    }

    public function getSecurity(): Security
    {
        return $this->security;
    }

    public function build(): Basket
    {
        return new Basket($this);
    }

}