# Admin Panel
### Simple and adaptive Admin Panel from Micro-Framework HLEB

The Admin Panel is not included in the original configuration of the framework [HLEB](https://github.com/phphleb/hleb), so it must be copied to the folder with the vendor/phphleb  libraries from the [github.com/phphleb/adminpan](https://github.com/phphleb/adminpan)  repository or installed using Composer:

```html
$ composer require phphleb/adminpan
```


The adminPanController() method is similar to the controller() method, which is displayed in the shell of the admin panel.

```php

Route::get('/admin/panel/main/')->adminPanController('AdminController@main', 'Page Name');

```

```php

// Файл /app/Controllers/AdminController.php
namespace App\Controllers;
use Phphleb\Adminpan\MainAdminPanel;
class AdminController extends \MainController
{
  function main()
  {
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
