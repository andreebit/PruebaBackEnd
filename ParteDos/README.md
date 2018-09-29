# Parte 2

Se desea realizar un pequeño prototipo de aplicación web que tiene como finalidad registrar y evaluar a los empleados de la empresa Developers SAC. Para ello se tiene un archivo llamado ​employees.json donde se encuentra una estructura inicial de empleados.

En primer lugar, es necesario levantar el servidor:

    php -S {IP}:{PUERTO} -t public public/index.php
    
## Listado

El listado de empleados está en la raíz. Ingresar a la URL:

    http://{IP}:{PUERTO}
    
## API

Para utilizar el api se debe pasar los parámetros `from` y `to`:

    http://{IP}:{PUERTO}/api?from=1000&to=1500


