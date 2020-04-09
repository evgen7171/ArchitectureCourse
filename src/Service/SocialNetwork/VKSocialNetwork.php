<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 09.04.2020
 * Time: 10:08
 */

namespace Service\SocialNetwork;


abstract class BaseSocialNetwork implements BaseSocialNetworkInterface
{
    public function __construct()
    {
        $this->config = $this->getConfig();
    }

    abstract public function getConfig();

    public function login()
    {
        session()->get('soc.token');
        if (Auth::id()) {
            return redirect()->route('home');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responce()
    {
        if (Auth::id()) {
            return redirect()->route('home');
        }
        $user = Socialite::driver('vkontakte')->user();
        session(['soc.token' => $user->token]);
        $userInSystem = $userRepository->getUserBySocIdVK($user, 'vk');
        Auth::login($userInSystem);
        return redirect()->route('home');
    }
}