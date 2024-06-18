<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
    'type' => 'MySQLDatabase',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'SS_mysite',
    'path' => ''
);
// Set the site locale
i18n::set_locale('en_US');

require_once("conf/ConfigureFromEnv.php");
Security::setDefaultAdmin('admin', '123456');
