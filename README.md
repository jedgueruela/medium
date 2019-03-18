Medium like blog app.

## Set Up

### Setup environment variables
create .env based off of env.example and configure database credentials

### Install packages
```
$ composer install
```

### Generate application key
```
$ php artisan key:generate
```

### Generate and seed database tables
```
$ php artisan migrate --seed
```

### Publish the resources
```
$ php artisan vendor:publish --tag=ckeditor
$ php artisan vendor:publish --tag=lfm_config
$ php artisan vendor:publish --tag=lfm_public
```

### Install modules
```
$ npm install
```

### Run all mix tasks
```
$ npm run dev
```

### Serving the application
```
$ php artisan serve
```
or
```
$ php -S localhost:9000 -t public
```

## Using the application

### To login to the admin dashboard

sample@email.com
password

## Testing

### To run all tests, simple run command:
```
$ vendor\bin\phpunit
```
