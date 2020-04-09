<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 09.04.2020
 * Time: 9:44
 */

namespace Service\Order;


use Service\Billing\Transfer\Card;
use Service\Discount\NullObject;
use Service\Communication\Sender\Email;
use Service\User\Security;

class CheckoutFacade
{
    public function __construct()
    {
        $basketBuilder = new BasketBuilder();
        $basketBuilder
            ->setBilling(new Card())
            ->setDiscount(new NullObject())
            ->setCommunication(new Email());
        return $basketBuilder;
    }
}