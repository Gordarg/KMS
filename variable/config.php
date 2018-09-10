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
    }

    const Url_PATH = "/CMS"; //       /Anything
    const Url_SUBDOMAIN = ""; //      Anything.
    const ConnectionString_SERVER  = "localhost";
    const ConnectionString_USERNAME  = "root";
    const ConnectionString_PASSWORD = "123";
    const ConnectionString_DATABASE = "gordcms";

    const TITLE = "پویان زربار سینا";
    const LANGUAGE = "Farsi";
    const REGION = "IR";
    const NAME = "شرکت پویان زربار سینا";
    const SPONSOR = "Gordarg";
    const META_KEYWORDS = "knowledge, social network, content, SEO, telecommunications, e-business";
    const META_DESCRIPTION = "";
    
    const WebMaster = "info@gordarg.com";
}
?>
