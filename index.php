<?php
//index.php
require 'vendor/autoload.php';
$f3 = \Base::instance();

session_start();

require('tool.php');
$tool = new Tool();
$localhost = $tool->is_localhost();

if($localhost){
    $f3->set('DB', new DB\SQL('sqlite:database.sqlite'));
}else{
    //$ composer require vlucas/phpdotenv
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $db_host = $_ENV["DATABASE_HOST"];
    $db_port = $_ENV["DATABASE_PORT"];
    $db_name = $_ENV["DATABASE_NAME"];
    $db_user = $_ENV["DATABASE_USER"];
    $db_password = $_ENV["DATABASE_PASSWORD"];
    
    $db = new DB\SQL(
        'mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name,
        $db_user,
        $db_password
    );
    [\PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8;'];

    $f3->set('DB', $db);
}
//require('createTable.php');
//createTable($f3);
require('routes/frontend/index.php');
require('routes/backend/index.php');

$f3->run();