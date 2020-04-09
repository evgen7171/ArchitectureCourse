<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 09.04.2020
 * Time: 10:08
 */

namespace Service\SocialNetwork;

use Service\User\Security;
use Symfony\Component\HttpFoundation\Request;

class VKSocialNetwork extends BaseSocialNetwork implements BaseSocialNetworkInterface
{
    /**
     * @return Array (social_KEY,social_SECRET,social_REDIRECT_URI)
     */
    public function getConfig(): Array
    {
        // TODO: Implement getConfig() method.
    }

    /**
     * @param Request $request
     * @return Security $user
     */
    public static function authentification(Request $request): ?Security
    {
        // TODO: Implement authentification() method.
    }
}