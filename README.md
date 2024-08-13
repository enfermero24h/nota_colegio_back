# # Sistema de Gestión de Notas - Backend

Este es el backend del Sistema de Gestión de Notas desarrollado con Laravel. El backend proporciona una API RESTful para gestionar estudiantes, cursos, materias, y calificaciones. También incluye un endpoint para generar usuarios aleatorios y calcular la letra más utilizada en sus nombres.

## Requisitos

- PHP 8.1 o superior
- Composer
- MySQL o cualquier base de datos compatible con Laravel

## Configuración del Proyecto

### 1. Clonar el repositorio

## bash
git clone https://github.com/enfermero24h/nota_colegio_back.git
cd tu-repositorio/nota_colegio_back

## 2. Instalar dependencias

## bash

composer install

## 3. Configurar las variables de entorno

## Copia el archivo .env.example y renómbralo a .env:

bash

## cp .env.example .env

## Luego, configura la conexión a la base de datos en el archivo .env:

dotenv

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña

## 4. Generar la clave de la aplicación

## bash

php artisan key:generate

## 5. Ejecutar migraciones y seeders

#### ##Este comando creará las tablas necesarias en la base de datos y las poblará con datos de ejemplo.

## bash
 
php artisan migrate --seed

## 6. Levantar el servidor de desarrollo

#### bash

php artisan serve

#### El backend estará disponible en http://127.0.0.1:8000.
## Endpoints de la API
Estudiantes

    GET /api/estudiantes: Listar todos los estudiantes.
    POST /api/estudiantes: Crear un nuevo estudiante.
    GET /api/estudiantes/{id}: Obtener los detalles de un estudiante específico.
    PUT /api/estudiantes/{id}: Actualizar un estudiante.
    DELETE /api/estudiantes/{id}: Eliminar un estudiante.

Cursos

    GET /api/cursos: Listar todos los cursos.
    POST /api/cursos: Crear un nuevo curso.
    GET /api/cursos/{id}: Obtener los detalles de un curso específico.
    PUT /api/cursos/{id}: Actualizar un curso.
    DELETE /api/cursos/{id}: Eliminar un curso.

Materias

    GET /api/materias: Listar todas las materias.
    POST /api/materias: Crear una nueva materia.
    GET /api/materias/{id}: Obtener los detalles de una materia específica.
    PUT /api/materias/{id}: Actualizar una materia.
    DELETE /api/materias/{id}: Eliminar una materia.

Notas

    GET /api/notas: Listar todas las notas.
    POST /api/notas: Crear una nueva nota.
    GET /api/notas/{id}: Obtener los detalles de una nota específica.
    PUT /api/notas/{id}: Actualizar una nota.
    DELETE /api/notas/{id}: Eliminar una nota.

Usuarios y Letra más Usada

    GET /api/random-users: Genera usuarios aleatoriamente y calcula la letra más utilizada en sus nombres.

Estructura del Proyecto

    app/Models: Contiene los modelos de Eloquent ORM para cada entidad (Estudiante, Curso, Materia, Nota).
    app/Http/Controllers: Contiene los controladores que manejan las solicitudes HTTP y devuelven las respuestas.
    app/Services: Contiene la lógica de negocio separada en servicios para cada modelo.
    routes/api.php: Define las rutas de la API.
