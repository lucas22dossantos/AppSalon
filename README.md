# AppSalon

Aplicación web para gestionar los turnos de un salón de belleza: servicios, usuarios, citas y autenticación.

El backend PHP MVC ya sirve las vistas iniciales de autenticación en XAMPP e integra el envío del correo de confirmación con PHPMailer. El objetivo es completar primero el backend y después evolucionar hacia una API PHP y un frontend React que se comuniquen mediante JSON.

## Estado actual

- **Hecho:** estructura MVC inicial, conexión local a MySQL, vistas de autenticación, validación inicial, hash de contraseñas, generación de tokens y envío de correo con PHPMailer.
- **En curso:** verificar que el enlace de confirmación actualice correctamente el usuario en MySQL, completar el inicio de sesión y la recuperación de contraseña. React todavía no está inicializado.
- **Estado:** el correo de confirmación ya se envía. El registro completo depende de verificar la confirmación de la cuenta en la base de datos. Las casillas de [Funcionalidades](#funcionalidades) detallan el avance.

## Arquitectura

```text
React (frontend/)  →  fetch  →  API PHP MVC (backend/)  →  MySQL
```

**El backend** se encargará de:

- rutas y endpoints
- validación de datos
- autenticación y sesiones
- acceso a la base de datos
- respuestas JSON

**El frontend** se encargará de:

- componentes de interfaz
- navegación
- formularios
- estados de carga y de error
- consumo de la API

## Stack

| Capa             | Tecnología                                                       | Estado                                       |
| ---------------- | ---------------------------------------------------------------- | -------------------------------------------- |
| Backend          | PHP, patrón MVC, Router propio, Active Record                    | Base inicial implementada                    |
| Dependencias PHP | Composer y PHPMailer                                             | Integradas; correo de confirmación funcional |
| Base de datos    | MySQL                                                            | Conexión local configurada                   |
| Frontend         | React + Vite                                                     | Por crear                                    |
| Estilos          | SASS + Gulp en la interfaz PHP inicial; estilos propios en React | SASS/Gulp disponibles; React pendiente       |
| Tooling          | Node.js (LTS reciente) y npm                                     | Instalado                                    |

## Estructura objetivo del repositorio

Es la estructura hacia la que se construye el proyecto. Cada parte se marca en el checklist cuando existe.

```text
AppSalon/
├── backend/                # Aplicación PHP MVC inicial; futura API
│   ├── composer.json
│   ├── gulpfile.js
│   ├── package.json        # Compilación de la interfaz PHP inicial (no es el de React)
│   ├── Router.php
│   ├── controllers/
│   │   └── LoginController.php
│   ├── clases/
│   │   └── Email.php       # Envío del correo de confirmación con PHPMailer
│   ├── includes/
│   │   ├── app.php
│   │   ├── database.php
│   │   └── funciones.php
│   ├── models/
│   │   ├── ActiveRecord.php
│   │   └── Usuario.php
│   ├── public/
│   │   └── index.php
│   ├── src/                # JS y SCSS de la interfaz PHP inicial
│   │   ├── img/
│   │   ├── js/
│   │   └── scss/
│   └── views/
│       ├── auth/
│       ├── templates/
│       └── layout.php
├── frontend/               # React + Vite
├── .gitignore
└── README.md
```

El backend carga Composer desde `backend/vendor/autoload.php`; `backend/composer.json` declara PHPMailer. Las carpetas `vendor/` y `node_modules/` son dependencias generadas y no se suben al repositorio.

## Funcionalidades

### Proyecto

- [x] Repositorio público en GitHub
- [x] `.gitignore` con dependencias, credenciales y archivos del sistema
- [x] Estructura base del backend en `backend/`

### Frontend (React)

- [ ] Proyecto Vite creado en `frontend/`
- [ ] Estructura de carpetas en `src/` (`components`, `pages`, `services`)
- [ ] Primer componente con datos de prueba
- [ ] Listado de servicios
- [ ] Reserva de citas
- [ ] Registro e inicio de sesión
- [ ] Panel de administración
- [ ] Conexión con la API real
- [ ] Diseño propio y adaptado a móvil

### Backend (PHP MVC)

- [x] Conexión local a MySQL (configurada en `backend/includes/database.php`)
- [x] Router y controlador inicial; las rutas GET de login, crear cuenta y olvido responden en XAMPP
- [x] Base Active Record y modelo `Usuario` con validaciones iniciales
- [ ] Registro completo de usuarios (validar, guardar y confirmar la cuenta)
- [x] Envío de correo de confirmación con PHPMailer
- [ ] Autenticación y sesiones
- [ ] CRUD de servicios
- [ ] Gestión de citas
- [ ] Endpoints que devuelven JSON

### Migración de la interfaz

- [ ] Primer endpoint real conectado a React
- [ ] Pantallas de la interfaz PHP reemplazadas por React, una por una
- [ ] Tag `v1-mvc` que marca la versión con interfaz PHP antes de migrar

## Ejecución

### Ejecución local verificada

Las vistas PHP se comprobaron con XAMPP y Apache en estas rutas:

```text
http://localhost/AppSalon/backend/public/
http://localhost/AppSalon/backend/public/crear-cuenta
http://localhost/AppSalon/backend/public/olvide
http://localhost/AppSalon/backend/public/confirmar-cuenta?token=<token-del-correo>
```

Apache debe permitir `mod_rewrite` y leer `backend/public/.htaccess`. MySQL debe estar activo y tener disponible la base configurada en `backend/includes/database.php` (`appsalon_mvc`). La conexión depende de la configuración local de XAMPP.

Frontend:

```bash
cd frontend
npm install
npm run dev
```

Backend:

```bash
cd backend
composer install
npm install            # solo si se usa Gulp para compilar la interfaz PHP
npm run dev
```

### Configuración pendiente

La conexión local a MySQL está configurada directamente en `backend/includes/database.php`. PHPMailer obtiene sus credenciales SMTP del archivo `.env` local, que no debe subirse al repositorio. Antes de desplegar, conviene mover también la configuración de base de datos a variables de entorno e incluir un `.env.example` sin secretos.

## Convenciones

- Commits pequeños y descriptivos, uno por funcionalidad o corrección.
- Prefijo en el mensaje según la parte del proyecto: `backend:`, `react:` o `docs:`. Ejemplo: `react: agregar componente ServicioCard con datos de prueba`.
- La validación importante se hace en el servidor; la del frontend es solo comodidad para el usuario.
- Nunca subir contraseñas, claves SMTP ni archivos `.env`.

## Objetivos de aprendizaje

AppSalon es también un proyecto de aprendizaje, y el repositorio guarda ese recorrido.

**Backend (PHP MVC)**

- separación en modelos, vistas y controladores
- un router que traduce URLs en llamadas a controladores
- modelos con Active Record
- autenticación, sesiones y validación en el servidor
- adaptar controladores para que respondan JSON

**Frontend (React)**

- componentes, props y estado
- organización de un proyecto con Vite
- consumo de una API con `fetch`
- estados de carga y de error
- reemplazar pantallas de a una, con diseño propio

El frontend arranca con datos de prueba y se conecta a la API a medida que existen los endpoints, así las dos partes avanzan en paralelo sin bloquearse.

## Créditos

El backend parte del proyecto AppSalon del curso **Desarrollo Web Completo con HTML5, CSS3, JS AJAX PHP y MySQL**, de **Juan Pablo De la Torre Valdez**. El frontend en React y el rediseño son trabajo propio.
