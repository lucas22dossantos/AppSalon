<h1 class="nombre-pagina">Crear Nueva Citas</h1>
<p class="descripcion-pagina">Elige tus servicios y coloca tus datos</p>

<div id="app">
    <div class="tabs">
        <button type="button" data-paso="1">Servicios</button>
        <button type="button" data-paso="2">Información Cita</button>
        <button type="button" data-paso="3">Resumen</button>
    </div>

    <div id="paso-1" class="seccion">
        <h2>Servicios</h2>
        <p>Elige tus servicios a continuación</p>
        <div id="servicios" class="listado-servicios"></div>
    </div>
    <div id="paso-2" class="seccion">
        <h2>Datos del Cliente</h2>
        <p>Coloca tus datos y fecha de tu cita</p>

        <form class="formulario">
            <div class="campo">
                <label class="text-center" for="nombre">Nombre</label>
                <input id="nombre" type="text" placeholder="Tu nombre" value="<?php echo $nombre; ?>" disabled>

            </div>
            <div class="campo">
                <label class="text-center" for="fecha">Fecha</label>
                <input id="fecha" type="date" readonly>
            </div>
            <div class="campo">
                <label class="text-center" for="hora">Hora</label>
                <input id="hora" type="time" readonly>
            </div>
        </form>
    </div>
    <div id="paso-3" class="seccion">
        <h2>Resumen</h2>
        <p>Verifica que la inforamción sea correcta</p>
    </div>

    <div class="paginacion">
        <button id="anterior" class="boton">
            &laquo; Anterior
        </button>
        <button id="siguiente" class="boton">
            Siguiente &raquo;
        </button>
    </div>
</div>

<?php
$script = "
        <script src='build/js/app.js'></script>
    ";
?>