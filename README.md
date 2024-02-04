


<h2 align='center'> Ecommerce Simulation Api </h2>

### dependencies
----
**1 # composer installed
if not install it from [ Composer Download Page ](https://getcomposer.org/download/)**



### Installation
----

```code
    $ git clone https://github.com/SHEFOO10/Ecommerce-Platform-sim-api.git

    $ cd Ecommerce-Platform-sim-api
    (Ecommerce-Platform-sim-api) $ composer install
```

### How to run the api
**replace enviroment variables with your credentials / .env**
```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1   // replace it with your host
    DB_PORT=3306        // port that database server running on
    DB_DATABASE=e-api   // database name
    DB_USERNAME=test    // Username for the database
    DB_PASSWORD=test    // Password of the User
```

<br>

**to start test api like in documentation examples
you must run the migrations, and seeders to see test data**
```code
    (Ecommerce-Platform-sim-api) $ php artisan migrate
    (Ecommerce-Platform-sim-api) $ php artisan db:seed
    Api Token for Test User : <Token>
```
<br>

**To Start the server :**
```code
   (Ecommerce-Platform-sim-api) $ php artisan serve
```

### Api Documenation
[Documenation](https://documenter.getpostman.com/view/23024573/2s9YywdeKo)
