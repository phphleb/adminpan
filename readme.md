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
// Demo with one level of attachment
Route::getGroup();
Route::get('/{lang}/admin/page/first/')->adminPanController('AdminController@page', ['Level 1' ,'Page 1'], [1]);
Route::get('/{lang}/admin/page/second/')->adminPanController('AdminController@page', ['Level 1' ,'Page 2'], [2]);
Route::endGroup()->where(['lang' => 'en|de|ru']);

```

```php

// Файл /app/Controllers/AdminController.php
namespace App\Controllers;

use Phphleb\Adminpan\MainAdminPanel;
use Phphleb\Adminpan\Add\AdminPanData;
use Hleb\Constructor\Handlers\Request;

class AdminController extends \MainController
{
   public function main() {
     
       /** Optional parameters */

       $this->setGlobalPanSettings();

       AdminPanData::setDataFromHeader('<meta name="description" content="Page description">');

       $panel = new MainAdminPanel();
       // HTML output
       $content = $panel->getDataHTML("<b>HTML</b>");
   
       // Get a numbered list
       $content .= $panel->getDataList(["Text 1", "Text 2", "Text 3"]);

       // Output an array with data in the form of a table
       $data = UserModel::getData();
       $content .= $panel->getDataTable($data);
     
       // Content of the current page
       return $content ;
   }
   
   public function page($number) {
       // Instructions for the page
       AdminPanData::setInstruction("The text of the instruction.");

       return "This page number is " . $number;
   }
 
   protected function setGlobalPanSettings() {

       /** Optional parameters */
     
        // Primary color setting
        AdminPanData::setColor("#434c61");
     
        // Adding data to the page header
        AdminPanData::setDataFromHeader('<meta name="author" content="admin">');
        AdminPanData::setDataFromHeader('<script type="text/javascript" src="/js/main.js"></script>');
     
        // Setting the site logo
        AdminPanData::setLogo("/svg/logo.svg");
     
        // Setting a link to the site and its name
        AdminPanData::setLink("/", "main_page");
        
        // Setting the language, for example "en" or "ru"
        AdminPanData::setLang(Request::get("lang") ?? 'ru');
        
        // Replacing the default url value
        AdminPanData::setUrlParts(["lang" => "ru"]);
     
        // Defining a translation array
        AdminPanData::setI18nList([
            "en" => ["adminzone" => "Adminzone", "reg_panel" => "Users", "settings_panel" => "Settings", "main_page" => "Main Page"],
            "ru" => ["adminzone" => "Админзона","reg_panel" => "Пользователи", "settings_panel" => "Параметры", "main_page" => "Главная страница"],
          ]); 
   }

}

```
