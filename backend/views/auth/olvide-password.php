<h1 class="nombre-pagina">Olvide Password</h1>
<p class="descripcion-pagina">Restablece tu password escribiendo tu correo acontinuación</p>

<form class="fomulario" method="POST" action="/olvide">

    <div class="campo">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Tu email" required>
    </div>
    <input type="submit" class="boton" value="Restablecer password">
</form>

<div class="acciones">
    <a href="./">¿ya tienes una cuenta? inicia sesion</a>
    <a href="crear-cuenta">¿Aún no tienes cuenta?</a>
</div>