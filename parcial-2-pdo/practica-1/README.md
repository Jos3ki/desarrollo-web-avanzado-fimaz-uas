# 🛍️ Práctica 1 - Parcial 2

---

## 👤 Autor

> Elaborado como parte de la materia de **Desarrollo Web Avanzado**.  
> Estudiante: **Jose Carlos Castillo Padilla**  
> Docente: **Dr. José Alfonso Aguilar Calderón**  
> Institución: **Facultad de Informática Mazatlán (FIMAZ - UAS)**

---

## 📋 Objetivo

El objetivo de esta práctica es desarrollar un sistema **CRUD** (Crear, Leer, Actualizar y Eliminar) de productos aplicando los principios de **Programación Orientada a Objetos (POO)** en PHP, utilizando **PDO** para la conexión y manipulación de la base de datos.

---

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

## ⚙️ Funcionalidades

- ✅ **Agregar** nuevos productos
- 📋 **Listar** todos los productos registrados
- ✏️ **Editar** información de un producto existente
- 🗑️ **Eliminar** productos con confirmación
- 🔍 **Buscar** productos por nombre o descripción

---

## 🛠️ Tecnologías Utilizadas

| Tecnología        | Detalle                         |
| ----------------- | ------------------------------- |
| **Lenguaje**      | PHP 8+                          |
| **Base de datos** | MySQL                           |
| **Metodología**   | POO / PDO                       |
| **Herramientas**  | Git, GitHub, Visual Studio Code |

---

## 🗄️ Configuración de la Base de Datos

Crea la base de datos y la tabla ejecutando el siguiente script SQL:

```sql
CREATE DATABASE IF NOT EXISTS ventas;

USE ventas;

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    existencia INT NOT NULL DEFAULT 0,
    precio DECIMAL(10,2) NOT NULL DEFAULT 0.00
);
```

---

## 🚀 Instalación y Uso

1. Clona el repositorio:

   ```bash
   git clone https://github.com/tu-usuario/practica1-parcial2.git
   ```

2. Coloca el proyecto en la carpeta raíz de tu servidor local (ej. `htdocs` en XAMPP).

3. Importa la base de datos usando el script SQL del paso anterior.

4. Verifica las credenciales en `config/Database.php`:

   ```php
   private $host     = "localhost";
   private $dbname   = "ventas";
   private $username = "root";
   private $password = "";
   ```

5. Abre tu navegador y accede a:
   ```
   http://localhost/practica1-parcial2/
   ```
