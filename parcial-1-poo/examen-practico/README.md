# Evaluación Práctica – Primer Parcial (POO en PHP)

**Materia:** Desarrollo Web Avanzado  
**Profesor:** Dr. José Alfonso Aguilar Calderón  
**Estudiante:** Jose Carlos Castillo Padilla  
**Universidad:** Facultad de Informática Mazatlán (FIMAZ - UAS)  

---

## Propósito del Proyecto
El objetivo principal de esta evaluación es desarrollar una plataforma de registro utilizando Programación Orientada a Objetos mediante PHP. El código demuestra el dominio práctico de conceptos clave como el encapsulamiento de propiedades, la herencia de métodos, la implementación de polimorfismo, la verificación de formatos y la prevención de fallos críticos mediante excepciones.

## Estructura del Código
El proyecto se organiza mediante la siguiente jerarquía orientada a objetos:

1. **Clase Principal (`Usuario.php`):** Gestiona los datos básicos. Se encarga de verificar que el email ingresado tenga una estructura correcta desde el método constructor. En caso de detectar una anomalía, detiene el proceso inmediatamente lanzando una `Exception`.
2. **Subclase (`Admin.php`):** Hereda de la clase principal y establece su propio identificador de perfil mediante un método que retorna "Administrador".
3. **Subclase (`Alumno.php`):** Hereda de la clase principal, añade la propiedad exclusiva de la matrícula escolar y establece su identificador de perfil retornando "Alumno".

## Prevención de Fallos
En el archivo de ejecución principal (`index.php`), las pruebas de registro están resguardadas por una estructura `try / catch`. Al forzar de manera intencional el ingreso de un email falso (sin el símbolo de arroba), la clase principal aborta la creación de ese objeto y el bloque `catch` atrapa el error. Como resultado, se imprime un aviso de error en color rojo, logrando que la página siga funcionando sin mostrar errores fatales de PHP.

## Instrucciones 

1. Clonar este repositorio.
2. Tner xampp instalado en tu computadora.
3. Abrir la carpeta clonada en vs code.
4. tener instalada las extensiones de php Intelephense y php server.
5. tener en la variables del entorno de tu sistema la ruta a php del xampp en la mayoria de casos es C:\xampp\php para trabajar en localhost al ejecutar el php sever.
6. ejecutar php sever para visualizar la ejecucion del archivo.


---
### 🎥 Demostración Audiovisual
Como evidencia de la correcta ejecución y salida sin errores, se anexa el siguiente video demostrativo:

[![Miniatura del video](https://img.youtube.com/vi/TU_ID_AQUI/0.jpg)](https://www.youtube.com/watch?v=TU_ID_AQUI)