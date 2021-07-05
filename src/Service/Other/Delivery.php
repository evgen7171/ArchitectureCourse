<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 06.04.2020
 * Time: 15:44
 */

namespace Service\Order;


class Delivery
{
    private $notification;
    private $address;
    private $action;
    private $status;

    public function __construct($address, $action, $notification = '')
    {
        $this->address = $address;
        $this->action = $action ?: 'undefined';
        $this->status = 'undefined';
    }

    /**
     * @return mixed
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @param mixed $notification
     */
    public function setNotification($notification): void
    {
        $this->notification = $notification;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

}