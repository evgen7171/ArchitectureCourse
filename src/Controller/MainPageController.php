<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 16.04.2020
 * Time: 15:26
 */

namespace Controller;

class MainPageController
{
    public static function action($parameters= [])
    {
        $view = 'main/index.html.php';
        $rootViewPath = Registry::getDataConfig('view.directory');
        $viewPath = $rootViewPath . $view;

        if (!file_exists($viewPath)) {
            return new Response('There is no view file ' . $view, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $path = function (string $name, array $parameters = []): string {
            return Registry::getRoute($name, $parameters);
        };

        $renderLayout = function (string $view, array $parameters = []) use ($rootViewPath, $path): void {
            $parameters['isAuth'] = (new Security(new Session()))->isLogged();
            extract($parameters, EXTR_SKIP);
            try {
                include_once str_replace('/', DIRECTORY_SEPARATOR, $rootViewPath . $view);
            } catch (\Throwable $e) {
                if (Registry::getDataConfig('environment') === 'dev') {
                    $error = $e->getMessage();
                    $trace = $e->getTraceAsString();
                    include_once str_replace('/', DIRECTORY_SEPARATOR, $rootViewPath . 'error500.html.php');
                } else {
                    throw $e;
                }
            }
        };

        ob_start();

        extract($parameters, EXTR_SKIP);
        include_once $viewPath;

        return new Response(ob_get_clean());

    }
}