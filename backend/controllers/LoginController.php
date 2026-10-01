<?php


namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {

        $router->render('auth/login');
    }
    public static function logout()
    {
        echo 'desde logout prueba';
    }
    public static function olvide(Router $router)
    {
        $router->render('auth/olvide-password', []);
    }
    public static function recuperar()
    {
        echo 'desde recuperar prueba';
    }
    public static function crear(Router $router)
    {
        $usuario = new Usuario();

        // alertas vacias
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            // revisar que alertas este vacio
            if (empty($alertas)) {

                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    // hashear la contraseña
                    $usuario->hashPassword();

                    // generar token
                    $usuario->crearToken();

                    debuguear($usuario);
                }
            }
        }

        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}
