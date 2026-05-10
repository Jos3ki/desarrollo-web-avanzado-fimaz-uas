# Examen Práctico P3

## Materia
Desarrollo Web Avanzado

## Estudiante
Jose Carlos Castillo Padilla

## Docente
Dr. José Alfonso Aguilar Calderón

## Institución
Facultad de Informática Mazatlán (FIMAZ - UAS)

## Fecha
mayo 2026

---

## Descripción de la práctica
Este examen práctico consiste en desarrollar una aplicación web para la **gestión de torneos de basketball** usando el patrón **MVC en PHP**.  
La aplicación permite registrar torneos, consultar su información, editar datos existentes y eliminarlos.

## Objetivo
Aplicar los conceptos de Desarrollo Web Avanzado mediante:
- Separación de responsabilidades con **Modelo, Vista y Controlador**.
- Persistencia de datos en **MySQL** usando **PDO**.
- Construcción de interfaz con **Bootstrap**.
- Implementación de operaciones **CRUD** completas.

## Funcionalidades implementadas
1. **Crear torneo** con captura de:
   - Nombre del torneo
   - Organizador
   - Patrocinadores
   - Sede
   - Categoría
   - Premios (1er, 2do, 3er lugar y otro premio)
   - Usuario y contraseña del organizador
2. **Listar torneos** registrados.
3. **Consultar detalle** de un torneo.
4. **Editar torneo** existente.
5. **Eliminar torneo** con confirmación en modal.
6. **Cifrado de contraseña** mediante `password_hash`.

## Arquitectura del proyecto (MVC)
- **Modelo:** `models/torneosModel.php`
  - Conexión y consultas a base de datos.
- **Controlador:** `controllers/torneosController.php`
  - Lógica de negocio y flujo entre vista/modelo.
- **Vistas:** `views/admin/`
  - Formularios, listado, detalle y actualización.
- **Entrada principal:** `index.php`
  - Redirección al panel administrativo.
- **Configuración DB:** `config/DataBase.php`
  - Parámetros de conexión MySQL.

## Tecnologías utilizadas
- PHP
- MySQL
- PDO
- Bootstrap 5
- Font Awesome

## Estructura de carpetas
```text
examen-practico-p3/
├── config/
│   └── DataBase.php
├── controllers/
│   └── torneosController.php
├── models/
│   └── torneosModel.php
├── views/
│   ├── admin/
│   └── img/
├── index.php
└── README.md
```

## Requisitos
- PHP 8.x (o compatible con PDO MySQL)
- MySQL/MariaDB
- Servidor local (ej. Laragon, XAMPP o similar)
- Navegador web

## Configuración y ejecución
1. Clonar o copiar el proyecto dentro de tu servidor local (por ejemplo `www` en Laragon).
2. Crear la base de datos `proyecto`.
3. Crear la tabla `torneos` (ver script abajo).
4. Verificar credenciales en `config/DataBase.php`:
   - Host: `localhost`
   - DB: `proyecto`
   - User: `root`
   - Password: ``
5. Abrir en navegador:
   - `http://localhost/examen-practico-p3/`

## Script sugerido de base de datos
```sql
CREATE DATABASE IF NOT EXISTS proyecto;
USE proyecto;

CREATE TABLE IF NOT EXISTS torneos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombreTorneo VARCHAR(150) NOT NULL,
  organizador VARCHAR(150) NOT NULL,
  patrocinadores TEXT,
  sede VARCHAR(120) NOT NULL,
  categoria VARCHAR(80) NOT NULL,
  premio1 VARCHAR(120),
  premio2 VARCHAR(120),
  premio3 VARCHAR(120),
  otroPremio VARCHAR(120),
  usuario VARCHAR(80) NOT NULL,
  contrasena VARCHAR(255) NOT NULL
);
```

## Flujo de uso
1. Entrar al menú principal.
2. Registrar torneo en **Crear Torneo**.
3. Consultar registros en **Lista de Torneos**.
4. Desde la lista, ver detalle, editar o eliminar.

## Alcance académico
Práctica enfocada en reforzar:
- Diseño modular en PHP.
- Manejo de formularios y peticiones `POST/GET`.
- Operaciones CRUD con PDO.
- Organización de vistas e interfaz responsiva.
