# Práctica de Laboratorio 1: Creación de Clases y Encapsulamiento en PHP

## Objetivo de la práctica
*(Aplicar los fundamentos de la Programación Orientada a Objetos en PHP, implementando una clase con atributos privados, constructor y métodos de acceso, siguiendo buenas prácticas de encapsulamiento.)*

## Descripción de la clase creada

Para esta práctica se diseñó e implementó la clase `Usuario`, aplicando estrictamente el pilar del **Encapsulamiento** de la Programación Orientada a Objetos. La estructura de la clase se compone de los siguientes elementos:

* **Atributos (Propiedades Privadas):**
  * `$Vnombre`: Almacena el nombre del usuario.
  * `$Vcorreo`: Almacena el correo electrónico del usuario.
  * *Seguridad:* Ambos atributos fueron definidos con el modificador de acceso `private`. Esto protege la integridad de los datos, impidiendo que el código externo (como `index.php`) los lea o modifique de forma directa y sin control.

* **Método Constructor (`__construct`):**
  * Método mágico que se ejecuta automáticamente al instanciar la clase mediante la palabra reservada `new`. Recibe el nombre y el correo como parámetros para garantizar que todo objeto `Usuario` nazca con sus datos obligatorios inicializados.

* **Métodos de Acceso (Getters - Públicos):**
  * `getNombre()`: Retorna de manera segura el valor actual del atributo `$Vnombre`.
  * `getCorreo()`: Retorna de manera segura el valor actual del atributo `$Vcorreo`.

* **Métodos de Modificación (Setters - Públicos):**
  * `setNombre($nuevo_nombre)`: Permite actualizar el nombre del usuario de forma controlada.
  * `setCorreo($nuevo_correo)`: Permite actualizar el correo electrónico del usuario de forma controlada.

## Instrucciones de ejecución
1. Clonar este repositorio.
2. Tner xampp instalado en tu computadora.
3. Abrir la carpeta clonada en vs code.
4. tener instalada las extensiones de php Intelephense y php server.
5. tener en la variables del entorno de tu sistema la ruta a php del xampp en la mayoria de casos es C:\xampp\php para trabajar en localhost al ejecutar el php sever.
6. ejecutar php sever para visualizar la ejecucion del archivo.