# Sistema MVC PHP – CastilloPadilla

Proyecto académico en PHP con patrón MVC, PDO, sesiones, validaciones y seguridad básica. Incluye catálogo público con búsqueda, panel de administración con CRUD de productos, subida de imágenes, paginación, protección CSRF y bitácora de acciones del administrador.

## ✅ Funcionalidades principales
1. **Catálogo público** con búsqueda por nombre/descripcion y paginación.
2. **Panel admin** con CRUD de productos, validaciones y subida de imágenes.
3. **Rutas amigables** con `.htaccess`.
4. **Protección CSRF** en formularios POST.
5. **Bitácora de acciones** del administrador (login, logout, crear/editar/eliminar).

## 🧱 Tecnologías
- PHP (POO + PDO)
- MySQL
- Bootstrap 5
- Apache (mod_rewrite)

## 📂 Estructura MVC
```
config/        # Conexión y autoload
controllers/   # Controladores (Auth, Productos, Público)
models/        # Modelos (Usuario, Producto, Bitácora)
views/         # Vistas (layout, auth, productos, catálogo)
uploads/       # Imágenes de productos (se crea automáticamente)
index.php      # Router principal
.htaccess      # Rutas amigables
```

## 🚀 Instalación y ejecución
1. **Colocar la carpeta** en `C:\laragon\www\CastilloPadilla`.
2. **Crear la base de datos**:
   ```sql
   CREATE DATABASE tienda_mvc CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
   ```
3. **Crear las tablas base** (usuarios y productos). Estructura esperada mínima:
   ```sql
   CREATE TABLE usuarios (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) NOT NULL UNIQUE,
       password VARCHAR(255) NOT NULL,
       nombre_completo VARCHAR(100) NOT NULL
   );

   CREATE TABLE productos (
       id INT AUTO_INCREMENT PRIMARY KEY,
       sku VARCHAR(50) NOT NULL UNIQUE,
       nombre VARCHAR(100) NOT NULL,
       descripcion TEXT NOT NULL,
       precio_compra DECIMAL(10,2) NOT NULL,
       precio_venta DECIMAL(10,2) NOT NULL,
       existencia INT NOT NULL DEFAULT 0,
       imagen VARCHAR(255) NULL
   );
   ```
4. **Ejecutar el script adicional** `databse.sql` para la columna de imagen y la bitácora:
   ```sql
   ALTER TABLE productos
   ADD COLUMN imagen VARCHAR(255) NULL AFTER existencia;

   CREATE TABLE IF NOT EXISTS bitacora_admin (
       id INT AUTO_INCREMENT PRIMARY KEY,
       admin_id INT NULL,
       username VARCHAR(50) NULL,
       accion VARCHAR(50) NOT NULL,
       entidad VARCHAR(50) NULL,
       entidad_id INT NULL,
       descripcion VARCHAR(255) NULL,
       resultado VARCHAR(20) NOT NULL DEFAULT 'exito',
       ip VARCHAR(45) NULL,
       user_agent VARCHAR(255) NULL,
       creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```
5. **Crear un usuario admin**:
   - Para generar el hash puedes usar `passwd.php` (ejemplo con `admin123`):
     ```bash
     http://localhost/CastilloPadilla/passwd.php
     ```
   - Inserta el usuario en `usuarios`:
     ```sql
     INSERT INTO usuarios (username, password, nombre_completo)
     VALUES ('admin', 'HASH_GENERADO', 'Administrador');
     ```
6. **Acceder al proyecto**:
   - Catálogo: `http://localhost/CastilloPadilla/catalogo`
   - Login admin: `http://localhost/CastilloPadilla/login`

## 🔗 Rutas amigables
Ejemplos:
```
/catalogo
/login
/auth/login
/productos
/productos/create
/productos/edit/3
/productos/store
/productos/update
/productos/delete
```
Las rutas se reescriben internamente con `.htaccess` hacia `index.php?route=...`.

## 🖼 Subida de imágenes
- Se almacenan en `uploads/`.
- Validaciones:
  - Tamaño máximo: **2MB**
  - Formatos: **JPG, PNG, WEBP**
- En edición, si no se sube una nueva imagen, se conserva la anterior.

## 🔐 Protección CSRF
Todos los formularios POST incluyen un `csrf_token` oculto.  
El servidor valida el token antes de ejecutar la acción; si es inválido, se bloquea y muestra mensaje de error.

## 📑 Bitácora de administrador
Se registran automáticamente:
- **login** (éxito y fallo)
- **logout**
- **crear / actualizar / eliminar** productos

Campos clave que se almacenan:
- **admin_id / username**: quién realizó la acción.
- **accion**: tipo de evento.
- **entidad / entidad_id**: qué registro fue afectado.
- **descripcion**: detalle legible (SKU, nombre, etc.).
- **resultado**: `exito` o `fallido`.
- **ip / user_agent**: origen de la acción.
- **creado_en**: fecha y hora.

## 📄 Paginación
- **Admin**: `/productos?page=2`
- **Catálogo**: `/catalogo?page=2&buscar=texto`

## ✅ Validaciones aplicadas
- **precio_venta ≥ precio_compra**
- **existencia ≥ 0**
- **SKU único**
- **Formatos y tamaño de imagen**

## ⚙️ Configuración de conexión
Archivo: `config/Database.php`
```php
private string $host = 'localhost';
private string $dbName = 'tienda_mvc';
private string $username = 'root';
private string $password = '';
```

## 🧭 Diagrama de funcionamiento (flujo MVC)
```mermaid
flowchart TD
    A[Navegador] --> B[.htaccess]
    B --> C[index.php (router)]
    C --> D[Controller]
    D --> E[Model (PDO)]
    E --> F[(MySQL)]
    D --> G[View]
    G --> A
    D --> H[uploads/ (imagen)]
```

## 🧪 Prueba rápida
1. Inicia sesión como admin.
2. Crea un producto con imagen.
3. Verifica que aparezca en catálogo y en el listado admin.
4. Revisa la tabla `bitacora_admin` para ver los registros.
