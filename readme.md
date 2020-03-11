# Pizzeria Glasswing App

Esta aplicación ha sido hecha para la prueba tecnica de empleo fullstack para Glasswing International

## Comenzando
Los siguientes requerimientos se deben seguir para instalar la aplicación para desarrollo.


### Prerequisitos
Lo que debes tener instalador para poder correr el proyecto.

* PHP >= 7.2
* Composer >= 1.8
* PostgreSQL >= 10.1
* Git >= 2.0
* Cmder 
* ***php y composer debe ser alcanzado por el path del sistema*** 
* credenciales para desplegar imagenes en cloudinary

### instalación

Después de cumplir todos los requisitos se debe instalar.

1. Primero se debe clonar el proyecto actual.
    ```

    git clone https://github.com/yaneth94/pizzeria-glasswing.git

    ```
2. Luego se debe acceder a la carpeta raiz del directorio clonado e instalar las dependencias.
    ```
        composer install
    ```
3. Luego se debe realizar una copia del archivo **.env.example**  con el nombre **.env**
    ```
        cp .env.example
    ```
3. Luego se debe generar la llave para poder obtener funcionando la aplicación
    ```
        php artisan generate:key
    ```    
4. Se debe crear una base de datos con un usuario en postgreSQL

    ```SQL
        create user glasswing password 'secret';
        create database pizzeria_glasswing owner glasswing;

    ```

5. Luego de esto sin tener ningun problema, se debe modificar el archivo .env recientemente copiado 
con las variables de entorno de su preferencia se recomienda.

```
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=pizzeria_glasswing
    DB_USERNAME=glasswing
    DB_PASSWORD=secret

```
6. luego de modificar el archivo **.env** se debe correr las migraciones junto a los datos semillas

```
    php artisan migrate:refresh --seed
    php artisan db:seed
```

7. Ademas se debe agregar al archivo .env las keys de la api para cloudinary, agregando los siguientes atributos y el contenido respectivo segun su cuenta de cloudinay
```
    CLOUDINARY_API_KEY=key
    CLOUDINARY_API_SECRET=secret_key
    CLOUDINARY_CLOUD_NAME=cloud_name

```
8. por ultimo cada vez que se actualize la base de datos con nuevos campos o nuevos datos pruebas se debe
ejecutar el siguente comando.

```
    php artisan migrate:refresh --seed

```
![alt text](https://res.cloudinary.com/dgi2nmgsy/image/upload/v1583887181/FireShot_Capture_099_-_Listado_de_Pizzas_-_localhost_jbii9c.png) 
