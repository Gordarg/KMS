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
    const SPONSOR = "وزارت بهداشت، درمان و آموزش پزشکی ⃝ وزارت صنعت، معدن و تجارت ⃝ سازمان غذا و دارو ⃝ سازمان استاندارد و تحقیقات صنعتی ⃝ سازمان آموزش فنی و حرفه‌ای ⃝ شرکت شهرک‌های صنعتی ⃝ اداره کل نظارت و ارزیابی فرآورده های غذایی آرایشی و بهداشتی";
    const META_KEYWORDS = "غذا و دارو,صنایع غذایی,آموزش,مشاوره مدیریت,مشاوره,مدیریت,صنایع,غذا,دارو,آرایشی,بهداشتی,آرایشی و بهداشتی,تضمین کیفیت,کیفیت,کنترل کیفیت,HACCP,GMP,PRPS,TTAC,ISO,ISO9001,مهندسی صنایع,ISO 9001,ISO 22000,ISO22000";
    const META_DESCRIPTION = "";
    
    const WebMaster = "info@psina.ir";
}
?>
