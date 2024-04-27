## Instalación del proyecto.

1. Después de clonar el proyecto probablemente no funcione, debes acceder al repositorio git clonado y ejecutar 
    _**composer install**_
2. Ejecutar _**php artisan:key generate**_ (asegúrate de estar en el repositorio git)
3. En **_database/_** deberás crear el archivo _**database.sqlite**_, después de esto
   deberás ejecutar _**php artisan migrate**_

Después de haber ejecutado los pasos anteriores deberías poder correr el proyecto sin problema alguno
