<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>

<form class="fomulario" method="POST" action="">
    <div class="campo">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
    </div>
    <div class="campo">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" placeholder="Tu apellido" required>
    </div>
    <div class="campo">
        <label for="telefono">Telefono:</label>
        <input type="tel" id="telefono" name="telefono" placeholder="Tu telefono" required>
    </div>
    <div class="campo">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Tu email" required>
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