# Административная панель на основе фреймворка HLEB2

[![HLEB2](https://img.shields.io/badge/HLEB-2-darkcyan)](https://github.com/phphleb/hleb) ![PHP](https://img.shields.io/badge/PHP-^8.2-blue) [![License: MIT](https://img.shields.io/badge/License-MIT%20(Free)-brightgreen.svg)](https://github.com/phphleb/hleb/blob/master/LICENSE)

Установка при помощи Composer:
```bash
composer require phphleb/adminpan
```

Представляет собой дополнение к библиотеке регистрации HLOGIN, но также может быть использована отдельно, в качестве одной или нескольких административных панелей на одном сайте или публичного оформления для сайта.

С помощью этой библиотеки создан внешний вид [сайта](https://hleb2framework.ru) документации фреймворка без значительных изменений.

Настройка
-----------------------------------

Если выполнить следующую команду, то в раздел /config/structure/ будет скопирован файл adminpan.php с описанием того, как создать структуру меню для административной панели.
```bash
php console phphleb/adminpan add
```
Первоначально файл /config/structure/adminpan.php содержит пустой массив, никаких разделов меню не задано.
Разделы меню назначаются по названиям маршрутов (или обычным ссылкам).
Пример для демонстрационного маршрута:

```php
Route::get('/{lang}/panel/page/default')
    ->page('adminpan', ExamplePanelController::class)
    ->name('adminpan.default');
```
Здесь указано, что для меню 'adminpan' (одноименное с файлом adminpan.php) по URI адресу '/{lang}/panel/page/default' назначен контроллер page() класса ExamplePanelController для метода 'index'.
Кроме того, маршрут имеет название 'adminpan.default', которое нужно для сопоставления с разделом в меню.
Теперь можно создать первый пункт меню в файле /config/structure/adminpan.php.

```php
return [
    'design' => 'base', // base|light... default `base`
    'breadcrumbs' => 'on', // on|off default 'on'
    'section' => [
        [
            'name' => [
                'ru' => 'Главное меню',
                'en' => 'Main menu'
            ],
            'section' => [
                [
                    'route' => 'adminpan.default',
                    'name' => [
                        'en' => 'Test page',
                        'ru' => 'Тестовая страница',
                    ],
                ],
            ],
        ],
    ]
];
```

Меню может содержать вложенные раскрывающиеся списки ('section'), сейчас назначен только один с одним пунктом.

Если перейти по адресу URL '/ru/panel/page/default', то для страницы будет назначен дизайн 'base'(из настроек), а также меню, в котором будет список 'Главное меню' c активным пунктом 'Тестовая страница' на которой будет выведен контент из контроллера ExamplePanelController.

Таким образом можно создать достаточно расширенное меню для сайта или админпанели, которое будет мультиязычным и интерактивным.

Совместно используя с библиотекой HLOGIN маршруты админпанели могут быть доступны только определенному типу пользователей (авторизованным).