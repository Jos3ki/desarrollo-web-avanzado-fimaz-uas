# Práctica de Laboratorio 3: Sistema de Usuarios con Validaciones y Excepciones

**Asignatura:** Desarrollo Web Avanzado  
**Autor:** Jose Carlos Castillo Padilla  
**Institución:** Facultad de Informática Mazatlán (FIMAZ - UAS)  

---

## 📌 Descripción del sistema

Este proyecto consiste en un sistema orientado a objetos diseñado para simular el registro de usuarios en un entorno profesional, integrando herencia y validaciones estrictas. El sistema garantiza la integridad de los datos aplicando reglas de negocio desde el momento de la instanciación; específicamente, obliga a que cualquier usuario (sea Administrador o Alumno) posea un formato de correo electrónico válido antes de ser procesado por el sistema, previniendo así la corrupción de la información y fallos en la base de datos.

---

## 🔄 Explicación del flujo de clases

La arquitectura del sistema se divide en una estructura jerárquica de tres clases principales ubicadas en el directorio `/clases`:

1. **Clase Base (`Usuario.php`):** * Centraliza las propiedades comunes (`$vNombre`, `$vCorreo`) utilizando el modificador de acceso `protected` para permitir la herencia.
   * Su característica arquitectónica principal es que el constructor no asigna el correo directamente, sino que delega la tarea al método `setCorreo()`. Este método actúa como un filtro de seguridad utilizando la función nativa `filter_var()` de PHP.

2. **Clase Derivada (`Admin.php`):** * Extiende de `Usuario`. Adquiere automáticamente el proceso de validación de correo del padre y define su propio comportamiento mediante el método `getRol()`, el cual retorna la cadena "Administrador".

3. **Clase Derivada (`Alumno.php`):** * Extiende de `Usuario`. Incorpora una nueva propiedad exclusiva para su contexto (`$vMatricula`).
   * Su flujo de instanciación es especializado: el constructor recibe tres parámetros y utiliza `parent::__construct($nombre, $correo)` para enviar los datos básicos a la clase padre (asegurando su validación) antes de asignar localmente la matrícula. Posee su propio método `getRol()` que retorna "Alumno".

---

## ⚠️ Evidencia del manejo de errores

Para lograr un sistema robusto, se abandonaron los simples mensajes de error (`echo`) y se implementó el manejo profesional de excepciones:

* **Lanzamiento (Throw):** Dentro de la clase `Usuario`, si el método `setCorreo()` detecta que la cadena ingresada no pasa el filtro `FILTER_VALIDATE_EMAIL`, el sistema aborta la asignación y lanza una advertencia crítica mediante la instrucción `throw new Exception(...)`.
* **Captura (Catch):** En el archivo principal de ejecución (`index.php`), las rutinas de creación de objetos están encapsuladas dentro de bloques `try / catch`. 
* **Comprobación:**
  * Al ingresar datos correctos, el flujo `try` se completa exitosamente y se imprimen los datos del Alumno.
  * Al forzar un error ingresando un correo sin el formato correcto (ej. `"hola.gemail."` para el Admin), el sistema no sufre una caída fatal. En su lugar, la excepción interrumpe el bloque `try`, el flujo salta inmediatamente al bloque `catch` y el mensaje del error se imprime en pantalla de forma segura y controlada (en color rojo).

---

## 🚀 Instrucciones y Video Demostrativo

1. Clonar este repositorio.
2. Tner xampp instalado en tu computadora.
3. Abrir la carpeta clonada en vs code.
4. tener instalada las extensiones de php Intelephense y php server.
5. tener en la variables del entorno de tu sistema la ruta a php del xampp en la mayoria de casos es C:\xampp\php para trabajar en localhost al ejecutar el php sever.
6. ejecutar php sever para visualizar la ejecucion del archivo.

Como parte de la rúbrica de evaluación, se anexa el siguiente video demostrativo alojado en YouTube, donde se evidencia la ejecución del manejo de excepciones, la salida controlada en el navegador y el uso de buenas prácticas de POO:

[![Vista previa del video](https://img.youtube.com/vi/UZ-t87n6_F4/0.jpg)](https://www.youtube.com/watch?v=UZ-t87n6_F4)