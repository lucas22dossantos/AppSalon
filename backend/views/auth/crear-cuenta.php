<?php

/** @var \Model\Usuario $usuario */
?>

<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>

<?php
include_once __DIR__ . '/../templates/alertas.php';
?>


<form class="fomulario" method="POST" action="">
    <div class="campo">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo s($usuario->nombre); ?>" placeholder="Tu nombre" required>
    </div>
    <div class="campo">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo s($usuario->apellido); ?>" placeholder="Tu apellido" required>
    </div>
    <div class="campo">
        <label for="telefono">Telefono:</label>
        <input type="tel" id="telefono" name="telefono" value="<?php echo s($usuario->telefono); ?>" placeholder="Tu telefono" required>
    </div>
    <div class="campo">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo s($usuario->email); ?>" placeholder="Tu email" required>
    </div>
    <div class="campo">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="contraseña" required>
    </div>
    <input type="submit" class="boton" value="Crear cuenta">
</form>

<div class="acciones">
    <a href="./">¿ya tienes una cuenta? inicia sesion</a>
    <a href="olvide">¿olvidaste tu contraseña?</a>
</div>