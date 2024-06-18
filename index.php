<?php

// Define the base URL for scripts
define('BASE_URL', '/silverstrip_test/tutorial/');

// Obtain the URL
$url = isset($_SERVER['REQUEST_URI']) ? substr($_SERVER['REQUEST_URI'], strlen(BASE_URL)) : '';

// Set the URL parameter
$_GET['url'] = $_REQUEST['url'] = $url;

// Include the SilverStripe framework
require_once 'framework/main.php';
