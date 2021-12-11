<?php
//controllers/backend/post/edit.php

function edit($f3){
    require('setting.php');
    require('models/posts/editdb.php');
    $items = editdb($f3, $setting['backendPostLimit']);

    $f3->mset([
        'appName'=>$setting['siteTitle'], 
        'pageTitle'=>'ទំព័រ​ការផ្សាយ', 
        'date'=>$setting['date'],
        'message'=>'ទិន្នន័យ​ការផ្សាយសរុប',
        'singleItem'=>$items[0],
        'item'=>$items[1],
        'route'=>'post',
        'edit'=>true
    ]);

    echo View::instance()->render('views/backend/post.html');
}