# Giftery

This package to integrate with laravel 5.8 - 6

Package for paying phone number through the service Giftery (https://docs.giftery.tech/b2b-api-mobile-top-up/)

## install

```shell
composer require sergey-yabloncev/giftery
```

Copy the package config to your local config with the publish command:

```shell
php artisan vendor:publish --provider="Yabloncev\Giftery\ServiceProvider"
```

## Two methods available

### Paying phone

```php
Giftery::makeTopUp($phone-number);
```

### Get Status

```php
Giftery::getStatus($id);
```
