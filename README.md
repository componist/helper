# mini Helper

- [x] show Modal  fillable array , casts array
- [x] show Validation settings from database  table
- [x] create Migration from database table
- [x] get database schema
- [x] snippest for GRUD, PEST
- [ ] create blueprint yaml from database



This package is only intended for developers and in the local system.

```php

if (env('APP_DEBUG') === true) {
  // routings
}
  ```


## install
### #1. copy this folder in root/packages/componist


### #2. in your composer.json include to autoload -> psr-4

```json
//.....
"autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/",
           
            "Componist\\Helper\\": "packages/componist/helper/src",
           
        }
    },
//.....
```


### #3. in your root/bootstrap/providers.php

```php
return [
    
    Componist\Helper\HelperServiceProvider::class,
   
];

```


### #4. show in url with 

```
https://your-url/helper
```