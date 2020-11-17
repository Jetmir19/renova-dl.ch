<?php
session_start();
// session_regenerate_id(true);

/* Error reporting */
// ini_set("error_reporting", "true");
// error_reporting(E_ALL | E_STRCT);

/* DEFAULT Language */
define('DEFAULT_LANGUAGE', 'AL');

/* DB Params */
define('DB_HOST', 'localhost');
define('DB_NAME', 'renova_sarl_db');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASS', '123456');


/* App Email Address - for the Contact page */
defined("CONTACT_FORM_EMAIL")
    or define("CONTACT_FORM_EMAIL", 'ademi.neshat@gmail.com');


/* Path Constants */
defined("SITE_NAME")
    or define("SITE_NAME", 'renova-sarl.ch');

defined("APPURL")
    or define("APPURL", "http://localhost/renova-sarl.ch");

defined("APPROOT")
    or define("APPROOT", dirname(dirname(__DIR__)));

defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", dirname(__DIR__) . '/library');

defined("DB_PATH")
    or define("DB_PATH", dirname(__DIR__) . '/database');

/* VIEWS */
defined("VIEWS_PATH")
    or define("VIEWS_PATH", dirname(__DIR__) . '/views');
