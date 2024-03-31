# PAGINA WEB [PHP/JS/SQL/BOOTSTRAP/GIT]

## Descripción

Realizamos una pagina web para un emprendimiento de velas con las siguientes funcionalidades:

- Enviar comentario
- Mostrar páginas de comentarios

## Tecnologías

### PHP

- Establecer conexión con la DB
- Registrar comentarios
- Seleccionar comentarios
- Validar comentarios
- Insertar imágenes en el carrusel dentro del código html, disminuyendo líneas de código
- Comunicarse con JS

### JS

- Gestionar temas (dark-light-auto)
- Gestionar funcionalidad de comentarios - Evento next/prev page - Con ayuda de PHP traer comentarios de la DB - Mostrar comentarios

### BOOTSTRAP

- Diseño responsive del frontend

### SQL

- Brindar BD y tabla para almacenar y consultar comentarios

### GIT

Usamos GIT para la gestión de versiones de nuestro proyecto
Empleamos dos ramas:

- Development
  Para desarrollar funcionalidades y testear cambios
- Stable
  Para vertir las versiones terminadas, estables y funcionales del proyecto
  En la rama estable use `git merge --squash development` para tener un solo commit por versión.
  Así mantengo esta rama mas limpias solo con commit de versiones terminadas.
