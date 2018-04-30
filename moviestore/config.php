<?php
define("DB","movie_store");
define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
define("APP_DIR","c:/wamp64/www/phpsajt");

function __autoload($class){
    require_once "classes/".$class.".php";
}
