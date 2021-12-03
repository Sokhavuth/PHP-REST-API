<?php
//index.php
require 'vendor/autoload.php';
$f3 = \Base::instance();

session_start();

require('routes/frontend/index.php');

$f3->run();