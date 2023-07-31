<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('Europe/Paris');

require 'config.php';
include 'Database.php';
include 'Account.php';
include 'Users.php';


$GLOBALS['DB'] = new Database($GLOBALS['mysql_host'], $GLOBALS['mysql_database'], $GLOBALS['mysql_username'], $GLOBALS['mysql_password']);
?>