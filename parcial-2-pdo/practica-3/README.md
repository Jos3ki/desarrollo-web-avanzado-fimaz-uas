# 🛡️ Práctica: Manejo de Errores y Transacciones en PDO

## 👤 Autor

|                 |                                                |
| --------------- | ---------------------------------------------- |
| **Estudiante**  | Jose Carlos Castillo Padilla                   |
| **Docente**     | Dr. José Alfonso Aguilar Calderón              |
| **Institución** | Facultad de Informática Mazatlán (FIMAZ - UAS) |
| **Materia**     | Desarrollo Web Avanzado                        |

---

## 📋 Objetivo

El objetivo de esta práctica es implementar el manejo robusto de errores mediante bloques `try-catch` y asegurar la integridad de los datos utilizando **Transacciones (ACID)** en PHP con la extensión PDO. Se busca comprender cómo revertir cambios (`ROLLBACK`) cuando una operación falla y cómo confirmarlos (`COMMIT`) cuando todo es exitoso.

---

## ⚙️ Funcionalidades

- **Conexión Segura:** Configuración de PDO para lanzar excepciones en lugar de errores silenciosos.
- **Registro Doble (Atomicidad):** Inserción simultánea en la tabla `alumnos` y en la tabla `logs_alumnos`.
- **Simulación de Fallos:** Opción mediante checkbox para forzar un error y comprobar que el sistema no guarda datos parciales.
- **Visualización en Tiempo Real:** Tablas dinámicas para monitorear el estado de la base de datos tras cada operación.

---

## 🛠️ Conceptos Clave

| Método               | Función                                                                  |
| -------------------- | ------------------------------------------------------------------------ |
| `beginTransaction()` | Inicia el modo de transacción (desactiva el autocommit).                 |
| `commit()`           | Guarda permanentemente todos los cambios realizados en la transacción.   |
| `rollBack()`         | Deshace todos los cambios realizados desde que se inició la transacción. |

---

## 🗄️ Configuración de la Base de Datos

Ejecuta el siguiente script SQL para preparar el entorno de la práctica:

```sql
CREATE DATABASE IF NOT EXISTS escuela
CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE escuela;

CREATE TABLE IF NOT EXISTS alumnos (
    idAlumno INT AUTO_INCREMENT PRIMARY KEY,
    nombre   VARCHAR(15) NOT NULL,
    apellido VARCHAR(10) NOT NULL,
    correo   VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS logs_alumnos (
    idLog    INT AUTO_INCREMENT PRIMARY KEY,
    idAlumno INT NOT NULL,
    accion   VARCHAR(30) NOT NULL,
    fecha    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idAlumno) REFERENCES alumnos (idAlumno)
);
```

---

## 🚀 Instalación y Uso

1. **Clonación:** Descarga el repositorio en tu servidor local (ej. `htdocs/practica-transacciones`).
2. **Servidor:** Asegúrate de tener activos los servicios de **Apache** y **MySQL** en XAMPP.
3. **Configuración:** Revisa las credenciales de acceso en la parte superior del archivo `index.php`:

```php
$host = "localhost";
$db   = "escuela";
$user = "root";
$pass = "";
```

4. **Ejecución:** Abre en tu navegador:

```
http://localhost/practica-transacciones/index.php
```

---

## 🧪 Pruebas Recomendadas

1. **Prueba de Éxito (COMMIT):** Registra un alumno sin marcar el checkbox. Verás que el registro aparece tanto en la tabla de `alumnos` como en la de `logs_alumnos`.

2. **Prueba de Error (ROLLBACK):** Marca _"Simular error"_ y registra un alumno. El sistema lanzará una excepción y, gracias al `rollBack()`, la base de datos quedará intacta — no se guardará nada.

3. **Restricción Unique:** Intenta registrar dos veces el mismo correo para observar cómo el bloque `catch` captura el error de duplicidad de SQL.
