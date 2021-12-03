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
    $db = new DB\SQL(
        'mysql:host=sql300.epizy.com;port=3306;dbname=epiz_28751582_media',
        'epiz_28751582',
        '6hlAjC0Bkgr'
    );

    $f3->set('DB', $db);
}

require('routes/frontend/index.php');

$f3->run();