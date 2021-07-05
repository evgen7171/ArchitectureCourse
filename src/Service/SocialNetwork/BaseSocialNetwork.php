<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 09.04.2020
 * Time: 13:02
 */

namespace Service\SocialNetwork;


use Service\User\Security;
use Symfony\Component\HttpFoundation\Request;

class BaseSocialNetwork
{
    private $config;

    public function __construct()
    {
        $this->config = $this->getConfig();
    }
}