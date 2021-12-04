<?php
//controllers/frontend/login/get.php

function get($f3){
    require('setting.php');
    
    $f3->mset([
        'appName'=>$setting['siteTitle'], 
        'pageTitle'=>'ទំព័រ​ចុះ​ឈ្មោះ', 
        'date'=>$setting['date'],
        'message'=>$setting['message']
    ]);

    require  __DIR__.'/createUserTable.php';
    //createUserTable($f3);

    echo View::instance()->render('views/frontend/login.html');
}