<?php

use Framework\Registry;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .
    'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$request = Request::createFromGlobals();

//паттерн Front Controller релизован через подключаемый класс Request - для обработки всех запросов.
//формируется сам запрос с помощью метода createFromGlobals

$containerBuilder = new ContainerBuilder();

Registry::addContainer($containerBuilder);

//реализация паттера Реестр (Ragistry)
//Registry::addContainer для регистрации контайнера,
// в который помещается само приложение (ContainerBuilder)

$response = (new Kernel($containerBuilder))->handle($request);

//запрос обрабатывается с поомщью метода handle "ядра" приложения,
// помещенного в контайнер - передается параметр containerBuilder

$response->send();
