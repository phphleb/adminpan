<?php

namespace Phphleb\Adminpan\Add;

class AdminPanData
{
    use \DeterminantStaticUncreated;

    /*
     * [
    "ru" => ["ru_name" => "value", ...],
    "en" => ["en_name" => "value", ...],
    "de" => ["de_name" => "value", ...],
    ]
    */
    protected static $list = [];

    protected static $lang = "en";

    protected static $logo = "";

    protected static $color = "#4e759d";

    protected static $link = null;

   public static function setI18nList(array $data) {
       self::$list = $data;
   }

    public static function getI18nList() {
        return self::$list;
    }

    public static function setLang(string $type) {
        self::$lang = $type;
    }

    public static function getLang() {
        return self::$lang;
    }

    public static function i18n($name) {
        if(empty(self::$list[self::$lang][$name])) {
            return $name;
        }
        return self::$list[self::$lang][$name];
    }

    public static function setLogo(string $url) {
        self::$logo = $url;
    }

    public static function getLogo() {
        return self::$logo;
    }

    public static function setColor(string $color) {
        self::$color = $color;
    }

    public static function getColor() {
        return self::$color;
    }

    public static function setLink(string $url, string $name) {
        self::$link = ["url" => $url, "name" => $name];
    }

    public static function getLink() {
        if (!empty(self::$link["url"]) && !empty(self::$link["name"])) {
            return self::$link;
        }
        return null;
    }
}
