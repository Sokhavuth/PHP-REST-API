<?php
//controllers/post/get.php

function get($f3){
    require('setting.php');

    $f3->mset([
        'appName'=>$setting['siteTitle'], 
        'pageTitle'=>'ទំព័រ​ការផ្សាយ', 
        'date'=>$setting['date'],
        'message'=>$setting['message']
    ]);

    echo View::instance()->render('views/backend/post.html');
}
