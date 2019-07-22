<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced MKRF Case</h1>
    <br>
</p>


[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

СТРУКТУРА ФАЙЛОВ
-------------------

```
common/                  Общие классы и модули
console/                 Консольное приложение
backend/                 Приложение административного интерфейса
frontend/                Приложение публичной части
vendor/                  Вендорные пакеты
environments/            Окружение
vagrant/                 Vagrant
```

Системные требования
-------------------

```
php 7.1
mysql 5.3
```

Установка
-------------------

```
composer install
php init
./yii migrate
```

База данных
-------------------

/common/config/main-local.php

```
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2advanced',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Так же для корректной работы системы требуется создать и при необходимости настроить файлы:<br>
/frontend/config/main-local.php<br>
/backend/config/main-local.php