# exercises_cross
Symfony 4 with API Platform & JWT Authentication - VueJs Project. Crossfit exercises list

# How to

### Installing dependencies
```
composer install
yarn install
```

### Database Configuration

* Modify .env (add database info)
```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
```

```
php bin/console doctrine:database:create
php bin/console doctrine:schema:update
php bin/console doctrine:fixtures:load
```

## JWT Configuration
### Generate SSH Keys

```
mkdir config/jwt
openssl genrsa -out config/jwt/private.pem -aes256 4096
openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
```
In case first openssl command forces you to input password use following to get the private key decrypted
```
openssl rsa -in config/jwt/private.pem -out config/jwt/private2.pem
mv config/jwt/private.pem config/jwt/private.pem-back
mv config/jwt/private2.pem config/jwt/private.pem
```

### Generate Vuejs Build
```
yarn dev
```

### Run Server
```
php bin/console server:start
```

### Open browser

[http://localhost:8000](http://localhost:8000)


## API

### Default User/Password
```
username: exercise
password: ex.Cr0ss
```

### Postman Collention
PROJECT_DIR/Exercises_Cross.postman_collection.json
