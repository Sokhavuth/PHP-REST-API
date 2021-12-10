<?php
//controllers/post/get.php

function get($f3){
    require('setting.php');
    require('models/posts/getdb.php');

    $f3->mset([
        'appName'=>$setting['siteTitle'], 
        'pageTitle'=>'ទំព័រ​ការផ្សាយ', 
        'date'=>$setting['date'],
        'message'=>'ទិន្នន័យ​ការផ្សាយសរុប',
        'item'=>getdb($f3, $setting['backendPostLimit']),
        'route'=>'post'
    ]);

    echo View::instance()->render('views/backend/post.html');
}
