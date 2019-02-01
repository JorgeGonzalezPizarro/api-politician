Api que contiene los servicios necesarios para listar , crear y actualizar  Politicos ,  creado con Php 7 , symfony 4 y Mongodb.

## Iniciar el proyecto

Dentro del directorio del proyecto 

### `composer install `


El fichero ./config/routes.yml  contiene las rutas necsarias para la conexion  .


## Arquitectura e implementacion

Se ha adoptado una Arquitectura hexagonal (puerto->adaptador) bajo una capa de programacion orientada a objetos pretendiendo conseguir cierto grado de abstraccion.
Se han implementado las buenas practicas de DDD para separar conceptos e implementaciones , la aplicacion (a nivel estructural) queda separada en contextos de la siguiente forma :

Punto de entrada - /API :
– Contiene los puntos de acceso a la aplicacion Controllers 
Capa de aplicacion - /Application
– Contiene los casos de uso de la aplicacion , se ha aplicado el patron Command/Query -> Handler separando las solicitudes de modificacion del sistema de las de lectura y encapsulando la petición en objetos Command/Query.
Capa de dominio - /Domain
– Contiene los modelos de Dominio y las reglas de validacion .
Capa de infraestructura - /Infrastructure
*-- Contiene las implementaciones de de las interfaces del dominio .

### Base de datos 

- DB_CONNECTION=mongodb
- DB_HOST=localhost
- DB_PORT=:27017
- DB_DATABASE=dbfullstack

### Puntos de Acceso 

-  ##### 1. Get politicians



        GET /?page=(1,2..)

-  ##### 2. Create Politician  


        POST /create : 
        {
            "titular": "Luís Vicente Castelló Vicedo",
            "partido": "AIA-Compromis",
            "partidoParaFiltro": "Compromís",
            "genero": "Hombre",
            "cargo": "Alcalde",
            "cargoParaFiltro": "Alcalde",
            "institucion": "Ayuntamiento de Agost",
            "ccaa": "Comunidad Valenciana",
            "sueldoBase": 37260,
            "complementosSueldo": "",
            "pagasExtrasSueldo": "",
            "otrasDietas": 0,
            "trieniosSueldo": "",
            "retribucionAnual": 37260,
            "retribucionMensual": 2661.43,
            "observaciones": "Dedicación Exclusiva"
        }
 
-  ##### 3. Update Politician  


        PUT /update : 
        {
            "titular": "Luís Vicente Castelló Vicedo",
            "partido": "AIA-Compromis",
            "partidoParaFiltro": "Compromís",
            "genero": "Hombre",
            "cargo": "Alcalde",
            "cargoParaFiltro": "Alcalde",
            "institucion": "Ayuntamiento de Agost",
            "ccaa": "Comunidad Valenciana",
            "sueldoBase": 37260,
            "complementosSueldo": "",
            "pagasExtrasSueldo": "",
            "otrasDietas": 0,
            "trieniosSueldo": "",
            "retribucionAnual": 37260,
            "retribucionMensual": 2661.43,
            "observaciones": "Dedicación Exclusiva"
        }

        