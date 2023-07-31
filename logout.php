<?php
session_start();
require 'vendor/autoload.php';
include 'inc/inc.php';

Account::Disconnect();
header("Location: /");
