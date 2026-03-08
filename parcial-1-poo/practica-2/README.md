# Práctica de Laboratorio 2: Herencia y Reutilización de Código en PHP

**Asignatura:** Desarrollo Web Avanzado  
**Autor:** Jose Carlos Castillo Padilla  
**Institución:** Facultad de Informática Mazatlán (FIMAZ - UAS)  

---

## 📌 Objetivo de la Práctica
[cite_start]Implementar el pilar de la herencia mediante la extensión de clases en PHP, logrando la reutilización de atributos y métodos de una clase base (padre) hacia una clase derivada (hija), optimizando así la arquitectura del código[cite: 18].

---

## 🧬 Explicación de la herencia aplicada

[cite_start]En este proyecto, la herencia se implementó utilizando la palabra reservada `extends` de PHP[cite: 35]. [cite_start]Se estableció una relación jerárquica donde la clase `Admin` actúa como la **clase hija (o subclase)** y extiende de la **clase base (o superclase)** `Usuario`[cite: 30, 32]. 

[cite_start]Al aplicar esta arquitectura, se logró una **reutilización de código** absoluta[cite: 18, 52]. La clase `Admin` adquirió automáticamente:
1. **El Método Constructor (`__construct`):** Permitiendo instanciar un administrador pasando su nombre y correo sin tener que reescribir la lógica de inicialización.
2. **Los Métodos de Acceso (Getters y Setters):** `Admin` puede invocar `$this->getNombre()` o `$this->getCorreo()` como si hubieran sido programados dentro de su propio archivo, respetando el encapsulamiento de los atributos privados originales de la clase base.

Esta implementación demuestra que la herencia evita la duplicación de código y crea sistemas más fáciles de mantener y escalar.

---

## ⚖️ Diferencias entre `Usuario` y `Admin`

Aunque ambas clases están estrechamente relacionadas, cumplen roles distintos dentro de la arquitectura del sistema:

* **Clase Base (`Usuario`):** * Define la estructura fundamental que comparte cualquier persona registrada en el sistema.
  * Encapsula las propiedades de identidad (Nombre y Correo).
  * No tiene conocimiento de los roles ni privilegios superiores. Es una entidad genérica.

* **Clase Derivada (`Admin`):**
  * Es una especialización de la clase `Usuario`. Es decir, "Un Admin *es un* Usuario".
  * Posee todo el comportamiento del usuario normal, pero **extiende sus capacidades** al incorporar lógica exclusiva.
  * [cite_start]Implementa un método propio llamado `getRol()` que retorna la cadena de texto `"Administrador"`[cite: 37]. Un objeto instanciado directamente desde `Usuario` no posee este método, marcando la diferencia de comportamientos entre los niveles de jerarquía.

---

## 🚀 Evidencia de ejecución e Instrucciones

[cite_start]Para verificar el correcto funcionamiento del código[cite: 53], siga estos pasos en un entorno local:

## Instrucciones de ejecución
1. Clonar este repositorio.
2. Tner xampp instalado en tu computadora.
3. Abrir la carpeta clonada en vs code.
4. tener instalada las extensiones de php Intelephense y php server.
5. tener en la variables del entorno de tu sistema la ruta a php del xampp en la mayoria de casos es C:\xampp\php para trabajar en localhost al ejecutar el php sever.
6. ejecutar php sever para visualizar la ejecucion del archivo.
7. En el navegador se mostrará la instanciación exitosa del objeto `Admin`, imprimiendo mediante sus métodos heredados y propios:
   * **Nombre:** (Obtenido desde el padre)
   * **Correo:** (Obtenido desde el padre)
   * **Rol:** Administrador (Obtenido desde el método propio)

### Evidencia en Video
[![Vista previa del video](https://img.youtube.com/vi/qdJHs43xlIA/0.jpg)](https://youtu.be/qdJHs43xlIA)
1. [cite_start]La correcta arquitectura de las clases (`extends`)[cite: 51].
2. El uso de Git para los commits por etapas.
3. [cite_start]La salida en el navegador sin advertencias ni errores fatales[cite: 53].