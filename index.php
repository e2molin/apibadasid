<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim();
$app->contentType('text/html; charset=utf-8');
define("SPECIALCONSTANT",true);

//require 'app/class/datasetPDO.class.php';
require "app/libs/connect.php";
require "app/routes/api.php";

$app->run();


?>
