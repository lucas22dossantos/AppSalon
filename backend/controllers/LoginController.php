<?php


namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if (empty($alertas)) {
                // comprobar si existe el usuario
                $usuario = Usuario::where('email', $auth->email);

                if ($usuario) {
                    // verificar el passsword
                    if ($usuario->comprobarPasswordAndVerificado($auth->password)) {
                    }
                } else {
                    Usuario::setAlerta('error', 'usuario no encontrado');
                }
            }
        }

        $router->render('auth/login', [
            'alertas' => $alertas ?? []
        ]);
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

                    // enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);

                    $email->enviarConfirmacion();

                    // Crear el usuario
                    $resultado = $usuario->guardar();

                    if ($resultado) {
                        header('Location: mensaje');
                        exit;
                    }
                }
            }
        }

        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function mensaje(Router $router)
    {
        $router->render('auth/mensaje');
    }


    public static function confirmar(Router $router)
    {
        $alertas = [];

        $token = s($_GET['token'] ?? '');

        $usuario = $token !== '' ? Usuario::where('token', $token) : null;

        if (empty($usuario)) {
            // mostrar mensaje
            Usuario::setAlerta('error', 'token no valido');
        } else {
            // modificar a usuario confirmado
            $usuario->confirmado = 1;
            $usuario->token = '';

            if ($usuario->guardar()) {
                Usuario::setAlerta('exito', 'Cuenta comprobada correctamente');
            } else {
                Usuario::setAlerta('error', 'No se pudo confirmar la cuenta');
            }
        }

        // obtener alertas
        $alertas = Usuario::getAlertas();

        // renderizar la vista
        $router->render('auth/confirmar-cuenta', [
            'alertas' => $alertas
        ]);
    }
}
