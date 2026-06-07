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