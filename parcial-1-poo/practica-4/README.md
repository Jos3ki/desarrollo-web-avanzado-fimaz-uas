# Práctica de Laboratorio 4: Integración POO + Herencia + Validaciones + Excepciones

**Asignatura:** Desarrollo Web Avanzado  
**Docente:** Dr. José Alfonso Aguilar Calderón  
**Autor:** Jose Carlos Castillo Padilla  
**Institución:** Facultad de Informática Mazatlán (FIMAZ - UAS)  

---

## 🎯 Objetivo de la práctica
Construir un mini-sistema orientado a objetos en PHP que simula el examen parcial, integrando todos los pilares vistos en la unidad:
* **Encapsulamiento:** Protección de los atributos de las clases.
* **Herencia:** Reutilización del código de la clase base `Usuario` hacia las clases hijas (`Admin`, `Alumno`, e `Invitado`).
* **Polimorfismo básico:** Implementación del método `getRol()` en todas las clases hijas para que cada una responda de manera específica.
* **Validación de datos:** Uso de `filter_var()` en el constructor base para asegurar la integridad de la información.
* **Manejo de excepciones:** Uso de bloques `try/catch` para capturar errores de ejecución de forma segura.
* **Salida en HTML:** Renderizado dinámico de objetos en una tabla estructurada.

## 🛠️ Requisitos
Para la correcta ejecución de este proyecto, se requiere el siguiente entorno:
* Servidor local **XAMPP** (con el servicio de Apache en ejecución).
* Lenguaje **PHP 8.0** o superior.
* Sistema de control de versiones **Git** y cuenta en GitHub/GitLab.

## Instrucciones 

1. Clonar este repositorio.
2. Tner xampp instalado en tu computadora.
3. Abrir la carpeta clonada en vs code.
4. tener instalada las extensiones de php Intelephense y php server.
5. tener en la variables del entorno de tu sistema la ruta a php del xampp en la mayoria de casos es C:\xampp\php para trabajar en localhost al ejecutar el php sever.
6. ejecutar php sever para visualizar la ejecucion del archivo.

## 📊 Evidencia esperada (Tabla + Error controlado)
Al ejecutar el archivo `index.php`, el sistema realiza una simulación de registro y arrojará la siguiente evidencia visual en pantalla:

1. **Error Controlado (Excepción):** En la parte superior se mostrará una alerta destacada (color rojo) con el mensaje `"error controlado: Correo inválido: correo_sin_arroba.com"`. Esto demuestra que el sistema atrapó exitosamente el intento de registrar un usuario con formato de correo erróneo, evitando un error fatal en PHP.
2. **Tabla HTML:** Justo debajo de la alerta, se generará una tabla HTML con las columnas *Nombre, Correo, Rol, Matrícula* y *Empresa*. Esta tabla mostrará únicamente a los 3 usuarios que pasaron las validaciones exitosamente. Se demuestra el polimorfismo en la columna "Rol" y el manejo de propiedades inexistentes imprimiendo un guion (`-`) en las celdas que no aplican para ciertos tipos de usuario.

---
### 🎥 Video Demostrativo
Como parte de los lineamientos de evaluación de la práctica, se anexa el siguiente video demostrativo alojado en YouTube, evidenciando el funcionamiento sin errores y la estructura del repositorio:

