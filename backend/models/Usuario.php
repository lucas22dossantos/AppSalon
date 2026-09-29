<?php

namespace Model;

class Usuario extends ActiveRecord
{
    // base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'telefono', 'admin', 'token', 'confirmado'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $token;
    public $confirmado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? 0;
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
    }

    // mensaje de validacion para la creacion de cuenta
    public function validarNuevaCuenta()
    {
        static::$alertas = [];

        if (!$this->nombre) {
            self::$alertas['error'][] = "El nombre es obligatorio";
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = "El apellido es obligatorio";
        }
        if (!$this->email) {
            self::$alertas['error'][] = "El email es obligatorio";
        }
        if (!$this->password) {
            self::$alertas['error'][] = "El password es obligatorio";
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = "El password debe tener al menos 6 caracteres";
        }
        return static::$alertas;
    }

    // revisa si el usuario existe
    public function existeUsuario()
    {
        $email = self::$db->escape_string($this->email);
        $query = "SELECT * FROM " . static::$tabla . " WHERE email = '{$email}' LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$alertas['error'][] = "El usuario ya esta registrado";
        }

        return $resultado;
    }
}
