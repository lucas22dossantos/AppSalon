# AppSalon

Aplicación web para gestionar los turnos de un salón de belleza: servicios, usuarios, citas y autenticación.

El proyecto está diseñado para evolucionar hacia una arquitectura con una API en PHP (patrón MVC) y un frontend en React que se comunican mediante JSON. Ambas partes están en desarrollo inicial.

## Estado actual

- **Hecho:** planificación y definición de la arquitectura.
- **En curso:** preparación del backend y creación del proyecto de frontend con Vite.
- **Todavía no ejecutable:** aún no hay aplicación que correr. Las casillas de [Funcionalidades](#funcionalidades) muestran el avance.

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

| Capa             | Tecnología                                                       | Estado                               |
| ---------------- | ---------------------------------------------------------------- | ------------------------------------ |
| Backend          | PHP, patrón MVC, Router propio, Active Record                    | Planificado                          |
| Dependencias PHP | Composer                                                         | Planificado                          |
| Base de datos    | MySQL                                                            | A confirmar al configurar el backend |
| Frontend         | React + Vite                                                     | Por crear                            |
| Estilos          | SASS + Gulp en la interfaz PHP inicial; estilos propios en React | Planificado                          |
| Tooling          | Node.js (LTS reciente) y npm                                     | Instalado                            |

## Estructura objetivo del repositorio

Es la estructura hacia la que se construye el proyecto. Cada parte se marca en el checklist cuando existe.

```text
AppSalon/
├── backend/                # API PHP MVC
│   ├── composer.json
│   ├── gulpfile.js
│   ├── package.json        # Compilación de la interfaz PHP inicial (no es el de React)
│   ├── Router.php
│   ├── controllers/
│   ├── includes/
│   │   ├── app.php
│   │   ├── database.php
│   │   └── funciones.php
│   ├── models/
│   │   └── ActiveRecord.php
│   ├── public/
│   │   └── index.php
│   ├── src/                # JS y SCSS de la interfaz PHP inicial
│   │   ├── img/
│   │   ├── js/
│   │   └── scss/
│   └── views/
│       └── layout.php
├── frontend/               # React + Vite
├── .gitignore
└── README.md
```

Cada carpeta principal tiene sus propias dependencias: `vendor/` y `node_modules/` se generan dentro de `backend/` y `frontend/`, y ninguna se sube al repositorio.

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

- [ ] Conexión a la base de datos
- [ ] Router y primer controlador
- [ ] Modelos con Active Record
- [ ] Autenticación y sesiones
- [ ] CRUD de servicios
- [ ] Gestión de citas
- [ ] Endpoints que devuelven JSON

### Migración de la interfaz

- [ ] Primer endpoint real conectado a React
- [ ] Pantallas de la interfaz PHP reemplazadas por React, una por una
- [ ] Tag `v1-mvc` que marca la versión con interfaz PHP antes de migrar

## Ejecución

### Ejecución prevista

Requisitos: Git, Node.js (LTS reciente) y npm, PHP, Composer y MySQL o MariaDB. Las versiones exactas de PHP y de las extensiones se documentarán al tener el `composer.json` definitivo.

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
npm install            # solo si se usa la compilación de la interfaz PHP
php -S localhost:8000 -t public
```

### Configuración pendiente

Las credenciales de base de datos y correo no se suben al repositorio. El plan es:

1. Guardar los valores reales en un archivo `.env` local, ignorado por Git.
2. Incluir un `.env.example` con los nombres de las variables y sin datos reales.

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
