# ONEXCRM CHECK SYSTEM INFO

### A package for get complete system environment detail information

## Installation

> **No dependency on PHP version and LARAVEL version**

### STEP 1: Run the composer command:

```shell
composer require onexcrm/sysinfo
```

### STEP 2: Laravel without auto-discovery:

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
Onex\Sysinfo\OnexSysinfoServiceProvider::class,
```

If you want to use the facade to log messages, add this to your facades in app.php:

```php
'OnexSysinfo' => Onex\Sysinfo\Sysinfo\SysinfoClassFacade::class,
```

### STEP 3: Publish the package config:

```php
php artisan vendor:publish --provider="Onex\Sysinfo\OnexSysinfoServiceProvider" --force
```

## How to use?:

> **DIRECT USE BY ROUTE**
---
<dl>
  <dt>>> <code>Just install and run the below route </span></code></dt>
</dl>

```php
Ex: http://your-website/onex/check-sysinfo

Ex: http://localhost:8000/onex/check-sysinfo
```
![sys_info-1](https://user-images.githubusercontent.com/24665327/224806839-245e87e7-fdbf-4c27-bf36-d27b465f6f80.png)

![sys-info-2](https://user-images.githubusercontent.com/24665327/224806938-79c21838-e6bd-47aa-9f29-2fccafe258ab.png)

![sysinfo-3](https://user-images.githubusercontent.com/24665327/224807043-d74eeaf3-08f2-4f7b-a6c5-93cc91e38489.png)

![sysinfo-5](https://user-images.githubusercontent.com/24665327/224807193-3aad7620-402a-4eed-9021-1a5fd53f9972.png)


> **USE LIKE A HELPER IN CONTROLLER**
---
<dl>
  <dt>>>> <code>Just install and call below methods </span></code></dt>
</dl>

```php
>> Ex1: OnexSysinfo::getSystemInfo();
```

```php
>> Ex2: OnexSysinfo::getAllPaths();
```

```php
>> Ex3: OnexSysinfo::isStorageWritable();
```

```php
>> Ex4: OnexSysinfo::isCacheWritable();
```

```php
>> Ex5: OnexSysinfo::getAllEnvs();
```

```php
>> Ex6: OnexSysinfo::getServerInfo();
```

```php
>> Ex7: OnexSysinfo::howManyTablesInDB();
```

```php
>> Ex8: OnexSysinfo::getAllTablesName();
```

```php
>> Ex9: OnexSysinfo::getEnabledPhpExtensions();
```

#### You can modify the configuration settings in - "config/onex-sysinfo.php":

```php
/** If you want to disable the route then make it false */
'is_route_enabled' => true,
```

```php
/** If you want to change the route prefix */
'route_prefix' => 'onex',
```

```php
/** If you want to change the route name or path */
'route_name' => 'check-sysinfo',
```

```php
/** If you want to enable the securiry for access the system information
 *  Then make it ('is_enabled') true and also you can set login-id and password 
 */
'authentication' => [
    'is_enabled' => env('ONEX_SYSINFO_AUTH_ENABLED', false),
    'login_id' => env('ONEX_SYSINFO_ID', 'onexadmin'),
    'password' => env('ONEX_SYSINFO_PASSWORD', 'onexpassword')
]
```

## license:
The MIT License (MIT). Please see [License File](LICENSE) for more information.

## Post Issues: if found any
If have any issue please [write me](https://github.com/dev-arindam-roy/onex-sysinfo/issues).
