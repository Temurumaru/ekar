<?php

$DB_TYPE = "mysql";
$DB_HOST = "127.0.0.1";
$DB_NAME = "ekar";
$DB_USER = "root";
$DB_PASS = "8514";

// $DB_TYPE = getenv('DB_CONNECTION');
// $DB_HOST = getenv('DB_HOST');
// $DB_NAME = getenv('DB_DATABASE');
// $DB_USER = getenv('DB_USERNAME');
// $DB_PASS = getenv('DB_PASSWORD');

// exit($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME. $DB_USER. $DB_PASS);

use RedBeanPHP\R as R;

R::setup($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
\RedBeanPHP\Util\DispenseHelper::setEnforceNamingPolicy(false);

if(!R::testConnection()) {
  exit("There is no connection to the database :(");
}

session_start();

$locale = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);

if(!isset($_COOKIE['lang']) || !($_COOKIE['lang'] == "uz" || $_COOKIE['lang'] == "ru")) {
  setcookie("lang", $locale);
}

if(isset($_SESSION['admin'])) {
  $adm = R::findOne("admins", "id = ?", [$_SESSION['admin'] -> id]);
  $_SESSION['admin'] = $adm;
}

if(isset($_COOKIE['lang'])) {
  if($_COOKIE['lang'] != "ru") {
    require_once "lang/uz.php";
  } else {
    require_once "lang/ru.php";
  }
} else {
  require_once "lang/ru.php";
}