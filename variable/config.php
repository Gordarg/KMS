<?php
namespace core;
include_once 'core/language.php';
use core\language;

class config
{
    public $languages = array();
    public function __construct () {
        array_push($this->languages, new language("fa", "فارسی", "IR", "r", "🇮🇷"));
        array_push($this->languages, new language("en", "English", "US", "l", "🇺🇸"));
        array_push($this->languages, new language("ru", "русский", "RU", "l", "🇷🇺"));
    }

    const Url_PATH = "/CMS"; //       /Anything
    const Url_SUBDOMAIN = ""; //      Anything.
    const ConnectionString_SERVER  = "localhost";
    const ConnectionString_USERNAME  = "root";
    const ConnectionString_PASSWORD = "123";
    const ConnectionString_DATABASE = "gordcms";

    const TITLE = "گُرد";
    const LANGUAGE = "Farsi";
    const REGION = "IR";
    const NAME = "سامانه‌ی مدیریت محتوی گرد";
    const SPONSOR = "";
    const META_KEYWORDS = "کلمات, کلیدی, من, SEO";
    const META_DESCRIPTION = "درباره‌ی این اَرگ";
    
    const WebMaster = "info@gordarg.com";
}
?>
