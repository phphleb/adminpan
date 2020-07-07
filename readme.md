# Admin Panel
### Simple and adaptive Admin Panel from Micro-Framework HLEB

The Admin Panel is not included in the original configuration of the framework [HLEB](https://github.com/phphleb/hleb), so it must be copied to the folder with the vendor/phphleb  libraries from the [github.com/phphleb/adminpan](https://github.com/phphleb/adminpan)  repository or installed using Composer:

```html
$ composer require phphleb/adminpan
```


The adminPanController() method is similar to the controller() method, which is displayed in the shell of the admin panel.

```php

Route::get('/admin/panel/main/')->adminPanController('AdminController@main', 'adminzone');

```

```php

// Файл /app/Controllers/AdminController.php
namespace App\Controllers;

use Phphleb\Adminpan\MainAdminPanel;
use Phphleb\Adminpan\Add\AdminPanData;

class AdminController extends \MainController
{
  function main()
  {
    /** Optional parameters */

   // Primary color setting
   AdminPanData::setColor("#434c61");

   // Setting the language, for example "en" or "ru"
   AdminPanData::setLang("ru");

   // Setting the site logo
   AdminPanData::setLogo("/svg/logo.svg");

   // Setting a link to the site and its name
   AdminPanData::setLink("/", "main_page");

   // Defining a translation array
   AdminPanData::setI18nList([
         "en" => ["adminzone" => "Adminzone", "reg_panel" => "Users", "settings_panel" => "Settings", "main_page" => "Main Page"],
         "ru" => ["adminzone" => "Админзона","reg_panel" => "Пользователи", "settings_panel" => "Параметры", "main_page" => "Главная страница"],
       ]);

   $panel = new MainAdminPanel();
   // HTML output
   $content = $panel->getDataHTML("<b>HTML</b>");
   
   // Get a numbered list
   $content .= $panel->getDataList(["Text 1", "Text 2", "Text 3"]);

   // Output an array with data in the form of a table
   $data = UserModel::getData();
   $content .= $panel->getDataTable($data);

   return $content ;
  }
}

```
