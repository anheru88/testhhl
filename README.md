# MVC nativo

En este proyecto se implementa un MVC en php haciendolo desde 0, sin ningún tipo de framework.

El proyecto está dividido en las siguientes carpetas:

* Controllers -> En esta carpeta se encuentran los controladores encargados de mostrar las vistas, y hacer las consultas a la base de datos usando los Repositorios. 
* Core -> En esta carpeta encontramos todas las clases necesarias, para hacer ejecutar nuestro pequeño micro framework, encontramos clases de enrutamiento, de respuestas, y algunas clases base.
* Models -> En esta carpeta encontramos los modelos de nuestra aplicación, se utiliza un ORM Eloquent para estos modelos y facilitar las consultas a la base de datos.
* Repositories -> Estos repositorios implementan los modelos, para hacer las consultas a la base de datos, lo que nos permite cambiar el ORM utilizado por cualquier otro.
* Vendor -> En esta carpeta se instalan las clases de terceros, por ejemplo el ORM utilizado, y también el paquete de dotEnv, para leer el archivo .env.
* View -> En esta carpeta se encuentran todas las vistas que se muestran en la aplicación y es llamado desde los controladores.
* boostrap.php -> Este archivo es el que inicializa Eloquent para que use la base de datos del proyecto.

III. Basado en el modelo de datos basados y su desarrollo web realizado anteriormente y en su experiencia como desarrollador, qué infraestructura debería tener el área de tecnología para poder responder a una alta demanda de peticiones web, ya que el servicio que usted está prestando es para un número alto de clientes y una alta demanda de consultas por minuto, el objetivo es plantear una solución arquitectónica, puede usar un diagrama o dibujo para explicar su respuesta.

Para poder dar una alta disponibilidad de esta aplicación, se implementaría la siguiente infraestructura.

* Las consultas a la base de datos serian guardadas en cache *Redis* para que no consuma la conexión a la base de datos y sea más rápido el consumo de la información.
* En el caso de que existieran muchas imágenes, por ejemplo para los productos, estos estarían guardados o alojados en un servidor externo con cache, como Amazon CloudFront.
* Para el balanceo de cargas se usaría Nginx, junto con un escalado automático de la máquina, en caso de que se encuentre algo demoradas las peticiones.