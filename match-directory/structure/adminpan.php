<?php
/**
 * (!) This file may be auto-completed when updated, causing all data outside
 * the returned array, such as comments and other code, to be removed.
 * The returned array contains a list of pages for making an interactive menu from them.
 * Each page must match a 'route' by name.
 * Without a route name, there can be a list of attachments ('section') and a link ('link').
 * Each of these three items can have an icon at the beginning of the link ('image').
 * Sample compilation for three different types (list, link and page):
 *
 * (!) Этот файл может дополниться автоматически при обновлении, вследствие чего все
 * данные вне возвращаемого массива, вроде комментариев и другого кода,
 * будут удалены.
 * Возвращаемый массив содержит перечень страниц для составления из них интерактивного меню.
 * Каждая страница должна содержать соответствие с маршрутом ('route') по названию.
 * Без названия маршрута может быть список вложений ('section') и ссылка ('link').
 * Каждый из этих трёх пунктов может иметь иконку в начале по ссылке ('image').
 * Образец составления для трёх разных типов (список, ссылка и страница):
 *

return [
    'design' => 'base', // base|light... default `base`
    'method' => 'MPA', // default `MPA`
    'type' => 'panel', // panel... default `panel`
    'breadcrumbs' => 'on', // on|off default 'on'
    'section' => [
        [
            'name' => [
                'ru' => 'Главное меню',
                'en' => 'Main menu'
            ],
            'section' => [ // (drop-down menu)
                [ // Route name 'second' (page)
                    'route' => 'second',
                    // Icon before line 20x20px
                    'image' => '/svg/example.svg',
                    'name' => [
                        'en' => 'Test page',
                        'ru' => 'Тестовая страница',
                    ],
                ],
                [ // According to url
                    'link' => '/', // (url)
                    'name' => [
                        'en' => 'Home Page',
                        'ru' => 'На главную страницу',
                    ],
                ],
            ],
        ],
    ]
];
*/
return [];
