<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia sesion con tus datos</p>

<form class="fomulario" method="POST" action="">
    <div class="campo">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Tu email" required>
    </div>
    <div class="campo">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="contraseña" required>
    </div>
    <input type="submit" class="boton" value="Iniciar Sesion">
</form>

<div class="acciones">
    <a href="crear-cuenta">Crear Cuenta</a>
    <a href="olvide">¿olvidaste tu contraseña?</a>
</div>