# 🎓 Examen Práctico - Segundo Parcial

---

## 👤 Información del Estudiante

> **Materia:** Desarrollo Web Avanzado  
> **Estudiante:** Jose Carlos Castillo Padilla  
> **Docente:** Dr. José Alfonso Aguilar Calderón  
> **Institución:** Facultad de Informática Mazatlán (FIMAZ - UAS)  
> **Fecha:** Abril 2026

---

## 🎯 Objetivo del Examen

Desarrollar un sistema integral de gestión (**CRUD**) que demuestre el dominio de la **Programación Orientada a Objetos (POO)** en PHP, la implementación de seguridad en consultas mediante **PDO (PHP Data Objects)** y una arquitectura de software organizada y escalable.

---

## 🏗️ Arquitectura del Sistema

El proyecto sigue un patrón de diseño organizado por capas para separar la lógica de conexión, el modelado de datos y el control de la interfaz:

## 🗂️ Estructura del Proyecto

```
📦 practica1-parcial2
 ┣ 📂 config
 ┃ ┗ 📄 Database.php        # Clase de conexión a la BD con PDO
 ┣ 📂 models
 ┃ ┗ 📄 Producto.php         # Clase modelo con atributos y métodos
 ┣ 📂 controllers
 ┃ ┗ 📄 ProductoController.php  # Lógica de negocio (CRUD)
 ┗ 📄 index.php              # Vista principal + manejo de peticiones
```

---

## 🛠️ Stack Tecnológico

| Tecnología        | Implementación                          |
| ----------------- | --------------------------------------- |
| **Backend** | PHP 8.x (POO)                           |
| **Base de Datos** | MySQL / MariaDB                         |
| **Interfaz** | HTML5, Bootstrap 5.3 (Componentes UI)   |
| **Seguridad** | Sentencias preparadas (Prepared Statements) |
| **Documentación** | Estándar DocBlock (PHPDocumentor)       |

---

## 🌟 Características Implementadas

- **Gestión de Datos:** Control total sobre el ciclo de vida del producto (Creación, Lectura, Actualización y Borrado).
- **Seguridad:** Prevención de Inyección SQL mediante el uso de `bindValue` con PDO.
- **Búsqueda Avanzada:** Filtrado dinámico por coincidencia de términos en nombre y descripción.
- **Interfaz Responsiva:** Diseño adaptado a dispositivos móviles mediante el uso de Flexbox y Grid de Bootstrap.
- **Validación de Tipos:** Cast de datos robusto para asegurar la integridad de precios (float) y existencias (int).

---

## 🗄️ Configuración del Entorno

### 1. Base de Datos
Ejecute el siguiente script en su gestor de base de datos (phpMyAdmin / Workbench):

```sql
CREATE DATABASE IF NOT EXISTS phppdobd;
USE phppdobd;

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    existencia INT NOT NULL DEFAULT 0,
    precio DECIMAL(10,2) NOT NULL DEFAULT 0.00
);