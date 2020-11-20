<?php
session_start();
// session_regenerate_id(true);

/* Error reporting - comment this on Production! */
ini_set("error_reporting", "true");
error_reporting(E_ALL);

/* DB Params */
require_once __DIR__ . "/config_db.php";

/* DEFAULT Language */
define('DEFAULT_LANGUAGE', 'FR');


/* App Email Address - for the Contact page */
defined("CONTACT_FORM_EMAIL")
    or define("CONTACT_FORM_EMAIL", 'ademi.neshat@gmail.com');


/* Path Constants */
defined("SITE_NAME")
    or define("SITE_NAME", 'renova-dl.ch');

defined("APPURL")
    or define("APPURL", "http://localhost/renova-dl.ch");

defined("APPROOT")
    or define("APPROOT", dirname(dirname(__DIR__)));

/* UPLOAD PATH */
defined('UPLOAD_PATH')
    or define('UPLOAD_PATH', APPROOT . '/public/uploads/gallery');

defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", dirname(__DIR__) . '/library');

defined("ROUTES_PATH")
    or define("ROUTES_PATH", dirname(__DIR__) . '/routes');

defined("DB_PATH")
    or define("DB_PATH", dirname(__DIR__) . '/database');

defined("MODELS_PATH")
    or define("MODELS_PATH", dirname(__DIR__) . '/models');

/* VIEWS */
defined("VIEWS_PATH")
    or define("VIEWS_PATH", dirname(__DIR__) . '/views');
