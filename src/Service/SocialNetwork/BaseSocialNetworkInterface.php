<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 09.04.2020
 * Time: 12:29
 */

namespace Service\SocialNetwork;

use Service\User\Security;
use Symfony\Component\HttpFoundation\Request;

interface BaseSocialNetworkInterface
{
    // TODO метод получения config-данные для приложения из соц сети
    /**
     * @return Array (social_KEY,social_SECRET,social_REDIRECT_URI)
     */
    public function getConfig(): Array;

    /**
     * @param Request $request
     * @return Security $user
     */
    public static function authentification(Request $request): ?Security;
}