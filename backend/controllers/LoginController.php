<?php


namespace Controllers;

use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        // echo 'desde login prueba';
        $router->render('auth/login');
    }
    public static function logout()
    {
        echo 'desde logout prueba';
    }
    public static function olvide()
    {
        echo 'desde olvide prueba';
    }
    public static function recuperar()
    {
        echo 'desde recuperar prueba';
    }
    public static function crear(Router $router)
    {
        $router->render('auth/crear-cuenta', []);
    }
}
